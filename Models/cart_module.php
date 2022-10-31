<?php

function themhangvaogio($hang)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSION['giohang'];
        if (!array_key_exists($hang["id"], $giohang))    //check hàng đã có trong giỏ chưa
            $giohang[$hang["id"]] = $hang;
        $_SESSION['giohang'] = $giohang;
    } else {
        $giohang[$hang["id"]] = $hang;
        $_SESSION['giohang'] = $giohang;
    }
}
function xoahangkhoigio($key)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSION['giohang'];
        unset($giohang[$key]);
        $_SESSION['giohang'] = $giohang;
    }
}
function capnhathangtrongio($key, $soluong)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSION['giohang'];
        $giohang[$key]['soluong'] = $soluong;
        $_SESSION['giohang'] = $giohang;
    }
}
function tinhtien()
{
    $sum = 0;
    $giohang = $_SESSION['giohang'];
    foreach ($giohang as $v)
        $sum += $v['soluong'] * $v['gia'];
    return number_format($sum);
}

function tamluusp($sp) //Lưu vô đây để f5 product k mất dữ liệu
{
    $bonho[$sp["id"]] = $sp;
    if ($bonho > 1) {
        xoasp(0);
    }
    $_SESSION['bonho'] = $bonho;
}
function xoasp($key) //Chỉ cho tồn tại 1 sp trong bộ nhớ tạm
{
    if (isset($_SESSION['bonho'])) {
        $sp = $_SESSION['bonho'];
        unset($sp[$key]);
        $_SESSION['bonho'] = $sp;
    }
}
?>