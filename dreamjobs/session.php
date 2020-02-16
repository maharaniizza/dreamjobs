<?php
    session_start();

    if(!isset($_SESSION['user_token'])){
        $_SESSION['user_token']=uniqid();  
        
      }
      
?>