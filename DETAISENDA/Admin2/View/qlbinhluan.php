
<div class="row col-12">
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-pary">
        <th>Mã Bình Luận</th>
        <th>Mã Sản Phẩm</th>
        <th>Mã Khách Hàng</th>
        <th>Ngày Bình Luận</th>
        <th>Nội Dung</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hh=new users();
      $result=$hh->getListbl();
      while($set=$result->fetch()):
      ?>
      <tr class="vvbb">
        <td><?php echo $set['mabl'];?></td>
        <td><?php echo $set['masp'];?></td>
        <td><?php echo $set['makh'];?></td>
        <td><?php echo $set['ngaybl'];?></td>
        <td><?php echo $set['noidung'];?></td>
        <td><a href="index.php?action=users&act=delete&id=<?php echo $set['makh'];?>">Xóa</a></td>
      </tr>
     <?php
     endwhile;
     ?>
    </tbody>
  </table>
</div>