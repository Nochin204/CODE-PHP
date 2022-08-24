<?php
$action="fogetpassword";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "fogetpassword":
        include "View/forgetpassword.php";
        break;
    case "forgetps_action":
        // lúc này nó nhận địa chỉ email mà người dùng nhập vào
        // đồng thời nó sẽ gửi mail đến địa chỉ này.
        if(isset($_POST['submit_email'])&& $_POST['email'])
        {
            $getemail=$_POST['email'];//phptestly20@gmail.com
            $ur=new users();
            $result=$ur->getEmail($getemail);
            // lấy ra email và mật khẩu trả về từ database
            $email=md5($result['email']); //md5(phptestly20@gmail.com)
            $pass=md5($result['pass']);//md5(e10adc3949ba59abbe56e057f20f883e)
            //tạo đường link để gửi qua email
            $link="<a href='http://localhost:82/index.php?action=forgetps&act=resetps&key=".$email."&reset=".$pass."'>Click To Reset password</a>";
            $mail = new PHPMailer();
            $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;                  
            // GMAIL username to:
            $mail->Username = "phplytest20@gmail.com";
            // GMAIL password
            $mail->Password = "Phplytest20@php";
            $mail->SMTPSecure = "tls";  
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = "587";
            $mail->From='phplytest20@gmail.com';
            $mail->FromName='Ly';
            // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
            $mail->AddAddress($getemail, 'reciever_name');
            $mail->Subject  =  'Reset Password';
            $mail->IsHTML(true);
            $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
            if($mail->Send())
            {
                echo '<script>swal("","Yêu Cầu Thành Công, Hãy Kiểm Tra Mail Của Bạn !", "success");</script>';
                include "View/login.php";
                break;
            }
            else
            {
                echo "Mail Error - >".$mail->ErrorInfo;
            }

            
        }
        break;
    case "resetps":
        include "View/resetpw.php";
        break;
    case "submit_new":
        // nhân mật khẩu mới người dùng nhập
        if(isset($_POST['submit_password']))
        {
            $passnew=md5($_POST['pass']);
            $emailold=$_POST['email'];
            $ur=new users();
            $ur->updateEmail($emailold,$passnew);
            echo '<script> alert("Thay đổi mật khẩu thành công");</script>';
        }
        include "View/login.php";
        break;
}
?>