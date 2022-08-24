-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2022 at 12:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senda`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `mabl` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`mabl`, `masp`, `makh`, `ngaybl`, `noidung`) VALUES
(40, 21, 1, '2022-03-14', '  a'),
(41, 20, 11, '2022-03-16', '  dep qua'),
(42, 19, 11, '2022-03-16', '  đẹp quá hin oiiiiiii');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

CREATE TABLE `chitiethd` (
  `masohd` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(40) NOT NULL,
  `kichthuoc` varchar(64) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`masohd`, `masp`, `soluongmua`, `mausac`, `kichthuoc`, `thanhtien`) VALUES
(12, 5, 1, 'trắng', 'lục giác', 60000),
(13, 5, 1, 'trắng', 'lục giác', 60000),
(13, 10, 1, 'màu đất', 'túi 1 kg', 30000),
(14, 19, 1, '', '~ 10 cm', 50000),
(15, 17, 1, '', '~ 1 cm', 10000),
(16, 17, 1, '', '~ 1 cm', 10000),
(16, 19, 1, '', '~ 10 cm', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(12, 1, '2022-03-14', 60000),
(13, 1, '2022-03-14', 90000),
(14, 11, '2022-03-16', 50000),
(15, 11, '2022-03-16', 10000),
(16, 11, '2022-03-16', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Sen Đá', 2),
(2, 'Xương Rồng', 3),
(3, 'Chậu', 4),
(4, 'Giá Thể', 5),
(5, 'Tiểu Cảnh', 6);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `name`, `link`) VALUES
(1, 'Trang Chủ', 'index.php'),
(2, 'Sen Đá', 'senda.php'),
(3, 'Xương Rồng ', 'xuongrong.php'),
(4, 'Chậu', 'chau.php'),
(5, 'Giá Thể', 'giathe.php'),
(6, ' Trang Trí', 'trangtri.php'),
(7, 'Tiểu Cảnh', 'tieucanh.php'),
(8, 'Liên Hệ', 'lienhe.php');

-- --------------------------------------------------------

--
-- Table structure for table `phanloai`
--

CREATE TABLE `phanloai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `anhloai` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phanloai`
--

INSERT INTO `phanloai` (`maloai`, `tenloai`, `anhloai`) VALUES
(1, 'Sen Đá', 'mongrong3.jpg'),
(2, 'Xương Rồng', 'xr3.jpg'),
(3, 'Chậu Cây', 'chau3.png'),
(4, 'Giá Thể', 'giathe2.jpg'),
(5, 'Trang Trí', 'tieucanh5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(128) NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL,
  `hinh` varchar(64) NOT NULL,
  `nhom` int(5) NOT NULL,
  `maloai` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `mausac` varchar(30) NOT NULL,
  `kichthuoc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `dongia`, `giamgia`, `hinh`, `nhom`, `maloai`, `luotxem`, `ngaylap`, `mota`, `soluongton`, `mausac`, `kichthuoc`) VALUES
(3, 'Sen Đá Mống Rồng', 36000, 30000, 'mongrong1.jpg', 10, 1, 0, '2022-01-01', 'Cây sen đá móng rồng (còn được gọi là cây móng rồng) là một loại cây mọng nước, thuộc họ sen đá. Lá của cây sen đá móng rồng thuôn dài về phía trước, nom như những chiếc móng vuốt đầy quyền uy. Phần trên lá có nhiều vân màu trắng chạy ngang theo thân lá. Mỗi khi chạm vào lá, bạn sẽ có cảm giác sần sần, li ti. Lá của chúng thường mọc đối xứng nhau theo từng cặp một.', 3, 'vân trắng', 'nhỏ ~ 5cm'),
(4, 'Chậu Sứ Lục Giác', 60000, 55000, 'chau2.jpg', 1, 3, 0, '2022-01-01', 'Khi nói đến các loại chậu trồng sen đá, chúng ta thường hay nghĩ đến chọn một chậu sen đá hay chậu xương rồng mini bằng sứ và đất nung. Nhưng hiện nay để trồng được một chậu sen đá đẹp ta còn có thể dùng nhiều loại chậu khác. Ví dụ như thủy tinh, gỗ, nhựa hay có thể là những đồ tái chế.', 3, 'trắng', 'lục giác'),
(5, 'Chậu Sứ Tim', 60000, 55000, 'chau3.png', 1, 3, 1, '2022-01-01', 'Khi nói đến các loại chậu trồng sen đá, chúng ta thường hay nghĩ đến chọn một chậu sen đá hay chậu xương rồng mini bằng sứ và đất nung. Nhưng hiện nay để trồng được một chậu sen đá đẹp ta còn có thể dùng nhiều loại chậu khác. Ví dụ như thủy tinh, gỗ, nhựa hay có thể là những đồ tái chế.', 3, 'trắng', '7x7cm'),
(6, 'Chậu Sứ Trứng', 60000, 55000, 'chau5.jpg', 1, 3, 0, '2022-01-01', 'Khi nói đến các loại chậu trồng sen đá, chúng ta thường hay nghĩ đến chọn một chậu sen đá hay chậu xương rồng mini bằng sứ và đất nung. Nhưng hiện nay để trồng được một chậu sen đá đẹp ta còn có thể dùng nhiều loại chậu khác. Ví dụ như thủy tinh, gỗ, nhựa hay có thể là những đồ tái chế.', 3, 'trắng', '7x7cm'),
(7, 'Chậu đất nung', 40000, 39900, 'chau6.jpg', 9, 3, 0, '2022-01-01', 'Khi nói đến các loại chậu trồng sen đá, chúng ta thường hay nghĩ đến chọn một chậu sen đá hay chậu xương rồng mini bằng sứ và đất nung. Nhưng hiện nay để trồng được một chậu sen đá đẹp ta còn có thể dùng nhiều loại chậu khác. Ví dụ như thủy tinh, gỗ, nhựa hay có thể là những đồ tái chế.', 3, 'trắng ngà', '7'),
(8, 'Giá thể Perlite', 25000, 20000, 'giathe1.jpg', 8, 4, 0, '2022-01-01', 'Đá Perlite (đá trân châu) là một loại thủy tinh núi lửa vô định hình có hàm lượng nước tương đối cao, thường được hình thành do sự hydrat hóa của obsidian', 3, 'trắng', 'túi 1 kg'),
(9, 'Giá thể Akadama', 45000, 42000, 'giathe2.jpg', 7, 4, 0, '2022-01-01', 'Đất AKADAMA là loại phân nền ít dưỡng chất, công dụng chính là cho cây trồng bám rễ và dữ cây. Đất AKADAMA thuộc loại đất sét được chế biến thành dạng hạt nhỏ thích hợp để trồng cây bonsai hoặc cây thủy sinh.', 3, 'nâu đất', 'túi 1 kg'),
(10, 'Giá Thể Đất Trồng', 30000, 25000, 'gthe3.jpg', 6, 4, 1, '2022-01-01', 'Đất sạch chuyên dùng để trồng cây, không gây hai cho hoa.', 3, 'màu đất', 'túi 1 kg'),
(11, 'Phân Tan Chậm', 50000, 45000, 'giathe4.jpg', 5, 4, 0, '2022-01-01', '- Cải tạo đất, cung cấp mùn, giúp đất tơi xốp, phát triển rễ cực mạnh - Phân hữu cơ Nhật Bản giúp cân bằng vi sinh vật làm đất thêm màu mỡ - Giúp cây trồng phát triền mạnh mẽ, chống sâu bệnh.', 3, 'vàng đậm', 'túi 1 kg'),
(12, 'Thuốc kích rễ', 30000, 25000, 'giathe5.jpg', 11, 4, 0, '2022-01-01', '-Sản phẩm thuốc kích rễ N3M được sản xuất bởi công ty TNHH MTV Sinh Hóa Nông Phú Lâm. Sản phẩm được rất nhiều người ưa chuộng sử dụng vì giá thành rẻ, công dụng kích thích ra rễ được dùng trên nhiều loại cây trồng từ rau, cây ăn quả cho đến các loại hồng hồng – hoa kiểng', 3, '', 'chai 500 gam'),
(13, 'Thuốc tím', 20000, 15000, 'giathe6.jpg', 2, 4, 0, '2022-01-01', 'Thuốc Starkle G chỉ cần rải lên mặt chậu, thuốc sẽ tan và cây sẽ hút qua rễ và lưu dẫn toàn thân. Các con sâu, rệp sáp, nhện... cắn hoặc chích hút phải nhựa cây sẽ bị trúng độc và chết.', 3, 'tím', 'túi 100 gam'),
(14, 'Tiểu cảnh anh em', 10000, 9500, 'tieucanh1.jpg', 3, 5, 0, '2022-01-01', 'Chúng tôi chuyên cung cấp sỉ và lẻ với giá cả tốt nhất thị trường nhiều mẫu chậu cây cảnh độc đáo bằng các chất liệu Đất Nung, Gốm, Sứ, Xi Măng, Gỗ, Thủy Tinh cao cấp… và các phụ kiện trồng cây, tiểu cảnh, bể cá phù hợp với mọi nhu cầu của khách hàng', 3, '', '~ 1 cm'),
(15, 'Tiểu cảnh em bé', 10000, 9500, 'tieucanh2.jpg', 3, 5, 0, '2022-01-01', 'Chúng tôi chuyên cung cấp sỉ và lẻ với giá cả tốt nhất thị trường nhiều mẫu chậu cây cảnh độc đáo bằng các chất liệu Đất Nung, Gốm, Sứ, Xi Măng, Gỗ, Thủy Tinh cao cấp… và các phụ kiện trồng cây, tiểu cảnh, bể cá phù hợp với mọi nhu cầu của khách hàng', 3, '', '~ 1 cm'),
(16, 'Tiểu cảnh ghế', 10000, 9500, 'tieucanh3.png', 3, 5, 0, '2022-01-01', 'Chúng tôi chuyên cung cấp sỉ và lẻ với giá cả tốt nhất thị trường nhiều mẫu chậu cây cảnh độc đáo bằng các chất liệu Đất Nung, Gốm, Sứ, Xi Măng, Gỗ, Thủy Tinh cao cấp… và các phụ kiện trồng cây, tiểu cảnh, bể cá phù hợp với mọi nhu cầu của khách hàng', 3, '', '~ 1 cm'),
(17, 'Tiểu cảnh nhà', 10000, 9500, 'tieucanh4.jpg', 3, 5, 2, '2022-01-01', 'Chúng tôi chuyên cung cấp sỉ và lẻ với giá cả tốt nhất thị trường nhiều mẫu chậu cây cảnh độc đáo bằng các chất liệu Đất Nung, Gốm, Sứ, Xi Măng, Gỗ, Thủy Tinh cao cấp… và các phụ kiện trồng cây, tiểu cảnh, bể cá phù hợp với mọi nhu cầu của khách hàng', 3, '', '~ 1 cm'),
(18, 'Xương rồng bông', 100000, 95000, 'xr1.jpg', 4, 2, 1, '2022-01-01', 'Cây Xương Rồng Bông Gòn có tên chính xác là Mammillaria Plumosa chính vì tên của nó khá khó gọi mà về Việt Nam, người dân dựa trên đặc điểm của cây mà đặt cho loài xương rồng này cái tên là Xương Rồng Bông Gòn. Cây phù hợp để bàn, quà tặng, trang trí quán cà phê, các góc nhỏ…', 3, '', '~ 10 cm'),
(19, 'Xương rồng trứng', 50000, 45000, 'xr3.jpg', 12, 2, 8, '2022-01-01', 'Hầu hết các bạn cũng đã biết xương rồng là loài cây rất kiên cường, nó có khả năng chịu được nắng nóng và khô hạn kéo dài. Xương rồng trứng chim cũng vậy, thân cây mọng nước và có gai bao phủ, như tấm lá chắn, khiến sự khiên cường của nó càng được tăng lên.', 3, '', '~ 10 cm'),
(20, 'Xương rồng Aster', 60000, 55000, 'xr2.jpg', 13, 2, 3, '2022-01-01', 'Xương rồng aster (tên khoa học là Astrophytum asterias) thuộc chi Astrophytum – Tên gọi chung “Astrophytum” ​​bắt nguồn từ tiếng Hy Lạp: astron, có nghĩa là một “ngôi sao” và phyton, có nghĩa là “cây trồng”. Tên của nó có thể được hiểu là: “ngôi sao thực vật” hay gọi là “xương rồng sao biển”.', 3, 'chấm trắng', '~ 5 cm'),
(21, 'Sen Đá Kim Cương', 50000, 45000, 'sen5.jpg', 14, 1, 5, '2022-01-01', 'Giống sen đá này có tên khoa học là Haworthia cooperi var. Cũng tương tự như các loại khác, sen đá kim cương cũng có vóc dáng nhỏ, lá mọng nước xếp chồng lên nhau. Khi lớn, cây có hình dáng rất đẹp. Cây có đầu lá trong suốt, để ngược giống như viên kim cương lung linh, càng trở nên lấp lánh hơn khi ở dưới nắng.', 30, 'xanh', '~ 10 cm');

-- --------------------------------------------------------

--
-- Table structure for table `star_rating`
--

CREATE TABLE `star_rating` (
  `productid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `rating` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `star_rating`
--

INSERT INTO `star_rating` (`productid`, `username`, `rating`) VALUES
(1, 'hana1223343', 5),
(2, 'hien', 5),
(3, 'fhwifohe23', 5),
(4, 'hien', 5),
(5, 'fhwifohe23', 4),
(5, 'hien', 5),
(9, 'hien', 5),
(10, 'hien', 5),
(17, 'hoahong123', 5),
(18, 'hien', 5),
(19, 'hien', 5),
(19, 'hoahong123', 4),
(20, 'hien', 5),
(20, 'hoahong123', 4),
(21, 'hien', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sdt` varchar(12) NOT NULL,
  `tendnhap` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`makh`, `tenkh`, `diachi`, `sdt`, `tendnhap`, `email`, `pass`, `role`) VALUES
(1, 'hien', 'yenbai', '0792504893', 'hien', 'Ngochienn02019@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(8, 'hoamuoigio', 'ho chi minh', '792504893', 'hana122334', 'Ngochienn02019@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(9, 'hienhoa', 'hoahau', '0792504899', 'fhwifohe23', 'Ngochienn019@gmail.com', '200ac4f1ddce20b6d1013d883c43b267', 0),
(10, 'hienngoc', 'lào cai', '0792504892', 'hana1223343', 'Ngochien02019@gmail.com', '200ac4f1ddce20b6d1013d883c43b267', 0),
(11, 'minhhhh', 'sai gon', '0792504898', 'hoahong123', 'Ngochienn020192@gmail.com', '18afddcb88a85a5f6ab0acd616f199ed', 0),
(12, 'lam', 'binh duong', '0792504839', 'shfisfhio23424', 'Ngochiegmaisd@gmail.com', '9110e7616232cae708964abb88906b56', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `khoangoai4` (`makh`),
  ADD KEY `khoangoai5` (`masp`);

--
-- Indexes for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD PRIMARY KEY (`masohd`,`masp`),
  ADD KEY `khoangoai2` (`masp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`),
  ADD KEY `khoangoai3` (`makh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`),
  ADD KEY `FK_loai_menu` (`idmenu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `khoangoai6` (`maloai`);

--
-- Indexes for table `star_rating`
--
ALTER TABLE `star_rating`
  ADD PRIMARY KEY (`productid`,`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`makh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `khoangoai4` FOREIGN KEY (`makh`) REFERENCES `users` (`makh`),
  ADD CONSTRAINT `khoangoai5` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `khoangoai1` FOREIGN KEY (`masohd`) REFERENCES `hoadon` (`masohd`),
  ADD CONSTRAINT `khoangoai2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `khoangoai3` FOREIGN KEY (`makh`) REFERENCES `users` (`makh`);

--
-- Constraints for table `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `FK_loai_menu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `khoangoai6` FOREIGN KEY (`maloai`) REFERENCES `phanloai` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
