<?php
require_once "Validate_module.php";
require_once "../MySQL/db_module.php";

if (isset($_POST['email'])) {
    $link = null;
    TaoKetNoi($link);
    $email = $_POST['email'];
    if (!existsEmail($link, $email) == 0) {
        header("Location:../Views/passrecover.php?isvalidate=true&email=" . $email);
    } else {
        header("Location:../Views/passrecover.php?isvalidate=false");
    }
} else {
    header("Location:../Views/passrecover.php");
}
giaiPhongBoNho($link, null);
?>
