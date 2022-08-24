<?php
class sanpham
{
    //thuoc tinh 
    var $masp = 0;
    var $tensp = null;
    var $dongia = 0;
    var $giamgia = 0;
    var $hinh = null;
    var $nhom = 0;
    var $maloai = null;
    var $luotxem = 0;
    var $ngaylap = null;
    var $mota = null;
    var $soluongton = 0;
    var $mausac = null;
    var $kichthuoc = null;
    //hamtao
    public function __construct()
    {
    }
    //phuongthuc
    public function SPBanChay()
    {
        //ketnoi dbs
        $db = new connect();
        //yeu cau sql thuc thi "lấy 8 sản phẩm mới nhất"
        $select = "SELECT * FROM sanpham ORDER BY masp DESC limit 8";
        $result = $db->getList($select);
        return $result; // trả về
    }
    //phuongthuc
    public function SPTongHop()
    {
        //ketnoi dbs
        $db = new connect();
        //yeu cau sql thuc thi "lấy 8 sản phẩm có lượt mua cao nhất"
        $select = "SELECT * FROM sanpham";
        $result = $db->getList($select);
        return $result; // trả về
    }
    //phuongthuc
    function SPchitiet($masp)
    {
        //ketnoi dbs
        $db = new connect();
        //truy vấn sql "lấy id sản phẩm"
        $select = "SELECT * FROM sanpham where masp=$masp";
        //yêu cầu thuc thi "lấy id sản phẩm"
        // truyền câu $select qua $db yêu cầu query làm
        $result = $db->getInstance($select);
        return $result; // trả về
    }
    //phuongthuc
    function NhomHinhAnhSP($nhom)
    {
        //ketnoi dbs
        $db = new connect();
        //truy vấn sql "lấy id sản phẩm"
        $select = "SELECT * FROM sanpham where nhom=$nhom";
        //yêu cầu thuc thi "lấy id sản phẩm"
        // truyền câu $select qua $db yêu cầu query làm
        $result = $db->getList($select);
        return $result; // trả về
    }
      // lấy ra màu sắc chung nhóm với id sản phẩm
  function getListColor($nhom)
  {
    $db=new connect();
    $select="select DISTINCT(mausac) from sanpham where nhom=$nhom";
    // mỗi sản phẩm chỉ có 1 id nên kết quả trả về chỉ 1 row
    $result=$db->getList($select);
    return $result;
  }
  function sptheoloai($maloai)
  {
    $db=new connect();
    $select="select * from sanpham where maloai=$maloai";
    // mỗi sản phẩm chỉ có 1 id nên kết quả trả về chỉ 1 row
    $result=$db->getList($select);
    return $result;
  }
  function getListSize($nhom)
  {
    
    $db=new connect();
    $select="select DISTINCT(kichthuoc) from sanpham where nhom=$nhom";
   
    // mỗi sản phẩm chỉ có 1 id nên kết quả trả về chỉ 1 row
    $result=$db->getList($select);
    
    return $result;
  }
  function getListHangHoaPage($start,$limit){
    // b1 kết nối được với database xshop
    $db=new connect();
    // b2: yêu cầu thực câu truy vấn
    $select="select * from sanpham where masp limit ".$start.",".$limit;
    $result=$db->getList($select);
    return $result;
 }

 function getinfSearch($name)
 {
   $db = new connect();
   //b2: yêu cầu thực hiện câu truy vấn
   $select="select * from sanpham where tensp like :tensp";
   // ai thực thi  , prepare
   $ss=$db->useprepare($select);
   // muốn prepare thì phải execute
   // tr khi thực thi thì nên ràng về dữ liệu, bindValue, bindParam
   //
   $aname="%".$name."%";
   $ss->bindParam(':tensp',$aname);
   $ss->execute();
   return $ss;
 }
 function updateSale($id)
 {
   $db=new connect();
   $query="update sanpham set luotxem=luotxem+1 where masp=$id";
   $db->getexec($query);
 }
 function updateslt($id)
 {
   $db=new connect();
   $query="update sanpham set soluongton=soluongton-1 where masp=$id";
   $db->getexec($query);
 }
 function locsp($id)
 {
   $db=new connect();
   $select="SELECT* from sanpham order by ";
   $db->getList($select);
 }
}
