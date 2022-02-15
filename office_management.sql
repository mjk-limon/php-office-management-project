-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2019 at 09:26 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$KClKG9BpkKK432wptCgVWOfll.5PMyCP2CwrcA4GjVoI7Wu6Rla/W', 'Harry', 'Den', 'male6.jpg', '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time DEFAULT NULL,
  `num_hr` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
(111, 15103272, '2019-11-17', '07:00:00', 1, '16:26:06', 7.4333333333333),
(112, 15103272, '2019-10-31', '09:00:00', 1, '16:15:00', 7.25),
(114, 15103287, '2019-11-20', '11:00:00', 0, '14:00:00', 3),
(115, 15103287, '2019-11-01', '08:00:00', 1, '17:00:00', 8),
(116, 15103287, '2019-11-02', '08:00:00', 1, '17:00:00', 8),
(134, 15103272, '2019-11-23', '15:06:21', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

DROP TABLE IF EXISTS `cashadvance`;
CREATE TABLE IF NOT EXISTS `cashadvance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_advance` date NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`id`, `date_advance`, `employee_id`, `amount`) VALUES
(1, '2019-08-02', '1', 1000),
(2, '2018-05-02', '1', 50),
(3, '2018-05-02', '1', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

DROP TABLE IF EXISTS `deductions`;
CREATE TABLE IF NOT EXISTS `deductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `description`, `amount`) VALUES
(1, 'SSS', 100),
(2, 'Pagibig', 150),
(3, 'PhilHealth', 150),
(4, 'Project Issues', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `position_id`, `schedule_id`, `photo`, `created_on`) VALUES
(1, '15103060', 'Sarmin', 'rahman', 'dhaka', '1995-07-02', '01718825371', 'Female', 1, 2, 'my-ds.jpg', '2019-06-28'),
(3, '15103272', 'rafia', 'islam', 'sirajganj', '1992-05-02', '01711132322', 'Female', 2, 2, 'A1-4165.jpg', '2019-01-17'),
(26, '15103287', 'jannatul', 'adan', 'rangpur', '1992-05-02', '01866566565', 'Female', 2, 1, 'female4.jpg', '2019-06-30'),
(27, '16103045', 'Sojib', 'Khandaker', 'Tangail', '1997-02-07', '01735656565', 'Male', 1, 4, 'facebook-profile-image.jpeg', '2019-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `employee_login`
--

DROP TABLE IF EXISTS `employee_login`;
CREATE TABLE IF NOT EXISTS `employee_login` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_login`
--

INSERT INTO `employee_login` (`id`, `user_id`, `password`) VALUES
(1, '15103272', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

DROP TABLE IF EXISTS `emp_leave`;
CREATE TABLE IF NOT EXISTS `emp_leave` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `empid` varchar(50) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `status` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `empid`, `from`, `to`, `reason`, `status`, `name`) VALUES
(10, '15103272', '2019-08-01', '2019-08-03', ' sickness', 3, 'rafia'),
(11, '15103272', '2019-08-20', '2019-08-21', ' hjghjghjgh', 2, 'test'),
(12, '15103272', '2019-08-22', '2019-08-24', ' dfdfd', 3, 'test'),
(14, '15103272', '2019-08-29', '2019-08-30', ' like', 1, 'test'),
(19, '16103272', '2019-08-23', '2019-08-24', ' ok', 1, 'Sojib'),
(20, '15103060', '2019-11-01', '2019-11-22', 'à¦à¦‡ à¦§à¦°à§‡à¦¨, à¦–à§à¦¶à¦¿à¦¤à§‡, à¦ à§‡à¦²à¦¾à§Ÿ', 1, 'Sarmin');

-- --------------------------------------------------------

--
-- Table structure for table `emp_monitoring`
--

DROP TABLE IF EXISTS `emp_monitoring`;
CREATE TABLE IF NOT EXISTS `emp_monitoring` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `running_project` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `points` int(20) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `feedback` text NOT NULL,
  `submit_date` varchar(20) NOT NULL,
  `emp_commends` text NOT NULL,
  `file` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_monitoring`
--

INSERT INTO `emp_monitoring` (`id`, `emp_id`, `name`, `position`, `running_project`, `status`, `points`, `start_date`, `end_date`, `feedback`, `submit_date`, `emp_commends`, `file`) VALUES
(1, 'ABC123456789', 'sajib', 'Programmer', 'office management system', '0', 6, '2019-07-6', '2019-07-13', ' good', '', '', ''),
(2, 'ALB590623481', 'Emma', 'software engineer', 'ecommerce project', '0', 5, '2019-07-11', '2019-07-15', ' good', '', '', ''),
(3, 'IOV153842976', 'Sophia', 'programmer', 'hotel management', '0', 0, '2019-07-10', '2019-07-17', '', '', '', ''),
(4, '15103272', 'Rafia', 'Web developer', 'Office management', '1', 9, '2019-07-24', '2019-07-28', ' thanks. its amazing', '2019-07-25', '', 'application.docx'),
(5, 'TQO238109674', 'Bruno', 'programmer', 'Office management', '0', 4, '2019-07-13', '2019-07-14', ' still not okay', '', '', ''),
(6, '1513061', 'rafia', 'programmer', 'Office management', '0', 6, '2019-07-16', '2019-07-17', ' try to complete it quickly', '', '', ''),
(7, '1513060', 'Sarmin', 'programmer', 'ecommerce project', '0', 0, '2019-07-17', '2019-07-20', '', '', '', ''),
(8, '1513061', 'rafia', 'programmer', 'pos system', '0', 8, '2019-07-19', '2019-07-20', 'satisfactory', '', '', ''),
(9, '15103272', 'rafia', 'programmer', 'ecommerce project', '1', 9, '2019-07-21', '2019-07-23', ' thats good', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_ranking`
--

DROP TABLE IF EXISTS `emp_ranking`;
CREATE TABLE IF NOT EXISTS `emp_ranking` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rank` int(20) NOT NULL,
  `points` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(20) NOT NULL,
  `notice_title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

DROP TABLE IF EXISTS `overtime`;
CREATE TABLE IF NOT EXISTS `overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) NOT NULL,
  `hours` double NOT NULL,
  `rate` double NOT NULL,
  `date_overtime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `employee_id`, `hours`, `rate`, `date_overtime`) VALUES
(5, '3', 2.1666666666667, 3600, '2018-06-05'),
(6, '3', 15.533333333333, 1000, '2019-07-02'),
(7, '4', 3.25, 20, '2019-08-19'),
(8, '2', 3.6666666666667, 15, '2019-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(1, 'Programmer', 100),
(2, 'Writer', 50),
(3, 'Marketing ', 35),
(4, 'Graphic Designer', 75);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00'),
(5, '08:00:00', '16:00:00'),
(6, '09:00:00', '17:00:00'),
(7, '10:00:00', '18:00:00'),
(8, '11:00:00', '03:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
