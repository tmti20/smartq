-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 01, 2019 at 11:53 AM
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
-- Table structure for table `wt_barber`
--

CREATE TABLE IF NOT EXISTS `wt_barber` (
`barberid` int(11) NOT NULL,
  `barbername` varchar(25) NOT NULL,
  `storename` varchar(25) NOT NULL,
  `rating` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=137 ;

--
-- Dumping data for table `wt_barber`
--

INSERT INTO `wt_barber` (`barberid`, `barbername`, `storename`, `rating`) VALUES
(125, 'testbarber1', 'tmsclick', 0),
(128, 'testbarber2', 'tmsclick', 0),
(129, 'testbarber3', 'tmsclick', 0),
(130, 'testbarber4', 'tmsclick', 0),
(132, 'testbarber5', 'tmsclick', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wt_barber`
--
ALTER TABLE `wt_barber`
 ADD PRIMARY KEY (`barberid`), ADD UNIQUE KEY `barbername` (`barbername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wt_barber`
--
ALTER TABLE `wt_barber`
MODIFY `barberid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
