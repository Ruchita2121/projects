-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2011 at 11:18 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db52417`
--
CREATE DATABASE `db52417` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db52417`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CatID` int(11) NOT NULL auto_increment,
  `CatName` varchar(25) collate latin1_general_ci NOT NULL,
  `CatDescription` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`CatID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=236 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CatID`, `CatName`, `CatDescription`) VALUES
(20, 'Living room/Lounge', 'All forms of living room furniture'),
(21, 'Dining Room', 'All forms of dining room furniture'),
(23, 'Bedroom', 'All forms of bed room furniture'),
(26, 'Hotel Room', 'All types of hotel furniture'),
(24, 'Outdoor', 'All forms of outdoor furnitures'),
(25, 'Office', 'All forms of office furniture'),
(27, 'Restaurante', 'All furniture for restaurants');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `CustID` int(11) NOT NULL auto_increment,
  `Cust_Surname` varchar(25) collate latin1_general_ci NOT NULL,
  `Cust_Othername` varchar(50) collate latin1_general_ci NOT NULL,
  `Title_Id` int(11) NOT NULL,
  `Cust_Address` varchar(50) collate latin1_general_ci default NULL,
  `Cust_Town` varchar(50) collate latin1_general_ci default NULL,
  `Cust_Email` varchar(50) collate latin1_general_ci NOT NULL,
  `CustPassword` varchar(15) collate latin1_general_ci NOT NULL,
  `cust_Gender` enum('Male','Female') collate latin1_general_ci NOT NULL,
  `Cust_Active` binary(1) NOT NULL default '0',
  `Cust_news` binary(1) NOT NULL default '0',
  `ActivationCode` varchar(100) collate latin1_general_ci NOT NULL,
  `login_level` varchar(15) collate latin1_general_ci NOT NULL default 'user',
  PRIMARY KEY  (`CustID`),
  UNIQUE KEY `Cust_Email` (`Cust_Email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustID`, `Cust_Surname`, `Cust_Othername`, `Title_Id`, `Cust_Address`, `Cust_Town`, `Cust_Email`, `CustPassword`, `cust_Gender`, `Cust_Active`, `Cust_news`, `ActivationCode`, `login_level`) VALUES
(1, 'Viviant', 'Viv', 0, NULL, NULL, 'admin', '12345', '', '1', '0', '', 'Administrator'),
(18, 'Seif', 'June ', 3, '4546478899', 'Nairobi', 'juneseif@gmail.com', 'june', 'Female', '1', '1', '27304ac097938cb739.7', 'user'),
(20, 'Thuo', 'Vivian', 3, '3567', 'Naivasha', 'vivian@yahoo.com', 'vivian', 'Male', '1', '1', '29574ac3850920a5f5.9', 'user'),
(24, 'Sammy D', 'Onks', 1, '4276', 'Mombasa', 'onkoba.sammy@gmail.com', 'onks', 'Male', '1', '1', '63784ac98d7b4c4f55.53421887', 'user'),
(25, 'Oduor Adhiambo', 'Angela', 3, 'Akilla', 'Nairobi', 'ngelzy@yahoo.com', 'angela', 'Female', '1', '1', '222184ac98fe22dcad4.09698314', 'user'),
(28, 'Olembo', 'Samuel', 1, '25882,\r\nMba,\r\nThe HOOD:)', 'Nairobi', 'sambaland123@yahoo.com', 'sam', 'Male', '1', '1', '234234acc30276acba5.92544488', 'user'),
(30, 'ochieng', 'Nelson', 1, 'kdkdk', 'kdkdk', 'nochieng@strathmore.edu', 'odunga', 'Male', '1', '1', '152214acf3becd5a3a3.52616759', 'user'),
(33, 'Bishop', 'Jay', 1, '12345678', 'Webuye', 'jaybishop@gmail.com', 'jay', 'Male', '0', '1', '311934b5048a9cb2ca9.91307355', 'user'),
(34, 'Nthoki ', 'Sharon', 3, '123', 'Kitui', 'nthiki5@yahoo.com', '123456', 'Female', '0', '1', '263064b508a051cfe81.29600808', 'user'),
(35, 'dennokello', 'Denno', 1, '234567', 'Kisumu', 'dennokello@gmail.com', 'deno', 'Male', '0', '1', '144264b508ad925e475.82686269', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `Staff_Id` int(11) NOT NULL auto_increment,
  `Staff_Name` varchar(255) default NULL,
  `Salary` int(11) default NULL,
  PRIMARY KEY  (`Staff_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Staff_Id`, `Staff_Name`, `Salary`) VALUES
(1, 'Jane', 62000),
(2, 'John', 63000);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `order_item_id` int(11) NOT NULL auto_increment,
  `OrderID` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `order_item_qty` int(11) NOT NULL,
  `productprice` float NOT NULL,
  PRIMARY KEY  (`order_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `OrderID`, `productid`, `order_item_qty`, `productprice`) VALUES
(1, 5, 122, 1, 250),
(2, 5, 121, 1, 700),
(3, 5, 118, 5, 2000),
(4, 16, 118, 5, 2000),
(5, 16, 122, 1, 250),
(6, 16, 121, 1, 700),
(7, 16, 118, 5, 2000),
(8, 16, 122, 1, 250),
(9, 16, 121, 1, 700),
(10, 16, 118, 5, 2000),
(11, 16, 122, 1, 250),
(12, 16, 121, 1, 700),
(13, 16, 118, 5, 2000),
(14, 17, 122, 1, 250),
(15, 17, 121, 1, 700),
(16, 17, 118, 5, 2000),
(17, 18, 122, 1, 250),
(18, 18, 121, 1, 700),
(19, 18, 118, 5, 2000),
(20, 19, 116, 1, 2000),
(21, 19, 73, 1, 1000),
(22, 20, 121, 1, 700),
(23, 21, 120, 1, 500),
(24, 21, 118, 1, 2000),
(25, 22, 121, 1, 700),
(26, 22, 122, 1, 250),
(27, 23, 121, 1, 700),
(28, 23, 122, 1, 250),
(29, 24, 122, 1, 250),
(30, 25, 122, 1, 250),
(31, 26, 72, 1, 1500),
(32, 26, 116, 23, 2000),
(33, 26, 73, 1, 1000),
(34, 27, 120, 5, 500),
(35, 27, 77, 5, 1500),
(36, 28, 77, 1, 1500),
(37, 29, 77, 1, 1500),
(38, 30, 115, 566, 2000),
(39, 30, 121, 90, 700),
(40, 31, 108, 1, 2000),
(41, 32, 122, 1, 250),
(42, 32, 122, 1, 250),
(43, 33, 120, 134, 500),
(44, 34, 122, 1, 250),
(45, 34, 114, 1, 1000),
(46, 34, 96, 1, 5000),
(47, 35, 122, 10, 250),
(48, 36, 122, 8, 250),
(49, 37, 122, 1, 250),
(50, 38, 111, 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int(11) NOT NULL auto_increment,
  `CustomerID` int(11) NOT NULL,
  `C_order_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `OrderTotal` float NOT NULL,
  PRIMARY KEY  (`OrderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `C_order_date`, `OrderTotal`) VALUES
(1, 24, '2009-10-06 00:00:00', 2000),
(2, 24, '2009-10-05 00:00:00', 3000),
(3, 24, '2009-10-06 00:00:00', 2000),
(4, 24, '2009-10-05 00:00:00', 3000),
(5, 26, '2009-10-06 00:00:00', 250),
(6, 26, '2009-10-06 00:00:00', 250),
(7, 26, '2009-10-06 00:00:00', 950),
(8, 26, '2009-10-06 00:00:00', 250),
(9, 26, '2009-10-06 00:00:00', 950),
(10, 26, '2009-10-06 00:00:00', 10950),
(11, 26, '2009-10-06 00:00:00', 250),
(12, 26, '2009-10-06 00:00:00', 950),
(13, 26, '2009-10-06 00:00:00', 10950),
(14, 26, '2009-10-06 00:00:00', 250),
(15, 26, '2009-10-06 00:00:00', 950),
(16, 26, '2009-10-06 00:00:00', 10950),
(17, 26, '2009-10-06 12:28:30', 0),
(18, 26, '2009-10-06 12:29:38', 10950),
(19, 24, '2009-10-06 12:31:02', 3000),
(20, 25, '2009-10-06 12:37:59', 700),
(21, 20, '2009-10-06 12:46:59', 2500),
(22, 20, '2009-10-06 12:58:33', 950),
(23, 20, '2009-10-06 13:52:34', 950),
(24, 20, '2009-10-06 13:53:55', 250),
(25, 20, '2009-10-06 13:54:48', 250),
(26, 24, '2009-10-06 14:46:31', 48500),
(27, 25, '2009-10-06 16:36:47', 10000),
(28, 25, '2009-10-06 17:10:33', 1500),
(29, 25, '2009-10-06 17:21:29', 1500),
(30, 24, '2009-10-07 09:22:55', 1.195e+006),
(31, 24, '2009-10-07 09:23:49', 2000),
(32, 28, '2009-10-07 09:28:50', 500),
(33, 20, '2009-10-07 16:32:24', 67000),
(34, 20, '2009-10-07 16:33:35', 6250),
(35, 29, '2009-10-08 10:20:19', 2500),
(36, 30, '2009-10-09 16:38:57', 2000),
(37, 18, '2010-01-15 18:36:38', 250),
(38, 18, '2010-01-15 18:37:55', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Prod_ID` int(11) NOT NULL auto_increment,
  `Prod_Name` varchar(25) collate latin1_general_ci NOT NULL,
  `Cat_Id` int(11) NOT NULL,
  `Prod_Price` decimal(10,2) default NULL,
  `Prod_dscrp` text collate latin1_general_ci,
  `Prod_PhotoId` varchar(25) collate latin1_general_ci default NULL,
  `Prod_thumb` varchar(50) collate latin1_general_ci default '00000000000000000000000000000000000000000000000000',
  `Prod_Photo` varchar(50) collate latin1_general_ci default '00000000000000000000000000000000000000000000000000',
  `Prod_Size` varchar(25) collate latin1_general_ci default NULL,
  `Prod_Wght` float default NULL,
  `Prod_Qty` int(6) default NULL,
  `Prod_Available` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`Prod_ID`),
  KEY `Cat_Id` (`Cat_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=131 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Prod_ID`, `Prod_Name`, `Cat_Id`, `Prod_Price`, `Prod_dscrp`, `Prod_PhotoId`, `Prod_thumb`, `Prod_Photo`, `Prod_Size`, `Prod_Wght`, `Prod_Qty`, `Prod_Available`) VALUES
(10, 'Patrick bed', 23, 150000.00, 'A bed fit for a queen.\r\nQueen sized bed, recommended for teenagers and young adults.\r\nSingle Bed.', NULL, 'bed01.jpg', 'bed01.jpg', '15', 12, 12, 1),
(11, 'Alicia Bed', 23, 1000.00, 'King size bed.\r\nCosy and feels like what home should feel like.', NULL, 'bed02.jpg', 'bed02.jpg', '13', 13, 3, 1),
(12, 'Julia bed', 23, 120000.00, 'Queen size.\r\nGood for one or two persons.\r\nMade from Ebony wood from Kenya', NULL, 'bed03.jpg', 'bed03.jpg', '23', 12, 13, 1),
(13, 'Andrew bed', 23, 16000.00, 'King size bed.\r\nNot much space is used up thus compliant with small apartments.', NULL, 'bed04.jpg', 'bed04.jpg', '234', 23, 13, 1),
(14, 'Author bed', 23, 30000.00, 'King-size bed\r\nA bed fit for a king such as King Author.Its 4 pillars gives it a sturdy standing. ', NULL, 'bed05.jpg', 'bed05.jpg', '9', 9, 9, 1),
(15, 'Oscar bed', 23, 15000.00, 'King size bed.\r\nBig but sweet. Lovely for girls. Has a brilliant white leather covering.', NULL, 'bed06.jpg', 'bed06.jpg', '34', 43, 10, 1),
(16, 'Mexican dine', 21, 5000.00, '5-piece mahogany wood from Ecuador. Even after a heavy meal...wont break...', NULL, 'dine01.jpg', 'dine01.jpg', '12', 12, 2, 0),
(17, 'Ethiopian dine', 233, 25000.00, '3 piece table and chair set.\r\nGood for that intimate feel during meal times. Recommended for restaurants, hotels, newly weds houses...', NULL, 'dine02.jpg', 'dine02.jpg', '12', 12, 16, 1),
(18, 'Korean dine', 21, 20000.00, '5piece', NULL, 'dine03.jpg', 'dine03.jpg', '45', 45, 15, 1),
(19, 'Columbian dine', 21, 50000.00, '5piece', NULL, 'dine04.jpg', 'dine04.jpg', '12', 12, 12, 1),
(20, 'Kenyan dine', 21, 15000.00, '5piece', NULL, 'dine05.jpg', 'dine05.jpg', '30', 12, 20, 1),
(21, 'Rome dine', 21, 2000.00, '5piece', NULL, 'dine06.jpg', 'dine06.jpg', NULL, NULL, 40, 1),
(22, 'Doggy Seat', 20, 20000.00, 'brown, large, beautiful', NULL, 'live01.jpg', 'live01.jpg', NULL, NULL, 6, 1),
(23, 'Horse Seat', 25, 22000.00, 'Original design was meant for the first prince of Spain as a present from Queen Victoria.', NULL, 'live02.jpg', 'live02.jpg', NULL, NULL, 8, 1),
(24, 'Dolphin seats', 20, 2000.00, 'beautiful ornamented with sea creatures.', NULL, 'live03.jpg', 'live03.jpg', NULL, NULL, 34, 1),
(25, 'Elephant seats', 20, 12000.00, 'seats from the natives', NULL, 'live04.jpg', 'live04.jpg', NULL, NULL, 34, 1),
(26, 'Forg seats', 20, 10000.00, 'beautiful bamboo from the Kenyan coast', NULL, 'live05.jpg', 'live05.jpg', NULL, NULL, 20, 1),
(27, 'Snake seats', 20, 15000.00, 'wonderfully sewn snake skin', NULL, 'live06.jpg', 'live06.jpg', NULL, NULL, 45, 1),
(125, 'Kelly Bed', 23, 29300.00, 'Huge queen size bed with white leather', NULL, 'bed07.jpg', 'bed07.jpg', NULL, NULL, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopcart`
--

CREATE TABLE IF NOT EXISTS `shopcart` (
  `shop_id` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL,
  `shopcart_qty` int(11) NOT NULL default '1',
  `shopcart_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `shopcart_usercookie` varchar(30) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`shop_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=136 ;

--
-- Dumping data for table `shopcart`
--

INSERT INTO `shopcart` (`shop_id`, `productid`, `shopcart_qty`, `shopcart_date`, `shopcart_usercookie`) VALUES
(130, 114, 5, '2009-10-08 17:29:24', 'vivthuo@gmail.com'),
(131, 120, 89, '2009-10-08 17:41:02', 'onkoba.sammy@gmail.com'),
(129, 73, 3, '2009-10-08 17:25:51', 'vivthuo@gmail.com'),
(128, 122, 5, '2009-10-08 17:24:53', 'vivthuo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
  `Title_Id` int(11) NOT NULL,
  `Title` varchar(10) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`Title_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`Title_Id`, `Title`) VALUES
(1, 'Mr.'),
(2, 'Mrs.'),
(3, 'Ms.');
