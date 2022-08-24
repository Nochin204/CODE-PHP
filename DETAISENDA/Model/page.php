<?php
class page{
    public function __construct()
    {

    }
    // phương thức tìm Start
    function findStart($limit)
    {
        //$_GET['page'] là trang hiện tại (current_page)
        if(!isset($_GET['page'])||$_GET['page']==1) {
            $start=0;
            $_GET['page']=1;
        }
        // ngược lại tức là cso tồn tại , thì tính theo công thức
        else{
            $start=($_GET['page']-1)*$limit;
        }
        return $start;
    }
    // phương thức tính tổng số trang = tổng sản phẩm / limit
    function findPage($count,$limit)
    {
        // 25/8= dư khác 0 phần nguyên làm tròn lên cell hoặc dùng floor
        $page=(($count%$limit)==0)?$count/$limit:floor($count/$limit)+1;
        return $page;
    }
}
?>