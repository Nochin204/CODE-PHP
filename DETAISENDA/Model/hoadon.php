<?php
class hoadon{
  // thuộc tính
  // hàm tạo
  public function __construct()
  {
    
  }
  // viết pt insert vào bảng hóa đơn 1
  // mã số hóa đơn ko cần insert vì nó tự tăng, ngày đặt cũng ko cần truyền vào vì nó lấy ngày hiện tại và total ban đầu
  // ko truyền vào vì bảng chi tiết hóa đơn chưa đc chèn vào
  //  dùng dạng cơ bản tức là exec chứ ko dùng prepare
  public function insertOrder($makh)//7
  {
    // lấy ngày hiện tại
    $date=new DateTime("now");// lấy ngày và có giờ
    $ngay=$date->format("Y-m-d");
    // b1 kết nối với database
    $db=new connect();
    // b2: viết yêu cầu chèn vào database
    $query="insert into hoadon(masohd,makh,ngaydat,tongtien) 
    values(NULL,$makh,'$ngay',0)";
    // b3: thực thi câu $query
    $db->getexec($query);// đã chèn đc vào database
    // sau khi chèn mã số hd đc vào trong database thì tiến hàng lấy mã mới vừa chèn vào
    $select="select masohd from hoadon order by masohd desc limit 1";
    // ai thực thi câu truy vấn $select? query và prepare
    $result=$db->getInstance($select);
    return $result[0];
  }
  // phương thức insert vào trong bảng chi tiết hóa đơn
  function insertOrderDetail($masohd,$masp,$soluong,$mausac,$kichthuoc,$thanhtien)
  {
    // B1: kết nối với database
    $db=new connect();
    // b2: yêu cầu insert vào bảng chi tiết hóa đơn
    $query="INSERT INTO `chitiethd`(`masohd`, `masp`, `soluongmua`, `mausac`, `kichthuoc`, `thanhtien`) 
    VALUES ($masohd,$masp,$soluong,'$mausac','$kichthuoc','$thanhtien')";
    //  var_dump($query);
    //  exit;
     $db->getexec($query);
  }
  // phương thức cập nhật lại tổng tiền của bảng hóa đơn
  function updateOrderTotal($masohd,$total)
  {
    $db=new connect();
    $query="update hoadon set tongtien=$total where masohd=$masohd";
    $db->getexec($query);
  }
  // pt lấy thông tin của hóa đơn mới vừa chèn vào bảng chi tiest hóa đơn để hiện tị lên order
  function getOrder($sohdid)
  {
    $db=new connect();
    $select="select b.masohd, a.tenkh,a.diachi,a.sdt,b.ngaydat from users a
    inner join hoadon b on a.makh=b.makh where masohd=$sohdid";
    // trả đúng thông tin của 1 khách hàng  getInstance
    $result=$db->getInstance($select);
    return $result;
  }
  function getOrderDetail($sohdid)
  {
    $db=new connect();
    $select="select a.tensp,a.dongia,b.mausac,b.kichthuoc,b.soluongmua,b.thanhtien 
    from sanpham a inner join chitiethd b on a.masp=b.masp where masohd=$sohdid";
    // kết quả trả về nhiều món hàng mà khách hàng mua
    $result=$db->getList($select);
    return $result;
  }
}
?>