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

        $to      = "bloodseeker@mmhighschool.ml"; //sender's
        $from    = $email; //receiver's
        $subject = "Your Registration Verification Code to Argi-Business";
        $code    = $mm_admin_class->randomNumber();
        $message = "OTP: " . $code;
        $headers = "From: " . $to;

        $isSentMail = mail($from, $subject, $message, $headers);

        //$isSentMail = $mm_admin_class->isMailSentSuccessful($email);

        if($isSentMail) { //<-----CHANGE BACK to TRUE (NOT for testing in localhost)
            session_start();
            $_SESSION['name']  = $username;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['last_activity'] = time();
            $_SESSION['otp']   = $code; //$_SESSION['otp'] = $code;

            redirect('verifyaccount.php');
        } else {
            redirectSelf('sign-up-illustration.php', 'somekindoferrorreinsendingmail');
        }

        /*$values = array($username, $phone, $email, $password);
        $insertSuccessful = $mm_admin_class->isInsertSuccessful($values);*/
    } else {

        redirectSelf('sign-up-illustration.php', 'error');

    }
} else {
    redirectSelf('sign-up-illustration.php', 'error');
}
