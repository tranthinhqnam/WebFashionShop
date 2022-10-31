<?php
session_start();

require_once "../MySQL/db_module.php";
require_once "../Models/users_module.php";

$link =NULL;
TaoKetNoi($link);

if(isset($_POST['signin'])){
    if(isset($_POST['username']) && isset($_POST['password'])){
        if(dangnhap($link, $_POST['username'], $_POST['password'])){
            mysqli_close($link);
            header("Location: ../Views/account.php");            
        }else{
            mysqli_close($link);
            header("Location: signin.php?msg=login-fail");
        }
    }
    else{
        mysqli_close($link);
        header("Location: signin.php");
    }   
}

?>