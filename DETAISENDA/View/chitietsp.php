<!--thongtinsp-->
<section class="container">
    <div class="row mt-5">
        <!-- vung cot trai sp-->
        <div class="col-lg-9">
            <form action="index.php?action=giohang&act=addgio" method="post">
                <div class="row">

                    <?php
                    if (isset($_GET['id'])) {
                        //gán biến
                        $masp = $_GET['id'];
                        $sp = new sanpham();
                        $result = $sp->SPchitiet($masp);
                        $tensp = $result['tensp'];
                        $dongia = $result['dongia'];
                        $giamgia = $result['giamgia'];
                        $hinh = $result['hinh'];
                        $mota = $result['mota'];
                        $nhom = $result['nhom'];
                        $luotxem = $result['luotxem'];
                    }
                    ?>

                    <div class="col-lg-6">
                        <img src="<?php echo 'Content/IMG/' . $hinh; ?>" class="w-100" />
                        <!--Hình con-->
                        <div id="slides" class="my-1 thumnail">
                            <?php
                            $result = $sp->NhomHinhAnhSP($nhom);
                            while ($set = $result->fetch()) :
                            ?>
                                <img src="<?php echo 'Content/IMG/' . $set['hinh']; ?>" style="width: 15%;" alt="">
                            <?php endwhile ?>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <input type="hidden" name="masp" value="<?php echo $masp ?>" />
                        <h4><?php echo $tensp; ?></h4>
                        <!-- RaTing -->
                        <?php
                        $_STARS = new Stars();
                        $average = $_STARS->avg(); //$average[20=>3.5,21=>4,22=>3]                      
                        $uid = $tendnhap;
                        if (isset($_POST['pid']) && isset($_POST['stars'])) {
                            $pid = $_POST['pid'];
                            $star = $_POST['stars'];
                            $_STARS->update($pid, $uid, $star);
                        }
                        $rating = $_STARS->getRating($uid, $masp); //$rating=4
                        ?>
                        <?php $bi = new sanpham();
                        $in = $bi->updateSale($masp); ?>
                        
                        <a style="color:gray;">Rating: <?= $average[$masp] ?> </a>
                        <div class="rating">
                            <div class="stars" data-pid="<?= $masp ?>">
                                Your rating:
                                <!-- tạo những ngôi sao -->
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    $img = $i <= $rating ? "star" : "star-blank";
                                    echo "<img src='/Content/IMG/$img.png' style='width:30px;cursor:pointer;'data-set='$i'>";
                                }
                                ?>
                            </div>
                        </div>

                        <h5 class="text-danger">Giá Bán :<?php echo $dongia; ?> &nbsp;₫ </h5>
                        <hr>
                        <p class="text-justify">
                            <?php echo $mota; ?>
                        </p>
                        <h5 class="colors">Màu:
                            <select name="mymausac" class="form-control" style="width:150px;">
                                <?php
                                //    trả nhieefue màu nên phải while
                                $result = $sp->getListColor($nhom);
                                while ($set = $result->fetch()) :
                                ?>
                                    <option value="<?php echo $set['mausac'] ?>">
                                        <!-- hiển thị cho người dùng thấy -->
                                        <?php echo $set['mausac']; ?>
                                    </option>
                                <?php
                                endwhile
                                ?>
                            </select><br>
                            Kích Thước :
                            <select name="kichthuoc" class="form-control" style="width:150px;">
                                <?php
                                //    trả nhieefue màu nên phải while
                                $result = $sp->getListSize($nhom);
                                while ($set = $result->fetch()) :
                                ?>
                                    <option value="<?php echo $set['kichthuoc'] ?>">
                                        <!-- hiển thị cho người dùng thấy -->
                                        <?php echo $set['kichthuoc']; ?>
                                    </option>
                                <?php
                                endwhile
                                ?>
                            </select>
                            </br>
                            Số Lượng:
                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />
                        </h5>
                        <div class="action">
                            <button type="submit" data-toggle="modal" data-target="#myModal" class="btn btn-success">Đặt hàng</button>
                            <a href="#" class="btn btn-danger"><i class="fa fa-heart" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- kết thúc vung cot trai sp-->
        <!-- vung cot phai -->
        <div class="col-lg-3">
            <div class="text-center">
                <div class="card-body">
                    <a class="nav-link" href="index.php?action=home&act=sanpham" style="color: rgb(62, 161, 87);"><i class="bi bi-arrow-90deg-left"></i>
                        <div class="card-footer">
                            Xem thêm các sản phẩm khác</i>
                    </a>
                </div>
            </div>
        </div>
        <!-- end vung cot phai -->
    </div>
    </div>
    <!-- kết thúc thông tin sp-->
    <!--đánh giá sp-->
    <!--kết thúc đánh giá sp-->
    <div class="hidden_form">
        <form id="Form2" name="Form2" action="" method="post" target="_self">
            <input type="hidden" name="pid" id="ninpid">
            <input type="hidden" name="stars" id="ninStar">
        </form>
    </div>
</section>

<section>
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <!--kiểm tra thử có lấy đc id người dùng không-->
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $dt = new users();
                    $result = $dt->getCountComment($id);
                }
                ?>
                <p class="float-left"><b>Bình luận <?php echo $result; ?></b></p>
                <hr>
            </div>
            <?php
            if (isset($_SESSION['makh'])) :
            ?>
                <form action="index.php?action=home&act=comment&id=<?php echo $id; ?>" method="post">
                    <div class="row">
                        <input type="hidden" name="txtmahh" value="<?php echo $id; ?>" />
                        <img src="Content/IMG/mongrong1.jpg" width="50px" height="50px" ; />
                        <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                        <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />
                    </div>
                </form>
            <?php
            endif;
            ?>
            <div class="row">
                <p class="float-left"><b>Các bình luận</b></p>
                <hr>
            </div>
            <div class="row">
                <?php
                $result = $dt->hienthiComment($id);
                while ($set = $result->fetch()) :
                ?>
                    <div class="col-lg-12">
                        <div class="row">
                            <img src="" width="50px" height="50px">
                            <p><?php echo '<b>' . $set['tenkh'] . ': </b>' . $set['noidung']; ?></p>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
                <br />
            </div>

        </div>
    </div>
</section>
<script>
    var stars = {
        init: function() {
            for (let docket of document.getElementsByClassName("stars")) {
                console.log(docket);
                // truy xuất đc tới 5 ngôi sao và mỗi ngôi sao lắng nghe sự liện click
                for (let star of docket.getElementsByTagName("img")) {
                    console.log(star);
                    star.addEventListener("click", stars.click);
                }
            }
        },
        click: function() {
            let all = this.parentElement.getElementsByTagName("img"); // all=5
            let set = this.dataset.set,
                i = 1;
            for (let star of all) {
                star.src = i <= set ? "star.png" : "star-blank.png";
                i++;
            }
            // đỗ dữ liệu vào trong form hidden
            document.getElementById("ninpid").value = this.parentElement.dataset.pid; // 22
            document.getElementById("ninStar").value = this.dataset.set;
            document.getElementById("Form2").submit();
        }
    }
    // addEventListener 
    window.addEventListener("DOMContentLoaded", stars.init);
</script>