<?php
error_reporting(0);
include 'functions.php';

 //Username validation
if (if_exists("users", "username", $_GET['username'])<1) {
 //echo "<label>Available</label>";
}
else{
 echo "<font color='red'>$_GET[username] already in use!</font>";
}


//Email validation
if (if_exists("users", "email", $_GET['email'])<1) {
 //echo "<label>Available</label>";
}
else{
 echo "<font color='red'>$_GET[email] already in use!</font>";
}


?>