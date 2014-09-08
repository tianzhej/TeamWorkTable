<?php 

require_once('DatabaseUser.php');
require_once('DatabaseConnection.php');

require_once('init.inc.php');
checkSeccion('register.php');

if(!isset($_POST['submit'])){
	exit('Invalid visit!');
}
$sUsername = $_POST['username'];
$sPassword = $_POST['password'];
if ($sPassword != $_POST['password2']) {
	exit('Error: the two passwords are not match.<a href="javascript:history.back(-1);">back</a>');
}
$sEmail = $_POST['email'];
$sPhone = $_POST['phone'];


if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $sUsername)){
	exit('Error: the username is not allowed.<a href="javascript:history.back(-1);">back</a>');
}
if(strlen($sPassword) < 6){
	exit('Error: the password is not allowed.<a href="javascript:history.back(-1);">back</a>');
}
if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $sEmail)){
	exit('Error: the email format is not allowed<a href="javascript:history.back(-1);">back</a>');
}

$oDBConn = new DatabaseConnection();
$oDBUser = new DatabaseUser($oDBConn->link());

if ($oDBUser->checkUsername($sUsername)) {
	echo 'Error: The username ',$sUsername,' is already exit.<a href="javascript:history.back(-1);">back</a>';
	exit;
}

if ($oDBUser->insertUser($sUsername, $sPassword, $sEmail, $sPhone)) {

	header('Location: ../register.html');
}else {
	echo 'error!!!!!!!!',mysql_error(),'<br />';
	echo '<a href="javascript:history.back(-1);">back</a>';
}

 ?>