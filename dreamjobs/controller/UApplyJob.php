<?php
session_start();
include_once "../config/DB.php";

        $id = $_GET['id'];

       $query2="select ApplicantFormID from trapplicantform WHERE UserID = '".$_SESSION['userid']."'";
        $res = $conn->query($query2);
       	

       
        while($data=$res->fetch_assoc())
       		
  	  $appid=$data['ApplicantFormID'];
  		$idvacant=$data['id'];
        $query="
        INSERT INTO `trvacancydetail` (`ApplicantFormID`, `StepID`, `ApplicantStatusID`, `VacancyID`, `FlagStatus`, `CreatedDate`, `UpdatedDate`, `CreatedBy`, `UpdatedBy`) 
        VALUES ('$appid', '1', '4', '$id', NULL, curdate(), NULL, NULL, NULL),
               ('$appid', '2', '1', '$id', NULL, curdate(), NULL, NULL, NULL),
               ('$appid', '3', '1', '$id', NULL, curdate(), NULL, NULL, NULL),
               ('$appid', '4', '1', '$id', NULL, curdate(), NULL, NULL, NULL)";
            //   echo $query;
 			$result=$conn->query($query);
 			 header("location:../UAppliedJob.php");

  
?>