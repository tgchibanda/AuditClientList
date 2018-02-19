

<style>
@mixin border-radius($radius) {
  -webkit-border-radius: $radius;
  -moz-border-radius: $radius;
  -ms-border-radius: $radius;
  border-radius: $radius;
}

@mixin transition($args...) {
  -webkit-transition: $args;
  -moz-transition: $args;
  -ms-transition: $args;
  -o-transition: $args;
  transition: $args;
}

body {
  color: slategray;
}

.table {
  display: flex;
  flex-wrap: wrap;
  margin: 0 auto;
  padding: 2rem 0rem 0rem 0rem;
  max-width: 1100px;
}

.table-cell {
  box-sizing: border-box;
  flex-grow: 1;
  width: 100%;
  padding: 0.8em 1.2em;
  overflow: hidden;
  list-style-type: none;
  outline: 1px solid #ddd;
  font-weight: 300;
  margin: {
    top: 1px;
    left: 1px;
  }
  &:first-child {
  	outline: 1px solid #fff;
    background: transparent;
  	@media only screen and (max-width : 768px) {
			display: none;
		}
  }
  &:nth-child(3) {
    outline: 1px solid #30305b;
  }
  &:nth-child(-n+3) {
  	padding: {
  		top: 40px;
  		bottom: 40px;
  	}
  }
  > h3 {
    font-size: 26px;
  	margin: {
  		top: 0;
  		bottom: 3rem;
  	}
  }
  &.cell-feature {
	  text-align: left;
    font-size: 18px;
  }
  &.plattform {
    color: limegreen;
    a.btn {
      color: limegreen;
      &:hover {
        background-color: limegreen;
        border-color: limegreen;
        color: white;
      }
    }
  }
  &.enterprise {
    background-color: #30305b;
    color: #85bafc;
    a.btn {
      color: #85bafc;
      &:hover {
        background-color: #85bafc;
        border-color: #85bafc;
        color: #30305b;
      }
    }
  }
}

svg.enterprise-check path {
  fill: #30305b !important;
}

a.btn {
  border: 2px solid;
  padding: .6rem .9rem .6rem .9rem;
  font-weight: 400;
  text: {
    transform: uppercase;
    decoration: none;
  }
  @include transition(0.2s ease-in-out);
  @include border-radius(.3rem);
}


#data {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#data td, #data th {
    border: 1px solid #ddd;
    padding: 8px;
}

#data tr:nth-child(even){background-color: #f2f2f2;}

#data tr:hover {background-color: #ddd;}

#data th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #aaa;
    color: white;
}

</style>
<?php
include 'functions.php';
session_start();
$engagementid = $_POST['reportid'];
$qry = mysqli_query(conn(),"SELECT
engagements.engagement_date,
engagements.engagement_type,
engagements.engaged_by,
engagements.start_notes,
clients.company_reg_number,
clients.relationship_owner,
clients.company_child,
clients.industry,
clients.company_name,
engagements.engagement_id,
closed_projects.end_date,
engagement_types.type_name AS engagement_type,
users.`name`,
users.surname
FROM
engagements ,
clients ,
closed_projects,
engagement_types ,
users
WHERE
engagements.client = clients.id AND
engagements.engagement_id = '$engagementid' AND
closed_projects.engagement_id = engagements.engagement_id AND
engagements.engagement_type = engagement_types.id AND
engagements.engaged_by = users.id")
or die(mysqli_error(conn()));
while($info = mysqli_fetch_array($qry)){

?>

<title><?php echo $info['company_name']; ?> Report. Printed by: <?php echo $_SESSION['username']; ?></title>


<table class="table-cell cell-feature" align="center" width="100%" border="0">
<tr><td colspan="6"><b><center><font size="+3">Nkonki Audit Report</center><td colspan="1" rowspan="2"><center><img src="logo.jpg" /></center></td></b></td></tr>
<tr><td width="2%"></td><td colspan="3"><b><center><h2>Client Details</h2></center></b></td><td></td></tr>
<tr><td></td><td colspan="2" width="15%"><b>Client Name</b></td><td><?php echo $info['company_name']; ?></td><td></td><td></td><td></td></tr>
<tr><td></td><td colspan="2"><b>Client Reg Number</b></td><td><?php echo $info['company_reg_number']; ?></td><td></td><td></td><td></td></tr>
<tr><td></td><td colspan="2"><b>Client Industry</b></td><td><?php echo $info['industry']; ?></td><td></td><td></td><td></td></tr>
<tr><td></td><td colspan="2"><b>Client Child</b></td><td><?php echo $info['company_child']; ?></td><td></td><td></td><td></td></tr>
<tr bgcolor="#cccccc"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
</table>
<br>
<br>
<table align="center" width="100%" id="data">
<tr><th colspan="8"><center><b>Engagement Details</b></center></th></tr>
<tr bgcolor="#cccccc"><td width="10%"><b>Engagement Date</b></td><td><b>Engaged By</b></td><td><b>Audit Type</b></td><td><b>Status</b></td><td><b>Relationship Owner</b></td><td><b>Notes</b></td><td><b>End Date</b></td></tr>
<tr><td><?php echo $info['engagement_date']; ?></td><td><?php echo $info['name']." ".$info['surname']; ?></td><td><?php echo $info['engagement_type']; ?></td><td>Complete</td><td><?php echo $info['name']." ".$info['surname']; ?></td><td><?php echo $info['start_notes']; ?></td><td><?php echo $info['end_date']; ?></td></tr>
</table>
<br>
<br>

<table align="center" width="100%" id="data">

<tr><th colspan="8"><center><b>Project Closing Details</b></center></th></tr>
<tr bgcolor="#cccccc"><td width="10%"><b>End Date</b></td><td><b>Auditor's Rating</b></td><td><b>Auditor's Remarks</b></td><td><b>Contact Person's Rating</b></td><td><b>Contact Person's Remarks</b></td><td><b>Closing Notes</b></td><td><b>Captured By</b></td></tr>
<?php
$finish = mysqli_query(conn(), "SELECT
closed_projects.auditor_rating,
closed_projects.auditor_remarks,
closed_projects.contact_rating,
closed_projects.contact_remarks,
closed_projects.end_date,
closed_projects.closing_notes,
closed_projects.captured_by
FROM `closed_projects`
WHERE
closed_projects.engagement_id = '$engagementid'")or die(mysqli_error(conn()));
while($final = mysqli_fetch_array($finish)){
?>
<tr><td><?php echo $final['end_date']; ?></td><td><?php echo $final['auditor_rating']; ?></td><td><?php echo $final['auditor_remarks']; ?></td><td><?php echo $final['contact_rating']; ?></td><td><?php echo $final['contact_remarks']; ?></td><td><?php echo $final['closing_notes']; ?></td><td><?php echo $final['captured_by']; ?></td></tr>
<?php
}
?>


</table>
<?php
}
?>