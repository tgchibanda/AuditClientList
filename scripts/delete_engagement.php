
<?php
	include 'functions.php';
	
	if(isset($_POST['delpost'])){	
	
		$engagement_id=$_POST['engagement_id'];
		
		
		
		$qry = select_all_where("engagements","engagement_id",$engagement_id);
		$info = mysqli_fetch_array($qry);
		
		$qry2 = select_all_where("clients","id","$info[client]");
		
		
		mysqli_query(conn(),"update clients set engagement_status='0' where id='".$info['client']."'") or die(mysqli_error());
		mysqli_query(conn(),"update engagements set active_status='0' where engagement_id='$engagement_id'") or die(mysqli_error());
		
		$info2 = mysqli_fetch_array($qry2);
		audit("Removed Engagement", "Removed ".$info2['company_name']);
	}
?>

