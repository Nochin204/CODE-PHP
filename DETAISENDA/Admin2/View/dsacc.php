
<div class="row col-12">
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-pary">
        <th>Mã Khách Hàng</th>
        <th>Tên Khách Hàng</th>
        <th>Địa Chỉ</th>
        <th>Số Điện Thoại</th>
        <th>Tên Đăng Nhập</th>
        <th>Email</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hh=new users();
      $result=$hh->getListUser();
      while($set=$result->fetch()):
      ?>
      <tr class="vvbb">
        <td><?php echo $set['makh'];?></td>
        <td><?php echo $set['tenkh'];?></td>
        <td><?php echo $set['diachi'];?></td>
        <td><?php echo $set['sdt'];?></td>
        <td><?php echo $set['tendnhap'];?></td>
        <td><?php echo $set['email'];?></td>
        <td><a href="index.php?action=users&act=updateh&id=<?php echo $set['makh'];?>">Cập nhật</a></td>
        <td><a href="index.php?action=users&act=delete&id=<?php echo $set['makh'];?>">Xóa</a></td>
      </tr>
     <?php
     endwhile;
     ?>
    </tbody>
  </table>
</div>