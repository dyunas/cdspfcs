-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 01:42 PM
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
(1, '123456789102', 'Grade 1', 0, 939098, 'MINIMUM', 3, '30.00', '3765.00', '0.00', '0.00', 0, '0.00', 0, 0, '36295.00', '32530.00'),
(2, '19-0001-52', '4th Yr', 3, 730763, 'INSTALLMENT', 0, '0.00', '0.00', '0.00', '0.00', 0, '0.00', 9, 1, '20200.00', '20200.00');

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
(1, '123456789102', 939098, 1),
(2, '123456789102', 939098, 2),
(3, '123456789102', 939098, 3),
(4, '123456789102', 939098, 4),
(5, '123456789102', 939098, 5),
(6, '123456789102', 939098, 6),
(7, '123456789102', 939098, 7),
(8, '123456789102', 939098, 8),
(9, '123456789102', 939098, 9),
(10, '19-0001-52', 730763, 28),
(11, '19-0001-52', 730763, 29),
(12, '19-0001-52', 730763, 34),
(13, '19-0001-52', 730763, 35),
(14, '19-0001-52', 730763, 36),
(15, '19-0001-52', 730763, 37),
(16, '19-0001-52', 730763, 38);

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
(1, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789101', '2019-03-29 03:40:11'),
(2, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0001-52', '2019-03-29 03:43:15'),
(3, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789102', '2019-03-29 03:45:59'),
(4, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789013', '2019-03-29 03:50:06'),
(5, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789104', '2019-03-29 03:53:20'),
(6, '5c3f86c85a1d6', 'Generated assessment for student with LRN/Student ID of  with Assessment ID of 939098', '2019-03-29 03:55:39'),
(7, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 123456789102 with Invoice No.# of 20190329-907611 and with O.R. No# of 123456', '2019-03-29 03:57:49'),
(8, '5c3f86c85a1d6', 'Generated assessment for student with LRN/Student ID of 19-0001-52 with Assessment ID of 730763', '2019-03-29 03:59:42'),
(9, '5c40dd75c74fc', 'Processed payment of student with LRN/Student ID of 19-0001-52 with Invoice No.# of 20190329-351679 and with O.R. No# of 123457', '2019-03-29 04:00:35'),
(10, '5c080710142a2', 'Updated record of student with LRN/Student ID of 19-0001-52', '2019-03-29 06:03:43'),
(11, '5c080710142a2', 'Updated record of student with LRN/Student ID of 19-0001-52', '2019-03-29 06:04:12'),
(12, '5c080710142a2', 'Updated record of student with LRN/Student ID of 19-0001-52', '2019-03-29 06:04:22'),
(13, '5c080710142a2', 'Updated record of student with LRN/Student ID of 19-0001-52', '2019-03-29 06:04:37'),
(14, '5c080710142a2', 'Updated record of student with LRN/Student ID of 19-0001-52', '2019-03-29 06:04:46'),
(15, '5c080710142a2', 'Updated record of student with LRN/Student ID of ', '2019-03-29 06:15:26'),
(16, '5c080710142a2', 'Updated record of student with LRN/Student ID of 19-0001-52', '2019-03-29 06:17:16'),
(17, '5c080710142a2', 'Updated record of student with LRN/Student ID of 19-0001-52', '2019-03-29 06:18:50'),
(18, '5c080710142a2', 'Updated record of student with LRN/Student ID of 19-0001-52', '2019-03-29 06:19:07');

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
(1, '123456789102', 'Grade 1', 939098, 'uponEnroll', '13012.00'),
(2, '123456789102', 'Grade 1', 939098, 'july', '2168.67'),
(3, '123456789102', 'Grade 1', 939098, 'august', '2168.67'),
(4, '123456789102', 'Grade 1', 939098, 'september', '2168.67'),
(5, '123456789102', 'Grade 1', 939098, 'october', '2168.67'),
(6, '123456789102', 'Grade 1', 939098, 'november', '2168.67'),
(7, '123456789102', 'Grade 1', 939098, 'december', '2168.67'),
(8, '123456789102', 'Grade 1', 939098, 'january', '2168.67'),
(9, '123456789102', 'Grade 1', 939098, 'february', '2168.67'),
(10, '123456789102', 'Grade 1', 939098, 'march', '2168.67'),
(11, '19-0001-52', '4th Yr', 730763, 'uponEnroll', '5000.00'),
(12, '19-0001-52', '4th Yr', 730763, 'prelim', '5066.67'),
(13, '19-0001-52', '4th Yr', 730763, 'midterm', '5066.67'),
(14, '19-0001-52', '4th Yr', 730763, 'finals', '5066.67');

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
(5, 5, 2, 'ICT', 'Information and Communications Technology'),
(6, 6, 1, 'STEM', 'Science, Technology, Engineering and Mathematics');

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
(1, '19-0001-52', 'Jinky Ochoa', 1234568, 9121234567, 'Brgy. Tagapo, Sta. Rosa');

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
(1, 123456789102, 'nanay nidar', 1223467, 9121234567, 'dito lang sa dulo');

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
(1, 123456789013, 'Wilmina Fajardo', 1223467, 9121234567, 'Cadena de Amor St.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info_kinder`
--

CREATE TABLE `tbl_stud_adtnl_info_kinder` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_tnum` bigint(20) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_kinder`
--

INSERT INTO `tbl_stud_adtnl_info_kinder` (`row_id`, `stud_lrn`, `stud_grdns_name`, `stud_grdns_tnum`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, 123456789101, 'Maria Dela Cruz', 1223467, 9121234567, 'Bagong Bayan');

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
(1, 123456789104, 'Amelia Quebral', 0, 9229298026, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna');

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
(1, 123456789102, 1, 1, 0, 1, 1);

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
(1, '19-0001-52', 1, 1, 0, 1, 1, 0);

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
(1, 123456789013, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_documents_kinder`
--

CREATE TABLE `tbl_stud_documents_kinder` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `bCertPSA` tinyint(4) NOT NULL,
  `frm137` tinyint(4) NOT NULL,
  `frm138` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_documents_kinder`
--

INSERT INTO `tbl_stud_documents_kinder` (`row_id`, `stud_lrn`, `bCertPSA`, `frm137`, `frm138`) VALUES
(1, 123456789101, 1, 0, 0);

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
(1, 123456789104, 1, 1, 1, 1, 1);

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
(1, '19-0001-52', '5c9d24101331e.jpg', 'Ochoa', 'Cara', 'Martillosa', 'enrolled', '2019-03-29', '4th Yr', 2, 3, 1, '', '1998-04-28', 0, 0, 2, 'Brgy. Tagapo, Sta. Rosa', 'Brgy. Tagapo, Sta. Rosa');

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
(1, 123456789102, '5c9d248187879.jpg', 'Biboso', 'Darwin', 'Jondanero', 'enrolled', '2019-03-29', 'Grade 1', '', 1, '', '2014-03-22', 0, 0, 1, 'dito lang sa dulo', 'dito lang sa dulo');

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
(1, 123456789013, '5c9d25ab6e76d.jpg', 'Fajardo', 'Bernard Mico', 'Tulabut', 'registered', '2019-03-29', 'Grade 7', '', 1, 'bmfajardo@gmail.com', '2006-12-12', 0, 0, 1, 'Cadena de Amor St.', 'Cadena de Amor St.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_info_kinder`
--

CREATE TABLE `tbl_stud_info_kinder` (
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
-- Dumping data for table `tbl_stud_info_kinder`
--

INSERT INTO `tbl_stud_info_kinder` (`row_id`, `stud_lrn`, `stud_avatar`, `stud_lname`, `stud_fname`, `stud_mname`, `stud_status`, `stud_rgstrtn_dte`, `stud_grade_lvl`, `stud_section`, `stud_acad_yr`, `stud_email`, `stud_bdate`, `stud_tnum`, `stud_cnum`, `stud_gender`, `stud_cur_adrs`, `stud_perm_adrs`) VALUES
(1, 123456789101, '5c9d2371788b2.jpg', 'Dela Cruz', 'Juan', '', 'registered', '2019-03-29', 'Kinder 1', '', 1, '', '2016-06-19', 0, 0, 1, 'Bagong Bayan', 'Bagong Bayan');

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
(1, 123456789104, '5c9d26772d1e7.jpg', 'Quebral', 'Jonathan', 'Almodiel', 'registered', '2019-03-29', 'Grade 11', 2, 5, '', 1, 'jonathan.quebral0627@gmail.com', '2001-06-27', 0, 0, 1, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna', 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna');

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
(1, 1, 939098, '123456789102', '5c40dd75c74fc', '2019-03-29 03:57:49', '20190329-907611', 123456, '13100.00', '0.00'),
(2, 11, 730763, '19-0001-52', '5c40dd75c74fc', '2019-03-29 04:00:35', '20190329-351679', 123457, '5000.00', '0.00');

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
-- Indexes for table `tbl_stud_adtnl_info_kinder`
--
ALTER TABLE `tbl_stud_adtnl_info_kinder`
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
-- Indexes for table `tbl_stud_documents_kinder`
--
ALTER TABLE `tbl_stud_documents_kinder`
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
-- Indexes for table `tbl_stud_info_kinder`
--
ALTER TABLE `tbl_stud_info_kinder`
  ADD PRIMARY KEY (`row_id`),
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
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_payables_info`
--
ALTER TABLE `tbl_payables_info`
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_shs_strand`
--
ALTER TABLE `tbl_shs_strand`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_shs_track`
--
ALTER TABLE `tbl_shs_track`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_col`
--
ALTER TABLE `tbl_stud_adtnl_info_col`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_elem`
--
ALTER TABLE `tbl_stud_adtnl_info_elem`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_jhs`
--
ALTER TABLE `tbl_stud_adtnl_info_jhs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_kinder`
--
ALTER TABLE `tbl_stud_adtnl_info_kinder`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_shs`
--
ALTER TABLE `tbl_stud_adtnl_info_shs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_documents`
--
ALTER TABLE `tbl_stud_documents`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_col`
--
ALTER TABLE `tbl_stud_documents_col`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_jhs`
--
ALTER TABLE `tbl_stud_documents_jhs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_kinder`
--
ALTER TABLE `tbl_stud_documents_kinder`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_shs`
--
ALTER TABLE `tbl_stud_documents_shs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_col`
--
ALTER TABLE `tbl_stud_info_col`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_kinder`
--
ALTER TABLE `tbl_stud_info_kinder`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaction_tbl`
--
ALTER TABLE `tbl_transaction_tbl`
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `tbl_stud_adtnl_info_col_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `tbl_stud_info_col` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tbl_stud_documents_col_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `tbl_stud_info_col` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_1` FOREIGN KEY (`stud_acad_yr`) REFERENCES `tbl_acad_year` (`acad_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_2` FOREIGN KEY (`stud_sem`) REFERENCES `tbl_semester` (`sem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_3` FOREIGN KEY (`stud_course`) REFERENCES `tbl_col_course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_5` FOREIGN KEY (`stud_gender`) REFERENCES `tbl_gender` (`gdr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
