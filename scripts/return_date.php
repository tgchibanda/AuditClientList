<?php
include 'functions.php';

if(isset($_GET['days'])){
	echo Date('Y') + $_GET['days'];
}
?>