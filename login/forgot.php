<?php
require 'config.php';
session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 )
    {
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else {

        $user = $result->fetch_assoc();

        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        $_SESSION['message'] = "<p>Please check your email<span> $email</span>". " for a confirmation link to complete your password reset!</p>";

        $to      = $email;
        $subject = 'Password Reset Link ( clevertechie.com )';
        $message_body = '
        Hello '.$first_name.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost:8888/login/reset.php?email='.$email.'&hash='.$hash;

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reset your password</title>
  <?php include 'style.css/css.html';?>
</head>
<body>
  <h1>Sign Up for Free</h1>
  <div class="field-wrap">
    <label>Email Adress<span class="req"></span>
  </label>
  <input type="email" required autocomplete="off" name="email"/>
  <button type="submit" class="button button-block" name="reset"/>Reset</button>
</div>
</body>
</html>
