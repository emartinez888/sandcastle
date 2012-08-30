-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2012 at 03:18 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE IF NOT EXISTS `art` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL COMMENT 'from artists aid',
  `value` decimal(10,2) DEFAULT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`itemid`, `aid`, `value`, `title`, `description`) VALUES
(1, 5, 22.00, 'the dragon', 'vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis'),
(2, 4, 40.00, 'misty blue', 'Null'),
(3, 4, 0.00, 'crescendo', 'Typi non habent claritatem insitam; est usus legentis'),
(4, 1, 0.00, 'lullaby', 'nobis eleifend option congue nihil imperdiet doming id quod mazim'),
(5, 2, 25.00, 'unbreakable', 'Null'),
(6, 3, 40.00, 'white bread', 'Eodem modo typi, qui nunc nobis'),
(7, 2, 50.00, 'juggers', 'Null'),
(8, 4, 10.00, 'la poteria', 'Null'),
(9, 5, 0.00, 'pots r us', 'nobis eleifend option congue nihil imperdiet doming'),
(10, 2, 0.00, 'brown thingy', 'Null'),
(11, 5, 25.00, 'passing by', 'Null'),
(12, 3, 0.00, 'helmut', 'anteposuerit litterarum formas humanitatis per se');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `web` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`aid`, `name`, `email`, `phone`, `web`) VALUES
(1, 'Julia West', 'jw@qwerty.com', '5195693652', 'www.jwart.com'),
(2, 'Mary Cocos', 'mc@dede.com', 'Null', 'www.cocos.ca'),
(3, 'Fred Derwing', 'fd@sympatico.ca', '5196589854', 'Null'),
(4, 'Suzan Vega', 'vega@chevy.com', 'Null', 'Null'),
(5, 'David Stern', 'ds@mlb.com', '2015849865 x3695', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE IF NOT EXISTS `bidders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bidders`
--

INSERT INTO `bidders` (`id`, `user`, `email`, `name`, `phone`) VALUES
(1, 'slick', 'slick@dd.com', 'Null', 'Null'),
(2, 'Jezz88', 'jezzerhuithuit@somethinglong.com', 'Jezz Morandi', '5196589658'),
(3, 'mambo', 'mamboitaliano@somemovie.ca', 'franco Nero', '0115236598'),
(4, 'Suzanna V.', 'vegasongs@annoying.ca', 'Suzanne Vega', '212569-3658 x2569'),
(5, 'creole', 'haiticoming@qwerty.ha', 'Sabourin Chauviniste', ''),
(6, 'brandy77', 'yesthatgirl_589@pouirty.biz', 'Drinker Girl', '(801)888-3698 x5481'),
(7, 'sk8er attack', 'sk8erpooped@shedancesballet.ca', 'Mammie Von John', 'Null'),
(8, 'Julia R.', 'jroberts@iamloaded.com', 'Null', '(201)256-9856 or (658)325-6587');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT 'from bidders id',
  `itemid` int(11) NOT NULL COMMENT 'from art id',
  `bid` decimal(10,2) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `uid`, `itemid`, `bid`, `ts`) VALUES
(1, 5, 8, 25.50, '2012-08-28 17:23:29'),
(2, 3, 10, 50.00, '2012-08-28 17:23:29'),
(3, 8, 11, 25.00, '2012-08-28 17:23:29'),
(4, 1, 5, 12.75, '2012-08-28 17:23:29'),
(5, 1, 1, 15.00, '2012-08-28 17:23:29'),
(6, 5, 12, 20.00, '2012-08-28 17:23:29'),
(7, 3, 5, 30.00, '2012-08-28 17:23:29'),
(8, 8, 3, 10.00, '2012-08-28 17:23:29'),
(9, 2, 7, 10.00, '2012-08-28 17:23:29'),
(10, 2, 9, 12.50, '2012-08-28 17:23:29'),
(11, 4, 4, 30.01, '2012-08-28 17:23:29'),
(12, 4, 6, 10.00, '2012-08-28 17:23:29'),
(13, 4, 12, 10.00, '2012-08-28 17:23:29'),
(14, 7, 8, 12.51, '2012-08-28 17:23:29'),
(15, 6, 8, 30.02, '2012-08-28 17:23:29'),
(16, 1, 9, 10.00, '2012-08-28 17:23:29'),
(17, 5, 1, 10.00, '2012-08-28 17:23:29'),
(18, 3, 7, 12.52, '2012-08-28 17:23:29'),
(19, 2, 11, 30.03, '2012-08-28 17:23:29'),
(20, 2, 3, 10.00, '2012-08-28 17:23:29'),
(21, 4, 8, 10.00, '2012-08-28 17:23:29'),
(22, 3, 2, 12.53, '2012-08-28 17:23:29'),
(23, 8, 4, 30.04, '2012-08-28 17:23:29'),
(24, 1, 7, 10.00, '2012-08-28 17:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `picfiles`
--

CREATE TABLE IF NOT EXISTS `picfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL COMMENT 'from art itemid',
  `filename` varchar(80) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filename` (`filename`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `picfiles`
--

INSERT INTO `picfiles` (`id`, `itemid`, `filename`, `rank`) VALUES
(1, 5, 'art01.jpg', 1),
(2, 9, 'art02.jpg', 1),
(3, 1, 'art03.jpg', 2),
(4, 1, 'art04.jpg', 1),
(5, 12, 'art05.jpg', 1),
(6, 10, 'art06.jpg', 1),
(7, 3, 'art07.jpg', 2),
(8, 7, 'art08.jpg', 1),
(9, 8, 'art09.jpg', 1),
(10, 6, 'art10.jpg', 1),
(11, 4, 'art11.jpg', 1),
(12, 1, 'art12.jpg', 3),
(13, 11, 'art13.jpg', 1),
(14, 2, 'art14.jpg', 1),
(15, 5, 'art15.jpg', 2),
(16, 3, 'art16.jpg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
