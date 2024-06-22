-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 04:16 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Saamako', 'Admin', 'admin@samako.com', '$2y$10$tc5kQ8voWvAiZHst1P97ju/pBPCS6RnGJ1jZsY61Ss2Fef6GYF3eK');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `status` enum('In_Use','Not_In_Use') NOT NULL,
  `Date_Added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `status`, `Date_Added`) VALUES
(2, 'Chair', 'In_Use', '2018-09-30'),
(3, 'Sofa', 'In_Use', '2018-09-30'),
(4, 'Table', 'In_Use', '2018-09-30'),
(5, 'Office Desk', 'In_Use', '2018-09-30'),
(6, 'Dinning', 'In_Use', '2018-09-30'),
(7, 'Bedroom', 'In_Use', '2018-09-30'),
(8, 'Occasional', 'In_Use', '2018-09-30'),
(9, 'Home Decor', 'In_Use', '2018-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(1, 19, '5', 1, '16'),
(2, 19, '5', 2, '16'),
(3, 1, '2', 2, '20990'),
(4, 1, '1', 3, '20990'),
(5, 20, '10', 3, '99'),
(6, 18, '1', 4, '12890'),
(7, 21, '1', 4, '75'),
(8, 2, '1', 5, '7590'),
(9, 19, '10', 5, '16'),
(10, 2, '1', 6, '7590'),
(11, 2, '1', 7, '7590'),
(12, 18, '1', 7, '12890'),
(13, 20, '1', 9, '120000'),
(14, 2, '1', 11, '40000'),
(15, 9, '1', 12, '40000'),
(16, 1, '1', 12, '40000'),
(17, 19, '1', 12, '15000'),
(18, 21, '1', 13, '120000'),
(19, 10, '1', 14, '40000');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(1, 2, '80', 'Order Placed', 'cod', '2017-10-28 12:22:36'),
(2, 2, '42060', 'Order Placed', 'cod', '2017-10-28 12:27:16'),
(3, 6, '21980', 'Cancelled', 'cod', '2017-10-28 14:25:23'),
(4, 6, '12965', 'In Progress', 'cod', '2017-10-28 14:28:29'),
(5, 6, '7750', 'In Progress', 'cod', '2017-11-06 19:40:34'),
(6, 7, '7590', 'Order Placed', 'cod', '2018-10-22 10:10:46'),
(7, 7, '20480', 'Order Placed', 'on', '2018-10-22 11:14:04'),
(8, 7, '0', 'Cancelled', 'on', '2018-10-22 11:46:51'),
(9, 7, '120000', 'Dispatched', 'cod', '2018-10-22 12:01:33'),
(10, 7, '0', 'In Progress', 'cod', '2018-10-22 13:10:47'),
(11, 7, '40000', 'Order Placed', 'cod', '2018-10-22 15:17:04'),
(12, 7, '95000', 'Order Placed', 'cod', '2018-10-22 15:41:07'),
(13, 8, '0', 'Order Placed', 'cod', '2018-10-22 16:14:21'),
(14, 8, '40000', 'Order Placed', 'on', '2018-10-22 16:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `ordertracking`
--

CREATE TABLE `ordertracking` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertracking`
--

INSERT INTO `ordertracking` (`id`, `orderid`, `status`, `message`, `timestamp`) VALUES
(3, 3, 'Cancelled', ' I don&#39;t want this item now.', '2017-10-28 17:54:18'),
(5, 4, 'In Progress', ' Order is in Progress', '2017-10-30 13:31:08'),
(6, 5, 'In Progress', ' Order is in Progress', '2017-11-06 19:45:11'),
(7, 8, 'Cancelled', ' ', '2018-10-22 12:22:14'),
(8, 10, 'In Progress', ' the product has been delivered', '2018-10-22 13:49:50'),
(9, 9, 'Dispatched', ' delivery in 5 days', '2018-10-22 13:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 0, 'Classic Sofa 1', 40000, '<p>asdadfgfhjgjhj</p>', '37.jpg', 'sofa, clasic, 2 seater'),
(2, 1, 'King Size', 40000, '<p>king size bed 6X6 in size</p>', '30.jpg', 'kingsize, bed'),
(3, 2, 'High Back chair', 15000, 'comfort for your office', '31.jpg', 'office seat, high back, leather seat'),
(4, 4, 'Round Table', 40000, '<p>dinning round table for a family of 8</p>', '6.jpg', 'dinning, round table'),
(5, 7, 'Bedroom set', 120000, '<p>complete bedroom set, kingsize bed, chest, shoe rack</p>', '18.jpg', 'bed, king size,chest'),
(6, 2, 'Arm Chair', 15000, '<p>arm chair brown in color single seater</p>', '17.jpg', 'arm chair, single seater'),
(7, 3, 'L Shape Sofa', 40000, '<p>Leather white L-Shape, sofa</p>', '15.jpg', 'Leather, L-shape, Sofa'),
(8, 1, 'Bed 2', 45000, '<p>bed 2</p>', '28.jpg', 'bed'),
(9, 1, 'product 19', 40000, '<p>product 19</p>', '19.jpg', 'product 19'),
(10, 3, 'product 2', 40000, '<p>product 2</p>', '2.jpg', 'sofa, clasic, 2 seater'),
(12, 5, 'Product 7', 45000, '<p>Office desk</p>', '7.jpg', 'office, desk'),
(13, 4, 'table 1', 15000, '<p>table table table</p>', '9.jpg', 'table, round'),
(14, 3, 'Product 38', 120000, '<p>sofa white, royal</p>', '38.jpg', 'sofa, royal'),
(15, 3, 'Product 39', 40000, '<p>lazy chair, maharaja</p>', '39.jpg', 'maharaja, lazy chair'),
(16, 2, 'Product 36', 15000, '<p>out door, school seats</p>', '36.jpg', 'Out door, chair, school'),
(17, 2, 'Product 35', 15000, '<p>chair</p>', '35.jpg', 'arm chair, single seater'),
(18, 3, 'Classic Sofa', 120000, '<p>recliner</p>', '4.jpg', 'sofa, clasic, 2 seater'),
(19, 2, 'Product 34', 15000, '<p>short back office chair, color block</p>', '34.jpg', 'office chair, chair'),
(20, 3, 'Classic Sofa', 120000, '<p>jghgjhg</p>', '2.jpg', 'sofa, clasic, 2 seater'),
(21, 3, 'Classic Sofa', 120000, 'sofa sofa', '4.jpg', 'sofa, clasic, 2 seater'),
(22, 3, 'Classic Sofa', 120000, 'sofa sofa', '4.jpg', 'sofa, clasic, 2 seater'),
(23, 1, 'King Size', 40000, 'bed', '21.jpg', 'bed, king size');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `timestamp`) VALUES
(1, 'vivek@codingcyber.com', '26e0eca228b42a520565415246513c0d', '2017-10-27 12:05:10'),
(2, 'vivek1@codingcyber.com', '$2y$10$cMzHNUFGKma96MywHmVMbekuJZb1tSNLsevHzLnSRbcRicQVhEC6a', '2017-10-27 12:24:25'),
(6, 'vivek2@codingcyber.com', '$2y$10$apI7l.1wAS5pgbG4YfMrN.jNd5T3XmhecFuSV2M6UNdoUHImPXNxm', '2017-10-27 12:28:20'),
(7, 'starixc@gmail.com', '$2y$10$tc5kQ8voWvAiZHst1P97ju/pBPCS6RnGJ1jZsY61Ss2Fef6GYF3eK', '2018-10-22 10:10:16'),
(8, 'evans@gmail.com', '$2y$10$5jmP7aNcQ8Z0fpEcb7aJOehnVhurFKWxYZ77.B2LqylEbcSmAmKmK', '2018-10-22 16:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `usersmeta`
--

CREATE TABLE `usersmeta` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersmeta`
--

INSERT INTO `usersmeta` (`id`, `uid`, `firstname`, `lastname`, `company`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `mobile`) VALUES
(1, 2, 'Vivek', 'V', 'Coding Cyber', 'Hyd', 'Hyd', 'Hyderabad', 'Telangana', '', '500060', ''),
(2, 6, 'Vivek', 'Vengala', 'Coding Cyber', '#201', 'DSNR', 'Hyderabad', 'Telangana', '', '500060', '9876543211'),
(3, 7, 'chris', 'erricks', 'starixc', '124 nakuru', 'highway towers ', 'nakuru', 'nakuru', 'SOM', '20100', '0712748950'),
(4, 8, 'Evans ', 'Kamau', 'Mwanzo', 'oginga odinga nakuru', 'gido plaza', 'nakuru', 'nakuru', 'SOM', '20100', '0725698574');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `uid`, `timestamp`) VALUES
(1, 1, 6, '2017-10-30 16:36:45'),
(2, 2, 6, '2017-10-30 16:38:07'),
(3, 21, 6, '2017-11-06 19:42:35'),
(5, 8, 7, '2018-10-22 15:56:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertracking`
--
ALTER TABLE `ordertracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usersmeta`
--
ALTER TABLE `usersmeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordertracking`
--
ALTER TABLE `ordertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usersmeta`
--
ALTER TABLE `usersmeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
