<?php

include("../config/DB.php");
$id=$_GET['UserID'];

$query="DELETE FROM msuser where UserID='$id'";
$conn->query($query);

header("location:../Cmanageadmin.php");


?>