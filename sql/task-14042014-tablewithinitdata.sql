-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2014 at 11:24 AM
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
  `phone_mobile2` varchar(15) NOT NULL,
  `phone_office2` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `pan_tan` varchar(15) NOT NULL,
  `genius_id` varchar(15) NOT NULL,
  `file_id` varchar(15) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `full_name`, `client_type`, `phone_mobile`, `phone_home`, `phone_office`, `phone_mobile2`, `phone_office2`, `dob`, `email`, `address`, `pan_tan`, `genius_id`, `file_id`, `create_date`, `update_date`, `status`) VALUES
(3, 'Mr', 'test client fn test client ln', 'individual', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'testc@client.com', 'add address 1231', 'ASD123QE45', 'TG01', 'TF01', '2013-05-15 11:13:43', '2013-07-17 12:35:52', 'inactive'),
(4, 'Mfrs', 'time company', 'company', '1234567890', '08012345678', '08098765432', '', '', '0000-00-00', 'time@time.com', 'time, kk nagar, chennai', 'CSD123QE45', 'FG02', 'TF02', '2013-05-16 10:26:33', '2013-05-16 10:26:33', 'active'),
(5, 'Ms', 'Test First Name Test Last Name', 'individual', '1234567890', '08012345678', '08098765432', '', '', '0000-00-00', 'test11@test.com', 'test', 'ASD123QE45', 'TG101', 'TF012', '2013-05-18 22:48:10', '2013-07-17 12:35:57', 'inactive'),
(6, 'Mfrs', 'new client', 'company', '9988776655', '9988776655', '9988776655', '', '', '0000-00-00', 'newclient@client.com', 'new client address', 'ASDFQE123K', 'TG109', 'TF109', '2013-05-25 23:18:50', '2013-07-17 12:33:56', 'inactive'),
(7, 'Mr', 'Rishi Shankar Rengasamy', 'individual', '9980521439', '9980521439', '9980521439', '', '', '0000-00-00', 'r.rishishankar@gmail.com', 'T6 SAI KINGSDALE Apartment,\r\n128/3 Horamanv Agara Road,\r\nBank Avenue Extension,\r\nBabusapalaya,\r\nBangalore - 560043', 'SHUOT2660N', 'R101', 'R101', '2013-06-24 17:31:45', '2013-06-24 17:31:45', 'active'),
(8, 'Mrs', 'Hima', 'individual', '9988776655', '9988776655', '9988776655', '', '', '0000-00-00', 'hima@sram.com', 'August, #15. Ist Main Road\r\nAnnaji Nagar\r\nWest KK Nagar\r\nChennai', 'QAWSS1234E', 'H101', 'H101', '2013-06-25 09:55:27', '2014-04-05 19:52:01', 'active'),
(9, 'Mfrs', 'Pandyan Industrial Equipments ', 'company', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1000', 'F1000', '2013-07-16 19:27:34', '2013-07-16 19:27:34', 'active'),
(10, 'Mfrs', 'Patco Precision Components (p) Ltd', 'company', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1001', 'F1001', '2013-07-16 19:28:17', '2013-07-16 19:28:17', 'active'),
(11, 'Mr', 'Pauline george', 'individual', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1002', 'F1002', '2013-07-16 19:28:55', '2013-07-16 19:28:55', 'active'),
(12, 'Mr', 'Ponnivalavan', 'individual', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1003', 'F1003', '2013-07-16 19:29:27', '2013-07-16 19:29:27', 'active'),
(13, 'Mfrs', 'Powermatic Packaging pvt ltd', 'company', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1004', 'F1004', '2013-07-16 19:30:07', '2013-07-16 19:30:07', 'active'),
(14, 'Mr', 'Pakkirisamy Natarajan', 'individual', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1005', 'F1005', '2013-07-16 19:31:43', '2013-07-16 19:31:43', 'active'),
(15, 'Mfrs', 'Pakkirisamy Group', 'company', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1006', 'F1006', '2013-07-16 19:32:10', '2013-07-16 19:32:10', 'active'),
(16, 'Mfrs', 'Reframe Softtech (p) Ltd', 'company', '9876543210', '9876543210', '9876543210', '', '', '0000-00-00', 'test@test.com', 'Chennai', 'AQWIPR144B', 'G1007', 'F1007', '2013-07-16 20:30:24', '2013-07-17 12:31:04', 'active'),
(17, 'Mr', 'Balaji Andrews', 'individual', '9999999999', '044 23643710', '044 22222222', '', '', '0000-00-00', 'balahi@gmail.com', 'kk nagar\r\nchennai\r\ntn', 'AAAAB1234H', 'G1006', '250', '2013-07-17 12:14:05', '2013-07-21 00:01:04', 'active'),
(18, 'Mfrs', 'Test', 'company', '9876543210', '', '04487654321', '', '', '0000-00-00', '', 'Chennai', 'QWEIP2668V', 'G1', 'F1', '2014-03-22 18:25:10', '2014-04-14 00:07:50', 'active'),
(19, 'Mr', 'test100', 'individual', '9876543210', '', '', '9876543211', '04423232323', '1984-01-03', 'test100@gmail.com', 'Chennai', 'QEELK2779V', 'g10', 'f10', '2014-03-30 00:14:46', '2014-04-05 13:01:49', 'active'),
(20, 'Mfrs', 'random', 'company', '9876543210', '', '', '', '', '2006-04-01', '', '', 'ASDFG1554H', 'g100', 'f100', '2014-04-05 12:21:19', '2014-04-06 15:06:23', 'inactive'),
(21, 'Mfrs', 'random2', 'company', '9908787670', '', '', '', '', '2014-04-01', 'test100@gmail.com', 'Chennai', 'ASDFG1234B', 'adf', 'sadf', '2014-04-05 20:20:06', '2014-04-06 15:06:12', 'inactive'),
(22, 'Mfrs', 'random2', 'company', '9876543210', '', '', '', '', '0000-00-00', '', 'Chennai', 'QWEIP2668V', 'adf', 'sadf', '2014-04-05 20:22:48', '2014-04-06 15:06:09', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `register_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `particulars` varchar(300) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `status` enum('inward','outward') NOT NULL,
  `by_employee` int(11) NOT NULL,
  `mode_of_receipt` enum('in_person','email','courier','other','post') NOT NULL,
  `row_status` enum('active','deleted') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `title`, `full_name`, `login`, `password`, `role_id`, `phone`, `email`, `address`, `create_date`, `update_date`, `status`) VALUES
(6, 'Ms', 'HimaRam R B', 'himaram', '1a1dc91c907325c69271ddf0c944bc72', 3, '9840618113', 'hima_ram@sram.com', 'KK Nagar, Chennai', '2013-05-13 17:17:17', '2014-04-14 00:02:00', 'active'),
(7, 'Mr', 'Ramalingam S', 'sram', '1a1dc91c907325c69271ddf0c944bc72', 2, '9876543211', 'sram@sram.com', 'kknagar, chennai', '2013-05-16 10:32:56', '2014-04-13 23:43:44', 'active'),
(9, 'Mr', 'Rishi Shankar Rengasamy', 'rishi', '1a1dc91c907325c69271ddf0c944bc72', 2, '9876543210', 'rishi@gmail.com', 'Bangalore', '2013-05-26 14:55:30', '2014-04-13 23:43:58', 'active'),
(10, 'Mr', 'Dilip K', 'dilip', '1a1dc91c907325c69271ddf0c944bc72', 3, '9876543211', 'dilip@test.com', 'Chennai', '2013-07-16 19:39:54', '2014-04-14 00:01:45', 'active'),
(12, 'Mrs', 'Sowmya M', 'sowmya', '1a1dc91c907325c69271ddf0c944bc72', 3, '9894210539', 'sowmya@sram.com', 'Chennai', '2013-07-17 12:03:20', '2014-04-14 00:01:52', 'active'),
(14, 'Mr', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '2014-04-02 09:48:34', '2014-04-02 09:48:34', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `inward_invoices`
--

CREATE TABLE IF NOT EXISTS `inward_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` varchar(10) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `particulars` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `receipt_mode` enum('in_person','email','courier','other','post') NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outward_invoices`
--

CREATE TABLE IF NOT EXISTS `outward_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` varchar(10) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `particulars` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `receipt_mode` enum('in_person','email','courier','other','post') NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'admin', 'admin'),
(2, 'manager', 'manager'),
(3, 'audit-assistant', 'audit assistant');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `type_ui_desc` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `task_types`
--

INSERT INTO `task_types` (`id`, `type`, `type_ui_desc`, `status`, `create_date`, `update_date`) VALUES
(1, 'itr', 'ITR', 'active', '2014-04-06', '2014-04-06'),
(2, 'tds', 'TDS', 'active', '2014-04-06', '2014-04-06'),
(3, 'st', 'Service Tax', 'active', '2014-04-06', '2014-04-06'),
(4, 'accounting', 'Accounting', 'active', '2014-04-06', '2014-04-06'),
(5, 'audit', 'Audit', 'active', '2014-04-06', '2014-04-06'),
(6, 'intimation', 'Intimation', 'active', '2014-04-06', '2014-04-06'),
(7, 'vat', 'VAT', 'active', '2014-04-06', '2014-04-06'),
(8, 'other', 'Other', 'active', '2014-04-06', '2014-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `type_owners`
--

CREATE TABLE IF NOT EXISTS `type_owners` (
  `emp_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_owners`
--

INSERT INTO `type_owners` (`emp_id`, `type`, `create_date`, `update_date`) VALUES
(7, 'itr', '2014-04-13', '2014-04-13'),
(7, 'tds', '2014-04-13', '2014-04-13'),
(7, 'st', '2014-04-13', '2014-04-13'),
(7, 'accounting', '2014-04-13', '2014-04-13'),
(7, 'audit', '2014-04-13', '2014-04-13'),
(7, 'intimation', '2014-04-13', '2014-04-13'),
(7, 'vat', '2014-04-13', '2014-04-13'),
(7, 'other', '2014-04-13', '2014-04-13'),
(9, 'itr', '2014-04-13', '2014-04-13'),
(9, 'tds', '2014-04-13', '2014-04-13'),
(9, 'st', '2014-04-13', '2014-04-13'),
(9, 'accounting', '2014-04-13', '2014-04-13'),
(9, 'audit', '2014-04-13', '2014-04-13'),
(9, 'intimation', '2014-04-13', '2014-04-13'),
(9, 'vat', '2014-04-13', '2014-04-13'),
(12, 'tds', '2014-04-14', '2014-04-14'),
(6, 'itr', '2014-04-14', '2014-04-14'),
(6, 'tds', '2014-04-14', '2014-04-14'),
(6, 'st', '2014-04-14', '2014-04-14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `from_year`, `to_year`, `fin_year`, `from_date`, `to_date`, `assessment_year`, `is_curr_year`, `create_date`) VALUES
(5, '2013', '2014', '2013-2014', '2013-04-01', '2014-03-31', '2014-2015', 'N', '2013-06-27 22:02:20'),
(6, '2012', '2013', '2012-2013', '2012-04-01', '2013-03-31', '2013-2014', 'N', '2014-03-22 14:46:14'),
(8, '2014', '2015', '2014-2015', '2014-04-01', '2015-03-31', '2015-2016', 'Y', '2014-04-06 16:18:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
