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


$sql_ins = "SELECT shares FROM products where id=12";
$result_ins = $conn->query($sql_ins);

if ($result_ins->num_rows > 0) {
    // output data of each row
    while($row = $result_ins->fetch_assoc()) {
		echo $row['shares'];
	}

	
	

	
} else 
	{

}

$conn->close();
?>