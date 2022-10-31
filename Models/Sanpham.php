<?php
class Sanpham{
    private $id_sp;
    private $tensp;
    private $mota;
    private $gia;
    private $hinhanh;
    private $id_danhmuc;
    private $anhphu1;
    private $anhphu2;

    public function getid_sp(){return $this -> id_sp;}
    public function gettensp(){return $this -> tensp;}
    public function getmota(){return $this -> mota;}
    public function getgia(){return $this -> gia;}
    public function gethinhanh(){return $this -> hinhanh;}
    public function getid_danhmuc(){return $this -> id_danhmuc;}
    public function getanhphu1(){return $this-> anhphu1;}
    public function getanhphu2(){return $this-> anhphu2;}

    public function __construct($id_sp, $tensp, $mota, $gia, $hinhanh, $id_danhmuc, $anhphu1, $anhphu2)
    {
        $this -> id_sp = $id_sp;
        $this -> tensp = $tensp;
        $this -> mota = $mota;
        $this -> gia = $gia;
        $this -> hinhanh = $hinhanh;
        $this -> id_danhmuc = $id_danhmuc;
        $this -> anhphu1 = $anhphu1;
        $this -> anhphu2 = $anhphu2;
    }

}
?>