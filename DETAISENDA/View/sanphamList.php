<link rel="stylesheet" href="Content/CSS/home.css">
<link rel="stylesheet" href="Content/CSS/giohang.css">
<!--Section: Examples-->
<section id="examples" class="text-center">

    <!-- Heading -->
    <?php
    if (isset($_GET['id'])) $maloai = $_GET['id']; {

        if ($maloai == 1) {
            echo '<div class="container-fluit" style="height: 230px;background-color: rgba(229, 238, 226, 0.753);">
          <div class="container" style="padding-top:150px ;"><div class="tieudegiohang">Sen Đá</a> </div></div> </div>';
        } else if ($maloai == 2) {
            echo '<div class="container-fluit" style="height: 230px;background-color: rgba(229, 238, 226, 0.753);">
            <div class="container" style="padding-top:150px ;"><div class="tieudegiohang">Xương Rồng</a> </div></div> </div>';
        } else if ($maloai == 3) {
            echo '<div class="container-fluit" style="height: 230px;background-color: rgba(229, 238, 226, 0.753);">
            <div class="container" style="padding-top:150px ;"><div class="tieudegiohang">Chậu Cây</a> </div></div> </div>';
        } else if ($maloai == 4) {
            echo '<div class="container-fluit" style="height: 230px;background-color: rgba(229, 238, 226, 0.753);">
            <div class="container" style="padding-top:150px ;"><div class="tieudegiohang">Giá Thể</a> </div></div> </div>';
        } else {
            echo '<div class="container-fluit" style="height: 230px;background-color: rgba(229, 238, 226, 0.753);">
            <div class="container" style="padding-top:150px ;"><div class="tieudegiohang">Trang Trí</a> </div></div> </div>';
        }
    }

    ?>
    <br>
    <div class="container mt-5">

        <div class="row">
            <?php
            if (isset($_GET['id'])) :
                $maloai = $_GET['id'];
                $u = new phanloai();
                $r = $u->chitietdanhmucsp($maloai);
                while ($set = $r->fetch()) :

            ?>
                    <!--Grid row-->
                    <!--Grid column-->
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
                                        <a href="index.php?action=sanphampage&act=chitietsp&id=<?php echo $set['masp']; ?>" class="Cacsp-name"><?php echo $set['tensp']; ?></a>
                                        <p class="Cacsp-price"></p>
                                        <p class="Cacsp-price">Chỉ với : <?php echo number_format($set['dongia']); ?> đ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
        </div>
    <?php
            endif;
    ?>

    </div>

    <!--Grid row-->

</section>