-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 05:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_las`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminLevel` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `adminLevel`) VALUES
(4, 'LIEM', '1213@gmail.com', 'liem', '202cb962ac59075b964b07152d234b70', 0),
(5, 'duy', 'dndb20011215@gmail.com', 'duy', 'laem1212', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `brandName`) VALUES
(10, 'Tiffany &amp; CO'),
(11, 'PNJ'),
(12, 'Cartier'),
(13, 'BvLgari'),
(14, 'Omega');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sID` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartID`, `productID`, `sID`, `productName`, `price`, `quantity`, `image`) VALUES
(18, 12, 'as09qjko7kntfra2lfd1blikn0', 'PH', '123', 1, 'c59d516dc8.png'),
(19, 10, 'apnf8slcibd544pnijtk9ujpeg', 'Liem', '434', 1, 'bf29094379.png'),
(138, 14, 'qe20bct8tu0c6hl73t50g9jihk', 'FREDERIQUE CONSTANT FC-312V4S4', '5079000', 2, '5aacd77b16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(22, 'Nhẫn'),
(23, 'Vòng Tay'),
(24, 'Dây Chuyền'),
(25, 'Bông Tai'),
(26, 'Lắc Tay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `firstname`, `surname`, `address`, `city`, `zipcode`, `phone`, `email`, `password`, `image`) VALUES
(12, 'duy 1', 'nguyen', 'Bình Tân 1', 'Vĩnh Long', '85000', '0786948941', 'dndb20011215@gmail.com', 'caf7b24c6d2fae2c3cf73780ea0a4ad1', 'Screenshot 2022-03-17 204637.png'),
(13, 'Liêm', 'Phan', 'Ô Môn', 'Cần Thơ', '900000', '0869489411', 'phanthanhliem@gmail.com', 'caf7b24c6d2fae2c3cf73780ea0a4ad1', 'IMG20220403093059.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedbackID` int(11) NOT NULL,
  `feedbackName` varchar(255) NOT NULL,
  `feedbackPhone` int(11) NOT NULL,
  `feedbackEmail` varchar(255) NOT NULL,
  `feedbackContent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedbackID`, `feedbackName`, `feedbackPhone`, `feedbackEmail`, `feedbackContent`) VALUES
(1, 'Hùng ', 785948941, 'hungngu@gmail.com', ' hi'),
(2, 'Duy ', 789694894, 'dndb201@gmail.com', 'Hi 2\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productID`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(43, 14, 'FREDERIQUE CONSTANT FC-312V4S4', 12, 1, '5079000', '5aacd77b16.jpg', 1, '2022-06-01 12:53:16'),
(44, 14, 'FREDERIQUE CONSTANT FC-312V4S4', 12, 1, '5079000', '5aacd77b16.jpg', 1, '2022-06-01 12:57:54'),
(45, 23, 'BIG BANG MXM18 SANG BLEU 39', 12, 1, '20000000', 'abf152e6a0.jpg', 1, '2022-06-01 12:59:35'),
(46, 14, 'FREDERIQUE CONSTANT FC-312V4S4', 12, 3, '15237000', '5aacd77b16.jpg', 0, '2022-06-01 13:01:05'),
(47, 14, 'FREDERIQUE CONSTANT FC-312V4S4', 12, 1, '5079000', '5aacd77b16.jpg', 0, '2022-06-01 15:27:45'),
(48, 23, 'BIG BANG MXM18 SANG BLEU 39', 12, 1, '20000000', 'abf152e6a0.jpg', 0, '2022-06-01 15:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `statusSlide` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `catID`, `brandID`, `product_desc`, `type`, `price`, `image`, `statusSlide`, `rate`) VALUES
(14, 'FREDERIQUE CONSTANT FC-312V4S4', 24, 10, '<p>Nổi như một quả b&oacute;ng bay v&agrave; c&oacute; m&agrave;u xanh lam như cabochon n&eacute;p m&igrave;nh an to&agrave;n ở b&ecirc;n cạnh, đồng hồ Ballon Bleu của Cartier th&ecirc;m phần sang trọng cho cổ tay nam v&agrave; nữ. C&aacute;c chữ số La M&atilde; được hướng dẫn tr&ecirc;n đường đi của ch&uacute;ng bằng một cơ chế l&ecirc;n d&acirc;y c&oacute;t m&agrave;u xanh lam đậm. Với những đường cong lồi của vỏ, mặt số guilloch&eacute;, kim h&igrave;nh thanh kiếm v&agrave; c&aacute;c li&ecirc;n kết được đ&aacute;nh b&oacute;ng hoặc ho&agrave;n thiện bằng satin của v&ograve;ng đeo tay&hellip; đồng hồ Ballon Bleu của Cartier đ&atilde; nổi khắp thế giới đồng hồ Cartier.</p>', 0, '5079000', '5aacd77b16.jpg', 0, 0),
(20, 'BULOVA CORPORATION AUTOMATIC MEN’S WATCH 49MM', 22, 13, '<p><span>Được gọi l&agrave; ph&aacute;i đẹp, v&igrave; thế phụ nữ lu&ocirc;n y&ecirc;u v&agrave; tr&acirc;n trọng c&aacute;i đẹp, đ&ocirc;i khi khao kh&aacute;t muốn được sở hữu ch&uacute;ng. V&igrave; thế, trang sức lu&ocirc;n chiếm một vị tr&iacute; quan trọng trong việc gi&uacute;p c&aacute;c n&agrave;ng xinh đẹp, trẻ trung v&agrave; tươi mới hơn. Hơn nữa, với b&ocirc;ng tai v&agrave;ng trắng &Yacute; 18K c&ograve;n gi&uacute;p n&agrave;ng c&oacute; được sự tự tin, vẻ ngo&agrave;i cuốn h&uacute;t v&agrave; hấp dẫn.</span></p>', 0, '14000000', '2ac8dcf475.jpg', 2, 0),
(23, 'BIG BANG MXM18 SANG BLEU 39', 26, 14, '<p>Nổi như một quả b&oacute;ng bay v&agrave; c&oacute; m&agrave;u xanh lam như cabochon n&eacute;p m&igrave;nh an to&agrave;n ở b&ecirc;n cạnh, đồng hồ Ballon Bleu của Cartier th&ecirc;m phần sang trọng cho cổ tay nam v&agrave; nữ. C&aacute;c chữ số La M&atilde; được hướng dẫn tr&ecirc;n đường đi của ch&uacute;ng bằng một cơ chế l&ecirc;n d&acirc;y c&oacute;t m&agrave;u xanh lam đậm. Với những đường cong lồi của vỏ, mặt số guilloch&eacute;, kim h&igrave;nh thanh kiếm v&agrave; c&aacute;c li&ecirc;n kết được đ&aacute;nh b&oacute;ng hoặc ho&agrave;n thiện bằng satin của v&ograve;ng đeo tay&hellip; đồng hồ Ballon Bleu của Cartier đ&atilde; nổi khắp thế giới đồng hồ Cartier.</p>', 0, '20000000', 'abf152e6a0.jpg', 0, 0),
(24, 'FOSSIL ME3104 TOWNSMAN AUTOMATIC LEATHER WATCH 44MM', 25, 12, '<p>Nổi như một quả b&oacute;ng bay v&agrave; c&oacute; m&agrave;u xanh lam như cabochon n&eacute;p m&igrave;nh an to&agrave;n ở b&ecirc;n cạnh, đồng hồ Ballon Bleu của Cartier th&ecirc;m phần sang trọng cho cổ tay nam v&agrave; nữ. C&aacute;c chữ số La M&atilde; được hướng dẫn tr&ecirc;n đường đi của ch&uacute;ng bằng một cơ chế l&ecirc;n d&acirc;y c&oacute;t m&agrave;u xanh lam đậm. Với những đường cong lồi của vỏ, mặt số guilloch&eacute;, kim h&igrave;nh thanh kiếm v&agrave; c&aacute;c li&ecirc;n kết được đ&aacute;nh b&oacute;ng hoặc ho&agrave;n thiện bằng satin của v&ograve;ng đeo tay&hellip; đồng hồ Ballon Bleu của Cartier đ&atilde; nổi khắp thế giới đồng hồ Cartier.</p>', 0, '4000008', '21c049612f.jpg', 2, 0),
(25, 'OMEGA SEAMASTER 39MM', 22, 14, '<p><span>Được gọi l&agrave; ph&aacute;i đẹp, v&igrave; thế phụ nữ lu&ocirc;n y&ecirc;u v&agrave; tr&acirc;n trọng c&aacute;i đẹp, đ&ocirc;i khi khao kh&aacute;t muốn được sở hữu ch&uacute;ng. V&igrave; thế, trang sức lu&ocirc;n chiếm một vị tr&iacute; quan trọng trong việc gi&uacute;p c&aacute;c n&agrave;ng xinh đẹp, trẻ trung v&agrave; tươi mới hơn. Hơn nữa, với b&ocirc;ng tai v&agrave;ng trắng &Yacute; 18K c&ograve;n gi&uacute;p n&agrave;ng c&oacute; được sự tự tin, vẻ ngo&agrave;i cuốn h&uacute;t v&agrave; hấp dẫn.</span></p>', 0, '11800000', '5c79c99ba4.jpg', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
