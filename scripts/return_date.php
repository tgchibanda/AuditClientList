<?php
include 'functions.php';

if(isset($_GET['days'])){

	$initial = $_GET['initial'];
	$string = (explode("-",$initial));
	$year = $string[2];
	echo $year + $_GET['days'];
}
?>