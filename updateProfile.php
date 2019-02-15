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

<form method="post" action="updateProfile.php">

<?php

// database connection settings
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con, "charity");

$result = mysqli_query($con,"SELECT * FROM users WHERE username = '" . $username ."'");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $username = $row["username"];
        $email = $row["email"];
        $studentid = $row["studentid"];
        $campus = $row["campus"];
        $faculty = $row["faculty"];
        $programme = $row["programme"];
        $fullname = $row["fullname"];
        $nric = $row["nric"];
        $dob = $row["dob"];
        $contact = $row["contact"];
        $address = $row["address"];

    }
} else {
    echo "0 results";
}

$con->close();

?> 
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username <!-- <img id="editusernamebtn" onclick="editusername()" src="img/pencil.png" width="15px"> --></label>
      <input id="usernameinput" type="text" name="username" value="<?php echo $username; ?>" disabled>
    </div>
    <div class="input-group">
      <label>Full Name </label>
      <input type="text" name="fullname" value="<?php echo $fullname; ?>" >
    </div>
    <div class="input-group">
      <label>NRIC </label>
      <input type="text" name="nric" value="<?php echo $nric; ?>" >
    </div>
    <div class="input-group">
      <label>DOB </label>
      <input type="text" name="dob" value="<?php echo $dob; ?>" >
    </div>
    <div class="input-group">
      <label>Contact </label>
      <input type="text" name="contact" value="<?php echo $contact; ?>" >
    </div>
    <div class="input-group">
      <label>Email <!-- <img id="editemailbtn" onclick="editemail()" src="img/pencil.png" width="15px"> --></label>
      <input  id="useremailinput" type="email" name="email" value="<?php echo $email; ?>" >
    </div>
    <div class="input-group">
      <label>Address </label>
      <input type="text" name="address" value="<?php echo $address; ?>" >
    </div>
    
    <div class="input-group">
      <label>Student ID <!-- <img id="editstudentidbtn" onclick="editstudentid()" src="img/pencil.png" width="15px"> --></label>
      <input  type="text" name="studentid" value="<?php echo $studentid; ?>" >
    </div>
    <div class="input-group">
      <label>Campus </label>
      <input type="text" name="campus" value="<?php echo $campus; ?>" >
    </div>
    <div class="input-group">
      <label>Faculty </label>
      <input type="text" name="faculty" value="<?php echo $faculty; ?>" >
    </div>
    <div class="input-group">
      <label>Programme </label>
      <input type="text" name="programme" value="<?php echo $programme; ?>" >
    </div>



    <div class="input-group">
      <button type="submit" class="btn" name="upd_user">Save Changes</button>
    </div>
  </form>


  <script>
// function editusername() {
//   document.getElementById("usernameinput").disabled = false;
//   document.getElementById("editusernamebtn").disabled = true;
// }

// function editemail() {
//   document.getElementById("useremailinput").disabled = false;
//   document.getElementById("editemailbtn").disabled = true;
// }
</script>
<br>


</body>
</html>