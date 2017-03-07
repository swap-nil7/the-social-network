<?php
function data($name, $username, $email, $mobile, $password){
  $servername="192.168.121.187";
  $username="first_year";
  $pass="first_year";
  $database="first_year_db";

  $conn = new mysqli($servername, $username, $pass, $database);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }

$sql = "INSERT INTO swap_profiles (name, email, mobile, password, username)
  VALUES ('$name', '$email', '$mobile', '$password', '$username')";

if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
}
else {
      echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
