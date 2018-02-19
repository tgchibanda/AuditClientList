
<?php
//error_reporting(0);
session_start();
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());
include 'functions.php';
		
		$qry = select_all_data_where("clients","id",$_POST['client']);
	$data =mysqli_fetch_array($qry);
	$company_name = $data['company_name'];
	
		
		$result = mysqli_insert_array("engagements", $_POST, "submit");

			if( $result['mysqli_error'] ) {
				echo "Query Failed: " . $result['mysqli_error'];
			} else {
				mysqli_query(conn(),"update clients set engagement_status='1' where id='$_POST[client]'") or die(mysqli_error());
				$info = mysqli_fetch_array($qry);
				audit("Client Engagement", "Engaged ".$company_name);
				
				?>
				<script language="javascript">
					alert("Client has been engaged");
					location='index.php?page=manage_clients.php'
				</script>
				<?php
			}	
	?>