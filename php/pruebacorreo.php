<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailerAutoload;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/PHPMailerAutoload.php';


$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'mail.iide-edu.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 

//$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'pruebas@iide-edu.com';
//Password to use for SMTP authentication
$mail->Password = 'iide2020';
//Set who the message is to be sent from
$mail->setFrom('ing.blancoross@gmail.com', 'Magic Mailer');
//Set an alternative reply-to address
$mail->addReplyTo('chuchob_ross@ghotmail.com', 'Magic');
//Set who the message is to be sent to
$mail->addAddress('chuchob_ross@ghotmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
$mail->Body = "Esta es una prueba de correo"; // Mensaje a enviar
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
$mail->SMTPDebug = 0;
if (!$mail->send()) {
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'Message sent!';
}
    ?>