-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2015 at 03:33 PM
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
(1, '2015-02-02 17:10:45', '2015-02-02 17:10:45', NULL, NULL, 0, 'Special Service Charge', '', 1, 0),
(2, '2015-02-13 04:21:20', '2015-02-13 04:21:20', NULL, NULL, 0, 'Transportation Charge', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `assignedto`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-02-02 17:06:39', '2015-02-02 17:06:39', NULL, NULL, 0, 'Nissam', '', 1, 0),
(2, '2015-02-13 04:19:57', '2015-02-13 04:19:57', NULL, NULL, 0, 'Sekar', '', 1, 0);

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
(1, '2015-02-02 17:04:16', '2015-02-02 17:04:16', NULL, NULL, 0, 'Singapore', '41 Senokmo Drive\r\nSingapore 758249', '64584411', '64584400', 'www.bs.sg', '12345G', 'G12345', 1, 1, '7', 1, 0),
(2, '2015-02-13 04:16:50', '2015-02-13 04:16:50', NULL, NULL, 0, 'Malaysia', '12 JB Town,#04-04\r\nMalaysia 1234321', '66665555', '66665555', 'www.bs.sg', '123G', 'G123', 0, 1, '0', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `brandname`, `branddescription`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2015-02-02 17:45:27', '2015-02-02 17:45:27', NULL, NULL, 0, 'REO TEMP', 'REO TEMP', 1, 1, 0),
(2, '2015-02-05 14:58:57', '2015-02-05 14:58:57', NULL, NULL, 0, 'SYSCO', 'SYSCO', 1, 1, 0),
(3, '2015-02-13 05:13:15', '2015-02-13 05:13:15', NULL, NULL, 0, 'WIKA', 'WIKA', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=7 ;

--
-- Dumping data for table `candds`
--

INSERT INTO `candds` (`id`, `order_by`, `created`, `modified`, `canddno`, `readytodeliver_items_id`, `collection_delivery_id`, `cd_date`, `purpose`, `customer_id`, `branch_id`, `customername`, `Contactpersoninfo_id`, `assign_id`, `customer_address`, `address_id`, `phone`, `remarks`, `is_approval_date`, `is_approved`, `is_jobcompleted`, `status`, `is_deleted`) VALUES
(1, NULL, '2015-02-13 08:13:36', '2015-02-13 08:13:36', NULL, '1', NULL, '14-February-15', 'Delivery', 'CUS-05-000003', 1, 'BS AQUATIERRA PTE LTD', 4, 1, '41 Senoko Drive \r\nSingapore 758249', 0, '64584411', '', NULL, '1', 0, 1, 0),
(2, NULL, '2015-02-13 08:14:07', '2015-02-13 08:14:07', NULL, NULL, NULL, '14-February-15', 'Collection', 'CUS-05-000004', 1, 'BS OFFSHORE PTE LTD ( MAIN ) ', 5, 2, '41 Senoko Drive\nSingapore 758249', 0, '', 'PG-3', NULL, '1', 0, 0, 0),
(3, NULL, '2015-02-24 14:41:19', '2015-02-24 14:41:19', NULL, '2', NULL, '25-February-15', 'Delivery', 'CUS-05-000002', 1, 'ALLIANCE AIRSUPPORT PTE LTD', 1, 1, '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', 0, '6547 1910', '', NULL, '1', 0, 1, 0),
(4, NULL, '2015-02-24 14:46:20', '2015-02-24 14:46:20', NULL, '3', NULL, '24-February-15', 'Delivery', 'CUS-05-000002', 1, 'ALLIANCE AIRSUPPORT PTE LTD', 1, 1, '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', 0, '6547 1910', '', NULL, '0', 0, 1, 0),
(5, NULL, '2015-03-03 05:55:27', '2015-03-03 05:55:27', NULL, '4', NULL, '03-March-15', 'Delivery', 'CUS-05-000003', 1, 'BS AQUATIERRA PTE LTD', 3, 1, '41 Senoko Drive Singapore 758249', 0, '64584411', '', NULL, '0', 0, 1, 0),
(6, NULL, '2015-03-03 06:34:24', '2015-03-03 06:34:24', NULL, '5', NULL, '03-March-15', 'Delivery', 'CUS-05-000004', 1, 'BS OFFSHORE PTE LTD', 5, 1, '41 Senoko Drive\r\nSingapore 758249', 0, '64584411', '', NULL, '0', 0, 1, 0);

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
(1, '2015-03-03 14:21:03', '2015-03-03 14:21:03', NULL, NULL, NULL, 1, 50, '21:45', 'C', 1, 0),
(2, '2015-03-03 14:21:57', '2015-03-03 14:21:57', NULL, NULL, NULL, 1, 48, '23:45', 'D', 1, 0);

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
(1, '2015-02-02 17:00:18', '2015-02-02 17:00:18', NULL, NULL, 0, 'Singapore', 'Sgd', 1, 0),
(2, '2015-02-13 04:18:44', '2015-02-13 04:18:44', NULL, NULL, 0, 'Malaysia', 'MY', 1, 0);

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
(1, 1, 'S$', 'Sgd', 20.1, 1, '2015-02-02 17:02:17', '2015-02-24 13:38:53', NULL, NULL, 0, 0),
(2, 2, 'MYR', 'MYR', 2.5, 1, '2015-02-13 04:19:39', '2015-02-13 04:19:39', NULL, NULL, 0, 0);

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
('CUS-05-000002', '2015-02-02 18:02:28', '2015-02-02 18:02:28', NULL, NULL, 0, 'CGRU-05-000002', 'TAG-05-000002', NULL, 'MAIN', 'ALLIANCE AIRSUPPORT PTE LTD', '349327', '6547 1910', '6547 1912', 1, 1, 'Customer', 'ALL CAL CERT:\r\nFOLLOW AS SALES ORDER ADDRESS\r\n', '-', 1, '1', 'Singlas', '3', '2', NULL, 1, NULL, NULL, 1, 1, '2015-02-02', '1', 1, 0),
('CUS-05-000003', '2015-02-13 05:09:19', '2015-02-13 07:11:32', NULL, NULL, 0, 'CGRU-05-000003', 'TAG-05-000003', NULL, 'MAIN', 'BS AQUATIERRA PTE LTD', '758249', '64584411', '64584400', 2, 3, 'Customer', 'PO - MUST BE FOLLOW', 'ADD TAG NO IN CERTS', 2, '1', 'Singlas', '3', '2', NULL, 1, NULL, NULL, 1, 1, '2015-02-13', '1', 1, 0),
('CUS-05-000004', '2015-02-13 07:50:04', '2015-02-24 15:02:09', NULL, NULL, 0, 'CGRU-05-000004', 'TAG-05-000004', NULL, 'MAIN', 'BS OFFSHORE PTE LTD', '758249', '64584411', '64584400', 1, 1, 'Customer/Sub-Contractor', '-', '-', 1, '1', 'Singlas', '1', '2', NULL, 1, NULL, NULL, 1, 1, '2015-02-13', '1', 1, 0),
('CUS-05-000005', '2015-02-13 08:24:35', '2015-02-13 08:24:35', NULL, NULL, 0, 'CGRU-05-000005', 'TAG-05-000005', NULL, 'MAIN', 'CAL TEC', '323232', '32132323', '323232', 1, 1, 'Supplier', '', '', 1, '1', 'Singlas', '3', '2', NULL, 1, NULL, NULL, 1, 1, '2015-02-13', '1', 1, 0),
('CUS-05-000006', '2015-02-26 06:55:45', '2015-02-26 06:55:45', NULL, NULL, 0, 'CGRU-05-000002', 'TAG-05-000006', NULL, 'Bangalore', 'ALLIANCE AIRSUPPORT PTE LTD', '23424234', '23424234', '23423424', 1, 1, 'Customer', '------------', '-------------', 1, '1', 'Singlas', '1', NULL, NULL, 1, NULL, NULL, 0, 1, '0000-00-00', NULL, 1, 0);

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
  `cost` int(11) NOT NULL DEFAULT '0',
  `contract_disc` int(11) NOT NULL DEFAULT '0',
  `unit_price` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `is_approved_date` varchar(200) DEFAULT NULL,
  `is_approved_by` int(11) DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer_instruments`
--

INSERT INTO `customer_instruments` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `instrument_id`, `branch_id`, `model_no`, `range_id`, `cost`, `contract_disc`, `unit_price`, `status`, `is_deleted`, `is_approved_date`, `is_approved_by`, `is_approved`) VALUES
(1, 1, '2015-02-02 18:08:25', '2015-02-10 15:23:04', NULL, NULL, 0, 'CUS-05-000002', 1, NULL, '72-2080', '1', 130, 23, '159', 1, 0, '02-February-15', 1, 1),
(2, 1, '2015-02-13 05:29:44', '2015-02-13 05:29:44', NULL, NULL, 0, 'CUS-05-000003', 2, NULL, 'Q12', '3', 150, 30, '180', 1, 0, '13-February-15', 1, 1),
(3, 2, '2015-02-13 05:30:54', '2015-02-13 05:30:54', NULL, NULL, 0, 'CUS-05-000003', 1, NULL, 'Q31', '1', 200, 20, '260', 1, 0, '13-February-15', 1, 1),
(4, 2, '2015-02-24 13:47:20', '2015-02-24 13:51:14', NULL, NULL, 0, 'CUS-05-000002', 1, NULL, '2345', '1', 500, 100, '520', 1, 0, '24-February-15', 1, 1),
(5, 1, '2015-02-24 15:03:18', '2015-02-24 15:03:18', NULL, NULL, 0, 'CUS-05-000004', 1, NULL, '2434', '1', 250, 34, '316', 1, 0, '24-February-15', 1, 1),
(6, 3, '2015-02-25 15:46:08', '2015-02-25 15:46:08', NULL, NULL, 0, 'CUS-05-000002', 1, NULL, '345435', '1', 234, 0, '327.6', 1, 0, '2015-03-04', 1, 1),
(7, 4, '2015-03-04 07:09:01', '2015-03-04 07:09:01', NULL, NULL, 0, 'CUS-05-000002', 1, NULL, 'asasa', '3', 564, 6, '783.6', 1, 0, '2015-03-04', 1, 1),
(8, 5, '2015-03-04 07:09:46', '2015-03-04 07:09:46', NULL, NULL, 0, 'CUS-05-000002', 1, NULL, 'aaaaaa', '3', 45, 0, '63', 1, 0, '2015-03-04', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cus_addresses`
--

INSERT INTO `cus_addresses` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `address_id`, `address`, `type`, `status`, `is_deleted`) VALUES
(1, '2015-02-02 17:59:31', '2015-02-02 17:59:31', NULL, NULL, 0, 'CUS-05-000002', 'TAG-05-000002', 'CGRU-05-000002', 1498089142, '68 KALLANG PUDDING ROAD\n#03-03 SYH LOGISTICS BUILDING\nSINGAPORE 349327', 'registered', 1, 0),
(4, '2015-02-13 07:08:24', '2015-02-13 07:08:24', NULL, NULL, 0, 'CUS-05-000003', 'TAG-05-000003', NULL, 2136335142, '41 Senoko Drive Singapore 758249', 'registered', 1, 0),
(5, '2015-02-13 07:48:32', '2015-02-13 07:48:32', NULL, NULL, 0, 'CUS-05-000004', 'TAG-05-000004', 'CGRU-05-000004', 69597884, '41 Senoko Drive\nSingapore 758249', 'registered', 1, 0),
(6, '2015-02-13 08:23:42', '2015-02-13 08:23:42', NULL, NULL, 0, 'CUS-05-000005', 'TAG-05-000005', 'CGRU-05-000005', 433440306, '12 TUAS\nSINGAPORE 432342', 'registered', 1, 0),
(7, '2015-02-26 06:54:21', '2015-02-26 06:54:21', NULL, NULL, 0, 'CUS-05-000006', 'TAG-05-000006', 'CGRU-05-000002', 430176280, 'Bangalore', 'registered', 1, 0),
(8, '2015-02-26 06:54:26', '2015-02-26 06:54:26', NULL, NULL, 0, 'CUS-05-000006', 'TAG-05-000006', 'CGRU-05-000002', 482986276, 'Bangalore', 'billing', 1, 0),
(9, '2015-02-26 06:54:36', '2015-02-26 06:54:36', NULL, NULL, 0, 'CUS-05-000006', 'TAG-05-000006', 'CGRU-05-000002', 2126329239, 'Bangalore', 'delivery', 1, 0);

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
(1, '2015-02-02 18:02:05', '2015-02-16 10:44:27', NULL, NULL, 0, 'CUS-05-000002', 'TAG-05-000002', 'CGRU-05-000002', '97547738', 'ALAIRSUP@SINGNET.COM.SG', '', 'MS SARA', '', '', '', '', '', 1, 0),
(3, '2015-02-13 05:09:06', '2015-02-13 05:09:15', NULL, NULL, 0, 'CUS-05-000003', 'TAG-05-000003', 'CGRU-05-000003', '50716320', 'mohanam@bsaquatierra.com', '', 'Mohanam', '', '', '', '', '', 1, 0),
(4, '2015-02-13 07:11:28', '2015-02-13 07:11:28', NULL, NULL, 0, 'CUS-05-000003', 'TAG-05-000003', 'CGRU-05-000003', NULL, 'mohan@bs.sg', '', 'Mohan', '', '', '', '', '', 1, 0),
(5, '2015-02-13 07:49:36', '2015-02-13 07:49:36', NULL, NULL, 0, 'CUS-05-000004', 'TAG-05-000004', 'CGRU-05-000004', '03608620', 'nadia@bsoffshore.com', '', 'Nadia', '', '', '', '', '', 1, 0),
(6, '2015-02-13 07:50:02', '2015-02-13 07:50:02', NULL, NULL, 0, 'CUS-05-000004', 'TAG-05-000004', 'CGRU-05-000004', '90214377', 'rejesh@bsoffshore.com', '', 'Rajesh', '', '', '', '', '', 1, 0),
(7, '2015-02-13 08:24:32', '2015-02-13 08:24:32', NULL, NULL, 0, 'CUS-05-000005', 'TAG-05-000005', 'CGRU-05-000005', '11827268', 'jo@bs.sg', '', 'Jonne', '', '', '', '', '', 1, 0),
(8, '2015-02-26 06:55:43', '2015-02-26 06:55:43', NULL, NULL, 0, 'CUS-05-000006', 'TAG-05-000006', 'CGRU-05-000002', NULL, 'aer@alliance.ba', '--', 'aer', 'Temp', '98798988854', 'Engineer', '98935568855', 'none', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cus_referbies`
--

INSERT INTO `cus_referbies` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `referedby_id`, `status`) VALUES
(1, '2015-02-02 18:02:28', '2015-02-02 18:02:28', NULL, NULL, 0, 'CUS-05-000002', 'TAG-05-000002', 'CGRU-05-000002', '1', 1),
(4, '2015-02-13 07:11:32', '2015-02-13 07:11:32', NULL, NULL, 0, 'CUS-05-000003', NULL, NULL, '2', 1),
(8, '2015-02-24 15:02:09', '2015-02-24 15:02:09', NULL, NULL, 0, 'CUS-05-000004', NULL, NULL, '1', 1),
(7, '2015-02-13 08:24:35', '2015-02-13 08:24:35', NULL, NULL, 0, 'CUS-05-000005', 'TAG-05-000005', 'CGRU-05-000005', '2', 1),
(9, '2015-02-26 06:55:45', '2015-02-26 06:55:45', NULL, NULL, 0, 'CUS-05-000006', 'TAG-05-000006', 'CGRU-05-000002', '1', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cus_salespeople`
--

INSERT INTO `cus_salespeople` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `tag_id`, `customergroup_id`, `salespeople_id`, `status`) VALUES
(1, '2015-02-02 18:02:28', '2015-02-02 18:02:28', NULL, NULL, 0, 'CUS-05-000002', 'TAG-05-000002', 'CGRU-05-000002', '1', 1),
(4, '2015-02-13 07:11:32', '2015-02-13 07:11:32', NULL, NULL, 0, 'CUS-05-000003', NULL, NULL, '1', 1),
(8, '2015-02-24 15:02:09', '2015-02-24 15:02:09', NULL, NULL, 0, 'CUS-05-000004', NULL, NULL, '1', 1),
(7, '2015-02-13 08:24:35', '2015-02-13 08:24:35', NULL, NULL, 0, 'CUS-05-000005', 'TAG-05-000005', 'CGRU-05-000005', '1', 1),
(9, '2015-02-26 06:55:45', '2015-02-26 06:55:45', NULL, NULL, 0, 'CUS-05-000006', 'TAG-05-000006', 'CGRU-05-000002', '1', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `datalogs`
--

INSERT INTO `datalogs` (`id`, `logname`, `logid`, `logactivity`, `user_id`, `created`, `modified`, `viewed`, `viewed_by`) VALUES
(1, 'Unit', '1', 'Add', '1', '2015-02-02 17:36:33', '2015-02-02 17:36:33', 0, NULL),
(2, 'Unit', '2', 'Add', '1', '2015-02-02 17:38:42', '2015-02-02 17:38:42', 0, NULL),
(3, 'Instrument For Group', '1', 'Add', '1', '2015-02-02 17:42:20', '2015-02-02 17:42:20', 0, NULL),
(4, 'Range', '1', 'Add', '1', '2015-02-02 17:44:09', '2015-02-02 17:44:09', 0, NULL),
(5, 'Brand', '1', 'Add', '1', '2015-02-02 17:45:27', '2015-02-02 17:45:27', 0, NULL),
(6, 'Procedure No', '1', 'Add', '1', '2015-02-02 17:46:43', '2015-02-02 17:46:43', 0, NULL),
(7, 'Instrument', '1', 'Add', '1', '2015-02-02 17:58:12', '2015-02-02 17:58:12', 0, NULL),
(8, 'Customer', 'CUS-05-000002', 'Add', '1', '2015-02-02 18:02:28', '2015-02-02 18:02:28', 0, NULL),
(9, 'Costing', '1', 'Add', '1', '2015-02-02 18:08:25', '2015-02-02 18:08:25', 0, NULL),
(10, 'Quotation', 'BSQ-05-000002', 'Add', '1', '2015-02-02 18:14:06', '2015-02-02 18:14:06', 0, NULL),
(11, 'Salesorder', 'BSO-05-000002', 'Add', '1', '2015-02-02 18:15:39', '2015-02-02 18:15:39', 0, NULL),
(12, 'Brand', '2', 'Add', '1', '2015-02-05 14:58:57', '2015-02-05 14:58:57', 0, NULL),
(13, 'Range', '2', 'Add', '1', '2015-02-05 15:05:50', '2015-02-05 15:05:50', 0, NULL),
(14, 'Procedure No', '2', 'Add', '1', '2015-02-05 15:08:34', '2015-02-05 15:08:34', 0, NULL),
(15, 'Quotation', 'BSQ-05-000003', 'Add', '1', '2015-02-09 11:00:25', '2015-02-09 11:00:25', 0, NULL),
(16, 'Quotation', 'BSQ-05-000003', 'Add', '1', '2015-02-09 11:02:27', '2015-02-09 11:02:27', 0, NULL),
(17, 'Salesorder', 'BSO-05-000003', 'Add', '1', '2015-02-09 11:02:44', '2015-02-09 11:02:44', 0, NULL),
(18, 'Customer', 'CUS-05-000003', 'Add', '1', '2015-02-13 05:09:19', '2015-02-13 05:09:19', 0, NULL),
(19, 'Unit', '3', 'Add', '1', '2015-02-13 05:10:58', '2015-02-13 05:10:58', 0, NULL),
(20, 'Procedure No', '3', 'Add', '1', '2015-02-13 05:11:37', '2015-02-13 05:11:37', 0, NULL),
(21, 'Brand', '3', 'Add', '1', '2015-02-13 05:13:15', '2015-02-13 05:13:15', 0, NULL),
(22, 'Range', '3', 'Add', '1', '2015-02-13 05:25:58', '2015-02-13 05:25:58', 0, NULL),
(23, 'Instrument', '2', 'Add', '1', '2015-02-13 05:27:35', '2015-02-13 05:27:35', 0, NULL),
(24, 'Costing', '2', 'Add', '1', '2015-02-13 05:29:44', '2015-02-13 05:29:44', 0, NULL),
(25, 'Costing', '3', 'Add', '1', '2015-02-13 05:30:54', '2015-02-13 05:30:54', 0, NULL),
(26, 'Customer', 'CUS-05-000003', 'Edit', '1', '2015-02-13 07:07:36', '2015-02-13 07:07:36', 0, NULL),
(27, 'Customer', 'CUS-05-000003', 'Edit', '1', '2015-02-13 07:08:34', '2015-02-13 07:08:34', 0, NULL),
(28, 'Customer', 'CUS-05-000003', 'Edit', '1', '2015-02-13 07:11:32', '2015-02-13 07:11:32', 0, NULL),
(29, 'Quotation', 'BQS-05-000002', 'Add', '1', '2015-02-13 07:15:23', '2015-02-13 07:15:23', 0, NULL),
(30, 'Customer', 'CUS-05-000004', 'Add', '1', '2015-02-13 07:50:04', '2015-02-13 07:50:04', 0, NULL),
(31, 'Quotation', 'BQS-05-000003', 'Add', '1', '2015-02-13 07:58:14', '2015-02-13 07:58:14', 0, NULL),
(32, 'Salesorder', '4', 'Add', '1', '2015-02-13 07:59:54', '2015-02-13 07:59:54', 0, NULL),
(33, 'Deliveryorder', 'BDO-05-000002', 'Add', '1', '2015-02-13 08:01:04', '2015-02-13 08:01:04', 0, NULL),
(34, 'ClientPO', 'BSO-05-000004', 'Add', '1', '2015-02-13 08:01:04', '2015-02-13 08:01:04', 0, NULL),
(35, 'ClientPO', 'BSO-05-000004', 'Approve', '1', '2015-02-13 08:03:42', '2015-02-13 08:03:42', 0, NULL),
(36, 'Deliveryorder', '1', 'Approve', '1', '2015-02-13 08:09:06', '2015-02-13 08:09:06', 0, NULL),
(37, 'Invoice', 'BSO-05-000004', 'Add', '1', '2015-02-13 08:09:08', '2015-02-13 08:09:08', 0, NULL),
(38, 'C&Dinfo', '1', 'Add Delivery', '1', '2015-02-13 08:13:36', '2015-02-13 08:13:36', 0, NULL),
(39, 'C&Dinfo', '2', 'Add Collection', '1', '2015-02-13 08:14:07', '2015-02-13 08:14:07', 0, NULL),
(40, 'Quotation', 'BSQ-05-000005', 'Add', '1', '2015-02-13 08:17:37', '2015-02-13 08:17:37', 0, NULL),
(41, 'Salesorder', 'BSO-05-000005', 'Add', '1', '2015-02-13 08:18:03', '2015-02-13 08:18:03', 0, NULL),
(42, 'Customer', 'CUS-05-000004', 'Edit', '1', '2015-02-13 08:22:59', '2015-02-13 08:22:59', 0, NULL),
(43, 'Customer', 'CUS-05-000005', 'Add', '1', '2015-02-13 08:24:35', '2015-02-13 08:24:35', 0, NULL),
(44, 'SubCon', '1', 'Add', '1', '2015-02-13 08:25:44', '2015-02-13 08:25:44', 0, NULL),
(45, 'SubCon', '2', 'Add', '1', '2015-02-13 08:26:52', '2015-02-13 08:26:52', 0, NULL),
(46, 'SubCon', '1', 'Add', '1', '2015-02-13 08:27:14', '2015-02-13 08:27:14', 0, NULL),
(47, 'SubCon', '2', 'Add', '1', '2015-02-13 08:27:42', '2015-02-13 08:27:42', 0, NULL),
(48, 'Deliveryorder', 'BDO-05-000003', 'Add', '1', '2015-02-13 08:28:44', '2015-02-13 08:28:44', 0, NULL),
(49, 'ClientPO', 'BSO-05-000005', 'Approve', '1', '2015-02-13 08:31:31', '2015-02-13 08:31:31', 0, NULL),
(50, 'Deliveryorder', '2', 'Approve', '1', '2015-02-13 08:32:06', '2015-02-13 08:32:06', 0, NULL),
(51, 'Purchaseorders', '1', 'Add', '1', '2015-02-13 08:43:57', '2015-02-13 08:43:57', 0, NULL),
(52, 'Quotation', 'BSQ-05-000006', 'Add', '1', '2015-02-13 08:47:51', '2015-02-13 08:47:51', 0, NULL),
(53, 'Salesorder', 'BSO-05-000006', 'Add', '1', '2015-02-13 08:48:36', '2015-02-13 08:48:36', 0, NULL),
(54, 'Onsite', '1', 'Add', '1', '2015-02-13 08:50:50', '2015-02-13 08:50:50', 0, NULL),
(55, 'Purchaseorders', '6', 'Add', '1', '2015-02-24 07:32:49', '2015-02-24 07:32:49', 0, NULL),
(56, 'Purchaseorders', '7', 'Add', '1', '2015-02-24 07:34:21', '2015-02-24 07:34:21', 0, NULL),
(57, 'Purchaseorders', '8', 'Add', '1', '2015-02-24 07:35:14', '2015-02-24 07:35:14', 0, NULL),
(58, 'Purchaseorders', '9', 'Add', '1', '2015-02-24 07:36:32', '2015-02-24 07:36:32', 0, NULL),
(59, 'Purchaseorders', '10', 'Add', '1', '2015-02-24 09:44:16', '2015-02-24 09:44:16', 0, NULL),
(60, 'Purchaseorders', '11', 'Add', '1', '2015-02-24 09:46:22', '2015-02-24 09:46:22', 0, NULL),
(61, 'Purchaseorders', '12', 'Add', '1', '2015-02-24 09:53:51', '2015-02-24 09:53:51', 0, NULL),
(62, 'Purchaseorders', '12', 'Add', '1', '2015-02-24 10:27:01', '2015-02-24 10:27:01', 0, NULL),
(63, 'Costing', '4', 'Add', '1', '2015-02-24 13:47:20', '2015-02-24 13:47:20', 0, NULL),
(64, 'Quotation', 'BSQ-05-000007', 'Add', '1', '2015-02-24 14:12:47', '2015-02-24 14:12:47', 0, NULL),
(65, 'Quotation', 'BSQ-05-000007', 'Add', '1', '2015-02-24 14:13:37', '2015-02-24 14:13:37', 0, NULL),
(66, 'Quotation', 'BSQ-05-000007', 'Add', '1', '2015-02-24 14:13:55', '2015-02-24 14:13:55', 0, NULL),
(67, 'Salesorder', 'BSO-05-000007', 'Add', '1', '2015-02-24 14:15:01', '2015-02-24 14:15:01', 0, NULL),
(68, 'Deliveryorder', 'BDO-05-000004', 'Add', '1', '2015-02-24 14:23:48', '2015-02-24 14:23:48', 0, NULL),
(69, 'ClientPO', 'BSO-05-000007', 'Approve', '1', '2015-02-24 14:34:35', '2015-02-24 14:34:35', 0, NULL),
(70, 'Deliveryorder', '3', 'Approve', '1', '2015-02-24 14:37:05', '2015-02-24 14:37:05', 0, NULL),
(71, 'C&Dinfo', '3', 'Add Delivery', '1', '2015-02-24 14:41:20', '2015-02-24 14:41:20', 0, NULL),
(72, 'Deliveryorder', 'BDO-05-000005', 'Add', '1', '2015-02-24 14:44:59', '2015-02-24 14:44:59', 0, NULL),
(73, 'ClientPO', 'BSO-05-000007', 'Add', '1', '2015-02-24 14:44:59', '2015-02-24 14:44:59', 0, NULL),
(74, 'Deliveryorder', '4', 'Approve', '1', '2015-02-24 14:45:29', '2015-02-24 14:45:29', 0, NULL),
(75, 'Invoice', 'BSO-05-000007', 'Add', '1', '2015-02-24 14:45:31', '2015-02-24 14:45:31', 0, NULL),
(76, 'C&Dinfo', '4', 'Add Delivery', '1', '2015-02-24 14:46:20', '2015-02-24 14:46:20', 0, NULL),
(77, 'Customer', 'CUS-05-000004', 'Edit', '1', '2015-02-24 15:02:09', '2015-02-24 15:02:09', 0, NULL),
(78, 'Costing', '5', 'Add', '1', '2015-02-24 15:03:19', '2015-02-24 15:03:19', 0, NULL),
(79, 'Quotation', 'BSQ-05-000008', 'Add', '1', '2015-02-24 15:06:43', '2015-02-24 15:06:43', 0, NULL),
(80, 'Salesorder', 'BSO-05-000008', 'Add', '1', '2015-02-24 15:06:56', '2015-02-24 15:06:56', 0, NULL),
(81, 'Deliveryorder', 'BDO-05-000006', 'Add', '1', '2015-02-24 15:13:30', '2015-02-24 15:13:30', 0, NULL),
(82, 'ClientPO', 'CPO-05-000016', 'Add', '1', '2015-02-24 15:13:30', '2015-02-24 15:13:30', 0, NULL),
(83, 'Quotation', 'BSQ-05-000009', 'Add', '1', '2015-02-24 15:20:01', '2015-02-24 15:20:01', 0, NULL),
(84, 'Salesorder', 'BSO-05-000009', 'Add', '1', '2015-02-24 15:20:11', '2015-02-24 15:20:11', 0, NULL),
(85, 'Deliveryorder', 'BDO-05-000007', 'Add', '1', '2015-02-24 15:21:05', '2015-02-24 15:21:05', 0, NULL),
(86, 'ClientPO', 'CPO-05-000018', 'Add', '1', '2015-02-24 15:21:05', '2015-02-24 15:21:05', 0, NULL),
(87, 'ClientPO', 'PO12345', 'Approve', '1', '2015-02-24 15:27:12', '2015-02-24 15:27:12', 0, NULL),
(88, 'Deliveryorder', '5', 'Approve', '1', '2015-02-24 15:27:51', '2015-02-24 15:27:51', 0, NULL),
(89, 'Deliveryorder', '6', 'Approve', '1', '2015-02-24 15:28:08', '2015-02-24 15:28:08', 0, NULL),
(90, 'Invoice', 'PO12345', 'Add', '1', '2015-02-24 15:28:09', '2015-02-24 15:28:09', 0, NULL),
(91, 'Quotation', 'BQS-05-000007', 'Add', '1', '2015-02-25 09:36:34', '2015-02-25 09:36:34', 0, NULL),
(92, 'Quotation', 'BQS-05-000008', 'Add', '1', '2015-02-25 09:38:19', '2015-02-25 09:38:19', 0, NULL),
(93, 'Quotation', 'BQS-05-000009', 'Add', '1', '2015-02-25 09:39:59', '2015-02-25 09:39:59', 0, NULL),
(94, 'Quotation', 'BQS-05-000002', 'Add', '1', '2015-02-25 14:39:57', '2015-02-25 14:39:57', 0, NULL),
(95, 'Quotation', 'BQS-05-000003', 'Add', '1', '2015-02-25 14:40:22', '2015-02-25 14:40:22', 0, NULL),
(96, 'Salesorder', 'BSO-05-000002', 'Edit', '1', '2015-02-25 15:12:02', '2015-02-25 15:12:02', 0, NULL),
(97, 'Salesorder', 'BSO-05-000002', 'Edit', '1', '2015-02-25 15:13:04', '2015-02-25 15:13:04', 0, NULL),
(98, 'Costing', '6', 'Add', '1', '2015-02-25 15:46:08', '2015-02-25 15:46:08', 0, NULL),
(99, 'CustomerTagList', 'CUS-05-000006', 'Add', '1', '2015-02-26 06:55:46', '2015-02-26 06:55:46', 0, NULL),
(100, 'Instrument', '1', 'Edit', '1', '2015-02-26 09:43:19', '2015-02-26 09:43:19', 0, NULL),
(101, 'C&Dinfo', '5', 'Add Delivery', '1', '2015-03-03 05:55:27', '2015-03-03 05:55:27', 0, NULL),
(102, 'C&Dinfo', '6', 'Add Delivery', '1', '2015-03-03 06:34:25', '2015-03-03 06:34:25', 0, NULL),
(103, 'Range', '4', 'Add', '1', '2015-03-03 11:01:58', '2015-03-03 11:01:58', 0, NULL),
(104, 'Costing', '7', 'Add', '1', '2015-03-04 07:09:01', '2015-03-04 07:09:01', 0, NULL),
(105, 'Costing', '8', 'Add', '1', '2015-03-04 07:09:47', '2015-03-04 07:09:47', 0, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `deliveryorders`
--

INSERT INTO `deliveryorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `branch_id`, `track_id`, `delivery_address`, `customer_address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `delivery_order_no`, `salesorder_id`, `quotationno`, `delivery_order_date`, `our_reference_no`, `po_reference_no`, `ref_no`, `ref_count`, `total_inst`, `remarks`, `service_id`, `is_approved`, `is_approved_date`, `instrument_type_id`, `del_description_count`, `status`, `ready_to_deliver`, `move_to_deliver`, `assign_to`, `is_invoice_created`, `is_invoice_approved`, `po_generate_type`, `is_assignpo`, `is_poapproved`, `po_approval_date`, `is_pocount_satisfied`, `is_deleted`, `job_finished`, `is_jobcompleted`) VALUES
(1, '2015-02-13 07:59:54', '2015-02-13 07:59:54', 1, NULL, 0, 'CUS-05-000003', 1, 'BSTRA-05-000009', '41 Senoko Drive Singapore 758249', '41 Senoko Drive \r\nSingapore 758249', NULL, '4', '64584411', '64584400', 'mohan@bs.sg', 'BDO-05-000002', 'BSO-05-000004', 'BQS-05-000003', '13-February-15', 'BSTRA-05-000009', 'CPO-05-000005', 'PO#124rasdsd', '1', 0, '-', 1, 1, '-4', 0, 1, 1, 1, 1, '1', 1, 1, 'Manual', 1, 1, NULL, NULL, 0, '0', 0),
(2, '2015-02-13 08:28:44', '2015-02-13 08:28:44', NULL, NULL, 0, 'CUS-05-000003', 1, 'BSTRA-05-000011', '41 Senoko Drive Singapore 758249', '41 Senoko Drive Singapore 758249', NULL, '3', '64584411', '64584400', 'mohanam@bsaquatierra.com', 'BDO-05-000003', 'BSO-05-000005', 'BSQ-05-000005', '13-February-15', 'BSTRA-05-000011', 'CPO-05-000007', 'PO#4321', '3', 0, '-', 1, 1, '-4', 1, 1, 1, NULL, 1, '1', 0, 0, 'Manual', 1, 1, NULL, NULL, 0, '0', 0),
(3, '2015-02-24 14:23:47', '2015-02-24 14:23:47', NULL, NULL, 0, 'CUS-05-000002', 1, 'BSTRA-05-000030', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', 'BDO-05-000004', 'BSO-05-000007', 'BSQ-05-000007', '24-February-15', 'BSTRA-05-000030', 'CPO-05-000012', 'PO-05-000012', '3', 0, '-', 1, 1, '7', 1, 2, 1, 1, 1, '1', 1, 1, 'Manual', 1, 1, NULL, NULL, 0, '0', 0),
(4, '2015-02-24 14:12:46', '2015-02-24 14:12:46', NULL, NULL, 0, 'CUS-05-000002', 1, 'BSTRA-05-000030', '68 KALLANG PUDDING ROAD\n#03-03 SYH LOGISTICS BUILDING\nSINGAPORE 349327', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', 'BDO-05-000005', 'BSO-05-000007', 'BSQ-05-000007', '24-February-15', 'BSTRA-05-000030', 'PO-05-000012', 'PO-05-000012', '3', 0, '-', 1, 1, '7', 1, 1, 1, 1, 1, '1', 1, 1, 'Manual', 0, 1, NULL, NULL, 0, '0', 0),
(5, '2015-02-24 15:06:41', '2015-02-24 15:06:41', NULL, NULL, 0, 'CUS-05-000004', 1, 'BSTRA-05-000034', '41 Senoko Drive\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '6', '64584411', '64584400', 'rejesh@bsoffshore.com', 'BDO-05-000006', 'BSO-05-000008', 'BSQ-05-000008', '24-February-15', 'BSTRA-05-000034', 'CPO-05-000016', 'PO12345', '5', 5, '---', 1, 1, '7', 1, 4, 1, NULL, 0, NULL, 1, 0, 'Manual', 1, 1, NULL, NULL, 0, '0', 0),
(6, '2015-02-24 15:20:01', '2015-02-24 15:20:01', NULL, NULL, 0, 'CUS-05-000004', 1, 'BSTRA-05-000036', '41 Senoko Drive\nSingapore 758249', '41 Senoko Drive\r\nSingapore 758249', NULL, '5', '64584411', '64584400', 'nadia@bsoffshore.com', 'BDO-05-000007', 'BSO-05-000009', 'BSQ-05-000009', '24-February-15', 'BSTRA-05-000036', 'CPO-05-000018', 'PO12345', '5', 5, '--', 1, 1, '7', 1, 1, 1, NULL, 1, '1', 1, 0, 'Manual', 1, 1, NULL, NULL, 0, '0', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `del_descriptions`
--

INSERT INTO `del_descriptions` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `view`, `deliveryorder_id`, `salesorder_id`, `quotation_id`, `quotationno`, `customer_id`, `delivery_quantity`, `instrument_id`, `model_no`, `brand_id`, `delivery_range`, `delivery_calllocation`, `delivery_calltype`, `delivery_validity`, `delivery_unitprice`, `delivery_discount`, `department_id`, `delivery_accountservice`, `delivery_titles`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `delivery_total`, `status`, `ready_to_deliver`, `is_deleted`) VALUES
(1, 1, '2015-02-13 08:01:04', '2015-02-13 08:01:04', NULL, NULL, 0, '1', 'BSO-05-000004', 4, 'BQS-05-000003', 'CUS-05-000003', '1', 1, 'Q31', 1, '1', 'Inlab', 'Singlas', 12, '260', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '260', 1, 0, 0),
(2, 1, '2015-02-13 08:28:44', '2015-02-13 08:28:44', NULL, NULL, 0, '2', '5', 5, 'BSQ-05-000005', 'CUS-05-000003', '1', 1, 'Q31', 1, '1', 'subcontract', 'Singlas', 12, '260', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '260', 1, 0, 0),
(3, 1, '2015-02-24 14:23:48', '2015-02-24 14:23:48', NULL, NULL, 0, '3', '9', 7, 'BSQ-05-000007', 'CUS-05-000002', '3', 1, '2345', 1, '1', 'Inlab', 'Singlas', 12, '520', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '520', 1, 0, 0),
(4, 2, '2015-02-24 14:23:48', '2015-02-24 14:23:48', NULL, NULL, 0, '3', '10', 7, 'BSQ-05-000007', 'CUS-05-000002', '3', 1, '2345', 1, '1', 'Inlab', 'Singlas', 12, '520', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '520', 1, 0, 0),
(5, 3, '2015-02-24 14:44:59', '2015-02-24 14:44:59', NULL, NULL, 0, '4', 'BSO-05-000007', 7, 'BSQ-05-000007', 'CUS-05-000002', '3', 1, '2345', 1, '1', 'Inlab', 'Singlas', 12, '520', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '520', 1, 0, 0),
(6, 1, '2015-02-24 15:13:30', '2015-02-24 15:13:30', NULL, NULL, 0, '5', 'BSO-05-000008', 8, 'BSQ-05-000008', 'CUS-05-000004', '4', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '316', 1, 0, 0),
(7, 2, '2015-02-24 15:13:30', '2015-02-24 15:13:30', NULL, NULL, 0, '5', 'BSO-05-000008', 8, 'BSQ-05-000008', 'CUS-05-000004', '4', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '316', 1, 0, 0),
(8, 3, '2015-02-24 15:13:30', '2015-02-24 15:13:30', NULL, NULL, 0, '5', 'BSO-05-000008', 8, 'BSQ-05-000008', 'CUS-05-000004', '4', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '316', 1, 0, 0),
(9, 4, '2015-02-24 15:13:30', '2015-02-24 15:13:30', NULL, NULL, 0, '5', 'BSO-05-000008', 8, 'BSQ-05-000008', 'CUS-05-000004', '4', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '316', 1, 0, 0),
(10, 1, '2015-02-24 15:21:05', '2015-02-24 15:21:05', NULL, NULL, 0, '6', 'BSO-05-000009', 9, 'BSQ-05-000009', 'CUS-05-000004', '1', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '316', 1, 0, 0);

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
(1, '2015-02-02 17:24:01', '2015-02-02 17:24:01', NULL, NULL, 0, 'Engineering', '', 1, 0),
(2, '2015-02-13 04:57:21', '2015-02-13 04:57:21', NULL, NULL, 0, 'Aerospace', '', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `name`, `description`, `branch_id`, `department_id`, `status`, `instrument_brand_count`, `instrument_procedure_count`, `instrument_range_count`, `ins_date`, `is_approved`, `is_deleted`) VALUES
(1, '2015-02-02 17:58:12', '2015-02-26 09:43:18', NULL, NULL, 0, 'TEMPERATURE GAUGE', '-', NULL, 2, 1, 1, 1, 3, '2015-02-02', '1', 0),
(2, '2015-02-13 05:27:35', '2015-02-13 05:27:35', NULL, NULL, 0, 'Temperature Meter', '', NULL, 2, 1, 1, 1, 1, '2015-02-13', '1', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `instrument_brands`
--

INSERT INTO `instrument_brands` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `brand_id`) VALUES
(3, '2015-02-26 09:43:19', '2015-02-26 09:43:19', NULL, NULL, 0, 1, 1),
(2, '2015-02-13 05:27:35', '2015-02-13 05:27:35', NULL, NULL, 0, 2, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `instrument_procedures`
--

INSERT INTO `instrument_procedures` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `procedure_id`) VALUES
(3, '2015-02-26 09:43:19', '2015-02-26 09:43:19', NULL, NULL, 0, 1, 1),
(2, '2015-02-13 05:27:35', '2015-02-13 05:27:35', NULL, NULL, 0, 2, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `instrument_ranges`
--

INSERT INTO `instrument_ranges` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrument_id`, `range_id`) VALUES
(3, '2015-02-26 09:43:19', '2015-02-26 09:43:19', NULL, NULL, 0, 1, 1),
(2, '2015-02-13 05:27:35', '2015-02-13 05:27:35', NULL, NULL, 0, 2, 3),
(4, '2015-02-26 09:43:19', '2015-02-26 09:43:19', NULL, NULL, 0, 1, 2),
(5, '2015-02-26 09:43:19', '2015-02-26 09:43:19', NULL, NULL, 0, 1, 3);

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
(1, '2015-02-02 17:42:20', '2015-02-02 17:42:20', NULL, NULL, NULL, 'CALIBRATION', 'CALIBRATION', 'WE ARE PLEASED TO INFORM YOU THAT WE HAVE COLLECTED/RECEIVED YOUR ITEMS(S) BELOW FOR CALIBRATION SERVICE:', 'WE ARE PLEASED TO INFORM YOU THAT WE HAVE COLLECTED/RECEIVED YOUR ITEMS(S) BELOW FOR CALIBRATION SERVICE:', 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `prepare_invoice_id`, `created`, `modified`, `created_by`, `modified_by`, `invoiceno`, `branch_id`, `invoice_date`, `deliveryorder_id`, `salesorder_id`, `quotation_id`, `customer_id`, `ref_no`, `track_id`, `customername`, `regaddress`, `contactperson_id`, `contactpersonname`, `phone`, `fax`, `email`, `due_amount`, `totalprice`, `jobstatus_id`, `paymentterms_id`, `invoice_type_id`, `acknowledgement_type_id`, `instrument_type_id`, `salesperson_id`, `gst`, `currency_id`, `remarks`, `service_type`, `currencyconversionrate`, `discount`, `po_generate_type`, `is_assign_po`, `is_approved`, `is_poapproved`, `po_approval_date`, `approved_date`, `status`, `view`, `is_deleted`) VALUES
(1, NULL, '2015-02-13 08:11:08', '2015-02-13 08:11:08', NULL, NULL, 'BIN-05-000002', NULL, '13-February-15', 'BDO-05-000002', 'BSO-05-000004', 'BQS-05-000003', 'CUS-05-000003', 'CPO-05-000005,PO#124rasdsd,PO#124rasdsd', 'BSTRA-05-000009', 'BS AQUATIERRA PTE LTD', '41 Senoko Drive \r\nSingapore 758249', NULL, 'Mohan', NULL, '64584400', 'mohan@bs.sg', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, '-', 'Calibration Service', NULL, NULL, NULL, 0, '1', 0, NULL, '0000-00-00 00:00:00', '1', NULL, 0),
(2, NULL, '2015-02-24 14:47:19', '2015-02-24 14:47:19', NULL, NULL, 'BIN-05-000003', NULL, '24-February-15', 'BDO-05-000004,BDO-05-000005', 'BSO-05-000007', 'BSQ-05-000007', 'CUS-05-000002', 'CPO-05-000012,PO-05-000012,PO-05-000012', 'BSTRA-05-000030', 'ALLIANCE AIRSUPPORT PTE LTD', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, 'MS SARA', NULL, '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, '-', 'Calibration Service', NULL, NULL, NULL, 0, '1', 0, NULL, '0000-00-00 00:00:00', '1', NULL, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `labprocesses`
--

INSERT INTO `labprocesses` (`id`, `created`, `modified`, `created_by`, `modified_by`, `salesorder_id`, `description_id`, `status`) VALUES
(1, '2015-02-13 08:01:04', '2015-02-13 08:01:04', NULL, NULL, 'BSO-05-000004', '4', 1),
(2, '2015-02-24 14:44:59', '2015-02-24 14:44:59', NULL, NULL, 'BSO-05-000007', '9', 1),
(3, '2015-02-24 14:44:59', '2015-02-24 14:44:59', NULL, NULL, 'BSO-05-000007', '10', 1),
(4, '2015-02-24 14:44:59', '2015-02-24 14:44:59', NULL, NULL, 'BSO-05-000007', '11', 1),
(5, '2015-02-24 15:13:30', '2015-02-24 15:13:30', NULL, NULL, 'BSO-05-000008', '12', 1),
(6, '2015-02-24 15:13:30', '2015-02-24 15:13:30', NULL, NULL, 'BSO-05-000008', '13', 1),
(7, '2015-02-24 15:13:30', '2015-02-24 15:13:30', NULL, NULL, 'BSO-05-000008', '14', 1),
(8, '2015-02-24 15:13:30', '2015-02-24 15:13:30', NULL, NULL, 'BSO-05-000008', '15', 1),
(9, '2015-02-24 15:21:05', '2015-02-24 15:21:05', NULL, NULL, 'BSO-05-000009', '16', 1);

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
(1, '2015-02-02 17:22:43', '2015-02-02 17:22:43', NULL, NULL, 0, 'East', 'East', 1, 0),
(2, '2015-02-05 15:11:42', '2015-02-05 15:11:42', NULL, NULL, 0, 'South', '', 1, 0),
(3, '2015-02-13 04:57:05', '2015-02-13 04:57:05', NULL, NULL, 0, 'West', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `logactivities`
--

INSERT INTO `logactivities` (`id`, `logname`, `logactivity`, `logid`, `logno`, `invoice_type_id`, `loglink`, `user_id`, `logapprove`, `approved_by`, `logtime`, `created`) VALUES
(1, 'Unit', 'Add Unit', '1', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(2, 'Unit', 'Add Unit', '2', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(3, 'Instrument For Group', 'Add Instrument For group', '1', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(4, 'Range', 'Add Range', '1', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(5, 'Brand', 'Add Brand', '1', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(6, 'Procedure No', 'Add Procedure No', '1', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(7, 'Instrument', 'Add Instrument', '1', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(8, 'Customer', 'Add Customer', 'CUS-05-000002', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(9, 'Costing', 'Add Costing', '1', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(10, 'Quotation', 'Add Quotation', '1', 'BSQ-05-000002', NULL, 'BSO-05-000002', '1', 2, '1', NULL, '2015-02-02'),
(11, 'Salesorder', 'Add SalesOrder', 'BSO-05-000002', 'BSO-05-000002', NULL, NULL, '1', 2, '1', NULL, '2015-02-02'),
(12, 'Brand', 'Add Brand', '2', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-05'),
(13, 'Range', 'Add Range', '2', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-05'),
(14, 'Procedure No', 'Add Procedure No', '2', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-05'),
(15, 'Quotation', 'Add Quotation', '2', 'BSQ-05-000003', NULL, 'BSO-05-000003', '1', 2, '1', NULL, '2015-02-09'),
(16, 'Salesorder', 'Add SalesOrder', 'BSO-05-000003', 'BSO-05-000003', NULL, NULL, '1', 2, '1', NULL, '2015-02-09'),
(17, 'Customer', 'Add Customer', 'CUS-05-000003', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(18, 'Unit', 'Add Unit', '3', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(19, 'Procedure No', 'Add Procedure No', '3', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(20, 'Brand', 'Add Brand', '3', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(21, 'Range', 'Add Range', '3', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(22, 'Instrument', 'Add Instrument', '2', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(23, 'Costing', 'Add Costing', '2', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(24, 'Costing', 'Add Costing', '3', 'CUS-05-000003', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(25, 'Quotation', 'Add Quotation', '3', 'BQS-05-000002', NULL, NULL, '1', 1, NULL, NULL, '2015-02-13'),
(26, 'Customer', 'Add Customer', 'CUS-05-000004', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(27, 'Quotation', 'Add Quotation', '4', 'BQS-05-000003', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(28, 'Salesorder', 'Add SalesOrder', 'BSO-05-000004', '', NULL, NULL, NULL, 2, '1', NULL, '2015-02-13'),
(29, 'Labprocess', 'Add Labprocess', '1', 'BDO-05-000002', NULL, NULL, '1', 2, NULL, NULL, '2015-02-13'),
(30, 'Deliveryorder', 'Add Delivery Order', '1', 'BDO-05-000002', NULL, '1', '1', 2, '1', NULL, '2015-02-13'),
(31, 'ClientPO', 'Add', 'BSO-05-000004', 'BSO-05-000004', 3, '1', '1', 2, NULL, NULL, '2015-02-13'),
(32, 'Invoice', 'Add', 'BSO-05-000004', 'BSO-05-000004', 3, NULL, '1', 2, NULL, NULL, '2015-02-13'),
(33, 'C&Dinfo', 'Add Delivery', '1', '1', NULL, '14-February-15', '1', 2, '1', NULL, '2015-02-13'),
(34, 'C&Dinfo', 'Add Collection', '2', '', NULL, '14-February-15', '1', 2, '1', NULL, '2015-02-13'),
(35, 'Quotation', 'Add Quotation', '5', 'BSQ-05-000005', NULL, 'BSO-05-000005', '1', 2, '1', NULL, '2015-02-13'),
(36, 'Salesorder', 'Add SalesOrder', 'BSO-05-000005', 'BSO-05-000005', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(37, 'Customer', 'Add Customer', 'CUS-05-000005', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(38, 'SubCon', 'Add SubCon', '1', 'BSD-01-10000006', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(39, 'SubCon', 'Add SubCon', '2', 'BSD-01-10000007', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(40, 'SubCon', 'Add SubCon', '1', 'BSD-01-10000006', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(41, 'SubCon', 'Add SubCon', '2', 'BSD-01-10000007', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(42, 'Deliveryorder', 'Add Delivery Order', '2', 'BDO-05-000003', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(43, 'Prequisition', 'Add Supervisor', '1', 'BRF-05-000002', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(44, 'Prequisition', 'Add Manager', '1', 'BRF-05-000002', NULL, NULL, '1', 1, NULL, NULL, '2015-02-13'),
(45, 'Purchaseorders', 'Add Purchaseorders', '1', 'BPO-15-000001', NULL, NULL, '1', 1, NULL, NULL, '2015-02-13'),
(46, 'Quotation', 'Add Quotation', '6', 'BSQ-05-000006', NULL, 'BSO-05-000006', '1', 2, '1', NULL, '2015-02-13'),
(47, 'Salesorder', 'Add SalesOrder', 'BSO-05-000006', 'BSO-05-000006', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(48, 'Onsite', 'Add Onsite', '1', 'OSS-05-000002', NULL, NULL, '1', 2, '1', NULL, '2015-02-13'),
(49, 'Prequisition', 'Add Supervisor', '2', 'BRF-05-000005', NULL, NULL, '1', 2, '1', NULL, '2015-02-16'),
(50, 'Prequisition', 'Add Manager', '2', 'BRF-05-000005', NULL, NULL, '1', 2, '1', NULL, '2015-02-16'),
(51, 'Purchaseorders', 'Add Purchaseorders', '6', 'BPO-15-000002', NULL, NULL, '1', 1, NULL, NULL, '2015-02-24'),
(52, 'Purchaseorders', 'Add Purchaseorders', '7', 'BPO-15-000003', NULL, NULL, '1', 1, NULL, NULL, '2015-02-24'),
(53, 'Purchaseorders', 'Add Purchaseorders', '8', 'BPO-15-000004', NULL, NULL, '1', 1, NULL, NULL, '2015-02-24'),
(54, 'Purchaseorders', 'Add Purchaseorders', '9', 'BPO-15-000005', NULL, NULL, '1', 1, NULL, NULL, '2015-02-24'),
(55, 'Purchaseorders', 'Add Purchaseorders', '10', 'BPO-15-000006', NULL, NULL, '1', 1, NULL, NULL, '2015-02-24'),
(56, 'Purchaseorders', 'Add Purchaseorders', '11', 'BPO-15-000007', NULL, NULL, '1', 1, NULL, NULL, '2015-02-24'),
(57, 'Purchaseorders', 'Add Purchaseorders', '12', 'BPO-15-000008', NULL, NULL, '1', 2, '1', NULL, '2015-02-24'),
(58, 'Purchaseorders', 'Add Purchaseorders', '12', 'BPO-15-000008', NULL, NULL, '1', 2, '1', NULL, '2015-02-24'),
(59, 'Costing', 'Add Costing', '4', 'CUS-05-000002', NULL, NULL, '1', 2, '1', NULL, '2015-02-24'),
(60, 'Quotation', 'Add Quotation', '7', 'BSQ-05-000007', NULL, 'BSO-05-000007', '1', 2, '1', NULL, '2015-02-24'),
(61, 'Salesorder', 'Add SalesOrder', 'BSO-05-000007', 'BSO-05-000007', NULL, NULL, '1', 2, '1', NULL, '2015-02-24'),
(62, 'Deliveryorder', 'Add Delivery Order', '3', 'BDO-05-000004', NULL, NULL, '1', 2, '1', NULL, '2015-02-24'),
(63, 'C&Dinfo', 'Add Delivery', '3', '3', NULL, '25-February-15', '1', 2, '1', NULL, '2015-02-24'),
(64, 'Labprocess', 'Add Labprocess', '4', 'BDO-05-000005', NULL, NULL, '1', 2, NULL, NULL, '2015-02-24'),
(65, 'Deliveryorder', 'Add Delivery Order', '4', 'BDO-05-000005', NULL, '1', '1', 2, '1', NULL, '2015-02-24'),
(66, 'ClientPO', 'Add', 'BSO-05-000007', 'BSO-05-000007', 3, '1', '1', 1, NULL, NULL, '2015-02-24'),
(67, 'Invoice', 'Add', 'BSO-05-000007', 'BSO-05-000007', 3, NULL, '1', 2, NULL, NULL, '2015-02-24'),
(68, 'C&Dinfo', 'Add Delivery', '4', '4', NULL, '24-February-15', '1', 1, NULL, NULL, '2015-02-24'),
(69, 'Costing', 'Add Costing', '5', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-24'),
(70, 'Quotation', 'Add Quotation', '8', 'BSQ-05-000008', NULL, 'BSO-05-000008', '1', 2, '1', NULL, '2015-02-24'),
(71, 'Salesorder', 'Add SalesOrder', 'BSO-05-000008', 'BSO-05-000008', NULL, NULL, '1', 2, '1', NULL, '2015-02-24'),
(72, 'Labprocess', 'Add Labprocess', '5', 'BDO-05-000006', NULL, NULL, '1', 2, NULL, NULL, '2015-02-24'),
(73, 'Deliveryorder', 'Add Delivery Order', '5', 'BDO-05-000006', NULL, '1', '1', 2, '1', NULL, '2015-02-24'),
(74, 'ClientPO', 'Add', 'PO12345', 'PO12345', 1, '1', '1', 2, NULL, NULL, '2015-02-24'),
(75, 'Quotation', 'Add Quotation', '9', 'BSQ-05-000009', NULL, 'BSO-05-000009', '1', 2, '1', NULL, '2015-02-24'),
(76, 'Salesorder', 'Add SalesOrder', 'BSO-05-000009', 'BSO-05-000009', NULL, NULL, '1', 2, '1', NULL, '2015-02-24'),
(77, 'Labprocess', 'Add Labprocess', '6', 'BDO-05-000007', NULL, NULL, '1', 2, NULL, NULL, '2015-02-24'),
(78, 'Deliveryorder', 'Add Delivery Order', '6', 'BDO-05-000007', NULL, '1', '1', 2, '1', NULL, '2015-02-24'),
(79, 'ClientPO', 'Add', 'PO12345', 'PO12345', 1, '1', '1', 2, NULL, NULL, '2015-02-24'),
(80, 'Invoice', 'Add', 'PO12345', 'PO12345', 1, NULL, '1', 1, NULL, NULL, '2015-02-24'),
(81, 'Quotation', 'Add Quotation', '10', 'BQS-05-000007', NULL, NULL, '1', 1, NULL, NULL, '2015-02-25'),
(82, 'Quotation', 'Add Quotation', '11', 'BQS-05-000008', NULL, NULL, '1', 1, NULL, NULL, '2015-02-25'),
(83, 'Quotation', 'Add Quotation', '12', 'BQS-05-000009', NULL, NULL, '1', 1, NULL, NULL, '2015-02-25'),
(84, 'Reqpurchaseorder', 'Add Reqpurchaseorder', NULL, 'BPO-05-000002', NULL, NULL, NULL, 1, NULL, NULL, '2015-02-25'),
(85, 'Costing', 'Add Costing', '6', 'CUS-05-000002', NULL, NULL, '1', 2, '1', NULL, '2015-02-25'),
(86, 'CustomerTagList', 'Add CustomerTagList', 'CUS-05-000006', '', NULL, NULL, '1', 2, '1', NULL, '2015-02-26'),
(87, 'Reqpurchaseorder', 'Add Reqpurchaseorder', NULL, 'BPO-05-000003', NULL, NULL, NULL, 1, NULL, NULL, '2015-02-26'),
(88, 'Reqpurchaseorder', 'Add Reqpurchaseorder', NULL, 'BPO-05-000004', NULL, NULL, NULL, 1, NULL, NULL, '2015-02-26'),
(89, 'Reqpurchaseorder', 'Add Reqpurchaseorder', NULL, 'BPO-05-000005', NULL, NULL, NULL, 1, NULL, NULL, '2015-02-26'),
(90, 'Reqpurchaseorder', 'Add Reqpurchaseorder', '1', '', NULL, NULL, NULL, 1, NULL, NULL, '2015-02-26'),
(91, 'Range', 'Add Range', '4', '', NULL, NULL, '1', 1, NULL, NULL, '2015-03-03'),
(92, 'Costing', 'Add Costing', '7', 'CUS-05-000002', NULL, NULL, '1', 2, '1', NULL, '2015-03-04'),
(93, 'Costing', 'Add Costing', '8', 'CUS-05-000002', NULL, NULL, '1', 2, '1', NULL, '2015-03-04');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `onsites`
--

INSERT INTO `onsites` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `quotation_id`, `branch_id`, `quotationno`, `customer_name`, `address`, `fax`, `schedule_status`, `attn`, `phone`, `email`, `details`, `onsiteschedule_no`, `schedule_date`, `schedule_time`, `date`, `duration1`, `duration2`, `remarks`, `schedule_created`, `is_approved`, `is_deleted`) VALUES
(1, '2015-02-13 08:50:50', '2015-02-13 08:50:50', NULL, NULL, NULL, 'CUS-05-000003', '6', 1, 'BSQ-05-000006', 'BS AQUATIERRA PTE LTD', '41 Senoko Drive Singapore 758249', '64584400', 'Processing', 'Mohanam', '64584411', 'mohanam@bsaquatierra.com', 'CAL PG-3', 'OSS-05-000002', '2015-02-17', '15:50:45', NULL, '1', 'Hours', '-', '02/13/2015 08:50:50 am', 1, '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `onsite_engineers`
--

INSERT INTO `onsite_engineers` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `onsite_id`, `onsiteschedule_no`, `engineer_name`, `engineer_email_id`, `user_id`, `is_deleted`) VALUES
(1, '2015-02-13 08:50:41', '2015-02-13 08:50:41', NULL, NULL, NULL, 1, 'OSS-05-000002', 'Raj BS', 'krishnan@bestandards.com', 2, 0),
(2, '2015-02-13 08:50:46', '2015-02-13 08:50:46', NULL, NULL, NULL, 1, 'OSS-05-000002', 'Sekar BS', 'sekar@bestandards.com', 5, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `onsite_instruments`
--

INSERT INTO `onsite_instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `onsite_id`, `quotation_id`, `quotationno`, `customer_id`, `onsite_quantity`, `instrument_id`, `model_no`, `brand_id`, `onsite_range`, `onsite_calllocation`, `onsite_calltype`, `onsite_validity`, `onsite_unitprice`, `onsite_discount`, `department`, `onsite_accountservice`, `onsite_titles`, `onsite_total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `is_approved`, `status`, `is_deleted`) VALUES
(1, '2015-02-13 08:49:49', '2015-02-13 08:49:49', NULL, NULL, 0, '1', 6, 'BSQ-05-000006', 'CUS-05-000003', '1', 1, 'Q31', 1, '1', 'onsite', 'Singlas', 12, '260', '', 'Temperature', 'calibration service', NULL, '260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paymentterms`
--

INSERT INTO `paymentterms` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `paymentterm`, `paymenttype`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-02-02 17:20:47', '2015-02-02 17:20:47', NULL, NULL, 0, '30', 'days', '', 1, 0),
(2, '2015-02-13 04:56:49', '2015-02-13 04:56:49', NULL, NULL, 0, '45', 'days', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prequistions`
--

INSERT INTO `prequistions` (`id`, `track_id`, `prequistionno`, `customer_id`, `branch_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `paymentterm_name`, `reg_date`, `ref_no`, `po_generate_type`, `discount`, `priority`, `instrument_type_id`, `is_approved`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `is_prpurchaseorder_created`, `is_jobcompleted`, `is_superviser_approved`, `is_manager_approved`, `is_assign_po`, `is_poapproved`, `is_deleted`) VALUES
(1, 'BSTRA-05-000013', 'BRF-05-000002', 'CUS-05-000005', 1, 'CAL TEC ( MAIN ) ', '12 TUAS\r\nSINGAPORE 432342', NULL, '7', '32132323', '323232', 'jo@bs.sg', '30 days', '13-February-15', 'PR33232323', NULL, '', NULL, '1', 0, 1, '2015-02-13 08:38:52', '2015-02-13 08:38:52', 2, NULL, 0, 0, 0, 1, 0, 0, 0, 0),
(2, 'BSTRA-05-000024', 'BRF-05-000005', 'CUS-05-000005', 1, 'CAL TEC ( MAIN ) ', '12 TUAS\r\nSINGAPORE 432342', NULL, '7', '32132323', '323232', 'jo@bs.sg', '30 days', '16-February-15', 'asd', NULL, '', NULL, '1', 0, 1, '2015-02-16 13:27:44', '2015-02-16 13:27:44', 2, NULL, 0, 1, 0, 1, 1, 0, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `preq_customerspecialneeds`
--

INSERT INTO `preq_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `prequistion_id`, `salespeople_id`, `salesperson_name`, `projectname`, `gsttype`, `gst`, `currency_id`, `currency_value`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(1, '2015-02-13 08:38:52', '2015-02-13 08:38:52', NULL, NULL, 0, '1', NULL, 'Ms.Nora', '', 'Standard', 7, 1, 1, NULL, '', '', 1),
(2, '2015-02-16 13:27:44', '2015-02-16 13:27:44', NULL, NULL, 0, '2', NULL, 'Ms.Nora', 'wer', 'Standard', 7, 1, 1, 1, '3', '-', 1);

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
  `is_approved` int(11) DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `preq_devices`
--

INSERT INTO `preq_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `prequistion_id`, `customer_id`, `instrument_name`, `prequistionno`, `brand_name`, `quantity`, `model_no`, `range`, `validity`, `unit_price`, `device_discount`, `department_name`, `account_service`, `total`, `title`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2015-02-13 08:38:47', '2015-02-13 08:38:47', NULL, NULL, 0, NULL, NULL, 'PRESSURE GAUGE', 'BRF-05-000002', 'SYSCO', '5', '111', '0~100', 12, '25', '', 'Electrical', 'Calibration Service', '25', '0', 1, 0, 0),
(2, '2015-02-13 08:38:47', '2015-02-13 08:38:47', NULL, NULL, 0, NULL, NULL, 'PRESSURE GAUGE', 'BRF-05-000002', 'SYSCO', '5', '111', '0~100', 12, '25', '', 'Electrical', 'Calibration Service', '25', '0', 1, 0, 0),
(3, '2015-02-13 08:38:47', '2015-02-13 08:38:47', NULL, NULL, 0, NULL, NULL, 'PRESSURE GAUGE', 'BRF-05-000002', 'SYSCO', '5', '111', '0~100', 12, '25', '', 'Electrical', 'Calibration Service', '25', '0', 1, 0, 0),
(4, '2015-02-13 08:38:47', '2015-02-13 08:38:47', NULL, NULL, 0, NULL, NULL, 'PRESSURE GAUGE', 'BRF-05-000002', 'SYSCO', '5', '111', '0~100', 12, '25', '', 'Electrical', 'Calibration Service', '25', '0', 1, 0, 0),
(5, '2015-02-13 08:38:47', '2015-02-13 08:38:47', NULL, NULL, 0, NULL, NULL, 'PRESSURE GAUGE', 'BRF-05-000002', 'SYSCO', '5', '111', '0~100', 12, '25', '', 'Electrical', 'Calibration Service', '25', '0', 1, 0, 0),
(6, '2015-02-16 13:27:40', '2015-02-16 13:28:13', NULL, NULL, 0, '2', 'CUS-05-000005', 'aas', 'BRF-05-000005', 'asd', '3', 'asd', 'ad', 12, '33', '3', 'asd', 'Calibration Service', '32.01', 'null', 1, 0, 0),
(7, '2015-02-16 13:27:40', '2015-02-16 13:27:40', NULL, NULL, 0, '2', 'CUS-05-000005', 'aas', 'BRF-05-000005', 'asd', '3', 'asd', 'ad', 12, '33', '3', 'asd', 'Calibration Service', '32.01', '0,1', 1, 0, 0),
(8, '2015-02-16 13:27:40', '2015-02-16 13:27:40', NULL, NULL, 0, '2', 'CUS-05-000005', 'aas', 'BRF-05-000005', 'asd', '3', 'asd', 'ad', 12, '33', '3', 'asd', 'Calibration Service', '32.01', '0,1', 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `priority`, `description`, `noofdays`, `multipleof`, `status`, `is_deleted`) VALUES
(1, '2015-02-02 17:17:23', '2015-02-02 17:17:23', NULL, NULL, 0, 'Normal', '', 4, 1, 1, 0),
(2, '2015-02-02 17:20:33', '2015-03-03 10:19:34', NULL, NULL, 0, 'Platinum', '', 3, 1.5, 1, 0),
(3, '2015-02-02 17:21:36', '2015-03-03 10:19:25', NULL, NULL, 0, 'Diamond', '', 2, 2, 1, 0),
(4, '2015-02-13 04:53:15', '2015-03-03 10:19:16', NULL, NULL, 0, 'Express', '', 1, 3, 1, 0);

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
(1, NULL, NULL, 0, '2015-02-02 17:46:43', '2015-02-02 17:46:43', 2, 'BST-T01', '', 1, 1, 0),
(2, NULL, NULL, 0, '2015-02-05 15:08:33', '2015-02-05 15:08:33', 1, 'BST-E', '', 1, 1, 0),
(3, NULL, NULL, 0, '2015-02-13 05:11:37', '2015-02-13 05:11:37', 2, 'BST-02', '', 1, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `purchaseorders`
--

INSERT INTO `purchaseorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `purchase_name`, `branch_id`, `purchaseorder_no`, `customer_address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `payment_terms`, `track_id`, `ref_no`, `salesperson`, `service_id`, `remarks`, `salesorder_id`, `purchaseorder_date`, `your_ref_no`, `our_ref_no`, `is_deleted`, `is_approved`) VALUES
(12, '2015-02-24 09:53:51', '2015-02-24 10:26:50', NULL, NULL, 0, 'CUS-05-000004', 'BS OFFSHORE PTE LTD', NULL, 'BPO-15-000008', '41 Senoko DriveSingapore 758249', NULL, '', '', '64584400', 'nadia@bsoffshore.com', NULL, 'BSTRA-05-000011', 'BSQ-05-000005', 'Ms.Nora', 1, 'test', 'BSO-05-000005', '24-Feb-15', NULL, NULL, 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pur_customerspecialneeds`
--

INSERT INTO `pur_customerspecialneeds` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `purchaseorder_id`, `salespeople_id`, `currency_id`, `additionalcharge_id`, `additional_service_value`, `remarks`, `service_id`) VALUES
(8, '2015-02-24 09:53:51', '2015-02-24 09:53:51', NULL, NULL, 0, '12', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2015-02-24 10:16:06', '2015-02-24 10:16:06', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2015-02-24 10:26:37', '2015-02-24 10:26:37', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2015-02-24 10:26:50', '2015-02-24 10:26:50', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `track_id`, `quotationno`, `customer_id`, `branch_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `paymentterm_id`, `reg_date`, `ref_no`, `ref_count`, `total_inst`, `po_generate_type`, `discount`, `priority`, `instrument_type_id`, `is_approved`, `is_approved_date`, `is`, `status`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorder_created`, `is_deliveryorder_created`, `is_delivery_approved`, `is_invoice_created`, `is_invoice_approved`, `quo_device_count`, `is_jobcompleted`, `total_device_rate`, `is_assign_po`, `po_approval_date`, `is_poapproved`, `is_pocount_satisfied`, `is_deleted`) VALUES
(1, 'BSTRA-05-000002', 'BSQ-05-000002', 'CUS-05-000002', 1, 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', NULL, '02-February-15', 'PO#AAS/WO/0015/15', '0', 0, 'Manual', NULL, '1', '1', 1, NULL, 0, 1, '2015-02-02 18:14:06', '2015-02-02 18:14:06', NULL, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0),
(2, 'BSTRA-05-000004', 'BSQ-05-000003', 'CUS-05-000002', 1, 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', NULL, '02-February-15', 'CPO-05-000003', '0', 0, 'Automatic', '', '1', '1', 1, NULL, 0, 1, '2015-02-09 11:00:24', '2015-02-09 11:02:27', NULL, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0),
(3, 'BSTRA-05-000007', 'BQS-05-000002', 'CUS-05-000003', 1, 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive Singapore 758249', NULL, '4', '64584411', '64584400', 'mohan@bs.sg', 2, '2015-02-25', 'CPO-05-000004', '0', 0, 'Automatic', '', '1', '1', 0, NULL, 0, 1, '2015-02-13 07:15:23', '2015-02-25 14:39:57', 2, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(4, 'BSTRA-05-000009', 'BQS-05-000003', 'CUS-05-000003', 1, 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive \r\nSingapore 758249', NULL, '4', '64584411', '64584400', 'mohan@bs.sg', 2, '2015-02-25', 'CPO-05-000005,PO#124rasdsd,PO#124rasdsd', '0,1,1', 0, 'Manual', '', '1', '1', 1, NULL, 0, 1, '2015-02-13 07:58:14', '2015-02-25 14:40:22', 2, NULL, 0, 1, 1, 1, 0, 1, NULL, 0, NULL, 1, NULL, 1, 0, 0),
(5, 'BSTRA-05-000011', 'BSQ-05-000005', 'CUS-05-000003', 1, 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive \r\nSingapore 758249', NULL, '3', '64584411', '64584400', 'mohanam@bsaquatierra.com', NULL, '13-February-15', 'CPO-05-000007,PO#4321', '0,3', 0, 'Manual', NULL, '4', '1', 1, NULL, 0, 1, '2015-02-13 08:17:37', '2015-02-13 08:17:37', NULL, NULL, 0, 1, 1, 1, 0, 0, NULL, 0, NULL, 1, NULL, 1, NULL, 0),
(6, 'BSTRA-05-000015', 'BSQ-05-000006', 'CUS-05-000003', 1, 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive Singapore 758249', NULL, '3', '64584411', '64584400', 'mohanam@bsaquatierra.com', NULL, '13-February-15', 'CPO-05-000009', '0', 0, 'Automatic', NULL, '1', '1', 1, NULL, 0, 1, '2015-02-13 08:47:51', '2015-02-13 08:47:51', NULL, NULL, 0, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0),
(7, 'BSTRA-05-000030', 'BSQ-05-000007', 'CUS-05-000002', 1, 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', NULL, '24-February-15', 'CPO-05-000012,PO-05-000012,PO-05-000012', '0,3,3', 0, 'Manual', '', '1', '1', 1, NULL, 0, 1, '2015-02-24 14:12:46', '2015-02-24 14:13:55', NULL, NULL, 0, 1, 1, 1, 0, 1, NULL, 0, NULL, 1, NULL, 1, NULL, 0),
(8, 'BSTRA-05-000034', 'BSQ-05-000008', 'CUS-05-000004', 1, 'BS OFFSHORE PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '6', '64584411', '64584400', 'rejesh@bsoffshore.com', NULL, '24-February-15', 'PO12345', '5', 5, 'Manual', NULL, '1', '1', 1, NULL, 0, 1, '2015-02-24 15:06:41', '2015-02-24 15:06:41', NULL, NULL, 0, 1, 1, 1, 1, 0, NULL, 0, NULL, 1, NULL, 1, NULL, 0),
(9, 'BSTRA-05-000036', 'BSQ-05-000009', 'CUS-05-000004', 1, 'BS OFFSHORE PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '5', '64584411', '64584400', 'nadia@bsoffshore.com', NULL, '24-February-15', 'PO12345', '5', 5, 'Manual', NULL, '1', '1', 1, NULL, 0, 1, '2015-02-24 15:20:01', '2015-02-24 15:20:01', NULL, NULL, 0, 1, 1, 1, 1, 0, NULL, 0, NULL, 1, NULL, 1, NULL, 0),
(10, 'BSTRA-05-000041', 'BQS-05-000007', 'CUS-05-000002', 1, 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', 1, '25-February-15', 'CPO-05-000019', '0', 0, 'Automatic', '', '1', '1', 0, NULL, 0, 1, '2015-02-25 09:36:33', '2015-02-25 09:36:33', 2, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(11, 'BSTRA-05-000043', 'BQS-05-000008', 'CUS-05-000002', 1, 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', 1, '25-February-15', 'CPO-05-000020', '0', 0, 'Automatic', '', '1', '1', 0, NULL, 0, 1, '2015-02-25 09:38:19', '2015-02-25 09:38:19', 2, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(12, 'BSTRA-05-000045', 'BQS-05-000009', 'CUS-05-000002', 1, 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', 1, '25-February-15', 'CPO-05-000021', '0', 0, 'Automatic', '', '1', '1', 0, NULL, 0, 1, '2015-02-25 09:39:59', '2015-02-25 09:39:59', 2, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0);

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
(1, '2015-02-02 18:14:06', '2015-02-02 18:14:06', NULL, NULL, 0, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 1),
(2, '2015-02-09 11:00:24', '2015-02-09 11:02:27', NULL, NULL, 0, '2', NULL, 'Ms.Nora , ', '', 'Standard', NULL, 1, NULL, 1, '', '-', 1),
(3, '2015-02-13 07:15:23', '2015-02-25 14:39:57', NULL, NULL, 0, '3', NULL, 'Ms.Nora , ', '', 'Standard', 7, 1, 1, 1, '75', '', 1),
(4, '2015-02-13 07:58:14', '2015-02-25 14:40:22', NULL, NULL, 0, '4', NULL, 'Ms.Nora , ', '', 'Standard', 7, 1, 1, 1, '70', '-', 1),
(5, '2015-02-13 08:17:37', '2015-02-13 08:17:37', NULL, NULL, 0, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 1),
(6, '2015-02-13 08:47:51', '2015-02-13 08:47:51', NULL, NULL, 0, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 1),
(7, '2015-02-24 14:12:47', '2015-02-24 14:13:55', NULL, NULL, 0, '7', NULL, 'Ms.Nora , ', '', 'Standard', NULL, 1, NULL, 1, '', '-', 1),
(8, '2015-02-24 15:06:43', '2015-02-24 15:06:43', NULL, NULL, 0, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '---', 1),
(9, '2015-02-24 15:20:01', '2015-02-24 15:20:01', NULL, NULL, 0, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '--', 1),
(10, '2015-02-25 09:36:34', '2015-02-25 09:36:34', NULL, NULL, 0, '10', NULL, NULL, '', 'Standard', 7, 1, 20.1, NULL, '0', '---', 1),
(11, '2015-02-25 09:38:19', '2015-02-25 09:38:19', NULL, NULL, 0, '11', NULL, NULL, '', 'Standard', 7, 1, 20.1, 1, '0', '---', 1),
(12, '2015-02-25 09:39:59', '2015-02-25 09:39:59', NULL, NULL, 0, '12', NULL, NULL, '', 'Standard', 7, 1, 20.1, NULL, '', '', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `quo_devices`
--

INSERT INTO `quo_devices` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quotation_id`, `salesorder_id`, `customer_id`, `description_id`, `instrument_id`, `quotationno`, `brand_id`, `quantity`, `model_no`, `range`, `call_location`, `call_type`, `validity`, `unit_price`, `discount`, `department_id`, `account_service`, `total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `status`, `is_approved`, `is_deleted`, `onsite_id`, `onsite`, `onsite_del`) VALUES
(1, 1, '2015-02-02 18:14:06', '2015-02-02 18:14:06', NULL, NULL, 0, '1', NULL, 'CUS-05-000002', 1, '1', 'BSQ-05-000002', 1, '1', '72-2081', '1', 'Inlab', 'Singlas', 12, '182', '', '2', 'calibration service', '182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RBA5053', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(2, 1, '2015-02-09 11:00:24', '2015-02-09 11:02:19', NULL, NULL, 0, '2', NULL, 'CUS-05-000002', 2, '1', 'BSQ-05-000003', 1, '1', '72-2082', '1', 'Inlab', 'Singlas', 12, '182', '', '2', 'calibration service', '182', NULL, NULL, NULL, NULL, NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(3, 2, '2015-02-09 11:00:24', '2015-02-09 11:02:24', NULL, NULL, 0, '2', NULL, 'CUS-05-000002', 3, '1', 'BSQ-05-000003', 1, '2', '72-2083', '1', 'Inlab', 'Singlas', 12, '182', '', '2', 'calibration service', '182', NULL, NULL, NULL, NULL, NULL, '21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(4, 1, '2015-02-13 07:14:29', '2015-02-13 07:14:37', NULL, NULL, 0, '3', NULL, 'CUS-05-000003', NULL, '1', 'BQS-05-000002', 1, '1', 'Q31', '1', 'Inlab', 'Singlas', 12, '260', '', '2', 'calibration service', '260', NULL, NULL, NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(5, 1, '2015-02-13 07:57:50', '2015-02-13 07:57:56', NULL, NULL, 0, '4', NULL, 'CUS-05-000003', NULL, '1', 'BQS-05-000003', 1, '1', 'Q31', '1', 'Inlab', 'Singlas', 12, '260', '', '2', 'calibration service', '260', NULL, NULL, NULL, NULL, NULL, '123w', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(6, 1, '2015-02-13 08:17:37', '2015-02-13 08:17:37', NULL, NULL, 0, '5', NULL, 'CUS-05-000003', 5, '1', 'BSQ-05-000005', 1, '1', 'Q31', '1', 'subcontract', 'Singlas', 12, '260', '', '2', 'calibration service', '260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(7, 2, '2015-02-13 08:17:37', '2015-02-13 08:17:37', NULL, NULL, 0, '5', NULL, 'CUS-05-000003', 6, '2', 'BSQ-05-000005', 3, '2', 'Q12', '3', 'subcontract', 'Singlas', 12, '180', '', '2', 'calibration service', '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(8, 3, '2015-02-13 08:17:37', '2015-02-13 08:17:37', NULL, NULL, 0, '5', NULL, 'CUS-05-000003', 7, '2', 'BSQ-05-000005', 3, '2', 'Q12', '3', 'subcontract', 'Singlas', 12, '180', '', '2', 'calibration service', '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(9, 1, '2015-02-13 08:47:51', '2015-02-13 08:47:51', NULL, NULL, 0, '6', NULL, 'CUS-05-000003', 8, '1', 'BSQ-05-000006', 1, '1', 'Q31', '1', 'onsite', 'Singlas', 12, '260', '', '2', 'calibration service', '260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, 0),
(124, 2, '2015-02-25 09:39:44', '2015-02-25 09:39:44', NULL, NULL, 0, '12', NULL, 'CUS-05-000002', NULL, '1', 'BQS-05-000009', 1, '2', '72-2080', '1', 'subcontract', 'Singlas', 12, '159', '', '2', 'calibration service', '159', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(123, 1, '2015-02-25 09:39:44', '2015-02-25 09:39:44', NULL, NULL, 0, '12', NULL, 'CUS-05-000002', NULL, '1', 'BQS-05-000009', 1, '2', '72-2080', '1', 'subcontract', 'Singlas', 12, '159', '', '2', 'calibration service', '159', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(122, 1, '2015-02-25 09:38:17', '2015-02-25 09:38:17', NULL, NULL, 0, '11', NULL, 'CUS-05-000002', NULL, '1', 'BQS-05-000008', 1, '1', '72-2080', '1', 'subcontract', 'Singlas', 12, '159', '', '2', 'calibration service', '159', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(121, 2, '2015-02-25 09:34:48', '2015-02-25 09:34:48', NULL, NULL, 0, '10', NULL, 'CUS-05-000002', NULL, '1', 'BQS-05-000007', 1, '2', '72-2080', '1', 'Inlab', 'Singlas', 12, '159', '', '2', 'calibration service', '159', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(120, 1, '2015-02-25 09:34:47', '2015-02-25 09:34:47', NULL, NULL, 0, '10', NULL, 'CUS-05-000002', NULL, '1', 'BQS-05-000007', 1, '2', '72-2080', '1', 'Inlab', 'Singlas', 12, '159', '', '2', 'calibration service', '159', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(119, 1, '2015-02-24 15:20:01', '2015-02-24 15:20:01', NULL, NULL, 0, '9', NULL, 'CUS-05-000004', 16, '1', 'BSQ-05-000009', 1, '1', '2434', '1', 'Inlab', 'Singlas', 12, '316', '', '2', 'calibration service', '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(118, 4, '2015-02-24 15:06:43', '2015-02-24 15:06:43', NULL, NULL, 0, '8', NULL, 'CUS-05-000004', 15, '1', 'BSQ-05-000008', 1, '4', '2434', '1', 'Inlab', 'Singlas', 12, '316', '', '2', 'calibration service', '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(117, 3, '2015-02-24 15:06:43', '2015-02-24 15:06:43', NULL, NULL, 0, '8', NULL, 'CUS-05-000004', 14, '1', 'BSQ-05-000008', 1, '4', '2434', '1', 'Inlab', 'Singlas', 12, '316', '', '2', 'calibration service', '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(116, 2, '2015-02-24 15:06:43', '2015-02-24 15:06:43', NULL, NULL, 0, '8', NULL, 'CUS-05-000004', 13, '1', 'BSQ-05-000008', 1, '4', '2434', '1', 'Inlab', 'Singlas', 12, '316', '', '2', 'calibration service', '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(114, 3, '2015-02-24 14:12:47', '2015-02-24 14:12:47', NULL, NULL, 0, '7', NULL, 'CUS-05-000002', 11, '1', 'BSQ-05-000007', 1, '3', '2345', '1', 'Inlab', 'Singlas', 12, '520', '', '2', 'calibration service', '520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(115, 1, '2015-02-24 15:06:43', '2015-02-24 15:06:43', NULL, NULL, 0, '8', NULL, 'CUS-05-000004', 12, '1', 'BSQ-05-000008', 1, '4', '2434', '1', 'Inlab', 'Singlas', 12, '316', '', '2', 'calibration service', '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(113, 2, '2015-02-24 14:12:47', '2015-02-24 14:12:47', NULL, NULL, 0, '7', NULL, 'CUS-05-000002', 10, '1', 'BSQ-05-000007', 1, '3', '2345', '1', 'Inlab', 'Singlas', 12, '520', '', '2', 'calibration service', '520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0),
(112, 1, '2015-02-24 14:12:47', '2015-02-24 14:13:50', NULL, NULL, 0, '7', NULL, 'CUS-05-000002', 9, '1', 'BSQ-05-000007', 1, '1', '2345', '1', 'Inlab', 'Singlas', 12, '520', '25', '2', 'calibration service', '390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quo_documents`
--

INSERT INTO `quo_documents` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `customer_id`, `quotationno`, `quotation_id`, `upload_type`, `document_name`, `document_type`, `document_size`, `status`) VALUES
(1, '2015-02-13 08:20:43', '2015-02-13 08:20:43', NULL, NULL, 0, 'CUS-05-000003', NULL, '5', NULL, '1423812043_BSTech-Name Card Format.pdf', 'application/pdf', '862946', 1);

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
(1, 'CUS-05-000006', 'TAG-05-000006', 'CGRU-05-000002', 'BIT-05-000001', 'BQS-05-000009', 'BSO-05-000009', 'BDO-05-000007', 'BIN-05-000003', 'CPO-05-000021', 'BPI-05-000002', 'BSTRA-05-000054', 'BRF-05-000007', 'BPO-05-000005', 'OSS-05-000002', 'BSD-01-10000007', '', '', 'TS-0017-15', 'BPO-15-000008');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `created_by`, `modified_by`, `view`, `created`, `modified`, `from_range`, `to_range`, `range_name`, `unit_id`, `range_description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, NULL, NULL, 0, '2015-02-02 17:44:09', '2015-02-02 17:44:09', 'MULTIRANGE', '', 'MULTIRANGE -', '2', '', 1, 1, 0),
(2, NULL, NULL, 0, '2015-02-05 15:05:50', '2015-02-05 15:05:50', '0', '100', '(0~100)/DEG C', '1', '', 1, 1, 0),
(3, NULL, NULL, 0, '2015-02-13 05:25:58', '2015-02-13 05:25:58', '0', '500', '(0~500)/F', '3', '', 1, 1, 0),
(4, NULL, NULL, 0, '2015-03-03 11:01:57', '2015-03-03 11:01:57', '0', '200', '(0~200)/F', '3', '', 1, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `readytodeliver_items`
--

INSERT INTO `readytodeliver_items` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `collection_delivery_id`, `branch_id`, `cd_date`, `customer_id`, `quotation_id`, `quotationno`, `salesorder_id`, `salesorderno`, `deliveryorder_id`, `deliveryorderno`, `is_approved`, `is_shipped`, `shipped_date`, `is_delivered`, `delivered_date`, `assign_to`, `status`, `is_deleted`) VALUES
(1, NULL, '2015-02-13 08:13:36', '2015-02-13 08:13:36', NULL, NULL, 1, 1, '14-February-15', 'CUS-05-000003', '4', 'BQS-05-000003', 'BSO-05-000004', 'BSO-05-000004', '1', 'BDO-05-000002', 1, 0, NULL, 0, NULL, '1', 1, 0),
(2, NULL, '2015-02-24 14:41:19', '2015-02-24 14:41:19', NULL, NULL, 3, 1, '25-February-15', 'CUS-05-000002', '7', 'BSQ-05-000007', 'BSO-05-000007', 'BSO-05-000007', '3', 'BDO-05-000004', 1, 0, NULL, 0, NULL, '1', 1, 0),
(3, NULL, '2015-02-24 14:46:20', '2015-02-24 14:46:20', NULL, NULL, 4, 1, '24-February-15', 'CUS-05-000002', '7', 'BSQ-05-000007', 'BSO-05-000007', 'BSO-05-000007', '4', 'BDO-05-000005', 0, 0, NULL, 0, NULL, '1', 1, 0),
(4, NULL, '2015-03-03 05:55:27', '2015-03-03 05:55:27', NULL, NULL, 5, 1, '03-March-15', 'CUS-05-000003', '5', 'BSQ-05-000005', 'BSO-05-000005', 'BSO-05-000005', '2', 'BDO-05-000003', 0, 1, '.03-March-15.', 1, NULL, '1', 1, 0),
(5, NULL, '2015-03-03 06:34:24', '2015-03-03 06:34:24', NULL, NULL, 6, 1, '03-March-15', 'CUS-05-000004', '9', 'BSQ-05-000009', 'BSO-05-000009', 'BSO-05-000009', '6', 'BDO-05-000007', 0, 0, NULL, 0, NULL, '1', 1, 0);

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
(1, '2015-02-02 17:54:46', '2015-02-02 17:56:09', NULL, NULL, 0, 'Mr.Zaky', '', 1, 0),
(2, '2015-02-13 04:52:52', '2015-02-13 04:52:52', NULL, NULL, 0, 'Ms.Nora', '', 1, 0);

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
(1, 'BSTRA-05-000024', 'BPO-05-000005', 'BRF-05-000005', 'CUS-05-000005', 1, 'CAL TEC ( MAIN ) ', '12 TUAS\r\nSINGAPORE 432342', NULL, '', '32132323', '323232', 'jo@bs.sg', '30 days', '2015-02-26', 'asd', NULL, '', NULL, 'BEING PROVIDED CALIBRATION SERVICE OF THE FOLLOWING(S):', 1, 1, '2015-02-26 14:55:42', '2015-02-26 14:55:42', NULL, NULL, 0, 0, 0, 0);

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
(1, '2015-02-26 14:55:42', '2015-02-26 14:55:42', NULL, NULL, 0, '1', NULL, 'Ms.Nora', 'wer', 'Standard', 7, 1, 1, 1, '3', '-', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `reqpur_devices`
--

INSERT INTO `reqpur_devices` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `reqpurchaseorder_id`, `customer_id`, `instrument_name`, `prequistionno`, `brand_name`, `quantity`, `model_no`, `range`, `validity`, `unit_price`, `discount`, `department_name`, `account_service`, `total`, `title`, `status`, `is_approved`, `is_deleted`) VALUES
(12, '2015-02-26 14:55:31', '2015-02-26 14:55:31', NULL, NULL, 0, '1', 'CUS-05-000005', 'aas', 'BRF-05-000005', 'asd', '3', 'asd', 'ad', 12, '33', '3', 'asd', 'Calibration Service', '32.01', '0,1', 1, 0, 0),
(11, '2015-02-26 14:55:31', '2015-02-26 14:55:31', NULL, NULL, 0, '1', 'CUS-05-000005', 'aas', 'BRF-05-000005', 'asd', '3', 'asd', 'ad', 12, '33', '3', 'asd', 'Calibration Service', '32.01', '0,1', 1, 0, 0),
(10, '2015-02-26 14:55:31', '2015-02-26 14:55:31', NULL, NULL, 0, '1', 'CUS-05-000005', 'aas', 'BRF-05-000005', 'asd', '3', 'asd', 'ad', 12, '33', '3', 'asd', 'Calibration Service', '32.01', 'null', 0, 0, 0);

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
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorders`
--

INSERT INTO `salesorders` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `salesorderno`, `track_id`, `branch_id`, `quotation_id`, `quotationno`, `customer_id`, `customername`, `address`, `due_amount`, `attn`, `phone`, `fax`, `email`, `reg_date`, `ref_no`, `ref_count`, `total_inst`, `our_ref_no`, `in_date`, `due_date`, `priority`, `instrument_type_id`, `remarks`, `service_id`, `sal_description_count`, `po_generate_type`, `is_assign_po`, `is_poapproved`, `po_approval_date`, `is_pocount_satisfied`, `is_approved`, `is_approved_lab`, `status`, `is_deleted`, `is_deliveryorder_created`, `is_delivery_approved`, `is_invoice_created`, `is_invoice_approved`, `is_jobcompleted`) VALUES
('BSO-05-000002', '2015-02-02 18:14:06', '2015-02-25 15:13:04', NULL, NULL, 0, 'BSO-05-000002', 'BSTRA-05-000002', 1, '1', 'BSQ-05-000002', 'CUS-05-000002', 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', '2015-02-02', 'PO#AAS/WO/0015/15', '0', 0, NULL, '2015-02-02', '2015-12-11', '1', 1, '-', 1, NULL, 'Manual', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-05-000003', '2015-02-09 11:00:24', '2015-02-09 11:00:24', NULL, NULL, 0, 'BSO-05-000003', 'BSTRA-05-000004', 1, '2', 'BSQ-05-000003', 'CUS-05-000002', 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', '09-February-15', 'CPO-05-000003', '0', 0, NULL, '09-February-15', '13-February-15', '1', 1, '-', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-05-000004', '2015-02-13 07:59:54', '2015-02-13 07:59:54', 1, NULL, 0, 'BSO-05-000004', 'BSTRA-05-000009', 1, '4', 'BQS-05-000003', 'CUS-05-000003', 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '41 Senoko Drive \r\nSingapore 758249', NULL, '4', '64584411', '64584400', 'mohan@bs.sg', '13-February-15', 'PO#124rasdsd', '1', 0, NULL, '13-February-15', '17-February-15', NULL, 0, '-', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 1, 0),
('BSO-05-000005', '2015-02-13 08:17:37', '2015-02-13 08:17:37', NULL, NULL, 0, 'BSO-05-000005', 'BSTRA-05-000011', 1, '5', 'BSQ-05-000005', 'CUS-05-000003', 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive \r\nSingapore 758249', NULL, '3', '64584411', '64584400', 'mohanam@bsaquatierra.com', '13-February-15', 'PO#4321', '3', 0, NULL, '13-February-15', '14-February-15', '4', 1, '-', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 0, 1, 0, 1, 0, 0, 0, 0),
('BSO-05-000006', '2015-02-13 08:47:51', '2015-02-13 08:47:51', NULL, NULL, 0, 'BSO-05-000006', 'BSTRA-05-000015', 1, '6', 'BSQ-05-000006', 'CUS-05-000003', 'BS AQUATIERRA PTE LTD ( MAIN ) ', '41 Senoko Drive Singapore 758249', NULL, '3', '64584411', '64584400', 'mohanam@bsaquatierra.com', '13-February-15', 'CPO-05-000009', '0', 0, NULL, '13-February-15', '17-February-15', '1', 1, '-', 1, NULL, 'Automatic', 0, 0, NULL, NULL, '1', 0, 1, 0, 0, 0, 0, 0, 0),
('BSO-05-000007', '2015-02-24 14:12:46', '2015-02-24 14:12:46', NULL, NULL, 0, 'BSO-05-000007', 'BSTRA-05-000030', 1, '7', 'BSQ-05-000007', 'CUS-05-000002', 'ALLIANCE AIRSUPPORT PTE LTD ( MAIN ) ', '68 KALLANG PUDDING ROAD\r\n#03-03 SYH LOGISTICS BUILDING\r\nSINGAPORE 349327', NULL, '1', '6547 1910', '6547 1912', 'ALAIRSUP@SINGNET.COM.SG', '24-February-15', 'PO-05-000012', '3', 0, NULL, '24-February-15', '28-February-15', '1', 1, '-', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 1, 0),
('BSO-05-000008', '2015-02-24 15:06:41', '2015-02-24 15:06:41', NULL, NULL, 0, 'BSO-05-000008', 'BSTRA-05-000034', 1, '8', 'BSQ-05-000008', 'CUS-05-000004', 'BS OFFSHORE PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '6', '64584411', '64584400', 'rejesh@bsoffshore.com', '24-February-15', 'PO12345', '5', 5, NULL, '24-February-15', '28-February-15', '1', 1, '---', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 0, 0),
('BSO-05-000009', '2015-02-24 15:20:01', '2015-02-24 15:20:01', NULL, NULL, 0, 'BSO-05-000009', 'BSTRA-05-000036', 1, '9', 'BSQ-05-000009', 'CUS-05-000004', 'BS OFFSHORE PTE LTD ( MAIN ) ', '41 Senoko Drive\r\nSingapore 758249', NULL, '5', '64584411', '64584400', 'nadia@bsoffshore.com', '24-February-15', 'PO12345', '5', 5, NULL, '24-February-15', '28-February-15', '1', 1, '--', 1, NULL, 'Manual', 1, 1, NULL, NULL, '1', 1, 1, 0, 1, 1, 1, 0, 0);

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
(1, '2015-02-02 17:16:19', '2015-02-02 17:16:19', NULL, NULL, 0, 'Ms.Nora', 'BST-N', '', 1, 0),
(2, '2015-02-13 04:51:52', '2015-02-13 04:51:52', NULL, NULL, 0, 'Ms.Zaky', 'BST-SEZ', '', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sal_description`
--

INSERT INTO `sal_description` (`id`, `order_by`, `created`, `modified`, `created_by`, `modified_by`, `view`, `quo_ins_id`, `salesorder_id`, `quotation_id`, `device_id`, `quotationno`, `customer_id`, `sales_quantity`, `instrument_id`, `model_no`, `brand_id`, `sales_range`, `sales_calllocation`, `sales_calltype`, `sales_validity`, `sales_unitprice`, `sales_discount`, `department_id`, `sales_accountservice`, `sales_titles`, `sales_total`, `title1`, `title1_val`, `title2`, `title2_val`, `title3`, `title3_val`, `title4`, `title4_val`, `title5`, `title5_val`, `title6`, `title6_val`, `title7`, `title7_val`, `title8`, `title8_val`, `pending`, `processing`, `checking`, `shipping`, `is_deliveryorder_created`, `ready_deliver`, `is_delivered`, `assign_to`, `status`, `is_approved`, `delay`, `is_approved_lab`, `is_deleted`, `sales_sub_con`, `sales_sub_con_id`, `sales_sub_con_del`, `sales_po`, `sales_po_id`, `sales_po_del`, `proforma`, `certificateno`, `template_created`, `engineer`, `supervisor`, `manager`) VALUES
(1, 1, '2015-02-02 18:13:45', '2015-02-02 18:14:04', NULL, NULL, 0, NULL, 'BSO-05-000002', 1, 1, 'BSQ-05-000002', 'CUS-05-000002', '1', 1, '72-2080', 1, '1', 'Inlab', 'Singlas', 12, '182', '', 2, 'calibration service', NULL, '182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RBA5053', NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 'TS-0015-15', 1, 1, 0, 0),
(2, 1, '2015-02-09 11:00:23', '2015-02-09 11:00:23', NULL, NULL, 0, NULL, 'BSO-05-000003', 2, 2, 'BSQ-05-000003', 'CUS-05-000002', '2', 1, '72-2080', 1, '1', 'Inlab', 'Singlas', 12, '182', '', 2, 'calibration service', NULL, '182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 'TS-0017-15', 1, 1, 1, 1),
(3, 2, '2015-02-09 11:00:23', '2015-02-09 11:00:23', NULL, NULL, 0, NULL, 'BSO-05-000003', 2, 3, 'BSQ-05-000003', 'CUS-05-000002', '2', 1, '72-2080', 1, '1', 'Inlab', 'Singlas', 12, '182', '', 2, 'calibration service', NULL, '182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 'TS-0016-15', 1, 0, 0, 0),
(4, 1, '2015-02-13 07:59:33', '2015-02-13 08:11:38', NULL, NULL, 0, NULL, 'BSO-05-000004', 4, 5, 'BQS-05-000003', 'CUS-05-000003', '1', 1, 'Q31', 1, '1', 'Inlab', 'Singlas', 12, '260', '', 2, 'calibration service', NULL, '260', NULL, NULL, NULL, NULL, NULL, '123w', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 1, 0, '1', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(5, 1, '2015-02-13 08:16:50', '2015-02-13 08:33:13', NULL, NULL, 0, NULL, 'BSO-05-000005', 5, 6, 'BSQ-05-000005', 'CUS-05-000003', '1', 1, 'Q31', 1, '1', 'subcontract', 'Singlas', 12, '260', '', 2, 'calibration service', NULL, '260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 1, 1, '1', 0, NULL, 1, '1', NULL, 1, 0, 1, 1, 0, 1, 12, 0, 0, NULL, 0, 0, 0, 0),
(6, 2, '2015-02-13 08:17:34', '2015-02-13 08:21:13', NULL, NULL, 0, NULL, 'BSO-05-000005', 5, 7, 'BSQ-05-000005', 'CUS-05-000003', '2', 2, 'Q12', 3, '3', 'subcontract', 'Singlas', 12, '180', '', 2, 'calibration service', NULL, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0, 1, 2, 0, 1, 12, 0, 0, NULL, 0, 0, 0, 0),
(7, 3, '2015-02-13 08:17:34', '2015-02-13 08:21:13', NULL, NULL, 0, NULL, 'BSO-05-000005', 5, 8, 'BSQ-05-000005', 'CUS-05-000003', '2', 2, 'Q12', 3, '3', 'subcontract', 'Singlas', 12, '180', '', 2, 'calibration service', NULL, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0, 1, 2, 0, 1, 12, 0, 0, NULL, 0, 0, 0, 0),
(8, 1, '2015-02-13 08:47:48', '2015-02-13 08:47:48', NULL, NULL, 0, NULL, 'BSO-05-000006', 6, 9, 'BSQ-05-000006', 'CUS-05-000003', '1', 1, 'Q31', 1, '1', 'onsite', 'Singlas', 12, '260', '', 2, 'calibration service', NULL, '260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 0, 0, 0, '0', 0, NULL, 1, '1', NULL, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(9, 1, '2015-02-24 14:12:42', '2015-02-24 14:44:59', NULL, NULL, 0, NULL, 'BSO-05-000007', 7, 112, 'BSQ-05-000007', 'CUS-05-000002', '3', 1, '2345', 1, '1', 'Inlab', 'Singlas', 12, '520', '', 2, 'calibration service', NULL, '520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 1, 1, '1', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(10, 2, '2015-02-24 14:12:43', '2015-02-24 14:44:59', NULL, NULL, 0, NULL, 'BSO-05-000007', 7, 113, 'BSQ-05-000007', 'CUS-05-000002', '3', 1, '2345', 1, '1', 'Inlab', 'Singlas', 12, '520', '', 2, 'calibration service', NULL, '520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 1, 1, '1', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(11, 3, '2015-02-24 14:12:43', '2015-02-24 14:45:58', NULL, NULL, 0, NULL, 'BSO-05-000007', 7, 114, 'BSQ-05-000007', 'CUS-05-000002', '3', 1, '2345', 1, '1', 'Inlab', 'Singlas', 12, '520', '', 2, 'calibration service', NULL, '520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 1, 0, '1', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(12, 1, '2015-02-24 15:06:38', '2015-02-24 15:13:30', NULL, NULL, 0, NULL, 'BSO-05-000008', 8, 115, 'BSQ-05-000008', 'CUS-05-000004', '4', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(13, 2, '2015-02-24 15:06:38', '2015-02-24 15:13:30', NULL, NULL, 0, NULL, 'BSO-05-000008', 8, 116, 'BSQ-05-000008', 'CUS-05-000004', '4', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(14, 3, '2015-02-24 15:06:38', '2015-02-24 15:13:30', NULL, NULL, 0, NULL, 'BSO-05-000008', 8, 117, 'BSQ-05-000008', 'CUS-05-000004', '4', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(15, 4, '2015-02-24 15:06:38', '2015-02-24 15:13:30', NULL, NULL, 0, NULL, 'BSO-05-000008', 8, 118, 'BSQ-05-000008', 'CUS-05-000004', '4', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0),
(16, 1, '2015-02-24 15:19:59', '2015-02-24 15:21:05', NULL, NULL, 0, NULL, 'BSO-05-000009', 9, 119, 'BSQ-05-000009', 'CUS-05-000004', '1', 1, '2434', 1, '1', 'Inlab', 'Singlas', 12, '316', '', 2, 'calibration service', NULL, '316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 1, 0, 0, '0', 0, NULL, 1, '1', NULL, 1, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0);

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
(1, '2015-02-02 17:08:05', '2015-02-02 17:08:05', NULL, NULL, 0, 'Calibration Service', '', 1, 0),
(2, '2015-02-13 04:20:49', '2015-02-13 04:20:49', NULL, NULL, 0, 'Rental Service', '', 1, 0);

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
  `is_approved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subcontractdos`
--

INSERT INTO `subcontractdos` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `subcontract_dono`, `customer_id`, `salesorder_id`, `branch_id`, `subcontract_name`, `subcontract_address`, `subcontract_date`, `subcontract_duedate`, `subcontract_salesperson`, `service_id`, `subcontract_attn`, `subcontract_phone`, `subcontract_fax`, `subcontract_email`, `subcontract_ref_no`, `subcontract_track_id`, `subcontract_remarks`, `is_deleted`, `is_approved`) VALUES
(1, '2015-02-13 08:25:44', '2015-02-13 08:25:44', NULL, NULL, 0, 'BSD-01-10000006', 'CUS-05-000004', 'BSO-05-000005', NULL, 'BS OFFSHORE PTE LTD', '41 Senoko DriveSingapore 758249', '14-February-15', '14-February-15', 'Ms.Nora', 1, '6', '64584411', '64584400', 'rejesh@bsoffshore.com', 'BSQ-05-000005', 'BSTRA-05-000011', '', 0, 1),
(2, '2015-02-13 08:26:52', '2015-02-13 08:26:52', NULL, NULL, 0, 'BSD-01-10000007', 'CUS-05-000004', 'BSO-05-000005', NULL, 'BS OFFSHORE PTE LTD', '41 Senoko DriveSingapore 758249', '13-February-15', '14-February-15', '', 1, '5', '64584411', '64584400', 'nadia@bsoffshore.com', 'BSQ-05-000005', 'BSTRA-05-000011', '-', 0, 1);

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
(1, '2015-02-02 17:11:52', '2015-02-02 17:11:52', NULL, NULL, 0, 'Calibration', 1, 0),
(2, '2015-02-13 04:21:45', '2015-02-13 04:21:45', NULL, NULL, 0, 'Rental', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `temp_ambients`
--

INSERT INTO `temp_ambients` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `ambientname`, `description`, `default`, `status`, `is_deleted`) VALUES
(1, '2015-02-03 11:35:46', '2015-02-03 11:35:46', 0, 0, 0, '(55 Â± 10) % rh', '', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `temp_certificate`
--

INSERT INTO `temp_certificate` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `certificate_no`, `template_id`, `salesorder_id`, `description_id`, `instrument_id`, `brand_id`, `model`, `range_id`, `is_template_created`, `is_template_match`, `status`, `is_approved`, `is_deleted`, `date_calibrated`, `due_date`, `temperature`, `humidity`, `formdata1`, `formdata2`, `instrument_cal_status`, `instrument_cal_description`, `calibrationtype`, `cal_status`, `cal_status_description`, `approved_status`, `methodofcal1`, `methodofcal2`, `resultofcal1`, `resultofcal2`, `remark1`, `remark2`, `remark3`, `remark4`, `remark5`, `remark6`, `remark7`, `remark8`) VALUES
(1, '2015-02-03 14:50:31', '2015-02-20 11:04:33', NULL, NULL, NULL, 'TS-0015-15', 1, 'BSO-05-000002', 1, 1, 1, '72-2080', 1, 1, 1, 1, 0, 0, '02-February-15', '06-February-15', NULL, NULL, '', '', 2, '', 'Non-Singlas', 1, 'UNCERT WRONG', 1, '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '2015-02-09 11:05:30', '2015-02-09 11:05:30', NULL, NULL, NULL, 'TS-0016-15', 1, 'BSO-05-000003', 3, 1, 1, '72-2080', 1, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2015-02-09 11:05:30', '2015-02-20 11:21:56', NULL, NULL, NULL, 'TS-0017-15', 1, 'BSO-05-000003', 2, 1, 1, '72-2080', 1, 1, 1, 1, 0, 0, '09-February-15', '13-February-15', NULL, NULL, '', '', 2, '', 'Non-Singlas', 2, '', 2, '', '', '', '', '', '', '', '', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `temp_certificate_data`
--

INSERT INTO `temp_certificate_data` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `certificate_no`, `temp_channel_id`, `temp_readingtype_id`, `is_analog`, `is_afteradjust`, `no_runs`, `uc_data_arr`, `temp1`, `unit1`, `res1`, `acc1`, `count1`, `uncert1`, `m1_1`, `m1_2`, `m1_3`, `m1_4`, `m1_5`, `m1_6`, `m1_7`, `m1_8`, `m1_9`, `m1_10`, `m1_11`, `m1_12`, `m1_13`, `b1_1`, `b1_2`, `b1_3`, `b1_4`, `b1_5`, `b1_6`, `b1_7`, `b1_8`, `b1_9`, `b1_10`, `b1_11`, `b1_12`, `b1_13`, `a1_1`, `a1_2`, `a1_3`, `a1_4`, `a1_5`, `a1_6`, `a1_7`, `a1_8`, `a1_9`, `a1_10`, `a1_11`, `a1_12`, `a1_13`, `uc1`, `dof1`, `kfac1`, `uncertainty1_val`, `temp2`, `unit2`, `res2`, `acc2`, `count2`, `uncert2`, `m2_1`, `m2_2`, `m2_3`, `m2_4`, `m2_5`, `m2_6`, `m2_7`, `m2_8`, `m2_9`, `m2_10`, `m2_11`, `m2_12`, `m2_13`, `b2_1`, `b2_2`, `b2_3`, `b2_4`, `b2_5`, `b2_6`, `b2_7`, `b2_8`, `b2_9`, `b2_10`, `b2_11`, `b2_12`, `b2_13`, `a2_1`, `a2_2`, `a2_3`, `a2_4`, `a2_5`, `a2_6`, `a2_7`, `a2_8`, `a2_9`, `a2_10`, `a2_11`, `a2_12`, `a2_13`, `uc2`, `dof2`, `kfac2`, `uncertainty2_val`, `temp3`, `unit3`, `res3`, `acc3`, `count3`, `uncert3`, `m3_1`, `m3_2`, `m3_3`, `m3_4`, `m3_5`, `m3_6`, `m3_7`, `m3_8`, `m3_9`, `m3_10`, `m3_11`, `m3_12`, `m3_13`, `b3_1`, `b3_2`, `b3_3`, `b3_4`, `b3_5`, `b3_6`, `b3_7`, `b3_8`, `b3_9`, `b3_10`, `b3_11`, `b3_12`, `b3_13`, `a3_1`, `a3_2`, `a3_3`, `a3_4`, `a3_5`, `a3_6`, `a3_7`, `a3_8`, `a3_9`, `a3_10`, `a3_11`, `a3_12`, `a3_13`, `uc3`, `dof3`, `kfac3`, `uncertainty3_val`, `temp4`, `unit4`, `res4`, `acc4`, `count4`, `uncert4`, `m4_1`, `m4_2`, `m4_3`, `m4_4`, `m4_5`, `m4_6`, `m4_7`, `m4_8`, `m4_9`, `m4_10`, `m4_11`, `m4_12`, `m4_13`, `b4_1`, `b4_2`, `b4_3`, `b4_4`, `b4_5`, `b4_6`, `b4_7`, `b4_8`, `b4_9`, `b4_10`, `b4_11`, `b4_12`, `b4_13`, `a4_1`, `a4_2`, `a4_3`, `a4_4`, `a4_5`, `a4_6`, `a4_7`, `a4_8`, `a4_9`, `a4_10`, `a4_11`, `a4_12`, `a4_13`, `uc4`, `dof4`, `kfac4`, `uncertainty4_val`, `temp5`, `unit5`, `res5`, `acc5`, `count5`, `uncert5`, `m5_1`, `m5_2`, `m5_3`, `m5_4`, `m5_5`, `m5_6`, `m5_7`, `m5_8`, `m5_9`, `m5_10`, `m5_11`, `m5_12`, `m5_13`, `b5_1`, `b5_2`, `b5_3`, `b5_4`, `b5_5`, `b5_6`, `b5_7`, `b5_8`, `b5_9`, `b5_10`, `b5_11`, `b5_12`, `b5_13`, `a5_1`, `a5_2`, `a5_3`, `a5_4`, `a5_5`, `a5_6`, `a5_7`, `a5_8`, `a5_9`, `a5_10`, `a5_11`, `a5_12`, `a5_13`, `uc5`, `dof5`, `kfac5`, `uncertainty5_val`, `temp6`, `unit6`, `res6`, `acc6`, `count6`, `uncert6`, `m6_1`, `m6_2`, `m6_3`, `m6_4`, `m6_5`, `m6_6`, `m6_7`, `m6_8`, `m6_9`, `m6_10`, `m6_11`, `m6_12`, `m6_13`, `b6_1`, `b6_2`, `b6_3`, `b6_4`, `b6_5`, `b6_6`, `b6_7`, `b6_8`, `b6_9`, `b6_10`, `b6_11`, `b6_12`, `b6_13`, `a6_1`, `a6_2`, `a6_3`, `a6_4`, `a6_5`, `a6_6`, `a6_7`, `a6_8`, `a6_9`, `a6_10`, `a6_11`, `a6_12`, `a6_13`, `uc6`, `dof6`, `kfac6`, `uncertainty6_val`, `temp7`, `unit7`, `res7`, `acc7`, `count7`, `uncert7`, `m7_1`, `m7_2`, `m7_3`, `m7_4`, `m7_5`, `m7_6`, `m7_7`, `m7_8`, `m7_9`, `m7_10`, `m7_11`, `m7_12`, `m7_13`, `b7_1`, `b7_2`, `b7_3`, `b7_4`, `b7_5`, `b7_6`, `b7_7`, `b7_8`, `b7_9`, `b7_10`, `b7_11`, `b7_12`, `b7_13`, `a7_1`, `a7_2`, `a7_3`, `a7_4`, `a7_5`, `a7_6`, `a7_7`, `a7_8`, `a7_9`, `a7_10`, `a7_11`, `a7_12`, `a7_13`, `uc7`, `dof7`, `kfac7`, `uncertainty7_val`, `temp8`, `unit8`, `res8`, `acc8`, `count8`, `uncert8`, `m8_1`, `m8_2`, `m8_3`, `m8_4`, `m8_5`, `m8_6`, `m8_7`, `m8_8`, `m8_9`, `m8_10`, `m8_11`, `m8_12`, `m8_13`, `b8_1`, `b8_2`, `b8_3`, `b8_4`, `b8_5`, `b8_6`, `b8_7`, `b8_8`, `b8_9`, `b8_10`, `b8_11`, `b8_12`, `b8_13`, `a8_1`, `a8_2`, `a8_3`, `a8_4`, `a8_5`, `a8_6`, `a8_7`, `a8_8`, `a8_9`, `a8_10`, `a8_11`, `a8_12`, `a8_13`, `uc8`, `dof8`, `kfac8`, `uncertainty8_val`, `temp9`, `unit9`, `res9`, `acc9`, `count9`, `uncert9`, `m9_1`, `m9_2`, `m9_3`, `m9_4`, `m9_5`, `m9_6`, `m9_7`, `m9_8`, `m9_9`, `m9_10`, `m9_11`, `m9_12`, `m9_13`, `b9_1`, `b9_2`, `b9_3`, `b9_4`, `b9_5`, `b9_6`, `b9_7`, `b9_8`, `b9_9`, `b9_10`, `b9_11`, `b9_12`, `b9_13`, `a9_1`, `a9_2`, `a9_3`, `a9_4`, `a9_5`, `a9_6`, `a9_7`, `a9_8`, `a9_9`, `a9_10`, `a9_11`, `a9_12`, `a9_13`, `uc9`, `dof9`, `kfac9`, `uncertainty9_val`, `temp10`, `unit10`, `res10`, `acc10`, `count10`, `uncert10`, `m10_1`, `m10_2`, `m10_3`, `m10_4`, `m10_5`, `m10_6`, `m10_7`, `m10_8`, `m10_9`, `m10_10`, `m10_11`, `m10_12`, `m10_13`, `b10_1`, `b10_2`, `b10_3`, `b10_4`, `b10_5`, `b10_6`, `b10_7`, `b10_8`, `b10_9`, `b10_10`, `b10_11`, `b10_12`, `b10_13`, `a10_1`, `a10_2`, `a10_3`, `a10_4`, `a10_5`, `a10_6`, `a10_7`, `a10_8`, `a10_9`, `a10_10`, `a10_11`, `a10_12`, `a10_13`, `uc10`, `dof10`, `kfac10`, `uncertainty10_val`, `temp11`, `unit11`, `res11`, `acc11`, `count11`, `uncert11`, `m11_1`, `m11_2`, `m11_3`, `m11_4`, `m11_5`, `m11_6`, `m11_7`, `m11_8`, `m11_9`, `m11_10`, `m11_11`, `m11_12`, `m11_13`, `b11_1`, `b11_2`, `b11_3`, `b11_4`, `b11_5`, `b11_6`, `b11_7`, `b11_8`, `b11_9`, `b11_10`, `b11_11`, `b11_12`, `b11_13`, `a11_1`, `a11_2`, `a11_3`, `a11_4`, `a11_5`, `a11_6`, `a11_7`, `a11_8`, `a11_9`, `a11_10`, `a11_11`, `a11_12`, `a11_13`, `uc11`, `dof11`, `kfac11`, `uncertainty11_val`, `temp12`, `unit12`, `res12`, `acc12`, `count12`, `uncert12`, `m12_1`, `m12_2`, `m12_3`, `m12_4`, `m12_5`, `m12_6`, `m12_7`, `m12_8`, `m12_9`, `m12_10`, `m12_11`, `m12_12`, `m12_13`, `b12_1`, `b12_2`, `b12_3`, `b12_4`, `b12_5`, `b12_6`, `b12_7`, `b12_8`, `b12_9`, `b12_10`, `b12_11`, `b12_12`, `b12_13`, `a12_1`, `a12_2`, `a12_3`, `a12_4`, `a12_5`, `a12_6`, `a12_7`, `a12_8`, `a12_9`, `a12_10`, `a12_11`, `a12_12`, `a12_13`, `uc12`, `dof12`, `kfac12`, `uncertainty12_val`, `temp13`, `unit13`, `res13`, `acc13`, `count13`, `uncert13`, `m13_1`, `m13_2`, `m13_3`, `m13_4`, `m13_5`, `m13_6`, `m13_7`, `m13_8`, `m13_9`, `m13_10`, `m13_11`, `m13_12`, `m13_13`, `b13_1`, `b13_2`, `b13_3`, `b13_4`, `b13_5`, `b13_6`, `b13_7`, `b13_8`, `b13_9`, `b13_10`, `b13_11`, `b13_12`, `b13_13`, `a13_1`, `a13_2`, `a13_3`, `a13_4`, `a13_5`, `a13_6`, `a13_7`, `a13_8`, `a13_9`, `a13_10`, `a13_11`, `a13_12`, `a13_13`, `uc13`, `dof13`, `kfac13`, `uncertainty13_val`, `temp14`, `unit14`, `res14`, `acc14`, `count14`, `uncert14`, `m14_1`, `m14_2`, `m14_3`, `m14_4`, `m14_5`, `m14_6`, `m14_7`, `m14_8`, `m14_9`, `m14_10`, `m14_11`, `m14_12`, `m14_13`, `b14_1`, `b14_2`, `b14_3`, `b14_4`, `b14_5`, `b14_6`, `b14_7`, `b14_8`, `b14_9`, `b14_10`, `b14_11`, `b14_12`, `b14_13`, `a14_1`, `a14_2`, `a14_3`, `a14_4`, `a14_5`, `a14_6`, `a14_7`, `a14_8`, `a14_9`, `a14_10`, `a14_11`, `a14_12`, `a14_13`, `uc14`, `dof14`, `kfac14`, `uncertainty14_val`, `temp15`, `unit15`, `res15`, `acc15`, `count15`, `uncert15`, `m15_1`, `m15_2`, `m15_3`, `m15_4`, `m15_5`, `m15_6`, `m15_7`, `m15_8`, `m15_9`, `m15_10`, `m15_11`, `m15_12`, `m15_13`, `b15_1`, `b15_2`, `b15_3`, `b15_4`, `b15_5`, `b15_6`, `b15_7`, `b15_8`, `b15_9`, `b15_10`, `b15_11`, `b15_12`, `b15_13`, `a15_1`, `a15_2`, `a15_3`, `a15_4`, `a15_5`, `a15_6`, `a15_7`, `a15_8`, `a15_9`, `a15_10`, `a15_11`, `a15_12`, `a15_13`, `uc15`, `dof15`, `kfac15`, `uncertainty15_val`) VALUES
(1, '2015-02-03 15:03:30', '2015-02-20 11:04:32', NULL, NULL, NULL, 'TS-0015-15', 1, 1, NULL, NULL, 10, '15,2,8,10,7', 0, 1, 0.5, 0, 0, 0.36021845339166, 0.21, 0.21, 0.21, 0.21, 0.21, 0.21, 0.21, 0.21, 0.21, 0.2100001, 0.21000001, 0.000000031622776603568, 0.000000010000000000596, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.000005, 0.0000005, 0.0000015811388300842, 0.0000005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.18010922669583, 9.4707932429832e29, 2, '1,2,3', 60, 1, 0.5, 0, 0, 0.36682057543095, 60.45, 60.45, 60.45, 60.45, 60.45, 60.45, 60.45, 60.45, 60.45, 60.45005, 60.450005, 0.000015811388298745, 0.000004999999999337, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60.00005, 60.000005, 0.000015811388301117, 0.000005000000000087, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.18341028771547, 1.6295108664022e19, 2, '1,2,3', 120, 1, 0.5, 0, 0, 0.39499873571376, 119.78, 119.78, 119.78, 119.78, 119.78, 119.78, 119.78, 119.78, 119.78, 119.78005, 119.780005, 0.000015811388301117, 0.000005000000000087, 119, 119, 119, 119, 119, 119, 119, 119, 119, 119.00005, 119.000005, 0.000015811388301117, 0.000005000000000087, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.19749936785688, 2.1909140058231e19, 2, '1,2,4', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL),
(2, '2015-02-09 11:05:49', '2015-02-20 11:21:56', NULL, NULL, NULL, 'TS-0017-15', 1, 1, NULL, NULL, 3, '15,2,8,10,7', 0, 1, 0.5, 0, 0, 0.36021845955798, 0.15, 0.15, 0.15005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.15001666666667, 0.000028867513459478, 0.000016666666666665, 0.25, 0.25, 0.25005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.25001666666667, 0.000028867513459478, 0.000016666666666665, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.18010922977899, 2.727588641397e16, 2, '1,2,3', 60, 1, 0.5, 0, 0, 0.36682058094378, 60.12, 60.12, 60.12005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60.120016666667, 0.00002886751346044, 0.00001666666666722, 60.22, 60.22, 60.22005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60.220016666667, 0.00002886751346044, 0.00001666666666722, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.18341029047189, 2.9331197339027e16, 2, '1,2,3', 120, 1, 0.5, 0, 0, 0.39499874083333, 120.25, 120.25, 120.25005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 120.25001666667, 0.00002886751346044, 0.00001666666666722, 120.35, 120.35, 120.35005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 120.35001666667, 0.00002886751346044, 0.00001666666666722, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.19749937041666, 3.9436454146864e16, 2, '1,2,4', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3.0419999965673e15, 2, NULL),
(3, '2015-02-09 11:13:42', '2015-02-09 11:13:42', NULL, NULL, NULL, 'TS-0017-15', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2015-02-09 11:13:51', '2015-02-09 11:13:51', NULL, NULL, NULL, 'TS-0017-15', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2015-02-09 11:14:17', '2015-02-09 11:14:17', NULL, NULL, NULL, 'TS-0016-15', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `temp_channel`
--

INSERT INTO `temp_channel` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `channelname`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-02-03 11:36:59', '2015-02-03 11:36:59', 0, 0, 0, 'CHANNEL-1', '', 1, 0),
(2, '2015-02-03 11:37:19', '2015-02-03 11:37:19', 0, 0, 0, 'CHANNEL-2', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `temp_instruments`
--

INSERT INTO `temp_instruments` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrumentname`, `tagno`, `description`, `is_approved`, `status`, `is_deleted`) VALUES
(1, '2015-02-02 18:23:23', '2015-02-02 18:23:23', 0, 0, 0, '4WIRE RTD', '', '', 0, 0, 1),
(2, '2015-02-02 18:27:55', '2015-02-02 18:27:55', 0, 0, 0, 'PRT SENSOR(PT 100)-4 WIRE', 'BS 1340', '', 0, 1, 0),
(3, '2015-02-02 18:28:59', '2015-02-02 18:28:59', 0, 0, 0, 'PRECISION DMM', 'BS 1326', '', 0, 1, 0),
(4, '2015-02-03 11:45:30', '2015-02-03 11:45:30', 0, 0, 0, 'LIQUID TEMPERATURE BATH', 'BS 1344', '', 0, 1, 0),
(5, '2015-02-03 11:46:38', '2015-02-03 11:46:38', 0, 0, 0, 'LIQUID TEMPERATURE BATH (BS 1462)', 'BS 1462', '', 0, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `temp_range`
--

INSERT INTO `temp_range` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `fromrange`, `torange`, `rangename`, `temp_unit_id`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-02-03 11:27:04', '2015-02-03 11:27:04', 0, 0, 0, 0, 500, '(0 ~ 500)/ËšC', 1, '', 1, 0),
(2, '2015-02-03 11:32:02', '2015-02-03 11:32:02', 0, 0, 0, -75, 1000, '(-75 ~ 1000)/ËšC', 1, '', 1, 0),
(3, '2015-02-03 11:34:40', '2015-02-03 11:34:40', 0, 0, 0, -75, 100, '(-75 ~ 100)/ËšC', 1, '', 1, 0),
(4, '2015-02-03 11:34:54', '2015-02-03 11:34:54', 0, 0, 0, 35, 300, '(35 ~ 300)/ËšC', 1, '', 1, 0),
(5, '2015-02-03 14:18:58', '2015-02-03 14:18:58', 0, 0, 0, -75, -0.1, '(-75 ~ -0.1)/ËšC', 1, '', 1, 0),
(6, '2015-02-03 14:20:21', '2015-02-03 14:20:21', 0, 0, 0, 0, 0.5, '(0 ~ 0.5)/ËšC', 1, '', 1, 0),
(7, '2015-02-03 14:20:47', '2015-02-03 14:20:47', 0, 0, 0, 1, 100, '(1 ~ 100)/ËšC', 1, '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `temp_readingtype`
--

INSERT INTO `temp_readingtype` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `readingtypename`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-02-03 14:51:17', '2015-02-03 14:51:35', 0, 0, 0, 'TEMPERATURE', '', 1, 0),
(2, '2015-02-03 14:51:52', '2015-02-03 14:51:52', 0, 0, 0, 'HUMIDITY', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `temp_relativehumidity`
--

INSERT INTO `temp_relativehumidity` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `relativehumidity`, `description`, `default`, `status`, `is_deleted`) VALUES
(1, '2015-02-03 11:36:23', '2015-02-03 11:36:23', 0, 0, 0, '(21 Â± 2) Â°C', '', 0, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `temp_templates`
--

INSERT INTO `temp_templates` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `temp_instruments_id`, `model`, `brand_id`, `range_id`, `customer_id`, `salesorder_id`, `status`, `is_deleted`) VALUES
(1, '2015-02-03 14:50:17', '2015-02-03 14:50:17', NULL, NULL, NULL, 1, '72-2080', 1, 1, '', NULL, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `temp_templates_data`
--

INSERT INTO `temp_templates_data` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `temp_templates_id`, `instrument_id`, `brand_id`, `model`, `range_id`, `setpoint`, `temp_readingtype_id`, `readingtypename`, `temp_unit_id`, `unitname`, `count`, `resolution`, `accuracy`, `temp_uncertainty_id`, `status`, `is_deleted`) VALUES
(2, '2015-02-03 14:47:56', '2015-02-19 06:41:58', NULL, NULL, NULL, 1, 1, 1, '', 1, 0, 1, '', 1, 'ËšC', 0, 0.5, 0, '3', 1, 0),
(3, '2015-02-03 14:48:46', '2015-02-03 14:48:46', NULL, NULL, NULL, 1, NULL, 0, '', 0, 60, 1, '', NULL, 'ËšC', 0, 0.5, 0, '4', 1, 0),
(4, '2015-02-03 14:50:14', '2015-02-03 14:50:14', NULL, NULL, NULL, 1, NULL, 0, '', 0, 120, 1, '', NULL, 'ËšC', 0, 0.5, 0, '4', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `temp_uncertainty`
--

INSERT INTO `temp_uncertainty` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `instrumentname`, `temp_instruments_id`, `duedate`, `tagno`, `totalname`, `procedureno`, `serialno`, `caldate`, `remarks`, `is_visible`, `status`, `is_deleted`) VALUES
(1, 1422943805, 1423726826, 0, 0, 0, 'PRT SENSOR(PT 100)-4 WIRE', 2, '20-June-15', 'BS 1340', 'PRT SENSOR(PT 100)-4 WIRE-BS 1340', '', 'EP 53022', '20-June-14', '', 1, 1, 0),
(2, 1422944035, 1422944035, 0, 0, 0, 'PRECISION DMM', 3, '14-October-15', 'BS 1326', 'BS 1326 PRECISION DMM', '', 'US36075261', '14-October-14', '', 1, 1, 0),
(3, 1422944665, 1423469923, 0, 0, 0, 'LIQUID TEMPERATURE BATH', 4, '14-October-15', 'BS 1344', 'LIQUID TEMPERATURE BATH-BS 1344', '', '', '14-October-15', '', 1, 1, 0),
(4, 1422944839, 1422944839, 0, 0, 0, 'LIQUID TEMPERATURE BATH (BS 1462)', 5, '14-October-15', 'BS 1462', 'BS 1462 LIQUID TEMPERATURE BATH (BS 1462)', '', '', '14-October-14', '', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `temp_uncertainty_data`
--

INSERT INTO `temp_uncertainty_data` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `temp_uncertainty_id`, `range_id`, `rangename`, `uref1_data1`, `uref1_data2`, `uref1_data3`, `uref2_data1`, `uref2_data2`, `uref2_data3`, `uref3_data1`, `uref3_data2`, `uref3_data3`, `uacc1_data1`, `uacc1_data2`, `uacc1_data3`, `uacc2_data1`, `uacc2_data2`, `uacc2_data3`, `uacc3_data1`, `uacc3_data2`, `uacc3_data3`, `urefdivisor`, `uresdivisoranalog`, `uresdivisordigital`, `urepdivisor`, `divisor`, `u1_data1`, `u1_data2`, `u1_data3`, `u1_data4`, `u2_data1`, `u2_data2`, `u2_data3`, `u2_data4`, `u3_data1`, `u3_data2`, `u3_data3`, `u3_data4`, `u4_data1`, `u4_data2`, `u4_data3`, `u4_data4`, `u5_data1`, `u5_data2`, `u5_data3`, `u5_data4`, `u6_data1`, `u6_data2`, `u6_data3`, `u6_data4`, `u7_data1`, `u7_data2`, `u7_data3`, `u7_data4`, `u8_data1`, `u8_data2`, `u8_data3`, `u8_data4`, `u9_data1`, `u9_data2`, `u9_data3`, `u9_data4`, `u10_data1`, `u10_data2`, `u10_data3`, `u10_data4`, `u11_data1`, `u11_data2`, `u11_data3`, `u11_data4`, `u12_data1`, `u12_data2`, `u12_data3`, `u12_data4`, `u13_data1`, `u13_data2`, `u13_data3`, `u13_data4`, `u14_data1`, `u14_data2`, `u14_data3`, `u14_data4`, `u15_data1`, `u15_data2`, `u15_data3`, `u15_data4`, `u16_data1`, `u16_data2`, `u16_data3`, `u16_data4`, `u17_data1`, `u17_data2`, `u17_data3`, `u17_data4`, `u18_data1`, `u18_data2`, `u18_data3`, `u18_data4`, `u19_data1`, `u19_data2`, `u19_data3`, `u19_data4`, `u20_data1`, `u20_data2`, `u20_data3`, `u20_data4`, `status`, `is_deleted`) VALUES
(2, '2015-02-03 14:13:50', '2015-02-03 14:13:50', NULL, NULL, NULL, 2, 2, '(-75 ~ 1000)/ËšC', '0.05', '1', '', '', '1', '', '', '1', '', '0.1', '1', '', '', '1', '', '', '1', '', '2', '1.732050808', '3.464101615', '1', '1.732050808', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', 1, 0),
(3, '2015-02-03 14:21:41', '2015-02-03 14:21:41', NULL, NULL, NULL, 3, 5, '(-75 ~ -0.1)/ËšC', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '0', '0', '0', '0', '1.732050808', '2', '0.12', '1', '', '3', '0.1', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', 1, 0),
(7, '2015-02-03 14:27:17', '2015-02-03 14:27:17', NULL, NULL, NULL, 4, 1, '(0 ~ 500)/ËšC', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '0', '0', '0', '0', '1.732050808', '2', '0.1', '1', '', '3', '0.15', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', 1, 0),
(8, '2015-02-09 16:14:49', '2015-02-09 16:14:49', NULL, NULL, NULL, 3, 6, '(0 ~ 0.5)/ËšC', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '0', '0', '0', '0', '1.732050808', '2', '0.08', '1', '', '3', '0.08', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', 1, 0),
(10, '2015-02-09 16:17:59', '2015-02-09 16:17:59', NULL, NULL, NULL, 3, 7, '(1 ~ 100)/ËšC', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '0', '0', '0', '0', '1.732050808', '2', '0.1', '1', '', '3', '0.08', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', 1, 0),
(15, '2015-02-12 07:40:18', '2015-02-12 07:40:18', NULL, NULL, NULL, 1, 1, '(0 ~ 500)/ËšC', '0.018', '1', '', '', '1', '', '', '1', '', '0.2', '1', '', '', '1', '', '', '1', '', '2', '1.7320508', '3.464101615', '1', '1.7320508', '4', '0.18', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `temp_unit`
--

INSERT INTO `temp_unit` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `unitname`, `description`, `status`, `is_deleted`) VALUES
(1, '2015-02-03 10:42:20', '2015-02-03 10:42:20', 0, 0, 0, 'ËšC', '', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `title_name`, `title_description`, `status`, `is_deleted`) VALUES
(1, '2014-10-20 11:21:02', '2014-10-20 11:21:02', NULL, NULL, NULL, 'PART NO.', '', 1, 0),
(2, '2014-10-20 11:21:19', '2014-10-20 11:21:19', NULL, NULL, NULL, 'LOCATION', '', 1, 0),
(3, '2014-10-27 03:02:09', '2014-10-27 03:02:23', NULL, NULL, NULL, 'SERIAL NO.', '', 1, 0),
(4, '2014-10-27 03:02:43', '2014-10-27 03:02:43', NULL, NULL, NULL, 'REMARKS', '', 1, 0),
(5, '2015-02-02 17:53:27', '2015-02-02 17:53:27', NULL, NULL, NULL, 'TAG NO.', '', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `unit_name`, `unit_description`, `status`, `is_approved`, `is_deleted`) VALUES
(1, '2015-02-02 17:36:33', '2015-02-02 17:36:33', NULL, NULL, 0, 'DEG C', 'DEG C', 1, 1, 0),
(2, '2015-02-02 17:38:42', '2015-02-02 17:38:42', NULL, NULL, 0, '-', '-', 1, 1, 0),
(3, '2015-02-13 05:10:58', '2015-02-13 05:10:58', NULL, NULL, 0, 'F', 'F', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `created`, `modified`, `created_by`, `modified_by`, `view`, `user_role_id`, `user_role`, `description`, `js_enc`, `other_branch`, `other_department`, `other_role`, `other_user`, `other_currency`, `other_assignedto`, `other_servicetype`, `other_additional`, `other_tallyledger`, `other_country`, `cus_industry`, `cus_location`, `cus_customer`, `cus_paymentterms`, `cus_priority`, `cus_referredby`, `cus_salesperson`, `cus_title`, `ins_procedureno`, `ins_brand`, `ins_instrument`, `ins_instrumentforgroup`, `ins_range`, `ins_title`, `ins_unit`, `set_candd`, `set_onsiteemail`, `set_recallservice`, `dim_instrument`, `tem_instrument`, `tem_ambient`, `tem_other`, `tem_range`, `tem_relativehumidity`, `tem_uncertainity`, `tem_readingtype`, `tem_channel`, `tem_formdatas`, `tem_template`, `tem_instrumentval`, `tem_unitconversion`, `tem_unit`, `pre_instrument`, `pre_ambient`, `pre_other`, `pre_range`, `pre_relativehumidity`, `pre_statementname`, `pre_statement1`, `pre_statement2`, `pre_vaccumsensor`, `pre_uncertainitydata`, `pre_formdatas`, `elec_instrument`, `elec_ambient`, `elec_location`, `elec_other`, `elec_range`, `elec_relative`, `elec_signal`, `elec_unit`, `elec_reference`, `elec_dcv`, `elec_acc`, `elec_acv`, `elec_capacitance`, `elec_dcc`, `elec_freq`, `elec_inductance`, `elec_resis1`, `elec_resis2`, `elec_formdatas`, `job_quotation`, `job_salesorder`, `job_deliveryorder`, `job_transaction`, `job_labprocess`, `job_purchaseorder`, `job_proforma`, `job_subcontract`, `job_candd`, `job_invoice`, `job_tracking`, `job_debt`, `job_onsite`, `job_recall`, `job_jobmonitor`, `job_purchasereq`, `job_prpurchaseorder`, `temp_dashboard`, `sales_contacts`, `sales_leads`, `sales_task`, `sales_campaign`, `rep_individualsales`, `rep_salesdetails`, `rep_performance`, `rep_quotedamount`, `rep_quotationreport`, `rep_fulldetails`, `rep_annualsales`, `rep_labinvolve`, `rep_quotedandsales`, `rep_dailywork`, `data_quotation`, `data_salesorder`, `data_deliveryorder`, `data_invoice`, `data_purchaseorder`, `data_proforma`, `data_subcontract`, `data_candd`, `data_recall`, `data_querywindow`, `dash_debt`, `dash_labprocess`, `dash_jobsum`, `app_customer`, `app_quotation`, `app_salesorder`, `app_deliveryorder1`, `app_deliveryorder2`, `app_invoice`, `app_procedureno`, `app_brand`, `app_instrument`, `app_instrumentgroup`, `app_range`, `app_unit`, `app_ready`, `app_prsupervisor`, `app_prmanager`, `temp_engineer`, `temp_supervisor`, `temp_manager`, `mis_editjob`, `mis_customerins`, `mis_inlabitems`, `mis_subcontract`, `mis_insite`, `status`, `is_deleted`) VALUES
(1, NULL, NULL, NULL, NULL, 0, 1, 'SuperAdmin', '', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_auto";a:1:{s:4:"view";s:1:"1";}s:13:"instr_costing";a:5:{s:4:"view";s:1:"1";s:4:"edit";s:1:"1";s:4:"user";s:1:"1";s:10:"supervisor";s:1:"1";s:7:"manager";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:6:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";s:10:"instrument";s:1:"1";s:3:"tag";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(2, NULL, NULL, NULL, NULL, 0, 2, 'Admin', '', 'a:64:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(12, '2014-09-08 10:33:44', '2014-09-08 10:33:44', NULL, NULL, 0, 3, 'Tech Manager', 'Tech Manager', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_department";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_role";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"other_user";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"instr_costing";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"job_resis";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:8:"app_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:9:"app_ready";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:10:"app_inship";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(13, '2014-10-20 05:46:20', '2014-10-20 05:46:20', NULL, NULL, 0, 4, 'Operation Manager', '', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:13:"instr_costing";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"1";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"cus_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"1";}s:11:"dash_number";a:1:{s:4:"view";s:1:"1";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"1";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"1";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"1";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"1";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(14, '2015-02-02 16:33:33', '2015-02-02 16:33:33', NULL, NULL, 0, 5, 'Operation Executive', '', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"instr_costing";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"cus_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"0";}s:11:"dash_number";a:1:{s:4:"view";s:1:"0";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"0";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"0";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"0";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"0";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(15, '2015-02-13 03:58:27', '2015-02-13 03:58:27', NULL, NULL, 0, 6, 'Technical Executive', '', 'a:67:{s:12:"other_branch";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_department";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"other_role";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"other_user";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"other_currency";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_assignedto";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_servicetype";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:16:"other_additional";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"other_tallyledger";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:13:"other_country";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"other_auto";a:1:{s:4:"view";s:1:"0";}s:13:"instr_costing";a:5:{s:4:"view";s:1:"0";s:4:"edit";s:1:"0";s:4:"user";s:1:"0";s:10:"supervisor";s:1:"0";s:7:"manager";s:1:"0";}s:12:"cus_industry";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_location";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_customer";a:6:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";s:10:"instrument";s:1:"0";s:3:"tag";s:1:"0";}s:16:"cus_paymentterms";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"cus_priority";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"cus_referredby";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"cus_salesperson";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"ins_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"ins_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:22:"ins_instrumentforgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"ins_title";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"ins_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"dash_graph";a:1:{s:4:"view";s:1:"0";}s:11:"dash_number";a:1:{s:4:"view";s:1:"0";}s:13:"dash_calendar";a:1:{s:4:"view";s:1:"0";}s:13:"dash_messages";a:1:{s:4:"view";s:1:"0";}s:16:"job_clientpolist";a:1:{s:4:"view";s:1:"0";}s:18:"job_clientapproval";a:1:{s:4:"view";s:1:"0";}s:13:"job_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_deliveryorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_transaction";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:14:"job_labprocess";a:4:{s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:17:"job_purchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_proforma";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"job_subcontract";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_candd";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"job_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"job_tracking";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:8:"job_debt";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"job_onsite";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:10:"job_recall";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"job_jobmonitor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"1";s:6:"delete";s:1:"0";}s:15:"job_purchasereq";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"job_prpurchaseorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"job_resis";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"job_formdatas";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_customer";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_quotation";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_salesorder";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:18:"app_deliveryorder1";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:11:"app_invoice";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:15:"app_procedureno";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_brand";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:14:"app_instrument";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:19:"app_instrumentgroup";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_range";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:8:"app_unit";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:9:"app_ready";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:16:"app_prsupervisor";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:13:"app_prmanager";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:10:"app_inship";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}s:12:"app_clientpo";a:4:{s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:4:"view";s:1:"0";s:6:"delete";s:1:"0";}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userrole_id`, `firstname`, `lastname`, `emailid`, `created`, `modified`, `created_by`, `modified_by`, `view`, `status`, `is_deleted`) VALUES
(1, 'admin', 'admin@123', 1, 'Admin', 'BackEnd', 'admin@bs.com', '2014-04-23 09:24:32', '2014-10-20 05:45:46', 0, 0, 0, 1, 0),
(2, 'krishnan', 'krish11', 2, 'Bala', 'Krishnan', 'krishnan@bestandards.com', '2014-10-20 05:32:39', '2014-10-20 05:45:34', NULL, NULL, 0, 1, 0),
(3, 'sharifah', 'sharifah', 15, 'sharifah', 'BS', 'sharifah@bestandards.com', '2014-10-20 05:53:40', '2015-02-26 11:32:13', NULL, NULL, 0, 1, 0),
(4, 'new', 'newuser', 13, 'new', 'new', 'new@new.com', '2015-01-05 14:15:12', '2015-01-05 14:15:12', NULL, NULL, 0, 1, 0),
(5, 'Sekar', 'sekar11', 13, 'Sekar', 'BS', 'sekar@bestandards.com', '2015-02-02 16:32:17', '2015-02-02 16:32:17', NULL, NULL, 0, 1, 0),
(6, 'Raj', 'bstech123', 15, 'Raj', 'BS', 'krishnan@bestandards.com', '2015-02-13 04:14:28', '2015-02-13 04:14:28', NULL, NULL, 0, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

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
(37, '2015-02-13 04:14:28', '2015-02-13 04:14:28', 6, 6, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
