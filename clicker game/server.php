<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('paja.esedu.fi', 'miklas.maczulskij', 'miklasQwerty123!', 'miklas.maczulskij');

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);



  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }


  $user_check_query = "SELECT * FROM user_items WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO user_items (username, email, password, clicks, kerroin, kahviplus, kahvi, timerPS, kahvi_2, kahvi_3, kahvi_4, ps ) 
  			  VALUES('$username', '$email', '$password', 0, 1, 5, 20, 100, 0, 0, 0, 0)";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	header('location: login.php');
  }
}


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
        $query = "SELECT * FROM user_items WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $row = mysqli_fetch_assoc($results);
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $row['id'];
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

