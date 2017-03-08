<?php
session_start();
?>
<?php
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
}
?>

<html>
<head>
<title>Complete Profile</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="sign.js"></script>
</head>

<body>
<h1>User Profile</h1>

<form method="post" action="index.php">

<li><input type="email" id="email" name="email"  class="input" value= <?php echo $_SESSION["email"]; ?> readonly></li>

<li><input type="text" id="name" name="name" class="input" value=<?php echo $_SESSION["name"]; ?> onchange="nameval()" required></li>

<li><input type="text" id="username" name="user" class="input" value= <?php echo $_SESSION["username"]; ?> onchange="userval()" required></li>

<li><input type="text" id="mobile" name="mobile" class="input"  value= <?php echo $_SESSION["mobile"]; ?> onchange="mobiles()" required="required"></li>

<li><input type="text" id="age" name="age" class="input"  placeholder="Enter age" onchange="ageval()" required="required">

<li><input type="text" id="branch" name="branch" class="input"  placeholder="Enter branch(optional)"></li>

<li><input type="text" id="interests" name="interests" class="input"  placeholder="Enter your interests(optional)"></li><br>

<li><input type="submit" value="submit" name="submit"><br><br>
<li><a href="change.php">Change password</a><br><br>
<li><a href="">Update profile picture</a><br><br>
<li><a href="">Update cover photo</a><br><br>
<li><a href="logout.php">Logout</a>

</form>
</body>
</html>




