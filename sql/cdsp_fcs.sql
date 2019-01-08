-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 03:58 AM
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
  `row_id` int(11) NOT NULL,
  `acad_year` char(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acad_year`
--

INSERT INTO `tbl_acad_year` (`row_id`, `acad_year`, `status`) VALUES
(1, '2018-2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `row_id` int(11) NOT NULL,
  `uniq_id` varchar(32) NOT NULL,
  `uname` varchar(150) NOT NULL,
  `password` char(32) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`row_id`, `uniq_id`, `uname`, `password`, `fname`, `lname`, `role`, `status`) VALUES
(1, '5c080710142a2', 'juancruz', '5f4dcc3b5aa765d61d8327deb882cf99', 'Juan', 'Dela Cruz', 'registrar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `row_id` bigint(20) NOT NULL,
  `emp_id` char(32) NOT NULL,
  `c_log` text NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`row_id`, `emp_id`, `c_log`, `mod_date`) VALUES
(1, '5c080710142a2', 'Registered student with LRN/Student ID of 123456789012', '2019-01-07 01:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_adtnl_info`
--

CREATE TABLE `tbl_stud_adtnl_info` (
  `row_id` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_grdns_name` varchar(255) NOT NULL,
  `stud_grdns_cnum` int(11) NOT NULL,
  `stud_grdns_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_adtnl_info`
--

INSERT INTO `tbl_stud_adtnl_info` (`row_id`, `stud_lrn`, `stud_grdns_name`, `stud_grdns_cnum`, `stud_grdns_adrs`) VALUES
(1, 123456789012, 'Maria Dela Cruz', 2147483647, 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_documents`
--

CREATE TABLE `tbl_stud_documents` (
  `row_id` int(11) NOT NULL,
  `stud_id` char(12) NOT NULL,
  `bCertPSA` char(2) NOT NULL,
  `certGMC` tinyint(1) NOT NULL,
  `certHonDis` tinyint(1) NOT NULL,
  `frm137` tinyint(1) NOT NULL,
  `frm138` tinyint(1) NOT NULL,
  `TOR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_documents`
--

INSERT INTO `tbl_stud_documents` (`row_id`, `stud_id`, `bCertPSA`, `certGMC`, `certHonDis`, `frm137`, `frm138`, `TOR`) VALUES
(1, '123456789012', '1', 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_info_elem`
--

CREATE TABLE `tbl_stud_info_elem` (
  `stud_row` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_avatar` varchar(50) NOT NULL,
  `stud_lname` varchar(255) NOT NULL,
  `stud_fname` varchar(100) NOT NULL,
  `stud_mname` varchar(255) NOT NULL,
  `stud_status` char(50) NOT NULL,
  `stud_rgstrtn_dte` date NOT NULL,
  `stud_grade_lvl` varchar(20) NOT NULL,
  `stud_section` varchar(20) NOT NULL,
  `stud_acad_yr` char(10) NOT NULL,
  `stud_email` varchar(150) NOT NULL,
  `stud_bdate` date NOT NULL,
  `stud_tnum` bigint(20) NOT NULL,
  `stud_cnum` bigint(13) NOT NULL,
  `stud_gender` char(6) NOT NULL,
  `stud_cur_adrs` text NOT NULL,
  `stud_perm_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stud_info_elem`
--

INSERT INTO `tbl_stud_info_elem` (`stud_row`, `stud_lrn`, `stud_avatar`, `stud_lname`, `stud_fname`, `stud_mname`, `stud_status`, `stud_rgstrtn_dte`, `stud_grade_lvl`, `stud_section`, `stud_acad_yr`, `stud_email`, `stud_bdate`, `stud_tnum`, `stud_cnum`, `stud_gender`, `stud_cur_adrs`, `stud_perm_adrs`) VALUES
(1, 123456789012, '', 'Dela Cruz', 'Juan Jr', '', 'registered', '2019-01-07', 'Grade 1', '', '2018-2019', '', '2013-06-27', 0, 0, 'Male', 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna', 'Phase 3b Block 9 Lot 32, Olympic Drive, Pacita 1, Brgy. San Francisco, City of Biñan, Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_info_jhs`
--

CREATE TABLE `tbl_stud_info_jhs` (
  `stud_row` int(11) NOT NULL,
  `stud_lrn` bigint(12) NOT NULL,
  `stud_avatar` varchar(50) NOT NULL,
  `stud_lname` varchar(255) NOT NULL,
  `stud_fname` varchar(100) NOT NULL,
  `stud_mname` varchar(255) NOT NULL,
  `stud_status` char(50) NOT NULL,
  `stud_rgstrtn_dte` date NOT NULL,
  `stud_grade_lvl` varchar(20) NOT NULL,
  `stud_section` varchar(20) NOT NULL,
  `stud_acad_yr` char(10) NOT NULL,
  `stud_email` varchar(150) NOT NULL,
  `stud_bdate` date NOT NULL,
  `stud_tnum` bigint(20) NOT NULL,
  `stud_cnum` bigint(13) NOT NULL,
  `stud_gender` char(6) NOT NULL,
  `stud_cur_adrs` text NOT NULL,
  `stud_perm_adrs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acad_year`
--
ALTER TABLE `tbl_acad_year`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `uniq_id` (`uniq_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `tbl_stud_adtnl_info`
--
ALTER TABLE `tbl_stud_adtnl_info`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_lrn` (`stud_lrn`);

--
-- Indexes for table `tbl_stud_documents`
--
ALTER TABLE `tbl_stud_documents`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`);

--
-- Indexes for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  ADD PRIMARY KEY (`stud_row`),
  ADD UNIQUE KEY `stud_id` (`stud_lrn`);

--
-- Indexes for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  ADD PRIMARY KEY (`stud_row`),
  ADD UNIQUE KEY `stud_id` (`stud_lrn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_acad_year`
--
ALTER TABLE `tbl_acad_year`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_adtnl_info`
--
ALTER TABLE `tbl_stud_adtnl_info`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_documents`
--
ALTER TABLE `tbl_stud_documents`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_elem`
--
ALTER TABLE `tbl_stud_info_elem`
  MODIFY `stud_row` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stud_info_jhs`
--
ALTER TABLE `tbl_stud_info_jhs`
  MODIFY `stud_row` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
