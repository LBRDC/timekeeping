-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 05:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lbrdc-tk`
--
CREATE DATABASE IF NOT EXISTS `lbrdc-tk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lbrdc-tk`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--
-- Creation: Mar 27, 2024 at 12:36 AM
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_img` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `superuser` int(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_img`, `admin_name`, `admin_username`, `admin_password`, `superuser`, `date`) VALUES
(1, '', 'Administrator', 'admin', 'admin', 1, '2024-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `employee_profile`
--
-- Creation: Mar 26, 2024 at 06:26 AM
--

CREATE TABLE IF NOT EXISTS `employee_profile` (
  `emp_id` int(11) NOT NULL,
  `prsnl_id` int(11) NOT NULL,
  `cmpny_id` int(11) NOT NULL,
  `login_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_department`
--
-- Creation: Mar 26, 2024 at 06:30 AM
--

CREATE TABLE IF NOT EXISTS `field_department` (
  `fld_dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`fld_dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_location`
--
-- Creation: Mar 26, 2024 at 11:52 PM
--

CREATE TABLE IF NOT EXISTS `field_location` (
  `fld_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_location` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `radius` float NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`fld_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_position`
--
-- Creation: Mar 26, 2024 at 06:32 AM
--

CREATE TABLE IF NOT EXISTS `field_position` (
  `fld_position_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`fld_position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_schedule`
--
-- Creation: Mar 26, 2024 at 06:52 AM
--

CREATE TABLE IF NOT EXISTS `field_schedule` (
  `fld_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`fld_schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_schedule_daily`
--
-- Creation: Mar 26, 2024 at 06:56 AM
--

CREATE TABLE IF NOT EXISTS `field_schedule_daily` (
  `fld_schedaily_id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time_in` time NOT NULL,
  `break_out` time NOT NULL,
  `break_in` time NOT NULL,
  `time_out` time NOT NULL,
  `work_hrs` int(11) NOT NULL,
  `break_mins` int(11) NOT NULL,
  `restday` varchar(255) NOT NULL,
  PRIMARY KEY (`fld_schedaily_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
