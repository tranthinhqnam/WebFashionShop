<?php
require_once "config.php";

function TaoKetNoi(&$link){
    $link = mysqli_connect(HOST,USER,PASSWORD,DB);
    if(mysqli_connect_error()){
        echo "Lỗi kết nối máy chủ: ".mysqli_connect_error();       
    }       
}
function ChayTruyVanTraVeDL($link,$q){
    $result = mysqli_query($link,$q);
    return $result;
}
function ChayTruyVanKhongTraVeDL($link,$q){
    $result = mysqli_query($link,$q);
    return $result;
}
function giaiPhongBoNho($link,$result){
    if($result != null){
        mysqli_free_result($result);
    }
    mysqli_close($link);
}
?>