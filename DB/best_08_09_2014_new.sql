-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2014 at 03:25 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `additionalcharges`
--

INSERT INTO `additionalcharges` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `additionalcharge`, `description`, `status`, `is_deleted`) VALUES
(1, NULL, NULL, 0, 0, 0, 'Transportation', 'Transportation', 1, 0),
(3, NULL, NULL, 0, 0, 0, 'Special Service Charge', 'Special Service Charge', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `assignedto`, `description`, `status`, `is_deleted`) VALUES
(3, NULL, '2014-07-24 10:36:50', 0, 0, 0, 'Mr. Nazir', 'Mr.Nazir', 1, 0),
(4, NULL, NULL, 0, 0, 0, 'Mr.Nizam', 'Mr.Nizam', 1, 0);

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
(2, NULL, '2014-07-04 06:35:04', NULL, NULL, 0, 'Singapore', '41 Senoko Drive\r\nSingapore 758249\r\nTel.+65 6458 4411\r\nFax.+65 64584400\r\nwww.bestandards.com', '+65 6458 4411', '+65 64584400', 'http://www.bestandards.com/', '200510697M', 'M200510697', 1, 1, '7.00', 1, 0),
(3, '2014-08-20 11:04:04', '2014-08-20 11:13:36', NULL, NULL, 0, 'Malaysia', 'Malaysiacc', '22222222222', '2222222222222', 'www.west.com', '9578548521356485462', '979643233256', 0, 1, 'ee', 1, 0),
(4, '2014-08-20 13:06:59', '2014-08-20 13:07:13', NULL, NULL, 0, 'India', 'india', '91719197181', '018-37338373', 'www.westsdfdsf.com', '9578548521356485462', '979643233256', 0, 2, 'ee', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `brandname`, `branddescription`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-05-23 07:42:56', '2014-08-21 15:23:58', NULL, NULL, 0, 'Henry', 'About Brand Description', 1, 0, 0),
(2, '2014-08-21 15:23:42', '2014-08-21 15:23:42', NULL, NULL, 0, 'Gmbh', 'Brand Gmbh', 1, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bs_doinvoices`
--

INSERT INTO `bs_doinvoices` (`id`, `created`, `modified`, `track_id`, `deliveryorderno`, `deliveryorder_data`, `do_count`, `status`) VALUES
(1, '2014-09-06 07:23:00', '2014-09-06 07:23:00', NULL, 'BDO-01-10000039', 'a:1:{s:8:"Clientpo";a:4:{s:13:"Purchaseorder";a:3:{s:15:"CPO-01-10000113";s:0:"";s:6:"PO-123";s:0:"";s:5:"PO-13";s:0:"";}s:9:"Quotation";a:2:{s:12:"quotation_id";s:15:"BSQ-01-10000602";s:15:"quotation_count";s:1:"6";}s:10:"Salesorder";a:2:{s:13:"salesorder_id";s:15:"BSO-01-10000623";s:16:"salesorder_count";s:2:"18";}s:13:"Deliveryorder";a:2:{s:16:"Deliveryorder_id";s:15:"BDO-01-10000039";s:20:"DelDescription_count";s:1:"1";}}}', 1, 1),
(2, '2014-09-06 09:04:04', '2014-09-06 09:04:04', NULL, 'BDO-01-10000039', 'a:1:{s:8:"Clientpo";a:3:{s:13:"Purchaseorder";a:1:{s:15:"CPO-01-10000113";s:1:"1";}s:9:"Quotation";a:1:{s:15:"BSQ-01-10000602";s:1:"6";}s:10:"Salesorder";a:1:{s:15:"BSO-01-10000623";s:2:"18";}}}', 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bs_poinvoices`
--

INSERT INTO `bs_poinvoices` (`id`, `created`, `modified`, `track_id`, `clientpo_number`, `clientpo_data`, `po_count`, `status`) VALUES
(1, '2014-08-26 10:07:36', '2014-08-26 10:07:36', NULL, 'PO-01-10000113', 'a:1:{s:8:"Clientpo";a:1:{s:9:"Quotation";a:1:{s:15:"BSQ-01-10000534";s:1:"2";}}}', NULL, 1),
(2, '2014-09-03 15:47:24', '2014-09-03 15:47:24', NULL, 'PO1235689', 'a:1:{s:8:"Clientpo";a:1:{s:9:"Quotation";a:1:{s:15:"BSQ-01-10000602";s:1:"6";}}}', NULL, 1),
(3, '2014-09-07 18:29:22', '2014-09-07 18:29:22', NULL, 'asasa', 'a:1:{s:8:"Clientpo";a:1:{s:9:"Quotation";a:1:{s:15:"BSQ-01-10000602";s:1:"6";}}}', NULL, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bs_qoinvoices`
--

INSERT INTO `bs_qoinvoices` (`id`, `created`, `modified`, `track_id`, `quotationno`, `quotation_data`, `qo_count`, `status`) VALUES
(1, '2014-09-07 13:53:11', '2014-09-07 13:53:11', NULL, 'BSQ-01-10000609', 'a:1:{s:8:"Clientpo";a:2:{s:13:"Purchaseorder";a:3:{s:15:"CPO-01-10000135";s:1:"4";s:6:"PO-234";s:1:"2";s:6:"PO-545";s:1:"5";}s:9:"Quotation";a:1:{s:15:"BSQ-01-10000609";s:1:"6";}}}', 6, 1),
(2, '2014-09-07 13:58:48', '2014-09-07 13:58:48', NULL, 'BSQ-01-10000609', 'a:1:{s:8:"Clientpo";a:2:{s:13:"Purchaseorder";a:3:{s:15:"CPO-01-10000135";s:1:"4";s:14:"PO-01-10000135";s:1:"4";s:12:"PO-01-100004";s:1:"5";}s:9:"Quotation";a:1:{s:15:"BSQ-01-10000609";s:1:"6";}}}', 6, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bs_soinvoices`
--

INSERT INTO `bs_soinvoices` (`id`, `created`, `modified`, `track_id`, `salesorder_id`, `salesorder_data`, `so_count`, `status`) VALUES
(1, '2014-09-06 06:28:16', '2014-09-06 06:28:16', NULL, 'BSO-01-10000623', 'a:1:{s:8:"Clientpo";a:4:{s:8:"Customer";a:1:{s:11:"Customer id";s:15:"CUS-01-10000123";}s:9:"Quotation";a:1:{s:15:"BSQ-01-10000602";s:2:"18";}s:13:"Purchaseorder";a:3:{s:14:"PO-01-10000115";s:2:"10";s:6:"PO-123";s:1:"4";s:5:"PO-14";s:1:"4";}s:10:"Salesorder";a:1:{s:15:"BSO-01-10000623";s:2:"18";}}}', '18', 1),
(2, '2014-09-06 06:33:19', '2014-09-06 06:33:19', NULL, 'BSO-01-10000623', 'a:1:{s:8:"Clientpo";a:4:{s:8:"Customer";a:1:{s:11:"Customer id";s:15:"CUS-01-10000123";}s:9:"Quotation";a:1:{s:15:"BSQ-01-10000602";s:2:"18";}s:13:"Purchaseorder";a:3:{s:14:"PO-01-10000115";s:2:"10";s:6:"PO-456";s:1:"4";s:6:"PO-674";s:1:"4";}s:10:"Salesorder";a:1:{s:15:"BSO-01-10000623";s:2:"18";}}}', '18', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=11 ;

--
-- Dumping data for table `candds`
--

INSERT INTO `candds` (`id`, `created`, `modified`, `canddno`, `readytodeliver_items_id`, `collection_delivery_id`, `cd_date`, `purpose`, `customer_id`, `branch_id`, `customername`, `Contactpersoninfo_id`, `assign_id`, `customer_address`, `address_id`, `phone`, `remarks`, `is_approval_date`, `is_approved`, `is_jobcompleted`, `status`, `is_deleted`) VALUES
(9, '2014-09-07 14:09:11', '2014-09-07 14:09:11', NULL, NULL, NULL, '07-September-14', 'Collection', 'CUS-01-10000123', NULL, 'EA SPORT PVT LTD ( San Francisco ) ', 1, 3, 'rr', 0, '9842618074Ram', 'test remarks', NULL, '0', 0, 0, 0),
(10, '2014-09-07 14:10:38', '2014-09-07 14:10:38', NULL, NULL, NULL, '07-September-14', 'Collection', 'CUS-01-10000121', NULL, 'DAV IND PVT LTD ( INDIA ) ', 1, 3, 'reg', 0, '12', 'test remark', NULL, '0', 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `country`, `countrycode`, `status`, `is_deleted`) VALUES
(32, NULL, NULL, NULL, NULL, 0, 'Singapore', 'SG', 1, 0),
(33, NULL, NULL, NULL, NULL, 0, 'Malaysia', 'MY', 1, 0),
(34, NULL, NULL, NULL, NULL, 0, 'India', 'IN', 1, 0),
(35, '2014-08-20 11:52:34', '2014-08-20 11:52:34', NULL, NULL, 0, '', '', 1, 1),
(36, '2014-08-20 11:55:50', '2014-08-20 11:55:50', NULL, NULL, 0, '', '', 1, 1),
(37, '2014-08-20 11:58:54', '2014-08-20 11:58:54', NULL, NULL, 0, '', '', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country_id`, `symbol`, `currencycode`, `exchangerate`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `is_deleted`) VALUES
(1, 32, '$', 'SGD', 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(2, 34, 'Rs', 'INR', 1, 0, NULL, NULL, NULL, NULL, 0, 0),
(3, 33, 'RM', 'MYR', 2.3, 1, NULL, NULL, NULL, NULL, 0, 0);

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

INSERT INTO `customers` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customergroup_id`, `tag_id`, `branch_id`, `tag_name`, `customername`, `postalcode`, `phone`, `fax`, `industry_id`, `location_id`, `customertype`, `requirements`, `paymentterm_id`, `priority_id`, `calibrationtype`, `invoice_type_id`, `deliveryordertype_id`, `tag`, `acknowledgement_type_id`, `cus_salespeople_count`, `cus_referedby_count`, `is_default`, `is_approved`, `is_approved_date`, `is_approved_by`, `status`, `is_deleted`) VALUES
('CUS-01-10000121', '2014-08-26 06:53:10', '2014-09-07 18:18:12', NULL, NULL, 0, 'CGRU-01-10000058', 'TAG-01-10000083', NULL, 'INDIA', 'DAV IND PVT LTD', '657567', '9865456456', '45643657658758554', 1, 3, 'Customer', 'req', 1, '1', 'Singlas', '1', '1', NULL, 1, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000123', '2014-08-26 10:16:44', '2014-09-06 09:32:31', NULL, NULL, 0, 'CGRU-01-10000060', 'TAG-01-10000085', NULL, 'San Francisco', 'EA SPORT PVT LTD', '600001', '9566633605', '12345689', 1, 3, 'Supplier', 'res', 1, '1', 'Singlas', '2', '1', NULL, 1, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000167', '2014-09-02 10:16:34', '2014-09-02 10:16:34', NULL, NULL, 0, 'CGRU-01-10000058', 'TAG-01-10000129', NULL, '', 'DAV IND PVT LTD', '', '', '', NULL, NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, 1),
('CUS-01-10000169', '2014-09-02 10:19:06', '2014-09-02 10:19:06', NULL, NULL, 0, 'CGRU-01-10000058', 'TAG-01-10000131', NULL, '', 'DAV IND PVT LTD', '', '', '', NULL, NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, 1),
('CUS-01-10000173', '2014-09-07 16:58:05', '2014-09-07 16:59:03', NULL, NULL, 0, 'CGRU-01-10000094', 'TAG-01-10000135', NULL, 'Ramapuram', 'Sales Order F I', '600033', '9734242324', '3242343242', 1, 3, 'Customer', 'Req', 1, '2', 'Singlas', '3', '1', NULL, 2, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0),
('CUS-01-10000175', '2014-09-07 17:23:16', '2014-09-07 17:23:16', NULL, NULL, 0, 'CGRU-01-10000096', 'TAG-01-10000137', NULL, 'aaaaaaaa', 'aaaaaaaaaaaa', '3333', '3333', '33333', 1, 3, 'Customer', 'qqq', 1, '2', 'Singlas', '4', '1', NULL, 1, NULL, NULL, 1, 1, '0000-00-00', NULL, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer_instruments`
--

INSERT INTO `customer_instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `instrument_id`, `branch_id`, `model_no`, `range_id`, `unit_price`, `status`, `is_deleted`) VALUES
(1, '2014-08-26 06:53:36', '2014-08-26 06:53:43', NULL, NULL, 0, 'CUS-01-10000121', 1, NULL, '3333333333', '1', '23', 1, 0),
(2, '2014-08-27 09:31:30', '2014-08-27 09:31:40', NULL, NULL, 0, 'CUS-01-10000123', 2, NULL, 'Celkon A89', '1', '12', 1, 0),
(3, '2014-09-07 17:24:32', '2014-09-07 17:24:32', NULL, NULL, 0, 'CUS-01-10000173', 1, NULL, '23232', '1', '2', 1, 0),
(4, '2014-09-07 17:24:46', '2014-09-07 17:24:46', NULL, NULL, 0, 'CUS-01-10000175', 2, NULL, '222', '1', '2', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cus_addresses`
--

INSERT INTO `cus_addresses` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `address_id`, `address`, `type`, `status`, `is_deleted`) VALUES
(1, '2014-08-26 06:51:35', '2014-08-26 06:51:35', NULL, NULL, 0, 'CUS-01-10000121', 'TAG-01-10000083', 'CGRU-01-10000058', 933039725, 'reg', 'registered', 1, 0),
(2, '2014-08-26 06:51:40', '2014-08-26 06:51:40', NULL, NULL, 0, 'CUS-01-10000121', 'TAG-01-10000083', 'CGRU-01-10000058', 1420435657, 'bill', 'billing', 1, 0),
(3, '2014-08-26 06:51:46', '2014-08-26 06:51:46', NULL, NULL, 0, 'CUS-01-10000121', 'TAG-01-10000083', 'CGRU-01-10000058', 1426664969, 'deli', 'delivery', 1, 0),
(4, '2014-08-26 10:14:51', '2014-08-26 10:14:51', NULL, NULL, 0, 'CUS-01-10000123', 'TAG-01-10000085', 'CGRU-01-10000060', 963215300, 'rr', 'registered', 1, 0),
(5, '2014-08-26 10:14:55', '2014-08-26 10:14:55', NULL, NULL, 0, 'CUS-01-10000123', 'TAG-01-10000085', 'CGRU-01-10000060', 1085916591, 'bb', 'billing', 1, 0),
(6, '2014-08-26 10:14:59', '2014-08-26 10:14:59', NULL, NULL, 0, 'CUS-01-10000123', 'TAG-01-10000085', 'CGRU-01-10000060', 504183534, 'dd', 'delivery', 1, 0),
(7, '2014-09-07 16:03:11', '2014-09-07 16:03:11', NULL, NULL, 0, 'CUS-01-10000173', 'TAG-01-10000135', 'CGRU-01-10000094', 1697639311, 'regi\n', 'registered', 1, 0),
(8, '2014-09-07 16:03:15', '2014-09-07 16:03:15', NULL, NULL, 0, 'CUS-01-10000173', 'TAG-01-10000135', 'CGRU-01-10000094', 670331186, 'reg', 'billing', 1, 0),
(9, '2014-09-07 16:03:40', '2014-09-07 16:03:40', NULL, NULL, 0, 'CUS-01-10000173', 'TAG-01-10000135', 'CGRU-01-10000094', 258117513, 'Del', 'delivery', 1, 0),
(10, '2014-09-07 17:22:00', '2014-09-07 17:22:00', NULL, NULL, 0, 'CUS-01-10000175', 'TAG-01-10000137', 'CGRU-01-10000096', 799419023, 'aaaaa', 'registered', 1, 0),
(11, '2014-09-07 17:22:08', '2014-09-07 17:22:08', NULL, NULL, 0, 'CUS-01-10000175', 'TAG-01-10000137', 'CGRU-01-10000096', 1412202535, 'sssss', 'billing', 1, 0),
(12, '2014-09-07 17:22:13', '2014-09-07 17:22:13', NULL, NULL, 0, 'CUS-01-10000175', 'TAG-01-10000137', 'CGRU-01-10000096', 276977588, 'ssssss', 'delivery', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cus_contactpersoninfos`
--

INSERT INTO `cus_contactpersoninfos` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `serial_id`, `email`, `remarks`, `name`, `department`, `phone`, `position`, `mobile`, `purpose`, `status`, `is_deleted`) VALUES
(1, '2014-09-02 10:17:28', '2014-09-02 10:27:31', NULL, NULL, 0, 'CUS-01-10000123', 'TAG-01-10000131', 'CGRU-01-10000058', NULL, 'MuthuRam.samsys@gmail.com', 'tesdeRam', 'MuthuRam', 'EngineeringRam', '9842618074Ram', 'DeveloperMuthuRam', '9566633605Ram', 'tets purposeRam', 1, 0),
(2, '2014-09-02 10:22:33', '2014-09-02 10:22:33', NULL, NULL, 0, 'CUS-01-10000167', 'TAG-01-10000131', 'CGRU-01-10000058', NULL, 'muthu.samsys@gmail.com', 'tesdeRam', 'MutthuRam', 'EngineeringRam', '9842618074Ram', 'DeveloperRam', '9566633605Ram', 'tets purposeRam', 0, 0),
(3, '2014-09-07 16:29:47', '2014-09-07 16:58:20', NULL, NULL, 0, 'CUS-01-10000173', 'TAG-01-10000135', 'CGRU-01-10000094', '20749998', 'KAJ@gmail.com', 'remark', 'KAJ', 'depart', '9383737383', 'posti', '93873763838', 'nonr', 1, 0),
(4, '2014-09-07 16:58:38', '2014-09-07 16:58:38', NULL, NULL, 0, 'CUS-01-10000173', 'TAG-01-10000135', 'CGRU-01-10000094', '21573946', 'aaa@ddm.com', 'dasda', 'aa', 'asd', '24324324', 'ad', '324234234', 'dasd', 1, 0),
(5, '2014-09-07 17:23:13', '2014-09-07 17:23:13', NULL, NULL, 0, 'CUS-01-10000175', 'TAG-01-10000137', 'CGRU-01-10000096', '59155493', 'aaaa@gmail.com', 'sadasd', 'aaaa', 'asdas', '23432432', 'adas', '324234234', 'sadad', 1, 0),
(6, '2014-09-07 17:26:16', '2014-09-07 17:26:16', NULL, NULL, 0, 'CUS-01-10000173', NULL, NULL, NULL, 'q321@sda.com', 'ad', 'aa', 'aa', '32423423', 'asd', '32423423', 'sad', 1, 0),
(7, '2014-09-07 17:37:15', '2014-09-07 17:37:15', NULL, NULL, 0, 'CUS-01-10000173', NULL, NULL, NULL, 'asdas@aeeda.com', '234asd', 'adas', 'adasd', '23423', 'asd', '234234', 'asdas', 1, 0),
(8, '2014-09-07 17:48:14', '2014-09-07 17:48:14', NULL, NULL, 0, 'CUS-01-10000173', 'TAG-01-10000083', 'CGRU-01-10000058', NULL, 'ZX@aadas.com', 'asda', 'ZX', 'asdasd', '234234`', 'sadas', '234234', 'asdad', 1, 0),
(9, '2014-09-07 17:55:11', '2014-09-07 17:55:11', NULL, NULL, 0, 'CUS-01-10000173', 'TAG-01-10000083', 'CGRU-01-10000058', NULL, 'zxc@asd.com', 'sda', 'zxc', 'ad', '23423432', 'assd', '234234234', 'asdsad', 1, 0),
(10, '2014-09-07 17:59:55', '2014-09-07 17:59:55', NULL, NULL, 0, 'undefined', 'TAG-01-10000083', 'CGRU-01-10000058', NULL, 'asdas@asd.com', 'asda', 'asd', 'asd', '234234', 'asd', '234324', 'asda', 1, 0),
(11, '2014-09-07 18:15:09', '2014-09-07 18:15:09', NULL, NULL, 0, 'undefined', 'TAG-01-10000083', 'CGRU-01-10000058', NULL, 'asd@asDA.XOM', 'asda', 'asd', 'ASD', '324234', 'ASDasd', '24234', 'asd', 1, 0),
(12, '2014-09-07 18:17:57', '2014-09-07 18:18:10', NULL, NULL, 0, 'CUS-01-10000121', 'TAG-01-10000083', 'CGRU-01-10000058', NULL, 'asd@sda.com', 'assd', 'as', 'sda', '234234', 'asd', '34242', 'asd', 1, 0);

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
(14, '2014-09-07 18:18:12', '2014-09-07 18:18:12', NULL, NULL, 0, 'CUS-01-10000121', NULL, NULL, '1', 1),
(5, '2014-09-06 09:32:31', '2014-09-06 09:32:31', NULL, NULL, 0, 'CUS-01-10000123', NULL, NULL, '1', 1),
(7, '2014-09-07 16:59:03', '2014-09-07 16:59:03', NULL, NULL, 0, 'CUS-01-10000173', NULL, NULL, '1', 1),
(8, '2014-09-07 17:23:16', '2014-09-07 17:23:16', NULL, NULL, 0, 'CUS-01-10000175', 'TAG-01-10000137', 'CGRU-01-10000096', '1', 1);

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
(14, '2014-09-07 18:18:12', '2014-09-07 18:18:12', NULL, NULL, 0, 'CUS-01-10000121', NULL, NULL, '3', 1),
(5, '2014-09-06 09:32:31', '2014-09-06 09:32:31', NULL, NULL, 0, 'CUS-01-10000123', NULL, NULL, '4', 1),
(7, '2014-09-07 16:59:03', '2014-09-07 16:59:03', NULL, NULL, 0, 'CUS-01-10000173', NULL, NULL, '3', 1),
(8, '2014-09-07 17:23:16', '2014-09-07 17:23:16', NULL, NULL, 0, 'CUS-01-10000175', 'TAG-01-10000137', 'CGRU-01-10000096', '4', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `datalogs`
--

INSERT INTO `datalogs` (`id`, `logname`, `logid`, `logactivity`, `user_id`, `created`, `modified`, `viewed`, `viewed_by`) VALUES
(1, 'Procedure No', '1', 'Add', '1', '2014-08-26 06:49:25', '2014-08-26 06:49:25', 0, NULL),
(2, 'Range', '1', 'Add', '1', '2014-08-26 06:49:54', '2014-08-26 06:49:54', 0, NULL),
(3, 'Instrument', '1', 'Add', '1', '2014-08-26 06:51:00', '2014-08-26 06:51:00', 0, NULL),
(4, 'Customer', 'CUS-01-10000121', 'Add', '1', '2014-08-26 06:53:10', '2014-08-26 06:53:10', 0, NULL),
(5, 'Salesorder', '1', 'Add', '1', '2014-08-26 06:56:46', '2014-08-26 06:56:46', 0, NULL),
(6, 'Salesorder', 'BSO-01-10000601', 'Add', '1', '2014-08-26 07:16:14', '2014-08-26 07:16:14', 0, NULL),
(7, 'Procedure No', '2', 'Add', '1', '2014-08-26 09:50:53', '2014-08-26 09:50:53', 0, NULL),
(8, 'Procedure No', '3', 'Add', '1', '2014-08-26 09:51:13', '2014-08-26 09:51:13', 0, NULL),
(9, 'Instrument', '2', 'Add', '1', '2014-08-26 09:56:30', '2014-08-26 09:56:30', 0, NULL),
(10, 'Deliveryorder', '1', 'Add', '1', '2014-08-26 10:05:22', '2014-08-26 10:05:22', 0, NULL),
(11, 'Customer', 'CUS-01-10000123', 'Add', '1', '2014-08-26 10:16:45', '2014-08-26 10:16:45', 0, NULL),
(12, 'Instrument', '2', 'Edit', '1', '2014-08-26 10:48:49', '2014-08-26 10:48:49', 0, NULL),
(13, 'Instrument', '2', 'Edit', '1', '2014-08-26 10:49:01', '2014-08-26 10:49:01', 0, NULL),
(14, 'Instrument', '2', 'Edit', '1', '2014-08-26 10:49:09', '2014-08-26 10:49:09', 0, NULL),
(15, 'Instrument', '2', 'Edit', '1', '2014-08-26 10:52:41', '2014-08-26 10:52:41', 0, NULL),
(16, 'Salesorder', '1', 'Add', '1', '2014-08-27 10:28:55', '2014-08-27 10:28:55', 0, NULL),
(17, 'Salesorder', 'BSO-01-10000623', 'Edit', '1', '2014-08-27 10:29:32', '2014-08-27 10:29:32', 0, NULL),
(18, 'Customer', 'CUS-01-10000123', 'Edit', '1', '2014-09-02 09:19:13', '2014-09-02 09:19:13', 0, NULL),
(19, 'CustomerTagList', 'CUS-01-10000167', 'Add', '1', '2014-09-02 10:16:34', '2014-09-02 10:16:34', 0, NULL),
(20, 'CustomerTagList', 'CUS-01-10000169', 'Add', '1', '2014-09-02 10:19:07', '2014-09-02 10:19:07', 0, NULL),
(21, 'Quotation', 'BSQ-01-10000602', 'Add', '1', '2014-09-03 15:13:10', '2014-09-03 15:13:10', 0, NULL),
(22, 'Quotation', 'BSQ-01-10000602', 'Add', '1', '2014-09-03 15:14:19', '2014-09-03 15:14:19', 0, NULL),
(23, 'CustomerTagList', 'CUS-01-10000169', 'Delete', '1', '2014-09-06 05:32:12', '2014-09-06 05:32:12', 0, NULL),
(24, 'CustomerTagList', 'CUS-01-10000167', 'Delete', '1', '2014-09-06 05:32:34', '2014-09-06 05:32:34', 0, NULL),
(25, 'ClientPO', 'BSQ-01-10000602', 'Add', '1', '2014-09-06 06:28:16', '2014-09-06 06:28:16', 0, NULL),
(26, 'ClientPO', 'BSQ-01-10000602', 'Add', '1', '2014-09-06 06:33:19', '2014-09-06 06:33:19', 0, NULL),
(27, 'Customer', 'CUS-01-10000123', 'Edit', '1', '2014-09-06 06:46:37', '2014-09-06 06:46:37', 0, NULL),
(28, 'Deliveryorder', '1', 'Delete', '1', '2014-09-06 07:03:57', '2014-09-06 07:03:57', 0, NULL),
(29, 'Deliveryorder', '1', 'Delete', '1', '2014-09-06 07:04:53', '2014-09-06 07:04:53', 0, NULL),
(30, 'Deliveryorder', '1', 'Delete', '1', '2014-09-06 07:06:18', '2014-09-06 07:06:18', 0, NULL),
(31, 'Deliveryorder', '1', 'Delete', '1', '2014-09-06 07:06:49', '2014-09-06 07:06:49', 0, NULL),
(32, 'ClientPO', 'BSQ-01-10000602', 'Add', '1', '2014-09-06 09:04:04', '2014-09-06 09:04:04', 0, NULL),
(33, 'Customer', 'CUS-01-10000123', 'Edit', '1', '2014-09-06 09:32:31', '2014-09-06 09:32:31', 0, NULL),
(34, 'ClientPO', 'BSQ-01-10000602', 'Add', '1', '2014-09-06 13:39:44', '2014-09-06 13:39:44', 0, NULL),
(35, 'Deliveryorder', 'BDO-01-10000050', 'Add', '1', '2014-09-06 14:44:51', '2014-09-06 14:44:51', 0, NULL),
(36, 'Deliveryorder', 'BDO-01-10000052', 'Add', '1', '2014-09-06 14:47:59', '2014-09-06 14:47:59', 0, NULL),
(37, 'Deliveryorder', 'BDO-01-10000057', 'Add', '1', '2014-09-06 14:59:15', '2014-09-06 14:59:15', 0, NULL),
(38, 'Quotation', 'BSQ-01-10000609', 'Add', '1', '2014-09-07 13:43:57', '2014-09-07 13:43:57', 0, NULL),
(39, 'Quotation', 'BSQ-01-10000609', 'Add', '1', '2014-09-07 13:44:26', '2014-09-07 13:44:26', 0, NULL),
(40, 'ClientPO', 'BSQ-01-10000609', 'Add', '1', '2014-09-07 13:53:11', '2014-09-07 13:53:11', 0, NULL),
(41, 'ClientPO', 'BSQ-01-10000609', 'Add', '1', '2014-09-07 13:58:48', '2014-09-07 13:58:48', 0, NULL),
(42, 'Customer', 'CUS-01-10000173', 'Add', '1', '2014-09-07 16:58:05', '2014-09-07 16:58:05', 0, NULL),
(43, 'Customer', 'CUS-01-10000173', 'Edit', '1', '2014-09-07 16:59:03', '2014-09-07 16:59:03', 0, NULL),
(44, 'Customer', 'CUS-01-10000175', 'Add', '1', '2014-09-07 17:23:16', '2014-09-07 17:23:16', 0, NULL),
(45, 'Customer', 'CUS-01-10000121', 'Edit', '1', '2014-09-07 17:37:51', '2014-09-07 17:37:51', 0, NULL),
(46, 'Customer', 'CUS-01-10000121', 'Edit', '1', '2014-09-07 17:51:09', '2014-09-07 17:51:09', 0, NULL),
(47, 'Customer', 'CUS-01-10000121', 'Edit', '1', '2014-09-07 17:53:46', '2014-09-07 17:53:46', 0, NULL),
(48, 'Customer', 'CUS-01-10000121', 'Edit', '1', '2014-09-07 18:15:13', '2014-09-07 18:15:13', 0, NULL),
(49, 'Customer', 'CUS-01-10000121', 'Edit', '1', '2014-09-07 18:17:59', '2014-09-07 18:17:59', 0, NULL),
(50, 'Customer', 'CUS-01-10000121', 'Edit', '1', '2014-09-07 18:18:13', '2014-09-07 18:18:13', 0, NULL),
(51, 'Quotation', 'BSQ-01-10000613', 'Add', '1', '2014-09-07 18:21:09', '2014-09-07 18:21:09', 0, NULL),
(52, 'ClientPO', 'BSQ-01-10000602', 'Add', '1', '2014-09-07 18:29:22', '2014-09-07 18:29:22', 0, NULL),
(53, 'Quotation', 'BSQ-01-10000615', 'Add', '1', '2014-09-07 18:38:46', '2014-09-07 18:38:46', 0, NULL),
(54, 'Salesorder', '1', 'Add', '1', '2014-09-07 18:59:34', '2014-09-07 18:59:34', 0, NULL),
(55, 'Deliveryorder', NULL, 'Add', '1', '2014-09-07 21:06:54', '2014-09-07 21:06:54', 0, NULL),
(56, 'Salesorder', '2', 'Add', '1', '2014-09-07 22:22:11', '2014-09-07 22:22:11', 0, NULL),
(57, 'Deliveryorder', 'BDO-01-10000062', 'Add', '1', '2014-09-07 22:22:59', '2014-09-07 22:22:59', 0, NULL),
(58, 'Salesorder', '3', 'Add', '1', '2014-09-07 22:28:55', '2014-09-07 22:28:55', 0, NULL),
(59, 'Deliveryorder', 'BDO-01-10000063', 'Add', '1', '2014-09-07 22:29:27', '2014-09-07 22:29:27', 0, NULL);

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
  `po_generate_type` varchar(200) DEFAULT NULL,
  `is_assignpo` int(11) NOT NULL DEFAULT '0',
  `is_poapproved` int(11) DEFAULT '0',
  `is_pocount_satisfied` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `job_finished` varchar(20) DEFAULT '0',
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deliveryorders`
--

INSERT INTO `deliveryorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `branch_id`, `track_id`, `delivery_address`, `customer_address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `delivery_order_no`, `salesorder_id`, `quotationno`, `delivery_order_date`, `our_reference_no`, `po_reference_no`, `ref_count`, `remarks`, `service_id`, `is_approved`, `is_approved_date`, `instrument_type_id`, `del_description_count`, `status`, `ready_to_deliver`, `move_to_deliver`, `assign_to`, `po_generate_type`, `is_assignpo`, `is_poapproved`, `is_pocount_satisfied`, `is_deleted`, `job_finished`, `is_jobcompleted`) VALUES
(1, '2014-09-06 14:59:15', '2014-09-06 14:59:15', NULL, NULL, 0, 'CUS-01-10000123', NULL, NULL, NULL, '', '', NULL, '', '', 'asda@gmail.com', 'BDO-01-10000056', 'BSO-01-10000623', NULL, '06-September-14', NULL, '', NULL, '', 4, 0, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, 0, 0, NULL, 0, '0', 0),
(2, '2014-09-07 18:59:34', '2014-09-07 18:59:34', 1, NULL, 0, 'CUS-01-10000121', 2, 'BSTRA-01-10000957', 'deli', 'reg', NULL, '12', '9865456456', '45643657658758554', 'MuthuRam.samsys@gmail.com', 'BDO-01-10000060', 'BSO-01-10000650', 'BSQ-01-10000602', '07-Sep-14', 'BSTRA-01-10000957', 'asasa', NULL, '', 4, 0, NULL, 1, 6, 1, NULL, 0, NULL, 'Manual', 0, 0, NULL, 0, '0', 0),
(3, '2014-09-07 22:22:11', '2014-09-07 22:22:11', 1, NULL, 0, 'CUS-01-10000123', 2, 'BSTRA-01-10000938', 'dd', 'rr', NULL, '1', '9566633605', '12345689', 'MuthuRam.samsys@gmail.com', 'BDO-01-10000062', 'BSO-01-10000652', 'BSQ-01-10000609', '07-Sep-14', 'BSTRA-01-10000938', 'CPO-01-10000135,PO-01-10000135,PO-01-100004', NULL, '', 4, 0, NULL, NULL, 6, 1, NULL, 0, NULL, 'Manual', 0, 0, NULL, 0, '0', 0),
(4, '2014-09-07 22:28:55', '2014-09-07 22:28:55', 1, NULL, 0, 'CUS-01-10000121', 2, 'BSTRA-01-10000949', 'deli', 'reg', NULL, '12', '9865456456', '45643657658758554', 'asd@sda.com', 'BDO-01-10000063', 'BSO-01-10000654', 'BSQ-01-10000613', '07-Sep-14', 'BSTRA-01-10000949', 'asasa', NULL, '', 4, 0, NULL, NULL, 1, 1, NULL, 0, NULL, 'Manual', 0, 0, NULL, 0, '0', 0);

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
  `delivery_total` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `ready_to_deliver` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `del_descriptions`
--

INSERT INTO `del_descriptions` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `deliveryorder_id`, `salesorder_id`, `quotation_id`, `quotationno`, `customer_id`, `delivery_quantity`, `instrument_id`, `model_no`, `brand_id`, `delivery_range`, `delivery_calllocation`, `delivery_calltype`, `delivery_validity`, `delivery_unitprice`, `delivery_discount`, `department_id`, `delivery_accountservice`, `delivery_titles`, `delivery_total`, `status`, `ready_to_deliver`, `is_deleted`) VALUES
(1, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 0, '2', 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 1, 0, 0),
(2, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 0, '2', 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 1, 0, 0),
(3, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 0, '2', 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Inlab', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 1, 0, 0),
(4, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 0, '2', 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 1, 0, 0),
(5, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 0, '2', 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Inlab', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 1, 0, 0),
(6, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 0, '2', 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Inlab', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 1, 0, 0),
(7, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 0, '3', 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 1, 0, 0),
(8, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 0, '3', 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 1, 0, 0),
(9, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 0, '3', 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 1, 0, 0),
(10, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 0, '3', 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 1, 0, 0),
(11, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 0, '3', 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 1, 0, 0),
(12, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 0, '3', 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 1, 0, 0),
(13, '2014-09-07 22:29:26', '2014-09-07 22:29:26', NULL, NULL, 0, '4', 'BSO-01-10000654', 3, 'BSQ-01-10000613', 'CUS-01-10000121', '2', 1, '3333333333', 1, '1', 'Inlab', 'Singlas', 12, '23', '22', 1, 'calibration service', '1', '17.94', 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `departmentname`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-08-21 14:52:48', '2014-08-21 14:52:48', NULL, NULL, 0, 'Mechanical', 'Mechanical', 1, 0),
(2, '2014-08-21 14:52:57', '2014-08-21 14:52:57', NULL, NULL, 0, 'Electrical', 'Electrical', 1, 0),
(3, '2014-08-21 14:53:07', '2014-08-21 14:53:07', NULL, NULL, 0, 'Pressure', 'Pressure', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `do_documents`
--

INSERT INTO `do_documents` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `deliveryorder_no`, `deliveryorder_id`, `upload_type`, `document_name`, `document_type`, `document_size`, `status`) VALUES
(1, '2014-09-06 14:59:13', '2014-09-06 14:59:13', NULL, NULL, 0, 'CUS-01-10000123', 'BDO-01-10000056', '1', 'Individual', '1410015553_Forum and API data.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '13079', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `industryname`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-08-21 14:54:13', '2014-08-21 14:54:13', NULL, NULL, 0, 'Technical', 'Technical Description', 1, 0);

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
  `is_approved` varchar(20) NOT NULL DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `name`, `description`, `branch_id`, `department_id`, `status`, `instrument_brand_count`, `instrument_procedure_count`, `instrument_range_count`, `is_approved`, `is_deleted`) VALUES
(1, '2014-08-26 06:51:00', '2014-08-26 06:51:00', NULL, NULL, 0, 'New Ins -1', 'New Ins -1', NULL, 1, 1, 1, 1, 1, '1', 0),
(2, '2014-08-26 09:56:30', '2014-08-26 10:52:41', NULL, NULL, 0, 'sdf', 'sdf', NULL, 1, 1, 1, 1, 1, '1', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `instrument_brands`
--

INSERT INTO `instrument_brands` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `brand_id`) VALUES
(1, '2014-08-26 06:51:00', '2014-08-26 06:51:00', NULL, NULL, 0, 1, 1),
(6, '2014-08-26 10:52:41', '2014-08-26 10:52:41', NULL, NULL, 0, 2, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `instrument_procedures`
--

INSERT INTO `instrument_procedures` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `procedure_id`) VALUES
(1, '2014-08-26 06:51:00', '2014-08-26 06:51:00', NULL, NULL, 0, 1, 1),
(9, '2014-08-26 10:52:41', '2014-08-26 10:52:41', NULL, NULL, 0, 2, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `instrument_ranges`
--

INSERT INTO `instrument_ranges` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `range_id`) VALUES
(1, '2014-08-26 06:51:00', '2014-08-26 06:51:00', NULL, NULL, 0, 1, 1),
(6, '2014-08-26 10:52:41', '2014-08-26 10:52:41', NULL, NULL, 0, 2, 1);

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
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `instrument_types`
--

INSERT INTO `instrument_types` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `group_name`, `group_description`, `quotation`, `salesorder`, `deliveryorder`, `invoice`, `purchaseorder`, `performainvoice`, `subcontract_deliveryorder`, `purchase_requisition`, `recall_service`, `onsite_schedule`, `status`, `is_deleted`) VALUES
(1, '2014-08-07 11:25:08', '2014-08-21 15:18:06', NULL, NULL, NULL, 'Group Name', 'Group Name', 'Calibration for Quotation', 'Calibration for Salesorder', 'Calibration for Delivery Order', 'Calibration for Invoice', 'Calibration for Purchase Order', 'Calibration for Performa Invoice', 'Calibration for Delivery Order', 'Calibration for Purchase Requisition', 'Calibration for Recall Service', 'Calibration for Onsite Schedule', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `invoice_date` int(11) DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `customer_id` varchar(200) DEFAULT NULL,
  `customername` varchar(200) DEFAULT NULL,
  `regaddress` text,
  `contactperson_id` int(22) DEFAULT NULL,
  `contactpersonname` varchar(200) DEFAULT NULL,
  `phone` int(22) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `totalprice` double DEFAULT NULL,
  `jobstatus_id` varchar(20) DEFAULT NULL,
  `paymentterms_id` varchar(20) DEFAULT NULL,
  `track_id` varchar(200) DEFAULT NULL,
  `ourrefno` varchar(200) DEFAULT NULL,
  `ref_no` int(11) DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `labprocesses`
--

INSERT INTO `labprocesses` (`id`, `created`, `modified`, `created_by`, `modified_by`, `salesorder_id`, `description_id`, `status`) VALUES
(1, '2014-08-26 10:05:22', '2014-08-26 10:05:22', NULL, NULL, 'BSO-01-10000601', '1', 1),
(2, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 'BSO-01-10000650', '73', 1),
(3, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 'BSO-01-10000650', '74', 1),
(4, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 'BSO-01-10000650', '75', 1),
(5, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 'BSO-01-10000650', '76', 1),
(6, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 'BSO-01-10000650', '77', 1),
(7, '2014-09-07 21:06:54', '2014-09-07 21:06:54', NULL, NULL, 'BSO-01-10000650', '78', 1),
(8, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 'BSO-01-10000652', '79', 1),
(9, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 'BSO-01-10000652', '80', 1),
(10, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 'BSO-01-10000652', '81', 1),
(11, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 'BSO-01-10000652', '82', 1),
(12, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 'BSO-01-10000652', '83', 1),
(13, '2014-09-07 22:22:59', '2014-09-07 22:22:59', NULL, NULL, 'BSO-01-10000652', '84', 1),
(14, '2014-09-07 22:29:27', '2014-09-07 22:29:27', NULL, NULL, 'BSO-01-10000654', '85', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `locationname`, `description`, `status`, `is_deleted`) VALUES
(3, NULL, NULL, NULL, NULL, 0, 'East', 'Bedok, Changi, Changi Bay, Paya Lebar, Pasir Ris, Tampines', 1, 0),
(4, NULL, NULL, NULL, NULL, 0, 'West', 'Bukit Batok, Bukit Panjang, Jurong East, Clementi', 1, 0),
(5, NULL, NULL, NULL, NULL, 0, 'North', 'Lim Chu Kang, Mandai, Sembawang, Simpang, Sungei Kadut, Woodlands, Yishun', 1, 0),
(6, NULL, NULL, NULL, NULL, 0, 'South', 'Queenstown, Kallang, Geylang', 1, 0),
(8, NULL, NULL, NULL, NULL, 0, 'Central', 'Central description', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `logactivities`
--

INSERT INTO `logactivities` (`id`, `logname`, `logactivity`, `logid`, `logno`, `loglink`, `user_id`, `logapprove`, `approved_by`, `logtime`, `created`) VALUES
(76, 'Salesorder', 'Add SalesOrder', 'BSO-01-10000654', '', NULL, NULL, 2, '1', NULL, '2014-09-07'),
(77, 'Deliveryorder', 'Add Delivery Order', 'BDO-01-10000063', 'BSO-01-10000654', NULL, '1', 1, NULL, NULL, '2014-09-07');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `onsite_documents`
--

INSERT INTO `onsite_documents` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `onsiteschedule_no`, `onsite_id`, `upload_type`, `document_name`, `document_type`, `document_size`, `status`) VALUES
(2, '2014-09-07 08:19:21', '2014-09-07 08:19:21', NULL, NULL, 0, NULL, 'OSS-01-10000007', NULL, 'Individual', '1410077961_pubform.doc', 'application/msword', '224768', 1),
(3, '2014-09-07 13:14:23', '2014-09-07 13:14:23', NULL, NULL, 0, NULL, 'OSS-01-10000070', NULL, 'Individual', '1410095663_pubform.doc', 'application/msword', '224768', 1);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
  `department_id` int(11) DEFAULT NULL,
  `onsite_accountservice` varchar(100) DEFAULT NULL,
  `onsite_titles` varchar(100) DEFAULT NULL,
  `onsite_total` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `onsite_instruments`
--

INSERT INTO `onsite_instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `onsite_id`, `quotation_id`, `quotationno`, `customer_id`, `onsite_quantity`, `instrument_id`, `model_no`, `brand_id`, `onsite_range`, `onsite_calllocation`, `onsite_calltype`, `onsite_validity`, `onsite_unitprice`, `onsite_discount`, `department_id`, `onsite_accountservice`, `onsite_titles`, `onsite_total`, `status`, `is_deleted`) VALUES
(27, '2014-09-07 13:14:05', '2014-09-07 13:14:05', NULL, NULL, 0, NULL, 1, 'BSQ-01-10000602', 'CUS-01-10000121', '', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, 0),
(26, '2014-09-07 13:14:05', '2014-09-07 13:14:05', NULL, NULL, 0, NULL, 1, 'BSQ-01-10000602', 'CUS-01-10000121', '', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, 0),
(25, '2014-09-07 13:14:05', '2014-09-07 13:14:05', NULL, NULL, 0, NULL, 1, 'BSQ-01-10000602', 'CUS-01-10000121', '', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `paymentterms`
--

INSERT INTO `paymentterms` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `paymentterm`, `paymenttype`, `description`, `status`, `is_deleted`) VALUES
(1, NULL, '2014-07-04 06:38:04', NULL, NULL, 0, '0', 'COD', 'fgdgdgdf', 1, 0),
(2, NULL, NULL, NULL, NULL, 0, '30', 'days', '', 1, 0),
(3, NULL, NULL, NULL, NULL, 0, '14', 'days', '', 1, 0),
(4, NULL, NULL, NULL, NULL, 0, '15', 'days', '', 1, 0),
(5, NULL, NULL, NULL, NULL, 0, '60', 'days', '', 1, 0),
(6, NULL, NULL, NULL, NULL, 0, '7', 'days', '', 1, 0),
(7, NULL, NULL, NULL, NULL, 0, '90', 'days', '', 1, 0),
(8, NULL, NULL, NULL, NULL, 0, '0', 'days', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prepare_invoices`
--

CREATE TABLE IF NOT EXISTS `prepare_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deliveryorder_id` varchar(200) DEFAULT NULL,
  `customer_puchaseorder_no` varchar(200) DEFAULT NULL,
  `is_approved` int(11) DEFAULT NULL,
  `approved_date` varchar(200) NOT NULL,
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
(1, 'BSTRA-01-10000803', 'BRF-01-10000118', 'CUS-01-10000123', 2, 'EA SPORT PVT LTD ( San Francisco ) ', 'rr', NULL, '', '9566633605', '12345689', '', '0 COD', '05-September-14', 'PO-12334', NULL, '45', NULL, '1', 0, 1, '2014-09-05 10:39:15', '2014-09-05 10:39:15', 9, NULL, 0, 1, 0, 1, 1, 0, 0, 0);

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
(1, '2014-09-05 10:39:16', '2014-09-05 10:39:16', NULL, NULL, 0, '1', NULL, 'Mr.Divo SK', 'test project name', 'Standard', 7, 32, 1, 1, '23', 'test remark', 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `preq_devices`
--

INSERT INTO `preq_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `prequistion_id`, `customer_id`, `instrument_name`, `prequistionno`, `brand_name`, `quantity`, `model_no`, `range`, `validity`, `unit_price`, `device_discount`, `department_name`, `account_service`, `total`, `title`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-09-05 10:39:13', '2014-09-05 10:39:13', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, NULL, 0),
(2, '2014-09-05 10:39:13', '2014-09-05 10:39:13', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, NULL, 0),
(3, '2014-09-05 10:39:13', '2014-09-05 10:39:13', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, NULL, 0),
(4, '2014-09-05 10:39:13', '2014-09-05 10:39:13', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, NULL, 0),
(5, '2014-09-05 10:39:13', '2014-09-05 10:39:13', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, NULL, 0),
(6, '2014-09-05 10:39:13', '2014-09-05 10:39:13', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, NULL, 0);

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
(1, '2014-08-21 14:54:39', '2014-08-21 14:54:39', NULL, NULL, 0, 'Normal', 'Normal', 4, 1, 1, 0),
(2, '2014-08-21 14:55:03', '2014-08-21 14:55:03', NULL, NULL, 0, 'Premium', 'Premium', 2, 2.5, 1, 0),
(3, '2014-08-21 14:55:26', '2014-08-21 14:55:26', NULL, NULL, 0, 'Extra Premium', 'Extra Premium', 1, 4, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`id`, `created_by`, `modified_by`, `view`, `created`, `modified`, `department_id`, `procedure_no`, `description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, NULL, NULL, 0, '2014-08-26 06:49:25', '2014-08-26 06:49:25', 1, 'New Pro - 1', 'New Pro - 1', 1, 1, 0),
(2, NULL, NULL, 0, '2014-08-26 09:50:52', '2014-08-26 09:50:52', 2, 'PR1234567890', 'PR1234567890', 1, 1, 0),
(3, NULL, NULL, 0, '2014-08-26 09:51:13', '2014-08-26 09:51:13', 1, 'PR99999999', 'sad', 1, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `is_delivery_approved` int(11) NOT NULL DEFAULT '0',
  `quo_device_count` int(11) DEFAULT NULL,
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  `total_device_rate` int(11) DEFAULT NULL,
  `is_assign_po` int(11) DEFAULT '0',
  `po_approval_date` date DEFAULT NULL,
  `is_poapproved` int(11) NOT NULL DEFAULT '0',
  `is_pocount_satisfied` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `track_id`, `quotationno`, `customer_id`, `branch_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `paymentterm_id`, `reg_date`, `ref_no`, `ref_count`, `po_generate_type`, `discount`, `priority`, `instrument_type_id`, `is_approved`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorder_created`, `is_delivery_approved`, `quo_device_count`, `is_jobcompleted`, `total_device_rate`, `is_assign_po`, `po_approval_date`, `is_poapproved`, `is_pocount_satisfied`, `is_deleted`) VALUES
(1, 'BSTRA-01-10000957', 'BSQ-01-10000602', 'CUS-01-10000121', 2, 'DAV IND PVT LTD ( INDIA ) ', 'reg', NULL, '', '9865456456', '45643657658758554', 'MuthuRam.samsys@gmail.com', 1, '03-September-14', 'asasa', '6', 'Manual', '12', '1', '1', 1, 1, '2014-09-03 15:13:10', '2014-09-03 15:14:19', 9, NULL, 0, 1, 0, NULL, 0, NULL, 1, NULL, 0, 1, 0),
(2, 'BSTRA-01-10000938', 'BSQ-01-10000609', 'CUS-01-10000123', 2, 'EA SPORT PVT LTD ( San Francisco ) ', 'rr', NULL, '1', '9566633605', '12345689', 'MuthuRam.samsys@gmail.com', 1, '07-September-14', 'CPO-01-10000135,PO-01-10000135,PO-01-100004', '4,4,5', 'Manual', '12', '2', '1', 1, 1, '2014-09-07 13:43:56', '2014-09-07 13:44:25', 9, NULL, 0, 1, 0, NULL, 0, NULL, 1, NULL, 0, 1, 0),
(3, 'BSTRA-01-10000949', 'BSQ-01-10000613', 'CUS-01-10000121', 2, 'DAV IND PVT LTD ( INDIA ) ', 'reg', NULL, '12', '9865456456', '45643657658758554', 'asd@sda.com', 1, '07-September-14', 'asasa', '0', 'Manual', '', '1', '1', 1, 1, '2014-09-07 18:21:09', '2014-09-07 18:21:09', 9, NULL, 0, 1, 0, NULL, 0, NULL, 1, NULL, 0, NULL, 0),
(4, 'BSTRA-01-10000965', 'BSQ-01-10000615', 'CUS-01-10000121', 2, 'DAV IND PVT LTD ( INDIA ) ', 'reg', NULL, '12', '9865456456', '45643657658758554', 'asd@sda.com', 1, '08-September-14', 'CPO-01-10000137', '0', 'Automatic', '2', '2', '1', 1, 1, '2014-09-07 18:38:46', '2014-09-07 18:38:46', 9, NULL, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quo_customerspecialneeds`
--

INSERT INTO `quo_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `salespeople_id`, `salesperson_name`, `projectname`, `gsttype`, `gst`, `currency_id`, `currency_value`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(1, '2014-09-03 15:13:10', '2014-09-03 15:14:19', NULL, NULL, 0, '1', NULL, 'Ms.Nora Lee , ', 'test project name', 'Standard', 7, 32, 1, 1, '123', 'test remark', 4),
(2, '2014-09-07 13:43:56', '2014-09-07 13:44:25', NULL, NULL, 0, '2', NULL, 'Mr.Divo SK , ', 'test project', 'Standard', 7, 32, 1, 1, '12', 'test remarks', 4),
(3, '2014-09-07 18:21:09', '2014-09-07 18:21:09', NULL, NULL, 0, '3', NULL, NULL, 'asd', 'Standard', 7, 32, 1, 1, '234', 'ass', 4),
(4, '2014-09-07 18:38:46', '2014-09-07 18:38:46', NULL, NULL, 0, '4', NULL, NULL, 'qqw', 'Standard', 7, 32, 1, 1, '2', 'saas', 4);

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
  `title` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `is_approved` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `quo_devices`
--

INSERT INTO `quo_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `customer_id`, `instrument_id`, `quotationno`, `brand_id`, `quantity`, `model_no`, `range`, `call_location`, `call_type`, `validity`, `unit_price`, `discount`, `department_id`, `account_service`, `total`, `title`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-09-03 15:10:31', '2014-09-03 15:10:31', NULL, NULL, 0, '1', 'CUS-01-10000121', '1', 'BSQ-01-10000602', 1, '6', '3333333333', '1', 'Onsite', 'Singlas', 12, '23', '12', '1', 'calibration service', '20.240000000000002', '1', 1, NULL, 0),
(2, '2014-09-03 15:10:31', '2014-09-03 15:10:31', NULL, NULL, 0, '1', 'CUS-01-10000121', '1', 'BSQ-01-10000602', 1, '6', '3333333333', '1', 'Onsite', 'Singlas', 12, '23', '12', '1', 'calibration service', '20.240000000000002', '1', 1, NULL, 0),
(3, '2014-09-03 15:10:31', '2014-09-03 15:10:31', NULL, NULL, 0, '1', 'CUS-01-10000121', '1', 'BSQ-01-10000602', 1, '6', '3333333333', '1', 'Inlab', 'Singlas', 12, '23', '12', '1', 'calibration service', '20.240000000000002', '1', 1, NULL, 0),
(4, '2014-09-03 15:10:31', '2014-09-03 15:10:31', NULL, NULL, 0, '1', 'CUS-01-10000121', '1', 'BSQ-01-10000602', 1, '6', '3333333333', '1', 'Onsite', 'Singlas', 12, '23', '12', '1', 'calibration service', '20.240000000000002', '1', 1, NULL, 0),
(5, '2014-09-03 15:10:31', '2014-09-03 15:10:31', NULL, NULL, 0, '1', 'CUS-01-10000121', '1', 'BSQ-01-10000602', 1, '6', '3333333333', '1', 'Inlab', 'Singlas', 12, '23', '12', '1', 'calibration service', '20.240000000000002', '1', 1, NULL, 0),
(6, '2014-09-03 15:10:31', '2014-09-03 15:10:31', NULL, NULL, 0, '1', 'CUS-01-10000121', '1', 'BSQ-01-10000602', 1, '6', '3333333333', '1', 'Inlab', 'Singlas', 12, '23', '12', '1', 'calibration service', '20.240000000000002', '1', 1, NULL, 0),
(7, '2014-09-07 13:43:25', '2014-09-07 13:43:25', NULL, NULL, 0, '2', 'CUS-01-10000123', '2', 'BSQ-01-10000609', 2, '6', 'Celkon A89', '1', 'Inlab', 'Singlas', 12, '12', '12', '1', 'calibration service', '10.56', '1', 1, NULL, 0),
(8, '2014-09-07 13:43:25', '2014-09-07 13:43:25', NULL, NULL, 0, '2', 'CUS-01-10000123', '2', 'BSQ-01-10000609', 2, '6', 'Celkon A89', '1', 'Inlab', 'Singlas', 12, '12', '12', '1', 'calibration service', '10.56', '1', 1, NULL, 0),
(9, '2014-09-07 13:43:26', '2014-09-07 13:43:26', NULL, NULL, 0, '2', 'CUS-01-10000123', '2', 'BSQ-01-10000609', 2, '6', 'Celkon A89', '1', 'Inlab', 'Singlas', 12, '12', '12', '1', 'calibration service', '10.56', '1', 1, NULL, 0),
(10, '2014-09-07 13:43:26', '2014-09-07 13:43:26', NULL, NULL, 0, '2', 'CUS-01-10000123', '2', 'BSQ-01-10000609', 2, '6', 'Celkon A89', '1', 'Inlab', 'Singlas', 12, '12', '12', '1', 'calibration service', '10.56', '1', 1, NULL, 0),
(11, '2014-09-07 13:43:26', '2014-09-07 13:43:26', NULL, NULL, 0, '2', 'CUS-01-10000123', '2', 'BSQ-01-10000609', 2, '6', 'Celkon A89', '1', 'Inlab', 'Singlas', 12, '12', '12', '1', 'calibration service', '10.56', '1', 1, NULL, 0),
(12, '2014-09-07 13:43:26', '2014-09-07 13:43:26', NULL, NULL, 0, '2', 'CUS-01-10000123', '2', 'BSQ-01-10000609', 2, '6', 'Celkon A89', '1', 'Inlab', 'Singlas', 12, '12', '12', '1', 'calibration service', '10.56', '1', 1, NULL, 0),
(13, '2014-09-07 18:21:01', '2014-09-07 18:21:06', NULL, NULL, 0, NULL, 'CUS-01-10000121', '1', 'BSQ-01-10000613', 1, '2', '3333333333', '1', 'Inlab', 'Singlas', 12, '23', '22', '1', 'calibration service', '17.94', '1', 1, NULL, 0),
(14, '2014-09-07 18:21:01', '2014-09-07 18:21:01', NULL, NULL, 0, '3', 'CUS-01-10000121', '1', 'BSQ-01-10000613', 1, '2', '3333333333', '1', 'Inlab', 'Singlas', 12, '23', '22', '1', 'calibration service', '17.94', '1', 1, NULL, 0),
(15, '2014-09-07 18:38:43', '2014-09-07 18:38:43', NULL, NULL, 0, '4', 'CUS-01-10000121', '1', 'BSQ-01-10000615', 1, '2', '3333333333', '1', 'Inlab', 'Singlas', 12, '23', '2', '1', 'calibration service', '22.54', '1', 1, NULL, 0),
(16, '2014-09-07 18:38:43', '2014-09-07 18:38:43', NULL, NULL, 0, '4', 'CUS-01-10000121', '1', 'BSQ-01-10000615', 1, '2', '3333333333', '1', 'Inlab', 'Singlas', 12, '23', '2', '1', 'calibration service', '22.54', '1', 1, NULL, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quo_documents`
--

INSERT INTO `quo_documents` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `quotationno`, `quotation_id`, `upload_type`, `document_name`, `document_type`, `document_size`, `status`) VALUES
(1, '2014-09-03 15:12:07', '2014-09-03 15:12:07', NULL, NULL, 0, 'CUS-01-10000121', 'BSQ-01-10000602', '1', 'Individual', '1409757127_Best Standard Improvement.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '144418', 1),
(2, '2014-09-06 09:15:36', '2014-09-06 09:15:36', NULL, NULL, 0, 'CUS-01-10000121', NULL, '1', NULL, '1409994936_Forum and API data.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '13079', 1),
(3, '2014-09-06 09:18:48', '2014-09-06 09:18:48', NULL, NULL, 0, 'CUS-01-10000121', NULL, '1', NULL, '1409995128_Forum and API data.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '13079', 1),
(4, '2014-09-07 13:43:40', '2014-09-07 13:43:40', NULL, NULL, 0, 'CUS-01-10000123', 'BSQ-01-10000609', '2', 'Individual', '1410097420_pubform.doc', 'application/msword', '224768', 1);

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
(1, 'CUS-01-10000177', 'TAG-01-10000139', 'CGRU-01-10000098', 'BIT-01-10000001', 'BSQ-01-10000616', 'BSO-01-10000655', 'BDO-01-10000063', 'BIN-01-10000001', 'CPO-01-10000137', 'BPI-01-10000022', 'BSTRA-01-10000982', 'BRF-01-10000119', 'BPO-01-10000191', 'OSS-01-10000072');

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
  `unit_id` varchar(20) DEFAULT NULL,
  `range_description` text,
  `status` int(11) DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `created_by`, `modified_by`, `view`, `created`, `modified`, `from_range`, `to_range`, `unit_id`, `range_description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, NULL, NULL, 0, '2014-08-26 06:49:54', '2014-08-26 06:49:54', '23', '34', '1', 'New Range - 1', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `referedbies`
--

INSERT INTO `referedbies` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `referedby`, `description`, `status`, `is_deleted`) VALUES
(1, '2014-08-21 14:55:47', '2014-08-21 14:55:47', NULL, NULL, 0, 'Mr. Iyappan', 'Mr.Iyappan', 1, 0);

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
(1, 'BSTRA-01-10000803', 'BPO-01-10000191', 'BRF-01-10000118', 'CUS-01-10000123', 0, 'EA SPORT PVT LTD ( San Francisco ) ', 'rr', NULL, '', '9566633605', '12345689', '', '0 COD', '05-September-14', 'PO-12334', NULL, '45', NULL, 'Calibration for Purchase Requisition', 0, 1, '2014-09-05 10:40:03', '2014-09-05 10:40:49', NULL, NULL, 0, 0, 0, 0);

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
(1, '2014-09-05 10:40:03', '2014-09-05 10:40:49', NULL, NULL, 0, '1', NULL, 'Mr.Divo SK', 'test project name', 'Standard', 7, 32, 1, 1, '23', 'test remark', 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reqpur_devices`
--

INSERT INTO `reqpur_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `reqpurchaseorder_id`, `customer_id`, `instrument_name`, `prequistionno`, `brand_name`, `quantity`, `model_no`, `range`, `validity`, `unit_price`, `discount`, `department_name`, `account_service`, `total`, `title`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-09-05 10:39:51', '2014-09-05 10:39:51', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, 0, 1),
(2, '2014-09-05 10:39:51', '2014-09-05 10:39:51', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, 0, 0),
(3, '2014-09-05 10:39:51', '2014-09-05 10:39:51', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, 0, 0),
(4, '2014-09-05 10:39:51', '2014-09-05 10:39:51', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, 0, 0),
(5, '2014-09-05 10:39:51', '2014-09-05 10:39:51', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, 0, 0),
(6, '2014-09-05 10:39:51', '2014-09-05 10:39:51', NULL, NULL, 0, '1', 'CUS-01-10000123', 'My celkon Mobile', 'BRF-01-10000118', 'Nokia', '6', 'Celkon A89', '12-45', 12, '67', '56', 'Temperature', 'Calibration Service', '29.479999999999997', '1', 1, 0, 0);

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
  `is_pocount_satisfied` int(11) DEFAULT NULL,
  `is_approved` varchar(10) DEFAULT NULL,
  `is_approved_lab` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) DEFAULT '0',
  `is_deliveryorder_created` int(11) DEFAULT '0',
  `is_jobcompleted` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorders`
--

INSERT INTO `salesorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorderno`, `track_id`, `branch_id`, `quotation_id`, `quotationno`, `customer_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `reg_date`, `ref_no`, `ref_count`, `our_ref_no`, `in_date`, `due_date`, `priority`, `instrument_type_id`, `remarks`, `service_id`, `sal_description_count`, `po_generate_type`, `is_assign_po`, `is_poapproved`, `is_pocount_satisfied`, `is_approved`, `is_approved_lab`, `status`, `is_deleted`, `is_deliveryorder_created`, `is_jobcompleted`) VALUES
('BSO-01-10000623', '2014-08-27 10:28:55', '2014-08-27 10:29:32', 1, NULL, 0, 'BSO-01-10000623', 'BSTRA-01-10000626', 2, '1', 'BSQ-01-10000602', 'CUS-01-10000123', NULL, 'rr', NULL, '2', '9566633605', '12345689', 'asda@gmail.com', '27-August-14', 'CPO-01-10000113,PO-1234,PO-34', 1, NULL, '27-August-14', '31-August-14', '1', NULL, '', 4, NULL, 'Manual', 1, 0, 1, '1', 1, 1, 0, 0, 1),
('BSO-01-10000650', '2014-09-07 18:59:34', '2014-09-07 18:59:34', 1, NULL, 0, 'BSO-01-10000650', 'BSTRA-01-10000957', 2, '1', 'BSQ-01-10000602', 'CUS-01-10000121', NULL, 'reg', NULL, '12', '9865456456', '45643657658758554', 'MuthuRam.samsys@gmail.com', '08-September-14', 'asasa', NULL, NULL, '08-September-14', '12-September-14', NULL, 1, '', 4, NULL, 'Manual', 0, 0, NULL, '1', 1, 1, 0, 1, 0),
('BSO-01-10000652', '2014-09-07 22:22:11', '2014-09-07 22:22:11', 1, NULL, 0, 'BSO-01-10000652', 'BSTRA-01-10000938', 2, '2', 'BSQ-01-10000609', 'CUS-01-10000123', NULL, 'rr', NULL, '1', '9566633605', '12345689', 'MuthuRam.samsys@gmail.com', '08-September-14', 'CPO-01-10000135,PO-01-10000135,PO-01-100004', NULL, NULL, '08-September-14', '12-September-14', NULL, NULL, '', 4, NULL, 'Manual', 0, 0, NULL, '1', 1, 1, 0, 1, 0),
('BSO-01-10000654', '2014-09-07 22:28:55', '2014-09-07 22:28:55', 1, NULL, 0, 'BSO-01-10000654', 'BSTRA-01-10000949', 2, '3', 'BSQ-01-10000613', 'CUS-01-10000121', NULL, 'reg', NULL, '12', '9865456456', '45643657658758554', 'asd@sda.com', '08-September-14', 'asasa', NULL, NULL, '08-September-14', '12-September-14', NULL, NULL, '', 4, NULL, 'Manual', 0, 0, NULL, '1', 1, 1, 0, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `salespeople`
--

INSERT INTO `salespeople` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesperson`, `salespersoncode`, `description`, `status`, `is_deleted`) VALUES
(3, NULL, NULL, NULL, NULL, 0, 'Ms.Nora Lee', 'TSMN', 'BS Tech,  Calibration Sales, Management , Nora', 1, 0),
(4, NULL, NULL, NULL, NULL, 0, 'Mr.Divo SK', 'TSDD', 'BS Tech,  Calibration Sales, Development , Divo', 1, 0),
(5, NULL, NULL, NULL, NULL, 0, 'Mr.Padma', 'TSCP', 'BS Tech,  Calibration Sales, Coordinate , Padma', 1, 0),
(6, NULL, NULL, NULL, NULL, 0, 'BSTech', 'TBMB', 'Company Customers', 1, 0),
(7, NULL, NULL, NULL, NULL, 0, 'Ms.Nora', 'TSML', 'BS Tech,  Calibration Sales, Management , Nora', 1, 0),
(8, NULL, NULL, NULL, NULL, 0, 'Mr.Sudha', 'TSCS', 'BS Tech,  Calibration Sales, Coordinate , Sudha', 1, 0),
(9, NULL, NULL, NULL, NULL, 0, 'Mr.Malkit', 'TSCM', 'BS Tech,  Calibration Sales, Coordinate , Malkit', 1, 0);

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
  `pending` int(11) DEFAULT '0',
  `processing` varchar(200) DEFAULT '0',
  `checking` int(200) DEFAULT '0',
  `shipping` int(11) DEFAULT '0',
  `ready_deliver` varchar(200) DEFAULT '0',
  `is_delivered` int(11) DEFAULT '0',
  `assign_to` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_approved` varchar(10) DEFAULT NULL,
  `delay` varchar(250) DEFAULT NULL,
  `is_approved_lab` int(11) DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `sal_description`
--

INSERT INTO `sal_description` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quo_ins_id`, `salesorder_id`, `quotation_id`, `quotationno`, `customer_id`, `sales_quantity`, `instrument_id`, `model_no`, `brand_id`, `sales_range`, `sales_calllocation`, `sales_calltype`, `sales_validity`, `sales_unitprice`, `sales_discount`, `department_id`, `sales_accountservice`, `sales_titles`, `sales_total`, `pending`, `processing`, `checking`, `shipping`, `ready_deliver`, `is_delivered`, `assign_to`, `status`, `is_approved`, `delay`, `is_approved_lab`, `is_deleted`) VALUES
(72, '2014-08-27 10:22:43', '2014-08-27 14:46:07', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'onsite', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(71, '2014-08-27 10:22:43', '2014-08-27 14:46:07', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'onsite', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(69, '2014-08-27 10:22:43', '2014-08-27 14:46:07', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'onsite', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(70, '2014-08-27 10:22:43', '2014-08-27 14:46:07', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'onsite', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(68, '2014-08-27 10:22:43', '2014-08-27 14:46:07', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'onsite', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(67, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'onsite', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(66, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'subcontract', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(65, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'subcontract', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(64, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'subcontract', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(63, '2014-08-27 10:22:43', '2014-09-07 06:53:42', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'subcontract', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', 'GHHF', 0, 0),
(62, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'subcontract', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(61, '2014-08-27 10:22:43', '2014-09-07 06:53:48', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'subcontract', 'Non-Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', 'BVHV', 0, 0),
(60, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, '', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(57, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, '', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(58, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, '', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(59, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, '', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(55, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, '', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(56, '2014-08-27 10:22:43', '2014-08-27 10:22:43', NULL, NULL, 0, NULL, 'BSO-01-10000623', 1, 'BSQ-01-10000602', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, '', '1', '10.56', 0, '1', 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0),
(73, '2014-09-07 18:59:25', '2014-09-07 21:06:53', NULL, NULL, 0, NULL, 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(74, '2014-09-07 18:59:25', '2014-09-07 21:06:53', NULL, NULL, 0, NULL, 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(75, '2014-09-07 18:59:25', '2014-09-07 21:06:53', NULL, NULL, 0, NULL, 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Inlab', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(76, '2014-09-07 18:59:25', '2014-09-07 21:06:53', NULL, NULL, 0, NULL, 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Onsite', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(77, '2014-09-07 18:59:25', '2014-09-07 21:06:53', NULL, NULL, 0, NULL, 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Inlab', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(78, '2014-09-07 18:59:25', '2014-09-07 19:41:16', NULL, NULL, 0, NULL, 'BSO-01-10000650', 1, 'BSQ-01-10000602', 'CUS-01-10000121', '6', 1, '3333333333', 1, '1', 'Inlab', 'Singlas', 12, '23', '12', 1, 'calibration service', '1', '20.240000000000002', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(79, '2014-09-07 22:22:02', '2014-09-07 22:22:46', NULL, NULL, 0, NULL, 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(80, '2014-09-07 22:22:02', '2014-09-07 22:22:46', NULL, NULL, 0, NULL, 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(81, '2014-09-07 22:22:02', '2014-09-07 22:22:46', NULL, NULL, 0, NULL, 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(82, '2014-09-07 22:22:02', '2014-09-07 22:22:46', NULL, NULL, 0, NULL, 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(83, '2014-09-07 22:22:02', '2014-09-07 22:22:46', NULL, NULL, 0, NULL, 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(84, '2014-09-07 22:22:02', '2014-09-07 22:22:59', NULL, NULL, 0, NULL, 'BSO-01-10000652', 2, 'BSQ-01-10000609', 'CUS-01-10000123', '6', 2, 'Celkon A89', 2, '1', 'Inlab', 'Singlas', 12, '12', '12', 1, 'calibration service', '1', '10.56', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0),
(85, '2014-09-07 22:28:50', '2014-09-07 22:29:26', NULL, NULL, 0, NULL, 'BSO-01-10000654', 3, 'BSQ-01-10000613', 'CUS-01-10000121', '2', 1, '3333333333', 1, '1', 'Inlab', 'Singlas', 12, '23', '22', 1, 'calibration service', '1', '17.94', 0, '1', 1, 0, '0', 0, NULL, 1, '1', NULL, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `servicetype`, `description`, `status`, `is_deleted`) VALUES
(4, NULL, NULL, NULL, NULL, 0, 'Calibration', 'Calibration', 1, 0),
(5, NULL, NULL, NULL, NULL, 0, 'Repair & Calibration', 'Repair & Calibration', 1, 0),
(6, NULL, NULL, NULL, NULL, 0, 'Purchase & Calibration', 'Purchase & Calibration', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tallyledgers`
--

INSERT INTO `tallyledgers` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `tallyledgeraccount`, `status`, `is_deleted`) VALUES
(5, NULL, NULL, NULL, NULL, 0, 'Calibration Service', 1, 0),
(6, NULL, NULL, NULL, NULL, 0, 'CAlibration', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `title_name`, `title_description`, `status`, `is_deleted`) VALUES
(3, '2014-07-04 09:53:54', '2014-07-04 09:54:20', NULL, NULL, NULL, 'test title', 'fsdfs', 1, 0),
(4, '2014-07-04 09:54:41', '2014-07-04 09:54:41', NULL, NULL, NULL, 'tedsafd', 'sfdsfsdfsf', 1, 0),
(6, '2014-07-04 09:55:06', '2014-07-07 13:51:43', NULL, NULL, NULL, 'tedsafd', 'adadada', 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `unit_name`, `unit_description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2014-08-21 15:18:50', '2014-08-21 15:19:34', NULL, NULL, 0, 'Cm', 'Centi Metre', 1, 1, 0),
(2, '2014-08-21 15:24:32', '2014-08-21 15:24:32', NULL, NULL, 0, 'Vt', 'Volt', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `user_role_id`, `user_role`, `description`, `js_enc`, `other_branch`, `other_department`, `other_role`, `other_user`, `other_currency`, `other_assignedto`, `other_servicetype`, `other_additional`, `other_tallyledger`, `other_country`, `cus_industry`, `cus_location`, `cus_customer`, `cus_paymentterms`, `cus_priority`, `cus_referredby`, `cus_salesperson`, `cus_title`, `ins_procedureno`, `ins_brand`, `ins_instrument`, `ins_instrumentforgroup`, `ins_range`, `ins_title`, `ins_unit`, `set_candd`, `set_onsiteemail`, `set_recallservice`, `dim_instrument`, `tem_instrument`, `tem_ambient`, `tem_other`, `tem_range`, `tem_relativehumidity`, `tem_uncertainity`, `tem_readingtype`, `tem_channel`, `tem_formdatas`, `tem_template`, `tem_instrumentval`, `tem_unitconversion`, `tem_unit`, `pre_instrument`, `pre_ambient`, `pre_other`, `pre_range`, `pre_relativehumidity`, `pre_statementname`, `pre_statement1`, `pre_statement2`, `pre_vaccumsensor`, `pre_uncertainitydata`, `pre_formdatas`, `elec_instrument`, `elec_ambient`, `elec_location`, `elec_other`, `elec_range`, `elec_relative`, `elec_signal`, `elec_unit`, `elec_reference`, `elec_dcv`, `elec_acc`, `elec_acv`, `elec_capacitance`, `elec_dcc`, `elec_freq`, `elec_inductance`, `elec_resis1`, `elec_resis2`, `elec_formdatas`, `job_quotation`, `job_salesorder`, `job_deliveryorder`, `job_transaction`, `job_labprocess`, `job_purchaseorder`, `job_proforma`, `job_subcontract`, `job_candd`, `job_invoice`, `job_tracking`, `job_debt`, `job_onsite`, `job_recall`, `job_jobmonitor`, `job_purchasereq`, `job_prpurchaseorder`, `temp_dashboard`, `sales_contacts`, `sales_leads`, `sales_task`, `sales_campaign`, `rep_individualsales`, `rep_salesdetails`, `rep_performance`, `rep_quotedamount`, `rep_quotationreport`, `rep_fulldetails`, `rep_annualsales`, `rep_labinvolve`, `rep_quotedandsales`, `rep_dailywork`, `data_quotation`, `data_salesorder`, `data_deliveryorder`, `data_invoice`, `data_purchaseorder`, `data_proforma`, `data_subcontract`, `data_candd`, `data_recall`, `data_querywindow`, `dash_debt`, `dash_labprocess`, `dash_jobsum`, `app_customer`, `app_quotation`, `app_salesorder`, `app_deliveryorder1`, `app_deliveryorder2`, `app_invoice`, `app_procedureno`, `app_brand`, `app_instrument`, `app_instrumentgroup`, `app_range`, `app_unit`, `app_ready`, `app_prsupervisor`, `app_prmanager`, `temp_engineer`, `temp_supervisor`, `temp_manager`, `mis_editjob`, `mis_customerins`, `mis_inlabitems`, `mis_subcontract`, `mis_insite`, `status`, `is_deleted`) VALUES
(1, NULL, NULL, NULL, NULL, 0, 1, 'SuperAdmin', '', 'a:66:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(2, NULL, NULL, NULL, NULL, 0, 2, 'Admin', '', 'a:66:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(3, NULL, '2014-07-22 08:57:27', NULL, NULL, 0, 3, 'Tech-Manager', 'vcbcv', 'a:59:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(4, NULL, NULL, NULL, NULL, 0, 4, 'Tech-Engineer', '', 'a:59:{s:12:"other_branch";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"cus_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(5, NULL, NULL, NULL, NULL, 0, 5, 'Tech-Supervisor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(6, NULL, NULL, NULL, NULL, 0, 6, 'Sales-Executive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(7, NULL, NULL, NULL, NULL, 0, 7, 'Sales-Supervisor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(8, NULL, NULL, NULL, NULL, 0, 8, 'Sales-Manager', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(9, NULL, NULL, NULL, NULL, 0, 9, 'Admin-Executive', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(10, NULL, NULL, NULL, NULL, 0, 10, 'Admin-Supervisor', 'Ne', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(11, '2014-08-12 06:49:47', '2014-08-12 06:49:47', NULL, NULL, 0, 11, 'new', 'new', 'a:59:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"0";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"0";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"0";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"cus_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userrole_id`, `firstname`, `lastname`, `emailid`, `created`, `modified`, `created_by`, `modified_by`, `view`, `status`, `is_deleted`) VALUES
(1, 'admin', 'admin@123', 1, 'dsfsd', 'dsfsdf', 'dsfsd@dfss.com', '2014-04-23 09:24:32', '2014-08-21 14:53:15', 0, 0, 0, 1, 0),
(5, 'krish', 'krish', 11, 'sd', '', 'w@gfs.sdf', '2014-05-05 13:38:18', '2014-08-21 14:53:22', 0, 0, 0, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user_departments`
--

INSERT INTO `user_departments` (`id`, `created`, `modified`, `user_id`, `department_id`, `status`) VALUES
(32, '2014-08-21 14:53:22', '2014-08-21 14:53:22', 5, 3, 1),
(31, '2014-08-21 14:53:22', '2014-08-21 14:53:22', 5, 2, 1),
(30, '2014-08-21 14:53:15', '2014-08-21 14:53:15', 1, 2, 1),
(29, '2014-08-21 14:53:15', '2014-08-21 14:53:15', 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
