-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 08:39 AM
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
  `picture` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `seq`, `code`, `supplies_id`, `department_id`, `seller_id`, `price`, `bill_no`, `goverment`, `short_goverment`, `unit`, `picture`, `status`) VALUES
(52, 1, '1111', 3, 2, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 10),
(53, 2, '1111', 3, 2, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 10),
(54, 3, '1111', 3, 2, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 1),
(55, 1, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 10),
(56, 2, '33333', 3, 3, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 1),
(57, 3, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 1),
(58, 4, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 1),
(59, 5, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 1),
(60, 6, '33333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 1),
(61, 1, '1111', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '0', 2),
(62, 2, '1111', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '', 2),
(63, 1, '22222', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '', 2),
(64, 2, '22222', 3, 3, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '', 2),
(65, 1, '322333', 3, 3, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '', 1),
(66, 2, '322333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '', 1),
(67, 3, '322333', 3, 1, 1, 7500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 2, '', 1),
(68, 1, '1111', 3, 1, 1, 2500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '', 10),
(69, 2, '1111', 3, 1, 1, 2500, '88/8563', 'สำนักงานตำรวจแห่งชาติ', 'สนง.ตชนง', 1, '', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
