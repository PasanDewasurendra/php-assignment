<?php
require 'config.php';

if(isset($_POST)) {
	
	$id = $_POST["id"];
	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$nic = mysqli_real_escape_string($conn, $_POST["nic"]);
	$contact = mysqli_real_escape_string($conn, $_POST["contact"]);
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
	

	$sql = "UPDATE users SET username='$name',email='$email',nic='$nic',phone='$contact',address='$address' WHERE id='$id'";
	
	$result = mysqli_query($conn, $sql);
	
	if($result){
		echo 'User Update Sccessfully';
	}else{
		echo 'error while inserting data to db';
	}

}else{
	echo "all Field must be mandatory!";
}


$conn->close();
?>