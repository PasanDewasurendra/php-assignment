<?php
require 'config.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$password = sha1($password);

$sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){
	$_SESSION['username'] = $username;
	echo "success";
		
}else{
	echo "Invalid username or password";

}

?>

