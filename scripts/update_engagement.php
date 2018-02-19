
<?php
session_start();
	include 'functions.php';
	date_default_timezone_set('Africa/Harare');
	$date = date('m/d/Y h:i:s', time());
	if(isset($_POST['delpost'])){	
	
		
		mysqli_query(conn(),"update engagements set engagement_status='".$_POST['engagement_status']."' where engagement_id='".$_POST['engagement_id']."'") or die(mysqli_error(conn()));
		mysqli_query(conn(), "insert into update_status_notes (date, project_id, updated_by, notes, project_status) values('$date', '".$_POST['engagement_id']."', '".$_SESSION['username']."', '".$_POST['engagement_notes']."', '".$_POST['engagement_status']."')")or die(mysqli_error(conn()));
		audit("Project Update", "Changed project ".$_POST['engagement_id']." to ".$_POST['engagement_status']);
	}
?>

