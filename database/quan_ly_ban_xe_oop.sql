-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2023 lúc 02:07 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_ban_xe_oop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Xe số'),
(2, 'Xe Tay Ga'),
(3, 'Xe Côn Tay'),
(4, 'Xe Mô Tô');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_product`
--

CREATE TABLE `import_product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `import_product`
--

INSERT INTO `import_product` (`id`, `id_category`, `name`, `color`, `price`, `quantity`, `image`, `date`) VALUES
(21, 1, 'Blade 2023', 'đen', 20850000, 3, 'j37sLOXkDQsdX7nnBTOj.png', '2023-03-27'),
(23, 3, 'CBR150R', 'đen', 73290000, 3, '2pSqu65qdei9HLkHfOtJ.png', '2023-03-27'),
(25, 2, 'Sh Mode 125cc', 'xanh - đen', 63290000, 4, 'AvewE7i9BJl2eQ7gykis.png', '2023-03-27'),
(26, 1, 'Super Cub C125', 'đen', 88890000, 4, 'Kn2t7CHz4vuaDK9aj6g7.png', '2023-04-27'),
(27, 4, 'CBR1000RR-R Fireblade SP', 'đỏ - xanh - trắng', 1050500000, 4, '8WKM4mZgOuXRyTDrSzhN.png', '2023-04-27'),
(28, 3, 'Winner X', 'đen', 50060000, 4, 'AjAslqMuYpko2d6wmuEs.png', '2023-04-27'),
(30, 2, 'SH350i', 'trắng - đen', 150990000, 4, 'VlhEoBOm76qFSuONryD1.png', '2023-04-27'),
(31, 4, 'CBR650R phiên bản 2023', 'đỏ - đen', 254990000, 4, '3yHA9YX7ojYvmCTUIt3L.jpg', '2023-04-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_product`
--

CREATE TABLE `like_product` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: chưa xử lý; 1: Đang giao hàng; 2: đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_import` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sell_number` int(11) NOT NULL,
  `characteristic` text NOT NULL,
  `specifications` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `id_import`, `id_category`, `name`, `color`, `price`, `quantity`, `sell_number`, `characteristic`, `specifications`, `image`) VALUES
(20, 21, 1, 'Blade 2023', 'đen', 20850000, 3, 0, '<p>Honda Blade 2023 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch thể thao khỏe khoắn c&ugrave;ng với thiết kế gọn g&agrave;ng tiện lợi. Những đường n&eacute;t vuốt nhọn đầy g&oacute;c cạnh kh&ocirc;ng chỉ t&ocirc;n l&ecirc;n vẻ sắc sảo &amp; thanh tho&aacute;t m&agrave; c&ograve;n tạo ra n&eacute;t c&aacute; t&iacute;nh đầy ri&ecirc;ng biệt của Honda Blade.</p>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Khối lượng bản th&acirc;n</td>\r\n			<td><strong>99 kg (v&agrave;nh đ&uacute;c)<br />\r\n			98 kg (v&agrave;nh nan hoa, phanh cơ)<br />\r\n			99 kg (v&agrave;nh nan hoa, phanh đĩa)</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&agrave;i x Rộng x Cao</td>\r\n			<td><strong>1.920 x 702 x 1.075 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch trục b&aacute;nh xe</td>\r\n			<td><strong>1.217 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ cao y&ecirc;n</td>\r\n			<td><strong>769mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng s&aacute;ng gầm xe</td>\r\n			<td><strong>141mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch b&igrave;nh xăng</td>\r\n			<td><strong>3,7 L</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch cỡ lớp trước/ sau</td>\r\n			<td><strong>Trước: 70/90 -17 M/C 38P<br />\r\n			Sau: 80/90 - 17 M/C 50P</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc trước</td>\r\n			<td><strong>Ống lồng, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc sau</td>\r\n			<td><strong>L&ograve; xo trụ, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại động cơ</td>\r\n			<td><strong>Xăng, 4 kỳ, 1 xilanh, l&agrave;m m&aacute;t bằng kh&ocirc;ng kh&iacute;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất tối đa</td>\r\n			<td><strong>6,18 kW/7.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch nhớt m&aacute;y</td>\r\n			<td><strong>0,8 l&iacute;t khi thay nhớt<br />\r\n			1,0 l&iacute;t khi r&atilde; m&aacute;y</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức ti&ecirc;u thụ nhi&ecirc;n liệu</td>\r\n			<td><strong>1,85l/100 km</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hộp số</td>\r\n			<td><strong>Cơ kh&iacute;, 4 số tr&ograve;n</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ thống khởi động</td>\r\n			<td><strong>Đạp ch&acirc;n/Điện</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moment cực đại</td>\r\n			<td><strong>8,65 Nm/5.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch xy-lanh</td>\r\n			<td><strong>109,1 cm3</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh x H&agrave;nh tr&igrave;nh p&iacute;t t&ocirc;ng</td>\r\n			<td><strong>50,0 x 55,6 mm</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'j37sLOXkDQsdX7nnBTOj.png'),
(22, 23, 3, 'CBR150R', 'đen', 73290000, 3, 0, '<p>Tự h&agrave;o mang trong m&igrave;nh tinh thần m&ocirc; t&ocirc; thể thao đặc trưng thương hiệu Honda, CBR150R l&agrave; đ&aacute;p &aacute;n cho những ai đang t&igrave;m kiếm mảnh gh&eacute;p trong cuộc sống năng động. T&iacute;nh thể thao v&agrave; linh hoạt của CBR150R xứng danh chiến hữu đ&iacute;ch thực gi&uacute;p bạn tự tin l&agrave;m chủ mọi cung đường.</p>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Khối lượng bản th&acirc;n</td>\r\n			<td><strong>139kg</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&agrave;i x Rộng x Cao</td>\r\n			<td><strong>1.983 x 700 x 1.090 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch trục b&aacute;nh xe</td>\r\n			<td><strong>1.312 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ cao y&ecirc;n</td>\r\n			<td><strong>788 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng s&aacute;ng gầm xe</td>\r\n			<td><strong>151 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch b&igrave;nh xăng</td>\r\n			<td><strong>12 lít</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch cỡ lớp trước/ sau</td>\r\n			<td><strong>Trước: 70/90 -17 M/C 38P<br />\r\n			Sau: 80/90 - 17 M/C 50P</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc trước</td>\r\n			<td><strong>Ống lồng, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc sau</td>\r\n			<td><strong>L&ograve; xo trụ, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại động cơ</td>\r\n			<td><strong>PGM-FI, 4 kỳ, xy-lanh đơn, l&agrave;m m&aacute;t bằng kh&ocirc;ng kh&iacute;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất tối đa</td>\r\n			<td><strong>6,87kW/7.500 vòng/phút</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch nhớt m&aacute;y</td>\r\n			<td><strong>Sau khi xả 1,1 l&iacute;t<br />\r\n			Sau khi r&atilde; m&aacute;y 1,3 l&iacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức ti&ecirc;u thụ nhi&ecirc;n liệu</td>\r\n			<td><strong>2,91l/100km**</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hộp số</td>\r\n			<td><strong>Cơ kh&iacute;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ thống khởi động</td>\r\n			<td><strong>Điện</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moment cực đại</td>\r\n			<td><strong>8,65 Nm/5.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch xy-lanh</td>\r\n			<td><strong>109,1 cm3</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh x H&agrave;nh tr&igrave;nh p&iacute;t t&ocirc;ng</td>\r\n			<td><strong>50,0 x 55,6 mm</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2pSqu65qdei9HLkHfOtJ.png'),
(24, 25, 2, 'Sh Mode 125cc', 'xanh - đen', 63290000, 4, 0, '<p>Thuộc ph&acirc;n kh&uacute;c xe ga cao cấp v&agrave; thừa hưởng thiết kế sang trọng nổi tiếng của d&ograve;ng xe SH, Sh mode lu&ocirc;n được đ&aacute;nh gi&aacute; cao nhờ kiểu d&aacute;ng sang trọng, tinh tế tới từng đường n&eacute;t, động cơ ti&ecirc;n tiến v&agrave; c&aacute;c tiện nghi cao cấp xứng tầm phong c&aacute;ch sống thời thượng, đẳng cấp.</p>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Khối lượng bản th&acirc;n</td>\r\n			<td><strong>116 kg</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&agrave;i x Rộng x Cao</td>\r\n			<td><strong>1.950 mm x 669 mm x 1.100 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch trục b&aacute;nh xe</td>\r\n			<td><strong>1.304 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ cao y&ecirc;n</td>\r\n			<td><strong>765 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng s&aacute;ng gầm xe</td>\r\n			<td><strong>130 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch b&igrave;nh xăng</td>\r\n			<td><strong>5,6 l&iacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch cỡ lớp trước/ sau</td>\r\n			<td><strong>Trước: 70/90 -17 M/C 38P<br />\r\n			Sau: 80/90 - 17 M/C 50P</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc trước</td>\r\n			<td><strong>Ống lồng, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc sau</td>\r\n			<td><strong>L&ograve; xo trụ, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại động cơ</td>\r\n			<td><strong>PGM-FI, 4 kỳ, xy-lanh đơn, l&agrave;m m&aacute;t bằng kh&ocirc;ng kh&iacute;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất tối đa</td>\r\n			<td><strong>6,87kW/7.500 vòng/phút</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch nhớt m&aacute;y</td>\r\n			<td><strong>&quot;0,8 l&iacute;t khi thay nhớt<br />\r\n			1,0 l&iacute;t khi r&atilde; m&aacute;y&quot;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức ti&ecirc;u thụ nhi&ecirc;n liệu</td>\r\n			<td><strong>2,16 l&iacute;t/100km</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hộp số</td>\r\n			<td><strong>Cơ kh&iacute;, 4 số tr&ograve;n</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ thống khởi động</td>\r\n			<td><strong>Điện</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moment cực đại</td>\r\n			<td><strong>8,65 Nm/5.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch xy-lanh</td>\r\n			<td><strong>109,1 cm3</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh x H&agrave;nh tr&igrave;nh p&iacute;t t&ocirc;ng</td>\r\n			<td><strong>50,0 x 55,6 mm</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'AvewE7i9BJl2eQ7gykis.png'),
(25, 26, 1, 'Super Cub C125', 'đen', 88890000, 4, 0, '', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Khối lượng bản th&acirc;n</td>\r\n			<td><strong>109kg</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&agrave;i x Rộng x Cao</td>\r\n			<td><strong>1.910 x 718 x 1.002mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch trục b&aacute;nh xe</td>\r\n			<td><strong>1.243mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ cao y&ecirc;n</td>\r\n			<td><strong>780mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng s&aacute;ng gầm xe</td>\r\n			<td><strong>136mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch b&igrave;nh xăng</td>\r\n			<td><strong>3,7 L</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch cỡ lớp trước/ sau</td>\r\n			<td><strong>Trước: 70/90 -17 M/C 38P<br />\r\n			Sau: 80/90 - 17 M/C 50P</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc trước</td>\r\n			<td><strong>Ống lồng, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc sau</td>\r\n			<td><strong>L&ograve; xo trụ, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại động cơ</td>\r\n			<td><strong>PGM-FI, 4 kỳ, xy-lanh đơn, l&agrave;m m&aacute;t bằng kh&ocirc;ng kh&iacute;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất tối đa</td>\r\n			<td><strong>6,87kW/7.500 vòng/phút</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch nhớt m&aacute;y</td>\r\n			<td><strong>&quot;0,8 l&iacute;t khi thay nhớt<br />\r\n			1,0 l&iacute;t khi r&atilde; m&aacute;y&quot;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức ti&ecirc;u thụ nhi&ecirc;n liệu</td>\r\n			<td><strong>1,50l/100km</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hộp số</td>\r\n			<td><strong>Cơ kh&iacute;, 4 số tr&ograve;n</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ thống khởi động</td>\r\n			<td><strong>Điện</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moment cực đại</td>\r\n			<td><strong>8,65 Nm/5.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch xy-lanh</td>\r\n			<td><strong>109,1 cm3</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh x H&agrave;nh tr&igrave;nh p&iacute;t t&ocirc;ng</td>\r\n			<td><strong>50,0 x 55,6 mm</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'Kn2t7CHz4vuaDK9aj6g7.png'),
(26, 27, 4, 'CBR1000RR-R Fireblade SP', 'đỏ - xanh - trắng', 1050500000, 4, 0, '<p>ĐƯỜNG ĐUA L&Agrave; S&Acirc;N CHƠI CỦA BẠN Nơi bạn sống thực với đam m&ecirc; CBR1000RR-R Fireblade SP được trang bị hệ thống giảm x&oacute;c Smart Electronic Control (S-EC) thế hệ 2 v&agrave; cụm phanh Brembo Stylema tr&ecirc;n phanh trước. Với khả năng vận h&agrave;nh vượt trội, CBR1000RR-R Fireblade SP l&agrave; m&oacute;n qu&agrave; đắt gi&aacute; nhất của Honda d&agrave;nh tặng cho c&aacute;c t&iacute;n đồ tốc độ. H&Atilde;Y TẬN HƯỞNG !!!</p>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Khối lượng bản th&acirc;n</td>\r\n			<td><strong>201kg</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&agrave;i x Rộng x Cao</td>\r\n			<td><strong>2.100mm x 745mm x 1.140mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch trục b&aacute;nh xe</td>\r\n			<td><strong>1.455mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ cao y&ecirc;n</td>\r\n			<td><strong>830mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng s&aacute;ng gầm xe</td>\r\n			<td><strong>115mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch b&igrave;nh xăng</td>\r\n			<td><strong>16,1 l&iacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch cỡ lớp trước/ sau</td>\r\n			<td><strong>Lốp trước: 120/70-ZR17<br />\r\n			Lốp sau: 200/55-ZR17</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc trước</td>\r\n			<td><strong>Giảm x&oacute;c ống lồng ngược điều khiển điện tử Ohlins NPX Smart-EC, đường k&iacute;nh 43mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc sau</td>\r\n			<td><strong>Giảm x&oacute;c trụ đơn điều khiển điện tử Ohlins TTX36 Smart-EC, với li&ecirc;n kết Pro-Link</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại động cơ</td>\r\n			<td><strong>4 xy lanh thẳng h&agrave;ng, PGM-FI, 4 kỳ, l&agrave;m m&aacute;t bằng chất lỏng, DOHC 16 van</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất tối đa</td>\r\n			<td><strong>160Kw/14.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch nhớt m&aacute;y</td>\r\n			<td><strong>2,8 l&iacute;t (sau khi xả nhớt)<br />\r\n			3,0 l&iacute;t (sau khi xả nhớt v&agrave; thay lọc dầu)</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức ti&ecirc;u thụ nhi&ecirc;n liệu</td>\r\n			<td><strong>6,3 l&iacute;t / 100km</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hộp số</td>\r\n			<td><strong>6 cấp</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ thống khởi động</td>\r\n			<td><strong>Điện</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moment cực đại</td>\r\n			<td><strong>8,65 Nm/5.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch xy-lanh</td>\r\n			<td><strong>1.000 cm&sup3;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh x H&agrave;nh tr&igrave;nh p&iacute;t t&ocirc;ng</td>\r\n			<td><strong>50,0 x 55,6 mm</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '8WKM4mZgOuXRyTDrSzhN.png'),
(27, 28, 3, 'Winner X', 'đen', 50060000, 4, 0, '<p>Cuộc đời l&agrave; một cuộc phi&ecirc;u lưu tr&agrave;n đầy những điều bất ngờ v&agrave; mỗi người đều c&oacute; một vạch đ&iacute;ch của ri&ecirc;ng m&igrave;nh. H&atilde;y tự tin tạo những c&uacute; k&iacute;ch để v&uacute;t xa v&agrave; tạo dấu ấn ri&ecirc;ng biệt c&ugrave;ng Honda WINNER X mới. Đ&aacute;nh dấu sự chuyển m&igrave;nh mạnh mẽ hướng tới h&igrave;nh ảnh một mẫu si&ecirc;u xe thể thao cỡ nhỏ h&agrave;ng đầu tại Việt Nam c&ugrave;ng những trang bị hiện đại v&agrave; tối t&acirc;n, WINNER X mới sẵn s&agrave;ng c&ugrave;ng c&aacute;c tay l&aacute;i bứt tốc tr&ecirc;n mọi h&agrave;nh tr&igrave;nh kh&aacute;m ph&aacute;.</p>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Khối lượng bản th&acirc;n</td>\r\n			<td><strong>122kg</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&agrave;i x Rộng x Cao</td>\r\n			<td><strong>2.019 x 727 x 1.104 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch trục b&aacute;nh xe</td>\r\n			<td><strong>1.278 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ cao y&ecirc;n</td>\r\n			<td><strong>795 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng s&aacute;ng gầm xe</td>\r\n			<td><strong>151 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch b&igrave;nh xăng</td>\r\n			<td><strong>4,5 lít</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch cỡ lớp trước/ sau</td>\r\n			<td><strong>&quot;Trước: 90/80-17M/C 46P<br />\r\n			Sau: 120/70-17M/C 58P&quot;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc trước</td>\r\n			<td><strong>Ống lồng, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc sau</td>\r\n			<td><strong>L&ograve; xo trụ, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại động cơ</td>\r\n			<td><strong>PGM-FI, 4 kỳ, xy-lanh đơn, l&agrave;m m&aacute;t bằng kh&ocirc;ng kh&iacute;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất tối đa</td>\r\n			<td><strong>6,87kW/7.500 vòng/phút</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch nhớt m&aacute;y</td>\r\n			<td><strong>&quot;0,8 l&iacute;t khi thay nhớt<br />\r\n			1,0 l&iacute;t khi r&atilde; m&aacute;y&quot;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức ti&ecirc;u thụ nhi&ecirc;n liệu</td>\r\n			<td><strong>1,99l/100km</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hộp số</td>\r\n			<td><strong>Cơ kh&iacute;, 4 số tr&ograve;n</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ thống khởi động</td>\r\n			<td><strong>Điện</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moment cực đại</td>\r\n			<td><strong>8,65 Nm/5.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch xy-lanh</td>\r\n			<td><strong>149,1 cm3</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh x H&agrave;nh tr&igrave;nh p&iacute;t t&ocirc;ng</td>\r\n			<td><strong>50,0 x 55,6 mm</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'AjAslqMuYpko2d6wmuEs.png'),
(29, 30, 2, 'SH350i', 'trắng - đen', 150990000, 4, 0, '<p>Tại Việt Nam, h&igrave;nh ảnh mẫu xe SH từ l&acirc;u đ&atilde; trở th&agrave;nh biểu tượng cho t&iacute;nh đẳng cấp, sang trọng v&agrave; sự ho&agrave;n hảo. Kế thừa những n&eacute;t đặc trưng đ&oacute;, mẫu xe SH350i ra mắt năm 2021 đ&atilde; g&acirc;y ấn tượng mạnh mẽ với vẻ đẹp đậm chất &quot;&quot;hiện đại c&ocirc;ng nghệ&quot;&quot; v&agrave; &ldquo;bề thế&rdquo;. Với động cơ mạnh mẽ v&agrave; thiết kế sang trọng nhất, c&ugrave;ng chi tiết phối m&agrave;u mới g&acirc;y ấn tượng, mẫu SH350i mới ph&ocirc; diễn được sức mạnh c&ugrave;ng khả năng vận h&agrave;nh đột ph&aacute;, thể hiện đẳng cấp của chủ sở hữu, xứng đ&aacute;ng với vị tr&iacute; &ocirc;ng ho&agrave;ng trong ph&acirc;n kh&uacute;c xe tay ga cao cấp tại Việt Nam.</p>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Khối lượng bản th&acirc;n</td>\r\n			<td><strong>172 kg</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&agrave;i x Rộng x Cao</td>\r\n			<td><strong>2.160 mm x 743 mm x 1.162 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch trục b&aacute;nh xe</td>\r\n			<td><strong>1.450 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ cao y&ecirc;n</td>\r\n			<td><strong>805 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng s&aacute;ng gầm xe</td>\r\n			<td><strong>132 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch b&igrave;nh xăng</td>\r\n			<td><strong>9,3 l&iacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch cỡ lớp trước/ sau</td>\r\n			<td><strong>Trước: 70/90 -17 M/C 38P<br />\r\n			Sau: 80/90 - 17 M/C 50P</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc trước</td>\r\n			<td><strong>Ống lồng, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc sau</td>\r\n			<td><strong>L&ograve; xo trụ, giảm chấn thủy lực</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại động cơ</td>\r\n			<td><strong>PGM-FI, 4 kỳ, xy-lanh đơn, l&agrave;m m&aacute;t bằng kh&ocirc;ng kh&iacute;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất tối đa</td>\r\n			<td><strong>6,87kW/7.500 vòng/phút</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch nhớt m&aacute;y</td>\r\n			<td><strong>Sau khi xả: 1,4 l&iacute;t<br />\r\n			Sau khi xả v&agrave; vệ sinh lưới lọc: 1,5 l&iacute;t<br />\r\n			Sau khi r&atilde; m&aacute;y: 1,85 l&iacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức ti&ecirc;u thụ nhi&ecirc;n liệu</td>\r\n			<td><strong>3.63 l/100km</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hộp số</td>\r\n			<td><strong>Cơ kh&iacute;, 4 số tr&ograve;n</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ thống khởi động</td>\r\n			<td><strong>Điện</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moment cực đại</td>\r\n			<td><strong>8,65 Nm/5.500 v&ograve;ng/ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch xy-lanh</td>\r\n			<td><strong>109,1 cm3</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh x H&agrave;nh tr&igrave;nh p&iacute;t t&ocirc;ng</td>\r\n			<td><strong>50,0 x 55,6 mm</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'VlhEoBOm76qFSuONryD1.png'),
(30, 31, 4, 'CBR650R phiên bản 2023', 'đỏ - đen', 254990000, 4, 0, '<p>CBR650R - &quot;chiến m&atilde;&quot; mạnh mẽ được gọt giũa để trở th&agrave;nh nh&agrave; v&ocirc; địch trong mọi h&agrave;nh tr&igrave;nh. Với kiểu d&aacute;ng khỏe khoắn, kh&iacute; động học, đậm chất Racing v&agrave; sức mạnh động cơ tập trung tại dải v&ograve;ng tua tầm trung, mang lại khả năng bứt tốc ho&agrave;n hảo, CBR650R sẽ mang lại những trải nghiệm tốc độ tuyệt đỉnh, đốt ch&aacute;y m&atilde;nh lực nh&agrave; v&ocirc; địch b&ecirc;n trong bạn, d&ugrave; bạn đang tr&ecirc;n đường phố hay tr&ecirc;n đường đua.</p>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Khối lượng bản th&acirc;n</td>\r\n			<td><strong>207 kg</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&agrave;i x Rộng x Cao</td>\r\n			<td><strong>2.128 mm x 749 mm x 1.149 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch trục b&aacute;nh xe</td>\r\n			<td><strong>1.449 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ cao y&ecirc;n</td>\r\n			<td><strong>810 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng s&aacute;ng gầm xe</td>\r\n			<td><strong>130 mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch b&igrave;nh xăng</td>\r\n			<td><strong>15 L&iacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch cỡ lớp trước/ sau</td>\r\n			<td><strong>Lốp trước: 120/70ZR17<br />\r\n			Lốp sau: 180/55ZR17</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc trước</td>\r\n			<td><strong>Giảm x&oacute;c h&agrave;nh tr&igrave;nh ngược Showa SFF-BP, 41mm</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phuộc sau</td>\r\n			<td><strong>L&ograve; trụ đơn với tải trước l&ograve; xo 10 cấp điều chỉnh</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại động cơ</td>\r\n			<td><strong>4 kỳ, 4 xy lanh, l&agrave;m m&aacute;t bằng chất lỏng</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất tối đa</td>\r\n			<td><strong>61,7 kW/ 10.000 v&ograve;ng/ ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch nhớt m&aacute;y</td>\r\n			<td><strong>Sau khi xả: 2,3 l&iacute;t<br />\r\n			Sau khi xả v&agrave; thay lọc dầu động cơ: 2,6 l&iacute;t<br />\r\n			Sa khi r&atilde; m&aacute;y: 3,0 l&iacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức ti&ecirc;u thụ nhi&ecirc;n liệu</td>\r\n			<td><strong>5,17 l&iacute;t/ 100km</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hộp số</td>\r\n			<td><strong>6 số</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ thống khởi động</td>\r\n			<td><strong>Điện</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moment cực đại</td>\r\n			<td><strong>63 Nm/ 9.500 v&ograve;ng/ ph&uacute;t</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung t&iacute;ch xy-lanh</td>\r\n			<td><strong>109,1 cm3</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh x H&agrave;nh tr&igrave;nh p&iacute;t t&ocirc;ng</td>\r\n			<td><strong>50,0 x 55,6 mm</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '3yHA9YX7ojYvmCTUIt3L.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `fullname`, `address`, `phone`, `birthday`) VALUES
(1, 'truongngo.050902@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ngô Văn Hải Trường', 'Quảng Nam', '0388549606', '2002-09-05'),
(2, 'tranvietthai31072002@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'trần viết thái1', 'đà nẵng', '0123456789', '2002-07-31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `import_product`
--
ALTER TABLE `import_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `like_product`
--
ALTER TABLE `like_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `import_product`
--
ALTER TABLE `import_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `like_product`
--
ALTER TABLE `like_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
