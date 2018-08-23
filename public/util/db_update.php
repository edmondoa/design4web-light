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
$id = $_POST['fb_id'];
$fb_counter = $_POST['fb_counter'];
$fb_uid = $_POST['usr_id'];


$sql_two = "INSERT INTO activity (user_id,prod_id) values('".$fb_uid."','".$id."')";

if ($conn->query($sql_two) == TRUE) {
	
	}else {
		echo "Error: " . $sql_two . "<br>" . $conn->error;
	}



$sql_ins = "SELECT shares FROM products where id=$id";
$result_ins = $conn->query($sql_ins);

if ($result_ins->num_rows > 0) {
    // output data of each row
    while($row = $result_ins->fetch_assoc()) {
		//$shares = $_POST['fb_counter'] + $row["shares"];
    	$old_counter = $row["shares"];
	}

	$shares = $old_counter + $fb_counter;

	$sql = "update products  set shares = $shares where id = $id";

	


	if ($conn->query($sql) === TRUE) {
	//	echo $shares;
	//	echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	

	
} else 
	{
    	$old_counter = 0;
	}


$conn->close();
?>