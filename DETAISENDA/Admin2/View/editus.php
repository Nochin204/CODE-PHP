<?php
if(isset($_GET['act'])){
  if($_GET["act"]=="updateh")
  {
    $ac=1;
  }
  else{
    $ac=0;
  }
}
?>
<!-- hiển thị tiêu đề -->
<?php
if($ac==1)
{
  echo '<div class="col-md-4 col-md-offset-4"><h2><b>CẬP NHẬT USER</b></h2>';
}
else{
  echo '<div class="col-md-4 col-md-offset-4"><h2><b>KHÔNG CÓ USER</b></h2>';
}
?>

<div class="row col-mt-12" >
  <?php
  if(isset($_GET['id']))
  {
    // thông tin của 1 món hàng
    $makh=$_GET['id'];//31
    $hh=new users();
    $result=$hh->getListusID($makh);
    $tenkh=$result['tenkh'];
    $tendnhap=$result['tendnhap'];
    $sdt=$result['sdt'];
    $diachi=$result['diachi'];
    $email=$result['email'];
  }
  ?>
  <?php
  if($ac==1)
  {
    echo ' <form action="index.php?action=users&act=update_h&id=<?=$makh;?>" method="post" enctype="multipart/form-data">';
  }
  else{
    echo 'KO CÓ';
  }
  ?>
 
    <table class="table" style="width: 500px;">

      <tr>
        <td>Mã Khách Hàng</td>
        <td> <input type="text" class="form-control" name="makh" value="<?php if(isset($makh)) echo $makh;?>"  readonly/></td>
      </tr>
      <tr>
        <td>Tên Khách Hàng</td>
        <td><input type="text" class="form-control" name="tenkh" value="<?php if(isset($tenkh)) echo $tenkh;?>"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Tên Đăng Nhập</td>
        <td><input type="text" class="form-control" name="tendnhap" value="<?php if(isset($tendnhap)) echo $tendnhap;?>" ></td>
      </tr>
      <tr>
        <td>Số Điện Thoại</td>
        <td><input type="text" class="form-control" name="sdt" value="<?php if(isset($sdt)) echo $sdt;?>" >
        </td>
      </tr>
      <tr>
        <td>Địa Chỉ</td>
        <td><input type="text" class="form-control" name="diachi" value="<?php if(isset($diachi)) echo $diachi;?>">
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" class="form-control" name="email" value="<?php if(isset($email)) echo $email;?>">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" value="submit" name="submit">
          

        </td>
      </tr>

    </table>
  </form>
</div>