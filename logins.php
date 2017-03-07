<?php
ob_start();
$host="192.168.121.187";
$username="first_year";
$password="first_year";
$db_name="first_year_db";
$table="swap_profiles";

$conn=new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error){
  die("Connection failed: " . $conn -> connect_error);
}


$email=$_POST['email'];
$pass=($_POST['password']);
$check=$_POST['check'];
echo $check;

$sql="SELECT * FROM $table WHERE email='$email' and password='$pass'";
$result=mysqli_query($conn, $sql);


$count=mysqli_num_rows($result);
if ($count==1) {
      echo "Success! $count";
} else {
      echo "Unsuccessful! $count";
}

ob_end_flush();
?>
