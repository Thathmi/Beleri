<?php 

use PHPMailer\PHPMailer\PHPMailer;

require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

require "connection.php";

if (isset($_GET["e"])) {
    $email = $_GET["e"];

    if (empty($email)) {
        echo "Please enter your email address.";
    } else {
        $rs = Database::search("SELECT * FROM `seller` WHERE `email`='" . $email . "' ");

        if ($rs->num_rows == 1) {

            $code = uniqid();

            Database::iud("UPDATE `seller` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "' ");

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'my.javatesting.tt@gmail.com'; //type my mail
            $mail->Password = 'CATSnebula21?'; //type my password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('my.javatesting.tt@gmail.com', 'Beleri'); //my email & name
            $mail->addReplyTo('my.javatesting.tt@gmail.com', 'Beleri'); //my mail & name
            $mail->addAddress($email); //address of reciever
            $mail->isHTML(true);
            $mail->Subject = 'Beleri forgot password verification code'; // subject
            $bodyContent = '<h1 style="color:red;">Your verification code is = ' . $code . '</h1>' ; //content
            // $bodyContent .= '<p>pis</p>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' ;
            } else {
                echo 'success';
            }

        } else {
            echo " email address not found!";
        }
    }
} else {
    echo "Please enter your email address.";
}
