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
  $email=$_SESSION['email'];

}
else if(isset($_COOKIE['email'])){
  echo "Hi! " . convert($_COOKIE['email']) . " cookie";
  $email=convert($_COOKIE['email']);
}

function test($data){
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}


$sql="select * from swap_profiles where email = '$email'";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $name=test($row["name"]);
    $username=test($row["username"]);
    $mobile=test($row["mobile"]);
    $age=test($row["age"]);
    $branch=test($row["branch"]);
    $interests=test($row["interests"]);
  }
}
$sqls="select * from swap_images where email = '$email'";
$results=mysqli_query($conn, $sqls);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($results)) {
    $url=$row["url"];
  }
}

if(isset($_POST['submit'])){
  include 'data1.php';
  $name=$username=$mobile=$age=$branch=$interests="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name= $_POST["name"];
    $username= $_POST["user"];
    $mobile= $_POST["mobile"];
    $age= $_POST["age"];
    $branch= $_POST["branch"];
    $interests= $_POST["interests"];
    $email= $_POST["email"];
  }
  data($name, $username, $mobile, $age, $branch, $interests, $email);
  header("Location: logins.php");
}

?>



<html>
<head>
<title>My Profile</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="sign.js"></script>
</head>

<body>
<h1>My Profile</h1>
<img src="<?php echo $url ?>" height=200 width=200>

<form method="post" action="profile.php">

<li><input type="email" id="email" name="email"  class="input" value= <?php echo $email  ?> readonly></li>

<li><input type="text" id="name" name="name" class="input" value="<?php echo $name; ?>" onchange="nameval()" required></li>

<li><input type="text" id="username" name="user" class="input" value= "<?php echo $username ; ?>" onchange="userval()" required></li>

<li><input type="text" id="mobile" name="mobile" class="input"  value="<?php echo $mobile ; ?>" onchange="mobiles()" required="required"></li>

<li><input type="text" id="age" name="age" class="input" value="<?php echo $age; ?>" onchange="ageval()" required="required">

<li><input type="text" id="branch" name="branch" class="input" value="<?php echo $branch; ?>" ></li>

<li><input type="text" id="interests" name="interests" class="input"  value="<?php echo $interests;?>" ></li><br>

<li><input type="submit" value="submit" name="submit"><br><br>
</form>

<form action="upload.php" method="post" enctype="multipart/form-data">
<h2>Update profile picture</h2>
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload Image" name="submit">
</form>

<li><a href="change.php">Change password</a><br><br>
<li><a href="logout.php">Logout</a>
</body>
</html>


