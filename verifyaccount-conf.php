<?php
include 'includes/init.php';

session_start();

if(isset($_POST['verifyAccount'])) {
    $randomnumber  = $_SESSION['otp'];
    $enterednumber = $_POST['code'];

    if(strcmp($randomnumber, $enterednumber)) {
        $name  = $_SESSION['name'];
        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];

        $to      = $email; //user email
        $subject = "Thank you for signing up!";
        $body    = "You have registered to Argi-business company !!!";
        $headers = "From: mailtohtetphyonaing@gmail.com";
        $message  = array($subject, $body, $headers);
        mail($to, $message);
    } else {
        redirectSelf('verifyaccount.php', 'incorrectcode');
    }
}
