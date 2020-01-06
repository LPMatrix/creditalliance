<?php   
session_start();
$date = $_SESSION['lastlogin'];
$cusID = $_SESSION['cust_id'];
include("server/conn.php");
mysqli_query($mysqli, "UPDATE `customers` SET `lastlogin` = '$date' WHERE `accountno` = '$cusID'");
session_destroy();
header("location:../login.html");
exit();
?>
