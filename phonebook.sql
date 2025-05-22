-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2024 at 06:39 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
CREATE TABLE IF NOT EXISTS `managers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text CHARACTER SET ucs2 COLLATE ucs2_general_ci NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `mobile` varchar(11) CHARACTER SET ucs2 COLLATE ucs2_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `mobile`) VALUES
(1, 'ماهک', 'کناره', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mahakkenareh@gmail.com', '09128224726');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` text NOT NULL,
  `telephone` text CHARACTER SET ucs2 COLLATE ucs2_general_ci,
  `phone1` varchar(11) NOT NULL,
  `phone2` varchar(11) CHARACTER SET ucs2 COLLATE ucs2_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `fullname`, `telephone`, `phone1`, `phone2`) VALUES
(1, 'ماهک کناره', '021-66886699', '09121234523', '09121331333'),
(2, 'قلی قلی پور', '021-33786756', '09121341345', '09391236745'),
(3, 'قلی قاسمی', '013-66687873', '09113353546', '09116785642'),
(4, 'تارا سهرابی', NULL, '09122342514', NULL),
(9, 'زهرا خداپرست', '021-22456738', '09339873452', '09168873425');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
