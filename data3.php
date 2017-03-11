<?php
function data($email, $random){
  $servername="192.168.121.187";
  $users="first_year";
  $pass="first_year";
  $database="first_year_db";

  $conn = new mysqli($servername, $users, $pass, $database);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
$sql="insert into swap_hash(email, hash) values ('$email', '$random')";
if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
}
else {
      echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
