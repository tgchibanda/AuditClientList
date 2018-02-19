
<?php
session_start();
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());
include 'functions.php';
	
	if(isset($_POST['delpost'])){	
	
mysqli_query(conn(),"insert into project_notes(date, project_id, updated_by, notes, notes_category) values('$date', '".$_POST['nengagement_id']."','".$_SESSION['username']."', '$_POST[project_notes_details]', '$_POST[notes_category]')") or die(mysqli_error(conn()));
audit("Adding project Notes", "Added project notes for project ".$_POST['engagement_id']."");
	

	}
?>