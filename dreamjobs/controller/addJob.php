<?php
session_start();
include_once("../config/DB.php");


$jobtitle=htmlentities($_POST['jobtitle']);
$position=htmlentities($_POST['position']);
$location=htmlentities($_POST['location']);
$salary=htmlentities($_POST['salary']);
$edureq=htmlentities($_POST['edureq']);

$stepdate1=htmlentities($_POST['step1']);
$stepdate2=htmlentities($_POST['step2']);
$stepdate3=htmlentities($_POST['step3']);
$stepdate4=htmlentities($_POST['step4']);

$status=$_POST['status'];
$companyid=$_POST['CompanyID'];

$prefix="VAC";
$idcatch="0";
$queryid="select VacancyID from trvacancy";
$resultid=$conn->query($queryid);
if($resultid->num_rows>0){
$queryget="select cast(substring(VacancyID,6,3) as int)+ 1 as VacancyID,curdate() as datenow from trvacancy order by VacancyID desc limit 1";
$resultget=$conn->query($queryget);
$temp=$resultget->fetch_assoc();
$idcatch=$temp['VacancyID'];

}
$newID=sprintf("%'03d", $idcatch);
$idFix= $prefix . '' . $newID;
$iduser= $_SESSION['userid'];

$datenow= $temp['datenow'];


$query="INSERT INTO trvacancy (VacancyTitle,PositionID,SalaryRangeID,EducationTypeID,VacancyLocation ,VacancyStatusId,CompanyID,VacancyID,createddate,createdby) 
                        values
                        ('$jobtitle','$position','$salary','$edureq','$location','$status','$companyid','$idFix',curdate(),'$iduser') ";
 $query2="
        INSERT INTO `trvacancysteptime` (`VacancyID`,  `Time`,`StepID`, `StepStatus`, `CreatedDate`, `CreatedBy`) 
        VALUES ('$idFix', '$stepdate1', '1', 'On Review',  '$datenow', '$iduser'),
               ('$idFix', '$stepdate2', '2', 'Coming','$datenow', '$iduser'),
               ('$idFix', '$stepdate3', '3', 'Coming','$datenow', '$iduser'),
               ('$idFix', '$stepdate4', '4', 'Coming','$datenow', '$iduser')";

  		 	$conn->query($query);                        
             $conn->query($query2);
             
    header("location:../Cmyjoblist.php");


?>