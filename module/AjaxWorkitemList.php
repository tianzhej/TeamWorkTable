<?php 

require_once('init.inc.php');
require_once('DatabaseWorkitem');

$project = $_GET['project'];
$state = $_GET['state'];


$oDBConn = new DBConn();
$oDBItem = new DatabaseWorkitem($oDBConn->link());

$aResult = $oDBItem->GetWorkitemByState($project, $state);

$workitems = json_encode($aResult);

exit($jusers);

 ?>