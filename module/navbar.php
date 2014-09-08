<?php 

 /**
 * create the navbar for the twt
 */
 class Navbar 
 {

 	private $dropdown;

 	private $nav1 = '
 	<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/TWT/">TWT</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="/TWT/workitem/">New Workitem</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
';

	private $nav2 = '
	</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
<!-- Nav bar end -->
';	


function __construct($sUser)
 	{

 		$this->dropdown = '
 		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
 		'.
 		$sUser.
 		'<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">My Works</a></li>
						<li class="divider"></li>
						<li><a href="/TWT/logout.php">Logout</a></li>
					</ul>';
 	}

 	public function GetNavbar(){
 		$navbar = $this->nav1.$this->dropdown.$this->nav2;
 		return $navbar;
 	}
 }


 ?>