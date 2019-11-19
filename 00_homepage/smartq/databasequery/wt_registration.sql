-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 01, 2019 at 11:51 AM
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
-- Table structure for table `wt_registration`
--

CREATE TABLE IF NOT EXISTS `wt_registration` (
`userid` int(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `userpass` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `wt_registration`
--

INSERT INTO `wt_registration` (`userid`, `username`, `userpass`, `email`) VALUES
(14, 'ddd', 'dd', 'dd@d.c'),
(19, 'lgw3', '1234567', 'lgw3@njit.edu'),
(21, 'Tanvir', 'dd', 'd@d.d'),
(24, 'ddd', 'ddd', 'd@d.d'),
(25, 'ffff', 'ff', 'd@d.d'),
(26, 'dd', 'dd', 'd@d.d'),
(27, 'test1', 'test', 'test@test.com'),
(28, 'tanvir', 'tanvir', 'tanvir@gmail.com'),
(34, 'tt', 'tt', 'tanvir@gmail.com'),
(36, 'ta', 'ta', 'tanvir@gmail.com'),
(37, 'taa', 'a', 'tanvir@gmail.com'),
(42, 'taaa', 'a', 'tanvir@gmail.com'),
(43, 'taaaa', 'a', 'tanvir@gmail.com'),
(45, 'Aquaman', 'aquaman', 'aquaman17@njit.edu'),
(46, 'tavirr', 'tanvir', 'tanvir@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wt_registration`
--
ALTER TABLE `wt_registration`
 ADD PRIMARY KEY (`userid`), ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wt_registration`
--
ALTER TABLE `wt_registration`
MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
