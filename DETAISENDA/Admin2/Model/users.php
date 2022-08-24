<?php
class  users{
  // thuojc tính
  // hàm tạo
  public function __construct()
  {
    
  }
  //pt
  function getListUser()
{
  $db=new connect();
  $select="select * from users where role=0";
  $result=$db->getList($select);
  return $result;
}
function getListbl()
{
  $db=new connect();
  $select="select * from binhluan";
  $result=$db->getList($select);
  return $result;
}
function getListdh()
{
  $db=new connect();
  $select="select * from hoadon";
  $result=$db->getList($select);
  return $result;
}
function deleteUs($id)
{
  $db=new connect();
  $query="delete from users where makh=$id";
  $db->exec($query);
}
  // lấy thông tin của 1 hàng hóa
  function getListusID($makh)
  {
    $db=new connect();
    $select="select * from users where makh=$makh";
    $result=$db->getInstance($select);
    return $result;
  }
  // phương thức update hang hoaas
  function updateus($id,$tenkh,$diachi,$sdt,$tendnhap,$email)
  {
    $db=new connect();
    $query="update users
    set tenkh='$tenkh',
    diachi='$diachi',
    sdt=$sdt,
    tendnhap='$tendnhap',
    email='$email'
    where makh=$id
    ";
    $db->exec($query);
  }
}
?>