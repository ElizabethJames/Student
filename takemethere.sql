-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2017 at 06:41 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takemethere`
--

-- --------------------------------------------------------

--
-- Table structure for table `floorplan`
--

CREATE TABLE `floorplan` (
  `id` int(10) NOT NULL,
  `floor` int(10) NOT NULL,
  `L/R` varchar(5) NOT NULL,
  `L` varchar(50) NOT NULL,
  `R` varchar(50) NOT NULL,
  `west` varchar(50) DEFAULT NULL,
  `east` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floorplan`
--

INSERT INTO `floorplan` (`id`, `floor`, `L/R`, `L`, `R`, `west`, `east`) VALUES
(0, 0, 'R', 'E1', 'New Bridge', 'E1', 'New Bridge1'),
(1, 0, 'R', 'SL', '', NULL, NULL),
(2, 0, 'R', 'KITL', '', 'KITL0', ''),
(3, 0, 'R', 'Transidio', '', 'Transidio0', ''),
(4, 0, 'R', 'E2', '', NULL, NULL),
(1, -1, 'R', 'Parking', 'Ubiquity', 'Parking', 'Ubiquity1'),
(0, -1, 'R', 'E1', 'Neebal', NULL, 'Neebal1'),
(2, -1, 'R', 'Covacsis', 'Femstack', 'Covacsis0', 'Femstack1'),
(3, -1, 'R', 'Traven', '', 'Traven0', ''),
(4, -1, 'R', 'Parking', '', NULL, NULL),
(5, -1, 'R', 'Flash Digit', '', 'Flash Digit0', ''),
(6, -1, 'R', 'Fuel Digit', '', 'Fuel Digit0', ''),
(0, 1, 'R', 'E1', 'Onvo', 'E1', 'Onvo1'),
(1, 1, 'R', 'SL', 'Cropnosis', 'E2', 'Cropnosis1'),
(2, 1, 'R', 'Widex India', 'TraveTime', 'Widex India0', 'TraveTime1'),
(3, 1, 'R', '', 'Delmore', '', 'Delmore1'),
(0, 2, 'R', 'E1', 'CMRIndia', 'E1', 'CMRIndia1'),
(1, 2, 'R', 'SL', 'Flyjack', 'SL', 'Flyjack1'),
(2, 2, 'R', 'Coviden', 'AAK', 'Coviden0', 'AAK1'),
(4, 2, 'R', 'E2', '', NULL, NULL),
(5, 2, 'R', 'CWGroup', '', 'CWGroup0', ''),
(4, 2, 'R', 'E3', '', NULL, NULL),
(4, 2, 'R', 'GoaClub', '', 'GoaClub0', ''),
(4, 2, 'R', 'LocationGuru', '', NULL, NULL),
(0, -1, 'L', 'IGN.COM', 'Parking', 'IGN.COM0', 'Parking'),
(1, -1, 'L', 'Hazel', 'E1', 'Hazel0', 'E1'),
(2, -1, 'L', 'EPR', 'FabBag', 'EPR0', 'FabBag1'),
(3, -1, 'l', 'Heurty', 'Parking', 'Heurty0', 'Parking'),
(3, -1, 'l', 'Heurty', 'Parking', 'Heurty0', 'Parking'),
(0, 0, 'L', 'GPX', 'E1', 'GPX0', 'E1'),
(0, 1, 'L', 'Ceragon', 'SL', 'Ceragon0', 'SL'),
(0, 1, 'L', 'RPM', 'Covidex', 'RPM0', 'Covidex1'),
(0, 1, 'L', 'NaviGuru', 'E2', 'NaviGuru0', 'E2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
