<?php

include("../config/DB.php");

$test=$_REQUEST['test'];
die();

$id=$_GET['VacancyID'];

$query="DELETE FROM trvacancy where VacancyID='$id'";
$conn->query($query);

header("location:../Cmyjoblist.php");


?>