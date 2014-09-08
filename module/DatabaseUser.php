<?php 
require_once("DatabaseConnection.php");


class DatabaseUser
{
	
	private $mysqli;

	function __construct($mysqli)
	{
		$this->mysqli = $mysqli;
	}

	public function InsertUser($sUserName, $sPassword, $sEmail, $sPhone)
	{
		//$sUserName = mysql_real_escape_string($sUserName);
		//$sEmail = mysql_real_escape_string($sEmail);
		//$sPhone = mysql_real_escape_string($sPhone);

		$sPassword = md5($sPassword);

		$sPosition = "Software Engineer";
        //echo($sPosition);
		$sSql = "INSERT INTO `TWT_Users` VALUES (null, '$sUserName', '$sPassword', '$sPosition', '$sEmail', '$sPhone', 0, 0, 0)";
		return $this->mysqli->query($sSql);
	}

	public function login($sUserName, $sPassword)
 	{
 		//$sUserName = mysql_real_escape_string($sUserName);
 		$sPassword = md5($sPassword);
 		$sUserSql = "SELECT * FROM `TWT_Users` WHERE `username` = '$sUserName' AND `password` = '$sPassword' LIMIT 1";
 		$result = $this->mysqli->query($sUserSql);
 		$aUser = $result->fetch_assoc();
 		return $aUser;
 	}

 	public function checkUsername($sUserName)
 	{
 		$sUserSql = "SELECT * FROM `TWT_Users` WHERE `username` = '$sUserName'";
 		$result = $this->mysqli->query($sUserSql);
 		$iRow = $result->num_rows;
 		return $iRow;
 	}
     
     
    public function saveCookie($sCookie, $iId)
 	{
 		$sSql = "UPDATE `TWT_Users` SET `cookie` = '$sCookie' WHERE `id` = '$iId' LIMIT 1";
 		$result = $this->mysqli->query($sSql);
 		return $result;
 	}

 	public function getByCookie($sCookie)
 	{
 		$sUserSql = "SELECT * FROM `TWT_Users` WHERE `cookie` = '$sCookie'";
 		$result = $this->mysqli->query($sUserSql);
 		$aUser = $result->fetch_assoc();
     	return $aUser;
 	}

}


?>
