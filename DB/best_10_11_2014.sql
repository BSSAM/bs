-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2014 at 04:50 PM
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
(1, '2014-09-08 10:49:31', '2014-10-20 06:01:09', NULL, NULL, 0, 'Special Services', '-\r\n', 1, 0),
(2, '2014-10-20 06:01:26', '2014-10-20 06:01:26', NULL, NULL, 0, 'Transportation Charge', '', 1, 0);

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
(1, '2014-09-08 10:48:42', '2014-10-20 05:59:35', NULL, NULL, 0, 'Maran', '-', 1, 0),
(2, '2014-10-20 05:58:59', '2014-10-20 05:59:16', NULL, NULL, 0, 'Alex', '', 1, 0),
(3, '2014-10-20 05:59:58', '2014-10-20 05:59:58', NULL, NULL, 0, 'Sekar', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `branchname`, `address`, `phone`, `fax`, `website`, `companyregno`, `gstregno`, `defaultbranch`, `currency_id`, `gst`, `status`, `is_deleted`) VALUES
(1, '2014-09-08 10:51:53', '2014-09-08 10:51:53', NULL, NULL, 0, 'Singapore', 'Senoko Drive', '9859593565', '0441225625622', 'www.bestandards.com', 'REG1234567890', 'GSTREGNO12345678', 1, 1, '7.00', 1, 0),
(2, '2014-10-20 05:41:03', '2014-10-20 05:41:03', NULL, NULL, 0, 'Malaysia', 'Blk123 JB Town,\r\nMalaysia 31121212', '6666 1121', '6458 4400', 'www.bs.sg', 'M200548545', 'M200548545', 0, NULL, '0', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `brandname`, `branddescription`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-10-20 11:58:48', '2014-10-20 11:58:48', NULL, NULL, 0, 'SYSCO', 'SYSCO', 1, 1, 0),
(2, '2014-10-20 11:59:02', '2014-10-20 11:59:02', NULL, NULL, 0, 'CAPRI', 'CAPRI', 1, 1, 0),
(3, '2014-10-24 05:25:11', '2014-10-24 05:25:11', NULL, NULL, 0, 'fluke', '-', 1, 1, 0),
(4, '2014-10-24 05:26:11', '2014-10-24 05:30:48', NULL, NULL, 0, 'yokogawa', '-', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bs_dodatas`
--

CREATE TABLE IF NOT EXISTS `bs_dodatas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `doinvoice_id` int(11) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `invoice_id` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bs_doinvoices`
--

CREATE TABLE IF NOT EXISTS `bs_doinvoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `deliveryorderno` varchar(200) DEFAULT NULL,
  `deliveryorder_data` text,
  `do_count` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bs_podatas`
--

CREATE TABLE IF NOT EXISTS `bs_podatas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `poinvoice_id` int(11) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `invoice_id` varchar(200) DEFAULT NULL,
  `staus` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bs_poinvoices`
--

CREATE TABLE IF NOT EXISTS `bs_poinvoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `clientpo_number` varchar(200) DEFAULT NULL,
  `clientpo_data` text,
  `po_count` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bs_qodatas`
--

CREATE TABLE IF NOT EXISTS `bs_qodatas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `qoinvoice_id` int(11) DEFAULT NULL,
  `salesorder_id` int(11) NOT NULL,
  `deliveryorder_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bs_qoinvoices`
--

CREATE TABLE IF NOT EXISTS `bs_qoinvoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `quotationno` varchar(200) DEFAULT NULL,
  `quotation_data` text,
  `qo_count` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bs_sodatas`
--

CREATE TABLE IF NOT EXISTS `bs_sodatas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `soinvoice_id` int(11) DEFAULT NULL,
  `po_id` varchar(200) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `invoice_id` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bs_soinvoices`
--

CREATE TABLE IF NOT EXISTS `bs_soinvoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `salesorder_data` text,
  `so_count` text,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `candds`
--

CREATE TABLE IF NOT EXISTS `candds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

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
(1, '2014-10-20 05:41:41', '2014-10-20 05:41:41', NULL, NULL, 0, 'Singapore', 'Sg', 1, 0),
(2, '2014-10-20 05:42:52', '2014-10-20 05:42:52', NULL, NULL, 0, 'Malaysia', 'My', 1, 0);

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
(1, 1, 'S$', 'SGD', 1, 1, '2014-10-20 05:54:40', '2014-10-20 05:54:40', NULL, NULL, 0, 0),
(2, 2, 'MR', 'MYR', 0.39, 1, '2014-10-20 05:58:29', '2014-10-20 05:58:29', NULL, NULL, 0, 0);

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
('CUS-01-10000005', '2014-10-20 08:10:53', '2014-10-29 11:42:05', NULL, NULL, 0, 'CGRU-01-10000021', 'TAG-01-10000021', NULL, 'MAIN', 'BS AQUATIERRA PTE LTD', '758249', '6666 1121', '6458 4400', 1, 1, 'Customer', '-', '-', 2, '1', 'Singlas', '3', '2', NULL, 1, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000008', '2014-10-20 11:02:51', '2014-10-20 11:02:51', NULL, NULL, 0, 'CGRU-01-10000024', 'TAG-01-10000024', NULL, 'MAIN', 'ABC PTE LTD', '758249', '6666 1122', '6458 4401', 2, 1, 'Customer', '-', '', 2, '1', 'Singlas', '3', '2', NULL, 2, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000011', '2014-10-20 11:07:04', '2014-10-20 11:07:04', NULL, NULL, 0, 'CGRU-01-10000027', 'TAG-01-10000027', NULL, 'TUAS', 'ABC PTE LTD', '256245', '6363 2512', '6352 5214', 2, 1, 'Customer', '-', '', 1, '1', 'Singlas', '3', '2', NULL, 1, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000014', '2014-10-24 05:06:20', '2014-10-28 12:44:28', NULL, NULL, 0, 'CGRU-01-10000030', 'TAG-01-10000030', NULL, 'Quality', 'Goodrich Aerospace Pte Ltd', '-', '67856967', '68754356', 1, 1, 'Customer', '-', '', 3, '1', 'Singlas', '1', '2', NULL, 1, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000017', '2014-10-24 05:11:48', '2014-10-24 05:11:48', NULL, NULL, 0, 'CGRU-01-10000033', 'TAG-01-10000033', NULL, 'Mechanical', 'Goodrich Aerospace Pte Ltd', '567890', '6545709', '', 1, 1, 'Customer', '-', '', 2, '1', 'Singlas', '1', '2', NULL, 1, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000020', '2014-10-27 02:23:44', '2014-10-27 02:23:44', NULL, NULL, 0, 'CGRU-01-10000024', 'TAG-01-10000036', NULL, 'NORA', 'ABC PTE LTD', '758249', '64584411', '64584400', 2, 1, 'Customer', '-', '', 2, '1', 'Singlas', '3', '1', NULL, 1, NULL, NULL, 0, 1, '0000-00-00', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_instruments`
--

CREATE TABLE IF NOT EXISTS `customer_instruments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `unit_price` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customer_instruments`
--

INSERT INTO `customer_instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `instrument_id`, `branch_id`, `model_no`, `range_id`, `unit_price`, `status`, `is_deleted`) VALUES
(1, '2014-10-27 02:34:33', '2014-10-29 15:29:46', NULL, NULL, 0, 'CUS-01-10000008', 1, NULL, 'TS1', '2', '120', 1, 0),
(2, '2014-10-27 02:36:02', '2014-10-27 02:36:02', NULL, NULL, 0, 'CUS-01-10000008', 2, NULL, 'TG1', '1', '75', 1, 0),
(3, '2014-10-27 02:41:29', '2014-10-27 02:41:29', NULL, NULL, 0, 'CUS-01-10000020', 1, NULL, 'TS12', '2', '100', 1, 0),
(4, '2014-10-27 02:45:18', '2014-10-27 02:45:18', NULL, NULL, 0, 'CUS-01-10000020', 5, NULL, 'A1', '5', '250', 1, 0),
(5, '2014-10-27 02:46:36', '2014-10-27 02:46:36', NULL, NULL, 0, 'CUS-01-10000005', 1, NULL, 'A122', '2', '150', 1, 0),
(6, '2014-10-27 02:46:49', '2014-10-27 02:46:49', NULL, NULL, 0, 'CUS-01-10000005', 2, NULL, 'T21', '1', '80', 1, 0),
(7, '2014-10-28 12:45:10', '2014-10-28 12:45:10', NULL, NULL, 0, 'CUS-01-10000014', 4, NULL, 'yamaha', '3', '2', 1, 0),
(10, '2014-11-10 11:30:01', '2014-11-10 11:30:01', NULL, NULL, 0, 'CUS-01-10000008', 1, NULL, 'aa', '2', '34', 1, 0);

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
(1, '2014-10-20 08:06:20', '2014-10-20 08:06:20', NULL, NULL, 0, 'CUS-01-10000005', 'TAG-01-10000021', 'CGRU-01-10000021', 1230507649, '41 Senoko Drive,\nSingapore 758 249.', 'registered', 1, 0),
(2, '2014-10-20 11:01:00', '2014-10-20 11:01:00', NULL, NULL, 0, 'CUS-01-10000008', 'TAG-01-10000024', 'CGRU-01-10000024', 1541835413, '41 Senoko Drive\nSingapore 758249', 'registered', 1, 0),
(3, '2014-10-20 11:05:38', '2014-10-20 11:05:38', NULL, NULL, 0, 'CUS-01-10000011', 'TAG-01-10000027', 'CGRU-01-10000027', 437355782, '32 Tuas\nSingapore 256245', 'registered', 1, 0),
(4, '2014-10-24 04:56:08', '2014-10-24 04:56:08', NULL, NULL, 0, 'CUS-01-10000014', 'TAG-01-10000030', 'CGRU-01-10000030', 1489946266, '39 Changi North Street\nSingapore 389402', 'registered', 1, 0),
(5, '2014-10-24 04:56:41', '2014-10-24 04:56:41', NULL, NULL, 0, 'CUS-01-10000014', 'TAG-01-10000030', 'CGRU-01-10000030', 388107016, '41 Changi North Street \nSingapore 449382', 'billing', 1, 0),
(6, '2014-10-24 05:08:49', '2014-10-24 05:08:49', NULL, NULL, 0, 'CUS-01-10000014', 'TAG-01-10000030', NULL, 205212073, '4 senoko drive', 'registered', 1, 0),
(7, '2014-10-24 05:10:37', '2014-10-24 05:10:37', NULL, NULL, 0, 'CUS-01-10000017', 'TAG-01-10000033', 'CGRU-01-10000033', 2114721094, '4 senoko drive\nsingapore 876908', 'registered', 1, 0),
(8, '2014-10-27 02:20:52', '2014-10-27 02:20:52', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', 1788741776, '41 Senoko Drive\nSingapore 758249', 'registered', 1, 0),
(9, '2014-10-27 02:21:44', '2014-10-27 02:21:44', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', 702253434, '41 Senoko Drive,#03-03,\nSingapore 758249', 'billing', 1, 0),
(10, '2014-10-27 02:22:01', '2014-10-27 02:22:01', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', 407384398, '41 Senoko Drive,#01-03,\nSingapore 758249', 'delivery', 1, 0),
(11, '2014-10-28 09:12:50', '2014-10-28 09:12:50', NULL, NULL, 0, 'CUS-01-10000005', 'TAG-01-10000021', NULL, 1223267994, 'fdf', 'billing', 1, 0),
(12, '2014-10-28 12:40:04', '2014-10-28 12:40:04', NULL, NULL, 0, 'CUS-01-10000014', 'TAG-01-10000030', NULL, 1208185982, 'address', 'delivery', 1, 0),
(13, '2014-11-10 12:56:43', '2014-11-10 12:56:43', NULL, NULL, 0, 'CUS-01-10000017', 'TAG-01-10000033', NULL, 1236935440, 'dgf', 'billing', 1, 0),
(14, '2014-11-10 12:56:46', '2014-11-10 12:56:46', NULL, NULL, 0, 'CUS-01-10000017', 'TAG-01-10000033', NULL, 1102117454, 'fdg', 'delivery', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cus_contactpersoninfos`
--

INSERT INTO `cus_contactpersoninfos` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `serial_id`, `email`, `remarks`, `name`, `department`, `phone`, `position`, `mobile`, `purpose`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 08:09:49', '2014-10-20 08:09:49', NULL, NULL, 0, 'CUS-01-10000005', 'TAG-01-10000021', 'CGRU-01-10000021', '05533350', 'mohan@bsaquatierra.com', '', 'Mohan', '', '64584411', '', '', '', 1, 0),
(2, '2014-10-20 11:02:48', '2014-10-20 11:02:48', NULL, NULL, 0, 'CUS-01-10000008', 'TAG-01-10000024', 'CGRU-01-10000024', '87319632', 'erick@abc.com', '', 'Erick', '', '6542 1472', '', '', '', 1, 0),
(3, '2014-10-20 11:06:50', '2014-10-20 11:06:50', NULL, NULL, 0, 'CUS-01-10000011', 'TAG-01-10000027', 'CGRU-01-10000027', '31584524', 'Jon@abc.com', '', 'John', '', '', '', '9856 3256', '', 1, 0),
(4, '2014-10-24 05:01:11', '2014-10-24 05:01:11', NULL, NULL, 0, 'CUS-01-10000014', 'TAG-01-10000030', 'CGRU-01-10000030', '53898209', 'christine@goodrich.com.sg', '', 'Ms Christine Chua', '', '-', '-', '-', '', 1, 0),
(5, '2014-10-24 05:01:54', '2014-10-24 05:01:54', NULL, NULL, 0, 'CUS-01-10000014', 'TAG-01-10000030', 'CGRU-01-10000030', '43119545', '', '', 'Mr Lai Yong Quan', '', '', '', '', '', 1, 0),
(6, '2014-10-24 05:02:20', '2014-10-24 05:02:20', NULL, NULL, 0, 'CUS-01-10000014', 'TAG-01-10000030', 'CGRU-01-10000030', '66741367', '-', '', 'Mr Koon Tak', '', '', '', '', '', 1, 0),
(7, '2014-10-24 05:11:45', '2014-10-24 05:11:45', NULL, NULL, 0, 'CUS-01-10000017', 'TAG-01-10000033', 'CGRU-01-10000033', '98514117', '-', '', 'ms kirana', '', '', '', '', '', 1, 0),
(8, '2014-10-27 02:23:41', '2014-10-27 02:23:41', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', NULL, 'karna@bs.sg', '', 'Karna', '', '98546547', '', '', '', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cus_referbies`
--

INSERT INTO `cus_referbies` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `referedby_id`, `status`) VALUES
(8, '2014-10-29 11:42:05', '2014-10-29 11:42:05', NULL, NULL, 0, 'CUS-01-10000005', NULL, NULL, '1', 1),
(2, '2014-10-20 11:02:51', '2014-10-20 11:02:51', NULL, NULL, 0, 'CUS-01-10000008', 'TAG-01-10000024', 'CGRU-01-10000024', '2', 1),
(3, '2014-10-20 11:07:04', '2014-10-20 11:07:04', NULL, NULL, 0, 'CUS-01-10000011', 'TAG-01-10000027', 'CGRU-01-10000027', '1', 1),
(7, '2014-10-28 12:44:28', '2014-10-28 12:44:28', NULL, NULL, 0, 'CUS-01-10000014', NULL, NULL, '1', 1),
(5, '2014-10-24 05:11:48', '2014-10-24 05:11:48', NULL, NULL, 0, 'CUS-01-10000017', 'TAG-01-10000033', 'CGRU-01-10000033', '1', 1),
(6, '2014-10-27 02:23:44', '2014-10-27 02:23:44', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', '2', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cus_salespeople`
--

INSERT INTO `cus_salespeople` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `salespeople_id`, `status`) VALUES
(8, '2014-10-29 11:42:05', '2014-10-29 11:42:05', NULL, NULL, 0, 'CUS-01-10000005', NULL, NULL, '1', 1),
(2, '2014-10-20 11:02:51', '2014-10-20 11:02:51', NULL, NULL, 0, 'CUS-01-10000008', 'TAG-01-10000024', 'CGRU-01-10000024', '2', 1),
(3, '2014-10-20 11:07:04', '2014-10-20 11:07:04', NULL, NULL, 0, 'CUS-01-10000011', 'TAG-01-10000027', 'CGRU-01-10000027', '1', 1),
(7, '2014-10-28 12:44:28', '2014-10-28 12:44:28', NULL, NULL, 0, 'CUS-01-10000014', NULL, NULL, '1', 1),
(5, '2014-10-24 05:11:48', '2014-10-24 05:11:48', NULL, NULL, 0, 'CUS-01-10000017', 'TAG-01-10000033', 'CGRU-01-10000033', '1', 1),
(6, '2014-10-27 02:23:44', '2014-10-27 02:23:44', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', '2', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `datalogs`
--

INSERT INTO `datalogs` (`id`, `logname`, `logid`, `logactivity`, `user_id`, `created`, `modified`, `viewed`, `viewed_by`) VALUES
(1, 'Quotation', 'BQS-01-10000596', 'Add', '1', '2014-11-05 11:47:15', '2014-11-05 11:47:15', 0, NULL),
(2, 'Salesorder', '1', 'Add', '1', '2014-11-05 11:48:29', '2014-11-05 11:48:29', 0, NULL),
(3, 'Deliveryorder', 'BDO-01-10000158', 'Add', '1', '2014-11-06 04:37:16', '2014-11-06 04:37:16', 0, NULL),
(4, 'Salesorder', 'BSO-01-10000385', 'Add', '1', '2014-11-06 09:31:59', '2014-11-06 09:31:59', 0, NULL),
(5, 'Quotation', 'BSQ-01-10000385', 'Add', '1', '2014-11-06 09:32:00', '2014-11-06 09:32:00', 0, NULL),
(6, 'Quotation', 'BQS-01-10000598', 'Add', '1', '2014-11-07 05:57:36', '2014-11-07 05:57:36', 0, NULL),
(7, 'Deliveryorder', 'BDO-01-10000177', 'Add', '1', '2014-11-10 06:44:38', '2014-11-10 06:44:38', 0, NULL),
(8, 'Salesorder', '3', 'Add', '1', '2014-11-10 10:31:26', '2014-11-10 10:31:26', 0, NULL),
(9, 'Deliveryorder', 'BDO-01-10000179', 'Add', '1', '2014-11-10 10:33:00', '2014-11-10 10:33:00', 0, NULL),
(10, 'ClientPO', 'BQS-01-10000598', 'Add', '1', '2014-11-10 10:33:00', '2014-11-10 10:33:00', 0, NULL),
(11, 'Quotation', 'BQS-01-10000600', 'Add', '1', '2014-11-10 11:31:00', '2014-11-10 11:31:00', 0, NULL),
(12, 'Salesorder', '4', 'Add', '1', '2014-11-10 11:31:35', '2014-11-10 11:31:35', 0, NULL),
(13, 'Deliveryorder', 'BDO-01-10000180', 'Add', '1', '2014-11-10 11:32:15', '2014-11-10 11:32:15', 0, NULL),
(14, 'Invoice', 'BIN-01-10000004', 'Created', '1', '2014-11-10 11:36:36', '2014-11-10 11:36:36', 0, NULL),
(15, 'Deliveryorder', 'BDO-01-10000181', 'Add', '1', '2014-11-10 12:43:51', '2014-11-10 12:43:51', 0, NULL),
(16, 'Quotation', 'BQS-01-10000602', 'Add', '1', '2014-11-10 12:47:40', '2014-11-10 12:47:40', 0, NULL),
(17, 'Salesorder', '5', 'Add', '1', '2014-11-10 12:48:16', '2014-11-10 12:48:16', 0, NULL),
(18, 'Quotation', 'BQS-01-10000604', 'Add', '1', '2014-11-10 12:58:05', '2014-11-10 12:58:05', 0, NULL),
(19, 'Salesorder', '6', 'Add', '1', '2014-11-10 12:59:04', '2014-11-10 12:59:04', 0, NULL),
(20, 'Deliveryorder', 'BDO-01-10000182', 'Add', '1', '2014-11-10 12:59:49', '2014-11-10 12:59:49', 0, NULL),
(21, 'ClientPO', 'BQS-01-10000604', 'Add', '1', '2014-11-10 12:59:49', '2014-11-10 12:59:49', 0, NULL),
(22, 'Quotation', 'BQS-01-10000606', 'Add', '1', '2014-11-10 13:12:11', '2014-11-10 13:12:11', 0, NULL),
(23, 'Salesorder', '7', 'Add', '1', '2014-11-10 13:13:08', '2014-11-10 13:13:08', 0, NULL),
(24, 'Deliveryorder', 'BDO-01-10000183', 'Add', '1', '2014-11-10 13:13:47', '2014-11-10 13:13:47', 0, NULL),
(25, 'Deliveryorder', '7', 'Approve', '1', '2014-11-10 13:33:36', '2014-11-10 13:33:36', 0, NULL),
(26, 'Quotation', 'BQS-01-10000608', 'Add', '1', '2014-11-10 14:49:35', '2014-11-10 14:49:35', 0, NULL);

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
  `ref_count` int(11) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `is_approved_date` date DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `deliveryorders`
--

INSERT INTO `deliveryorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `branch_id`, `track_id`, `delivery_address`, `customer_address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `delivery_order_no`, `salesorder_id`, `quotationno`, `delivery_order_date`, `our_reference_no`, `po_reference_no`, `ref_no`, `ref_count`, `remarks`, `service_id`, `is_approved`, `is_approved_date`, `instrument_type_id`, `del_description_count`, `status`, `ready_to_deliver`, `move_to_deliver`, `assign_to`, `is_invoice_created`, `is_invoice_approved`, `po_generate_type`, `is_assignpo`, `is_poapproved`, `po_approval_date`, `is_pocount_satisfied`, `is_deleted`, `job_finished`, `is_jobcompleted`) VALUES
(1, '2014-11-05 11:48:29', '2014-11-05 11:48:29', 1, NULL, 0, 'CUS-01-10000005', 1, 'BSTRA-01-10000915', NULL, '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', 'BDO-01-10000158', 'BSO-01-10000373', 'BQS-01-10000596', '06-Nov-14', 'BSTRA-01-10000915', 'CPO-01-10000065', 'PO-01-10000065', 6, '', 1, 0, NULL, 0, 6, 1, NULL, 0, NULL, 0, 0, 'Manual', 1, 1, '-19', NULL, 0, '0', 0),
(2, '2014-11-06 09:31:59', '2014-11-06 09:31:59', NULL, NULL, 0, 'CUS-01-10000014', 1, 'BSTRA-01-10000929', 'address', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 'BDO-01-10000177', 'BSO-01-10000385', 'BSQ-01-10000385', '10-Nov-14', 'BSTRA-01-10000929', 'CPO-01-10000067', 'CPO-01-10000067', 0, 'rem-salesorder', 2, 0, NULL, 1, 4, 1, NULL, 0, NULL, 0, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0),
(3, '2014-11-10 10:33:00', '2014-11-10 10:33:00', NULL, NULL, 0, 'CUS-01-10000014', 1, 'BSTRA-01-10000931', '39 Changi North Street\r\nSingapore 389402', '39 Changi North Street\r\nSingapore 389402', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 'BDO-01-10000179', 'BSO-01-10000387', 'BQS-01-10000598', '10-November-14', 'BSTRA-01-10000931', 'CPO-01-10000068', 'CPO-01-10000068', 0, '', 1, 0, NULL, 1, 3, 1, NULL, 0, NULL, 0, 0, 'Automatic', 0, 0, NULL, 0, 0, '0', 0),
(4, '2014-11-10 11:31:34', '2014-11-10 11:31:34', 1, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000936', '41 Senoko Drive\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000180', 'BSO-01-10000389', 'BQS-01-10000600', '10-Nov-14', 'BSTRA-01-10000936', 'CPO-01-10000069', 'CPO-01-10000069', NULL, '', 1, 1, '0000-00-00', 0, 3, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0),
(5, '2014-11-10 10:31:26', '2014-11-10 10:31:26', 1, NULL, 0, 'CUS-01-10000014', 1, 'BSTRA-01-10000931', 'address', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 'BDO-01-10000181', 'BSO-01-10000387', 'BQS-01-10000598', '10-Nov-14', 'BSTRA-01-10000931', 'CPO-01-10000068', 'CPO-01-10000068', NULL, '', 1, 0, NULL, 0, 2, 1, NULL, 0, NULL, 0, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0),
(6, '2014-11-10 12:59:04', '2014-11-10 12:59:04', 1, NULL, 0, 'CUS-01-10000014', 1, 'BSTRA-01-10000940', 'address', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 'BDO-01-10000182', 'BSO-01-10000393', 'BQS-01-10000604', '10-Nov-14', 'BSTRA-01-10000940', 'CPO-01-10000071', 'CPO-01-10000071', NULL, '', 1, 0, NULL, 0, 2, 1, NULL, 0, NULL, 0, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0),
(7, '2014-11-10 13:13:08', '2014-11-10 13:13:08', 1, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000943', '41 Senoko Drive\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000183', 'BSO-01-10000395', 'BQS-01-10000606', '10-Nov-14', 'BSTRA-01-10000943', 'CPO-01-10000072', 'CPO-01-10000072', NULL, '', 1, 1, '0000-00-00', 0, 3, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0);

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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
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
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `del_descriptions`
--

INSERT INTO `del_descriptions` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `deliveryorder_id`, `salesorder_id`, `quotation_id`, `quotationno`, `customer_id`, `delivery_quantity`, `instrument_id`, `model_no`, `brand_id`, `delivery_range`, `delivery_calllocation`, `delivery_calltype`, `delivery_validity`, `delivery_unitprice`, `delivery_discount`, `department_id`, `delivery_accountservice`, `delivery_titles`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `delivery_total`, `status`, `ready_to_deliver`, `is_deleted`) VALUES
(1, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 0, '1', 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, NULL, 'RT334', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', 1, 0, 0),
(2, '2014-11-06 04:37:16', '2014-11-06 13:22:01', NULL, NULL, 0, '1', 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, NULL, 'SDFS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', 1, 0, 0),
(3, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 0, '1', 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', 1, 0, 0),
(4, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 0, '1', 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', 1, 0, 0),
(5, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 0, '1', 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', 1, 0, 0),
(6, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 0, '1', 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', 1, 0, 0),
(7, '2014-11-10 06:44:37', '2014-11-10 06:44:37', NULL, NULL, 0, '2', 'BSO-01-10000385', 2, 'BSQ-01-10000385', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(8, '2014-11-10 06:44:37', '2014-11-10 06:44:37', NULL, NULL, 0, '2', 'BSO-01-10000385', 2, 'BSQ-01-10000385', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(9, '2014-11-10 06:44:37', '2014-11-10 06:44:37', NULL, NULL, 0, '2', 'BSO-01-10000385', 2, 'BSQ-01-10000385', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(10, '2014-11-10 06:44:37', '2014-11-10 06:44:37', NULL, NULL, 0, '2', 'BSO-01-10000385', 2, 'BSQ-01-10000385', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(11, '2014-11-10 10:33:00', '2014-11-10 10:33:00', NULL, NULL, 0, '3', 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(12, '2014-11-10 10:33:00', '2014-11-10 10:33:00', NULL, NULL, 0, '3', 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(13, '2014-11-10 10:33:00', '2014-11-10 10:33:00', NULL, NULL, 0, '3', 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(14, '2014-11-10 11:32:14', '2014-11-10 11:32:14', NULL, NULL, 0, '4', 'BSO-01-10000389', 4, 'BQS-01-10000600', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(15, '2014-11-10 11:32:15', '2014-11-10 11:32:15', NULL, NULL, 0, '4', 'BSO-01-10000389', 4, 'BQS-01-10000600', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(16, '2014-11-10 11:32:15', '2014-11-10 11:32:15', NULL, NULL, 0, '4', 'BSO-01-10000389', 4, 'BQS-01-10000600', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(17, '2014-11-10 12:43:51', '2014-11-10 12:43:51', NULL, NULL, 0, '5', 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(18, '2014-11-10 12:43:51', '2014-11-10 12:43:51', NULL, NULL, 0, '5', 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(19, '2014-11-10 12:59:49', '2014-11-10 12:59:49', NULL, NULL, 0, '6', 'BSO-01-10000393', 6, 'BQS-01-10000604', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(20, '2014-11-10 12:59:49', '2014-11-10 12:59:49', NULL, NULL, 0, '6', 'BSO-01-10000393', 6, 'BQS-01-10000604', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 0),
(21, '2014-11-10 13:13:47', '2014-11-10 13:13:47', NULL, NULL, 0, '7', 'BSO-01-10000395', 7, 'BQS-01-10000606', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(22, '2014-11-10 13:13:47', '2014-11-10 13:13:47', NULL, NULL, 0, '7', 'BSO-01-10000395', 7, 'BQS-01-10000606', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(23, '2014-11-10 13:13:47', '2014-11-10 13:13:47', NULL, NULL, 0, '7', 'BSO-01-10000395', 7, 'BQS-01-10000606', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `departmentname`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 05:43:12', '2014-10-20 05:43:12', NULL, NULL, 0, 'Electrical', '', 1, 0),
(2, '2014-10-20 05:43:24', '2014-10-20 05:43:24', NULL, NULL, 0, 'Temperature', '', 1, 0),
(3, '2014-10-20 05:43:36', '2014-10-20 05:43:36', NULL, NULL, 0, 'Dimension', '', 1, 0),
(4, '2014-10-20 05:43:49', '2014-10-20 05:43:49', NULL, NULL, 0, 'Mechanical', '', 1, 0),
(5, '2014-10-20 05:44:23', '2014-10-20 05:44:23', NULL, NULL, 0, 'Miscellaneous', '', 1, 0),
(6, '2014-10-24 05:47:11', '2014-10-24 05:47:11', NULL, NULL, 0, 'Pressure', '-', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `industryname`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 08:04:09', '2014-10-20 08:04:09', NULL, NULL, 0, 'AEROSPACE', '', 1, 0),
(2, '2014-10-20 08:04:18', '2014-10-20 08:04:18', NULL, NULL, 0, 'MARINE', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE IF NOT EXISTS `instruments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
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
  `ins_date` date DEFAULT NULL,
  `is_approved` varchar(20) NOT NULL DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `name`, `description`, `branch_id`, `department_id`, `status`, `instrument_brand_count`, `instrument_procedure_count`, `instrument_range_count`, `ins_date`, `is_approved`, `is_deleted`) VALUES
(1, '2014-10-20 12:04:32', '2014-10-20 12:04:32', NULL, NULL, 0, 'Temperature Sensor', '', NULL, 2, 1, 1, 1, 1, '2014-10-20', '1', 0),
(2, '2014-10-20 12:05:23', '2014-10-20 12:05:23', NULL, NULL, 0, 'Temperature Gauge', '', NULL, 2, 1, 1, 1, 1, '2014-10-20', '1', 0),
(3, '2014-10-24 05:51:12', '2014-10-24 05:52:57', NULL, NULL, 0, 'temperature gauge', '-', NULL, 2, 1, 1, 1, 1, '2014-10-24', '1', 0),
(4, '2014-10-24 05:53:32', '2014-10-24 05:54:18', NULL, NULL, 0, 'pressure gauge', '', NULL, 6, 1, 1, 1, 1, '2014-10-24', '1', 0),
(5, '2014-10-24 06:00:27', '2014-10-24 06:00:53', NULL, NULL, 0, 'insulation tester', '', NULL, 1, 1, 1, 1, 1, '2014-10-24', '1', 0),
(6, '2014-10-29 15:41:32', '2014-10-29 15:41:32', NULL, NULL, 0, 'Temperature Sensor', 'sdsd', NULL, 1, 1, 1, 1, 2, '2014-10-29', '0', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `instrument_brands`
--

INSERT INTO `instrument_brands` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `brand_id`) VALUES
(1, '2014-10-20 12:04:32', '2014-10-20 12:04:32', NULL, NULL, 0, 1, 1),
(2, '2014-10-20 12:05:23', '2014-10-20 12:05:23', NULL, NULL, 0, 2, 2),
(5, '2014-10-24 05:52:57', '2014-10-24 05:52:57', NULL, NULL, 0, 3, 4),
(7, '2014-10-24 05:54:18', '2014-10-24 05:54:18', NULL, NULL, 0, 4, 2),
(9, '2014-10-24 06:00:53', '2014-10-24 06:00:53', NULL, NULL, 0, 5, 4),
(10, '2014-10-29 15:41:32', '2014-10-29 15:41:32', NULL, NULL, 0, 6, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `instrument_procedures`
--

INSERT INTO `instrument_procedures` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `procedure_id`) VALUES
(1, '2014-10-20 12:04:32', '2014-10-20 12:04:32', NULL, NULL, 0, 1, 1),
(2, '2014-10-20 12:05:23', '2014-10-20 12:05:23', NULL, NULL, 0, 2, 1),
(5, '2014-10-24 05:52:57', '2014-10-24 05:52:57', NULL, NULL, 0, 3, 1),
(7, '2014-10-24 05:54:18', '2014-10-24 05:54:18', NULL, NULL, 0, 4, 3),
(9, '2014-10-24 06:00:53', '2014-10-24 06:00:53', NULL, NULL, 0, 5, 4),
(10, '2014-10-29 15:41:32', '2014-10-29 15:41:32', NULL, NULL, 0, 6, 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `instrument_ranges`
--

INSERT INTO `instrument_ranges` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `range_id`) VALUES
(1, '2014-10-20 12:04:32', '2014-10-20 12:04:32', NULL, NULL, 0, 1, 2),
(2, '2014-10-20 12:05:23', '2014-10-20 12:05:23', NULL, NULL, 0, 2, 1),
(5, '2014-10-24 05:52:57', '2014-10-24 05:52:57', NULL, NULL, 0, 3, 2),
(7, '2014-10-24 05:54:18', '2014-10-24 05:54:18', NULL, NULL, 0, 4, 3),
(9, '2014-10-24 06:00:53', '2014-10-24 06:00:53', NULL, NULL, 0, 5, 5),
(10, '2014-10-29 15:41:32', '2014-10-29 15:41:32', NULL, NULL, 0, 6, 2),
(11, '2014-10-29 15:41:32', '2014-10-29 15:41:32', NULL, NULL, 0, 6, 4);

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
(1, '2014-10-20 11:56:22', '2014-10-20 11:56:22', NULL, NULL, NULL, 'Calibration', '', 'WE ARE PLEASED TO QUOTE THE ITEM(S) BELOW FOR CALIBRATION SERVICE WITH CERTIFICATE(S): ', 'WE ARE PLEASED TO INFORM THE ITEM(S) BELOW FOR CALIBRATION SERVICE WITH CERTIFICATE(S): ', 'WE ARE PLEASED TO INFORM THE ITEM(S) BELOW FOR CALIBRATION SERVICE WITH CERTIFICATE(S): ', 'WE ARE PLEASED TO INFORM THE ITEM(S) BELOW FOR CALIBRATION SERVICE WITH CERTIFICATE(S): ', 'WE ARE PLEASED TO INFORM THE ITEM(S) BELOW FOR CALIBRATION SERVICE WITH CERTIFICATE(S): ', 'WE ARE PLEASED TO INFORM THE ITEM(S) BELOW FOR CALIBRATION SERVICE WITH CERTIFICATE(S): ', 'WE ARE PLEASED TO INFORM THE ITEM(S) BELOW FOR CALIBRATION SERVICE WITH CERTIFICATE(S): ', 'WE ARE PLEASED TO INFORM THE ITEM(S) BELOW FOR CALIBRATION SERVICE WITH CERTIFICATE(S): ', '-', '-', 1, 1, 0);

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
  `invoice_date` int(11) DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `quotation_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
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
  `track_id` varchar(200) DEFAULT NULL,
  `ourrefno` varchar(200) DEFAULT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `acknowledgement_type_id` int(11) DEFAULT NULL,
  `instrument_type_id` varchar(20) DEFAULT NULL,
  `salesperson_id` varchar(20) DEFAULT NULL,
  `gst` varchar(22) DEFAULT NULL,
  `currency_id` varchar(22) DEFAULT NULL,
  `remarks` text,
  `service_type` varchar(20) DEFAULT NULL,
  `currencyconversionrate` varchar(20) DEFAULT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `prepare_invoice_id`, `created`, `modified`, `created_by`, `modified_by`, `invoiceno`, `branch_id`, `invoice_date`, `deliveryorder_id`, `quotation_id`, `customer_id`, `customername`, `regaddress`, `contactperson_id`, `contactpersonname`, `phone`, `fax`, `email`, `due_amount`, `totalprice`, `jobstatus_id`, `paymentterms_id`, `track_id`, `ourrefno`, `ref_no`, `acknowledgement_type_id`, `instrument_type_id`, `salesperson_id`, `gst`, `currency_id`, `remarks`, `service_type`, `currencyconversionrate`, `discount`, `salesorder_id`, `po_generate_type`, `is_assign_po`, `is_approved`, `is_poapproved`, `po_approval_date`, `approved_date`, `status`, `view`, `is_deleted`) VALUES
(1, NULL, '2014-11-10 11:36:36', '2014-11-10 11:36:36', NULL, NULL, 'BIN-01-10000004', 1, NULL, 'BDO-01-10000180', '1', 'CUS-01-10000005', 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive,\r\nSingapore 758 249.', 2, 'Mohan', 6666, '6458 4401', 'erick@abc.com', NULL, 0, NULL, '2', 'BSTRA-01-10000915', 'BQS-01-10000596', NULL, 1, '1', '1', '7', '1', '', NULL, '1', '', 'BSO-01-10000389', 'Manual', 1, '0', 0, NULL, NULL, '1', NULL, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `labprocesses`
--

INSERT INTO `labprocesses` (`id`, `created`, `modified`, `created_by`, `modified_by`, `salesorder_id`, `description_id`, `status`) VALUES
(1, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 'BSO-01-10000373', '1', 1),
(2, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 'BSO-01-10000373', '2', 1),
(3, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 'BSO-01-10000373', '3', 1),
(4, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 'BSO-01-10000373', '4', 1),
(5, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 'BSO-01-10000373', '5', 1),
(6, '2014-11-06 04:37:16', '2014-11-06 04:37:16', NULL, NULL, 'BSO-01-10000373', '6', 1),
(7, '2014-11-10 06:44:38', '2014-11-10 06:44:38', NULL, NULL, 'BSO-01-10000385', '7', 1),
(8, '2014-11-10 06:44:38', '2014-11-10 06:44:38', NULL, NULL, 'BSO-01-10000385', '8', 1),
(9, '2014-11-10 06:44:38', '2014-11-10 06:44:38', NULL, NULL, 'BSO-01-10000385', '9', 1),
(10, '2014-11-10 06:44:38', '2014-11-10 06:44:38', NULL, NULL, 'BSO-01-10000385', '10', 1),
(11, '2014-11-10 11:32:15', '2014-11-10 11:32:15', NULL, NULL, 'BSO-01-10000389', '16', 1),
(12, '2014-11-10 11:32:15', '2014-11-10 11:32:15', NULL, NULL, 'BSO-01-10000389', '17', 1),
(13, '2014-11-10 11:32:15', '2014-11-10 11:32:15', NULL, NULL, 'BSO-01-10000389', '18', 1),
(14, '2014-11-10 12:43:51', '2014-11-10 12:43:51', NULL, NULL, 'BSO-01-10000387', '11', 1),
(15, '2014-11-10 12:43:51', '2014-11-10 12:43:51', NULL, NULL, 'BSO-01-10000387', '12', 1),
(16, '2014-11-10 12:43:51', '2014-11-10 12:43:51', NULL, NULL, 'BSO-01-10000387', '13', 1),
(17, '2014-11-10 12:43:51', '2014-11-10 12:43:51', NULL, NULL, 'BSO-01-10000387', '14', 1),
(18, '2014-11-10 12:43:51', '2014-11-10 12:43:51', NULL, NULL, 'BSO-01-10000387', '15', 1),
(19, '2014-11-10 12:59:49', '2014-11-10 12:59:49', NULL, NULL, 'BSO-01-10000393', '23', 1),
(20, '2014-11-10 12:59:49', '2014-11-10 12:59:49', NULL, NULL, 'BSO-01-10000393', '24', 1),
(21, '2014-11-10 13:13:47', '2014-11-10 13:13:47', NULL, NULL, 'BSO-01-10000395', '27', 1),
(22, '2014-11-10 13:13:47', '2014-11-10 13:13:47', NULL, NULL, 'BSO-01-10000395', '28', 1),
(23, '2014-11-10 13:13:47', '2014-11-10 13:13:47', NULL, NULL, 'BSO-01-10000395', '29', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `locationname`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 08:03:36', '2014-10-20 08:03:36', NULL, NULL, 0, 'EAST', '', 1, 0),
(2, '2014-10-20 08:03:47', '2014-10-20 08:03:47', NULL, NULL, 0, 'WEST', '', 1, 0);

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
  `loglink` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `logapprove` int(11) DEFAULT '0',
  `approved_by` varchar(200) DEFAULT NULL,
  `logtime` datetime DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `logactivities`
--

INSERT INTO `logactivities` (`id`, `logname`, `logactivity`, `logid`, `logno`, `loglink`, `user_id`, `logapprove`, `approved_by`, `logtime`, `created`) VALUES
(1, 'Quotation', 'Add Quotation', '1', 'BQS-01-10000596', NULL, '1', 2, '1', NULL, '2014-11-05'),
(2, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000373', '', NULL, NULL, 2, '1', NULL, '2014-11-05'),
(3, 'Deliveryorder', 'Add Delivery Order', '1', 'BDO-01-10000158', NULL, '1', 1, NULL, NULL, '2014-11-06'),
(4, 'ClientPO', 'Add', 'BQS-01-10000596', '', NULL, '1', 2, '1', NULL, '2014-11-06'),
(5, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000385', 'BSO-01-10000385', NULL, '1', 2, '1', NULL, '2014-11-06'),
(6, 'Quotation', 'Add Quotation', '2', 'BSQ-01-10000385', NULL, '1', 2, '1', NULL, '2014-11-06'),
(7, 'Quotation', 'Add Quotation', '3', 'BQS-01-10000598', NULL, '1', 2, '1', NULL, '2014-11-07'),
(8, 'Deliveryorder', 'Add Delivery Order', '2', 'BDO-01-10000177', NULL, '1', 1, NULL, NULL, '2014-11-10'),
(9, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000387', '', NULL, NULL, 2, '1', NULL, '2014-11-10'),
(10, 'Deliveryorder', 'Add DeliveryOrder', '3', 'BDO-01-10000179', NULL, '1', 1, NULL, NULL, '2014-11-10'),
(12, 'Quotation', 'Add Quotation', '4', 'BQS-01-10000600', NULL, '1', 2, '1', NULL, '2014-11-10'),
(13, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000389', '', NULL, NULL, 2, '1', NULL, '2014-11-10'),
(14, 'Labprocess', 'Add Labprocess', '4', 'BDO-01-10000180', NULL, '1', 2, NULL, NULL, '2014-11-10'),
(15, 'Deliveryorder', 'Add Delivery Order', '4', 'BDO-01-10000180', NULL, '1', 2, '1', NULL, '2014-11-10'),
(16, 'Labprocess', 'Add Labprocess', '5', 'BDO-01-10000181', NULL, '1', 2, NULL, NULL, '2014-11-10'),
(17, 'Deliveryorder', 'Add Delivery Order', '5', 'BDO-01-10000181', NULL, '1', 1, NULL, NULL, '2014-11-10'),
(18, 'Quotation', 'Add Quotation', '5', 'BQS-01-10000602', NULL, '1', 2, '1', NULL, '2014-11-10'),
(19, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000391', '', NULL, NULL, 2, '1', NULL, '2014-11-10'),
(20, 'Quotation', 'Add Quotation', '6', 'BQS-01-10000604', NULL, '1', 2, '1', NULL, '2014-11-10'),
(21, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000393', '', NULL, NULL, 2, '1', NULL, '2014-11-10'),
(22, 'Labprocess', 'Add Labprocess', '6', 'BDO-01-10000182', NULL, '1', 2, NULL, NULL, '2014-11-10'),
(23, 'Deliveryorder', 'Add Delivery Order', '6', 'BDO-01-10000182', NULL, '1', 1, NULL, NULL, '2014-11-10'),
(24, 'ClientPO', 'Add', 'BQS-01-10000604', 'BDO-01-10000182', NULL, '1', 1, NULL, NULL, '2014-11-10'),
(25, 'Quotation', 'Add Quotation', '7', 'BQS-01-10000606', NULL, '1', 2, '1', NULL, '2014-11-10'),
(26, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000395', '', NULL, NULL, 2, '1', NULL, '2014-11-10'),
(27, 'Labprocess', 'Add Labprocess', '7', 'BDO-01-10000183', NULL, '1', 2, NULL, NULL, '2014-11-10'),
(28, 'Deliveryorder', 'Add Delivery Order', '7', 'BDO-01-10000183', NULL, '1', 2, '1', NULL, '2014-11-10'),
(29, 'Quotation', 'Add Quotation', '8', 'BQS-01-10000608', NULL, '1', 1, NULL, NULL, '2014-11-10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `paymentterms`
--

INSERT INTO `paymentterms` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `paymentterm`, `paymenttype`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 08:00:37', '2014-10-20 08:00:37', NULL, NULL, 0, 'COD', 'days', '', 1, 0),
(2, '2014-10-20 08:00:49', '2014-10-20 08:00:49', NULL, NULL, 0, '14', 'days', '', 1, 0),
(3, '2014-10-20 08:00:57', '2014-10-20 08:00:57', NULL, NULL, 0, '30', 'days', '', 1, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `title` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `is_approved` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, '2014-10-20 07:59:06', '2014-10-20 07:59:06', NULL, NULL, 0, 'Normal', '', 4, 1, 1, 0),
(2, '2014-10-20 07:59:49', '2014-10-20 07:59:49', NULL, NULL, 0, 'Platinum', '', 2, 1.5, 1, 0),
(3, '2014-10-20 08:00:08', '2014-10-20 08:00:08', NULL, NULL, 0, 'Express', '', 1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE IF NOT EXISTS `procedures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
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
(1, NULL, NULL, 0, '2014-10-20 11:59:36', '2014-10-20 11:59:36', 2, 'BST-T-01', '', 1, 1, 0),
(2, NULL, NULL, 0, '2014-10-20 11:59:59', '2014-10-20 11:59:59', 2, 'BST-T-02', '', 1, 1, 0),
(3, NULL, NULL, 0, '2014-10-24 05:48:25', '2014-10-24 05:49:31', 6, 'ps-866', '', 1, 1, 0),
(4, NULL, NULL, 0, '2014-10-24 05:59:39', '2014-10-24 05:59:39', 1, 'bse-545', '-', 1, 1, 0);

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
  `branch_id` int(11) DEFAULT NULL,
  `purchaseorder_no` varchar(200) DEFAULT NULL,
  `customer_address` text,
  `due_amount` float DEFAULT NULL,
  `attn` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `fax` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `payment_terms` varchar(200) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `purchaseorder_date` varchar(200) DEFAULT NULL,
  `your_ref_no` varchar(200) DEFAULT NULL,
  `our_ref_no` varchar(200) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `track_id`, `quotationno`, `customer_id`, `branch_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `paymentterm_id`, `reg_date`, `ref_no`, `ref_count`, `po_generate_type`, `discount`, `priority`, `instrument_type_id`, `is_approved`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorder_created`, `is_deliveryorder_created`, `is_delivery_approved`, `is_invoice_created`, `is_invoice_approved`, `quo_device_count`, `is_jobcompleted`, `total_device_rate`, `is_assign_po`, `po_approval_date`, `is_poapproved`, `is_pocount_satisfied`, `is_deleted`) VALUES
(1, 'BSTRA-01-10000915', 'BQS-01-10000596', 'CUS-01-10000005', 1, 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', 2, '05-November-14', 'PO-01-10000065', '6', 'Manual', '', '1', '1', 1, 1, '2014-11-05 11:47:15', '2014-11-05 11:47:15', 11, NULL, 0, 1, 1, 0, 1, 0, NULL, 0, NULL, 1, '-19', 1, 0, 0),
(2, 'BSTRA-01-10000929', 'BSQ-01-10000385', 'CUS-01-10000014', 1, 'Goodrich Aerospace Pte Ltd ( Quality ) ', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', NULL, '06-November-14', 'CPO-01-10000067', '0', 'Automatic', NULL, '1', '1', 1, 1, '2014-11-06 09:31:59', '2014-11-06 09:31:59', NULL, NULL, 0, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0),
(3, 'BSTRA-01-10000931', 'BQS-01-10000598', 'CUS-01-10000014', 1, 'Goodrich Aerospace Pte Ltd ( Quality ) ', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 3, '07-November-14', 'CPO-01-10000068', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-07 05:57:36', '2014-11-07 05:57:36', 11, NULL, 0, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(4, 'BSTRA-01-10000936', 'BQS-01-10000600', 'CUS-01-10000008', 1, 'ABC PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 2, '10-November-14', 'CPO-01-10000069', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-10 11:30:59', '2014-11-10 11:30:59', 11, NULL, 0, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(5, 'BSTRA-01-10000938', 'BQS-01-10000602', 'CUS-01-10000014', 1, 'Goodrich Aerospace Pte Ltd ( Quality ) ', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 3, '10-November-14', 'CPO-01-10000070', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-10 12:47:40', '2014-11-10 12:47:40', 11, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(6, 'BSTRA-01-10000940', 'BQS-01-10000604', 'CUS-01-10000014', 1, 'Goodrich Aerospace Pte Ltd ( Quality ) ', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 3, '10-November-14', 'CPO-01-10000071', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-10 12:58:05', '2014-11-10 12:58:05', 11, NULL, 0, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(7, 'BSTRA-01-10000943', 'BQS-01-10000606', 'CUS-01-10000008', 1, 'ABC PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 2, '10-November-14', 'CPO-01-10000072', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-10 13:12:11', '2014-11-10 13:12:11', 11, NULL, 0, 1, 1, 1, 1, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(8, 'BSTRA-01-10000945', 'BQS-01-10000608', 'CUS-01-10000005', 1, 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', 2, '10-November-14', 'CPO-01-10000073', '0', 'Automatic', '', '1', '1', 0, 1, '2014-11-10 14:49:35', '2014-11-10 14:49:35', 11, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `quo_customerspecialneeds`
--

INSERT INTO `quo_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `salespeople_id`, `salesperson_name`, `projectname`, `gsttype`, `gst`, `currency_id`, `currency_value`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(1, '2014-11-05 11:47:15', '2014-11-05 11:47:15', NULL, NULL, 0, '1', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(2, '2014-11-06 09:31:59', '2014-11-06 09:31:59', NULL, NULL, 0, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rem-salesorder', 2),
(3, '2014-11-07 05:57:36', '2014-11-07 05:57:36', NULL, NULL, 0, '3', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(4, '2014-11-10 11:31:00', '2014-11-10 11:31:00', NULL, NULL, 0, '4', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(5, '2014-11-10 12:47:40', '2014-11-10 12:47:40', NULL, NULL, 0, '5', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(6, '2014-11-10 12:58:05', '2014-11-10 12:58:05', NULL, NULL, 0, '6', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(7, '2014-11-10 13:12:11', '2014-11-10 13:12:11', NULL, NULL, 0, '7', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(8, '2014-11-10 14:49:35', '2014-11-10 14:49:35', NULL, NULL, 0, '8', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quo_devices`
--

CREATE TABLE IF NOT EXISTS `quo_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `quotation_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `quo_devices`
--

INSERT INTO `quo_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `customer_id`, `instrument_id`, `quotationno`, `brand_id`, `quantity`, `model_no`, `range`, `call_location`, `call_type`, `validity`, `unit_price`, `discount`, `department_id`, `account_service`, `total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-11-05 11:46:42', '2014-11-05 11:46:42', NULL, NULL, 0, '1', 'CUS-01-10000005', '1', 'BQS-01-10000596', 1, '3', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(2, '2014-11-05 11:46:42', '2014-11-05 11:46:42', NULL, NULL, 0, '1', 'CUS-01-10000005', '1', 'BQS-01-10000596', 1, '3', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(3, '2014-11-05 11:46:42', '2014-11-05 11:46:42', NULL, NULL, 0, '1', 'CUS-01-10000005', '1', 'BQS-01-10000596', 1, '3', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(4, '2014-11-05 11:47:12', '2014-11-05 11:47:12', NULL, NULL, 0, '1', 'CUS-01-10000005', '2', 'BQS-01-10000596', 2, '3', 'T21', '1', 'Inlab', 'Singlas', 12, '80', '', '2', 'calibration service', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(5, '2014-11-05 11:47:12', '2014-11-05 11:47:12', NULL, NULL, 0, '1', 'CUS-01-10000005', '2', 'BQS-01-10000596', 2, '3', 'T21', '1', 'Inlab', 'Singlas', 12, '80', '', '2', 'calibration service', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(6, '2014-11-05 11:47:12', '2014-11-05 11:47:12', NULL, NULL, 0, '1', 'CUS-01-10000005', '2', 'BQS-01-10000596', 2, '3', 'T21', '1', 'Inlab', 'Singlas', 12, '80', '', '2', 'calibration service', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(7, '2014-11-06 09:31:59', '2014-11-06 09:31:59', NULL, NULL, 0, '2', 'CUS-01-10000014', '4', 'BSQ-01-10000385', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, 'PART NO 213123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(8, '2014-11-06 09:31:59', '2014-11-06 09:31:59', NULL, NULL, 0, '2', 'CUS-01-10000014', '4', 'BSQ-01-10000385', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, 'Bengaluru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(9, '2014-11-06 09:31:59', '2014-11-06 09:31:59', NULL, NULL, 0, '2', 'CUS-01-10000014', '4', 'BSQ-01-10000385', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(10, '2014-11-06 09:31:59', '2014-11-06 09:31:59', NULL, NULL, 0, '2', 'CUS-01-10000014', '4', 'BSQ-01-10000385', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(11, '2014-11-07 05:57:34', '2014-11-07 05:57:34', NULL, NULL, 0, '3', 'CUS-01-10000014', '4', 'BQS-01-10000598', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(12, '2014-11-07 05:57:34', '2014-11-07 05:57:34', NULL, NULL, 0, '3', 'CUS-01-10000014', '4', 'BQS-01-10000598', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(13, '2014-11-07 05:57:34', '2014-11-07 05:57:34', NULL, NULL, 0, '3', 'CUS-01-10000014', '4', 'BQS-01-10000598', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(14, '2014-11-07 05:57:34', '2014-11-07 05:57:34', NULL, NULL, 0, '3', 'CUS-01-10000014', '4', 'BQS-01-10000598', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(15, '2014-11-07 05:57:34', '2014-11-07 05:57:34', NULL, NULL, 0, '3', 'CUS-01-10000014', '4', 'BQS-01-10000598', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(16, '2014-11-10 11:30:55', '2014-11-10 11:30:55', NULL, NULL, 0, '4', 'CUS-01-10000008', '1', 'BQS-01-10000600', 1, '3', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(17, '2014-11-10 11:30:55', '2014-11-10 11:30:55', NULL, NULL, 0, '4', 'CUS-01-10000008', '1', 'BQS-01-10000600', 1, '3', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(18, '2014-11-10 11:30:55', '2014-11-10 11:30:55', NULL, NULL, 0, '4', 'CUS-01-10000008', '1', 'BQS-01-10000600', 1, '3', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(19, '2014-11-10 12:47:38', '2014-11-10 12:47:38', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000602', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(20, '2014-11-10 12:47:38', '2014-11-10 12:47:38', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000602', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(21, '2014-11-10 12:47:38', '2014-11-10 12:47:38', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000602', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(22, '2014-11-10 12:47:38', '2014-11-10 12:47:38', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000602', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(23, '2014-11-10 12:58:03', '2014-11-10 12:58:03', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000604', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(24, '2014-11-10 12:58:03', '2014-11-10 12:58:03', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000604', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(25, '2014-11-10 12:58:03', '2014-11-10 12:58:03', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000604', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(26, '2014-11-10 12:58:03', '2014-11-10 12:58:03', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000604', 2, '4', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(27, '2014-11-10 13:12:09', '2014-11-10 13:12:09', NULL, NULL, 0, '7', 'CUS-01-10000008', '1', 'BQS-01-10000606', 1, '3', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(28, '2014-11-10 13:12:09', '2014-11-10 13:12:09', NULL, NULL, 0, '7', 'CUS-01-10000008', '1', 'BQS-01-10000606', 1, '3', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(29, '2014-11-10 13:12:09', '2014-11-10 13:12:09', NULL, NULL, 0, '7', 'CUS-01-10000008', '1', 'BQS-01-10000606', 1, '3', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(30, '2014-11-10 14:49:33', '2014-11-10 14:49:33', NULL, NULL, 0, '8', 'CUS-01-10000005', '1', 'BQS-01-10000608', 1, '2', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(31, '2014-11-10 14:49:33', '2014-11-10 14:49:33', NULL, NULL, 0, '8', 'CUS-01-10000005', '1', 'BQS-01-10000608', 1, '2', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0);

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
  `customer` varchar(200) NOT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `group` varchar(200) DEFAULT NULL,
  `instrument` varchar(200) NOT NULL,
  `quotation` varchar(200) NOT NULL,
  `salesorder` varchar(200) NOT NULL,
  `deliveryorder` varchar(200) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `clientpo` varchar(200) DEFAULT NULL,
  `proforma` varchar(200) DEFAULT NULL,
  `track` varchar(200) DEFAULT NULL,
  `PurchasRequisition` varchar(200) DEFAULT NULL,
  `pr_purchaseorder` varchar(200) DEFAULT NULL,
  `onsites` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer` (`customer`),
  UNIQUE KEY `quotation` (`quotation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `randoms`
--

INSERT INTO `randoms` (`id`, `customer`, `tag`, `group`, `instrument`, `quotation`, `salesorder`, `deliveryorder`, `invoice`, `clientpo`, `proforma`, `track`, `PurchasRequisition`, `pr_purchaseorder`, `onsites`) VALUES
(1, 'BIN-01-10000004', 'TAG-01-10000044', 'CGRU-01-10000040', 'BIT-01-10000001', 'BQS-01-10000609', 'BSO-01-10000396', 'BDO-01-10000183', 'BIN-01-10000003', 'CPO-01-10000073', 'BPI-01-10000030', 'BSTRA-01-10000946', 'BRF-01-10000015', 'BPO-01-10000002', 'OSS-01-10000005');

-- --------------------------------------------------------

--
-- Table structure for table `ranges`
--

CREATE TABLE IF NOT EXISTS `ranges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `created_by`, `modified_by`, `view`, `created`, `modified`, `from_range`, `to_range`, `range_name`, `unit_id`, `range_description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, NULL, NULL, 0, '2014-10-20 11:46:00', '2014-10-20 11:46:00', '0', '100', '(0~100)/DegC', '1', '', 1, 1, 0),
(2, NULL, NULL, 0, '2014-10-20 11:46:20', '2014-10-20 11:46:20', '0', '200', '(0~200)/DegC', '1', '', 1, 1, 0),
(3, NULL, NULL, 0, '2014-10-24 05:34:01', '2014-10-24 05:39:40', '0', '3', '(0~3)/psi', '3', '-', 1, 1, 0),
(4, NULL, NULL, 0, '2014-10-24 05:34:34', '2014-10-24 05:40:24', '3', '-', '(3~-)/DegC', '1', '-', 1, 1, 0),
(5, NULL, NULL, 0, '2014-10-24 05:55:47', '2014-10-24 05:56:05', 'multirange', '-', '(multirange~-)/-', '5', '-', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `readytodeliver_items`
--

CREATE TABLE IF NOT EXISTS `readytodeliver_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `referedbies`
--

INSERT INTO `referedbies` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `referedby`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-09-08 11:06:56', '2014-10-20 06:16:16', NULL, NULL, 0, 'BS TECH', '-', 1, 0),
(2, '2014-10-20 06:16:26', '2014-10-20 06:16:26', NULL, NULL, 0, 'NORA', '', 1, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `title` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `is_approved` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `ref_count` int(11) DEFAULT NULL,
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
  `is_approved` varchar(10) DEFAULT NULL,
  `is_approved_lab` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) DEFAULT '0',
  `is_deliveryorder_created` int(11) DEFAULT '0',
  `is_delivery_approved` int(11) NOT NULL DEFAULT '0',
  `is_invoice_created` int(11) DEFAULT '0',
  `is_invoice_approved` int(11) NOT NULL DEFAULT '0',
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorders`
--

INSERT INTO `salesorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorderno`, `track_id`, `branch_id`, `quotation_id`, `quotationno`, `customer_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `reg_date`, `ref_no`, `ref_count`, `our_ref_no`, `in_date`, `due_date`, `priority`, `instrument_type_id`, `remarks`, `service_id`, `sal_description_count`, `po_generate_type`, `is_assign_po`, `is_poapproved`, `po_approval_date`, `is_pocount_satisfied`, `is_approved`, `is_approved_lab`, `status`, `is_deleted`, `is_deliveryorder_created`, `is_delivery_approved`, `is_invoice_created`, `is_invoice_approved`, `is_jobcompleted`) VALUES
('BSO-01-10000373', '2014-11-05 11:48:29', '2014-11-05 11:48:29', 1, NULL, 0, 'BSO-01-10000373', 'BSTRA-01-10000915', 1, '1', 'BQS-01-10000596', 'CUS-01-10000005', NULL, '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', '05-November-14', 'CPO-01-10000065', NULL, NULL, '05-November-14', '09-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 0, 0, 0, 0),
('BSO-01-10000385', '2014-11-06 09:31:59', '2014-11-06 09:31:59', NULL, NULL, 0, 'BSO-01-10000385', 'BSTRA-01-10000929', 1, '2', 'BSQ-01-10000385', 'CUS-01-10000014', 'Goodrich Aerospace Pte Ltd ( Quality ) ', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', '06-November-14', 'CPO-01-10000067', 0, NULL, '06-November-14', '10-November-14', '1', 1, 'rem-salesorder', 2, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 0, 0, 0, 0),
('BSO-01-10000387', '2014-11-10 10:31:26', '2014-11-10 10:31:26', 1, NULL, 0, 'BSO-01-10000387', 'BSTRA-01-10000931', 1, '3', 'BQS-01-10000598', 'CUS-01-10000014', NULL, '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', '10-November-14', 'CPO-01-10000068', NULL, NULL, '10-November-14', '14-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 0, 0, 0, 0),
('BSO-01-10000389', '2014-11-10 11:31:34', '2014-11-10 11:31:34', 1, NULL, 0, 'BSO-01-10000389', 'BSTRA-01-10000936', 1, '4', 'BQS-01-10000600', 'CUS-01-10000008', NULL, '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', '10-November-14', 'CPO-01-10000069', NULL, NULL, '10-November-14', '14-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 0, 0, 0, 0),
('BSO-01-10000391', '2014-11-10 12:48:16', '2014-11-10 12:48:16', 1, NULL, 0, 'BSO-01-10000391', 'BSTRA-01-10000938', 1, '5', 'BQS-01-10000602', 'CUS-01-10000014', NULL, '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', '10-November-14', 'CPO-01-10000070', NULL, NULL, '10-November-14', '14-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-01-10000393', '2014-11-10 12:59:04', '2014-11-10 12:59:04', 1, NULL, 0, 'BSO-01-10000393', 'BSTRA-01-10000940', 1, '6', 'BQS-01-10000604', 'CUS-01-10000014', NULL, '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', '10-November-14', 'CPO-01-10000071', NULL, NULL, '10-November-14', '14-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 0, 0, 0, 0),
('BSO-01-10000395', '2014-11-10 13:13:08', '2014-11-10 13:13:08', 1, NULL, 0, 'BSO-01-10000395', 'BSTRA-01-10000943', 1, '7', 'BQS-01-10000606', 'CUS-01-10000008', NULL, '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', '10-November-14', 'CPO-01-10000072', NULL, NULL, '10-November-14', '14-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `salespeople`
--

INSERT INTO `salespeople` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesperson`, `salespersoncode`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 06:15:36', '2014-10-20 06:15:36', NULL, NULL, 0, 'BS TECH', 'BST', '', 1, 0),
(2, '2014-10-20 06:16:00', '2014-10-20 06:16:00', NULL, NULL, 0, 'NORA', 'BST-N', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sal_description`
--

CREATE TABLE IF NOT EXISTS `sal_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `quo_ins_id` int(11) DEFAULT NULL,
  `salesorder_id` varchar(200) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `sal_description`
--

INSERT INTO `sal_description` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quo_ins_id`, `salesorder_id`, `quotation_id`, `quotationno`, `customer_id`, `sales_quantity`, `instrument_id`, `model_no`, `brand_id`, `sales_range`, `sales_calllocation`, `sales_calltype`, `sales_validity`, `sales_unitprice`, `sales_discount`, `department_id`, `sales_accountservice`, `sales_titles`, `sales_total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `pending`, `processing`, `checking`, `shipping`, `is_deliveryorder_created`, `ready_deliver`, `is_delivered`, `assign_to`, `status`, `is_approved`, `delay`, `is_approved_lab`, `is_deleted`) VALUES
(1, '2014-11-05 11:48:12', '2014-11-06 04:37:16', NULL, NULL, 0, NULL, 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(2, '2014-11-05 11:48:12', '2014-11-06 13:17:48', NULL, NULL, 0, NULL, 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, '150', NULL, 'sdfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(3, '2014-11-05 11:48:12', '2014-11-06 04:37:16', NULL, NULL, 0, NULL, 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(4, '2014-11-05 11:48:12', '2014-11-06 04:37:16', NULL, NULL, 0, NULL, 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(5, '2014-11-05 11:48:12', '2014-11-06 04:37:16', NULL, NULL, 0, NULL, 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(6, '2014-11-05 11:48:12', '2014-11-06 04:37:16', NULL, NULL, 0, NULL, 'BSO-01-10000373', 1, 'BQS-01-10000596', 'CUS-01-10000005', '3', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(7, '2014-11-06 09:31:32', '2014-11-10 06:44:37', NULL, NULL, 0, NULL, 'BSO-01-10000385', 2, 'BSQ-01-10000385', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, 'PART NO 213123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(8, '2014-11-06 09:31:32', '2014-11-10 06:44:37', NULL, NULL, 0, NULL, 'BSO-01-10000385', 2, 'BSQ-01-10000385', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, 'Bengaluru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(9, '2014-11-06 09:31:32', '2014-11-10 06:44:37', NULL, NULL, 0, NULL, 'BSO-01-10000385', 2, 'BSQ-01-10000385', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(10, '2014-11-06 09:31:32', '2014-11-10 06:44:37', NULL, NULL, 0, NULL, 'BSO-01-10000385', 2, 'BSQ-01-10000385', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(11, '2014-11-10 10:31:20', '2014-11-10 12:43:51', NULL, NULL, 0, NULL, 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(12, '2014-11-10 10:31:20', '2014-11-10 12:43:51', NULL, NULL, 0, NULL, 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(13, '2014-11-10 10:31:20', '2014-11-10 12:43:51', NULL, NULL, 0, NULL, 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(14, '2014-11-10 10:31:20', '2014-11-10 12:43:51', NULL, NULL, 0, NULL, 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(15, '2014-11-10 10:31:20', '2014-11-10 12:43:51', NULL, NULL, 0, NULL, 'BSO-01-10000387', 3, 'BQS-01-10000598', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(16, '2014-11-10 11:31:27', '2014-11-10 11:32:14', NULL, NULL, 0, NULL, 'BSO-01-10000389', 4, 'BQS-01-10000600', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(17, '2014-11-10 11:31:27', '2014-11-10 11:32:14', NULL, NULL, 0, NULL, 'BSO-01-10000389', 4, 'BQS-01-10000600', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(18, '2014-11-10 11:31:27', '2014-11-10 11:32:14', NULL, NULL, 0, NULL, 'BSO-01-10000389', 4, 'BQS-01-10000600', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(19, '2014-11-10 12:48:08', '2014-11-10 12:48:48', NULL, NULL, 0, NULL, 'BSO-01-10000391', 5, 'BQS-01-10000602', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(20, '2014-11-10 12:48:08', '2014-11-10 12:48:48', NULL, NULL, 0, NULL, 'BSO-01-10000391', 5, 'BQS-01-10000602', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(21, '2014-11-10 12:48:08', '2014-11-10 12:48:48', NULL, NULL, 0, NULL, 'BSO-01-10000391', 5, 'BQS-01-10000602', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(22, '2014-11-10 12:48:08', '2014-11-10 12:48:48', NULL, NULL, 0, NULL, 'BSO-01-10000391', 5, 'BQS-01-10000602', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(23, '2014-11-10 12:58:50', '2014-11-10 12:59:48', NULL, NULL, 0, NULL, 'BSO-01-10000393', 6, 'BQS-01-10000604', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(24, '2014-11-10 12:58:50', '2014-11-10 12:59:48', NULL, NULL, 0, NULL, 'BSO-01-10000393', 6, 'BQS-01-10000604', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(25, '2014-11-10 12:58:50', '2014-11-10 12:58:50', NULL, NULL, 0, NULL, 'BSO-01-10000393', 6, 'BQS-01-10000604', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 1),
(26, '2014-11-10 12:58:50', '2014-11-10 12:58:50', NULL, NULL, 0, NULL, 'BSO-01-10000393', 6, 'BQS-01-10000604', 'CUS-01-10000014', '4', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 1),
(27, '2014-11-10 13:12:40', '2014-11-10 13:13:47', NULL, NULL, 0, NULL, 'BSO-01-10000395', 7, 'BQS-01-10000606', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(28, '2014-11-10 13:12:40', '2014-11-10 13:13:47', NULL, NULL, 0, NULL, 'BSO-01-10000395', 7, 'BQS-01-10000606', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(29, '2014-11-10 13:12:40', '2014-11-10 13:13:47', NULL, NULL, 0, NULL, 'BSO-01-10000395', 7, 'BQS-01-10000606', 'CUS-01-10000008', '3', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `servicetype`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-09-08 10:49:03', '2014-10-20 06:00:47', NULL, NULL, 0, 'Repair Service', '-', 1, 0),
(2, '2014-10-20 06:00:21', '2014-10-20 06:00:21', NULL, NULL, 0, 'Calibration Service', '', 1, 0);

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
  `subcontract_name` varchar(200) DEFAULT NULL,
  `subcontract_address` varchar(200) DEFAULT NULL,
  `subcontract_date` varchar(200) DEFAULT NULL,
  `subcontract_duedate` varchar(200) DEFAULT NULL,
  `subcontract_salesperson` varchar(200) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `subcontract_attn` varchar(200) DEFAULT NULL,
  `subcontract_phone` varchar(200) DEFAULT NULL,
  `subcontract_fax` varchar(200) DEFAULT NULL,
  `subcontract_email` varchar(200) DEFAULT NULL,
  `subcontract_ref_no` varchar(200) DEFAULT NULL,
  `subcontract_track_id` varchar(200) DEFAULT NULL,
  `subcontract_remarks` varchar(200) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tallyledgers`
--

INSERT INTO `tallyledgers` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `tallyledgeraccount`, `status`, `is_deleted`) VALUES
(1, '2014-09-08 10:49:46', '2014-09-08 10:49:46', NULL, NULL, 0, 'TALLY1234567890', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `title_name` varchar(200) DEFAULT NULL,
  `title_description` text,
  `status` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `title_name`, `title_description`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 11:21:02', '2014-10-20 11:21:02', NULL, NULL, NULL, 'PART NO.', '', 1, 0),
(2, '2014-10-20 11:21:19', '2014-10-20 11:21:19', NULL, NULL, NULL, 'LOCATION', '', 1, 0),
(3, '2014-10-27 03:02:09', '2014-10-27 03:02:23', NULL, NULL, NULL, 'SERIAL NO.', '', 1, 0),
(4, '2014-10-27 03:02:43', '2014-10-27 03:02:43', NULL, NULL, NULL, 'REMARKS', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `unit_name`, `unit_description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-10-20 11:19:05', '2014-10-20 11:19:05', NULL, NULL, 0, 'DegC', 'DegC', 1, 1, 0),
(2, '2014-10-20 11:19:15', '2014-10-20 11:19:15', NULL, NULL, 0, 'F', 'F', 1, 1, 0),
(3, '2014-10-24 05:31:19', '2014-10-24 05:32:25', NULL, NULL, 0, 'psi', '-', 1, 1, 0),
(4, '2014-10-24 05:31:35', '2014-10-24 05:32:36', NULL, NULL, 0, 'bar', '-', 1, 1, 0),
(5, '2014-10-24 05:31:46', '2014-10-24 05:36:45', NULL, NULL, 0, '-', '-', 1, 1, 0),
(6, '2014-10-24 05:32:02', '2014-10-24 05:37:08', NULL, NULL, 0, 'psi / bar', '-', 1, 1, 0),
(7, '2014-10-24 05:35:37', '2014-10-24 05:37:24', NULL, NULL, 0, '---', '-', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `user_role_id`, `user_role`, `description`, `js_enc`, `other_branch`, `other_department`, `other_role`, `other_user`, `other_currency`, `other_assignedto`, `other_servicetype`, `other_additional`, `other_tallyledger`, `other_country`, `cus_industry`, `cus_location`, `cus_customer`, `cus_paymentterms`, `cus_priority`, `cus_referredby`, `cus_salesperson`, `cus_title`, `ins_procedureno`, `ins_brand`, `ins_instrument`, `ins_instrumentforgroup`, `ins_range`, `ins_title`, `ins_unit`, `set_candd`, `set_onsiteemail`, `set_recallservice`, `dim_instrument`, `tem_instrument`, `tem_ambient`, `tem_other`, `tem_range`, `tem_relativehumidity`, `tem_uncertainity`, `tem_readingtype`, `tem_channel`, `tem_formdatas`, `tem_template`, `tem_instrumentval`, `tem_unitconversion`, `tem_unit`, `pre_instrument`, `pre_ambient`, `pre_other`, `pre_range`, `pre_relativehumidity`, `pre_statementname`, `pre_statement1`, `pre_statement2`, `pre_vaccumsensor`, `pre_uncertainitydata`, `pre_formdatas`, `elec_instrument`, `elec_ambient`, `elec_location`, `elec_other`, `elec_range`, `elec_relative`, `elec_signal`, `elec_unit`, `elec_reference`, `elec_dcv`, `elec_acc`, `elec_acv`, `elec_capacitance`, `elec_dcc`, `elec_freq`, `elec_inductance`, `elec_resis1`, `elec_resis2`, `elec_formdatas`, `job_quotation`, `job_salesorder`, `job_deliveryorder`, `job_transaction`, `job_labprocess`, `job_purchaseorder`, `job_proforma`, `job_subcontract`, `job_candd`, `job_invoice`, `job_tracking`, `job_debt`, `job_onsite`, `job_recall`, `job_jobmonitor`, `job_purchasereq`, `job_prpurchaseorder`, `temp_dashboard`, `sales_contacts`, `sales_leads`, `sales_task`, `sales_campaign`, `rep_individualsales`, `rep_salesdetails`, `rep_performance`, `rep_quotedamount`, `rep_quotationreport`, `rep_fulldetails`, `rep_annualsales`, `rep_labinvolve`, `rep_quotedandsales`, `rep_dailywork`, `data_quotation`, `data_salesorder`, `data_deliveryorder`, `data_invoice`, `data_purchaseorder`, `data_proforma`, `data_subcontract`, `data_candd`, `data_recall`, `data_querywindow`, `dash_debt`, `dash_labprocess`, `dash_jobsum`, `app_customer`, `app_quotation`, `app_salesorder`, `app_deliveryorder1`, `app_deliveryorder2`, `app_invoice`, `app_procedureno`, `app_brand`, `app_instrument`, `app_instrumentgroup`, `app_range`, `app_unit`, `app_ready`, `app_prsupervisor`, `app_prmanager`, `temp_engineer`, `temp_supervisor`, `temp_manager`, `mis_editjob`, `mis_customerins`, `mis_inlabitems`, `mis_subcontract`, `mis_insite`, `status`, `is_deleted`) VALUES
(1, NULL, NULL, NULL, NULL, 0, 1, 'SuperAdmin', '', 'a:66:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(2, NULL, NULL, NULL, NULL, 0, 2, 'Admin', '', 'a:64:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(12, '2014-09-08 10:33:44', '2014-09-08 10:33:44', NULL, NULL, 0, 3, 'Tech Manager', 'Tech Manager', 'a:66:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"0";}s:11:"dash_number";a:1:{s:4:"view";s:1:"0";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"0";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"0";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"0";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"0";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(13, '2014-10-20 05:46:20', '2014-10-20 05:46:20', NULL, NULL, 0, 4, 'Operation Manager', '', 'a:66:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userrole_id`, `firstname`, `lastname`, `emailid`, `created`, `modified`, `created_by`, `modified_by`, `view`, `status`, `is_deleted`) VALUES
(1, 'admin', 'admin@123', 1, 'Admin', 'BackEnd', 'admin@bs.com', '2014-04-23 09:24:32', '2014-10-20 05:45:46', 0, 0, 0, 1, 0),
(2, 'krishnan', 'krish11', 2, 'Bala', 'Krishnan', 'krishnan@bestandards.com', '2014-10-20 05:32:39', '2014-10-20 05:45:34', NULL, NULL, 0, 1, 0),
(3, 'sharifah', 'sharifah11', 13, 'sharifah', 'BS', 'sharifah@bestandards.com', '2014-10-20 05:53:40', '2014-10-20 05:53:40', NULL, NULL, 0, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(15, '2014-10-20 05:53:40', '2014-10-20 05:53:40', 3, 1, 1),
(16, '2014-10-20 05:53:40', '2014-10-20 05:53:40', 3, 2, 1),
(17, '2014-10-20 05:53:40', '2014-10-20 05:53:40', 3, 3, 1),
(18, '2014-10-20 05:53:40', '2014-10-20 05:53:40', 3, 4, 1),
(19, '2014-10-20 05:53:40', '2014-10-20 05:53:40', 3, 5, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
