<?php
include "functions.php";

if(!empty($_POST["keyword"])) {
$query =mysqli_query(conn(), "SELECT * FROM clients WHERE company_name like '" . $_POST["keyword"] . "%' ORDER BY company_name LIMIT 0,6");

if(!empty($query)) {
?>
<ul id="country-list">
<?php
foreach($query as $country) {
?>
<li onClick="selectCountry('<?php echo $country["company_name"]; ?>');"><?php echo $country["company_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>