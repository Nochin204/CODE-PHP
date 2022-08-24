<?php
$action="thanhtoan";
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch($action)
{
  case "thanhtoan":
    include "View/order.php";
    break;
  case "order":
    if($_SERVER['REQUEST_METHOD']=='POST')
      {
        $makh=$_SESSION['makh'];
      }
    // đầu tiên phải insert đc vào bang hóa đơn vì có mã số hóa đơn trước thì mới chèn đc vào bảng chi tiết hóa đơn
    // gọi pt chứa kết quả trả về của mã số hóa đơn
    $hd=new hoadon();
    $sohdid=$hd->insertOrder($makh);//22
    //lưu mã số hóa đơn vàosession
    $_SESSION['sohd']=$sohdid;//22
    //  sau khi lấy đc mã số hóa đơn từ bảng hóa đơn ra
    // chèn vào bảng chi tiest hóa đơn
    // chèn cái gì vào bảng chi tiết?=> đem thông tin trong giỏ hàng chèn vào
    //                    21                                                      22
    //$_SESSION['cart][[21,21.jpg,giày cao got, màu be, 35,2, 5000000, 1000000],[22,22.jpg,giày cao got, màu be, 35,2, 5000000, 1000000]]
    $total=0;
    foreach($_SESSION['bag'] as $key=>$item)
    {
      $hd->insertOrderDetail($sohdid,$item['masp'],$item['qty'],$item['mau'],$item['kichthuoc'],$item['total']);
      // chèn vào đc bảng chi tiết hóa đơn
      //tính tổng tiền trên hóa đơn của bảng chi tiết hóa đơn
      $total+=$item['total'];
    }
    //  sau đó cập nhật tổng thành tiền trong bảng chi tiết hóa đơn vào cột tổng tiefn của bảng hóa đơn
    $hd->updateOrderTotal($sohdid,$total);
    echo '<meta http-equiv="refresh" content="0;url=../index.php?action=thanhtoan"/>';   
    break;
  }
?>