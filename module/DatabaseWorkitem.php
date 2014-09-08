<?php 

require_once("DatabaseConnection.php");


class DatabaseWorkitem
{
	
	private $mysqli;

	function __construct($mysqli)
	{
		$this->mysqli = $mysqli;
	}


	public function InsertWorkitem($sTitle, $sTeam, $iPriority, $sArea, $fEstimateHours, $fRemainingHours, $fActualHours, $sAssignedTo, $sDescription)
	{
		$sSql = "INSERT INTO `TWT_Workitem` (`id`, `title`, `team`, `priority`, `area`, `estimate_hours`, `remaining_hours`, `actual_hours`, `assigned_to`, `description`, `rev`) VALUES (null, '$sTitle', '$sTeam', '$iPriority', '$sArea', '$fEstimateHours', '$fRemainingHours', '$fActualHours', '$sAssignedTo', '$sDescription', 0)";
		return $this->mysqli->query($sSql);
	}

	public function GetWorkitemById($iId)
 	{
 		$sUserSql = "SELECT * FROM `TWT_Workitem` WHERE `id` = '$iId'";
 		$result = $this->mysqli->query($sUserSql);
 		$aWorkitems = $result->fetch_assoc();
 		return $aWorkitems;
 	}

 	public function GetWorkitemByState($sProject, $sState)
 	{
 		$sUserSql = "SELECT * FROM `TWT_Workitem` WHERE `area` = '$sProject' and `state` = '$sState' ORDER BY `priority`";
 		$result = $this->mysqli->query($sUserSql);
 		return $result->fetch_all(MYSQL_ASSOC);
 	}

 	public function UpdateWorkitem($iId, $sTitle, $sTeam, $iPriority, $sArea, $fEstimateHours, $fRemainingHours, $fActualHours, $sAssignedTo, $sDescription, $iRev, $sState)
	{
		$sSql = "UPDATE `TWT_Workitem` SET `title` = '$sTitle', `team` = '$sTeam', `priority` = '$iPriority', `area` = '$sArea', `estimate_hours` = '$fEstimateHours', `remaining_hours` = '$fRemainingHours', `actual_hours` = '$fActualHours', `assigned_to` = '$sAssignedTo', `description` = '$sDescription', `rev` = '$iRev', `state` = '$sState' WHERE `id` = '$iId'";
		return $this->mysqli->query($sSql);
	}



}
 ?>