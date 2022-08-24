-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 04:07 PM
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
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `uid`, `image`, `firstname`, `lastname`, `email`, `address`, `store name`, `contact no.`, `password`, `type`) VALUES
(17, '75062fe36a9dc0a3', 'default.jpg', 'Bernard', 'Sapida', 'luckyme', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', 'Lucky Me', '09472126029', '$2y$10$r6CwRXtddpRCXNe8GC.QF.aMXgRQ913tKMTSGcksd80I4W8Ceb6IK', 'supplier'),
(21, '2862ff052fa83b6', 'img-63047e4d6d4984.61887748.jpg', 'Bernard', 'Sapida', 'admin@gmail.com', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', 'Administrator', '09472126029', '$2y$10$Z3lMcIoqr7Rf.LspBG1N1eIPEQpSRL9haHuHLj9vHAs3kTQPI.ncq', 'admin'),
(22, '87262ff056e9317f', 'img-62ff961c251486.48598264.jpg', 'Bernard', 'Sapida', 'bernardsapida1706@gmail.com', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', 'Administrator', '09472126029', '$2y$10$5YJMppYfRF9CcUfV6MlNJOyYxbPflPplLiLxSC0FFIi1sSS6huB9S', 'admin'),
(23, '56462ff9d26db5a7', 'default.jpg', 'Bernard', 'Sapida', 'oishi', 'BernardBernard', 'Oishi', '09472126029', '$2y$10$Qp2wjkiIE.XEUxvAUW.E9.LMN84iSUulaoDTUhjmUNLsrhohtKGbm', 'supplier');

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
  `supplier name` varchar(255) NOT NULL,
  `product code` varchar(255) NOT NULL,
  `product name` varchar(255) NOT NULL,
  `box quantity` varchar(255) NOT NULL,
  `pcs per box` varchar(255) NOT NULL,
  `price per box` varchar(255) NOT NULL,
  `payment method` varchar(255) NOT NULL,
  `reference no.` varchar(255) NOT NULL,
  `vat 12%` varchar(11) NOT NULL,
  `shipping fee` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_orders`
--

INSERT INTO `admin_orders` (`id`, `transaction no.`, `name`, `delivery address`, `contact no.`, `email address`, `supplier name`, `product code`, `product name`, `box quantity`, `pcs per box`, `price per box`, `payment method`, `reference no.`, `vat 12%`, `shipping fee`, `discount`, `total`, `order status`, `date`) VALUES
(19, '94063047fd469e6d', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', 'Oishi', '105594371633', 'Potato Fries', '10', '60', '600', 'cash on delivery', 'none', '0', '150', '50', '6000', 'Completed', '2022-08-24 10:15:12'),
(20, '50763047fe755c0d', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', 'Lucky Me', '106121264826', 'Pancit Canton - Chilli Calamansi', '20', '70', '1500', 'gcash', '1234567891011', '0', '150', '100', '30000', 'Completed', '2022-08-24 10:17:27'),
(21, '80563047ff46d709', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', 'Oishi', '104423525900', 'Choco Plunge', '30', '60', '600', 'paymaya', '1234567891011', '0', '150', '50', '18000', 'Completed', '2022-08-24 09:48:08'),
(22, '19563047ffbb80c1', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', 'Lucky Me', '102663111363', 'Pancit Canton - Calamansi', '40', '70', '1500', 'cash on delivery', 'none', '0', '150', '100', '60000', 'Completed', '2022-08-24 10:17:35'),
(23, '5416305ea8ee1bc4', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', 'Oishi', '104423525900', 'Choco Plunge', '17', '60', '600', 'paymaya', '1234567891011', '0', '150', '50', '10200', 'Completed', '2022-08-24 10:14:15'),
(24, '93363060a17d4fe0', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', 'Oishi', '104959642671', 'Rinbee', '20', '60', '600', 'cash on delivery', 'none', '0', '150', '50', '12000', 'Processing', '2022-08-24 11:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_product`
--

CREATE TABLE `admin_product` (
  `id` int(6) NOT NULL,
  `product code` varchar(255) NOT NULL,
  `supplier name` varchar(255) NOT NULL,
  `product name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date of stocks` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_product`
--

INSERT INTO `admin_product` (`id`, `product code`, `supplier name`, `product name`, `category`, `quantity`, `price`, `date of stocks`) VALUES
(28, '106121264826', 'Lucky Me', 'Pancit Canton - Chilli Calamansi', 'Noodles', 1467, '6', '2022-08-24 10:17:27'),
(29, '104423525900', 'Oishi', 'Choco Plunge', 'Junkfood', 2943, '123', '2022-08-24 10:15:38'),
(30, '105594371633', 'Oishi', 'Potato Fries', 'Junkfood', 612, '12', '2022-08-24 10:15:12'),
(32, '102663111363', 'Lucky Me', 'Pancit Canton - Calamansi', 'Noodles', 3312, '51', '2022-08-24 10:17:35'),
(33, '104959642671', 'Oishi', 'Rinbee', 'Junkfood', 10, '20', '2022-08-24 11:22:30');

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

INSERT INTO `admin_transaction_sales` (`id`, `reference no.`, `product name`, `quantity`, `price`, `vat 12%`, `discount`, `total amount`, `date`) VALUES
(31, '948378397072', '1 && 4 && 7', '2 && 5 && 8', '2 && 5 && 8', '0', '8', '100', '2022-08-24 02:40:51'),
(32, '759832358147', 'Item%201 && Item%202 && Item%203', '5 && 2 && 1', '100 && 450 && 900', '0', '300', '2000', '2022-08-24 07:22:55'),
(33, '549429425137', '1', '1', '1', '0', '1', '0', '2022-08-24 07:25:22'),
(34, '983095638762', '1 && 4', '2 && 5', '3 && 6', '0', '0', '36', '2022-08-24 08:15:41');

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

--
-- Dumping data for table `supplier_customer`
--

INSERT INTO `supplier_customer` (`id`, `supplier name`, `transaction no.`, `customer name`, `delivery address`, `contact no.`, `email address`, `customer store name`, `product code`, `product name`, `box quantity`, `pcs per box`, `price per box`, `payment method`, `reference no.`, `vat 12%`, `shipping fee`, `discount`, `total`, `order status`, `date`) VALUES
(13, 'Oishi', '94063047fd469e6d', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', '321', '105594371633', 'Potato Fries', '10', '60', '600', 'cash on delivery', 'none', '0', '150', '50', '6000', 'Completed', '2022-08-24 18:15:12'),
(14, 'Lucky Me', '50763047fe755c0d', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', '321', '106121264826', 'Pancit Canton - Chilli Calamansi', '20', '70', '1500', 'gcash', '1234567891011', '0', '150', '100', '30000', 'Completed', '2022-08-24 18:17:27'),
(15, 'Oishi', '80563047ff46d709', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', '321', '104423525900', 'Choco Plunge', '30', '60', '600', 'paymaya', '1234567891011', '0', '150', '50', '18000', 'Completed', '2022-08-24 18:15:38'),
(16, 'Lucky Me', '19563047ffbb80c1', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', '321', '102663111363', 'Pancit Canton - Calamansi', '40', '70', '1500', 'cash on delivery', 'none', '0', '150', '100', '60000', 'Completed', '2022-08-24 18:17:35'),
(17, 'Oishi', '5416305ea8ee1bc4', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', 'Administrator', '104423525900', 'Choco Plunge', '17', '60', '600', 'paymaya', '1234567891011', '0', '150', '50', '10200', 'Completed', '2022-08-24 18:14:15'),
(18, 'Oishi', '93363060a17d4fe0', 'Bernard Sapida', 'B12 L24 Phase-C The Istana Subdivision Malagasang 1-F City of Imus, Cavite', '09472126029', 'admin@gmail.com', 'Administrator', '104959642671', 'Rinbee', '20', '60', '600', 'cash on delivery', 'none', '0', '150', '50', '12000', 'Processing', '2022-08-24 19:23:03');

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
  `date of stock` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_product`
--

INSERT INTO `supplier_product` (`id`, `supplier name`, `product code`, `product name`, `category`, `box quantity`, `pcs per box`, `price per box`, `shipping fee`, `discount`, `date of stock`) VALUES
(4, 'Oishi', '104423525900', 'Choco Plunge', 'Junkfood', 10, '60', '600', '150', '50', '2022-08-22 05:30:52'),
(210, 'Lucky Me', '102663111363', 'Pancit Canton - Calamansi', 'Noodles', 11, '70', '1500', '150', '100', '2022-08-22 05:30:48'),
(211, 'Lucky Me', '106121264826', 'Pancit Canton - Chilli Calamansi', 'Noodles', 50, '70', '1500', '150', '100', '2022-08-22 05:30:58'),
(215, 'Oishi', '104959642671', 'Rinbee', 'Junkfood', 50, '60', '600', '150', '50', '2022-08-22 05:30:54'),
(217, 'Oishi', '105594371633', 'Potato Fries', 'Junkfood', 10, '60', '600', '150', '50', '2022-08-22 05:30:56');

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin_orders`
--
ALTER TABLE `admin_orders`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin_product`
--
ALTER TABLE `admin_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `admin_transaction_sales`
--
ALTER TABLE `admin_transaction_sales`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `supplier_customer`
--
ALTER TABLE `supplier_customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
