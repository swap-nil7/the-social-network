<?php
function data($name, $username, $mobile, $age, $branch, $interests, $email){
  $servername="192.168.121.187";
  $users="first_year";
  $pass="first_year";
  $database="first_year_db";

  $conn = new mysqli($servername, $users, $pass, $database);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
$sql="UPDATE swap_profiles SET name= '$name', username='$username', mobile='$mobile', age='$age', branch='$branch', interests='$interests' where email='$email'";
if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
}
else {
      echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
