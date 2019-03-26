-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 12:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdsp_fcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acad_year`
--

CREATE TABLE `tbl_acad_year` (
  `acad_id` int(11) NOT NULL,
  `acad_yr` char(9) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acad_year`
--

INSERT INTO `tbl_acad_year` (`acad_id`, `acad_yr`, `status`) VALUES
(1, '2018-2019', 1),
(2, '2019-2020', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `row_id` int(11) NOT NULL,
  `emp_uniq_id` char(32) NOT NULL,
  `avatar` char(32) NOT NULL,
  `uname` varchar(150) NOT NULL,
  `password` char(32) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`row_id`, `emp_uniq_id`, `avatar`, `uname`, `password`, `fname`, `lname`, `role`, `status`, `created_date`) VALUES
(1, '5c080710142a2', '', 'registrar', '5f4dcc3b5aa765d61d8327deb882cf99', 'Juan', 'Cruz', 2, 1, '2018-12-12'),
(2, '5c3f86c85a1d6', '', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', 'Admin', 1, 1, '2018-12-12'),
(3, '5c40dd75c74fc', '', 'cashier', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pencil', 'Manalo', 3, 1, '2019-01-05'),
(4, '5c834f2bb5641', '', 'accounting', '5f4dcc3b5aa765d61d8327deb882cf99', 'ballpen', 'pilot', 4, 1, '2019-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_act_type`
--

CREATE TABLE `tbl_act_type` (
  `row_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `role_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_act_type`
--

INSERT INTO `tbl_act_type` (`row_id`, `role_id`, `role_type`) VALUES
(1, 1, 'admin'),
(2, 2, 'registrar'),
(3, 3, 'cashier'),
(4, 4, 'accounting');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_info`
--

CREATE TABLE `tbl_assessment_info` (
  `rowID` int(11) NOT NULL,
  `studID` char(20) NOT NULL,
  `gradeLevel` varchar(10) NOT NULL,
  `course_id` int(2) NOT NULL,
  `assessmentID` int(6) NOT NULL,
  `paymentScheme` varchar(11) NOT NULL,
  `discount` int(2) NOT NULL,
  `totalDiscount` decimal(10,2) NOT NULL,
  `totalDiscAmount` decimal(10,2) NOT NULL,
  `escGrant` decimal(10,2) NOT NULL,
  `escGrantAmnt` decimal(10,2) NOT NULL,
  `voucher` int(2) NOT NULL,
  `voucherDisc` decimal(10,2) NOT NULL,
  `numUnits` int(11) NOT NULL,
  `numThesis` int(11) NOT NULL,
  `totalAmt` decimal(10,2) NOT NULL,
  `grandTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment_info`
--

INSERT INTO `tbl_assessment_info` (`rowID`, `studID`, `gradeLevel`, `course_id`, `assessmentID`, `paymentScheme`, `discount`, `totalDiscount`, `totalDiscAmount`, `escGrant`, `escGrantAmnt`, `voucher`, `voucherDisc`, `numUnits`, `numThesis`, `totalAmt`, `grandTotal`) VALUES
(1, '19-0001-52', '4th Yr', 3, 236541, 'INSTALLMENT', 0, '0.00', '0.00', '0.00', '0.00', 0, '0.00', 24, 1, '26600.00', '26600.00'),
(2, '123456789012', 'Grade 1', 0, 742309, 'CASH', 3, '40.00', '5020.00', '0.00', '0.00', 0, '0.00', 0, 0, '36295.00', '31275.00'),
(3, '534255555555', 'Grade 1', 0, 85571, 'MINIMUM', 5, '100.00', '12550.00', '0.00', '0.00', 0, '0.00', 0, 0, '36295.00', '23745.00'),
(4, '123456789013', 'Grade 8', 0, 725982, 'CASH', 0, '10.00', '1345.00', '1.00', '9000.00', 0, '0.00', 0, 0, '38635.00', '28290.00'),
(5, '123456789019', 'Grade 4', 0, 322894, 'CASH', 5, '100.00', '12550.00', '0.00', '0.00', 0, '0.00', 0, 0, '37560.00', '25010.00'),
(6, '123456789014', 'Grade 12', 0, 720327, 'MONTHLY', 0, '0.00', '0.00', '0.00', '0.00', 3, '0.00', 0, 0, '20950.00', '20950.00'),
(7, '19-0010-52', '1st Yr', 3, 647620, 'INSTALLMENT', 11, '20.00', '1920.00', '0.00', '0.00', 0, '0.00', 24, 0, '21550.00', '19630.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_col_course`
--

CREATE TABLE `tbl_col_course` (
  `row_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_code` char(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `no_of_yrs` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_col_course`
--

INSERT INTO `tbl_col_course` (`row_id`, `course_id`, `course_code`, `course_name`, `no_of_yrs`) VALUES
(1, 1, 'BSA', 'Bachelor of Science in Accountancy', 5),
(2, 2, 'BSEn', 'Bachelor of Science in Entrepreneurship', 4),
(3, 3, 'BSIT', 'Bachelor of Science in Information Technology', 4),
(4, 4, 'BSOA', 'Bachelor of Science in Office Administration', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `row_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `dept_code` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`row_id`, `dept_id`, `dept_code`, `department`) VALUES
(1, 1, 'PRE', 'Pre-Elem'),
(2, 2, 'ELEM', 'Elementary'),
(3, 3, 'JHS', 'Junior High School'),
(4, 4, 'SHS', 'Senior High School'),
(5, 5, 'COL', 'College');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `row_id` int(11) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `disc_amnt` decimal(5,2) NOT NULL,
  `disc_for` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`row_id`, `discount`, `disc_amnt`, `disc_for`, `status`) VALUES
(1, 'Early Enrollment Program Cash', '20.00', 2, 1),
(2, 'Early Enrollment Program Min', '15.00', 2, 1),
(3, 'Retention Promo', '30.00', 2, 1),
(4, 'Retention Promo', '30.00', 3, 1),
(5, 'Highest Honors', '100.00', 2, 1),
(6, 'High Honor', '40.00', 2, 1),
(7, 'Honor', '15.00', 2, 1),
(8, '1st Daugther/Son', '75.00', 2, 1),
(9, '2nd Daughter/Son', '50.00', 2, 1),
(10, 'Niece/Nephew', '50.00', 2, 1),
(11, 'Working Student', '20.00', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees`
--

CREATE TABLE `tbl_fees` (
  `row_id` int(11) NOT NULL,
  `fee_name` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fee_for` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fees`
--

INSERT INTO `tbl_fees` (`row_id`, `fee_name`, `amount`, `fee_for`, `status`) VALUES
(1, 'Tuition Fee', '12550.00', 'Grade 1', 1),
(2, 'Miscellaneous', '8550.00', 'Grade 1', 1),
(3, 'Computer Fee', '3500.00', 'Grade 1', 1),
(4, 'Energy Fee', '3000.00', 'Grade 1', 1),
(5, 'Books', '5895.00', 'Grade 1', 1),
(6, 'Educational Tour', '2200.00', 'Grade 1', 1),
(7, 'Foundation Day', '250.00', 'Grade 1', 1),
(8, 'Learner\'s Insurance Premium', '150.00', 'Grade 1', 1),
(9, 'ID Lanyard', '200.00', 'Grade 1', 1),
(10, 'Tuition Fee', '13450.00', 'Grade 8', 1),
(11, 'Miscellaneous', '8550.00', 'Grade 8', 1),
(12, 'Computer Fee', '3500.00', 'Grade 8', 1),
(13, 'Energy Fee', '3000.00', 'Grade 8', 1),
(14, 'Books', '7335.00', 'Grade 8', 1),
(15, 'Educational Tour', '2200.00', 'Grade 8', 1),
(16, 'Foundation Day', '250.00', 'Grade 8', 1),
(17, 'Learner\'s Insurance Premium', '150.00', 'Grade 8', 1),
(18, 'ID Lanyard', '200.00', 'Grade 8', 1),
(19, 'Tuition Fee', '6400.00', 'Grade 12', 1),
(20, 'Miscellaneous', '8100.00', 'Grade 12', 1),
(21, 'Laboratory Fee', '3000.00', 'Grade 12', 1),
(22, 'Student Handbook', '100.00', 'Grade 12', 1),
(23, 'Educational Tour', '2200.00', 'Grade 12', 1),
(24, 'Foundation Day', '300.00', 'Grade 12', 1),
(25, 'ID w/ Lanyard', '200.00', 'Grade 12', 1),
(26, 'Student\'s Physical Examination', '350.00', 'Grade 12', 1),
(27, 'Acquaintance Party', '300.00', 'Grade 12', 1),
(28, 'Tuition Fee(per unit)', '400.00', 'College', 1),
(29, 'Miscellaneous', '6100.00', 'College', 1),
(30, 'Computer Fee', '1500.00', 'College', 1),
(31, 'Science Laboratory', '1500.00', 'College', 1),
(32, 'NSTP', '150.00', 'College', 1),
(33, 'ID with Lanyard', '200.00', 'College', 1),
(34, 'Thesis Defense Fee', '400.00', 'College', 1),
(35, 'Graduation Fee', '3000.00', 'College', 1),
(36, 'Year Book', '2500.00', 'College', 1),
(37, 'Retreat', '2500.00', 'College', 1),
(38, 'Team Building', '2500.00', 'College', 1),
(39, 'Tuition Fee', '12550.00', 'Grade 4', 1),
(40, 'Miscellaneous', '8550.00', 'Grade 4', 1),
(41, 'Computer Fee', '3500.00', 'Grade 4', 1),
(42, 'Energy Fee', '3000.00', 'Grade 4', 1),
(43, 'Books', '7160.00', 'Grade 4', 1),
(44, 'Educational Tour', '2200.00', 'Grade 4', 1),
(45, 'Foundation Tshirt', '250.00', 'Grade 4', 1),
(46, 'LIP', '150.00', 'Grade 4', 1),
(47, 'ID Lanyard', '200.00', 'Grade 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feespayables_info`
--

CREATE TABLE `tbl_feespayables_info` (
  `rowID` int(11) NOT NULL,
  `studID` char(20) NOT NULL,
  `assessmentID` int(6) NOT NULL,
  `feeId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feespayables_info`
--

INSERT INTO `tbl_feespayables_info` (`rowID`, `studID`, `assessmentID`, `feeId`) VALUES
(1, '19-0001-52', 236541, 28),
(2, '19-0001-52', 236541, 29),
(3, '19-0001-52', 236541, 34),
(4, '19-0001-52', 236541, 35),
(5, '19-0001-52', 236541, 36),
(6, '19-0001-52', 236541, 37),
(7, '19-0001-52', 236541, 38),
(8, '123456789012', 742309, 1),
(9, '123456789012', 742309, 2),
(10, '123456789012', 742309, 3),
(11, '123456789012', 742309, 4),
(12, '123456789012', 742309, 5),
(13, '123456789012', 742309, 6),
(14, '123456789012', 742309, 7),
(15, '123456789012', 742309, 8),
(16, '123456789012', 742309, 9),
(17, '534255555555', 85571, 1),
(18, '534255555555', 85571, 2),
(19, '534255555555', 85571, 3),
(20, '534255555555', 85571, 4),
(21, '534255555555', 85571, 5),
(22, '534255555555', 85571, 6),
(23, '534255555555', 85571, 7),
(24, '534255555555', 85571, 8),
(25, '534255555555', 85571, 9),
(26, '123456789013', 725982, 10),
(27, '123456789013', 725982, 11),
(28, '123456789013', 725982, 12),
(29, '123456789013', 725982, 13),
(30, '123456789013', 725982, 14),
(31, '123456789013', 725982, 15),
(32, '123456789013', 725982, 16),
(33, '123456789013', 725982, 17),
(34, '123456789013', 725982, 18),
(35, '123456789019', 322894, 39),
(36, '123456789019', 322894, 40),
(37, '123456789019', 322894, 41),
(38, '123456789019', 322894, 42),
(39, '123456789019', 322894, 43),
(40, '123456789019', 322894, 44),
(41, '123456789019', 322894, 45),
(42, '123456789019', 322894, 46),
(43, '123456789019', 322894, 47),
(44, '123456789014', 720327, 19),
(45, '123456789014', 720327, 20),
(46, '123456789014', 720327, 21),
(47, '123456789014', 720327, 22),
(48, '123456789014', 720327, 23),
(49, '123456789014', 720327, 24),
(50, '123456789014', 720327, 25),
(51, '123456789014', 720327, 26),
(52, '123456789014', 720327, 27),
(53, '19-0010-52', 647620, 28),
(54, '19-0010-52', 647620, 29),
(55, '19-0010-52', 647620, 30),
(56, '19-0010-52', 647620, 31),
(57, '19-0010-52', 647620, 32),
(58, '19-0010-52', 647620, 33),
(59, '19-0010-52', 647620, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `row_id` int(11) NOT NULL,
  `gdr_id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`row_id`, `gdr_id`, `gender`) VALUES
(1, 1, 'Male'),
(2, 2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grd_level`
--

CREATE TABLE `tbl_grd_level` (
  `row_id` int(11) NOT NULL,
  `grd_id` int(11) NOT NULL,
  `grd_lvl` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grd_level`
--

INSERT INTO `tbl_grd_level` (`row_id`, `grd_id`, `grd_lvl`, `dept_id`) VALUES
(1, 1, 'Grade 1', 2),
(2, 2, 'Grade 2', 2),
(3, 3, 'Grade 3', 2),
(4, 4, 'Grade 4', 2),
(5, 5, 'Grade 5', 2),
(6, 6, 'Grade 6', 2),
(7, 7, 'Grade 7', 3),
(8, 8, 'Grade 8', 3),
(9, 9, 'Grade 9', 3),
(10, 10, 'Grade 10', 3),
(11, 11, 'Grade 11', 4),
(12, 12, 'Grade 12', 4),
(13, 1, 'College', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `row_id` int(11) NOT NULL,
  `emp_id` char(32) NOT NULL,
  `c_log` text NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`row_id`, `emp_id`, `c_log`, `mod_date`) VALUES
(1, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789012', '2019-01-12 00:00:00'),
(2, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0001-52', '2019-01-12 00:00:00'),
(3, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789013', '2019-01-12 00:00:00'),
(4, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789014', '2019-01-12 00:00:00'),
(6, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0002-52', '2019-01-16 00:00:00'),
(7, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789015', '2019-01-16 00:00:00'),
(8, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0003-52', '2019-01-17 00:00:00'),
(9, '5c3f86c85a1d6', 'Created a new fee: EEP-EL - Early Enrollment Program - 10.00 for 2', '2019-02-02 06:55:44'),
(10, '5c3f86c85a1d6', 'Created a new fee: TFJHS - Tuition Fee - 12,500.00', '2019-02-12 11:14:52'),
(11, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0004-52', '2019-02-22 07:12:05'),
(12, '5c3f86c85a1d6', 'Created a new fee: IDLNEL - ID Lanyard - 200.00', '2019-02-23 09:49:40'),
(13, '5c3f86c85a1d6', 'Created a new fee: MSCJHS - Miscellaneous - 8,550.00', '2019-02-28 04:53:07'),
(14, '5c3f86c85a1d6', 'Created a new fee: CFJHS - Computer Fee - 3,500.00', '2019-02-28 04:53:51'),
(15, '5c3f86c85a1d6', 'Created a new fee: ENJHS - Energy Fee - 3,000.00', '2019-02-28 04:54:28'),
(16, '5c3f86c85a1d6', 'Created a new fee: BKSJHS - Books - Junior High - 6,545.00', '2019-02-28 04:55:06'),
(17, '5c3f86c85a1d6', 'Created a new fee: EDTRJHS - Educational Tour - 2,200.00', '2019-02-28 04:56:15'),
(18, '5c3f86c85a1d6', 'Created a new fee: FDJHS - Foundation T- shirt - 250.00', '2019-02-28 04:58:03'),
(19, '5c3f86c85a1d6', 'Created a new fee: LIPJHS - Learner\'s Insurance Premium - 150.00', '2019-02-28 04:58:24'),
(20, '5c3f86c85a1d6', 'Created a new fee: IDLNJHS - ID Lanyard - 200.00', '2019-02-28 04:59:17'),
(21, '5c3f86c85a1d6', 'Created a new fee: EEP-JHS - Early Enrollment Program - 20.00 for 3', '2019-03-01 08:23:51'),
(22, '5c3f86c85a1d6', 'Created a new fee: Tuition Fee - 12,550.00 for Grade 1', '2019-03-05 05:46:19'),
(23, '5c3f86c85a1d6', 'Created a new fee: Miscellaneous - 8,550.00 for Grade 1', '2019-03-05 05:47:46'),
(24, '5c3f86c85a1d6', 'Created a new fee: Computer Fee - 3,500.00 for Grade 1', '2019-03-05 05:48:06'),
(25, '5c3f86c85a1d6', 'Created a new fee: Energy Fee - 3,000.00 for Grade 1', '2019-03-05 05:48:20'),
(26, '5c3f86c85a1d6', 'Created a new fee: Books - 5,895.00 for Grade 1', '2019-03-05 05:48:51'),
(27, '5c3f86c85a1d6', 'Created a new fee: Educational Tour - 2,200.00 for Grade 1', '2019-03-05 05:49:13'),
(28, '5c3f86c85a1d6', 'Created a new fee: Foundation Day - 250.00 for Grade 1', '2019-03-05 05:49:29'),
(29, '5c3f86c85a1d6', 'Created a new fee: Learner\'s Insurance Premium - 150.00 for Grade 1', '2019-03-05 05:50:34'),
(30, '5c3f86c85a1d6', 'Created a new fee: ID Lanyard - 200.00 for Grade 1', '2019-03-05 05:51:02'),
(31, '5c080710142a2', 'Registered student with LRN/Student ID of 534255555555', '2019-03-09 07:10:19'),
(32, '5c3f86c85a1d6', 'Created a new fee: Tuition Fee - 13,450.00 for Grade 8', '2019-03-09 06:41:45'),
(33, '5c3f86c85a1d6', 'Created a new fee: Miscellaneous - 8,550.00 for Grade 8', '2019-03-09 06:42:02'),
(34, '5c3f86c85a1d6', 'Created a new fee: Computer Fee - 3,500.00 for Grade 8', '2019-03-09 06:42:19'),
(35, '5c3f86c85a1d6', 'Created a new fee: Energy Fee - 3,000.00 for Grade 8', '2019-03-09 06:42:40'),
(36, '5c3f86c85a1d6', 'Created a new fee: Books - 7,335.00 for Grade 8', '2019-03-09 06:42:58'),
(37, '5c3f86c85a1d6', 'Created a new fee: Educational Tour - 2,200.00 for Grade 8', '2019-03-09 06:43:24'),
(38, '5c3f86c85a1d6', 'Created a new fee: Foundation Day - 250.00 for Grade 8', '2019-03-09 06:43:42'),
(39, '5c3f86c85a1d6', 'Created a new fee: Learner\'s Insurance Premium - 150.00 for Grade 8', '2019-03-09 06:44:01'),
(40, '5c3f86c85a1d6', 'Created a new fee: ID Lanyard - 200.00 for Grade 8', '2019-03-09 06:44:21'),
(41, '5c3f86c85a1d6', 'Created a new fee: Tuition Fee - 6,400.00 for Grade 12', '2019-03-10 08:01:32'),
(42, '5c3f86c85a1d6', 'Created a new fee: Miscellaneous - 8,100.00 for Grade 12', '2019-03-10 08:01:54'),
(43, '5c3f86c85a1d6', 'Created a new fee: Laboratory Fee - 3,000.00 for Grade 12', '2019-03-10 08:02:12'),
(44, '5c3f86c85a1d6', 'Created a new fee: Student Handbook - 100.00 for Grade 12', '2019-03-10 08:02:34'),
(45, '5c3f86c85a1d6', 'Created a new fee: Educational Tour - 2,200.00 for Grade 12', '2019-03-10 08:02:49'),
(46, '5c3f86c85a1d6', 'Created a new fee: Foundation Day - 300.00 for Grade 12', '2019-03-10 08:03:05'),
(47, '5c3f86c85a1d6', 'Created a new fee: ID w/ Lanyard - 200.00 for Grade 12', '2019-03-10 08:03:26'),
(48, '5c3f86c85a1d6', 'Created a new fee: Student\'s Physical Examination - 350.00 for Grade 12', '2019-03-10 08:04:09'),
(49, '5c3f86c85a1d6', 'Created a new fee: Acquaintance Party - 300.00 for Grade 12', '2019-03-10 08:04:29'),
(50, '5c3f86c85a1d6', 'Created a new fee: Tuition Fee(per unit) - 400.00 for College', '2019-03-11 10:00:43'),
(51, '5c3f86c85a1d6', 'Created a new fee: Miscellaneous - 6,100.00 for College', '2019-03-11 10:02:32'),
(52, '5c3f86c85a1d6', 'Created a new fee: Computer Fee - 1,500.00 for College', '2019-03-11 10:05:01'),
(53, '5c3f86c85a1d6', 'Created a new fee: Science Laboratory - 1,500.00 for College', '2019-03-11 10:05:13'),
(54, '5c3f86c85a1d6', 'Created a new fee: NSTP - 150.00 for College', '2019-03-11 10:05:25'),
(55, '5c3f86c85a1d6', 'Created a new fee: ID with Lanyard - 200.00 for College', '2019-03-11 10:05:49'),
(56, '5c3f86c85a1d6', 'Created a new fee: Thesis Defense Fee - 400.00 for College', '2019-03-11 10:06:24'),
(57, '5c3f86c85a1d6', 'Created a new fee: Graduation Fee - 3,000.00 for College', '2019-03-11 10:06:46'),
(58, '5c3f86c85a1d6', 'Created a new fee: Year Book - 2,500.00 for College', '2019-03-11 10:06:58'),
(59, '5c3f86c85a1d6', 'Created a new fee: Retreat - 2,500.00 for College', '2019-03-11 10:07:07'),
(60, '5c3f86c85a1d6', 'Created a new fee: Team Building - 2,500.00 for College', '2019-03-11 10:07:36'),
(61, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0005-52', '2019-03-12 05:11:35'),
(62, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789020', '2019-03-12 12:18:02'),
(63, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0006-52', '2019-03-12 12:20:10'),
(64, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0007-52', '2019-03-12 12:43:30'),
(65, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789019', '2019-03-12 01:05:26'),
(66, '5c3f86c85a1d6', 'Created a new fee: Tuition Fee - 12,550.00 for Grade 4', '2019-03-12 01:08:18'),
(67, '5c3f86c85a1d6', 'Created a new fee: Miscellaneous - 8,550.00 for Grade 4', '2019-03-12 01:09:06'),
(68, '5c3f86c85a1d6', 'Created a new fee: Computer Fee - 3,500.00 for Grade 4', '2019-03-12 01:11:20'),
(69, '5c3f86c85a1d6', 'Created a new fee: Energy Fee - 3,000.00 for Grade 4', '2019-03-12 01:11:49'),
(70, '5c3f86c85a1d6', 'Created a new fee: Books - 7,160.00 for Grade 4', '2019-03-12 01:12:27'),
(71, '5c3f86c85a1d6', 'Created a new fee: Educational Tour - 2,200.00 for Grade 4', '2019-03-12 01:12:58'),
(72, '5c3f86c85a1d6', 'Created a new fee: Foundation Tshirt - 250.00 for Grade 4', '2019-03-12 01:13:32'),
(73, '5c3f86c85a1d6', 'Created a new fee: LIP - 150.00 for Grade 4', '2019-03-12 01:13:56'),
(74, '5c3f86c85a1d6', 'Created a new fee: ID Lanyard - 200.00 for Grade 4', '2019-03-12 01:14:20'),
(75, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0008-52', '2019-03-12 01:14:20'),
(76, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0009-52', '2019-03-12 01:24:06'),
(77, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0010-52', '2019-03-12 01:37:48'),
(78, '5c080710142a2', 'Generated assessment for student with LRN/Student ID of 19-0001-52 with Assessment ID of 236541', '2019-03-14 12:31:12'),
(79, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 19-0001-52 with Invoice No.# of 20190314-433898 and with O.R. No# of 113213', '2019-03-14 12:32:52'),
(80, '5c3f86c85a1d6', 'Created a new fee: RET-EL - Retention Promo - 30.00 for 2', '2019-03-14 04:26:49'),
(81, '5c3f86c85a1d6', 'Created a new fee: RET-JH - Retention Promo - 30.00 for 3', '2019-03-14 04:27:05'),
(82, '5c3f86c85a1d6', 'Created a new fee: HighestHon - Highest Honors - 100.00 for 2', '2019-03-14 04:28:48'),
(83, '5c3f86c85a1d6', 'Created a new fee: HighHon - High Honor - 40.00 for 2', '2019-03-14 05:15:28'),
(84, '5c3f86c85a1d6', 'Created a new fee: HON - Honor - 15.00 for 2', '2019-03-14 05:16:03'),
(85, '5c3f86c85a1d6', 'Created a new fee: 1st Daugther/Son - 75.00 for 1', '2019-03-14 05:36:36'),
(86, '5c3f86c85a1d6', 'Created a new fee: 2nd Daughter/Son - 50.00 for 2', '2019-03-14 05:37:12'),
(87, '5c3f86c85a1d6', 'Created a new fee: Niece/Nephew - 50.00 for 2', '2019-03-14 05:39:03'),
(88, '5c3f86c85a1d6', 'Updated academic year to 2019-2020', '2019-03-14 08:07:32'),
(89, '5c3f86c85a1d6', 'Updated semester to  Semester.', '2019-03-14 08:25:50'),
(90, '5c3f86c85a1d6', 'Updated semester to  Semester.', '2019-03-14 08:25:55'),
(91, '5c3f86c85a1d6', 'Updated academic year to 2019-2020', '2019-03-14 08:29:52'),
(92, '5c3f86c85a1d6', 'Updated academic year to 2019-2020', '2019-03-14 08:30:54'),
(93, '5c3f86c85a1d6', 'Updated academic year to 2019-2020', '2019-03-14 08:31:56'),
(94, '5c3f86c85a1d6', 'Updated semester to 1st Semester.', '2019-03-14 08:36:33'),
(95, '5c3f86c85a1d6', 'Updated semester to 2nd Semester.', '2019-03-14 08:36:38'),
(96, '5c3f86c85a1d6', 'Updated academic year to 2018-2019', '2019-03-14 08:39:47'),
(97, '5c3f86c85a1d6', 'Updated semester to 2nd Semester.', '2019-03-14 08:39:52'),
(98, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 19-0001-52 with Invoice No.# of 20190314-800140 and with O.R. No# of 123499', '2019-03-14 09:18:41'),
(99, '5c080710142a2', 'Generated assessment for student with LRN/Student ID of  with Assessment ID of 322894', '2019-03-15 08:26:49'),
(100, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 19-0001-52 with Invoice No.# of 20190315-990851 and with O.R. No# of 312321', '2019-03-15 03:37:09'),
(101, '5c080710142a2', 'Registered student with LRN/Student ID of ', '2019-03-15 09:39:01'),
(102, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 123456789012 with Invoice No.# of 20190316-673945 and with O.R. No# of 565564', '2019-03-16 11:01:06'),
(103, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 123456789013 with Invoice No.# of 20190316-052455 and with O.R. No# of 213213', '2019-03-16 02:20:44'),
(104, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 123456789014 with Invoice No.# of 20190316-664742 and with O.R. No# of 432531', '2019-03-16 03:53:19'),
(105, '5c3f86c85a1d6', 'Created a new fee: Working Student - 20.00 for 5', '2019-03-19 11:47:09'),
(106, '5c080710142a2', 'Generated assessment for student with LRN/Student ID of 19-0010-52 with Assessment ID of 647620', '2019-03-20 12:45:57'),
(107, '5c080710142a2', 'Registered student with LRN/Student ID of 432144343241', '2019-03-20 12:53:31'),
(108, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 123456789013 with Invoice No.# of 20190320-821788 and with O.R. No# of 654654', '2019-03-20 02:14:22'),
(109, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 19-0001-52 with Invoice No.# of 20190320-928491 and with O.R. No# of 414234', '2019-03-20 03:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payables_info`
--

CREATE TABLE `tbl_payables_info` (
  `rowID` int(11) NOT NULL,
  `studID` char(20) NOT NULL,
  `gradeLevel` varchar(10) NOT NULL,
  `assessmentID` int(6) NOT NULL,
  `payables` varchar(20) NOT NULL,
  `amountDue` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payables_info`
--

INSERT INTO `tbl_payables_info` (`rowID`, `studID`, `gradeLevel`, `assessmentID`, `payables`, `amountDue`) VALUES
(1, '19-0001-52', '4th Yr', 236541, 'uponEnroll', '5000.00'),
(2, '19-0001-52', '4th Yr', 236541, 'prelim', '8866.67'),
(3, '19-0001-52', '4th Yr', 236541, 'midterm', '8866.67'),
(4, '19-0001-52', '4th Yr', 236541, 'finals', '8866.67'),
(5, '123456789012', 'Grade 1', 742309, 'uponEnroll', '31275.00'),
(6, '534255555555', 'Grade 1', 85571, 'uponEnroll', '9498.00'),
(7, '534255555555', 'Grade 1', 85571, 'july', '1583.00'),
(8, '534255555555', 'Grade 1', 85571, 'august', '1583.00'),
(9, '534255555555', 'Grade 1', 85571, 'september', '1583.00'),
(10, '534255555555', 'Grade 1', 85571, 'october', '1583.00'),
(11, '534255555555', 'Grade 1', 85571, 'november', '1583.00'),
(12, '534255555555', 'Grade 1', 85571, 'december', '1583.00'),
(13, '534255555555', 'Grade 1', 85571, 'january', '1583.00'),
(14, '534255555555', 'Grade 1', 85571, 'february', '1583.00'),
(15, '534255555555', 'Grade 1', 85571, 'march', '1583.00'),
(16, '123456789013', 'Grade 8', 725982, 'uponEnroll', '28290.00'),
(17, '123456789019', 'Grade 4', 322894, 'uponEnroll', '25010.00'),
(18, '123456789014', 'Grade 12', 720327, 'uponEnroll', '9300.00'),
(19, '123456789014', 'Grade 12', 720327, 'july', '1165.00'),
(20, '123456789014', 'Grade 12', 720327, 'august', '1165.00'),
(21, '123456789014', 'Grade 12', 720327, 'september', '1165.00'),
(22, '123456789014', 'Grade 12', 720327, 'october', '1165.00'),
(23, '123456789014', 'Grade 12', 720327, 'november', '1165.00'),
(24, '123456789014', 'Grade 12', 720327, 'december', '1165.00'),
(25, '123456789014', 'Grade 12', 720327, 'january', '1165.00'),
(26, '123456789014', 'Grade 12', 720327, 'february', '1165.00'),
(27, '123456789014', 'Grade 12', 720327, 'march', '1165.00'),
(28, '19-0010-52', '1st Yr', 647620, 'uponEnroll', '5000.00'),
(29, '19-0010-52', '1st Yr', 647620, 'prelim', '4876.67'),
(30, '19-0010-52', '1st Yr', 647620, 'midterm', '4876.67'),
(31, '19-0010-52', '1st Yr', 647620, 'finals', '4876.67');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `row_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`row_id`, `sem_id`, `semester`, `status`) VALUES
(1, 1, '1st', 0),
(2, 2, '2nd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shs_strand`
--

CREATE TABLE `tbl_shs_strand` (
  `row_id` int(11) NOT NULL,
  `strnd_id` int(11) NOT NULL,
  `trk_id` int(11) NOT NULL,
  `strand` varchar(20) NOT NULL,
  `strand_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shs_strand`
--

INSERT INTO `tbl_shs_strand` (`row_id`, `strnd_id`, `trk_id`, `strand`, `strand_name`) VALUES
(1, 1, 1, 'ABM', 'Accountancy, Business and Managment'),
(2, 2, 1, 'GAS', 'General Academic Strand'),
(3, 3, 1, 'HUMSS', 'Humanities and Social Sciences'),
(4, 4, 2, 'HE', 'Home Economics'),
(5, 5, 2, 'ICT', 'Information and Communications Technology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shs_track`
--

CREATE TABLE `tbl_shs_track` (
  `row_id` int(11) NOT NULL,
  `trk_id` int(11) NOT NULL,
  `track` varchar(10) NOT NULL,
  `track_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shs_track`
--

INSERT INTO `tbl_shs_track` (`row_id`, `trk_id`, `track`, `track_name`) VALUES
(1, 1, 'Academic', 'Academic Track'),
(2, 2, 'TechVoc', 'Technical Vocational Track');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info_col`
--

CREATE TABLE `tbl_stud_adtnl_info_col` (
  `row_id` int(11) NOT NULL,
  `stud_id` char(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_tnum` bigint(20) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_col`
--

INSERT INTO `tbl_stud_adtnl_info_col` (`row_id`, `stud_id`, `stud_grdns_name`, `stud_grdns_tnum`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, '19-0001-52', 'Nanay Ochoa', 0, 9121234567, 'sample'),
(3, '19-0002-52', 'Amelia A. Quebral', 0, 9229298026, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna'),
(4, '19-0003-52', 'Eric Lehnsherr', 0, 639561234567, 'Sokovia'),
(5, '19-0004-52', 'nanay nikas', 1223467, 12424214142, 'dito lang sa dulo'),
(6, '19-0005-52', 'papito pepito', 1234321, 9265403493, 'San Pedro, Laguna'),
(7, '19-0006-52', 'Vicente', 1234322, 9265403493, 'Binan Laguna'),
(8, '19-0007-52', 'Joy Vista', 2324234, 9734635644, 'Binan Laguna'),
(9, '19-0008-52', 'Vilma Montoya', 1234321, 9265403493, 'Binan Laguna'),
(10, '19-0009-52', 'Michael maliquid', 1234321, 9265403493, 'sta.rosa laguna'),
(11, '19-0010-52', 'malou curry', 1234321, 9265403493, 'San Pedro, Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info_elem`
--

CREATE TABLE `tbl_stud_adtnl_info_elem` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_tnum` bigint(20) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_elem`
--

INSERT INTO `tbl_stud_adtnl_info_elem` (`row_id`, `stud_lrn`, `stud_grdns_name`, `stud_grdns_tnum`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, 123456789012, 'Maria Dela Cruz', 0, 9229298026, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna'),
(2, 123456789015, 'adelaida dela cruz', 0, 9123456789, 'dyan sa tabi'),
(3, 534255555555, 'papito pepito', 1234321, 9265403493, 'Tagapo'),
(4, 123456789020, 'Tita Judith', 0, 0, 'Muntinlupa'),
(5, 123456789019, 'Jinky Ochoa', 0, 9265403493, 'sta.rosa laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info_jhs`
--

CREATE TABLE `tbl_stud_adtnl_info_jhs` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_tnum` bigint(20) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_jhs`
--

INSERT INTO `tbl_stud_adtnl_info_jhs` (`row_id`, `stud_lrn`, `stud_grdns_name`, `stud_grdns_tnum`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, 123456789013, 'Rebecca Bucayan', 0, 9121234567, '#16 Kamagong St. Pacita Complex 1 San Pedro City Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info_shs`
--

CREATE TABLE `tbl_stud_adtnl_info_shs` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_tnum` bigint(20) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_shs`
--

INSERT INTO `tbl_stud_adtnl_info_shs` (`row_id`, `stud_lrn`, `stud_grdns_name`, `stud_grdns_tnum`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, 123456789014, 'Wilmina Fajardo', 0, 9121234567, 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna'),
(2, 432144343241, 'nanay nikas', 1223467, 12424214142, 'dito lang sa dulo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_documents`
--

CREATE TABLE `tbl_stud_documents` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `bCertPSA` tinyint(4) NOT NULL,
  `certGMC` tinyint(4) NOT NULL,
  `certHonDis` tinyint(4) NOT NULL,
  `frm137` tinyint(4) NOT NULL,
  `frm138` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_documents`
--

INSERT INTO `tbl_stud_documents` (`row_id`, `stud_lrn`, `bCertPSA`, `certGMC`, `certHonDis`, `frm137`, `frm138`) VALUES
(1, 123456789012, 1, 1, 1, 1, 1),
(2, 123456789015, 1, 1, 1, 1, 1),
(3, 534255555555, 1, 1, 1, 1, 1),
(4, 123456789020, 1, 0, 0, 1, 0),
(5, 123456789019, 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_documents_col`
--

CREATE TABLE `tbl_stud_documents_col` (
  `row_id` int(11) NOT NULL,
  `stud_id` char(12) NOT NULL,
  `bCertPSA` tinyint(4) NOT NULL,
  `certGMC` tinyint(4) NOT NULL,
  `certHonDis` tinyint(4) NOT NULL,
  `frm137` tinyint(4) NOT NULL,
  `frm138` tinyint(4) NOT NULL,
  `TOR` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_documents_col`
--

INSERT INTO `tbl_stud_documents_col` (`row_id`, `stud_id`, `bCertPSA`, `certGMC`, `certHonDis`, `frm137`, `frm138`, `TOR`) VALUES
(1, '19-0001-52', 1, 1, 1, 1, 1, 0),
(3, '19-0002-52', 1, 1, 1, 1, 1, 0),
(4, '19-0003-52', 1, 1, 1, 1, 1, 1),
(5, '19-0004-52', 1, 1, 1, 1, 1, 1),
(6, '19-0005-52', 1, 0, 0, 1, 0, 0),
(7, '19-0006-52', 1, 0, 0, 1, 0, 0),
(8, '19-0007-52', 1, 0, 0, 1, 0, 0),
(9, '19-0008-52', 1, 1, 0, 1, 1, 0),
(10, '19-0009-52', 1, 1, 0, 1, 1, 0),
(11, '19-0010-52', 1, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_documents_jhs`
--

CREATE TABLE `tbl_stud_documents_jhs` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `bCertPSA` tinyint(4) NOT NULL,
  `certGMC` tinyint(4) NOT NULL,
  `certHonDis` tinyint(4) NOT NULL,
  `frm137` tinyint(4) NOT NULL,
  `frm138` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_documents_jhs`
--

INSERT INTO `tbl_stud_documents_jhs` (`row_id`, `stud_lrn`, `bCertPSA`, `certGMC`, `certHonDis`, `frm137`, `frm138`) VALUES
(1, 123456789013, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_documents_shs`
--

CREATE TABLE `tbl_stud_documents_shs` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `bCertPSA` tinyint(4) NOT NULL,
  `certGMC` tinyint(4) NOT NULL,
  `certHonDis` tinyint(4) NOT NULL,
  `frm137` tinyint(4) NOT NULL,
  `frm138` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_documents_shs`
--

INSERT INTO `tbl_stud_documents_shs` (`row_id`, `stud_lrn`, `bCertPSA`, `certGMC`, `certHonDis`, `frm137`, `frm138`) VALUES
(1, 123456789014, 1, 1, 0, 1, 1),
(2, 432144343241, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_info_col`
--

CREATE TABLE `tbl_stud_info_col` (
  `row_id` int(11) NOT NULL,
  `stud_id` char(12) NOT NULL,
  `stud_avatar` char(50) NOT NULL,
  `stud_lname` varchar(255) NOT NULL,
  `stud_fname` varchar(255) NOT NULL,
  `stud_mname` varchar(255) NOT NULL,
  `stud_status` char(50) NOT NULL,
  `stud_rgstrtn_dte` date NOT NULL,
  `stud_year_lvl` varchar(10) NOT NULL,
  `stud_sem` int(11) NOT NULL,
  `stud_course` int(11) NOT NULL,
  `stud_acad_yr` int(11) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `stud_bdate` date NOT NULL,
  `stud_tnum` bigint(20) NOT NULL,
  `stud_cnum` bigint(20) NOT NULL,
  `stud_gender` int(11) NOT NULL,
  `stud_cur_adrs` text NOT NULL,
  `stud_perm_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_info_col`
--

INSERT INTO `tbl_stud_info_col` (`row_id`, `stud_id`, `stud_avatar`, `stud_lname`, `stud_fname`, `stud_mname`, `stud_status`, `stud_rgstrtn_dte`, `stud_year_lvl`, `stud_sem`, `stud_course`, `stud_acad_yr`, `stud_email`, `stud_bdate`, `stud_tnum`, `stud_cnum`, `stud_gender`, `stud_cur_adrs`, `stud_perm_adrs`) VALUES
(1, '19-0001-52', '5c98aaebe1569.jpg', 'Ochoa', 'Cara', 'Martillosa', 'enrolled', '2019-01-12', '4th Yr', 2, 3, 1, '', '1997-04-28', 0, 0, 2, 'sample', 'sample'),
(3, '19-0002-52', '', 'Quebral', 'Jonathan', 'Almodiel', 'registered', '2019-01-16', '4th Yr', 2, 3, 1, 'jonathan.almodiel.quebral@gmail.com', '1992-06-27', 0, 9566031598, 1, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna', 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna'),
(5, '19-0003-52', '', 'Maximoff', 'Wanda', '', 'registered', '2019-01-17', '2nd Yr', 2, 1, 1, 'wanda.maximoff@gmail.com', '1992-02-06', 0, 0, 2, 'Sokovia', 'Sokovia'),
(11, '19-0004-52', '', 'Español', 'Kastin', '', 'registered', '2019-02-22', '4th Yr', 2, 3, 1, 'kas.español@gmail.com', '1998-12-30', 0, 0, 2, 'dito lang sa dulo', 'dito lang sa dulo'),
(12, '19-0005-52', '', 'Padlan', 'Malou', 'Vargas', 'registered', '2019-03-12', '1st Yr', 2, 3, 1, '', '1999-02-01', 0, 0, 2, 'San Pedro, Laguna', 'San Pedro, Laguna'),
(13, '19-0006-52', '', 'Canillo', 'Wendy', 'Carcer', 'registered', '2019-03-12', '2nd Yr', 2, 3, 1, '', '1999-03-11', 0, 0, 2, 'Binan, Laguna', 'Binan, Laguna'),
(14, '19-0007-52', '', 'Vista', 'Jake', 'Baluyot ', 'registered', '2019-03-12', '3rd Yr', 2, 3, 1, 'mikhailalon21@gmail.com', '1998-11-29', 0, 9357650034, 1, 'Binan, Laguna', 'Binan, Laguna'),
(15, '19-0008-52', '', 'Montoya', 'Jhonas Vincent', 'Canillo', 'registered', '2019-03-12', '1st Yr', 2, 3, 1, 'montoyajhonas@yahoo.com', '1999-02-23', 0, 9974454906, 1, 'Binan, Laguna', 'Binan, Laguna'),
(16, '19-0009-52', '', 'Maliquid', 'Zaira Ann', 'Pidlaoan', 'registered', '2019-03-12', '1st Yr', 2, 3, 1, 'zairaannmaliquid@gmail.com', '1999-10-14', 0, 9358514271, 2, 'sta.rosa laguna', 'sta.rosa laguna'),
(17, '19-0010-52', '', 'curry', 'Malou', 'stephen', 'registered', '2019-03-12', '1st Yr', 2, 3, 1, 'curry@yahoo.com', '1999-04-28', 0, 9358514271, 2, 'San Pedro, Laguna', 'San Pedro, Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_info_elem`
--

CREATE TABLE `tbl_stud_info_elem` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_avatar` char(50) NOT NULL,
  `stud_lname` varchar(255) NOT NULL,
  `stud_fname` varchar(255) NOT NULL,
  `stud_mname` varchar(255) NOT NULL,
  `stud_status` char(50) NOT NULL,
  `stud_rgstrtn_dte` date NOT NULL,
  `stud_grade_lvl` varchar(10) NOT NULL,
  `stud_section` varchar(50) NOT NULL,
  `stud_acad_yr` int(11) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `stud_bdate` date NOT NULL,
  `stud_tnum` bigint(20) NOT NULL,
  `stud_cnum` bigint(20) NOT NULL,
  `stud_gender` int(11) NOT NULL,
  `stud_cur_adrs` text NOT NULL,
  `stud_perm_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_info_elem`
--

INSERT INTO `tbl_stud_info_elem` (`row_id`, `stud_lrn`, `stud_avatar`, `stud_lname`, `stud_fname`, `stud_mname`, `stud_status`, `stud_rgstrtn_dte`, `stud_grade_lvl`, `stud_section`, `stud_acad_yr`, `stud_email`, `stud_bdate`, `stud_tnum`, `stud_cnum`, `stud_gender`, `stud_cur_adrs`, `stud_perm_adrs`) VALUES
(1, 123456789012, '5c98a3b8559a5.jpg', 'Dela Cruz', 'Juan', '', 'enrolled', '2019-01-12', 'Grade 1', '', 1, '', '2013-02-06', 0, 0, 1, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna', 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna'),
(2, 123456789015, '', 'Dela Cruz', 'Leonor', 'Rivera', 'registered', '2019-01-16', 'Grade 3', '', 1, '', '2010-09-21', 0, 0, 2, 'dyan sa tabi', 'dyan sa tabi'),
(4, 534255555555, '', 'What', 'If', '', 'registered', '2019-03-09', 'Grade 1', '', 1, '', '2019-03-09', 0, 0, 1, 'Tagapo', 'Tagapo'),
(5, 123456789020, '', 'Espanol', 'Kastin', 'Toledo', 'registered', '2019-03-12', 'Grade 4', '', 1, '', '1998-10-12', 0, 0, 2, 'Muntinlupa', 'Muntinlupa'),
(8, 123456789019, '', 'ochoa', 'cara', 'ochoa', 'registered', '2019-03-12', 'Grade 4', '', 1, 'ochoacara@gmail.com', '1998-04-28', 0, 9358514271, 2, 'blk 9 lot 15 rosewood village tagapo sta.rosa laguna', 'blk 9 lot 15 rosewood village tagapo sta.rosa laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_info_jhs`
--

CREATE TABLE `tbl_stud_info_jhs` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_avatar` char(50) NOT NULL,
  `stud_lname` varchar(255) NOT NULL,
  `stud_fname` varchar(255) NOT NULL,
  `stud_mname` varchar(255) NOT NULL,
  `stud_status` char(50) NOT NULL,
  `stud_rgstrtn_dte` date NOT NULL,
  `stud_grade_lvl` varchar(10) NOT NULL,
  `stud_section` varchar(50) NOT NULL,
  `stud_acad_yr` int(11) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `stud_bdate` date NOT NULL,
  `stud_tnum` bigint(20) NOT NULL,
  `stud_cnum` bigint(20) NOT NULL,
  `stud_gender` int(11) NOT NULL,
  `stud_cur_adrs` text NOT NULL,
  `stud_perm_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_info_jhs`
--

INSERT INTO `tbl_stud_info_jhs` (`row_id`, `stud_lrn`, `stud_avatar`, `stud_lname`, `stud_fname`, `stud_mname`, `stud_status`, `stud_rgstrtn_dte`, `stud_grade_lvl`, `stud_section`, `stud_acad_yr`, `stud_email`, `stud_bdate`, `stud_tnum`, `stud_cnum`, `stud_gender`, `stud_cur_adrs`, `stud_perm_adrs`) VALUES
(1, 123456789013, '5c98a878b4e69.jpg', 'Tornea', 'Erick Joseph', 'Bucayan', 'enrolled', '2019-01-12', 'Grade 8', '', 1, 'ericktornea@yahoo.com', '2006-06-19', 0, 0, 1, '#16 Kamagong St. Pacita Complex 1 San Pedro City Laguna', '#16 Kamagong St. Pacita Complex 1 San Pedro City Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_info_shs`
--

CREATE TABLE `tbl_stud_info_shs` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_avatar` char(50) NOT NULL,
  `stud_lname` varchar(255) NOT NULL,
  `stud_fname` varchar(255) NOT NULL,
  `stud_mname` varchar(255) NOT NULL,
  `stud_status` char(50) NOT NULL,
  `stud_rgstrtn_dte` date NOT NULL,
  `stud_grade_lvl` varchar(10) NOT NULL,
  `stud_trk_id` int(11) NOT NULL,
  `stud_strnd_id` int(11) NOT NULL,
  `stud_section` varchar(50) NOT NULL,
  `stud_acad_yr` int(11) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `stud_bdate` date NOT NULL,
  `stud_tnum` bigint(20) NOT NULL,
  `stud_cnum` bigint(20) NOT NULL,
  `stud_gender` int(11) NOT NULL,
  `stud_cur_adrs` text NOT NULL,
  `stud_perm_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_info_shs`
--

INSERT INTO `tbl_stud_info_shs` (`row_id`, `stud_lrn`, `stud_avatar`, `stud_lname`, `stud_fname`, `stud_mname`, `stud_status`, `stud_rgstrtn_dte`, `stud_grade_lvl`, `stud_trk_id`, `stud_strnd_id`, `stud_section`, `stud_acad_yr`, `stud_email`, `stud_bdate`, `stud_tnum`, `stud_cnum`, `stud_gender`, `stud_cur_adrs`, `stud_perm_adrs`) VALUES
(1, 123456789014, '5c98a97896a83.jpg', 'Fajardo', 'Bernard Mico', 'Tulabut', 'enrolled', '2019-01-12', 'Grade 12', 2, 5, '', 1, 'bmfajardo@gmail.com', '1999-12-11', 0, 0, 1, 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna', 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna'),
(2, 432144343241, '', 'Chuchu', 'chacha', 'cheche', 'registered', '2019-03-20', 'Grade 12', 1, 2, '', 1, '', '2015-12-31', 0, 0, 1, 'dito lang sa dulo', 'dito lang sa dulo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_tbl`
--

CREATE TABLE `tbl_transaction_tbl` (
  `rowID` int(11) NOT NULL,
  `assessmentRowId` int(2) NOT NULL,
  `assessmentID` int(6) NOT NULL,
  `studid` char(12) NOT NULL,
  `emp_uniq_id` char(32) NOT NULL,
  `transDate` datetime NOT NULL,
  `invoiceNum` char(15) NOT NULL,
  `orNum` bigint(6) NOT NULL,
  `amountPaid` decimal(10,2) NOT NULL,
  `balanceAmt` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction_tbl`
--

INSERT INTO `tbl_transaction_tbl` (`rowID`, `assessmentRowId`, `assessmentID`, `studid`, `emp_uniq_id`, `transDate`, `invoiceNum`, `orNum`, `amountPaid`, `balanceAmt`) VALUES
(1, 1, 236541, '19-0001-52', '5c40dd75c74fc', '2019-03-14 12:32:52', '20190314-433898', 113213, '5000.00', '0.00'),
(2, 2, 236541, '19-0001-52', '5c40dd75c74fc', '2019-03-14 09:18:40', '20190314-800140', 123499, '5000.00', '3866.67'),
(3, 2, 236541, '19-0001-52', '5c40dd75c74fc', '2019-03-15 03:37:09', '20190315-990851', 312321, '2000.00', '1866.67'),
(4, 5, 742309, '123456789012', '5c40dd75c74fc', '2019-03-16 11:01:06', '20190316-673945', 565564, '31275.00', '0.00'),
(5, 16, 725982, '123456789013', '5c40dd75c74fc', '2019-03-16 02:20:44', '20190316-052455', 213213, '25000.00', '3290.00'),
(6, 18, 720327, '123456789014', '5c40dd75c74fc', '2019-03-16 03:53:19', '20190316-664742', 432531, '9300.00', '0.00'),
(7, 16, 725982, '123456789013', '5c40dd75c74fc', '2019-03-20 02:14:22', '20190320-821788', 654654, '3500.00', '0.00'),
(8, 2, 236541, '19-0001-52', '5c40dd75c74fc', '2019-03-20 03:01:28', '20190320-928491', 414234, '1900.00', '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acad_year`
--
ALTER TABLE `tbl_acad_year`
  ADD PRIMARY KEY (`acad_id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `emp_uniq_id` (`emp_uniq_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `tbl_act_type`
--
ALTER TABLE `tbl_act_type`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `role_id` (`role_id`);

--
-- Indexes for table `tbl_assessment_info`
--
ALTER TABLE `tbl_assessment_info`
  ADD PRIMARY KEY (`rowID`),
  ADD UNIQUE KEY `paymentID` (`assessmentID`),
  ADD KEY `studID` (`studID`),
  ADD KEY `discount` (`discount`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tbl_col_course`
--
ALTER TABLE `tbl_col_course`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `dept_id` (`dept_id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `disc_for` (`disc_for`);

--
-- Indexes for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `fee_for` (`fee_for`);

--
-- Indexes for table `tbl_feespayables_info`
--
ALTER TABLE `tbl_feespayables_info`
  ADD PRIMARY KEY (`rowID`),
  ADD KEY `studID` (`studID`),
  ADD KEY `paymentID` (`assessmentID`),
  ADD KEY `feeId` (`feeId`);

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `gdr_id` (`gdr_id`);

--
-- Indexes for table `tbl_grd_level`
--
ALTER TABLE `tbl_grd_level`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `grd_id` (`grd_id`) USING BTREE;

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `emp_id` (`emp_id`);
ALTER TABLE `tbl_logs` ADD FULLTEXT KEY `c_log` (`c_log`);

--
-- Indexes for table `tbl_payables_info`
--
ALTER TABLE `tbl_payables_info`
  ADD PRIMARY KEY (`rowID`),
  ADD KEY `studID` (`studID`),
  ADD KEY `paymentID` (`assessmentID`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `sem_id` (`sem_id`);

--
-- Indexes for table `tbl_shs_strand`
--
ALTER TABLE `tbl_shs_strand`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `strnd_id` (`strnd_id`),
  ADD KEY `trk_id` (`trk_id`);

--
-- Indexes for table `tbl_shs_track`
--
ALTER TABLE `tbl_shs_track`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `trk_id` (`trk_id`);

--
-- Indexes for table `tbl_stud_adtnl_info_col`
--
ALTER TABLE `tbl_stud_adtnl_info_col`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `stud_lrn` (`stud_id`);

--
-- Indexes for table `tbl_stud_adtnl_info_elem`
--
ALTER TABLE `tbl_stud_adtnl_info_elem`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `stud_lrn` (`stud_lrn`);

--
-- Indexes for table `tbl_stud_adtnl_info_jhs`
--
ALTER TABLE `tbl_stud_adtnl_info_jhs`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `stud_lrn` (`stud_lrn`);

--
-- Indexes for table `tbl_stud_adtnl_info_shs`
--
ALTER TABLE `tbl_stud_adtnl_info_shs`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `stud_lrn` (`stud_lrn`);

--
-- Indexes for table `tbl_stud_documents`
--
ALTER TABLE `tbl_stud_documents`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `stud_id` (`stud_lrn`);

--
-- Indexes for table `tbl_stud_documents_col`
--
ALTER TABLE `tbl_stud_documents_col`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `tbl_stud_documents_jhs`
--
ALTER TABLE `tbl_stud_documents_jhs`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `stud_id` (`stud_lrn`);

--
-- Indexes for table `tbl_stud_documents_shs`
--
ALTER TABLE `tbl_stud_documents_shs`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `stud_id` (`stud_lrn`);

--
-- Indexes for table `tbl_stud_info_col`
--
ALTER TABLE `tbl_stud_info_col`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`) USING BTREE,
  ADD KEY `stud_acad_yr` (`stud_acad_yr`),
  ADD KEY `stud_sem` (`stud_sem`),
  ADD KEY `stud_course` (`stud_course`),
  ADD KEY `stud_gender` (`stud_gender`);

--
-- Indexes for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`),
  ADD KEY `stud_gender` (`stud_gender`);

--
-- Indexes for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`),
  ADD KEY `stud_gender` (`stud_gender`);

--
-- Indexes for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`),
  ADD KEY `stud_trk_id` (`stud_trk_id`),
  ADD KEY `stud_strnd_id` (`stud_strnd_id`),
  ADD KEY `stud_gender` (`stud_gender`);

--
-- Indexes for table `tbl_transaction_tbl`
--
ALTER TABLE `tbl_transaction_tbl`
  ADD PRIMARY KEY (`rowID`),
  ADD KEY `assessmentRowId` (`assessmentRowId`),
  ADD KEY `assessmentID` (`assessmentID`),
  ADD KEY `studid` (`studid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_acad_year`
--
ALTER TABLE `tbl_acad_year`
  MODIFY `acad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_act_type`
--
ALTER TABLE `tbl_act_type`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_assessment_info`
--
ALTER TABLE `tbl_assessment_info`
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_col_course`
--
ALTER TABLE `tbl_col_course`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_feespayables_info`
--
ALTER TABLE `tbl_feespayables_info`
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_grd_level`
--
ALTER TABLE `tbl_grd_level`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_payables_info`
--
ALTER TABLE `tbl_payables_info`
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_shs_strand`
--
ALTER TABLE `tbl_shs_strand`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_shs_track`
--
ALTER TABLE `tbl_shs_track`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_col`
--
ALTER TABLE `tbl_stud_adtnl_info_col`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_elem`
--
ALTER TABLE `tbl_stud_adtnl_info_elem`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_jhs`
--
ALTER TABLE `tbl_stud_adtnl_info_jhs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_shs`
--
ALTER TABLE `tbl_stud_adtnl_info_shs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stud_documents`
--
ALTER TABLE `tbl_stud_documents`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_col`
--
ALTER TABLE `tbl_stud_documents_col`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_jhs`
--
ALTER TABLE `tbl_stud_documents_jhs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_shs`
--
ALTER TABLE `tbl_stud_documents_shs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stud_info_col`
--
ALTER TABLE `tbl_stud_info_col`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaction_tbl`
--
ALTER TABLE `tbl_transaction_tbl`
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD CONSTRAINT `tbl_accounts_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tbl_act_type` (`role_id`);

--
-- Constraints for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD CONSTRAINT `tbl_discount_ibfk_1` FOREIGN KEY (`disc_for`) REFERENCES `tbl_departments` (`dept_id`);

--
-- Constraints for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD CONSTRAINT `tbl_logs_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `tbl_accounts` (`emp_uniq_id`);

--
-- Constraints for table `tbl_shs_strand`
--
ALTER TABLE `tbl_shs_strand`
  ADD CONSTRAINT `tbl_shs_strand_ibfk_1` FOREIGN KEY (`trk_id`) REFERENCES `tbl_shs_track` (`trk_id`);

--
-- Constraints for table `tbl_stud_adtnl_info_col`
--
ALTER TABLE `tbl_stud_adtnl_info_col`
  ADD CONSTRAINT `tbl_stud_adtnl_info_col_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `tbl_stud_info_col` (`stud_id`);

--
-- Constraints for table `tbl_stud_adtnl_info_elem`
--
ALTER TABLE `tbl_stud_adtnl_info_elem`
  ADD CONSTRAINT `tbl_stud_adtnl_info_elem_ibfk_1` FOREIGN KEY (`stud_lrn`) REFERENCES `tbl_stud_info_elem` (`stud_lrn`);

--
-- Constraints for table `tbl_stud_adtnl_info_jhs`
--
ALTER TABLE `tbl_stud_adtnl_info_jhs`
  ADD CONSTRAINT `tbl_stud_adtnl_info_jhs_ibfk_1` FOREIGN KEY (`stud_lrn`) REFERENCES `tbl_stud_info_jhs` (`stud_lrn`);

--
-- Constraints for table `tbl_stud_adtnl_info_shs`
--
ALTER TABLE `tbl_stud_adtnl_info_shs`
  ADD CONSTRAINT `tbl_stud_adtnl_info_shs_ibfk_1` FOREIGN KEY (`stud_lrn`) REFERENCES `tbl_stud_info_shs` (`stud_lrn`);

--
-- Constraints for table `tbl_stud_documents`
--
ALTER TABLE `tbl_stud_documents`
  ADD CONSTRAINT `tbl_stud_documents_ibfk_1` FOREIGN KEY (`stud_lrn`) REFERENCES `tbl_stud_info_elem` (`stud_lrn`);

--
-- Constraints for table `tbl_stud_documents_col`
--
ALTER TABLE `tbl_stud_documents_col`
  ADD CONSTRAINT `tbl_stud_documents_col_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `tbl_stud_info_col` (`stud_id`);

--
-- Constraints for table `tbl_stud_documents_jhs`
--
ALTER TABLE `tbl_stud_documents_jhs`
  ADD CONSTRAINT `tbl_stud_documents_jhs_ibfk_1` FOREIGN KEY (`stud_lrn`) REFERENCES `tbl_stud_info_jhs` (`stud_lrn`);

--
-- Constraints for table `tbl_stud_documents_shs`
--
ALTER TABLE `tbl_stud_documents_shs`
  ADD CONSTRAINT `tbl_stud_documents_shs_ibfk_1` FOREIGN KEY (`stud_lrn`) REFERENCES `tbl_stud_info_shs` (`stud_lrn`);

--
-- Constraints for table `tbl_stud_info_col`
--
ALTER TABLE `tbl_stud_info_col`
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_1` FOREIGN KEY (`stud_acad_yr`) REFERENCES `tbl_acad_year` (`acad_id`),
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_2` FOREIGN KEY (`stud_sem`) REFERENCES `tbl_semester` (`sem_id`),
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_3` FOREIGN KEY (`stud_course`) REFERENCES `tbl_col_course` (`course_id`),
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_5` FOREIGN KEY (`stud_gender`) REFERENCES `tbl_gender` (`gdr_id`);

--
-- Constraints for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  ADD CONSTRAINT `tbl_stud_info_elem_ibfk_1` FOREIGN KEY (`stud_acad_yr`) REFERENCES `tbl_acad_year` (`acad_id`),
  ADD CONSTRAINT `tbl_stud_info_elem_ibfk_2` FOREIGN KEY (`stud_gender`) REFERENCES `tbl_gender` (`gdr_id`);

--
-- Constraints for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  ADD CONSTRAINT `tbl_stud_info_shs_ibfk_2` FOREIGN KEY (`stud_strnd_id`) REFERENCES `tbl_shs_strand` (`strnd_id`),
  ADD CONSTRAINT `tbl_stud_info_shs_ibfk_3` FOREIGN KEY (`stud_trk_id`) REFERENCES `tbl_shs_track` (`trk_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
