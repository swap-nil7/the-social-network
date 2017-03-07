<?php
include 'data.php';
$name=$username=$email=$mobile=$password=$validpassword="";
$nameErr=$usernameErr=$emailErr=$mobileErr=$validpasswordErr="";
$total=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name = $_POST["name"];
  $username= $_POST["user"];
  $email= $_POST["email"];
  $mobile= $_POST["mobile"];
  $password= $_POST["password"];
  $validpassword= $_POST["validpassword"];
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
    data($name, $username, $email, $mobile, $password);
  }
  else
  {
    echo "<h1>hello</h1>";
  }
?>




