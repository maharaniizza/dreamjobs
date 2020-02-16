<?php

session_start();
setcookie('user', $temp['firstName'], time() - 1800);
session_destroy();
header("location:../index.php");

?>  