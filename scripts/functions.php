<?php
error_reporting(0);
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());



function conn(){
	$con = mysqli_connect("localhost","root","","nkonki")or die(mysqli_error());
	return $con;
}


function getLastRecord($table,$field){
	$qry = mysqli_query(conn(), "select * from $table order by id DESC  limit 1 ");
	$d = mysqli_fetch_array($qry);
	return $d[$field];
}


function mysqli_insert_array($table, $data, $exclude = array()) {
    $fields = $values = array();
    if( !is_array($exclude) ) $exclude = array($exclude);
    foreach( array_keys($data) as $key ) {
        if( !in_array($key, $exclude) ) {
            $fields[] = "$key";
            $values[] = "'" . mysqli_real_escape_string(conn(),$data[$key]) . "'";
        }
    }
    $fields = implode(",", $fields);
    $values = implode(",", $values);
	
   mysqli_query(conn(),"INSERT INTO $table ($fields) VALUES ($values)")or die(mysqli_error(conn()));
	
}

function mysqli_update_array($table, $data, $exclude = array(), $field, $value) {
    
    if( !is_array($exclude) ) $exclude = array($exclude);
    foreach( array_keys($data) as $key ) {
        if( !in_array($key, $exclude) ) {
            $values[] = "'" . mysqli_real_escape_string(conn(),$data[$key]) . "'";
			
			$column[] = "$key='" . mysqli_real_escape_string(conn(),$data[$key]) . "'";
        }
    }
    $script = implode(",", $column);
	
    mysqli_query(conn(),"UPDATE $table set $script where $field='$value'")or die(mysqli_error(conn()));
	
}


function select_all_where($table,$unique,$value){
	
	$qry=mysqli_query(conn(), "select * from ".$table." where ".$unique." = '".$value."' and active_status='1'")or die(mysqli_error(conn()));
	
	return $qry;
}


function select_all_data_where($table,$unique,$value){
	
	$qry=mysqli_query(conn(), "select * from ".$table." where ".$unique." = '".$value."'")or die(mysqli_error(conn()));
	
	return $qry;
}

function select_all_data_where_and($table,$unique,$value,$unique2,$value2){
	
	$qry=mysqli_query(conn(), "select * from ".$table." where ".$unique." = '".$value."' AND ".$unique2." = '".$value2."'")or die(mysqli_error(conn()));
	
	return $qry;
}


function select_all($table){
	
	$qry=mysqli_query(conn(), "select * from ".$table." where active_status='1'")or die(mysqli_error(conn()));
	
	return $qry;
}


function select_all_data($table){
	
	$qry=mysqli_query(conn(), "select * from ".$table."")or die(mysqli_error(conn()));
	
	return $qry;
}


function update($table,$setKey,$setValue,$unique,$value){
	
	$qry = mysqli_query(conn(), "update ".$table." set ".$setKey."")or die(mysqli_error(conn()));
}


function if_exists($table, $column, $value){
	$qry = mysqli_query(conn(), "select * from ".$table." where ".$column." = '".$value."' and active_status='1'")or die(mysqli_error(conn()));
	
	return (mysqli_num_rows($qry));
}


function totals($table){
	$qry=mysqli_query(conn(), "select * from ".$table."")or die(mysqli_error(conn()));
	
	if(mysqli_num_rows($qry)==""){
		return 0;
	}
	else {
	return mysqli_num_rows($qry);
	}
	
}


function totals_where($table, $column, $value){
	$qry=mysqli_query(conn(), "select * from ".$table." where ".$column."='".$value."'")or die(mysqli_error(conn()));
	
	if(mysqli_num_rows($qry)==""){
		return 0;
	}
	else {
	return mysqli_num_rows($qry);
	}
}

function getLastAudit($client_id){
	$qry = mysqli_query(conn(), "SELECT
clients.company_name,
closed_projects.end_date,
closed_projects.id AS project_ids,
closed_projects.engagement_id
FROM
clients ,
engagements ,
closed_projects
WHERE
clients.id = engagements.client AND
engagements.engagement_id = closed_projects.engagement_id AND
closed_projects.active_status = '1' AND
clients.id = '$client_id'
ORDER BY
project_ids DESC
LIMIT 1
")or die(mysqli_error(conn()));
$info = mysqli_fetch_array($qry);

return $info['end_date'];

}



function auditCount($client_id){
	
$qry = mysqli_query(conn(), "SELECT
Sum(closed_projects.track) AS total
FROM
clients ,
engagements ,
closed_projects
WHERE
clients.id = engagements.client AND
engagements.engagement_id = closed_projects.engagement_id AND
closed_projects.active_status = '1' AND
clients.id = '$client_id'
")or die(mysqli_error(conn()));
$info = mysqli_fetch_array($qry);

return $info['total'];
	
}




function unique_key(){
	
	return date('dmyhis');
}


function audit($action_type, $details){
	//session_start();
	$date = date('m/d/Y h:i:s', time());
	mysqli_query(conn(),"INSERT INTO audit (date, username, action_type, details) VALUES ('".$date."','".$_SESSION['username']."','$action_type', '$details')")or die(mysqli_error(conn()));
}

?>