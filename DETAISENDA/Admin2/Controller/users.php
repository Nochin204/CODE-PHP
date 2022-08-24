<?php
$action = "users";
if (isset($_GET['act'])) {
  $action = $_GET['act'];
}
switch ($action) {
  case "users":
    include "View/dsacc.php";
    break;
  case "qlbl":
    include "View/qlbinhluan.php";
    break;
  case "qldonhang":
    include "View/qldonhang.php";
    break;
    include "View/SanPham.php";
    break;
    case "updateh":
      include "View/editus.php";
      break;
    case "update_h":
      // truyền qua đây là id
      if(isset($_GET['id']))
      {
        $makh=$_POST['makh'];
        $tenkh=$_POST['tenkh'];
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        $tendnhap=$_POST['tendnhap'];
        $email=$_POST['email'];
        $hh=new users();
        $hh->updateus($makh,$tenkh,$diachi,$sdt,$tendnhap,$email);
        if(isset($hh))
        {
          echo '<script>swal("","Cập nhật thành công !", "success");</script>';
        }
        else{
          echo '<script>swal("","Cập nhật thất bại !", "error");</script>';
        }
      }
      include "View/dsacc.php";
    break;
      case "delete":
    //ktra có truyền dc qua id hay ko
    if (isset($_GET['id'])) {
      $makh = $_GET['id'];
      $hh = new users();
      $hh->deleteUs($makh);
    }
    echo '<script>swal("","Xóa tài khoản thành công !", "success");</script>';
    include "View/dsacc.php";
    break;
  case "logout";
    if (isset($_SESSION['makh'])) {
      // xóa hết session
      session_destroy();
    }
    echo '<meta http-equiv="refresh" content="0;url=/index.php"/>';
    break;
}
