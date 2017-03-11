<?php
function convert($random){
  $email="";
  $servername="192.168.121.187";
  $users="first_year";
  $pass="first_year";
  $database="first_year_db";

  $conn = new mysqli($servername, $users, $pass, $database);
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

  $sql="select * from swap_hash where hash='$random'";
  $result=mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      $email=$row["email"];
    }
  }
  return $email; 
}
