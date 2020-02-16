<?php 
session_start();
include "../config/DB.php";

    $RecID = $_GET['RecID'];

    $query = "DELETE trworkexperience FROM trworkexperience WHERE RecID='$RecID'";

    $result=$conn->query($query);
        
    header("location:../UMyProfile.php");
?>