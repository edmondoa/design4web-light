<?php
$servername = "localhost";
$username = "designweb";
$password = "jIje76~4";
$dbname = "designweb_shareit";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$get_wishlists = $_POST['wishlists'];
$get_id = $_POST['uid'];

$sql_two = "INSERT INTO wishlists (wishlists,user_id) values('".$get_wishlists."','".$get_id."')";

if ($conn->query($sql_two) == TRUE) {
	
	}else {
		echo "Error: " . $sql_two . "<br>" . $conn->error;
	}

$conn->close();
?>