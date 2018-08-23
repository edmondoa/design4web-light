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


$sql = "SELECT email FROM users where email='".$_POST['email']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "1";
  
} else {
    echo "0";
}


$conn->close();
?>
