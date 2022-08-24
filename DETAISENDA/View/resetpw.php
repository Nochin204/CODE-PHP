<link rel="stylesheet" href="Content/CSS/form.css">
<div class="container">
    <div class="row">
    <div class="col-4"></div>
      <div class="col-4">
        <!-- <h3 class="text-center"><b>Login Now</b></h3> -->
        <?php
         if(isset($_GET['key']) && isset($_GET['reset']))
         {
             $email=$_GET['key'];// hien123@gmail.com
             $pass=$_GET['reset'];// 456 đã đc mã hóa
             $ur=new users();
             $result=$ur->getPassEmail($email,$pass);
             if($result!=false)
             {
                $emailold=$result['email']; //phplytest20@gmail.com
        ?>     
        <form  action="index.php?action=forgetps&act=submit_new" class="login-form" method="post">
        
            <input type="hidden" name="email" value="<?php echo $emailold;?>">
            <p>Enter New password</p>
            <input type="password" name='pass'>
            <input type="submit" name="submit_password"  class="signupbtn">
        </form>
       <?php
             }
            }
       ?>
    </div>
    <div class="col-4"></div>
    </div>
  </div>