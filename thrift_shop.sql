-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 08:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thrift_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `thrift_shop_admin`
--

CREATE TABLE `thrift_shop_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `attempt` varchar(255) NOT NULL,
  `log_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thrift_shop_admin`
--

INSERT INTO `thrift_shop_admin` (`id`, `email`, `password`, `attempt`, `log_time`) VALUES
(1, 'adminone@gmail.com', 'adminone', '', ''),
(2, 'admintwo@gmail.com', 'admintwo', '', ''),
(3, 'adminthree@gmail.com', 'adminthree', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_shop_cart`
--

CREATE TABLE `thrift_shop_cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thrift_shop_order`
--

CREATE TABLE `thrift_shop_order` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `province_state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `price_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thrift_shop_order`
--

INSERT INTO `thrift_shop_order` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address_1`, `address_2`, `barangay`, `city`, `zip_code`, `province_state`, `country`, `payment`, `price_total`) VALUES
(1, 'Rod', 'Tuazon', '222wayzone@gmail.com', '09266445220', 'Blk 6 Lot 9 John Street', 'Bay Garden Homes', 'Santo Domingo', 'Bay', '4033', 'Laguna', 'Philippines', 'Gcash', '2450'),
(2, 'Rod', 'Tuazon', 'rod@rod.com', '09266445220', 'Blk 6 Lot 9 John Street', 'Bay Garden Homes', 'Santo Domingo', 'Bay', '4033', 'Laguna', 'Philippines', 'Gcash', '700');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_shop_products`
--

CREATE TABLE `thrift_shop_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thrift_shop_products`
--

INSERT INTO `thrift_shop_products` (`id`, `product_name`, `product_image`, `product_price`) VALUES
(1, 'Split Black T-Shirt', 'shirt-split-black.jpg', '700'),
(2, 'Split White T-Shirt', 'shirt-split-white.jpg', '500'),
(3, 'Chaps Pink Jacket', 'jacket-chaps.jpg', '800'),
(4, 'Nautica Brown Striped Polo Shirt', 'polo-nautica-striped.jpg', '750'),
(5, 'Nautica Navy Polo Shirt', 'polo-nautica-navy.jpg', '750'),
(6, 'Kappa Navy Jacket', 'jacket-kappa.jpg', '800'),
(7, 'Kaws White Shirt', 'shirt-kaws-white.jpg', '1200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thrift_shop_admin`
--
ALTER TABLE `thrift_shop_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thrift_shop_cart`
--
ALTER TABLE `thrift_shop_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thrift_shop_order`
--
ALTER TABLE `thrift_shop_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thrift_shop_products`
--
ALTER TABLE `thrift_shop_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thrift_shop_admin`
--
ALTER TABLE `thrift_shop_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `thrift_shop_cart`
--
ALTER TABLE `thrift_shop_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thrift_shop_order`
--
ALTER TABLE `thrift_shop_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `thrift_shop_products`
--
ALTER TABLE `thrift_shop_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
