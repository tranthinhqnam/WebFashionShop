<?php
require_once "../MySQL/db_module.php";
require_once "../Models/users_module.php";
include_once "../Models/xulydangnhap.php";

$link =NULL;
TaoKetNoi($link);

//Nếu là lần đăng nhập đầu thì insert, có info user rồi thì update
if(isset($_POST['update'])){
    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['date'])){            
        $id = getId($link, $_SESSION['username']);
        if(checkExistUser($link, $id)){
            updateInfo($link, $id, $_POST['name'], $_POST['phone'], $_POST['address'], $_POST['sex'], $_POST['date']);
            mysqli_close($link);
            header("Location: account.php?msg=done");
        }
        else{
            insertInfo($link, $id, $_POST['name'], $_POST['phone'], $_POST['address'], $_POST['sex'], $_POST['date']);
            mysqli_close($link);
            header("Location: account.php?msg=done");            
        }
    }
    else{
        mysqli_close($link);
        header("Location: updateProfile.php?msg=update-fail");
    }
}
?>