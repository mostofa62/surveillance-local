-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 24, 2021 at 01:35 PM
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

--
-- Dumping data for table `rammps`
--

INSERT INTO `rammps` (`id`, `mobile_no`, `no_of_call`, `status`, `last_status`, `last_schedule_id`, `schedule_date`, `interview_id`, `duration`, `session_started`, `session_end`, `created_at`, `updated_at`) VALUES
(1, '01817380528', 3, 1, 51, 3, '2021-11-24 15:30:00', 4, 5314, '2021-11-24 15:28:09', NULL, '2021-11-24 14:40:26', '2021-11-24 16:23:46'),
(2, '01817380529', 2, -2, 0, 5, '2021-11-24 16:35:00', 4, 185, '2021-11-24 16:27:37', NULL, '2021-11-24 14:40:26', '2021-11-24 16:27:40'),
(3, '01817380530', 0, 0, 0, NULL, NULL, NULL, 0, '2021-11-24 16:27:28', NULL, '2021-11-24 14:40:26', '2021-11-24 16:27:37'),
(4, '01817380531', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:26', '2021-11-24 14:40:26'),
(5, '01817380532', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:26', '2021-11-24 14:40:26'),
(6, '01817380533', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:26', '2021-11-24 14:40:26'),
(7, '01817380534', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:26', '2021-11-24 14:40:26'),
(8, '01817380535', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:26', '2021-11-24 14:40:26'),
(9, '01817380536', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:26', '2021-11-24 14:40:26'),
(10, '01817380537', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(11, '01817380538', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(12, '01817380539', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(13, '01817380540', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(14, '01817380541', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(15, '01817380542', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(16, '01817380543', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(17, '01817380544', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(18, '01817380545', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(19, '01817380546', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(20, '01817380547', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(21, '01817380548', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(22, '01817380549', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(23, '01817380550', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(24, '01817380551', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(25, '01817380552', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(26, '01817380553', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(27, '01817380554', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(28, '01817380555', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(29, '01817380556', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(30, '01817380557', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(31, '01817380558', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(32, '01817380559', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(33, '01817380560', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:27', '2021-11-24 14:40:27'),
(34, '01817380561', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(35, '01817380562', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(36, '01817380563', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(37, '01817380564', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(38, '01817380565', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(39, '01817380566', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(40, '01817380567', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(41, '01817380568', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(42, '01817380569', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(43, '01817380570', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(44, '01817380571', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(45, '01817380572', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(46, '01817380573', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(47, '01817380574', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(48, '01817380575', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(49, '01817380576', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(50, '01817380577', 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28');

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
  `s_1_name` varchar(65) DEFAULT NULL,
  `section_answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`section_answers`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rammps_questions`
--

INSERT INTO `rammps_questions` (`id`, `rammps_id`, `submitted_at`, `call_status`, `user_id`, `created_at`, `updated_at`, `last_input`, `s_1_consent`, `s_1_consent_n`, `s_1_consent_n_e`, `s_1_gender`, `s_1_age`, `s_1_dd`, `s_1_v_or_c`, `s_1_cc`, `s_1_uz`, `s_1_mc`, `s_1_ccuzmc_o`, `s_1_ccuzmc_o_e`, `s_1_name`, `section_answers`) VALUES
(1, 1, NULL, 51, 4, '2021-11-24 15:26:15', '2021-11-24 16:23:46', 's_1_name', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"rammps_id\":\"1\",\"last_input\":\"s_1_name\",\"s_1_consent\":\"5\",\"s_1_name\":\"Golam Mostofa\"}'),
(2, 2, NULL, 99, 4, '2021-11-24 16:27:27', '2021-11-24 16:27:27', 's_3_until_2019_a', 1, NULL, NULL, 1, 55, 2942, 1, NULL, NULL, 6696, NULL, NULL, 'Golam Mostofa', '{\"rammps_id\":\"2\",\"last_input\":\"s_3_until_2019_a\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"55\",\"s_1_dd\":\"2942\",\"s_1_v_or_c\":\"1\",\"s_1_mc\":\"6696\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"1\",\"s_2_marial_status\":\"5\",\"s_2_occupation\":\"14\",\"s_3_khana_m\":\"2\",\"s_3_khana_f\":\"3\",\"s_3_relation_w_main\":\"12\",\"s_3_khana_u_5\":\"2\",\"s_3_child_health_decesion_1\":\"2\",\"s_3_your_health_decesion_1\":\"2\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"6\",\"4\"],\"g_of_covid\":[\"3\",\"1\"],\"dyear\":[\"1\",\"1\"],\"death_year\":[\"2019\",\"2020\"],\"death_married\":[\"3\",\"1\"],\"death_symptoms_1\":[\"4\",\"3\"],\"death_location\":[\"2\",\"4\"],\"death_reason_1\":[\"15\",\"10\"],\"death_detect_by\":{\"1\":\"1\"},\"death_covid_symptoms\":{\"1\":\"15\"},\"death_covid_hospital\":{\"1\":\"3\"},\"death_covid_hospital_a\":{\"1\":\"3\"},\"death_covid_death_where\":{\"1\":\"2\"},\"death_covid_grave\":{\"1\":\"88\"}},\"cdeath_len\":\"2\",\"last_index\":\"3\"}');

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

--
-- Dumping data for table `rammps_schedules`
--

INSERT INTO `rammps_schedules` (`id`, `mobile_no`, `schedule_date`, `call_state`, `rammps_id`, `user_id`, `start_time`, `end_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '01817380528', '2021-11-24 14:50:00', 99, 1, 4, '2021-11-24 14:40:40', '2021-11-24 14:42:15', '2021-11-24 08:40:40', '2021-11-24 08:42:55', '2021-11-24 14:42:55'),
(2, '01817380528', '2021-11-24 15:30:00', 99, 1, 4, '2021-11-24 14:51:04', '2021-11-24 15:26:15', '2021-11-24 08:42:55', '2021-11-24 09:30:22', '2021-11-24 15:30:22'),
(3, '01817380528', NULL, 51, 1, 4, '2021-11-24 15:30:22', '2021-11-24 16:23:45', '2021-11-24 09:30:22', '2021-11-24 10:23:45', '2021-11-24 16:23:45'),
(4, '01817380529', '2021-11-24 16:35:00', 99, 2, 4, '2021-11-24 16:24:22', '2021-11-24 16:27:27', '2021-11-24 10:24:22', '2021-11-24 10:27:40', '2021-11-24 16:27:40'),
(5, '01817380529', NULL, 0, 2, 4, '2021-11-24 16:27:40', NULL, '2021-11-24 10:27:40', '2021-11-24 10:27:40', NULL);

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
-- Dumping data for table `rammps_schedules_pickhistory`
--

INSERT INTO `rammps_schedules_pickhistory` (`id`, `current_id`, `previous_id`, `ivr_id`, `created_at`) VALUES
(1, 4, 4, NULL, '2021-11-24 14:42:43'),
(2, 4, 4, NULL, '2021-11-24 15:28:09'),
(3, 4, 4, NULL, '2021-11-24 16:27:37');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `rammps_questions`
--
ALTER TABLE `rammps_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rammps_schedules`
--
ALTER TABLE `rammps_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rammps_schedules_pickhistory`
--
ALTER TABLE `rammps_schedules_pickhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
