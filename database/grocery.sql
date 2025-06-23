-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 10:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`) VALUES
(1, 'rakesh', 'rakesh@gmail.com', '@Rakesh8898'),
(2, 'rakesh', 'suvasiyarakesh72@gmail.com', '@8928515749');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `name`, `parent_id`) VALUES
(1, 'grocery', 0),
(2, 'Personal Care', 0),
(4, 'Vegetable', 1),
(5, 'masala and spice', 1),
(7, 'pluses', 1),
(8, 'Cereal', 1),
(10, 'Cold Pressed & Virgin Oils', 0),
(11, 'Refined Oils', 0),
(13, 'Decorations', 3),
(14, 'Groundnut Oil', 10),
(17, 'Coconut Oil', 10),
(18, 'Mustard Oil', 10),
(20, 'Til Oil', 10),
(21, 'Refined Groundnut Oil', 11),
(22, 'Refined Sesame Oil', 11);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `msg` text DEFAULT NULL,
  `uid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `name`, `mobile`, `msg`, `uid`) VALUES
(1, 'Rakesh Suvasiya ', '8928515749', 'Nice Service', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ord`
--

CREATE TABLE `ord` (
  `oid` int(10) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ord`
--

INSERT INTO `ord` (`oid`, `uid`, `total`, `date`) VALUES
(1, 1, 265, '2025-04-11 11:43:53'),
(2, 3, 265, '2025-04-11 16:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `oid`, `pid`, `quantity`, `amount`, `subtotal`) VALUES
(65, 1, 48, 1, 265, 265),
(66, 2, 48, 1, 265, 265);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(10) NOT NULL,
  `oid` int(10) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `payment_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `oid`, `uid`, `total_amount`, `payment_type`) VALUES
(62, 1, 1, 265, 'COD'),
(63, 2, 3, 265, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `cid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `price`, `discount`, `weight`, `pic`, `cid`) VALUES
(12, 'Mungdal', 50, 55, '(500 gm)', 'images/mu.jpg', 7),
(13, 'Tuver dal', 100, 10, '(1kg)', 'images/tuver.jpg', 7),
(14, 'Mag Mogar dal', 50, 60, '(500 gm)', 'images/mungf.jpg', 7),
(15, 'Urad dal', 100, 12, '(1 kg)', 'images/urad.jpg', 7),
(16, 'Masur dal', 60, 65, '(1 kg)', 'images/masur.jpg', 7),
(17, 'Chana dal', 40, 50, '(500 gm)', 'images/chanadal.jpg', 7),
(18, 'Chana', 50, 55, '(1 kg)', 'images/chana.jpg', 8),
(19, 'Mug', 40, 50, '(1 kg)', 'images/mung.jpg', 8),
(20, 'Urad', 100, 10, '(1 kg)', 'images/ur.jpg', 8),
(21, 'clinic plush', 50, 54, '700 ml', 'images/1602260557-clinic.jpg', 2),
(22, 'chik', 50, 54, '700 ml', 'images/1602266961-chick.jpg', 2),
(23, 'Dettol', 40, 0, '4 pc', 'images/1602267040-d3.jpg', 2),
(24, 'Dettol Handwash', 30, 40, '250ml', 'images/1602267137-dh.jpg', 2),
(25, 'lifebuoy', 50, 50, '4 pc', 'images/1602267355-life.jpg', 2),
(30, 'Pure Mustard Oil', 240, 0, '1 litre ', 'images/1741162834-mustard.jpg', 10),
(36, 'Refined Sesame Oil', 300, 0, '1 litre ', 'images/1741854609-sesame-removebg-preview.png', 22),
(37, 'Groundnut Oil', 255, 0, '1 litre ', 'images/1741854645-groundnut_oil-removebg-preview.png', 14),
(38, 'Groundnut Oil', 140, 0, '500 ml', 'images/1741854707-groundnut_oil-removebg-preview.png', 14),
(39, 'Coconut Oil', 285, 0, '1 litre ', 'images/1741854753-coco-removebg-preview.png', 17),
(40, 'Coconut Oil', 150, 0, '500 ml', 'images/1741854777-coco-removebg-preview.png', 17),
(41, 'Coconut Oil', 60, 0, '200 ml', 'images/1741854801-coco-removebg-preview.png', 17),
(42, 'Mustard Oil', 240, 0, '1 litre ', 'images/1741854888-mustard-removebg-preview.png', 18),
(43, 'Mustard Oil', 130, 0, '500 ml', 'images/1741854918-mustard-removebg-preview.png', 18),
(44, 'Mustard Oil', 60, 0, '200 ml', 'images/1741854940-mustard-removebg-preview.png', 18),
(45, 'Til Oil', 295, 0, '1 litre ', 'images/1741854985-sesame-removebg-preview.png', 20),
(46, 'Til Oil', 150, 0, '500 ml', 'images/1741855007-sesame-removebg-preview.png', 20),
(47, 'Til Oil', 65, 0, '200 ml', 'images/1741855031-sesame-removebg-preview.png', 20),
(48, 'Refined Groundnut Oil', 265, 0, '1 litre ', 'images/1741855180-groundnut_oil-removebg-preview.png', 21),
(49, 'Refined Groundnut Oil', 140, 0, '500 ml', 'images/1741855198-groundnut_oil-removebg-preview.png', 21),
(50, 'Refined Groundnut Oil', 80, 0, '200 ml', 'images/1741855215-groundnut_oil-removebg-preview.png', 21),
(51, 'Refined Sesame Oil', 145, 0, '500 ml', 'images/1741855253-sesame-removebg-preview.png', 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `mobile`, `address1`, `gender`, `username`, `password`) VALUES
(1, 'Rakesh suvasiya ', 8928515749, 'Thakkar Bappa Colony Rd', 'male', 'Rakesh46', 'Rakesh@889'),
(2, 'Sumeet', 6969857423, 'Thakkar Bappa Colony CST Road', 'male', 'Sumeet27', '@Sumeet27'),
(3, 'Tisha', 4532369852, 'Thakkar Bappa Colony CST Road', 'female', 'Tishaa', 'Tisha@1235'),
(4, 'Rahul', 8928515749, 'Thakkar Bappa Colony CST Road', 'male', 'Rahul35', 'Rakesh@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `feedback_ibfk_1` (`uid`);

--
-- Indexes for table `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `user_id` (`uid`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`oid`),
  ADD KEY `product_id` (`pid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ord`
--
ALTER TABLE `ord`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ord`
--
ALTER TABLE `ord`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`oid`) REFERENCES `ord` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `ord` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
