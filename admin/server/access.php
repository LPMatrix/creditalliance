<?php 
	
	session_start();

		if(!isset($_SESSION['access'])){
			$_SESSION['msg'] = "Invalid Access! Login to have access";
			echo "Invalid";
			header('Location:index.php');
		}?>