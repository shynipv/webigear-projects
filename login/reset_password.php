<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) {

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);


        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);

        $sql = "UPDATE users SET password='$new_password' WHERE email='$email' AND"
                . "hash='$hash'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Your password has been reset successfully!";
        header("location: success.php");

        }

    }
    else {
        $_SESSION['message'] = "Two passwords you entered don't match, try again!";
        header("location: error.php");
    }

}
?>
