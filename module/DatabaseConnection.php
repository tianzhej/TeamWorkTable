<?php 

/**
 * This class provide the connnect to the database
 */
 class DatabaseConnection
 {

 	private $mysqli;
 	
 	function __construct()
 	{
 		$mysql_server = "TeamWorkTable.db.11870160.hostedresource.com";
		$mysql_user = "TeamWorkTable";
		$mysql_password = "p@ssword4TWT";
		$mysql_db = "TeamWorkTable";
		$this->mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
		if ($this->mysqli->connect_errno) {
			printf("Connection failed: %s \n", $this->mysqli->connect_error);
			exit();
		}
		$this->mysqli->set_charset("utf8");
 	}

 	/**
 	* This function return the mysqli
 	*/
 	public function link()
 	{
 		return $this->mysqli;
 	}

 	function __destruct()
 	{
 		$this->mysqli->close();
 	}
 } 

 ?>