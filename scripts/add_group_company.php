<?php
	include 'functions.php';
	
	if(isset($_POST['add_group'])){	
	
		mysqli_query(conn(),"insert into group_companies (group_name, date) values ('$_POST[group_name]', '$date')") or die(mysqli_error());
		
		audit("Added Group", "Added ".$_POST['group_name']);
	}
?>

