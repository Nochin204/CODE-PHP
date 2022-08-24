<link rel="stylesheet" href="Content/CSS/home.css">
<section class="Danhsachmathang">
  <h1 class="tieude_spnoibat text-center mt-4">CÁC SẢN PHẨM MỚI</h1>
  <div class="container">
    <div class="row">
      <?php
      $n = new sanpham();
      // khai báo biến gán bằng kết quả trả về
      $result = $n->SPBanChay(); // trả về là mảng
      while ($set = $result->fetch()) :
      ?>
        <div class="col-lg-3">
          <div class="Cacsp-items">
            <!-- Các Sản Phẩm -->
            <div class="Cacsp store-product">
              <div class="product-details">
                <!---->
                <div class="Cacsp-content">
                  <div class="Cacsp-img"><img src="<?php echo 'Content/IMG/' . $set['hinh'] ?>" alt="chau1">
                  </div>

                  <div class="Cacsp-btns">
                    <button type="button" class="themvaogio"> Thêm vào giỏ
                      <span><i class="fas fa-shopping-cart"></i></span>
                    </button>
                    <button type="button" class="popup">
                      <span><i class="bi bi-caret-up-fill"></i></span>
                    </button>
                  </div>
                </div>
                <!---->
                <div class="Cacsp-info">
                  <div class="Cacsp-info-top">
                    <h2 class="tieude_sp"><b><?php echo $set['luotxem']; ?></b><br>lượt xem</h2>
                    <div class="rating">
                      <span><i class="fas fa-star"></i></span>
                      <span><i class="fas fa-star"></i></span>
                      <span><i class="fas fa-star"></i></span>
                      <span><i class="fas fa-star"></i></span>
                      <span><i class="fas fa-star"></i></span>
                    </div>
                  </div>
                  <a href="index.php?action=home&act=chitietsp&id=<?php echo $set['masp']; ?>" class="Cacsp-name"><?php echo $set['tensp']; ?></a>
                  <p class="Cacsp-price"></p>
                  <p class="Cacsp-price">Chỉ với : <?php echo number_format($set['dongia']); ?> đ</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Các Sản Phẩm -->
      <?php
      endwhile;
      ?>
    </div>
    <h1 class="tieude_spnoibat text-center mt-4">DANH MỤC SẢN PHẨM</h1>
    <div class="container">
      <div class="row">
        <?php
        $n = new phanloai();
        // khai báo biến gán bằng kết quả trả về
        $result = $n->Danhmucspitem(); // trả về là mảng
        while ($set = $result->fetch()) :
        ?>
          <div class="col-lg-4">
            <div class="Cacsp-items">
              <!-- Các Sản Phẩm -->
              <div class="Cacsp store-product">
                <div class="product-details">
                  <!---->
                  <div class="Cacsp-img"><img src="<?php echo 'Content/IMG/' . $set['anhloai'] ?>" alt="chau1">
                    <div class="Cacsp-content text-center">
                      <a href="index.php?action=home&act=sanphamList&id=<?php echo $set['maloai']; ?>" class="Cacsp-name"><?php echo $set['tenloai']; ?></a>
                      <a href="index.php?action=home&act=sanphamList&id=<?php echo $set['maloai']; ?>" class="Cacsp-btns">
                        <button type="button" class="themvaogio"> Xem Chi Tiết
                          <span><i class="fas fa-shopping-cart"></i></span>
                        </button>
                      </a>
                    </div>
                    <!---->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Các Sản Phẩm -->
        <?php
        endwhile;
        ?>
      </div>
    </div>
</section>