<?php 
session_start();
?>
<style>
    .error {color:red;}
</style>
<link rel="stylesheet" href="Content/CSS/form.css">
<!--index.php?action=dky&act=savedky-->


<form action="index.php?action=login&act=capnhatuser" method="post" class="form" role="form">
    <div class="container mt-4">
        <h1 style="text-align:center;color:rgb(151, 224, 151);">Xem Thông Tin</h1>
        <hr>
        <div class="row">
            <div class="col-4">
                <label><b>Họ và tên :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txttenkh"  placeholder="Tên khách hàng" type="text" value="<?=$tenkh?>">
                <span class="error"><?php if (isset($txttenkhErr)) echo $txttenkhErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Địa chỉ :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtdiachi" placeholder="Địa chỉ khách hàng" type="text" value="<?=$diachi ?>">
                <span class="error"><?php if (isset($txtdiachiErr)) echo $txtdiachiErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Số điện thoại :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtsodt" placeholder="Số điện thoại khách hàng" type="text" value="<?=$sdt ?>">
                <span class="error"><?php if (isset($txtsodtErr)) echo $txtsodtErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Tên Đăng Nhập :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtusername" placeholder="Tên đăng nhập" type="text" value="<?=$tendnhap ?>">
                <span class="error"><?php if (isset($txtusernameErr)) echo $txtusernameErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Email :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtemail" placeholder="Email" type="text" value="<?=$email ?>">
                <span class="error"><?php if (isset($txtemailErr)) echo $txtemailErr ?></span>
            </div>
        </div>
        <div class="clearfix">
        <input type="hidden" name="makh" value="<?=$makh?>">
        </div>
    </div>
    </div>
    </div>
</form>
