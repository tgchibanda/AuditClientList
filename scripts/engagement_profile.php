<?php
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());
include 'functions.php';

if(isset($_POST['id'])){
	
	$qry = select_all_data_where("clients","id",$_POST['id']);
	$data =mysqli_fetch_array($qry);
	$company_name = $data['company_name'];
	$company_reg_number = $data['company_reg_number'];
	$industry = $data['industry'];
	$company_child = $data['company_child'];
	$relationship_owner = $data['relationship_owner'];
	$company_id = $data['id'];
	
	
	
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Nkonki</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/my_styles.css" rel="stylesheet" />
	
	
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	
	
</head>

<body>

						
						<div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Engagement Profile for: <?php echo $company_name; ?></h4>
                                    <p class="category">Owner: <?php echo $relationship_owner; ?></p>
                                </div>
								
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Engaged By</th>
                                            <th>Engagement Type</th>
                                            <th>Engagement Date</th>
                                            <th>Engagement Notes</th>
											<th></th>
                                        </thead>
                                        <tbody>
										
										<?php
										
											$qry = mysqli_query(conn(), "SELECT
																			engagements.engagement_date,
																			engagements.engaged_by,
																			engagements.id,
																			engagements.client,
																			engagements.start_notes,
																			engagements.engagement_id,
																			engagements.city,
																			engagements.assurance,
																			engagements.first_engagement_date,
																			engagements.rotation_period,
																			engagements.rotation_year,
																			engagements.anticipated_rotation_partner,
																			engagement_types.type_name AS engagement_type,
																			users.`name`,
																			users.surname
																			FROM
																			engagements ,
																			engagement_types ,
																			users
																			WHERE
																			engagements.client = '$company_id' AND
																			engagements.engagement_type = engagement_types.id AND
																			engagements.engaged_by = users.id");
											while($info=mysqli_fetch_array($qry)){
										?>
                                            <tr>
                                                <td><?php echo $info['name']." ".$info['surname']; ?></td>
                                                <td><?php echo $info['engagement_type']; ?></td>
												<td><?php echo $info['engagement_date']; ?></td>
												<td><?php echo $info['start_notes']; ?></td>
                                                <td>
												
													<div class="btn-group btn-group-xs">
													
													<button type="submit" rel="tooltip" title="Update Status" name="update_status" id="update_status" value="<?php echo $info['engagement_id']; ?>" class="btn btn-primary btn-simple btn-xs">
													<i class="material-icons">edit</i></button>
													
													
													</div>
												
													<button type="submit" name="view_audit_report" id="view_audit_report" value="<?php echo $info['engagement_id']; ?>" rel="tooltip" title="View Audit Report" class="btn btn-success btn-simple btn-xs">
                                                                <i class="material-icons">library_books</i>
                                                    </button>
													
												
												</td>
                                            </tr>
											<?php
												}
											
											?>
											
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
<?php
}
?>
		</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>


</html>				