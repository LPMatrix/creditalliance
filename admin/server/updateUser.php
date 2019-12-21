<?php
	session_start();
	require('conn.php');
	$user = $_POST['user'];
	$status = $_POST['status'];
	$sql = mysqli_query($mysqli, "UPDATE `customers` SET `status` = '$status' WHERE `accountno` = '$user'") or die(mysqli_error());
	
	if($sql){
		$_SESSION['message'] = "success";
	  header('location: ../dashboard.php');  
	}
	
// 	header('location: ../dashboard.php');
?>