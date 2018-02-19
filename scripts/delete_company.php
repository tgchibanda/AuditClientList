
<?php
	include 'functions.php';
	
	if(isset($_POST['delpost'])){	
	
		$id=$_POST['id'];
		$qry = select_all_where("clients","id",$id);
		mysqli_query(conn(),"update clients set active_status='0' where id='$id'") or die(mysqli_error(conn()));
		
		$info = mysqli_fetch_array($qry);
		audit("Deleted Client", "Deleted ".$info['company_name']);
	}
?>

