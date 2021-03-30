-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2021 at 06:29 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `sname` varchar(30) NOT NULL,
  `saddress` varchar(100) NOT NULL,
  `sclass` varchar(100) NOT NULL,
  `sphone` varchar(10) NOT NULL,
  `simage` varchar(100) NOT NULL,
  `scity` varchar(255) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `saddress`, `sclass`, `sphone`, `simage`, `scity`) VALUES
(54, 'Nisha', 'Apple Squre', 'BscIT', '9898989898', 'B.jpg', ''),
(53, 'Jaydeep', 'Apple Squre', 'BscIT', '9898989898', '', ''),
(52, 'Nirav', 'Apple Squre', 'BCA', '7878787878', '', ''),
(51, 'Bharat', 'Apple Squre', 'BscIT', '9033712672', '', ''),
(50, 'Amit', 'Apple Squre', 'BscIT', '9898989898', '', 'surat'),
(55, 'Dhaval', 'Apple Squre', 'BCA', '9033712672', '', ''),
(56, 'Srushti', 'Apple Squre', 'BCA', '9033712672', '', ''),
(57, 'Nayan', 'Apple Squre', 'BscIT', '9033712672', '', ''),
(100, '', '', '', '', 'Koala.jpg', ''),
(104, 'Nirav', 'Apple Squre', 'BscIT', '8989898998', 'Koala.jpg', 'surat');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
