<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMail($emailTo, $subject, $body,$altBody,$otp) {
        $mail = new PHPMailer(true);
        $emailTo = $_POST['email'];
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'crislamm10@gmail.com';
        $mail->Password = 'licw hrit owas fbeo';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('crislamm10@gmail.com', 'ROYAL Shop');
        $mail->addAddress("$emailTo"); // Name is optional
        $mail->addReplyTo('crislamm10@gmail.com', 'Information');

        $mail->isHTML(true);   // Set email format to HTML
        $mail->Subject = "$subject";
        $mail->Body = "$body";
        $mail->AltBody = "$altBody";
        return $mail->send();
}