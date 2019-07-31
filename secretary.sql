-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 05:41 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

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
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `shortname` varchar(50) DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `bulding` varchar(200) DEFAULT NULL,
  `floor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles`
--

CREATE TABLE `durable_articles` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `bill_no` varchar(100) DEFAULT NULL,
  `budget` varchar(100) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `money_type` varchar(100) DEFAULT NULL,
  `acquiring` varchar(100) DEFAULT NULL,
  `asset_no` varchar(255) DEFAULT NULL,
  `d_gen` varchar(100) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `goverment` varchar(100) DEFAULT NULL,
  `short_goverment` varchar(50) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `durable_year` int(11) DEFAULT NULL,
  `storage` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_damage`
--

CREATE TABLE `durable_articles_damage` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `damage_date` datetime DEFAULT NULL,
  `flag` varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_donate`
--

CREATE TABLE `durable_articles_donate` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `donate_name` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durable_articles_donate`
--
-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_permits`
--

CREATE TABLE `durable_articles_permits` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `book_no` varchar(100) DEFAULT NULL,
  `permit_date` datetime DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_purchase`
--

CREATE TABLE `durable_articles_purchase` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `order_by` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `receive_address` varchar(200) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_receive_donate`
--

CREATE TABLE `durable_articles_receive_donate` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `document_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `donate_name` varchar(100) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_repair`
--

CREATE TABLE `durable_articles_repair` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `seq` int(11) DEFAULT NULL,
  `damage_id` int(11) DEFAULT NULL,
  `repair_date` datetime DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_repair_history`
--

CREATE TABLE `durable_articles_repair_history` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `seq` int(11) DEFAULT NULL,
  `repair_id` int(11) DEFAULT NULL,
  `fix` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_sell`
--

CREATE TABLE `durable_articles_sell` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `buyer` varchar(100) DEFAULT NULL,
  `sell_date` datetime DEFAULT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_transfer_in`
--

CREATE TABLE `durable_articles_transfer_in` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `document_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transfer_from` varchar(100) DEFAULT NULL,
  `transfer_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_transfer_out`
--

CREATE TABLE `durable_articles_transfer_out` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `document_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transfer_to` varchar(100) DEFAULT NULL,
  `transfer_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_articles_type`
--

CREATE TABLE `durable_articles_type` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `name` varchar(100) DEFAULT NULL,
  `shortname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material`
--

CREATE TABLE `durable_material` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
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
  `picture` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_damage`
--

CREATE TABLE `durable_material_damage` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `damage_date` datetime DEFAULT NULL,
  `flag` varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_donate`
--

CREATE TABLE `durable_material_donate` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `document_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `donate_name` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Table structure for table `durable_material_permits`
--

CREATE TABLE `durable_material_permits` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `book_no` varchar(100) DEFAULT NULL,
  `permit_date` datetime DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_purchase`
--

CREATE TABLE `durable_material_purchase` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `seller_id` int(11) DEFAULT NULL,
  `order_by` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `receive_address` varchar(200) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_receive_donate`
--

CREATE TABLE `durable_material_receive_donate` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `document_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `donate_name` varchar(100) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Table structure for table `durable_material_repair`
--

CREATE TABLE `durable_material_repair` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `seq` int(11) DEFAULT NULL,
  `damage_id` int(11) DEFAULT NULL,
  `repair_date` datetime DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_repair_history`
--

CREATE TABLE `durable_material_repair_history` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `seq` int(11) DEFAULT NULL,
  `repair_id` int(11) DEFAULT NULL,
  `fix` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_sell`
--

CREATE TABLE `durable_material_sell` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `buyer` varchar(100) DEFAULT NULL,
  `sell_date` datetime DEFAULT NULL,
  `document_no` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_transfer_in`
--

CREATE TABLE `durable_material_transfer_in` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `document_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transfer_from` varchar(100) DEFAULT NULL,
  `transfer_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_transfer_out`
--

CREATE TABLE `durable_material_transfer_out` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `document_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transfer_to` varchar(100) DEFAULT NULL,
  `transfer_date` datetime DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `durable_material_type`
--

CREATE TABLE `durable_material_type` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `name` varchar(100) DEFAULT NULL,
  `shortname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
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
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplies_distribute`
--

CREATE TABLE `supplies_distribute` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `distribute_date` datetime DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplies_permits`
--

CREATE TABLE `supplies_permits` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `book_no` varchar(100) DEFAULT NULL,
  `permit_date` datetime DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplies_purchase`
--

CREATE TABLE `supplies_purchase` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `product_id` int(11) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `seller_id` int(11) DEFAULT NULL,
  `order_by` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `receive_address` varchar(200) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) AUTO_INCREMENT NOT NULL ,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `u_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
