<?php 
require_once('module/init.inc.php');
checkSeccion('index.php');
if (!(isset($_SESSION['username']) && isset($_SESSION['id']))) {
	// echo('<a href="login.html">login</a>');
	// echo('<a href="register.html">sign up</a>');
	include("login.html");
}
else{
	include("module/homepage.php");
}
 ?>
