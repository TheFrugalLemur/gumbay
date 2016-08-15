-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 12:41 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `itemTitle` varchar(255) DEFAULT NULL,
  `itemDescription` text,
  `price` int(11) DEFAULT NULL,
  `shippingPrice` int(11) DEFAULT NULL,
  `memberID` int(11) NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemTitle`, `itemDescription`, `price`, `shippingPrice`, `memberID`, `active`) VALUES
(3, 'my pantaloons', 'Hi, up for sale is...', 1, 1, 21, 'no'),
(4, 'my pantaloons', 'Hi, up for sale is...', 1, 1, 21, 'no'),
(5, 'my "', 'Hi, up for sale is...', 1, 1, 21, 'no'),
(6, '&lt; my', 'Hi, up for sale is...', 1, 1, 21, 'no'),
(7, '&lt; &#039; my', 'Hi, up for sale is...', 1, 1, 21, 'no'),
(8, '&lt; my &quot; &quot;&#039;&#039;', 'Hi, up for sale is...', 1, 1, 21, 'no'),
(9, 'my pantaloons', 'Hi, up for sale are my pants', 50, 40, 22, 'no'),
(10, 'my shirt', 'im selling my beloved shirt :(', 5, 0, 21, 'no'),
(11, '1', '1', 1, 1, 21, 'no'),
(12, 'my hat', 'Hi, up for sale is a beautiful hat', 55, 2, 21, 'no'),
(13, 'my hat', 'Hi, up for sale is cool hat', 3, 4, 21, 'no'),
(14, 'my shoes', 'shoes', 5, 5, 21, 'no'),
(15, 'lol', 'lol Hi, up for sale is...', 1, 1, 21, 'no'),
(16, 'lol', 'lol Hi, up for sale is...', 1, 1, 21, 'no'),
(17, 'lol', 'lol Hi, up for sale is...', 1, 1, 21, 'no'),
(18, 'lol', 'lol Hi, up for sale is...', 1, 1, 21, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(21, 'admin', '$2y$10$zZBhTvAivZaHgWcYTLrNjufgU2BRy/sPgLeXZidu5Wv.Ieo2NNpQK', 'admin@admin.com', 'Yes', NULL, 'No'),
(22, 'LathanSchultz', '$2y$10$hQjZUe/fRgTfbsE2g8fU/eHSIamk6ZUVQjWxgubXLtEmafmVzlHB.', 'lathan@me.com', 'Yes', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `fullname` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'male',
  `memberID` int(11) NOT NULL DEFAULT '0',
  `joindate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `balance` int(255) NOT NULL DEFAULT '0',
  `request` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`fullname`, `dateofbirth`, `gender`, `memberID`, `joindate`, `address`, `city`, `postcode`, `phone`, `balance`, `request`) VALUES
('Admin', '2015-07-09', 'male', 21, '2016-08-12', '24 Bothwell ST', 'Newtown', '4350', '0477776794', 0, 0),
('Jimmy Boy', NULL, 'female', 22, '2016-08-13', NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `itemID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `transactionID` int(11) NOT NULL,
  `transactionTime` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`itemID`, `memberID`, `transactionID`, `transactionTime`) VALUES
(3, 21, 1, '2016-08-14'),
(4, 21, 2, '2016-08-14'),
(5, 21, 3, '2016-08-14'),
(6, 21, 4, '2016-08-14'),
(6, 21, 5, '2016-08-14'),
(6, 21, 6, '2016-08-14'),
(6, 21, 7, '2016-08-14'),
(7, 21, 8, '2016-08-14'),
(7, 21, 9, '2016-08-14'),
(8, 21, 10, '2016-08-14'),
(8, 21, 11, '2016-08-14'),
(8, 21, 12, '2016-08-14'),
(8, 21, 13, '2016-08-14'),
(8, 21, 14, '2016-08-14'),
(8, 21, 15, '2016-08-14'),
(9, 21, 16, '2016-08-14'),
(9, 21, 17, '2016-08-14'),
(9, 21, 18, '2016-08-14'),
(9, 21, 19, '2016-08-14'),
(10, 21, 20, '2016-08-14'),
(10, 21, 21, '2016-08-14'),
(11, 21, 22, '2016-08-14'),
(11, 21, 23, '2016-08-14'),
(12, 21, 24, '2016-08-14'),
(13, 21, 25, '2016-08-15'),
(14, 21, 26, '2016-08-15'),
(15, 21, 27, '2016-08-15'),
(16, 21, 28, '2016-08-15'),
(17, 21, 29, '2016-08-15'),
(18, 21, 30, '2016-08-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`memberID`),
  ADD UNIQUE KEY `memberID` (`memberID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
