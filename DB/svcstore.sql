-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2022 at 04:44 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svcstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `members_id` int(11) NOT NULL,
  `members_email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `members_password` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_id` int(1) NOT NULL,
  `members_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `branch_id` int(2) NOT NULL,
  `members_tel` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class_id` int(2) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`members_id`, `members_email`, `members_password`, `status_id`, `members_name`, `branch_id`, `members_tel`, `class_id`, `date_save`) VALUES
(1, '64302040014@svc.ac.th', '6122040067', 1, 'นายภัคพล บุญรอด', 4, '0957625867', 2, '2022-08-28 14:52:27'),
(2, '64302040023@svc.ac.th', '64302040023', 2, 'นายอดิเทพ ทองเรือง', 4, '0835672354', 2, '2022-08-28 15:46:44'),
(3, '64302040003@svc.ac.th', '64302040003', 2, 'นางสาวฐิติรัตน์ เทพทุ่งหลวง', 4, '0942524524', 2, '2022-08-29 01:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `d_id` int(10) NOT NULL,
  `o_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `d_qty` int(11) NOT NULL,
  `d_subtotal` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`d_id`, `o_id`, `product_id`, `d_qty`, `d_subtotal`) VALUES
(1, 10000, 21, 3, 750),
(2, 10001, 55, 4, 1200),
(3, 10002, 6, 2, 420),
(4, 10002, 14, 2, 480),
(5, 10003, 14, 1, 240),
(6, 10004, 26, 3, 750),
(7, 10005, 60, 2, 500),
(8, 10006, 8, 1, 240),
(9, 10006, 18, 1, 350),
(10, 10007, 45, 2, 500),
(11, 10008, 7, 1, 240),
(12, 10009, 51, 1, 300),
(13, 10010, 1, 1, 165),
(14, 10010, 62, 1, 360);

-- --------------------------------------------------------

--
-- Table structure for table `order_head`
--

CREATE TABLE `order_head` (
  `o_id` int(10) NOT NULL,
  `members_id` int(11) NOT NULL,
  `o_dttm` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `members_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `branch_id` int(2) NOT NULL,
  `class_id` int(2) NOT NULL,
  `members_tel` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `o_total` float NOT NULL,
  `o_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_head`
--

INSERT INTO `order_head` (`o_id`, `members_id`, `o_dttm`, `members_name`, `branch_id`, `class_id`, `members_tel`, `o_total`, `o_status`) VALUES
(10000, 2, '2021-08-29 01:24:43', 'นายอดิเทพ ทองเรือง', 4, 2, '0835672354', 750, 2),
(10001, 2, '2021-02-28 01:25:00', 'นายอดิเทพ ทองเรือง', 4, 2, '0835672354', 1200, 2),
(10002, 2, '2022-07-13 01:25:21', 'นายอดิเทพ ทองเรือง', 4, 2, '0835672354', 900, 2),
(10003, 3, '2022-07-22 01:28:11', 'นางสาวฐิติรัตน์ เทพทุ่งหลวง', 4, 2, '0942524524', 240, 2),
(10004, 3, '2022-08-18 01:28:21', 'นางสาวฐิติรัตน์ เทพทุ่งหลวง', 4, 2, '0942524524', 750, 2),
(10005, 3, '2022-08-19 01:28:32', 'นางสาวฐิติรัตน์ เทพทุ่งหลวง', 4, 2, '0942524524', 500, 4),
(10006, 3, '2022-08-29 01:28:59', 'นางสาวฐิติรัตน์ เทพทุ่งหลวง', 4, 2, '0942524524', 590, 4),
(10007, 2, '2022-08-29 01:35:58', 'นายอดิเทพ ทองเรือง', 4, 2, '0835672354', 500, 1),
(10008, 2, '2022-08-29 01:36:08', 'นายอดิเทพ ทองเรือง', 4, 2, '0835672354', 240, 1),
(10009, 2, '2022-08-29 04:06:45', 'นายอดิเทพ ทองเรือง', 4, 2, '0835672354', 300, 2),
(10010, 2, '2022-08-29 04:16:32', 'นายอดิเทพ ทองเรือง', 4, 2, '0835672354', 525, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`) VALUES
(1, 'การบัญชี'),
(2, 'การตลาด'),
(3, 'การเลขานุการและการจัดการ'),
(4, 'คอมพิวเตอร์ธุรกิจ'),
(5, 'การจัดการโลจิสติกส์และซัพพลายเชน'),
(6, 'การออกแบบ'),
(7, 'วิจิตรศิลป์'),
(8, 'คอมพิวเตอร์กราฟิก'),
(9, 'แฟชั่นดีไซด์'),
(10, 'คหกรรม'),
(11, 'อาหารและโภชนาการ'),
(12, 'การโรงแรม'),
(13, 'การท่องเที่ยว');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(2) NOT NULL,
  `class_name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_name`) VALUES
(1, 'ปวช'),
(2, 'ปวส');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `site_id` int(5) NOT NULL,
  `price_name` float DEFAULT NULL,
  `qty_name` int(11) NOT NULL,
  `p_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `type_id`, `site_id`, `price_name`, `qty_name`, `p_img`) VALUES
(1, 'เสื้อนักเรียน นักศึกษาหญิง', 2, 1, 165, 5, 'img1661700295.jpg'),
(2, 'เสื้อนักเรียน นักศึกษาหญิง', 2, 2, 165, 3, 'img1661700353.jpg'),
(3, 'เสื้อนักเรียน นักศึกษาหญิง', 2, 3, 165, 50, 'img1661700373.jpg'),
(4, 'เสื้อนักเรียน นักศึกษาหญิง', 2, 4, 185, 50, 'img1661700421.jpg'),
(5, 'เสื้อนักเรียน นักศึกษาหญิง', 2, 6, 185, 50, 'img1661700457.jpg'),
(6, 'เสื้อนักเรียน นักศึกษาหญิง', 2, 7, 210, 48, 'img1661700487.jpg'),
(7, 'เสื้อนักเรียน นักศึกษาชาย', 1, 1, 240, 49, 'img1661700554.jpg'),
(8, 'เสื้อนักเรียน นักศึกษาชาย', 1, 2, 240, 49, 'img1661700574.jpg'),
(9, 'เสื้อนักเรียน นักศึกษาชาย', 1, 3, 240, 50, 'img1661700599.jpg'),
(10, 'เสื้อนักเรียน นักศึกษาชาย', 1, 4, 240, 50, 'img1661700630.jpg'),
(11, 'เสื้อนักเรียน นักศึกษาชาย', 1, 6, 260, 50, 'img1661700634.jpg'),
(12, 'เสื้อนักเรียน นักศึกษาชาย', 1, 7, 280, 50, 'img1661700637.jpg'),
(13, 'กระโปรงนักเรียนหญิง ปวช', 3, 8, 230, 50, 'img1661700839.jpg'),
(14, 'กระโปรงนักเรียนหญิง ปวช', 3, 9, 240, 47, 'img1661700916.jpg'),
(15, 'กระโปรงนักเรียนหญิง ปวช', 3, 10, 260, 50, 'img1661701881.jpg'),
(16, 'กระโปรงนักเรียนหญิง ปวช', 3, 11, 260, 50, 'img1661702003.jpg'),
(17, 'กระโปรงนักศึกษาหญิง ปวส', 4, 12, 300, 50, 'img1661702115.jpg'),
(18, 'กระโปรงนักศึกษาหญิง ปวส', 4, 13, 350, 49, 'img1661702168.jpg'),
(19, 'กระโปรงนักศึกษาหญิง ปวส', 4, 14, 400, 50, 'img1661702191.jpg'),
(20, 'เสื้อพละ ปวช สีฟ้า', 6, 1, 250, 50, 'img1661702391.jpg'),
(21, 'เสื้อพละ ปวช สีฟ้า', 6, 2, 250, 46, 'img1661702422.jpg'),
(22, 'เสื้อพละ ปวช สีฟ้า', 6, 3, 250, 50, 'img1661702451.jpg'),
(23, 'เสื้อพละ ปวช สีฟ้า', 6, 4, 250, 50, 'img1661702495.jpg'),
(24, 'เสื้อพละ ปวช สีฟ้า', 6, 5, 250, 50, 'img1661702535.jpg'),
(25, 'เสื้อพละ ปวช สีฟ้า', 6, 19, 250, 50, 'img1661702579.jpg'),
(26, 'เสื้อพละ ปวช สีม่วง', 6, 1, 250, 47, 'img1661702652.jpg'),
(27, 'เสื้อพละ ปวช สีม่วง', 6, 2, 250, 50, 'img1661702682.jpg'),
(28, 'เสื้อพละ ปวช สีม่วง', 6, 3, 250, 50, 'img1661702707.jpg'),
(29, 'เสื้อพละ ปวช สีม่วง', 6, 4, 250, 50, 'img1661702807.jpg'),
(30, 'เสื้อพละ ปวช สีม่วง', 6, 5, 250, 50, 'img1661702834.jpg'),
(31, 'เสื้อพละ ปวช สีม่วง', 6, 19, 250, 50, 'img1661702866.jpg'),
(32, 'เสื้อพละ ปวช สีเทา', 6, 1, 250, 50, 'img1661702932.jpg'),
(33, 'เสื้อพละ ปวช สีเทา', 6, 2, 250, 50, 'img1661703072.jpg'),
(34, 'เสื้อพละ ปวช สีเทา', 6, 3, 250, 50, 'img1661703122.jpg'),
(35, 'เสื้อพละ ปวช สีเทา', 6, 4, 250, 50, 'img1661703153.jpg'),
(36, 'เสื้อพละ ปวช สีเทา', 6, 5, 250, 50, 'img1661703184.jpg'),
(37, 'เสื้อพละ ปวช สีเทา', 6, 19, 250, 50, 'img1661703224.jpg'),
(38, 'เสื้อพละ ปวช สีชมพู', 6, 1, 250, 50, 'img1661703322.jpg'),
(39, 'เสื้อพละ ปวช สีชมพู', 6, 2, 250, 50, 'img1661703405.jpg'),
(40, 'เสื้อพละ ปวช สีชมพู', 6, 3, 250, 50, 'img1661703423.jpg'),
(41, 'เสื้อพละ ปวช สีชมพู', 6, 4, 250, 50, 'img1661703442.jpg'),
(42, 'เสื้อพละ ปวช สีชมพู', 6, 5, 250, 50, 'img1661703467.jpg'),
(43, 'เสื้อพละ ปวช สีชมพู', 6, 19, 250, 50, 'img1661703509.jpg'),
(44, 'กางเกงพละ ปวช', 7, 1, 250, 50, 'img1661704137.jpg'),
(45, 'กางเกงพละ ปวช', 7, 2, 250, 48, 'img1661704189.jpg'),
(46, 'กางเกงพละ ปวช', 7, 3, 250, 50, 'img1661704207.jpg'),
(47, 'กางเกงพละ ปวช', 7, 4, 250, 50, 'img1661704249.jpg'),
(48, 'กางเกงพละ ปวช', 7, 5, 250, 50, 'img1661704276.jpg'),
(49, 'กางเกงพละ ปวช', 7, 19, 250, 50, 'img1661704307.jpg'),
(50, 'เสื้อพละ ปวส', 8, 1, 300, 50, 'img1661704388.jpg'),
(51, 'เสื้อพละ ปวส', 8, 2, 300, 49, 'img1661704408.jpg'),
(52, 'เสื้อพละ ปวส', 8, 3, 300, 50, 'img1661704429.jpg'),
(53, 'เสื้อพละ ปวส', 8, 4, 300, 50, 'img1661704449.jpg'),
(54, 'เสื้อพละ ปวส', 8, 5, 300, 50, 'img1661704470.jpg'),
(55, 'เสื้อพละ ปวส', 8, 19, 300, 46, 'img1661704496.jpg'),
(56, 'กางเกงพละ ปวส', 9, 1, 250, 50, 'img1661704698.jpg'),
(57, 'กางเกงพละ ปวส', 9, 2, 250, 45, 'img1661704718.jpg'),
(58, 'กางเกงพละ ปวส', 9, 3, 250, 50, 'img1661704739.jpg'),
(59, 'กางเกงพละ ปวส', 9, 4, 250, 50, 'img1661704770.jpg'),
(60, 'กางเกงพละ ปวส', 9, 5, 250, 48, 'img1661704789.jpg'),
(61, 'กางเกงพละ ปวส', 9, 19, 250, 50, 'img1661704820.jpg'),
(62, 'กางเกงนักเรียน นักศึกษาชาย', 5, 15, 360, 49, 'img1661704954.jpg'),
(63, 'กางเกงนักเรียน นักศึกษาชาย', 5, 16, 390, 43, 'img1661704999.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site`
--

CREATE TABLE `tbl_site` (
  `site_id` int(5) NOT NULL,
  `site_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_site`
--

INSERT INTO `tbl_site` (`site_id`, `site_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, '2XL'),
(6, '2XL-3XL'),
(7, '4XL-5XL'),
(8, '22-24'),
(9, '26'),
(10, '24XL-24XXXL'),
(11, '26-26XL'),
(12, 'S-2XL'),
(13, '3XL-5XL'),
(14, '6XL'),
(15, '25-32'),
(16, '34-44'),
(17, '46-50'),
(18, '52ขึ้นไป'),
(19, 'พิเศษ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_st`
--

CREATE TABLE `tbl_st` (
  `o_status` int(11) NOT NULL,
  `name_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_st`
--

INSERT INTO `tbl_st` (`o_status`, `name_status`) VALUES
(1, 'รอชำระเงิน'),
(2, 'ชำระเงินเรียบร้อย'),
(4, 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(1) NOT NULL,
  `members_status` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `members_status`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'ผู้ใช้งาน'),
(3, 'แอดมิน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'เสื้อนักเรียนชาย'),
(2, 'เสื้อนักเรียนหญิง'),
(3, 'กระโปรงนักเรียนหญิง ปวช'),
(4, 'กระโปรงนักศึกษาหญิง ปวส'),
(5, 'กางเกงนักเรียนชาย'),
(6, 'เสื้อพละ ปวช'),
(7, 'กางเกงพละ ปวช'),
(8, 'เสื้อพละ ปวส'),
(9, 'กางเกงพละ ปวส');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`members_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `order_head`
--
ALTER TABLE `order_head`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_site`
--
ALTER TABLE `tbl_site`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `tbl_st`
--
ALTER TABLE `tbl_st`
  ADD PRIMARY KEY (`o_status`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `members_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_head`
--
ALTER TABLE `order_head`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_site`
--
ALTER TABLE `tbl_site`
  MODIFY `site_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_st`
--
ALTER TABLE `tbl_st`
  MODIFY `o_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
