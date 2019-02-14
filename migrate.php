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

$sql = "SELECT product_code, product_label, gender FROM original_data";
$result = $conn->query($sql);

/*print_r($result);
exit();*/
$arr=array();
if ($result->num_rows > 0) {
    // output data of each row
   	$counter=1;
    while($row = $result->fetch_assoc()) {
    	
    	$product_code = $row['product_code'];
    	$product_label = $row['product_label'];
    	$gender = $row['gender'];

    	$migrated_sku = 'women';
    	switch($gender){
    		case 'M': 
    			$migrated_sku = 'men';
    			break;
    		case 'F':
    			$migrated_sku = 'women';
    			break;
    	}
    	$migrated_sku = $product_code.'_'.$migrated_sku;
    	$migrated_name = $product_label;
    	

    	
    	$migration_sql = "INSERT INTO migrated_data VALUES (".$counter.",'".$migrated_sku."', '".$migrated_name."','')";

		/*for($i=0; $<=sizeof($arr); $i++){

		}*/

		if ($conn->query($migration_sql) === TRUE) {
		//echo "New record created successfully";
		} else {
		echo "Error: " . $migration_sql . "<br>" . $conn->error;
		}
		

		array_push($arr, array('product_id' => $counter,
			'sku' => $migrated_sku,
			'name' => $migrated_name,
			'image_url' => ''
		));

		
		
		
		$counter++;
        
    }
} else {
    echo "0 results";
}





/*echo '<pre>';
print_r($arr);
echo '<pre>';*/


$conn->close();
?>