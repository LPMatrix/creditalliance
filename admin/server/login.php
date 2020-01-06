<?php 

//include config.php to connect to the database
	include("conn.php"); 
	
	//start session
    session_start();
{
		// Define $myusername and $mypassword
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	// To protect MySQL injection
	$username= mysqli_real_escape_string($mysqli, $username);
	$password = mysqli_real_escape_string($mysqli, $password);

    $fetch=mysqli_query($mysqli, "SELECT * FROM `admin` WHERE `username`='$username' and `password` = '$password'") or die(mysqli_error());
    $count=mysqli_num_rows($fetch);
    if($count > 0)
    {
		$_SESSION['login_username']=$username;
		echo "success";
	  header("location: ../dashboard.php");
    }
    else{
			echo "fail";
	   //header('Location: ../index.php');
		}

}
?>