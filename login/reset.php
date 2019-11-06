<?php
require 'config.php';
session_start();

if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);

      $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    {
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Reset Your Password</title>
<?php include 'style.css/css.html';?>
</head>
<body>
  <div class="form">
    <h1>Choose Your New Password</h1>
    <form action="reset_password.php"<method="post">
      <div class="field-wrap">
        <label>New Password<span class="req"></span></label>
        <input type="password"required name="new password"autocomplete="off"/>
      </div>
      <div class="field-wrap">
        <label>Confirm New Password<span class="req"></span>
          <input type="password"required name="confirmpassword" autocomplete="off"/>
        </div>
</body>
</html>
