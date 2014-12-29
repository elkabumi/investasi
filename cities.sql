-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2014 at 01:21 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `investasi3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `city_desc` text NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_desc`) VALUES
(1, 'PACITAN', ''),
(2, 'PONOROGO', ''),
(3, 'TRENGGALEK', ''),
(4, 'TULUNGAGUNG', ''),
(5, 'BLITAR', ''),
(6, 'KEDIRI', ''),
(7, 'MALANG', ''),
(8, 'LUMAJANG', ''),
(9, 'JEMBER', ''),
(10, 'BANYUWANGI', ''),
(11, 'BONDOWOSO', ''),
(12, 'SITUBONDO', ''),
(13, 'PROBOLINGGO', ''),
(14, 'PASURUAN', ''),
(15, 'SIDOARJO', ''),
(16, 'MOJOKERTO', ''),
(17, 'JOMBANG', ''),
(18, 'NGANJUK', ''),
(19, 'MADIUN', ''),
(20, 'MAGETAN', ''),
(21, 'NGAWI', ''),
(22, 'BOJONEGORO', ''),
(23, 'TUBAN', ''),
(24, 'LAMONGAN', ''),
(25, 'GRESIK', ''),
(26, 'BANGKALAN', ''),
(27, 'SAMPANG', ''),
(28, 'PAMEKASAN', ''),
(29, 'SUMENEP', ''),
(30, 'KEDIRI', ''),
(31, 'BLITAR', ''),
(32, 'MALANG', ''),
(33, 'PROBOLINGGO', ''),
(34, 'PASURUAN', ''),
(35, 'MOJOKERTO', ''),
(36, 'MADIUN', ''),
(37, 'SURABAYA', ''),
(38, 'BATU', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
