<link rel="stylesheet" href="Content/CSS/header.css">
<header class="row no-gutters">
<div class="container-fluid">
	<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color:#fcfcfc; display: inline-flex;">
          <!-- LOGO HINCULENT-->
				  <a class="navbar-brand"><img src="Content/IMG/logo.png" alt="" style="height:75px;"/></a>
             <!-- Kết thúc Logo Hinculent -->
            <!--Thanh tìm kiếm và giỏ hàng-->
            <form class="input-group" action="index.php?action=home&act=timkiem"  method="post" style="width: 220px;">
            <input type="text 1" name="txtsearch" class="form-control" placeholder="Tìm kiếm sản phẩm">
            <div class="input-group-append">
            <button class="btn btn-secondary" type="submit" class="form-control">
                <i class="fa fa-search"></i>
            </button>
            </div>
        </form>
            <!--Kết thúc Thanh tìm kiếm và giỏ hàng-->
            <!--Dấu 3 chấm khi thu nhỏ -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!--Kết thúc dấu 3 chấm khi thu nhỏ -->
			      <!-- Menu chính -->
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
					    <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="index.php?">Trang Chủ</a></li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php?action=home&act=sanpham">Sản Phẩm</a></li>     
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="tranglienhe.html">Liên Hệ</a></li>               
              </ul>
                <ul class="navbar-nav">
                <?php
                            if(isset($_SESSION['makh'])){
                                extract($_SESSION['makh']);
                  
                ?>
                  <li class="dropdown">
                  <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="index.php?action=login&act=capnhatuser">Xem thông tin</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=giohang">Giỏ Hàng</a></li>
                    <?php if($role==1){?>
                    <li class="nav-item"><a class="nav-link" href="Admin2/index.php">Vào Admin</a></li>     
                      <?php }?>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=login&act=logout">Đăng Xuất</a></li> 
                  </ul>
                  </li>
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black">
               <?php echo "Chào ".$tendnhap;?></a>
                <?php }else {?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black">
                      Tài khoản                  
                    </a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?action=login">Đăng Nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=dky">Đăng Ký</a></li>
                  </ul>
                </li>
                <?php } ?>
                </ul>      
            </div>
            <!--Kết thúc menu chính -->                                    				
          </nav>      
				</div>  
</header>
<!-- dang ky -->
<hr>
<!-- hinh dộng -->
<div class="row">

    <div class="col-12 mt-5">
        <div class="row mt-1">
            <div class="col-12">
                <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="2"></li>

                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner z-depth-1-half" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./Content/IMG/b.png" style=" filter: brightness(80%);height: 595px;" alt=" First slide">
                            <div class="carousel-caption" style="text-align: left;">
                            <h1><strong> Chào Bạn <br>Đến Với <span style="color: rgb(217, 235, 197);">Hinculent</strong></h1>
                            <p style="float:left;color: rgb(217, 235, 197)">Đây là ngôi nhà sen đá với hàng trăm loại khác nhau<br>với vẻ ngoài tuyệt đẹp mà bạn sẽ phải chìm đắm.</p>         
                        </div>
                        </div>
                        <!--/First slide-->
                        <!--Second slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./Content/IMG/bannerr.jpg" style=" filter: brightness(80%);height: 595px;" alt="Second slide">
                            <div class="carousel-caption" style="text-align: left;">
                            <h1><strong> Chào Bạn <br>Đến Với <span style="color: rgb(217, 235, 197);">Hinculent</strong></h1>
                            <p style="float:left;color: rgb(217, 235, 197);">Đây là ngôi nhà sen đá với hàng trăm loại khác nhau<br>với vẻ ngoài tuyệt đẹp mà bạn sẽ phải chìm đắm.</p>         
                        </div>
                        </div>
                        <!--/Second slide-->
                        <!--Third slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./Content/IMG/banner.jpg" style=" filter: brightness(80%);height: 595px;" alt="Third slide">
                            <div class="carousel-caption" style="text-align: left;">
                            <h1><strong> Chào Bạn <br>Đến Với <span style="color: rgb(217, 235, 197);">Hinculent</strong></h1>
                            <p style="float:left;color: rgb(217, 235, 197);">Đây là ngôi nhà sen đá với hàng trăm loại khác nhau<br>với vẻ ngoài tuyệt đẹp mà bạn sẽ phải chìm đắm.</p>         
                        </div>
                        </div>

                        <!--/Third slide-->
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
            </div>
        </div>
       
    </div>
</div>