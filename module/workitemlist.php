<?php 
require_once("init.inc.php");

require_once("navbar.php");
require_once("webReq.php");
require_once("DatabaseWorkitem.php");


if (!(isset($_GET['project']))) { 
	header('Location: /TWT/');
}

$project = $_GET['project'];



$oDBConn = new DatabaseConnection();
$oDBItem = new DatabaseWorkitem($oDBConn->link());



$oNav = new Navbar("zehuali");
$navbar = $oNav->GetNavbar();
$oReq = new WebReq($project);
echo($oReq->GetHead());
echo($navbar);

include_once("workitemlistview.php");


echo($oReq->GetEnd());




 ?>