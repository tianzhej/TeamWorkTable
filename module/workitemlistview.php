<?php 

require_once('init.inc.php');
require_once('DatabaseWorkitem.php');

$project = $_GET['project'];


$oDBConn = new DatabaseConnection();
$oDBItem = new DatabaseWorkitem($oDBConn->link());

$listFormat = '<a href="/TWT/workitem/?id=%1$s" class="list-group-item">
					<h4>%2$s</h4>
					<span class="badge">%3$s</span><p>To: %4$s</p>
				</a>';


 ?>

 <!-- List start will devide into 3 colnom -->
<div class="container">
	<h2>List</h2>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<h5>TO DO</h5>
			<!-- list group start -->
			<div class="list-group">
				<?php 
					$aResult = $oDBItem->GetWorkitemByState($project, "New");

					foreach ($aResult as $key => $value) {
						echo sprintf($listFormat, $value['id'], $value['title'], $value['remaining_hours'], $value['assigned_to']);
					}

				 ?>
			</div>
			<!-- list group end -->
		</div>
		<div class="col-md-4">
			<h5>IN PROGRESS</h5>
			<!-- list group start -->
			<div class="list-group">
				<?php 
					$aResult = $oDBItem->GetWorkitemByState($project, "In Progress");

					foreach ($aResult as $key => $value) {
						echo sprintf($listFormat, $value['id'], $value['title'], $value['remaining_hours'], $value['assigned_to']);
					}

				 ?>
			</div>
			<!-- list group end -->
		</div>
		<div class="col-md-4">
			<h5>DONE</h5>
			<!-- list group start -->
			<div class="list-group">
				<?php 
					$aResult = $oDBItem->GetWorkitemByState($project, "Done");

					foreach ($aResult as $key => $value) {
						echo sprintf($listFormat, $value['id'], $value['title'], $value['remaining_hours'], $value['assigned_to']);
					}

				 ?>
			</div>
			<!-- list group end -->
		</div>
	</div>
</div>
<!-- List end -->