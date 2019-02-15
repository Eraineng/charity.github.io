<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/headerstyle.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
// Inialize session
 
 if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

$username = $_SESSION['username'];

?>


 <!-- Header Nav -->
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="news.php">News</a>
  <a href="contact.php">Contact</a>
  <a href="about.php">About</a>
  <?php
    if(!isset($_SESSION['username'])) {
      ?>
        <a href="login.php">Login</a>
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
<br>
<div class="header">
    <h2>Edit Profile</h2>
  </div>

<form method="post" action="changepw.php">
<?php include('errors.php'); ?>
    
    <div class="input-group">
      
      <label>Current Password</label>
      <input id="currentpw" type="password" name="currentpw" required >
    </div>
    <div class="input-group">
      <label>New Password</label>
      <input  id="newpw" type="password" name="newpw" required >
    </div>
    <div class="input-group">
      <label>Confirm Password</label>
      <input  id="confirmpw" type="password" name="confirmpw" required >
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="chg_pw">Save Changes</button>
    </div>
  </form>`


  
<br>


</body>
</html>