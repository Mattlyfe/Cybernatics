-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 06:18 AM
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
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_account`
--

CREATE TABLE `card_account` (
  `id` int(11) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_cvv` int(20) NOT NULL,
  `card_expire` varchar(20) NOT NULL,
  `card_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_account`
--

INSERT INTO `card_account` (`id`, `card_name`, `card_number`, `card_cvv`, `card_expire`, `card_amount`) VALUES
(1, 'Cyber Popanes', '3141 5926 5358 9805', 166, '12/23', -44);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(3, 'Condiments', 'Condiments', '2017-01-24 19:17:37', '30-01-2017 12:22:24 AM'),
(4, 'Cookies and Crackers', 'Cookies and Crackers Products', '2017-01-24 19:19:32', ''),
(5, 'Dairy', 'Dairy Products', '2017-01-24 19:19:54', ''),
(6, 'Beverages', 'Beverages', '2017-02-20 19:18:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `item_container`
--

CREATE TABLE `item_container` (
  `id` int(11) NOT NULL,
  `product_code` varchar(45) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `transactionId` int(11) DEFAULT NULL,
  `orderStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `transactionId`, `orderStatus`) VALUES
(63, 4, '2', 1, '2022-11-07 15:59:20', 'E-Wallet', 22, 'Received'),
(64, 4, '3', 1, '2022-11-07 15:59:20', 'E-Wallet', 22, 'Received'),
(65, 4, '7', 1, '2022-11-07 16:00:21', 'E-Wallet', 23, 'Received'),
(66, 4, '28', 1, '2022-11-07 16:00:21', 'E-Wallet', 23, 'Received'),
(68, 4, '2', 1, '2022-11-08 13:08:27', 'E-Wallet', 25, 'Preparing'),
(69, 4, '2', 1, '2022-11-08 13:09:23', 'E-Wallet', 26, 'Preparing'),
(70, 4, '2', 1, '2022-11-08 13:24:12', 'Cash on Delivery', 27, 'Pending'),
(71, 4, '2', 1, '2022-11-08 13:38:13', 'Cash on Delivery', 28, 'Pending'),
(72, 4, '2', 1, '2022-11-08 13:40:50', 'Cash on Delivery', 29, 'Pending'),
(73, 4, '1', 1, '2022-11-08 13:41:41', 'E-Wallet', 30, 'Pending'),
(74, 4, '5', 1, '2022-11-08 13:42:51', 'E-Wallet', 31, 'Pending'),
(75, 4, '3', 1, '2022-11-08 13:44:52', 'E-Wallet', 32, 'Pending'),
(76, 4, '5', 1, '2022-11-08 13:49:30', 'E-Wallet', 33, 'Pending'),
(77, 4, '2', 1, '2022-11-08 13:51:50', 'E-Wallet', 34, 'Pending'),
(78, 4, '5', 1, '2022-11-08 13:52:24', 'Cash on Delivery', 35, 'Pending'),
(79, 4, '2', 1, '2022-11-08 13:56:56', 'Cash on Delivery', 36, 'Pending'),
(80, 4, '2', 1, '2022-11-08 14:02:56', 'E-Wallet', 37, 'Pending'),
(81, 4, '7', 1, '2022-11-08 14:07:27', 'E-Wallet', 38, 'Pending'),
(82, 4, '2', 1, '2022-11-08 14:13:12', 'Cash on Delivery', 39, 'Pending'),
(83, 4, '2', 1, '2022-11-08 14:13:45', 'Cash on Delivery', 40, 'Pending'),
(84, 4, '2', 2, '2022-11-08 14:14:40', 'Cash on Delivery', 41, 'Pending'),
(85, 4, '28', 1, '2022-11-08 14:14:40', 'Cash on Delivery', 41, 'Pending'),
(87, 4, '3', 1, '2022-11-08 14:15:11', NULL, 42, NULL),
(88, 4, '1', 1, '2022-11-08 14:18:26', NULL, 43, NULL),
(89, 4, '3', 1, '2022-11-08 14:18:26', NULL, 43, NULL),
(90, 4, '1', 1, '2022-11-08 14:20:56', NULL, 44, NULL),
(91, 4, '3', 1, '2022-11-08 14:20:56', NULL, 44, NULL),
(92, 4, '1', 1, '2022-11-08 14:22:15', 'Cash on Delivery', 45, 'Pending'),
(93, 4, '3', 1, '2022-11-08 14:22:15', 'Cash on Delivery', 45, 'Pending'),
(94, 4, '2', 1, '2022-11-08 14:23:32', NULL, 46, NULL),
(95, 4, '2', 3, '2022-11-08 14:26:25', NULL, 47, NULL),
(96, 4, '2', 10, '2022-11-08 14:27:14', 'E-Wallet', 48, 'Pending'),
(97, 4, '1', 1, '2022-11-10 04:40:11', NULL, 49, NULL),
(98, 4, '2', 1, '2022-11-10 04:40:11', NULL, 49, NULL),
(99, 4, '1', 2, '2022-11-10 04:50:12', 'E-Wallet', 50, 'Pending'),
(100, 4, '2', 1, '2022-11-10 04:50:12', 'E-Wallet', 50, 'Pending'),
(101, 4, '1', 3, '2022-11-10 08:59:27', 'E-Wallet', 51, 'Pending'),
(102, 4, '2', 3, '2022-11-10 08:59:27', 'E-Wallet', 51, 'Pending'),
(103, 4, '2', 1, '2022-11-10 09:04:09', 'Cash on Delivery', 52, 'Pending'),
(104, 4, '3', 1, '2022-11-10 09:05:35', 'Cash on Delivery', 53, 'Pending'),
(105, 4, '1', 1, '2022-11-10 09:08:37', 'Cash on Delivery', 54, 'Pending'),
(106, 4, '28', 1, '2022-11-10 09:09:30', 'Cash on Delivery', 55, 'Pending'),
(107, 4, '2', 1, '2022-11-10 09:14:28', NULL, 56, NULL),
(108, 4, '2', 8, '2022-11-10 09:15:25', 'Cash on Delivery', 57, 'Pending'),
(109, 4, '2', 4, '2022-11-10 09:16:02', 'Cash on Delivery', 58, 'Pending'),
(110, 4, '2', 1, '2022-11-10 14:07:41', 'Cash on Delivery', 59, 'Pending'),
(111, 4, '2', 1, '2022-11-10 14:43:41', NULL, 60, NULL),
(112, 4, '2', 1, '2022-11-11 03:39:34', NULL, 61, NULL),
(113, 4, '2', 1, '2022-11-11 04:25:00', NULL, 62, NULL),
(114, 4, '2', 1, '2022-11-11 06:00:23', NULL, 63, NULL),
(115, 4, '2', 1, '2022-11-11 06:00:48', NULL, 64, NULL),
(116, 4, '5', 1, '2022-11-11 06:00:48', NULL, 64, NULL),
(117, 4, '2', 1, '2022-11-11 06:23:48', NULL, 65, NULL),
(118, 4, '2', 1, '2022-11-11 06:59:13', NULL, 66, NULL),
(119, 4, '2', 1, '2022-11-11 07:58:17', 'Cash on Delivery', 67, 'Pending'),
(120, 9, '2', 1, '2022-11-11 08:17:26', 'Cash on Delivery', 68, 'Pending'),
(121, 4, '1', 1, '2022-11-11 08:41:00', NULL, 69, NULL),
(122, 4, '1', 1, '2022-11-11 08:45:01', 'E-Wallet', 70, 'Pending'),
(123, 4, '2', 1, '2022-11-11 09:27:07', 'E-Wallet', 71, 'Pending'),
(124, 4, '2', 1, '2022-11-11 09:33:21', NULL, 72, NULL),
(125, 4, '2', 1, '2022-11-11 10:15:04', NULL, 73, NULL),
(126, 9, '2', 1, '2022-11-11 12:25:48', NULL, 74, NULL),
(127, 9, '7', 1, '2022-11-11 12:25:48', NULL, 74, NULL),
(128, 9, '2', 1, '2022-11-11 12:31:12', 'Cash on Delivery', 75, 'Pending'),
(129, 9, '7', 1, '2022-11-11 12:31:12', 'Cash on Delivery', 75, 'Pending'),
(130, 4, '2', 1, '2022-11-12 05:44:40', 'E-Wallet', 76, NULL),
(131, 4, '1', 1, '2022-11-12 06:07:23', 'Debit/Credit Card', 77, NULL),
(132, 4, '2', 1, '2022-11-12 06:10:55', 'E-Wallet', 78, NULL),
(133, 4, '2', 1, '2022-11-12 06:13:32', 'Cash on Delivery', 79, NULL),
(134, 4, '5', 1, '2022-11-12 06:34:12', 'Cash on Delivery', 80, NULL),
(135, 4, '2', 1, '2022-11-12 06:34:29', NULL, 81, NULL),
(136, 4, '2', 1, '2022-11-12 06:37:56', 'Cash on Delivery', 82, NULL),
(137, 4, '2', 1, '2022-11-12 06:38:34', 'Debit/Credit Card', 83, NULL),
(138, 4, '2', 1, '2022-11-12 06:41:36', 'E-Wallet', 84, NULL),
(139, 4, '2', 1, '2022-11-12 06:55:43', 'E-Wallet', 85, 'Packing'),
(140, 4, '2', 1, '2022-11-12 06:57:33', 'Cash on Delivery', 86, 'Pending'),
(141, 4, '2', 1, '2022-11-12 06:59:19', 'Debit/Credit Card', 87, 'Pending'),
(142, 4, '2', 1, '2022-11-12 13:01:13', 'Cash on Delivery', 88, 'Preparing'),
(143, 4, '2', 1, '2022-11-12 13:48:10', NULL, 89, NULL),
(144, 9, '2', 1, '2022-11-12 14:33:40', 'E-Wallet', 90, 'Pending'),
(145, 10, '1', 1, '2022-11-12 15:06:49', 'E-Wallet', 91, 'Pending'),
(146, 10, '2', 2, '2022-11-12 15:06:49', 'E-Wallet', 91, 'Pending'),
(147, 0, '2', 1, '2022-11-12 15:52:39', NULL, 92, NULL),
(148, 0, '2', 1, '2022-11-12 15:56:09', NULL, 93, NULL),
(149, 10, '2', 1, '2022-11-12 15:56:49', 'Cash on Delivery', 94, 'Pending'),
(150, 0, '2', 1, '2022-11-12 16:35:41', NULL, 95, NULL),
(151, 4, '2', 1, '2022-11-12 16:44:33', 'Debit/Credit Card', 96, 'Pending'),
(152, 4, '2', 1, '2022-11-12 18:00:15', 'Debit/Credit Card', 97, 'Pending'),
(153, 4, '2', 1, '2022-11-12 18:02:11', 'Debit/Credit Card', 98, 'Pending'),
(154, 4, '2', 1, '2022-11-12 18:05:06', 'Debit/Credit Card', 99, 'Pending'),
(155, 4, '2', 1, '2022-11-12 18:06:08', 'Debit/Credit Card', 100, 'Pending'),
(156, 4, '2', 1, '2022-11-12 18:07:00', 'Debit/Credit Card', 101, 'Pending'),
(157, 4, '2', 1, '2022-11-12 18:07:39', 'Debit/Credit Card', 102, 'Pending'),
(158, 4, '3', 1, '2022-11-12 18:12:41', 'Debit/Credit Card', 103, 'Pending'),
(159, 4, '3', 1, '2022-11-12 18:13:34', 'Debit/Credit Card', 104, 'Pending'),
(160, 4, '1', 1, '2022-11-12 18:18:16', 'Debit/Credit Card', 105, 'Pending'),
(161, 4, '2', 1, '2022-11-12 18:25:39', 'Debit/Credit Card', 106, 'Pending'),
(162, 4, '2', 1, '2022-11-12 18:27:48', 'Debit/Credit Card', 107, 'Pending'),
(163, 4, '2', 1, '2022-11-12 18:28:53', 'Debit/Credit Card', 108, 'Pending'),
(164, 4, '3', 1, '2022-11-12 18:32:38', 'Debit/Credit Card', 109, 'Pending'),
(165, 4, '3', 1, '2022-11-13 10:16:07', 'E-Wallet', 110, 'Pending'),
(166, 12, '4', 1, '2022-11-13 10:18:43', 'E-Wallet', 111, 'Pending'),
(167, 11, '2', 1, '2022-11-13 10:26:45', 'E-Wallet', 112, 'Pending'),
(168, 4, '2', 1, '2022-11-13 10:40:36', 'Cash on Delivery', 113, 'Pending'),
(169, 4, '3', 8, '2022-11-13 10:40:36', 'Cash on Delivery', 113, 'Pending'),
(170, 13, '1', 1, '2022-11-13 10:53:29', NULL, 114, NULL),
(171, 14, '1', 2, '2022-11-13 12:04:08', 'Cash on Delivery', 115, 'Pending'),
(172, 14, '4', 1, '2022-11-13 12:04:08', 'Cash on Delivery', 115, 'Pending'),
(173, 14, '30', 2, '2022-11-13 12:06:43', 'E-Wallet', 116, 'Pending'),
(174, 11, '2', 1, '2022-11-13 13:31:42', NULL, 117, NULL),
(175, 11, '3', 1, '2022-11-13 13:31:42', NULL, 117, NULL),
(176, 4, '1', 6, '2022-11-13 15:31:48', 'Cash on Delivery', 118, 'Pending'),
(177, 4, '3', 5, '2022-11-13 15:31:48', 'Cash on Delivery', 118, 'Pending'),
(178, 4, '4', 5, '2022-11-13 15:31:48', 'Cash on Delivery', 118, 'Pending'),
(179, 4, '2', 1, '2022-11-13 15:34:16', 'E-Wallet', 119, 'Pending'),
(180, 4, '2', 1, '2022-11-13 15:34:49', 'Debit/Credit Card', 120, 'Pending'),
(181, 17, '1', 1, '2022-11-13 23:59:34', 'E-Wallet', 121, 'Pending'),
(182, 17, '2', 1, '2022-11-13 23:59:34', 'E-Wallet', 121, 'Pending'),
(183, 17, '35', 1, '2022-11-13 23:59:34', 'E-Wallet', 121, 'Pending'),
(184, 18, '3', 1, '2022-11-14 15:12:01', NULL, 122, NULL),
(185, 18, '34', 1, '2022-11-14 15:12:01', NULL, 122, NULL),
(186, 18, '3', 6, '2022-11-14 15:12:21', 'Debit/Credit Card', 123, 'Pending'),
(187, 18, '34', 10, '2022-11-14 15:12:21', 'Debit/Credit Card', 123, 'Pending'),
(188, 18, '1', 1, '2022-11-16 11:44:17', NULL, 124, NULL),
(189, 18, '2', 1, '2022-11-16 11:44:17', NULL, 124, NULL),
(190, 18, '1', 1, '2022-11-16 11:47:52', NULL, 125, NULL),
(191, 18, '2', 1, '2022-11-16 11:47:52', NULL, 125, NULL),
(192, 18, '1', 1, '2022-11-16 11:50:46', 'Debit/Credit Card', 126, 'Out For Delivery'),
(193, 18, '2', 1, '2022-11-16 11:50:46', 'Debit/Credit Card', 126, 'Out For Delivery'),
(194, 19, '1', 1, '2022-11-16 14:00:37', 'E-Wallet', 127, 'Received'),
(195, 19, '3', 5, '2022-11-16 14:10:45', 'E-Wallet', 128, 'Received'),
(196, 19, '3', 5, '2022-11-16 14:57:52', 'E-Wallet', 129, 'For Delivery'),
(197, 11, '2', 5, '2022-11-16 15:51:04', 'Cash on Delivery', 130, 'For Delivery'),
(198, 11, '1', 6, '2022-11-16 15:54:22', 'Cash on Delivery', 131, 'Received'),
(199, 12, '3', 5, '2022-11-16 16:01:12', NULL, 132, NULL),
(200, 11, '2', 5, '2022-11-16 16:04:30', NULL, 133, NULL),
(202, 20, '1', 1, '2022-11-16 16:08:47', NULL, 135, NULL),
(203, 20, '1', 1, '2022-11-16 16:58:52', 'Cash on Delivery', 136, 'Pending'),
(204, 21, '3', 5, '2022-11-17 01:22:22', 'E-Wallet', 137, 'Pending'),
(205, 21, '5', 6, '2022-11-17 01:22:22', 'E-Wallet', 137, 'Pending'),
(206, 21, '2', 3, '2022-11-17 01:23:55', NULL, 138, NULL),
(207, 21, '1', 8, '2022-11-17 01:28:01', NULL, 139, NULL),
(208, 21, '2', 5, '2022-11-17 01:28:01', NULL, 139, NULL),
(209, 21, '1', 8, '2022-11-17 01:38:23', NULL, 140, NULL),
(210, 21, '2', 5, '2022-11-17 01:38:23', NULL, 140, NULL),
(211, 21, '2', 5, '2022-11-17 01:42:31', 'E-Wallet', 141, 'Pending'),
(212, 21, '2', 4, '2022-11-17 01:44:17', 'E-Wallet', 142, 'Pending'),
(213, 21, '3', 4, '2022-11-17 01:44:17', 'E-Wallet', 142, 'Pending'),
(214, 21, '2', 1, '2022-11-17 01:46:41', NULL, 143, NULL),
(215, 22, '1', 3, '2022-11-18 07:51:36', NULL, 144, NULL),
(216, 22, '1', 3, '2022-11-18 07:51:56', NULL, 145, NULL),
(217, 22, '1', 4, '2022-11-18 07:52:58', NULL, 146, NULL),
(219, 11, '1', 1, '2022-11-18 08:34:04', NULL, 148, NULL),
(220, 22, '1', 3, '2022-11-18 08:44:02', NULL, 149, NULL),
(221, 22, '2', 2, '2022-11-18 08:44:02', NULL, 149, NULL),
(222, 22, '3', 4, '2022-11-18 08:44:02', NULL, 149, NULL),
(223, 22, '1', 3, '2022-11-18 09:00:09', 'E-Wallet', 150, 'Received'),
(224, 22, '2', 3, '2022-11-18 09:00:09', 'E-Wallet', 150, 'Received'),
(225, 22, '3', 4, '2022-11-18 09:00:09', 'E-Wallet', 150, 'Received'),
(226, 22, '1', 1, '2022-11-18 09:07:03', 'E-Wallet', 151, 'Pending'),
(227, 11, '2', 1, '2022-11-18 13:32:48', 'Cash on Delivery', 152, 'Pending'),
(228, 11, '2', 1, '2022-11-18 13:59:07', 'Cash on Delivery', 153, 'Pending'),
(229, 11, '2', 1, '2022-11-18 22:08:59', 'Cash on Delivery', 154, 'Pending'),
(230, 11, '2', 1, '2022-11-18 22:11:07', 'Cash on Delivery', 155, 'For Delivery'),
(231, 23, '1', 1, '2022-11-18 22:29:58', 'E-Wallet', 156, 'Pending'),
(232, 25, '2', 5, '2022-11-19 10:44:37', 'E-Wallet', 157, 'Pending'),
(233, 25, '2', 1, '2022-11-19 11:11:36', NULL, 158, NULL),
(234, 25, '2', 1, '2022-11-19 11:12:25', NULL, 159, NULL),
(235, 25, '2', 14, '2022-11-19 11:21:18', NULL, 160, NULL),
(236, 25, '2', 7, '2022-11-19 11:21:48', NULL, 161, NULL),
(237, 25, '2', 5, '2022-11-19 11:24:13', NULL, 162, NULL),
(238, 25, '2', 3, '2022-11-19 11:25:51', NULL, 163, NULL),
(239, 25, '3', 5, '2022-11-19 11:26:55', NULL, 164, NULL),
(240, 11, '2', 5, '2022-11-19 11:27:27', NULL, 165, NULL),
(241, 11, '3', 1, '2022-11-19 11:29:45', 'Cash on Delivery', 166, 'Pending'),
(242, 11, '2', 7, '2022-11-19 11:30:01', 'Cash on Delivery', 167, 'Pending'),
(243, 23, '2', 2, '2022-11-19 19:56:07', 'Debit/Credit Card', 168, 'Pending'),
(244, 11, '2', 5, '2022-11-19 20:05:00', 'Debit/Credit Card', 169, 'Pending'),
(245, 11, '2', 1, '2022-11-19 20:10:43', 'Cash on Delivery', 170, 'Pending'),
(246, 11, '2', 1, '2022-11-19 20:19:12', NULL, 171, NULL),
(247, 23, '2', 1, '2022-11-19 20:21:15', NULL, 172, NULL),
(248, 23, '2', 5, '2022-11-19 20:35:04', NULL, 173, NULL),
(249, 23, '2', 4, '2022-11-19 21:18:05', NULL, 174, NULL),
(250, 23, '3', 3, '2022-11-19 21:29:34', NULL, 175, NULL),
(251, 11, '1', 1, '2022-11-19 21:34:53', NULL, 176, NULL),
(252, 11, '1', 1, '2022-11-19 21:35:15', 'Cash on Delivery', 177, 'Pending'),
(253, 11, '3', 1, '2022-11-19 21:35:15', 'Cash on Delivery', 177, 'Pending'),
(254, 11, '1', 1, '2022-11-19 21:36:11', 'Cash on Delivery', 178, 'Pending'),
(255, 11, '3', 1, '2022-11-19 21:36:11', 'Cash on Delivery', 178, 'Pending'),
(256, 11, '1', 1, '2022-11-19 21:43:18', 'Cash on Delivery', 179, 'Pending'),
(257, 11, '3', 1, '2022-11-19 21:43:18', 'Cash on Delivery', 179, 'Pending'),
(258, 11, '1', 1, '2022-11-19 21:47:47', 'Cash on Delivery', 180, 'Pending'),
(259, 11, '3', 1, '2022-11-19 21:47:47', 'Cash on Delivery', 180, 'Pending'),
(260, 11, '1', 1, '2022-11-19 21:52:39', NULL, 181, NULL),
(261, 11, '1', 1, '2022-11-19 22:05:00', 'Cash on Delivery', 182, 'Pending'),
(262, 11, '1', 3, '2022-11-19 22:05:45', 'Cash on Delivery', 183, 'Pending'),
(263, 11, '3', 2, '2022-11-19 22:05:45', 'Cash on Delivery', 183, 'Pending'),
(264, 11, '1', 1, '2022-11-19 22:07:58', 'E-Wallet', 184, 'Pending'),
(265, 11, '3', 1, '2022-11-19 22:07:58', 'E-Wallet', 184, 'Pending'),
(266, 11, '1', 1, '2022-11-19 22:08:44', 'Debit/Credit Card', 185, 'Pending'),
(267, 11, '3', 1, '2022-11-19 22:08:44', 'Debit/Credit Card', 185, 'Pending'),
(268, 23, '1', 5, '2022-11-19 22:12:04', NULL, 186, NULL),
(269, 23, '1', 6, '2022-11-19 22:12:45', NULL, 187, NULL),
(270, 23, '1', 6, '2022-11-19 22:13:08', 'E-Wallet', 188, 'Pending'),
(271, 11, '3', 1, '2022-11-20 00:28:43', NULL, 189, NULL),
(272, 11, '3', 1, '2022-11-20 00:39:57', NULL, 190, NULL),
(273, 25, '5', 1, '2022-11-20 16:49:25', NULL, 191, NULL),
(274, 25, '5', 1, '2022-11-20 17:11:33', NULL, 192, NULL),
(275, 11, '1', 2, '2022-11-20 17:42:18', 'Debit/Credit Card', 193, 'Pending'),
(276, 11, '3', 3, '2022-11-20 17:42:18', 'Debit/Credit Card', 193, 'Pending'),
(277, 25, '5', 1, '2022-11-20 19:38:01', NULL, 194, NULL),
(278, 25, '5', 1, '2022-11-20 20:21:09', NULL, 195, NULL),
(279, 11, '1', 1, '2022-11-20 21:50:05', 'Cash on Delivery', 196, 'Out For Delivery'),
(280, 11, '3', 1, '2022-11-20 21:50:05', 'Cash on Delivery', 196, 'Out For Delivery'),
(281, 25, '3', 1, '2022-11-21 00:26:19', NULL, 197, NULL),
(282, 25, '6', 1, '2022-11-21 10:37:26', 'E-Wallet', 198, 'Out For Delivery'),
(283, 23, '1', 1, '2022-11-22 14:13:54', NULL, 199, NULL),
(284, 23, '1', 1, '2022-11-22 14:15:19', NULL, 200, NULL),
(285, 23, '1', 1, '2022-11-22 19:45:34', NULL, 201, NULL),
(286, 27, '1', 5, '2022-11-23 22:26:58', 'E-Wallet', 202, 'Pending'),
(287, 27, '1', 5, '2022-11-23 22:29:17', NULL, 203, NULL),
(289, 28, '5', 9, '2022-11-25 16:11:46', 'E-Wallet', 205, 'Pending'),
(290, 29, '1', 8, '2022-11-25 17:21:56', 'E-Wallet', 206, 'Pending'),
(291, 29, '48', 7, '2022-11-25 17:31:09', 'E-Wallet', 207, 'Pending'),
(292, 29, '48', 5, '2022-11-25 17:34:06', NULL, 208, NULL),
(293, 29, '1', 10, '2022-11-25 18:17:19', 'Cash on Delivery', 209, 'Pending'),
(294, 11, '1', 6, '2022-11-27 11:25:58', 'Cash on Delivery', 210, 'Pending'),
(295, 11, '1', 1, '2022-11-27 14:23:09', NULL, 211, NULL),
(296, 11, '1', 1, '2022-11-27 14:26:23', NULL, 212, NULL),
(297, 11, '1', 1, '2022-11-27 14:28:15', NULL, 213, NULL),
(298, 11, '7', 1, '2022-11-27 14:28:15', NULL, 213, NULL),
(299, 11, '1', 1, '2022-11-27 14:30:09', NULL, 214, NULL),
(300, 11, '7', 1, '2022-11-27 14:30:09', NULL, 214, NULL),
(301, 11, '1', 2, '2022-11-27 14:32:07', NULL, 215, NULL),
(302, 11, '7', 1, '2022-11-27 14:32:07', NULL, 215, NULL),
(303, 11, '1', 1, '2022-11-28 10:11:37', NULL, 216, NULL),
(304, 11, '1', 1, '2022-11-28 10:11:56', NULL, 217, NULL),
(305, 11, '6', 1, '2022-11-28 10:11:56', NULL, 217, NULL),
(306, 11, '1', 1, '2022-11-28 10:13:23', NULL, 218, NULL),
(307, 11, '6', 1, '2022-11-28 10:13:23', NULL, 218, NULL),
(308, 11, '1', 1, '2022-11-28 10:14:00', NULL, 219, NULL),
(309, 11, '6', 1, '2022-11-28 10:14:00', NULL, 219, NULL),
(310, 11, '1', 1, '2022-11-28 10:16:34', NULL, 220, NULL),
(311, 11, '1', 1, '2022-11-28 10:20:05', NULL, 221, NULL),
(312, 11, '6', 1, '2022-11-28 10:20:05', NULL, 221, NULL),
(313, 11, '1', 1, '2022-11-28 10:21:46', NULL, 222, NULL),
(314, 11, '6', 1, '2022-11-28 10:21:46', NULL, 222, NULL),
(315, 11, '1', 1, '2022-11-28 10:22:01', NULL, 223, NULL),
(316, 11, '6', 1, '2022-11-28 10:22:01', NULL, 223, NULL),
(317, 11, '1', 1, '2022-11-28 10:23:43', NULL, 224, NULL),
(318, 11, '1', 1, '2022-11-28 10:24:15', NULL, 225, NULL),
(319, 11, '1', 1, '2022-11-28 10:24:39', NULL, 226, NULL),
(320, 11, '6', 1, '2022-11-28 10:24:39', NULL, 226, NULL),
(321, 11, '1', 1, '2022-11-28 10:27:06', NULL, 227, NULL),
(322, 11, '6', 1, '2022-11-28 10:27:06', NULL, 227, NULL),
(323, 11, '1', 1, '2022-11-28 10:27:12', NULL, 228, NULL),
(324, 11, '1', 1, '2022-11-28 10:27:29', NULL, 229, NULL),
(325, 11, '7', 1, '2022-11-28 10:27:29', NULL, 229, NULL),
(326, 11, '1', 1, '2022-11-28 10:43:08', NULL, 230, NULL),
(327, 11, '1', 1, '2022-11-28 10:43:20', NULL, 231, NULL),
(328, 11, '6', 1, '2022-11-28 10:43:20', NULL, 231, NULL),
(329, 11, '1', 1, '2022-11-28 10:43:43', 'Cash on Delivery', 232, 'Pending'),
(330, 11, '6', 1, '2022-11-28 10:43:43', 'Cash on Delivery', 232, 'Pending'),
(331, 11, '1', 1, '2022-11-28 12:18:22', NULL, 233, NULL),
(332, 11, '1', 1, '2022-11-28 12:23:39', NULL, 234, NULL),
(333, 11, '1', 1, '2022-11-28 12:27:27', NULL, 235, NULL),
(334, 11, '6', 1, '2022-11-28 12:27:27', NULL, 235, NULL),
(335, 23, '1', 1, '2022-12-04 08:26:36', NULL, 236, NULL),
(336, 23, '1', 1, '2022-12-04 09:28:18', NULL, 237, NULL),
(337, 23, '1', 1, '2022-12-04 09:37:28', NULL, 238, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_header`
--

CREATE TABLE `order_header` (
  `transactionId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `referenceNo` varchar(100) DEFAULT NULL,
  `rNoImg` varchar(255) DEFAULT NULL,
  `grandTotal` double NOT NULL,
  `dateCreated` timestamp NULL DEFAULT current_timestamp(),
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_header`
--

INSERT INTO `order_header` (`transactionId`, `userId`, `referenceNo`, `rNoImg`, `grandTotal`, `dateCreated`, `remark`) VALUES
(22, 4, '122214', '', 0, '2022-11-07 15:59:20', 'Paid'),
(23, 4, '124463', '', 0, '2022-11-07 16:00:21', 'Pending Payment'),
(25, 4, NULL, '', 0, '2022-11-08 13:08:27', ''),
(26, 4, NULL, '', 0, '2022-11-08 13:09:23', ''),
(27, 4, 'cod', '', 0, '2022-11-08 13:24:12', ''),
(28, 4, NULL, '', 0, '2022-11-08 13:38:13', ''),
(29, 4, NULL, '', 0, '2022-11-08 13:40:50', ''),
(30, 4, NULL, '', 0, '2022-11-08 13:41:41', ''),
(31, 4, NULL, '', 0, '2022-11-08 13:42:51', ''),
(32, 4, NULL, '', 0, '2022-11-08 13:44:52', ''),
(33, 4, '1111', '', 0, '2022-11-08 13:49:30', ''),
(34, 4, '11231', '', 0, '2022-11-08 13:51:50', ''),
(35, 4, NULL, '', 0, '2022-11-08 13:52:24', ''),
(36, 4, NULL, '', 0, '2022-11-08 13:56:56', ''),
(37, 4, '123123123', '', 0, '2022-11-08 14:02:56', ''),
(38, 4, '1112314', '', 0, '2022-11-08 14:07:27', ''),
(39, 4, NULL, '', 0, '2022-11-08 14:13:12', ''),
(40, 4, NULL, '', 0, '2022-11-08 14:13:45', ''),
(41, 4, NULL, '', 0, '2022-11-08 14:14:40', ''),
(42, 4, NULL, '', 0, '2022-11-08 14:15:11', ''),
(43, 4, NULL, '', 0, '2022-11-08 14:18:26', ''),
(44, 4, NULL, '', 0, '2022-11-08 14:20:56', ''),
(45, 4, NULL, '', 0, '2022-11-08 14:22:15', ''),
(46, 4, NULL, '', 0, '2022-11-08 14:23:32', ''),
(47, 4, NULL, '', 0, '2022-11-08 14:26:25', ''),
(48, 4, '551', '', 0, '2022-11-08 14:27:14', ''),
(49, 4, NULL, '', 0, '2022-11-10 04:40:11', ''),
(50, 4, '441', '', 21.5, '2022-11-10 04:50:12', ''),
(51, 4, '123111', '', 42, '2022-11-10 08:59:27', ''),
(52, 4, NULL, '', 7, '2022-11-10 09:04:09', ''),
(53, 4, 'cod# ', '', 10, '2022-11-10 09:05:35', ''),
(54, 4, 'cod# 54', '', 7, '2022-11-10 09:08:37', ''),
(55, 4, 'COD #55', '', 15, '2022-11-10 09:09:30', ''),
(56, 4, NULL, '', 7, '2022-11-10 09:14:28', ''),
(57, 4, 'COD #57', '', 56, '2022-11-10 09:15:25', ''),
(58, 4, 'COD #58', '', 28, '2022-11-10 09:16:02', ''),
(59, 4, 'COD #59', '', 7, '2022-11-10 14:07:41', ''),
(60, 4, NULL, '', 7, '2022-11-10 14:43:41', ''),
(61, 4, NULL, '', 7, '2022-11-11 03:39:34', ''),
(62, 4, NULL, '', 7, '2022-11-11 04:25:00', ''),
(63, 4, NULL, '', 7, '2022-11-11 06:00:23', ''),
(64, 4, NULL, '', 14, '2022-11-11 06:00:47', ''),
(65, 4, NULL, '', 7, '2022-11-11 06:23:48', ''),
(66, 4, NULL, '', 7, '2022-11-11 06:59:13', ''),
(67, 4, 'COD #67', '', 7, '2022-11-11 07:58:17', ''),
(68, 9, 'COD #68', '', 7, '2022-11-11 08:17:26', ''),
(69, 4, NULL, '', 7, '2022-11-11 08:41:00', ''),
(70, 4, '009127', '310341361_806017040472138_7536287173506276695_n.png', 7, '2022-11-11 08:45:01', ''),
(71, 4, '12311123', 'aaaa.png', 7, '2022-11-11 09:27:07', ''),
(72, 4, NULL, '', 7, '2022-11-11 09:33:21', ''),
(73, 4, NULL, '', 7, '2022-11-11 10:15:04', ''),
(74, 9, NULL, '', 35, '2022-11-11 12:25:48', ''),
(75, 9, 'COD #75', '', 35, '2022-11-11 12:31:12', ''),
(76, 4, '123123123123', '296598847_445530957487340_8010882319870468124_n.jpg', 7, '2022-11-12 05:44:40', ''),
(77, 4, 'Credit/Debit #77', '', 7, '2022-11-12 06:07:23', ''),
(78, 4, '123123123123123', 'phone ame horni.png', 7, '2022-11-12 06:10:55', ''),
(79, 4, 'COD #79', '', 7, '2022-11-12 06:13:32', ''),
(80, 4, 'COD #80', '', 7, '2022-11-12 06:34:12', ''),
(81, 4, NULL, '', 7, '2022-11-12 06:34:29', ''),
(82, 4, 'COD #82', '', 7, '2022-11-12 06:37:56', ''),
(83, 4, 'Credit/Debit #83', '', 7, '2022-11-12 06:38:34', ''),
(84, 4, '1231231231231231', 'Okada1.png', 7, '2022-11-12 06:41:36', ''),
(85, 4, '123123123111', 'interlude_autumn2.png', 7, '2022-11-12 06:55:43', 'Pending Payment'),
(86, 4, 'COD #86', '', 7, '2022-11-12 06:57:33', 'Pending Payment'),
(87, 4, 'Credit/Debit #87', '', 7, '2022-11-12 06:59:19', 'Pending Payment'),
(88, 4, 'COD #88', '', 7, '2022-11-12 13:01:13', 'Pending Payment'),
(89, 4, NULL, '', 7, '2022-11-12 13:48:10', ''),
(90, 9, '213213123', 'phone ame horni.png', 7, '2022-11-12 14:33:40', 'Pending Payment'),
(91, 10, '6006670620475', '312999298_1331958217208950_8768253310041577277_n.jpg', 21, '2022-11-12 15:06:49', 'Paid'),
(92, 0, NULL, '', 7, '2022-11-12 15:52:39', ''),
(93, 0, NULL, '', 7, '2022-11-12 15:56:09', ''),
(94, 10, 'COD #94', '', 7, '2022-11-12 15:56:49', 'Pending Payment'),
(95, 0, NULL, '', 7, '2022-11-12 16:35:41', ''),
(96, 4, 'Credit/Debit #96', '', 7, '2022-11-12 16:44:33', 'Pending Payment'),
(97, 4, 'Credit/Debit #97', '', 7, '2022-11-12 18:00:15', 'Pending Payment'),
(98, 4, 'Credit/Debit #98', '', 7, '2022-11-12 18:02:11', 'Pending Payment'),
(99, 4, 'Credit/Debit #99', '', 7, '2022-11-12 18:05:06', 'Pending Payment'),
(100, 4, 'Credit/Debit #100', '', 7, '2022-11-12 18:06:08', 'Pending Payment'),
(101, 4, 'Credit/Debit #101', '', 7, '2022-11-12 18:07:00', 'Pending Payment'),
(102, 4, 'Credit/Debit #102', '', 7, '2022-11-12 18:07:39', 'Pending Payment'),
(103, 4, 'Credit/Debit #103', '', 10, '2022-11-12 18:12:41', 'Pending Payment'),
(104, 4, 'Credit/Debit #104', '', 10, '2022-11-12 18:13:34', 'Pending Payment'),
(105, 4, 'Credit/Debit #105', '', 7, '2022-11-12 18:18:16', 'Pending Payment'),
(106, 4, 'Credit/Debit #106', '', 7, '2022-11-12 18:25:39', 'Pending Payment'),
(107, 4, 'Credit/Debit #107', '', 7, '2022-11-12 18:27:48', 'Pending Payment'),
(108, 4, 'Credit/Debit #108', '', 7, '2022-11-12 18:28:53', 'Pending Payment'),
(109, 4, 'Credit/Debit #109', '', 10, '2022-11-12 18:32:38', 'Pending Payment'),
(110, 4, '2323232', '2248065.png', 10, '2022-11-13 10:16:07', 'Pending Payment'),
(111, 12, '123341312313213', '6a083282fd50bfb72378b1c91df887f2.jpg', 60, '2022-11-13 10:18:43', 'Pending Payment'),
(112, 11, '123125441', '285016027_7773225172695254_5815094373508096159_n.jpg', 7, '2022-11-13 10:26:45', 'Pending Payment'),
(113, 4, 'COD #113', NULL, 87, '2022-11-13 10:40:36', 'Pending Payment'),
(114, 13, NULL, NULL, 7, '2022-11-13 10:53:29', NULL),
(115, 14, 'COD #115', NULL, 74, '2022-11-13 12:04:08', 'Pending Payment'),
(116, 14, '131231123', 'RobloxScreenShot20220325_112128810.png', 20, '2022-11-13 12:06:43', 'Pending Payment'),
(117, 11, NULL, NULL, 17, '2022-11-13 13:31:42', NULL),
(118, 4, 'COD #118', NULL, 212, '2022-11-13 15:31:48', 'Pending Payment'),
(119, 4, '123', 'Screenshot_20221030_033452.png', 7, '2022-11-13 15:34:16', 'Pending Payment'),
(120, 4, 'Credit/Debit #120', NULL, 7, '2022-11-13 15:34:49', 'Pending Payment'),
(121, 17, 'Test1234', 'Bojji Icons.jpeg', 29, '2022-11-13 23:59:34', 'Pending Payment'),
(122, 18, NULL, NULL, 20, '2022-11-14 15:12:01', NULL),
(123, 18, 'Credit/Debit #123', NULL, 160, '2022-11-14 15:12:21', 'Pending Payment'),
(124, 18, NULL, NULL, 14, '2022-11-16 11:44:17', NULL),
(125, 18, NULL, NULL, 14, '2022-11-16 11:47:52', NULL),
(126, 18, 'Credit/Debit #126', NULL, 14, '2022-11-16 11:50:46', 'Pending Payment'),
(127, 19, '213213', 'meal.png', 7, '2022-11-16 14:00:37', 'Paid'),
(128, 19, '12312', 'sched.png', 50, '2022-11-16 14:10:45', 'Paid'),
(129, 19, '1232', '2202_w032_n003_377b_p1_377.jpg', 50, '2022-11-16 14:57:52', 'Paid'),
(130, 11, 'COD #130', NULL, 35, '2022-11-16 15:51:04', 'Paid'),
(131, 11, 'COD #131', NULL, 42, '2022-11-16 15:54:22', 'Paid'),
(132, 12, NULL, NULL, 0, '2022-11-16 16:01:12', NULL),
(133, 11, NULL, NULL, 0, '2022-11-16 16:04:30', NULL),
(135, 20, NULL, NULL, 7, '2022-11-16 16:08:47', NULL),
(136, 20, 'COD #136', NULL, 7, '2022-11-16 16:58:52', 'Pending Payment'),
(137, 21, '98329101', 'Screenshot (6).png', 42, '2022-11-17 01:22:22', 'Pending Payment'),
(138, 21, NULL, NULL, 0, '2022-11-17 01:23:55', NULL),
(139, 21, NULL, NULL, 91, '2022-11-17 01:28:01', NULL),
(140, 21, NULL, NULL, 91, '2022-11-17 01:38:23', NULL),
(141, 21, '873429847923', 'Screenshot (7).png', 35, '2022-11-17 01:42:31', 'Pending Payment'),
(142, 21, '124252', 'Screenshot (8).png', 68, '2022-11-17 01:44:17', 'Pending Payment'),
(143, 21, NULL, NULL, 7, '2022-11-17 01:46:41', NULL),
(144, 22, NULL, NULL, 21, '2022-11-18 07:51:36', NULL),
(145, 22, NULL, NULL, 21, '2022-11-18 07:51:56', NULL),
(146, 22, NULL, NULL, 28, '2022-11-18 07:52:58', NULL),
(148, 11, NULL, NULL, 7, '2022-11-18 08:34:04', NULL),
(149, 22, NULL, NULL, 75, '2022-11-18 08:44:02', NULL),
(150, 22, '321231', 'alaska_evaporated.png', 82, '2022-11-18 09:00:09', 'Paid'),
(151, 22, '22244', 'cowbell_evaporada.jpeg', 7, '2022-11-18 09:07:03', 'Pending Payment'),
(152, 11, 'COD #152', NULL, 7, '2022-11-18 13:32:48', 'Pending Payment'),
(153, 11, 'COD #153', NULL, 7, '2022-11-18 13:59:07', 'Pending Payment'),
(154, 11, 'COD #154', NULL, 7, '2022-11-18 22:08:59', 'Pending Payment'),
(155, 11, 'COD #155', NULL, 7, '2022-11-18 22:11:07', 'Pending Payment'),
(156, 23, '123', 'Screenshot_20221023_101228.png', 7, '2022-11-18 22:29:58', 'Paid'),
(157, 25, '121213', 'Screenshot (7).png', 0, '2022-11-19 10:44:37', 'Paid'),
(158, 25, NULL, NULL, 7, '2022-11-19 11:11:36', NULL),
(159, 25, NULL, NULL, 7, '2022-11-19 11:12:25', NULL),
(160, 25, NULL, NULL, 0, '2022-11-19 11:21:18', NULL),
(161, 25, NULL, NULL, 0, '2022-11-19 11:21:48', NULL),
(162, 25, NULL, NULL, 0, '2022-11-19 11:24:13', NULL),
(163, 25, NULL, NULL, 0, '2022-11-19 11:25:51', NULL),
(164, 25, NULL, NULL, 0, '2022-11-19 11:26:55', NULL),
(165, 11, NULL, NULL, 0, '2022-11-19 11:27:27', NULL),
(166, 11, 'COD #166', NULL, 10, '2022-11-19 11:29:45', 'Pending Payment'),
(167, 11, 'COD #167', NULL, 49, '2022-11-19 11:30:01', 'Pending Payment'),
(168, 23, 'Credit/Debit #168', NULL, 14, '2022-11-19 19:56:07', 'Pending Payment'),
(169, 11, 'Credit/Debit #169', NULL, 35, '2022-11-19 20:05:00', 'Pending Payment'),
(170, 11, 'COD #170', NULL, 7, '2022-11-19 20:10:43', 'Pending Payment'),
(171, 11, NULL, NULL, 0, '2022-11-19 20:19:12', NULL),
(172, 23, NULL, NULL, 7, '2022-11-19 20:21:15', NULL),
(173, 23, NULL, NULL, 0, '2022-11-19 20:35:04', NULL),
(174, 23, NULL, NULL, 0, '2022-11-19 21:18:05', NULL),
(175, 23, NULL, NULL, 30, '2022-11-19 21:29:34', NULL),
(176, 11, NULL, NULL, 0, '2022-11-19 21:34:53', NULL),
(177, 11, 'COD #177', NULL, 10, '2022-11-19 21:35:15', 'Pending Payment'),
(178, 11, 'COD #178', NULL, 10, '2022-11-19 21:36:11', 'Pending Payment'),
(179, 11, 'COD #179', NULL, 10, '2022-11-19 21:43:18', 'Pending Payment'),
(180, 11, 'COD #180', NULL, 10, '2022-11-19 21:47:47', 'Pending Payment'),
(181, 11, NULL, NULL, 0, '2022-11-19 21:52:39', NULL),
(182, 11, 'COD #182', NULL, 7, '2022-11-19 22:05:00', 'Pending Payment'),
(183, 11, 'COD #183', NULL, 20, '2022-11-19 22:05:45', 'Pending Payment'),
(184, 11, '12312313', 'pic1.jpg', 10, '2022-11-19 22:07:58', 'Pending Payment'),
(185, 11, 'Credit/Debit #185', NULL, 10, '2022-11-19 22:08:44', 'Pending Payment'),
(186, 23, NULL, NULL, 35, '2022-11-19 22:12:04', NULL),
(187, 23, NULL, NULL, 42, '2022-11-19 22:12:45', NULL),
(188, 23, '123', 'Screenshot_20221025_100718.png', 42, '2022-11-19 22:13:08', 'Pending Payment'),
(189, 11, NULL, NULL, 10, '2022-11-20 00:28:43', NULL),
(190, 11, NULL, NULL, 10, '2022-11-20 00:39:57', NULL),
(191, 25, NULL, NULL, 7, '2022-11-20 16:49:25', NULL),
(192, 25, NULL, NULL, 7, '2022-11-20 17:11:33', NULL),
(193, 11, 'Credit/Debit #193', NULL, 30, '2022-11-20 17:42:18', 'Paid'),
(194, 25, NULL, NULL, 7, '2022-11-20 19:38:01', NULL),
(195, 25, NULL, NULL, 7, '2022-11-20 20:21:09', NULL),
(196, 11, 'COD #196', NULL, 10, '2022-11-20 21:50:05', 'Paid'),
(197, 25, NULL, NULL, 10, '2022-11-21 00:26:19', NULL),
(198, 25, '15555898', 'Screenshot (9).png', 44, '2022-11-21 10:37:26', 'Pending Payment'),
(199, 23, NULL, NULL, 7, '2022-11-22 14:13:54', NULL),
(200, 23, NULL, NULL, 7, '2022-11-22 14:15:19', NULL),
(201, 23, NULL, NULL, 7, '2022-11-22 19:45:34', NULL),
(202, 27, '123', 'Screenshot_20221023_101228.png', 35, '2022-11-23 22:26:58', 'Paid'),
(203, 27, NULL, NULL, 0, '2022-11-23 22:29:17', NULL),
(205, 28, '123', 'cannot.png', 63, '2022-11-25 16:11:46', 'Pending Payment'),
(206, 29, '123', 'Screenshot (9).png', 56, '2022-11-25 17:21:56', 'Pending Payment'),
(207, 29, '1234', 'Screenshot (9).png', 420, '2022-11-25 17:31:09', 'Pending Payment'),
(208, 29, NULL, NULL, 0, '2022-11-25 17:34:06', NULL),
(209, 29, 'COD #209', NULL, 70, '2022-11-25 18:17:19', 'Pending Payment'),
(210, 11, 'COD #210', NULL, 42, '2022-11-27 11:25:58', 'Pending Payment'),
(211, 11, NULL, NULL, 0, '2022-11-27 14:23:09', NULL),
(212, 11, NULL, NULL, 7, '2022-11-27 14:26:23', NULL),
(213, 11, NULL, NULL, 15, '2022-11-27 14:28:15', NULL),
(214, 11, NULL, NULL, 135, '2022-11-27 14:30:09', NULL),
(215, 11, NULL, NULL, 142, '2022-11-27 14:32:07', NULL),
(216, 11, NULL, NULL, 67, '2022-11-28 10:11:37', NULL),
(217, 11, NULL, NULL, 136, '2022-11-28 10:11:56', NULL),
(218, 11, NULL, NULL, 76, '2022-11-28 10:13:23', NULL),
(219, 11, NULL, NULL, 76, '2022-11-28 10:14:00', NULL),
(220, 11, NULL, NULL, 7, '2022-11-28 10:16:34', NULL),
(221, 11, NULL, NULL, 16, '2022-11-28 10:20:05', NULL),
(222, 11, NULL, NULL, 16, '2022-11-28 10:21:46', NULL),
(223, 11, NULL, NULL, 16, '2022-11-28 10:22:01', NULL),
(224, 11, NULL, NULL, 7, '2022-11-28 10:23:43', NULL),
(225, 11, NULL, NULL, 7, '2022-11-28 10:24:15', NULL),
(226, 11, NULL, NULL, 16, '2022-11-28 10:24:39', NULL),
(227, 11, NULL, NULL, 16, '2022-11-28 10:27:06', NULL),
(228, 11, NULL, NULL, 7, '2022-11-28 10:27:12', NULL),
(229, 11, NULL, NULL, 15, '2022-11-28 10:27:29', NULL),
(230, 11, NULL, NULL, 7, '2022-11-28 10:43:08', NULL),
(231, 11, NULL, NULL, 16, '2022-11-28 10:43:20', NULL),
(232, 11, 'COD #232', NULL, 76, '2022-11-28 10:43:43', 'Pending Payment'),
(233, 11, NULL, NULL, 0, '2022-11-28 12:18:22', NULL),
(234, 11, NULL, NULL, 0, '2022-11-28 12:23:39', NULL),
(235, 11, NULL, NULL, 16, '2022-11-28 12:27:27', NULL),
(236, 23, NULL, NULL, 7, '2022-12-04 08:26:36', NULL),
(237, 23, NULL, NULL, 7, '2022-12-04 09:28:18', NULL),
(238, 23, NULL, NULL, 7, '2022-12-04 09:37:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productCode` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `genName` varchar(200) NOT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `oPrice` int(11) NOT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `profit` int(11) NOT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `productAvailability` int(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `expDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productCode`, `category`, `productName`, `genName`, `productCompany`, `oPrice`, `productPrice`, `profit`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `productAvailability`, `postingDate`, `updationDate`, `expDate`) VALUES
(1, '4800092113363', 4, 'Bear Brand Swak', 'Bear Brand', 'Bear Brand', 5, 7, 0, 0, '', 'BearBrand.jpeg', 'BearBrand.jpeg', 'BearBrand.jpeg', 124, '2017-01-30 16:54:35', '', NULL),
(4, '1312313131', 4, 'Oreo  ', 'Oreo', 'Oreo', 5, 15, 0, 17, '', 'oreo 2.png', 'oreo 3.png', 'oreo.png', 0, '2017-02-04 04:04:43', '', NULL),
(5, '4800092113345', 4, 'Fita ', 'Fita', 'Rebisco', 5, 7, 0, 0, '', 'fitabisc.png', 'lenovo-k5-note-pa330116in-2.jpeg', 'lenovo-k5-note-pa330116in-3.jpeg', 0, '2017-02-04 04:06:17', '', NULL),
(6, '4800092113334', 4, 'Hansel', 'Hansel', 'Hansel', 5, 9, 0, 0, '', 'hanselbisc.jpg', 'micromax-canvas-mega-4g-2.jpeg', 'micromax-canvas-mega-4g-3.jpeg', 247, '2017-02-04 04:08:07', '', NULL),
(7, '4800092113338', 4, 'Rebisco  ', 'Rebisco', 'Rebisco', 5, 8, 3, 0, '', 'magicflakesbisc.png', 'samsung-galaxy-on5-sm-2.jpeg', 'samsung-galaxy-on5-sm-3.jpeg', 45, '2017-02-04 04:10:17', '', NULL),
(30, '4800361415293', 5, ' Milo Twin Pack ', 'Milo', NULL, 5, 10, 5, NULL, NULL, 'mil twin pack 2.png', 'mil twin pack 3.png', 'mil twin pack.png', 14, '2022-11-11 14:48:22', NULL, NULL),
(31, '4800575144491', 5, ' Alaska Evaporada Sulit Litro Pack', 'Evaporada', NULL, 40, 50, 10, NULL, NULL, 'alaska 2.png', 'alaska 3.png', 'alaska.png', 150, '2022-11-11 14:54:27', NULL, NULL),
(34, '4800092113277', 4, 'Rebisco Strawberry', 'Rebisco Strawberry', NULL, 5, 10, 5, 20, NULL, 'rebisco-sandwich-strawberry 2.jpg', 'rebisco-sandwich-strawberry 3.jpg', 'rebisco-sandwich-strawberry.jpg', 870, '2022-11-13 08:27:21', NULL, NULL),
(44, '4800016112140', 4, 'Overload                             ', 'Overload', NULL, 5, 15, 10, 15, NULL, 'IMG_9486-700x700_0.jpg', 'QUAKE_OVERLOAD_CHOCO_STRAWBERRY__30GX10_.jpg', '5b7b8be3ca2c493104fb4a9338a71aea_large.png', 155, '2022-11-19 10:52:04', NULL, NULL),
(48, '9780123456786', 4, 'Marie ', 'Marie', NULL, 55, 60, 5, 50, NULL, 'rebisco-marie-time 2.jpg', 'rebisco-marie-time 3.jpg', 'rebisco-marie-time.jpg', 81, '2022-11-25 13:58:30', NULL, NULL),
(49, '0293647028392', 6, ' Emperador Lights 1L', 'Emperador Lights', NULL, 120, 141, 21, 150, NULL, 'empelight_750ml - Copy (2).png', 'empelight_750ml - Copy.png', 'empelight_750ml.png', 100, '2022-11-25 14:13:15', NULL, NULL),
(50, '4800049721142', 6, ' 7/11 Bottled Water  ', 'Bottled Water', NULL, 5, 10, 5, 15, NULL, '7-Eleven-7-Select-alkaline-water.jpg', 'Langdon_WebAssets_7E_Water_1.png', 'water-bottle-bcfedf5e71a4c2cc.jpg', 1000, '2022-11-25 17:38:17', NULL, '2022-12-29'),
(52, '1', 3, ' test ', 'test', NULL, 2, 12, 10, 12, NULL, NULL, NULL, NULL, 1000, '2022-12-27 04:18:04', NULL, '2022-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `mop` varchar(45) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `po_status` varchar(45) DEFAULT NULL,
  `total_amount` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `delivery_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `supplier_name`, `mop`, `date_created`, `po_status`, `total_amount`, `user_id`, `delivery_date`) VALUES
(25, 'Test', 'Cash', '2022-11-12 12:22:02', 'Pending', '128', NULL, '2022-11-12'),
(27, 'online test', 'Gcash', '2022-11-13 11:01:08', 'Pending', '15', NULL, '2022-11-13'),
(30, 'online test', 'Paymaya', '2022-11-13 11:10:29', 'Pending', '10', NULL, '2022-11-13'),
(31, 'online test', 'Cash', '2022-11-13 11:12:24', 'Pending', '5', NULL, '2022-11-13'),
(32, 'online test', 'Cash', '2022-11-13 11:12:55', 'Pending', '5', NULL, '2022-11-13'),
(33, 'online test1', 'Gcash', '2022-11-13 11:16:21', 'Pending', '97', NULL, '2022-11-13'),
(34, 'online test2', 'Paymaya', '2022-11-13 11:17:04', 'Pending', '5', NULL, '2022-11-13'),
(35, 'testing po', 'Cash', '2022-11-13 13:15:45', 'Pending', '12', NULL, '2022-06-29'),
(36, NULL, NULL, '2022-11-13 13:15:57', 'Pending', '0', NULL, NULL),
(37, 'test', 'Paymaya', '2022-11-13 13:16:51', 'Pending', '10', NULL, '2022-09-09'),
(38, 'test', 'Paymaya', '2022-11-13 13:17:44', 'Pending', '10', NULL, '2022-09-09'),
(39, NULL, NULL, '2022-11-13 13:18:20', 'Pending', '0', NULL, NULL),
(40, 'test', 'Paymaya', '2022-11-13 13:22:17', 'Pending', '10', NULL, '2022-09-09'),
(41, 'test', 'Paymaya', '2022-11-13 13:29:44', 'Pending', '10', NULL, '2022-09-09'),
(42, 'test 1', 'Gcash', '2022-11-13 13:30:15', 'Pending', '10', NULL, '2022-01-01'),
(43, NULL, NULL, '2022-11-13 13:30:42', 'Pending', '0', NULL, NULL),
(45, 'test 2', 'Gcash', '2022-11-13 13:32:07', 'Pending', '30', NULL, '2022-01-01'),
(46, '1231231231', 'Gcash', '2022-11-13 14:20:48', 'Pending', '50', 30, '2022-02-02'),
(47, 'bago to', 'Cash', '2022-11-13 14:27:20', 'Pending', '260', 30, '2022-01-01'),
(48, 'Sample supplier', 'Gcash', '2022-11-13 14:31:07', 'Pending', '5', 30, '2022-01-01'),
(49, 'ulit', 'Paymaya', '2022-11-13 14:56:15', 'Pending', '300', 30, '2022-02-02'),
(50, 'testsssssssssssss', 'Paymaya', '2022-11-13 14:59:40', 'Pending', '0', 30, '2022-01-01'),
(51, 'testsssssssssssss', 'Paymaya', '2022-11-13 14:59:43', 'Pending', '0', 30, '2022-01-01'),
(52, 'test ulit', 'Cash', '2022-11-13 15:16:35', 'Pending', '250', 30, '2022-01-10'),
(53, 'test ulit', 'Cash', '2022-11-13 15:17:42', 'Pending', '250', 30, '2022-01-10'),
(54, 'test ulitasda', 'Gcash', '2022-11-13 15:19:02', 'Pending', '0', 30, '2022-01-01'),
(55, 'test ulitasda', 'Gcash', '2022-11-13 15:23:04', 'Pending', '0', 30, '2022-01-01'),
(56, 'Last sss', 'Gcash', '2022-11-13 15:24:09', 'Pending', '550', 30, '2022-01-01'),
(57, 'last uliy', 'Cash', '2022-11-13 15:25:42', 'Pending', '10', 30, '2022-01-01'),
(59, 'lyodsupplier', 'Cash', '2022-11-18 09:52:17', 'Pending', '250', 30, '2022-11-18'),
(60, 'lyodsupplier', 'Gcash', '2022-11-18 22:31:50', 'Pending', '8', 30, '2022-11-18'),
(61, 'lyodsupplier', 'Cash', '2022-11-18 22:33:16', 'Pending', '32', 30, '2022-11-19'),
(62, 'SupplierOne', 'Cash', '2022-11-19 10:56:36', 'Pending', '1710', 30, '2022-11-30'),
(63, 'SupplierOne', 'Cash', '2022-11-23 22:39:45', 'Received', '215', 30, '2022-11-26'),
(64, 'bry', 'Cash', '2022-11-25 16:19:53', 'Pending', '510', 30, '2022-11-26'),
(66, 'lyodsupplier', 'Cash', '2022-12-08 06:21:06', 'Pending', '5', 30, '2022-12-16'),
(67, 'lyodsupplier', 'Gcash', '2022-12-08 07:30:58', 'Pending', '15', 30, '2022-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_items`
--

INSERT INTO `purchase_order_items` (`id`, `purchase_order_id`, `product_id`, `quantity`, `date_created`) VALUES
(125, 25, 32, 1, '2022-11-12 12:22:02'),
(126, 25, 31, 1, '2022-11-12 12:22:02'),
(127, 25, 30, 1, '2022-11-12 12:22:02'),
(128, 25, 7, 1, '2022-11-12 12:22:02'),
(129, 25, 6, 1, '2022-11-12 12:22:02'),
(130, 25, 5, 1, '2022-11-12 12:22:02'),
(131, 25, 4, 1, '2022-11-12 12:22:02'),
(132, 25, 3, 1, '2022-11-12 12:22:02'),
(133, 25, 2, 1, '2022-11-12 12:22:02'),
(134, 25, 1, 1, '2022-11-12 12:22:02'),
(146, 27, 34, 3, '2022-11-13 11:01:08'),
(149, 30, 34, 1, '2022-11-13 11:10:29'),
(150, 30, 33, 1, '2022-11-13 11:10:29'),
(151, 31, 34, 1, '2022-11-13 11:12:24'),
(152, 32, 34, 1, '2022-11-13 11:12:55'),
(153, 33, 34, 1, '2022-11-13 11:16:21'),
(154, 33, 33, 1, '2022-11-13 11:16:21'),
(155, 33, 32, 1, '2022-11-13 11:16:21'),
(156, 33, 31, 1, '2022-11-13 11:16:21'),
(157, 33, 30, 1, '2022-11-13 11:16:21'),
(158, 33, 7, 1, '2022-11-13 11:16:21'),
(159, 33, 6, 1, '2022-11-13 11:16:21'),
(160, 33, 5, 1, '2022-11-13 11:16:21'),
(161, 33, 4, 1, '2022-11-13 11:16:21'),
(162, 33, 3, 1, '2022-11-13 11:16:21'),
(163, 33, 2, 1, '2022-11-13 11:16:21'),
(164, 33, 1, 1, '2022-11-13 11:16:21'),
(165, 34, 34, 1, '2022-11-13 11:17:04'),
(166, 35, 34, 1, '2022-11-13 13:15:45'),
(167, 35, 33, 1, '2022-11-13 13:15:45'),
(168, 35, 32, 1, '2022-11-13 13:15:45'),
(169, 37, 34, 1, '2022-11-13 13:16:51'),
(170, 37, 33, 1, '2022-11-13 13:16:51'),
(171, 38, 34, 1, '2022-11-13 13:17:44'),
(172, 38, 33, 1, '2022-11-13 13:17:44'),
(173, 40, 34, 1, '2022-11-13 13:22:17'),
(174, 40, 33, 1, '2022-11-13 13:22:17'),
(175, 41, 34, 1, '2022-11-13 13:29:44'),
(176, 41, 33, 1, '2022-11-13 13:29:44'),
(177, 42, 34, 1, '2022-11-13 13:30:15'),
(178, 42, 33, 1, '2022-11-13 13:30:15'),
(179, 45, 34, 1, '2022-11-13 13:32:07'),
(180, 45, 33, 5, '2022-11-13 13:32:07'),
(181, 46, 34, 5, '2022-11-13 14:20:48'),
(182, 46, 33, 5, '2022-11-13 14:20:48'),
(183, 47, 34, 5, '2022-11-13 14:27:20'),
(184, 47, 33, 5, '2022-11-13 14:27:20'),
(185, 47, 32, 5, '2022-11-13 14:27:20'),
(186, 47, 31, 5, '2022-11-13 14:27:20'),
(187, 48, 34, 1, '2022-11-13 14:31:07'),
(188, 49, 34, 5, '2022-11-13 14:56:15'),
(189, 49, 33, 5, '2022-11-13 14:56:15'),
(190, 52, 34, 5, '2022-11-13 15:16:35'),
(191, 52, 33, 5, '2022-11-13 15:16:35'),
(192, 53, 34, 5, '2022-11-13 15:17:42'),
(193, 53, 33, 5, '2022-11-13 15:17:42'),
(194, 54, 34, 5, '2022-11-13 15:19:02'),
(195, 54, 33, 5, '2022-11-13 15:19:02'),
(196, 55, 34, 5, '2022-11-13 15:23:04'),
(197, 55, 33, 5, '2022-11-13 15:23:04'),
(198, 55, 32, 0, '2022-11-13 15:23:04'),
(199, 55, 31, 5, '2022-11-13 15:23:04'),
(200, 55, 30, 0, '2022-11-13 15:23:04'),
(201, 55, 7, 0, '2022-11-13 15:23:04'),
(202, 55, 6, 0, '2022-11-13 15:23:04'),
(203, 55, 5, 0, '2022-11-13 15:23:04'),
(204, 55, 4, 0, '2022-11-13 15:23:04'),
(205, 55, 3, 0, '2022-11-13 15:23:04'),
(206, 55, 2, 0, '2022-11-13 15:23:04'),
(207, 55, 1, 0, '2022-11-13 15:23:04'),
(208, 56, 34, 10, '2022-11-13 15:24:09'),
(209, 56, 33, 0, '2022-11-13 15:24:09'),
(210, 56, 32, 0, '2022-11-13 15:24:09'),
(211, 56, 31, 10, '2022-11-13 15:24:09'),
(212, 56, 30, 0, '2022-11-13 15:24:09'),
(213, 56, 7, 0, '2022-11-13 15:24:09'),
(214, 56, 6, 0, '2022-11-13 15:24:09'),
(215, 56, 5, 0, '2022-11-13 15:24:09'),
(216, 56, 4, 0, '2022-11-13 15:24:09'),
(217, 56, 3, 0, '2022-11-13 15:24:09'),
(218, 56, 2, 0, '2022-11-13 15:24:09'),
(219, 56, 1, 20, '2022-11-13 15:24:09'),
(220, 57, 34, 1, '2022-11-13 15:25:42'),
(221, 57, 33, 1, '2022-11-13 15:25:42'),
(222, 57, 32, 0, '2022-11-13 15:25:42'),
(223, 57, 31, 0, '2022-11-13 15:25:42'),
(224, 57, 30, 0, '2022-11-13 15:25:42'),
(225, 57, 7, 0, '2022-11-13 15:25:42'),
(226, 57, 6, 0, '2022-11-13 15:25:42'),
(227, 57, 5, 0, '2022-11-13 15:25:42'),
(228, 57, 4, 0, '2022-11-13 15:25:42'),
(229, 57, 3, 0, '2022-11-13 15:25:42'),
(230, 57, 2, 0, '2022-11-13 15:25:42'),
(231, 57, 1, 0, '2022-11-13 15:25:42'),
(246, 59, 38, 0, '2022-11-18 09:52:17'),
(247, 59, 36, 0, '2022-11-18 09:52:17'),
(248, 59, 34, 0, '2022-11-18 09:52:17'),
(249, 59, 33, 0, '2022-11-18 09:52:17'),
(250, 59, 32, 0, '2022-11-18 09:52:17'),
(251, 59, 31, 0, '2022-11-18 09:52:17'),
(252, 59, 30, 0, '2022-11-18 09:52:17'),
(253, 59, 7, 0, '2022-11-18 09:52:17'),
(254, 59, 6, 0, '2022-11-18 09:52:17'),
(255, 59, 5, 0, '2022-11-18 09:52:17'),
(256, 59, 4, 50, '2022-11-18 09:52:17'),
(257, 59, 3, 0, '2022-11-18 09:52:17'),
(258, 59, 2, 0, '2022-11-18 09:52:17'),
(259, 59, 1, 0, '2022-11-18 09:52:17'),
(260, 60, 43, 1, '2022-11-18 22:31:50'),
(261, 60, 38, 0, '2022-11-18 22:31:50'),
(262, 60, 36, 0, '2022-11-18 22:31:50'),
(263, 60, 34, 0, '2022-11-18 22:31:50'),
(264, 60, 33, 0, '2022-11-18 22:31:50'),
(265, 60, 32, 0, '2022-11-18 22:31:50'),
(266, 60, 31, 0, '2022-11-18 22:31:50'),
(267, 60, 30, 0, '2022-11-18 22:31:50'),
(268, 60, 7, 0, '2022-11-18 22:31:50'),
(269, 60, 6, 0, '2022-11-18 22:31:50'),
(270, 60, 5, 0, '2022-11-18 22:31:50'),
(271, 60, 4, 0, '2022-11-18 22:31:50'),
(272, 60, 3, 0, '2022-11-18 22:31:50'),
(273, 60, 2, 0, '2022-11-18 22:31:50'),
(274, 60, 1, 0, '2022-11-18 22:31:50'),
(275, 61, 43, 4, '2022-11-18 22:33:16'),
(276, 61, 38, 0, '2022-11-18 22:33:16'),
(277, 61, 36, 0, '2022-11-18 22:33:16'),
(278, 61, 34, 0, '2022-11-18 22:33:16'),
(279, 61, 33, 0, '2022-11-18 22:33:16'),
(280, 61, 32, 0, '2022-11-18 22:33:16'),
(281, 61, 31, 0, '2022-11-18 22:33:16'),
(282, 61, 30, 0, '2022-11-18 22:33:16'),
(283, 61, 7, 0, '2022-11-18 22:33:16'),
(284, 61, 6, 0, '2022-11-18 22:33:16'),
(285, 61, 5, 0, '2022-11-18 22:33:16'),
(286, 61, 4, 0, '2022-11-18 22:33:16'),
(287, 61, 3, 0, '2022-11-18 22:33:16'),
(288, 61, 2, 0, '2022-11-18 22:33:16'),
(289, 61, 1, 0, '2022-11-18 22:33:16'),
(290, 62, 44, 50, '2022-11-19 10:56:36'),
(291, 62, 43, 0, '2022-11-19 10:56:36'),
(292, 62, 38, 120, '2022-11-19 10:56:36'),
(293, 62, 36, 1, '2022-11-19 10:56:36'),
(294, 62, 34, 0, '2022-11-19 10:56:36'),
(295, 62, 33, 0, '2022-11-19 10:56:36'),
(296, 62, 32, 0, '2022-11-19 10:56:36'),
(297, 62, 31, 0, '2022-11-19 10:56:36'),
(298, 62, 30, 0, '2022-11-19 10:56:36'),
(299, 62, 7, 0, '2022-11-19 10:56:36'),
(300, 62, 6, 0, '2022-11-19 10:56:36'),
(301, 62, 5, 0, '2022-11-19 10:56:36'),
(302, 62, 4, 50, '2022-11-19 10:56:36'),
(303, 62, 3, 0, '2022-11-19 10:56:36'),
(304, 62, 2, 0, '2022-11-19 10:56:36'),
(305, 62, 1, 0, '2022-11-19 10:56:36'),
(306, 63, 46, 3, '2022-11-23 22:39:45'),
(307, 63, 44, 0, '2022-11-23 22:39:45'),
(308, 63, 38, 1, '2022-11-23 22:39:45'),
(309, 63, 36, 0, '2022-11-23 22:39:45'),
(310, 63, 34, 1, '2022-11-23 22:39:45'),
(311, 63, 33, 0, '2022-11-23 22:39:45'),
(312, 63, 31, 0, '2022-11-23 22:39:45'),
(313, 63, 30, 4, '2022-11-23 22:39:45'),
(314, 63, 7, 3, '2022-11-23 22:39:45'),
(315, 63, 6, 0, '2022-11-23 22:39:45'),
(316, 63, 5, 0, '2022-11-23 22:39:45'),
(317, 63, 4, 1, '2022-11-23 22:39:45'),
(318, 63, 3, 0, '2022-11-23 22:39:45'),
(319, 63, 2, 1, '2022-11-23 22:39:45'),
(320, 63, 1, 1, '2022-11-23 22:39:45'),
(321, 64, 49, 3, '2022-11-25 16:19:53'),
(322, 64, 48, 2, '2022-11-25 16:19:53'),
(323, 64, 44, 1, '2022-11-25 16:19:53'),
(324, 64, 34, 0, '2022-11-25 16:19:53'),
(325, 64, 31, 0, '2022-11-25 16:19:53'),
(326, 64, 30, 0, '2022-11-25 16:19:53'),
(327, 64, 7, 0, '2022-11-25 16:19:53'),
(328, 64, 6, 0, '2022-11-25 16:19:53'),
(329, 64, 5, 4, '2022-11-25 16:19:53'),
(330, 64, 4, 3, '2022-11-25 16:19:53'),
(331, 64, 1, 0, '2022-11-25 16:19:53'),
(344, 66, 50, 1, '2022-12-08 06:21:06'),
(345, 66, 49, 0, '2022-12-08 06:21:06'),
(346, 66, 48, 0, '2022-12-08 06:21:06'),
(347, 66, 44, 0, '2022-12-08 06:21:06'),
(348, 66, 34, 0, '2022-12-08 06:21:06'),
(349, 66, 31, 0, '2022-12-08 06:21:06'),
(350, 66, 30, 0, '2022-12-08 06:21:06'),
(351, 66, 7, 0, '2022-12-08 06:21:06'),
(352, 66, 6, 0, '2022-12-08 06:21:06'),
(353, 66, 5, 0, '2022-12-08 06:21:06'),
(354, 66, 4, 0, '2022-12-08 06:21:06'),
(355, 66, 1, 0, '2022-12-08 06:21:06'),
(356, 67, 50, 3, '2022-12-08 07:30:58'),
(357, 67, 49, 0, '2022-12-08 07:30:58'),
(358, 67, 48, 0, '2022-12-08 07:30:58'),
(359, 67, 44, 0, '2022-12-08 07:30:58'),
(360, 67, 34, 0, '2022-12-08 07:30:58'),
(361, 67, 31, 0, '2022-12-08 07:30:58'),
(362, 67, 30, 0, '2022-12-08 07:30:58'),
(363, 67, 7, 0, '2022-12-08 07:30:58'),
(364, 67, 6, 0, '2022-12-08 07:30:58'),
(365, 67, 5, 0, '2022-12-08 07:30:58'),
(366, 67, 4, 0, '2022-12-08 07:30:58'),
(367, 67, 1, 0, '2022-12-08 07:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `cash_tendered` int(11) DEFAULT NULL,
  `changed` int(11) DEFAULT NULL,
  `mop` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `total_amount`, `cash_tendered`, `changed`, `mop`, `user_id`, `date_created`) VALUES
(247, 110, 110, 0, 'Cash', 4, '2022-11-11 14:56:13'),
(248, 115, 115, 0, 'Cash', 4, '2022-11-11 14:59:38'),
(249, 5, 5, 0, 'Cash', NULL, '2022-11-12 04:05:34'),
(250, 40, 40, 0, 'Cash', NULL, '2022-11-13 08:28:17'),
(251, 10, 10, 0, 'Cash', 30, '2022-11-13 14:11:59'),
(252, 8000, 9000, 1000, 'Cash', 30, '2022-11-13 15:33:00'),
(253, 6400, 6500, 100, 'Cash', 30, '2022-11-13 15:33:28'),
(254, 8, 10, 2, 'Cash', 30, '2022-11-13 15:35:30'),
(255, 10, 200, 190, 'Cash', 30, '2022-11-16 16:06:56'),
(256, 22, 500, 478, 'Gcash', 30, '2022-11-16 16:16:22'),
(257, 100, 100, 0, 'Cash', 30, '2022-11-16 16:20:22'),
(258, 10, 10, 0, 'Cash', 30, '2022-11-16 16:43:48'),
(259, 30, 1000, 970, 'Paymaya', 30, '2022-11-18 13:24:56'),
(260, 15, 1000, 985, 'Cash', 30, '2022-11-18 22:17:16'),
(261, 15, 15, 0, 'Cash', 30, '2022-11-18 22:18:07'),
(262, 15, 15, 0, 'Cash', 30, '2022-11-18 22:18:17'),
(263, 15, 15, 0, 'Cash', 30, '2022-11-18 22:20:17'),
(264, 15, 15, 0, 'Cash', 30, '2022-11-18 22:20:29'),
(265, 15, 15, 0, 'Cash', 30, '2022-11-18 22:24:25'),
(266, 15, 15, 0, 'Cash', 30, '2022-11-18 22:35:07'),
(267, 45, 1045, 1000, 'Cash', 77, '2022-11-19 10:52:41'),
(268, 30, 50, 20, 'Cash', 30, '2022-11-19 22:27:56'),
(269, 30, 30, 0, 'Cash', 30, '2022-11-20 18:05:53'),
(270, 15, 15, 0, 'Cash', 30, '2022-11-20 22:13:12'),
(271, 10, 50, 40, 'Cash', 30, '2022-11-21 07:45:43'),
(272, 150, 200, 50, 'Cash', 30, '2022-11-23 22:44:37'),
(273, 240, 240, 0, 'Cash', 30, '2022-11-25 13:40:03'),
(274, 510, 510, 0, 'Cash', 30, '2022-11-25 17:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_code` varchar(45) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `transaction_id`, `product_code`, `product_price`, `quantity`, `date_created`) VALUES
(196, 247, '4800361415293', 10, 1, '2022-11-11 14:56:13'),
(197, 247, '4800575144491', 50, 1, '2022-11-11 14:56:13'),
(198, 247, '4800575144491', 50, 1, '2022-11-11 14:56:13'),
(199, 248, '4807770120473', 5, 1, '2022-11-11 14:59:38'),
(200, 248, '4800361415293', 10, 1, '2022-11-11 14:59:38'),
(201, 248, '4800575144491', 50, 1, '2022-11-11 14:59:38'),
(202, 248, '4800575144491', 50, 1, '2022-11-11 14:59:38'),
(203, 249, '4807770120473', 5, 1, '2022-11-12 04:05:34'),
(204, 250, '4800092113277', 10, 4, '2022-11-13 08:28:17'),
(205, 251, '4800092113277', 10, 1, '2022-11-13 14:11:59'),
(206, 252, '4800092113338', 8, 1000, '2022-11-13 15:33:00'),
(207, 253, '4800092113338', 8, 800, '2022-11-13 15:33:28'),
(208, 254, '4800092113338', 8, 1, '2022-11-13 15:35:30'),
(209, 255, '4800365671268', 10, 1, '2022-11-16 16:06:56'),
(210, 256, '8802103994055', 22, 1, '2022-11-16 16:16:22'),
(211, 257, '4800365671268', 10, 10, '2022-11-16 16:20:22'),
(212, 258, '4800365671268', 10, 1, '2022-11-16 16:43:48'),
(213, 259, '8802103994055', 15, 2, '2022-11-18 13:24:56'),
(214, 265, '8802103994055', 15, 1, '2022-11-18 22:24:25'),
(215, 266, '8802103994055', 15, 1, '2022-11-18 22:35:07'),
(216, 267, '4800016112140', 45, 1, '2022-11-19 10:52:41'),
(217, 268, '4800016112140', 15, 1, '2022-11-19 22:27:56'),
(218, 268, '8802103994055', 15, 1, '2022-11-19 22:27:56'),
(219, 269, '4800016112140', 10, 3, '2022-11-20 18:05:53'),
(220, 270, '4800092113260', 10, 1, '2022-11-20 22:13:12'),
(221, 270, '4807770120473', 5, 1, '2022-11-20 22:13:12'),
(222, 271, '4800365671268', 10, 1, '2022-11-21 07:45:43'),
(223, 272, '4800417005256', 75, 2, '2022-11-23 22:44:37'),
(224, 273, '4800417005249', 80, 3, '2022-11-25 13:40:03'),
(225, 274, '0293647028392', 100, 5, '2022-11-25 17:56:27'),
(226, 274, '4800049721142', 10, 1, '2022-11-25 17:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-10-16 12:46:18', NULL, 1),
(25, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-10-19 10:54:31', NULL, 0),
(26, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-10-19 10:54:34', '19-10-2022 04:37:48 PM', 1),
(27, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-10-23 10:15:08', NULL, 1),
(28, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-10-26 12:36:38', NULL, 1),
(29, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-10-28 08:14:07', NULL, 1),
(30, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-10-30 06:29:19', NULL, 1),
(31, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-10-31 11:55:31', NULL, 1),
(32, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-03 12:19:54', NULL, 1),
(33, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-05 12:45:17', NULL, 1),
(34, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-06 08:45:40', '06-11-2022 02:32:55 PM', 1),
(35, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-06 09:03:03', '06-11-2022 02:36:11 PM', 1),
(36, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-06 09:06:18', '06-11-2022 03:39:41 PM', 1),
(37, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-06 10:09:56', NULL, 1),
(38, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-07 13:20:22', NULL, 1),
(39, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-08 12:58:41', NULL, 1),
(40, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-10 04:39:04', NULL, 1),
(41, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-10 14:07:35', NULL, 1),
(42, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 03:39:24', '11-11-2022 11:29:16 AM', 1),
(43, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 05:59:24', '11-11-2022 11:30:10 AM', 1),
(44, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 06:00:18', '11-11-2022 11:41:35 AM', 1),
(45, 'pogi@1234.com', 0x3a3a3100000000000000000000000000, '2022-11-11 06:12:17', '11-11-2022 11:48:50 AM', 1),
(46, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 06:20:14', '11-11-2022 12:29:40 PM', 1),
(47, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 06:59:53', NULL, 0),
(48, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:01:32', NULL, 0),
(49, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:01:39', NULL, 0),
(50, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:01:43', NULL, 0),
(51, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:02:23', '11-11-2022 12:32:38 PM', 1),
(52, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:02:54', NULL, 0),
(53, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:14:12', NULL, 0),
(54, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:14:35', '11-11-2022 12:44:37 PM', 1),
(55, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:14:50', NULL, 0),
(56, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:18:26', '11-11-2022 12:48:28 PM', 1),
(57, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:18:42', NULL, 0),
(58, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:19:39', '11-11-2022 12:49:41 PM', 1),
(59, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:19:51', NULL, 0),
(60, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:20:04', NULL, 0),
(61, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:21:11', '11-11-2022 12:51:13 PM', 1),
(62, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:21:30', NULL, 0),
(63, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:25:53', '11-11-2022 12:55:56 PM', 1),
(64, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:29:59', '11-11-2022 01:00:00 PM', 1),
(65, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:32:28', NULL, 0),
(66, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:32:38', NULL, 0),
(67, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:33:09', '11-11-2022 01:18:56 PM', 1),
(68, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:49:04', '11-11-2022 01:19:27 PM', 1),
(69, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:49:34', '11-11-2022 01:20:26 PM', 1),
(70, 'pogi@1234.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:50:55', '11-11-2022 01:20:58 PM', 1),
(71, 'pogi@1234.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:51:30', NULL, 0),
(72, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:51:36', NULL, 0),
(73, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:51:42', '11-11-2022 01:27:29 PM', 1),
(74, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 07:57:36', '11-11-2022 01:46:07 PM', 1),
(75, 'pogi@1234.com', 0x3a3a3100000000000000000000000000, '2022-11-11 08:16:36', '11-11-2022 02:10:41 PM', 1),
(76, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 08:40:49', '11-11-2022 03:43:24 PM', 1),
(77, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 10:14:24', '11-11-2022 03:45:12 PM', 1),
(78, 'pogi@1234.com', 0x3a3a3100000000000000000000000000, '2022-11-11 10:15:29', '11-11-2022 03:45:35 PM', 1),
(79, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 10:15:43', '11-11-2022 03:45:46 PM', 1),
(80, 'pogi@1234.com', 0x3a3a3100000000000000000000000000, '2022-11-11 10:15:56', '11-11-2022 08:12:25 PM', 1),
(81, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-11 14:42:35', NULL, 1),
(82, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 05:44:31', '12-11-2022 01:11:37 PM', 1),
(83, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 09:31:47', NULL, 1),
(84, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 12:59:57', NULL, 1),
(85, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 13:30:33', '12-11-2022 07:00:38 PM', 1),
(86, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 13:47:49', '12-11-2022 07:18:21 PM', 1),
(87, 'pogi@1234.com', 0x3a3a3100000000000000000000000000, '2022-11-12 14:31:48', '12-11-2022 08:02:53 PM', 1),
(88, 'pogi@1234.com', 0x3a3a3100000000000000000000000000, '2022-11-12 14:33:04', '12-11-2022 08:05:47 PM', 1),
(89, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 15:03:48', '12-11-2022 08:35:45 PM', 1),
(90, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 15:05:58', '12-11-2022 09:23:28 PM', 1),
(91, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 15:53:39', '12-11-2022 09:26:25 PM', 1),
(92, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 15:56:37', NULL, 1),
(93, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:26:46', '12-11-2022 10:00:49 PM', 1),
(94, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:31:04', NULL, 1),
(95, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:34:16', NULL, 0),
(96, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:34:21', NULL, 0),
(97, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:34:27', NULL, 0),
(98, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:34:37', NULL, 0),
(99, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:34:46', NULL, 1),
(100, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:41:25', NULL, 0),
(101, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:41:30', NULL, 0),
(102, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:41:39', NULL, 1),
(103, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:42:16', '12-11-2022 10:12:30 PM', 1),
(104, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:42:47', '12-11-2022 10:12:57 PM', 1),
(105, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:44:25', '12-11-2022 10:23:18 PM', 1),
(106, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:53:29', '12-11-2022 10:23:37 PM', 1),
(107, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:53:53', NULL, 0),
(108, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:53:57', NULL, 0),
(109, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:54:03', NULL, 0),
(110, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:54:11', '12-11-2022 10:24:27 PM', 1),
(111, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:55:42', NULL, 0),
(112, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:55:47', NULL, 0),
(113, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:56:58', '12-11-2022 10:27:02 PM', 1),
(114, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 16:57:19', '12-11-2022 10:31:53 PM', 1),
(115, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 17:02:06', '12-11-2022 10:36:47 PM', 1),
(116, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 17:07:11', '12-11-2022 10:37:20 PM', 1),
(117, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 17:07:28', '12-11-2022 10:38:09 PM', 1),
(118, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 17:09:03', NULL, 0),
(119, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 17:09:08', NULL, 0),
(120, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 17:09:15', '12-11-2022 10:39:17 PM', 1),
(121, 'sanchezcharlesmatthew@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-12 17:10:23', '12-11-2022 10:45:32 PM', 1),
(122, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 17:15:39', '12-11-2022 11:16:46 PM', 1),
(123, 'pogi@123.com', 0x3a3a3100000000000000000000000000, '2022-11-12 18:00:04', NULL, 1),
(124, 'coco@gmail.com', 0x3138302e3139312e3231302e31313700, '2022-11-13 08:21:41', NULL, 0),
(125, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 08:30:28', NULL, 0),
(126, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 08:30:54', '13-11-2022 02:01:02 PM', 1),
(127, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 08:40:44', NULL, 0),
(128, 'pogi@123.com', 0x3138302e3139312e3137372e31383900, '2022-11-13 08:45:03', NULL, 1),
(129, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 08:55:34', NULL, 1),
(130, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 09:00:52', NULL, 1),
(131, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 09:01:50', NULL, 1),
(132, 'sanchezcharlesmatthew@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 09:02:18', NULL, 1),
(133, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 09:03:14', '13-11-2022 02:33:30 PM', 1),
(134, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 09:03:38', NULL, 1),
(135, 'pogi@123.com', 0x3138302e3139312e3137372e31383900, '2022-11-13 09:06:08', NULL, 0),
(136, 'pogi@123.com', 0x3138302e3139312e3137372e31383900, '2022-11-13 09:06:40', NULL, 1),
(137, 'pogi@123.com', 0x3132302e32382e36352e313235000000, '2022-11-13 09:35:30', '13-11-2022 03:11:58 PM', 1),
(138, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 09:52:41', NULL, 1),
(139, 'pogi@123.com', 0x3133362e3135382e35372e3234310000, '2022-11-13 09:59:21', NULL, 0),
(140, 'pogi@123.com', 0x3133362e3135382e35372e3234310000, '2022-11-13 09:59:38', '13-11-2022 03:29:41 PM', 0),
(141, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 09:59:52', '13-11-2022 03:29:58 PM', 1),
(142, 'pogi@123.com', 0x3133362e3135382e35372e3234310000, '2022-11-13 10:00:17', NULL, 1),
(143, 'chienimaesanchez@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 10:16:28', NULL, 1),
(144, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 10:26:06', '13-11-2022 04:07:49 PM', 1),
(145, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 10:38:08', '13-11-2022 09:40:45 PM', 1),
(146, 'natskiedagreat18@gmail.com', 0x38392e34312e32362e35360000000000, '2022-11-13 12:02:19', NULL, 1),
(147, 'pogi@123.com', 0x3132302e32382e36352e313235000000, '2022-11-13 12:19:37', '13-11-2022 05:49:47 PM', 1),
(148, 'coco@gmail.com', 0x3132302e32382e36352e313235000000, '2022-11-13 12:20:27', '13-11-2022 06:14:39 PM', 1),
(149, 'pogi@123.com', 0x3138302e3139312e3138322e32343800, '2022-11-13 13:31:47', '13-11-2022 08:40:55 PM', 1),
(150, 'lyod@gmail.com', 0x3132302e32382e36352e313235000000, '2022-11-13 14:02:08', '13-11-2022 07:35:30 PM', 1),
(151, 'coco@gmail.com', 0x3132302e32382e36352e313235000000, '2022-11-13 14:08:29', NULL, 1),
(152, 'admin@SDA.COM', 0x3133362e3135382e35372e3234310000, '2022-11-13 15:13:06', NULL, 0),
(153, 'pogi@123.com', 0x3138302e3139312e3138322e32343800, '2022-11-13 15:24:41', NULL, 1),
(154, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-13 16:10:55', NULL, 1),
(155, 'tracymcgray69@gmail.com', 0x3133362e3135382e34322e3200000000, '2022-11-13 23:54:06', NULL, 1),
(156, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:15:24', '14-11-2022 07:45:52 PM', 1),
(157, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:39:24', '14-11-2022 08:11:37 PM', 1),
(158, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:41:46', NULL, 0),
(159, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:42:40', '14-11-2022 08:12:58 PM', 1),
(160, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:43:06', NULL, 0),
(161, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:43:11', NULL, 0),
(162, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:47:14', NULL, 0),
(163, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:47:21', NULL, 0),
(164, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:47:27', NULL, 0),
(165, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:47:46', NULL, 0),
(166, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:47:52', NULL, 0),
(167, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:48:27', '14-11-2022 08:19:02 PM', 1),
(168, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:49:14', NULL, 0),
(169, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:51:00', NULL, 0),
(170, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:51:37', '14-11-2022 08:23:00 PM', 1),
(171, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:53:08', NULL, 0),
(172, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:53:16', NULL, 0),
(173, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:53:21', NULL, 0),
(174, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:53:33', NULL, 0),
(175, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:55:18', '14-11-2022 08:25:39 PM', 1),
(176, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:55:48', '14-11-2022 08:27:43 PM', 1),
(177, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-14 14:57:53', '14-11-2022 08:32:33 PM', 1),
(178, 'testlyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 13:59:07', NULL, 0),
(179, 'jlyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 14:00:05', '16-11-2022 08:21:58 PM', 1),
(180, 'jlyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 14:52:36', '16-11-2022 09:02:20 PM', 1),
(181, 'jlyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 15:32:35', '16-11-2022 09:11:51 PM', 1),
(182, 'jlyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 15:42:18', NULL, 0),
(183, 'JLyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 15:42:33', NULL, 0),
(184, '4Lyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 15:43:50', '16-11-2022 09:17:50 PM', 1),
(185, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-16 15:50:18', NULL, 0),
(186, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-16 15:50:25', NULL, 0),
(187, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-16 15:50:32', NULL, 0),
(188, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-16 15:50:44', NULL, 1),
(189, 'johnlyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 15:56:53', '16-11-2022 09:28:14 PM', 1),
(190, 'chienimaesanchez@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-16 15:57:03', NULL, 0),
(191, 'chienimae@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-16 15:57:27', NULL, 0),
(192, 'johnlyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 15:58:28', '16-11-2022 09:29:21 PM', 1),
(193, 'chienimaesanchez@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-16 15:58:32', NULL, 0),
(194, 'chienimaesanchez@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-16 15:59:07', NULL, 1),
(195, 'lyod@gmail.com', 0x3132302e32382e36352e390000000000, '2022-11-16 15:59:33', '16-11-2022 10:37:53 PM', 1),
(196, 'charlessanchez20@gmail.com', 0x3138302e3139312e3138322e32343800, '2022-11-16 16:04:02', NULL, 1),
(197, 'L@gmail.com', 0x3131322e3139382e39372e3335000000, '2022-11-17 00:04:42', '17-11-2022 06:00:41 AM', 1),
(198, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:12:32', '18-11-2022 12:42:34 PM', 1),
(199, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:15:22', '18-11-2022 12:45:26 PM', 1),
(200, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:15:38', NULL, 0),
(201, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:19:06', '18-11-2022 12:49:13 PM', 1),
(202, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:23:34', NULL, 0),
(203, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:24:15', NULL, 0),
(204, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:25:10', NULL, 0),
(205, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:25:19', '18-11-2022 12:55:21 PM', 1),
(206, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:25:33', NULL, 0),
(207, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:46:39', NULL, 0),
(208, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 07:46:48', '18-11-2022 01:42:04 PM', 1),
(209, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 08:12:16', '18-11-2022 03:07:30 PM', 1),
(210, 'pogi@123.com', 0x3138302e3139312e3230342e31303600, '2022-11-18 08:33:40', NULL, 0),
(211, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-18 08:33:49', '18-11-2022 02:36:04 PM', 1),
(212, 'lejarde@gmail.com', 0x3138302e3139312e3138322e31303700, '2022-11-18 09:10:00', '18-11-2022 02:42:53 PM', 1),
(213, 'lejarde@gmail.com', 0x3138302e3139312e3138322e31303700, '2022-11-18 09:51:57', '18-11-2022 03:41:18 PM', 1),
(214, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:26:17', NULL, 0),
(215, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:26:24', NULL, 0),
(216, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:26:33', NULL, 0),
(217, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:27:04', '18-11-2022 03:57:57 PM', 1),
(218, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:30:38', '18-11-2022 04:00:40 PM', 1),
(219, 'cesharian@gmail.com', 0x3138302e3139302e3233312e31393000, '2022-11-18 10:49:06', NULL, 1),
(220, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-18 10:53:15', '18-11-2022 04:23:41 PM', 1),
(221, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:53:43', '18-11-2022 04:24:32 PM', 1),
(222, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-18 10:54:23', NULL, 0),
(223, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:57:03', NULL, 0),
(224, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:57:17', '18-11-2022 04:27:19 PM', 1),
(225, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:58:08', NULL, 0),
(226, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 10:58:17', '18-11-2022 05:41:46 PM', 1),
(227, 'lejarde@gmail.com', 0x3138302e3139312e3138322e31303700, '2022-11-18 11:55:48', '18-11-2022 05:36:02 PM', 1),
(228, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-18 12:12:22', NULL, 1),
(229, 'lejarde@gmail.com', 0x3138302e3139312e3138322e31303700, '2022-11-18 12:14:32', NULL, 1),
(230, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-18 12:28:31', NULL, 1),
(231, 'cyberpopanes@gmail.com', 0x3131322e3139382e32372e3400000000, '2022-11-19 02:44:14', '19-11-2022 08:57:03 AM', 1),
(232, 'charlessanchez20@gmail.com', 0x3131322e3139382e32372e3400000000, '2022-11-19 03:27:18', NULL, 1),
(233, 'lejarde@gmail.com', 0x3138302e3139312e3138322e31303700, '2022-11-19 11:55:38', NULL, 1),
(234, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-19 12:04:50', '19-11-2022 09:56:08 PM', 1),
(235, 'lejarde@gmail.com', 0x3138302e3139312e3138322e31303700, '2022-11-19 13:17:55', '19-11-2022 07:20:03 PM', 1),
(236, 'lejarde@gmail.com', 0x3138302e3139312e3138322e31303700, '2022-11-19 13:54:07', NULL, 1),
(237, 'pepito@gmail.com', 0x3132302e32382e36352e383200000000, '2022-11-19 15:17:40', '21-11-2022 05:48:18 AM', 1),
(238, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-19 16:26:45', NULL, 1),
(239, 'cyberpopanes@gmail.com', 0x37372e36382e34302e31383300000000, '2022-11-20 08:49:11', '21-11-2022 06:00:17 AM', 1),
(240, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-20 09:41:25', NULL, 1),
(241, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-20 13:34:09', NULL, 1),
(242, 'lejarde@gmail.com', 0x3138302e3139312e3138322e31303700, '2022-11-21 06:42:14', '23-11-2022 07:53:00 PM', 1),
(243, 'pepito@gmail.com', 0x3132302e32382e36352e343600000000, '2022-11-23 06:17:22', NULL, 0),
(244, 'pepito@gmail.com', 0x3132302e32382e36352e343600000000, '2022-11-23 06:17:34', NULL, 0),
(245, 'pepito@gmail.com', 0x3132302e32382e36352e343600000000, '2022-11-23 06:18:17', NULL, 1),
(246, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-23 13:59:32', NULL, 0),
(247, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-23 13:59:45', NULL, 0),
(248, 'charlessanchez20@gmail.com', 0x3138302e3139312e3230342e31303600, '2022-11-23 13:59:52', NULL, 1),
(249, 'test2@gmail.com', 0x3138302e3139312e3138322e31393400, '2022-11-23 14:26:09', NULL, 1),
(250, 'cyberpopanes@gmail.com', 0x3138352e3234322e352e323600000000, '2022-11-25 06:19:07', NULL, 1),
(251, 'quilala@gmail.com', 0x3139332e33372e3235342e3137320000, '2022-11-25 08:11:07', '25-11-2022 01:50:51 PM', 1),
(252, 'bedia@gmail.com', 0x3139332e33372e3235342e3137320000, '2022-11-25 09:21:10', '25-11-2022 03:42:53 PM', 1),
(253, 'bedia@gmail.com', 0x3139332e33372e3235342e3137320000, '2022-11-25 10:16:43', NULL, 1),
(254, 'charlessanchez20@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-27 11:25:08', NULL, 1),
(255, 'charlessanchez20@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-28 10:11:00', '28-11-2022 07:54:23 PM', 1),
(256, 'lejarde@gmail.com', 0x3138302e3139312e3136322e32303600, '2022-12-04 00:09:12', NULL, 1),
(257, 'lejarde@gmail.com', 0x3138302e3139312e3136322e32303600, '2022-12-04 01:12:34', '04-12-2022 06:44:49 AM', 1),
(258, 'lejarde@gmail.com', 0x3138302e3139312e3136322e32303600, '2022-12-04 01:18:25', NULL, 1),
(259, 'charlessanchez20@gmail.com', 0x3138302e3139312e3231302e34320000, '2022-12-04 09:52:48', NULL, 0),
(260, 'charlessanchez20@gmail.com', 0x3138302e3139312e3231302e34320000, '2022-12-04 09:52:56', '04-12-2022 03:23:20 PM', 1),
(261, 'charlessanchez20@gmail.com', 0x3138302e3139312e3231302e34320000, '2022-12-04 09:57:18', '04-12-2022 03:28:28 PM', 1),
(262, 'charlessanchez20@gmail.com', 0x3138302e3139312e3231302e34320000, '2022-12-04 09:58:37', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `valid` int(11) NOT NULL,
  `validPicFront` varchar(255) DEFAULT NULL,
  `validPicBack` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `contactno`, `password`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`, `valid`, `validPicFront`, `validPicBack`) VALUES
(4, 'matt', NULL, NULL, 'pogi@123.com', 9562331515, 'cd49847b46a4e64d3cb193f3bb8f2ea2', '177 Joaquin St. Gen. T. De Leon Valenzuela City', 'Gen. T. De Leon', 'Valenzuela City', 1442, '2022-10-16 12:46:02', '14-11-2022 08:27:36 PM', 2, '310335562_567267905204629_7049844939608816694_n.jpg', '313196272_691204045766977_3578913808528365872_n.jpg'),
(10, 'Matthew ', NULL, NULL, 'sanchezcharlesmatthew@gmail.com', 9297603186, '28a255fee2ddbffdd7338025ff896cf0', '177 Joaquin St. Gen. T. De Leon Valenzuela City', 'Gen. T. De Leon', 'Valenzuela City', 1442, '2022-11-12 15:03:35', NULL, 2, '310335562_567267905204629_7049844939608816694_n.jpg', '313196272_691204045766977_3578913808528365872_n.jpg'),
(11, 'Matthew ', 'Charles Matthew', 'Sanchez', 'charlessanchez20@gmail.com', 9562331515, '28a255fee2ddbffdd7338025ff896cf0', '177 Joaquin St. Gen. T. De Leon Valenzuela City', 'Gen. T. De Leon', 'Valenzuela City', 1441, '2022-11-13 08:54:57', NULL, 0, '310335562_567267905204629_7049844939608816694_n.jpg', '313196272_691204045766977_3578913808528365872_n.jpg'),
(12, 'Jeong Jaehyun', NULL, NULL, 'chienimaesanchez@gmail.com', 9988670903, '59ff7b5980ddf19995e3058ff3a0b049', '177 Joaquin St.', 'Gen T', 'Valenzuela City', 1442, '2022-11-13 10:16:15', NULL, 0, NULL, NULL),
(13, 'Cyber Popanes', NULL, NULL, 'cyberp17400@gmail.com', 9981833176, 'd8ff74690808c03e5772aac118b4594e', '72 Pateros St ', 'Barangay 35', 'Valenzuela City', 1410, '2022-11-13 10:51:55', NULL, 0, NULL, NULL),
(14, 'Marks Bryan Quilala', NULL, NULL, 'natskiedagreat18@gmail.com', 9654334058, '8cba0fd0e0dfb08e3646ecca3d02acd9', '#04 Bernadettet St. Gabriel Subd.1', 'Hulong-Duhat', 'Valenzuela City', 1442, '2022-11-13 12:02:12', NULL, 0, NULL, NULL),
(15, 'coco martin', NULL, NULL, 'coco@gmail.com', 9123456789, '48b67c1a1c8ba94ff6e5bd067643081d', NULL, NULL, NULL, NULL, '2022-11-13 12:20:16', NULL, 0, NULL, NULL),
(16, 'John Lyod Miranda', NULL, NULL, 'lyod@gmail.com', 9123456789, 'a11ff5b70e10a02cc1c546e745a8cfde', NULL, NULL, NULL, NULL, '2022-11-13 14:01:58', NULL, 0, NULL, NULL),
(17, 'Nero angelo', NULL, NULL, 'tracymcgray69@gmail.com', 9776005128, '662af1cd1976f09a9f8cecc868ccc0a2', '1103 Huntington beach', 'UG', 'Valenzuela City', 1442, '2022-11-13 23:53:41', NULL, 0, NULL, NULL),
(18, 'Mark Dizon', NULL, NULL, 'markdizon@gmail.com', 9981833178, '5c2da6ce54cfc462906f7cec364b8671', '78 Pateros Street', '72', 'Valenzuela City', 1420, '2022-11-14 15:11:05', NULL, 0, NULL, NULL),
(19, 'JLyod', NULL, NULL, 'John@gmail.com', 9123456789, '798ab565ce13bd5ba3d7ada8a0e8b6ea', '456 Mapulang Lupa', 'Mapulang Lupa', 'Valenzuela City', 1446, '2022-11-16 13:59:55', NULL, 0, NULL, NULL),
(21, 'Charles Matthew Sanchez', NULL, NULL, 'sanchezcharles@gmail.com', 9562331515, '28a255fee2ddbffdd7338025ff896cf0', '177 Joaquin St. Gen. T. De Leon Valenzuela City', 'Gen. T. De Leon', 'Valenzuela City', 1442, '2022-11-17 01:20:08', NULL, 0, NULL, NULL),
(23, 'Charles Lejarde', NULL, NULL, 'lejarde@gmail.com', 9204549598, '9cf8999ae45f9b63a3a381f8a759202c', 'Ugong', 'Ugong', 'Valenzuela City', 1441, '2022-11-18 09:09:50', NULL, 0, NULL, NULL),
(24, 'Sharian Pascasio', NULL, NULL, 'cesharian@gmail.com', 9453240065, '3c4d3d628de986ffbfe54d07f398722a', NULL, NULL, NULL, NULL, '2022-11-18 10:48:43', NULL, 0, NULL, NULL),
(25, 'Cyber Popanes', NULL, NULL, 'cyberpopanes@gmail.com', 9981833177, 'd8ff74690808c03e5772aac118b4594e', 'dfdsfds', 'Barangay 32', 'Valenzuela City', 1410, '2022-11-19 02:43:57', NULL, 2, 'Screenshot (6).png', 'Screenshot (8).png'),
(26, 'pepito manaloto', NULL, NULL, 'pepito@gmail.com', 9123456789, '7cee197bc6de4288b3682c6a4a47f0fe', NULL, NULL, NULL, NULL, '2022-11-23 06:18:08', NULL, 0, NULL, NULL),
(27, 'John Ryan Dela Cruz', NULL, NULL, 'test2@gmail.com', 9204549598, '9cf8999ae45f9b63a3a381f8a759202c', 'Ugong ', 'Ugong', 'Valenzuela City', 1441, '2022-11-23 14:25:56', NULL, 2, 'Screenshot_20221025_092458.png', 'Screenshot_20221025_092756.png'),
(28, 'Mark Bryan Quilala', NULL, NULL, 'quilala@gmail.com', 9204549598, '9cf8999ae45f9b63a3a381f8a759202c', 'Gen. T De Leon', 'Gen. T De Leon', 'Valenzuela City', 4141, '2022-11-25 08:10:55', NULL, 1, 'Screenshot (6).png', 'Screenshot (7).png'),
(29, 'James Bedia', NULL, NULL, 'bedia@gmail.com', 9562331515, '9cf8999ae45f9b63a3a381f8a759202c', 'Ugong ', 'Marulas', 'Valenzuela City', 4141, '2022-11-25 09:20:55', NULL, 2, 'Screenshot (8).png', 'Screenshot (9).png');

-- --------------------------------------------------------

--
-- Table structure for table `users_be`
--

CREATE TABLE `users_be` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_be`
--

INSERT INTO `users_be` (`ID`, `first_name`, `last_name`, `user_name`, `password`, `role`) VALUES
(30, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(62, 'Matthew', 'Sanchez', 'Mattlyfe', '473e1a35c874f72fad4ff77b2f242bf8', 'admin'),
(64, 'sup', 'sup', 'Supplier', '2eeecd72c567401e6988624b179d0b14', 'supplier'),
(66, 'Cashier', 'Cashier', 'Cashier', '93585797569d208d914078d513c8c55a', 'cashier'),
(70, 'lawrence', 'canlas', 's', '21232f297a57a5a743894a0e4a801fc3', 'cashier'),
(72, 'final', 'test', 'finaltest', '098f6bcd4621d373cade4e832627b4f6', 'admin'),
(73, 'Cyber', 'Dizon', 'Zyver', '81dc9bdb52d04dc20036dbd8313ed055', 'cashier'),
(74, 'Mark', 'Dizon', 'Mark', '81dc9bdb52d04dc20036dbd8313ed055', 'supplier'),
(75, 'Supplier', 'BastSupp', 'SupplierOne', '087e1c29263a271e297a19dd843ce86f', 'supplier'),
(76, 'lyodsupplier', 'lyodsupplier', 'lyodsupplier', '187605de1b23057e147d78d47be89ea1', 'supplier'),
(77, 'John', 'Miranda', 'Miranda', '441ee11ea25f56f702131a08c6bcf508', 'cashier'),
(78, 'SupplierOne', 'Supplier', 'SupplierOne', 'ec136b444eede3bc85639fac0dd06229', 'supplier'),
(79, 'Supplier', 'Sample', 'SupplierTwo', '81dc9bdb52d04dc20036dbd8313ed055', 'supplier'),
(80, 'Rain', 'Man', 'RainCashier', '81dc9bdb52d04dc20036dbd8313ed055', 'cashier'),
(81, 'Cashier', '2', 'Cashier2', '93585797569d208d914078d513c8c55a', 'cashier'),
(82, 'Mark Bryan', 'Quilala', 'bry', 'a02f3c4dd24a836ce1aa36c461b71e7e', 'supplier'),
(83, 'Agaw', 'Manlapat', 'agaw', '49375313ae9e075247b1dada362090c5', 'supplier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_account`
--
ALTER TABLE `card_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_container`
--
ALTER TABLE `item_container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_header`
--
ALTER TABLE `order_header`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_be`
--
ALTER TABLE `users_be`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_account`
--
ALTER TABLE `card_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_container`
--
ALTER TABLE `item_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_header`
--
ALTER TABLE `order_header`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users_be`
--
ALTER TABLE `users_be`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
