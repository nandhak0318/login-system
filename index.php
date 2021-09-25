<?php
session_start();
if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) { ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./scss/style.css">
  <title>Profile</title>
</head>
<body>
  <section class="index-page">
  <div class="icover">
  <h1>welcome</h1>
  <div class="detials">
  <p id="name">Name:</p>
  <p id="age">Age:</p>
  <p id="gender">Gender:</p>
  <p id="dob">Dob:</p>
  <p id="contact">Contact:</p>
  <p id="city">City:</p>
  </div>
  <button class="sc-btn" id="edit">EDIT</button>
  <a href="./php/logout.php" class="pr-btn">logout</a>
  
  <div class="index-content hide" >
      <div class="cover">
      <label for="name">Name</label>
      <input class="field" id="uname" type="text">
      </div>
      <div class="cover">
      <label for="age">Age</label>
      <input class="field" id="uage" type="text">
      </div>
      <div class="cover">
      <label for="gender">Gender</label>
      <select class="field" name="cars" id="ugender">
      <option value=""></option>
      <option value="male">male</option>
      <option value="female">female</option>
      <option value="non-binary">non-binary</option>
      </select>
      </div>
      <div class="cover">
      <label for="dob">Dob</label>
      <input class="field" id="udob" type="date" value="2018-07-22">
      </div>
      
      <div class="cover">
      <label for="contact">Contact</label>
      <input class="field" id="ucontact" type="text">
      </div>
      <div class="cover">
      <label for="city">City</label>
      <input class="field" id="ucity" type="text">
      </div>
      <button id="update" class="sc-btn">UPDATE</button>
      <img src="./assets/close-svgrepo-com.svg" alt="close" class="close" id="close">
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./js/main.js"></script>
</body>
</html>
<?php } else {header('location: ./pages/login.php');
    exit();}
?>

