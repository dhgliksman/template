<?php

require_once ('PHPMailerAutoload.php');
require_once ('SMTP.php');

class mailConnection {

    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer();



//$body             = file_get_contents('contents.html');
//$body             = eregi_replace("[\]",'',$body);

        $this->mail->IsSMTP(); // telling the class to use SMTP
        $this->mail->isHTML(TRUE);
        $this->mail->Host = "kobi6255@gmail.com"; // SMTP server
        $this->mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $this->mail->SMTPAuth = true;                  // enable SMTP authentication
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Host = "smtp.gmail.com"; // sets the SMTP server
        $this->mail->Port = 587;                    // set the SMTP port for the GMAIL server
        $this->mail->Username = "kobi6255@gmail.com"; // SMTP account username
        $this->mail->Password = "kobi2300";        // SMTP account password

        $this->mail->SetFrom('kobi6255@gmail.com', 'קובי דהן');

        $this->mail->CharSet = 'UTF-8';

        $this->mail->SMTPKeepAlive = true;
        $this->mail->AltBody = ""; // optional, comment out and test
    }

    public function sendMessage($email, $subject, $message) {

        $this->mail->Subject = $subject;
        $this->mail->Body .="Message recieved from: " .$email . "<br>"
                . "The message is: " .$message;

        $this->mail->AddAddress("kobi6255@gmail.com");
        if (!$this->mail->Send()) {
            echo "Mailer Error: " . die($this->mail->ErrorInfo);
        }
        $this->mail->ClearAddresses();
    }

}
