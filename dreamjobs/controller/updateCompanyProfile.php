<?php

include_once("../config/DB.php");

$email=$_POST['email'];
$phone=$_POST['phone'];
$size=$_POST['size'];
$website=$_POST['website'];
$name=$_POST['name'];
$desc=$_POST['desc'];
$dir_image="../asset";
$file = md5($_FILES['image']['name'].uniqid());

if(move_uploaded_file($_FILES['image']['tmp_name'],"../img/asset".$file)==true){
    $query="UPDATE mscompany set CompanyEmail='$email',CompanyPhone='$phone',CompanySize='$size',
    CompanyWebsite='$website',CompanyName='$name',CompanyDesc='$desc',CompanyImage='$file' where 1";
}
else{

    $query="UPDATE mscompany set CompanyEmail='$email',CompanyPhone='$phone',CompanySize='$size',
        CompanyWebsite='$website',CompanyName='$name',CompanyDesc='$desc' where 1";
}
$conn->query($query);
header("location:../Ccomprofile.php");

?>