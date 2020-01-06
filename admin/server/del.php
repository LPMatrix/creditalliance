<?php 

include('conn.php');
	if (isset($_GET['user'])) {
		$id = $_GET['user'];
		mysqli_query($mysqli, "DELETE FROM customers WHERE `id` = '$id'");
		header('location:../dashboard.php');
	}
 ?>