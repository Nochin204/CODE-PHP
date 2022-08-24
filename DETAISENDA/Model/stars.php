<?php
class Stars{
  // hàm tạo
  function __construct()
  {
    
  }
  // phương thức tính trung bình
  function avg()
  {
    $db=new connect();
    $select="SELECT productid,round(avg(rating),2) avg from star_rating group by productid";
    $result=$db->getList($select);
    $average=[];
    while($set=$result->fetch())
    {
      $average[$set['productid']]=$set['avg'];// $average[20]=3.5
    }
    return $average;//$average[20=>3.5,21=>4,22=>3]
  }
  // phương thức trả ra số điểm mà khách hàng đánh giá 1 sản phẩm
  function getRating($uid,$masp)
  {
    $db=new connect();
    $select="select rating from star_rating where username='$uid'and productid=$masp";
    $result=$db->getInstance($select);
    return $result[0];//4
  }
  //phương thức REPLACE thay thế tất cả các lần xuất hiện của 1 chuỗi được chỉ định
  // REPLACE(string, from_string, to_string)
  // string là chuỗi nguồn,
  // from_string là chuỗi tìm để thay thế
  // to_String là chuỗi thay thế
  // REPLACE("ABC.EDU.VN","ABC","ITC") ITC.EDU.VN
  function update($pid,$uid,$rating)
  {
    $db=new connect();
    $query="REPLACE INTO star_rating(productid,username,rating) values(?,?,?)";
    $stm=$db->execP($query);
    $stm->execute([$pid,$uid,$rating]);
  }
}
?>