<?php
require_once('init.inc.php');
require_once('DatabaseUser.php');

checkSeccion('login.php');

if(!isset($_POST['submit'])){
	exit('Invalid visit!');
}

$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

$oDBConn = new DatabaseConnection();
$oDBUser = new DatabaseUser($oDBConn->link());

$result = $oDBUser->login($username, $password);

if (isset($_POST['remember'])) {
	$sCookie = md5($sUsername + $sPassword + time());
	$time = time() + (3600 * 24 * 365);
	setcookie("user", $sCookie, $time, '/TWT/');
	$oDBUser->saveCookie($sCookie, $result['id']);
}

if(!empty($result)){
	$_SESSION['username'] = $username;
	$_SESSION['id'] = $result['id'];
} 
header('Location: /TWT/');
?>