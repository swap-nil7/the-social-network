<?php

  $servername="192.168.121.187";
  $users="first_year";
  $pass="first_year";
  $database="first_year_db";

$conn = new mysqli($servername, $users, $pass, $database);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }

$uname = $_GET['uname'];

$query = "SELECT username FROM swap_profiles WHERE username = '$uname'";

$result = mysqli_query($conn, $query);
if ($result) {
if (mysqli_num_rows($result)<1) {
   echo "Available";
}
else{
   echo "Not available";
}
}
else {
  echo "Available";
}
?>
