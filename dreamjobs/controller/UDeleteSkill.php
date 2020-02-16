<?php 
session_start();
include "../config/DB.php";

    $id = $_GET['SkillID'];

    $query = "DELETE B FROM msskill A
    JOIN trapplicantskilldetail B ON A.SkillID = B.SkillID
    JOIN trapplicantform C ON B.ApplicantFormID = C.ApplicantFormId
    WHERE B.SkillID = '$id'";

    $result=$conn->query($query);
        
    header("location:../UMyProfile.php");

?>