<?php
include_once("./PHPMailer-master/mail.php");
$mail = new mailConnection();

if (isset($_POST['email']) && isset($_POST['subject'])&&(isset($_POST['message']))) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    echo "ok";
   $mail->sendMessage($email, $subject, $message);
}
else{
echo "wrong";
}
