<?php
	session_start();
	require('conn.php');
	$id = $_REQUEST['id'];
	$sql = mysqli_query($mysqli, "UPDATE `customers` SET `status` = 'requestCode' WHERE `accountno` = '$id'") or die(mysql_error());
	$_SESSION['message'] = "Account Status Change to Request code for Transactions";
	header('location: ../dashboard.php');
?>