<?php 
      include 'conn.php';
      $username=$_REQUEST['userid'];
      $date =  date("Y-m-d h:i:s a");
      
      //salting of password
      $password= md5($_REQUEST['password']);
    //echo $username,$password;
      $sql="SELECT * FROM `customers` WHERE `accountno`='$username' AND `password`='$password'";
      $result=mysqli_query($mysqli, $sql) or die(mysqli_error());
      $rws=  mysqli_fetch_array($result);
      
      $user=$rws[1];
      $pwd=$rws[10];    
      
      if($user==$username && $pwd==$password){
          session_start();
	  $_SESSION['customer_login']=1;
	  $_SESSION['lastlogin']=$date;
          $_SESSION['cust_id']=$username;
        //  echo "success";
         header('location:../index.php'); 
      }
     
  else{
     header('location:../../login.html');  
  }
?>
