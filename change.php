<?php
session_start();
include 'convert.php';
$servername="192.168.121.187";
  $users="first_year";
  $pass="first_year";
  $database="first_year_db";

  $conn = new mysqli($servername, $users, $pass, $database);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }

if(isset($_SESSION['email'])){
  echo "Hi! " . $_SESSION['email'] . " session";
  $email=$_SESSION['email'];

}
else if(isset($_COOKIE['email'])){
  echo "Hi! " . convert($_COOKIE['email']) . " cookie";
  $email=convert($_COOKIE['email']);
}



if(isset($_POST['submit'])){
  $password=$pass=$valpass="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $password=md5($_POST["pass"]);
    $pass=md5($_POST["newpass"]);
    $valpass=md5($_POST["valpass"]);
   
    $sql="select *  from swap_profiles where email='$email'";
   $result=mysqli_query($conn, $sql);
   if(mysqli_num_rows($result) > 0){
     while($row=mysqli_fetch_assoc($result)){
        $oldpass=$row["password"];
     }
  }
   if($oldpass==$password){
     if($pass=$valpass){
       mysqli_query($conn, "update swap_profiles set password='$pass' where email='$email'");
         echo "Password changed";
     }
     else{
       echo "confirm password does not match";
     }
   } 
   else{
     echo "invalid old password";
   }

}
}
?>



<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Change Password</h2>
<form method="post" action="change.php">
<li><input type="password" name="pass" class="input" id="pass" placeholder="enter old password"></li>
<li><input type="password" name="newpass" class="input" id="newpass" placeholder="enter new password"></li>
<li><input type="password" name="valpass" class="input" id="valpass" placeholder="confirm new password"></li>
<input type="submit" name="submit" value="change password">
<a href="profile.php">Back to profile</a>
</form>
</body>
</html>
