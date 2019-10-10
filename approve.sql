-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 05, 2019 at 12:09 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `secretary`
--

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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplies_purchase_request`
--
ALTER TABLE `supplies_purchase_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;