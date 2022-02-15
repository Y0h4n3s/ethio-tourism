
<?php
session_start();
$user_model= $_SESSION["account-type"];
     if($user_model == "admin"){
        include_once('pages/adminheader.php');
     }
    else if($user_model == "user"){
        include_once('pages/userheader.php');       
    }
    else{
       include_once('pages/mainheader.php');
    }
?>