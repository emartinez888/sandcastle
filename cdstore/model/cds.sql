-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2012 at 03:03 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`id`, `name`) VALUES
(1000, 'Michael Jackson Thriller'),
(1001, 'AC/DC Back in Black'),
(1002, 'Pink Floyd The Dark Side of the Moon'),
(1003, 'Whitney Houston / Various artists The Bodyguard'),
(1004, 'Michael Jackson Bad'),
(1005, 'Meat Loaf Bat Out of Hell'),
(1006, 'Eagles Their Greatest Hits (1971–1975)'),
(1007, 'Various artists Dirty Dancing'),
(1008, 'Bee Gees / Various artists Saturday Night Fever'),
(1009, 'Fleetwood Mac Rumours'),
(1010, 'Shania Twain Come On Over'),
(1011, 'Shania Twin Come On Over Again');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
