<?php
require  'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>SIGN_UP/LOGIN FORM</title>
  <link rel="stylesheet" href="styles.css">
<!--<?php include 'style.css/css.html';?>-->
</head>
<?php
if($_server['REQUEST_METHOD']=='POST')
{
  if(isset($_POST['login']))
  {
   require 'login.php';
  }
  elseif(isset($_POST['register']))
  {
   require 'register.php';
  }
}
?>
<body>
  <div class="form">
    <ul class="tab-group">
      <li class="tab"><a href="#signup">Sign up</a></li>
      <li class="tab active "><a href="#login">Log In</a></li>
    </ul>

<div id="signup">
  <h1>Sign Up for Free</h1>
  <form action="index.php" method="post" autocomplete="off">
  <div class="field-wrap">
    <label>First Name<span class="req"></span>
  </label><br>
  <input type="firstname" required autocomplete="off" name="firstname"/>
  </div>

  <div class="field-wrap">
    <label>Last Name<span class="req"></span>
  </label><br>
  <input type="lastname" required autocomplete="off" name="lastname"/>
  </div>

  <div class="field-wrap">
    <label>Email Adress<span class="req"></span>
  </label><br>
  <input type="email" required autocomplete="off" name="email"/>
</div>

<div class="field-wrap">
  <label>
    Set a Password<span class="req"></span>
  </label><br>
  <input type="password" required autocomplete="off" name="password"/>
</div><br>

<button type="submit" class="button button-block" name="register"/>Register</button>
</form>
</div>
<script src=''></script>
<script src="js/index.js"></script>
</body>
</html>
