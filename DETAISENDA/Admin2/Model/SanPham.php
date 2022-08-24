<?php
class  SanPham{
  // thuojc tính
  // hàm tạo
  public function __construct()
  {
    
  }
  //pt
  function getListHangHoa()
  {
    $db=new connect();
    $select="select * from sanpham";
    $result=$db->getList($select);
    return $result;
  }
  // phương thức hiển thị loại hàng
  function getListMaLoaiHang()
  {
    $db=new connect();
    $select="select maloai,tenloai from loai";
    $result=$db->getList($select);
    return $result;
  }
  // phương thức insert vào database
  function inserthh($tensp,$dongia,$giamgia,$hinh,$nhom,$maloai,$luotxem,$ngaylap,$mota,
  $soluongton,$mausac,$kichthuoc)
  {
    $date=new DateTime($ngaylap);
    $ngaylap=$date->format("Y-m-d");
    $db=new connect();
    $query="insert into sanpham(masp,tensp,dongia,giamgia,hinh,nhom,maloai,luotxem,ngaylap,mota,
    soluongton,mausac,kichthuoc)
    values(NULL,'$tensp',$dongia,$giamgia,'$hinh',$nhom,$maloai,$luotxem,'$ngaylap','$mota',
    $soluongton,'$mausac','$kichthuoc')";
    $db->exec($query);
  }
  // lấy thông tin của 1 hàng hóa
  function getListHangHoaID($masp)
  {
    $db=new connect();
    $select="select * from sanpham where masp=$masp";
    $result=$db->getInstance($select);
    return $result;
  }
  // phương thức update hang hoaas
  function updatesp($id,$tensp,$dongia,$giamgia,$hinh,$nhom,$maloai,$luotxem,$ngaylap,$mota,
  $soluongton,$mausac,$kichthuoc)
  {
    $date=new DateTime($ngaylap);
    $ngaylap=$date->format("Y-m-d");
    $db=new connect();
    $query="update sanpham
    set tensp='$tensp',
    dongia=$dongia,
    giamgia=$giamgia,
    hinh='$hinh',
    nhom=$nhom,
    maloai=$maloai,
    luotxem=$luotxem,
    ngaylap='$ngaylap',
    mota='$mota',
    soluongton=$soluongton,
    mausac='$mausac',
    kichthuoc='$kichthuoc'
    where masp=$id
    ";
    $db->exec($query);
  }
//pthuc xóa
function deleteMaHangHoa($id)
{
  $db=new connect();
  $query="delete from sanpham where masp=$id";
  $db->exec($query);
}
function insertLoaiHang($id,$tenloai,$idmenu)
{
  $db=new connect();
  $query="insert into loai(maloai,tenloai,idmenu)values($id,'$tenloai',$idmenu)";
  $db->exec($query);
}
function getListHangHoa_thongke()
{
  $db=new connect();
  $select="SELECT a.tensp,sum(soluongmua) as soluongban from sanpham a INNER join chitiethd b 
  on a.masp=b.masp GROUP by a.tensp";
  $result=$db->getList($select);
  return $result;
}
}
?>