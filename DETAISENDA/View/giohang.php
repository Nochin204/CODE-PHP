<link rel="stylesheet" href="Content/CSS/giohang.css">
<div class="table-responsive">
  <?php
  if (!isset($_SESSION['bag']) || count($_SESSION['bag']) == 0) :
    echo '<script>swal("","Giỏ Hàng Của Bạn Đang Trống !", "error");</script>';
    echo '<meta http-equiv="refresh" content="3;url=../index.php?action=home"/>';
  ?>
    <!-- ngược lại hiển thị form chứa những món hàng mà khách hàng mua -->
  <?php
  else :
  ?>
    <div class="container-fluit" style="height: 230px;background-color: rgba(229, 238, 226, 0.753);">
      <div class="container" style="padding-top:150px ;">
        <div class="tieudegiohang">
          Trang Giỏ Hàng
        </div>
      </div>
    </div>
    <!--Nội dung-->
    <div class="container">
    <div class="row">
      <div class="col-8" style="padding-top:150px ;">

        <form action="index.php?action=giohang&act=update_cart" method="post">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td colspan="5">
                  <h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2>
                </td>
              </tr>
              <tr class="table abc">
                <th>Số TT</th>
                <th>Thông Tin Sản Phẩm</th>
                <th>Tùy Chọn Của Bạn</th>
                <th colspan="2">Giá</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              // foreach(mang as $key=>$value)// foreach(mang as $item)
              foreach ($_SESSION['bag'] as $key => $item) :
                $i++;
              ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><img width="50px" height="50px" src="Content/IMG/<?php echo $item['hinh'];?>">
                  </td>
                  <td>Màu: <?php echo $item['mau'];?> Size: <?php echo $item['kichthuoc'];?></td>
                  <td>Đơn Giá:<?php echo number_format($item['cost']); ?> - Số Lượng: <input type="text" name="newqty[<?php echo $item['masp'];?>]" value="<?php echo $item['qty'];?>"/><br/>
                    <p style="float: right;"> Thành Tiền: <?php echo number_format($item['total']); ?> <sup><u>đ</u></sup></p>
                  </td>
                  <td>
                    <a href="index.php?action=giohang&act=xoaspkhoigio&id=<?php echo $item['masp']?>">
                    <button type="button" class="btn btn-danger">Xóa</button></a>
                    
                    <button type="submit" class="btn btn-secondary">Sửa</button>
                  </td>
                </tr>
              <?php
              endforeach;
              ?>
              <tr class="abc">
                <td colspan="3">
                  <b>Tổng Tiền</b>
                </td>
                <td style="float: right;">
                  <b><?php echo pttinhtongtien();?><sup><u>đ</u></sup></b>
                </td>
                <?php if(isset($_GET['masp'])) $masp=$_GET['masp'];
                else $sasp=0; ?>
                <td><a href="index.php?action=thanhtoan&act=order">Thanh toán</a></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div> 
      <div class="col-4" style="padding-top:150px ;">
        <div class="thanhtoan">
          <h5 style="padding: 10px;">THẬT VUI KHI BẠN ĐÃ QUYẾT ĐỊNH MUA HÀNG</h5>
          <div class="backback shadow" style="padding: 10px;"><i class="bi bi-signpost-2"></i>
            Mỗi một sản phẩm đều được nuôi trồng bằng cả tấm lòng
          </div><br>
          <div class="backback shadow" style="padding: 10px;"><i class="bi bi-signpost-2"></i>
            Chất lượng được đặt lên hàng đầu
          </div><br>
          <div class="backback shadow" style="padding: 10px;"><i class="bi bi-signpost-2"></i>
            Đóng gói luôn cẩn thận và an toàn
          </div><br>
          <div class="backback shadow" style="padding: 10px;"><i class="bi bi-signpost-2"></i>
            Đảm bảo lợi ích cho khách hàng
          </div><br>

        </div>
      </div>
    </div>
    </div>
      <?php
    endif;
      ?>
    </div>