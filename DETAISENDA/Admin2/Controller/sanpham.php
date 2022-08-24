<?php
$action="sanpham";
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch($action)
{
  case "sanpham":
    include "View/SanPham.php";
    break;
  case "inserthanghoa":
    include "View/edithanghoa.php";
    break;
  case "insert_hanhhoa":
    // nhận thông tin bên submit edithanghoa gửi qua
    if(isset($_POST['submit']))
    {
      $masp=$_POST['masp'];
      $tensp=$_POST['tensp'];
      $dongia=$_POST['dongia'];
      $giamgia=$_POST['giamgia'];
      $hinh=$_FILES["image"]["name"];
      $nhom=$_POST['nhom'];
      $maloai=$_POST['maloai'];;
      $luotxem=$_POST['luotxem'];
      $ngaylap=$_POST['ngaylap'];
      $mota=$_POST['mota'];
      $soluongton=$_POST['soluongton'];
      $mausac=$_POST['mausac'];
      $kichthuoc=$_POST['kichthuoc'];
      // đem toàn bộ thông tin này chèn vào database
      $hh=new sanpham();
      $hh->inserthh($tensp,$dongia,$giamgia,$hinh,$nhom,$maloai,$luotxem,$ngaylap,$mota,$soluongton,
      $mausac,$kichthuoc);
      // sau khi inset vào database thành công thì đem hình từ server về trong thư mục imagetourdien
      if(isset($hh))
      {
        uploadImage();
        echo '<script>swal("","Lưu sản phẩm thành công !", "success");</script>';
      }
    }
    include "View/SanPham.php";
    break;
  case "update":
    include "View/edithanghoa.php";
    break;
  case "update_hanghoa":
    // truyền qua đây là id
    if(isset($_GET['id']))
    {
      $masp=$_POST['masp'];
      $tensp=$_POST['tensp'];
      $dongia=$_POST['dongia'];
      $giamgia=$_POST['giamgia'];
      $hinh=$_FILES["image"]["name"];
      $nhom=$_POST['nhom'];
      $maloai=$_POST['maloai'];
      $luotxem=$_POST['luotxem'];
      $ngaylap=$_POST['ngaylap'];
      $mota=$_POST['mota'];
      $soluongton=$_POST['soluongton'];
      $mausac=$_POST['mausac'];
      $kichthuoc=$_POST['kichthuoc'];
      $hh=new sanpham();
      $hh->updatesp($masp,$tensp,$dongia,$giamgia,$hinh,$nhom,$maloai,$luotxem,$ngaylap,$mota,$soluongton,
      $mausac,$kichthuoc);
      if(isset($hh))
      {
        uploadImage();
        echo '<script>swal("","Cập nhật sản phẩm thành công !", "success");</script>';
      }
      else{
        echo '<script>swal("","Cập nhật sản phẩm thất bại !", "error");</script>';
      }
    }
    include "View/SanPham.php";
    break;
    case "delete":
      //ktra có truyền dc qua id hay ko
      if(isset($_GET['id']))
      {
        $masp=$_GET['id'];
        $hh=new sanpham();
        $hh->deleteMaHangHoa($masp);
      }
      echo '<script>swal("","Xóa sản phẩm thành công !", "success");</script>';
      include "View/SanPham.php";
      break;
  }
?>