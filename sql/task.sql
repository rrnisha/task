-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2014 at 05:36 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_type` enum('individual','company') NOT NULL,
  `phone_mobile` varchar(15) NOT NULL,
  `phone_home` varchar(15) NOT NULL,
  `phone_office` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `pan_tan` varchar(15) NOT NULL,
  `genius_id` varchar(15) NOT NULL,
  `file_id` varchar(15) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `full_name`, `client_type`, `phone_mobile`, `phone_home`, `phone_office`, `email`, `address`, `pan_tan`, `genius_id`, `file_id`, `create_date`, `update_date`, `status`) VALUES
(3, 'Mr', 'test client fn test client ln', 'individual', '9876543210', '9876543210', '9876543210', 'testc@client.com', 'add address 1231', 'ASD123QE45', 'TG01', 'TF01', '2013-05-15 11:13:43', '2013-07-17 12:35:52', 'inactive'),
(4, 'Mfrs', 'time company', 'company', '1234567890', '08012345678', '08098765432', 'time@time.com', 'time, kk nagar, chennai', 'CSD123QE45', 'FG02', 'TF02', '2013-05-16 10:26:33', '2013-05-16 10:26:33', 'active'),
(5, 'Ms', 'Test First Name Test Last Name', 'individual', '1234567890', '08012345678', '08098765432', 'test11@test.com', 'test', 'ASD123QE45', 'TG101', 'TF012', '2013-05-18 22:48:10', '2013-07-17 12:35:57', 'inactive'),
(6, 'Mfrs', 'new client', 'company', '9988776655', '9988776655', '9988776655', 'newclient@client.com', 'new client address', 'ASDFQE123K', 'TG109', 'TF109', '2013-05-25 23:18:50', '2013-07-17 12:33:56', 'inactive'),
(7, 'Mr', 'Rishi Shankar Rengasamy', 'individual', '9980521439', '9980521439', '9980521439', 'r.rishishankar@gmail.com', 'T6 SAI KINGSDALE Apartment,\r\n128/3 Horamanv Agara Road,\r\nBank Avenue Extension,\r\nBabusapalaya,\r\nBangalore - 560043', 'SHUOT2660N', 'R101', 'R101', '2013-06-24 17:31:45', '2013-06-24 17:31:45', 'active'),
(8, 'Mrs', 'Hima', 'company', '9988776655', '9988776655', '9988776655', 'hima@sram.com', 'August, \r\nAnnaji Road\r\nKK Nagar\r\nChennai', 'QAWS1234ED', 'H101', 'H101', '2013-06-25 09:55:27', '2014-03-22 12:37:35', 'active'),
(9, 'Mfrs', 'Pandyan Industrial Equipments ', 'company', '9876543210', '9876543210', '9876543210', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1000', 'F1000', '2013-07-16 19:27:34', '2013-07-16 19:27:34', 'active'),
(10, 'Mfrs', 'Patco Precision Components (p) Ltd', 'company', '9876543210', '9876543210', '9876543210', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1001', 'F1001', '2013-07-16 19:28:17', '2013-07-16 19:28:17', 'active'),
(11, 'Mr', 'Pauline george', 'individual', '9876543210', '9876543210', '9876543210', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1002', 'F1002', '2013-07-16 19:28:55', '2013-07-16 19:28:55', 'active'),
(12, 'Mr', 'Ponnivalavan', 'individual', '9876543210', '9876543210', '9876543210', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1003', 'F1003', '2013-07-16 19:29:27', '2013-07-16 19:29:27', 'active'),
(13, 'Mfrs', 'Powermatic Packaging pvt ltd', 'company', '9876543210', '9876543210', '9876543210', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1004', 'F1004', '2013-07-16 19:30:07', '2013-07-16 19:30:07', 'active'),
(14, 'Mr', 'Pakkirisamy Natarajan', 'individual', '9876543210', '9876543210', '9876543210', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1005', 'F1005', '2013-07-16 19:31:43', '2013-07-16 19:31:43', 'active'),
(15, 'Mfrs', 'Pakkirisamy Group', 'company', '9876543210', '9876543210', '9876543210', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1006', 'F1006', '2013-07-16 19:32:10', '2013-07-16 19:32:10', 'active'),
(16, 'Mfrs', 'Reframe Softtech (p) Ltd', 'company', '9876543210', '9876543210', '9876543210', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1007', 'F1007', '2013-07-16 20:30:24', '2013-07-17 12:31:04', 'active'),
(17, 'Mr', 'Balaji Andrews', 'individual', '9999999999', '044 23643710', '044 22222222', 'balahi@gmail.com', 'kk nagar\r\nchennai\r\ntn', 'AAAAB1234H', 'G1006', '250', '2013-07-17 12:14:05', '2013-07-21 00:01:04', 'active'),
(18, 'Mfrs', 'Test', 'company', '9876543210', '', '04487654321', 'a@a.com', 'Chennai', 'QWEIP2668V', 'G1', 'F1', '2014-03-22 18:25:10', '2014-03-22 18:25:10', 'active'),
(19, 'Mr', 'test100', 'individual', '9876543210', '', '', '', 'Chennai', 'QEELK2779V', 'g10', 'f10', '2014-03-30 00:14:46', '2014-03-30 00:41:33', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `register_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `particulars` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `status` enum('inward','outward') NOT NULL,
  `by_employee` int(11) NOT NULL,
  `mode_of_receipt` enum('in_person','email','courier','other','post') NOT NULL,
  `row_status` enum('active','deleted') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`register_id`, `doc_id`, `particulars`, `quantity`, `tag`, `status`, `by_employee`, `mode_of_receipt`, `row_status`, `create_date`, `update_date`) VALUES
(19, 27, 'asdf', 0, 'e1', 'outward', 10, 'email', 'active', '2014-03-22 14:11:55', '2014-03-23 12:29:09'),
(20, 28, 'asdf', 0, 'asd411', 'inward', 6, 'in_person', 'active', '2014-03-22 14:19:34', '2014-03-22 23:53:12'),
(20, 29, 'weqr', 0, 'wqer11', 'inward', 6, 'in_person', 'active', '2014-03-22 14:23:43', '2014-03-22 23:53:12'),
(20, 30, 'xzcv', 0, 'zxcv1', 'inward', 6, 'in_person', 'deleted', '2014-03-22 14:25:22', '2014-03-22 14:45:45'),
(19, 31, 'qewr', 0, 'w3', 'outward', 10, 'in_person', 'active', '2014-03-22 14:31:05', '2014-03-23 12:28:27'),
(19, 32, 'zcvv', 0, 'z1', 'outward', 7, 'email', 'active', '2014-03-22 14:38:56', '2014-03-23 14:02:38'),
(20, 33, 'est', 0, 'qe41', 'inward', 6, 'in_person', 'active', '2014-03-22 23:27:41', '2014-03-22 23:53:12'),
(20, 34, 'time', 0, 'tim11', 'outward', 6, 'in_person', 'active', '2014-03-22 23:49:24', '2014-03-23 22:43:11'),
(21, 35, 'Tds challn mar 14', 0, 'tds file', 'outward', 7, 'email', 'active', '2014-03-23 12:05:49', '2014-03-23 22:43:53'),
(22, 36, 'cash book bank book sales register', 0, 'T5', 'inward', 10, 'in_person', 'active', '2014-03-23 12:13:20', '2014-03-23 12:16:50'),
(23, 37, 'cash book', 0, 'T5', 'inward', 7, 'email', 'active', '2014-03-23 12:24:41', '2014-03-23 12:27:12'),
(23, 38, 'bank book', 0, 'T5', 'outward', 12, 'email', 'active', '2014-03-23 12:24:42', '2014-03-23 12:27:30'),
(19, 39, '', 0, '', 'outward', 0, '', 'deleted', '2014-03-23 12:29:30', '2014-03-23 13:56:28'),
(19, 40, '', 0, '', 'outward', 0, '', 'deleted', '2014-03-23 14:00:46', '2014-03-23 14:01:13'),
(19, 41, '', 0, '', 'outward', 0, '', 'deleted', '2014-03-23 14:00:46', '2014-03-23 14:01:13'),
(19, 42, '', 0, '', 'outward', 0, '', 'deleted', '2014-03-23 14:00:46', '2014-03-23 14:01:13'),
(19, 43, '', 0, '', 'outward', 0, '', 'deleted', '2014-03-23 14:00:46', '2014-03-23 14:01:13'),
(19, 44, '', 0, '', 'outward', 0, '', 'deleted', '2014-03-23 14:00:46', '2014-03-23 14:01:13'),
(19, 45, '', 0, '', 'outward', 0, '', 'deleted', '2014-03-23 14:00:46', '2014-03-23 14:01:13'),
(19, 46, '', 0, '', 'outward', 0, '', 'deleted', '2014-03-23 14:00:46', '2014-03-23 14:01:13'),
(19, 47, '', 0, '', 'outward', 0, '', 'active', '2014-03-23 16:16:37', '0000-00-00 00:00:00'),
(24, 48, '', 0, '', 'inward', 0, '', 'active', '2014-03-23 16:22:55', '0000-00-00 00:00:00'),
(25, 49, '', 0, '', 'inward', 6, 'email', 'active', '2014-03-23 16:28:10', '0000-00-00 00:00:00'),
(26, 50, 'asdf', 0, 'adsf', 'inward', 6, 'in_person', 'active', '2014-03-23 17:02:00', '2014-03-23 17:04:47'),
(26, 51, 'qwer', 0, 'qwer', 'inward', 6, 'in_person', 'active', '2014-03-23 17:06:09', '0000-00-00 00:00:00'),
(27, 52, '1st book', 0, '1', 'inward', 7, 'email', 'active', '2014-03-23 17:06:51', '2014-03-23 22:42:51'),
(27, 53, '2nd book', 0, '2', 'outward', 6, 'in_person', 'active', '2014-03-23 17:07:34', '2014-03-23 19:10:24'),
(27, 54, '3rd book', 0, '3', 'outward', 6, 'in_person', 'active', '2014-03-23 17:14:08', '2014-03-23 19:10:51'),
(27, 55, '4th book', 0, '4', 'outward', 6, 'email', 'active', '2014-03-23 17:18:13', '2014-03-23 22:40:36'),
(28, 56, 'asdf', 0, 'asdf', 'inward', 6, 'in_person', 'active', '2014-03-23 17:30:44', '2014-03-23 22:41:06'),
(29, 57, '', 0, '', 'inward', 0, '', 'active', '2014-03-30 01:08:39', '0000-00-00 00:00:00'),
(30, 58, 'asdf', 0, 'T51', 'inward', 6, 'in_person', 'active', '2014-03-30 16:30:18', '2014-03-30 16:30:47'),
(30, 59, 'cash book', 0, 'T51', 'inward', 6, 'in_person', 'active', '2014-03-30 16:30:18', '2014-03-30 16:30:47'),
(31, 60, 'adsf', 0, 'T5', 'inward', 6, 'in_person', 'deleted', '2014-03-30 16:31:36', '2014-03-30 17:33:28'),
(31, 61, 'qwr', 0, 'T52', 'inward', 6, 'in_person', 'deleted', '2014-03-30 16:49:42', '2014-03-30 17:32:47'),
(31, 62, 'iuio', 0, 'T51', 'inward', 9, 'email', 'active', '2014-03-30 17:32:47', '2014-03-30 17:33:19'),
(32, 63, '', 0, '', 'inward', 0, '', 'active', '2014-03-30 17:45:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doc_trans`
--

CREATE TABLE IF NOT EXISTS `doc_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `reg_status` enum('inward','outward','in_out') NOT NULL,
  `trans_date` datetime NOT NULL,
  `trans_type` enum('inward','outward','create','edit','delete') NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=214 ;

--
-- Dumping data for table `doc_trans`
--

INSERT INTO `doc_trans` (`id`, `register_id`, `doc_id`, `emp_id`, `reg_status`, `trans_date`, `trans_type`, `create_date`) VALUES
(61, 19, 27, 9, 'inward', '2014-03-22 14:11:55', 'create', '2014-03-22 14:11:55'),
(62, 19, 27, 9, 'inward', '2014-03-22 14:12:52', 'edit', '2014-03-22 14:12:52'),
(63, 20, 28, 9, 'inward', '2014-03-22 14:19:34', 'create', '2014-03-22 14:19:34'),
(64, 20, 28, 9, 'inward', '2014-03-22 14:19:44', 'edit', '2014-03-22 14:19:44'),
(65, 20, 28, 9, 'inward', '2014-03-22 14:23:43', 'edit', '2014-03-22 14:23:43'),
(66, 20, 29, 9, 'inward', '2014-03-22 14:23:43', 'create', '2014-03-22 14:23:43'),
(67, 20, 30, 9, 'inward', '2014-03-22 14:25:22', 'create', '2014-03-22 14:25:22'),
(68, 19, 31, 9, 'inward', '2014-03-22 14:31:05', 'create', '2014-03-22 14:31:05'),
(69, 19, 32, 9, 'inward', '2014-03-22 14:38:56', 'create', '2014-03-22 14:38:56'),
(70, 19, 32, 9, 'inward', '2014-03-22 14:39:18', 'edit', '2014-03-22 14:39:18'),
(71, 19, 27, 9, 'outward', '2014-03-22 14:39:30', 'outward', '2014-03-22 14:39:30'),
(72, 19, 31, 9, 'outward', '2014-03-22 14:39:30', 'outward', '2014-03-22 14:39:30'),
(73, 19, 32, 9, 'outward', '2014-03-22 14:39:30', 'outward', '2014-03-22 14:39:30'),
(74, 19, 27, 9, 'inward', '2014-03-22 14:45:19', 'inward', '2014-03-22 14:45:19'),
(75, 19, 31, 9, 'inward', '2014-03-22 14:45:20', 'inward', '2014-03-22 14:45:20'),
(76, 19, 32, 9, 'inward', '2014-03-22 14:45:20', 'inward', '2014-03-22 14:45:20'),
(77, 20, 30, 9, 'inward', '2014-03-22 14:45:45', 'delete', '2014-03-22 14:45:45'),
(78, 20, 33, 9, 'inward', '2014-03-22 23:27:41', 'create', '2014-03-22 23:27:41'),
(79, 20, 33, 9, 'inward', '2014-03-22 23:36:38', 'edit', '2014-03-22 23:36:38'),
(80, 20, 33, 9, 'inward', '2014-03-22 23:41:28', 'edit', '2014-03-22 23:41:28'),
(81, 20, 33, 9, 'inward', '2014-03-22 23:46:18', 'edit', '2014-03-22 23:46:18'),
(82, 20, 33, 9, 'inward', '2014-03-22 23:48:15', 'edit', '2014-03-22 23:48:15'),
(83, 20, 33, 9, 'inward', '2014-03-22 23:48:25', 'edit', '2014-03-22 23:48:25'),
(84, 20, 33, 9, 'inward', '2014-03-22 23:49:09', 'edit', '2014-03-22 23:49:09'),
(85, 20, 34, 9, 'inward', '2014-03-22 23:49:24', 'create', '2014-03-22 23:49:24'),
(86, 20, 28, 9, 'inward', '2014-03-22 23:49:40', 'edit', '2014-03-22 23:49:40'),
(87, 20, 29, 9, 'inward', '2014-03-22 23:49:40', 'edit', '2014-03-22 23:49:40'),
(88, 20, 33, 9, 'inward', '2014-03-22 23:49:40', 'edit', '2014-03-22 23:49:40'),
(89, 20, 34, 9, 'inward', '2014-03-22 23:49:40', 'edit', '2014-03-22 23:49:40'),
(90, 20, 28, 9, 'outward', '2014-03-22 23:52:15', 'outward', '2014-03-22 23:52:15'),
(91, 20, 29, 9, 'outward', '2014-03-22 23:52:15', 'outward', '2014-03-22 23:52:15'),
(92, 20, 33, 9, 'outward', '2014-03-22 23:52:15', 'outward', '2014-03-22 23:52:15'),
(93, 20, 34, 9, 'outward', '2014-03-22 23:52:15', 'outward', '2014-03-22 23:52:15'),
(94, 20, 28, 9, 'inward', '2014-03-22 23:53:12', 'inward', '2014-03-22 23:53:12'),
(95, 20, 29, 9, 'inward', '2014-03-22 23:53:12', 'inward', '2014-03-22 23:53:12'),
(96, 20, 33, 9, 'inward', '2014-03-22 23:53:12', 'inward', '2014-03-22 23:53:12'),
(97, 20, 34, 9, 'inward', '2014-03-22 23:53:12', 'inward', '2014-03-22 23:53:12'),
(98, 21, 35, 6, 'inward', '2014-03-23 12:05:49', 'create', '2014-03-23 12:05:49'),
(99, 22, 36, 6, 'inward', '2014-03-23 12:13:20', 'create', '2014-03-23 12:13:20'),
(100, 22, 36, 12, 'outward', '2014-03-23 12:16:29', 'outward', '2014-03-23 12:16:29'),
(101, 22, 36, 12, 'inward', '2014-03-23 12:16:50', 'inward', '2014-03-23 12:16:50'),
(102, 23, 37, 6, 'inward', '2014-03-23 12:24:41', 'create', '2014-03-23 12:24:41'),
(103, 23, 38, 6, 'inward', '2014-03-23 12:24:42', 'create', '2014-03-23 12:24:42'),
(104, 23, 37, 6, 'outward', '2014-03-23 12:25:08', 'outward', '2014-03-23 12:25:08'),
(105, 23, 37, 6, 'inward', '2014-03-23 12:27:12', 'inward', '2014-03-23 12:27:12'),
(106, 23, 38, 6, 'outward', '2014-03-23 12:27:30', 'outward', '2014-03-23 12:27:30'),
(107, 19, 31, 6, 'outward', '2014-03-23 12:28:27', 'outward', '2014-03-23 12:28:27'),
(108, 19, 27, 6, 'outward', '2014-03-23 12:29:09', 'outward', '2014-03-23 12:29:09'),
(109, 19, 39, 6, 'outward', '2014-03-23 12:29:30', 'create', '2014-03-23 12:29:30'),
(110, 19, 39, 9, 'outward', '2014-03-23 13:56:28', 'delete', '2014-03-23 13:56:28'),
(111, 19, 40, 9, 'outward', '2014-03-23 14:00:46', 'create', '2014-03-23 14:00:46'),
(112, 19, 41, 9, 'outward', '2014-03-23 14:00:46', 'create', '2014-03-23 14:00:46'),
(113, 19, 42, 9, 'outward', '2014-03-23 14:00:46', 'create', '2014-03-23 14:00:46'),
(114, 19, 43, 9, 'outward', '2014-03-23 14:00:46', 'create', '2014-03-23 14:00:46'),
(115, 19, 44, 9, 'outward', '2014-03-23 14:00:46', 'create', '2014-03-23 14:00:46'),
(116, 19, 45, 9, 'outward', '2014-03-23 14:00:46', 'create', '2014-03-23 14:00:46'),
(117, 19, 46, 9, 'outward', '2014-03-23 14:00:46', 'create', '2014-03-23 14:00:46'),
(118, 19, 40, 9, 'outward', '2014-03-23 14:01:13', 'delete', '2014-03-23 14:01:13'),
(119, 19, 41, 9, 'outward', '2014-03-23 14:01:13', 'delete', '2014-03-23 14:01:13'),
(120, 19, 42, 9, 'outward', '2014-03-23 14:01:13', 'delete', '2014-03-23 14:01:13'),
(121, 19, 43, 9, 'outward', '2014-03-23 14:01:13', 'delete', '2014-03-23 14:01:13'),
(122, 19, 44, 9, 'outward', '2014-03-23 14:01:13', 'delete', '2014-03-23 14:01:13'),
(123, 19, 45, 9, 'outward', '2014-03-23 14:01:13', 'delete', '2014-03-23 14:01:13'),
(124, 19, 46, 9, 'outward', '2014-03-23 14:01:13', 'delete', '2014-03-23 14:01:13'),
(125, 19, 32, 9, 'outward', '2014-03-23 14:02:38', 'edit', '2014-03-23 14:02:38'),
(126, 19, 47, 9, 'outward', '2014-03-23 16:16:37', 'create', '2014-03-23 16:16:37'),
(127, 24, 48, 9, 'inward', '2014-03-23 16:22:55', 'create', '2014-03-23 16:22:55'),
(128, 25, 49, 9, 'inward', '2014-03-23 16:28:10', 'create', '2014-03-23 16:28:10'),
(129, 26, 50, 9, 'inward', '2014-03-23 17:02:00', 'create', '2014-03-23 17:02:00'),
(130, 26, 50, 9, 'inward', '2014-03-23 17:04:47', 'edit', '2014-03-23 17:04:47'),
(131, 26, 51, 9, 'inward', '2014-03-23 17:06:09', 'create', '2014-03-23 17:06:09'),
(132, 27, 52, 9, 'inward', '2014-03-23 17:06:51', 'create', '2014-03-23 17:06:51'),
(133, 27, 53, 9, 'inward', '2014-03-23 17:07:34', 'create', '2014-03-23 17:07:34'),
(134, 27, 54, 9, 'inward', '2014-03-23 17:14:08', 'create', '2014-03-23 17:14:08'),
(135, 27, 53, 9, 'inward', '2014-03-23 17:15:47', 'edit', '2014-03-23 17:15:47'),
(136, 27, 52, 9, 'inward', '2014-03-23 17:18:13', 'edit', '2014-03-23 17:18:13'),
(137, 27, 53, 9, 'inward', '2014-03-23 17:18:13', 'edit', '2014-03-23 17:18:13'),
(138, 27, 54, 9, 'inward', '2014-03-23 17:18:13', 'edit', '2014-03-23 17:18:13'),
(139, 27, 55, 9, 'inward', '2014-03-23 17:18:13', 'create', '2014-03-23 17:18:13'),
(140, 27, 52, 9, 'outward', '2014-03-23 17:18:50', 'outward', '2014-03-23 17:18:50'),
(141, 27, 53, 9, 'outward', '2014-03-23 17:18:50', 'outward', '2014-03-23 17:18:50'),
(142, 27, 54, 9, 'outward', '2014-03-23 17:18:50', 'outward', '2014-03-23 17:18:50'),
(143, 27, 55, 9, 'outward', '2014-03-23 17:18:50', 'outward', '2014-03-23 17:18:50'),
(144, 27, 52, 9, 'inward', '2014-03-23 17:19:50', 'inward', '2014-03-23 17:19:50'),
(145, 27, 53, 9, 'inward', '2014-03-23 17:19:50', 'inward', '2014-03-23 17:19:50'),
(146, 27, 54, 9, 'inward', '2014-03-23 17:19:50', 'inward', '2014-03-23 17:19:50'),
(147, 27, 55, 9, 'inward', '2014-03-23 17:19:50', 'inward', '2014-03-23 17:19:50'),
(148, 27, 52, 9, 'outward', '2014-03-23 17:20:11', 'outward', '2014-03-23 17:20:11'),
(149, 28, 56, 9, 'inward', '2014-03-23 17:30:44', 'create', '2014-03-23 17:30:44'),
(150, 27, 53, 9, 'outward', '2014-03-23 18:31:49', 'outward', '2014-03-23 18:31:49'),
(151, 27, 54, 9, 'outward', '2014-03-23 18:38:29', 'outward', '2014-03-23 18:38:29'),
(152, 27, 55, 9, 'outward', '2014-03-23 18:39:00', 'outward', '2014-03-23 18:39:00'),
(153, 27, 52, 9, 'inward', '2014-03-23 18:42:48', 'inward', '2014-03-23 18:42:48'),
(154, 27, 52, 9, 'outward', '2014-03-23 18:46:00', 'outward', '2014-03-23 18:46:00'),
(155, 27, 52, 9, 'inward', '2014-03-23 18:47:06', 'inward', '2014-03-23 18:47:06'),
(156, 27, 52, 9, 'outward', '2014-03-23 18:47:33', 'outward', '2014-03-23 18:47:33'),
(157, 27, 52, 9, 'inward', '2014-03-23 18:48:53', 'inward', '2014-03-23 18:48:53'),
(158, 27, 53, 9, 'inward', '2014-03-23 18:51:11', 'inward', '2014-03-23 18:51:11'),
(159, 27, 54, 9, 'inward', '2014-03-23 18:51:21', 'inward', '2014-03-23 18:51:21'),
(160, 27, 55, 9, 'inward', '2014-03-23 18:51:30', 'inward', '2014-03-23 18:51:30'),
(161, 27, 52, 9, 'outward', '2014-03-23 18:51:40', 'outward', '2014-03-23 18:51:40'),
(162, 27, 53, 9, 'outward', '2014-03-23 18:51:50', 'outward', '2014-03-23 18:51:50'),
(163, 27, 54, 9, 'outward', '2014-03-23 18:51:58', 'outward', '2014-03-23 18:51:58'),
(164, 27, 55, 9, 'outward', '2014-03-23 18:52:07', 'outward', '2014-03-23 18:52:07'),
(165, 27, 52, 9, 'inward', '2014-03-23 18:52:39', 'inward', '2014-03-23 18:52:39'),
(166, 27, 53, 9, 'inward', '2014-03-23 18:52:49', 'inward', '2014-03-23 18:52:49'),
(167, 27, 54, 9, 'inward', '2014-03-23 18:52:56', 'inward', '2014-03-23 18:52:56'),
(168, 27, 55, 9, 'inward', '2014-03-23 18:53:05', 'inward', '2014-03-23 18:53:05'),
(169, 27, 52, 9, 'outward', '2014-03-23 18:56:47', 'outward', '2014-03-23 18:56:47'),
(170, 27, 53, 9, 'outward', '2014-03-23 18:56:55', 'outward', '2014-03-23 18:56:55'),
(171, 27, 54, 9, 'outward', '2014-03-23 18:57:03', 'outward', '2014-03-23 18:57:03'),
(172, 27, 55, 9, 'outward', '2014-03-23 18:57:11', 'outward', '2014-03-23 18:57:11'),
(173, 27, 52, 9, 'inward', '2014-03-23 18:57:27', 'inward', '2014-03-23 18:57:27'),
(174, 27, 53, 9, 'inward', '2014-03-23 18:57:28', 'inward', '2014-03-23 18:57:28'),
(175, 27, 54, 9, 'inward', '2014-03-23 18:57:28', 'inward', '2014-03-23 18:57:28'),
(176, 27, 55, 9, 'inward', '2014-03-23 18:57:28', 'inward', '2014-03-23 18:57:28'),
(177, 27, 52, 9, 'outward', '2014-03-23 18:57:37', 'outward', '2014-03-23 18:57:37'),
(178, 27, 53, 9, 'outward', '2014-03-23 18:57:37', 'outward', '2014-03-23 18:57:37'),
(179, 27, 54, 9, 'outward', '2014-03-23 18:57:37', 'outward', '2014-03-23 18:57:37'),
(180, 27, 55, 9, 'outward', '2014-03-23 18:57:37', 'outward', '2014-03-23 18:57:37'),
(181, 27, 52, 9, 'inward', '2014-03-23 18:57:51', 'inward', '2014-03-23 18:57:51'),
(182, 27, 53, 9, 'inward', '2014-03-23 18:58:00', 'inward', '2014-03-23 18:58:00'),
(183, 27, 54, 9, 'inward', '2014-03-23 18:58:07', 'inward', '2014-03-23 18:58:07'),
(184, 27, 55, 9, 'inward', '2014-03-23 18:58:15', 'inward', '2014-03-23 18:58:15'),
(185, 27, 52, 9, 'outward', '2014-03-23 19:10:14', 'outward', '2014-03-23 19:10:14'),
(186, 27, 53, 9, 'outward', '2014-03-23 19:10:24', 'outward', '2014-03-23 19:10:24'),
(187, 27, 54, 9, 'outward', '2014-03-23 19:10:51', 'outward', '2014-03-23 19:10:51'),
(188, 27, 55, 9, 'outward', '2014-03-23 22:40:36', 'outward', '2014-03-23 22:40:36'),
(189, 28, 56, 9, 'outward', '2014-03-23 22:40:53', 'outward', '2014-03-23 22:40:53'),
(190, 28, 56, 9, 'inward', '2014-03-23 22:41:06', 'inward', '2014-03-23 22:41:06'),
(191, 27, 52, 9, 'inward', '2014-03-23 22:42:51', 'inward', '2014-03-23 22:42:51'),
(192, 20, 34, 9, 'outward', '2014-03-23 22:43:11', 'outward', '2014-03-23 22:43:11'),
(193, 21, 35, 9, 'outward', '2014-03-23 22:43:53', 'outward', '2014-03-23 22:43:53'),
(194, 29, 57, 9, 'inward', '2014-03-30 01:08:39', 'create', '2014-03-30 01:08:39'),
(195, 30, 58, 9, 'inward', '2014-03-30 16:30:18', 'create', '2014-03-30 16:30:18'),
(196, 30, 59, 9, 'inward', '2014-03-30 16:30:18', 'create', '2014-03-30 16:30:18'),
(197, 30, 59, 9, 'inward', '2014-03-30 16:30:31', 'edit', '2014-03-30 16:30:31'),
(198, 30, 58, 9, 'inward', '2014-03-30 16:30:47', 'edit', '2014-03-30 16:30:47'),
(199, 30, 59, 9, 'inward', '2014-03-30 16:30:47', 'edit', '2014-03-30 16:30:47'),
(200, 31, 60, 9, 'inward', '2014-03-30 16:31:36', 'create', '2014-03-30 16:31:36'),
(201, 31, 60, 9, 'inward', '2014-03-30 16:32:20', 'edit', '2014-03-30 16:32:20'),
(202, 31, 60, 9, 'inward', '2014-03-30 16:38:56', 'edit', '2014-03-30 16:38:56'),
(203, 31, 60, 9, 'inward', '2014-03-30 16:39:01', 'edit', '2014-03-30 16:39:01'),
(204, 31, 60, 9, 'inward', '2014-03-30 16:39:09', 'edit', '2014-03-30 16:39:09'),
(205, 31, 60, 9, 'inward', '2014-03-30 16:39:36', 'edit', '2014-03-30 16:39:36'),
(206, 31, 60, 9, 'inward', '2014-03-30 16:41:37', 'edit', '2014-03-30 16:41:37'),
(207, 31, 61, 9, 'inward', '2014-03-30 16:49:42', 'create', '2014-03-30 16:49:42'),
(208, 31, 62, 9, 'inward', '2014-03-30 17:32:47', 'create', '2014-03-30 17:32:47'),
(209, 31, 61, 9, 'inward', '2014-03-30 17:32:47', 'delete', '2014-03-30 17:32:47'),
(210, 31, 62, 9, 'inward', '2014-03-30 17:33:13', 'edit', '2014-03-30 17:33:13'),
(211, 31, 62, 9, 'inward', '2014-03-30 17:33:19', 'edit', '2014-03-30 17:33:19'),
(212, 31, 60, 9, 'inward', '2014-03-30 17:33:28', 'delete', '2014-03-30 17:33:28'),
(213, 32, 63, 9, 'inward', '2014-03-30 17:45:12', 'create', '2014-03-30 17:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `login` varchar(8) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `title`, `full_name`, `login`, `password`, `role_id`, `phone`, `email`, `address`, `create_date`, `update_date`, `status`) VALUES
(6, 'Ms', 'HimaRam R B', 'himaram', '1a1dc91c907325c69271ddf0c944bc72', 1, '9840618113', 'hima_ram@sram.com', 'KK Nagar, Chennai', '2013-05-13 17:17:17', '2013-07-18 20:26:39', 'active'),
(7, 'Mr', 'Ramalingam S', 'sram', '1a1dc91c907325c69271ddf0c944bc72', 1, '9876543211', 'sram@sram.com', 'kknagar, chennai', '2013-05-16 10:32:56', '2013-05-16 10:32:56', 'active'),
(9, 'Mr', 'Rishi Shankar Rengasamy', 'rishi', '1a1dc91c907325c69271ddf0c944bc72', 1, '9876543210', 'rishi@gmail.com', 'Bangalore', '2013-05-26 14:55:30', '2014-03-30 15:40:45', 'active'),
(10, 'Mr', 'Dilip K', 'dilip', '1a1dc91c907325c69271ddf0c944bc72', 4, '9876543211', 'dilip@test.com', 'Chennai', '2013-07-16 19:39:54', '2013-07-19 01:28:10', 'active'),
(12, 'Mrs', 'Sowmya M', 'sowmya', '1a1dc91c907325c69271ddf0c944bc72', 3, '9894210539', 'sowmya@sram.com', 'Chennai', '2013-07-17 12:03:20', '2013-07-17 12:03:20', 'active'),
(13, 'Mr', 'Test', 'test', '1a1dc91c907325c69271ddf0c944bc72', 1, '', '', '', '2014-03-30 13:48:06', '2014-03-30 13:48:06', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `itrs`
--

CREATE TABLE IF NOT EXISTS `itrs` (
  `itr_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date_of_uploading` date NOT NULL,
  `assessment_year` varchar(20) NOT NULL,
  `filed_by` int(11) NOT NULL,
  `date_of_mailing` date NOT NULL,
  `date_of_acknowledgement` date NOT NULL,
  `date_of_billing` date NOT NULL,
  `bill_amount` int(11) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`itr_id`),
  UNIQUE KEY `itr_id` (`itr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `itrs`
--

INSERT INTO `itrs` (`itr_id`, `task_id`, `client_id`, `date_of_uploading`, `assessment_year`, `filed_by`, `date_of_mailing`, `date_of_acknowledgement`, `date_of_billing`, `bill_amount`, `remarks`, `create_date`, `update_date`) VALUES
(5, 27, 19, '0000-00-00', '2013-2014', 9, '2014-03-30', '0000-00-00', '0000-00-00', 0, '30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Mailed<br>', '2014-03-30 15:41:58', '2014-03-30 16:21:45'),
(6, 26, 17, '2014-03-30', '2013-2014', 9, '2014-03-30', '0000-00-00', '2014-03-30', 1000, '30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Mailed<br>30-03-2014 : rishi : ITR Finalized<br>', '2014-03-30 15:59:50', '2014-03-30 16:19:20'),
(7, 25, 17, '2014-03-30', '2014-2015', 9, '2014-03-30', '0000-00-00', '0000-00-00', 0, '30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Mailed<br>', '2014-03-30 16:28:28', '2014-03-30 16:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE IF NOT EXISTS `registers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `fin_yr` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('inward','outward','in_out') NOT NULL,
  `type` enum('books','tds','it','st','intimation','vat','others') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `client_id`, `fin_yr`, `create_date`, `update_date`, `status`, `type`) VALUES
(19, 17, '', '2014-03-22 14:11:55', '2014-03-23 16:16:37', 'outward', 'books'),
(20, 16, '', '2014-03-22 14:19:34', '2014-03-23 22:43:11', 'in_out', 'others'),
(21, 17, '', '2014-03-23 12:05:49', '2014-03-23 22:43:53', 'outward', 'tds'),
(22, 17, '', '2014-03-23 12:13:20', '2014-03-23 12:16:50', 'inward', 'books'),
(23, 17, '', '2014-03-23 12:24:41', '2014-03-23 12:27:30', 'in_out', 'books'),
(24, 17, '', '2014-03-23 16:22:55', '2014-03-23 17:28:59', 'inward', 'others'),
(25, 17, '', '2014-03-23 16:28:10', '2014-03-23 16:28:10', 'inward', 'others'),
(26, 18, '', '2014-03-23 17:02:00', '2014-03-23 17:06:09', 'inward', 'others'),
(27, 17, '', '2014-03-23 17:06:51', '2014-03-23 22:42:51', 'in_out', 'books'),
(28, 18, '', '2014-03-23 17:30:44', '2014-03-23 22:41:06', 'inward', 'books'),
(29, 19, '', '2014-03-30 01:08:39', '2014-03-30 01:08:39', 'inward', 'books'),
(30, 19, '', '2014-03-30 16:30:18', '2014-03-30 16:30:47', 'inward', 'books'),
(31, 19, '', '2014-03-30 16:31:36', '2014-03-30 17:34:06', 'inward', 'others'),
(32, 18, '', '2014-03-30 17:45:12', '2014-03-30 17:59:12', 'inward', 'others');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'superadmin', 'Super admin'),
(2, 'manager', 'Manager'),
(3, 'employee', 'Employee'),
(4, 'tds', 'TDS');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` enum('tds','itr','st','accounting','audit','intimation','vat','other') NOT NULL,
  `comments` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `priority` enum('high','medium','low') NOT NULL DEFAULT 'medium',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `due_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('new','re-assigned','pending','query','completed','finalized') NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `emp_id`, `title`, `type`, `comments`, `client_id`, `priority`, `start_date`, `end_date`, `due_date`, `created_by`, `create_date`, `update_date`, `status`) VALUES
(19, 9, 'test', 'audit', '22-03-2014 : rishi : test<br>22-03-2014 : rishi : asdf<br>', 17, 'medium', '2014-03-22', '0000-00-00', '2014-03-22', 9, '2014-03-22 14:11:11', '2014-03-22 14:11:33', 'new'),
(20, 12, 'TDS payment', 'tds', '23-03-2014 : sowmya : Completed<br>', 17, 'medium', '2014-03-24', '2014-03-23', '2014-03-26', 6, '2014-03-23 12:44:30', '2014-03-23 12:45:20', 'completed'),
(21, 10, 'asdasd', 'st', '23-03-2014 : sowmya : sdsdf<br>23-03-2014 : himaram : Reassign to<br>', 16, 'high', '2014-03-26', '0000-00-00', '2014-03-27', 12, '2014-03-23 12:47:09', '2014-03-23 12:49:21', 're-assigned'),
(22, 6, 'asdasd', 'tds', '23-03-2014 : sowmya : asd<br>23-03-2014 : himaram : sdasd<br>23/03/2014 : himaram : sdfsdf<br>23-03-2014 : himaram : ITR Uploaded<br>23-03-2014 : himaram : ITR Mailed<br>', 17, 'medium', '2014-03-27', '2014-03-23', '2014-03-28', 12, '2014-03-23 12:48:41', '2014-03-23 12:52:44', 'completed'),
(23, 6, 'adsf', 'other', '', 17, 'medium', '2014-03-23', '0000-00-00', '2014-03-23', 9, '2014-03-23 23:18:54', '2014-03-23 23:18:54', 'new'),
(24, 6, 'asdf', 'other', '', 17, 'medium', '2014-03-23', '0000-00-00', '2014-03-23', 9, '2014-03-23 23:19:44', '2014-03-23 23:19:44', 'new'),
(25, 9, 'asdf', 'itr', '30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Mailed<br>', 17, 'medium', '2014-03-23', '2014-03-30', '2014-03-23', 9, '2014-03-23 23:20:07', '2014-03-30 16:28:31', 'completed'),
(26, 9, 'asdf', 'itr', '30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Mailed<br>30-03-2014 : rishi : ITR Finalized<br>', 17, 'medium', '0000-00-00', '2014-03-30', '0000-00-00', 9, '2014-03-23 23:22:52', '2014-03-30 16:19:20', 'finalized'),
(27, 9, 'qwert', 'itr', '30-03-2014 : rishi : asdf<br>30-03-2014 : rishi : ITR Uploaded<br>30-03-2014 : rishi : ITR Mailed<br>', 19, 'medium', '2014-03-31', '2014-03-30', '2014-03-31', 9, '2014-03-30 00:36:32', '2014-03-30 16:21:45', 'completed'),
(28, 9, 'asdf', 'intimation', '30-03-2014 : rishi : asdf<br>', 17, 'high', '2014-03-30', '0000-00-00', '2014-03-31', 9, '2014-03-30 20:49:56', '2014-03-30 20:49:56', 'new'),
(29, 9, 'qwer11', 'other', '30-03-2014 : rishi : qwer<br>', 17, 'low', '2014-03-30', '0000-00-00', '2014-03-31', 9, '2014-03-30 20:50:18', '2014-03-30 20:54:53', 'new'),
(30, 9, 'medium', 'other', '', 17, 'medium', '2014-03-30', '0000-00-00', '2014-03-31', 9, '2014-03-30 20:55:11', '2014-03-30 20:55:11', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `task_documents`
--

CREATE TABLE IF NOT EXISTS `task_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `task_query`
--

CREATE TABLE IF NOT EXISTS `task_query` (
  `task_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raised_by` int(11) NOT NULL,
  `requested_to` int(11) NOT NULL,
  `status` enum('open','closed','answered') NOT NULL,
  `task_status` enum('new','re-assigned','pending','completed') NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `task_query`
--

INSERT INTO `task_query` (`task_id`, `id`, `raised_by`, `requested_to`, `status`, `task_status`, `created_by`, `create_date`, `update_date`) VALUES
(22, 40, 6, 12, 'closed', 'new', 6, '2014-03-23 12:49:52', '2014-03-23 12:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `task_types`
--

CREATE TABLE IF NOT EXISTS `task_types` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_year` varchar(5) NOT NULL,
  `to_year` varchar(5) NOT NULL,
  `fin_year` varchar(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `assessment_year` varchar(10) NOT NULL,
  `is_curr_year` enum('Y','N') NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `from_year`, `to_year`, `fin_year`, `from_date`, `to_date`, `assessment_year`, `is_curr_year`, `create_date`) VALUES
(5, '2013', '2014', '2013-2014', '2013-04-01', '2014-03-31', '2014-2015', 'Y', '2013-06-27 22:02:20'),
(6, '2012', '2013', '2012-2013', '2012-04-01', '2013-03-31', '2013-2014', 'N', '2014-03-22 14:46:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
