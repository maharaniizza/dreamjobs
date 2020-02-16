<?php

$conn= mysqli_connect('localhost','root','','dreamjobs');

if(!$conn){
    die('connection error'. mysqli_connect_errno().' - '.mysqli_connect_error());
}

?>