<?php
require 'config.php';

if(isset($_POST)) {
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$nic = $_POST["nic"];
	$contact = $_POST["contact"];
	$address = $_POST["address"];
	$password = sha1($_POST["password"]);
	
	$sql = "INSERT INTO users(username,email,nic,phone,address,password)
		VALUES('$name','$email','$nic','$contact','$address','$password')";
	
	if($conn->query($sql)){
		return "Inserted Successfully";
	}
	else{
		echo "Error while inserting to database : ".$conn->error;
	}
}else{
	
	echo "all Field must be mandatory!";
}
$conn->close();
?>