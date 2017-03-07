<?php
session_start();
session_destroy();

setcookie("email", $email, time()-(1));

header("Location: login.php");
exit();
?>
