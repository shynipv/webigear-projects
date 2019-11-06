<?php
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 )
{
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else
{
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) )
    {
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>SIGN_UP/LOGIN FORM</title>
<?php include 'style.css/css.html';?>
</head>
<body>
</div>
  <div class="tab-content">
    <div id="login">
      <h1>Welcome Back!</h1>
      <form action="index.php" method="post" autocomplete="off">

        <div class="field-wrap">
        <label>
            Email Adress<span class="req"></span>
          </label><br>
          <input type="email" required autocomplete="off" name="email"/><br>
          <br>
        </div>

        <div class="field-wrap">
          <label>
            Password<span class="req"></span>
          </label><br>
          <input type="password" required autocomplete="off" name="password"/>
        </div>

        <p class="forget"><a href="forgot.php">Forgot Password?</a></p>
        <button class="buton button-block" name="login"/>LOG IN</button>
    </form>
  </div>
</div>
</body>
</html>
