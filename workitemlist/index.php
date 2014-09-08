<?php 
require_once("../module/init.inc.php");

require_once("../module/navbar.php");
require_once("../module/webReq.php");
require_once("../module/DatabaseWorkitem.php");
checkSeccion('workitemlist');

if (!(isset($_GET['project']))) { 
	header('Location: /TWT/');
}

$project = $_GET['project'];



$oDBConn = new DatabaseConnection();
$oDBItem = new DatabaseWorkitem($oDBConn->link());



$oNav = new Navbar($_SESSION['username']);
$navbar = $oNav->GetNavbar();
$oReq = new WebReq($project);
echo($oReq->GetHead());
echo($navbar);

include_once("../module/workitemlistview.php");


echo($oReq->GetEnd());


 ?>