<?php
require_once('DatabaseWorkitem.php');
echo("start");
$oDBConn = new DatabaseConnection();
$oDBWorkitem = new DatabaseWorkitem($oDBConn->link());
if (isset($_POST['save'])) {
	if ($_POST['id'] == 0) {
		$oDBWorkitem->InsertWorkitem($_POST['title'], $_POST['team'], $_POST['priority'], $_POST['area'], $_POST['estimateTime'], $_POST['remainTime'], $_POST['actualTime'], $_POST['assignedTo'], $_POST['description']);
	}
	else{
		// echo("update");
		// print_r($_POST);
		$oDBWorkitem->UpdateWorkitem($_POST['id'], $_POST['title'], $_POST['team'], $_POST['priority'], $_POST['area'], $_POST['estimateTime'], $_POST['remainTime'], $_POST['actualTime'], $_POST['assignedTo'], $_POST['description'], ++$_POST['rev'], $_POST['state']);
	}
	header('Location: /TWT/workitemlist/?project='.$_POST['area']);
}else{
?>
<script type="text/javascript">
window.history.go(-1);
</script>
<?php
}
// $oDBWorkitem->InsertWorkitem("workitem from php", "core", 10, "test", 1, null, null, 1, null);
echo("done");
?>