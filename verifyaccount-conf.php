<?php
include 'includes/init.php';

session_start();

if(isset($_POST['verifyAccount'])) {
    $otp  = $_SESSION['otp'];
    $enterednumber = $_POST['code'];

    if (isset($_SESSION['otp']) && (time() - $_SESSION['last_activity'] > 30)) {

        unset($_SESSION['otp']);
        redirectSelf('verifyaccount.php', 'oneminutetimeout');
    }

    if((int)$otp == (int)$enterednumber) {
        $name  = $_SESSION['name'];
        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $to      = "bloodseeker@mmhighschool.ml"; //sender's
        $from    = $email; //receiver's
        $subject = "Thank you for signing up!";
        $message = "Welcome to Argi-business";
        $headers = "From: " . $to;

        mail($from, $subject, $message, $headers);

        //ok down
        $insertSuccessful = $mm_admin_class->isInsertSuccessful($name, $phone, $email, $password);

        session_destroy();

        if(!$insertSuccessful) {
            redirectSelf('sign-up-illustration.php', 'signuperror');
        } else if($insertSuccessful) {
            redirect('sign-in.php');
        } else {
            redirectSelf('sign-up-illustration.php', 'somekindoferrorrr');
        }
    } else {
        redirectSelf('verifyaccount.php', 'incorrectcode');
    }
} else if(isset($_POST['resend'])) {
    $email = $_SESSION['email'];

    //$isSentMail = $mm_admin_class->isMailSentSuccessful($email);

    $to      = "bloodseeker@mmhighschool.ml"; //sender's
    $from    = $email; //receiver's
    $subject = "Your Registration Verification Code to Argi-Business";
    $code    = $mm_admin_class->randomNumber();
    $message = "OTP: " . $code;
    $headers = "From: " . $to;

    $isSentMail = mail($from, $subject, $message, $headers);

    if($isSentMail) {
        redirectSelf('verifyaccount.php', 'codesentsuccessfully');
    } else {
        redirectSelf('sign-up-illustration.php', 'mailsendingerror');
    }

} else {
    //do something
    redirect('sign-up-illustration.php', 'unknownerror');
}
