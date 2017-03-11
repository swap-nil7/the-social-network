<?php

session_start();
?>
<?php
if(isset($_POST['submit'])){
  include 'data.php';

  function test($data){
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }
  $name=$username=$email=$mobile=$password=$validpassword="";
  $nameErr=$usernameErr=$emailErr=$mobileErr=$validpasswordErr="";
  $total=0;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = test($_POST["name"]);
    $username= test($_POST["user"]);
    $email= test($_POST["email"]);
    $mobile= test($_POST["mobile"]);
    $password= test($_POST["password"]);
    $validpassword= test($_POST["validpassword"]);
  }

  if(!preg_match('/^[a-zA-Z ]*$/' , $name)){
    $nameErr="valid name required";
  }
  else $total++;

  if(!preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/' , $username)){
    $usernameErr="valid username required";
  }
  else $total++;

  if(!preg_match('/(\+91[\-\s]?)?[0]?(91)?[789]\d{9}/' , $mobile)){
    $mobileErr="valid mobile number required";
  }
  else $total++;

  if(!preg_match('/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/' , $email)){
    $emailErr="valid email required";
}
else $total++;

if($password!=$validpassword){
  $validpasswordErr="password does not match";
}
else $total++;

if($total==5){
  $_SESSION["username"]=$username;
  $_SESSION["name"]=$name;
  $_SESSION["email"]=$email;
  $_SESSION["mobile"]=$mobile;
  echo $_SESSION["username"];
  header("Location: index.php"); 
  data($name, $username, $email, $mobile, md5($password));
}
else{
  echo "enter valid credentials";
}
}
?>


<html>

<head>

<title>Sign Up</title>

<link rel="stylesheet" type="text/css" href="style.css">

<script type="text/javascript" src="sign.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $("#username").blur(function () {
      var username = $(this).val();
      if (username == '') {
      $("#availability").html("");
      }else{
      $.ajax({
url: "validation.php?uname="+username
}).done(function( data ) {
  $("#availability").html(data);
  }); 
      } 
      });
    });
</script>

</head>

<body>

<div class="main">

<h1>Sign Up</h1>

<form method="post" action="sign.php">

<ul>

<div class="div1">

<li><input type="email" id="email" name="email"  class="input" placeholder="Enter email" onchange="emailval()" required></li>
<span class="error"><?php if(isset($email)) {echo $emailErr;}?></span>

<li><input type="text" id="name" name="name" class="input" placeholder="Enter name" onchange="nameval()" required></li>
<span class="error"><?php if(isset($name)) {echo $nameErr;}?></span>

<li><input type="text" id="username" name="user" class="input" placeholder="Enter username" onchange="userval()" required></li>
<span class="error"><?php if(isset($username)){echo $usernameErr;}?></span>
<div id="availability"></div>

<li><input type="text" id="mobile" name="mobile" class="input"  placeholder="Enter mobile num" onchange="mobiles()" required="required"></li>
<span class="error"><?php if(isset($mobile)){echo $mobileErr;}?></span>

<li><input type="password" id="pass" name="password" class="input" placeholder="Enter password" required></li>

<li><input type="password" id="valpass" name="validpassword" class="input" placeholder="Confirm password" required onchange="validpass()"></li>
<span class="error"><?php if(isset($validpassword)){echo $validpasswordErr;}?></span>
<li>

<select class="select" required>

<option class="option" selected="selected" disabled>Gender</option>

<option class="option">Male</option>

<option class="option">Female</option>

</select><br>

<select class="select" required>

<option class="option" selected="selected" disabled>Education</option>

<option class="option">Primary</option>

<option class="option">Secondary</option>

<option class="option">Sr. Secondary</option>

<option class="option">Graduate</option>

<option class="option">Post Graduate</option>

<option class="option">Others</option>

</select>

</li>

</div>

<li>

<input type="checkbox" name="check" id="term" required>

<label for="term">I agree to the terms and conditions!!</label>

</li>

</ul>

<input type="reset" name="reset" value="Reset!" class="button">

<input type="submit" name="submit" value="Submit!" class="button">  

</form>

</div>

</body>
</html>

