<?php
$action = "giohang";
if (!isset($_SESSION['bag'])) // $action=registration
{
  $_SESSION['bag']=array();
}
if (isset($_GET['act'])) // $action=registration
{
 $action=$_GET['act'];
}
switch ($action) {
  case 'giohang':
    include "./View/giohang.php";
    break;
    case 'addgio':
      // if(isset($GET['masp']))
      // $masp = $GET['masp'];
      // else $masp=0;
      // if ($masp > 0) {
      //   $usserten = new sanpham();
      //   $userten = $usserten-> updateSale($masp);
      // }
  
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
        $masp=$_POST['masp'];
        $mausac=$_POST['mymausac'];
        $soluong=$_POST['soluong'];
        $kichthuoc=$_POST['kichthuoc'];
        add_item($masp,$soluong,$mausac,$kichthuoc);
        
        echo '<meta http-equiv="refresh" content="0;url=../index.php?action=giohang"/>';
      }
      break;
      case 'xoaspkhoigio':
        // truyền id là mã hh mà người dùng click xóa
        // nhận id
        if(isset($_GET['id']))
        {
          $key=$_GET['id'];
          // xóa thì dùng hàm unset
          unset($_SESSION['bag'][$key]);
          echo '<meta http-equiv="refresh" content="0;url=../index.php?action=giohang"/>';
        }
      case 'update_cart':
        // mình cần chỉnh sửa là số lượng, mà mỗi lần nhấn nút submit là truyền những value trong input qua, truyền thông qua name
        // nhưng khi form đó có nhiều đối tượng trong thẻ input thì khi nhấn nó chỉ lấy input cuối cùng nó truyền giá trị qua
        //newqty[21=>10,22=>2]
        //[21=>5,22=>2]
        $soluongnew=$_POST['newqty'];// $soluongnew là 1 array lưu thông tin của tất cả mã hàng trong giỏ hàng với số lượng tuowg ứng
        // duyệt qua giỏ hàng $_SESSION['cart']
        foreach($soluongnew as $key=>$qty)
        {
          if($_SESSION['bag'][$key]['qty']!=$qty)
          {
            update_item($key,$qty);//21,10
          }
        }
        echo '<meta http-equiv="refresh" content="0;url=../index.php?action=giohang"/>';
        break;
    }
    ?>