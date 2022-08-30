-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 05:42 PM
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

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `uid`, `image`, `firstname`, `lastname`, `email`, `address`, `store name`, `contact no.`, `password`, `payment name`, `payment number`, `type`) VALUES
(1, '383630cb6701c886', 'img-630cba3c846d81.84538140.jpeg', 'Carlos', 'Chan', 'Oishi@gmail.com', '2225 Tolentino 1303 Pasay National Capital Region', 'Oishi', '09123460517', '$2y$10$T0aiYgnCCUbvZCD.ShQCJ.Q7eeJqtTz9wHmSeIyRKKT3JYptV832S', 'Carlos C.', '09123460517', 'supplier'),
(2, '782630cb68ba793d', 'img-630cc92e611ce6.34459420.jpg', 'Rich', 'Paul', 'Luckyme@gmail.com', '22nd & 23rd Floors, 6750 Office Tower, Ayala Ave, Makati, Metro Manila, Philippines', 'Lucky Me', '09528259370', '$2y$10$Aj2PQtFu2RJw4wdNuBtYsuZl/AAPzqQqjezfxnWyrM1y/LxHCAID.', 'Rich P.', '09528259370', 'supplier'),
(3, '68630cb792a2397', 'img-630cb7f4b29fb8.36268693.jpg', 'Kathline', 'Talavera', 'admin@gmail.com', 'Administrator', 'Administrator', '09176049590', '$2y$10$CyNawvu2Z7lqlKqPrkGeouPI4w5XIuI1aif750RLONRI0tjpgJZQi', 'Kathline T.', '09176049590', 'admin');

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

INSERT INTO `admin_orders` (`id`, `transaction no.`, `name`, `delivery address`, `contact no.`, `email address`, `product code`, `product name`, `box quantity`, `pcs per box`, `price per box`, `payment method`, `reference no.`, `vat 12%`, `shipping fee`, `discount`, `total`, `order status`, `date`) VALUES
(1, '604630cd5f63fd3c', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', '102764919964', 'Instant Mami Spicy Labuyo Beef', '2', '70', '900', 'cash on delivery', 'none', '0', '50.00', '100.00', '1800', 'Completed', '2022-08-29 15:40:38'),
(2, '169630cd838459e1', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', '107263490236', 'FROOZE', '1', '40', '1160', 'cash on delivery', 'none', '0', '50.00', '100.00', '0', 'Completed', '2022-08-29 15:35:56'),
(3, '691630cd886084f7', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', '107263490236', 'FROOZE', '1', '40', '1160', 'cash on delivery', 'none', '0', '50.00', '100.00', '0', 'Completed', '2022-08-29 15:35:55'),
(4, '462630cd9904c1b2', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', '104487433155', 'Pancit Canton Original', '2', '70', '900', 'cash on delivery', 'none', '0', '50.00', '100.00', '1750', 'Completed', '2022-08-29 15:40:35'),
(5, '977630cda9e872c7', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', '106335358781', 'Pancit Canton Go Cup Kalamansi', '1', '20', '400', 'cash on delivery', 'none', '0', '50.00', '100.00', '350', 'Completed', '2022-08-29 15:40:36'),
(6, '731630cdb9faac33', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', '100952903686', 'Smart C', '4', '40', '600', 'cash on delivery', 'none', '0', '50.00', '100.00', '2350', 'Completed', '2022-08-29 15:35:54'),
(7, '359630cdbe7cbc67', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', '106085192069', 'Rin-bee', '2', '60', '780', 'paymaya', '1234567891011', '0', '50.00', '100.00', '1510', 'Completed', '2022-08-29 15:34:37'),
(8, '751630cdc38a9b78', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', '107581011422', 'Cheese Clubs', '2', '60', '780', 'gcash', '1234567891011', '0', '50.00', '100.00', '1510', 'Completed', '2022-08-29 15:35:53');

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

INSERT INTO `admin_product` (`id`, `product code`, `product name`, `category`, `quantity`, `price`, `status`, `date of stocks`) VALUES
(1, '100912681875', 'Rin-bee', 'Corn Snacks', 130, '15', 'ACTIVE', '2022-08-29 15:34:37'),
(2, '101023614830', 'Cheese Clubs', 'Corn Snacks', 130, '15', 'ACTIVE', '2022-08-29 15:35:53'),
(3, '100952903686', 'Smart C', 'Beverages', 160, '0', 'ACTIVE', '2022-08-29 15:35:54'),
(4, '107263490236', 'FROOZE', 'Beverages', 80, '0', 'INACTIVE', '2022-08-29 15:40:17'),
(5, '104487433155', 'Pancit Canton Original', 'Noodles', 140, '0', 'ACTIVE', '2022-08-29 15:40:35'),
(6, '106335358781', 'Pancit Canton Go Cup Kalamansi', 'Noodles', 20, '0', 'ACTIVE', '2022-08-29 15:40:36'),
(7, '102764919964', 'Instant Mami Spicy Labuyo Beef', 'Noodles', 140, '0', 'ACTIVE', '2022-08-29 15:40:38');

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
(1, '436812957679', 'Item%201 && Item%202', '5 && 17', '1500 && 500', '0', '500', '15500', '2022-08-29 14:44:10'),
(2, '839949746923', 'Item%201 && Item%202', '10 && 20', '100 && 500', '0', '1000', '10000', '2022-08-29 14:45:12');

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
(1, 'Lucky Me', '604630cd5f63fd3c', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', 'Administrator', '102764919964', 'Instant Mami Spicy Labuyo Beef', '2', '70', '', 'cash on delivery', 'none', '0', '50.00', '100.00', '1800', 'Completed', '2022-08-29 23:40:38'),
(2, 'Oishi', '169630cd838459e1', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', 'Administrator', '107263490236', 'FROOZE', '1', '40', '1160', 'cash on delivery', 'none', '0', '50.00', '100.00', '1160', 'Completed', '2022-08-29 23:37:34'),
(3, 'Oishi', '691630cd886084f7', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', 'Administrator', '107263490236', 'FROOZE', '1', '40', '1160', 'cash on delivery', 'none', '0', '50.00', '100.00', '1160', 'Completed', '2022-08-29 23:37:37'),
(4, 'Lucky Me', '462630cd9904c1b2', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', 'Administrator', '104487433155', 'Pancit Canton Original', '2', '70', '900', 'cash on delivery', 'none', '0', '50.00', '100.00', '1750', 'Completed', '2022-08-29 23:40:35'),
(5, 'Lucky Me', '977630cda9e872c7', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', 'Administrator', '106335358781', 'Pancit Canton Go Cup Kalamansi', '1', '20', '400', 'cash on delivery', 'none', '0', '50.00', '100.00', '350', 'Completed', '2022-08-29 23:40:36'),
(6, 'Oishi', '731630cdb9faac33', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', 'Administrator', '100952903686', 'Smart C', '4', '40', '600', 'cash on delivery', 'none', '0', '50.00', '100.00', '2350', 'Completed', '2022-08-29 23:35:54'),
(7, 'Oishi', '359630cdbe7cbc67', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', 'Administrator', '106085192069', 'Rin-bee', '2', '60', '780', 'paymaya', '1234567891011', '0', '50.00', '100.00', '1510', 'Completed', '2022-08-29 23:34:37'),
(8, 'Oishi', '751630cdc38a9b78', 'Kathline Talavera', 'Administrator', '09176049590', 'admin@gmail.com', 'Administrator', '107581011422', 'Cheese Clubs', '2', '60', '780', 'gcash', '1234567891011', '0', '50.00', '100.00', '1510', 'Completed', '2022-08-29 23:35:53');

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
-- Dumping data for table `supplier_product`
--

INSERT INTO `supplier_product` (`id`, `supplier name`, `product code`, `product name`, `category`, `box quantity`, `pcs per box`, `price per box`, `shipping fee`, `discount`, `status`, `date of stock`) VALUES
(1, 'Oishi', '101902453574', 'PANCHOS', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 15:33:58'),
(2, 'Oishi', '107581011422', 'Cheese Clubs', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:10:54'),
(3, 'Oishi', '106085192069', 'Rin-bee', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:11:36'),
(4, 'Oishi', '102788076177', 'Corn OLE', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:12:44'),
(5, 'Oishi', '108422413952', 'Cheeze on Chips', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:13:44'),
(6, 'Oishi', '102801202199', 'MIGGOS', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:14:15'),
(7, 'Oishi', '105302969328', 'CRUNCHY KARLS', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:14:44'),
(8, 'Oishi', '100267722339', '4X', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:15:10'),
(9, 'Oishi', '103273101834', 'CIRCO', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:15:34'),
(10, 'Oishi', '106728379966', 'Choco Chug', 'Beverages', 100, '40', '600', '50', '100', 'ACTIVE', '2022-08-29 13:36:15'),
(11, 'Oishi', '109050262562', 'Hi Coffee', 'Beverages', 100, '40', '600', '50', '100', 'ACTIVE', '2022-08-29 13:40:22'),
(12, 'Oishi', '104519547485', 'Oaties Milk', 'Beverages', 10, '40', '600', '50', '100', 'ACTIVE', '2022-08-29 13:41:23'),
(13, 'Oishi', '100952903686', 'Smart C', 'Beverages', 10, '40', '600', '50', '100', 'ACTIVE', '2022-08-29 13:45:18'),
(14, 'Oishi', '100076978862', 'Sundays', 'Beverages', 100, '72', '1440', '50', '100', 'ACTIVE', '2022-08-29 13:48:29'),
(15, 'Oishi', '107263490236', 'FROOZE', 'Beverages', 100, '40', '1160', '50', '100', 'ACTIVE', '2022-08-29 13:50:08'),
(16, 'Oishi', '105479380135', 'Choco Flakes Cereal', 'Cereals', 100, '30', '300', '50', '50', 'ACTIVE', '2022-08-29 13:51:31'),
(17, 'Oishi', '101556240405', 'Choco Plunge', 'Cereals', 100, '30', '300', '50', '50', 'ACTIVE', '2022-08-29 13:51:57'),
(18, 'Lucky Me', '106335358781', 'Pancit Canton Go Cup Kalamansi', 'Noodles', 100, '20', '400', '50', '100', 'ACTIVE', '2022-08-29 13:58:36'),
(19, 'Lucky Me', '100804230501', 'Pancit Canton Go Cup Extra Hot Chili', 'Noodles', 100, '20', '400', '50', '100', 'ACTIVE', '2022-08-29 15:28:37'),
(20, 'Lucky Me', '104487433155', 'Pancit Canton Original', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:00:57'),
(21, 'Lucky Me', '104490014410', 'Pancit Canton Kalamansi', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:01:22'),
(22, 'Lucky Me', '102506143153', 'Pancit Canton Extra Hot Chili', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:01:43'),
(23, 'Lucky Me', '109363832312', 'Pancit Canton Chilimansi', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:02:12'),
(24, 'Lucky Me', '103591567224', 'Pancit Canton Sweet & Spicy', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:02:36'),
(25, 'Lucky Me', '108142503966', 'Instant Mami Lite Chicken na Chicken', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:04:31'),
(26, 'Lucky Me', '109081550110', 'Instant Mami Beef na Beef', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:04:52'),
(27, 'Lucky Me', '106468265790', 'Instant Mami Lite Beef na Beef', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:05:14'),
(28, 'Lucky Me', '106247951770', 'Instant Mami Itnok', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:06:05'),
(29, 'Lucky Me', '103218086250', 'Instant Mami N-Rich with Malunggay', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:07:26'),
(30, 'Lucky Me', '101404141102', 'Instant Mami Beef Spareribs', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:07:49'),
(31, 'Lucky Me', '106764311704', 'Instant Mami Pork Ribs', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:08:53'),
(32, 'Lucky Me', '102764919964', 'Instant Mami Spicy Labuyo Beef', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:09:16'),
(33, 'Lucky Me', '102712468721', 'Instant Mami Spicy Labuyo Chicken', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:09:46'),
(34, 'Lucky Me', '103888237924', 'Instant Mami Spicy Labuyo Pork', 'Noodles', 100, '70', '900', '50', '100', 'ACTIVE', '2022-08-29 14:10:38'),
(35, 'Lucky Me', '106294536031', 'La Paz Batchoy', 'Noodles', 100, '700', '900', '50', '100', 'ACTIVE', '2022-08-29 14:11:03');

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_orders`
--
ALTER TABLE `admin_orders`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_product`
--
ALTER TABLE `admin_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_transaction_sales`
--
ALTER TABLE `admin_transaction_sales`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_customer`
--
ALTER TABLE `supplier_customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
