<?php
include 'includes/init.php';

if(isset($_POST['signup'])) {
    $username = $_POST['username'];
    $phone    = $_POST['phone'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $usernameAlreadyTaken = $mm_admin_class->isPresentUsername($email);

    if($usernameAlreadyTaken) {

        redirectSelf('sign-up-illustration.php', 'useralreadytaken');

    } else if (!$usernameAlreadyTaken) {
        //------ verify email ------//
        /*session_start();
        $to      = $email;
        $subject = "Your Registration Verification Code to Argi-Business";
        $code    = "OTP: " . $mm_admin_class->randomNumber();
        $header  = "From:mailtohtetphyonaing@gmail.com \r\n" . "Argi-Bussiness" . "Content-type: text/html \r\n";

        $message = array($subject, $code, $header);

        $isSentMail = mail($to, $subject, $code, $header);
        //$isSentMail = $mm_admin_class->sendMail($to, $message);

        if(!$isSentMail) {
            redirectSelf('sign-up-illustration.php', 'somekindoferrorreinsendingmail');
        } else {

            $_SESSION['name']  = $username;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['otp']   = $code;
            redirect('verifyaccount.php');
        }*/

        /*$values = array($username, $phone, $email, $password);
        $insertSuccessful = $mm_admin_class->isInsertSuccessful($values);*/
        $insertSuccessful = $mm_admin_class->isInsertSuccessful($username, $phone, $email, $password);

        if(!$insertSuccessful) {
            redirectSelf('sign-up-illustration.php', 'signuperror');
        } else if($insertSuccessful) {
            redirect('sign-in.php');
        } else {
            redirectSelf('sign-up-illustration.php', 'somekindoferrorrr');
        }
    } else {

        redirectSelf('sign-up-illustration.php', 'error');

    }
} else {
    redirectSelf('sign-up-illustration.php', 'error');
}
