-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2014 at 01:36 
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
-- Table structure for table `business_types`
--

CREATE TABLE IF NOT EXISTS `business_types` (
  `business_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `business_type_code` int(11) NOT NULL,
  `business_type_name` text NOT NULL,
  `business_type_description` text NOT NULL,
  `business_parent_type_id` int(11) NOT NULL,
  PRIMARY KEY (`business_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`business_type_id`, `business_type_code`, `business_type_name`, `business_type_description`, `business_parent_type_id`) VALUES
(1, 1, 'Tanaman Pangan Perkebunan', '', 1),
(2, 2, 'Peternakan', '', 1),
(3, 3, 'Kehutanan', '', 1),
(4, 4, 'Prikanan ', '', 1),
(5, 5, 'Pertambangan', '', 1),
(6, 6, 'Industri Makanan', '', 2),
(7, 7, 'Industri Tekstil', '', 2),
(8, 8, 'Ind. Barang Dari Kulit dan Alas Kaki', '', 2),
(9, 9, 'Industri Kayu', '', 2),
(10, 10, 'Industri Kertas dan Percetakan', '', 2),
(11, 11, 'Industri Kimia dan Farmasi', '', 2),
(12, 12, 'Industri Karet dan Plastik', '', 2),
(13, 13, 'Industri Mineral Non Logam', '', 2),
(14, 14, 'Industri Logam, Mesin, & Elektronik', '', 2),
(15, 15, 'Ind. Intru. Kedoktrn, Presisi, Optik & Jam', '', 2),
(16, 16, 'Ind. Kend Bermotor & Alat Transprt Lain', '', 2),
(17, 17, 'Industri Lainnya', '', 2),
(18, 18, 'Listrik, Gas & Air', '', 3),
(19, 19, 'Kontruksi', '', 3),
(20, 20, 'Perdagangan & Reparasi', '', 3),
(21, 21, 'Hotel & Restoran', '', 3),
(22, 22, 'Transportasi, Gudang & Komunikasi', '', 3),
(23, 23, 'Perumahan, Kawasan Ind. & Perkantoran', '', 3),
(24, 24, 'Jasa Lainnya', '', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
