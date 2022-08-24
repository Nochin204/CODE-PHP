<?php
class users
{
    //thuoc tinh 
    var $makh = 0;
    var $tenkh = null;
    var $diachi = null;
    var $sdt = null;
    var $tendnhap = null;
    var $email = null;
    var $pass = null;
    //hamtao
    public function __construct()
    {
    }
    //phuongthuc
    function AddUsers($tenkh,$diachi,$sdt,$tendnhap,$email,$pass)
    {
        //ketnoi dbs
        $db = new connect();
        $query = "insert into users(makh,tenkh,diachi,sdt,tendnhap,email,pass)
        values(NULL,?,?,?,?,?,?)";
        $us = $db->useprepare($query);
        $us->execute([$tenkh,$diachi,$sdt,$tendnhap,$email,$pass]);
    }
    //ktra thong tin dnhap
    function login($tendnhap,$pass)
    {
          //ketnoi dbs
          $db = new connect();
          //yeu cau sql thuc thi
          $select="select * from users where tendnhap='$tendnhap' and pass='$pass'";
          //câu lệnh select pthuc dạng cơ bản
          $result=$db->getInstance($select);
          return $result;
    }
     // pt đếm lượt comment
     function getCountComment($id)
     {
       $db=new connect();
       //b2 : yêu cầu thực hiện câu truy vấn truyền 2 tham số
       $select="select count(mabl) from binhluan where masp=$id";
       //b3 : yêu  cầu lớp connect() thực thi câu truy vấn này
       //dùng getList thử
       $result=$db->getInstance($select);
       return $result[0];
     }
     // pt insert vào database comment
     function insertComment($masp,$makh,$noidung)
     {
       $db=new connect();
       $date=new DateTime("now");
       //do trong csdl định dạngY-m-d
       $ngay=$date->format("Y-m-d");
       $query="insert into binhluan(mabl,masp,makh,ngaybl,noidung)values(NULL,$masp,$makh,'$ngay','$noidung')";
       $result=$db->getexec($query);
     }
     // pt hiển thị thôngtin mà ng dùng bl 1sp
     function hienthiComment($masp)
     {
       $db=new connect();
       $select="select a.tenkh,b.noidung from users a inner join binhluan b on a.makh=b.makh where b.masp=$masp";
       $result=$db->getList($select);
       return $result;
     }
        // lấy lại địa chỉ email và mật khẩu của user
    function getEmail($email)
    {
      $db=new connect();
      $select="select email,pass from users where email='$email'";
      $result=$db->getInstance($select);
      return $result;
    }
    function getPassEmail($email, $pass)
    {
        $select ="SELECT email,pass from users where md5(email)='$email' and md5(pass)='$pass'";
        // select email, matkhau from khachhang1 where md5(phptestly20@gmail.com)='405999d3a4fb8cddf893e238928c001'
        $db=new connect();
        $result= $db->getInstance($select);
        return $result;
    }
    function updateEmail($emailold,$passnew)
    {
        $db=new connect();
        $query="UPDATE users set pass='$passnew' where email='$emailold'";
        // echo $select;
       $db->getexec($query);
    }
    function update_tk($makh,$tenkh,$diachi,$sdt,$tendnhap,$email)
    {
        $db=new connect();
        $query="UPDATE users 
        set tenkh='$tenkh',tendnhap='$tendnhap',email='$email',diachi='$diachi',sdt=$sdt where makh=$makh";
        // echo $select;
       $db->exec($query);
    }
    function gmaiuser($username)
    {
      $db=new connect();
      $select="select * from users where tendnhap='$username'";
      $result=$db->getInstance($select);
      return $result;
    }
    function sdtuser($sokh)
    {
      $db=new connect();
      $select="select * from users where sdt='$sokh'";
      $result=$db->getInstance($select);
      return $result;
    }
    function gmailuser($txtmail)
    {
      $db=new connect();
      $select="select * from users where email='$txtmail'";
      $result=$db->getInstance($select);
      return $result;
    }
  }
?>