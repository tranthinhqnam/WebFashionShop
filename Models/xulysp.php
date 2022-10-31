<?php
require_once "../Models/cart_module.php";
if (isset($_POST['Info'])) {
    $sp = array(
        "id" => $_POST['id'], "ten" => $_POST['ten'], "gia" => $_POST['gia'],
        "hinhanh" => $_POST['hinhanh'], "mota" => $_POST['mota'], "key" => 1
    );
    tamluusp($sp);
    include_once "../Views/product.php";
}
?>