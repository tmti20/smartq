-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 01, 2019 at 11:55 AM
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
-- Table structure for table `wt_store`
--

CREATE TABLE IF NOT EXISTS `wt_store` (
`storeid` int(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `storename` varchar(25) NOT NULL,
  `storepass` varchar(25) DEFAULT NULL,
  `storeemail` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=REDUNDANT AUTO_INCREMENT=52 ;

--
-- Dumping data for table `wt_store`
--

INSERT INTO `wt_store` (`storeid`, `zip`, `city`, `storename`, `storepass`, `storeemail`) VALUES
(1, 7502, 'Paterson', 'Final touch', NULL, ''),
(3, 7502, 'Paterson', 'Up & Up', NULL, ''),
(4, 7504, 'Paterson', 'East Side Barber Shop', NULL, ''),
(13, 7102, 'Newark', 'Highlander Cuts', NULL, ''),
(16, 7652, 'Paramus', 'Nilofars Style', NULL, ''),
(18, 7102, 'Newark', 'Fix Hair', NULL, ''),
(19, 7502, 'Paterson', 'TMs Cuts', NULL, ''),
(20, 7047, 'North Bergen', 'Delux Hairstylist', NULL, ''),
(21, 7047, 'North Bergen', 'Classic Hair Studio', NULL, ''),
(31, 7030, 'Hoboken', 'Hoboken Hair for Men', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wt_store`
--
ALTER TABLE `wt_store`
 ADD PRIMARY KEY (`storeid`), ADD UNIQUE KEY `storename` (`storename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wt_store`
--
ALTER TABLE `wt_store`
MODIFY `storeid` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
