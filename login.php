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

</form>

</div>

<?php

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

  $email=$pass="";
  if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];

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
        setcookie("email", $email, time()+(86400*100)      );
      }
  else{
        session_start();
        $_SESSION['email']=$email;
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

