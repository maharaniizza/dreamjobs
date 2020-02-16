<?php
session_start();
include_once "../config/DB.php";

        $Date=$_POST['date'];
        $Month=$_POST['month'];
        $Year=$_POST['year'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $phoneNumber=$_POST['phoneNumber'];
        $IdentityNo=$_POST['IdentityNo'];
        $lastEducationMajor=$_POST['lastEducationMajor'];
        $lastEducationName=$_POST['lastEducationName'];
        $SalaryRangeID = $_POST['LastSalary'];
        //echo $SalaryRangeID;

        $DOB = $Year."-".$Month."-".$Date;

        if($lastEducationMajor == "SMA"){
                $EducationTypeID = "1";
        }
        else if($lastEducationMajor == "S1"){
                $EducationTypeID = "2";
        }
        if($lastEducationMajor == "S2"){
                $EducationTypeID = "3";
        }
        else{
                $EducationTypeID = "4";
        }

        $currentTimeinSeconds=time();
        $date=date('Y-m-d', $currentTimeinSeconds);

        if($Date =="date" || $Month == "month" || $Year == "year"){
                $_SESSION['error'] = "Date of Birth Must be Selected";
                header("location:../UMyProfileEdit.php");
        }
        else if($address == null){
                $_SESSION['error'] = "Address Must be Fill";
                header("location:../UMyProfileEdit.php");
        }
        else if($phoneNumber == null){
                $_SESSION['error'] = "Phone Number Must be Fill";
                header("location:../UMyProfileEdit.php");
        }
        else if($IdentityNo == null){
                $_SESSION['error'] = "Identity Number Must be Fill";
                header("location:../UMyProfileEdit.php");
        }
        else if($lastEducationName == null){
                $_SESSION['error'] = "Last Education Name Must be Fill";
                header("location:../UMyProfileEdit.php");
        }
        else{
                $query = "UPDATE trapplicantform SET ApplicantDOB='$DOB' , ApplicantGender='$gender' , 
                ApplicantAddress='$address' , ApplicantPhone='$phoneNumber' , ApplicantIdentityNo='$IdentityNo' ,EducationTypeID ='$EducationTypeID', 
                LastEducationMajor='$lastEducationMajor' ,LastEducationName='$lastEducationName' , SalaryRangeID='$SalaryRangeID' ,
                UpdatedDate='$date' WHERE UserID = '".$_SESSION['userid']."'";
                //echo $query;
                $result=$conn->query($query);
                
                header("location:../UMyProfile.php");
        }
        
  
?>