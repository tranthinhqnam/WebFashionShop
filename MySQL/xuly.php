<?php
include 'db_module.php';
$link = NULL;
TaoKetNoi($link);

if (isset($_POST['upload'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($file_parts));
    $expensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }

    $image = $_FILES['image']['name'];
    $target = "photo/" . basename($image);
    // $sql = "INSERT INTO tbl_sanpham (hinhanh) VALUES ('$image')";
    $sql = "UPDATE tbl_sanpham SET hinhanh = '$image' WHERE id_sp=11";
    mysqli_query($link, $sql);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo '<script language="javascript">alert("Đã upload thành công!");</script>';
    } else {
        echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
    }
}
$result = mysqli_query($link, "SELECT * FROM tbl_sanpham");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="style.css">
</head>

</html>