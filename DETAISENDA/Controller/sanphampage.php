<?php
$action = "sanphampage";
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch ($action) {
  case 'sanphampage':
    include "./View/sanpham.php";
    break;
  case 'chitietsp':
    include "./View/chitietsp.php";
    break;
}
