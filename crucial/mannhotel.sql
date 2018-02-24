-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 02:26 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mannhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `authority_level` int(2) NOT NULL,
  `person` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_name`, `password`, `authority_level`, `person`) VALUES
(1, 'mandeep', 'shabina', 3, 1),
(2, 'lakshay', '8946553', 3, 2),
(3, 'mandyk', '123456', 1, 1),
(4, 'vipul1', '123456', 1, 3),
(5, 'everyone', 'supass', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` int(11) UNSIGNED NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime DEFAULT NULL,
  `facility` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `account`, `check_in`, `check_out`, `facility`) VALUES
(1, 1, '2016-03-04 10:00:00', '2016-03-06 10:00:00', 1),
(2, 2, '2016-03-01 01:00:00', '2016-03-03 01:00:00', 2),
(3, 3, '2016-03-13 06:52:00', '2016-03-15 06:52:00', 3),
(4, 3, '2016-05-13 04:27:55', '2016-05-15 04:27:55', 11),
(5, 1, '2015-04-18 16:17:14', '2015-04-20 16:17:14', 11),
(6, 1, '2015-05-23 14:59:25', '2015-05-25 14:59:25', 20),
(7, 1, '2015-08-10 14:10:14', '2015-08-12 14:10:14', 14),
(8, 1, '2017-04-15 00:00:03', '2017-04-24 03:43:55', 13),
(9, 4, '2017-02-17 01:06:56', '2017-02-19 01:06:56', 11),
(10, 4, '2016-07-29 02:57:27', '2016-07-31 02:57:27', 20),
(11, 3, '2016-12-23 00:27:58', '2016-12-25 00:27:58', 12),
(12, 3, '2015-07-24 11:21:37', '2015-07-26 11:21:37', 20),
(13, 2, '2016-09-03 21:13:32', '2016-09-05 21:13:32', 9),
(14, 1, '2015-07-03 10:45:33', '2015-07-05 10:45:33', 16),
(15, 2, '2016-02-03 16:55:38', '2016-02-05 16:55:38', 13),
(16, 3, '2015-12-10 00:08:27', '2015-12-12 00:08:27', 13),
(17, 3, '2016-02-08 05:52:14', '2016-02-10 05:52:14', 5),
(18, 4, '2016-05-01 13:27:25', '2016-05-03 13:27:25', 3),
(19, 3, '2016-04-11 10:04:03', '2016-04-13 10:04:03', 19),
(20, 1, '2015-05-20 09:19:59', '2015-05-22 09:19:59', 20),
(21, 3, '2016-07-05 11:30:09', '2016-07-07 11:30:09', 14),
(22, 3, '2016-06-18 19:34:01', '2016-06-20 19:34:01', 20),
(23, 3, '2016-03-05 10:35:06', '2016-03-07 10:35:06', 5),
(24, 1, '2015-09-04 08:38:24', '2015-09-06 08:38:24', 13),
(25, 4, '2015-09-28 06:51:14', '2015-09-30 06:51:14', 4),
(26, 2, '2016-10-31 00:15:57', '2016-11-02 00:15:57', 20),
(27, 3, '2015-12-20 04:26:44', '2015-12-22 04:26:44', 15),
(28, 1, '2016-08-30 16:39:00', '2016-09-01 16:39:00', 8),
(29, 3, '2016-06-22 04:41:56', '2016-06-24 04:41:56', 1),
(30, 1, '2017-03-07 20:59:25', '2017-04-22 01:44:16', 9),
(31, 4, '2017-01-04 13:10:22', '2017-01-06 13:10:22', 14),
(32, 2, '2017-02-22 01:35:39', '2017-02-24 01:35:39', 11),
(33, 3, '2017-03-22 23:26:09', '2017-03-24 23:26:09', 18),
(34, 2, '2016-12-08 15:22:25', '2016-12-10 15:22:25', 3),
(35, 3, '2015-05-04 23:41:32', '2015-05-06 23:41:32', 16),
(36, 3, '2015-11-16 17:44:13', '2015-11-18 17:44:13', 4),
(37, 2, '2015-09-25 20:19:26', '2015-09-27 20:19:26', 2),
(38, 2, '2016-03-23 19:18:49', '2016-03-25 19:18:49', 17),
(39, 2, '2016-05-01 22:02:56', '2016-05-03 22:02:56', 7),
(40, 3, '2015-12-04 23:17:13', '2015-12-06 23:17:13', 8),
(41, 2, '2016-02-02 01:27:57', '2016-02-04 01:27:57', 2),
(42, 2, '2016-12-31 15:19:48', '2017-01-02 15:19:48', 3),
(43, 1, '2016-10-04 06:38:07', '2017-04-22 01:44:42', 9),
(44, 4, '2016-12-01 19:53:23', '2016-12-03 19:53:23', 8),
(45, 3, '2016-06-11 23:22:59', '2016-06-13 23:22:59', 8),
(46, 3, '2016-01-23 09:59:54', '2016-01-25 09:59:54', 13),
(47, 4, '2015-12-19 16:08:14', '2015-12-21 16:08:14', 4),
(48, 1, '2015-05-23 05:43:01', '2015-05-25 05:43:01', 4),
(49, 1, '2015-12-21 00:00:26', '2015-12-23 00:00:26', 7),
(50, 1, '2016-11-07 18:50:07', '2016-11-09 18:50:07', 2),
(51, 2, '2016-04-04 17:43:21', '2016-04-06 17:43:21', 2),
(52, 1, '2016-09-05 01:51:01', '2016-09-07 01:51:01', 17),
(53, 3, '2015-10-08 20:48:10', '2015-10-10 20:48:10', 7),
(54, 3, '2016-03-16 00:00:00', '2016-03-23 00:00:00', 48),
(55, 3, '2017-03-25 00:00:00', '2017-03-26 00:00:00', 4),
(56, 3, '2017-03-26 00:00:00', '2017-03-28 00:00:00', 48),
(57, 1, '2017-04-01 00:00:00', '2017-04-22 01:43:59', 42),
(58, 1, '2017-04-24 00:00:00', '2017-04-24 03:53:13', 48);

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE `discount_coupons` (
  `id` int(11) UNSIGNED NOT NULL,
  `coupon` varchar(255) DEFAULT 'You get',
  `valid_through` date NOT NULL,
  `valid_for` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` enum('Available','Redeemed','Expired') NOT NULL,
  `img` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_coupons`
--

INSERT INTO `discount_coupons` (`id`, `coupon`, `valid_through`, `valid_for`, `type`, `value`, `status`, `img`) VALUES
(1, 'You get', '2017-03-10', 0, 'special', '50', 'Available', 'default.png'),
(2, 'Discount', '2017-03-10', 2, 'rate cutter', '5', 'Available', 'default.png'),
(3, 'You get', '2018-02-05', 3, 'Special', '2', 'Expired', 'default.png'),
(4, 'WOw', '2017-04-13', 4, 'Flat', '2', 'Available', 'default.png'),
(5, 'You get', '2017-07-29', 4, 'Flat', '5', 'Redeemed', 'default.png'),
(6, 'Awesome', '2018-01-16', 3, 'Flat', '25', 'Redeemed', 'default.png'),
(7, 'Great', '2017-04-07', 3, 'Rate Cutter', '25', 'Expired', 'default.png'),
(8, 'You get', '2017-09-06', 1, 'Flat', '20', 'Redeemed', 'default.png'),
(9, 'Superb', '2017-08-12', 1, 'Special', '20', 'Expired', 'default.png'),
(10, 'You get', '2017-04-01', 4, 'Special', '2', 'Redeemed', 'default.png'),
(11, 'Yummy deals', '2017-05-24', 0, 'Flat', '25', 'Available', 'default.png'),
(12, 'You get', '2018-01-30', 2, 'Flat', '5', 'Available', 'default.png'),
(13, 'You get', '2017-04-21', 1, 'Flat', '2', 'Redeemed', 'default.png'),
(14, 'You get', '2017-03-06', 4, 'Flat', '25', 'Expired', 'default.png'),
(15, 'You get', '2018-01-11', 3, 'Special', '25', 'Redeemed', 'default.png'),
(16, 'You get', '2017-10-31', 4, 'Rate Cutter', '2', 'Available', 'default.png'),
(17, 'You get', '2017-11-01', 1, 'Rate Cutter', '20', 'Available', 'default.png'),
(18, 'You get', '2017-12-24', 2, 'Special', '25', 'Available', 'default.png'),
(19, 'You get', '2017-06-06', 3, 'Special', '25', 'Available', 'default.png'),
(20, 'You get', '2018-03-15', 3, 'Rate Cutter', '10', 'Redeemed', 'default.png'),
(21, 'You get', '2017-12-15', 3, 'Flat', '25', 'Redeemed', 'default.png'),
(22, 'You get', '2018-02-14', 2, 'Rate Cutter', '25', 'Expired', 'default.png'),
(23, 'You get', '2017-08-18', 2, 'Flat', '10', 'Available', 'default.png'),
(24, 'You get', '2017-07-30', 0, 'Special', '10', 'Available', 'default.png'),
(25, 'You get', '2017-11-24', 4, 'Rate Cutter', '5', 'Expired', 'default.png'),
(26, 'You get', '2017-10-27', 0, 'Rate Cutter', '10', 'Expired', 'default.png'),
(27, 'You get', '2018-02-12', 1, 'Special', '5', 'Expired', 'default.png'),
(28, 'You get', '2017-03-04', 1, 'Special', '10', 'Available', 'default.png'),
(29, 'You get', '2018-01-19', 1, 'Flat', '25', 'Expired', 'default.png'),
(30, 'You get', '2018-02-23', 1, 'Special', '5', 'Available', 'default.png'),
(31, 'You get', '2017-08-15', 2, 'Special', '5', 'Available', 'default.png'),
(32, 'You get', '2017-05-20', 0, 'Rate Cutter', '2', 'Redeemed', 'default.png'),
(33, 'You get', '2017-11-05', 4, 'Special', '20', 'Expired', 'default.png'),
(34, 'You get', '2018-02-19', 3, 'Special', '5', 'Available', 'default.png'),
(35, 'You get', '2018-02-15', 1, 'Rate Cutter', '25', 'Redeemed', 'default.png'),
(36, 'You get', '2017-09-03', 2, 'Rate Cutter', '25', 'Available', 'default.png'),
(37, 'You get', '2017-07-25', 0, 'Special', '25', 'Available', 'default.png'),
(38, 'You get', '2017-12-26', 1, 'Flat', '2', 'Available', 'default.png'),
(39, 'You get', '2017-03-25', 2, 'Rate Cutter', '20', 'Available', 'default.png'),
(40, 'You get', '2017-03-13', 1, 'Flat', '25', 'Available', 'default.png'),
(41, 'You get', '2017-08-06', 3, 'Rate Cutter', '2', 'Redeemed', 'default.png'),
(42, 'You get', '2017-07-27', 0, 'Special', '5', 'Redeemed', 'default.png'),
(43, 'You get', '2017-03-04', 1, 'Flat', '10', 'Redeemed', 'default.png'),
(44, 'You get', '2017-09-09', 4, 'Special', '10', 'Redeemed', 'default.png'),
(45, 'You get', '2017-06-14', 3, 'Rate Cutter', '20', 'Available', 'default.png'),
(46, 'You get', '2017-06-06', 1, 'Special', '2', 'Expired', 'default.png'),
(47, 'You get', '2017-05-10', 1, 'Rate Cutter', '2', 'Available', 'default.png'),
(48, 'You get', '2017-05-14', 1, 'Rate Cutter', '10', 'Expired', 'default.png'),
(49, 'You get', '2017-04-30', 0, 'Flat', '5', 'Redeemed', 'default.png'),
(50, 'You get', '2017-06-18', 0, 'Rate Cutter', '20', 'Expired', 'default.png'),
(51, 'You get', '2017-12-15', 0, 'Flat', '2', 'Available', 'default.png'),
(52, 'You get', '2017-12-07', 0, 'Special', '25', 'Expired', 'default.png'),
(53, 'You get', '2017-11-14', 4, 'Special', '25', 'Available', 'default.png'),
(54, 'You get', '2017-08-23', 2, 'Special', '5', 'Expired', 'default.png'),
(55, 'You get', '2017-06-27', 3, 'Rate Cutter', '20', 'Available', 'default.png'),
(56, 'You get', '2018-02-05', 3, 'Special', '5', 'Available', 'default.png'),
(57, 'You get', '2017-03-12', 4, 'Special', '20', 'Available', 'default.png'),
(58, 'You get', '2017-08-08', 2, 'Flat', '5', 'Available', 'default.png'),
(59, 'You get', '2017-07-30', 0, 'Rate Cutter', '25', 'Expired', 'default.png'),
(60, 'You get', '2017-09-13', 0, 'Rate Cutter', '10', 'Redeemed', 'default.png'),
(61, 'You get', '2017-03-15', 4, 'Rate Cutter', '2', 'Expired', 'default.png'),
(62, 'You get', '2017-05-23', 3, 'Special', '5', 'Available', 'default.png'),
(63, 'You get', '2018-02-08', 0, 'Rate Cutter', '10', 'Available', 'default.png'),
(64, 'You get', '2017-03-10', 3, 'Rate Cutter', '25', 'Expired', 'default.png'),
(65, 'You get', '2017-09-21', 4, 'Rate Cutter', '25', 'Redeemed', 'default.png'),
(66, 'You get', '2017-08-13', 1, 'Rate Cutter', '25', 'Expired', 'default.png'),
(67, 'You get', '2017-03-27', 4, 'Rate Cutter', '20', 'Expired', 'default.png'),
(68, 'You get', '2017-04-07', 2, 'Rate Cutter', '10', 'Expired', 'default.png'),
(69, 'You get', '2017-05-24', 4, 'Flat', '25', 'Available', 'default.png'),
(70, 'You get', '2017-09-28', 4, 'Special', '25', 'Redeemed', 'default.png'),
(71, 'You get', '2017-08-23', 3, 'Rate Cutter', '2', 'Available', 'default.png'),
(72, 'You get', '2017-11-18', 3, 'Rate Cutter', '10', 'Available', 'default.png'),
(73, 'You get', '2017-03-28', 4, 'Special', '2', 'Redeemed', 'default.png'),
(74, 'You get', '2017-09-03', 3, 'Flat', '25', 'Available', 'default.png'),
(75, 'You get', '2017-06-15', 1, 'Special', '2', 'Available', 'default.png'),
(76, 'You get', '2017-06-27', 4, 'Flat', '2', 'Expired', 'default.png'),
(77, 'You get', '2018-02-02', 4, 'Flat', '10', 'Available', 'default.png'),
(78, 'You get', '2018-01-14', 4, 'Flat', '20', 'Expired', 'default.png'),
(79, 'You get', '2017-07-28', 2, 'Special', '5', 'Available', 'default.png'),
(80, 'You get', '2017-07-03', 1, 'Rate Cutter', '10', 'Expired', 'default.png'),
(81, 'You get', '2018-02-16', 4, 'Rate Cutter', '25', 'Expired', 'default.png'),
(82, 'You get', '2017-08-06', 1, 'Special', '25', 'Redeemed', 'default.png'),
(83, 'You get', '2017-11-04', 3, 'Rate Cutter', '5', 'Expired', 'default.png'),
(84, 'You get', '2017-06-06', 0, 'Flat', '20', 'Redeemed', 'default.png'),
(85, 'You get', '2017-06-25', 3, 'Rate Cutter', '10', 'Expired', 'default.png'),
(86, 'You get', '2017-07-24', 0, 'Flat', '10', 'Redeemed', 'default.png'),
(87, 'You get', '2017-11-09', 0, 'Rate Cutter', '2', 'Redeemed', 'default.png'),
(88, 'You get', '2017-05-06', 2, 'Flat', '5', 'Redeemed', 'default.png'),
(89, 'You get', '2017-03-20', 3, 'Special', '10', 'Expired', 'default.png'),
(90, 'You get', '2017-11-06', 0, 'Special', '20', 'Available', 'default.png'),
(91, 'You get', '2018-01-15', 3, 'Rate Cutter', '10', 'Available', 'default.png'),
(92, 'You get', '2017-06-16', 3, 'Special', '25', 'Expired', 'default.png'),
(93, 'You get', '2018-01-27', 2, 'Flat', '10', 'Expired', 'default.png'),
(94, 'You get', '2017-04-21', 4, 'Flat', '25', 'Available', 'default.png'),
(95, 'You get', '2017-09-21', 3, 'Flat', '20', 'Redeemed', 'default.png'),
(96, 'You get', '2017-05-26', 4, 'Rate Cutter', '10', 'Expired', 'default.png'),
(97, 'You get', '2017-07-27', 4, 'Flat', '5', 'Available', 'default.png'),
(98, 'You get', '2018-01-11', 2, 'Flat', '20', 'Expired', 'default.png'),
(99, 'You get', '2017-11-21', 4, 'Rate Cutter', '25', 'Expired', 'default.png'),
(100, 'You get', '2017-07-20', 4, 'Special', '5', 'Redeemed', 'default.png'),
(101, 'You get', '2018-01-15', 0, 'Special', '2', 'Expired', 'default.png'),
(102, 'You get', '2017-03-03', 3, 'Rate Cutter', '2', 'Available', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('Deluxe Suite','Diamond Room','Golden Room','Silver Room','Hall','Table') NOT NULL DEFAULT 'Silver Room',
  `number` int(5) NOT NULL,
  `floor` int(3) NOT NULL,
  `capacity` int(5) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `charges` int(6) UNSIGNED NOT NULL DEFAULT '12000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `title`, `type`, `number`, `floor`, `capacity`, `available`, `img`, `charges`) VALUES
(1, 'Deluxe', 'Hall', 2, 5, 50, 1, '1490062697-5629-c1.jpg', 12000),
(2, 'Beach Side', 'Golden Room', 1, 1, 5, 1, '1490062720-8617-c2.jpg', 12000),
(3, 'Pool side', 'Silver Room', 1, 1, 2, 1, '1490062753-6854-c3.jpg', 12000),
(4, 'Cummings', 'Diamond Room', 30, 2, 2, 0, 'default.jpg', 12000),
(5, 'Pitts', 'Hall', 63, 4, 50, 0, 'default.jpg', 12000),
(6, 'Santiago', 'Golden Room', 59, 6, 2, 0, 'default.jpg', 12000),
(7, 'Valenzuela', 'Table', 25, 1, 5, 0, 'default.jpg', 12000),
(8, 'Conner', 'Diamond Room', 58, 6, 2, 1, 'default.jpg', 12000),
(9, 'Irwin', 'Golden Room', 57, 1, 2, 1, 'default.jpg', 12000),
(10, 'Wright', 'Table', 25, 4, 10, 0, 'default.jpg', 12000),
(11, 'Garrison', 'Silver Room', 21, 5, 2, 1, 'default.jpg', 12000),
(12, 'Miranda', 'Golden Room', 40, 4, 2, 1, 'default.jpg', 12000),
(13, 'Porter', 'Silver Room', 48, 1, 2, 1, 'default.jpg', 12000),
(14, 'Mclaughlin', 'Table', 67, 5, 5, 1, 'default.jpg', 12000),
(15, 'Palmer', 'Golden Room', 88, 4, 2, 0, 'default.jpg', 12000),
(16, 'Dunlap', 'Diamond Room', 75, 2, 2, 0, 'default.jpg', 12000),
(17, 'Rutledge', 'Silver Room', 88, 1, 2, 0, 'default.jpg', 12000),
(18, 'Ortega', 'Golden Room', 53, 1, 2, 0, 'default.jpg', 12000),
(19, 'Howe', 'Silver Room', 48, 6, 2, 0, 'default.jpg', 12000),
(20, 'Strong', 'Table', 24, 4, 10, 0, 'default.jpg', 12000),
(21, 'Mcfadden', 'Golden Room', 67, 5, 2, 1, 'default.jpg', 12000),
(22, 'Forbes', 'Silver Room', 28, 2, 4, 1, 'default.jpg', 12000),
(23, 'Whitehead', 'Silver Room', 20, 1, 2, 1, 'default.jpg', 12000),
(24, 'Coffey', 'Golden Room', 69, 6, 2, 1, 'default.jpg', 12000),
(25, 'Griffin', 'Hall', 30, 3, 50, 1, 'default.jpg', 12000),
(26, 'Perry', 'Silver Room', 27, 6, 4, 0, 'default.jpg', 12000),
(27, 'Beck', 'Golden Room', 9, 3, 2, 1, 'default.jpg', 12000),
(28, 'Salinas', 'Diamond Room', 90, 4, 2, 1, 'default.jpg', 12000),
(29, 'Hurley', 'Silver Room', 42, 4, 2, 0, 'default.jpg', 12000),
(30, 'Mccall', 'Table', 44, 1, 10, 1, 'default.jpg', 12000),
(31, 'Herring', 'Silver Room', 98, 4, 2, 1, 'default.jpg', 12000),
(32, 'Campbell', 'Diamond Room', 18, 6, 2, 0, 'default.jpg', 12000),
(33, 'Barron', 'Golden Room', 50, 6, 2, 0, 'default.jpg', 12000),
(34, 'Kane', 'Silver Room', 96, 6, 4, 0, 'default.jpg', 12000),
(35, 'Glenn', 'Hall', 66, 2, 50, 0, 'default.jpg', 12000),
(36, 'Peck', 'Golden Room', 94, 2, 2, 0, 'default.jpg', 12000),
(37, 'Rutledge', 'Silver Room', 60, 5, 2, 1, 'default.jpg', 12000),
(38, 'Collier', 'Silver Room', 25, 1, 4, 1, 'default.jpg', 12000),
(39, 'Medina', 'Golden Room', 30, 2, 2, 1, 'default.jpg', 12000),
(40, 'Ortega', 'Table', 84, 1, 10, 1, 'default.jpg', 12000),
(41, 'Pruitt', 'Silver Room', 93, 1, 2, 1, 'default.jpg', 12000),
(42, 'Scott', 'Golden Room', 40, 1, 2, 1, 'default.jpg', 12000),
(43, 'Rasmussen', 'Silver Room', 48, 2, 2, 0, 'default.jpg', 12000),
(44, 'Duncan', 'Hall', 46, 1, 153, 0, 'default.jpg', 12000),
(45, 'Chavez', 'Table', 31, 1, 5, 0, 'default.jpg', 12000),
(46, 'Foreman', 'Hall', 90, 4, 163, 0, 'default.jpg', 12000),
(47, 'Kline', 'Hall', 81, 5, 260, 1, 'default.jpg', 12000),
(48, 'Good', 'Table', 14, 5, 2, 0, 'default.jpg', 12000),
(49, 'Kim', 'Hall', 24, 5, 203, 0, 'default.jpg', 12000),
(50, 'Burgess', 'Table', 38, 5, 10, 0, 'default.jpg', 12000),
(51, 'Gillespie', 'Hall', 98, 6, 285, 0, 'default.jpg', 12000),
(52, 'Evans', 'Hall', 38, 1, 317, 1, 'default.jpg', 12000),
(53, 'Gillespie', 'Hall', 79, 6, 425, 0, 'default.jpg', 12000),
(54, 'Mayo', 'Table', 7, 2, 5, 1, 'default.jpg', 12000),
(55, 'Klein', 'Hall', 12, 4, 91, 1, 'default.jpg', 12000),
(56, 'Mccarty', 'Table', 18, 6, 4, 1, 'default.jpg', 12000),
(57, 'Bradley', 'Hall', 92, 1, 250, 0, 'default.jpg', 12000),
(58, 'Larson', 'Hall', 62, 1, 355, 1, 'default.jpg', 12000),
(59, 'Kelly', 'Hall', 9, 1, 17, 0, 'default.jpg', 12000),
(60, 'Sutton', 'Table', 70, 2, 10, 0, 'default.jpg', 12000),
(61, 'Wise', 'Hall', 80, 2, 180, 1, 'default.jpg', 12000),
(62, 'Stevenson', 'Hall', 34, 2, 337, 1, 'default.jpg', 12000),
(63, 'Case', 'Table', 66, 1, 5, 0, 'default.jpg', 12000),
(64, 'Cash', 'Table', 88, 3, 4, 0, 'default.jpg', 12000),
(65, 'Day', 'Hall', 67, 4, 420, 0, 'default.jpg', 12000),
(66, 'Lopez', 'Table', 96, 5, 2, 1, 'default.jpg', 12000),
(67, 'Quinn', 'Hall', 44, 3, 99, 0, 'default.jpg', 12000),
(68, 'Hale', 'Hall', 2, 3, 140, 1, 'default.jpg', 12000),
(69, 'Townsend', 'Hall', 4, 2, 188, 1, 'default.jpg', 12000),
(70, 'Mclean', 'Table', 21, 2, 10, 1, 'default.jpg', 12000),
(71, 'Cunningham', 'Hall', 13, 6, 149, 1, 'default.jpg', 12000),
(72, 'Mccoy', 'Table', 16, 6, 5, 0, 'default.jpg', 12000),
(73, 'Landry', 'Hall', 32, 5, 189, 1, 'default.jpg', 12000),
(74, 'Keller', 'Hall', 13, 2, 274, 0, 'default.jpg', 12000),
(75, 'Cote', 'Hall', 11, 3, 39, 0, 'default.jpg', 12000),
(76, 'Osborn', 'Hall', 97, 1, 355, 0, 'default.jpg', 12000),
(77, 'Trujillo', 'Hall', 73, 3, 408, 0, 'default.jpg', 12000),
(78, 'Middleton', 'Table', 90, 4, 2, 0, 'default.jpg', 12000),
(79, 'Huber', 'Hall', 78, 5, 366, 1, 'default.jpg', 12000),
(80, 'Wynn', 'Table', 57, 6, 10, 1, 'default.jpg', 12000),
(81, 'Wood', 'Table', 83, 5, 5, 0, 'default.jpg', 12000),
(82, 'Monroe', 'Hall', 95, 6, 487, 0, 'default.jpg', 12000),
(83, 'Dudley', 'Hall', 59, 3, 412, 1, 'default.jpg', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `manager` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `address`, `manager`, `img`) VALUES
(1, 'MANDY', 'BASANT AVENUE', 1, '1490062817-1530-b2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(100) UNSIGNED NOT NULL,
  `booking` int(11) UNSIGNED NOT NULL,
  `generation_date` datetime NOT NULL,
  `total_amount` int(5) NOT NULL,
  `discount` int(11) NOT NULL,
  `amount_payable` int(11) NOT NULL,
  `status` enum('Generated','Paid','Over due','Waived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `booking`, `generation_date`, `total_amount`, `discount`, `amount_payable`, `status`) VALUES
(1, 50, '2017-03-09 01:05:00', 5000, 1, 2500, 'Paid'),
(2, 57, '2017-04-22 01:43:59', 252000, 38, 251996, 'Paid'),
(3, 30, '2017-04-22 01:44:16', 551230, 30, 493017, 'Paid'),
(5, 43, '2017-04-22 01:44:42', 2405000, 17, 2399960, 'Paid'),
(6, 8, '2017-04-24 03:43:55', 108000, 30, 97470, 'Paid'),
(7, 58, '2017-04-24 03:53:13', 3480, 24, 2818, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `hotel` int(11) UNSIGNED NOT NULL,
  `description` text,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item`, `price`, `hotel`, `description`, `img`) VALUES
(1, 'Sushi', 500, 1, 'The best and special.', '1490069112-8778-f1.jpg'),
(2, 'Salad', 250, 1, 'The spicy one in our menu!', '1490069230-4007-f3.jpg'),
(3, 'Garlic Special', 100, 1, 'For those who love Gralic', '1490069271-8600-f2.jpg'),
(4, 'Onion Special', 160, 1, 'Mouth watering.', '1490069300-3481-f4.jpg'),
(5, 'Cousine', 750, 1, 'Hotel Special', '1490069343-9633-f5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_booking`
--

CREATE TABLE `order_booking` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` int(11) UNSIGNED NOT NULL,
  `booking` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_booking`
--

INSERT INTO `order_booking` (`id`, `account`, `booking`, `date`) VALUES
(1, 1, 43, '2016-06-12 08:47:07'),
(2, 1, 48, '2016-06-09 22:11:48'),
(3, 1, 30, '2016-06-13 11:42:11'),
(4, 1, 49, '2017-03-24 01:09:49'),
(5, 1, 50, '2016-06-28 22:42:23'),
(6, 1, 20, '2017-09-10 23:49:49'),
(7, 1, 1, '2017-04-20 18:22:25'),
(8, 1, 52, '2017-02-02 00:53:22'),
(9, 1, 14, '2016-06-20 21:56:21'),
(10, 1, 14, '2016-10-06 00:40:02'),
(11, 1, 30, '2016-09-03 03:45:26'),
(12, 1, 49, '2016-04-01 07:07:22'),
(13, 1, 20, '2017-08-08 23:06:03'),
(14, 1, 24, '2017-01-03 03:40:15'),
(15, 1, 1, '2017-03-11 10:13:52'),
(16, 1, 50, '2016-08-04 07:09:57'),
(17, 1, 52, '2017-05-11 18:07:04'),
(18, 1, 28, '2017-11-21 02:05:16'),
(19, 1, 24, '2018-02-19 18:01:10'),
(20, 1, 30, '2018-01-03 01:40:02'),
(21, 1, 5, '2016-07-21 17:39:05'),
(22, 1, 5, '2016-12-20 13:04:21'),
(23, 1, 6, '2016-03-30 23:23:00'),
(24, 1, 30, '2016-07-15 15:10:41'),
(25, 1, 6, '2017-01-09 04:55:46'),
(26, 1, 5, '2017-02-02 16:28:56'),
(27, 1, 28, '2017-12-15 01:58:10'),
(28, 1, 30, '2017-12-05 17:22:47'),
(29, 1, 1, '2016-06-03 23:56:47'),
(30, 1, 50, '2018-01-14 17:29:52'),
(31, 1, 28, '2017-05-31 07:00:46'),
(32, 1, 7, '2016-07-17 19:22:41'),
(33, 1, 49, '2017-07-24 18:26:51'),
(34, 1, 50, '2017-11-23 10:26:10'),
(35, 1, 20, '2017-05-30 18:35:33'),
(36, 1, 6, '2017-11-21 07:13:37'),
(37, 1, 14, '2017-08-04 08:36:46'),
(38, 1, 30, '2017-02-09 17:20:45'),
(39, 1, 49, '2017-04-11 13:43:13'),
(40, 1, 30, '2016-08-06 14:20:42'),
(41, 1, 43, '2018-03-06 18:15:51'),
(42, 1, 28, '2016-06-19 18:55:04'),
(43, 1, 8, '2018-03-10 22:26:24'),
(44, 1, 52, '2017-09-13 07:48:12'),
(45, 1, 5, '2016-10-31 03:31:19'),
(46, 1, 49, '2018-02-01 21:20:03'),
(47, 1, 50, '2016-05-05 21:46:41'),
(48, 1, 14, '2017-02-21 06:18:37'),
(49, 1, 50, '2018-01-28 10:05:42'),
(50, 1, 6, '2016-06-11 06:04:20'),
(51, 1, 43, '2017-03-24 08:44:52'),
(52, 1, 30, '2017-03-24 08:52:55'),
(53, 1, 30, '2017-03-24 08:53:28'),
(54, 1, 53, '2017-03-24 08:55:27'),
(55, 1, 53, '2017-03-24 09:00:07'),
(56, 1, 30, '2017-03-24 09:02:56'),
(57, 1, 30, '2017-03-24 09:05:41'),
(58, 1, 30, '2017-03-24 09:13:43'),
(59, 1, 30, '2017-03-25 17:17:22'),
(60, 1, 30, '2017-03-25 17:17:52'),
(61, 3, 55, '2017-03-25 17:45:48'),
(62, 3, 56, '2017-03-25 17:50:51'),
(63, 1, 30, '2017-04-02 13:16:18'),
(64, 1, 58, '2017-04-24 09:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `menu_item` int(11) UNSIGNED NOT NULL,
  `quantity` int(5) NOT NULL,
  `status` enum('Booked','Under Process','On the way','Delivered','Failed') NOT NULL DEFAULT 'Booked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_contents`
--

INSERT INTO `order_contents` (`id`, `order_id`, `menu_item`, `quantity`, `status`) VALUES
(1, 1, 1, 1, 'Failed'),
(2, 20, 1, 10, 'Failed'),
(3, 37, 2, 9, 'Delivered'),
(4, 13, 5, 6, 'Delivered'),
(5, 49, 3, 4, 'Under Process'),
(6, 28, 1, 8, 'Failed'),
(7, 42, 5, 1, 'On the way'),
(8, 32, 3, 3, 'Delivered'),
(9, 43, 3, 9, 'Failed'),
(10, 50, 3, 1, 'Delivered'),
(11, 2, 2, 1, 'On the way'),
(12, 40, 3, 6, 'Failed'),
(13, 42, 3, 7, 'Delivered'),
(14, 7, 4, 1, 'On the way'),
(15, 6, 4, 8, 'Under Process'),
(16, 39, 2, 4, 'Delivered'),
(17, 14, 3, 7, 'Under Process'),
(18, 1, 1, 10, 'Delivered'),
(19, 12, 3, 4, 'Delivered'),
(20, 27, 5, 5, 'On the way'),
(21, 19, 1, 10, 'Delivered'),
(22, 48, 3, 5, 'On the way'),
(23, 35, 2, 5, 'On the way'),
(24, 23, 4, 1, 'Booked'),
(25, 31, 1, 3, 'On the way'),
(26, 17, 2, 8, 'Booked'),
(27, 31, 2, 9, 'Booked'),
(28, 18, 3, 10, 'Under Process'),
(29, 20, 3, 2, 'Delivered'),
(30, 27, 3, 2, 'On the way'),
(31, 40, 5, 3, 'Delivered'),
(32, 15, 2, 6, 'Delivered'),
(33, 12, 4, 10, 'Delivered'),
(34, 22, 4, 1, 'On the way'),
(35, 15, 4, 1, 'Under Process'),
(36, 48, 2, 1, 'Delivered'),
(37, 48, 4, 1, 'On the way'),
(38, 23, 5, 2, 'Under Process'),
(39, 40, 4, 9, 'Failed'),
(40, 2, 3, 9, 'On the way'),
(41, 12, 2, 10, 'Under Process'),
(42, 38, 4, 8, 'Delivered'),
(43, 9, 2, 10, 'Delivered'),
(44, 30, 1, 9, 'Under Process'),
(45, 30, 5, 10, 'On the way'),
(46, 12, 2, 3, 'On the way'),
(47, 38, 5, 3, 'Delivered'),
(48, 13, 4, 5, 'Booked'),
(49, 30, 5, 8, 'Delivered'),
(50, 44, 5, 2, 'Delivered'),
(51, 27, 3, 3, 'Booked'),
(52, 51, 1, 52, 'Failed'),
(53, 51, 1, 4, 'Failed'),
(54, 52, 1, 1, 'Failed'),
(55, 52, 1, 3, 'Failed'),
(56, 53, 1, 1, 'Failed'),
(57, 54, 1, 1, 'Booked'),
(58, 55, 1, 5, 'Delivered'),
(59, 55, 1, 3, 'Booked'),
(60, 56, 1, 10, 'Delivered'),
(61, 57, 1, 1, 'Failed'),
(62, 58, 3, 5, 'Failed'),
(63, 58, 5, 1, 'Failed'),
(64, 59, 4, 3, 'Failed'),
(65, 60, 2, 1, 'Delivered'),
(66, 61, 4, 7, 'Booked'),
(67, 62, 1, 2, 'Booked'),
(68, 63, 1, 1, 'Failed'),
(69, 63, 2, 1, 'Failed'),
(70, 64, 4, 3, 'Delivered'),
(71, 64, 5, 4, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` text,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `anniversary` date DEFAULT NULL,
  `img` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `dob`, `anniversary`, `img`) VALUES
(1, 'Mandeep', 'Kaur', '65 Jalandhar', '00002', 'mandeepshabina@gmail.com', '1993-07-27', '1993-07-27', '1490066978-2223-p1.jpg'),
(2, 'Lakshay', 'Verma', '8, 14 Jalandhar Cantt', '9779333346', 'verma_lakshay@live.in', '1993-10-31', '2011-03-25', '1493006094-5059-clown.png'),
(3, 'Vipul', 'Gupta', 'Adarsh Nagar Jalandhar', '123485', 'vipulgupta@gmail.com', '1993-10-15', '2017-03-05', '1490142904-9391-g1.jpg'),
(4, 'Tarun', 'Veer', 'BASANT AVENUE', '5555', 'tarun@gmail.com', '1993-07-07', '2017-03-03', '1490142885-1297-images.png'),
(5, 'Rohit', 'Kural', 'deep nagar', '21', 'rohit@gmail.com', '1990-04-29', '2015-01-19', '1490142930-6673-g3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `couponfor_idx` (`valid_for`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `generated_idx` (`booking`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_booking`
--
ALTER TABLE `order_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_idx` (`account`),
  ADD KEY `forbooking_idx` (`booking`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_item_idx` (`menu_item`),
  ADD KEY `ordered_into_idx` (`order_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_booking`
--
ALTER TABLE `order_booking`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `generated` FOREIGN KEY (`booking`) REFERENCES `booking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_booking`
--
ALTER TABLE `order_booking`
  ADD CONSTRAINT `forbooking` FOREIGN KEY (`booking`) REFERENCES `booking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`account`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD CONSTRAINT `item` FOREIGN KEY (`menu_item`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ordered_into` FOREIGN KEY (`order_id`) REFERENCES `order_booking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
