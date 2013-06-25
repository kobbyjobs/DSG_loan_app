-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2013 at 04:34 PM
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
-- Table structure for table `long_forms`
--

DROP TABLE IF EXISTS `long_forms`;
CREATE TABLE IF NOT EXISTS `long_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_form_id` int(10) unsigned DEFAULT NULL,
  `transaction_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aff_id` int(5) unsigned DEFAULT NULL,
  `offer_id` int(5) unsigned DEFAULT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_timestamp` timestamp NULL DEFAULT NULL,
  `loan_amount_requested` int(4) unsigned DEFAULT NULL,
  `active_military` enum('NO','YES') COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_citizen` enum('NO','YES') COLLATE utf8_unicode_ci DEFAULT NULL,
  `direct_deposit` enum('NO','YES') COLLATE utf8_unicode_ci DEFAULT NULL,
  `income_type` enum('EMPLOYED','SELF EMPLOYED','BENEFITS') COLLATE utf8_unicode_ci DEFAULT NULL,
  `residence_type` enum('HOMEOWNER','RENTER') COLLATE utf8_unicode_ci DEFAULT NULL,
  `salutation` enum('MR','MRS','MS') COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_initial` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `social_security_number` text COLLATE utf8_unicode_ci,
  `drivers_license_id_state` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drivers_license_id_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_phone_extension` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `best_phone_to_call` enum('HOME','MOBILE','WORK') COLLATE utf8_unicode_ci DEFAULT NULL,
  `best_time_to_call` enum('MORNING','AFTERNOON','EVENING') COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address_extension` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `months_at_address` int(4) unsigned DEFAULT NULL,
  `employer_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employer_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_hire` date DEFAULT NULL,
  `paycheck_frequency` enum('WEEKLY','EVERY TWO WEEKS','MONTHLY','TWICE PER MONTH','OTHER') COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_paycheck_amount` int(6) unsigned DEFAULT NULL,
  `gross_monthly_income` int(6) unsigned DEFAULT NULL,
  `date_of_next_paycheck_1` date DEFAULT NULL,
  `date_of_next_paycheck_2` date DEFAULT NULL,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `months_at_bank` int(4) unsigned DEFAULT NULL,
  `bank_account_type` enum('CHECKING','SAVINGS') COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_routing_number` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_number` text COLLATE utf8_unicode_ci,
  `security_token` text COLLATE utf8_unicode_ci,
  `datax_pixel` text COLLATE utf8_unicode_ci,
  `datax_pixel_aid` text COLLATE utf8_unicode_ci,
  `datax_pixel_sid` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
