-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 08:40 AM
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
(3, 'ปากกา น้ำเงิน 0.01', 15, 1, '', 1),
(6, 'ปากกา น้ำเงิน 0.02', 10, 1, '', 1),
(7, 'ปากกา น้ำเงิน 0.05', 9, 1, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplies_stock`
--
ALTER TABLE `supplies_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplies_stock`
--
ALTER TABLE `supplies_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
