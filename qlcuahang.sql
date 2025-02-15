-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2024 at 12:59 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlcuahang`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `IdCart` int NOT NULL,
  `MaSP` int NOT NULL,
  `IdUser` int NOT NULL,
  `Quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaCTHD` int NOT NULL,
  `MaDH` int NOT NULL,
  `MaSP` int NOT NULL,
  `SoLuong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaCTHD`, `MaDH`, `MaSP`, `SoLuong`) VALUES
(15, 9, 3, 1),
(16, 10, 25, 1),
(17, 10, 2, 2),
(18, 10, 1, 1),
(19, 10, 27, 1),
(20, 11, 1, 1),
(21, 11, 7, 1),
(22, 11, 23, 1),
(23, 12, 1, 1),
(24, 13, 23, 1),
(25, 14, 25, 1),
(26, 15, 27, 4),
(27, 15, 8, 1),
(28, 16, 20, 1),
(29, 16, 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int NOT NULL,
  `NgayDat` date NOT NULL,
  `DiaChiNhanHang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `ThanhToan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `MaUser` int NOT NULL,
  `TongTien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDH`, `NgayDat`, `DiaChiNhanHang`, `SDT`, `ThanhToan`, `MaUser`, `TongTien`) VALUES
(9, '2024-05-06', '', '', '', 4, 380000),
(10, '2024-05-10', '', '', '', 2, 2860000),
(11, '2024-05-10', 'TPHCM', '0857368757', 'cash', 2, 1830000),
(12, '2024-05-10', 'TPHCM', '0857368757', 'cash', 2, 450000),
(13, '2024-05-10', 'TPHCM', '0857368757', 'ThanhToanBangTienMat', 2, 1200000),
(14, '2024-05-10', 'TPHCM', '0857368757', 'Thanh toán khi nhận hàng', 2, 980000),
(15, '2024-05-28', '140 Lê Trọng Tấn', '0857123431', 'Thanh toán khi nhận hàng', 2, 3720000),
(16, '2024-05-28', '140 Lê Trọng Tấn', '0893212345', 'Thanh toán khi nhận hàng', 10, 2590000);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `customer_id` int NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `MaSP` int NOT NULL,
  `TenSP` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `GiaBan` decimal(10,0) NOT NULL,
  `SoLuong` int NOT NULL,
  `MoTa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `MaLoaiSP` int NOT NULL,
  `AnhSP` varchar(400) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`MaSP`, `TenSP`, `GiaBan`, `SoLuong`, `MoTa`, `MaLoaiSP`, `AnhSP`) VALUES
(1, 'Bó hoa xanh trắng tổng hợp hoa', 450000, 5, 'Hoa được làm thủ công', 1, 'Bo hoa xanh trang.jpg'),
(2, 'Áo kiểu xanh len sọc trắng mẫu mới', 300000, 10, 'Đi biển là hợp lý', 2, 'Ao kieu xanh bien.jpg'),
(3, 'Bó hoa tím trắng pastel mộng mơ', 380000, 4, 'Có thể tặng sinh nhật hoặc kỷ niệm', 1, 'Bo hoa tim trang.jpg'),
(4, 'Bó hoa tím hồng pastel nhiều loại hoa', 480000, 6, 'Dịp lễ là sự thích hợp', 1, 'bo_hoa_tim_hong.jpg'),
(5, 'Áo bảy sắc cầu vồng tay dài hot trend', 570000, 12, 'Mùa đông tới người không tới thì thôi', 2, 'Ao bay sac cau vong.jpg'),
(6, 'Áo kiểu xanh bơ nơ giữ ấm mùa đông', 290000, 7, 'Xanh lá nhưng không xa lánh', 2, 'ao kieu xanh bo.jpg'),
(7, 'Áo croptop hoa bi nhỏ màu hồng be', 180000, 11, 'Vườn hoa này chỉ cần một chủ', 2, 'ao_no_hoa.jpg'),
(8, 'Túi đeo Cinamoroll tai dài dễ thương', 400000, 20, 'Túi xách thú nhồi bông tai dài', 3, 'tui_tai_dai_trang_xanh.jpg'),
(9, 'Túi que kem nhiều màu sắc trẻ trung', 630000, 10, 'Túi xách đầy màu sắc chấp mọi đồ', 3, 'Tui kem bay màu.jpg'),
(10, 'Túi hoa cúc xanh trắng dây đeo biển', 800000, 5, 'Sự thích hợp với trang phục nữ tính', 3, 'Tui hoa cuc xanh trang.jpg'),
(11, 'Túi xanh phiên bản giới hạn dây đeo', 950000, 3, 'Phiên bản giới hạn', 3, 'Tui day deo phien ban gioi han.jpg'),
(12, 'Váy Hoa thêu xanh hồng pastel body', 700000, 9, 'Những buổi tiệc cùng bạn bè', 4, 'Dam_xanh_hong.jpg'),
(13, 'Váy sọc caro hồng trắng khoét eo', 650000, 13, 'Hẹn hò không thể hợp lý hơn', 4, 'vay caro do trang.jpg'),
(14, 'Váy cột lông tơ nữ tính cầu vồng ấm', 850000, 3, 'Phiên bản giới hạn', 4, '6655fc3b3a659.jpg'),
(15, 'Set váy trắng xanh năng động gen Z', 420000, 8, 'Không cần suy nghĩ phối đồ', 4, 'set vay xanh trang.jpg'),
(16, 'Bó Hoa hồng đỏ đặc biệt mùa giáng sinh', 520000, 10, 'Nếu cậu xuất hiện cùng với bó hoa này thì chúng ta thành đôi', 1, 'Bo hoa hong do.jpg'),
(17, 'Áo kiểu nữ bảy sắc cầu vòng mùa hè', 450000, 20, 'Mùa hè đi biển xách theo một chiếc để theo xinh đẹp', 2, 'ao kieu nu.jpg'),
(18, 'Bó hoa hồng trắng kiểu cách đáng yêu', 420000, 10, 'Bó hoa thích tặng vào các dịp lễ hay kỉ niệm', 1, 'Bo hoa hong hong.jpg'),
(19, 'Bó hoa xanh hồng gắn đèn ', 560000, 5, 'Hoa được tặng vào ngày không đặc biệt đó là tình cảm đong đầy', 1, 'bo hoa hong.jpg'),
(20, 'Bó hoa đầy đủ màu sắc tinh tế', 750000, 4, 'Hoa đầy đủ màu sắc như cách đong đầy yêu thương', 1, 'bo hoa hong xanh.jpg'),
(21, 'Túi hồng trắng đáng yêu ', 920000, 3, 'Túi xách váy hồng hông biết bằng lòng hay chưa', 3, 'tui hong trang.jpg'),
(22, 'Túi xách có 2 mẫu xanh hồng cột nơ trắng hồng', 750000, 20, 'Xanh hồng hông biết người có lòng hông', 3, 'tui xanh hong.jpg'),
(23, 'Túi xách xanh tím phiên bản đặc biệt cột nơ', 1200000, 5, 'xanh lá thì xa lánh, xanh tím thì thêm sánh cùng diện đồ', 3, 'tui xanh.jpg'),
(24, 'Túi nữ 3 màu tươi trẻ', 870000, 30, 'Ba màu thì tươi trẻ, còn thứ ba này cậu có ai đi cùng chưa', 3, 'tui nu.jpg'),
(25, 'áo len bướm cho mùa hè năng động ', 980000, 40, 'Hè này đi biển nhớ tới tìm mang về em áo len bướm nha', 2, 'ao len buom.jpg'),
(26, 'Đầm mây trắng xinh xắn', 570000, 9, 'Trời xanh mây trắng, cậu có muốn làm ánh nắng của tớ không', 4, 'dam may.jpg'),
(27, 'Đầm body màu be + áo khoác hồng pastel', 830000, 15, 'Phù hợp những trang phục vui chơi thoải mái gặp gỡ bạn bè', 4, 'dam hong.jpg'),
(28, 'Hoa thú tai dài xanh trắng đáng yêu', 640000, 18, 'Hoa tặng cho hoa thì chúng ta sẽ có một đóa hoa xinh đẹp', 1, 'hoa thu.jpg'),
(29, 'Áo kiểu nữ 2 màu phá cách ', 290000, 20, 'Còn gì đẹp hơn khi diện chiếc áo này đi gặp người muốn gặp', 2, 'ao kieu.jpg'),
(30, 'Áo khoác tím trắng phù hợp cho mùa đông ', 610000, 29, 'Tím tím trắng trắng cho má mắng nhưng đẹp', 2, 'ao tim.jpg'),
(31, 'Đầm nữ xanh tay cột tay tua rua', 730000, 12, 'tua rua có cua được anh không', 4, 'dam nu.jpg'),
(32, 'túi trái tim màu be phiên bản mới', 350000, 15, 'Thích hợp cho những cho sự nữ tính', 3, 'tui trai tim.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `MaLoaiSP` int NOT NULL,
  `TenLoai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`MaLoaiSP`, `TenLoai`) VALUES
(1, 'Hoa Nhà Len'),
(2, 'Áo kiểu xinh'),
(3, 'Túi xách'),
(4, 'Đầm xinh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int NOT NULL,
  `UserName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserName`, `Password`, `Name`, `Email`, `Address`, `Admin`) VALUES
(1, 'ngoc', '123456', 'Ngọc', 'baongocnguyenthi1803@gmail.com', 'TPHCM', 0),
(2, 'baongoc', 'pass1', 'Bảo Ngọc', 'baongocnguyenthi1803@gmail.com', 'TPHCM', 0),
(4, 'baongoc1803', '$2y$10$SRQcC6gqykbhTd9oDTn6Qed3Y6inpK4sNhlD1Zep59ZpztqZYhKI.', 'Nguyễn Thị Bảo Ngọc', 'baongocnguyenthi1803@gmail.com', 'Tay Ninh', 0),
(5, 'admin', '18032003', 'Nguyễn An Linh', 'anlinhnguyen@gmail.com', 'TPHCM', 1),
(10, 'quynhnhu', '$2y$10$/nzo1h6NmAA9yyy.LBdaw.65r5lkoMvE02ucwObatN/drYR2g8QXK', 'Nguyễn Quỳnh Như', 'quynhnhu1101@gmail.com', '140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, TPHCM', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`IdCart`),
  ADD KEY `FK_Cart_Product` (`MaSP`),
  ADD KEY `FK_Cart_User` (`IdUser`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaCTHD`),
  ADD KEY `FK_CTDH_DonHang` (`MaDH`),
  ADD KEY `FK_CTDH_SanPham` (`MaSP`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `FK_Product` (`MaLoaiSP`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`MaLoaiSP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `IdCart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaCTHD` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `MaSP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `MaLoaiSP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cart_Product` FOREIGN KEY (`MaSP`) REFERENCES `product` (`MaSP`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Cart_User` FOREIGN KEY (`IdUser`) REFERENCES `user` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_CTDH_DonHang` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_CTDH_SanPham` FOREIGN KEY (`MaSP`) REFERENCES `product` (`MaSP`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `FK_forgotpassword` FOREIGN KEY (`customer_id`) REFERENCES `user` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product` FOREIGN KEY (`MaLoaiSP`) REFERENCES `producttype` (`MaLoaiSP`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
