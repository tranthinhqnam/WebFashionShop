<?php
require_once "../Models/users_module.php";
include_once "../Models/xulydangnhap.php";

$res = dangxuat();
header("Location: ../Views/Index.php");
?>