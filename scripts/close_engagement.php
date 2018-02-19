
<?php
error_reporting(0);
session_start();
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());
include 'functions.php';
		
		
		$qry = select_all_data_where("engagements","engagement_id",$_POST['engagement_id']);
		$data =mysqli_fetch_array($qry);
		$client = $data['client'];
		
		
		$qry2 = select_all_data_where("clients","id","$client");
		$data2 =mysqli_fetch_array($qry2);
		$company_name = $data2['company_name'];
		$id = $data2['id'];
		
	
		$result = mysqli_insert_array("closed_projects", $_POST, "submit");

		mysqli_query(conn(),"update clients set engagement_status='0' where id='$id'") or die(mysqli_error(conn()));
		mysqli_query(conn(),"update engagements set engagement_status='3' where engagement_id='".$_POST['engagement_id']."'") or die(mysqli_error(conn()));
		
		audit("Closed Project", "Closed ".$company_name." project. REF ".$_POST['engagement_id']);

				?>
				<script language="javascript">
					alert("Project has been set to complete");
					location='index.php?page=engaged_clients.php';
				</script>