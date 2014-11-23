-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2014 at 11:32 PM
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
('CUS-01-10000011', '2014-10-20 11:07:04', '2014-11-18 10:22:39', NULL, NULL, 0, 'CGRU-01-10000027', 'TAG-01-10000027', NULL, 'TUAS', 'ABC PTE LTD', '256245', '6363 2512', '6352 5214', 2, 1, 'Customer', '-', '', 1, '1', 'Singlas', '1', '2', NULL, 3, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000014', '2014-10-24 05:06:20', '2014-10-28 12:44:28', NULL, NULL, 0, 'CGRU-01-10000030', 'TAG-01-10000030', NULL, 'Quality', 'Goodrich Aerospace Pte Ltd', '-', '67856967', '68754356', 1, 1, 'Customer', '-', '', 3, '1', 'Singlas', '1', '2', NULL, 1, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000017', '2014-10-24 05:11:48', '2014-11-18 10:50:59', NULL, NULL, 0, 'CGRU-01-10000033', 'TAG-01-10000033', NULL, 'Mechanical', 'Goodrich Aerospace Pte Ltd', '567890', '6545709', '', 1, 1, 'Customer', '-', '', 2, '1', 'Singlas', '1', '2', NULL, 2, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000020', '2014-10-27 02:23:44', '2014-10-27 02:23:44', NULL, NULL, 0, 'CGRU-01-10000024', 'TAG-01-10000036', NULL, 'NORA', 'ABC PTE LTD', '758249', '64584411', '64584400', 2, 1, 'Customer', '-', '', 2, '1', 'Singlas', '3', '1', NULL, 1, NULL, NULL, 0, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000022', '2014-11-19 11:03:59', '2014-11-19 11:03:59', NULL, NULL, 0, 'CGRU-01-10000036', 'TAG-01-10000039', NULL, '', '', '', '', '', NULL, NULL, '', '', '', NULL, '1', '', '', '', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000023', '2014-11-19 13:59:37', '2014-11-19 13:59:37', NULL, NULL, 0, 'CGRU-01-10000037', 'TAG-01-10000040', NULL, '', '', '', '', '', NULL, NULL, '', '', '', NULL, '1', '', '', '', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000024', '2014-11-19 14:02:31', '2014-11-19 14:02:31', NULL, NULL, 0, 'CGRU-01-10000038', 'TAG-01-10000041', NULL, '', '', '', '', '', NULL, NULL, '', '', '', NULL, '1', '', '', '', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000025', '2014-11-19 14:02:39', '2014-11-19 14:02:39', NULL, NULL, 0, 'CGRU-01-10000039', 'TAG-01-10000042', NULL, '', '', '', '', '', NULL, NULL, '', '', '', NULL, '1', '', '', '', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000026', '2014-11-19 14:03:36', '2014-11-19 14:03:36', NULL, NULL, 0, 'CGRU-01-10000040', 'TAG-01-10000043', NULL, '', '', '', '', '', NULL, NULL, '', '', '', NULL, '1', '', '', '', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000027', '2014-11-19 14:31:00', '2014-11-19 14:31:00', NULL, NULL, 0, 'CGRU-01-10000041', 'TAG-01-10000044', NULL, 'asdasd', 'adsad', '324', 'sad', '', 1, 1, 'Customer', 'dsf', 'fsd', 2, '1', 'Singlas', '1', '1', NULL, 1, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000028', '2014-11-19 14:32:19', '2014-11-19 14:32:19', NULL, NULL, 0, 'CGRU-01-10000042', 'TAG-01-10000045', NULL, 'asd', 'asd', '435345345', '43435435', '435435345', 1, 1, 'Customer', 'sdf', 'ds', 1, '1', 'Singlas', '1', '1', NULL, 1, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000029', '2014-11-19 14:41:36', '2014-11-19 14:41:36', NULL, NULL, 0, 'CGRU-01-10000043', 'TAG-01-10000046', NULL, 'asd', 'asd', 'asd', 'asd', '', 1, 1, 'Sub-Contractor', 'sad', 'asd', 1, '1', 'Singlas', '2', '', NULL, 1, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000030', '2014-11-19 14:44:36', '2014-11-19 14:44:36', NULL, NULL, 0, 'CGRU-01-10000044', 'TAG-01-10000047', NULL, 'dfg', 'dfg', '546', '54646', '46', 1, 1, 'Sub-Contractor', 'dfg', 'dfg', 1, '2', 'Singlas', '1', '2', NULL, 2, NULL, NULL, 1, 0, NULL, NULL, 0, 1),
('CUS-01-10000031', '2014-11-19 15:24:22', '2014-11-19 15:24:22', NULL, NULL, 0, 'CGRU-01-10000045', 'TAG-01-10000048', NULL, 'ads', 'Arun Prasaath', '4354353', '345345435', '435435345345', 1, 1, 'Customer', 'dfg', 'fdg', 1, '1', 'Singlas', '1', '1', NULL, 1, NULL, NULL, 1, 0, NULL, NULL, 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(10, '2014-11-10 11:30:01', '2014-11-10 11:30:01', NULL, NULL, 0, 'CUS-01-10000008', 1, NULL, 'aa', '2', '34', 1, 0),
(11, '2014-11-18 10:23:34', '2014-11-18 10:23:34', NULL, NULL, 0, 'CUS-01-10000011', 5, NULL, 'TEST - 1212', '5', '32', 1, 0),
(12, '2014-11-18 10:24:01', '2014-11-18 10:24:01', NULL, NULL, 0, 'CUS-01-10000011', 4, NULL, 'ABD - #23', '3', '98', 1, 0),
(13, '2014-11-18 10:24:37', '2014-11-18 10:24:37', NULL, NULL, 0, 'CUS-01-10000017', 5, NULL, 'POOODSS', '5', '78', 1, 0),
(14, '2014-11-18 10:25:01', '2014-11-18 10:25:01', NULL, NULL, 0, 'CUS-01-10000017', 1, NULL, 'F944', '2', '45', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

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
(14, '2014-11-10 12:56:46', '2014-11-10 12:56:46', NULL, NULL, 0, 'CUS-01-10000017', 'TAG-01-10000033', NULL, 1102117454, 'fdg', 'delivery', 1, 0),
(15, '2014-10-20 08:06:20', '2014-10-20 08:06:20', NULL, NULL, 0, 'CUS-01-10000005', 'TAG-01-10000021', 'CGRU-01-10000021', 1230507649, '41 Senoko Drive,\r\nSingapore 758 249.', 'delivery', 1, 1),
(16, '2014-10-20 08:06:20', '2014-10-20 08:06:20', NULL, NULL, 0, 'CUS-01-10000005', 'TAG-01-10000021', 'CGRU-01-10000021', 1230507649, '41 Senoko Drive,\r\nSingapore 758 249.', 'delivery', 1, 1),
(18, '2014-11-19 14:04:40', '2014-11-19 14:04:40', NULL, NULL, 0, 'CUS-01-10000027', 'TAG-01-10000044', 'CGRU-01-10000041', 727064746, 'er', 'registered', 1, 0),
(19, '2014-11-19 14:04:43', '2014-11-19 14:04:43', NULL, NULL, 0, 'CUS-01-10000027', 'TAG-01-10000044', 'CGRU-01-10000041', 1596354627, 'wer', 'billing', 1, 0),
(20, '2014-11-19 14:04:45', '2014-11-19 14:04:45', NULL, NULL, 0, 'CUS-01-10000027', 'TAG-01-10000044', 'CGRU-01-10000041', 1110787633, 'wer', 'delivery', 1, 0),
(21, '2014-11-19 14:11:44', '2014-11-19 14:11:44', NULL, NULL, 0, 'CUS-01-10000027', 'TAG-01-10000044', 'CGRU-01-10000041', 713370825, 'asd', 'registered', 1, 0),
(22, '2014-11-19 14:11:46', '2014-11-19 14:11:46', NULL, NULL, 0, 'CUS-01-10000027', 'TAG-01-10000044', 'CGRU-01-10000041', 333066775, 'asd', 'billing', 1, 0),
(23, '2014-11-19 14:11:48', '2014-11-19 14:11:48', NULL, NULL, 0, 'CUS-01-10000027', 'TAG-01-10000044', 'CGRU-01-10000041', 639876652, 'sad', 'delivery', 1, 0),
(24, '2014-11-19 14:31:46', '2014-11-19 14:31:46', NULL, NULL, 0, 'CUS-01-10000028', 'TAG-01-10000045', 'CGRU-01-10000042', 769505121, 'sad', 'registered', 1, 0),
(25, '2014-11-19 14:31:48', '2014-11-19 14:31:48', NULL, NULL, 0, 'CUS-01-10000028', 'TAG-01-10000045', 'CGRU-01-10000042', 1004499869, 'sad', 'billing', 1, 0),
(26, '2014-11-19 14:31:51', '2014-11-19 14:31:51', NULL, NULL, 0, 'CUS-01-10000028', 'TAG-01-10000045', 'CGRU-01-10000042', 1558030391, 'asd', 'delivery', 1, 0),
(27, '2014-11-19 14:39:28', '2014-11-19 14:39:28', NULL, NULL, 0, 'CUS-01-10000029', 'TAG-01-10000046', 'CGRU-01-10000043', 993931869, 'sd', 'registered', 1, 0),
(28, '2014-11-19 14:39:31', '2014-11-19 14:39:31', NULL, NULL, 0, 'CUS-01-10000029', 'TAG-01-10000046', 'CGRU-01-10000043', 1191638801, 'sad', 'billing', 1, 0),
(29, '2014-11-19 14:39:35', '2014-11-19 14:39:35', NULL, NULL, 0, 'CUS-01-10000029', 'TAG-01-10000046', 'CGRU-01-10000043', 1567284736, 'sad', 'delivery', 1, 0),
(30, '2014-11-19 14:44:08', '2014-11-19 14:44:08', NULL, NULL, 0, 'CUS-01-10000030', 'TAG-01-10000047', 'CGRU-01-10000044', 731726032, 'dgf', 'registered', 1, 0),
(31, '2014-11-19 14:44:10', '2014-11-19 14:44:10', NULL, NULL, 0, 'CUS-01-10000030', 'TAG-01-10000047', 'CGRU-01-10000044', 1063559804, 'dfg', 'billing', 1, 0),
(32, '2014-11-19 14:44:12', '2014-11-19 14:44:12', NULL, NULL, 0, 'CUS-01-10000030', 'TAG-01-10000047', 'CGRU-01-10000044', 1485602044, 'dfg', 'delivery', 1, 0),
(33, '2014-11-19 15:23:44', '2014-11-19 15:23:44', NULL, NULL, 0, 'CUS-01-10000031', 'TAG-01-10000048', 'CGRU-01-10000045', 1823037238, 'asd', 'registered', 1, 0),
(34, '2014-11-19 15:23:46', '2014-11-19 15:23:46', NULL, NULL, 0, 'CUS-01-10000031', 'TAG-01-10000048', 'CGRU-01-10000045', 941700480, 'sad', 'billing', 1, 0),
(35, '2014-11-19 15:23:50', '2014-11-19 15:23:50', NULL, NULL, 0, 'CUS-01-10000031', 'TAG-01-10000048', 'CGRU-01-10000045', 1745327707, 'sad', 'delivery', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

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
(7, '2014-10-24 05:11:45', '2014-11-18 10:50:56', NULL, NULL, 0, 'CUS-01-10000017', 'TAG-01-10000033', 'CGRU-01-10000033', '98514117', 'kirana@goog.com', '', 'ms kirana', '', '', '', '', '', 1, 0),
(8, '2014-10-27 02:23:41', '2014-10-27 02:23:41', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', NULL, 'karna@bs.sg', '', 'Karna', '', '98546547', '', '', '', 1, 0),
(16, '2014-11-19 11:52:23', '2014-11-19 11:54:52', NULL, NULL, 0, 'CUS-01-10000023', 'TAG-01-10000040', 'CGRU-01-10000037', '17892697', 'asdasd@asds.com', '', 'aaaasd', '', '', '', '', '', 1, 0),
(38, '2014-11-19 13:56:41', '2014-11-19 13:56:41', NULL, NULL, 0, 'CUS-01-10000023', 'TAG-01-10000040', 'CGRU-01-10000037', '97309504', 'asd@gmail.com', '', 'AS', '', '', '', '', '', 1, 0),
(39, '2014-11-19 13:59:33', '2014-11-19 13:59:33', NULL, NULL, 0, 'CUS-01-10000023', 'TAG-01-10000040', 'CGRU-01-10000037', '92637929', 'ffdg@sdfs.com', '', 'AS', '', '', '', '', '', 1, 0),
(40, '2014-11-19 14:02:28', '2014-11-19 14:02:28', NULL, NULL, 0, 'CUS-01-10000024', 'TAG-01-10000041', 'CGRU-01-10000038', '25543571', 'asd', '', 'ad', '', '', '', '', '', 1, 0),
(41, '2014-11-19 14:03:33', '2014-11-19 14:03:33', NULL, NULL, 0, 'CUS-01-10000026', 'TAG-01-10000043', 'CGRU-01-10000040', '95833075', 'asd@asd.com', '', 'asd', '', '', '', '', '', 1, 0),
(42, '2014-11-19 15:24:20', '2014-11-19 15:25:28', NULL, NULL, 0, 'CUS-01-10000031', 'TAG-01-10000048', 'CGRU-01-10000045', '04903485', 'asd@sdfsf.com', '', 'asdas', '', '', '', '', '', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cus_referbies`
--

INSERT INTO `cus_referbies` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `referedby_id`, `status`) VALUES
(8, '2014-10-29 11:42:05', '2014-10-29 11:42:05', NULL, NULL, 0, 'CUS-01-10000005', NULL, NULL, '1', 1),
(2, '2014-10-20 11:02:51', '2014-10-20 11:02:51', NULL, NULL, 0, 'CUS-01-10000008', 'TAG-01-10000024', 'CGRU-01-10000024', '2', 1),
(10, '2014-11-18 10:22:39', '2014-11-18 10:22:39', NULL, NULL, 0, 'CUS-01-10000011', NULL, NULL, '1', 1),
(7, '2014-10-28 12:44:28', '2014-10-28 12:44:28', NULL, NULL, 0, 'CUS-01-10000014', NULL, NULL, '1', 1),
(11, '2014-11-18 10:50:59', '2014-11-18 10:50:59', NULL, NULL, 0, 'CUS-01-10000017', NULL, NULL, '1', 1),
(6, '2014-10-27 02:23:44', '2014-10-27 02:23:44', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', '2', 1),
(12, '2014-11-19 14:32:19', '2014-11-19 14:32:19', NULL, NULL, 0, 'CUS-01-10000028', 'TAG-01-10000045', 'CGRU-01-10000042', '2', 1),
(13, '2014-11-19 14:44:36', '2014-11-19 14:44:36', NULL, NULL, 0, 'CUS-01-10000030', 'TAG-01-10000047', 'CGRU-01-10000044', '2', 1),
(14, '2014-11-19 15:24:22', '2014-11-19 15:24:22', NULL, NULL, 0, 'CUS-01-10000031', 'TAG-01-10000048', 'CGRU-01-10000045', '2', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cus_salespeople`
--

INSERT INTO `cus_salespeople` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `salespeople_id`, `status`) VALUES
(8, '2014-10-29 11:42:05', '2014-10-29 11:42:05', NULL, NULL, 0, 'CUS-01-10000005', NULL, NULL, '1', 1),
(2, '2014-10-20 11:02:51', '2014-10-20 11:02:51', NULL, NULL, 0, 'CUS-01-10000008', 'TAG-01-10000024', 'CGRU-01-10000024', '2', 1),
(10, '2014-11-18 10:22:39', '2014-11-18 10:22:39', NULL, NULL, 0, 'CUS-01-10000011', NULL, NULL, '1', 1),
(7, '2014-10-28 12:44:28', '2014-10-28 12:44:28', NULL, NULL, 0, 'CUS-01-10000014', NULL, NULL, '1', 1),
(11, '2014-11-18 10:50:59', '2014-11-18 10:50:59', NULL, NULL, 0, 'CUS-01-10000017', NULL, NULL, '1', 1),
(6, '2014-10-27 02:23:44', '2014-10-27 02:23:44', NULL, NULL, 0, 'CUS-01-10000020', 'TAG-01-10000036', 'CGRU-01-10000024', '2', 1),
(12, '2014-11-19 14:32:19', '2014-11-19 14:32:19', NULL, NULL, 0, 'CUS-01-10000028', 'TAG-01-10000045', 'CGRU-01-10000042', '2', 1),
(13, '2014-11-19 14:44:36', '2014-11-19 14:44:36', NULL, NULL, 0, 'CUS-01-10000030', 'TAG-01-10000047', 'CGRU-01-10000044', '1', 1),
(14, '2014-11-19 15:24:22', '2014-11-19 15:24:22', NULL, NULL, 0, 'CUS-01-10000031', 'TAG-01-10000048', 'CGRU-01-10000045', '1', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `datalogs`
--

INSERT INTO `datalogs` (`id`, `logname`, `logid`, `logactivity`, `user_id`, `created`, `modified`, `viewed`, `viewed_by`) VALUES
(1, 'Quotation', 'BQS-01-10000025', 'Add', '1', '2014-11-21 09:55:48', '2014-11-21 09:55:48', 0, NULL),
(2, 'Quotation', 'BQS-01-10000025', 'Add', '1', '2014-11-21 10:01:34', '2014-11-21 10:01:34', 0, NULL),
(3, 'Quotation', 'BQS-01-10000026', 'Add', '1', '2014-11-21 10:13:15', '2014-11-21 10:13:15', 0, NULL),
(4, 'Quotation', 'BQS-01-10000027', 'Add', '1', '2014-11-21 10:19:08', '2014-11-21 10:19:08', 0, NULL),
(5, 'Quotation', 'BQS-01-10000028', 'Add', '1', '2014-11-21 10:20:28', '2014-11-21 10:20:28', 0, NULL),
(6, 'Quotation', 'BQS-01-10000029', 'Add', '1', '2014-11-21 10:30:45', '2014-11-21 10:30:45', 0, NULL),
(7, 'Quotation', 'BQS-01-10000030', 'Add', '1', '2014-11-21 10:32:04', '2014-11-21 10:32:04', 0, NULL),
(8, 'Quotation', 'BQS-01-10000031', 'Add', '1', '2014-11-21 10:33:47', '2014-11-21 10:33:47', 0, NULL),
(9, 'Quotation', 'BQS-01-10000032', 'Add', '1', '2014-11-21 10:35:15', '2014-11-21 10:35:15', 0, NULL),
(10, 'Quotation', 'BQS-01-10000033', 'Add', '1', '2014-11-21 10:38:44', '2014-11-21 10:38:44', 0, NULL),
(11, 'Quotation', 'BQS-01-10000034', 'Add', '1', '2014-11-21 10:40:01', '2014-11-21 10:40:01', 0, NULL),
(12, 'Salesorder', '1', 'Add', '1', '2014-11-21 10:40:44', '2014-11-21 10:40:44', 0, NULL),
(13, 'Salesorder', '2', 'Add', '1', '2014-11-21 10:41:02', '2014-11-21 10:41:02', 0, NULL),
(14, 'Salesorder', '3', 'Add', '1', '2014-11-21 10:41:16', '2014-11-21 10:41:16', 0, NULL),
(15, 'Salesorder', '4', 'Add', '1', '2014-11-21 10:41:35', '2014-11-21 10:41:35', 0, NULL),
(16, 'Salesorder', '5', 'Add', '1', '2014-11-21 10:41:50', '2014-11-21 10:41:50', 0, NULL),
(17, 'Salesorder', '6', 'Add', '1', '2014-11-21 10:42:06', '2014-11-21 10:42:06', 0, NULL),
(18, 'Salesorder', '7', 'Add', '1', '2014-11-21 10:42:19', '2014-11-21 10:42:19', 0, NULL),
(19, 'Salesorder', '8', 'Add', '1', '2014-11-21 10:42:33', '2014-11-21 10:42:33', 0, NULL),
(20, 'Salesorder', '9', 'Add', '1', '2014-11-21 10:42:46', '2014-11-21 10:42:46', 0, NULL),
(21, 'Salesorder', '10', 'Add', '1', '2014-11-21 10:42:58', '2014-11-21 10:42:58', 0, NULL),
(22, 'Deliveryorder', 'BDO-01-10000055', 'Add', '1', '2014-11-21 11:09:54', '2014-11-21 11:09:54', 0, NULL),
(23, 'Deliveryorder', 'BDO-01-10000056', 'Add', '1', '2014-11-22 09:40:52', '2014-11-22 09:40:52', 0, NULL),
(24, 'ClientPO', 'BQS-01-10000025', 'Add', '1', '2014-11-22 09:40:52', '2014-11-22 09:40:52', 0, NULL),
(25, 'ClientPO', 'BQS-01-10000025', 'Approve', '1', '2014-11-22 10:39:01', '2014-11-22 10:39:01', 0, NULL),
(26, 'Deliveryorder', 'BDO-01-10000057', 'Add', '1', '2014-11-22 11:06:13', '2014-11-22 11:06:13', 0, NULL),
(27, 'Deliveryorder', 'BDO-01-10000058', 'Add', '1', '2014-11-22 12:42:05', '2014-11-22 12:42:05', 0, NULL),
(28, 'Deliveryorder', '1', 'Approve', '1', '2014-11-22 12:42:37', '2014-11-22 12:42:37', 0, NULL),
(29, 'Deliveryorder', '2', 'Approve', '1', '2014-11-22 12:43:07', '2014-11-22 12:43:07', 0, NULL),
(30, 'Invoice', 'BQS-01-10000025', 'Add', '1', '2014-11-22 12:43:07', '2014-11-22 12:43:07', 0, NULL),
(31, 'Deliveryorder', '3', 'Approve', '1', '2014-11-22 12:43:30', '2014-11-22 12:43:30', 0, NULL),
(32, 'Deliveryorder', '4', 'Approve', '1', '2014-11-22 12:44:48', '2014-11-22 12:44:48', 0, NULL),
(33, 'ClientPO', 'BQS-01-10000027', 'Add', '1', '2014-11-22 12:44:48', '2014-11-22 12:44:48', 0, NULL),
(34, 'ClientPO', 'BQS-01-10000027', 'Approve', '1', '2014-11-22 13:24:56', '2014-11-22 13:24:56', 0, NULL),
(35, 'Deliveryorder', 'BDO-01-10000059', 'Add', '1', '2014-11-22 13:36:18', '2014-11-22 13:36:18', 0, NULL),
(36, 'Deliveryorder', '5', 'Approve', '1', '2014-11-22 13:36:37', '2014-11-22 13:36:37', 0, NULL),
(37, 'ClientPO', 'BQS-01-10000028', 'Add', '1', '2014-11-22 13:36:37', '2014-11-22 13:36:37', 0, NULL),
(38, 'Quotation', 'BQS-01-10000035', 'Add', '1', '2014-11-22 13:47:20', '2014-11-22 13:47:20', 0, NULL),
(39, 'Salesorder', '11', 'Add', '1', '2014-11-22 13:47:54', '2014-11-22 13:47:54', 0, NULL),
(40, 'Salesorder', 'BSO-01-10000036', 'Add', '1', '2014-11-22 13:48:21', '2014-11-22 13:48:21', 0, NULL),
(41, 'Deliveryorder', 'BDO-01-10000060', 'Add', '1', '2014-11-22 13:49:28', '2014-11-22 13:49:28', 0, NULL),
(42, 'Deliveryorder', '6', 'Approve', '1', '2014-11-22 13:49:38', '2014-11-22 13:49:38', 0, NULL),
(43, 'ClientPO', 'BQS-01-10000035', 'Add', '1', '2014-11-22 13:49:38', '2014-11-22 13:49:38', 0, NULL),
(44, 'Deliveryorder', 'BDO-01-10000061', 'Add', '1', '2014-11-22 13:50:07', '2014-11-22 13:50:07', 0, NULL),
(45, 'Deliveryorder', '7', 'Approve', '1', '2014-11-22 13:50:19', '2014-11-22 13:50:19', 0, NULL),
(46, 'ClientPO', 'BQS-01-10000035', 'Add', '1', '2014-11-22 13:50:19', '2014-11-22 13:50:19', 0, NULL),
(47, 'Quotation', 'BQS-01-10000036', 'Add', '1', '2014-11-22 14:04:09', '2014-11-22 14:04:09', 0, NULL),
(48, 'Onsite', '1', 'Add', '1', '2014-11-22 14:07:42', '2014-11-22 14:07:42', 0, NULL),
(49, 'Deliveryorder', 'BDO-01-10000062', 'Add', '1', '2014-11-23 05:00:13', '2014-11-23 05:00:13', 0, NULL),
(50, 'Salesorder', '12', 'Add', '1', '2014-11-23 05:03:59', '2014-11-23 05:03:59', 0, NULL),
(51, 'Deliveryorder', 'BDO-01-10000063', 'Add', '1', '2014-11-23 05:04:53', '2014-11-23 05:04:53', 0, NULL),
(52, 'Deliveryorder', '9', 'Approve', '1', '2014-11-23 05:20:03', '2014-11-23 05:20:03', 0, NULL),
(53, 'Deliveryorder', 'BDO-01-10000064', 'Add', '1', '2014-11-23 05:20:48', '2014-11-23 05:20:48', 0, NULL),
(54, 'Deliveryorder', 'BDO-01-10000065', 'Add', '1', '2014-11-23 06:12:59', '2014-11-23 06:12:59', 0, NULL),
(55, 'Deliveryorder', 'BDO-01-10000066', 'Add', '1', '2014-11-23 07:20:15', '2014-11-23 07:20:15', 0, NULL),
(56, 'Deliveryorder', 'BDO-01-10000067', 'Add', '1', '2014-11-23 07:59:43', '2014-11-23 07:59:43', 0, NULL),
(57, 'Deliveryorder', '12', 'Approve', '1', '2014-11-23 08:17:36', '2014-11-23 08:17:36', 0, NULL),
(58, 'ClientPO', 'BQS-01-10000031', 'Add', '1', '2014-11-23 08:17:36', '2014-11-23 08:17:36', 0, NULL),
(59, 'Deliveryorder', '13', 'Approve', '1', '2014-11-23 08:45:40', '2014-11-23 08:45:40', 0, NULL),
(60, 'ClientPO', 'BQS-01-10000031', 'Add', '1', '2014-11-23 08:45:40', '2014-11-23 08:45:40', 0, NULL),
(61, 'Deliveryorder', 'BDO-01-10000068', 'Add', '1', '2014-11-23 08:52:47', '2014-11-23 08:52:47', 0, NULL),
(62, 'Deliveryorder', '14', 'Approve', '1', '2014-11-23 08:53:13', '2014-11-23 08:53:13', 0, NULL),
(63, 'Deliveryorder', 'BDO-01-10000069', 'Add', '1', '2014-11-23 08:53:56', '2014-11-23 08:53:56', 0, NULL),
(64, 'Deliveryorder', '15', 'Approve', '1', '2014-11-23 08:54:21', '2014-11-23 08:54:21', 0, NULL),
(65, 'ClientPO', 'BQS-01-10000032', 'Add', '1', '2014-11-23 08:54:21', '2014-11-23 08:54:21', 0, NULL),
(66, 'ClientPO', 'BQS-01-10000032', 'Approve', '1', '2014-11-23 10:07:14', '2014-11-23 10:07:14', 0, NULL),
(67, 'Invoice', 'BQS-01-10000032', 'Add', '1', '2014-11-23 10:07:14', '2014-11-23 10:07:14', 0, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `deliveryorders`
--

INSERT INTO `deliveryorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `branch_id`, `track_id`, `delivery_address`, `customer_address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `delivery_order_no`, `salesorder_id`, `quotationno`, `delivery_order_date`, `our_reference_no`, `po_reference_no`, `ref_no`, `ref_count`, `remarks`, `service_id`, `is_approved`, `is_approved_date`, `instrument_type_id`, `del_description_count`, `status`, `ready_to_deliver`, `move_to_deliver`, `assign_to`, `is_invoice_created`, `is_invoice_approved`, `po_generate_type`, `is_assignpo`, `is_poapproved`, `po_approval_date`, `is_pocount_satisfied`, `is_deleted`, `job_finished`, `is_jobcompleted`) VALUES
(1, '2014-11-21 11:09:53', '2014-11-21 11:09:53', NULL, NULL, 0, 'CUS-01-10000005', 1, 'BSTRA-01-10000104', '41 Senoko Drive,\r\nSingapore 758 249.', '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', 'BDO-01-10000055', 'BSO-01-10000026', 'BQS-01-10000025', '21-November-14', 'BSTRA-01-10000104', 'CPO-01-10000022', 'PO-01-10000022', 4, '', 2, 1, '0000-00-00', 1, 2, 1, NULL, 0, NULL, 1, 1, 'Manual', 1, 1, NULL, 0, 0, '0', 0),
(2, '2014-11-21 10:40:44', '2014-11-21 10:40:44', 1, NULL, 0, 'CUS-01-10000005', 1, 'BSTRA-01-10000104', '41 Senoko Drive,\r\nSingapore 758 249.', '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', 'BDO-01-10000056', 'BSO-01-10000026', 'BQS-01-10000025', '22-November-14', 'BSTRA-01-10000104', 'CPO-01-10000022', 'PO-01-10000022', 4, '', 1, 1, '0000-00-00', 0, 2, 1, NULL, 0, NULL, 1, 1, 'Manual', 1, 1, NULL, NULL, 0, '0', 0),
(3, '2014-11-22 11:06:12', '2014-11-22 11:06:12', NULL, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000108', '41 Senoko Drive\r\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000057', 'BSO-01-10000028', 'BQS-01-10000027', '22-November-14', 'BSTRA-01-10000108', 'CPO-01-10000024', 'PO-01-10000024', 4, '', 2, 1, '0000-00-00', 1, 2, 1, NULL, 0, NULL, 1, 0, 'Manual', 1, 1, NULL, 0, 0, '0', 0),
(4, '2014-11-21 10:41:16', '2014-11-21 10:41:16', 1, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000108', '41 Senoko Drive\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000058', 'BSO-01-10000028', 'BQS-01-10000027', '22-November-14', 'BSTRA-01-10000108', 'CPO-01-10000024', 'PO-01-10000024', 4, '', 1, 1, '0000-00-00', 0, 2, 1, NULL, 0, NULL, 1, 0, 'Manual', 1, 1, NULL, NULL, 0, '0', 0),
(5, '2014-11-22 13:36:18', '2014-11-22 13:36:18', NULL, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000110', '41 Senoko Drive\r\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000059', 'BSO-01-10000029', 'BQS-01-10000028', '22-November-14', 'BSTRA-01-10000110', 'CPO-01-10000025', 'CPO-01-10000025', 0, '', 2, 1, '0000-00-00', 1, 3, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, 0, 0, '0', 0),
(6, '2014-11-22 13:49:28', '2014-11-22 13:49:28', NULL, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000127', '41 Senoko Drive\r\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000060', 'BSO-01-10000036', 'BQS-01-10000035', '22-November-14', 'BSTRA-01-10000127', 'CPO-01-10000032', 'CPO-01-10000032', 0, '', 2, 1, '0000-00-00', 1, 1, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, 0, 0, '0', 0),
(7, '2014-11-22 13:47:54', '2014-11-22 13:47:54', 1, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000127', '41 Senoko Drive\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000061', 'BSO-01-10000036', 'BQS-01-10000035', '22-November-14', 'BSTRA-01-10000127', 'CPO-01-10000032', 'CPO-01-10000032', NULL, '', 1, 1, '0000-00-00', 0, 2, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0),
(8, '2014-11-21 10:41:35', '2014-11-21 10:41:35', 1, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000110', '41 Senoko Drive\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000062', 'BSO-01-10000029', 'BQS-01-10000028', '23-November-14', 'BSTRA-01-10000110', 'CPO-01-10000025', 'CPO-01-10000025', NULL, '', 1, 0, NULL, 0, 2, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0),
(9, '2014-11-23 05:04:53', '2014-11-23 05:04:53', NULL, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000127', '41 Senoko Drive\r\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000063', 'BSO-01-10000037', 'BQS-01-10000035', '23-November-14', 'BSTRA-01-10000127', 'CPO-01-10000032', 'CPO-01-10000032', 0, '', 2, 1, '0000-00-00', 1, 1, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, 0, 0, '0', 0),
(10, '2014-11-22 13:48:21', '2014-11-22 13:48:21', 1, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000127', '41 Senoko Drive\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000064', 'BSO-01-10000037', 'BQS-01-10000035', '23-November-14', 'BSTRA-01-10000127', 'CPO-01-10000032', 'CPO-01-10000032', NULL, '', 1, 0, NULL, 0, 2, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0),
(11, '2014-11-23 06:12:59', '2014-11-23 06:12:59', NULL, NULL, 0, 'CUS-01-10000008', 1, 'BSTRA-01-10000130', '41 Senoko Drive\r\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 'BDO-01-10000065', 'BSO-01-10000038', 'BQS-01-10000036', '23-November-14', 'BSTRA-01-10000130', 'PO12356', 'PO12356', 0, '', 2, 0, NULL, 1, 2, 1, NULL, 0, NULL, 0, 0, 'Manual', 0, 0, NULL, 0, 0, '0', 0),
(12, '2014-11-23 07:20:15', '2014-11-23 07:20:15', NULL, NULL, 0, 'CUS-01-10000017', 1, 'BSTRA-01-10000116', 'fdg', 'fdg', NULL, '7', '6545709', '', 'kirana@goog.com', 'BDO-01-10000066', 'BSO-01-10000032', 'BQS-01-10000031', '23-November-14', 'BSTRA-01-10000116', 'CPO-01-10000028', 'CPO-01-10000028', 0, '', 2, 1, '0000-00-00', 1, 2, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, 0, 0, '0', 0),
(13, '2014-11-21 10:42:18', '2014-11-21 10:42:18', 1, NULL, 0, 'CUS-01-10000017', 1, 'BSTRA-01-10000116', 'fdg', '4 senoko drive\r\nsingapore 876908', NULL, '7', '6545709', '', 'kirana@goog.com', 'BDO-01-10000067', 'BSO-01-10000032', 'BQS-01-10000031', '23-November-14', 'BSTRA-01-10000116', 'CPO-01-10000028', 'CPO-01-10000028', NULL, '', 1, 1, '0000-00-00', 0, 3, 1, NULL, 0, NULL, 1, 0, 'Automatic', 0, 0, NULL, NULL, 0, '0', 0),
(14, '2014-11-23 08:52:47', '2014-11-23 08:52:47', NULL, NULL, 0, 'CUS-01-10000017', 1, 'BSTRA-01-10000118', 'fdg', 'fdg', NULL, '7', '6545709', '', 'kirana@goog.com', 'BDO-01-10000068', 'BSO-01-10000033', 'BQS-01-10000032', '23-November-14', 'BSTRA-01-10000118', 'CPO-01-10000029', 'PO-01-10000029', 6, '', 2, 1, '0000-00-00', 1, 3, 1, NULL, 0, NULL, 1, 1, 'Manual', 1, 1, NULL, 0, 0, '0', 0),
(15, '2014-11-21 10:42:32', '2014-11-21 10:42:32', 1, NULL, 0, 'CUS-01-10000017', 1, 'BSTRA-01-10000118', 'fdg', '4 senoko drive\r\nsingapore 876908', NULL, '7', '6545709', '', 'kirana@goog.com', 'BDO-01-10000069', 'BSO-01-10000033', 'BQS-01-10000032', '23-November-14', 'BSTRA-01-10000118', 'CPO-01-10000029', 'PO-01-10000029', 6, '', 1, 1, '0000-00-00', 0, 3, 1, NULL, 0, NULL, 1, 1, 'Manual', 1, 1, NULL, NULL, 0, '0', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `del_descriptions`
--

INSERT INTO `del_descriptions` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `deliveryorder_id`, `salesorder_id`, `quotation_id`, `quotationno`, `customer_id`, `delivery_quantity`, `instrument_id`, `model_no`, `brand_id`, `delivery_range`, `delivery_calllocation`, `delivery_calltype`, `delivery_validity`, `delivery_unitprice`, `delivery_discount`, `department_id`, `delivery_accountservice`, `delivery_titles`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `delivery_total`, `status`, `ready_to_deliver`, `is_deleted`) VALUES
(1, '2014-11-21 11:09:53', '2014-11-21 11:09:53', NULL, NULL, 0, '1', 'BSO-01-10000026', 1, 'BQS-01-10000025', 'CUS-01-10000005', '1', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, NULL, 'PART NO123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', 1, 0, 0),
(2, '2014-11-21 11:09:53', '2014-11-21 11:09:53', NULL, NULL, 0, '1', 'BSO-01-10000026', 1, 'BQS-01-10000025', 'CUS-01-10000005', '1', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', 1, 0, 0),
(3, '2014-11-22 09:40:52', '2014-11-22 09:40:52', NULL, NULL, 0, '2', 'BSO-01-10000026', 1, 'BQS-01-10000025', 'CUS-01-10000005', '4', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', 1, 0, 0),
(4, '2014-11-22 09:40:52', '2014-11-22 09:40:52', NULL, NULL, 0, '2', 'BSO-01-10000026', 1, 'BQS-01-10000025', 'CUS-01-10000005', '4', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150', 1, 0, 0),
(5, '2014-11-22 11:06:12', '2014-11-22 11:06:12', NULL, NULL, 0, '3', 'BSO-01-10000028', 3, 'BQS-01-10000027', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(6, '2014-11-22 11:06:13', '2014-11-22 11:06:13', NULL, NULL, 0, '3', 'BSO-01-10000028', 3, 'BQS-01-10000027', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(7, '2014-11-22 12:42:04', '2014-11-22 12:42:04', NULL, NULL, 0, '4', 'BSO-01-10000028', 3, 'BQS-01-10000027', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(8, '2014-11-22 12:42:05', '2014-11-22 12:42:05', NULL, NULL, 0, '4', 'BSO-01-10000028', 3, 'BQS-01-10000027', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(9, '2014-11-22 13:36:18', '2014-11-22 13:36:18', NULL, NULL, 0, '5', 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '75', 1, 0, 0),
(10, '2014-11-22 13:36:18', '2014-11-22 13:36:18', NULL, NULL, 0, '5', 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '75', 1, 0, 0),
(11, '2014-11-22 13:36:18', '2014-11-22 13:36:18', NULL, NULL, 0, '5', 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '75', 1, 0, 0),
(12, '2014-11-22 13:49:28', '2014-11-22 13:49:28', NULL, NULL, 0, '6', 'BSO-01-10000036', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(13, '2014-11-22 13:50:07', '2014-11-22 13:50:07', NULL, NULL, 0, '7', 'BSO-01-10000036', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(14, '2014-11-22 13:50:07', '2014-11-22 13:50:07', NULL, NULL, 0, '7', 'BSO-01-10000036', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(15, '2014-11-23 05:00:13', '2014-11-23 05:00:13', NULL, NULL, 0, '8', 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '75', 1, 0, 0),
(16, '2014-11-23 05:00:13', '2014-11-23 05:00:13', NULL, NULL, 0, '8', 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '75', 1, 0, 0),
(17, '2014-11-23 05:04:53', '2014-11-23 05:04:53', NULL, NULL, 0, '9', 'BSO-01-10000037', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(18, '2014-11-23 05:20:48', '2014-11-23 05:20:48', NULL, NULL, 0, '10', 'BSO-01-10000037', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(19, '2014-11-23 05:20:48', '2014-11-23 05:20:48', NULL, NULL, 0, '10', 'BSO-01-10000037', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(20, '2014-11-23 06:12:59', '2014-11-23 06:12:59', NULL, NULL, 0, '11', 'BSO-01-10000038', 12, 'BQS-01-10000036', 'CUS-01-10000008', '1', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(21, '2014-11-23 06:12:59', '2014-11-23 06:12:59', NULL, NULL, 0, '11', 'BSO-01-10000038', 12, 'BQS-01-10000036', 'CUS-01-10000008', '1', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 1, 0, 0),
(22, '2014-11-23 07:20:15', '2014-11-23 07:20:15', NULL, NULL, 0, '12', 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78', 1, 0, 0),
(23, '2014-11-23 07:20:15', '2014-11-23 07:20:15', NULL, NULL, 0, '12', 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78', 1, 0, 0),
(24, '2014-11-23 07:59:43', '2014-11-23 07:59:43', NULL, NULL, 0, '13', 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78', 1, 0, 0),
(25, '2014-11-23 07:59:43', '2014-11-23 07:59:43', NULL, NULL, 0, '13', 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78', 1, 0, 0),
(26, '2014-11-23 07:59:43', '2014-11-23 07:59:43', NULL, NULL, 0, '13', 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78', 1, 0, 0),
(27, '2014-11-23 08:52:47', '2014-11-23 08:52:47', NULL, NULL, 0, '14', 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45', 1, 0, 0),
(28, '2014-11-23 08:52:47', '2014-11-23 08:52:47', NULL, NULL, 0, '14', 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45', 1, 0, 0),
(29, '2014-11-23 08:52:47', '2014-11-23 08:52:47', NULL, NULL, 0, '14', 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45', 1, 0, 0),
(30, '2014-11-23 08:53:55', '2014-11-23 08:53:55', NULL, NULL, 0, '15', 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45', 1, 0, 0),
(31, '2014-11-23 08:53:55', '2014-11-23 08:53:55', NULL, NULL, 0, '15', 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45', 1, 0, 0),
(32, '2014-11-23 08:53:55', '2014-11-23 08:53:55', NULL, NULL, 0, '15', 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45', 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `prepare_invoice_id`, `created`, `modified`, `created_by`, `modified_by`, `invoiceno`, `branch_id`, `invoice_date`, `deliveryorder_id`, `salesorder_id`, `quotation_id`, `customer_id`, `ref_no`, `track_id`, `customername`, `regaddress`, `contactperson_id`, `contactpersonname`, `phone`, `fax`, `email`, `due_amount`, `totalprice`, `jobstatus_id`, `paymentterms_id`, `invoice_type_id`, `acknowledgement_type_id`, `instrument_type_id`, `salesperson_id`, `gst`, `currency_id`, `remarks`, `service_type`, `currencyconversionrate`, `discount`, `po_generate_type`, `is_assign_po`, `is_approved`, `is_poapproved`, `po_approval_date`, `approved_date`, `status`, `view`, `is_deleted`) VALUES
(1, NULL, '2014-11-23 19:25:16', '2014-11-23 19:25:16', NULL, NULL, NULL, NULL, '24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '41 Senoko Drive,\r\nSingapore 758 249.', NULL, 'Mohan', 64584411, '6458 4400', 'mohan@bsaquatierra.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Repair Service', NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0),
(2, NULL, '2014-11-23 19:25:29', '2014-11-23 19:25:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0),
(3, NULL, '2014-11-23 19:26:43', '2014-11-23 19:26:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0),
(4, NULL, '2014-11-23 19:28:41', '2014-11-23 19:28:41', NULL, NULL, NULL, NULL, '24', NULL, 'BSO-01-10000026', NULL, NULL, NULL, NULL, NULL, '41 Senoko Drive,\r\nSingapore 758 249.', NULL, 'Mohan', 64584411, '6458 4400', 'mohan@bsaquatierra.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Repair Service', NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0),
(5, NULL, '2014-11-23 20:45:11', '2014-11-23 20:45:11', NULL, NULL, NULL, NULL, '24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4 senoko drive\r\nsingapore 876908', NULL, 'ms kirana', 6545709, '', 'kirana@goog.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0),
(6, NULL, '2014-11-23 20:47:19', '2014-11-23 20:47:19', NULL, NULL, NULL, NULL, '24', NULL, 'BSO-01-10000026', NULL, NULL, NULL, NULL, NULL, '41 Senoko Drive,\r\nSingapore 758 249.', NULL, 'Mohan', 64584411, '6458 4400', 'mohan@bsaquatierra.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Repair Service', NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0),
(7, NULL, '2014-11-23 22:11:30', '2014-11-23 22:11:30', NULL, NULL, 'BIN-01-10000002', NULL, '24-November-14', 'BDO-01-10000055,BDO-01-10000056', 'BSO-01-10000026', NULL, NULL, NULL, NULL, NULL, '41 Senoko Drive,\r\nSingapore 758 249.', NULL, 'Mohan', 64584411, '6458 4400', 'mohan@bsaquatierra.com', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, '', 'Repair Service', NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0),
(8, NULL, '2014-11-23 22:13:47', '2014-11-23 22:13:47', NULL, NULL, '7-1', NULL, '24-November-14', 'BDO-01-10000068,BDO-01-10000069', '', 'BQS-01-10000032', 'CUS-01-10000017', NULL, 'BSTRA-01-10000118', 'Goodrich Aerospace Pte Ltd', '4 senoko drive\r\nsingapore 876908', NULL, 'ms kirana', 6545709, '', 'kirana@goog.com', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0),
(9, NULL, '2014-11-23 22:15:57', '2014-11-23 22:15:57', NULL, NULL, '8-1', NULL, '24-November-14', 'BDO-01-10000057,BDO-01-10000058', 'BSO-01-10000028', NULL, NULL, NULL, 'BSTRA-01-10000108', NULL, '41 Senoko Drive\r\nSingapore 758249', NULL, 'Erick', 6542, '6458 4401', 'erick@abc.com', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, '', 'Repair Service', NULL, NULL, NULL, 0, '0', 0, NULL, NULL, '1', NULL, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `labprocesses`
--

INSERT INTO `labprocesses` (`id`, `created`, `modified`, `created_by`, `modified_by`, `salesorder_id`, `description_id`, `status`) VALUES
(1, '2014-11-22 09:40:52', '2014-11-22 09:40:52', NULL, NULL, 'BSO-01-10000026', '1', 1),
(2, '2014-11-22 09:40:52', '2014-11-22 09:40:52', NULL, NULL, 'BSO-01-10000026', '2', 1),
(3, '2014-11-22 09:40:52', '2014-11-22 09:40:52', NULL, NULL, 'BSO-01-10000026', '3', 1),
(4, '2014-11-22 09:40:52', '2014-11-22 09:40:52', NULL, NULL, 'BSO-01-10000026', '4', 1),
(5, '2014-11-22 12:42:05', '2014-11-22 12:42:05', NULL, NULL, 'BSO-01-10000028', '10', 1),
(6, '2014-11-22 12:42:05', '2014-11-22 12:42:05', NULL, NULL, 'BSO-01-10000028', '11', 1),
(7, '2014-11-22 12:42:05', '2014-11-22 12:42:05', NULL, NULL, 'BSO-01-10000028', '12', 1),
(8, '2014-11-22 12:42:05', '2014-11-22 12:42:05', NULL, NULL, 'BSO-01-10000028', '13', 1),
(9, '2014-11-22 13:50:07', '2014-11-22 13:50:07', NULL, NULL, 'BSO-01-10000036', '51', 1),
(10, '2014-11-22 13:50:07', '2014-11-22 13:50:07', NULL, NULL, 'BSO-01-10000036', '52', 1),
(11, '2014-11-22 13:50:07', '2014-11-22 13:50:07', NULL, NULL, 'BSO-01-10000036', '53', 1),
(12, '2014-11-23 05:00:13', '2014-11-23 05:00:13', NULL, NULL, 'BSO-01-10000029', '14', 1),
(13, '2014-11-23 05:00:13', '2014-11-23 05:00:13', NULL, NULL, 'BSO-01-10000029', '15', 1),
(14, '2014-11-23 05:00:13', '2014-11-23 05:00:13', NULL, NULL, 'BSO-01-10000029', '16', 1),
(15, '2014-11-23 05:00:13', '2014-11-23 05:00:13', NULL, NULL, 'BSO-01-10000029', '17', 1),
(16, '2014-11-23 05:00:13', '2014-11-23 05:00:13', NULL, NULL, 'BSO-01-10000029', '18', 1),
(17, '2014-11-23 05:20:48', '2014-11-23 05:20:48', NULL, NULL, 'BSO-01-10000037', '54', 1),
(18, '2014-11-23 05:20:48', '2014-11-23 05:20:48', NULL, NULL, 'BSO-01-10000037', '55', 1),
(19, '2014-11-23 05:20:48', '2014-11-23 05:20:48', NULL, NULL, 'BSO-01-10000037', '56', 1),
(20, '2014-11-23 07:59:43', '2014-11-23 07:59:43', NULL, NULL, 'BSO-01-10000032', '30', 1),
(21, '2014-11-23 07:59:43', '2014-11-23 07:59:43', NULL, NULL, 'BSO-01-10000032', '31', 1),
(22, '2014-11-23 07:59:43', '2014-11-23 07:59:43', NULL, NULL, 'BSO-01-10000032', '32', 1),
(23, '2014-11-23 07:59:43', '2014-11-23 07:59:43', NULL, NULL, 'BSO-01-10000032', '33', 1),
(24, '2014-11-23 07:59:43', '2014-11-23 07:59:43', NULL, NULL, 'BSO-01-10000032', '34', 1),
(25, '2014-11-23 08:53:56', '2014-11-23 08:53:56', NULL, NULL, 'BSO-01-10000033', '35', 1),
(26, '2014-11-23 08:53:56', '2014-11-23 08:53:56', NULL, NULL, 'BSO-01-10000033', '36', 1),
(27, '2014-11-23 08:53:56', '2014-11-23 08:53:56', NULL, NULL, 'BSO-01-10000033', '37', 1),
(28, '2014-11-23 08:53:56', '2014-11-23 08:53:56', NULL, NULL, 'BSO-01-10000033', '38', 1),
(29, '2014-11-23 08:53:56', '2014-11-23 08:53:56', NULL, NULL, 'BSO-01-10000033', '39', 1),
(30, '2014-11-23 08:53:56', '2014-11-23 08:53:56', NULL, NULL, 'BSO-01-10000033', '40', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `logactivities`
--

INSERT INTO `logactivities` (`id`, `logname`, `logactivity`, `logid`, `logno`, `loglink`, `user_id`, `logapprove`, `approved_by`, `logtime`, `created`) VALUES
(1, 'Quotation', 'Add Quotation', '1', 'BQS-01-10000025', NULL, '1', 2, '1', NULL, '2014-11-21'),
(2, 'Quotation', 'Add Quotation', '2', 'BQS-01-10000026', NULL, '1', 2, '1', NULL, '2014-11-21'),
(3, 'Quotation', 'Add Quotation', '3', 'BQS-01-10000027', NULL, '1', 2, '1', NULL, '2014-11-21'),
(4, 'Quotation', 'Add Quotation', '4', 'BQS-01-10000028', NULL, '1', 2, '1', NULL, '2014-11-21'),
(5, 'Quotation', 'Add Quotation', '5', 'BQS-01-10000029', NULL, '1', 2, '1', NULL, '2014-11-21'),
(6, 'Quotation', 'Add Quotation', '6', 'BQS-01-10000030', NULL, '1', 2, '1', NULL, '2014-11-21'),
(7, 'Quotation', 'Add Quotation', '7', 'BQS-01-10000031', NULL, '1', 2, '1', NULL, '2014-11-21'),
(8, 'Quotation', 'Add Quotation', '8', 'BQS-01-10000032', NULL, '1', 2, '1', NULL, '2014-11-21'),
(9, 'Quotation', 'Add Quotation', '9', 'BQS-01-10000033', NULL, '1', 2, '1', NULL, '2014-11-21'),
(10, 'Quotation', 'Add Quotation', '10', 'BQS-01-10000034', NULL, '1', 2, '1', NULL, '2014-11-21'),
(11, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000026', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(12, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000027', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(13, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000028', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(14, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000029', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(15, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000030', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(16, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000031', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(17, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000032', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(18, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000033', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(19, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000034', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(20, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000035', '', NULL, NULL, 2, '1', NULL, '2014-11-21'),
(21, 'Deliveryorder', 'Add Delivery Order', '1', 'BDO-01-10000055', NULL, '1', 2, '1', NULL, '2014-11-21'),
(22, 'Labprocess', 'Add Labprocess', '2', 'BDO-01-10000056', NULL, '1', 2, NULL, NULL, '2014-11-22'),
(23, 'Deliveryorder', 'Add Delivery Order', '2', 'BDO-01-10000056', NULL, '1', 2, '1', NULL, '2014-11-22'),
(24, 'ClientPO', 'Add', 'BQS-01-10000025', 'BQS-01-10000025', NULL, '1', 2, NULL, NULL, '2014-11-22'),
(25, 'Deliveryorder', 'Add Delivery Order', '3', 'BDO-01-10000057', NULL, '1', 2, '1', NULL, '2014-11-22'),
(26, 'Labprocess', 'Add Labprocess', '4', 'BDO-01-10000058', NULL, '1', 2, NULL, NULL, '2014-11-22'),
(27, 'Deliveryorder', 'Add Delivery Order', '4', 'BDO-01-10000058', NULL, '1', 2, '1', NULL, '2014-11-22'),
(28, 'Invoice', 'Add', 'BDO-01-10000056', 'BQS-01-10000025', NULL, '1', 1, NULL, NULL, '2014-11-22'),
(29, 'ClientPO', 'Add', 'BDO-01-10000058', 'BQS-01-10000027', NULL, '1', 1, NULL, NULL, '2014-11-22'),
(30, 'Deliveryorder', 'Add Delivery Order', '5', 'BDO-01-10000059', NULL, '1', 2, '1', NULL, '2014-11-22'),
(31, 'ClientPO', 'Add', 'BDO-01-10000059', 'BQS-01-10000028', NULL, '1', 1, NULL, NULL, '2014-11-22'),
(32, 'Quotation', 'Add Quotation', '11', 'BQS-01-10000035', NULL, '1', 2, '1', NULL, '2014-11-22'),
(33, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000036', '', NULL, NULL, 2, '1', NULL, '2014-11-22'),
(34, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000037', '', NULL, NULL, 2, '1', NULL, '2014-11-22'),
(35, 'Deliveryorder', 'Add Delivery Order', '6', 'BDO-01-10000060', NULL, '1', 2, '1', NULL, '2014-11-22'),
(36, 'ClientPO', 'Add', 'BDO-01-10000060', 'BQS-01-10000035', NULL, '1', 1, NULL, NULL, '2014-11-22'),
(37, 'Labprocess', 'Add Labprocess', '7', 'BDO-01-10000061', NULL, '1', 2, NULL, NULL, '2014-11-22'),
(38, 'Deliveryorder', 'Add Delivery Order', '7', 'BDO-01-10000061', NULL, '1', 2, '1', NULL, '2014-11-22'),
(39, 'ClientPO', 'Add', 'BDO-01-10000061', 'BQS-01-10000035', NULL, '1', 1, NULL, NULL, '2014-11-22'),
(40, 'Quotation', 'Add Quotation', '12', 'BQS-01-10000036', NULL, '1', 2, '1', NULL, '2014-11-22'),
(41, 'Onsite', 'Add Onsite', '1', 'OSS-01-10000002', NULL, '1', 1, NULL, NULL, '2014-11-22'),
(42, 'Labprocess', 'Add Labprocess', '8', 'BDO-01-10000062', NULL, '1', 2, NULL, NULL, '2014-11-23'),
(43, 'Deliveryorder', 'Add Delivery Order', '8', 'BDO-01-10000062', NULL, '1', 1, NULL, NULL, '2014-11-23'),
(44, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000038', '', NULL, NULL, 2, '1', NULL, '2014-11-23'),
(45, 'Deliveryorder', 'Add Delivery Order', '9', 'BDO-01-10000063', NULL, '1', 2, '1', NULL, '2014-11-23'),
(46, 'Labprocess', 'Add Labprocess', '10', 'BDO-01-10000064', NULL, '1', 2, NULL, NULL, '2014-11-23'),
(47, 'Deliveryorder', 'Add Delivery Order', '10', 'BDO-01-10000064', NULL, '1', 1, NULL, NULL, '2014-11-23'),
(48, 'Deliveryorder', 'Add Delivery Order', '11', 'BDO-01-10000065', NULL, '1', 1, NULL, NULL, '2014-11-23'),
(49, 'Deliveryorder', 'Add Delivery Order', '12', 'BDO-01-10000066', NULL, '1', 2, '1', NULL, '2014-11-23'),
(50, 'Labprocess', 'Add Labprocess', '13', 'BDO-01-10000067', NULL, '1', 2, NULL, NULL, '2014-11-23'),
(51, 'Deliveryorder', 'Add Delivery Order', '13', 'BDO-01-10000067', NULL, '1', 2, '1', NULL, '2014-11-23'),
(52, 'ClientPO', 'Add', 'BDO-01-10000066', 'BQS-01-10000031', NULL, '1', 1, NULL, NULL, '2014-11-23'),
(53, 'ClientPO', 'Add', 'BDO-01-10000067', 'BQS-01-10000031', NULL, '1', 1, NULL, NULL, '2014-11-23'),
(54, 'Deliveryorder', 'Add Delivery Order', '14', 'BDO-01-10000068', NULL, '1', 2, '1', NULL, '2014-11-23'),
(55, 'Labprocess', 'Add Labprocess', '15', 'BDO-01-10000069', NULL, '1', 2, NULL, NULL, '2014-11-23'),
(56, 'Deliveryorder', 'Add Delivery Order', '15', 'BDO-01-10000069', NULL, '1', 2, '1', NULL, '2014-11-23'),
(57, 'ClientPO', 'Add', 'BDO-01-10000069', 'BQS-01-10000032', NULL, '1', 1, NULL, NULL, '2014-11-23'),
(58, 'Invoice', 'Add', NULL, 'BQS-01-10000032', NULL, '1', 1, NULL, NULL, '2014-11-23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `onsites`
--

INSERT INTO `onsites` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `quotation_id`, `branch_id`, `quotationno`, `customer_name`, `address`, `fax`, `schedule_status`, `attn`, `phone`, `email`, `details`, `onsiteschedule_no`, `schedule_date`, `schedule_time`, `date`, `duration1`, `duration2`, `remarks`, `schedule_created`, `is_deleted`) VALUES
(1, '2014-11-22 14:07:42', '2014-11-22 14:07:42', NULL, NULL, NULL, 'CUS-01-10000008', '12', 1, 'BQS-01-10000036', 'ABC PTE LTD', '41 Senoko Drive\r\nSingapore 758249', '6458 4401', 'Pending', 'Erick', '6666 1122', 'erick@abc.com', '', 'OSS-01-10000002', '23-November-14', '19:33:15', NULL, '20', 'Minutes', 'remark', '11/22/2014 02:07:42 pm', '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `onsite_engineers`
--

INSERT INTO `onsite_engineers` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `onsite_id`, `onsiteschedule_no`, `engineer_name`, `engineer_email_id`, `is_deleted`) VALUES
(1, '2014-11-22 14:06:50', '2014-11-22 14:06:50', NULL, NULL, NULL, 1, 'OSS-01-10000002', 'Bala Krishnan', 'krishnan@bestandards.com', 0),
(2, '2014-11-22 14:06:54', '2014-11-22 14:06:54', NULL, NULL, NULL, 1, 'OSS-01-10000002', 'sharifah BS', 'sharifah@bestandards.com', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `onsite_instruments`
--

INSERT INTO `onsite_instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `onsite_id`, `quotation_id`, `quotationno`, `customer_id`, `onsite_quantity`, `instrument_id`, `model_no`, `brand_id`, `onsite_range`, `onsite_calllocation`, `onsite_calltype`, `onsite_validity`, `onsite_unitprice`, `onsite_discount`, `department`, `onsite_accountservice`, `onsite_titles`, `onsite_total`, `status`, `is_deleted`) VALUES
(1, '2014-11-22 14:05:01', '2014-11-22 14:06:22', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'singlas', 12, '34', '', 'Temperature', 'calibration service', 'null', '34', 1, 0),
(2, '2014-11-22 14:05:01', '2014-11-22 14:05:01', NULL, NULL, 0, '1', 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 1, 0),
(3, '2014-11-22 14:05:01', '2014-11-22 14:05:01', NULL, NULL, 0, '1', 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 1, 0),
(4, '2014-11-22 14:05:01', '2014-11-22 14:05:01', NULL, NULL, 0, '1', 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 1, 0),
(5, '2014-11-22 14:46:50', '2014-11-22 14:46:50', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'TS1', 1, '2', 'Onsite', 'singlas', 12, '120', '', 'Temperature', 'Calibration Service', '1', '120', 0, 0),
(6, '2014-11-22 14:46:50', '2014-11-22 14:46:50', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'TS1', 1, '2', 'Onsite', 'singlas', 12, '120', '', 'Temperature', 'Calibration Service', '1', '120', 0, 0),
(7, '2014-11-22 14:46:50', '2014-11-22 14:46:50', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'TS1', 1, '2', 'Onsite', 'singlas', 12, '120', '', 'Temperature', 'Calibration Service', '1', '120', 0, 0),
(8, '2014-11-22 14:46:50', '2014-11-22 14:46:50', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'TS1', 1, '2', 'Onsite', 'singlas', 12, '120', '', 'Temperature', 'Calibration Service', '1', '120', 0, 0),
(9, '2014-11-22 15:00:04', '2014-11-22 15:00:04', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(10, '2014-11-22 15:00:04', '2014-11-22 15:00:04', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(11, '2014-11-22 15:00:04', '2014-11-22 15:00:04', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(12, '2014-11-22 15:00:04', '2014-11-22 15:00:04', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(13, '2014-11-22 15:00:09', '2014-11-22 15:00:09', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(14, '2014-11-22 15:00:09', '2014-11-22 15:00:09', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(15, '2014-11-22 15:00:09', '2014-11-22 15:00:09', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(16, '2014-11-22 15:00:09', '2014-11-22 15:00:09', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(17, '2014-11-22 15:00:18', '2014-11-22 15:00:18', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(18, '2014-11-22 15:00:18', '2014-11-22 15:00:18', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(19, '2014-11-22 15:00:18', '2014-11-22 15:00:18', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(20, '2014-11-22 15:00:18', '2014-11-22 15:00:18', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(21, '2014-11-22 15:00:22', '2014-11-22 15:00:22', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(22, '2014-11-22 15:00:22', '2014-11-22 15:00:22', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(23, '2014-11-22 15:00:22', '2014-11-22 15:00:22', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(24, '2014-11-22 15:00:22', '2014-11-22 15:00:22', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(25, '2014-11-22 15:00:39', '2014-11-22 15:00:39', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(26, '2014-11-22 15:00:39', '2014-11-22 15:00:39', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(27, '2014-11-22 15:00:39', '2014-11-22 15:00:39', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(28, '2014-11-22 15:00:39', '2014-11-22 15:00:39', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(29, '2014-11-22 15:02:52', '2014-11-22 15:02:52', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(30, '2014-11-22 15:02:52', '2014-11-22 15:02:52', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(31, '2014-11-22 15:02:52', '2014-11-22 15:02:52', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(32, '2014-11-22 15:02:52', '2014-11-22 15:02:52', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(33, '2014-11-22 15:08:52', '2014-11-22 15:08:52', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(34, '2014-11-22 15:08:52', '2014-11-22 15:08:52', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(35, '2014-11-22 15:08:52', '2014-11-22 15:08:52', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(36, '2014-11-22 15:08:52', '2014-11-22 15:08:52', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(37, '2014-11-22 15:19:47', '2014-11-22 15:19:47', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(38, '2014-11-22 15:19:47', '2014-11-22 15:19:47', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(39, '2014-11-22 15:19:47', '2014-11-22 15:19:47', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(40, '2014-11-22 15:19:47', '2014-11-22 15:19:47', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(41, '2014-11-22 15:20:36', '2014-11-22 15:20:36', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(42, '2014-11-22 15:20:36', '2014-11-22 15:20:36', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(43, '2014-11-22 15:20:36', '2014-11-22 15:20:36', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(44, '2014-11-22 15:20:36', '2014-11-22 15:20:36', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(45, '2014-11-22 15:21:10', '2014-11-22 15:21:10', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(46, '2014-11-22 15:21:10', '2014-11-22 15:21:10', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(47, '2014-11-22 15:21:10', '2014-11-22 15:21:10', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(48, '2014-11-22 15:21:10', '2014-11-22 15:21:10', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(49, '2014-11-22 15:23:50', '2014-11-22 15:23:50', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(50, '2014-11-22 15:23:50', '2014-11-22 15:23:50', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(51, '2014-11-22 15:23:50', '2014-11-22 15:23:50', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(52, '2014-11-22 15:23:50', '2014-11-22 15:23:50', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(53, '2014-11-22 15:23:57', '2014-11-22 15:23:57', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(54, '2014-11-22 15:23:57', '2014-11-22 15:23:57', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(55, '2014-11-22 15:23:57', '2014-11-22 15:23:57', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(56, '2014-11-22 15:23:57', '2014-11-22 15:23:57', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(57, '2014-11-22 15:24:34', '2014-11-22 15:24:34', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(58, '2014-11-22 15:24:34', '2014-11-22 15:24:34', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(59, '2014-11-22 15:24:34', '2014-11-22 15:24:34', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(60, '2014-11-22 15:24:34', '2014-11-22 15:24:34', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(61, '2014-11-22 15:25:49', '2014-11-22 15:25:49', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(62, '2014-11-22 15:25:49', '2014-11-22 15:25:49', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(63, '2014-11-22 15:25:49', '2014-11-22 15:25:49', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(64, '2014-11-22 15:25:49', '2014-11-22 15:25:49', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(65, '2014-11-22 15:26:12', '2014-11-22 15:26:12', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(66, '2014-11-22 15:26:12', '2014-11-22 15:26:12', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(67, '2014-11-22 15:26:12', '2014-11-22 15:26:12', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0),
(68, '2014-11-22 15:26:12', '2014-11-22 15:26:12', NULL, NULL, 0, NULL, 12, 'BQS-01-10000036', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 'Temperature', 'calibration service', NULL, '34', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `track_id`, `quotationno`, `customer_id`, `branch_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `paymentterm_id`, `reg_date`, `ref_no`, `ref_count`, `po_generate_type`, `discount`, `priority`, `instrument_type_id`, `is_approved`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorder_created`, `is_deliveryorder_created`, `is_delivery_approved`, `is_invoice_created`, `is_invoice_approved`, `quo_device_count`, `is_jobcompleted`, `total_device_rate`, `is_assign_po`, `po_approval_date`, `is_poapproved`, `is_pocount_satisfied`, `is_deleted`) VALUES
(1, 'BSTRA-01-10000104', 'BQS-01-10000025', 'CUS-01-10000005', 1, 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', 2, '21-November-14', 'PO-01-10000022', '4', 'Manual', '', '1', '1', 1, 1, '2014-11-21 09:55:48', '2014-11-21 10:01:34', 11, NULL, 0, 1, 1, 1, 1, 0, NULL, 0, NULL, 1, NULL, 1, 0, 0),
(2, 'BSTRA-01-10000106', 'BQS-01-10000026', 'CUS-01-10000005', 1, 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', 2, '21-November-14', 'CPO-01-10000023', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-21 10:13:14', '2014-11-21 10:13:14', 11, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(3, 'BSTRA-01-10000108', 'BQS-01-10000027', 'CUS-01-10000008', 1, 'ABC PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 2, '21-November-14', 'PO-01-10000024', '4', 'Manual', '', '1', '1', 1, 1, '2014-11-21 10:19:08', '2014-11-21 10:19:08', 11, NULL, 0, 1, 1, 1, 1, 0, NULL, 0, NULL, 1, NULL, 1, 0, 0),
(4, 'BSTRA-01-10000110', 'BQS-01-10000028', 'CUS-01-10000008', 1, 'ABC PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 2, '21-November-14', 'CPO-01-10000025', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-21 10:20:27', '2014-11-21 10:20:27', 11, NULL, 0, 1, 1, 1, 1, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(5, 'BSTRA-01-10000112', 'BQS-01-10000029', 'CUS-01-10000014', 1, 'Goodrich Aerospace Pte Ltd ( Quality ) ', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 3, '21-November-14', 'CPO-01-10000026', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-21 10:30:45', '2014-11-21 10:30:45', 11, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(6, 'BSTRA-01-10000114', 'BQS-01-10000030', 'CUS-01-10000014', 1, 'Goodrich Aerospace Pte Ltd ( Quality ) ', '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', 3, '21-November-14', 'CPO-01-10000027', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-21 10:32:04', '2014-11-21 10:32:04', 11, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(7, 'BSTRA-01-10000116', 'BQS-01-10000031', 'CUS-01-10000017', 1, 'Goodrich Aerospace Pte Ltd ( Mechanical ) ', '4 senoko drive\r\nsingapore 876908', NULL, '7', '6545709', '', 'kirana@goog.com', 2, '21-November-14', 'CPO-01-10000028', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-21 10:33:47', '2014-11-21 10:33:47', 11, NULL, 0, 1, 1, 1, 1, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(8, 'BSTRA-01-10000118', 'BQS-01-10000032', 'CUS-01-10000017', 1, 'Goodrich Aerospace Pte Ltd ( Mechanical ) ', '4 senoko drive\r\nsingapore 876908', NULL, '7', '6545709', '', 'kirana@goog.com', 2, '21-November-14', 'PO-01-10000029', '6', 'Manual', '', '1', '1', 1, 1, '2014-11-21 10:35:15', '2014-11-21 10:35:15', 11, NULL, 0, 1, 1, 1, 1, 1, NULL, 0, NULL, 1, NULL, 1, 0, 0),
(9, 'BSTRA-01-10000120', 'BQS-01-10000033', 'CUS-01-10000011', 1, 'ABC PTE LTD ( TUAS ) ', '32 Tuas\r\nSingapore 256245', NULL, '3', '6363 2512', '6352 5214', 'Jon@abc.com', 1, '21-November-14', 'CPO-01-10000030', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-21 10:38:44', '2014-11-21 10:38:44', 11, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(10, 'BSTRA-01-10000122', 'BQS-01-10000034', 'CUS-01-10000011', 1, 'ABC PTE LTD ( TUAS ) ', '32 Tuas\r\nSingapore 256245', NULL, '3', '6363 2512', '6352 5214', 'Jon@abc.com', 1, '21-November-14', 'CPO-01-10000031', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-21 10:40:01', '2014-11-21 10:40:01', 11, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(11, 'BSTRA-01-10000127', 'BQS-01-10000035', 'CUS-01-10000008', 1, 'ABC PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 2, '22-November-14', 'CPO-01-10000032', '0', 'Automatic', '', '1', '1', 1, 1, '2014-11-22 13:47:20', '2014-11-22 13:47:20', 11, NULL, 0, 1, 1, 1, 1, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(12, 'BSTRA-01-10000130', 'BQS-01-10000036', 'CUS-01-10000008', 1, 'ABC PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', 2, '22-November-14', 'PO12356', '0', 'Manual', '', '1', '1', 1, 1, '2014-11-22 14:04:09', '2014-11-22 14:04:09', 11, NULL, 0, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `quo_customerspecialneeds`
--

INSERT INTO `quo_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `salespeople_id`, `salesperson_name`, `projectname`, `gsttype`, `gst`, `currency_id`, `currency_value`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(1, '2014-11-21 09:55:48', '2014-11-21 10:01:34', NULL, NULL, 0, '1', NULL, 'BS TECH , ', '', 'Standard', 7, 1, 1, 1, '', '', 1),
(2, '2014-11-21 10:13:15', '2014-11-21 10:13:15', NULL, NULL, 0, '2', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(3, '2014-11-21 10:19:08', '2014-11-21 10:19:08', NULL, NULL, 0, '3', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(4, '2014-11-21 10:20:28', '2014-11-21 10:20:28', NULL, NULL, 0, '4', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(5, '2014-11-21 10:30:45', '2014-11-21 10:30:45', NULL, NULL, 0, '5', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(6, '2014-11-21 10:32:04', '2014-11-21 10:32:04', NULL, NULL, 0, '6', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(7, '2014-11-21 10:33:47', '2014-11-21 10:33:47', NULL, NULL, 0, '7', NULL, NULL, '', 'Standard', 7, 2, 0.39, NULL, '', '', NULL),
(8, '2014-11-21 10:35:15', '2014-11-21 10:35:15', NULL, NULL, 0, '8', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(9, '2014-11-21 10:38:44', '2014-11-21 10:38:44', NULL, NULL, 0, '9', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(10, '2014-11-21 10:40:01', '2014-11-21 10:40:01', NULL, NULL, 0, '10', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(11, '2014-11-22 13:47:20', '2014-11-22 13:47:20', NULL, NULL, 0, '11', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL),
(12, '2014-11-22 14:04:09', '2014-11-22 14:04:09', NULL, NULL, 0, '12', NULL, NULL, '', 'Standard', 7, 1, 1, NULL, '', '', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `quo_devices`
--

INSERT INTO `quo_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `customer_id`, `instrument_id`, `quotationno`, `brand_id`, `quantity`, `model_no`, `range`, `call_location`, `call_type`, `validity`, `unit_price`, `discount`, `department_id`, `account_service`, `total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-11-21 09:55:33', '2014-11-21 10:06:26', NULL, NULL, 0, '1', 'CUS-01-10000005', '1', 'BQS-01-10000025', 1, '1', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, 'PART NO123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(2, '2014-11-21 09:55:33', '2014-11-21 10:10:32', NULL, NULL, 0, '1', 'CUS-01-10000005', '1', 'BQS-01-10000025', 1, '1', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(3, '2014-11-21 09:55:33', '2014-11-21 09:55:33', NULL, NULL, 0, '1', 'CUS-01-10000005', '1', 'BQS-01-10000025', 1, '4', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(4, '2014-11-21 09:55:33', '2014-11-21 09:55:33', NULL, NULL, 0, '1', 'CUS-01-10000005', '1', 'BQS-01-10000025', 1, '4', 'A122', '2', 'Inlab', 'Singlas', 12, '150', '', '2', 'calibration service', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(5, '2014-11-21 10:13:11', '2014-11-21 10:13:11', NULL, NULL, 0, '2', 'CUS-01-10000005', '2', 'BQS-01-10000026', 2, '5', 'T21', '1', 'Inlab', 'Singlas', 12, '80', '', '2', 'calibration service', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(6, '2014-11-21 10:13:11', '2014-11-21 10:13:11', NULL, NULL, 0, '2', 'CUS-01-10000005', '2', 'BQS-01-10000026', 2, '5', 'T21', '1', 'Inlab', 'Singlas', 12, '80', '', '2', 'calibration service', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(7, '2014-11-21 10:13:11', '2014-11-21 10:13:11', NULL, NULL, 0, '2', 'CUS-01-10000005', '2', 'BQS-01-10000026', 2, '5', 'T21', '1', 'Inlab', 'Singlas', 12, '80', '', '2', 'calibration service', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(8, '2014-11-21 10:13:11', '2014-11-21 10:13:11', NULL, NULL, 0, '2', 'CUS-01-10000005', '2', 'BQS-01-10000026', 2, '5', 'T21', '1', 'Inlab', 'Singlas', 12, '80', '', '2', 'calibration service', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(9, '2014-11-21 10:13:11', '2014-11-21 10:13:11', NULL, NULL, 0, '2', 'CUS-01-10000005', '2', 'BQS-01-10000026', 2, '5', 'T21', '1', 'Inlab', 'Singlas', 12, '80', '', '2', 'calibration service', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(10, '2014-11-21 10:19:04', '2014-11-21 10:19:04', NULL, NULL, 0, '3', 'CUS-01-10000008', '1', 'BQS-01-10000027', 1, '4', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(11, '2014-11-21 10:19:04', '2014-11-21 10:19:04', NULL, NULL, 0, '3', 'CUS-01-10000008', '1', 'BQS-01-10000027', 1, '4', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(12, '2014-11-21 10:19:04', '2014-11-21 10:19:04', NULL, NULL, 0, '3', 'CUS-01-10000008', '1', 'BQS-01-10000027', 1, '4', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(13, '2014-11-21 10:19:04', '2014-11-21 10:19:04', NULL, NULL, 0, '3', 'CUS-01-10000008', '1', 'BQS-01-10000027', 1, '4', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(14, '2014-11-21 10:20:25', '2014-11-21 10:20:25', NULL, NULL, 0, '4', 'CUS-01-10000008', '2', 'BQS-01-10000028', 2, '5', 'TG1', '1', 'Inlab', 'Singlas', 12, '75', '', '2', 'calibration service', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(15, '2014-11-21 10:20:25', '2014-11-21 10:20:25', NULL, NULL, 0, '4', 'CUS-01-10000008', '2', 'BQS-01-10000028', 2, '5', 'TG1', '1', 'Inlab', 'Singlas', 12, '75', '', '2', 'calibration service', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(16, '2014-11-21 10:20:25', '2014-11-21 10:20:25', NULL, NULL, 0, '4', 'CUS-01-10000008', '2', 'BQS-01-10000028', 2, '5', 'TG1', '1', 'Inlab', 'Singlas', 12, '75', '', '2', 'calibration service', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(17, '2014-11-21 10:20:25', '2014-11-21 10:20:25', NULL, NULL, 0, '4', 'CUS-01-10000008', '2', 'BQS-01-10000028', 2, '5', 'TG1', '1', 'Inlab', 'Singlas', 12, '75', '', '2', 'calibration service', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(18, '2014-11-21 10:20:25', '2014-11-21 10:20:25', NULL, NULL, 0, '4', 'CUS-01-10000008', '2', 'BQS-01-10000028', 2, '5', 'TG1', '1', 'Inlab', 'Singlas', 12, '75', '', '2', 'calibration service', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(19, '2014-11-21 10:30:40', '2014-11-21 10:30:40', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000029', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(20, '2014-11-21 10:30:40', '2014-11-21 10:30:40', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000029', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(21, '2014-11-21 10:30:40', '2014-11-21 10:30:40', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000029', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(22, '2014-11-21 10:30:40', '2014-11-21 10:30:40', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000029', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(23, '2014-11-21 10:30:40', '2014-11-21 10:30:40', NULL, NULL, 0, '5', 'CUS-01-10000014', '4', 'BQS-01-10000029', 2, '5', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(24, '2014-11-21 10:32:01', '2014-11-21 10:32:01', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000030', 2, '6', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(25, '2014-11-21 10:32:01', '2014-11-21 10:32:01', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000030', 2, '6', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(26, '2014-11-21 10:32:01', '2014-11-21 10:32:01', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000030', 2, '6', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(27, '2014-11-21 10:32:01', '2014-11-21 10:32:01', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000030', 2, '6', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(28, '2014-11-21 10:32:01', '2014-11-21 10:32:01', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000030', 2, '6', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(29, '2014-11-21 10:32:01', '2014-11-21 10:32:01', NULL, NULL, 0, '6', 'CUS-01-10000014', '4', 'BQS-01-10000030', 2, '6', 'yamaha', '3', 'Inlab', 'Singlas', 12, '2', '', '6', 'calibration service', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(30, '2014-11-21 10:33:45', '2014-11-21 10:33:45', NULL, NULL, 0, '7', 'CUS-01-10000017', '5', 'BQS-01-10000031', 4, '5', 'POOODSS', '5', 'Inlab', 'Singlas', 12, '78', '', '1', 'calibration service', '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(31, '2014-11-21 10:33:45', '2014-11-21 10:33:45', NULL, NULL, 0, '7', 'CUS-01-10000017', '5', 'BQS-01-10000031', 4, '5', 'POOODSS', '5', 'Inlab', 'Singlas', 12, '78', '', '1', 'calibration service', '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(32, '2014-11-21 10:33:45', '2014-11-21 10:33:45', NULL, NULL, 0, '7', 'CUS-01-10000017', '5', 'BQS-01-10000031', 4, '5', 'POOODSS', '5', 'Inlab', 'Singlas', 12, '78', '', '1', 'calibration service', '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(33, '2014-11-21 10:33:45', '2014-11-21 10:33:45', NULL, NULL, 0, '7', 'CUS-01-10000017', '5', 'BQS-01-10000031', 4, '5', 'POOODSS', '5', 'Inlab', 'Singlas', 12, '78', '', '1', 'calibration service', '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(34, '2014-11-21 10:33:45', '2014-11-21 10:33:45', NULL, NULL, 0, '7', 'CUS-01-10000017', '5', 'BQS-01-10000031', 4, '5', 'POOODSS', '5', 'Inlab', 'Singlas', 12, '78', '', '1', 'calibration service', '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(35, '2014-11-21 10:35:12', '2014-11-21 10:35:12', NULL, NULL, 0, '8', 'CUS-01-10000017', '1', 'BQS-01-10000032', 1, '6', 'F944', '2', 'Inlab', 'Singlas', 12, '45', '', '2', 'calibration service', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(36, '2014-11-21 10:35:12', '2014-11-21 10:35:12', NULL, NULL, 0, '8', 'CUS-01-10000017', '1', 'BQS-01-10000032', 1, '6', 'F944', '2', 'Inlab', 'Singlas', 12, '45', '', '2', 'calibration service', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(37, '2014-11-21 10:35:12', '2014-11-21 10:35:12', NULL, NULL, 0, '8', 'CUS-01-10000017', '1', 'BQS-01-10000032', 1, '6', 'F944', '2', 'Inlab', 'Singlas', 12, '45', '', '2', 'calibration service', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(38, '2014-11-21 10:35:12', '2014-11-21 10:35:12', NULL, NULL, 0, '8', 'CUS-01-10000017', '1', 'BQS-01-10000032', 1, '6', 'F944', '2', 'Inlab', 'Singlas', 12, '45', '', '2', 'calibration service', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(39, '2014-11-21 10:35:12', '2014-11-21 10:35:12', NULL, NULL, 0, '8', 'CUS-01-10000017', '1', 'BQS-01-10000032', 1, '6', 'F944', '2', 'Inlab', 'Singlas', 12, '45', '', '2', 'calibration service', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(40, '2014-11-21 10:35:12', '2014-11-21 10:35:12', NULL, NULL, 0, '8', 'CUS-01-10000017', '1', 'BQS-01-10000032', 1, '6', 'F944', '2', 'Inlab', 'Singlas', 12, '45', '', '2', 'calibration service', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(41, '2014-11-21 10:38:41', '2014-11-21 10:38:41', NULL, NULL, 0, '9', 'CUS-01-10000011', '4', 'BQS-01-10000033', 2, '5', 'ABD - #23', '3', 'Inlab', 'Singlas', 12, '98', '', '6', 'calibration service', '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(42, '2014-11-21 10:38:41', '2014-11-21 10:38:41', NULL, NULL, 0, '9', 'CUS-01-10000011', '4', 'BQS-01-10000033', 2, '5', 'ABD - #23', '3', 'Inlab', 'Singlas', 12, '98', '', '6', 'calibration service', '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(43, '2014-11-21 10:38:41', '2014-11-21 10:38:41', NULL, NULL, 0, '9', 'CUS-01-10000011', '4', 'BQS-01-10000033', 2, '5', 'ABD - #23', '3', 'Inlab', 'Singlas', 12, '98', '', '6', 'calibration service', '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(44, '2014-11-21 10:38:41', '2014-11-21 10:38:41', NULL, NULL, 0, '9', 'CUS-01-10000011', '4', 'BQS-01-10000033', 2, '5', 'ABD - #23', '3', 'Inlab', 'Singlas', 12, '98', '', '6', 'calibration service', '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(45, '2014-11-21 10:38:41', '2014-11-21 10:38:41', NULL, NULL, 0, '9', 'CUS-01-10000011', '4', 'BQS-01-10000033', 2, '5', 'ABD - #23', '3', 'Inlab', 'Singlas', 12, '98', '', '6', 'calibration service', '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(46, '2014-11-21 10:39:57', '2014-11-21 10:39:57', NULL, NULL, 0, '10', 'CUS-01-10000011', '5', 'BQS-01-10000034', 4, '5', 'TEST - 1212', '5', 'Inlab', 'Singlas', 12, '32', '', '1', 'calibration service', '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(47, '2014-11-21 10:39:57', '2014-11-21 10:39:57', NULL, NULL, 0, '10', 'CUS-01-10000011', '5', 'BQS-01-10000034', 4, '5', 'TEST - 1212', '5', 'Inlab', 'Singlas', 12, '32', '', '1', 'calibration service', '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(48, '2014-11-21 10:39:57', '2014-11-21 10:39:57', NULL, NULL, 0, '10', 'CUS-01-10000011', '5', 'BQS-01-10000034', 4, '5', 'TEST - 1212', '5', 'Inlab', 'Singlas', 12, '32', '', '1', 'calibration service', '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(49, '2014-11-21 10:39:57', '2014-11-21 10:39:57', NULL, NULL, 0, '10', 'CUS-01-10000011', '5', 'BQS-01-10000034', 4, '5', 'TEST - 1212', '5', 'Inlab', 'Singlas', 12, '32', '', '1', 'calibration service', '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(50, '2014-11-21 10:39:57', '2014-11-21 10:39:57', NULL, NULL, 0, '10', 'CUS-01-10000011', '5', 'BQS-01-10000034', 4, '5', 'TEST - 1212', '5', 'Inlab', 'Singlas', 12, '32', '', '1', 'calibration service', '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(51, '2014-11-22 13:47:17', '2014-11-22 13:47:17', NULL, NULL, 0, '11', 'CUS-01-10000008', '1', 'BQS-01-10000035', 1, '6', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(52, '2014-11-22 13:47:17', '2014-11-22 13:47:17', NULL, NULL, 0, '11', 'CUS-01-10000008', '1', 'BQS-01-10000035', 1, '6', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(53, '2014-11-22 13:47:17', '2014-11-22 13:47:17', NULL, NULL, 0, '11', 'CUS-01-10000008', '1', 'BQS-01-10000035', 1, '6', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(54, '2014-11-22 13:47:17', '2014-11-22 13:47:17', NULL, NULL, 0, '11', 'CUS-01-10000008', '1', 'BQS-01-10000035', 1, '6', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(55, '2014-11-22 13:47:17', '2014-11-22 13:47:17', NULL, NULL, 0, '11', 'CUS-01-10000008', '1', 'BQS-01-10000035', 1, '6', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(56, '2014-11-22 13:47:17', '2014-11-22 13:47:17', NULL, NULL, 0, '11', 'CUS-01-10000008', '1', 'BQS-01-10000035', 1, '6', 'aa', '2', 'Inlab', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(57, '2014-11-22 14:04:07', '2014-11-22 14:04:32', NULL, NULL, 0, '12', 'CUS-01-10000008', '1', 'BQS-01-10000036', 1, '1', 'aa', '2', 'onsite', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(58, '2014-11-22 14:04:07', '2014-11-22 14:04:26', NULL, NULL, 0, '12', 'CUS-01-10000008', '1', 'BQS-01-10000036', 1, '1', 'aa', '2', 'onsite', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(59, '2014-11-22 14:04:07', '2014-11-22 14:04:37', NULL, NULL, 0, '12', 'CUS-01-10000008', '1', 'BQS-01-10000036', 1, '1', 'aa', '2', 'onsite', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(60, '2014-11-22 14:04:07', '2014-11-22 14:04:41', NULL, NULL, 0, '12', 'CUS-01-10000008', '1', 'BQS-01-10000036', 1, '1', 'aa', '2', 'onsite', 'Singlas', 12, '34', '', '2', 'calibration service', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0);

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
(1, 'CUS-01-10000031', 'TAG-01-10000048', 'CGRU-01-10000045', 'BIT-01-10000001', 'BQS-01-10000036', 'BSO-01-10000038', 'BDO-01-10000069', '8', 'CPO-01-10000032', 'BPI-01-10000002', 'BSTRA-01-10000152', 'BRF-01-10000004', 'BPO-01-10000001', 'OSS-01-10000020');

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
('BSO-01-10000026', '2014-11-21 10:40:44', '2014-11-21 10:40:44', 1, NULL, 0, 'BSO-01-10000026', 'BSTRA-01-10000104', 1, '1', 'BQS-01-10000025', 'CUS-01-10000005', NULL, '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', '21-November-14', 'PO-01-10000022', 4, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 1, 0),
('BSO-01-10000027', '2014-11-21 10:41:02', '2014-11-21 10:41:02', 1, NULL, 0, 'BSO-01-10000027', 'BSTRA-01-10000106', 1, '2', 'BQS-01-10000026', 'CUS-01-10000005', NULL, '41 Senoko Drive,\r\nSingapore 758 249.', NULL, '1', '6666 1121', '6458 4400', 'mohan@bsaquatierra.com', '21-November-14', 'CPO-01-10000023', NULL, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-01-10000028', '2014-11-21 10:41:16', '2014-11-21 10:41:16', 1, NULL, 0, 'BSO-01-10000028', 'BSTRA-01-10000108', 1, '3', 'BQS-01-10000027', 'CUS-01-10000008', NULL, '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', '21-November-14', 'PO-01-10000024', 4, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 0, 0),
('BSO-01-10000029', '2014-11-21 10:41:35', '2014-11-21 10:41:35', 1, NULL, 0, 'BSO-01-10000029', 'BSTRA-01-10000110', 1, '4', 'BQS-01-10000028', 'CUS-01-10000008', NULL, '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', '21-November-14', 'CPO-01-10000025', NULL, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 0, 0),
('BSO-01-10000030', '2014-11-21 10:41:50', '2014-11-21 10:41:50', 1, NULL, 0, 'BSO-01-10000030', 'BSTRA-01-10000112', 1, '5', 'BQS-01-10000029', 'CUS-01-10000014', NULL, '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', '21-November-14', 'CPO-01-10000026', NULL, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-01-10000031', '2014-11-21 10:42:05', '2014-11-21 10:42:05', 1, NULL, 0, 'BSO-01-10000031', 'BSTRA-01-10000114', 1, '6', 'BQS-01-10000030', 'CUS-01-10000014', NULL, '4 senoko drive', NULL, '4', '67856967', '68754356', 'christine@goodrich.com.sg', '21-November-14', 'CPO-01-10000027', NULL, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-01-10000032', '2014-11-21 10:42:18', '2014-11-21 10:42:18', 1, NULL, 0, 'BSO-01-10000032', 'BSTRA-01-10000116', 1, '7', 'BQS-01-10000031', 'CUS-01-10000017', NULL, '4 senoko drive\r\nsingapore 876908', NULL, '7', '6545709', '', 'kirana@goog.com', '21-November-14', 'CPO-01-10000028', NULL, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 0, 0),
('BSO-01-10000033', '2014-11-21 10:42:32', '2014-11-21 10:42:32', 1, NULL, 0, 'BSO-01-10000033', 'BSTRA-01-10000118', 1, '8', 'BQS-01-10000032', 'CUS-01-10000017', NULL, '4 senoko drive\r\nsingapore 876908', NULL, '7', '6545709', '', 'kirana@goog.com', '21-November-14', 'PO-01-10000029', 6, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 1, 0),
('BSO-01-10000034', '2014-11-21 10:42:46', '2014-11-21 10:42:46', 1, NULL, 0, 'BSO-01-10000034', 'BSTRA-01-10000120', 1, '9', 'BQS-01-10000033', 'CUS-01-10000011', NULL, '32 Tuas\r\nSingapore 256245', NULL, '3', '6363 2512', '6352 5214', 'Jon@abc.com', '21-November-14', 'CPO-01-10000030', NULL, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-01-10000035', '2014-11-21 10:42:58', '2014-11-21 10:42:58', 1, NULL, 0, 'BSO-01-10000035', 'BSTRA-01-10000122', 1, '10', 'BQS-01-10000034', 'CUS-01-10000011', NULL, '32 Tuas\r\nSingapore 256245', NULL, '3', '6363 2512', '6352 5214', 'Jon@abc.com', '21-November-14', 'CPO-01-10000031', NULL, NULL, '21-November-14', '25-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-01-10000036', '2014-11-22 13:47:54', '2014-11-22 13:47:54', 1, NULL, 0, 'BSO-01-10000036', 'BSTRA-01-10000127', 1, '11', 'BQS-01-10000035', 'CUS-01-10000008', NULL, '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', '22-November-14', 'CPO-01-10000032', NULL, NULL, '22-November-14', '26-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 0, 0),
('BSO-01-10000037', '2014-11-22 13:48:21', '2014-11-22 13:48:21', 1, NULL, 0, 'BSO-01-10000037', 'BSTRA-01-10000127', 1, '11', 'BQS-01-10000035', 'CUS-01-10000008', NULL, '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', '22-November-14', 'CPO-01-10000032', NULL, NULL, '22-November-14', '26-November-14', NULL, 0, '', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 0, 0),
('BSO-01-10000038', '2014-11-23 05:03:59', '2014-11-23 05:03:59', 1, NULL, 0, 'BSO-01-10000038', 'BSTRA-01-10000130', 1, '12', 'BQS-01-10000036', 'CUS-01-10000008', NULL, '41 Senoko Drive\r\nSingapore 758249', NULL, '2', '6666 1122', '6458 4401', 'erick@abc.com', '23-November-14', 'PO12356', NULL, NULL, '23-November-14', '27-November-14', NULL, 0, '', 1, NULL, 'Manual', 0, 0, NULL, NULL, '1', 0, 1, 0, 1, 0, 0, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `sal_description`
--

INSERT INTO `sal_description` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quo_ins_id`, `salesorder_id`, `quotation_id`, `quotationno`, `customer_id`, `sales_quantity`, `instrument_id`, `model_no`, `brand_id`, `sales_range`, `sales_calllocation`, `sales_calltype`, `sales_validity`, `sales_unitprice`, `sales_discount`, `department_id`, `sales_accountservice`, `sales_titles`, `sales_total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `pending`, `processing`, `checking`, `shipping`, `is_deliveryorder_created`, `ready_deliver`, `is_delivered`, `assign_to`, `status`, `is_approved`, `delay`, `is_approved_lab`, `is_deleted`) VALUES
(1, '2014-11-21 10:40:33', '2014-11-22 09:40:52', NULL, NULL, 0, NULL, 'BSO-01-10000026', 1, 'BQS-01-10000025', 'CUS-01-10000005', '1', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, '150', NULL, 'PART NO123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(2, '2014-11-21 10:40:33', '2014-11-22 09:40:52', NULL, NULL, 0, NULL, 'BSO-01-10000026', 1, 'BQS-01-10000025', 'CUS-01-10000005', '1', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(3, '2014-11-21 10:40:33', '2014-11-22 09:40:52', NULL, NULL, 0, NULL, 'BSO-01-10000026', 1, 'BQS-01-10000025', 'CUS-01-10000005', '4', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(4, '2014-11-21 10:40:33', '2014-11-22 09:40:52', NULL, NULL, 0, NULL, 'BSO-01-10000026', 1, 'BQS-01-10000025', 'CUS-01-10000005', '4', 1, 'A122', 1, '2', 'Inlab', 'Singlas', 12, '150', '', 2, 'calibration service', NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(5, '2014-11-21 10:40:54', '2014-11-21 10:40:54', NULL, NULL, 0, NULL, 'BSO-01-10000027', 2, 'BQS-01-10000026', 'CUS-01-10000005', '5', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(6, '2014-11-21 10:40:54', '2014-11-21 10:40:54', NULL, NULL, 0, NULL, 'BSO-01-10000027', 2, 'BQS-01-10000026', 'CUS-01-10000005', '5', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(7, '2014-11-21 10:40:54', '2014-11-21 10:40:54', NULL, NULL, 0, NULL, 'BSO-01-10000027', 2, 'BQS-01-10000026', 'CUS-01-10000005', '5', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(8, '2014-11-21 10:40:54', '2014-11-21 10:40:54', NULL, NULL, 0, NULL, 'BSO-01-10000027', 2, 'BQS-01-10000026', 'CUS-01-10000005', '5', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(9, '2014-11-21 10:40:54', '2014-11-21 10:40:54', NULL, NULL, 0, NULL, 'BSO-01-10000027', 2, 'BQS-01-10000026', 'CUS-01-10000005', '5', 2, 'T21', 2, '1', 'Inlab', 'Singlas', 12, '80', '', 2, 'calibration service', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(10, '2014-11-21 10:41:09', '2014-11-22 12:42:04', NULL, NULL, 0, NULL, 'BSO-01-10000028', 3, 'BQS-01-10000027', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(11, '2014-11-21 10:41:09', '2014-11-22 12:42:04', NULL, NULL, 0, NULL, 'BSO-01-10000028', 3, 'BQS-01-10000027', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(12, '2014-11-21 10:41:09', '2014-11-22 12:42:04', NULL, NULL, 0, NULL, 'BSO-01-10000028', 3, 'BQS-01-10000027', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(13, '2014-11-21 10:41:09', '2014-11-22 12:42:04', NULL, NULL, 0, NULL, 'BSO-01-10000028', 3, 'BQS-01-10000027', 'CUS-01-10000008', '4', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(14, '2014-11-21 10:41:25', '2014-11-23 05:00:13', NULL, NULL, 0, NULL, 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(15, '2014-11-21 10:41:25', '2014-11-23 05:00:13', NULL, NULL, 0, NULL, 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(16, '2014-11-21 10:41:25', '2014-11-23 05:00:13', NULL, NULL, 0, NULL, 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(17, '2014-11-21 10:41:25', '2014-11-23 05:00:13', NULL, NULL, 0, NULL, 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(18, '2014-11-21 10:41:25', '2014-11-23 05:00:13', NULL, NULL, 0, NULL, 'BSO-01-10000029', 4, 'BQS-01-10000028', 'CUS-01-10000008', '5', 2, 'TG1', 2, '1', 'Inlab', 'Singlas', 12, '75', '', 2, 'calibration service', NULL, '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(19, '2014-11-21 10:41:43', '2014-11-21 10:41:43', NULL, NULL, 0, NULL, 'BSO-01-10000030', 5, 'BQS-01-10000029', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(20, '2014-11-21 10:41:43', '2014-11-21 10:41:43', NULL, NULL, 0, NULL, 'BSO-01-10000030', 5, 'BQS-01-10000029', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(21, '2014-11-21 10:41:43', '2014-11-21 10:41:43', NULL, NULL, 0, NULL, 'BSO-01-10000030', 5, 'BQS-01-10000029', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(22, '2014-11-21 10:41:43', '2014-11-21 10:41:43', NULL, NULL, 0, NULL, 'BSO-01-10000030', 5, 'BQS-01-10000029', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(23, '2014-11-21 10:41:43', '2014-11-21 10:41:43', NULL, NULL, 0, NULL, 'BSO-01-10000030', 5, 'BQS-01-10000029', 'CUS-01-10000014', '5', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(24, '2014-11-21 10:41:58', '2014-11-21 10:41:58', NULL, NULL, 0, NULL, 'BSO-01-10000031', 6, 'BQS-01-10000030', 'CUS-01-10000014', '6', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(25, '2014-11-21 10:41:58', '2014-11-21 10:41:58', NULL, NULL, 0, NULL, 'BSO-01-10000031', 6, 'BQS-01-10000030', 'CUS-01-10000014', '6', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(26, '2014-11-21 10:41:58', '2014-11-21 10:41:58', NULL, NULL, 0, NULL, 'BSO-01-10000031', 6, 'BQS-01-10000030', 'CUS-01-10000014', '6', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(27, '2014-11-21 10:41:58', '2014-11-21 10:41:58', NULL, NULL, 0, NULL, 'BSO-01-10000031', 6, 'BQS-01-10000030', 'CUS-01-10000014', '6', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(28, '2014-11-21 10:41:58', '2014-11-21 10:41:58', NULL, NULL, 0, NULL, 'BSO-01-10000031', 6, 'BQS-01-10000030', 'CUS-01-10000014', '6', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(29, '2014-11-21 10:41:58', '2014-11-21 10:41:58', NULL, NULL, 0, NULL, 'BSO-01-10000031', 6, 'BQS-01-10000030', 'CUS-01-10000014', '6', 4, 'yamaha', 2, '3', 'Inlab', 'Singlas', 12, '2', '', 6, 'calibration service', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(30, '2014-11-21 10:42:12', '2014-11-23 07:59:42', NULL, NULL, 0, NULL, 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(31, '2014-11-21 10:42:12', '2014-11-23 07:59:42', NULL, NULL, 0, NULL, 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(32, '2014-11-21 10:42:12', '2014-11-23 07:59:42', NULL, NULL, 0, NULL, 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(33, '2014-11-21 10:42:12', '2014-11-23 07:59:42', NULL, NULL, 0, NULL, 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(34, '2014-11-21 10:42:12', '2014-11-23 07:59:42', NULL, NULL, 0, NULL, 'BSO-01-10000032', 7, 'BQS-01-10000031', 'CUS-01-10000017', '5', 5, 'POOODSS', 4, '5', 'Inlab', 'Singlas', 12, '78', '', 1, 'calibration service', NULL, '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(35, '2014-11-21 10:42:25', '2014-11-23 08:53:55', NULL, NULL, 0, NULL, 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(36, '2014-11-21 10:42:25', '2014-11-23 08:53:55', NULL, NULL, 0, NULL, 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(37, '2014-11-21 10:42:25', '2014-11-23 08:53:55', NULL, NULL, 0, NULL, 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(38, '2014-11-21 10:42:25', '2014-11-23 08:53:55', NULL, NULL, 0, NULL, 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(39, '2014-11-21 10:42:25', '2014-11-23 08:53:55', NULL, NULL, 0, NULL, 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(40, '2014-11-21 10:42:25', '2014-11-23 08:53:55', NULL, NULL, 0, NULL, 'BSO-01-10000033', 8, 'BQS-01-10000032', 'CUS-01-10000017', '6', 1, 'F944', 1, '2', 'Inlab', 'Singlas', 12, '45', '', 2, 'calibration service', NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(41, '2014-11-21 10:42:39', '2014-11-21 10:42:39', NULL, NULL, 0, NULL, 'BSO-01-10000034', 9, 'BQS-01-10000033', 'CUS-01-10000011', '5', 4, 'ABD - #23', 2, '3', 'Inlab', 'Singlas', 12, '98', '', 6, 'calibration service', NULL, '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(42, '2014-11-21 10:42:39', '2014-11-21 10:42:39', NULL, NULL, 0, NULL, 'BSO-01-10000034', 9, 'BQS-01-10000033', 'CUS-01-10000011', '5', 4, 'ABD - #23', 2, '3', 'Inlab', 'Singlas', 12, '98', '', 6, 'calibration service', NULL, '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(43, '2014-11-21 10:42:39', '2014-11-21 10:42:39', NULL, NULL, 0, NULL, 'BSO-01-10000034', 9, 'BQS-01-10000033', 'CUS-01-10000011', '5', 4, 'ABD - #23', 2, '3', 'Inlab', 'Singlas', 12, '98', '', 6, 'calibration service', NULL, '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(44, '2014-11-21 10:42:39', '2014-11-21 10:42:39', NULL, NULL, 0, NULL, 'BSO-01-10000034', 9, 'BQS-01-10000033', 'CUS-01-10000011', '5', 4, 'ABD - #23', 2, '3', 'Inlab', 'Singlas', 12, '98', '', 6, 'calibration service', NULL, '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(45, '2014-11-21 10:42:39', '2014-11-21 10:42:39', NULL, NULL, 0, NULL, 'BSO-01-10000034', 9, 'BQS-01-10000033', 'CUS-01-10000011', '5', 4, 'ABD - #23', 2, '3', 'Inlab', 'Singlas', 12, '98', '', 6, 'calibration service', NULL, '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(46, '2014-11-21 10:42:52', '2014-11-21 10:42:52', NULL, NULL, 0, NULL, 'BSO-01-10000035', 10, 'BQS-01-10000034', 'CUS-01-10000011', '5', 5, 'TEST - 1212', 4, '5', 'Inlab', 'Singlas', 12, '32', '', 1, 'calibration service', NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(47, '2014-11-21 10:42:52', '2014-11-21 10:42:52', NULL, NULL, 0, NULL, 'BSO-01-10000035', 10, 'BQS-01-10000034', 'CUS-01-10000011', '5', 5, 'TEST - 1212', 4, '5', 'Inlab', 'Singlas', 12, '32', '', 1, 'calibration service', NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(48, '2014-11-21 10:42:52', '2014-11-21 10:42:52', NULL, NULL, 0, NULL, 'BSO-01-10000035', 10, 'BQS-01-10000034', 'CUS-01-10000011', '5', 5, 'TEST - 1212', 4, '5', 'Inlab', 'Singlas', 12, '32', '', 1, 'calibration service', NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(49, '2014-11-21 10:42:52', '2014-11-21 10:42:52', NULL, NULL, 0, NULL, 'BSO-01-10000035', 10, 'BQS-01-10000034', 'CUS-01-10000011', '5', 5, 'TEST - 1212', 4, '5', 'Inlab', 'Singlas', 12, '32', '', 1, 'calibration service', NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(50, '2014-11-21 10:42:52', '2014-11-21 10:42:52', NULL, NULL, 0, NULL, 'BSO-01-10000035', 10, 'BQS-01-10000034', 'CUS-01-10000011', '5', 5, 'TEST - 1212', 4, '5', 'Inlab', 'Singlas', 12, '32', '', 1, 'calibration service', NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(51, '2014-11-22 13:47:42', '2014-11-22 13:50:07', NULL, NULL, 0, NULL, 'BSO-01-10000036', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(52, '2014-11-22 13:47:42', '2014-11-22 13:50:07', NULL, NULL, 0, NULL, 'BSO-01-10000036', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(53, '2014-11-22 13:47:42', '2014-11-22 13:50:07', NULL, NULL, 0, NULL, 'BSO-01-10000036', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(54, '2014-11-22 13:47:42', '2014-11-23 05:20:47', NULL, NULL, 0, NULL, 'BSO-01-10000037', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(55, '2014-11-22 13:47:42', '2014-11-23 05:20:47', NULL, NULL, 0, NULL, 'BSO-01-10000037', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(56, '2014-11-22 13:47:42', '2014-11-23 05:20:47', NULL, NULL, 0, NULL, 'BSO-01-10000037', 11, 'BQS-01-10000035', 'CUS-01-10000008', '6', 1, 'aa', 1, '2', 'Inlab', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(57, '2014-11-23 05:03:55', '2014-11-23 06:12:37', NULL, NULL, 0, NULL, 'BSO-01-10000038', 12, 'BQS-01-10000036', 'CUS-01-10000008', '1', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(58, '2014-11-23 05:03:55', '2014-11-23 06:12:37', NULL, NULL, 0, NULL, 'BSO-01-10000038', 12, 'BQS-01-10000036', 'CUS-01-10000008', '1', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 1, '0', 0, NULL, 1, '1', NULL, 1, 0),
(59, '2014-11-23 05:03:55', '2014-11-23 06:12:37', NULL, NULL, 0, NULL, 'BSO-01-10000038', 12, 'BQS-01-10000036', 'CUS-01-10000008', '1', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(60, '2014-11-23 05:03:55', '2014-11-23 06:12:37', NULL, NULL, 0, NULL, 'BSO-01-10000038', 12, 'BQS-01-10000036', 'CUS-01-10000008', '1', 1, 'aa', 1, '2', 'onsite', 'Singlas', 12, '34', '', 2, 'calibration service', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0);

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
