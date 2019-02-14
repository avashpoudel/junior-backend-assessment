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

$sql = "INSERT INTO original_data VALUES ('red_shirt', 'Mens Red Shirt', 'm'),
('red_blouse', 'Womens Red Blouse', 'f'),
('blue_shorts', 'Mens Blue Shorts', 'm'),
('blue_skirt', 'Womens Blue Skirt', 'f'),
('rainbow_singlet', 'Singlet in Rainbow Colours', 'v'),
('sun_one', 'Aviator Sunglasses', 'f'),
('gold_neck', 'Gold Necklace Chain', ''),
('iph_case', 'Iphone Case pink', ' F'),
('sam_case', 'Samsung Case Skulls', 'M'),
('black_shirt', 'AC/DC Shirt', 'm')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>