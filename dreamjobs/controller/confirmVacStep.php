<?php
session_start();
include_once "../config/DB.php";



        $vacid = $_GET['vacancyid'];
        $stepid = $_GET['StepID'];
        
        //from temp to real
        $queryGetTemp="SELECT ApplicantFormID,StepID,StepID+1 as nextstep, ApplicantStatusID,VacancyID,CreatedDate,CreatedBy from trvacancydetailtemp where VacancyID='".$vacid."'";
        		 $result=$conn->query($queryGetTemp);
                  while($temp=$result->fetch_assoc()){
                  	$ApplicantFormID=$temp['ApplicantFormID'];
                  	$StepIDTemp=$temp['StepID'];
                  	$StepIDNext=$temp['nextstep'];
                  	$ApplicantStatusID=$temp['ApplicantStatusID'];
                  	$VacancyID=$temp['VacancyID'];
                  	$CreatedDate=$temp['CreatedDate'];
                  	$CreatedBy=$temp['CreatedBy'];
                  	


                  	if($ApplicantStatusID==3){
                  		//delete bcs rejected
                  		$update="UPDATE trvacancydetail set ApplicantStatusID=3
                  				where ApplicantFormID='$ApplicantFormID'and StepID='$StepIDTemp' 
                  				and VacancyID ='$VacancyID'  ";	  
                  				$conn->query($update);  
                  		$querydel="delete from trvacancydetail 
                  		where vacancyid='$vacid' and ApplicantFormID='$ApplicantFormID' and stepid>$StepIDTemp ";
	          	 		$conn->query($querydel);  
                  	}else{
                  		//set next to to review
                  		$querynext="UPDATE trvacancydetail SET ApplicantStatusID=4 where 
	          	 				 VacancyID='$VacancyID' && ApplicantFormID='$ApplicantFormID' && StepID='$StepIDNext' ";
                  		$update="UPDATE trvacancydetail set ApplicantStatusID=2
                  				where ApplicantFormID='$ApplicantFormID'and StepID='$StepIDTemp' 
                  				and VacancyID ='$VacancyID'  ";	  
                  			
                  		

	          	 		$conn->query($update);  
	          	 		$conn->query($querynext);  
                  	}             	
                  }
                  

                  $delete ="delete from trvacancydetailtemp where vacancyid='$VacancyID'";
                  $conn->query($delete);       

        	if($stepid==4){


        		//update to close
        		$query="UPDATE trvacancysteptime SET StepStatus='Confirmed' where 
	            VacancyID='$vacid' && StepID=$stepid ";
	             $queryvacant="UPDATE trvacancy SET VacancyStatusID=2 where 
	            VacancyID='$vacid' ";
  				$conn->query($query);
	    		      $conn->query($queryvacant);
	        		 header("location:../Cmyjoblist.php");
        	}else{
                
      //  	go to next step
        	$query="select cast('$stepid' as int)+1 as stepnew";   
					 $resultget=$conn->query($query);
			$temp=$resultget->fetch_assoc();
			    $stepnew=$temp['stepnew'];
	        $query="UPDATE trvacancysteptime SET StepStatus='Confirmed' where 
	          VacancyID='$vacid' && StepID=$stepid ";
	        $querynext="UPDATE trvacancysteptime SET StepStatus='On Review' where 
	          VacancyID='$vacid' && StepID=$stepnew ";
	          $conn->query($query);
	          $conn->query($querynext);
	         header("location:../Cmyjoblist.php");
	       		
        	}
        		

  
?>