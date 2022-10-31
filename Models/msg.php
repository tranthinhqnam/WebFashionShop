<?php
if(isset($_GET['msg'])){
    if($_GET['msg'] =="done"){
        echo "<span class='msg' style ='color:green'>
            Sign up success!
        </span>"."<a href=../Views/signin.php> Please come back to sign in</a>";
    }
    else{
        if($_GET['msg']=="unvalid-data"){
            echo "<br/>";
            echo "<div class='msg' style ='color:red'>
                Please check your input data!
            </div>";
        }
        else{
            if($_GET['msg'] == "duplicate"){
                echo "<br/>";
                echo "<div class='msg' style ='color:orange'>
                Username or Email existed!
                </div>";
            }
            else{
                if($_GET['msg']=="login-fail"){
                echo "<div class='msg' style ='color:red;'>
                Username or password is wrong!
                </div>";
                }
            }
        }
    } 
}
?>