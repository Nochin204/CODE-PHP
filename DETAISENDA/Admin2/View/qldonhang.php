
<div class="row col-12">
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-pary">
        <th>Mã Hóa Đơn</th>
        <th>Mã Khách Hàng</th>
        <th>Ngày Đặt</th>
        <th>Tổng Tiền</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hh=new users();
      $result=$hh->getListdh();
      while($set=$result->fetch()):
      ?>
      <tr class="vvbb">
        <td><?php echo $set['masohd'];?></td>
        <td><?php echo $set['makh'];?></td>
        <td><?php echo $set['ngaydat'];?></td>
        <td><?php echo $set['tongtien'];?></td>
        <td><a href="index.php?action=users&act=delete&id=<?php echo $set['makh'];?>">Xóa</a></td>
      </tr>
     <?php
     endwhile;
     ?>
    </tbody>
  </table>
</div>