<?php
	include 'functions.php';
	
	if(isset($_POST['delpost'])){	
	
		$id=$_POST['id'];
		mysqli_query(conn(),"update users set active_status='0' where id='$id'") or die(mysqli_error());
		
		$qry = select_all_where("users","id",$id);
		$info = mysqli_fetch_array($qry);
		audit("Deleted User", "Deleted ".$info['username']);
	}
?>

