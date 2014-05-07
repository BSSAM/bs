-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2014 at 02:04 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bs`
--
CREATE DATABASE IF NOT EXISTS `bs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bs`;

-- --------------------------------------------------------

--
-- Table structure for table `additionalcharges`
--

CREATE TABLE IF NOT EXISTS `additionalcharges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `additionalcharge` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `additionalcharges`
--

INSERT INTO `additionalcharges` (`id`, `additionalcharge`, `description`, `status`) VALUES
(1, 'Transportation', 'Transportation', 1),
(3, 'Special Service Charge', 'Special Service Charge', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE IF NOT EXISTS `assigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignedto` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `assignedto`, `description`, `status`) VALUES
(3, 'Mr. Nazir', 'Mr.Nazir', 1),
(4, 'Mr.Nizam', 'Mr.Nizam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branchname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `website` varchar(200) NOT NULL,
  `companyregno` varchar(100) NOT NULL,
  `gstregno` varchar(100) NOT NULL,
  `defaultbranch` int(10) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branchname`, `address`, `phone`, `fax`, `website`, `companyregno`, `gstregno`, `defaultbranch`, `currency_id`, `gst`, `status`) VALUES
(2, 'Singapore', '41 Senoko Drive\r\nSingapore 758249\r\nTel.+65 6458 4411\r\nFax.+65 64584400\r\nwww.bestandards.com', '+65 6458 4411', '+65 64584400', 'http://www.bestandards.com/', '200510697M', 'M200510697', 1, 1, '7.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `countrycode` varchar(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `countrycode`, `status`) VALUES
(32, 'Singapore', 'SG', 1),
(33, 'Malaysia', 'MY', 1),
(34, 'India', 'IN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `currencycode` varchar(10) NOT NULL,
  `exchangerate` float NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country_id`, `symbol`, `currencycode`, `exchangerate`, `status`) VALUES
(1, 32, '$', 'SGD', 1, 1),
(2, 34, 'Rs', 'INR', 1, 0),
(3, 33, 'RM', 'MYR', 2.3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customername` varchar(100) NOT NULL,
  `postalcode` int(10) NOT NULL,
  `salesperson_id` int(11) DEFAULT NULL,
  `referedby_id` int(11) DEFAULT NULL,
  `regaddress` text NOT NULL,
  `billaddress` text NOT NULL,
  `phone` int(15) NOT NULL,
  `fax` int(15) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `customertype` varchar(200) NOT NULL,
  `deliveryaddress` text NOT NULL,
  `requirements` text NOT NULL,
  `paymentterm_id` int(11) DEFAULT NULL,
  `priority_id` varchar(200) NOT NULL,
  `calibrationtype` varchar(200) NOT NULL,
  `invoicetype` varchar(200) NOT NULL,
  `deliveryordertype` varchar(200) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `poack` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customername`, `postalcode`, `salesperson_id`, `referedby_id`, `regaddress`, `billaddress`, `phone`, `fax`, `industry_id`, `location_id`, `customertype`, `deliveryaddress`, `requirements`, `paymentterm_id`, `priority_id`, `calibrationtype`, `invoicetype`, `deliveryordertype`, `tag`, `poack`, `status`) VALUES
(2, 'Pepperl+fuchs (mfg) Pte Ltd', 139942, 6, 0, '18 Ayer Rajah Crescent', '', 6779, 2147483647, 11, 4, 'Customer', '', '', 0, '', 'Singlas', 'Purchase order full invoice', 'Partial delivery order', 'Not Completed', 0, 1),
(3, 'Petroserv Engineering  Private Limited', 758313, 6, 0, '23 Senoko Avenue Woodlands East Industrial Estate\r\nSingapore 758313', '', 65468078, NULL, 3, 5, 'Customer', '', '', 0, '', 'Non-Singlas', 'Purchase order full invoice', 'Partial delivery order', 'Not Completed', 0, 1),
(4, 'Pfizer Asia Pacific Pte Ltd', 637578, 6, NULL, '31 Tuas South Avenue 6', '', 0, NULL, 11, 4, 'Customer', '', '', NULL, '', 'Singlas', 'Purchase order full invoice', 'Full delivery order', 'Not Completed', 0, 1),
(5, 'asdasd', 345345, 4, NULL, 'sdfdfs', 'sdfsdf', 24324234, 2147483647, 11, 7, 'Customer', 'werwerw', '', NULL, '', '', '', '', '', 0, 1),
(6, 'fghfgh', 567575, 4, NULL, 'fgh', 'fg', 2147483647, NULL, 6, 4, 'Customer', 'ghj', '', NULL, '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `departmentname`, `description`, `status`) VALUES
(1, 'Temperature', 'Temperature', 1),
(2, 'Electrical', 'Electrical', 1),
(3, 'Pressure', 'Pressure', 1),
(4, 'Dimensional', 'Dimensional', 1),
(5, 'Miscellaneous', 'Miscellaneous', 1),
(6, 'Mechanical', 'Mechanical', 1);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE IF NOT EXISTS `industries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industryname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industryname`, `description`, `status`) VALUES
(3, 'Engineering', 'Engineering Industry', 1),
(4, 'Aerospace', 'Aerospace Industry', 1),
(5, 'Marine', 'Marine Industry', 1),
(6, 'Manufacturing', 'Manufacturing Industry', 1),
(7, 'Semiconductor', 'Semiconductor Industry', 1),
(8, 'Food', 'Food Industry', 1),
(9, 'Chemical', 'Chemical Industry', 1),
(10, 'Medical', 'Medical Industry', 1),
(11, 'Multi Industries', 'Multi Industries', 1),
(12, 'Construction', 'Construction Industry', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locationname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `locationname`, `description`, `status`) VALUES
(3, 'East', 'Bedok, Changi, Changi Bay, Paya Lebar, Pasir Ris, Tampines', 1),
(4, 'West', 'Bukit Batok, Bukit Panjang, Jurong East, Clementi', 1),
(5, 'North', 'Lim Chu Kang, Mandai, Sembawang, Simpang, Sungei Kadut, Woodlands, Yishun', 1),
(6, 'South', 'Queenstown, Kallang, Geylang', 1),
(7, 'Central', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymentterms`
--

CREATE TABLE IF NOT EXISTS `paymentterms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paymentterm` varchar(100) NOT NULL,
  `paymenttype` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `paymentterms`
--

INSERT INTO `paymentterms` (`id`, `paymentterm`, `paymenttype`, `description`, `status`) VALUES
(1, '0', 'COD', '', 1),
(2, '30', 'days', '', 1),
(3, '14', 'days', '', 1),
(4, '15', 'days', '', 1),
(5, '60', 'days', '', 1),
(6, '7', 'days', '', 1),
(7, '90', 'days', '', 1),
(8, '45', 'days', '', 1),
(9, '0', 'days', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `noofdays` int(10) NOT NULL,
  `multipleof` float NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `priority`, `description`, `noofdays`, `multipleof`, `status`) VALUES
(4, 'Normal', 'Low', 4, 1, 1),
(5, 'Express', 'Medium', 2, 2, 1),
(6, 'Platinum', 'High', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `referedbies`
--

CREATE TABLE IF NOT EXISTS `referedbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referedby` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `referedbies`
--

INSERT INTO `referedbies` (`id`, `referedby`, `description`, `status`) VALUES
(3, 'Ms.Nora Lee', '', 1),
(4, 'Mr.Divo SK', '', 1),
(5, 'Mr.Padma', '', 1),
(6, 'BSTech', '', 1),
(7, 'Mr.Malkit', '', 1),
(8, 'Mr.Mahen', '', 1),
(9, 'Mr.Sudha', '', 1),
(10, 'Mr.Rajesh', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salespeople`
--

CREATE TABLE IF NOT EXISTS `salespeople` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesperson` varchar(100) NOT NULL,
  `salespersoncode` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `salespeople`
--

INSERT INTO `salespeople` (`id`, `salesperson`, `salespersoncode`, `description`, `status`) VALUES
(3, 'Ms.Nora Lee', 'TSMN', 'BS Tech,  Calibration Sales, Management , Nora', 1),
(4, 'Mr.Divo SK', 'TSDD', 'BS Tech,  Calibration Sales, Development , Divo', 1),
(5, 'Mr.Padma', 'TSCP', 'BS Tech,  Calibration Sales, Coordinate , Padma', 1),
(6, 'BSTech', 'TBMB', 'Company Customers', 1),
(7, 'Ms.Nora', 'TSML', 'BS Tech,  Calibration Sales, Management , Nora', 1),
(8, 'Mr.Sudha', 'TSCS', 'BS Tech,  Calibration Sales, Coordinate , Sudha', 1),
(9, 'Mr.Malkit', 'TSCM', 'BS Tech,  Calibration Sales, Coordinate , Malkit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicetype` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `servicetype`, `description`, `status`) VALUES
(4, 'Calibration', 'Calibration', 1),
(5, 'Repair & Calibration', 'Repair & Calibration', 1),
(6, 'Purchase & Calibration', 'Purchase & Calibration', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tallyledgers`
--

CREATE TABLE IF NOT EXISTS `tallyledgers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tallyledgeraccount` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tallyledgers`
--

INSERT INTO `tallyledgers` (`id`, `tallyledgeraccount`, `status`) VALUES
(5, 'Calibration Service', 1),
(6, 'CAlibration', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE IF NOT EXISTS `userroles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `user_role_id`, `user_role`, `description`, `status`, `module`) VALUES
(1, 1, 'SuperAdmin', '', 1, 0),
(2, 2, 'Admin', '', 1, 0),
(3, 3, 'Tech-Manager', '', 1, 0),
(4, 4, 'Tech-Engineer', '', 1, 0),
(5, 5, 'Tech-Supervisor', '', 1, 0),
(6, 6, 'Sales-Executive', '', 1, 0),
(7, 7, 'Sales-Supervisor', '', 1, 0),
(8, 8, 'Sales-Manager', '', 1, 0),
(9, 9, 'Admin-Executive', '', 1, 0),
(10, 10, 'Admin-Supervisor', 'Ne', 1, 0),
(14, 0, 'Accounts Superviser', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `userrole_id` int(11) DEFAULT NULL,
  `department_id` varchar(100) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userrole_id`, `department_id`, `firstname`, `lastname`, `emailid`, `created`, `modified`, `status`) VALUES
(1, 'admin', 'admin@123', 1, '2', 'dsfsd', 'dsfsdf', 'dsfsd@dfss.com', '2014-04-23 09:24:32', '2014-05-07 12:32:35', 0),
(5, 'Krishnanfdgdfg', 'krishnan', 4, '1', '', '', '', '2014-05-05 13:38:18', '2014-05-07 07:54:37', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
