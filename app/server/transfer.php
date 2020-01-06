<?php 
error_reporting(0);
    session_start();
    include("conn.php");
    $cusID = $_SESSION['cust_id'];
    $amount = $_POST['amount'];
    $transfer = $_POST['transfer'];
    if ($transfer == 0) {
      $transfer = "Local";
    }else{
      $transfer = "International";
    }
    $to = $_POST['to'];
    $transID = Date('His');
    $date =  date("Y-m-d");
    // var_dump($_POST);
    $iban = $_POST['iban'];
    $country = $_POST['country'];


    $toAccount = explode(" ", $to);
    $toAcc = str_replace(')', '', $toAccount[1]);
    $toSql = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $toAccount[3]");
    $toResult = mysqli_fetch_assoc($toSql);
     $userSql = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $cusID");
     $user = mysqli_fetch_assoc($userSql);

     if($user['balance'] > $amount){

     if($user['status'] == 'Transaction Declined'){
       echo "<script>alert('Transaction Declined. Kindly contact your financial institution'); window.location = '../transfer.php';</script>";
     }elseif($user['status'] == 'Ask for Code'){
           $sql2 = mysqli_query($mysqli, "INSERT INTO `creditalliance`.`transactions` VALUES (NULL, '$transID', '$cusID', '$toAcc', '$amount', '', '$transfer', '1', '$date', '$iban', '$country')") or die($mysqli->error);
              echo "<script>prompt('Enter OTP'); window.location = '../transfer.php';</script>";
     } 
     else{
          $sql2 = mysqli_query($mysqli, "INSERT INTO `creditalliance`.`transactions` VALUES (NULL, '$transID', '$cusID', '$toAcc', '$amount', '', '$transfer', '0', '$date', '$iban', '$country')") or die($mysqli->error);
          $newBalUser = $user['balance'] - $amount;
          $toBal = $toResult['balance'] + $amount;

        $sql3 = mysqli_query($mysqli, "UPDATE  `creditalliance`.`customers` SET  `balance` =  '$newBalUser' WHERE  `customers`.`accountno` = '$cusID'");

        $sql4 = mysqli_query($mysqli, "UPDATE  `creditalliance`.`customers` SET  `balance` =  '$toBal' WHERE  `customers`.`accountno` = '$toAcc'");
        
         echo "<script>prompt('Transaction Successful. Enter hardware token'); window.location = '../transfer.php';</script>";
     }
}else{
    echo "<script>alert('Low fund'); window.location = '../transfer.php';</script>";
}
?>
