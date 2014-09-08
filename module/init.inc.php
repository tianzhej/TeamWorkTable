<?php 
session_start();

require_once('DatabaseUser.php');
header('Content-Type: text/html; charset=utf-8');

function checkSeccion($file)
{
    // print_r($_COOKIE);
    if (!(isset($_SESSION['username']) || isset($_SESSION['id']))) {
        if ($file !== 'login.php' && $file !== 'register.php'){
        	if ($_COOKIE['user'] == '') {
                echo $_COOKIE['user'];
        		if ($file !== 'index.php') {
        			header('Location: /TWT/');
        		}
        	}else{
        		$oDBConn = new DatabaseConnection();
        		$oDBUser = new DatabaseUser($oDBConn->link());
        		$result = $oDBUser->getByCookie($_COOKIE['user']);
        	    if (!isset($result)) {
        			header('Location: /TWT/');
        		}
        		$_SESSION['username'] = $result['username'];
        		$_SESSION['id'] = $result['id'];
    	    }
        }
	}
}

?>