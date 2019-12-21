<?php 
    session_start();
    include("../server/conn.php");
    $cusID = $_SESSION['cust_id'];
    $amount = $_POST['amount'];
    $fromAccount = $_POST['fromAccount'];
    
    $userSql = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $cusID");
    $user = mysqli_fetch_assoc($userSql);
    if($user['status'] = 'declined'){
      echo 'declined';
    }elseif($user['status'] = 'requestcode'){
      echo 'requestcode';
    }else{
      echo 'insert';
    }

?>