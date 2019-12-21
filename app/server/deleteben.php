<?php
  include ('conn.php');
  session_start();
  $accountno = $_GET['id'];
  echo $accountno;

  $sql = mysqli_query($mysqli, "DELETE FROM `beneficiary` WHERE `accountno` = '$accountno'");

  if($sql){
    header("Location:../beneficiary.php");
  }
?>