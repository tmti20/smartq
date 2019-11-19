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
-- Table structure for table `wt_service`
--

CREATE TABLE IF NOT EXISTS `wt_service` (
`styleid` int(11) NOT NULL,
  `style` varchar(25) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `wt_service`
--

INSERT INTO `wt_service` (`styleid`, `style`, `price`) VALUES
(1, 'Taper Haircut & Lineup', 21.00),
(3, 'Head Lineup Only', 10.00),
(4, 'Children’s Haircut', 19.00),
(8, 'Senior Citizen 65', 15.00),
(9, 'Burst Fade Mohawk', 25.00),
(10, 'Loose Pompadour', 21.00),
(11, 'Textured Quiff Haircut', 29.00),
(12, 'Spiky Modern Undercut', 21.99),
(13, 'Crew Cut', 25.00),
(15, 'French Crop', 25.00),
(16, 'Side Part Undercut Fade', 15.00),
(18, 'Scissor cut', 20.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wt_service`
--
ALTER TABLE `wt_service`
 ADD PRIMARY KEY (`styleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wt_service`
--
ALTER TABLE `wt_service`
MODIFY `styleid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
