-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 03:16 PM
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
(2, '782630cb68ba793d', 'default.jpg', 'Rich', 'Paul', 'Luckyme@gmail.com', '22nd & 23rd Floors, 6750 Office Tower, Ayala Ave, Makati, Metro Manila, Philippines', 'Lucky Me', '09528259370', '$2y$10$Aj2PQtFu2RJw4wdNuBtYsuZl/AAPzqQqjezfxnWyrM1y/LxHCAID.', 'Rich P.', '09528259370', 'supplier'),
(3, '68630cb792a2397', 'img-630cb7f4b29fb8.36268693.jpg', 'Kathline', 'Talavera', 'administrator@gmail.com', 'Administrator', 'Administrator', '09176049590', '$2y$10$CyNawvu2Z7lqlKqPrkGeouPI4w5XIuI1aif750RLONRI0tjpgJZQi', 'Kathline T.', '09176049590', 'admin');

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

INSERT INTO `admin_product` (`id`, `product code`, `product name`, `category`, `quantity`, `price`, `status`, `date of stocks`) VALUES
(1, '100912681875', 'Rinbee', 'Corn Snacks', 100, '15', 'ACTIVE', '2022-08-29 12:59:38'),
(2, '101023614830', 'Cheese Clubs', 'Corn Snacks', 10, '15', 'INACTIVE', '2022-08-29 13:00:15');

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
-- Dumping data for table `supplier_product`
--

INSERT INTO `supplier_product` (`id`, `supplier name`, `product code`, `product name`, `category`, `box quantity`, `pcs per box`, `price per box`, `shipping fee`, `discount`, `status`, `date of stock`) VALUES
(1, 'Oishi', '101902453574', 'PANCHOS', 'Corn Snacks', 100, '60', '780', '50', '100', 'INACTIVE', '2022-08-29 13:13:10'),
(2, 'Oishi', '107581011422', 'Cheese Clubs', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:10:54'),
(3, 'Oishi', '106085192069', 'Rin-bee', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:11:36'),
(4, 'Oishi', '102788076177', 'Corn OLE', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:12:44'),
(5, 'Oishi', '108422413952', 'Cheeze on Chips', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:13:44'),
(6, 'Oishi', '102801202199', 'MIGGOS', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:14:15'),
(7, 'Oishi', '105302969328', 'CRUNCHY KARLS', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:14:44'),
(8, 'Oishi', '100267722339', '4X', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:15:10'),
(9, 'Oishi', '103273101834', 'CIRCO', 'Corn Snacks', 100, '60', '780', '50', '100', 'ACTIVE', '2022-08-29 13:15:34');

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_product`
--
ALTER TABLE `admin_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_transaction_sales`
--
ALTER TABLE `admin_transaction_sales`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_customer`
--
ALTER TABLE `supplier_customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
