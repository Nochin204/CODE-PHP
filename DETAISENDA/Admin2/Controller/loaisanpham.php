<?php
$action="loaisanpham";
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch($action)
{
    case "loaisanpham":
        include "View/importscv.php";
        break;
    case "import_loai";
            if(isset($_POST['submit']))
            {
                //b1 : lay 1 file tu server ve ma file up len no luu trong $_FILES
                $file=$_FILES["file"]["tmp_name"];
                //khi lấy về thì phải xóa những signature
                file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                //b2 : mo file ra fopen r,w
                $file_open=fopen($file,"r");
                //b3 : doc noi dung cua file
                $hh=new SanPham();
                while(($scv=fgetcsv($file_open,1000, ','))!==false)
                {
                    $masp=$scv[0];
                    $tensp=$scv[1];
                    $idmenu=$scv[2];
                    $hh->insertLoaiHang($masp,$tensp,$idmenu);
                } 
                echo '<script> alert("Import thành công")</script>';
                break;
            }
}
?>