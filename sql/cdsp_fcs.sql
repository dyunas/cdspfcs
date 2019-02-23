-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 11:02 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

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
(1, '5c080710142a2', '', 'juancruz', '5f4dcc3b5aa765d61d8327deb882cf99', 'Juan', 'Cruz', 2, 1, '2018-12-12'),
(2, '5c3f86c85a1d6', '', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', 'Admin', 1, 1, '2018-12-12'),
(3, '5c40dd75c74fc', '', 'pencil', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pencil', 'Manalo', 3, 1, '2019-01-05'),
(4, '5c4b64932da13', '', 'ballpen', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pilot', 'Ballpen', 4, 1, '2019-01-26');

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
(3, 3, 'assessor_elem'),
(4, 4, 'assessor_jhs'),
(5, 5, 'assessor_shs'),
(6, 6, 'assessor_col'),
(7, 7, 'cashier'),
(8, 8, 'finance');

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
  `disc_code` char(11) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `disc_amnt` decimal(5,2) NOT NULL,
  `disc_for` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`row_id`, `disc_code`, `discount`, `disc_amnt`, `disc_for`, `status`) VALUES
(1, 'EEP-EL', 'Early Enrollment Program', '10.00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees`
--

CREATE TABLE `tbl_fees` (
  `row_id` int(11) NOT NULL,
  `fee_code` char(10) NOT NULL,
  `fee_name` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fee_for` int(2) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fees`
--

INSERT INTO `tbl_fees` (`row_id`, `fee_code`, `fee_name`, `amount`, `fee_for`, `status`) VALUES
(1, 'TFEL', 'Tuition Fee', '12550.00', 2, 1),
(2, 'MSCEL', 'Miscellaneous', '8550.00', 2, 1),
(3, 'CFEL', 'Computer Fee', '3500.00', 2, 1),
(4, 'ENFEL', 'Energy Fee', '3000.00', 2, 1),
(5, 'BKSEL', 'Books - Elementary', '5470.00', 2, 1),
(6, 'EDTR', 'Educational Tour', '2200.00', 2, 1),
(7, 'FDAY', 'Foundation Day T-Shirt', '250.00', 2, 1),
(8, 'LIP', 'Learner\'s Insurance Premium', '150.00', 2, 1),
(9, 'TFJHS', 'Tuition Fee', '12500.00', 3, 1);

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
(12, 12, 'Grade 12', 4);

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
(11, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0004-52', '2019-02-22 07:12:05');

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
(5, '19-0004-52', 'nanay nikas', 1223467, 12424214142, 'dito lang sa dulo');

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
(2, 123456789015, 'adelaida dela cruz', 0, 9123456789, 'dyan sa tabi');

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
(1, 123456789014, 'Wilmina Fajardo', 0, 9121234567, 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna');

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
(2, 123456789015, 1, 1, 1, 1, 1);

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
(5, '19-0004-52', 1, 1, 1, 1, 1, 1);

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
(1, 123456789014, 1, 1, 0, 1, 1);

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
  `stud_year_lvl` int(11) NOT NULL,
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
(1, '19-0001-52', '', 'Ochoa', 'Cara', 'Martillosa', 'registered', '2019-01-12', 4, 2, 3, 1, '', '1997-02-04', 0, 0, 2, 'sample', 'sample'),
(3, '19-0002-52', '', 'Quebral', 'Jonathan', 'Almodiel', 'registered', '2019-01-16', 4, 2, 3, 1, 'jonathan.almodiel.quebral@gmail.com', '1992-06-27', 0, 9566031598, 1, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna', 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna'),
(5, '19-0003-52', '', 'Maximoff', 'Wanda', '', 'registered', '2019-01-17', 2, 2, 1, 1, 'wanda.maximoff@gmail.com', '1992-02-06', 0, 0, 2, 'Sokovia', 'Sokovia'),
(11, '19-0004-52', '', 'Español', 'Kastin', '', 'registered', '2019-02-22', 4, 2, 3, 1, 'kas.español@gmail.com', '1998-12-30', 0, 0, 2, 'dito lang sa dulo', 'dito lang sa dulo');

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
  `stud_grade_lvl` int(2) NOT NULL,
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
(1, 123456789012, '', 'Dela Cruz', 'Juan Jr', '', 'registered', '2019-01-12', 1, '', 1, '', '2013-02-06', 0, 0, 1, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna', 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna'),
(2, 123456789015, '', 'Dela Cruz', 'Leonor', 'Rivera', 'registered', '2019-01-16', 3, '', 1, '', '2010-09-21', 0, 0, 2, 'dyan sa tabi', 'dyan sa tabi');

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
  `stud_grade_lvl` int(2) NOT NULL,
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
(1, 123456789013, '', 'Tornea', 'Erick Joseph', 'Bucayan', 'registered', '2019-01-12', 8, '', 1, 'ericktornea@yahoo.com', '2006-06-19', 0, 0, 1, '#16 Kamagong St. Pacita Complex 1 San Pedro City Laguna', '#16 Kamagong St. Pacita Complex 1 San Pedro City Laguna');

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
  `stud_grade_lvl` int(2) NOT NULL,
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
(1, 123456789014, '', 'Fajardo', 'Bernard Mico', 'Tulabut', 'registered', '2019-01-12', 12, 2, 5, '', 1, 'bmfajardo@gmail.com', '1999-12-11', 0, 0, 1, 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna', 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yr_level`
--

CREATE TABLE `tbl_yr_level` (
  `row_id` int(11) NOT NULL,
  `yr_id` int(11) NOT NULL,
  `yr_level` char(11) NOT NULL,
  `dept_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yr_level`
--

INSERT INTO `tbl_yr_level` (`row_id`, `yr_id`, `yr_level`, `dept_id`) VALUES
(1, 1, '1st Yr', 5),
(2, 2, '2nd Yr', 5),
(3, 3, '3rd Yr', 5),
(4, 4, '4th Yr', 5),
(5, 5, '5th Yr', 5);

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
  ADD UNIQUE KEY `fee_code` (`fee_code`),
  ADD KEY `fee_for` (`fee_for`);

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
  ADD UNIQUE KEY `grd_id` (`grd_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `emp_id` (`emp_id`);

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
  ADD UNIQUE KEY `stud_lrn` (`stud_id`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`),
  ADD KEY `stud_sem` (`stud_sem`),
  ADD KEY `stud_course` (`stud_course`),
  ADD KEY `stud_year_lvl` (`stud_year_lvl`),
  ADD KEY `stud_gender` (`stud_gender`);

--
-- Indexes for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`),
  ADD KEY `stud_grade_lvl` (`stud_grade_lvl`),
  ADD KEY `stud_gender` (`stud_gender`);

--
-- Indexes for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`),
  ADD KEY `stud_grade_lvl` (`stud_grade_lvl`),
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
  ADD KEY `stud_grade_lvl` (`stud_grade_lvl`),
  ADD KEY `stud_gender` (`stud_gender`);

--
-- Indexes for table `tbl_yr_level`
--
ALTER TABLE `tbl_yr_level`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `lvl_id` (`yr_id`),
  ADD KEY `dept_id` (`dept_id`);

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_grd_level`
--
ALTER TABLE `tbl_grd_level`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_elem`
--
ALTER TABLE `tbl_stud_adtnl_info_elem`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info_jhs`
--
ALTER TABLE `tbl_stud_adtnl_info_jhs`
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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_col`
--
ALTER TABLE `tbl_stud_documents_col`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_stud_documents_jhs`
--
ALTER TABLE `tbl_stud_documents_jhs`
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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_yr_level`
--
ALTER TABLE `tbl_yr_level`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  ADD CONSTRAINT `tbl_fees_ibfk_1` FOREIGN KEY (`fee_for`) REFERENCES `tbl_departments` (`dept_id`);

--
-- Constraints for table `tbl_grd_level`
--
ALTER TABLE `tbl_grd_level`
  ADD CONSTRAINT `tbl_grd_level_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_departments` (`dept_id`);

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
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_4` FOREIGN KEY (`stud_year_lvl`) REFERENCES `tbl_yr_level` (`yr_id`),
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_5` FOREIGN KEY (`stud_gender`) REFERENCES `tbl_gender` (`gdr_id`);

--
-- Constraints for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  ADD CONSTRAINT `tbl_stud_info_elem_ibfk_1` FOREIGN KEY (`stud_acad_yr`) REFERENCES `tbl_acad_year` (`acad_id`),
  ADD CONSTRAINT `tbl_stud_info_elem_ibfk_2` FOREIGN KEY (`stud_gender`) REFERENCES `tbl_gender` (`gdr_id`),
  ADD CONSTRAINT `tbl_stud_info_elem_ibfk_3` FOREIGN KEY (`stud_grade_lvl`) REFERENCES `tbl_grd_level` (`grd_id`);

--
-- Constraints for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  ADD CONSTRAINT `tbl_stud_info_jhs_ibfk_1` FOREIGN KEY (`stud_grade_lvl`) REFERENCES `tbl_grd_level` (`grd_id`);

--
-- Constraints for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  ADD CONSTRAINT `tbl_stud_info_shs_ibfk_1` FOREIGN KEY (`stud_grade_lvl`) REFERENCES `tbl_grd_level` (`grd_id`),
  ADD CONSTRAINT `tbl_stud_info_shs_ibfk_2` FOREIGN KEY (`stud_strnd_id`) REFERENCES `tbl_shs_strand` (`strnd_id`),
  ADD CONSTRAINT `tbl_stud_info_shs_ibfk_3` FOREIGN KEY (`stud_trk_id`) REFERENCES `tbl_shs_track` (`trk_id`);

--
-- Constraints for table `tbl_yr_level`
--
ALTER TABLE `tbl_yr_level`
  ADD CONSTRAINT `tbl_yr_level_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_departments` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
