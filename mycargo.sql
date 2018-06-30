-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2014 at 03:38 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mycargo`
--

-- --------------------------------------------------------

--
-- Table structure for table `sitecode`
--

CREATE TABLE IF NOT EXISTS `sitecode` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sitecode`
--

INSERT INTO `sitecode` (`id`, `code`) VALUES
(1, 'site123');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `location` text NOT NULL,
  `details` text NOT NULL,
  `status` text NOT NULL,
  `trackid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `status`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` text NOT NULL,
  `sn` text NOT NULL,
  `rn` text NOT NULL,
  `sa` text NOT NULL,
  `ra` text NOT NULL,
  `sp` text NOT NULL,
  `rp` text NOT NULL,
  `ref` text NOT NULL,
  `item` text NOT NULL,
  `date` text NOT NULL,
  `track` text NOT NULL,
  `origin` text NOT NULL,
  `desti` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

