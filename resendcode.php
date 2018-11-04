<?php
include 'includes/init.php';

session_start();

if(isset($_POST['resend'])) {

    $informto = "Successfully send Confirmation code to your mail.";

    $randomnumber = $_SESSION['otp'];
    $to = $_SESSION['email'];
    $subject = "Resending Confirmation Code";
    $body = "OTP: " . $randomnumber;
    $headers = "From: mailtohtetphyonaing@gmail.com";
    $message = array($subject, $body, $headers);
    mail($to, $message);

    $informto = "Successfullly resend Confirmation code to your mail.";
}
