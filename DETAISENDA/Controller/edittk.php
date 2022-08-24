<?php
$action = "capnhatuser";
if (isset($_GET['act'])) {
  $action = $_GET['act'];
}
switch ($action) {
case 'capnhatuser':
   include "View/capnhatuser.php"; 
   break; 
   case 'capnhatuseract':
    if (isset($_POST['capnhat'])&&($_POST['capnhat'])) {
      $tendnhap = $_POST['txtusername']; // $username=nguyen
      $email = $_POST['txtemail']; // $password=123
      $sdt = $_POST['txtsodt']; // $username=nguyen
      $tenkh = $_POST['txttenkh'];
      $diachi = $_POST['txtdiachi']; // $username=nguyen
      $upv = new users();
      $abb = $upv->update_tk($makh,$tenkh,$diachi,$sdt,$tendnhap,$email);
      $us = new users();
      $checkuser = $us->login($tendnhap, $mahoa);
        $_SESSION['makh'] = $checkuser;
    echo '<meta http-equiv="refresh" content="0;url=../index.php?action=capnhatuser"/>';   
   // $thongbao="Bạn đã đăng nhập thành công!";
   echo '<script>swal("","Chào mừng bạn đã đến !", "success");</script>';
   // sau khi đăng nhập thành công muốn quay về trang chủ, tức là trang home
   include 'View/home.php';
   echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
 } else {
   echo '<script>swal("","Tài khoản hoặc mật khẩu không chính xác !", "error");</script>'; // độ trễ
   include 'View/login.php';
 }
 break;
}
?>