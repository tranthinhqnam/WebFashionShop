<?php
session_start();
require_once "../Models/cart_module.php";
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "Add to cart":
            $hang = array(
                "id" => $_POST['id'], "ten" => $_POST['ten'], "gia" => $_POST['gia'],
                "hinhanh" => $_POST['hinhanh'], "mota" => $_POST['mota'], "soluong" => 1
            );
            themhangvaogio($hang);
            include_once "../Views/cart.php";
            break;
    }
}
else {
    include_once "../Views/cart.php";
}

?>