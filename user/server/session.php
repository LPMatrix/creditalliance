<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])){
    header('location:../login.html');   
}else{
    $cusID = $_SESSION['cust_id'];
}
?>