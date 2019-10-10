-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 05:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secretary`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `shortname` varchar(50) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `bulding` varchar(200) DEFAULT NULL,
  `floor` varchar(100) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `fullname`, `shortname`, `tel`, `fax`, `bulding`, `floor`, `pic`, `status`) VALUES
(1, 'สำนักงานเลขานุการตำรวจ', '', NULL, 'à¸žà¸µà¹ˆà¸žà¸¥à¸­à¸¢', '3 ', '1', '1.jpg', 1),
(2, 'สำนักงานเลขานุการตำรวจแห่งชาติ', 'สนง.', NULL, 'à¸žà¸µà¹ˆà¸žà¸¥à¸­à¸¢', '3 ', '1', '2.jpg', 1),
(3, 'สำนักงานเลขานุการตำรวจแห่งชาติ1', 'สนง', NULL, 'พี่พลอย', '3 ', '1', '3.jpg', 1),
(4, '', '', NULL, '', '', '', '4.jpg', 0),
(5, '', '', NULL, '', '', '', '', 0),
(6, 'สำนักงานเลขานุการตำรวจแห่งชาติ', 'ว.สนง.', NULL, '๐๒-๖๗๕-๗๑๔๑', '3 ', '1', '', 1),
(7, '', '', NULL, '', '', '', '', 0),
(8, '', '', NULL, '', '', '', '', 0),
(9, '', '', NULL, '', '', '', '15.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles`
--

CREATE TABLE `durable_articles` (
  `id` int(11) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `bill_no` varchar(100) DEFAULT NULL,
  `budget` varchar(100) DEFAULT NULL,
  `book_no` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `money_type` varchar(100) DEFAULT NULL,
  `acquiring` varchar(100) DEFAULT NULL,
  `asset_no` varchar(255) DEFAULT NULL COMMENT 'เลขสินทรัพย์',
  `d_gen` varchar(100) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `goverment` varchar(100) DEFAULT NULL,
  `short_goverment` varchar(50) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `durable_year` int(11) DEFAULT NULL,
  `storage` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles`
--

INSERT INTO `durable_articles` (`id`, `seq`, `code`, `type`, `attribute`, `model`, `bill_no`, `budget`, `book_no`, `department_id`, `money_type`, `acquiring`, `asset_no`, `d_gen`, `seller_id`, `goverment`, `short_goverment`, `unit`, `price`, `picture`, `durable_year`, `storage`, `status`) VALUES
(1, 1, 'ค.สง 7700-1000-0001-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 3, 'เงินบริจาค/เงินช่วยเหลือ', 'ประกาศเชิญชวนทั่วไป', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 7500, NULL, 4, '2222', 3),
(2, 1, 'ค.สง 7700-1000-0020-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินบริจาค/เงินช่วยเหลือ', 'ประกาศเชิญชวนทั่วไป', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 2000, NULL, 0, '2222', 3),
(3, 1, 'ค.สง 7700-1000-0001-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินบริจาค/เงินช่วยเหลือ', 'ประกาศเชิญชวนทั่วไป', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 2000, NULL, 0, '2222', 8),
(4, 2, 'ค.สง 7700-1000-0002-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินบริจาค/เงินช่วยเหลือ', 'ประกาศเชิญชวนทั่วไป', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 2000, NULL, 0, '2222', 8),
(5, 1, 'ค.สง 7700-1000-0001-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินบริจาค/เงินช่วยเหลือ', 'ประกาศเชิญชวนทั่วไป', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 2500, NULL, 0, '2223', 0),
(6, 2, 'ค.สง 7700-1000-0002-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินบริจาค/เงินช่วยเหลือ', 'ประกาศเชิญชวนทั่วไป', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 2500, NULL, 0, '2223', 0),
(7, 1, 'ค.สง 7700-1000-0007-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินนอกงบประมาณ', 'ประกวดราคา', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 11, NULL, 0, '2222', 1),
(8, 2, 'ค.สง 7700-1000-0008-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินนอกงบประมาณ', 'ประกวดราคา', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 11, NULL, 0, '2222', 1),
(9, 1, 'ค.สง 8800-1000-0001-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินนอกงบประมาณ', 'ประกวดราคา', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 11, NULL, 0, '2222', 1),
(10, 2, 'ค.สง 8800-1000-0002-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', NULL, 1, 'เงินนอกงบประมาณ', 'ประกวดราคา', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 11, NULL, 0, '2222', 1),
(11, 1, 'ค.สง 7700-1000-0009-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', '1', 1, 'เงินบริจาค/เงินช่วยเหลือ', 'ประกาศเชิญชวนทั่วไป', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 7500, '', 1, '2222', 1),
(13, 1, 'ค.สง 7700-1000-0010-1-2562', 2, '1sss', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', '2222', 1, 'เงินนอกงบประมาณ', 'ประกวดราคา', '1111', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 7500, 'IMG_3751.JPG', 0, '2222', 1),
(14, 1, 'ค.สง 7700-1000-0011-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', '125/87', 2, 'เงินนอกงบประมาณ', 'ประกวดราคา', 'asset-a1 ', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 7500, 'IMG_3753.JPG', 1, '2223', 1),
(15, 2, 'ค.สง 7700-1000-0012-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', '125/87', 2, 'เงินนอกงบประมาณ', 'ประกวดราคา', 'asset-a2', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 7500, 'IMG_3753.JPG', 1, '2223', 1),
(16, 2, 'ค.สง 7700-1000-0012-1-2562', 1, 'เครื่องคอมพิวเตอร์ประมวลผลแบบที่ ๑', 'ยี่ห้อ HP รุ่น ๕๕๐-๑๕๓๑ จอ ๑๘.๕', '88/8563', '๒๕๐๐๗๓๑๐๐๑๑๑๐A๙๖', '125/87', 2, 'เงินนอกงบประมาณ', 'ประกวดราคา', 'asset-a2', '11', 1, 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 7500, 'IMG_3753.JPG', 1, '2223', 0);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_damage`
--

CREATE TABLE `durable_articles_damage` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `damage_date` datetime DEFAULT NULL,
  `flag` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_damage`
--

INSERT INTO `durable_articles_damage` (`id`, `product_id`, `damage_date`, `flag`, `status`) VALUES
(1, 1, '2019-08-29 00:00:00', '1', 1),
(2, 2, '2019-08-14 00:00:00', '1', 1),
(3, 2, '2019-08-14 00:00:00', '1', 1),
(4, 1, '2019-10-04 00:00:00', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_donate`
--

CREATE TABLE `durable_articles_donate` (
  `id` int(11) NOT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `donate_name` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_donate`
--

INSERT INTO `durable_articles_donate` (`id`, `document_no`, `product_id`, `receive_date`, `donate_name`, `flag`, `status`) VALUES
(1, '12/25', 1, '2019-09-12 00:00:00', 'ssss', '1', 1),
(2, '12/25', 1, '2019-09-12 00:00:00', 'ssss', '1', 1),
(3, '', 3, '0000-00-00 00:00:00', '', '', 1),
(4, '12/25', 4, '0000-00-00 00:00:00', 'ssss', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_permits`
--

CREATE TABLE `durable_articles_permits` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `book_no` varchar(100) DEFAULT NULL,
  `permit_date` date DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `department_id` int(10) NOT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_permits`
--

INSERT INTO `durable_articles_permits` (`id`, `product_id`, `book_no`, `permit_date`, `receive_date`, `department_id`, `flag`, `status`) VALUES
(1, 10, 'f1212231', '0000-00-00', '0000-00-00', 2, 'โต๊ะะก', 1),
(2, 3, '12122', '0000-00-00', '0000-00-00', 1, 'หฟ', 1),
(3, 1, '12122', '0000-00-00', '0000-00-00', 1, '', 1),
(4, 1, '12122', '0000-00-00', '0000-00-00', 1, '', 1),
(5, 1, '12122', '0000-00-00', '0000-00-00', 1, '', 1),
(6, 1, '12122', '0000-00-00', '0000-00-00', 1, '', 1),
(7, 1, '12122', '0000-00-00', '0000-00-00', 1, '', 1),
(8, 13, '12122', '0000-00-00', '0000-00-00', 1, '', 1),
(9, 3, '333/22', '0000-00-00', '0000-00-00', 1, '', 1),
(10, 2, '', '0000-00-00', '0000-00-00', 3, '', 1),
(11, 2, '', '0000-00-00', '0000-00-00', 0, '', 1),
(12, 2, '', '0000-00-00', '0000-00-00', 1, '', 1),
(13, 4, '125/88', '0000-00-00', '0000-00-00', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_purchase`
--

CREATE TABLE `durable_articles_purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `order_by` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `receive_address` varchar(200) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_purchase`
--

INSERT INTO `durable_articles_purchase` (`id`, `product_id`, `order_no`, `purchase_date`, `seller_id`, `order_by`, `receiver`, `receive_date`, `receive_address`, `number`, `status`) VALUES
(1, 2, 'order123a', '2019-08-15', 1, 'sirirat', 'sirirat', '2019-08-22', '', 1, '1'),
(2, 1, 'order123a', '2019-08-15', 1, 'sirirat', 'sirirat', '2019-08-22', '', 1, '1'),
(3, 1, '1224/33', '2019-08-16', 1, 'siriratttttttttttt', 'sss', '2019-08-15', 's', 2, '1'),
(4, 2, '1224/33', '2019-08-16', 1, 'siriratttttttttttt', 'sss', '2019-08-15', 's', 2, '1'),
(5, 10, '1224/33z', '0000-00-00', 1, 'siriratttttttttttt', 'sd', '2019-08-15', 'rr', 2, '1'),
(6, 5, '1224/33z', '0000-00-00', 1, 'siriratttttttttttt', 'sd', '2019-08-15', 'rr', 2, '1'),
(7, 4, '12', '2019-08-16', 1, 'siriratttttttttttt', 'sd', '2019-08-08', 'gg', 2, '1'),
(8, 3, '12', '2019-08-16', 1, 'siriratttttttttttt', 'sd', '2019-08-08', 'gg', 2, '1'),
(9, 8, '12', '2019-08-16', 1, 'siriratttttttttttt', 'sd', '2019-08-08', 'gg', 2, '1'),
(10, 7, '12', '2019-08-16', 1, 'siriratttttttttttt', 'sd', '2019-08-08', 'gg', 2, '1'),
(11, 6, '12', '2019-08-16', 1, 'siriratttttttttttt', 'sd', '2019-08-08', 'gg', 2, '1'),
(12, 11, '1224/33', '0000-00-00', 1, 'sd', 'siriratttttttttttt', '0000-00-00', 'ss', 1, '1'),
(13, 13, '1224/33', '0000-00-00', 1, 'sss', 'sirirattttttttttttt', '2019-09-19', 'dd', 1, '1'),
(14, 14, '1255/888', '0000-00-00', 1, 'sss', 'sirirat', '2019-09-19', 'mm', 2, '0'),
(15, 15, '1255/888', '0000-00-00', 1, 'sss', 'sirirat', '2019-09-19', 'mm', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_receive_donate`
--

CREATE TABLE `durable_articles_receive_donate` (
  `id` int(11) NOT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `donate_name` varchar(100) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_receive_donate`
--

INSERT INTO `durable_articles_receive_donate` (`id`, `document_no`, `product_id`, `receive_date`, `donate_name`, `number`, `flag`, `status`) VALUES
(1, '22', 1, '2019-10-03 00:00:00', 'ssss', 2, '', 1),
(2, '22', 1, '2019-10-03 00:00:00', 'ssss', 2, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_repair`
--

CREATE TABLE `durable_articles_repair` (
  `id` int(11) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `damage_id` int(11) DEFAULT NULL,
  `repair_date` datetime DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `flag` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_repair`
--

INSERT INTO `durable_articles_repair` (`id`, `seq`, `damage_id`, `repair_date`, `place`, `flag`, `status`) VALUES
(1, 123, 1, '0000-00-00 00:00:00', '1r3', '', 1),
(2, 1, 2, '2019-08-15 00:00:00', '1', '', 1),
(3, 11, 4, '2019-10-30 00:00:00', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_repair_history`
--

CREATE TABLE `durable_articles_repair_history` (
  `id` int(11) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `repair_id` int(11) DEFAULT NULL,
  `fix` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_repair_history`
--

INSERT INTO `durable_articles_repair_history` (`id`, `seq`, `repair_id`, `fix`, `price`, `receive_date`, `flag`, `status`) VALUES
(1, 2, 1, 'fff', 100, '2019-08-23 00:00:00', '1', 1),
(2, 2, 2, 'fff', 100, '2019-08-23 00:00:00', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_sell`
--

CREATE TABLE `durable_articles_sell` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `buyer` varchar(100) DEFAULT NULL,
  `sell_date` datetime DEFAULT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_sell`
--

INSERT INTO `durable_articles_sell` (`id`, `product_id`, `buyer`, `sell_date`, `document_no`, `flag`, `status`) VALUES
(1, 1, 'aa', '0000-00-00 00:00:00', '12/25', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_transfer_in`
--

CREATE TABLE `durable_articles_transfer_in` (
  `id` int(11) NOT NULL,
  `document_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transfer_from` varchar(100) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_transfer_in`
--

INSERT INTO `durable_articles_transfer_in` (`id`, `document_no`, `product_id`, `transfer_from`, `transfer_date`, `flag`, `status`) VALUES
(1, 11121, 2, 'ศิริรัชต์ เทพอำนวย', '0000-00-00', '-', 1),
(2, 0, 1, 's', '0000-00-00', 'c', 1),
(3, 22, 1, 's', '0000-00-00', 's', 1),
(4, 223, 13, 's', '0000-00-00', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_transfer_out`
--

CREATE TABLE `durable_articles_transfer_out` (
  `id` int(11) NOT NULL,
  `document_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transfer_to` varchar(100) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_transfer_out`
--

INSERT INTO `durable_articles_transfer_out` (`id`, `document_no`, `product_id`, `transfer_to`, `transfer_date`, `flag`, `status`) VALUES
(1, 3335, 1, 'siri', '0000-00-00', '-', 0),
(2, 334, 1, '', '0000-00-00', '', 1),
(3, 0, 1, 'A', '0000-00-00', '', 1),
(4, 22, 1, '', '2019-08-15', '', 1),
(5, 0, 1, '', '0000-00-00', '', 1),
(6, 223, 1, '', '0000-00-00', '', 1),
(7, 0, 1, '', '2019-08-22', '', 1),
(8, 1, 1, 'A', '2019-08-13', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_type`
--

CREATE TABLE `durable_articles_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `shortname` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_type`
--

INSERT INTO `durable_articles_type` (`id`, `name`, `shortname`, `status`) VALUES
(1, 'ครุภัณฑ์คอมพิวเตอร์', 'ค.คต.', 1),
(2, 'ครุภัณฑ์สำนักงาน', 'ค.สนง.', 1),
(3, 'คอม', 'ค', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material`
--

CREATE TABLE `durable_material` (
  `id` int(11) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `bill_no` varchar(100) DEFAULT NULL,
  `goverment` varchar(100) DEFAULT NULL,
  `short_goverment` varchar(50) DEFAULT NULL,
  `durable_year` int(11) DEFAULT NULL,
  `asset_no` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material`
--

INSERT INTO `durable_material` (`id`, `seq`, `code`, `type`, `attribute`, `name`, `department_id`, `seller_id`, `bill_no`, `goverment`, `short_goverment`, `durable_year`, `asset_no`, `picture`, `price`, `unit`, `status`) VALUES
(1, 111, '11122211', 1, '1', 'ggg', 3, 1, '111', 'ooo', 'oo', 1, NULL, '1.jpg', 2000, 1, 1),
(2, 111, '22757555', 1, '1', 'ggg', 1, 1, '111', 'ooo', 'oo', 1, NULL, '1000', 2000, 1, 7),
(3, 111, '11122211', 1, '1', 'ggg', 3, 1, '111', 'ooo', 'oo', 1, NULL, '1000', 2000, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_damage`
--

CREATE TABLE `durable_material_damage` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `damage_date` datetime DEFAULT NULL,
  `flag` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_damage`
--

INSERT INTO `durable_material_damage` (`id`, `product_id`, `damage_date`, `flag`, `status`) VALUES
(1, 1, '2019-08-28 00:00:00', '-', 1),
(2, 2, '2019-08-28 00:00:00', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_donate`
--

CREATE TABLE `durable_material_donate` (
  `id` int(11) NOT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `donate_name` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_donate`
--

INSERT INTO `durable_material_donate` (`id`, `document_no`, `product_id`, `receive_date`, `donate_name`, `flag`, `status`) VALUES
(1, '1', 3, '0000-00-00 00:00:00', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_permits`
--

CREATE TABLE `durable_material_permits` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `book_no` varchar(100) DEFAULT NULL,
  `permit_date` datetime DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `department_id` int(10) NOT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_permits`
--

INSERT INTO `durable_material_permits` (`id`, `product_id`, `book_no`, `permit_date`, `receive_date`, `department_id`, `flag`, `status`) VALUES
(1125, 1, '22233', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '-งง', '1'),
(1126, 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '1'),
(1127, 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '1'),
(1128, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '1'),
(1129, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '1'),
(1130, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '1'),
(1131, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_purchase`
--

CREATE TABLE `durable_material_purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seller_id` int(11) DEFAULT NULL,
  `order_by` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `receive_address` varchar(200) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_purchase`
--

INSERT INTO `durable_material_purchase` (`id`, `product_id`, `order_no`, `purchase_date`, `seller_id`, `order_by`, `receiver`, `receive_date`, `receive_address`, `number`, `status`) VALUES
(1, 3, '555', '2019-10-01 05:16:22', 1, 'sis', 'ja', '2019-08-22', 'rama 2', 2, '1'),
(2, 3, '555', '2019-10-01 05:16:33', 1, '22222', 'ja', '2019-08-22', 'rama 2', 2, '1'),
(3, 1, '555', '2019-09-20 05:12:08', 1, '22222', 'ja', '2019-08-22', '666', 2, '1'),
(6, 15, '555', '2019-09-20 05:12:08', 1, '22222', 'ja', '2019-08-22', '666', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_receive_donate`
--

CREATE TABLE `durable_material_receive_donate` (
  `id` int(11) NOT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `donate_name` varchar(100) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_receive_donate`
--

INSERT INTO `durable_material_receive_donate` (`id`, `document_no`, `product_id`, `receive_date`, `donate_name`, `number`, `flag`, `status`) VALUES
(1, '1', 2, '0000-00-00 00:00:00', 'ssss', 2, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_repair`
--

CREATE TABLE `durable_material_repair` (
  `id` int(11) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `damage_id` int(11) DEFAULT NULL,
  `repair_date` datetime DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `flag` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_repair`
--

INSERT INTO `durable_material_repair` (`id`, `seq`, `damage_id`, `repair_date`, `place`, `flag`, `status`) VALUES
(1, 123, 1, '0000-00-00 00:00:00', '332', '', 1),
(2, 123, 2, '0000-00-00 00:00:00', '33', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_repair_history`
--

CREATE TABLE `durable_material_repair_history` (
  `id` int(11) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `repair_id` int(11) DEFAULT NULL,
  `fix` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_repair_history`
--

INSERT INTO `durable_material_repair_history` (`id`, `seq`, `repair_id`, `fix`, `price`, `receive_date`, `flag`, `status`) VALUES
(1, 1, 1, 'l', 1000, '0000-00-00 00:00:00', 'ps', 1),
(2, 1, 2, 'l', 1000, '0000-00-00 00:00:00', 'ps', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_sell`
--

CREATE TABLE `durable_material_sell` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `buyer` varchar(100) DEFAULT NULL,
  `sell_date` datetime DEFAULT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_sell`
--

INSERT INTO `durable_material_sell` (`id`, `product_id`, `buyer`, `sell_date`, `document_no`, `flag`, `status`) VALUES
(1, 1, '', '0000-00-00 00:00:00', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_transfer_in`
--

CREATE TABLE `durable_material_transfer_in` (
  `id` int(11) NOT NULL,
  `document_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transfer_from` varchar(100) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_transfer_in`
--

INSERT INTO `durable_material_transfer_in` (`id`, `document_no`, `product_id`, `transfer_from`, `transfer_date`, `flag`, `status`) VALUES
(1, 11, 1, 'iii', '2019-08-08', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_transfer_out`
--

CREATE TABLE `durable_material_transfer_out` (
  `id` int(11) NOT NULL,
  `document_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transfer_to` varchar(100) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_transfer_out`
--

INSERT INTO `durable_material_transfer_out` (`id`, `document_no`, `product_id`, `transfer_to`, `transfer_date`, `flag`, `status`) VALUES
(1, 12, 2, 'jj', '0000-00-00', 'j', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_type`
--

CREATE TABLE `durable_material_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `shortname` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_material_type`
--

INSERT INTO `durable_material_type` (`id`, `name`, `shortname`, `status`) VALUES
(1, 'วัสดุสำนักงาน', 'ว.สนง.', 1),
(2, 'วัสดุคอมพิวเตอร์', 'ว.คต.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `action`, `date`) VALUES
(1, 2, 'เข้าสู่ระบบ', '2019-10-05 11:33:45'),
(2, 2, 'เข้าสู่ระบบ', '2019-10-07 02:36:18'),
(3, 1, 'เข้าสู่ระบบ', '2019-10-07 03:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `tel`, `fax`, `address`) VALUES
(1, 'ร้านค้า', '0859992224', '026664489', 'หหห');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(100) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(0, ''),
(1, 'ปกติ'),
(2, 'ยืม-คืน'),
(3, 'ชำรุด\r\n'),
(4, 'ซ่อม'),
(5, 'โอนเข้า'),
(6, 'โอนออก'),
(7, 'บริจาคเข้า'),
(8, 'บริจาคออก'),
(9, 'ขายทอดตลาด'),
(10, 'แจกจ่าย');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `supplies_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `bill_no` varchar(100) DEFAULT NULL,
  `goverment` varchar(100) DEFAULT NULL,
  `short_goverment` varchar(50) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `picture` int(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `seq`, `code`, `supplies_id`, `department_id`, `seller_id`, `price`, `bill_no`, `goverment`, `short_goverment`, `unit`, `picture`, `status`) VALUES
(52, 1, '1111', 3, 2, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 10),
(53, 2, '1111', 3, 2, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 10),
(54, 3, '1111', 3, 2, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 0),
(55, 1, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 10),
(56, 2, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 0),
(57, 3, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 0),
(58, 4, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 0),
(59, 5, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 0),
(60, 6, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplies_distribute`
--

CREATE TABLE `supplies_distribute` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `distribute_date` date DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies_distribute`
--

INSERT INTO `supplies_distribute` (`id`, `product_id`, `department_id`, `distribute_date`, `number`, `flag`, `status`) VALUES
(1, 52, 1, '0000-00-00', 0, '', 1),
(2, 1125, 2, '0000-00-00', 0, '', 1),
(3, 1125, 1, '0000-00-00', 0, '', 1),
(4, 1125, 1, '0000-00-00', 0, '', 1),
(5, 1125, 1, '0000-00-00', 0, '', 1),
(6, 1125, 1, '0000-00-00', 0, '', 1),
(7, 1125, 1, '0000-00-00', 0, '', 1),
(8, 1125, 1, '0000-00-00', 0, '', 1),
(9, 1125, 1, '0000-00-00', 0, '', 1),
(10, 1125, 1, '0000-00-00', 0, '', 1),
(11, 1125, 1, '2019-08-16', 11, '1', 1),
(12, 1111, 1, '0000-00-00', 2, '1', 1),
(13, 1111, 1, '0000-00-00', 2, '', 1),
(14, 33333, 1, '0000-00-00', 1, '', 1),
(15, 33333, 1, '0000-00-00', 3, '', 1),
(16, 33333, 1, '0000-00-00', 2, '', 1),
(17, 33333, 1, '0000-00-00', 2, '', 1),
(18, 33333, 1, '0000-00-00', 2, '', 1),
(19, 1111, 1, '2019-10-10', 2, '1', 1),
(20, 57, 1, '0000-00-00', 2, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplies_permits`
--

CREATE TABLE `supplies_permits` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `book_no` varchar(100) DEFAULT NULL,
  `permit_date` date DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `department_id` int(10) NOT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies_permits`
--

INSERT INTO `supplies_permits` (`id`, `product_id`, `book_no`, `permit_date`, `receive_date`, `number`, `department_id`, `flag`, `status`) VALUES
(121, 54, '125/88', '0000-00-00', '0000-00-00', 2, 1, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `supplies_purchase`
--

CREATE TABLE `supplies_purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seller_id` int(11) DEFAULT NULL,
  `order_by` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `receive_address` varchar(200) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies_purchase`
--

INSERT INTO `supplies_purchase` (`id`, `product_id`, `order_no`, `purchase_date`, `seller_id`, `order_by`, `receiver`, `receive_date`, `receive_address`, `number`, `status`) VALUES
(1, 1, '1111', '2019-09-06 05:20:17', 111, 'sis', 'ja', '2019-08-12 00:00:00', 'as', 111, '1'),
(2, 1, '2222', '2019-09-06 05:20:17', 111, 'lll', 'ja', '2019-08-12 00:00:00', 'as', 111, '1'),
(3, 3, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '2019-10-05 00:00:00', 'xx', 1, '1'),
(4, 4, '1224/33', '2019-10-10 17:00:00', 1, 'siriratttttttttttt', 'sd', '2019-10-10 00:00:00', 'x', 1, '1'),
(5, 5, '1224/33', '2019-10-03 17:00:00', 1, 'siriratttttttttttt', 'sss', '2019-10-04 00:00:00', 'sss', 2, '1'),
(6, 6, '1224/33', '2019-10-03 17:00:00', 1, 'siriratttttttttttt', 'sss', '2019-10-04 00:00:00', 'sss', 2, '1'),
(7, 7, '1224/33', '2019-10-24 17:00:00', 1, 'siriratttttttttttt', 'sd', '2019-10-11 00:00:00', '', 2, '1'),
(8, 8, '1224/33', '2019-10-24 17:00:00', 1, 'siriratttttttttttt', 'sd', '2019-10-11 00:00:00', '', 2, '1'),
(9, 9, '1224/33', '2019-10-16 17:00:00', 1, 'siriratttttttttttt', 'sd', '2019-10-12 00:00:00', '', 3, '1'),
(10, 10, '1224/33', '2019-10-16 17:00:00', 1, 'siriratttttttttttt', 'sd', '2019-10-12 00:00:00', '', 3, '1'),
(11, 11, '1224/33', '2019-10-16 17:00:00', 1, 'siriratttttttttttt', 'sd', '2019-10-12 00:00:00', '', 3, '1'),
(12, 12, '1224/33z', '2019-10-08 17:00:00', 1, 'numwan', 'sss', '2019-10-18 00:00:00', '', 3, '1'),
(13, 13, '1224/33z', '2019-10-08 17:00:00', 1, 'numwan', 'sss', '2019-10-18 00:00:00', '', 3, '1'),
(14, 14, '1224/33z', '2019-10-08 17:00:00', 1, 'numwan', 'sss', '2019-10-18 00:00:00', '', 3, '1'),
(15, 15, '12', '2019-11-01 17:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(16, 16, '12', '2019-11-01 17:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(17, 17, '12', '2019-11-01 17:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(18, 18, '12', '2019-11-01 17:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(19, 19, '12', '2019-11-01 17:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(20, 20, '12', '2019-11-01 17:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(21, 21, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', '', '0000-00-00 00:00:00', '', 3, '1'),
(22, 22, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', '', '0000-00-00 00:00:00', '', 3, '1'),
(23, 23, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', '', '0000-00-00 00:00:00', '', 3, '1'),
(24, 24, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(25, 25, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(26, 26, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(27, 27, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(28, 28, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(29, 29, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(30, 30, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(31, 31, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(32, 32, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(33, 33, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sss', '0000-00-00 00:00:00', '', 2, '1'),
(34, 34, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sss', '0000-00-00 00:00:00', '', 2, '1'),
(35, 35, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 2, '1'),
(36, 36, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 2, '1'),
(37, 37, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 2, '1'),
(38, 38, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 2, '1'),
(39, 39, '1224/33', '0000-00-00 00:00:00', 1, 'ss', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(40, 40, '1224/33', '0000-00-00 00:00:00', 1, 'ss', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(41, 41, '1224/33', '0000-00-00 00:00:00', 1, 'ss', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(42, 42, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(43, 43, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(44, 44, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(45, 45, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(46, 46, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(47, 47, '12', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(48, 48, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 2, '1'),
(49, 49, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 2, '1'),
(50, 50, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sss', '0000-00-00 00:00:00', '', 2, '1'),
(51, 51, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sss', '0000-00-00 00:00:00', '', 2, '1'),
(52, 52, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(53, 53, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 3, '1'),
(54, 54, '1224/33z', '2019-10-07 03:03:36', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '                    ', 3, '1'),
(55, 55, '1224/33', '0000-00-00 00:00:00', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '', 6, '1'),
(56, 56, '1224/33s', '2019-10-07 03:02:11', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '                    ', 6, '1'),
(57, 57, '1224/33z', '2019-10-07 02:59:51', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '                    ', 6, '1'),
(58, 58, '1224/33', '2019-10-07 02:59:38', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '                    ', 6, '1'),
(59, 59, '1224/33s', '2019-10-07 02:58:31', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '                    ', 6, '1'),
(60, 60, '1224/33', '2019-10-07 02:58:01', 1, 'siriratttttttttttt', 'sd', '0000-00-00 00:00:00', '                                                                                                    ', 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `supplies_purchase_request`
--

CREATE TABLE `supplies_purchase_request` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seller_id` int(11) DEFAULT NULL,
  `order_by` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `receive_address` varchar(200) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplies_request`
--

CREATE TABLE `supplies_request` (
  `id` int(11) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `bill_no` varchar(100) DEFAULT NULL,
  `goverment` varchar(100) DEFAULT NULL,
  `short_goverment` varchar(50) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `user_request` int(11) NOT NULL,
  `reason` text NOT NULL,
  `action_request` text NOT NULL,
  `status_request` text NOT NULL,
  `reject` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplies_stock`
--

CREATE TABLE `supplies_stock` (
  `id` int(11) NOT NULL,
  `supplies_name` varchar(255) NOT NULL,
  `stock` int(11) DEFAULT '0',
  `type` int(11) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies_stock`
--

INSERT INTO `supplies_stock` (`id`, `supplies_name`, `stock`, `type`, `attribute`, `status`) VALUES
(3, 'ปากกา น้ำเงิน 0.01', 6, 1, '', 1),
(6, 'ปากกา น้ำเงิน 0.02', 10, 1, '', 1),
(7, 'ปากกา น้ำเงิน 0.05', 9, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(1, 'เครื่อง'),
(2, 'กล่อง');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `u_type` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `surname`, `lastname`, `tel`, `position`, `email`, `u_type`, `status`) VALUES
(1, 'admin', '1234', 'fdsd', 'มา', '856692236', 'c', 'sirirat120341@gmail.com', '2', 1),
(2, 'superadmin', '1111', 'fdsd', 'มา', '856692236', 'c', 'sirirat120341@gmail.com', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `u_type`
--

CREATE TABLE `u_type` (
  `id` int(11) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `u_type`
--

INSERT INTO `u_type` (`id`, `t_name`, `t_code`) VALUES
(1, 'Administrator', ' super_admin'),
(2, 'Administrator', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles`
--
ALTER TABLE `durable_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_damage`
--
ALTER TABLE `durable_articles_damage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_donate`
--
ALTER TABLE `durable_articles_donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_permits`
--
ALTER TABLE `durable_articles_permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_purchase`
--
ALTER TABLE `durable_articles_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_receive_donate`
--
ALTER TABLE `durable_articles_receive_donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_repair`
--
ALTER TABLE `durable_articles_repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_repair_history`
--
ALTER TABLE `durable_articles_repair_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_sell`
--
ALTER TABLE `durable_articles_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_transfer_in`
--
ALTER TABLE `durable_articles_transfer_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_transfer_out`
--
ALTER TABLE `durable_articles_transfer_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_articles_type`
--
ALTER TABLE `durable_articles_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material`
--
ALTER TABLE `durable_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_damage`
--
ALTER TABLE `durable_material_damage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_donate`
--
ALTER TABLE `durable_material_donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_permits`
--
ALTER TABLE `durable_material_permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_purchase`
--
ALTER TABLE `durable_material_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_receive_donate`
--
ALTER TABLE `durable_material_receive_donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_repair`
--
ALTER TABLE `durable_material_repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_repair_history`
--
ALTER TABLE `durable_material_repair_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_sell`
--
ALTER TABLE `durable_material_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_transfer_in`
--
ALTER TABLE `durable_material_transfer_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_transfer_out`
--
ALTER TABLE `durable_material_transfer_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durable_material_type`
--
ALTER TABLE `durable_material_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_distribute`
--
ALTER TABLE `supplies_distribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_permits`
--
ALTER TABLE `supplies_permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_purchase`
--
ALTER TABLE `supplies_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_purchase_request`
--
ALTER TABLE `supplies_purchase_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_request`
--
ALTER TABLE `supplies_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_stock`
--
ALTER TABLE `supplies_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_type`
--
ALTER TABLE `u_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `durable_articles`
--
ALTER TABLE `durable_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `durable_articles_damage`
--
ALTER TABLE `durable_articles_damage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `durable_articles_donate`
--
ALTER TABLE `durable_articles_donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `durable_articles_permits`
--
ALTER TABLE `durable_articles_permits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `durable_articles_purchase`
--
ALTER TABLE `durable_articles_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `durable_articles_receive_donate`
--
ALTER TABLE `durable_articles_receive_donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `durable_articles_repair`
--
ALTER TABLE `durable_articles_repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `durable_articles_repair_history`
--
ALTER TABLE `durable_articles_repair_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `durable_articles_sell`
--
ALTER TABLE `durable_articles_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `durable_articles_transfer_in`
--
ALTER TABLE `durable_articles_transfer_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `durable_articles_transfer_out`
--
ALTER TABLE `durable_articles_transfer_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `durable_articles_type`
--
ALTER TABLE `durable_articles_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `durable_material`
--
ALTER TABLE `durable_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `durable_material_damage`
--
ALTER TABLE `durable_material_damage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `durable_material_donate`
--
ALTER TABLE `durable_material_donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `durable_material_permits`
--
ALTER TABLE `durable_material_permits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1132;

--
-- AUTO_INCREMENT for table `durable_material_purchase`
--
ALTER TABLE `durable_material_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `durable_material_receive_donate`
--
ALTER TABLE `durable_material_receive_donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `durable_material_repair`
--
ALTER TABLE `durable_material_repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `durable_material_repair_history`
--
ALTER TABLE `durable_material_repair_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `durable_material_sell`
--
ALTER TABLE `durable_material_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `durable_material_transfer_in`
--
ALTER TABLE `durable_material_transfer_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `durable_material_transfer_out`
--
ALTER TABLE `durable_material_transfer_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `durable_material_type`
--
ALTER TABLE `durable_material_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `supplies_distribute`
--
ALTER TABLE `supplies_distribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplies_permits`
--
ALTER TABLE `supplies_permits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `supplies_purchase`
--
ALTER TABLE `supplies_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `supplies_purchase_request`
--
ALTER TABLE `supplies_purchase_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplies_stock`
--
ALTER TABLE `supplies_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `u_type`
--
ALTER TABLE `u_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
