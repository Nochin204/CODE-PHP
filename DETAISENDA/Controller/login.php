<?php
$action = "login";
if (isset($_GET['act'])) {
  $action = $_GET['act'];
}
switch ($action) {
  case 'login':
    include "./View/login.php";
    break;
  case 'login_act':
    if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
      $tendnhap = $_POST['txtusername']; // $username=nguyen
      $pass = $_POST['txtpassword']; // $password=123
      $mahoa = md5($pass);
    }
    $us = new users();
    $checkuser = $us->login($tendnhap, $mahoa);
    if (is_array($checkuser)) {
      $_SESSION['makh'] = $checkuser;
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
  case "logout";
    if (isset($_SESSION['makh'])) {
      // xóa hết session
      session_destroy();
    }
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    break;
  case 'capnhatuser':
    // if ($_SERVER["REQUEST_METHOD"] == "POST")
    // {
    //     $tenkh = $_POST['txttenkh'];
    //     $diachi=$_POST['txtdiachi'];
    //     $email=$_POST['txtemail'];
    //     $sdt=$_POST['txtsodt'];
    //     $tendnhap=$_POST['txtusername'];

    //     $fg=new users();
    //     $qs=$fg->update_tk($makh,$tenkh,$diachi,$sdt,$tendnhap,$email);
    // }
    // if($qs){
    //   echo '<script>swal("","Chào mừng bạn đã đến !", "success");</script>';
    //   // sau khi đăng nhập thành công muốn quay về trang chủ, tức là trang home
    //   include 'View/home.php';
    //   echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    // } else {
    //   echo '<script>swal("","Tài khoản hoặc mật khẩu không chính xác !", "error");</script>'; // độ trễ
    include 'View/capnhatuser.php';
    break;
}
