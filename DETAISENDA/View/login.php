<link rel="stylesheet" href="Content/CSS/login.css">
<div class=" container form-tt mb-5 mt-5">
    <h2>Đăng nhập</h2>
    <form action="index.php?action=login&act=login_act" method="post">
        <label for="exampleInputEmail1" class="text-uppercase">Username</label>
        <input type="text" class="form-control" name="txtusername" placeholder="Nhập tài khoản" style="background-color:rgb(183, 216, 188);">

        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
        <input type="password" class="form-control" name="txtpassword" placeholder="Nhập mật khẩu" style="background-color:rgb(183, 216, 188);">          
        <input type="submit" name="dangnhap" value="Đăng nhập" style="background-color:rgb(183, 216, 188);"/>
        <label><a href="index.php?action=forgetps">Quên mật khẩu</a></label>
    </form>
</div>