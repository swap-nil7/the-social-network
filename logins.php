<?php
session_start();
$email=$_SESSION['email'];
echo $email ;
if(isset($_SESSION['email'])){
  echo "Hi! " . $_SESSION['email'] . " session";
}
else if(isset($_COOKIE['email'])){
  echo "Hi! " . $_COOKIE['email'] . " cookie";
}
?>

<?php
if(isset($_POST['post'])){
  $feed="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $feed= $_POST["feed"];
  }
  
  $servername="192.168.121.187";
  $users="first_year";
  $pass="first_year";
  $database="first_year_db";

  $conn = new mysqli($servername, $users, $pass, $database);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }

$sql = "INSERT INTO swap_feed (email, feed)
  VALUES ('$email', '$feed')";

if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
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
<textarea id="feed" class="input" name="feed" rows=5 cols=40>Update Status</textarea>
<input type="submit" value="post" name="post">

<a href="logout.php">Logout</a>
</body>
</html>
