<?php
if(isset($_GET['act'])){
  if($_GET["act"]=="update")
  {
    $ac=1;
  }
  else if($_GET["act"]=="inserthanghoa")
  {
    $ac=2;
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
  echo '<div class="col-md-4 col-md-offset-4"><h2><b>CẬP NHẬT HÀNG HÓA</b></h2>';
}
else if($ac==2)
{
  echo '<div class="col-md-4 col-md-offset-3"><h2 style="margin-left:93px"><b>THÊM HÀNG HÓA</b></h2>';
}
else{
  echo '<div class="col-md-4 col-md-offset-4"><h2><b>KHÔNG CÓ HÀNG HÓA</b></h2>';
}
?>

<div class="row col-mt-12" >
  <?php
  if(isset($_GET['id']))
  {
    // thông tin của 1 món hàng
    $masp=$_GET['id'];//31
    $hh=new SanPham();
    $result=$hh->getListHangHoaID($masp);
    $tensp=$result['tensp'];
    $dongia=$result['dongia'];
    $giamgia=$result['giamgia'];
    $hinh=$result['hinh'];
    $nhom=$result['nhom'];
    $maloai=$result['maloai'];
    $luotxem=$result['luotxem'];
    $ngaylap=$result['ngaylap'];
    $mota=$result['mota'];
    $soluongton=$result['soluongton'];
    $mausac=$result['mausac'];
    $kichthuoc=$result['kichthuoc'];
  }
  ?>
  <?php
  if($ac==1)
  {
    echo ' <form action="index.php?action=sanpham&act=update_hanghoa&id=<?=$masp;?>" method="post" enctype="multipart/form-data">';
  }
  else if($ac==2)
  {
    echo ' <form action="index.php?action=sanpham&act=insert_hanhhoa" method="post" enctype="multipart/form-data">';
  }
  else{
    echo 'KO CÓ';
  }
  ?>
 
    <table class="table" style="width: 500px;">

      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="masp" value="<?php if(isset($masp)) echo $masp;?>"  readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tensp" value="<?php if(isset($tensp)) echo $tensp;?>"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="text" class="form-control" name="dongia" value="<?php if(isset($dongia)) echo $dongia;?>" ></td>
      </tr>
      <tr>
        <td>Giảm giá</td>
        <td><input type="text" class="form-control" name="giamgia" value="<?php if(isset($giamgia)) echo $giamgia;?>" ></td>
      </tr>
      <tr>
        <td>Hình</td>
        <td>
            <?php
              if(isset($hinh))
              {
                echo '<label><img width="50px" height="50px" src="Content/IMG/'.$hinh.'"></label>';
              }
            ?>
            
              Chọn file để upload:
            <input type="file" name="image" id="fileupload">
         
        </td>
      </tr>
      <tr>
        <td>Nhóm</td>

        <td>
          <input type="text" class="form-control" name="nhom" value="<?php if(isset($nhom)) echo $nhom;?>" >
        </td>
      </tr>
      <tr>
        <td>Mã loại</td>
        <!-- hiển thị là lấy ra tên loại hiển thị, nhưng khi lưu là lưu mã loại -->
        <td>
          <select name="maloai" class="form-control" style="width:150px;">
            <?php
            $selectLoai=-1;
            if(isset($maloai) && $maloai!=-1)
            {
              $selectLoai=$maloai;//=3
            }
            $hh =new SanPham();
            $results=$hh->getListMaLoaiHang();
            while($set=$results->fetch()):
            ?>
            <option value="<?php echo $set['maloai'];?>"<?php if($selectLoai==$set['maloai']) echo 'selected="selected"'?>><?php echo $set['tenloai'];?></option>
            <?php
            endwhile;
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Lượt mua</td>
        <td><input type="text" class="form-control" name="luotxem" value="<?php if(isset($luotxem)) echo $luotxem;?>" >
        </td>
      </tr>
      <tr>
        <td>Ngày lập</td>
        <td><input type="text" class="form-control" name="ngaylap" value="<?php if(isset($ngaylap)) echo $ngaylap;?>">
        </td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><input type="text" class="form-control" name="mota" value="<?php if(isset($mota)) echo $mota;?>">
        </td>
      </tr>
      <tr>
        <td>Số lượng tồn</td>
        <td><input type="text" class="form-control" name="soluongton" value="<?php if(isset($soluongton)) echo $soluongton;?>">
        </td>
      </tr>
      <tr>
        <td>Màu sắc</td>
        <td><input type="text" class="form-control" name="mausac" value="<?php if(isset($mausac)) echo $mausac;?>" >
        </td>
      </tr>
      <tr>
        <td>Kích thước</td>
        <td><input type="text" class="form-control" name="kichthuoc" value="<?php if(isset($kichthuoc)) echo $kichthuoc;?>" >
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