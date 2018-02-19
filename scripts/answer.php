
<?php
$connection = mysqli_connect("localhost","root","","mind")or die(mysqli_error());

$query = mysqli_query($connection, "SELECT
questions.question,
answers.`option`,
answers.answer,
answers.state
FROM
questions ,
answers
WHERE
questions.id = answers.question AND
answers.`option` = '".$_REQUEST['answer']."' AND 
questions.id = '".$_REQUEST['question']."'");
$w = mysqli_fetch_array($query);

if($w['state']=="Correct"){
	echo "<font color='green'>".$w['state']."</font>";
}
else {
echo "<font color='red'>".$w['state']."</font>";
}	
?>