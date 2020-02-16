<?php
session_start();
include_once "../config/DB.php";

        $apid = $_GET['ApplicantFormID'];
        $vacid = $_GET['vacancyid'];
        $stepid = $_GET['StepID'];

        		$query="UPDATE trvacancydetailtemp SET ApplicantStatusID=2 where 
	         		 VacancyID='$vacid' && ApplicantFormID='$apid' && StepID=$stepid ";
	            // echo $query;
	        		 $conn->query($query);
	        		 header("location:../Cdetailjob.php?id=$vacid");
        
           	

  
?>