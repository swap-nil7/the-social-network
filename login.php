<!DOCTYPE html>

<html>

<head>

<title>Login</title>

<link rel="stylesheet" type="text/css" href="style.css">

<script type="text/javascript" src="sign.js"></script>

</head>

<body>

<div class="main">

<h1>Login</h1>

<form method="post" action="login.php">

<ul>

<div class="div1">

<li><input type="email" id="email" name="email" class="input" placeholder="Enter email" onchange="emailval()" required></li>

<li><input type="password" id="pass" name="password" class="input" placeholder="Enter password" required>



</div>

<li>

<input type="checkbox" name="check" id="term" value="re">

<label for="term">Remember me</label>

</li>

</ul>

<input type="reset" name="reset" value="Reset!" class="button">

<input type="submit" name="submit" value="Login" class="button"> 

<h5>If you're not into this social network <a href="sign.php">Sign Up </a></h5>

</form>

</div>

<?php

include 'data3.php';
if(isset($_COOKIE['email'])){
  header("Location: logins.php");
}
else{
  $host="192.168.121.187";
  $username="first_year";
  $password="first_year";
  $db_name="first_year_db";
  $table="swap_profiles";

  $conn=new mysqli($host, $username, $password, $db_name);
  if ($conn->connect_error){
    die("Connection failed: " . $conn -> connect_error);
  }
  function test($data){
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }

  function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  $email=$pass="";
  if(isset($_POST['submit'])){
    $email=test($_POST['email']);
    $pass=(md5($_POST['password']));

    if(isset($_POST['check'])){
      $check=$_POST['check'];
    }
    else{
      $check="";
    }

    $sql="SELECT * FROM $table WHERE email='$email' and password='$pass'";
    $result=mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    if ($count==1) {
      if($check=="re"){
        $random= generateRandomString(40);
        setcookie("email", $random, time()+(86400*100) );
        data($email, $random);
      }
      else{
        session_start();
        $_SESSION['email']=$email;
        echo "Sessoin set";
      }
      echo "user logged in";
      header("Location: logins.php");
    }

    else {
      echo "Invalid username or password";
    }
  }
}
?>

</body>

</html>

