<?php
include_once("../config/DB.php");
$id=htmlentities($_POST['UserID']);
$firstname=htmlentities($_POST['firstname']);
$lastname=htmlentities($_POST['lastname']);
$email=htmlentities($_POST['email']);
$password=htmlentities($_POST['password']);
$confpass=htmlentities($_POST['confpass']);


    if($password==null){
    $query="UPDATE msuser SET FirstName='$firstname',LastName='$lastname',UserEmail='$email' where UserID='$id'";
    $conn->query($query);        
    }
    else{
        
        if($password!=$confpass){
        $_SESSION['erredit']= "Password must be same";
        header("location:../register.php");
        }
        $hash=password_hash($password,PASSWORD_BCRYPT);
        $query="UPDATE msuser SET FirstName='$firstname',LastName='$lastname',UserEmail='$email',UserPassword='$hash' where UserID='$id'";
        $conn->query($query);
    }
    header("location:../Cmanageadmin.php");








?>