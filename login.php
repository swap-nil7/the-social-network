<!DOCTYPE html>

<html>

<head>

<title>Login</title>

<link rel="stylesheet" type="text/css" href="style.css">

<script type="text/javascript" src="sign.js"></script>

</head>

<body>

<div class="main">

<h1>Login</h1>

<form method="post" action="logins.php">

<ul>

<div class="div1">

<li><input type="email" id="email" name="email" class="input" placeholder="Enter email" onchange="emailval()" required></li>

<li><input type="password" id="pass" name="password" class="input" placeholder="Enter password" required>



</div>

<li>

<input type="checkbox" name="check" id="term" value="checked">

<label for="term">Remember me</label>

</li>

</ul>

<input type="reset" name="reset" value="Reset!" class="button">

<input type="submit" name="submit" value="Login" class="button">  

</form>

</div>

</body>

</html>

