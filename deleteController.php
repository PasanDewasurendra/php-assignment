<?php
require 'config.php';

if(isset($_POST)) {
	
	$id = $_POST["id"];

	$sql = "DELETE FROM users WHERE id='$id'";
	
	$result = mysqli_query($conn, $sql);
	
	if($result){
		echo 'User Succefully Deleted.';
	}else{
		echo 'error while deleting data from db';
	}

}else{
	echo "error!";
}



$conn->close();
?>