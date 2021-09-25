<?php
session_start();
if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
    header('location: ../index.php');
    exit();
} else {
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../scss/style.css">
  <title>Login</title>
</head>
<body>
  <section class="page">
  <div class="container">
  <div class="image">
    <img src="../assets/bg.png" alt="">
  </div>
  <div class="content login-content">
    <div class="cover">
  <label for="email">Email</label>
  <input class="field" type="text" id="email">
  </div>
  <div class="cover">
  <label for="pass">Password</label>
  <input class="field" type="password" id="pass">
  <img src="../assets/eye-svgrepo-com.svg" alt="eye" class="input-icon" id="pt">
  </div>
  <p id="error1" class="error hide">Account doesn't exist</p>
  <p id="error2" class="error hide">Incorrect password</p>
  <p id="error3" class="error hide">enter valid email address</p>
  <p id="error4" class="error hide">Please fill all fields</p>
  <p id="error5" class="error hide">something went wrong</p>
  <button id="submit">LOGIN</button>
  <a href="./signup.php" class="sc-btn">SIGNUP</a>
</div>
  </div>
</section>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/login.js"></script>
</body>
</html>


<?php
} ?>
