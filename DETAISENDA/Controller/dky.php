<?php
$action = "dky";
if (isset($_GET['act'])) {
    $action = $_GET['act']; //registration_action
}
switch ($action) {
    case 'dky':
        include "View/dky.php";
        break;
    case 'savedky':
        $txttenkhErr = $txtdiachiErr = $txtsodtErr = $txtusernameErr = $txtemailErr = $txtpassErr = $retypepasswordErr = "";
        $txttenkh = $txtdiachi = $txtsodt = $txtusername = $txtemail = $txtpass = $retypepassword = "";
        $error = array();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //kiểm tra tên khách hàng
            if (empty($_POST['txttenkh'])) {
                $txttenkhErr = "Tên Không Được Rỗng";
                $error['txttenkhErr'] = $txttenkhErr;
            } else { //ngươc lại có nhâp thì phải ktra đúng hay sai
                $tenkh = $_POST['txttenkh'];
                if (!preg_match("/^[a-zA-Z]*$/", $tenkh)) {
                    $txttenkhErr = "Tên phải là các chữ cái";
                    $error['txttenkhErr'] = $txttenkhErr;
                }
            }
            //địa chỉ
            if (empty($_POST['txtdiachi'])) {
                $txtdiachiErr = "Địa Chỉ Không Được Rỗng";
                $error['txtdiachiErr'] = $txtdiachiErr;
            } else {
                $diachi = $_POST['txtdiachi'];
            }
            // kiểm tra số điện thoại
            if (empty($_POST['txtsodt'])) {
                $txtsodtErr = "Số Điện Thoại Không Được Rỗng";
                $error['txtsodtErr'] = $txtsodtErr;
            } else {
                $sokh = $_POST['txtsodt'];
                $userte = new users();
                $usserte = $userte->sdtuser($sokh);
                if ($usserte) {
                    $txtsodtErr = "Số điện thoại đã tồn tại";
                    $error['txtsodtErr'] = $txtsodtErr;
                }
            }
            $sdt = $_POST['txtsodt'];
            if (!preg_match("/^[0][\d]{9,10}$/", $sdt)) {
                $txtsodtErr = "Số điện thoại không hợp lệ";
                $error['txtsodtErr'] = $txtsodtErr;
            }
            //username
            if (empty($_POST['txtusername'])) {
                $txtusernameErr = "Tên Đăng Nhập Không Được Rỗng";
                $error['txtusernameErr'] = $txtusernameErr;
            } else {
                $username = $_POST['txtusername'];
                $usserten = new users();
                $userten = $usserten->gmaiuser($username);
                if ($userten) {
                    $txtusernameErr = "Tên đăng nhập đã tồn tại";
                    $error['txtusernameErr'] = $txtusernameErr;
                }
            }
            $tendnhap = $_POST['txtusername'];
            if (!preg_match("/^[a-z][a-zA-Z0-9]{6,}$/", $tendnhap)) {
                $txtusernameErr = "Tên đăng nhập phải là chữ cái thường ở đầu không có kí tự đặc biệt và trên 6 kí tự";
                $error['txtusernameErr'] = $txtusernameErr;
            }
            if (empty($_POST['txtemail'])) {
                $txtemailErr = "Email Không Đươc Rỗng";
                $error['txtemailErr'] = $txtemailErr;
            } else {
                $txtmail = $_POST['txtemail'];
                $ussert = new users();
                $usert = $ussert-> gmailuser($txtmail);
                if ($usert) {
                    $txtemailErr = "Email đã tồn tại";
                    $error['txtemailErr'] = $txtemailErr;
                }
            }
            $email = $_POST['txtemail'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $txtemailErr = "Email không Hợp Lệ";
                $error['txtemailErr'] = $txtemailErr;
            }
            if (empty($_POST['txtpass'])) {
                $txtpassErr = "Mật Khẩu Không Được Rỗng";
                $error['txtpassErr'] = $txtpassErr;
            } else { //ngươc lại có nhâp thì phải ktra đúng hay sai
                $pass = $_POST['txtpass'];
                if (!preg_match("/^[a-zA-Z]([\w\.!@#$%^&*()]+){8,}$/", $pass)) {
                    $txtpassErr = "Mật khẩu phải có chữ cái ở đầu và hơn 8 kí tự";
                    $error['txtpassErr'] = $txtpassErr;
                }
            }
            if (empty($_POST['retypepassword'])) {
                $retypepasswordErr = "Cần Nhập Lại Mật Khẩu";
                $error['retypepasswordErr'] = $retypepasswordErr;
            } else { //ngươc lại có nhâp thì phải ktra đúng hay sai
                if ($_POST['retypepassword'] != $_POST['txtpass']) {
                    $retypepasswordErr = "Mật Khẩu Không Trùng Khớp";
                    $error['retypepasswordErr'] = $retypepasswordErr;
                }
            }
            $mahoa = md5($pass);
        }
        //  sau khi đăng ký thành công, muốn quay trở về trang nào
        if (empty($error)) {
            $ax = new users();
            $ax->AddUsers($tenkh, $diachi, $sdt, $tendnhap, $email, $mahoa);
            echo '<script>swal("","Đăng ký thành công !", "success");</script>';
            include "View/login.php";
            break;
        } else {
            echo '<script>swal("","Vui lòng nhập lại !", "error");</script>';
        }
        include "View/dky.php";
}




