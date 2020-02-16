<?php
include('../session.php');
include_once "../config/DB.php";

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if($request_method=='POST'){

    $action = $_REQUEST['action'];


    if($action=='register'){
    
        $firstname=htmlentities($_REQUEST['firstname']);
        $lastname=htmlentities($_REQUEST['lastname']);
        $email=htmlentities($_REQUEST['email']);
        $password=htmlentities($_REQUEST['password']);
        $confpass=htmlentities($_REQUEST['confpass']);
        $id=$_REQUEST['roleid'];

       //csrf protection 
       $token=$_REQUEST['token'];
       if(!isset($token)||$token!=$_SESSION['user_token']){
           header("../index.php");
       }
      

        $exist="SELECT *FROM msuser where UserEmail='$email'";
        $result=$conn->query($exist);
        if($firstname==null){
            $_SESSION['errreg']= "First name must be fill";
            header("location:../Uregister.php");
        }
        else if($lastname==null){
            $_SESSION['errreg']= "Last name must be fill";
            header("location:../Uregister.php");
        }
       else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errreg']= "Invalid e-mail format";
        header("location:../Uregister.php");
        }

        else if($password==null){
            $_SESSION['errreg']= "Last name must be fill";
            header("location:../Uregister.php");
        }

        else if($password!=$confpass){
            $_SESSION['errreg']= "Password must be same";
            header("location:../Uregister.php");
        }

        else if($result->num_rows>0){
            $_SESSION['errreg']= "Email is already taken";
            header("location:../Uregister.php");
        }

        


        else{
             $prefix="USR";
            $prefix2="APL";
            $idcatch="0";          
            $hash=password_hash($password,PASSWORD_BCRYPT);

            $queryid="select UserID from msuser";
            $resultid=$conn->query($queryid);
            if($resultid->num_rows>0){
            $queryget="select cast(substring(UserID,4,3) as int)+ 1 as id from msuser order
            by UserID desc limit 1";
            $resultget=$conn->query($queryget);
            $temp=$resultget->fetch_assoc();
            $idcatch=$temp['id'];
            }
            $newID=sprintf("%'03d", $idcatch);
            $idFix= $prefix . '' . $newID;
            // echo $queryget;
            // die();
            $idFix2= $prefix2 . '' . $newID;
            $query="INSERT INTO msuser (UserID,RoleID,FirstName,LastName,UserEmail,UserPassword)values('$idFix','$id','$firstname','$lastname','$email','$hash')";
            $result=$conn->query($query);
            if($id==1){
            $query2="INSERT INTO trapplicantform (ApplicantFormId,UserID,createddate)values('$idFix2','$idFix',curdate())";
            $result2=$conn->query($query2);
            }
            else if($id==2){
            $prefix="STF";
            $idcatch="0";
            $ComID=$_POST['ComID'];

            $queryid="select CompanyAdminId from mscompanyadmin";
            $resultid=$conn->query($queryid);
            if($resultid->num_rows>0){
            $queryget="select cast(substring(CompanyAdminId,6,3) as int)+ 1 as id from mscompanyadmin order
            by CompanyAdminId desc limit 1";
            $resultget=$conn->query($queryget);
            $temp=$resultget->fetch_assoc();
            $idcatch=$temp['id'];
            }
            $newID=sprintf("%'03d", $idcatch);
            $idFixAdmin= $prefix . '' . $newID;
            $query2="INSERT INTO mscompanyadmin(CompanyAdminId,UserID,CompanyID)values('$idFixAdmin','$idFix','$ComID')";
            $conn->query($query2);
            }
            
            if($result){
                if($id==1){
                   header("location:../index.php");
                }
                else if($id==2){
                   header("location:../Cmanageadmin.php");
                }

            }
            else{
                echo "gagal";
                die();
            }
        }
        }

    else if($action=='login'){
        
        
        
        htmlentities($email=$_REQUEST['email']);
        htmlentities($password=$_REQUEST['password']);
        
        //csrf protection 
       $token=$_REQUEST['token'];
       if(!isset($token)||$token!=$_SESSION['user_token']){
           header("location:../index.php");
       }
        

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errlogin']= "Invalid e-mail format";
            header("location:../index.php");
        }

        else if($password==null){
            $_SESSION['errlogin']= "Password must be fill";
            header("location:../index.php");
        }

        else{
            $query=mysqli_prepare($conn,"SELECT *FROM msuser where UserEmail=?");
            mysqli_stmt_bind_param($query,"s",$email);
            mysqli_stmt_execute($query);
            $result=mysqli_stmt_get_result($query);
            
            
            if($result->num_rows>0){
                $temp=$result->fetch_assoc();
                    
                if(password_verify($password,$temp['UserPassword'])){
                    $_SESSION['user']=$temp['FirstName'];
                    $_SESSION['RoleID']=$temp['RoleID'];
                    $_SESSION['userid']=$temp['UserID'];
                    $_SESSION['menu']=1;
                    
                    setcookie('user', $temp['FirstName'], time() + 1800);

                    if($temp['RoleID']==1){
                        $queryapp=
                         mysqli_prepare($conn,"SELECT ApplicantDOB, ApplicantGender, ApplicantAddress, ApplicantPhone, ApplicantIdentityNo,EducationTypeID,LastEducationName,LastEducationMajor from trapplicantform a join msuser b on a.userid=b.userid where a.userid='".$temp['UserID']."' ");
                             mysqli_stmt_execute($queryapp);
                            $resultget=mysqli_stmt_get_result($queryapp);
                            $temp=$resultget->fetch_assoc();
                            if($temp['ApplicantDOB']==null||$temp['ApplicantGender']==null||$temp['ApplicantAddress']==null||
                               $temp['ApplicantPhone']==null||$temp['ApplicantIdentityNo']==null||$temp['EducationTypeID'] ==null
                               ||  $temp['LastEducationName']==null||$temp['LastEducationMajor']==null)
                            {
                                 header("location:../UDashboardNew.php");
                            } else{
                                 header("location:../UDashboardExists.php");
                            }  
                    }
                    else{
                        header("location:../Ccompdashboard.php");
                    }


                    $currentTimeinSeconds=time();
                    $date=date('Y-m-d', $currentTimeinSeconds);
                    $query="UPDATE msuser SET LastLogin='$date' where UserEmail='$email'";
                    $conn->query($query);
                    
                }
                else{
                    $_SESSION['errlogin']="wrong password";
                    header("location:../index.php");
                }
            }
            else{
                $_SESSION['errlogin']="User not found";
                header("location:../index.php");
            }

            
        }

    }
    else if ($action=='logout') {
        session_destroy();
        header("location:../index.php");
}
     
    

    }
    
    
    
    ?>