<?php 
include ('conn.php');
session_start();
$accountno = mysqli_escape_string($mysqli, $_POST['AccountNumber']);
$name = mysqli_escape_string($mysqli, $_POST['name']);
$email = mysqli_escape_string($mysqli, $_POST['email']);
$phoneno = mysqli_escape_string($mysqli, $_POST['phoneno']);
$address = mysqli_escape_string($mysqli, $_POST['address']);
$nokname = mysqli_escape_string($mysqli, $_POST['nokname']);
$nokemail = mysqli_escape_string($mysqli, $_POST['nokemail']);
$nokphoneno = mysqli_escape_string($mysqli, $_POST['nokphoneno']);
$balance = mysqli_escape_string($mysqli, $_POST['balance']);
$status = mysqli_escape_string($mysqli, $_POST['status']);
$password = Date('His');
$pass = md5($password);
$lname = explode(' ', $name);
$date = mysqli_escape_string($mysqli, $_POST['date']);

$sql = mysqli_query($mysqli , "SELECT * FROM `customers` WHERE email = '$email'");
$row = mysqli_num_rows($sql);
if($row > 0){
    $_SESSION['msg'] = "User exists already";
    header("Location:../dashboard.php");
}else{
    
      $sql = mysqli_query($mysqli, "INSERT INTO `customers` (`id`, `accountno`, `balance`, `name`, `email`, `phoneno`, `address`, `kinname`, `kinemail`, `kinphoneno`, `password`, `status`,`lastlogin`) VALUES (NULL, '$accountno', '$balance', '$name', '$email', '$phoneno', '$address', '$nokname', '$nokemail', '$nokphoneno', '$pass', '$status','$date')") or die(mysqli_error($mysqli));
      if ($sql) {
          $sql2 = mysqli_query($mysqli, "INSERT INTO `transactions` (`id`, `transID`, `fromAcc`, `toAcc`, `amount`, `transCode`, `type`, `status`, `date`, `iban`, `country`) VALUES (NULL, '$password', '$accountno', '$accountno', '$balance', '', 'Opening Balance', '0', '$date','','')") or die(mysqli_error($mysqli));
          if($sql2){
        $message ='<html><head>
        <title>Internet Banking Details</title>
        </head>
        <body>';
        $message .= '<table><tr><td><h3>Hi '.$lname[1].',</h3> <span style="text-align: justify; font-size: 16px;"> Trust this mail meet you well, below are your Creed Bank Internet Banking Details<br>
        User ID: <b>'.$accountno.'</b><br>
        Password: <b>'.$password.'</b><br>
        </span></td></tr><tr><td>Thank you for choosing <b>Creed Bank</b></td></tr></table>';
        $message .= "</body></html>";

        // require_once "../phpmailer/class.phpmailer.php";
        require_once '../phpmailer/PHPMailerAutoload.php';

        try {
            
                    // php mailer code starts
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'kowalskijamie624@gmail.com';
        $mail->Password = 'abcd1234##';

        $mail->SetFrom('admin@creditalliance.cf', 'Credit Alliance');
        $mail->AddAddress($email);
        $mail->Subject = trim("Internet Banking Details");
        $mail->MsgHTML($message);
        $mail->send();
        $_SESSION['msg'] = "success";
        // echo "<script>alert('User Created'); window.location = '../dashboard.php';</script>";
        header("Location:../dashboard.php");

        } catch (Exception $e) {
            echo "Mailer Error: ", $mail->ErrorInfo;
        }
}
}
}
?>
