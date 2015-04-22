-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2015 at 03:21 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `best`
--
CREATE DATABASE IF NOT EXISTS `best` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `best`;

-- --------------------------------------------------------

--
-- Table structure for table `acknowledgement_types`
--

CREATE TABLE IF NOT EXISTS `acknowledgement_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `acknowledgement_type` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `acknowledgement_types`
--

INSERT INTO `acknowledgement_types` (`id`, `created`, `modified`, `acknowledgement_type`, `status`) VALUES
(1, NULL, NULL, 'PO Ack before DO', 1),
(2, NULL, NULL, 'PO Ack before Invoice', 1),
(3, NULL, NULL, 'PO not needed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `additionalcharges`
--

CREATE TABLE IF NOT EXISTS `additionalcharges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `additionalcharge` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `additionalcharges`
--

INSERT INTO `additionalcharges` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `additionalcharge`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:33:17', '2015-04-10 15:53:51', NULL, NULL, 0, 'TRANSPORTATION CHARGE', '', 1, 0),
(2, '2015-04-10 15:54:05', '2015-04-10 15:54:05', NULL, NULL, 0, 'SPECIAL SERVICE CHARGE', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE IF NOT EXISTS `assigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `assignedto` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `assignedto`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:32:45', '2015-04-10 15:52:20', NULL, NULL, 0, 'MR RAJ', '', 1, 0),
(2, '2015-04-10 15:52:34', '2015-04-10 15:52:34', NULL, NULL, 0, 'MR NISHAM', '', 1, 0),
(3, '2015-04-10 15:52:46', '2015-04-10 15:52:46', NULL, NULL, 0, 'MR SEKAR', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `branchname` varchar(100) DEFAULT NULL,
  `address` text,
  `phone` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `companyregno` varchar(100) DEFAULT NULL,
  `gstregno` varchar(100) DEFAULT NULL,
  `defaultbranch` int(10) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `gst` varchar(50) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `branchname`, `address`, `phone`, `fax`, `website`, `companyregno`, `gstregno`, `defaultbranch`, `currency_id`, `gst`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 13:55:29', '2015-04-07 13:55:29', NULL, NULL, 0, 'Electrical', 'North Bogh Rd', '', '', '', '', '', 0, NULL, '', 1, 1),
(2, '2015-04-07 14:25:34', '2015-04-07 14:25:34', NULL, NULL, 0, 'dell systems', 'North Bogh Rd', '', '', '', '', '', 0, NULL, '', 1, 1),
(3, '2015-04-10 15:45:39', '2015-04-13 17:00:50', NULL, NULL, 0, 'Singapore', '41 Senoko Drive<br/>\r\nSingapore 758249\r\n\r\n', '64584411', '64584400', 'www.bs.sg', '12345G', 'G12345', 1, 1, '7', 1, 0),
(4, '2015-04-10 15:51:42', '2015-04-10 15:51:42', NULL, NULL, 0, 'India', '15 Chennai Plaza\r\nChennai 645390', '65412321', '65412333', 'bs.sg', '123GH', 'GH1234', 0, 1, '4', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` varchar(200) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `brandname` varchar(500) DEFAULT NULL,
  `branddescription` text,
  `status` int(10) DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `brandname`, `branddescription`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2015-04-07', '2015-04-07 15:09:21', NULL, NULL, 0, 'd', '', 0, 1, 1),
(2, '2015-04-08', '2015-04-08 08:53:27', NULL, NULL, 0, 'QC', 'hj', 0, 1, 1),
(3, '2015-04-08', '2015-04-08 14:57:46', NULL, NULL, 0, 'QA', 'hhbg', 0, 1, 1),
(4, '2015-04-10', '2015-04-10 16:09:00', NULL, NULL, 0, 'CAPRI', '', 1, 1, 0),
(5, '2015-04-10', '2015-04-10 16:09:49', NULL, NULL, 0, 'FLUK', '', 1, 1, 0),
(6, '2015-04-10', '2015-04-10 16:09:57', NULL, NULL, 0, 'WIKA', '', 1, 1, 0),
(7, '2015-04-10', '2015-04-10 16:14:25', NULL, NULL, 0, 'SYSCO', '', 1, 1, 0),
(8, '2015-04-21', '2015-04-21 15:04:22', NULL, NULL, 0, 'dfg', 'dfg', 1, 0, 0),
(9, '22-Apr-2015', '2015-04-22 20:21:25', NULL, NULL, 0, 'sa', '', 1, 0, 0),
(10, '22-Apr-2015', '2015-04-22 20:21:16', NULL, NULL, 0, 'aas', '', 1, 1, 0),
(11, '22-Apr-2015', '2015-04-22 20:21:32', NULL, NULL, 0, 'sdf', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `candds`
--

CREATE TABLE IF NOT EXISTS `candds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `canddno` varchar(200) DEFAULT NULL,
  `readytodeliver_items_id` varchar(200) DEFAULT NULL,
  `collection_delivery_id` int(11) DEFAULT NULL,
  `cd_date` varchar(200) DEFAULT NULL,
  `purpose` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `customername` varchar(200) DEFAULT NULL,
  `Contactpersoninfo_id` int(11) DEFAULT NULL,
  `assign_id` int(11) DEFAULT NULL,
  `customer_address` text,
  `address_id` int(11) NOT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `remarks` text,
  `is_approval_date` date DEFAULT NULL,
  `is_approved` varchar(20) DEFAULT '0',
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  `status` int(10) DEFAULT '1',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `candds`
--

INSERT INTO `candds` (`id`, `order_by`, `created`, `modified`, `canddno`, `readytodeliver_items_id`, `collection_delivery_id`, `cd_date`, `purpose`, `customer_id`, `branch_id`, `customername`, `Contactpersoninfo_id`, `assign_id`, `customer_address`, `address_id`, `phone`, `remarks`, `is_approval_date`, `is_approved`, `is_jobcompleted`, `status`, `is_deleted`) VALUES
(1, NULL, '2015-04-14 14:10:20', '2015-04-14 14:10:20', NULL, NULL, NULL, '14-April-15', 'Collection', 'CUS-15-004002', 1, 'AMS PTE LTD ( MAIN ) ', 3, 1, '41 SENOKO DRIVE\nSINGAPORE 758249', 0, '64584411', '', NULL, '1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `canddsettings`
--

CREATE TABLE IF NOT EXISTS `canddsettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `maxtask` int(11) DEFAULT NULL,
  `maxtime` varchar(200) DEFAULT NULL,
  `purpose` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `canddsettings`
--

INSERT INTO `canddsettings` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `branch_id`, `maxtask`, `maxtime`, `purpose`, `status`, `is_deleted`) VALUES
(1, '2015-03-03 14:21:03', '2015-04-10 15:59:47', NULL, NULL, NULL, 3, 30, '21:45', 'C', 1, 0),
(2, '2015-03-03 14:21:57', '2015-04-10 16:00:03', NULL, NULL, NULL, 3, 30, '23:45', 'D', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clientpos`
--

CREATE TABLE IF NOT EXISTS `clientpos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientpos_no` varchar(200) DEFAULT NULL,
  `po_quantity` varchar(50) DEFAULT '0',
  `quotation_id` varchar(200) DEFAULT NULL,
  `quotation_no` varchar(200) DEFAULT NULL,
  `quo_quantity` varchar(20) DEFAULT '0',
  `salesorder_id` varchar(200) DEFAULT NULL,
  `sales_quantity` varchar(20) NOT NULL DEFAULT '0',
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `deliver_quantity` varchar(20) NOT NULL DEFAULT '0',
  `invoiceno` varchar(200) DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `po_status` int(11) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `collection_deliveries`
--

CREATE TABLE IF NOT EXISTS `collection_deliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `collection_delivery_date` varchar(200) DEFAULT NULL,
  `tasks` int(11) DEFAULT NULL,
  `venues` int(11) DEFAULT NULL,
  `collections` int(11) DEFAULT NULL,
  `deliveries` int(11) DEFAULT NULL,
  `is_approved` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `country` varchar(100) DEFAULT NULL,
  `countrycode` varchar(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `country`, `countrycode`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:30:58', '2015-04-10 15:46:02', NULL, NULL, 0, 'INDIA', 'IND', 1, 0),
(2, '2015-04-10 15:46:15', '2015-04-10 15:46:15', NULL, NULL, 0, 'SINGAPORE ', 'SG', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `symbol` varchar(5) DEFAULT NULL,
  `currencycode` varchar(10) DEFAULT NULL,
  `exchangerate` float DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country_id`, `symbol`, `currencycode`, `exchangerate`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `is_deleted`) VALUES
(1, 1, 'RS', 'INR', 0.025, 1, '2015-04-08 07:25:57', '2015-04-10 15:46:49', NULL, NULL, 0, 0),
(2, 2, 'S$', 'SGD', 1, 1, '2015-04-10 15:47:18', '2015-04-10 15:47:18', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `customergroup_id` varchar(200) DEFAULT NULL,
  `tag_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `tag_name` varchar(200) DEFAULT NULL,
  `customername` varchar(100) DEFAULT NULL,
  `postalcode` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(200) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `customertype` varchar(200) DEFAULT NULL,
  `requirements` text,
  `techrequirements` text NOT NULL,
  `paymentterm_id` int(11) DEFAULT NULL,
  `priority_id` varchar(200) DEFAULT NULL,
  `calibrationtype` varchar(200) DEFAULT NULL,
  `invoice_type_id` varchar(200) DEFAULT NULL,
  `deliveryordertype_id` varchar(200) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `acknowledgement_type_id` int(10) DEFAULT NULL,
  `cus_salespeople_count` int(11) DEFAULT NULL,
  `cus_referedby_count` int(11) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_approved_date` date DEFAULT NULL,
  `is_approved_by` varchar(200) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customergroup_id`, `tag_id`, `branch_id`, `tag_name`, `customername`, `postalcode`, `phone`, `fax`, `industry_id`, `location_id`, `customertype`, `requirements`, `techrequirements`, `paymentterm_id`, `priority_id`, `calibrationtype`, `invoice_type_id`, `deliveryordertype_id`, `tag`, `acknowledgement_type_id`, `cus_salespeople_count`, `cus_referedby_count`, `is_default`, `is_approved`, `is_approved_date`, `is_approved_by`, `status`, `is_deleted`) VALUES
('CUS-15-004002', '2015-04-10 16:36:16', '2015-04-10 16:37:15', NULL, NULL, 0, 'CGRU-15-004002', 'TAG-15-004002', NULL, 'MAIN', 'AMS PTE LTD', '758249', '64584411', '64584400', 1, 2, 'Customer', 'PO MUST FOLLOW.', 'TAG ID NEED TO BE DISPLAY IN CERTS.', 3, '1', 'Singlas', '3', '2', NULL, 1, NULL, NULL, 1, 1, '2015-04-10', '1', 1, 0),
('CUS-15-004003', '2015-04-10 16:43:25', '2015-04-10 16:43:25', NULL, NULL, 0, 'CGRU-15-004003', 'TAG-15-004003', NULL, 'MAIN', 'GOODRICH LIMITED', '654213', '65412322', '6541232', 3, 3, 'Customer/Sub-Contractor', '-', '-', 2, '1', 'Singlas', '3', '2', NULL, 2, NULL, NULL, 1, 1, '2015-04-10', '1', 1, 0),
('CUS-15-004004', '2015-04-10 16:45:11', '2015-04-10 16:45:11', NULL, NULL, 0, 'CGRU-15-004004', 'TAG-15-004004', NULL, 'MAIN', 'CAL TECH PTE LTD', '6545465', '65478999', '6478999', 1, 2, 'Sub-Contractor', '', '', 3, '1', 'Singlas', '3', '2', NULL, 1, NULL, NULL, 1, 1, '2015-04-10', '1', 1, 0),
('CUS-15-004005', '2015-04-10 16:47:31', '2015-04-10 16:47:31', NULL, NULL, 0, 'CGRU-15-004005', 'TAG-15-004005', NULL, 'MAIN', 'ALIF ELECTRONICS', '544322', '65412322', '65412333', 1, 3, 'Supplier', '', '', 3, '1', 'Non-Singlas', '3', '2', NULL, 2, NULL, NULL, 1, 1, '2015-04-10', '1', 1, 0),
('CUS-15-004018', '2015-04-22 21:53:15', '2015-04-22 21:53:15', NULL, NULL, 0, 'CGRU-15-004005', 'TAG-15-004018', NULL, '', 'ALIF ELECTRONICS', '', '', '', NULL, NULL, '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, 0),
('CUS-15-004020', '2015-04-22 21:54:34', '2015-04-22 21:54:34', NULL, NULL, 0, 'CGRU-15-004005', 'TAG-15-004020', NULL, 'dsf', 'ALIF ELECTRONICS', '345345', '43533', '3453', 1, 2, 'Customer', '', '', 2, '1', 'Singlas', '1', NULL, NULL, 1, NULL, NULL, 0, 0, NULL, NULL, 1, 0),
('CUS-15-004029', '2015-04-22 22:01:14', '2015-04-22 22:01:14', NULL, NULL, 0, 'CGRU-15-004005', 'TAG-15-004029', NULL, '', 'ALIF ELECTRONICS', '', '', '', NULL, NULL, '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, 0),
('CUS-15-004032', '2015-04-22 22:02:11', '2015-04-22 22:02:11', NULL, NULL, 0, 'CGRU-15-004005', 'TAG-15-004032', NULL, '', 'ALIF ELECTRONICS', '', '', '', NULL, NULL, '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_instruments`
--

CREATE TABLE IF NOT EXISTS `customer_instruments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `instrument_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `model_no` varchar(50) DEFAULT NULL,
  `range_id` varchar(50) DEFAULT NULL,
  `cost` int(11) DEFAULT '0',
  `contract_disc` int(11) DEFAULT '0',
  `unit_price` varchar(50) DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `is_approved_date` varchar(200) DEFAULT NULL,
  `is_approved_by` int(11) DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer_instruments`
--

INSERT INTO `customer_instruments` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `instrument_id`, `branch_id`, `model_no`, `range_id`, `cost`, `contract_disc`, `unit_price`, `status`, `is_deleted`, `is_approved_date`, `is_approved_by`, `is_approved`) VALUES
(1, 1, '2015-04-10 16:38:11', '2015-04-10 16:38:11', NULL, NULL, 0, 'CUS-15-004002', 2, NULL, 'MA12', '3', 75, 5, '100', 1, 0, '2015-04-10', 1, 1),
(2, 2, '2015-04-10 16:38:41', '2015-04-10 16:38:41', NULL, NULL, 0, 'CUS-15-004002', 3, NULL, 'AS1', '4', 150, 60, '150', 1, 0, '2015-04-10', 1, 1),
(3, 3, '2015-04-10 16:40:15', '2015-04-10 16:40:15', NULL, NULL, 0, 'CUS-15-004002', 4, NULL, 'AS21', '5', 250, 30, '320', 1, 0, '2015-04-10', 1, 1),
(4, 1, '2015-04-10 17:14:18', '2015-04-10 17:14:18', NULL, NULL, 0, 'CUS-15-004003', 2, NULL, 'S1', '3', 75, 25, '80', 1, 0, '2015-04-10', 1, 1),
(5, 1, '2015-04-10 21:37:07', '2015-04-13 18:40:08', NULL, NULL, 0, 'CUS-15-004005', 4, NULL, 'A1', '5', 70, 0, '98', 1, 0, '2015-04-10', 1, 1),
(6, 2, '2015-04-13 18:38:55', '2015-04-13 18:38:55', NULL, NULL, 0, 'CUS-15-004005', 4, NULL, 's5', '5', 70, 0, '0', 1, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cus_addresses`
--

CREATE TABLE IF NOT EXISTS `cus_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `tag_id` varchar(200) DEFAULT NULL,
  `customergroup_id` varchar(200) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `address` text,
  `type` varchar(200) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cus_addresses`
--

INSERT INTO `cus_addresses` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `address_id`, `address`, `type`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:42:23', '2015-04-07 14:42:23', NULL, NULL, 0, 'CUS-15-000008', 'TAG-05-000007', 'CGRU-15-000008', 1736929752, 'chennai', 'registered', 1, 0),
(2, '2015-04-07 14:42:31', '2015-04-07 14:42:31', NULL, NULL, 0, 'CUS-15-000008', 'TAG-05-000007', 'CGRU-15-000008', 1293502191, 'chennai', 'billing', 1, 0),
(3, '2015-04-07 14:42:37', '2015-04-07 14:42:37', NULL, NULL, 0, 'CUS-15-000008', 'TAG-05-000007', 'CGRU-15-000008', 2032637049, 'chennai', 'delivery', 1, 0),
(4, '2015-04-10 16:33:32', '2015-04-10 16:33:32', NULL, NULL, 0, 'CUS-15-004002', 'TAG-15-004002', 'CGRU-15-004002', 715524152, '41 SENOKO DRIVE\nSINGAPORE 758249', 'registered', 1, 0),
(5, '2015-04-10 16:33:57', '2015-04-10 16:33:57', NULL, NULL, 0, 'CUS-15-004002', 'TAG-15-004002', 'CGRU-15-004002', 1391222639, 'FLOOR 03-02 , 41 SENOKO DRIVE \nSINGAPORE 758249', 'billing', 1, 0),
(6, '2015-04-10 16:41:48', '2015-04-10 16:41:48', NULL, NULL, 0, 'CUS-15-004003', 'TAG-15-004003', 'CGRU-15-004003', 692415699, '54 JALAN STREET\nCHANGI ROAD,\nSINGAPORE 654765', 'registered', 1, 0),
(7, '2015-04-10 16:44:13', '2015-04-10 16:44:13', NULL, NULL, 0, 'CUS-15-004004', 'TAG-15-004004', 'CGRU-15-004004', 2091727009, '23 WOODLAND DRIVE\nSINGAPORE 123321', 'registered', 1, 0),
(8, '2015-04-10 16:46:10', '2015-04-10 16:46:10', NULL, NULL, 0, 'CUS-15-004005', 'TAG-15-004005', 'CGRU-15-004005', 1298251333, '04-02 SIMLIM SQUARE\nSINGAPORE 654345', 'registered', 1, 0),
(14, '2015-04-22 21:54:05', '2015-04-22 21:54:05', NULL, NULL, 0, 'CUS-15-004020', 'TAG-15-004020', 'CGRU-15-004005', 1746004628, 'sdf', 'registered', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cus_contactpersoninfos`
--

CREATE TABLE IF NOT EXISTS `cus_contactpersoninfos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `tag_id` varchar(200) DEFAULT NULL,
  `customergroup_id` varchar(200) DEFAULT NULL,
  `serial_id` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `remarks` text,
  `name` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `cus_contactpersoninfos`
--

INSERT INTO `cus_contactpersoninfos` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `serial_id`, `email`, `remarks`, `name`, `department`, `phone`, `position`, `mobile`, `purpose`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 15:02:16', '2015-04-07 15:02:16', NULL, NULL, 0, 'CUS-15-000008', 'TAG-05-000007', 'CGRU-15-000008', '39470682', 'gunatester@yahoo.com', '', 'gunaseelan', '', '', '', '', '', 1, 0),
(2, '2015-04-10 16:36:11', '2015-04-10 16:36:11', NULL, NULL, 0, 'CUS-15-004002', 'TAG-15-004002', 'CGRU-15-004002', '32604575', 'erick@bs.sg', '-', 'MR ERICK', 'QUALITY', '64584411 EXT 201', 'QC MANAGER', '984243232', 'CALIBRATION', 1, 0),
(3, '2015-04-10 16:37:10', '2015-04-10 16:37:10', NULL, NULL, 0, 'CUS-15-004002', 'TAG-15-004002', 'CGRU-15-004002', NULL, 'babu@bs.sg', '', 'MR BABU', '', '', '', '', '', 1, 0),
(4, '2015-04-10 16:43:06', '2015-04-10 16:43:06', NULL, NULL, 0, 'CUS-15-004003', 'TAG-15-004003', 'CGRU-15-004003', '56700484', 'joice@goodrich.com', '', 'MS JOICE', '', '', '', '', '', 1, 0),
(5, '2015-04-10 16:45:08', '2015-04-10 16:45:08', NULL, NULL, 0, 'CUS-15-004004', 'TAG-15-004004', 'CGRU-15-004004', '82647457', 'tan@caltech.com', '', 'MR TAN', '', '', '', '', '', 1, 0),
(6, '2015-04-10 16:47:28', '2015-04-10 16:47:28', NULL, NULL, 0, 'CUS-15-004005', 'TAG-15-004005', 'CGRU-15-004005', '13432728', 'haji@alifelectronics.com', '', 'MR HAJI', '', '', '', '', '', 1, 0),
(7, '2015-04-21 16:01:09', '2015-04-21 16:01:09', NULL, NULL, 0, 'CUS-15-004007', 'TAG-15-004007', 'CGRU-15-004006', '84126886', 'aa@aa.com', '', 'aaa', '', '', '', '', '', 0, 0),
(8, '2015-04-22 21:06:55', '2015-04-22 21:06:55', NULL, NULL, 0, 'CUS-15-004010', 'TAG-15-004010', 'CGRU-15-004005', NULL, 'aa@as.com', '', 'aaaa', '', '', '', '', '', 0, 0),
(9, '2015-04-22 21:07:08', '2015-04-22 21:07:08', NULL, NULL, 0, 'CUS-15-004010', 'TAG-15-004010', 'CGRU-15-004005', NULL, 'sdf@asd.com', '', 'sd', '', '', '', '', '', 0, 0),
(10, '2015-04-22 21:41:21', '2015-04-22 21:41:21', NULL, NULL, 0, 'CUS-15-004011', 'TAG-15-004011', 'CGRU-15-004005', NULL, 'as@sad.com', '', 'aa', '', '', '', '', '', 0, 0),
(11, '2015-04-22 21:42:36', '2015-04-22 21:42:36', NULL, NULL, 0, 'CUS-15-004012', 'TAG-15-004012', 'CGRU-15-004005', NULL, 'sdf@sdf.com', '', 'sdf', '', '', '', '', '', 0, 0),
(12, '2015-04-22 21:44:47', '2015-04-22 21:44:47', NULL, NULL, 0, 'CUS-15-004013', 'TAG-15-004013', 'CGRU-15-004005', NULL, 'ad@dsf.com', '', 'sad', '', '', '', '', '', 0, 0),
(13, '2015-04-22 21:46:22', '2015-04-22 21:46:22', NULL, NULL, 0, 'CUS-15-004014', 'TAG-15-004014', 'CGRU-15-004008', '80941966', 'asd@asd.com', '', 'asd', '', '', '', '', '', 0, 0),
(14, '2015-04-22 21:51:31', '2015-04-22 21:51:31', NULL, NULL, 0, 'CUS-15-004016', 'TAG-15-004016', 'CGRU-15-004005', NULL, 'sdf@asd.com', '', 'dsf', '', '', '', '', '', 0, 0),
(15, '2015-04-22 21:51:47', '2015-04-22 21:51:47', NULL, NULL, 0, 'CUS-15-004015', 'TAG-15-004015', 'CGRU-15-004009', '85165573', 'sfd@3dsf.com', '', 'dsf', '', '', '', '', '', 0, 0),
(16, '2015-04-22 21:53:13', '2015-04-22 21:53:13', NULL, NULL, 0, 'CUS-15-004018', 'TAG-15-004018', 'CGRU-15-004005', NULL, 'sad@sdf.com', '', 'asd', '', '', '', '', '', 1, 0),
(17, '2015-04-22 21:58:52', '2015-04-22 21:58:52', NULL, NULL, 0, 'CUS-15-004027', 'TAG-15-004027', 'CGRU-15-004005', NULL, 'sdf@ewsd.com', '', 'sd', '', '', '', '', '', 0, 0),
(18, '2015-04-22 22:03:07', '2015-04-22 22:03:07', NULL, NULL, 0, 'CUS-15-004035', 'TAG-15-004035', 'CGRU-15-004005', NULL, 'sdf@ewsd.com', '', 'dsf', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cus_projectinfos`
--

CREATE TABLE IF NOT EXISTS `cus_projectinfos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(200) DEFAULT NULL,
  `project_id` varchar(200) DEFAULT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `project_status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '11',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cus_referbies`
--

CREATE TABLE IF NOT EXISTS `cus_referbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `tag_id` varchar(200) DEFAULT NULL,
  `customergroup_id` varchar(200) DEFAULT NULL,
  `referedby_id` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cus_referbies`
--

INSERT INTO `cus_referbies` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `referedby_id`, `status`) VALUES
(2, '2015-04-10 16:37:15', '2015-04-10 16:37:15', NULL, NULL, 0, 'CUS-15-004002', NULL, NULL, '4', 1),
(3, '2015-04-10 16:43:25', '2015-04-10 16:43:25', NULL, NULL, 0, 'CUS-15-004003', 'TAG-15-004003', 'CGRU-15-004003', '2', 1),
(4, '2015-04-10 16:45:11', '2015-04-10 16:45:11', NULL, NULL, 0, 'CUS-15-004004', 'TAG-15-004004', 'CGRU-15-004004', '2', 1),
(5, '2015-04-10 16:47:31', '2015-04-10 16:47:31', NULL, NULL, 0, 'CUS-15-004005', 'TAG-15-004005', 'CGRU-15-004005', '4', 1),
(6, '2015-04-22 21:54:34', '2015-04-22 21:54:34', NULL, NULL, 0, 'CUS-15-004020', 'TAG-15-004020', 'CGRU-15-004005', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cus_salespeople`
--

CREATE TABLE IF NOT EXISTS `cus_salespeople` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `tag_id` varchar(200) DEFAULT NULL,
  `customergroup_id` varchar(200) DEFAULT NULL,
  `salespeople_id` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cus_salespeople`
--

INSERT INTO `cus_salespeople` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `salespeople_id`, `status`) VALUES
(1, '2015-04-07 15:03:00', '2015-04-07 15:03:00', NULL, NULL, 0, 'CUS-15-000008', 'TAG-05-000007', 'CGRU-15-000008', '1', 1),
(3, '2015-04-10 16:37:15', '2015-04-10 16:37:15', NULL, NULL, 0, 'CUS-15-004002', NULL, NULL, '2', 1),
(4, '2015-04-10 16:43:25', '2015-04-10 16:43:25', NULL, NULL, 0, 'CUS-15-004003', 'TAG-15-004003', 'CGRU-15-004003', '3', 1),
(5, '2015-04-10 16:45:11', '2015-04-10 16:45:11', NULL, NULL, 0, 'CUS-15-004004', 'TAG-15-004004', 'CGRU-15-004004', '3', 1),
(6, '2015-04-10 16:47:31', '2015-04-10 16:47:31', NULL, NULL, 0, 'CUS-15-004005', 'TAG-15-004005', 'CGRU-15-004005', '3', 1),
(7, '2015-04-22 21:54:34', '2015-04-22 21:54:34', NULL, NULL, 0, 'CUS-15-004020', 'TAG-15-004020', 'CGRU-15-004005', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `datalogs`
--

CREATE TABLE IF NOT EXISTS `datalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logname` varchar(200) DEFAULT NULL,
  `logid` varchar(200) DEFAULT NULL,
  `logactivity` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `viewed` int(11) DEFAULT '0',
  `viewed_by` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `datalogs`
--

INSERT INTO `datalogs` (`id`, `logname`, `logid`, `logactivity`, `user_id`, `created`, `modified`, `viewed`, `viewed_by`) VALUES
(1, 'Quotation', 'BQS-15-004005', 'Add', '1', '2015-04-14 09:56:36', '2015-04-14 09:56:36', 0, NULL),
(2, 'Salesorder', '1', 'Add', '1', '2015-04-14 09:57:23', '2015-04-14 09:57:23', 0, NULL),
(3, 'Purchaseorders', '1', 'Add', '1', '2015-04-14 10:20:51', '2015-04-14 10:20:51', 0, NULL),
(4, 'Purchaseorders', '1', 'Add', '1', '2015-04-14 10:21:32', '2015-04-14 10:21:32', 0, NULL),
(5, 'SubCon', '1', 'Add', '1', '2015-04-14 11:05:15', '2015-04-14 11:05:15', 0, NULL),
(6, 'SubCon', '1', 'Add', '1', '2015-04-14 11:09:00', '2015-04-14 11:09:00', 0, NULL),
(7, 'C&Dinfo', '1', 'Add Collection', '1', '2015-04-14 14:10:20', '2015-04-14 14:10:20', 0, NULL),
(8, 'CustomerTagList', 'CUS-15-004006', 'Add', '1', '2015-04-15 19:24:36', '2015-04-15 19:24:36', 0, NULL),
(9, 'Deliveryorder', 'BDO-15-004011', 'Add', '1', '2015-04-16 20:37:27', '2015-04-16 20:37:27', 0, NULL),
(10, 'ClientPO', 'BSO-15-004007', 'Approve', '1', '2015-04-16 20:38:05', '2015-04-16 20:38:05', 0, NULL),
(11, 'Deliveryorder', '1', 'Approve', '1', '2015-04-16 20:38:21', '2015-04-16 20:38:21', 0, NULL),
(12, 'Instrument', '5', 'Add', '1', '2015-04-21 14:54:13', '2015-04-21 14:54:13', 0, NULL),
(13, 'Instrument', '6', 'Add', '1', '2015-04-21 14:57:35', '2015-04-21 14:57:35', 0, NULL),
(14, 'Instrument', '7', 'Add', '1', '2015-04-21 14:58:25', '2015-04-21 14:58:25', 0, NULL),
(15, 'Brand', '8', 'Add', '1', '2015-04-21 15:04:22', '2015-04-21 15:04:22', 0, NULL),
(16, 'Instrument', '8', 'Add', '1', '2015-04-21 15:05:50', '2015-04-21 15:05:50', 0, NULL),
(17, 'Instrument', '9', 'Add', '1', '2015-04-21 15:06:37', '2015-04-21 15:06:37', 0, NULL),
(18, 'Brand', '9', 'Add', '1', '2015-04-22 17:21:39', '2015-04-22 17:21:39', 0, NULL),
(19, 'Brand', '10', 'Add', '1', '2015-04-22 17:21:54', '2015-04-22 17:21:54', 0, NULL),
(20, 'Brand', '11', 'Add', '1', '2015-04-22 17:22:31', '2015-04-22 17:22:31', 0, NULL),
(21, 'Range', '8', 'Add', '1', '2015-04-22 17:22:54', '2015-04-22 17:22:54', 0, NULL),
(22, 'Unit', '9', 'Add', '1', '2015-04-22 17:23:14', '2015-04-22 17:23:14', 0, NULL),
(23, 'Brand', '10', 'Edit', '12', '2015-04-22 20:21:16', '2015-04-22 20:21:16', 0, NULL),
(24, 'Brand', '9', 'Edit', '12', '2015-04-22 20:21:25', '2015-04-22 20:21:25', 0, NULL),
(25, 'Brand', '11', 'Edit', '12', '2015-04-22 20:21:32', '2015-04-22 20:21:32', 0, NULL),
(26, 'CustomerTagList', 'CUS-15-004018', 'Add', '1', '2015-04-22 21:53:15', '2015-04-22 21:53:15', 0, NULL),
(27, 'CustomerTagList', 'CUS-15-004020', 'Add', '1', '2015-04-22 21:54:34', '2015-04-22 21:54:34', 0, NULL),
(28, 'CustomerTagList', 'CUS-15-004029', 'Add', '1', '2015-04-22 22:01:14', '2015-04-22 22:01:14', 0, NULL),
(29, 'CustomerTagList', 'CUS-15-004032', 'Add', '1', '2015-04-22 22:02:11', '2015-04-22 22:02:11', 0, NULL),
(30, 'Quotation', 'BQS-15-004010', 'Add', '1', '2015-04-22 23:14:10', '2015-04-22 23:14:10', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryorders`
--

CREATE TABLE IF NOT EXISTS `deliveryorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `delivery_address` text,
  `customer_address` text,
  `due_amount` varchar(200) DEFAULT NULL,
  `attn` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `delivery_order_no` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `delivery_order_date` varchar(200) DEFAULT NULL,
  `our_reference_no` varchar(200) DEFAULT NULL,
  `po_reference_no` varchar(200) DEFAULT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `ref_count` varchar(200) DEFAULT NULL,
  `total_inst` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(200) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `is_approved_date` varchar(600) DEFAULT NULL,
  `instrument_type_id` int(11) DEFAULT NULL,
  `del_description_count` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `ready_to_deliver` int(11) DEFAULT NULL,
  `move_to_deliver` int(11) DEFAULT '0',
  `assign_to` varchar(200) DEFAULT NULL,
  `is_invoice_created` int(11) NOT NULL DEFAULT '0',
  `is_invoice_approved` int(11) NOT NULL DEFAULT '0',
  `po_generate_type` varchar(200) DEFAULT NULL,
  `is_assignpo` int(11) NOT NULL DEFAULT '0',
  `is_poapproved` int(11) DEFAULT '0',
  `po_approval_date` varchar(200) DEFAULT NULL,
  `is_pocount_satisfied` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `job_finished` varchar(20) DEFAULT '0',
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deliveryorders`
--

INSERT INTO `deliveryorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `branch_id`, `track_id`, `delivery_address`, `customer_address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `delivery_order_no`, `salesorder_id`, `quotationno`, `delivery_order_date`, `our_reference_no`, `po_reference_no`, `ref_no`, `ref_count`, `total_inst`, `remarks`, `service_id`, `is_approved`, `is_approved_date`, `instrument_type_id`, `del_description_count`, `status`, `ready_to_deliver`, `move_to_deliver`, `assign_to`, `is_invoice_created`, `is_invoice_approved`, `po_generate_type`, `is_assignpo`, `is_poapproved`, `po_approval_date`, `is_pocount_satisfied`, `is_deleted`, `job_finished`, `is_jobcompleted`) VALUES
(1, '2015-04-16 20:37:26', '2015-04-16 20:37:26', NULL, NULL, 0, 'CUS-15-004002', 3, 'BSTRA-15-004045', '41 SENOKO DRIVE\r\nSINGAPORE 758249', '41 SENOKO DRIVE\r\nSINGAPORE 758249', NULL, '2', '64584411', '64584400', 'erick@bs.sg', 'BDO-15-004011', 'BSO-15-004007', 'BQS-15-004005', '2015-04-16', 'BSTRA-15-004045', 'CPO-15-004011', 'PO#15-004011', '3', 0, '', 2, 1, '1995', 1, 1, 1, NULL, 0, NULL, 0, 0, 'Manual', 1, 1, NULL, 0, 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryordertypes`
--

CREATE TABLE IF NOT EXISTS `deliveryordertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `delivery_order_type` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `deliveryordertypes`
--

INSERT INTO `deliveryordertypes` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `delivery_order_type`, `status`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'Full delivery order', 1),
(2, NULL, NULL, NULL, NULL, NULL, 'Partial delivery order', 1);

-- --------------------------------------------------------

--
-- Table structure for table `del_descriptions`
--

CREATE TABLE IF NOT EXISTS `del_descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `sales_desc_id` int(11) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `delivery_quantity` varchar(200) DEFAULT NULL,
  `instrument_id` int(11) DEFAULT NULL,
  `model_no` varchar(200) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `delivery_range` varchar(200) DEFAULT NULL,
  `delivery_calllocation` varchar(200) DEFAULT NULL,
  `delivery_calltype` varchar(200) DEFAULT NULL,
  `delivery_validity` int(11) DEFAULT NULL,
  `delivery_unitprice` varchar(200) DEFAULT NULL,
  `delivery_discount` varchar(200) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `delivery_accountservice` varchar(100) DEFAULT NULL,
  `delivery_titles` varchar(100) DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `title1_val` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `title2_val` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `title3_val` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `title4_val` varchar(200) DEFAULT NULL,
  `title5` varchar(200) DEFAULT NULL,
  `title5_val` varchar(200) DEFAULT NULL,
  `title6` varchar(200) DEFAULT NULL,
  `title6_val` varchar(200) DEFAULT NULL,
  `title7` varchar(200) DEFAULT NULL,
  `title7_val` varchar(200) DEFAULT NULL,
  `title8` varchar(200) DEFAULT NULL,
  `title8_val` varchar(200) DEFAULT NULL,
  `delivery_total` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `ready_to_deliver` int(11) NOT NULL DEFAULT '0',
  `ready_deliver` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `del_descriptions`
--

INSERT INTO `del_descriptions` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `view`, `deliveryorder_id`, `salesorder_id`, `sales_desc_id`, `quotation_id`, `quotationno`, `customer_id`, `delivery_quantity`, `instrument_id`, `model_no`, `brand_id`, `delivery_range`, `delivery_calllocation`, `delivery_calltype`, `delivery_validity`, `delivery_unitprice`, `delivery_discount`, `department_id`, `delivery_accountservice`, `delivery_titles`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `delivery_total`, `status`, `ready_to_deliver`, `ready_deliver`, `is_deleted`) VALUES
(1, 1, '2015-04-16 20:37:27', '2015-04-16 20:37:27', NULL, NULL, 0, '1', 'BSO-15-004007', 1, 1, 'BQS-15-004005', 'CUS-15-004002', '3', 2, 'MA12', 6, '3', 'subcontract', 'Singlas', 12, '0', '', 6, 'calibration service', NULL, NULL, NULL, NULL, 'FAULTY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `departmentname` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `departmentname`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 05:43:12', '2014-10-20 05:43:12', NULL, NULL, 0, 'Electrical', '', 1, 1),
(2, '2014-10-20 05:43:24', '2014-10-20 05:43:24', NULL, NULL, 0, 'Temperature', '', 1, 0),
(3, '2014-10-20 05:43:36', '2014-10-20 05:43:36', NULL, NULL, 0, 'Dimension', '', 1, 0),
(4, '2014-10-20 05:43:49', '2015-04-10 15:48:33', NULL, NULL, 0, 'Mechanical-(Force)', '', 1, 0),
(5, '2014-10-20 05:44:23', '2014-10-20 05:44:23', NULL, NULL, 0, 'Miscellaneous', '', 1, 0),
(6, '2014-10-24 05:47:11', '2015-04-10 15:48:05', NULL, NULL, 0, 'Mechanical-(Pressure)', '-', 1, 0),
(7, '2015-04-02 09:57:46', '2015-04-02 09:57:46', NULL, NULL, 0, 'Electrical', '', 1, 0),
(8, '2015-04-07 14:29:02', '2015-04-07 14:29:02', NULL, NULL, 0, 'English', '', 1, 1),
(9, '2015-04-07 14:29:21', '2015-04-07 14:29:21', NULL, NULL, 0, 'English, hindi', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `do_documents`
--

CREATE TABLE IF NOT EXISTS `do_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `deliveryorder_no` varchar(200) DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `upload_type` varchar(200) DEFAULT NULL,
  `document_name` varchar(200) DEFAULT NULL,
  `document_type` varchar(200) DEFAULT NULL,
  `document_size` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE IF NOT EXISTS `industries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `industryname` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `industryname`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:38:32', '2015-04-10 16:05:26', NULL, NULL, 0, 'ENGINEERING', '', 1, 0),
(2, '2015-04-10 16:05:43', '2015-04-10 16:05:43', NULL, NULL, 0, 'OIL & GAS', '', 1, 0),
(3, '2015-04-10 16:05:55', '2015-04-10 16:05:55', NULL, NULL, 0, 'AEROSPACE', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE IF NOT EXISTS `instruments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` varchar(200) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `name` varchar(20) DEFAULT NULL,
  `description` text,
  `branch_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `instrument_brand_count` int(11) DEFAULT NULL,
  `instrument_procedure_count` int(11) DEFAULT NULL,
  `instrument_range_count` int(11) DEFAULT NULL,
  `ins_date` varchar(200) DEFAULT NULL,
  `is_approved` varchar(20) NOT NULL DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `name`, `description`, `branch_id`, `department_id`, `status`, `instrument_brand_count`, `instrument_procedure_count`, `instrument_range_count`, `ins_date`, `is_approved`, `is_deleted`) VALUES
(4, '2015-04-10 16:31:12', '2015-04-10 16:31:12', NULL, NULL, 0, 'AMMETER', '', NULL, 7, 1, 1, 1, 1, '2015-04-10', '1', 0),
(2, '2015-04-10 16:21:10', '2015-04-10 16:21:10', NULL, NULL, 0, 'PRESSURE GAUGE', '', NULL, 6, 1, 2, 1, 2, '2015-04-10', '1', 0),
(3, '2015-04-10 16:21:39', '2015-04-10 16:23:00', NULL, NULL, 0, 'TEMPERATURE GAUGE', '', NULL, 2, 1, 4, 1, 1, '2015-04-10', '1', 0),
(5, '2015-04-21 14:54:13', '2015-04-21 14:54:13', NULL, NULL, 0, 'assd', 'asd', NULL, 2, 1, 1, 1, 1, '0000-00-00', '0', 0),
(6, '2015-04-21 14:57:35', '2015-04-21 14:57:35', NULL, NULL, 0, 'sad', 'asd', NULL, 2, 1, 1, 1, 1, '0000-00-00', '0', 0),
(7, '2015-04-21 14:58:25', '2015-04-21 14:58:25', NULL, NULL, 0, 'dfsdf', 'sdf', NULL, 2, 1, 1, 1, 1, '21-Apr-2015', '0', 0),
(8, '0000-00-00 00:00:00', '2015-04-21 15:05:49', NULL, NULL, 0, 'sdfdsf', 'sdf', NULL, 2, 1, 1, 1, 1, NULL, '0', 0),
(9, '21-Apr-2015', '2015-04-21 15:06:37', NULL, NULL, 0, 'ghj', 'hgj', NULL, 2, 1, 1, 1, 1, NULL, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `instrument_brands`
--

CREATE TABLE IF NOT EXISTS `instrument_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `instrument_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `instrument_brands`
--

INSERT INTO `instrument_brands` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `brand_id`) VALUES
(1, '2015-04-08 15:04:15', '2015-04-08 15:04:15', NULL, NULL, 0, 1, 3),
(2, '2015-04-10 16:21:10', '2015-04-10 16:21:10', NULL, NULL, 0, 2, 6),
(3, '2015-04-10 16:21:10', '2015-04-10 16:21:10', NULL, NULL, 0, 2, 7),
(12, '2015-04-10 16:23:00', '2015-04-10 16:23:00', NULL, NULL, 0, 3, 4),
(13, '2015-04-10 16:23:00', '2015-04-10 16:23:00', NULL, NULL, 0, 3, 5),
(14, '2015-04-10 16:23:00', '2015-04-10 16:23:00', NULL, NULL, 0, 3, 6),
(15, '2015-04-10 16:23:00', '2015-04-10 16:23:00', NULL, NULL, 0, 3, 7),
(16, '2015-04-10 16:31:12', '2015-04-10 16:31:12', NULL, NULL, 0, 4, 5),
(17, '2015-04-21 14:54:13', '2015-04-21 14:54:13', NULL, NULL, 0, 5, 4),
(18, '2015-04-21 14:57:35', '2015-04-21 14:57:35', NULL, NULL, 0, 6, 5),
(19, '2015-04-21 14:58:25', '2015-04-21 14:58:25', NULL, NULL, 0, 7, 5),
(20, '2015-04-21 15:05:49', '2015-04-21 15:05:49', NULL, NULL, 0, 8, 5),
(21, '2015-04-21 15:06:37', '2015-04-21 15:06:37', NULL, NULL, 0, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `instrument_procedures`
--

CREATE TABLE IF NOT EXISTS `instrument_procedures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `instrument_id` int(11) DEFAULT NULL,
  `procedure_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `instrument_procedures`
--

INSERT INTO `instrument_procedures` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `procedure_id`) VALUES
(1, '2015-04-08 15:04:15', '2015-04-08 15:04:15', NULL, NULL, 0, 1, 2),
(2, '2015-04-10 16:21:10', '2015-04-10 16:21:10', NULL, NULL, 0, 2, 2),
(5, '2015-04-10 16:23:00', '2015-04-10 16:23:00', NULL, NULL, 0, 3, 4),
(6, '2015-04-10 16:31:12', '2015-04-10 16:31:12', NULL, NULL, 0, 4, 3),
(7, '2015-04-21 14:54:13', '2015-04-21 14:54:13', NULL, NULL, 0, 5, 4),
(8, '2015-04-21 14:57:35', '2015-04-21 14:57:35', NULL, NULL, 0, 6, 4),
(9, '2015-04-21 14:58:25', '2015-04-21 14:58:25', NULL, NULL, 0, 7, 4),
(10, '2015-04-21 15:05:49', '2015-04-21 15:05:49', NULL, NULL, 0, 8, 4),
(11, '2015-04-21 15:06:37', '2015-04-21 15:06:37', NULL, NULL, 0, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `instrument_ranges`
--

CREATE TABLE IF NOT EXISTS `instrument_ranges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `instrument_id` int(11) DEFAULT NULL,
  `range_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `instrument_ranges`
--

INSERT INTO `instrument_ranges` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `range_id`) VALUES
(1, '2015-04-08 15:04:15', '2015-04-08 15:04:15', NULL, NULL, 0, 1, 1),
(2, '2015-04-10 16:21:10', '2015-04-10 16:21:10', NULL, NULL, 0, 2, 2),
(3, '2015-04-10 16:21:10', '2015-04-10 16:21:10', NULL, NULL, 0, 2, 3),
(6, '2015-04-10 16:23:00', '2015-04-10 16:23:00', NULL, NULL, 0, 3, 4),
(7, '2015-04-10 16:31:12', '2015-04-10 16:31:12', NULL, NULL, 0, 4, 5),
(8, '2015-04-21 14:54:13', '2015-04-21 14:54:13', NULL, NULL, 0, 5, 2),
(9, '2015-04-21 14:57:35', '2015-04-21 14:57:35', NULL, NULL, 0, 6, 4),
(10, '2015-04-21 14:58:25', '2015-04-21 14:58:25', NULL, NULL, 0, 7, 4),
(11, '2015-04-21 15:05:50', '2015-04-21 15:05:50', NULL, NULL, 0, 8, 3),
(12, '2015-04-21 15:06:37', '2015-04-21 15:06:37', NULL, NULL, 0, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `instrument_types`
--

CREATE TABLE IF NOT EXISTS `instrument_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `group_name` varchar(200) DEFAULT NULL,
  `group_description` text,
  `quotation` text,
  `salesorder` text,
  `deliveryorder` text,
  `invoice` text,
  `purchaseorder` text,
  `performainvoice` text,
  `subcontract_deliveryorder` text,
  `purchase_requisition` text,
  `recall_service` text,
  `onsite_schedule` text,
  `status` int(11) DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `instrument_types`
--

INSERT INTO `instrument_types` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `group_name`, `group_description`, `quotation`, `salesorder`, `deliveryorder`, `invoice`, `purchaseorder`, `performainvoice`, `subcontract_deliveryorder`, `purchase_requisition`, `recall_service`, `onsite_schedule`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2015-04-08 07:59:43', '2015-04-08 07:59:43', NULL, NULL, NULL, 'gunaseelan', 'guna treaders', 'guna  traders quotation', 'guna traders sales order', 'guna traders delivery  order', 'guna traders invoice', 'guna traders purchase order', 'guna traders performance invoice', 'guna traders  sub- contract delivery order', 'guna traders purchase requisition', 'guna traders recall service', 'guna onsite schedule', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ins_percents`
--

CREATE TABLE IF NOT EXISTS `ins_percents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `percent` int(11) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '0',
  `supervisor` int(11) NOT NULL DEFAULT '0',
  `manager` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ins_percents`
--

INSERT INTO `ins_percents` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `percent`, `user`, `supervisor`, `manager`, `status`, `is_deleted`) VALUES
(1, '2014-12-04 14:34:45', '2014-12-18 09:21:47', 1, 1, NULL, 40, 10, 20, 40, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prepare_invoice_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `invoiceno` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `invoice_date` varchar(200) DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `customername` varchar(200) DEFAULT NULL,
  `regaddress` text,
  `contactperson_id` int(22) DEFAULT NULL,
  `contactpersonname` varchar(200) DEFAULT NULL,
  `phone` int(22) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `due_amount` float DEFAULT NULL,
  `totalprice` double DEFAULT NULL,
  `jobstatus_id` varchar(20) DEFAULT NULL,
  `paymentterms_id` varchar(20) DEFAULT NULL,
  `invoice_type_id` varchar(200) DEFAULT NULL,
  `acknowledgement_type_id` int(11) DEFAULT NULL,
  `instrument_type_id` varchar(20) DEFAULT NULL,
  `salesperson_id` varchar(20) DEFAULT NULL,
  `gst` varchar(22) DEFAULT NULL,
  `currency_id` varchar(22) DEFAULT NULL,
  `remarks` text,
  `service_type` varchar(20) DEFAULT NULL,
  `currencyconversionrate` varchar(20) DEFAULT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `po_generate_type` varchar(200) DEFAULT NULL,
  `is_assign_po` int(11) NOT NULL DEFAULT '0',
  `is_approved` varchar(22) DEFAULT '0',
  `is_poapproved` int(11) NOT NULL DEFAULT '0',
  `po_approval_date` varchar(200) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `status` varchar(11) DEFAULT '1',
  `view` varchar(200) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_types`
--

CREATE TABLE IF NOT EXISTS `invoice_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `type_invoice` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invoice_types`
--

INSERT INTO `invoice_types` (`id`, `created`, `modified`, `created_by`, `modified_by`, `type_invoice`, `status`, `is_deleted`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 'Purchase order Full invoice', 1, 0),
(2, NULL, NULL, NULL, NULL, 'Quotation Full invioce', 1, 0),
(3, NULL, NULL, NULL, NULL, 'Sales order Full invioce', 1, 0),
(4, NULL, NULL, NULL, NULL, 'Delivery order Full invoice', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `labprocesses`
--

CREATE TABLE IF NOT EXISTS `labprocesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `description_id` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `locationname` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `locationname`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:39:18', '2015-04-07 14:39:18', NULL, NULL, 0, 'port blair', '', 1, 1),
(2, '2015-04-10 16:04:58', '2015-04-10 16:04:58', NULL, NULL, 0, 'SINGAPORE CENTRAL', '', 1, 0),
(3, '2015-04-10 16:05:10', '2015-04-10 16:05:10', NULL, NULL, 0, 'SINGAPORE NORTH', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logactivities`
--

CREATE TABLE IF NOT EXISTS `logactivities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `logname` varchar(100) DEFAULT NULL,
  `logactivity` varchar(100) DEFAULT NULL,
  `logid` varchar(200) DEFAULT NULL,
  `logno` varchar(200) NOT NULL,
  `invoice_type_id` int(11) DEFAULT NULL,
  `loglink` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `logapprove` int(11) DEFAULT '0',
  `approved_by` varchar(200) DEFAULT NULL,
  `logtime` datetime DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `logactivities`
--

INSERT INTO `logactivities` (`id`, `logname`, `logactivity`, `logid`, `logno`, `invoice_type_id`, `loglink`, `user_id`, `logapprove`, `approved_by`, `logtime`, `created`) VALUES
(1, 'Quotation', 'Add Quotation', '1', 'BQS-15-004005', NULL, NULL, '1', 2, '1', NULL, '2015-04-14'),
(2, 'Salesorder', 'Add SalesOrder', 'BSO-15-004007', '', NULL, NULL, NULL, 2, '1', NULL, '2015-04-14'),
(3, 'Purchaseorders', 'Add Purchaseorders', '1', 'BPO-15-000003', NULL, NULL, '1', 2, '1', NULL, '2015-04-14'),
(4, 'Purchaseorders', 'Add Purchaseorders', '1', 'BPO-15-000003', NULL, NULL, '1', 2, '1', NULL, '2015-04-14'),
(5, 'SubCon', 'Add SubCon', '1', 'BSD-01-10000003', NULL, NULL, '1', 2, '1', NULL, '2015-04-14'),
(6, 'SubCon', 'Add SubCon', '1', 'BSD-01-10000003', NULL, NULL, '1', 2, '1', NULL, '2015-04-14'),
(7, 'Proforma Invoice', 'Add Proforma', 'BPI-15-004004', '', NULL, NULL, NULL, 1, NULL, NULL, '2015-04-14'),
(8, 'Prequisition', 'Add Supervisor', '1', 'BRF-15-004007', NULL, NULL, '1', 2, '1', NULL, '2015-04-14'),
(9, 'Prequisition', 'Add Manager', '1', 'BRF-15-004007', NULL, NULL, '1', 2, '1', NULL, '2015-04-14'),
(10, 'Reqpurchaseorder', 'Add Reqpurchaseorder', '1', '', NULL, NULL, NULL, 2, '1', NULL, '2015-04-14'),
(11, 'C&Dinfo', 'Add Collection', '1', 'AMS PTE LTD ( MAIN ) ', NULL, '14-April-15', '1', 2, '1', NULL, '2015-04-14'),
(12, 'CustomerTagList', 'Add CustomerTagList', 'CUS-15-004006', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-15'),
(13, 'Deliveryorder', 'Add Delivery Order', '1', 'BDO-15-004011', NULL, NULL, '1', 2, '1', NULL, '2015-04-16'),
(14, 'ClientPO', 'Add', 'BSO-15-004007', 'BSO-15-004007', NULL, NULL, '1', 2, NULL, NULL, '2015-04-16'),
(15, 'Instrument', 'Add Instrument', '5', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-21'),
(16, 'Instrument', 'Add Instrument', '6', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-21'),
(17, 'Instrument', 'Add Instrument', '7', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-21'),
(18, 'Brand', 'Add Brand', '8', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-21'),
(19, 'Instrument', 'Add Instrument', '8', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-21'),
(20, 'Instrument', 'Add Instrument', '9', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-21'),
(21, 'Brand', 'Add Brand', '9', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-22'),
(22, 'Brand', 'Add Brand', '10', '', NULL, NULL, '1', 2, '12', NULL, '2015-04-22'),
(23, 'Brand', 'Add Brand', '11', '', NULL, NULL, '1', 2, '12', NULL, '2015-04-22'),
(24, 'Range', 'Add Range', '8', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-22'),
(25, 'Unit', 'Add Unit', '9', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-22'),
(26, 'CustomerTagList', 'Add CustomerTagList', 'CUS-15-004018', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-22'),
(27, 'CustomerTagList', 'Add CustomerTagList', 'CUS-15-004020', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-22'),
(28, 'CustomerTagList', 'Add CustomerTagList', 'CUS-15-004029', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-22'),
(29, 'CustomerTagList', 'Add CustomerTagList', 'CUS-15-004032', '', NULL, NULL, '1', 1, NULL, NULL, '2015-04-22'),
(30, 'Quotation', 'Add Quotation', '2', 'BQS-15-004010', NULL, NULL, '1', 1, NULL, NULL, '2015-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `onsites`
--

CREATE TABLE IF NOT EXISTS `onsites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `address` text,
  `fax` varchar(200) DEFAULT NULL,
  `schedule_status` varchar(200) DEFAULT NULL,
  `attn` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `details` text,
  `onsiteschedule_no` varchar(200) DEFAULT NULL,
  `schedule_date` varchar(200) DEFAULT NULL,
  `schedule_time` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `duration1` varchar(200) DEFAULT NULL,
  `duration2` varchar(200) DEFAULT NULL,
  `remarks` text,
  `schedule_created` varchar(200) DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` varchar(200) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `onsite_documents`
--

CREATE TABLE IF NOT EXISTS `onsite_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `onsiteschedule_no` varchar(200) DEFAULT NULL,
  `onsite_id` varchar(200) DEFAULT NULL,
  `upload_type` varchar(200) DEFAULT NULL,
  `document_name` varchar(200) DEFAULT NULL,
  `document_type` varchar(200) DEFAULT NULL,
  `document_size` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `onsite_engineers`
--

CREATE TABLE IF NOT EXISTS `onsite_engineers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `onsite_id` int(11) DEFAULT NULL,
  `onsiteschedule_no` varchar(200) DEFAULT NULL,
  `engineer_name` varchar(200) DEFAULT NULL,
  `engineer_email_id` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `onsite_instruments`
--

CREATE TABLE IF NOT EXISTS `onsite_instruments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `onsite_id` varchar(200) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `onsite_quantity` varchar(200) DEFAULT NULL,
  `instrument_id` int(11) DEFAULT NULL,
  `model_no` varchar(200) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `onsite_range` varchar(200) DEFAULT NULL,
  `onsite_calllocation` varchar(200) DEFAULT NULL,
  `onsite_calltype` varchar(200) DEFAULT NULL,
  `onsite_validity` int(11) DEFAULT NULL,
  `onsite_unitprice` varchar(200) DEFAULT NULL,
  `onsite_discount` varchar(200) DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL,
  `onsite_accountservice` varchar(100) DEFAULT NULL,
  `onsite_titles` varchar(100) DEFAULT NULL,
  `onsite_total` varchar(200) DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `title1_val` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `title2_val` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `title3_val` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `title4_val` varchar(200) DEFAULT NULL,
  `title5` varchar(200) DEFAULT NULL,
  `title5_val` varchar(200) DEFAULT NULL,
  `title6` varchar(200) DEFAULT NULL,
  `title6_val` varchar(200) DEFAULT NULL,
  `title7` varchar(200) DEFAULT NULL,
  `title7_val` varchar(200) DEFAULT NULL,
  `title8` varchar(200) DEFAULT NULL,
  `title8_val` varchar(200) DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paymentterms`
--

CREATE TABLE IF NOT EXISTS `paymentterms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `paymentterm` varchar(100) DEFAULT NULL,
  `paymenttype` varchar(50) DEFAULT NULL,
  `description` text,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `paymentterms`
--

INSERT INTO `paymentterms` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `paymentterm`, `paymenttype`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:39:33', '2015-04-07 14:39:33', NULL, NULL, 0, '20', 'month', 'sqq', 1, 1),
(2, '2015-04-10 16:04:03', '2015-04-10 16:04:03', NULL, NULL, 0, '30', 'days', '', 1, 0),
(3, '2015-04-10 16:04:19', '2015-04-10 16:04:19', NULL, NULL, 0, '0', 'COD', '', 1, 0),
(4, '2015-04-10 16:04:37', '2015-04-10 16:04:37', NULL, NULL, 0, '15', 'days', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prepare_invoices`
--

CREATE TABLE IF NOT EXISTS `prepare_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `track_id` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `prepared_date` date DEFAULT NULL,
  `prepared_by` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `conversion_rate` float DEFAULT NULL,
  `due_amount` float DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `customername` varchar(200) DEFAULT NULL,
  `billingaddress` text,
  `contactperson` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `service_type` varchar(200) DEFAULT NULL,
  `paymentterms_id` int(11) DEFAULT NULL,
  `customer_puchaseorder_no` varchar(200) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `salesorderno` varchar(200) DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `po_generate_type` varchar(200) DEFAULT NULL,
  `is_assign_po` int(11) NOT NULL DEFAULT '0',
  `poapproved_date` varchar(200) DEFAULT NULL,
  `is_quotation_app` int(11) NOT NULL DEFAULT '0',
  `is_salesorder_app` int(11) NOT NULL DEFAULT '0',
  `is_deliveryorder_app` int(11) NOT NULL DEFAULT '0',
  `acknowledgement_type_id` int(11) DEFAULT NULL,
  `is_approved` int(11) DEFAULT NULL,
  `is_poapproved` int(11) NOT NULL DEFAULT '0',
  `approved_date` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prequistions`
--

CREATE TABLE IF NOT EXISTS `prequistions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `track_id` varchar(200) DEFAULT NULL,
  `prequistionno` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `customername` text,
  `address` text,
  `due_amount` float DEFAULT NULL,
  `attn` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` text,
  `paymentterm_name` varchar(200) DEFAULT NULL,
  `reg_date` varchar(100) DEFAULT NULL,
  `ref_no` text,
  `po_generate_type` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `priority` varchar(200) DEFAULT NULL,
  `instrument_type_id` varchar(200) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `status` int(10) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `is_prpurchaseorder_created` int(11) DEFAULT '0',
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  `is_superviser_approved` int(11) DEFAULT '0',
  `is_manager_approved` int(11) DEFAULT '0',
  `is_assign_po` int(11) DEFAULT '0',
  `is_poapproved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prequistions`
--

INSERT INTO `prequistions` (`id`, `track_id`, `prequistionno`, `customer_id`, `branch_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `paymentterm_name`, `reg_date`, `ref_no`, `po_generate_type`, `discount`, `priority`, `instrument_type_id`, `is_approved`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `is_prpurchaseorder_created`, `is_jobcompleted`, `is_superviser_approved`, `is_manager_approved`, `is_assign_po`, `is_poapproved`, `is_deleted`) VALUES
(1, 'BSTRA-15-004047', 'BRF-15-004007', 'CUS-15-004005', 3, 'ALIF ELECTRONICS ( MAIN ) ', '04-02 SIMLIM SQUARE\r\nSINGAPORE 654345', NULL, '6', '65412322', '65412333', 'haji@alifelectronics.com', '0 COD', '14-Apr-2015', 'aaaaaaa', NULL, '', NULL, '1', 0, 1, '2015-04-14 11:20:25', '2015-04-14 11:20:25', 2015, NULL, 0, 1, 0, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `preq_customerspecialneeds`
--

CREATE TABLE IF NOT EXISTS `preq_customerspecialneeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `prequistion_id` varchar(200) DEFAULT NULL,
  `salespeople_id` int(10) DEFAULT NULL,
  `salesperson_name` varchar(200) DEFAULT NULL,
  `projectname` varchar(200) DEFAULT NULL,
  `gsttype` varchar(200) DEFAULT NULL,
  `gst` float DEFAULT NULL,
  `currency_id` int(10) DEFAULT NULL,
  `currency_value` float DEFAULT NULL,
  `additionalcharge_id` int(11) DEFAULT NULL,
  `additional_service_value` varchar(200) DEFAULT NULL,
  `remarks` text,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `preq_customerspecialneeds`
--

INSERT INTO `preq_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `prequistion_id`, `salespeople_id`, `salesperson_name`, `projectname`, `gsttype`, `gst`, `currency_id`, `currency_value`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(1, '2015-04-14 11:20:25', '2015-04-14 11:20:25', NULL, NULL, 0, '1', NULL, 'MS NORA', '', 'Standard', 7, 1, 0.025, NULL, '', 'remark23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `preq_devices`
--

CREATE TABLE IF NOT EXISTS `preq_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `prequistion_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `instrument_name` varchar(200) DEFAULT NULL,
  `prequistionno` varchar(200) DEFAULT NULL,
  `brand_name` varchar(200) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `model_no` varchar(50) DEFAULT NULL,
  `range` varchar(50) DEFAULT NULL,
  `validity` int(10) DEFAULT NULL,
  `unit_price` varchar(20) DEFAULT NULL,
  `device_discount` varchar(50) DEFAULT NULL,
  `department_name` varchar(200) DEFAULT NULL,
  `account_service` varchar(50) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `title1_val` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `title2_val` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `title3_val` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `title4_val` varchar(200) DEFAULT NULL,
  `title5` varchar(200) DEFAULT NULL,
  `title5_val` varchar(200) DEFAULT NULL,
  `title6` varchar(200) DEFAULT NULL,
  `title6_val` varchar(200) DEFAULT NULL,
  `title7` varchar(200) DEFAULT NULL,
  `title7_val` varchar(200) DEFAULT NULL,
  `title8` varchar(200) DEFAULT NULL,
  `title8_val` varchar(200) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `preq_devices`
--

INSERT INTO `preq_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `prequistion_id`, `customer_id`, `instrument_name`, `prequistionno`, `brand_name`, `quantity`, `model_no`, `range`, `validity`, `unit_price`, `device_discount`, `department_name`, `account_service`, `total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `title`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2015-04-14 11:20:14', '2015-04-14 11:20:14', NULL, NULL, 0, '1', 'CUS-15-004005', 'aaaa', 'BRF-15-004007', 'aaaa', '3', 'aaa', 'aaa', 12, '56', '', 'sdsd', '1', '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 1, 0, 0),
(2, '2015-04-14 11:20:14', '2015-04-14 11:20:14', NULL, NULL, 0, '1', 'CUS-15-004005', 'aaaa', 'BRF-15-004007', 'aaaa', '3', 'aaa', 'aaa', 12, '56', '', 'sdsd', '1', '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 1, 0, 0),
(3, '2015-04-14 11:20:15', '2015-04-14 11:20:15', NULL, NULL, 0, '1', 'CUS-15-004005', 'aaaa', 'BRF-15-004007', 'aaaa', '3', 'aaa', 'aaa', 12, '56', '', 'sdsd', '1', '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `priority` varchar(100) DEFAULT NULL,
  `description` text,
  `noofdays` int(10) DEFAULT NULL,
  `multipleof` float DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `priority`, `description`, `noofdays`, `multipleof`, `status`, `is_deleted`) VALUES
(1, '2015-04-10 16:02:30', '2015-04-10 16:02:30', NULL, NULL, 0, 'NORMAL', '', 5, 1, 1, 0),
(2, '2015-04-10 16:02:50', '2015-04-10 16:03:23', NULL, NULL, 0, 'PLATINUM', '', 1, 2, 1, 0),
(3, '2015-04-10 16:03:07', '2015-04-10 16:03:39', NULL, NULL, 0, 'EXPRESS', '', 2, 1.5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE IF NOT EXISTS `procedures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created` varchar(200) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `procedure_no` varchar(50) DEFAULT NULL,
  `description` text,
  `status` int(11) DEFAULT '1',
  `is_approved` int(11) DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`id`, `created_by`, `modified_by`, `view`, `created`, `modified`, `department_id`, `procedure_no`, `description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, NULL, NULL, 0, '2015-04-08 07:33:54', '2015-04-10 16:12:24', 6, 'BST-MP-002', '', 1, 1, 0),
(2, NULL, NULL, 0, '2015-04-08 08:07:20', '2015-04-10 16:12:56', 6, 'BST-MP-001', '', 1, 1, 0),
(3, NULL, NULL, 0, '2015-04-10 16:10:53', '2015-04-10 16:10:53', 7, 'BST-E-001', '', 1, 1, 0),
(4, NULL, NULL, 0, '2015-04-10 16:11:58', '2015-04-10 16:11:58', 2, 'BST-TP-001', '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proformas`
--

CREATE TABLE IF NOT EXISTS `proformas` (
  `id` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `proforma_id` varchar(200) DEFAULT NULL,
  `salesorderno` varchar(200) DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `branchname` text,
  `customername` text,
  `address` text,
  `due_amount` float DEFAULT NULL,
  `attn` text,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` text,
  `reg_date` varchar(100) DEFAULT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `our_ref_no` varchar(200) DEFAULT NULL,
  `in_date` varchar(100) DEFAULT NULL,
  `due_date` varchar(100) DEFAULT NULL,
  `priority` text,
  `instrument_type` varchar(500) DEFAULT NULL,
  `remarks` text,
  `service_id` int(11) DEFAULT NULL,
  `is_approved` varchar(10) DEFAULT '1',
  `is_approved_lab` int(11) DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proformas`
--

INSERT INTO `proformas` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `proforma_id`, `salesorderno`, `track_id`, `quotation_id`, `customer_id`, `branchname`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `reg_date`, `ref_no`, `our_ref_no`, `in_date`, `due_date`, `priority`, `instrument_type`, `remarks`, `service_id`, `is_approved`, `is_approved_lab`, `is_deleted`) VALUES
('BPI-15-004004', '2015-04-14 11:11:02', '2015-04-14 11:11:02', NULL, NULL, 0, NULL, 'BSO-15-004007', NULL, NULL, 'CUS-15-004002', NULL, NULL, '41 SENOKO DRIVE\r\nSINGAPORE 758249', NULL, '2', '64584411', '64584400', 'erick@bs.sg', '14-Apr-2015', 'CPO-15-004011', 'BQS-15-004005', NULL, NULL, '1', '1', '', 1, '1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE IF NOT EXISTS `purchaseorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `purchase_name` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `purchaseorder_no` varchar(200) DEFAULT NULL,
  `customer_address` text,
  `due_amount` float DEFAULT NULL,
  `attn` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `payment_terms` varchar(200) DEFAULT NULL,
  `instrument_type_id` varchar(200) DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `salesperson` varchar(200) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `purchaseorder_date` varchar(200) DEFAULT NULL,
  `your_ref_no` varchar(200) DEFAULT NULL,
  `our_ref_no` varchar(200) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchaseorders`
--

INSERT INTO `purchaseorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `purchase_name`, `branch_id`, `purchaseorder_no`, `customer_address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `payment_terms`, `instrument_type_id`, `track_id`, `ref_no`, `salesperson`, `service_id`, `remarks`, `salesorder_id`, `purchaseorder_date`, `your_ref_no`, `our_ref_no`, `is_deleted`, `is_approved`) VALUES
(1, '2015-04-14 10:20:51', '2015-04-14 10:20:51', NULL, NULL, 0, 'CUS-15-004004', 'CAL TECH PTE LTD', NULL, 'BPO-15-000003', '23 WOODLAND DRIVE\r\nSINGAPORE 123321', NULL, '5', '65478999', '6478999', 'tan@caltech.com', NULL, 'guna traders purchase order', 'BSTRA-15-004045', 'CPO-15-004011', 'MS NORA', 1, 'remark', 'BSO-15-004007', '', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pur_customerspecialneeds`
--

CREATE TABLE IF NOT EXISTS `pur_customerspecialneeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `purchaseorder_id` varchar(200) DEFAULT NULL,
  `salespeople_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `additionalcharge_id` int(11) DEFAULT NULL,
  `additional_service_value` int(11) DEFAULT NULL,
  `remarks` text,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pur_customerspecialneeds`
--

INSERT INTO `pur_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `purchaseorder_id`, `salespeople_id`, `currency_id`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(1, '2015-04-14 10:20:51', '2015-04-14 10:20:51', NULL, NULL, 0, '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pur_description`
--

CREATE TABLE IF NOT EXISTS `pur_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `quotation_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `instrument_id` varchar(20) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `model_no` varchar(200) DEFAULT NULL,
  `range` varchar(200) DEFAULT NULL,
  `call_location` varchar(50) DEFAULT NULL,
  `call_type` varchar(50) DEFAULT NULL,
  `validity` int(10) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `department_id` varchar(100) DEFAULT NULL,
  `account_service` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE IF NOT EXISTS `quotations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `track_id` varchar(200) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `customername` text,
  `address` text,
  `due_amount` float DEFAULT NULL,
  `attn` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` text,
  `paymentterm_id` int(11) DEFAULT NULL,
  `reg_date` varchar(100) DEFAULT NULL,
  `ref_no` text,
  `ref_count` varchar(200) DEFAULT NULL,
  `total_inst` int(11) NOT NULL DEFAULT '0',
  `po_generate_type` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `priority` varchar(200) DEFAULT NULL,
  `instrument_type_id` varchar(200) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `is_approved_date` varchar(200) DEFAULT NULL,
  `is` int(11) NOT NULL,
  `status` int(10) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `salesorder_created` int(11) DEFAULT '0',
  `is_deliveryorder_created` int(11) DEFAULT '0',
  `is_delivery_approved` int(11) NOT NULL DEFAULT '0',
  `is_invoice_created` int(11) NOT NULL DEFAULT '0',
  `is_invoice_approved` int(11) NOT NULL DEFAULT '0',
  `quo_device_count` int(11) DEFAULT NULL,
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  `total_device_rate` int(11) DEFAULT NULL,
  `is_assign_po` int(11) DEFAULT '0',
  `po_approval_date` varchar(200) DEFAULT NULL,
  `is_poapproved` int(11) NOT NULL DEFAULT '0',
  `is_pocount_satisfied` int(11) DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `track_id`, `quotationno`, `customer_id`, `branch_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `paymentterm_id`, `reg_date`, `ref_no`, `ref_count`, `total_inst`, `po_generate_type`, `discount`, `priority`, `instrument_type_id`, `is_approved`, `is_approved_date`, `is`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorder_created`, `is_deliveryorder_created`, `is_delivery_approved`, `is_invoice_created`, `is_invoice_approved`, `quo_device_count`, `is_jobcompleted`, `total_device_rate`, `is_assign_po`, `po_approval_date`, `is_poapproved`, `is_pocount_satisfied`, `is_deleted`) VALUES
(1, 'BSTRA-15-004045', 'BQS-15-004005', 'CUS-15-004002', 3, 'AMS PTE LTD ( MAIN ) ', '41 SENOKO DRIVE\r\nSINGAPORE 758249', NULL, '2', '64584411', '64584400', 'erick@bs.sg', 3, '14-Apr-2015', 'CPO-15-004011,PO#15-004011', '0,3', 0, 'Manual', '', '1', '1', 1, NULL, 0, 1, '2015-04-14 09:56:36', '2015-04-14 09:56:36', 2015, NULL, 0, 1, 1, 1, 0, 0, NULL, 0, NULL, 1, '1995', 1, 0, 0),
(2, 'BSTRA-15-004059', 'BQS-15-004010', 'CUS-15-004002', 3, 'AMS PTE LTD ( MAIN ) ', '41 SENOKO DRIVE\r\nSINGAPORE 758249', NULL, '3', '64584411', '64584400', 'babu@bs.sg', 3, '22-Apr-2015', 'sad', '0', 0, 'Manual', '', '1', '1', 0, NULL, 0, 1, '2015-04-22 23:14:09', '2015-04-22 23:14:09', 2015, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quo_customerspecialneeds`
--

CREATE TABLE IF NOT EXISTS `quo_customerspecialneeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `quotation_id` varchar(200) DEFAULT NULL,
  `salespeople_id` int(10) DEFAULT NULL,
  `salesperson_name` varchar(200) DEFAULT NULL,
  `projectname` varchar(200) DEFAULT NULL,
  `gsttype` varchar(200) DEFAULT NULL,
  `gst` float DEFAULT NULL,
  `currency_id` int(10) DEFAULT NULL,
  `currency_value` float DEFAULT NULL,
  `additionalcharge_id` int(11) DEFAULT NULL,
  `additional_service_value` varchar(200) DEFAULT NULL,
  `remarks` text,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quo_customerspecialneeds`
--

INSERT INTO `quo_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `salespeople_id`, `salesperson_name`, `projectname`, `gsttype`, `gst`, `currency_id`, `currency_value`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(1, '2015-04-14 09:56:36', '2015-04-14 09:56:36', NULL, NULL, 0, '1', NULL, NULL, '', 'Standard', 7, 1, 0.025, NULL, '', '', 1),
(2, '2015-04-22 23:14:10', '2015-04-22 23:14:10', NULL, NULL, 0, '2', NULL, 'MR BABU', 'sda', 'Standard', 7, 1, 0.025, 1, '', 'sad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quo_devices`
--

CREATE TABLE IF NOT EXISTS `quo_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `quotation_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `description_id` int(10) DEFAULT NULL,
  `instrument_id` varchar(20) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `model_no` varchar(50) DEFAULT NULL,
  `range` varchar(50) DEFAULT NULL,
  `call_location` varchar(50) DEFAULT NULL,
  `call_type` varchar(50) DEFAULT NULL,
  `validity` int(10) DEFAULT NULL,
  `unit_price` varchar(20) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `department_id` varchar(100) DEFAULT NULL,
  `account_service` varchar(50) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `title1_val` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `title2_val` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `title3_val` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `title4_val` varchar(200) DEFAULT NULL,
  `title5` varchar(200) DEFAULT NULL,
  `title5_val` varchar(200) DEFAULT NULL,
  `title6` varchar(200) DEFAULT NULL,
  `title6_val` varchar(200) DEFAULT NULL,
  `title7` varchar(200) DEFAULT NULL,
  `title7_val` varchar(200) DEFAULT NULL,
  `title8` varchar(200) DEFAULT NULL,
  `title8_val` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  `onsite_id` int(11) DEFAULT NULL,
  `onsite` int(11) NOT NULL DEFAULT '0',
  `onsite_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `quo_devices`
--

INSERT INTO `quo_devices` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `salesorder_id`, `customer_id`, `description_id`, `instrument_id`, `quotationno`, `brand_id`, `quantity`, `model_no`, `range`, `call_location`, `call_type`, `validity`, `unit_price`, `discount`, `department_id`, `account_service`, `total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `status`, `is_approved`, `is_deleted`, `onsite_id`, `onsite`, `onsite_del`) VALUES
(1, 1, '2015-04-14 09:56:32', '2015-04-14 09:56:32', NULL, NULL, 0, '1', NULL, 'CUS-15-004002', NULL, '2', 'BQS-15-004005', 6, '3', 'MA12', '3', 'subcontract', 'Singlas', 12, '0', '', '6', 'calibration service', '0', NULL, NULL, NULL, '.FAULTY.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(2, 2, '2015-04-14 09:56:32', '2015-04-14 09:56:32', NULL, NULL, 0, '1', NULL, 'CUS-15-004002', NULL, '2', 'BQS-15-004005', 6, '3', 'MA12', '3', 'subcontract', 'Singlas', 12, '100', '', '6', 'calibration service', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(3, 3, '2015-04-14 09:56:32', '2015-04-14 09:56:32', NULL, NULL, 0, '1', NULL, 'CUS-15-004002', NULL, '2', 'BQS-15-004005', 6, '3', 'MA12', '3', 'subcontract', 'Singlas', 12, '100', '', '6', 'calibration service', '100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(4, 1, '2015-04-21 17:18:31', '2015-04-21 17:18:31', NULL, NULL, 0, NULL, NULL, 'CUS-15-004002', NULL, '2', 'BQS-15-004007', 6, '3', 'MA12', '3', 'Inlab', 'Singlas', 12, '100', '', '6', 'calibration service', '100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 0, 0),
(5, 2, '2015-04-21 17:18:31', '2015-04-21 17:18:31', NULL, NULL, 0, NULL, NULL, 'CUS-15-004002', NULL, '2', 'BQS-15-004007', 6, '3', 'MA12', '3', 'Inlab', 'Singlas', 12, '100', '', '6', 'calibration service', '100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 0, 0),
(6, 3, '2015-04-21 17:18:31', '2015-04-21 17:18:31', NULL, NULL, 0, NULL, NULL, 'CUS-15-004002', NULL, '2', 'BQS-15-004007', 6, '3', 'MA12', '3', 'Inlab', 'Singlas', 12, '100', '', '6', 'calibration service', '100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 0, 0),
(7, 1, '2015-04-22 23:13:17', '2015-04-22 23:13:17', NULL, NULL, 0, '2', NULL, 'CUS-15-004002', NULL, '2', 'BQS-15-004010', 6, '1', 'MA12', '3', 'Inlab', 'Singlas', 12, '100', '', '6', 'calibration service', '100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quo_documents`
--

CREATE TABLE IF NOT EXISTS `quo_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `upload_type` varchar(200) DEFAULT NULL,
  `document_name` varchar(200) DEFAULT NULL,
  `document_type` varchar(200) DEFAULT NULL,
  `document_size` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `randoms`
--

CREATE TABLE IF NOT EXISTS `randoms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(200) DEFAULT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `group` varchar(200) DEFAULT NULL,
  `instrument` varchar(200) DEFAULT NULL,
  `quotation` varchar(200) DEFAULT NULL,
  `salesorder` varchar(200) DEFAULT NULL,
  `deliveryorder` varchar(200) DEFAULT NULL,
  `invoice` varchar(200) DEFAULT NULL,
  `clientpo` varchar(200) DEFAULT NULL,
  `proforma` varchar(200) DEFAULT NULL,
  `track` varchar(200) DEFAULT NULL,
  `PurchasRequisition` varchar(200) DEFAULT NULL,
  `pr_purchaseorder` varchar(200) DEFAULT NULL,
  `onsites` varchar(200) DEFAULT NULL,
  `subcon` varchar(200) DEFAULT NULL,
  `uncertain` varchar(200) DEFAULT NULL,
  `templateno` varchar(200) DEFAULT NULL,
  `certificateno` varchar(255) DEFAULT NULL,
  `purchaseorders` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer` (`customer`),
  UNIQUE KEY `quotation` (`quotation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `randoms`
--

INSERT INTO `randoms` (`id`, `customer`, `tag`, `group`, `instrument`, `quotation`, `salesorder`, `deliveryorder`, `invoice`, `clientpo`, `proforma`, `track`, `PurchasRequisition`, `pr_purchaseorder`, `onsites`, `subcon`, `uncertain`, `templateno`, `certificateno`, `purchaseorders`) VALUES
(1, 'CUS-15-004035', 'TAG-15-004035', 'CGRU-15-004009', 'BIT-15-004001', 'BQS-15-004012', 'BSO-15-004007', 'BDO-15-004011', 'BIN-15-004006', 'CPO-15-004012', 'BPI-15-004004', 'BSTRA-15-004061', 'BRF-15-004009', 'BPO-15-004006', 'OSS-15-004002', 'BSD-01-10000003', '', '', 'TS-0017-00', 'BPO-15-000003');

-- --------------------------------------------------------

--
-- Table structure for table `ranges`
--

CREATE TABLE IF NOT EXISTS `ranges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created` varchar(200) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `from_range` varchar(20) DEFAULT NULL,
  `to_range` varchar(20) DEFAULT NULL,
  `range_name` varchar(200) NOT NULL,
  `unit_id` varchar(20) DEFAULT NULL,
  `range_description` text,
  `status` int(11) DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `created_by`, `modified_by`, `view`, `created`, `modified`, `from_range`, `to_range`, `range_name`, `unit_id`, `range_description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, NULL, NULL, 0, '2015-04-07 15:17:21', '2015-04-07 15:17:21', '10', '20', '(10~20)/aa', '1', '', 0, 1, 1),
(2, NULL, NULL, 0, '2015-04-10 16:16:46', '2015-04-10 16:16:46', '0', '1000', '(0~1000)/PSI', '5', '', 1, 1, 0),
(3, NULL, NULL, 0, '2015-04-10 16:16:58', '2015-04-10 16:16:58', '0', '300', '(0~300)/BAR', '6', '', 1, 1, 0),
(4, NULL, NULL, 0, '2015-04-10 16:17:12', '2015-04-10 16:17:12', '0', '200', '(0~200)/ËšC', '3', '', 1, 1, 0),
(5, NULL, NULL, 0, '2015-04-10 16:17:37', '2015-04-10 16:19:12', 'MULTIRANGE', '', '(MULTIRANGE~)/-', '8', '', 1, 1, 0),
(6, NULL, NULL, 0, '2015-04-12 22:03:52', '2015-04-12 22:03:52', 'MULTIRANGE', '', 'MULTIRANGE ËšF', '4', '', 1, 0, 0),
(7, NULL, NULL, 0, '2015-04-12 22:04:11', '2015-04-12 22:04:11', 'MUTIRANGE', '', 'MUTIRANGE -', '8', '', 1, 0, 0),
(8, NULL, NULL, 0, '22-Apr-2015', '2015-04-22 17:22:54', '0', '45', '(0~45)/ËšC', '3', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `readytodeliver_items`
--

CREATE TABLE IF NOT EXISTS `readytodeliver_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `collection_delivery_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `cd_date` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `salesorderno` varchar(200) DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `deliveryorderno` varchar(200) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `is_shipped` int(11) NOT NULL DEFAULT '0',
  `shipped_date` varchar(200) DEFAULT NULL,
  `is_delivered` int(11) NOT NULL DEFAULT '0',
  `delivered_date` varchar(200) DEFAULT NULL,
  `assign_to` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `referedbies`
--

CREATE TABLE IF NOT EXISTS `referedbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `referedby` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `referedbies`
--

INSERT INTO `referedbies` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `referedby`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-04-10 16:01:32', '2015-04-10 16:01:32', NULL, NULL, 0, 'MR BABU', '', 1, 0),
(2, '2015-04-10 16:01:42', '2015-04-10 16:01:42', NULL, NULL, 0, 'MS NORA', '', 1, 0),
(3, '2015-04-10 16:01:52', '2015-04-10 16:01:52', NULL, NULL, 0, 'MS DEVI', '', 1, 0),
(4, '2015-04-10 16:02:04', '2015-04-10 16:02:04', NULL, NULL, 0, 'BS TECH', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reqpurchaseorders`
--

CREATE TABLE IF NOT EXISTS `reqpurchaseorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `track_id` varchar(200) DEFAULT NULL,
  `reqpurchaseno` varchar(200) DEFAULT NULL,
  `prequisitionno` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `customername` text,
  `address` text,
  `due_amount` float DEFAULT NULL,
  `attn` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` text,
  `paymentterm_name` varchar(200) DEFAULT NULL,
  `reg_date` varchar(100) DEFAULT NULL,
  `ref_no` text,
  `po_generate_type` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `priority` varchar(200) DEFAULT NULL,
  `instrument_type_name` varchar(200) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `status` int(10) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `is_assign_po` int(11) DEFAULT '0',
  `is_poapproved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reqpurchaseorders`
--

INSERT INTO `reqpurchaseorders` (`id`, `track_id`, `reqpurchaseno`, `prequisitionno`, `customer_id`, `branch_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `paymentterm_name`, `reg_date`, `ref_no`, `po_generate_type`, `discount`, `priority`, `instrument_type_name`, `is_approved`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `is_assign_po`, `is_poapproved`, `is_deleted`) VALUES
(1, 'BSTRA-15-004047', 'BPO-15-004006', 'BRF-15-004007', 'CUS-15-004005', 3, 'ALIF ELECTRONICS ( MAIN ) ', '04-02 SIMLIM SQUARE\r\nSINGAPORE 654345', NULL, '6', '65412322', '65412333', 'haji@alifelectronics.com', '0 COD', '14-Apr-2015', 'aaaaaaa', NULL, '', NULL, 'guna traders purchase requisition', 1, 1, '2015-04-14 13:53:02', '2015-04-14 13:53:02', NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reqpur_customerspecialneeds`
--

CREATE TABLE IF NOT EXISTS `reqpur_customerspecialneeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `reqpurchaseorder_id` varchar(200) DEFAULT NULL,
  `salespeople_id` int(10) DEFAULT NULL,
  `salesperson_name` varchar(200) DEFAULT NULL,
  `projectname` varchar(200) DEFAULT NULL,
  `gsttype` varchar(200) DEFAULT NULL,
  `gst` float DEFAULT NULL,
  `currency_id` int(10) DEFAULT NULL,
  `currency_value` float DEFAULT NULL,
  `additionalcharge_id` int(11) DEFAULT NULL,
  `additional_service_value` varchar(200) DEFAULT NULL,
  `remarks` text,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reqpur_customerspecialneeds`
--

INSERT INTO `reqpur_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `reqpurchaseorder_id`, `salespeople_id`, `salesperson_name`, `projectname`, `gsttype`, `gst`, `currency_id`, `currency_value`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(1, '2015-04-14 13:53:02', '2015-04-14 13:53:02', NULL, NULL, 0, '1', NULL, 'MS NORA', '', 'Standard', 7, 1, 0.025, NULL, '', 'remark23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reqpur_devices`
--

CREATE TABLE IF NOT EXISTS `reqpur_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `reqpurchaseorder_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `instrument_name` varchar(200) DEFAULT NULL,
  `prequistionno` varchar(200) DEFAULT NULL,
  `brand_name` varchar(200) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `model_no` varchar(50) DEFAULT NULL,
  `range` varchar(50) DEFAULT NULL,
  `validity` int(10) DEFAULT NULL,
  `unit_price` varchar(20) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `department_name` varchar(200) DEFAULT NULL,
  `account_service` varchar(50) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `title1_val` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `title2_val` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `title3_val` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `title4_val` varchar(200) DEFAULT NULL,
  `title5` varchar(200) DEFAULT NULL,
  `title5_val` varchar(200) DEFAULT NULL,
  `title6` varchar(200) DEFAULT NULL,
  `title6_val` varchar(200) DEFAULT NULL,
  `title7` varchar(200) DEFAULT NULL,
  `title7_val` varchar(200) DEFAULT NULL,
  `title8` varchar(200) DEFAULT NULL,
  `title8_val` varchar(200) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `is_approved` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reqpur_devices`
--

INSERT INTO `reqpur_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `reqpurchaseorder_id`, `customer_id`, `instrument_name`, `prequistionno`, `brand_name`, `quantity`, `model_no`, `range`, `validity`, `unit_price`, `discount`, `department_name`, `account_service`, `total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `title`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2015-04-14 13:52:45', '2015-04-14 13:52:45', NULL, NULL, 0, '1', 'CUS-15-004005', 'aaaa', 'BRF-15-004007', 'aaaa', '3', 'aaa', 'aaa', 12, '56', '', 'sdsd', '1', '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 1, 0, 0),
(2, '2015-04-14 13:52:45', '2015-04-14 13:52:45', NULL, NULL, 0, '1', 'CUS-15-004005', 'aaaa', 'BRF-15-004007', 'aaaa', '3', 'aaa', 'aaa', 12, '56', '', 'sdsd', '1', '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 1, 0, 0),
(3, '2015-04-14 13:52:45', '2015-04-14 13:52:45', NULL, NULL, 0, '1', 'CUS-15-004005', 'aaaa', 'BRF-15-004007', 'aaaa', '3', 'aaa', 'aaa', 12, '56', '', 'sdsd', '1', '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesorders`
--

CREATE TABLE IF NOT EXISTS `salesorders` (
  `id` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `salesorderno` varchar(200) DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `customername` text,
  `address` text,
  `due_amount` float DEFAULT NULL,
  `attn` text,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` text,
  `reg_date` varchar(100) DEFAULT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `ref_count` varchar(200) DEFAULT NULL,
  `total_inst` int(11) NOT NULL DEFAULT '0',
  `our_ref_no` varchar(200) DEFAULT NULL,
  `in_date` varchar(100) DEFAULT NULL,
  `due_date` varchar(100) DEFAULT NULL,
  `priority` text,
  `instrument_type_id` int(11) DEFAULT NULL,
  `remarks` text,
  `service_id` int(11) DEFAULT NULL,
  `sal_description_count` int(11) DEFAULT NULL,
  `po_generate_type` varchar(200) DEFAULT NULL,
  `is_assign_po` int(11) NOT NULL DEFAULT '0',
  `is_poapproved` int(11) DEFAULT '0',
  `po_approval_date` varchar(200) DEFAULT NULL,
  `is_pocount_satisfied` int(11) DEFAULT NULL,
  `is_approved` varchar(10) DEFAULT '0',
  `is_approved_lab` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) DEFAULT '0',
  `is_deliveryorder_created` int(11) DEFAULT '0',
  `is_delivery_approved` int(11) NOT NULL DEFAULT '0',
  `is_invoice_created` int(11) DEFAULT '0',
  `is_invoice_approved` int(11) NOT NULL DEFAULT '0',
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  `is_trackcompleted` int(11) NOT NULL DEFAULT '0',
  `track_remark` varchar(200) DEFAULT NULL,
  `track_person` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorders`
--

INSERT INTO `salesorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorderno`, `track_id`, `branch_id`, `quotation_id`, `quotationno`, `customer_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `reg_date`, `ref_no`, `ref_count`, `total_inst`, `our_ref_no`, `in_date`, `due_date`, `priority`, `instrument_type_id`, `remarks`, `service_id`, `sal_description_count`, `po_generate_type`, `is_assign_po`, `is_poapproved`, `po_approval_date`, `is_pocount_satisfied`, `is_approved`, `is_approved_lab`, `status`, `is_deleted`, `is_deliveryorder_created`, `is_delivery_approved`, `is_invoice_created`, `is_invoice_approved`, `is_jobcompleted`, `is_trackcompleted`, `track_remark`, `track_person`) VALUES
('BSO-15-004007', '2015-04-14 09:57:23', '2015-04-15 14:00:57', 1, NULL, 0, 'BSO-15-004007', 'BSTRA-15-004045', 3, '1', 'BQS-15-004005', 'CUS-15-004002', NULL, '41 SENOKO DRIVE\r\nSINGAPORE 758249', NULL, '2', '64584411', '64584400', 'erick@bs.sg', '14-Apr-2015', 'PO#15-004011', '3', 0, NULL, '14-Apr-2015', '18-Apr-2015', NULL, 0, '', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 0, 1, 0, 1, 0, 0, 0, 0, 0, 'fgd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salespeople`
--

CREATE TABLE IF NOT EXISTS `salespeople` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `salesperson` varchar(100) DEFAULT NULL,
  `salespersoncode` varchar(10) DEFAULT NULL,
  `description` text,
  `status` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `salespeople`
--

INSERT INTO `salespeople` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesperson`, `salespersoncode`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:41:53', '2015-04-07 14:41:53', NULL, NULL, 0, 'nizar', '123123', 'rte', 1, 1),
(2, '2015-04-10 16:00:35', '2015-04-10 16:00:35', NULL, NULL, 0, 'MR BABU', 'BST-SEB', '', 1, 0),
(3, '2015-04-10 16:00:53', '2015-04-10 16:00:53', NULL, NULL, 0, 'MS NORA', 'BST-SMN', '', 1, 0),
(4, '2015-04-10 16:01:13', '2015-04-10 16:01:13', NULL, NULL, 0, 'MS DEVI', 'BST-SED', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sal_description`
--

CREATE TABLE IF NOT EXISTS `sal_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `quo_ins_id` int(11) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `del_id` varchar(200) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `device_id` int(10) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `sales_quantity` varchar(200) DEFAULT NULL,
  `instrument_id` int(11) DEFAULT NULL,
  `model_no` varchar(200) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `sales_range` varchar(200) DEFAULT NULL,
  `sales_calllocation` varchar(200) DEFAULT NULL,
  `sales_calltype` varchar(200) DEFAULT NULL,
  `sales_validity` int(11) DEFAULT NULL,
  `sales_unitprice` varchar(200) DEFAULT NULL,
  `sales_discount` varchar(200) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `sales_accountservice` varchar(100) DEFAULT NULL,
  `sales_titles` varchar(100) DEFAULT NULL,
  `sales_total` varchar(200) DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `title1_val` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `title2_val` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `title3_val` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `title4_val` varchar(200) DEFAULT NULL,
  `title5` varchar(200) DEFAULT NULL,
  `title5_val` varchar(200) DEFAULT NULL,
  `title6` varchar(200) DEFAULT NULL,
  `title6_val` varchar(200) DEFAULT NULL,
  `title7` varchar(200) DEFAULT NULL,
  `title7_val` varchar(200) DEFAULT NULL,
  `title8` varchar(200) DEFAULT NULL,
  `title8_val` varchar(200) DEFAULT NULL,
  `pending` int(11) DEFAULT '0',
  `processing` varchar(200) DEFAULT '0',
  `checking` int(200) DEFAULT '0',
  `shipping` int(11) DEFAULT '0',
  `is_deliveryorder_created` int(11) NOT NULL DEFAULT '0',
  `ready_deliver` varchar(200) DEFAULT '0',
  `is_delivered` int(11) DEFAULT '0',
  `assign_to` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_approved` varchar(10) DEFAULT NULL,
  `delay` varchar(250) DEFAULT NULL,
  `is_approved_lab` int(11) DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `sales_sub_con` int(11) NOT NULL DEFAULT '0',
  `sales_sub_con_id` int(11) DEFAULT NULL,
  `sales_sub_con_del` int(11) NOT NULL DEFAULT '0',
  `sales_po` int(11) NOT NULL DEFAULT '0',
  `sales_po_id` int(11) DEFAULT NULL,
  `sales_po_del` int(11) NOT NULL DEFAULT '0',
  `proforma` int(11) NOT NULL DEFAULT '0',
  `certificateno` varchar(255) DEFAULT NULL,
  `template_created` int(11) NOT NULL DEFAULT '0',
  `engineer` int(11) NOT NULL DEFAULT '0',
  `supervisor` int(11) NOT NULL DEFAULT '0',
  `manager` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sal_description`
--

INSERT INTO `sal_description` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quo_ins_id`, `salesorder_id`, `del_id`, `quotation_id`, `device_id`, `quotationno`, `customer_id`, `sales_quantity`, `instrument_id`, `model_no`, `brand_id`, `sales_range`, `sales_calllocation`, `sales_calltype`, `sales_validity`, `sales_unitprice`, `sales_discount`, `department_id`, `sales_accountservice`, `sales_titles`, `sales_total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `pending`, `processing`, `checking`, `shipping`, `is_deliveryorder_created`, `ready_deliver`, `is_delivered`, `assign_to`, `status`, `is_approved`, `delay`, `is_approved_lab`, `is_deleted`, `sales_sub_con`, `sales_sub_con_id`, `sales_sub_con_del`, `sales_po`, `sales_po_id`, `sales_po_del`, `proforma`, `certificateno`, `template_created`, `engineer`, `supervisor`, `manager`) VALUES
(1, 1, '2015-04-14 09:57:13', '2015-04-14 10:25:23', NULL, NULL, 0, NULL, 'BSO-15-004007', '1', 1, 1, 'BQS-15-004005', 'CUS-15-004002', '3', 2, 'MA12', 6, '3', 'subcontract', 'Singlas', 12, '0', '', 6, 'calibration service', NULL, '0', NULL, NULL, NULL, 'FAULTY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', 'FAULTY', 1, 0, 1, 1, 0, 1, 1, 0, 1, NULL, 0, 0, 0, 0),
(2, 2, '2015-04-14 09:57:13', '2015-04-14 14:15:27', NULL, NULL, 0, NULL, 'BSO-15-004007', NULL, 1, 2, 'BQS-15-004005', 'CUS-15-004002', '3', 2, 'MA12', 6, '3', 'subcontract', 'Singlas', 12, '100', '', 6, 'calibration service', NULL, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0, 1, 1, 0, 1, 1, 0, 1, NULL, 0, 0, 0, 0),
(3, 3, '2015-04-14 09:57:13', '2015-04-14 10:08:31', NULL, NULL, 0, NULL, 'BSO-15-004007', NULL, 1, 3, 'BQS-15-004005', 'CUS-15-004002', '3', 2, 'MA12', 6, '3', 'subcontract', 'Singlas', 12, '100', '', 6, 'calibration service', NULL, '100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0, 1, 1, 0, 1, 1, 0, 1, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sal_documents`
--

CREATE TABLE IF NOT EXISTS `sal_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(200) DEFAULT NULL,
  `salesorderno` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `upload_type` varchar(200) DEFAULT NULL,
  `document_name` varchar(200) DEFAULT NULL,
  `document_type` varchar(200) DEFAULT NULL,
  `document_size` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `servicetype` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `servicetype`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:33:04', '2015-04-10 15:53:07', NULL, NULL, 0, 'CALIBRATION SERVICE', '', 1, 0),
(2, '2015-04-10 15:53:17', '2015-04-10 15:53:17', NULL, NULL, 0, 'RENTAL SERVICE', '', 1, 0),
(3, '2015-04-10 15:53:27', '2015-04-10 15:53:27', NULL, NULL, 0, 'PURCHASE', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcontractdos`
--

CREATE TABLE IF NOT EXISTS `subcontractdos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `subcontract_dono` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `subcontract_cus_id` varchar(200) DEFAULT NULL,
  `subcontract_cus_name` varchar(255) DEFAULT NULL,
  `subcontract_name` varchar(200) DEFAULT NULL,
  `subcontract_address` varchar(200) DEFAULT NULL,
  `subcontract_date` varchar(200) DEFAULT NULL,
  `subcontract_duedate` varchar(200) DEFAULT NULL,
  `subcontract_salesperson` varchar(200) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `instrument_type_id` varchar(200) DEFAULT NULL,
  `subcontract_attn` varchar(200) DEFAULT NULL,
  `subcontract_phone` varchar(200) DEFAULT NULL,
  `subcontract_fax` varchar(200) DEFAULT NULL,
  `subcontract_email` varchar(200) DEFAULT NULL,
  `subcontract_ref_no` varchar(200) DEFAULT NULL,
  `subcontract_track_id` varchar(200) DEFAULT NULL,
  `subcontract_remarks` varchar(200) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subcontractdos`
--

INSERT INTO `subcontractdos` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `subcontract_dono`, `customer_id`, `salesorder_id`, `branch_id`, `subcontract_cus_id`, `subcontract_cus_name`, `subcontract_name`, `subcontract_address`, `subcontract_date`, `subcontract_duedate`, `subcontract_salesperson`, `service_id`, `instrument_type_id`, `subcontract_attn`, `subcontract_phone`, `subcontract_fax`, `subcontract_email`, `subcontract_ref_no`, `subcontract_track_id`, `subcontract_remarks`, `is_deleted`, `is_approved`) VALUES
(1, '2015-04-14 11:05:15', '2015-04-14 11:05:15', NULL, NULL, 0, 'BSD-01-10000003', 'CUS-15-004004', 'BSO-15-004007', 3, 'CUS-15-004002', 'AMS PTE LTD', 'CAL TECH PTE LTD', '23 WOODLAND DRIVESINGAPORE 123321', '14-Apr-2015', '18-Apr-2015', 'MS NORA', 1, 'guna traders  sub- contract delivery order', '5', '65478999', '6478999', 'tan@caltech.com', 'BQS-15-004005', 'BSTRA-15-004045', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcontract_descriptions`
--

CREATE TABLE IF NOT EXISTS `subcontract_descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `subcontractdo_id` varchar(200) DEFAULT NULL,
  `description_id` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tallyledgers`
--

CREATE TABLE IF NOT EXISTS `tallyledgers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `tallyledgeraccount` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tallyledgers`
--

INSERT INTO `tallyledgers` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `tallyledgeraccount`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 14:33:31', '2015-04-10 15:54:22', NULL, NULL, 0, 'CALIBRATION', 1, 0),
(2, '2015-04-10 15:54:30', '2015-04-10 15:54:30', NULL, NULL, 0, 'RENTAL', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_ambients`
--

CREATE TABLE IF NOT EXISTS `temp_ambients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `ambientname` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `default` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_certificate`
--

CREATE TABLE IF NOT EXISTS `temp_certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `certificate_no` varchar(255) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `description_id` int(11) DEFAULT NULL,
  `instrument_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `range_id` int(11) DEFAULT NULL,
  `is_template_created` int(11) NOT NULL DEFAULT '0',
  `is_template_match` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  `date_calibrated` varchar(255) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `temperature` int(11) DEFAULT NULL,
  `humidity` int(11) DEFAULT NULL,
  `formdata1` text,
  `formdata2` text,
  `instrument_cal_status` int(11) DEFAULT NULL,
  `instrument_cal_description` text,
  `calibrationtype` varchar(255) DEFAULT NULL,
  `cal_status` int(11) DEFAULT NULL,
  `cal_status_description` text,
  `approved_status` int(11) DEFAULT NULL,
  `methodofcal1` text,
  `methodofcal2` text,
  `resultofcal1` text,
  `resultofcal2` text,
  `remark1` text,
  `remark2` text,
  `remark3` text,
  `remark4` text,
  `remark5` text,
  `remark6` text,
  `remark7` text,
  `remark8` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_certificate_data`
--

CREATE TABLE IF NOT EXISTS `temp_certificate_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `certificate_no` varchar(200) DEFAULT NULL,
  `temp_channel_id` int(11) DEFAULT NULL,
  `temp_readingtype_id` int(11) DEFAULT NULL,
  `is_analog` int(11) DEFAULT NULL,
  `is_afteradjust` int(11) DEFAULT NULL,
  `no_runs` int(11) DEFAULT NULL,
  `uc_data_arr` varchar(255) DEFAULT NULL,
  `temp1` double DEFAULT NULL,
  `unit1` double DEFAULT NULL,
  `res1` double DEFAULT NULL,
  `acc1` double DEFAULT NULL,
  `count1` double DEFAULT NULL,
  `uncert1` double DEFAULT NULL,
  `m1_1` double DEFAULT NULL,
  `m1_2` double DEFAULT NULL,
  `m1_3` double DEFAULT NULL,
  `m1_4` double DEFAULT NULL,
  `m1_5` double DEFAULT NULL,
  `m1_6` double DEFAULT NULL,
  `m1_7` double DEFAULT NULL,
  `m1_8` double DEFAULT NULL,
  `m1_9` double DEFAULT NULL,
  `m1_10` double DEFAULT NULL,
  `m1_11` double DEFAULT NULL,
  `m1_12` double DEFAULT NULL,
  `m1_13` double DEFAULT NULL,
  `b1_1` double DEFAULT NULL,
  `b1_2` double DEFAULT NULL,
  `b1_3` double DEFAULT NULL,
  `b1_4` double DEFAULT NULL,
  `b1_5` double DEFAULT NULL,
  `b1_6` double DEFAULT NULL,
  `b1_7` double DEFAULT NULL,
  `b1_8` double DEFAULT NULL,
  `b1_9` double DEFAULT NULL,
  `b1_10` double DEFAULT NULL,
  `b1_11` double DEFAULT NULL,
  `b1_12` double DEFAULT NULL,
  `b1_13` double DEFAULT NULL,
  `a1_1` double DEFAULT NULL,
  `a1_2` double DEFAULT NULL,
  `a1_3` double DEFAULT NULL,
  `a1_4` double DEFAULT NULL,
  `a1_5` double DEFAULT NULL,
  `a1_6` double DEFAULT NULL,
  `a1_7` double DEFAULT NULL,
  `a1_8` double DEFAULT NULL,
  `a1_9` double DEFAULT NULL,
  `a1_10` double DEFAULT NULL,
  `a1_11` double DEFAULT NULL,
  `a1_12` double DEFAULT NULL,
  `a1_13` double DEFAULT NULL,
  `uc1` double DEFAULT NULL,
  `dof1` double DEFAULT NULL,
  `kfac1` double DEFAULT NULL,
  `uncertainty1_val` varchar(255) DEFAULT NULL,
  `temp2` double DEFAULT NULL,
  `unit2` double DEFAULT NULL,
  `res2` double DEFAULT NULL,
  `acc2` double DEFAULT NULL,
  `count2` double DEFAULT NULL,
  `uncert2` double DEFAULT NULL,
  `m2_1` double DEFAULT NULL,
  `m2_2` double DEFAULT NULL,
  `m2_3` double DEFAULT NULL,
  `m2_4` double DEFAULT NULL,
  `m2_5` double DEFAULT NULL,
  `m2_6` double DEFAULT NULL,
  `m2_7` double DEFAULT NULL,
  `m2_8` double DEFAULT NULL,
  `m2_9` double DEFAULT NULL,
  `m2_10` double DEFAULT NULL,
  `m2_11` double DEFAULT NULL,
  `m2_12` double DEFAULT NULL,
  `m2_13` double DEFAULT NULL,
  `b2_1` double DEFAULT NULL,
  `b2_2` double DEFAULT NULL,
  `b2_3` double DEFAULT NULL,
  `b2_4` double DEFAULT NULL,
  `b2_5` double DEFAULT NULL,
  `b2_6` double DEFAULT NULL,
  `b2_7` double DEFAULT NULL,
  `b2_8` double DEFAULT NULL,
  `b2_9` double DEFAULT NULL,
  `b2_10` double DEFAULT NULL,
  `b2_11` double DEFAULT NULL,
  `b2_12` double DEFAULT NULL,
  `b2_13` double DEFAULT NULL,
  `a2_1` double DEFAULT NULL,
  `a2_2` double DEFAULT NULL,
  `a2_3` double DEFAULT NULL,
  `a2_4` double DEFAULT NULL,
  `a2_5` double DEFAULT NULL,
  `a2_6` double DEFAULT NULL,
  `a2_7` double DEFAULT NULL,
  `a2_8` double DEFAULT NULL,
  `a2_9` double DEFAULT NULL,
  `a2_10` double DEFAULT NULL,
  `a2_11` double DEFAULT NULL,
  `a2_12` double DEFAULT NULL,
  `a2_13` double DEFAULT NULL,
  `uc2` double DEFAULT NULL,
  `dof2` double DEFAULT NULL,
  `kfac2` double DEFAULT NULL,
  `uncertainty2_val` varchar(255) DEFAULT NULL,
  `temp3` double DEFAULT NULL,
  `unit3` double DEFAULT NULL,
  `res3` double DEFAULT NULL,
  `acc3` double DEFAULT NULL,
  `count3` double DEFAULT NULL,
  `uncert3` double DEFAULT NULL,
  `m3_1` double DEFAULT NULL,
  `m3_2` double DEFAULT NULL,
  `m3_3` double DEFAULT NULL,
  `m3_4` double DEFAULT NULL,
  `m3_5` double DEFAULT NULL,
  `m3_6` double DEFAULT NULL,
  `m3_7` double DEFAULT NULL,
  `m3_8` double DEFAULT NULL,
  `m3_9` double DEFAULT NULL,
  `m3_10` double DEFAULT NULL,
  `m3_11` double DEFAULT NULL,
  `m3_12` double DEFAULT NULL,
  `m3_13` double DEFAULT NULL,
  `b3_1` double DEFAULT NULL,
  `b3_2` double DEFAULT NULL,
  `b3_3` double DEFAULT NULL,
  `b3_4` double DEFAULT NULL,
  `b3_5` double DEFAULT NULL,
  `b3_6` double DEFAULT NULL,
  `b3_7` double DEFAULT NULL,
  `b3_8` double DEFAULT NULL,
  `b3_9` double DEFAULT NULL,
  `b3_10` double DEFAULT NULL,
  `b3_11` double DEFAULT NULL,
  `b3_12` double DEFAULT NULL,
  `b3_13` double DEFAULT NULL,
  `a3_1` double DEFAULT NULL,
  `a3_2` double DEFAULT NULL,
  `a3_3` double DEFAULT NULL,
  `a3_4` double DEFAULT NULL,
  `a3_5` double DEFAULT NULL,
  `a3_6` double DEFAULT NULL,
  `a3_7` double DEFAULT NULL,
  `a3_8` double DEFAULT NULL,
  `a3_9` double DEFAULT NULL,
  `a3_10` double DEFAULT NULL,
  `a3_11` double DEFAULT NULL,
  `a3_12` double DEFAULT NULL,
  `a3_13` double DEFAULT NULL,
  `uc3` double DEFAULT NULL,
  `dof3` double DEFAULT NULL,
  `kfac3` double DEFAULT NULL,
  `uncertainty3_val` varchar(255) DEFAULT NULL,
  `temp4` double DEFAULT NULL,
  `unit4` double DEFAULT NULL,
  `res4` double DEFAULT NULL,
  `acc4` double DEFAULT NULL,
  `count4` double DEFAULT NULL,
  `uncert4` double DEFAULT NULL,
  `m4_1` double DEFAULT NULL,
  `m4_2` double DEFAULT NULL,
  `m4_3` double DEFAULT NULL,
  `m4_4` double DEFAULT NULL,
  `m4_5` double DEFAULT NULL,
  `m4_6` double DEFAULT NULL,
  `m4_7` double DEFAULT NULL,
  `m4_8` double DEFAULT NULL,
  `m4_9` double DEFAULT NULL,
  `m4_10` double DEFAULT NULL,
  `m4_11` double DEFAULT NULL,
  `m4_12` double DEFAULT NULL,
  `m4_13` double DEFAULT NULL,
  `b4_1` double DEFAULT NULL,
  `b4_2` double DEFAULT NULL,
  `b4_3` double DEFAULT NULL,
  `b4_4` double DEFAULT NULL,
  `b4_5` double DEFAULT NULL,
  `b4_6` double DEFAULT NULL,
  `b4_7` double DEFAULT NULL,
  `b4_8` double DEFAULT NULL,
  `b4_9` double DEFAULT NULL,
  `b4_10` double DEFAULT NULL,
  `b4_11` double DEFAULT NULL,
  `b4_12` double DEFAULT NULL,
  `b4_13` double DEFAULT NULL,
  `a4_1` double DEFAULT NULL,
  `a4_2` double DEFAULT NULL,
  `a4_3` double DEFAULT NULL,
  `a4_4` double DEFAULT NULL,
  `a4_5` double DEFAULT NULL,
  `a4_6` double DEFAULT NULL,
  `a4_7` double DEFAULT NULL,
  `a4_8` double DEFAULT NULL,
  `a4_9` double DEFAULT NULL,
  `a4_10` double DEFAULT NULL,
  `a4_11` double DEFAULT NULL,
  `a4_12` double DEFAULT NULL,
  `a4_13` double DEFAULT NULL,
  `uc4` double DEFAULT NULL,
  `dof4` double DEFAULT NULL,
  `kfac4` double DEFAULT NULL,
  `uncertainty4_val` varchar(255) DEFAULT NULL,
  `temp5` double DEFAULT NULL,
  `unit5` double DEFAULT NULL,
  `res5` double DEFAULT NULL,
  `acc5` double DEFAULT NULL,
  `count5` double DEFAULT NULL,
  `uncert5` double DEFAULT NULL,
  `m5_1` double DEFAULT NULL,
  `m5_2` double DEFAULT NULL,
  `m5_3` double DEFAULT NULL,
  `m5_4` double DEFAULT NULL,
  `m5_5` double DEFAULT NULL,
  `m5_6` double DEFAULT NULL,
  `m5_7` double DEFAULT NULL,
  `m5_8` double DEFAULT NULL,
  `m5_9` double DEFAULT NULL,
  `m5_10` double DEFAULT NULL,
  `m5_11` double DEFAULT NULL,
  `m5_12` double DEFAULT NULL,
  `m5_13` double DEFAULT NULL,
  `b5_1` double DEFAULT NULL,
  `b5_2` double DEFAULT NULL,
  `b5_3` double DEFAULT NULL,
  `b5_4` double DEFAULT NULL,
  `b5_5` double DEFAULT NULL,
  `b5_6` double DEFAULT NULL,
  `b5_7` double DEFAULT NULL,
  `b5_8` double DEFAULT NULL,
  `b5_9` double DEFAULT NULL,
  `b5_10` double DEFAULT NULL,
  `b5_11` double DEFAULT NULL,
  `b5_12` double DEFAULT NULL,
  `b5_13` double DEFAULT NULL,
  `a5_1` double DEFAULT NULL,
  `a5_2` double DEFAULT NULL,
  `a5_3` double DEFAULT NULL,
  `a5_4` double DEFAULT NULL,
  `a5_5` double DEFAULT NULL,
  `a5_6` double DEFAULT NULL,
  `a5_7` double DEFAULT NULL,
  `a5_8` double DEFAULT NULL,
  `a5_9` double DEFAULT NULL,
  `a5_10` double DEFAULT NULL,
  `a5_11` double DEFAULT NULL,
  `a5_12` double DEFAULT NULL,
  `a5_13` double DEFAULT NULL,
  `uc5` double DEFAULT NULL,
  `dof5` double DEFAULT NULL,
  `kfac5` double DEFAULT NULL,
  `uncertainty5_val` varchar(255) DEFAULT NULL,
  `temp6` double DEFAULT NULL,
  `unit6` double DEFAULT NULL,
  `res6` double DEFAULT NULL,
  `acc6` double DEFAULT NULL,
  `count6` double DEFAULT NULL,
  `uncert6` double DEFAULT NULL,
  `m6_1` double DEFAULT NULL,
  `m6_2` double DEFAULT NULL,
  `m6_3` double DEFAULT NULL,
  `m6_4` double DEFAULT NULL,
  `m6_5` double DEFAULT NULL,
  `m6_6` double DEFAULT NULL,
  `m6_7` double DEFAULT NULL,
  `m6_8` double DEFAULT NULL,
  `m6_9` double DEFAULT NULL,
  `m6_10` double DEFAULT NULL,
  `m6_11` double DEFAULT NULL,
  `m6_12` double DEFAULT NULL,
  `m6_13` double DEFAULT NULL,
  `b6_1` double DEFAULT NULL,
  `b6_2` double DEFAULT NULL,
  `b6_3` double DEFAULT NULL,
  `b6_4` double DEFAULT NULL,
  `b6_5` double DEFAULT NULL,
  `b6_6` double DEFAULT NULL,
  `b6_7` double DEFAULT NULL,
  `b6_8` double DEFAULT NULL,
  `b6_9` double DEFAULT NULL,
  `b6_10` double DEFAULT NULL,
  `b6_11` double DEFAULT NULL,
  `b6_12` double DEFAULT NULL,
  `b6_13` double DEFAULT NULL,
  `a6_1` double DEFAULT NULL,
  `a6_2` double DEFAULT NULL,
  `a6_3` double DEFAULT NULL,
  `a6_4` double DEFAULT NULL,
  `a6_5` double DEFAULT NULL,
  `a6_6` double DEFAULT NULL,
  `a6_7` double DEFAULT NULL,
  `a6_8` double DEFAULT NULL,
  `a6_9` double DEFAULT NULL,
  `a6_10` double DEFAULT NULL,
  `a6_11` double DEFAULT NULL,
  `a6_12` double DEFAULT NULL,
  `a6_13` double DEFAULT NULL,
  `uc6` double DEFAULT NULL,
  `dof6` double DEFAULT NULL,
  `kfac6` double DEFAULT NULL,
  `uncertainty6_val` varchar(255) DEFAULT NULL,
  `temp7` double DEFAULT NULL,
  `unit7` double DEFAULT NULL,
  `res7` double DEFAULT NULL,
  `acc7` double DEFAULT NULL,
  `count7` double DEFAULT NULL,
  `uncert7` double DEFAULT NULL,
  `m7_1` double DEFAULT NULL,
  `m7_2` double DEFAULT NULL,
  `m7_3` double DEFAULT NULL,
  `m7_4` double DEFAULT NULL,
  `m7_5` double DEFAULT NULL,
  `m7_6` double DEFAULT NULL,
  `m7_7` double DEFAULT NULL,
  `m7_8` double DEFAULT NULL,
  `m7_9` double DEFAULT NULL,
  `m7_10` double DEFAULT NULL,
  `m7_11` double DEFAULT NULL,
  `m7_12` double DEFAULT NULL,
  `m7_13` double DEFAULT NULL,
  `b7_1` double DEFAULT NULL,
  `b7_2` double DEFAULT NULL,
  `b7_3` double DEFAULT NULL,
  `b7_4` double DEFAULT NULL,
  `b7_5` double DEFAULT NULL,
  `b7_6` double DEFAULT NULL,
  `b7_7` double DEFAULT NULL,
  `b7_8` double DEFAULT NULL,
  `b7_9` double DEFAULT NULL,
  `b7_10` double DEFAULT NULL,
  `b7_11` double DEFAULT NULL,
  `b7_12` double DEFAULT NULL,
  `b7_13` double DEFAULT NULL,
  `a7_1` double DEFAULT NULL,
  `a7_2` double DEFAULT NULL,
  `a7_3` double DEFAULT NULL,
  `a7_4` double DEFAULT NULL,
  `a7_5` double DEFAULT NULL,
  `a7_6` double DEFAULT NULL,
  `a7_7` double DEFAULT NULL,
  `a7_8` double DEFAULT NULL,
  `a7_9` double DEFAULT NULL,
  `a7_10` double DEFAULT NULL,
  `a7_11` double DEFAULT NULL,
  `a7_12` double DEFAULT NULL,
  `a7_13` double DEFAULT NULL,
  `uc7` double DEFAULT NULL,
  `dof7` double DEFAULT NULL,
  `kfac7` double DEFAULT NULL,
  `uncertainty7_val` varchar(255) DEFAULT NULL,
  `temp8` double DEFAULT NULL,
  `unit8` double DEFAULT NULL,
  `res8` double DEFAULT NULL,
  `acc8` double DEFAULT NULL,
  `count8` double DEFAULT NULL,
  `uncert8` double DEFAULT NULL,
  `m8_1` double DEFAULT NULL,
  `m8_2` double DEFAULT NULL,
  `m8_3` double DEFAULT NULL,
  `m8_4` double DEFAULT NULL,
  `m8_5` double DEFAULT NULL,
  `m8_6` double DEFAULT NULL,
  `m8_7` double DEFAULT NULL,
  `m8_8` double DEFAULT NULL,
  `m8_9` double DEFAULT NULL,
  `m8_10` double DEFAULT NULL,
  `m8_11` double DEFAULT NULL,
  `m8_12` double DEFAULT NULL,
  `m8_13` double DEFAULT NULL,
  `b8_1` double DEFAULT NULL,
  `b8_2` double DEFAULT NULL,
  `b8_3` double DEFAULT NULL,
  `b8_4` double DEFAULT NULL,
  `b8_5` double DEFAULT NULL,
  `b8_6` double DEFAULT NULL,
  `b8_7` double DEFAULT NULL,
  `b8_8` double DEFAULT NULL,
  `b8_9` double DEFAULT NULL,
  `b8_10` double DEFAULT NULL,
  `b8_11` double DEFAULT NULL,
  `b8_12` double DEFAULT NULL,
  `b8_13` double DEFAULT NULL,
  `a8_1` double DEFAULT NULL,
  `a8_2` double DEFAULT NULL,
  `a8_3` double DEFAULT NULL,
  `a8_4` double DEFAULT NULL,
  `a8_5` double DEFAULT NULL,
  `a8_6` double DEFAULT NULL,
  `a8_7` double DEFAULT NULL,
  `a8_8` double DEFAULT NULL,
  `a8_9` double DEFAULT NULL,
  `a8_10` double DEFAULT NULL,
  `a8_11` double DEFAULT NULL,
  `a8_12` double DEFAULT NULL,
  `a8_13` double DEFAULT NULL,
  `uc8` double DEFAULT NULL,
  `dof8` double DEFAULT NULL,
  `kfac8` double DEFAULT NULL,
  `uncertainty8_val` varchar(255) DEFAULT NULL,
  `temp9` double DEFAULT NULL,
  `unit9` double DEFAULT NULL,
  `res9` double DEFAULT NULL,
  `acc9` double DEFAULT NULL,
  `count9` double DEFAULT NULL,
  `uncert9` double DEFAULT NULL,
  `m9_1` double DEFAULT NULL,
  `m9_2` double DEFAULT NULL,
  `m9_3` double DEFAULT NULL,
  `m9_4` double DEFAULT NULL,
  `m9_5` double DEFAULT NULL,
  `m9_6` double DEFAULT NULL,
  `m9_7` double DEFAULT NULL,
  `m9_8` double DEFAULT NULL,
  `m9_9` double DEFAULT NULL,
  `m9_10` double DEFAULT NULL,
  `m9_11` double DEFAULT NULL,
  `m9_12` double DEFAULT NULL,
  `m9_13` double DEFAULT NULL,
  `b9_1` double DEFAULT NULL,
  `b9_2` double DEFAULT NULL,
  `b9_3` double DEFAULT NULL,
  `b9_4` double DEFAULT NULL,
  `b9_5` double DEFAULT NULL,
  `b9_6` double DEFAULT NULL,
  `b9_7` double DEFAULT NULL,
  `b9_8` double DEFAULT NULL,
  `b9_9` double DEFAULT NULL,
  `b9_10` double DEFAULT NULL,
  `b9_11` double DEFAULT NULL,
  `b9_12` double DEFAULT NULL,
  `b9_13` double DEFAULT NULL,
  `a9_1` double DEFAULT NULL,
  `a9_2` double DEFAULT NULL,
  `a9_3` double DEFAULT NULL,
  `a9_4` double DEFAULT NULL,
  `a9_5` double DEFAULT NULL,
  `a9_6` double DEFAULT NULL,
  `a9_7` double DEFAULT NULL,
  `a9_8` double DEFAULT NULL,
  `a9_9` double DEFAULT NULL,
  `a9_10` double DEFAULT NULL,
  `a9_11` double DEFAULT NULL,
  `a9_12` double DEFAULT NULL,
  `a9_13` double DEFAULT NULL,
  `uc9` double DEFAULT NULL,
  `dof9` double DEFAULT NULL,
  `kfac9` double DEFAULT NULL,
  `uncertainty9_val` varchar(255) DEFAULT NULL,
  `temp10` double DEFAULT NULL,
  `unit10` double DEFAULT NULL,
  `res10` double DEFAULT NULL,
  `acc10` double DEFAULT NULL,
  `count10` double DEFAULT NULL,
  `uncert10` double DEFAULT NULL,
  `m10_1` double DEFAULT NULL,
  `m10_2` double DEFAULT NULL,
  `m10_3` double DEFAULT NULL,
  `m10_4` double DEFAULT NULL,
  `m10_5` double DEFAULT NULL,
  `m10_6` double DEFAULT NULL,
  `m10_7` double DEFAULT NULL,
  `m10_8` double DEFAULT NULL,
  `m10_9` double DEFAULT NULL,
  `m10_10` double DEFAULT NULL,
  `m10_11` double DEFAULT NULL,
  `m10_12` double DEFAULT NULL,
  `m10_13` double DEFAULT NULL,
  `b10_1` double DEFAULT NULL,
  `b10_2` double DEFAULT NULL,
  `b10_3` double DEFAULT NULL,
  `b10_4` double DEFAULT NULL,
  `b10_5` double DEFAULT NULL,
  `b10_6` double DEFAULT NULL,
  `b10_7` double DEFAULT NULL,
  `b10_8` double DEFAULT NULL,
  `b10_9` double DEFAULT NULL,
  `b10_10` double DEFAULT NULL,
  `b10_11` double DEFAULT NULL,
  `b10_12` double DEFAULT NULL,
  `b10_13` double DEFAULT NULL,
  `a10_1` double DEFAULT NULL,
  `a10_2` double DEFAULT NULL,
  `a10_3` double DEFAULT NULL,
  `a10_4` double DEFAULT NULL,
  `a10_5` double DEFAULT NULL,
  `a10_6` double DEFAULT NULL,
  `a10_7` double DEFAULT NULL,
  `a10_8` double DEFAULT NULL,
  `a10_9` double DEFAULT NULL,
  `a10_10` double DEFAULT NULL,
  `a10_11` double DEFAULT NULL,
  `a10_12` double DEFAULT NULL,
  `a10_13` double DEFAULT NULL,
  `uc10` double DEFAULT NULL,
  `dof10` double DEFAULT NULL,
  `kfac10` double DEFAULT NULL,
  `uncertainty10_val` varchar(255) DEFAULT NULL,
  `temp11` double DEFAULT NULL,
  `unit11` double DEFAULT NULL,
  `res11` double DEFAULT NULL,
  `acc11` double DEFAULT NULL,
  `count11` double DEFAULT NULL,
  `uncert11` double DEFAULT NULL,
  `m11_1` double DEFAULT NULL,
  `m11_2` double DEFAULT NULL,
  `m11_3` double DEFAULT NULL,
  `m11_4` double DEFAULT NULL,
  `m11_5` double DEFAULT NULL,
  `m11_6` double DEFAULT NULL,
  `m11_7` double DEFAULT NULL,
  `m11_8` double DEFAULT NULL,
  `m11_9` double DEFAULT NULL,
  `m11_10` double DEFAULT NULL,
  `m11_11` double DEFAULT NULL,
  `m11_12` double DEFAULT NULL,
  `m11_13` double DEFAULT NULL,
  `b11_1` double DEFAULT NULL,
  `b11_2` double DEFAULT NULL,
  `b11_3` double DEFAULT NULL,
  `b11_4` double DEFAULT NULL,
  `b11_5` double DEFAULT NULL,
  `b11_6` double DEFAULT NULL,
  `b11_7` double DEFAULT NULL,
  `b11_8` double DEFAULT NULL,
  `b11_9` double DEFAULT NULL,
  `b11_10` double DEFAULT NULL,
  `b11_11` double DEFAULT NULL,
  `b11_12` double DEFAULT NULL,
  `b11_13` double DEFAULT NULL,
  `a11_1` double DEFAULT NULL,
  `a11_2` double DEFAULT NULL,
  `a11_3` double DEFAULT NULL,
  `a11_4` double DEFAULT NULL,
  `a11_5` double DEFAULT NULL,
  `a11_6` double DEFAULT NULL,
  `a11_7` double DEFAULT NULL,
  `a11_8` double DEFAULT NULL,
  `a11_9` double DEFAULT NULL,
  `a11_10` double DEFAULT NULL,
  `a11_11` double DEFAULT NULL,
  `a11_12` double DEFAULT NULL,
  `a11_13` double DEFAULT NULL,
  `uc11` double DEFAULT NULL,
  `dof11` double DEFAULT NULL,
  `kfac11` double DEFAULT NULL,
  `uncertainty11_val` varchar(255) DEFAULT NULL,
  `temp12` double DEFAULT NULL,
  `unit12` double DEFAULT NULL,
  `res12` double DEFAULT NULL,
  `acc12` double DEFAULT NULL,
  `count12` double DEFAULT NULL,
  `uncert12` double DEFAULT NULL,
  `m12_1` double DEFAULT NULL,
  `m12_2` double DEFAULT NULL,
  `m12_3` double DEFAULT NULL,
  `m12_4` double DEFAULT NULL,
  `m12_5` double DEFAULT NULL,
  `m12_6` double DEFAULT NULL,
  `m12_7` double DEFAULT NULL,
  `m12_8` double DEFAULT NULL,
  `m12_9` double DEFAULT NULL,
  `m12_10` double DEFAULT NULL,
  `m12_11` double DEFAULT NULL,
  `m12_12` double DEFAULT NULL,
  `m12_13` double DEFAULT NULL,
  `b12_1` double DEFAULT NULL,
  `b12_2` double DEFAULT NULL,
  `b12_3` double DEFAULT NULL,
  `b12_4` double DEFAULT NULL,
  `b12_5` double DEFAULT NULL,
  `b12_6` double DEFAULT NULL,
  `b12_7` double DEFAULT NULL,
  `b12_8` double DEFAULT NULL,
  `b12_9` double DEFAULT NULL,
  `b12_10` double DEFAULT NULL,
  `b12_11` double DEFAULT NULL,
  `b12_12` double DEFAULT NULL,
  `b12_13` double DEFAULT NULL,
  `a12_1` double DEFAULT NULL,
  `a12_2` double DEFAULT NULL,
  `a12_3` double DEFAULT NULL,
  `a12_4` double DEFAULT NULL,
  `a12_5` double DEFAULT NULL,
  `a12_6` double DEFAULT NULL,
  `a12_7` double DEFAULT NULL,
  `a12_8` double DEFAULT NULL,
  `a12_9` double DEFAULT NULL,
  `a12_10` double DEFAULT NULL,
  `a12_11` double DEFAULT NULL,
  `a12_12` double DEFAULT NULL,
  `a12_13` double DEFAULT NULL,
  `uc12` double DEFAULT NULL,
  `dof12` double DEFAULT NULL,
  `kfac12` double DEFAULT NULL,
  `uncertainty12_val` varchar(255) DEFAULT NULL,
  `temp13` double DEFAULT NULL,
  `unit13` double DEFAULT NULL,
  `res13` double DEFAULT NULL,
  `acc13` double DEFAULT NULL,
  `count13` double DEFAULT NULL,
  `uncert13` double DEFAULT NULL,
  `m13_1` double DEFAULT NULL,
  `m13_2` double DEFAULT NULL,
  `m13_3` double DEFAULT NULL,
  `m13_4` double DEFAULT NULL,
  `m13_5` double DEFAULT NULL,
  `m13_6` double DEFAULT NULL,
  `m13_7` double DEFAULT NULL,
  `m13_8` double DEFAULT NULL,
  `m13_9` double DEFAULT NULL,
  `m13_10` double DEFAULT NULL,
  `m13_11` double DEFAULT NULL,
  `m13_12` double DEFAULT NULL,
  `m13_13` double DEFAULT NULL,
  `b13_1` double DEFAULT NULL,
  `b13_2` double DEFAULT NULL,
  `b13_3` double DEFAULT NULL,
  `b13_4` double DEFAULT NULL,
  `b13_5` double DEFAULT NULL,
  `b13_6` double DEFAULT NULL,
  `b13_7` double DEFAULT NULL,
  `b13_8` double DEFAULT NULL,
  `b13_9` double DEFAULT NULL,
  `b13_10` double DEFAULT NULL,
  `b13_11` double DEFAULT NULL,
  `b13_12` double DEFAULT NULL,
  `b13_13` double DEFAULT NULL,
  `a13_1` double DEFAULT NULL,
  `a13_2` double DEFAULT NULL,
  `a13_3` double DEFAULT NULL,
  `a13_4` double DEFAULT NULL,
  `a13_5` double DEFAULT NULL,
  `a13_6` double DEFAULT NULL,
  `a13_7` double DEFAULT NULL,
  `a13_8` double DEFAULT NULL,
  `a13_9` double DEFAULT NULL,
  `a13_10` double DEFAULT NULL,
  `a13_11` double DEFAULT NULL,
  `a13_12` double DEFAULT NULL,
  `a13_13` double DEFAULT NULL,
  `uc13` double DEFAULT NULL,
  `dof13` double DEFAULT NULL,
  `kfac13` double DEFAULT NULL,
  `uncertainty13_val` varchar(255) DEFAULT NULL,
  `temp14` double DEFAULT NULL,
  `unit14` double DEFAULT NULL,
  `res14` double DEFAULT NULL,
  `acc14` double DEFAULT NULL,
  `count14` double DEFAULT NULL,
  `uncert14` double DEFAULT NULL,
  `m14_1` double DEFAULT NULL,
  `m14_2` double DEFAULT NULL,
  `m14_3` double DEFAULT NULL,
  `m14_4` double DEFAULT NULL,
  `m14_5` double DEFAULT NULL,
  `m14_6` double DEFAULT NULL,
  `m14_7` double DEFAULT NULL,
  `m14_8` double DEFAULT NULL,
  `m14_9` double DEFAULT NULL,
  `m14_10` double DEFAULT NULL,
  `m14_11` double DEFAULT NULL,
  `m14_12` double DEFAULT NULL,
  `m14_13` double DEFAULT NULL,
  `b14_1` double DEFAULT NULL,
  `b14_2` double DEFAULT NULL,
  `b14_3` double DEFAULT NULL,
  `b14_4` double DEFAULT NULL,
  `b14_5` double DEFAULT NULL,
  `b14_6` double DEFAULT NULL,
  `b14_7` double DEFAULT NULL,
  `b14_8` double DEFAULT NULL,
  `b14_9` double DEFAULT NULL,
  `b14_10` double DEFAULT NULL,
  `b14_11` double DEFAULT NULL,
  `b14_12` double DEFAULT NULL,
  `b14_13` double DEFAULT NULL,
  `a14_1` double DEFAULT NULL,
  `a14_2` double DEFAULT NULL,
  `a14_3` double DEFAULT NULL,
  `a14_4` double DEFAULT NULL,
  `a14_5` double DEFAULT NULL,
  `a14_6` double DEFAULT NULL,
  `a14_7` double DEFAULT NULL,
  `a14_8` double DEFAULT NULL,
  `a14_9` double DEFAULT NULL,
  `a14_10` double DEFAULT NULL,
  `a14_11` double DEFAULT NULL,
  `a14_12` double DEFAULT NULL,
  `a14_13` double DEFAULT NULL,
  `uc14` double DEFAULT NULL,
  `dof14` double DEFAULT NULL,
  `kfac14` double DEFAULT NULL,
  `uncertainty14_val` varchar(255) DEFAULT NULL,
  `temp15` double DEFAULT NULL,
  `unit15` double DEFAULT NULL,
  `res15` double DEFAULT NULL,
  `acc15` double DEFAULT NULL,
  `count15` double DEFAULT NULL,
  `uncert15` double DEFAULT NULL,
  `m15_1` double DEFAULT NULL,
  `m15_2` double DEFAULT NULL,
  `m15_3` double DEFAULT NULL,
  `m15_4` double DEFAULT NULL,
  `m15_5` double DEFAULT NULL,
  `m15_6` double DEFAULT NULL,
  `m15_7` double DEFAULT NULL,
  `m15_8` double DEFAULT NULL,
  `m15_9` double DEFAULT NULL,
  `m15_10` double DEFAULT NULL,
  `m15_11` double DEFAULT NULL,
  `m15_12` double DEFAULT NULL,
  `m15_13` double DEFAULT NULL,
  `b15_1` double DEFAULT NULL,
  `b15_2` double DEFAULT NULL,
  `b15_3` double DEFAULT NULL,
  `b15_4` double DEFAULT NULL,
  `b15_5` double DEFAULT NULL,
  `b15_6` double DEFAULT NULL,
  `b15_7` double DEFAULT NULL,
  `b15_8` double DEFAULT NULL,
  `b15_9` double DEFAULT NULL,
  `b15_10` double DEFAULT NULL,
  `b15_11` double DEFAULT NULL,
  `b15_12` double DEFAULT NULL,
  `b15_13` double DEFAULT NULL,
  `a15_1` double DEFAULT NULL,
  `a15_2` double DEFAULT NULL,
  `a15_3` double DEFAULT NULL,
  `a15_4` double DEFAULT NULL,
  `a15_5` double DEFAULT NULL,
  `a15_6` double DEFAULT NULL,
  `a15_7` double DEFAULT NULL,
  `a15_8` double DEFAULT NULL,
  `a15_9` double DEFAULT NULL,
  `a15_10` double DEFAULT NULL,
  `a15_11` double DEFAULT NULL,
  `a15_12` double DEFAULT NULL,
  `a15_13` double DEFAULT NULL,
  `uc15` double DEFAULT NULL,
  `dof15` double DEFAULT NULL,
  `kfac15` double DEFAULT NULL,
  `uncertainty15_val` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_channel`
--

CREATE TABLE IF NOT EXISTS `temp_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `channelname` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_formdata`
--

CREATE TABLE IF NOT EXISTS `temp_formdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `formdata1` text,
  `formdata2` text,
  `methodofcal1` text,
  `methodofcal2` text,
  `resultofcal1` text,
  `resultofcal2` text,
  `remark1` text,
  `remark2` text,
  `remark3` text,
  `remark4` text,
  `remark5` text,
  `remark6` text,
  `remark7` text,
  `remark8` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_instruments`
--

CREATE TABLE IF NOT EXISTS `temp_instruments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `instrumentname` varchar(255) NOT NULL,
  `tagno` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_instrumentvalid`
--

CREATE TABLE IF NOT EXISTS `temp_instrumentvalid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `temp_instruments_id` int(11) NOT NULL,
  `duedate` varchar(200) NOT NULL,
  `validdays` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_other`
--

CREATE TABLE IF NOT EXISTS `temp_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `othername` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_range`
--

CREATE TABLE IF NOT EXISTS `temp_range` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `fromrange` float NOT NULL,
  `torange` float NOT NULL,
  `rangename` varchar(200) DEFAULT NULL,
  `temp_unit_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_readingtype`
--

CREATE TABLE IF NOT EXISTS `temp_readingtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `readingtypename` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_relativehumidity`
--

CREATE TABLE IF NOT EXISTS `temp_relativehumidity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `relativehumidity` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `default` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_templates`
--

CREATE TABLE IF NOT EXISTS `temp_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `temp_instruments_id` int(11) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `range_id` int(11) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_templates_data`
--

CREATE TABLE IF NOT EXISTS `temp_templates_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `temp_templates_id` int(11) NOT NULL,
  `instrument_id` int(11) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `range_id` int(11) NOT NULL,
  `setpoint` float NOT NULL,
  `temp_readingtype_id` int(11) DEFAULT NULL,
  `readingtypename` varchar(200) DEFAULT NULL,
  `temp_unit_id` int(11) DEFAULT NULL,
  `unitname` varchar(200) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `resolution` float NOT NULL,
  `accuracy` int(11) DEFAULT NULL,
  `temp_uncertainty_id` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_uncertainty`
--

CREATE TABLE IF NOT EXISTS `temp_uncertainty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `instrumentname` varchar(200) DEFAULT NULL,
  `temp_instruments_id` int(11) DEFAULT NULL,
  `duedate` varchar(200) DEFAULT NULL,
  `tagno` varchar(200) DEFAULT NULL,
  `totalname` varchar(255) DEFAULT NULL,
  `procedureno` varchar(200) DEFAULT NULL,
  `serialno` varchar(200) DEFAULT NULL,
  `caldate` varchar(200) DEFAULT NULL,
  `remarks` text,
  `is_visible` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_uncertainty_data`
--

CREATE TABLE IF NOT EXISTS `temp_uncertainty_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `temp_uncertainty_id` int(11) DEFAULT NULL,
  `range_id` int(11) DEFAULT NULL,
  `rangename` varchar(200) DEFAULT NULL,
  `uref1_data1` varchar(200) DEFAULT NULL,
  `uref1_data2` varchar(200) DEFAULT NULL,
  `uref1_data3` varchar(200) DEFAULT NULL,
  `uref2_data1` varchar(200) DEFAULT NULL,
  `uref2_data2` varchar(200) DEFAULT NULL,
  `uref2_data3` varchar(200) DEFAULT NULL,
  `uref3_data1` varchar(200) DEFAULT NULL,
  `uref3_data2` varchar(200) DEFAULT NULL,
  `uref3_data3` varchar(200) DEFAULT NULL,
  `uacc1_data1` varchar(200) DEFAULT NULL,
  `uacc1_data2` varchar(200) DEFAULT NULL,
  `uacc1_data3` varchar(200) DEFAULT NULL,
  `uacc2_data1` varchar(200) DEFAULT NULL,
  `uacc2_data2` varchar(200) DEFAULT NULL,
  `uacc2_data3` varchar(200) DEFAULT NULL,
  `uacc3_data1` varchar(200) DEFAULT NULL,
  `uacc3_data2` varchar(200) DEFAULT NULL,
  `uacc3_data3` varchar(200) DEFAULT NULL,
  `urefdivisor` varchar(200) DEFAULT NULL,
  `uresdivisoranalog` varchar(200) DEFAULT NULL,
  `uresdivisordigital` varchar(200) DEFAULT NULL,
  `urepdivisor` varchar(200) DEFAULT NULL,
  `divisor` varchar(200) DEFAULT NULL,
  `u1_data1` varchar(200) DEFAULT NULL,
  `u1_data2` varchar(200) DEFAULT NULL,
  `u1_data3` varchar(200) DEFAULT NULL,
  `u1_data4` varchar(200) DEFAULT NULL,
  `u2_data1` varchar(200) DEFAULT NULL,
  `u2_data2` varchar(200) DEFAULT NULL,
  `u2_data3` varchar(200) DEFAULT NULL,
  `u2_data4` varchar(200) DEFAULT NULL,
  `u3_data1` varchar(200) DEFAULT NULL,
  `u3_data2` varchar(200) DEFAULT NULL,
  `u3_data3` varchar(200) DEFAULT NULL,
  `u3_data4` varchar(200) DEFAULT NULL,
  `u4_data1` varchar(200) DEFAULT NULL,
  `u4_data2` varchar(200) DEFAULT NULL,
  `u4_data3` varchar(200) DEFAULT NULL,
  `u4_data4` varchar(200) DEFAULT NULL,
  `u5_data1` varchar(200) DEFAULT NULL,
  `u5_data2` varchar(200) DEFAULT NULL,
  `u5_data3` varchar(200) DEFAULT NULL,
  `u5_data4` varchar(200) DEFAULT NULL,
  `u6_data1` varchar(200) DEFAULT NULL,
  `u6_data2` varchar(200) DEFAULT NULL,
  `u6_data3` varchar(200) DEFAULT NULL,
  `u6_data4` varchar(200) DEFAULT NULL,
  `u7_data1` varchar(200) DEFAULT NULL,
  `u7_data2` varchar(200) DEFAULT NULL,
  `u7_data3` varchar(200) DEFAULT NULL,
  `u7_data4` varchar(200) DEFAULT NULL,
  `u8_data1` varchar(200) DEFAULT NULL,
  `u8_data2` varchar(200) DEFAULT NULL,
  `u8_data3` varchar(200) DEFAULT NULL,
  `u8_data4` varchar(200) DEFAULT NULL,
  `u9_data1` varchar(200) DEFAULT NULL,
  `u9_data2` varchar(200) DEFAULT NULL,
  `u9_data3` varchar(200) DEFAULT NULL,
  `u9_data4` varchar(200) DEFAULT NULL,
  `u10_data1` varchar(200) DEFAULT NULL,
  `u10_data2` varchar(200) DEFAULT NULL,
  `u10_data3` varchar(200) DEFAULT NULL,
  `u10_data4` varchar(200) DEFAULT NULL,
  `u11_data1` varchar(200) DEFAULT NULL,
  `u11_data2` varchar(200) DEFAULT NULL,
  `u11_data3` varchar(200) DEFAULT NULL,
  `u11_data4` varchar(200) DEFAULT NULL,
  `u12_data1` varchar(200) DEFAULT NULL,
  `u12_data2` varchar(200) DEFAULT NULL,
  `u12_data3` varchar(200) DEFAULT NULL,
  `u12_data4` varchar(200) DEFAULT NULL,
  `u13_data1` varchar(200) DEFAULT NULL,
  `u13_data2` varchar(200) DEFAULT NULL,
  `u13_data3` varchar(200) DEFAULT NULL,
  `u13_data4` varchar(200) DEFAULT NULL,
  `u14_data1` varchar(200) DEFAULT NULL,
  `u14_data2` varchar(200) DEFAULT NULL,
  `u14_data3` varchar(200) DEFAULT NULL,
  `u14_data4` varchar(200) DEFAULT NULL,
  `u15_data1` varchar(200) DEFAULT NULL,
  `u15_data2` varchar(200) DEFAULT NULL,
  `u15_data3` varchar(200) DEFAULT NULL,
  `u15_data4` varchar(200) DEFAULT NULL,
  `u16_data1` varchar(200) DEFAULT NULL,
  `u16_data2` varchar(200) DEFAULT NULL,
  `u16_data3` varchar(200) DEFAULT NULL,
  `u16_data4` varchar(200) DEFAULT NULL,
  `u17_data1` varchar(200) DEFAULT NULL,
  `u17_data2` varchar(200) DEFAULT NULL,
  `u17_data3` varchar(200) DEFAULT NULL,
  `u17_data4` varchar(200) DEFAULT NULL,
  `u18_data1` varchar(200) DEFAULT NULL,
  `u18_data2` varchar(200) DEFAULT NULL,
  `u18_data3` varchar(200) DEFAULT NULL,
  `u18_data4` varchar(200) DEFAULT NULL,
  `u19_data1` varchar(200) DEFAULT NULL,
  `u19_data2` varchar(200) DEFAULT NULL,
  `u19_data3` varchar(200) DEFAULT NULL,
  `u19_data4` varchar(200) DEFAULT NULL,
  `u20_data1` varchar(200) DEFAULT NULL,
  `u20_data2` varchar(200) DEFAULT NULL,
  `u20_data3` varchar(200) DEFAULT NULL,
  `u20_data4` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_unit`
--

CREATE TABLE IF NOT EXISTS `temp_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `unitname` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_unitconvert`
--

CREATE TABLE IF NOT EXISTS `temp_unitconvert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `fromunit` int(11) NOT NULL,
  `tounit` int(11) NOT NULL,
  `factor` float NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` varchar(200) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `title_name` varchar(200) DEFAULT NULL,
  `title_description` text,
  `status` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `title_name`, `title_description`, `status`, `is_deleted`) VALUES
(1, '2015-04-07 15:17:32', '2015-04-16 13:53:00', NULL, NULL, NULL, 'SERIAL NO', '', 1, 0),
(2, '2015-04-08 17:44:39', '2015-04-10 16:08:08', NULL, NULL, NULL, 'REMARKS', '', 1, 0),
(3, '2015-04-10 16:08:27', '2015-04-10 16:08:27', NULL, NULL, NULL, 'TAG NO.', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` varchar(200) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `unit_name` varchar(20) NOT NULL,
  `unit_description` text NOT NULL,
  `status` int(10) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `unit_name`, `unit_description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2015-04-07 15:14:26', '2015-04-07 15:14:26', NULL, NULL, 0, 'aa', '', 0, 1, 1),
(2, '2015-04-07 15:19:00', '2015-04-07 15:19:00', NULL, NULL, 0, 'bb', '', 0, 1, 1),
(3, '2015-04-10 16:06:52', '2015-04-10 16:06:52', NULL, NULL, 0, 'ËšC', '', 1, 1, 0),
(4, '2015-04-10 16:07:04', '2015-04-10 16:07:04', NULL, NULL, 0, 'ËšF', '', 1, 1, 0),
(5, '2015-04-10 16:07:22', '2015-04-10 16:07:22', NULL, NULL, 0, 'PSI', '', 1, 1, 0),
(6, '2015-04-10 16:07:31', '2015-04-10 16:07:31', NULL, NULL, 0, 'BAR', '', 1, 1, 0),
(7, '2015-04-10 16:07:40', '2015-04-10 16:07:40', NULL, NULL, 0, 'HZ', '', 1, 1, 0),
(8, '2015-04-10 16:18:45', '2015-04-10 16:18:45', NULL, NULL, 0, '-', '', 1, 1, 0),
(9, '22-Apr-2015', '2015-04-22 17:23:14', NULL, NULL, 0, 'sss', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE IF NOT EXISTS `userroles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `user_role_id` int(11) DEFAULT NULL,
  `user_role` varchar(200) DEFAULT NULL,
  `description` text,
  `js_enc` longtext,
  `other_branch` varchar(200) NOT NULL,
  `other_department` varchar(200) NOT NULL,
  `other_role` varchar(200) NOT NULL,
  `other_user` varchar(200) NOT NULL,
  `other_currency` varchar(200) NOT NULL,
  `other_assignedto` varchar(200) NOT NULL,
  `other_servicetype` varchar(200) NOT NULL,
  `other_additional` varchar(200) NOT NULL,
  `other_tallyledger` varchar(200) NOT NULL,
  `other_country` varchar(200) NOT NULL,
  `cus_industry` varchar(200) NOT NULL,
  `cus_location` varchar(200) NOT NULL,
  `cus_customer` varchar(200) NOT NULL,
  `cus_paymentterms` varchar(200) NOT NULL,
  `cus_priority` varchar(200) NOT NULL,
  `cus_referredby` varchar(200) NOT NULL,
  `cus_salesperson` varchar(200) NOT NULL,
  `cus_title` varchar(200) NOT NULL,
  `ins_procedureno` varchar(200) NOT NULL,
  `ins_brand` varchar(200) NOT NULL,
  `ins_instrument` varchar(200) NOT NULL,
  `ins_instrumentforgroup` varchar(200) NOT NULL,
  `ins_range` varchar(200) NOT NULL,
  `ins_title` varchar(200) NOT NULL,
  `ins_unit` varchar(200) NOT NULL,
  `set_candd` varchar(200) NOT NULL,
  `set_onsiteemail` varchar(200) NOT NULL,
  `set_recallservice` varchar(200) NOT NULL,
  `dim_instrument` varchar(200) NOT NULL,
  `tem_instrument` varchar(200) NOT NULL,
  `tem_ambient` varchar(200) NOT NULL,
  `tem_other` varchar(200) NOT NULL,
  `tem_range` varchar(200) NOT NULL,
  `tem_relativehumidity` varchar(200) NOT NULL,
  `tem_uncertainity` varchar(200) NOT NULL,
  `tem_readingtype` varchar(200) NOT NULL,
  `tem_channel` varchar(200) NOT NULL,
  `tem_formdatas` varchar(200) NOT NULL,
  `tem_template` varchar(200) NOT NULL,
  `tem_instrumentval` varchar(200) NOT NULL,
  `tem_unitconversion` varchar(200) NOT NULL,
  `tem_unit` varchar(200) NOT NULL,
  `pre_instrument` varchar(200) NOT NULL,
  `pre_ambient` varchar(200) NOT NULL,
  `pre_other` varchar(200) NOT NULL,
  `pre_range` varchar(200) NOT NULL,
  `pre_relativehumidity` varchar(200) NOT NULL,
  `pre_statementname` varchar(200) NOT NULL,
  `pre_statement1` varchar(200) NOT NULL,
  `pre_statement2` varchar(200) NOT NULL,
  `pre_vaccumsensor` varchar(200) NOT NULL,
  `pre_uncertainitydata` varchar(200) NOT NULL,
  `pre_formdatas` varchar(200) NOT NULL,
  `elec_instrument` varchar(200) NOT NULL,
  `elec_ambient` varchar(200) NOT NULL,
  `elec_location` varchar(200) NOT NULL,
  `elec_other` varchar(200) NOT NULL,
  `elec_range` varchar(200) NOT NULL,
  `elec_relative` varchar(200) NOT NULL,
  `elec_signal` varchar(200) NOT NULL,
  `elec_unit` varchar(200) NOT NULL,
  `elec_reference` varchar(200) NOT NULL,
  `elec_dcv` varchar(200) NOT NULL,
  `elec_acc` varchar(200) NOT NULL,
  `elec_acv` varchar(200) NOT NULL,
  `elec_capacitance` varchar(200) NOT NULL,
  `elec_dcc` varchar(200) NOT NULL,
  `elec_freq` varchar(200) NOT NULL,
  `elec_inductance` varchar(200) NOT NULL,
  `elec_resis1` varchar(200) NOT NULL,
  `elec_resis2` varchar(200) NOT NULL,
  `elec_formdatas` varchar(200) NOT NULL,
  `job_quotation` varchar(200) NOT NULL,
  `job_salesorder` varchar(200) NOT NULL,
  `job_deliveryorder` varchar(200) NOT NULL,
  `job_transaction` varchar(200) NOT NULL,
  `job_labprocess` varchar(200) NOT NULL,
  `job_purchaseorder` varchar(200) NOT NULL,
  `job_proforma` varchar(200) NOT NULL,
  `job_subcontract` varchar(200) NOT NULL,
  `job_candd` varchar(200) NOT NULL,
  `job_invoice` varchar(200) NOT NULL,
  `job_tracking` varchar(200) NOT NULL,
  `job_debt` varchar(200) NOT NULL,
  `job_onsite` varchar(200) NOT NULL,
  `job_recall` varchar(200) NOT NULL,
  `job_jobmonitor` varchar(200) NOT NULL,
  `job_purchasereq` varchar(200) NOT NULL,
  `job_prpurchaseorder` varchar(200) NOT NULL,
  `temp_dashboard` varchar(200) NOT NULL,
  `sales_contacts` varchar(200) NOT NULL,
  `sales_leads` varchar(200) NOT NULL,
  `sales_task` varchar(200) NOT NULL,
  `sales_campaign` varchar(200) NOT NULL,
  `rep_individualsales` varchar(200) NOT NULL,
  `rep_salesdetails` varchar(200) NOT NULL,
  `rep_performance` varchar(200) NOT NULL,
  `rep_quotedamount` varchar(200) NOT NULL,
  `rep_quotationreport` varchar(200) NOT NULL,
  `rep_fulldetails` varchar(200) NOT NULL,
  `rep_annualsales` varchar(200) NOT NULL,
  `rep_labinvolve` varchar(200) NOT NULL,
  `rep_quotedandsales` varchar(200) NOT NULL,
  `rep_dailywork` varchar(200) NOT NULL,
  `data_quotation` varchar(200) NOT NULL,
  `data_salesorder` varchar(200) NOT NULL,
  `data_deliveryorder` varchar(200) NOT NULL,
  `data_invoice` varchar(200) NOT NULL,
  `data_purchaseorder` varchar(200) NOT NULL,
  `data_proforma` varchar(200) NOT NULL,
  `data_subcontract` varchar(200) NOT NULL,
  `data_candd` varchar(200) NOT NULL,
  `data_recall` varchar(200) NOT NULL,
  `data_querywindow` varchar(200) NOT NULL,
  `dash_debt` varchar(200) NOT NULL,
  `dash_labprocess` varchar(200) NOT NULL,
  `dash_jobsum` varchar(200) NOT NULL,
  `app_customer` varchar(200) NOT NULL,
  `app_quotation` varchar(200) NOT NULL,
  `app_salesorder` varchar(200) NOT NULL,
  `app_deliveryorder1` varchar(200) NOT NULL,
  `app_deliveryorder2` varchar(200) NOT NULL,
  `app_invoice` varchar(200) NOT NULL,
  `app_procedureno` varchar(200) NOT NULL,
  `app_brand` varchar(200) NOT NULL,
  `app_instrument` varchar(200) NOT NULL,
  `app_instrumentgroup` varchar(200) NOT NULL,
  `app_range` varchar(200) NOT NULL,
  `app_unit` varchar(200) NOT NULL,
  `app_ready` varchar(200) NOT NULL,
  `app_prsupervisor` varchar(200) NOT NULL,
  `app_prmanager` varchar(200) NOT NULL,
  `temp_engineer` varchar(200) NOT NULL,
  `temp_supervisor` varchar(200) NOT NULL,
  `temp_manager` varchar(200) NOT NULL,
  `mis_editjob` varchar(200) NOT NULL,
  `mis_customerins` varchar(200) NOT NULL,
  `mis_inlabitems` varchar(200) NOT NULL,
  `mis_subcontract` varchar(200) NOT NULL,
  `mis_insite` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `user_role_id`, `user_role`, `description`, `js_enc`, `other_branch`, `other_department`, `other_role`, `other_user`, `other_currency`, `other_assignedto`, `other_servicetype`, `other_additional`, `other_tallyledger`, `other_country`, `cus_industry`, `cus_location`, `cus_customer`, `cus_paymentterms`, `cus_priority`, `cus_referredby`, `cus_salesperson`, `cus_title`, `ins_procedureno`, `ins_brand`, `ins_instrument`, `ins_instrumentforgroup`, `ins_range`, `ins_title`, `ins_unit`, `set_candd`, `set_onsiteemail`, `set_recallservice`, `dim_instrument`, `tem_instrument`, `tem_ambient`, `tem_other`, `tem_range`, `tem_relativehumidity`, `tem_uncertainity`, `tem_readingtype`, `tem_channel`, `tem_formdatas`, `tem_template`, `tem_instrumentval`, `tem_unitconversion`, `tem_unit`, `pre_instrument`, `pre_ambient`, `pre_other`, `pre_range`, `pre_relativehumidity`, `pre_statementname`, `pre_statement1`, `pre_statement2`, `pre_vaccumsensor`, `pre_uncertainitydata`, `pre_formdatas`, `elec_instrument`, `elec_ambient`, `elec_location`, `elec_other`, `elec_range`, `elec_relative`, `elec_signal`, `elec_unit`, `elec_reference`, `elec_dcv`, `elec_acc`, `elec_acv`, `elec_capacitance`, `elec_dcc`, `elec_freq`, `elec_inductance`, `elec_resis1`, `elec_resis2`, `elec_formdatas`, `job_quotation`, `job_salesorder`, `job_deliveryorder`, `job_transaction`, `job_labprocess`, `job_purchaseorder`, `job_proforma`, `job_subcontract`, `job_candd`, `job_invoice`, `job_tracking`, `job_debt`, `job_onsite`, `job_recall`, `job_jobmonitor`, `job_purchasereq`, `job_prpurchaseorder`, `temp_dashboard`, `sales_contacts`, `sales_leads`, `sales_task`, `sales_campaign`, `rep_individualsales`, `rep_salesdetails`, `rep_performance`, `rep_quotedamount`, `rep_quotationreport`, `rep_fulldetails`, `rep_annualsales`, `rep_labinvolve`, `rep_quotedandsales`, `rep_dailywork`, `data_quotation`, `data_salesorder`, `data_deliveryorder`, `data_invoice`, `data_purchaseorder`, `data_proforma`, `data_subcontract`, `data_candd`, `data_recall`, `data_querywindow`, `dash_debt`, `dash_labprocess`, `dash_jobsum`, `app_customer`, `app_quotation`, `app_salesorder`, `app_deliveryorder1`, `app_deliveryorder2`, `app_invoice`, `app_procedureno`, `app_brand`, `app_instrument`, `app_instrumentgroup`, `app_range`, `app_unit`, `app_ready`, `app_prsupervisor`, `app_prmanager`, `temp_engineer`, `temp_supervisor`, `temp_manager`, `mis_editjob`, `mis_customerins`, `mis_inlabitems`, `mis_subcontract`, `mis_insite`, `status`, `is_deleted`) VALUES
(1, NULL, NULL, NULL, NULL, 0, 1, 'SuperAdmin', '', 'a:71:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_auto";a:1:{s:4:"view";s:1:"1";}s:13:"instr_costing";a:5:{s:4:"view";s:1:"1";s:4:"edit";s:1:"1";s:4:"user";s:1:"1";s:10:"supervisor";s:1:"1";s:7:"manager";s:1:"1";}s:18:"other_canddsetting";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:6:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";s:10:"instrument";s:1:"1";s:3:"tag";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:2:{s:4:"edit";s:1:"1";s:4:"view";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:3:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:1:{s:4:"view";s:1:"1";}s:12:"job_tracking";a:1:{s:4:"view";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:3:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:2:{s:4:"edit";s:1:"1";s:4:"view";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_datalog";a:1:{s:4:"view";s:1:"1";}s:12:"app_customer";a:1:{s:4:"view";s:1:"1";}s:13:"app_quotation";a:1:{s:4:"view";s:1:"1";}s:14:"app_salesorder";a:1:{s:4:"view";s:1:"1";}s:18:"app_deliveryorder1";a:1:{s:4:"view";s:1:"1";}s:11:"app_invoice";a:1:{s:4:"view";s:1:"1";}s:15:"app_procedureno";a:1:{s:4:"view";s:1:"1";}s:9:"app_brand";a:1:{s:4:"view";s:1:"1";}s:14:"app_instrument";a:1:{s:4:"view";s:1:"1";}s:17:"app_cusinstrument";a:1:{s:4:"view";s:1:"1";}s:19:"app_instrumentgroup";a:1:{s:4:"view";s:1:"1";}s:9:"app_range";a:1:{s:4:"view";s:1:"1";}s:8:"app_unit";a:1:{s:4:"view";s:1:"1";}s:9:"app_ready";a:1:{s:4:"view";s:1:"1";}s:16:"app_prsupervisor";a:1:{s:4:"view";s:1:"1";}s:13:"app_prmanager";a:1:{s:4:"view";s:1:"1";}s:14:"app_prpurchase";a:1:{s:4:"view";s:1:"1";}s:10:"app_inship";a:1:{s:4:"view";s:1:"1";}s:12:"app_clientpo";a:1:{s:4:"view";s:1:"1";}s:10:"app_subcon";a:1:{s:4:"view";s:1:"1";}s:10:"app_onsite";a:1:{s:4:"view";s:1:"1";}s:12:"app_purchase";a:1:{s:4:"view";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(2, NULL, NULL, NULL, NULL, 0, 2, 'Admin', '', 'a:64:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(12, '2014-09-08 10:33:44', '2014-09-08 10:33:44', NULL, NULL, 0, 3, 'Tech Manager', 'Tech Manager', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"instr_costing";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(13, '2014-10-20 05:46:20', '2014-10-20 05:46:20', NULL, NULL, 0, 4, 'Operation Manager', '', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:13:"instr_costing";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(14, '2015-02-02 16:33:33', '2015-02-02 16:33:33', NULL, NULL, 0, 5, 'Operation Executive', '', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"instr_costing";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"cus_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"0";}s:11:"dash_number";a:1:{s:4:"view";s:1:"0";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"0";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"0";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"0";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"0";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(15, '2015-02-13 03:58:27', '2015-02-13 03:58:27', NULL, NULL, 0, 6, 'Technical Executive', '', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"other_auto";a:1:{s:4:"view";s:1:"0";}s:13:"instr_costing";a:5:{s:4:"view";s:1:"0";s:4:"edit";s:1:"0";s:4:"user";s:1:"0";s:10:"supervisor";s:1:"0";s:7:"manager";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:6:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";s:10:"instrument";s:1:"0";s:3:"tag";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"0";}s:11:"dash_number";a:1:{s:4:"view";s:1:"0";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"0";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"0";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"0";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"0";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0);
INSERT INTO `userroles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `user_role_id`, `user_role`, `description`, `js_enc`, `other_branch`, `other_department`, `other_role`, `other_user`, `other_currency`, `other_assignedto`, `other_servicetype`, `other_additional`, `other_tallyledger`, `other_country`, `cus_industry`, `cus_location`, `cus_customer`, `cus_paymentterms`, `cus_priority`, `cus_referredby`, `cus_salesperson`, `cus_title`, `ins_procedureno`, `ins_brand`, `ins_instrument`, `ins_instrumentforgroup`, `ins_range`, `ins_title`, `ins_unit`, `set_candd`, `set_onsiteemail`, `set_recallservice`, `dim_instrument`, `tem_instrument`, `tem_ambient`, `tem_other`, `tem_range`, `tem_relativehumidity`, `tem_uncertainity`, `tem_readingtype`, `tem_channel`, `tem_formdatas`, `tem_template`, `tem_instrumentval`, `tem_unitconversion`, `tem_unit`, `pre_instrument`, `pre_ambient`, `pre_other`, `pre_range`, `pre_relativehumidity`, `pre_statementname`, `pre_statement1`, `pre_statement2`, `pre_vaccumsensor`, `pre_uncertainitydata`, `pre_formdatas`, `elec_instrument`, `elec_ambient`, `elec_location`, `elec_other`, `elec_range`, `elec_relative`, `elec_signal`, `elec_unit`, `elec_reference`, `elec_dcv`, `elec_acc`, `elec_acv`, `elec_capacitance`, `elec_dcc`, `elec_freq`, `elec_inductance`, `elec_resis1`, `elec_resis2`, `elec_formdatas`, `job_quotation`, `job_salesorder`, `job_deliveryorder`, `job_transaction`, `job_labprocess`, `job_purchaseorder`, `job_proforma`, `job_subcontract`, `job_candd`, `job_invoice`, `job_tracking`, `job_debt`, `job_onsite`, `job_recall`, `job_jobmonitor`, `job_purchasereq`, `job_prpurchaseorder`, `temp_dashboard`, `sales_contacts`, `sales_leads`, `sales_task`, `sales_campaign`, `rep_individualsales`, `rep_salesdetails`, `rep_performance`, `rep_quotedamount`, `rep_quotationreport`, `rep_fulldetails`, `rep_annualsales`, `rep_labinvolve`, `rep_quotedandsales`, `rep_dailywork`, `data_quotation`, `data_salesorder`, `data_deliveryorder`, `data_invoice`, `data_purchaseorder`, `data_proforma`, `data_subcontract`, `data_candd`, `data_recall`, `data_querywindow`, `dash_debt`, `dash_labprocess`, `dash_jobsum`, `app_customer`, `app_quotation`, `app_salesorder`, `app_deliveryorder1`, `app_deliveryorder2`, `app_invoice`, `app_procedureno`, `app_brand`, `app_instrument`, `app_instrumentgroup`, `app_range`, `app_unit`, `app_ready`, `app_prsupervisor`, `app_prmanager`, `temp_engineer`, `temp_supervisor`, `temp_manager`, `mis_editjob`, `mis_customerins`, `mis_inlabitems`, `mis_subcontract`, `mis_insite`, `status`, `is_deleted`) VALUES
(16, '2015-03-24 09:20:54', '2015-03-24 09:20:54', NULL, NULL, 0, 7, 'SalesAdmin', '', 'a:71:{s:12:"other_branch";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_auto";a:1:{s:4:"view";s:1:"0";}s:13:"instr_costing";a:5:{s:4:"view";s:1:"0";s:4:"edit";s:1:"0";s:4:"user";s:1:"0";s:10:"supervisor";s:1:"0";s:7:"manager";s:1:"0";}s:18:"other_canddsetting";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:6:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";s:10:"instrument";s:1:"0";s:3:"tag";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"0";}s:11:"dash_number";a:1:{s:4:"view";s:1:"0";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"0";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"0";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:2:{s:4:"edit";s:1:"0";s:4:"view";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:3:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:1:{s:4:"view";s:1:"0";}s:12:"job_tracking";a:1:{s:4:"view";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:3:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:2:{s:4:"edit";s:1:"1";s:4:"view";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_datalog";a:1:{s:4:"view";s:1:"1";}s:12:"app_customer";a:1:{s:4:"view";s:1:"0";}s:13:"app_quotation";a:1:{s:4:"view";s:1:"0";}s:14:"app_salesorder";a:1:{s:4:"view";s:1:"1";}s:18:"app_deliveryorder1";a:1:{s:4:"view";s:1:"0";}s:11:"app_invoice";a:1:{s:4:"view";s:1:"0";}s:15:"app_procedureno";a:1:{s:4:"view";s:1:"0";}s:9:"app_brand";a:1:{s:4:"view";s:1:"0";}s:14:"app_instrument";a:1:{s:4:"view";s:1:"0";}s:17:"app_cusinstrument";a:1:{s:4:"view";s:1:"0";}s:19:"app_instrumentgroup";a:1:{s:4:"view";s:1:"0";}s:9:"app_range";a:1:{s:4:"view";s:1:"0";}s:8:"app_unit";a:1:{s:4:"view";s:1:"0";}s:9:"app_ready";a:1:{s:4:"view";s:1:"0";}s:16:"app_prsupervisor";a:1:{s:4:"view";s:1:"0";}s:13:"app_prmanager";a:1:{s:4:"view";s:1:"0";}s:14:"app_prpurchase";a:1:{s:4:"view";s:1:"0";}s:10:"app_inship";a:1:{s:4:"view";s:1:"0";}s:12:"app_clientpo";a:1:{s:4:"view";s:1:"0";}s:10:"app_subcon";a:1:{s:4:"view";s:1:"0";}s:10:"app_onsite";a:1:{s:4:"view";s:1:"0";}s:12:"app_purchase";a:1:{s:4:"view";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(17, '2015-04-10 15:28:47', '2015-04-10 15:28:47', NULL, NULL, 0, 8, 'SalesSeniorExecutive', '', 'a:71:{s:12:"other_branch";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_auto";a:1:{s:4:"view";s:1:"0";}s:13:"instr_costing";a:5:{s:4:"view";s:1:"1";s:4:"edit";s:1:"1";s:4:"user";s:1:"0";s:10:"supervisor";s:1:"1";s:7:"manager";s:1:"0";}s:18:"other_canddsetting";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:5:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";s:3:"tag";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:2:{s:4:"edit";s:1:"1";s:4:"view";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:3:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:1:{s:4:"view";s:1:"0";}s:12:"job_tracking";a:1:{s:4:"view";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:3:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:2:{s:4:"edit";s:1:"0";s:4:"view";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_datalog";a:1:{s:4:"view";s:1:"0";}s:12:"app_customer";a:1:{s:4:"view";s:1:"0";}s:13:"app_quotation";a:1:{s:4:"view";s:1:"1";}s:14:"app_salesorder";a:1:{s:4:"view";s:1:"0";}s:18:"app_deliveryorder1";a:1:{s:4:"view";s:1:"0";}s:11:"app_invoice";a:1:{s:4:"view";s:1:"0";}s:15:"app_procedureno";a:1:{s:4:"view";s:1:"0";}s:9:"app_brand";a:1:{s:4:"view";s:1:"0";}s:14:"app_instrument";a:1:{s:4:"view";s:1:"0";}s:17:"app_cusinstrument";a:1:{s:4:"view";s:1:"0";}s:19:"app_instrumentgroup";a:1:{s:4:"view";s:1:"0";}s:9:"app_range";a:1:{s:4:"view";s:1:"0";}s:8:"app_unit";a:1:{s:4:"view";s:1:"0";}s:9:"app_ready";a:1:{s:4:"view";s:1:"0";}s:16:"app_prsupervisor";a:1:{s:4:"view";s:1:"0";}s:13:"app_prmanager";a:1:{s:4:"view";s:1:"0";}s:14:"app_prpurchase";a:1:{s:4:"view";s:1:"0";}s:10:"app_inship";a:1:{s:4:"view";s:1:"0";}s:12:"app_clientpo";a:1:{s:4:"view";s:1:"0";}s:10:"app_subcon";a:1:{s:4:"view";s:1:"0";}s:10:"app_onsite";a:1:{s:4:"view";s:1:"0";}s:12:"app_purchase";a:1:{s:4:"view";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(18, '2015-04-14 15:05:44', '2015-04-14 15:05:44', NULL, NULL, 0, 9, 'SalesSeniorManager', '', 'a:72:{s:12:"other_branch";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_auto";a:1:{s:4:"view";s:1:"0";}s:22:"instr_costing_settings";a:2:{s:4:"view";s:1:"1";s:4:"edit";s:1:"1";}s:13:"instr_costing";a:5:{s:4:"user";s:1:"1";s:10:"supervisor";s:1:"0";s:7:"manager";s:1:"0";s:4:"view";s:1:"1";s:4:"edit";s:1:"1";}s:18:"other_canddsetting";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:5:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";s:3:"tag";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:2:{s:4:"edit";s:1:"0";s:4:"view";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:3:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:1:{s:4:"view";s:1:"0";}s:12:"job_tracking";a:1:{s:4:"view";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:3:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:2:{s:4:"edit";s:1:"1";s:4:"view";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_datalog";a:1:{s:4:"view";s:1:"1";}s:12:"app_customer";a:1:{s:4:"view";s:1:"0";}s:13:"app_quotation";a:1:{s:4:"view";s:1:"1";}s:14:"app_salesorder";a:1:{s:4:"view";s:1:"0";}s:18:"app_deliveryorder1";a:1:{s:4:"view";s:1:"0";}s:11:"app_invoice";a:1:{s:4:"view";s:1:"0";}s:15:"app_procedureno";a:1:{s:4:"view";s:1:"0";}s:9:"app_brand";a:1:{s:4:"view";s:1:"0";}s:14:"app_instrument";a:1:{s:4:"view";s:1:"0";}s:17:"app_cusinstrument";a:1:{s:4:"view";s:1:"0";}s:19:"app_instrumentgroup";a:1:{s:4:"view";s:1:"0";}s:9:"app_range";a:1:{s:4:"view";s:1:"0";}s:8:"app_unit";a:1:{s:4:"view";s:1:"0";}s:9:"app_ready";a:1:{s:4:"view";s:1:"0";}s:16:"app_prsupervisor";a:1:{s:4:"view";s:1:"1";}s:13:"app_prmanager";a:1:{s:4:"view";s:1:"0";}s:14:"app_prpurchase";a:1:{s:4:"view";s:1:"0";}s:10:"app_inship";a:1:{s:4:"view";s:1:"0";}s:12:"app_clientpo";a:1:{s:4:"view";s:1:"0";}s:10:"app_subcon";a:1:{s:4:"view";s:1:"0";}s:10:"app_onsite";a:1:{s:4:"view";s:1:"0";}s:12:"app_purchase";a:1:{s:4:"view";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `userrole_id` int(11) DEFAULT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `emailid` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `status` int(10) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userrole_id`, `firstname`, `lastname`, `emailid`, `created`, `modified`, `created_by`, `modified_by`, `view`, `status`, `is_deleted`) VALUES
(1, 'admin', 'admin@123', 1, 'Admin', 'BackEnd', 'admin@bs.com', '2014-04-23 09:24:32', '2014-10-20 05:45:46', 0, 0, 0, 1, 0),
(2, 'krishnan', 'krish11', 2, 'Bala', 'Krishnan', 'krishnan@bestandards.com', '2014-10-20 05:32:39', '2014-10-20 05:45:34', NULL, NULL, 0, 1, 0),
(3, 'sharifah', 'sharifah', 15, 'sharifah', 'BS', 'sharifah@bestandards.com', '2014-10-20 05:53:40', '2015-02-26 11:32:13', NULL, NULL, 0, 1, 0),
(4, 'new', 'newuser', 13, 'new', 'new', 'new@new.com', '2015-01-05 14:15:12', '2015-01-05 14:15:12', NULL, NULL, 0, 1, 0),
(5, 'Sekar', 'sekar11', 13, 'Sekar', 'BS', 'sekar@bestandards.com', '2015-02-02 16:32:17', '2015-02-02 16:32:17', NULL, NULL, 0, 1, 0),
(6, 'Raj', 'bstech123', 15, 'Raj', 'BS', 'krishnan@bestandards.com', '2015-02-13 04:14:28', '2015-02-13 04:14:28', NULL, NULL, 0, 1, 0),
(7, 'Justina', 'justina11', 14, 'Justina', 'BS', 'justina@bs.sg', '2015-03-24 09:19:50', '2015-03-24 09:19:50', NULL, NULL, 0, 1, 0),
(8, 'Kasu', 'kasu11', 16, 'Kasu', 'BS', 'accounts@bestandards.com', '2015-03-26 03:34:59', '2015-03-26 03:34:59', NULL, NULL, 0, 1, 0),
(9, 'Arasu', 'arasu11', 16, 'Arasu', '', 'info@bestandards.com', '2015-04-02 08:34:08', '2015-04-02 08:34:08', NULL, NULL, 0, 1, 0),
(10, 'Roshan', 'roshan11', 17, 'Roshan', 'BS', 'krishnan@bestandards.com', '2015-04-10 15:28:03', '2015-04-10 15:36:50', NULL, NULL, 0, 1, 0),
(11, 'Rohini', 'rohini11', 18, 'Rohini', 'BS', 'info@bestandards.com', '2015-04-14 15:05:17', '2015-04-14 15:16:10', NULL, NULL, 0, 1, 0),
(12, 'arun', 'arunindu', 2, 'arun', '', 'arun@gmail.com', '2015-04-21 20:50:03', '2015-04-21 20:50:03', NULL, NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_departments`
--

CREATE TABLE IF NOT EXISTS `user_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `user_departments`
--

INSERT INTO `user_departments` (`id`, `created`, `modified`, `user_id`, `department_id`, `status`) VALUES
(13, '2014-10-20 05:45:46', '2014-10-20 05:45:46', 1, 4, 1),
(12, '2014-10-20 05:45:46', '2014-10-20 05:45:46', 1, 3, 1),
(11, '2014-10-20 05:45:46', '2014-10-20 05:45:46', 1, 2, 1),
(10, '2014-10-20 05:45:46', '2014-10-20 05:45:46', 1, 1, 1),
(5, '2014-10-20 05:45:34', '2014-10-20 05:45:34', 2, 1, 1),
(6, '2014-10-20 05:45:34', '2014-10-20 05:45:34', 2, 2, 1),
(7, '2014-10-20 05:45:34', '2014-10-20 05:45:34', 2, 3, 1),
(8, '2014-10-20 05:45:34', '2014-10-20 05:45:34', 2, 4, 1),
(9, '2014-10-20 05:45:34', '2014-10-20 05:45:34', 2, 5, 1),
(14, '2014-10-20 05:45:46', '2014-10-20 05:45:46', 1, 5, 1),
(42, '2015-02-26 11:32:13', '2015-02-26 11:32:13', 3, 5, 1),
(41, '2015-02-26 11:32:13', '2015-02-26 11:32:13', 3, 4, 1),
(40, '2015-02-26 11:32:13', '2015-02-26 11:32:13', 3, 3, 1),
(39, '2015-02-26 11:32:13', '2015-02-26 11:32:13', 3, 2, 1),
(38, '2015-02-26 11:32:13', '2015-02-26 11:32:13', 3, 1, 1),
(20, '2015-01-05 14:15:12', '2015-01-05 14:15:12', 4, 1, 1),
(21, '2015-01-05 14:15:12', '2015-01-05 14:15:12', 4, 2, 1),
(22, '2015-01-05 14:15:12', '2015-01-05 14:15:12', 4, 3, 1),
(23, '2015-01-05 14:15:12', '2015-01-05 14:15:12', 4, 4, 1),
(24, '2015-01-05 14:15:12', '2015-01-05 14:15:12', 4, 5, 1),
(25, '2015-01-05 14:15:12', '2015-01-05 14:15:12', 4, 6, 1),
(26, '2015-02-02 16:32:17', '2015-02-02 16:32:17', 5, 1, 1),
(27, '2015-02-02 16:32:17', '2015-02-02 16:32:17', 5, 2, 1),
(28, '2015-02-02 16:32:17', '2015-02-02 16:32:17', 5, 3, 1),
(29, '2015-02-02 16:32:17', '2015-02-02 16:32:17', 5, 4, 1),
(30, '2015-02-02 16:32:17', '2015-02-02 16:32:17', 5, 5, 1),
(31, '2015-02-02 16:32:17', '2015-02-02 16:32:17', 5, 6, 1),
(32, '2015-02-13 04:14:28', '2015-02-13 04:14:28', 6, 1, 1),
(33, '2015-02-13 04:14:28', '2015-02-13 04:14:28', 6, 2, 1),
(34, '2015-02-13 04:14:28', '2015-02-13 04:14:28', 6, 3, 1),
(35, '2015-02-13 04:14:28', '2015-02-13 04:14:28', 6, 4, 1),
(36, '2015-02-13 04:14:28', '2015-02-13 04:14:28', 6, 5, 1),
(37, '2015-02-13 04:14:28', '2015-02-13 04:14:28', 6, 6, 1),
(43, '2015-03-24 09:19:50', '2015-03-24 09:19:50', 7, 2, 1),
(44, '2015-03-24 09:19:50', '2015-03-24 09:19:50', 7, 3, 1),
(45, '2015-03-24 09:19:50', '2015-03-24 09:19:50', 7, 4, 1),
(46, '2015-03-24 09:19:50', '2015-03-24 09:19:50', 7, 5, 1),
(47, '2015-03-24 09:19:50', '2015-03-24 09:19:50', 7, 6, 1),
(48, '2015-03-26 03:34:59', '2015-03-26 03:34:59', 8, 2, 1),
(49, '2015-03-26 03:34:59', '2015-03-26 03:34:59', 8, 3, 1),
(50, '2015-03-26 03:34:59', '2015-03-26 03:34:59', 8, 4, 1),
(51, '2015-03-26 03:34:59', '2015-03-26 03:34:59', 8, 5, 1),
(52, '2015-03-26 03:34:59', '2015-03-26 03:34:59', 8, 6, 1),
(53, '2015-04-02 08:34:08', '2015-04-02 08:34:08', 9, 2, 1),
(54, '2015-04-02 08:34:08', '2015-04-02 08:34:08', 9, 3, 1),
(55, '2015-04-02 08:34:08', '2015-04-02 08:34:08', 9, 4, 1),
(56, '2015-04-02 08:34:08', '2015-04-02 08:34:08', 9, 5, 1),
(57, '2015-04-02 08:34:08', '2015-04-02 08:34:08', 9, 6, 1),
(69, '2015-04-10 15:36:50', '2015-04-10 15:36:50', 10, 7, 1),
(68, '2015-04-10 15:36:50', '2015-04-10 15:36:50', 10, 6, 1),
(67, '2015-04-10 15:36:50', '2015-04-10 15:36:50', 10, 5, 1),
(66, '2015-04-10 15:36:50', '2015-04-10 15:36:50', 10, 4, 1),
(65, '2015-04-10 15:36:50', '2015-04-10 15:36:50', 10, 3, 1),
(64, '2015-04-10 15:36:50', '2015-04-10 15:36:50', 10, 2, 1),
(81, '2015-04-14 15:16:10', '2015-04-14 15:16:10', 11, 7, 1),
(80, '2015-04-14 15:16:10', '2015-04-14 15:16:10', 11, 6, 1),
(79, '2015-04-14 15:16:10', '2015-04-14 15:16:10', 11, 5, 1),
(78, '2015-04-14 15:16:10', '2015-04-14 15:16:10', 11, 4, 1),
(77, '2015-04-14 15:16:10', '2015-04-14 15:16:10', 11, 3, 1),
(76, '2015-04-14 15:16:10', '2015-04-14 15:16:10', 11, 2, 1),
(82, '2015-04-21 20:50:03', '2015-04-21 20:50:03', 12, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
