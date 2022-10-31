<?php
    function dangky($link, $userName, $password, $email){
        chayTruyVanTraVeDL($link, "INSERT into tbl_users value(NULL,
                                                            '".mysqli_real_escape_string($link, $userName)."',
                                                            '".md5($password)."',
                                                            '".$email."'
                                                            )");
    }

    function dangnhap($link, $userName, $password){
        $res = chayTruyVanTraVeDL($link, "SELECT count(*) from tbl_users where username='".mysqli_real_escape_string($link, $userName)."' and password = '". md5($password)."'");
        $row = mysqli_fetch_row($res);
        mysqli_free_result($res);
        if ($row[0]!=0){
            $_SESSION['username'] = $userName;
            return true;
        }
        else{
            return false;
        }
    }

    function dangxuat(){
        if (isset($_SESSION['username'])){
            unset($_SESSION['username']);
            return true;
        }
        else{
            return false;
        }
    }

    function getId($link, $userName){ //Lấy id của bảng tbl_users rồi chèn vô cho tbl_info_user
        $res = chayTruyVanTraVeDL($link, "SELECT * from tbl_users where username='".$userName."'");
        while($row = mysqli_fetch_assoc($res)){
            $id= $row['id_user'];
        }
        mysqli_free_result($res);
        return $id;
    }

    function getAddress($link, $id_user){ //Lấy địa chỉ của user = username
        $res = chayTruyVanTraVeDL($link, "SELECT * from tbl_info_users where id_user='".$id_user."'");
        while($row = mysqli_fetch_assoc($res)){
            $address= $row['diachi'];
        }
        mysqli_free_result($res);
        return $address;
    }

    function insertInfo($link, $id, $name, $phone, $address, $sex, $date){ //hàm cho insert profile
        $res = ChayTruyVanTraVeDL($link, "INSERT into tbl_info_users VALUES ('$id','$name', '$phone', '$address', '$sex', '$date')");
    }

    function updateInfo($link, $id, $name, $phone, $address, $sex, $date){ //hàm cho update profile
        $res = ChayTruyVanKhongTraVeDL($link, "UPDATE tbl_info_users SET id_user='$id', ten='$name', sdt='$phone', diachi='$address', gioitinh='$sex', ngaysinh='$date' WHERE id_user='$id'");
    }

    function checkExistUser($link, $id){ //Hàm kiểm tra đã tồn tại user trong tbl_info_users hay chưa
        $res = ChayTruyVanTraVeDL($link, "SELECT count(*) from tbl_info_users WHERE id_user='$id'");
        $row = mysqli_fetch_row($res);
        if ($row[0]!=0){
            return true;
        }
        else return false;
    }
?>