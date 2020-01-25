-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2020 at 08:45 AM
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
-- Database: `phpbilling`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `mobile`, `address`, `created`, `updated`) VALUES
(1, 'Vivek', 'vivek@codingcyber.com', '9030941333', 'Hyd\r\nHyd', '2019-12-20 15:10:34', '2019-12-20 15:10:34'),
(2, 'Vivek V', 'vivek1@codingcyber.com', '9030942333', 'Hyd', '2019-12-20 15:20:12', '2019-12-20 15:20:12'),
(4, 'vivek v new', 'test@gmail.com', '9876543210', 'test address', '2020-01-02 12:37:22', '2020-01-02 12:37:22'),
(5, 'new client', 'newclient@gmail.com', '9876543211', 'test', '2020-01-02 12:41:39', '2020-01-02 12:41:39'),
(6, 'new client 1', 'newclient1@gmail.com', '89877427364', 'test', '2020-01-02 12:42:13', '2020-01-02 14:53:47'),
(7, 'New Client Name Updated 1 New', 'newclientname@gmail.com', '987654323', 'Client Address Here Updated 1 New', '2020-01-02 14:21:18', '2020-01-02 14:45:33'),
(8, 'Vivek V', 'vivek@gmail.com', '8765443390', 'Address Here', '2020-01-02 15:36:14', '2020-01-02 15:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_ref` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `client_id`, `amount`, `payment_mode`, `payment_ref`, `created`, `updated`) VALUES
(1, '1', '1545', 'cash', '1234', '2019-12-29 13:20:45', '2019-12-29 13:20:45'),
(2, '1', '1545', 'cash', '123456', '2019-12-30 13:00:25', '2019-12-30 13:00:25'),
(3, '1', '207', 'test', '2345', '2019-12-30 13:03:49', '2019-12-30 13:03:49'),
(4, '1', '825', 'testt', '467', '2019-12-30 13:04:25', '2019-12-30 13:04:25'),
(5, '1', '720', 'test', '234567', '2019-12-31 16:09:30', '2019-12-31 16:09:30'),
(6, '1', '627', 'test', '09876', '2019-12-31 16:11:08', '2019-12-31 16:11:08'),
(7, '1', '207', 'test', '12345', '2019-12-31 16:18:43', '2019-12-31 16:18:43'),
(8, '5', '102', 'test', '1234', '2020-01-02 12:45:00', '2020-01-02 12:45:00'),
(9, '6', '408', 'tes', 'test', '2020-01-02 12:47:36', '2020-01-02 12:47:36'),
(10, '1', '105', 'test', 'test', '2020-01-02 13:45:30', '2020-01-02 13:45:30'),
(11, '5', '210', 'test', 'test', '2020-01-02 13:48:01', '2020-01-02 13:48:01'),
(12, '1', '204', 'test', 'test', '2020-01-02 13:55:43', '2020-01-02 13:55:43'),
(13, '7', '414', 'test', '09876', '2020-01-02 14:25:27', '2020-01-02 14:25:27'),
(14, '5', '105', 'test', '4567', '2020-01-02 14:55:02', '2020-01-02 14:55:02'),
(15, '1', '286', 'test', '9876543', '2020-01-02 15:39:25', '2020-01-02 15:39:25'),
(16, '1', '440', 'test', '8765', '2020-01-02 15:46:33', '2020-01-02 15:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_quantity` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `item_id`, `item_price`, `item_quantity`, `total_price`, `created`, `updated`) VALUES
(1, '4', '1', '102', '5', '510', '2019-12-30 13:04:25', '2019-12-30 13:04:25'),
(2, '4', '3', '105', '3', '315', '2019-12-30 13:04:25', '2019-12-30 13:04:25'),
(3, '5', '1', '102', '5', '510', '2019-12-31 16:09:31', '2019-12-31 16:09:31'),
(4, '5', '3', '105', '2', '210', '2019-12-31 16:09:31', '2019-12-31 16:09:31'),
(5, '6', '1', '102', '1', '102', '2019-12-31 16:11:08', '2019-12-31 16:11:08'),
(6, '6', '3', '105', '5', '525', '2019-12-31 16:11:08', '2019-12-31 16:11:08'),
(7, '7', '1', '102', '1', '102', '2019-12-31 16:18:43', '2019-12-31 16:18:43'),
(8, '7', '3', '105', '1', '105', '2019-12-31 16:18:43', '2019-12-31 16:18:43'),
(9, '8', '1', '102', '1', '102', '2020-01-02 12:45:00', '2020-01-02 12:45:00'),
(10, '9', '1', '102', '4', '408', '2020-01-02 12:47:36', '2020-01-02 12:47:36'),
(11, '10', '3', '105', '1', '105', '2020-01-02 13:45:31', '2020-01-02 13:45:31'),
(12, '11', '3', '105', '2', '210', '2020-01-02 13:48:01', '2020-01-02 13:48:01'),
(13, '12', '1', '102', '2', '204', '2020-01-02 13:55:43', '2020-01-02 13:55:43'),
(14, '13', '1', '102', '2', '204', '2020-01-02 14:25:27', '2020-01-02 14:25:27'),
(15, '13', '3', '105', '2', '210', '2020-01-02 14:25:27', '2020-01-02 14:25:27'),
(16, '14', '3', '105', '1', '105', '2020-01-02 14:55:02', '2020-01-02 14:55:02'),
(17, '15', '11', '38', '5', '190', '2020-01-02 15:39:25', '2020-01-02 15:39:25'),
(18, '15', '12', '48', '2', '96', '2020-01-02 15:39:25', '2020-01-02 15:39:25'),
(19, '16', '12', '48', '6', '288', '2020-01-02 15:46:33', '2020-01-02 15:46:33'),
(20, '16', '11', '38', '4', '152', '2020-01-02 15:46:33', '2020-01-02 15:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `type`, `price`, `stock`, `created`, `updated`) VALUES
(1, 'Service 1 updated', 'Service 1 Description updated', 'service', '102', '0', '2019-12-22 20:36:49', '2019-12-23 09:47:40'),
(3, 'Product 1 Updated', 'Product 1 Description Updated', 'product', '105', '18', '2019-12-23 09:59:14', '2020-01-02 14:55:02'),
(5, 'Test Product', 'Test Product Description', 'product', '95', '30', '2020-01-02 14:22:05', '2020-01-02 14:24:32'),
(6, 'Service Name', 'Service Name Description', 'service', '60', '0', '2020-01-02 14:24:14', '2020-01-02 14:24:22'),
(7, 'New Product for Test 1', ' New Product for Test 1 Description', 'product', '86', '30', '2020-01-02 14:45:57', '2020-01-02 14:50:52'),
(8, 'New Product for Testing again', ' New Product for Testing agin Description', 'product', '79', '40', '2020-01-02 14:46:37', '2020-01-02 14:51:02'),
(9, 'New Service Test', 'New Service Test Description', 'service', '44', '0', '2020-01-02 14:51:31', '2020-01-02 14:51:31'),
(10, 'New Service Test 1 Updated', 'New Service Test 1 Description', 'service', '42', '0', '2020-01-02 14:52:08', '2020-01-02 14:53:39'),
(11, 'Demo Product Updated', 'Demo Product Description Updated', 'product', '38', '61', '2020-01-02 15:36:38', '2020-01-02 15:46:33'),
(12, 'Demo Service', 'Demo Service Description', 'service', '48', '0', '2020-01-02 15:37:33', '2020-01-02 15:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `items_stock`
--

CREATE TABLE `items_stock` (
  `id` int(11) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `stock_in` varchar(255) DEFAULT NULL,
  `stock_out` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_stock`
--

INSERT INTO `items_stock` (`id`, `item_id`, `stock_in`, `stock_out`, `created`, `updated`) VALUES
(1, '3', '10', NULL, '2019-12-23 13:12:44', '2019-12-23 13:12:44'),
(2, '3', '5', NULL, '2019-12-23 13:12:55', '2019-12-23 13:12:55'),
(3, '3', NULL, '2', '2019-12-31 16:09:31', '2019-12-31 16:09:31'),
(4, '3', NULL, '5', '2019-12-31 16:11:08', '2019-12-31 16:11:08'),
(5, '3', NULL, '1', '2019-12-31 16:18:43', '2019-12-31 16:18:43'),
(6, '3', NULL, '1', '2020-01-02 13:45:31', '2020-01-02 13:45:31'),
(7, '3', NULL, '2', '2020-01-02 13:48:01', '2020-01-02 13:48:01'),
(8, '5', '30', NULL, '2020-01-02 14:22:40', '2020-01-02 14:22:40'),
(9, '3', NULL, '2', '2020-01-02 14:25:27', '2020-01-02 14:25:27'),
(10, '7', '10', NULL, '2020-01-02 14:50:26', '2020-01-02 14:50:26'),
(11, '7', '20', NULL, '2020-01-02 14:50:52', '2020-01-02 14:50:52'),
(12, '8', '15', NULL, '2020-01-02 14:50:58', '2020-01-02 14:50:58'),
(13, '8', '25', NULL, '2020-01-02 14:51:02', '2020-01-02 14:51:02'),
(14, '3', '15', NULL, '2020-01-02 14:51:07', '2020-01-02 14:51:07'),
(15, '3', NULL, '1', '2020-01-02 14:55:02', '2020-01-02 14:55:02'),
(16, '11', '50', NULL, '2020-01-02 15:36:47', '2020-01-02 15:36:47'),
(17, '11', '20', NULL, '2020-01-02 15:36:53', '2020-01-02 15:36:53'),
(18, '11', NULL, '5', '2020-01-02 15:39:25', '2020-01-02 15:39:25'),
(19, '11', NULL, '4', '2020-01-02 15:46:33', '2020-01-02 15:46:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`mobile`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_stock`
--
ALTER TABLE `items_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `items_stock`
--
ALTER TABLE `items_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
