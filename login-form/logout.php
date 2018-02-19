<?php

	session_start();
	include '../scripts/functions.php';
	$date = date('m/d/Y h:i:s', time());
	audit("Logout", "Systems Logout");
	$_SESSION['username']= "";

?>
<script>
alert("Logged Out")
location='index.php'
</script>