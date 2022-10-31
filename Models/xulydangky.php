<?php
    session_start();
    require_once "../MySQL/db_module.php";
    require_once "../Models/Validate_module.php";
    require_once "../Models/users_module.php";

    $link=NULL;
    taoKetNoi($link);
    $isValid=false;

    if(isset($_POST['signup'])){
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repeatpassword']) && isset($_POST['email'])){
            $isValid = ($_POST['password'] == $_POST['repeatpassword']); //Mật khẩu và nhập lại mk phải trùng
            $isValid = $isValid && validateLen($_POST['username']); //KT điều kiện username
            $isValid = $isValid && validateLen($_POST['password']); //KT điều kiện password
            $isValid = $isValid && validateEmail($_POST['email']); //KT điều kiện email
            if ($isValid){ //TH các điều kiện thỏa mãn
                if(existsUsername($link, $_POST['username'])){
                    mysqli_close($link);
                    header("Location: signup.php?msg=duplicate&username=".$_POST['username']."&email=".$_POST['email']);
                }
                if(existsEmail($link, $_POST['email'])){
                    mysqli_close($link);
                    header("Location: signup.php?msg=duplicate&username=".$_POST['username']."&email=".$_POST['email']);
                }
                else{ //Email & username phải chưa tồn tại trong csdl thì mới được đăng ký
                    dangky($link, $_POST['username'], $_POST['password'], $_POST['email']);
                    mysqli_close($link);
                    header("Location: signup.php?msg=done");
                }
            }
            else{ //Nếu các đk không thỏa mãn
                mysqli_close($link);
                header("Location: signup.php?msg=unvalid-data&username=".$_POST['username']."&email=".$_POST['email']);
            }
        }  
    }
 
?>