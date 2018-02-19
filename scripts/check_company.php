<?php
//error_reporting(0);
include 'functions.php';

//Username validation
if(isset($_GET['company_name'])){
if (if_exists("clients", "company_name", $_GET['company_name'])<1) {
 //echo "<label>Available</label>";
}
else{
 echo "<font color='red'>$_GET[company_name] already in use!</font>";
}
}


//Regnumber validation
if(isset($_GET['company_reg_number'])){
if (if_exists("clients", "company_reg_number", $_GET['company_reg_number'])<1) {
 //echo "<label>Available</label>";
}
else{
 echo "<font color='red'>$_GET[company_reg_number] already in use!</font>";
}
}

//check where the user is from
if(isset($_GET['userid'])){
	$qry = select_all_data_where("usedrs", "id", $_GET['userid']);
	$info = mysqli_fetch_array($qry);
	
if (mysqli_num_rows($qry)<1) {
 echo "<label>The user does not exist in the main database</label>";
}
else{
 echo "<font color='red'>$info[city]</font>";
}
}

?>