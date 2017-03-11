<?php
function data($email, $url){
  $servername="192.168.121.187";
  $users="first_year";
  $pass="first_year";
  $database="first_year_db";

  $conn = new mysqli($servername, $users, $pass, $database);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }

  $check="SELECT * FROM swap_images where email='$email'";
  $result=mysqli_query($conn, $check);
  $count=mysqli_num_rows($result);

if($count==0){
  $sql="insert into swap_images(email, url) values('$email', '$url')";
}

else{
  $sql="update swap_images set url='$url' where email='$email' ";
}

if ($conn->query($sql) === TRUE) {
      echo "Profile picture updated";
}
else {
      echo "Error: " . $sql . "<br>" . $conn->error;
}
}


