<?php
  require('conn.php');
    $tid  = $_POST['id'];
	$sql = mysqli_query($mysqli, "UPDATE `transaction` SET `transaction`.`status` = 0 WHERE `transaction`.`tid` = '$tid'") or die(mysqli_error());
    
    if($sql){
        echo "success";
    }else{
        echo "fail";
    }


?>