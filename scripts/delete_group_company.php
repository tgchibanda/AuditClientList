<?php
	include 'functions.php';
	
	if(isset($_POST['delpost'])){	
	
		$id=$_POST['id'];
		$qry = select_all_where("group_companies","id",$id);
		mysqli_query(conn(),"update group_companies set active_status='0' where id='$id'") or die(mysqli_error());
		
		$info = mysqli_fetch_array($qry);
		audit("Deleted Group", "Deleted ".$info['group_name']);
	}
?>

