-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 02:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(6) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `store name` varchar(255) NOT NULL,
  `contact no.` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `payment name` varchar(255) NOT NULL,
  `payment number` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_orders`
--

CREATE TABLE `admin_orders` (
  `id` int(6) NOT NULL,
  `transaction no.` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `delivery address` varchar(255) NOT NULL,
  `contact no.` varchar(255) NOT NULL,
  `email address` varchar(255) NOT NULL,
  `product code` varchar(255) NOT NULL,
  `product name` varchar(255) NOT NULL,
  `box quantity` varchar(255) NOT NULL,
  `pcs per box` varchar(255) NOT NULL,
  `price per box` varchar(255) NOT NULL,
  `payment method` varchar(255) NOT NULL,
  `payment name` varchar(255) NOT NULL,
  `payment number` varchar(255) NOT NULL,
  `reference no.` varchar(255) NOT NULL,
  `vat 12%` varchar(11) NOT NULL,
  `shipping fee` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `admin_product`
--

CREATE TABLE `admin_product` (
  `id` int(6) NOT NULL,
  `product code` varchar(255) NOT NULL,
  `product name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date of stocks` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_transaction_sales`
--

CREATE TABLE `admin_transaction_sales` (
  `id` int(6) NOT NULL,
  `reference no.` varchar(255) NOT NULL,
  `product name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `vat 12%` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total amount` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_transaction_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `supplier_customer`
--

CREATE TABLE `supplier_customer` (
  `id` int(6) NOT NULL,
  `supplier name` varchar(255) NOT NULL,
  `transaction no.` varchar(255) NOT NULL,
  `customer name` varchar(255) NOT NULL,
  `delivery address` varchar(255) NOT NULL,
  `contact no.` varchar(255) NOT NULL,
  `email address` varchar(255) NOT NULL,
  `customer store name` varchar(255) NOT NULL,
  `product code` varchar(255) NOT NULL,
  `product name` varchar(255) NOT NULL,
  `box quantity` varchar(255) NOT NULL,
  `pcs per box` varchar(255) NOT NULL,
  `price per box` varchar(255) NOT NULL,
  `payment method` varchar(255) NOT NULL,
  `reference no.` varchar(255) NOT NULL,
  `vat 12%` varchar(255) NOT NULL,
  `shipping fee` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `id` int(6) NOT NULL,
  `supplier name` varchar(255) NOT NULL,
  `product code` varchar(255) NOT NULL,
  `product name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `box quantity` int(6) NOT NULL,
  `pcs per box` varchar(255) NOT NULL,
  `price per box` varchar(255) NOT NULL,
  `shipping fee` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date of stock` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_orders`
--
ALTER TABLE `admin_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_product`
--
ALTER TABLE `admin_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_transaction_sales`
--
ALTER TABLE `admin_transaction_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_customer`
--
ALTER TABLE `supplier_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `admin_orders`
--
ALTER TABLE `admin_orders`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `admin_product`
--
ALTER TABLE `admin_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `admin_transaction_sales`
--
ALTER TABLE `admin_transaction_sales`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `supplier_customer`
--
ALTER TABLE `supplier_customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
