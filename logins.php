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
  $email=($_SESSION['email']);
}
else if(isset($_COOKIE['email'])){
  echo "Hi! " . convert($_COOKIE['email']) . " cookie";
  $email=convert($_COOKIE['email']);
}

$sql = "SELECT * from swap_feed";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
         echo "By " . $row["email"]. " time  " . $row["time"]. " : " . $row["feed"]. "<br>";
 }
}

if(isset($_POST['post'])){
  $feed="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $feed= $_POST["feed"]; 
    $times= date("y-m-d h:i:sa"); 
  } 

  $sql = "INSERT INTO swap_feed (email, feed, time)
  VALUES ('$email', '$feed', '$times')";
   echo "By " . $email . " time  " . $times . " : " . $feed . "<br>";
if ($conn->query($sql) === TRUE) {
}
else {
      echo "Error: " . $sql . "<br>" . $conn->error;
}
}
 
?>



<html>
<head>
<link rel="stylesheet" src="style.css">
<title>Common Feed</title>
<body>
<h1>Common Feed</h1>
<form method="post" action="logins.php">
<textarea id="feed" class="input" name="feed" rows=5 cols=40>Update Status</textarea><br>
<input type="submit" value="post" name="post"><br><br>

<a href="logout.php">Logout</a><br><br>
<a href="profile.php">Profile</a>
</body>
</html>
