-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2013 at 08:54 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jordancraig`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_category_id` int(11) NOT NULL,
  `job_location_id` int(11) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `overview` text,
  `responsibilities` text,
  `qualifications` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_category_id` (`job_category_id`),
  KEY `job_location_id` (`job_location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_category_id`, `job_location_id`, `title`, `overview`, `responsibilities`, `qualifications`, `active`, `created`, `modified`) VALUES
(1, 1, NULL, 'Senior Designer', 'This is the overview', 'Do stuff\r\nDo other stuff\r\nDon''t do that stuff', 'This stuff\r\nThis other stuff\r\nThis really cool stuff', 1, '2013-10-12 17:45:54', '2013-10-12 17:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE IF NOT EXISTS `job_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `title`) VALUES
(1, 'Production'),
(2, 'Merchandising'),
(3, 'Fulfillment');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE IF NOT EXISTS `job_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(64) NOT NULL,
  `state` varchar(2) NOT NULL,
  `country` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state` (`state`),
  KEY `country` (`country`),
  KEY `state_2` (`state`,`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `city`, `state`, `country`) VALUES
(17, 'New York', 'NY', 'US'),
(26, 'Test', 'TE', 'US');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
