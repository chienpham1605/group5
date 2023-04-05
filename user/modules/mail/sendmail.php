<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendmail()
{
    if (isset($_SESSION['cart']['buy']) && isset($_SESSION['cart']['infor'])&&isset($_POST['order-now'])) {


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'nguyenphuonghoa0709@gmail.com'; //SMTP username
            $mail->Password = 'hjhadsvnxiqrxmkt'; //SMTP password
            $mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_SMTPS         //Enable implicit TLS encryption
            $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('nguyenphuonghoa0709@gmail.com', 'OnBookStore');
            $mail->addAddress('hoasenxanh0709@gmail.com', 'Nguyen Phuong Hoa'); //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('nguyenphuonghoa0709@gmail.com', 'OnBookStore');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = '[Confirm]MAIL FROM ONBOOKSTORE';
            $mail->Body = 'This is YOUR ORDER <b>NO 133563066</b>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}