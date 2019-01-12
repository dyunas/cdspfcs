-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 10:44 PM
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
  `uname` varchar(150) NOT NULL,
  `password` char(32) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`row_id`, `emp_uniq_id`, `uname`, `password`, `fname`, `lname`, `role`, `status`) VALUES
(1, '5c080710142a2', 'juancruz', '5f4dcc3b5aa765d61d8327deb882cf99', 'Juan', 'Cruz', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `row_id` int(11) NOT NULL,
  `emp_id` char(32) NOT NULL,
  `c_log` text NOT NULL,
  `mod_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`row_id`, `emp_id`, `c_log`, `mod_date`) VALUES
(1, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789012', '2019-01-12'),
(2, '5c080710142a2', 'Registered student with LRN/Student ID of 19-0001-52', '2019-01-12'),
(3, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789013', '2019-01-12'),
(4, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789014', '2019-01-12');

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
-- Table structure for table `tbl_stud_adtnl_info_col`
--

CREATE TABLE `tbl_stud_adtnl_info_col` (
  `row_id` int(11) NOT NULL,
  `stud_id` char(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_col`
--

INSERT INTO `tbl_stud_adtnl_info_col` (`row_id`, `stud_id`, `stud_grdns_name`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, '19-0001-52', 'Allen Christian Mendoza', 9121234567, 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info_elem`
--

CREATE TABLE `tbl_stud_adtnl_info_elem` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_elem`
--

INSERT INTO `tbl_stud_adtnl_info_elem` (`row_id`, `stud_lrn`, `stud_grdns_name`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, 123456789012, 'Maria Dela Cruz', 9229298026, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info_jhs`
--

CREATE TABLE `tbl_stud_adtnl_info_jhs` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_jhs`
--

INSERT INTO `tbl_stud_adtnl_info_jhs` (`row_id`, `stud_lrn`, `stud_grdns_name`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, 123456789013, 'Rebecca Bucayan', 9121234567, '#16 Kamagong St. Pacita Complex 1 San Pedro City Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info_shs`
--

CREATE TABLE `tbl_stud_adtnl_info_shs` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_cnum` bigint(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info_shs`
--

INSERT INTO `tbl_stud_adtnl_info_shs` (`row_id`, `stud_lrn`, `stud_grdns_name`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, 123456789014, 'Wilmina Fajardo', 9121234567, 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna');

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
(1, 123456789012, 1, 1, 1, 1, 1);

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
(1, '19-0001-52', 1, 1, 1, 1, 1, 0);

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
  `stud_year_lvl` varchar(10) NOT NULL,
  `stud_sem` int(11) NOT NULL,
  `stud_course` varchar(10) NOT NULL,
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
(1, '19-0001-52', '', 'Mendoza', 'Cara', 'Ochoa', 'registered', '2019-01-12', '4', 2, '3', 1, '', '1997-02-04', 0, 0, 0, 'sample', 'sample');

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
(1, 123456789012, '', 'Dela Cruz', 'Juan Jr', '', 'registered', '2019-01-12', '1', '', 1, '', '2013-02-06', 0, 0, 1, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna', 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna');

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
(1, 123456789013, '', 'Tornea', 'Erick Joseph', 'Bucayan', 'registered', '2019-01-12', '8', '', 1, 'ericktornea@yahoo.com', '2006-06-19', 0, 0, 1, '#16 Kamagong St. Pacita Complex 1 San Pedro City Laguna', '#16 Kamagong St. Pacita Complex 1 San Pedro City Laguna');

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

INSERT INTO `tbl_stud_info_shs` (`row_id`, `stud_lrn`, `stud_avatar`, `stud_lname`, `stud_fname`, `stud_mname`, `stud_status`, `stud_rgstrtn_dte`, `stud_grade_lvl`, `stud_section`, `stud_acad_yr`, `stud_email`, `stud_bdate`, `stud_tnum`, `stud_cnum`, `stud_gender`, `stud_cur_adrs`, `stud_perm_adrs`) VALUES
(1, 123456789014, '', 'Fajardo', 'Bernard Mico', 'Tulabut', 'registered', '2019-01-12', '12', '', 1, 'bmfajardo@gmail.com', '1999-12-11', 0, 0, 1, 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna', 'Cade de Amor Str. Phase 6 Pacita Complex 1 San Pedro City Laguna');

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
  ADD UNIQUE KEY `emp_uniq_id` (`emp_uniq_id`);

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
  ADD KEY `stud_sem` (`stud_sem`);

--
-- Indexes for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`);

--
-- Indexes for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`);

--
-- Indexes for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`),
  ADD KEY `stud_acad_yr` (`stud_acad_yr`);

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD CONSTRAINT `tbl_logs_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `tbl_accounts` (`emp_uniq_id`);

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
  ADD CONSTRAINT `tbl_stud_info_col_ibfk_2` FOREIGN KEY (`stud_sem`) REFERENCES `tbl_semester` (`sem_id`);

--
-- Constraints for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  ADD CONSTRAINT `tbl_stud_info_elem_ibfk_1` FOREIGN KEY (`stud_acad_yr`) REFERENCES `tbl_acad_year` (`acad_id`);

--
-- Constraints for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  ADD CONSTRAINT `tbl_stud_info_jhs_ibfk_1` FOREIGN KEY (`stud_acad_yr`) REFERENCES `tbl_acad_year` (`acad_id`);

--
-- Constraints for table `tbl_stud_info_shs`
--
ALTER TABLE `tbl_stud_info_shs`
  ADD CONSTRAINT `tbl_stud_info_shs_ibfk_1` FOREIGN KEY (`stud_acad_yr`) REFERENCES `tbl_acad_year` (`acad_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
