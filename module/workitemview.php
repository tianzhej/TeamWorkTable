<?php 
require_once('DatabaseWorkitem.php');


$oNav = new Navbar($_SESSION['username']);
	

if (isset($_GET['id'])) { 
	$oDBConn = new DatabaseConnection();
	$oDBItem = new DatabaseWorkitem($oDBConn->link());

	$aResult = $oDBItem->GetWorkitemById($_GET['id']);
	$oReq = new WebReq($aResult['title']);
	

}else{
	$aResult = array('id' => 0);
	$oReq = new WebReq("New Workitem");
}
$navbar = $oNav->GetNavbar();
echo($oReq->GetHead());
echo($navbar);
 ?>

 <br><br>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Workitem #: <?php echo($aResult['id']); ?></h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" action="../module/WorkItem.php" method="post">
						<!-- Workitem ID -->
						<input type="hidden" name="id" value="<?php echo($aResult['id']); ?>">
						<input type="hidden" name="rev" value="<?php echo($aResult['rev']); ?>">
						<!-- Form title -->
						<input type="text" class="form-control input-lg" placeholder="Title" name="title" value="<?php echo($aResult['title']); ?>">
						<hr>
						<!-- Project Area -->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="projectArea">Project Area</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" id="projectArea" placeholder="Project" name="area" value="<?php echo($aResult['area']); ?>">
							</div>
						</div>
						<!-- Team -->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="team">Team</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" id="team" placeholder="Team" name="team" value="<?php echo($aResult['team']); ?>">
							</div>
						</div>
						<hr>
						<!-- divide the page into 2 column -->
						<div class="row">
							<div class="col-md-6" style="border-right-style: solid; border-right-width: 1px; border-right-color: #EEEEEE">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="priority">Priority</label>
									<div class="col-sm-9">
										<input type="number" class="form-control input-sm" id="priority" placeholder="0" name="priority" value="<?php echo($aResult['priority']); ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="assignedTo">Assigned To</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="assignedTo" name="assignedTo" value="<?php echo($aResult['assigned_to']); ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="state">State</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm" id="state" placeholder="New" name="state" value="<?php echo($aResult['state']); ?>">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="estimateTime">Estimate Time</label>
									<div class="col-sm-9">
										<input type="number" step="0.1" class="form-control input-sm" id="estimateTime" placeholder="0.0" name="estimateTime" value="<?php echo($aResult['estimate_hours']); ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="actualTime">Actual Time</label>
									<div class="col-sm-9">
										<input type="number" step="0.1" class="form-control input-sm" id="actualTime" placeholder="0.0" name="actualTime" value="<?php echo($aResult['actual_hours']); ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="remainTime">Remain Time</label>
									<div class="col-sm-9">
										<input type="number" step="0.1" class="form-control input-sm" id="remainTime" placeholder="0.0" name="remainTime" value="<?php echo($aResult['remaining_hours']); ?>">
									</div>
								</div>
							</div>
						</div>
						
						<!-- Rich text field begin-->
						
						<textarea class="textarea form-control" placeholder="Enter text ..." style="height: 200px" name="description"><?php echo($aResult['description']); ?></textarea>
						<!-- Rich text field end -->
						<br>
						<div class="pull-right">
						<button type="submit" class="btn btn-primary" name="save" value="save">Save</button>
						<button type="button" class="btn btn-default" onclick="goback()">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="/TWT/bootstrap/js/wysihtml5-0.3.0.min.js"></script>
		<script src="/TWT/src/bootstrap3-wysihtml5.js"></script>
		<!-- Rich text editor js begin-->
		<script>
		$('.textarea').wysihtml5();
		</script>
		<script type="text/javascript" charset="utf-8">
		$(prettyPrint);
		</script>
		<script type="text/javascript" charset="utf-8">
		function goback () {
			window.history.go(-1);
		}
		</script>

		<?php 
echo($oReq->GetEnd());
 ?>