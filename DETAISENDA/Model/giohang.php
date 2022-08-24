<?php
  // ko cần tạo class
  function add_item($mahang,$quantity,$mymausac,$kichthuoc)//16, 1,hồng đậm, 37
  {

    $pros=new sanpham();
    $pro=$pros->SPchitiet($mahang);

//kiểm tra sp đã tồn tại trong giỏ
if(isset($_SESSION['bag'][$mahang]))
{
  // nếu tồn tại thì chỉ tăng số lượng của món hàng đó
  $quantity+=$_SESSION['bag'][$mahang]['qty'];//$quantity=$quantity+$_SESSION['cart'][$mah]['qty']=2+3=5
  // muốn update thì cần phải biết mahh
  update_item($mahang,$quantity);
  return;
}
    $cost=$pro['dongia'];
    $ten=$pro['tensp'];
    $hinh=$pro['hinh'];
    $total=$cost*$quantity;// thành tiền của 1 sản phẩm
      
      $item=array(
      'masp'=>$mahang,// key=>value
      'hinh'=>$hinh,
      'name'=>$ten,
      'mau'=>$mymausac,
      'kichthuoc'=>$kichthuoc,
      'cost'=>$cost,
      'qty'=>$quantity,
      'total'=>$total,
    );
    // đem đối tượng add vào  giỏ hàng
    $_SESSION['bag'][$mahang]=$item;
  }
  //phương thức tính tổng tiền
  function pttinhtongtien()
  {
    $tt=0;
    foreach($_SESSION['bag'] as $item) //duyệt qua giỏ hàng qua mảng SESSION 
    {
      $tt+=$item['total'];
    }
    $tt=number_format($tt);//dinh dang tiền tệ
    return $tt;
  }
  function update_item($mahang,$quantity)//21,10
  {
    if($quantity<=0)
    {
      unset($_SESSION['bag'][$mahang]);
    }
    else{
        // cập nhật lại là chỉ thực hiện phép gán lại
      $_SESSION['bag'][$mahang]['qty']=$quantity;//$_SESSION['cart'][21]['qty']=4
      // phải tính lại tổng tiền
      $totalnew=$_SESSION['bag'][$mahang]['qty']*$_SESSION['bag'][$mahang]['cost'];
      $_SESSION['bag'][$mahang]['total']= $totalnew;
    }
    
  }
  ?>