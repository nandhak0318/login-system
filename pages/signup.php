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
  <title>Signup</title>
</head>
<body>
  <section class="page">
    <div class="container">
      <div class="image">
        <img src="../assets/bg.png" alt="">
      </div>
      <div class="content">
      <div class="cover">
      <label for="name">Name</label>
      <input class="field" id="name" type="text">
      </div>
      <div class="cover">
      <label for="email">Email</label>
      <input class="field" id="email" type="text">
      </div>
      <div class="cover">
      <label for="pass">Password</label>
      <input class="field" id="pass" type="password">
      <img src="../assets/eye-svgrepo-com.svg" alt="eye" class="input-icon" id="pt">
      </div>
      <div class="cover">
      <label for="repass">Retype password</label>
      <input class="field" id="repass" type="password">
      </div>
      <p id="error1" class="error hide">Account already exist</p>
      <p id="error2" class="error hide">Password doesn't match</p>
      <p id="error3" class="error hide">enter valid email address</p>
      <p id="error4" class="error hide">Please fill all fields</p>
      <p id="error5" class="error hide">something went wrong</p>
      <button id="submit">REGISTER</button>
      <a href="./login.php" class="sc-btn">LOGIN</a>
    </div>
    </div>
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../js/signup.js"></script>
</body>
</html>

<?php
} ?>
