
<div class="row col-12">
<a href="index.php?action=sanpham&act=inserthanghoa"><h4>Thêm sản phẩm</h4></a>
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-pary">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Hình</th>
        <th>Nhóm</th>
        <th>Mã loại</th>
        <th>Lượt mua</th>
        <th>Ngày lập</th>
        <th>Mô tả</th>
        <th>Số lượng tồn</th>
        <th>Màu sắc</th>
        <th>Kích thước</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hh=new SanPham();
      $result=$hh->getListHangHoa();
      while($set=$result->fetch()):
      ?>
      <tr class="vvbb">
        <td><?php echo $set['masp'];?></td>
        <td><?php echo $set['tensp'];?></td>
        <td><?php echo $set['dongia'];?></td>
        <td><?php echo $set['giamgia'];?></td>
        <td><img width="50px" height="50px" src="../Content/IMG/<?php echo $set['hinh'];?>"/></td>
        <td><?php echo $set['nhom'];?></td>
        <td><?php echo $set['maloai'];?></td>
        <td><?php echo $set['luotxem'];?></td>
        <td><?php echo $set['ngaylap'];?></td>
        <td><?php echo $set['mota'];?></td>
        <td><?php echo $set['soluongton'];?></td>
        <td><?php echo $set['mausac'];?></td>
        <td><?php echo $set['kichthuoc'];?></td>
        <td><a href="index.php?action=sanpham&act=update&id=<?php echo $set['masp'];?>">Cập nhật</a></td>
        <td><a href="index.php?action=sanpham&act=delete&id=<?php echo $set['masp'];?>">Xóa</a></td>
      </tr>
     <?php
     endwhile;
     ?>
    </tbody>
  </table>
</div>