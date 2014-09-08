<?php
require_once('module/init.inc.php');

if (isset($_SESSION['username'])){
session_destroy();
setcookie('user', null, time()-3600, '/TWT/');
}
header('Location: /TWT/');
?>