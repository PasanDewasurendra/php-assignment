<?php
require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query_selectAll = "SELECT * FROM users WHERE email = ? password = ?";
$sql = $conn->prepare($query_selectAll);
$result = $sql->execute([$username, $password]);

if($result){
	$user = $sql->fetch(PDO::FETCH_ASSOC);
	if($sql->rowCount() > 0){
		echo '1';
	}else{
		echo 'Cannot find user with this credentials';
	}
	
}else{
	echo 'username or password incorrect';
}

?>