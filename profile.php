<?php 
  session_start(); 

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
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/headerstyle.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
        <a href="login.php">Login</a>
      <?php
    }
    else{
      ?>
      <a class="active" href="profile.php">Profile</a>
      <a href="profile.php?logout='1'">Logout</a>
      <?php
    }
  ?>
</div>
<br>
<div class="header">
  	<h2>My Profile</h2>
  </div>
<div  class="content">
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

<table class="table1">
<?php

// database connection settings
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con, "charity");

$result = mysqli_query($con,"SELECT * FROM users WHERE username = '" . $username ."'");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 
        "<tr><td> Username: </td><td>". $row["username"]. 
        "</td></tr><tr><td> Full Name: </td><td>". $row["fullname"].
        "</td></tr><tr><td> Email: </td><td>" . $row["email"] . 
        "</td></tr><tr><td> Student ID: </td><td>". $row["studentid"].
        "</td></tr><tr><td> Campus: </td><td>". $row["campus"].
        "</td></tr><tr><td> Faculty: </td><td>". $row["faculty"].
        "</td></tr><tr><td> Programme: </td><td>". $row["programme"].
        "</td></tr><tr><td> NRIC: </td><td>". $row["nric"].
        "</td></tr><tr><td> DOB: </td><td>". $row["dob"].
        "</td></tr><tr><td> Contact: </td><td>". $row["contact"].
        "</td></tr><tr><td> Address: </td><td>". $row["address"].
        "</td></tr>";
    }
} else {
    echo "0 results";
}

$con->close();

?> 


</table>
<br>

<button type="submit" class="btn" onclick="location.href='updateProfile.php'">Edit Profile</button>
<br><br>
<button type="submit" class="btn" onclick="location.href='changepw.php'">Change Passowrd</button>
</div>
</body>
</html>