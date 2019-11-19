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
-- Table structure for table `wt_order`
--

CREATE TABLE IF NOT EXISTS `wt_order` (
`orderid` int(25) NOT NULL,
  `customername` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `storename` varchar(25) NOT NULL,
  `location` varchar(20) NOT NULL,
  `barbername` varchar(25) NOT NULL,
  `style` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `orderstatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'waiting',
  `orderdate` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=81 ;

--
-- Dumping data for table `wt_order`
--

INSERT INTO `wt_order` (`orderid`, `customername`, `storename`, `location`, `barbername`, `style`, `orderstatus`, `orderdate`) VALUES
(71, 'dd', 'Hoboken Hair for Men', 'Paramus', 'testbarber3', 'French Crop', 'waiting', '2019-10-31 16:20:59'),
(72, 'dd', 'Hoboken Hair for Men', 'Paramus', 'testbarber3', 'French Crop', 'waiting', '2019-10-31 16:21:19'),
(73, 'dd', 'Classic Hair Studio', 'Newark', 'testbarber1', 'Taper Haircut & Lineup', 'waiting', '2019-10-31 16:21:55'),
(74, 'dd', 'East Side Barber Shop', 'Newark', 'testbarber3', 'Senior Citizen 65', 'waiting', '2019-10-31 18:37:59'),
(75, 'dd', 'Nilofars Style', 'Hoboken', 'testbarber3', 'Crew Cut', 'waiting', '2019-10-31 18:47:00'),
(76, 'Aquaman', 'Nilofars Style', 'North Bergen', 'testbarber5', 'Scissor cut', 'waiting', '2019-10-31 18:58:26'),
(77, 'dd', 'Classic Hair Studio', 'Paterson', 'testbarber1', 'Taper Haircut & Lineup', 'waiting', '2019-10-31 19:54:45'),
(78, 'dd', 'Delux Hairstylist', 'Paramus', 'testbarber3', 'Scissor cut', 'waiting', '2019-10-31 21:05:48'),
(79, 'tanvir', 'East Side Barber Shop', 'Newark', 'testbarber3', 'Crew Cut', 'waiting', '2019-10-31 21:13:29'),
(80, 'tanvir', 'Classic Hair Studio', 'Newark', 'testbarber1', 'Taper Haircut & Lineup', 'waiting', '2019-10-31 21:13:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wt_order`
--
ALTER TABLE `wt_order`
 ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wt_order`
--
ALTER TABLE `wt_order`
MODIFY `orderid` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
