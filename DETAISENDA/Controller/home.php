<?php
$action = "home";
if (isset($_GET['act'])) // $action=registration
{
  $action = $_GET['act'];
}
switch ($action) {
  case 'home':
    include "./View/home.php";
    break;
  case 'sanpham':
    include "./View/sanpham.php";
    break;
    case 'sanpham_list':
      include "./View/sanpham.php";
      break;
  case 'chitietsp':
    include "./View/chitietsp.php";
    break;
    case 'timkiem':
      include './View/sanpham.php';
      break;
    case 'comment':
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
        $masp=$_POST['txtmahh'];
        $noidung=$_POST['comment'];
        $id=$_SESSION['makh'];
      }
      $u=new users();
      $u->insertComment($masp,$makh,$noidung);
      include './View/chitietsp.php';
      break;
    case "sanphamList":
      include "View/sanphamList.php";
  }
  ?>