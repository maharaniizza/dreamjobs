<?php
//session_start();
include "../config/DB.php";

    $id = $_GET['ApplicantFormId'];
    $skillName = $_POST['skillname'];

    $currentTimeinSeconds=time();
    $date=date('Y-m-d', $currentTimeinSeconds);


    $query = "INSERT INTO trapplicantskilldetail(SkillID,ApplicantFormID,CreatedDate,UpdatedDate) VALUES('$skillName','$id', curDate(),'$date')";

    $result=$conn->query($query);
        
    header("location:../UMyProfile.php");


?>