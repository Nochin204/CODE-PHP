<style>
    .error {color:red;}
</style>
<link rel="stylesheet" href="Content/CSS/form.css">
<!--index.php?action=dky&act=savedky-->
<form action="index.php?action=dky&act=savedky" method="post" class="form" role="form">
    <div class="container mt-4">
        <h1 style="text-align:center;color:rgb(151, 224, 151);">Đăng ký thành viên !</h1>
        <hr>
        <div class="row">
            <div class="col-4">
                <label><b>Họ và tên :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txttenkh" placeholder="Tên khách hàng" type="text" value="<?php if (isset($txttenkh)) echo $tenkh ?>">
                <span class="error"><?php if (isset($txttenkhErr)) echo $txttenkhErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Địa chỉ :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtdiachi" placeholder="Địa chỉ khách hàng" type="text" value="<?php if (isset($txtdiachi)) echo $diachi ?>">
                <span class="error"><?php if (isset($txtdiachiErr)) echo $txtdiachiErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Số điện thoại :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtsodt" placeholder="Số điện thoại khách hàng" type="text" value="<?php if (isset($txtsodt)) echo $sdt ?>">
                <span class="error"><?php if (isset($txtsodtErr)) echo $txtsodtErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Tên Đăng Nhập :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtusername" placeholder="Tên đăng nhập" type="text" value="<?php if (isset($txtusername)) echo $tendnhap ?>">
                <span class="error"><?php if (isset($txtusernameErr)) echo $txtusernameErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Email :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtemail" placeholder="Email" type="text" value="<?php if (isset($txtemail)) echo $email ?>">
                <span class="error"><?php if (isset($txtemailErr)) echo $txtemailErr ?></span>
            </div>

            <div class="col-4">
                <label><b>Mật Khẩu :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="txtpass" placeholder="Mật khẩu" type="password">
                <span class="error"><?php if (isset($txtpassErr)) echo $txtpassErr ?></span>
            </div>
            <div class="col-4">
                <label><b>Nhập Lại Mật Khẩu :</b></label>
            </div>
            <div class="col-8">
                <input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" type="password">
                <span class="error"><?php if (isset($retypepasswordErr)) echo $retypepasswordErr ?></span>
            </div>

        </div>
        <div class="clearfix">
            <button type="submit" class="signupbtn">Đăng Ký</button>
        </div>
    </div>
    </div>
    </div>
</form>
<!--hiển thị thông tin khi nhập đúng-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>