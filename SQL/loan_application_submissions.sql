-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2013 at 04:33 PM
-- Server version: 5.1.69-cll
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cashmone_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan_application_submissions`
--

DROP TABLE IF EXISTS `loan_application_submissions`;
CREATE TABLE IF NOT EXISTS `loan_application_submissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `long_form_id` int(10) unsigned DEFAULT NULL,
  `xml_request_string` text COLLATE utf8_unicode_ci,
  `request_timestamp` timestamp NULL DEFAULT NULL,
  `xml_response_string` text COLLATE utf8_unicode_ci,
  `response_timestamp` timestamp NULL DEFAULT NULL,
  `application_status` enum('ACCEPTED','REJECTED','WAITING','ERROR') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_price` decimal(4,2) unsigned DEFAULT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
