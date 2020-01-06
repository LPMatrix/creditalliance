<?php 
	if (isset($_POST['debit'])) {
	    include("conn.php");
	    $type = $_POST['type'];
	    $amount = $_POST['amount'];
	    $account = $_POST['account'];
	    $account = explode(" ", $account);
	    $account = $account[3];
	    $date =  $_POST['date'];
	    $transID = Date('His');

	    $userSql = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $account");
     	$user = mysqli_fetch_assoc($userSql);

	    
	    	if($type == '1'){
	    	$newBalUser = $user['balance'] + $amount;
	    	$sql3 = mysqli_query($mysqli, "UPDATE  `creditalliance`.`customers` SET  `balance` =  '$newBalUser' WHERE  `customers`.`accountno` = '$account'");

	    	$sql2 = mysqli_query($mysqli, "INSERT INTO `creditalliance`.`transactions` (`id`, `transID`, `fromAcc`, `toAcc`, `amount`, `transCode`, `type`, `status`, `date`) VALUES (NULL, '$transID', '1234567898765', '$account', '$amount', '', 'Transfer', '0', '$date')");

	    	echo "<script>alert('Successful'); window.location = '../action.php';</script>";
		    }else{

		    	if($user['balance'] > $amount){

		    	$newBalUser = $user['balance'] - $amount;
		    	$sql3 = mysqli_query($mysqli, "UPDATE  `creditalliance`.`customers` SET  `balance` =  '$newBalUser' WHERE  `customers`.`accountno` = '$account'");

		    	$sql2 = mysqli_query($mysqli, "INSERT INTO `creditalliance`.`transactions` (`id`, `transID`, `fromAcc`, `toAcc`, `amount`, `transCode`, `type`, `status`, `date`) VALUES (NULL, '$transID', '$account', '1234567898765', '$amount', '', 'Transfer', '0', '$date')");

		    	echo "<script>alert('Successful'); window.location = '../action.php';</script>";

		    	}else{
    				echo "<script>alert('Low fund'); window.location = '../action.php';</script>";
				}
		    }
	    
	}
 ?>
