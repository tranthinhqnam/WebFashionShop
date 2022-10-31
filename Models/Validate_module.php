<?php
//Độ dài Username từ 8 đến 30 kí tự
function validateLen($userName){
    return strlen($userName)>=8 && strlen($userName)<=30;
}

//Email phải có dạng abc@xyz
function validateEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL)!=false?true:false;
}

//KT Username có tồn tại chưa
function existsUsername($link, $userName){
    $res = chayTruyVanTraVeDL($link, "SELECT count(*) from tbl_users where username='".$userName."'");
    $row = mysqli_fetch_row($res);
    mysqli_free_result($res);
    return $row[0]>0;
}

//KT Email có tồn tại chưa
function existsEmail($link, $email){
    $res = chayTruyVanTraVeDL($link, "SELECT count(*) from tbl_users where email='".$email."'");
    $row = mysqli_fetch_row($res);
    mysqli_free_result($res);
    return $row[0]>0;
}
?>
