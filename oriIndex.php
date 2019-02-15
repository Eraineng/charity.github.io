<?php 
  // session_start(); 

  // if (!isset($_SESSION['username'])) {
  // 	$_SESSION['msg'] = "You must log in first";
  // 	header('location: login.php');
  // }
  // if (isset($_GET['logout'])) {
  // 	session_destroy();
  // 	unset($_SESSION['username']);
  // 	header("location: login.php");
  // }
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
  <a class="active" href="index.php">Home</a>
  <a href="news.php">News</a>
  <a href="contact.php">Contact</a>
  <a href="about.php">About</a>
  <?php
    if(!isset($_SESSION['username'])) {
      ?>
        <a  href="login.php">Login</a>
      <?php
    }
    else{
      ?>
      <a href="profile.php">Profile</a>
      <a href="index.php?logout='1'">Logout</a>
      <?php
    }
  ?>
</div>




<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>