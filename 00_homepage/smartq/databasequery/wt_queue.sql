-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 01, 2019 at 11:54 AM
-- Server version: 8.0.17
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ti36`
--

-- --------------------------------------------------------

--
-- Table structure for table `wt_queue`
--

CREATE TABLE IF NOT EXISTS `wt_queue` (
`queueid` int(25) NOT NULL,
  `barbername` varchar(25) NOT NULL,
  `storename` varchar(25) DEFAULT NULL,
  `queuenumber` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wt_queue`
--

INSERT INTO `wt_queue` (`queueid`, `barbername`, `storename`, `queuenumber`) VALUES
(1, '', 'Up & Up', 2),
(2, '', 'East Side Barber Shop', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wt_queue`
--
ALTER TABLE `wt_queue`
 ADD PRIMARY KEY (`queueid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wt_queue`
--
ALTER TABLE `wt_queue`
MODIFY `queueid` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
