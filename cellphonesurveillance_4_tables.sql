-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 13, 2021 at 07:21 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cellphonesurveillance`
--

-- --------------------------------------------------------

--
-- Table structure for table `rammps`
--

CREATE TABLE `rammps` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `no_of_call` tinyint(2) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `last_status` int(3) NOT NULL DEFAULT 0,
  `last_schedule_id` int(11) DEFAULT NULL,
  `schedule_date` datetime DEFAULT NULL,
  `interview_id` int(11) DEFAULT NULL,
  `duration` int(5) DEFAULT 0,
  `session_started` datetime DEFAULT NULL,
  `session_end` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rammps_questions`
--

CREATE TABLE `rammps_questions` (
  `id` int(11) NOT NULL,
  `rammps_id` int(11) DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `call_status` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_input` varchar(65) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `s_1_location` int(3) DEFAULT NULL,
  `s_1_location_e` varchar(65) DEFAULT NULL,
  `s_1_consent` int(3) DEFAULT NULL,
  `s_1_consent_n` int(3) DEFAULT NULL,
  `s_1_consent_n_e` varchar(65) DEFAULT NULL,
  `s_1_gender` int(3) DEFAULT NULL,
  `s_1_age` int(3) DEFAULT NULL,
  `s_1_dd` int(3) DEFAULT NULL,
  `s_1_v_or_c` int(3) DEFAULT NULL,
  `s_1_cc` int(3) DEFAULT NULL,
  `s_1_uz` int(3) DEFAULT NULL,
  `s_1_mc` int(3) DEFAULT NULL,
  `s_1_ccuzmc_o` int(3) DEFAULT NULL,
  `s_1_ccuzmc_o_e` varchar(65) CHARACTER SET utf8 DEFAULT NULL,
  `s_1_d_name` tinyint(3) DEFAULT NULL,
  `s_1_name` varchar(65) DEFAULT NULL,
  `section_answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`section_answers`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rammps_schedules`
--

CREATE TABLE `rammps_schedules` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `schedule_date` datetime DEFAULT NULL,
  `call_state` tinyint(5) NOT NULL,
  `rammps_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rammps_schedules_pickhistory`
--

CREATE TABLE `rammps_schedules_pickhistory` (
  `id` int(11) NOT NULL,
  `current_id` int(11) DEFAULT NULL,
  `previous_id` int(11) DEFAULT NULL,
  `ivr_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rammps`
--
ALTER TABLE `rammps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `rammps_questions`
--
ALTER TABLE `rammps_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rammps_schedules`
--
ALTER TABLE `rammps_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rammps_schedules_pickhistory`
--
ALTER TABLE `rammps_schedules_pickhistory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rammps`
--
ALTER TABLE `rammps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rammps_questions`
--
ALTER TABLE `rammps_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rammps_schedules`
--
ALTER TABLE `rammps_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rammps_schedules_pickhistory`
--
ALTER TABLE `rammps_schedules_pickhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
