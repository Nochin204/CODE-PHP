<?php
function uploadImage()
{
  $target_dir = "../Content/IMG/";
  // b2: lấy tên hình đưa vào trong thư mục tên là uploadimage
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  // $target_file=uploadimage/oxford.jpg
  // B3: lấy phần mở rộng của hình ra đổi về dạng chữ thường hoặc chữ in
  // 1.jpg==JPG
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // b4: kiểm tra khi người dùng nhấn nút submit thì hình đó có được đưa lên server hay không
  // dùng biến cờ để đánh dấu việc upload hình thành công, thành công thì đặt biến cờ =1
  $uploadimage = 1;
  if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check != false) {
      $uploadimage = 1;
    } else {
      echo "Hình này ko tồn tại";
      $uploadimage = 0;
    }
  }
  // kiểm tra nếu mà trong thư mục uploadimage đã có hình đó rồi thì báo cho người dùng biết
  if (file_exists($target_file)) {
    echo "File này đã tồn tại";
    $uploadimage = 0;
  }
  // kiểm tra hình upload có phải là có đuôi .jpg, jpeg, gif, png
  if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jfif") {
    echo "Hình ko đúng định dạng";
    $uploadimage = 0;
  }
  // kiểm tra hình up lên ko được vượt quá 500KB
  if ($_FILES["image"]["size"] > 500000) {
    echo "Hình vượt quá dung lượng";
    $uploadimage = 0;
  }
  // Bước 5: tiến hành lấy hình từ server đỗ vào thư mục uploadimage/tên hình
  if ($uploadimage == 0) {
    echo "Lỗi upload";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "TC";
    } else {
      echo "TB";
    }
  }
}
