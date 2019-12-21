<?php 
    session_start();
    include("conn.php");
    $cusID = $_SESSION['cust_id'];
    $Account = $_POST['AccountNo'];
    
    //echo $Account;
    
    $AccountSql = mysqli_query($mysqli, "SELECT * FROM `customers` WHERE `accountno` = '$Account' AND `accountno` != '$cusID'") or die(mysqli_error($mysqli));
    $AccountRow = mysqli_num_rows($AccountSql);
    if($AccountRow > 0){
        $AccountResult = mysqli_fetch_assoc($AccountSql);
        echo $AccountResult['name'];
    }else{
        echo "null";
    }
     
?>