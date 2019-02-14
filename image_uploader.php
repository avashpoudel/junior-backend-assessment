<?php


$servername = "localhost";
$username = "digit128_test01";
$password = "test01";
$dbname = "digit128_mindarc_assessment";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$target_dir = "media/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

	
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;


		
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				
				$update_sql = "UPDATE migrated_data SET image_url='".$_FILES['fileToUpload']['name']."' WHERE product_id=".$_POST['product_id']."";

			if ($conn->query($update_sql) === TRUE) {

				$dump_dir = dirname(__FILE__) . '/exercise_dump.sql';

			

			exec("mysqldump --user={$username} --password={$password} --host={$servername} {$dbname} --result-file={$dump_dir} 2>&1", $output);

			var_dump($output);

			
			echo "Record updated successfully";
			} else {
			echo "Error updating record: " . $conn->error;
			}
			
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
			echo "Sorry, there was an error uploading your file.";
			}


		}

}


//retrieving product names
$sql = "SELECT product_id, sku, name, image_url FROM migrated_data";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
<form action="" method="post" enctype="multipart/form-data">


	Select row to upload:
	<select name="product_id">
		<?php while($row = $result->fetch_assoc()) { ?>
			<option value="<?php echo $row['product_id']; ?>"><?php echo $row['name']; ?></option>
		<?php } ?>
	</select>
    Select image to upload: <br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php } else { echo 'no data'; } ?>