<?php

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

echo 'Testing send mail..... ';

/* require_once "Mail.php";

$from = "envia.mis.mails@gmail.com"; 
$to = "hector.trejo@gmail.com"; //CHANGE THIS TO YOUR GMAIL ADDRESS WELL
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = "envia.mis.mails@gmail.com"; //CHANGE THIS TO YOUR GMAIL ADDRESS WELL
$password = "X3HJO8QQD2"; //CHANGE THIS TO YOUR GMAIL PASSWORD

$headers = array ('From' => $from,
'To' => $to,
'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
'port' => $port,
'auth' => true,
'username' => $username,
'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else {
echo("<p>Message successfully sent!</p>");
}

*/

use PHPMailer/PHPMailer/PHPMailer;
use PHPMailer/PHPMailer/Exception;
require '/var/www/l3r/3Rios/vendorautoload.php';


  //require("/home/site/libs/PHPMailer-master/src/PHPMailer.php");
  //require("/home/site/libs/PHPMailer-master/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "xxxxxx";
    $mail->Password = "xxxx";
    $mail->SetFrom("xxxxxx@xxxxx.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("xxxxxx@xxxxx.com");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }





?>
