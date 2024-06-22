-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 06:10 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sugars`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(11) NOT NULL,
  `categoryname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryname`) VALUES
(12, 'homes'),
(13, 'offices'),
(14, 'clinic'),
(15, 'hospital'),
(16, 'beachs'),
(17, 'vehicle'),
(18, 'bedrooms'),
(19, 'sala'),
(20, 'living room'),
(21, 'kitchens'),
(22, 'dining room'),
(23, 'dining room'),
(24, 'dining room'),
(25, 'school'),
(26, 'school'),
(27, 'school'),
(28, 'school'),
(29, 'school'),
(30, '22');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`Cust_id` int(11) NOT NULL,
  `Cust_number` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Region` int(11) NOT NULL,
  `Contact_no` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Cust_id`, `Cust_number`, `f_name`, `l_name`, `Address`, `City`, `Region`, `Contact_no`) VALUES
(3, 3, 'Binay', 'bay', 'sitio kalam', 'makati', 53, 9040864),
(4, 4, 'Alakdan', 'jong', 'Mt.caragao', 'Bagio', 72, 8304864),
(5, 5, 'Hulyo', 'june', 'Mactan', 'Cebu', 9, 94637562),
(6, 6, 'wala', 'meron', 'CEBU', 'maktan', 67, 987765455),
(7, 7, 'Dawmensoy', 'asy', 'Talisay', 'Talisay', 11, 9524521),
(8, 8, 'Ramon3', 'bong', 'Palwan', 'Palwan', 30, 975476322),
(12, 9, 'lima', 'anum', 'anum', 'pito', 8, 9),
(13, 10, 'kitkat', 'lee', 'England', 'alaska', 1010, 2147483647),
(14, 11, 'tae', 'yuck', 'igit', 'tubol', 90, 12121),
(15, 12, 'dsadsa', 'kong', 'England', 'alaska', 1010, 2147483647),
(16, 13, 'kitkat', 'lee', 'England', 'alaska', 1010, 2147483647),
(17, 14, 'kitkat', 'lee', 'England', 'Cityo lngS', 89, 2147483647),
(18, 15, 'kitkat', 'lee', 'England', 'alaska', 10114, 4324242),
(19, 16, 'ako', 'siya', 'balay', 'metro manila', 445, 98363113),
(20, 17, '3erd', 'Rebollusa', 'saraet', 'maylan', 9, 93656735),
(26, 21, 'cris', 'han', 'saraet', 'maylan', 6, 2147483647),
(27, 22, 'angel', 'jude', 'mambato', 'himamaylan', 6, 9809098),
(28, 23, 'niko', 'curaz', 'maylan', 'maylan', 6, 963232444),
(29, 24, 'Jezah', 'lima', 'Brgy.Cabadiangan ', 'Sipalay ', 6, 966420524),
(30, 0, 'Arnulfo', 'Rebolloa', 'saraet', 'Himamaylan', 6108, 987987987),
(31, 13, 'manang', 'nardo', 'saraet', 'maylan', 6108, 9654534),
(32, 13, 'manang', 'nardo', 'Himamaylan City', 'maylan', 133, 2147483647),
(33, 0, 'cris', 'van', 'bacolod', 'bacolod', 1010, 953623233),
(34, 0, 'mayuga', 'stretching', 'candoni', 'candoni', 10, 93535454),
(35, 0, 'maribel', 'stretching', 'candoni', 'candoni', 10, 93535454),
(36, 0, 'kwan', 'kwan', 'manila', 'metro', 122, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`not_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `customer_id`, `username`, `status`) VALUES
(1, 16, 'joks', 'added'),
(2, 16, 'joks', 'added'),
(3, 6, 'admerc', 'added');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`order_id` int(11) NOT NULL,
  `order_code` int(20) NOT NULL,
  `order_date` varchar(200) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `total_price` int(20) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_code`, `order_date`, `customer_id`, `total_price`, `status`) VALUES
(6, 1553648461, '2019-03-27', 6, 5100, 'Cancelled'),
(7, 1553650390, '2019-03-27', 6, 600, 'Pending'),
(8, 1553650435, '2019-03-27', 6, 750, 'Pending'),
(9, 1553924590, '2019-03-30', 16, 150, 'Pending'),
(10, 1553940932, '2019-03-30', 16, 2400, 'Pending'),
(11, 1554053540, '2019-04-01', 16, 4400, 'Confirmed'),
(12, 1554062502, '2019-04-01', 16, 1250, 'Confirmed'),
(13, 1554197321, '2019-04-02', 6, 300, 'Confirmed'),
(14, 1554199674, '2019-04-02', 6, 450, 'Confirmed'),
(15, 1554202152, '2019-04-02', 16, 1250, 'Confirmed'),
(16, 1554202458, '2019-04-02', 19, 700, 'Pending'),
(17, 1554202592, '2019-04-02', 19, 150, 'Confirmed'),
(18, 1554206844, '2019-04-02', 20, 300, 'Confirmed'),
(19, 1554228729, '2019-04-03', 21, 3800, 'Confirmed'),
(20, 1554257816, '2019-04-03', 16, -500, 'Pending'),
(21, 1554257886, '2019-04-03', 16, 400, 'Pending'),
(22, 1554263020, '2019-04-03', 6, 8750, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
`Orders_id` int(11) NOT NULL,
  `order_code` int(20) NOT NULL,
  `order_date` varchar(200) NOT NULL,
  `Product_code` int(11) NOT NULL,
  `UnitPrice` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`Orders_id`, `order_code`, `order_date`, `Product_code`, `UnitPrice`, `Quantity`, `total`, `customer_id`) VALUES
(20, 1553648461, '2019-03-27', 1002, 150, 10, 1500, 6),
(21, 1553648461, '2019-03-27', 1003, 300, 12, 3600, 6),
(22, 1553650390, '2019-03-27', 1005, 120, 5, 600, 6),
(23, 1553650435, '2019-03-27', 1002, 150, 5, 750, 6),
(24, 1553924590, '2019-03-30', 1006, 150, 1, 150, 16),
(25, 1553940932, '2019-03-30', 1005, 120, 20, 2400, 16),
(26, 1554053540, '2019-04-01', 1005, 120, 20, 2400, 16),
(27, 1554053540, '2019-04-01', 1004, 400, 5, 2000, 16),
(28, 1554062502, '2019-04-01', 1001, 250, 5, 1250, 16),
(29, 1554197321, '2019-04-02', 1002, 150, 2, 300, 6),
(30, 1554199674, '2019-04-02', 1002, 150, 3, 450, 6),
(31, 1554202152, '2019-04-02', 1001, 250, 5, 1250, 16),
(32, 1554202458, '2019-04-02', 1001, 250, 1, 250, 19),
(33, 1554202458, '2019-04-02', 1002, 150, 1, 150, 19),
(34, 1554202458, '2019-04-02', 1003, 300, 1, 300, 19),
(35, 1554202592, '2019-04-02', 1002, 150, 1, 150, 19),
(36, 1554206844, '2019-04-02', 1003, 300, 1, 300, 20),
(37, 1554228729, '2019-04-03', 1004, 400, 5, 2000, 21),
(38, 1554228729, '2019-04-03', 1003, 300, 6, 1800, 21),
(39, 1554257816, '2019-04-03', 1001, 250, -2, -500, 16),
(40, 1554257886, '2019-04-03', 1001, 250, 1, 250, 16),
(41, 1554257886, '2019-04-03', 1002, 150, 1, 150, 16),
(42, 1554263020, '2019-04-03', 1001, 250, 35, 8750, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE IF NOT EXISTS `products_table` (
`Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(50) DEFAULT NULL,
  `Supplier_Id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Onhand` int(11) NOT NULL,
  `Original_price` int(11) NOT NULL,
  `markup` int(30) NOT NULL,
  `Selling_price` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `ProductCode` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=953 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`Product_Id`, `Product_Name`, `Supplier_Id`, `category_id`, `Quantity`, `Onhand`, `Original_price`, `markup`, `Selling_price`, `date`, `ProductCode`) VALUES
(947, 'Cabinet', 1, 12, 50, 5, 200, 50, 250, '2019-03-16', '1001'),
(948, 'Wooden Chair', 2, 12, 70, 47, 100, 50, 150, '2019-03-16', '1002'),
(949, 'Steel Chair', 3, 13, 80, 60, 250, 50, 300, '2019-03-16', '1003'),
(950, 'Sofa', 4, 12, 100, 90, 300, 100, 400, '2019-03-16', '1004'),
(951, 'Wooden Table', 7, 12, 60, 15, 80, 40, 120, '2019-03-16', '1005'),
(952, 'Glass Table', 8, 13, 76, 75, 100, 50, 150, '2019-03-16', '1006');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE IF NOT EXISTS `shippers` (
`Shipper_id` int(11) NOT NULL,
  `Company_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`Shipper_id`, `Company_Name`) VALUES
(1, 'JRSs'),
(2, 'mercrui'),
(3, 'La union Comp.'),
(4, 'LBC'),
(5, 'BCD.TRANSPORT'),
(6, 'dhgc'),
(7, 'TAE'),
(8, 'mandaue foam coms.'),
(9, 'Cookz 2go'),
(10, 'mandaue foam com.');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`Supplier_id` int(11) NOT NULL,
  `supname` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_id`, `supname`, `Address`, `City`, `Province`) VALUES
(1, 'Ramboos', 'Brgy.Santols', 'Cityo lng', 'Neg.Occ.'),
(2, 'Cabrera', 'kabankalan', 'kabankalans', 'Neg.Occ.'),
(3, 'Hidalgo', 'Brgy.suay', 'himamaylan', 'Neg.Occ.'),
(4, 'Hipolito', 'canmoros', 'binalbagan', 'Neg.Occ.'),
(5, 'Sildura comp.', 'Cagayan de Oro', 'Cagayan city', 'Cagayan'),
(6, 'Lumber X comp.', 'Bulacan', 'Meykawayan', 'Bulacan'),
(7, 'Coco Lumberyard', 'Bago', 'Daan', 'Neg.Occ.'),
(8, 'TGT Com.', 'Quezon ', 'Quezon', 'Quezon'),
(9, 'Gayacao M.', 'Marawi', 'Marawi', 'Mindanao'),
(10, 'nig.com', 'philippines', 'bacolod', 'negros'),
(11, 'THIRDs', 'Himamaylan City', 'Cityo lngS', 'negros');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE IF NOT EXISTS `tblaccounts` (
`acct_id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`acct_id`, `f_name`, `l_name`, `address`, `contact`, `email`, `position`, `username`, `password`) VALUES
(1, 'as', 'asy', '', 9887675, 'as@gmail.com', 'Admin', 'as', '$2y$10$j92FHIexqvQ/dkvytcYiE.vd3QYaFto2.C4PRaoMJMLoPJuiQwWUK'),
(2, 'aso', 'aso', '', 9887677, 'aso@yayoo.com', 'Admin', 'aso', '$2y$10$LKgam.J1yJxEBmdL7DBOeu00YGeSkXMd/6bXg/phlZ.NDEBQAv0R6'),
(3, 'jude', 'suarez', '', 9887678, 'jude@yahoo.com', 'Admin', 'juder', '$2y$10$Uz1EvySAPkNvzZrBS23Zl.9BHfCOtXYnh0pbjzDsA7SNsEAThZtGO'),
(4, 'we', 'we', '', 9887679, 'we@yahoo.com', 'Admin', 'we', '$2y$10$d2nNfQ6r4kx9HtvkhRSab.WdEhyNnAO/yhU8RSwXILMxlew1WgmNG'),
(5, 'Niko', 'Curaza', 'Palawan', 90897, 'nikocuraza@yahoo.com', 'Customer', 'niko', '$2y$10$k1Ung7huFWn4XUT10pxfI.GfM21eKOvwOymokweKzkodJ5p1.h7G2'),
(6, 'Adrian', 'Mercurio', 'Brgy. Suay', 9887676, 'mercurio@yahoo.com', 'Customer', 'admerc', '$2y$10$MouGG9iyJeOk/Iv9PESCcONGufXwz6jelmzTM85vLB/5QtIABEnBS'),
(7, 'angel', 'jude', '', 0, 'suarez@yahoo.com', 'Customer', 'suarez', '$2y$10$mGuA5RyA1OpFH8rYs7XJj.yqo.Zc0B8dZDg13Bg5NoZSZbYOyedza'),
(8, 'niko', 'curaz', '', 0, 'nikocuraza@yahoo.com', 'Customer', 'nik', '$2y$10$wa8xnYZ4GocHbkvHcda/JOGA9yxgB0nHUzy7B1jqy6IhetHZpyWYa'),
(9, 'Jezah', 'lima', '', 0, 'limajezah@gmail.com', 'Customer', 'cute', '$2y$10$H9ECNlaxGXQ1bXm7UEk6qOzVTjZesFA985HxdFVof8aBaox/iX.am'),
(10, 'Arnulfo', 'Rebolloa', '', 0, 'arns@yahoo.com', 'Customer', 'third', '$2y$10$wMcFVEgN41cRYvFDHYsjAec.IOMdpr7Wo1aAgqqJwgVVW1weHm9GG'),
(11, 'cris', 'van', '', 0, 'cris@yahoo.com', 'Customer', 'cris', '$2y$10$PFVgpKrt7K83fjAzc7TBCOc0fh7rnIluSuqgHp2jLw/ATE8KJ1MKy'),
(12, 'mayuga', 'stretching', '', 0, 'maribel@yahoo.com', 'Customer', 'bella', '$2y$10$mfzN9fxKKa6hJ3LRiHhmcew0AmM/SfdtHjJMYaeyNroNwMCsTxhVq'),
(13, 'maribel', 'stretching', '', 0, 'bella@yahoo.com', 'Customer', 'maribel', '$2y$10$5yztmZ6jergO44HeC1s.EuKymJUR5bP6AEOGaBJA/5a2aFFGJyoPW'),
(14, 'kwan', 'kwan', '', 0, 'nagpakwan@yahoo.com', 'Customer', 'pakswan', '$2y$10$sIRLHb/V2iLDzDzDh.DLJ.m4gBgd/v8EtPmkPQWyb9oejoqEZcBqy'),
(15, 'Nico', 'Raluto', 'Brgy.Cabadiangan ', 8987987, 'nico@yahoo.com', 'Customer', 'adam', '$2y$10$/TgTHnYiIwGaZ1Pa5XI.Fe2Jls2S0KjaY6/K9rgiCMzDFp6m0aveq'),
(16, 'joken', 'villaneva', 'suay', 911111111, 'jokenvillanuevagmail@yahho.com', 'Customer', 'joks', '$2y$10$D1QarcAzfpj.31QQzAdHAuqFqkvY5cRT0voc9zwR4SNhvsgH1j7cK'),
(17, 'g', 'g', 'g', 2147483647, 'goodgmail@hahoo.com', 'Customer', 'good', '$2y$10$G5SHH3bGVrmsOPtbD9BR0O5FGXrNhK/RBl9orheXu6AWeszPPCXea'),
(18, 'jhggHJH', 'JHGJH', 'bacolod', 9089089, 'merccc@yahoo.com', 'Customer', 'mercz', '$2y$10$94VImmnnVYMg14NRICCi0utm3uIWv3UblsYfFx/Vkjbz/iUF8HYSa'),
(19, 'Gwapo', 'Ko', 'Gwapo2x', 45465, 'gwapo@yahoo.com', 'Customer', 'gwapo', '$2y$10$TQ6es50bbvbd9Qzn3tm6VOjmNYMYqxLJRpIgTw.IVfoo6H2F8YCom'),
(20, 'sua', 'suarez', 'suay', 9764434, 'suar@yahoo.com', 'Customer', 'jude', '$2y$10$FI7seodE7jg/esCzwYhMeegBgEuWnoxHtzp5ksvXKpaW5EIPQv0dS'),
(21, 'romela', 'linas', 'nabalian', 934265171, 'romela@yahoo.com', 'Customer', 'mela', '$2y$10$RWh0iR/0EKhzn2xRmpJo6uOX4/rRreCYDNHmT/7y7qRFu0E0oBfOK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`Cust_id`), ADD KEY `Cust_number` (`Cust_number`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
 ADD PRIMARY KEY (`Orders_id`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
 ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
 ADD PRIMARY KEY (`Shipper_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`Supplier_id`);

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
 ADD PRIMARY KEY (`acct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `Cust_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
MODIFY `Orders_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=953;
--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
MODIFY `Shipper_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `Supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
