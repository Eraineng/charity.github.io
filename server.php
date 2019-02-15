<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'charity');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}


// UPDATE USER
if (isset($_POST['upd_user'])) {
  // receive all input values from the form
  // $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $studentid = mysqli_real_escape_string($db, $_POST['studentid']);
  $campus = mysqli_real_escape_string($db, $_POST['campus']);
  $faculty = mysqli_real_escape_string($db, $_POST['faculty']);
  $programme = mysqli_real_escape_string($db, $_POST['programme']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $nric = mysqli_real_escape_string($db, $_POST['nric']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  // if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($studentid)) { array_push($errors, "Studentid is required"); }
  // if (empty($campus)) { array_push($errors, "Campus is required"); }
  // if (empty($faculty)) { array_push($errors, "Faculty is required"); }
  // if (empty($programme)) { array_push($errors, "Programme is required"); }
  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if (empty($nric)) { array_push($errors, "NRIC is required"); }
  // if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
  // if (empty($contact)) { array_push($errors, "Contact is required"); }
  // if (empty($address)) { array_push($errors, "Address is required"); }
 

  // Finally, update user if there are no errors in the form
  // if (count($errors) == 0) {
  //   $password = md5($password_1);//encrypt the password before saving in the database
  if(!empty($email)){
    $username = $_SESSION['username'];
    $query = "UPDATE users SET 
    email = '$email' , 
    studentid = '$studentid' , 
    campus = '$campus' , 
    faculty = '$faculty' ,
    programme = '$programme' ,
    fullname = '$fullname' ,
    nric = '$nric' ,
    dob = '$dob' ,
    contact = '$contact' ,
    address = '$address'
    WHERE username = '$username'";
    mysqli_query($db, $query);

      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Profile Updated";
      header('location: profile.php'); 
   }    

  // }
}

// ... 


// CHANGE USER PASSWORD
if (isset($_POST['chg_pw'])) {
  $username = $_SESSION['username'];
  $currentpw = mysqli_real_escape_string($db, $_POST['currentpw']);
  $newpw = mysqli_real_escape_string($db, $_POST['newpw']);
  $confirmpw = mysqli_real_escape_string($db, $_POST['confirmpw']);

  if (empty($currentpw)) {
    array_push($errors, "Current Password is required");
  }
  if (empty($newpw)) {
    array_push($errors, "New Password is required");
  }
  if (empty($confirmpw)) {
    array_push($errors, "Confirmed New Password is required");
  }

  if (count($errors) == 0) {
    $currentpw = md5($currentpw);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$currentpw'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      if($newpw == $confirmpw){
        $newsavepw = md5($newpw);
        $query = "UPDATE users SET password = '$newsavepw' WHERE username = '$username'";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Password Changed";
        header('location: profile.php');
      }
      else{
        array_push($errors, "Password not match");
      }
    }
    else {
      array_push($errors, "Incorrect Password");
    }
  }
}


?>