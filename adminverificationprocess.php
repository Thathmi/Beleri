<?php
session_start();
require "connection.php";
require 'Exception.php'; 
require 'PHPMailer.php'; 
require 'SMTP.php'; 
use PHPMailer\PHPMailer\PHPMailer; 


if (isset($_GET["e"])) {
    $email = $_GET["e"];

    if (empty($email)) {
        echo "Please enter your email address..";
    }else{
        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."';");
        $an = $adminrs->num_rows;
        if ($an == 1) {
            
            $code = uniqid();

            Database::iud("UPDATE `admin` SET `verification`='".$code."' WHERE `email` = '".$email."';");
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
            $mail->Subject = 'Admin login verification code'; // subject
            $bodyContent = '<h1 style="color:red;">Your verification code is = ' . $code . '</h1>' ; //content
            $bodyContent .= '<p></p>';
            $mail->Body    = $bodyContent;

            $ad=$adminrs->fetch_assoc();
            $_SESSION["a"] = $ad;
        
        if(!$mail->send()) { 
            echo 'Verification code sending fail'; 
        } else { 
            echo 'success'; 
        } 
        }else{
            echo "Your are not a admin....";
        }
    }
}

?>