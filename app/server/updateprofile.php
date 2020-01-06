<?php
  include("../server/session.php"); 
	require('conn.php');
	$user = $cusID;
	$name = mysqli_escape_string($mysqli, $_POST['name']);
  $email = mysqli_escape_string($mysqli, $_POST['email']);
  $phoneno = mysqli_escape_string($mysqli, $_POST['phoneno']);
  $address = mysqli_escape_string($mysqli, $_POST['address']);
  $nokname = mysqli_escape_string($mysqli, $_POST['nokname']);
  $nokemail = mysqli_escape_string($mysqli, $_POST['nokemail']);
  $nokphoneno = mysqli_escape_string($mysqli, $_POST['nokphoneno']);
	$sql = mysqli_query($mysqli, "UPDATE `customers` SET `name` = '$name',`email` = '$email',`phoneno` = '$phoneno',`address` = '$address',`kinname` = '$nokname',`kinemail` = '$nokemail',`kinphoneno` = '$nokphoneno' WHERE `accountno` = '$user'") or die(mysqli_error());
	var_dump($sql);
	if($sql){
		$_SESSION['message'] = "success";
	  header('location: ../profile.php');  
	}
	
// 	header('location: ../dashboard.php');
?>