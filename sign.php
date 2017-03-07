<!DOCTYPE html>

<html>

<head>

<title>Sign Up</title>

<link rel="stylesheet" type="text/css" href="style.css">

<script type="text/javascript" src="sign.js"></script>

</head>

<body>

<div class="main">

<h1>Sign Up</h1>

<form method="post" action="index.php">

<ul>

<div class="div1">

<li><input type="email" id="email" name="email"  class="input" placeholder="Enter email" onchange="emailval()" required></li>
<span class="error"><?php if(isset($email)) {echo $emailErr;}?></span>

<li><input type="text" id="name" name="name" class="input" placeholder="Enter name" onchange="nameval()" required></li>
<span class="error"><?php if(isset($name)) {echo $nameErr;}?></span>

<li><input type="text" id="username" name="user" class="input" placeholder="Enter username" onchange="userval()" required></li>
<span class="error"><?php if(isset($username)){echo $usernameErr;}?></span>

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

