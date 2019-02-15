<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/headerstyle.css">
</head>
<body>

  <!-- Header Nav -->
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="news.php">News</a>
  <a href="contact.php">Contact</a>
  <a href="about.php">About</a>
  <?php
    if(!isset($_SESSION['username'])) {
      ?>
        <a class="active" href="login.php">Login</a>
      <?php
    }
    else{
      ?>
      <a href="profile.php">Profile</a>
      <a href="profile.php?logout='1'">Logout</a>
      <?php
    }
  ?>
</div>


  <div class="header">
    <h2>Login</h2>
  </div>
     
  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>