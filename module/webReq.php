<?php 

/**
* 
*/
class WebReq
{
	private $head;
	private $end;
	function __construct($sTitle)
	{
		$this->head = '<html>
	<head>
		<title>'.$sTitle.'</title>
		<link rel="stylesheet" type="text/css" href="/TWT/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/TWT/scr/bootstrap-wysihtml5.css" />
	</head>	<body>';

		$this->end = '
		<script src="/TWT/javascript/jquery-1.11.1.min.js"></script>
		<script src="/TWT/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>';

	}

	public function GetHead()
	{
		return $this->head;
	}

	public function GetEnd()
	{
		return $this->end;
	}
}



 ?>