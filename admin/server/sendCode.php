<?php 
include ('conn.php');
session_start();
require_once "../phpmailer/class.phpmailer.php";
$transID = $_GET['id'];
$sql = mysqli_query($mysqli, " SELECT * FROM transactions WHERE transID = $transID");
$row =  mysqli_fetch_assoc($sql);
$fromAcc = $row['fromAcc'];
$UserAccount = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $fromAcc");
$user = mysqli_fetch_assoc($UserAccount);
$code = Date("His");
$email = $user['email'];
$name = explode(" ", $user['name']); 
$lname = $name[1];

$sql2 = mysqli_query($mysqli, "UPDATE transactions SET transCode = $code WHERE transID = $transID");
if($sql2){
        $message ='<html><head>
        <title>Transaction Code Detai</title>
        </head>
        <body>';
        $message .= '<table><tr><td><h3>Hi '.$lname.',</h3> <span style="text-align: justify; font-size: 16px;"> Trust this mail meet you well, find the code below to complete your transaction<br>
        User ID: <b>'.$code.'</b><br>
        </span></td></tr><tr><td>Thank you for choosing <b>Creed Bank</b></td></tr></table>';
        $message .= "</body></html>";
        // php mailer code starts
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = "server181.web-hosting.com";      // sets GMAIL as the SMTP server
        $mail->Port = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username = 'admin@creditalliance.cc';
        $mail->Password = 'error404';
        $mail->SetFrom('admin@creditalliance.cc', 'Credit Alliance');
        $mail->AddAddress($email);
        $mail->Subject = trim("Verification Code");
        $mail->MsgHTML($message);
        $mail->send();
        $_SESSION['msg'] = "success";
        echo "success";
       // header("Location:../dashboard.php");
      }
?>