<?php
session_start();

if(isset($_SESSION['email'])){
  echo $_SESSION['email'] . "session";
}
else if(isset($_COOKIE['email'])){
  echo $_COOKIE['email'] . "cookie";
}
?>

<a href="logout.php">Logout</a>
