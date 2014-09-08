<?php 
require_once("navbar.php");
require_once("webReq.php");
require_once("DatabaseWorkitem.php");


$oNav = new Navbar($_SESSION['username']);
$navbar = $oNav->GetNavbar();
$oReq = new WebReq("Teamwork Table");
echo($oReq->GetHead());
echo($navbar);

 ?>

 <h1>welcome to Teamwork Table</h1>


 <?php 


echo($oReq->GetEnd());

  ?>