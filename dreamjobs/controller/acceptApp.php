<?php
session_start();
include_once "../config/DB.php";

        $apid = $_GET['ApplicantFormID'];
        $vacid = $_GET['vacancyid'];
        $stepid = $_GET['StepID'];
        $admin=$_SESSION['userid'];
    
        $date="select curdate() as datenow";
        $res=$conn->query($date);
       	$temp=$res->fetch_assoc();
       	$now=$temp['datenow'];

        	
        		 $query="Insert into trvacancydetailtemp (ApplicantFormID, ApplicantStatusID,StepID,VacancyID,CreatedDate,CreatedBy)
        		 			values ('$apid',2,'$stepid','$vacid','$now','$admin')";	
        		 	//		echo $query;
	                $conn->query($query);
        		 		
	               header("location:../Cdetailjob.php?id=$vacid");
	       		
        

       	

  
?>