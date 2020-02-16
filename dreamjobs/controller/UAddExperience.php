<?php
session_start();
include "../config/DB.php";

        $id = $_GET['ApplicantFormId'];

        $companyName = $_POST['CompanyName'];
        $lastPosition = $_POST['LastPosition'];
        $lastSalary = $_POST['LastSalary'];

        $startMonth = $_POST['StartMonthDate'];
        $startYear = $_POST['StartYearDate'];
        $EndMonth = $_POST['EndMonthDate'];
        $EndYear = $_POST['EndYearDate'];

        $workPeriod = "1 ".$startMonth." ".$startYear."-31 ".$EndMonth." ".$EndYear;

        $currentTimeinSeconds=time();
        $date=date('Y-m-d', $currentTimeinSeconds);

        $query = "INSERT INTO trworkexperience(ApplicantFormID,CompanyName,WorkPeriod,LastPosition,LastSalary,CreatedDate,UpdatedDate)
        VALUES('$id','$companyName','$workPeriod','$lastPosition','$lastSalary',curDate(),'$date')";

        $result=$conn->query($query);
        header("location:../UMyProfile.php");
  
?>