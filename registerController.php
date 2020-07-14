<?php
require 'config.php';

if(isset($_POST)) {
	
	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$nic = mysqli_real_escape_string($conn, $_POST["nic"]);
	$contact = mysqli_real_escape_string($conn, $_POST["contact"]);
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);
	$password = sha1($password);
	
	$sql = "INSERT INTO users(username,email,nic,phone,address,password)
		VALUES('$name','$email','$nic','$contact','$address','$password')";
	
	$result = mysqli_query($conn, $sql);
	
	if($result){
		echo 'User Registerd Successfully.';
	}else{
		echo 'error while inserting data to db';
	}

}else{
	echo "all Field must be mandatory!";
}
$conn->close();
?>