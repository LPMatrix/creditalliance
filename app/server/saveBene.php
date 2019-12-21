<?php 
    session_start();
    include("conn.php");
    $cusID = $_SESSION['cust_id'];
    $Account = $_POST['AccountNo'];
    $beneName = $_POST['beneName'];
    $bankName = $_POST['bank'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $iban = $_POST['iban'];

   
   $sql = mysqli_query($mysqli, "SELECT * FROM `beneficiary` WHERE `accountno` = '$Account'");
   $row = mysqli_num_rows($sql);
   if($row > 0){
       echo "exist";
   }else{
    $Savebene = mysqli_query($mysqli, "INSERT INTO `beneficiary` (`id`, `ownerID`, `accountno`, `name`, bank, address, country, iban) VALUES (NULL, '$cusID', '$Account', '$beneName', '$bankName', '$address', '$country', '$iban')") or die($mysqli->error);
    if($Savebene){
        echo "success";
    }else{
        echo "fail";
    }
}
?>