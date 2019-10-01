-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 06:47 AM
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
(2, 1, '2222', '2019-09-06 05:20:17', 111, 'lll', 'ja', '2019-08-12 00:00:00', 'as', 111, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplies_purchase`
--
ALTER TABLE `supplies_purchase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplies_purchase`
--
ALTER TABLE `supplies_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
