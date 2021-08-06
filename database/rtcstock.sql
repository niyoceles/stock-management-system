-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 08:23 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rtcstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`account_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_price` double NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `account_grams` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_name`, `account_price`, `account_type_id`, `account_grams`) VALUES
(1, 'sipons', 3.5, 1, '500ml'),
(2, 'haha', 5.6, 2, '1232213'),
(3, '111', 7.5, 1, '11'),
(4, 'Lala', 15, 2, '1232213'),
(5, 'Uuuz', 900, 1, 'Good'),
(6, 'Uuuzx', 500, 1, 'Veri');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `someone` varchar(50) NOT NULL,
  `cart_stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_uniqid` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item_id`, `cart_qty`, `department`, `someone`, `cart_stock_id`, `user_id`, `cart_uniqid`) VALUES
(16, 8, 4, 'ggggggg', 'uu', 4, 1, '5bd13124c5ee3'),
(17, 8, 8, '3', '4', 4, 1, '5bd14bd8cbab8');

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE IF NOT EXISTS `expired` (
`exp_id` int(11) NOT NULL,
  `exp_itemName` varchar(50) NOT NULL,
  `exp_itemPrice` float NOT NULL,
  `exp_itemQty` int(11) NOT NULL,
  `exp_expiredDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expired`
--

INSERT INTO `expired` (`exp_id`, `exp_itemName`, `exp_itemPrice`, `exp_itemQty`, `exp_expiredDate`) VALUES
(1, 'Computer', 2000000, 11, '2018-10-23'),
(2, 'Uuu', 88, 48, '2018-10-27'),
(3, 'Ff', 100, 70, '2024-05-13'),
(4, 'Ff', 100, 66, '2025-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `depart` varchar(10) NOT NULL,
  `item_price` double NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `item_description` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `code`, `item_name`, `depart`, `item_price`, `item_type_id`, `item_description`) VALUES
(1, '111', 'Computer', 'tourism', 2000000, 1, 'description'),
(8, '', 'Laptop', '', 180000, 1, ''),
(9, '', 'Ff', '', 100, 2, ''),
(10, '8878', 'Uuu', 'Tourism', 88, 2, ''),
(11, '89', 'Zzz', 'Tourism', 5000, 3, ''),
(12, '33', 'Uuucczz', 'desss', 8, 2, 'description2');

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
`item_type_id` int(11) NOT NULL,
  `item_type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_type_desc`) VALUES
(1, 'Pieces'),
(2, 'Cartons'),
(3, 'Parks');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`sales_id` int(11) NOT NULL,
  `generic_name` varchar(35) NOT NULL,
  `gram` varchar(35) NOT NULL,
  `type` varchar(35) NOT NULL,
  `qty` int(11) NOT NULL,
  `someone` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `date_sold` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `generic_name`, `gram`, `type`, `qty`, `someone`, `department`, `price`, `date_sold`) VALUES
(1, 'product', 'ddd', 'pieces', 12, 'jean', 'lab', '200', '2018-10-24 11:17:33'),
(2, 'Ff', '', 'Cartons', 7, 'jean', '', '100', '2018-10-24 11:25:02'),
(3, 'Ff', '', 'Cartons', 4, 'ff', '', '100', '2018-10-25 02:35:08'),
(4, 'Ff', '', 'Cartons', 3, 'Celestin', '', '100', '2018-10-25 02:37:09'),
(5, 'Ff', '', 'Cartons', 4, 'je', '', '100', '2018-10-25 02:39:23'),
(6, 'Laptop', '', 'Pieces', 2, 'Celestin', '', '180000', '2018-10-25 02:47:26'),
(7, 'Laptop', '', 'Pieces', 2, 'jean aime', '', '180000', '2018-10-25 02:49:37'),
(8, 'Laptop', '', 'Pieces', 4, 'jean aime', '', '180000', '2018-10-25 02:49:37'),
(9, 'Laptop', '', 'Pieces', 2, 'souple', '', '180000', '2018-10-25 02:56:05'),
(10, 'Laptop', '', 'Pieces', 2, 'jea', '', '180000', '2018-10-25 02:56:05'),
(11, 'Laptop', '', 'Pieces', 6, 'uu', '', '180000', '2018-10-25 02:58:27'),
(12, 'Laptop', '', 'Pieces', 2, 'uu', '', '180000', '2018-10-25 02:58:28'),
(13, 'Laptop', '', 'Pieces', 3, 'uu', '', '180000', '2018-10-25 03:05:27'),
(14, 'Laptop', '', 'Pieces', 3, 'uu', '', '180000', '2018-10-25 03:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_expiry` date NOT NULL,
  `stock_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stock_manufactured` date NOT NULL,
  `stock_purchased` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_id`, `stock_qty`, `stock_expiry`, `stock_added`, `stock_manufactured`, `stock_purchased`) VALUES
(4, 8, 62, '2032-05-10', '2019-01-12 20:38:51', '2018-10-24', '2018-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_pass` varchar(35) NOT NULL,
  `user_type` int(11) NOT NULL,
  `names` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_pass`, `user_type`, `names`, `phone`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', ''),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 1, '', ''),
(3, 'user', 'password', 2, 'Aline', '4444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`account_id`), ADD KEY `account_type_id` (`account_type_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cart_id`), ADD KEY `item_id` (`item_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
 ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`), ADD KEY `item_type_id` (`item_type_id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
 ADD PRIMARY KEY (`item_type_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`stock_id`), ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `expired`
--
ALTER TABLE `expired`
MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`item_type_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
