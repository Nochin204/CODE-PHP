<link rel="stylesheet" href="Content/CSS/home.css">
  <!-- end quảng cáo -->
  <!-- phân trang -->
  <?php
    // tìm tổng số record(hàng hoá)
    $hh=new sanpham();
    $results=$hh->SPTongHop();
    $count=$results->rowCount();// trả về 19 record sản phẩm
    // quy định mỗi trang bao nhiêu sản phẩm tức là $limit
    $limit=8;
    // tính tổng số trang và tính $start
    $p=new page();
    // gọi tổng số trang ra
    $page=$p->findPage($count,$limit);//$page=3
    // gọi ra tính $start
    $start=$p->findStart($limit);
    // tạo current_page: trang hiện tại dựav ào get URL
    $current_page=isset($_GET['page'])?$_GET['page']:1;
  ?>
  
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
  <?php
 if(isset($_GET['act']))
 {
     if($_GET['act']=="sanpham")
     {
         $ac="sanpham";
     }
     else if($_GET['act']=="khuyenmai")
     {
         $ac="khuyenmai";
     }
     else if($_GET['act']=="timkiem")
     {
         $ac="timkiem";
     }
 }
 ?>
<link rel="stylesheet" href="Content/CSS/giohang.css">
  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="container-fluit" style="height: 230px;background-color: rgba(229, 238, 226, 0.753);">
      <div class="container" style="padding-top:150px ;">
        <div class="tieudegiohang">
          Danh Sách Sản Phẩm
        </div>
      </div>
    </div><br>
<div class="container mt-5">

    <div class="row">
            
        </div>
        
      <!--Grid row-->
      <div class="row">
                <?php
                    if($ac=="sanpham")
                    {
                        //$result=$hh->getListHangHoaAllPage()
                        $result=$hh->getListHangHoaPage($start,$limit);
                    }
                    else if($ac=="timkiem")
                    {
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                            $namesearch=$_POST['txtsearch'];
                            $result=$hh->getinfSearch($namesearch);
                        }
                    }
                    while($set=$result->fetch()):
                ?>
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

      <!--Grid row-->

  </section>
 
  
  <!-- end sản phẩm mới nhất -->
  
  <style>
.pagination a {
  color: black;
  padding: 8px 16px;
  text-decoration: none;
  background-color: white;
}
</style>
<div class="container">
  <div class="col-md-6 div col-md-offset-3">
				<ul class="pagination">
					<?php
                    //khi nào lùi về trang sau, khi trang hiện tại tức là current_page > 1 
                    //thì mới lùi về 1 đc và nút mới xuất hiện
                    if($current_page>1 && $page>1)
                    {
                        echo '<li><a href="index.php?action=home&act=sanpham&page'.($current_page-1).'">Prev</a></li>';
                    }
                    for($i=1;$i<=$page;$i++)
                    {
                    ?>
                    <li ><a href="index.php?action=home&act=sanpham&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                    <?php
                    }
                    // next cho đến khi trang hiện tại < tổng số trang
                    if($current_page<$page && $page>1)
                    {
                        echo '<li><a href="index.php?action=home&act=sanpham&page'.($current_page+1).'">Next</a></li>';
                    }
                    ?>				   
				</ul>
</div></div>