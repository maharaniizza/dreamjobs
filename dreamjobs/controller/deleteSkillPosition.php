<?php
include_once("../config/DB.php");

$PositionID=$_GET['PositionID'];
$SkillID=$_POST['SkillID'];


$query="DELETE FROM trpositionskilldetail where PositionID='$PositionID' and SkillID='$SkillID'";
$result=$conn->query($query);

header("location:../Cpositions.php");
?>