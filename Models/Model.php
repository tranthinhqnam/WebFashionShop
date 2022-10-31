<?php
    require_once("../Models/Sanpham.php");
    require_once("../MySQL/db_module.php");

    class Model{
        public function getProductList($from, $amount){ //Lấy ds sản phẩm
            $link = NULL;
            TaoKetNoi($link);
            $countProduct = ChayTruyVanTraVeDL($link, " SELECT count(*) from tbl_sanpham"); //Đếm số sp
            $row = mysqli_fetch_row($countProduct);
            $total = ceil($row[0] / prosPerPage);
            $res = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_sanpham WHERE id_sp>3 limit " . $from . "," . $amount);
            $data = array();
            while($rows = mysqli_fetch_assoc($res)){
                $products =  new Sanpham($rows['id_sp'], $rows['tensp'], $rows['mota'], $rows['gia'], $rows['hinhanh'], $rows['id_dm'], $rows['anhphu1'], $rows['anhphu2']);
                array_push($data, $products);
            }
            giaiPhongBoNho($link, $res);
            return $data;
        }

        // public function getProduct($id_sp){ //trả về 1 sản phẩm dựa vào id_sp
        //     $allProduct = $this -> getProductList($from);
        //     foreach($allProduct as $product){
        //         if ($product -> getid() === $id_sp){
        //             return $product;
        //         }
        //     }
        //     return null;
        // }

        public static function searchForSample(){ //trả về 3 sản phẩm đầu tiên trong csdl
            $link = NULL;
            TaoKetNoi($link);
            $res = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_sanpham WHERE id_sp<4");
            $data = array();
            while($rows = mysqli_fetch_assoc($res)){
                $products =  new Sanpham($rows['id_sp'], $rows['tensp'], $rows['mota'], $rows['gia'], $rows['hinhanh'], $rows['id_dm'], $rows['anhphu1'], $rows['anhphu2']);
                array_push($data, $products);
            }
            giaiPhongBoNho($link, $res);
            return $data;
        }
    }
?>