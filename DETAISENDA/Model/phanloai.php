<?php
class phanloai
{
    //thuoc tinh 
    var $maloai = 0;
    var $tenloai = null;
    var $anhloai =null;
    //hamtao
    public function __construct()
    {
    }
    //phuongthuc
function Danhmucspitem(){
  // b1 kết nối được với database xshop
  $db=new connect();
  // b2: yêu cầu thực câu truy vấn
  $select="select * from phanloai where maloai" ;
  $result=$db->getList($select);
  return $result;
}
//Phương thức
public function chitietdanhmucsp($maloai){
  //Bước 1 kết nối với database
  $conn=new connect();
  //Bước 2: Truy cập
  $select="SELECT * FROM `phanloai` a inner join 
  sanpham b on a.maloai=b.maloai WHERE b.maloai='$maloai'";
  $result=$conn->getList($select);
  return $result;
}
}