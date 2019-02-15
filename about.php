<?php 
  session_start(); 

  // if (!isset($_SESSION['username'])) {
  // 	$_SESSION['msg'] = "You must log in first";
  // 	header('location: login.php');
  // }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">   <!-- session -->
  <link rel="stylesheet" type="text/css" href="css/headerstyle.css">   <!-- header -->
</head>
<body>

<!-- Header Nav -->
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="news.php">News</a>
  <a href="contact.php">Contact</a>
  <a class="active" href="about.php">About</a>
  <?php
    if(!isset($_SESSION['username'])) {
      ?>
        <a  href="login.php">Login</a>
      <?php
    }
    else{
      ?>
      <a href="profile.php">Profile</a>
      <a href="about.php?logout='1'">Logout</a>
      <?php
    }
  ?>
</div>




<div class="header">
	<h2>About Us Page</h2>
</div>
<div class="content">
  	This is where you can learn About Us
</div>
		
</body>
</html>