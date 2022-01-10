-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 10, 2022 at 12:34 PM
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
  `is_snowball` tinyint(1) NOT NULL DEFAULT 0,
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

INSERT INTO `rammps` (`id`, `mobile_no`, `no_of_call`, `status`, `last_status`, `last_schedule_id`, `is_snowball`, `schedule_date`, `interview_id`, `duration`, `session_started`, `session_end`, `created_at`, `updated_at`) VALUES
(1, '01817380528', 2, 1, 51, 2, 0, '2021-11-25 11:50:00', 4, 737, '2021-11-25 11:55:37', NULL, '2021-11-24 14:40:26', '2021-11-25 11:55:56'),
(2, '01817380529', 2, 1, 51, 4, 0, '2021-11-25 13:05:00', 4, 3972, '2021-11-25 13:00:22', NULL, '2021-11-24 14:40:26', '2021-11-25 13:02:30'),
(3, '01817380530', 2, 1, 51, 6, 0, '2021-11-25 13:10:00', 4, 2157, '2021-11-25 13:06:12', NULL, '2021-11-24 14:40:26', '2021-11-25 13:39:16'),
(4, '01817380531', 1, 1, 0, 7, 0, NULL, 4, 4457, '2021-11-25 13:39:16', NULL, '2021-11-24 14:40:26', '2021-11-25 14:58:06'),
(5, '01817380532', 1, 1, 44, 8, 0, NULL, 4, 87, '2021-11-29 10:32:13', '2021-11-29 10:37:47', '2021-11-24 14:40:26', '2021-11-29 10:37:47'),
(6, '01817380533', 1, 1, 44, 9, 0, NULL, 4, 21379, '2021-11-29 10:37:48', '2021-11-29 16:34:09', '2021-11-24 14:40:26', '2021-11-29 16:34:09'),
(7, '01817380534', 1, 1, 43, 10, 0, NULL, 4, 4326, '2021-11-30 10:06:45', '2021-11-30 11:19:20', '2021-11-24 14:40:26', '2021-11-30 11:19:20'),
(8, '01817380535', 1, 1, 44, 12, 0, '2021-11-30 11:35:00', 4, 3084, '2021-11-30 11:32:39', '2021-11-30 12:11:08', '2021-11-24 14:40:26', '2021-11-30 12:11:08'),
(9, '01817380536', 3, 1, 0, 15, 0, '2021-11-30 12:20:00', 4, 340, '2021-11-30 12:23:12', '2021-11-30 12:24:19', '2021-11-24 14:40:26', '2021-11-30 12:24:19'),
(10, '01817380537', 0, 1, 0, 16, 0, NULL, 4, 17177, '2021-11-30 14:16:21', '2021-11-30 17:11:16', '2021-11-24 14:40:27', '2021-11-30 17:11:16'),
(11, '01817380538', 1, 1, 43, 17, 0, NULL, 4, 10303, '2021-12-01 09:40:36', '2021-12-01 12:37:23', '2021-11-24 14:40:27', '2021-12-01 12:37:23'),
(12, '01817380539', 2, 1, 43, 19, 0, '2021-12-01 12:45:00', 4, 3473, '2021-12-01 12:41:05', '2021-12-01 13:35:34', '2021-11-24 14:40:27', '2021-12-01 13:35:34'),
(13, '01817380540', 3, 1, 51, 22, 0, '2021-12-01 13:55:00', 4, 478, '2021-12-01 13:43:34', '2021-12-01 13:43:59', '2021-11-24 14:40:27', '2021-12-01 13:43:59'),
(14, '01817380541', 2, 1, 0, 24, 0, '2021-12-01 14:30:00', 4, 687, '2021-12-01 14:23:55', '2021-12-01 14:25:36', '2021-11-24 14:40:27', '2021-12-01 14:25:36'),
(15, '01817380542', 1, 1, 43, 25, 0, NULL, 4, 1415, '2021-12-01 14:25:36', '2021-12-01 15:15:52', '2021-11-24 14:40:27', '2021-12-01 15:15:52'),
(16, '01817380543', 1, 1, 43, 27, 0, '2021-12-01 15:25:00', 4, 91652, '2021-12-02 09:43:41', '2021-12-02 16:43:40', '2021-11-24 14:40:27', '2021-12-02 16:43:40'),
(17, '01817380544', 3, 1, 0, 30, 0, '2021-12-02 16:55:00', 4, 282, '2021-12-02 16:48:49', '2021-12-02 16:49:32', '2021-11-24 14:40:27', '2021-12-02 16:49:32'),
(18, '01817380545', 2, 1, 0, 32, 0, '2021-12-02 17:10:00', 4, 1080, '2021-12-02 17:12:21', '2021-12-02 17:14:33', '2021-11-24 14:40:27', '2021-12-02 17:14:33'),
(19, '01817380546', 4, 1, 51, 36, 0, '2021-12-05 14:45:00', 4, 13597, '2021-12-05 14:38:19', '2021-12-05 14:38:42', '2021-11-24 14:40:27', '2021-12-05 14:38:42'),
(20, '01817380547', 0, 1, 44, 37, 0, NULL, 4, 88838, '2021-12-06 13:40:24', '2021-12-06 15:31:34', '2021-11-24 14:40:27', '2021-12-06 15:31:34'),
(21, '01817380548', 1, 1, 44, 39, 0, '2021-12-06 15:40:00', 4, 179157, '2021-12-08 11:50:36', '2021-12-08 17:17:45', '2021-11-24 14:40:27', '2021-12-08 17:17:45'),
(22, '01817380549', 0, 1, 45, 40, 0, NULL, 4, 252782, '2021-12-11 15:51:10', '2021-12-11 15:51:22', '2021-11-24 14:40:27', '2021-12-11 15:51:22'),
(23, '01817380550', 1, 1, 45, 41, 0, NULL, 4, 35, '2021-12-11 15:51:23', NULL, '2021-11-24 14:40:27', '2021-12-11 15:52:14'),
(24, '01817380551', 0, 1, 45, 42, 0, NULL, 4, 75578, '2021-12-12 10:27:40', '2021-12-12 12:52:04', '2021-11-24 14:40:27', '2021-12-12 12:52:04'),
(25, '01817380552', 2, 1, 52, 44, 0, '2021-12-12 13:55:00', 4, 3131, '2021-12-12 18:16:52', '2021-12-12 18:17:40', '2021-11-24 14:40:27', '2021-12-12 18:17:40'),
(26, '01817380553', 0, 1, 1, 45, 0, NULL, 4, 64017, '2021-12-13 10:27:30', '2021-12-13 12:05:15', '2021-11-24 14:40:27', '2021-12-13 12:05:15'),
(27, '01817380554', 1, 1, 45, 46, 0, NULL, 4, 796, '2021-12-13 12:05:16', '2021-12-13 12:19:23', '2021-11-24 14:40:27', '2021-12-13 12:19:23'),
(28, '01817380555', 1, 1, 52, 47, 0, NULL, 4, 21, '2021-12-13 12:19:23', '2021-12-13 12:20:06', '2021-11-24 14:40:27', '2021-12-13 12:20:06'),
(29, '01817380556', 1, 1, 52, 48, 0, NULL, 4, 19, '2021-12-13 12:20:06', '2021-12-13 12:20:46', '2021-11-24 14:40:27', '2021-12-13 12:20:46'),
(30, '01817380557', 0, -1, 0, NULL, 0, NULL, 4, 0, '2021-12-13 12:20:46', NULL, '2021-11-24 14:40:27', '2021-12-13 12:20:46'),
(31, '01817380558', 0, 1, 45, 49, 0, NULL, 23, 68815, '2021-12-14 10:14:06', '2021-12-14 12:56:24', '2021-11-24 14:40:27', '2021-12-14 12:56:24'),
(32, '01817380559', 0, 1, 41, 50, 0, NULL, 23, 80788, '2021-12-15 11:22:34', '2021-12-15 11:23:09', '2021-11-24 14:40:27', '2021-12-15 11:23:09'),
(33, '01817380560', 1, 1, 41, 51, 0, NULL, 23, 954, '2021-12-15 11:23:09', '2021-12-15 11:39:06', '2021-11-24 14:40:27', '2021-12-15 11:39:06'),
(34, '01817380561', 1, 1, 53, 52, 0, NULL, 23, 1375, '2021-12-15 11:39:06', '2021-12-15 12:02:03', '2021-11-24 14:40:28', '2021-12-15 12:02:03'),
(35, '01817380562', 0, 1, 1, 53, 0, NULL, 23, 358833, '2021-12-19 15:44:19', '2021-12-19 15:46:03', '2021-11-24 14:40:28', '2021-12-19 15:46:03'),
(36, '01817380563', 1, 1, 1, 54, 0, NULL, 23, 102, '2021-12-19 15:46:04', '2021-12-19 15:49:35', '2021-11-24 14:40:28', '2021-12-19 15:49:35'),
(37, '01817380564', 2, 1, 45, 56, 0, '2021-12-22 13:43:00', 23, 35, '2021-12-22 13:50:08', '2021-12-22 13:50:28', '2021-11-24 14:40:28', '2021-12-22 13:50:28'),
(38, '01817380565', 0, -1, 0, NULL, 0, NULL, 24, 0, '2021-12-21 11:17:34', NULL, '2021-11-24 14:40:28', '2021-12-21 11:17:34'),
(39, '01817380566', 2, 1, 51, 59, 0, '2021-12-22 13:05:00', 23, 726, '2021-12-23 12:05:18', '2021-12-23 12:05:25', '2021-11-24 14:40:28', '2021-12-23 12:05:25'),
(40, '01817380567', 3, 1, 51, 62, 0, '2021-12-23 12:30:00', 23, 505, '2021-12-23 12:13:09', '2021-12-23 12:14:08', '2021-11-24 14:40:28', '2021-12-23 12:14:08'),
(41, '01817380568', 3, 1, 1, 65, 1, '2021-12-28 11:40:00', 23, 81520, '2021-12-28 11:25:37', '2021-12-28 11:27:46', '2021-11-24 14:40:28', '2021-12-28 11:27:46'),
(42, '01817380569', 0, -1, 0, 66, 0, NULL, 23, 0, '2021-12-28 16:44:36', NULL, '2021-11-24 14:40:28', '2021-12-28 16:44:36'),
(43, '01817380570', 0, 0, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(44, '01817380571', 0, 0, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(45, '01817380572', 0, 0, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(46, '01817380573', 0, 0, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(47, '01817380574', 0, 0, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(48, '01817380575', 0, 0, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(49, '01817380576', 0, 0, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28'),
(50, '01817380577', 0, 0, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, '2021-11-24 14:40:28', '2021-11-24 14:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `rammps_attendance`
--

CREATE TABLE `rammps_attendance` (
  `id` int(11) NOT NULL,
  `attend_date` date DEFAULT NULL,
  `attend_times` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attend_times`)),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rammps_attendance`
--

INSERT INTO `rammps_attendance` (`id`, `attend_date`, `attend_times`, `user_id`) VALUES
(1, '2021-12-21', '[{\"type\":\"1\",\"time\":\"14:03\"},{\"type\":\"1\",\"time\":\"14:03\"},{\"type\":\"2\",\"time\":\"14:03\"}]', 23);

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
  `section_answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`section_answers`)),
  `snowball_answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`snowball_answers`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rammps_questions`
--

INSERT INTO `rammps_questions` (`id`, `rammps_id`, `submitted_at`, `call_status`, `user_id`, `created_at`, `updated_at`, `last_input`, `s_1_location`, `s_1_location_e`, `s_1_consent`, `s_1_consent_n`, `s_1_consent_n_e`, `s_1_gender`, `s_1_age`, `s_1_dd`, `s_1_v_or_c`, `s_1_cc`, `s_1_uz`, `s_1_mc`, `s_1_ccuzmc_o`, `s_1_ccuzmc_o_e`, `s_1_d_name`, `s_1_name`, `section_answers`, `snowball_answers`) VALUES
(1, 1, NULL, 51, 4, '2021-11-25 11:40:35', '2021-11-25 11:55:56', 's_3_until_2019_a', NULL, NULL, 1, NULL, NULL, 1, 25, 71, 1, 6586, NULL, NULL, NULL, NULL, NULL, 'Golam mostofa', '{\"rammps_id\":\"1\",\"last_input\":\"s_3_until_2019_a\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"25\",\"s_1_dd\":\"71\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6586\",\"s_1_name\":\"Golam mostofa\",\"s_2_education\":\"2\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"11\",\"s_3_khana_m\":\"2\",\"s_3_khana_f\":\"3\",\"s_3_relation_w_main\":\"3\",\"s_3_khana_u_5\":\"2\",\"s_3_child_health_decesion_1\":\"1\",\"s_3_your_health_decesion_1\":\"1\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\"],\"r_with_death\":[\"14\"],\"g_of_covid\":[\"3\"],\"dyear\":[\"45\"],\"death_year\":[\"2019\"],\"death_married\":[\"3\"],\"death_symptoms_1\":[\"2\"],\"death_location\":[\"2\"],\"death_reason_1\":[\"3\"],\"death_violance\":[\"3\"]},\"cdeath_len\":\"2\",\"last_index\":\"3\"}', NULL),
(2, 2, NULL, 51, 4, '2021-11-25 13:00:17', '2021-11-25 13:02:30', 's_6_vac_number', NULL, NULL, 1, NULL, NULL, 1, 29, 993, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"rammps_id\":\"2\",\"last_input\":\"s_6_vac_number\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"29\",\"s_1_dd\":\"993\",\"s_1_v_or_c\":\"1\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"2\",\"s_2_marial_status\":\"3\",\"s_2_occupation\":\"16\",\"s_3_khana_m\":\"2\",\"s_3_khana_f\":\"3\",\"s_3_relation_w_main\":\"15\",\"s_3_khana_u_5\":\"2\",\"s_3_child_health_decesion_1\":\"8\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"6\",\"15\"],\"g_of_covid\":[\"1\"],\"dyear\":[\"20\"],\"death_year\":[\"2019\"],\"death_married\":[\"1\"],\"death_symptoms_1\":[\"4\"],\"death_location\":[\"2\"],\"death_reason_1\":[\"3\"],\"death_violance\":[\"1\"]},\"s_4_mother_a_or_d\":\"1\",\"s_4_mother_name\":\"Bilkis\",\"mother_death_covid_death_where\":\"3\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"dsddsa\",\"s_4_father_db_location\":\"2\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"2\",\"father_death_detect_by\":\"3\",\"father_death_covid_symptoms\":\"2\",\"father_death_covid_hospital\":\"3\",\"father_death_covid_hospital_a\":\"3\",\"father_death_covid_grave\":\"2\",\"s_6_vac_possible\":\"1\",\"s_6_vac_taken\":\"1\",\"s_6_vac_number\":\"2\",\"sibiling_len\":\"1\",\"cdeath_len\":\"2\",\"last_index\":\"4\"}', NULL),
(3, 3, NULL, 51, 4, '2021-11-25 13:06:07', '2021-11-25 13:39:16', 's_3_until_2019_a', NULL, NULL, 1, NULL, NULL, 1, 37, 146, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"rammps_id\":\"3\",\"last_input\":\"s_3_until_2019_a\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"37\",\"s_1_dd\":\"146\",\"s_1_v_or_c\":\"1\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"3\",\"s_2_marial_status\":\"5\",\"s_2_occupation\":\"10\",\"s_3_khana_m\":\"2\",\"s_3_khana_f\":\"1\",\"s_3_relation_w_main\":\"9\",\"s_3_khana_u_5\":\"2\",\"s_3_child_health_decesion_1\":\"1\",\"s_3_your_health_decesion_1\":\"6\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"4\",\"14\"]},\"cdeath_len\":\"3\",\"last_index\":\"3\"}', NULL),
(4, 4, '2021-11-25 14:58:06', 1, 4, '2021-11-25 14:58:06', '2021-11-25 14:58:06', 'submitted_at', NULL, NULL, 1, NULL, NULL, 1, 58, 1039, 1, NULL, NULL, 6749, NULL, NULL, NULL, 'Golam Mostofa', '{\"rammps_id\":\"4\",\"last_input\":\"submitted_at\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"58\",\"s_1_dd\":\"1039\",\"s_1_v_or_c\":\"1\",\"s_1_mc\":\"6749\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"1\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"3\",\"s_3_khana_m\":\"2\",\"s_3_khana_f\":\"3\",\"s_3_relation_w_main\":\"2\",\"s_3_khana_u_5\":\"2\",\"s_3_child_health_decesion_1\":\"2\",\"s_3_your_health_decesion_1\":\"2\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"sdcd\"],\"r_with_death\":[\"9\"],\"g_of_covid\":[\"3\"],\"dyear\":[\"54\"],\"death_year\":[\"2020\"],\"death_married\":[\"1\"],\"death_pregnant\":[\"3\"],\"death_on_birth\":[\"1\"],\"death_2m_birth\":[\"3\"],\"death_symptoms_1\":[\"5\"],\"death_location\":[\"3\"],\"death_reason_1\":[\"14\"],\"death_violance\":[\"3\"],\"death_detect_by\":[\"1\"],\"death_covid_symptoms\":[\"16\"],\"death_covid_hospital\":[\"3\"],\"death_covid_hospital_a\":[\"3\"],\"death_covid_grave\":[\"2\"]},\"s_4_mother_a_or_d\":\"1\",\"s_4_mother_age\":\"23\",\"s_4_mother_location\":\"2\",\"s_4_mother_name\":\"dsanskndsa\",\"s_4_father_a_or_d\":\"1\",\"s_4_father_age\":\"19\",\"s_4_father_location\":\"1\",\"s_4_father_name\":\"sadsdsa\",\"s_5_sibiling_alive\":\"3\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"g_of_death\":[\"3\",\"3\"],\"age_of_death\":[\"15\",\"17\"],\"year_of_death\":[\"2019\",\"2022\"],\"db_location_death\":[\"2\",\"2\"]},\"s_6_vac_possible\":\"3\",\"s_6_vac_taken\":\"1\",\"s_6_vac_number\":\"2\",\"s_6_vac_which\":\"6\",\"s_6_vac_suggested\":\"3\",\"s_7_owner_phone\":\"3\",\"s_7_recharge_permission\":\"88\",\"s_7_random_access\":\"3\",\"submitted_at\":\"1\",\"sibiling_len\":\"2\",\"last_index\":\"7\"}', NULL),
(5, 5, NULL, 44, 4, '2021-11-29 10:37:47', '2021-11-29 10:37:47', 's_4_father_a_or_d', NULL, NULL, 1, NULL, NULL, 3, 41, 2942, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"last_input\":\"s_4_father_a_or_d\",\"rammps_id\":\"5\",\"s_1_consent\":\"1\",\"s_1_gender\":\"3\",\"s_1_age\":\"41\",\"s_1_dd\":\"2942\",\"s_1_v_or_c\":\"3\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"1\",\"s_2_marial_status\":\"3\",\"s_2_occupation\":\"10\",\"s_3_khana_m\":\"2\",\"s_3_khana_f\":\"2\",\"s_3_relation_w_main\":\"15\",\"s_3_khana_u_5\":\"2\",\"s_3_child_health_decesion_1\":\"7\",\"s_3_child_health_decesion_2\":\"9\",\"s_3_your_health_decesion_1\":\"1\",\"s_3_your_health_decesion_2\":\"11\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"7\",\"8\"],\"g_of_covid\":[\"1\"],\"dyear\":[\"45\"],\"death_year\":[\"2020\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Golam Mostofa\",\"s_4_mother_d_age\":\"45\",\"s_4_mother_db_location\":\"1\",\"s_4_father_a_or_d\":\"3\",\"cdeath_len\":\"2\",\"last_index\":\"4\"}', NULL),
(6, 6, NULL, 44, 4, '2021-11-29 16:34:09', '2021-11-29 16:34:09', 's_7_qnty_of_sim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"last_input\":\"s_7_qnty_of_sim\",\"rammps_id\":\"6\",\"s_3_khana_m\":\"1\",\"s_3_khana_f\":\"2\",\"s_3_relation_w_main\":\"2\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"1\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"r_with_death\":[\"5\"],\"g_of_covid\":[\"3\"],\"dyear\":[\"54\"],\"death_year\":[\"2020\"],\"death_married\":[\"3\"],\"death_symptoms_1\":[\"4\"],\"death_location\":[\"4\"],\"death_reason_1\":[\"12\"]},\"s_5_sibiling_alive\":\"8\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"0\",\"s_6_vac_possible\":\"1\",\"s_6_vac_taken\":\"3\",\"s_7_owner_phone\":\"1\",\"s_7_qnty_of_sim\":\"201\",\"cdeath_len\":\"2\",\"last_index\":\"3\"}', NULL),
(7, 7, NULL, 43, 4, '2021-11-30 11:19:20', '2021-11-30 11:19:20', 's_6_vac_number', NULL, NULL, 1, NULL, NULL, 1, 39, 991, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"last_input\":\"s_6_vac_number\",\"rammps_id\":\"7\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"39\",\"s_1_dd\":\"991\",\"s_1_v_or_c\":\"3\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"3\",\"s_2_marial_status\":\"5\",\"s_2_occupation\":\"2\",\"s_3_khana_m\":\"2\",\"s_3_khana_f\":\"1\",\"s_3_relation_w_main\":\"2\",\"s_3_khana_u_5\":\"1\",\"s_3_child_health_decesion_1\":\"2\",\"s_3_your_health_decesion_1\":\"2\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Amena Begum\"],\"r_with_death\":[\"7\",\"8\"],\"g_of_covid\":[\"3\",\"1\"],\"dyear\":[\"70\",\"54\"],\"death_year\":[\"2019\",\"2021\"],\"death_married\":[\"1\",\"1\"],\"death_symptoms_1\":[\"5\",\"6\"],\"death_location\":[\"3\"],\"death_reason_1\":[\"16\",\"14\"],\"death_violance\":[\"88\",\"88\"],\"death_detect_by\":{\"1\":\"3\"},\"death_covid_symptoms\":{\"1\":\"7\"},\"death_covid_hospital\":{\"1\":\"3\"},\"death_covid_hospital_a\":{\"1\":\"3\"},\"death_covid_grave\":{\"1\":\"3\"}},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Golam Mostofa\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2019\",\"mother_death_covid_death_where\":\"3\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Amena Begum\",\"s_4_father_d_age\":\"54\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2021\",\"father_death_detect_by\":\"3\",\"father_death_covid_symptoms\":\"7\",\"s_5_sibiling_alive\":\"1\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"0\",\"s_6_vac_possible\":\"2\",\"s_6_vac_taken\":\"1\",\"s_6_vac_number\":\"1\",\"cdeath_len\":\"2\",\"last_index\":\"6\"}', NULL),
(8, 8, NULL, 44, 4, '2021-11-30 11:26:31', '2021-11-30 12:11:08', 'father_death_detect_by', NULL, NULL, 1, NULL, NULL, 1, 58, 998, 1, 6586, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"last_input\":\"father_death_detect_by\",\"rammps_id\":\"8\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"58\",\"s_1_dd\":\"998\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6586\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"2\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"23\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"1\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"3\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"7\",\"8\"],\"g_of_covid\":[\"1\",\"3\"],\"dyear\":[\"54\",\"65\"],\"death_year\":[\"2019\",\"2020\"],\"death_married\":[\"1\",\"1\"],\"death_symptoms_1\":[\"4\",\"4\"],\"death_symptoms_2\":[\"3\"],\"death_location\":[\"2\",\"3\"],\"death_reason_1\":[\"4\",\"13\"],\"death_violance\":[\"3\",\"88\"],\"death_pregnant\":{\"1\":\"3\"},\"death_reason_2\":{\"1\":\"6\"},\"death_detect_by\":{\"1\":\"3\"},\"death_covid_symptoms\":{\"1\":\"15\"},\"death_covid_hospital\":{\"1\":\"1\"},\"death_covid_hospital_a\":{\"1\":\"3\"},\"death_covid_grave\":{\"1\":\"3\"}},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Faruk Hossain\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2020\",\"mother_death_covid_death_where\":\"3\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_d_age\":\"54\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2019\",\"father_death_covid_death_where\":\"2\",\"mother_death_detect_by\":\"3\",\"mother_death_covid_symptoms\":\"15\",\"father_death_detect_by\":\"3\",\"cdeath_len\":\"2\",\"last_index\":\"4\"}', NULL),
(9, 9, '2021-11-30 12:24:19', 1, 4, '2021-11-30 12:13:22', '2021-11-30 12:24:19', 'submitted_at', NULL, NULL, 1, NULL, NULL, 1, 33, 3152, 1, 6590, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"rammps_id\":\"9\",\"last_input\":\"submitted_at\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"33\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6590\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"9\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"9\",\"s_3_khana_m\":\"2\",\"s_3_khana_f\":\"1\",\"s_3_relation_w_main\":\"7\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"1\",\"s_3_until_2019\":\"3\",\"s_4_mother_a_or_d\":\"1\",\"s_4_mother_age\":\"52\",\"s_4_mother_location\":\"1\",\"s_4_mother_name\":\"Bilkis Banu\",\"s_4_father_a_or_d\":\"1\",\"s_4_father_age\":\"62\",\"s_4_father_location\":\"1\",\"s_4_father_name\":\"Abu Siddick\",\"s_5_sibiling_alive\":\"4\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"0\",\"s_6_vac_possible\":\"1\",\"s_6_vac_taken\":\"1\",\"s_6_vac_number\":\"88\",\"s_6_vac_which\":\"2\",\"s_6_vac_suggested\":\"3\",\"s_7_owner_phone\":\"3\",\"s_7_recharge_permission\":\"1\",\"s_7_random_access\":\"1\",\"submitted_at\":\"1\",\"last_index\":\"7\"}', NULL),
(10, 10, '2021-11-30 17:11:16', 1, 4, '2021-11-30 17:11:16', '2021-11-30 17:11:16', 'submitted_at', NULL, NULL, 1, NULL, NULL, 1, 65, 987, 1, 6586, NULL, NULL, NULL, NULL, NULL, 'golam Mostofa', '{\"last_input\":\"submitted_at\",\"rammps_id\":\"10\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"65\",\"s_1_dd\":\"987\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6586\",\"s_1_name\":\"golam Mostofa\",\"s_2_education\":\"2\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"17\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"3\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"2\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\",\"Rafayel Nadal\"],\"r_with_death\":[\"7\",\"8\",\"13\"],\"g_of_covid\":[\"1\",\"3\",\"1\"],\"dyear\":[\"65\",\"52\",\"78\"],\"death_year\":[\"2020\",\"2021\",\"2019\"],\"death_married\":[\"1\",\"1\",\"1\"],\"death_symptoms_1\":[\"4\",\"3\",\"4\"],\"death_location\":[\"2\",\"3\",\"2\"],\"death_reason_1\":[\"13\",\"12\",\"15\"],\"death_violance\":[\"3\",\"88\",\"88\"],\"death_detect_by\":[\"3\",\"1\"],\"death_covid_symptoms\":[\"5\",\"10\"],\"death_covid_hospital\":[\"88\",\"3\"],\"death_covid_hospital_a\":[\"88\",\"3\"],\"death_covid_grave\":[\"3\",\"1\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Faruk Hossain\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2021\",\"mother_death_covid_death_where\":\"3\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"2\",\"mother_death_detect_by\":\"1\",\"mother_death_covid_symptoms\":\"10\",\"mother_death_covid_hospital\":\"3\",\"mother_death_covid_hospital_a\":\"3\",\"mother_death_covid_grave\":\"1\",\"father_death_detect_by\":\"3\",\"father_death_covid_symptoms\":\"5\",\"father_death_covid_hospital\":\"88\",\"father_death_covid_hospital_a\":\"88\",\"father_death_covid_grave\":\"3\",\"s_5_sibiling_alive\":\"2\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"g_of_death\":[\"3\",\"3\"],\"age_of_death\":[\"25\",\"56\"],\"year_of_death\":[\"2020\",\"2020\"],\"db_location_death\":[\"1\",\"1\"]},\"s_6_vac_possible\":\"1\",\"s_6_vac_taken\":\"1\",\"s_6_vac_number\":\"1\",\"s_6_vac_which\":\"4\",\"s_6_vac_suggested\":\"3\",\"s_7_owner_phone\":\"3\",\"s_7_recharge_permission\":\"1\",\"s_7_random_access\":\"1\",\"submitted_at\":\"1\",\"sibiling_len\":\"2\",\"cdeath_len\":\"3\",\"last_index\":\"7\"}', NULL),
(11, 11, NULL, 43, 4, '2021-12-01 12:37:23', '2021-12-01 12:37:23', 's_6_vac_possible', NULL, NULL, 1, NULL, NULL, 1, 65, 3152, 1, 6590, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"last_input\":\"s_6_vac_possible\",\"rammps_id\":\"11\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"65\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6590\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"2\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"13\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"4\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"2\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"7\",\"8\"],\"g_of_covid\":[\"1\",\"5\"],\"dyear\":[\"52\",\"62\"],\"death_year\":[\"2020\",\"2021\"],\"death_married\":[\"1\",\"1\"],\"death_symptoms_1\":[\"7\",\"3\"],\"death_location\":[\"1\",\"3\"],\"death_reason_1\":[\"8\",\"8\"],\"death_violance\":[\"3\",\"3\"],\"death_detect_by\":[\"1\",\"3\"],\"death_covid_symptoms\":[\"5\",\"4\"],\"death_covid_hospital\":[\"3\",\"3\"],\"death_covid_hospital_a\":[\"3\",\"3\"],\"death_covid_grave\":[\"45\",\"1\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Faruk Hossain\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2021\",\"mother_death_covid_death_where\":\"3\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"1\",\"mother_death_detect_by\":\"3\",\"mother_death_covid_symptoms\":\"4\",\"mother_death_covid_hospital\":\"3\",\"mother_death_covid_hospital_a\":\"3\",\"mother_death_covid_grave\":\"1\",\"father_death_detect_by\":\"1\",\"father_death_covid_symptoms\":\"5\",\"father_death_covid_hospital\":\"3\",\"father_death_covid_hospital_a\":\"3\",\"father_death_covid_grave\":\"45\",\"s_5_sibiling_alive\":\"2\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"1\",\"sibiling\":{\"g_of_death\":[\"3\",\"3\"],\"age_of_death\":[\"45\",\"80\"],\"year_of_death\":[\"2019\",\"2019\"],\"db_location_death\":[\"2\",\"2\"]},\"s_6_vac_possible\":\"2\",\"sibiling_len\":\"2\",\"cdeath_len\":\"2\",\"last_index\":\"6\"}', NULL),
(12, 12, NULL, 43, 4, '2021-12-01 12:40:55', '2021-12-01 13:35:34', 's_5_sibiling_dead_2019_a', NULL, NULL, 1, NULL, NULL, 1, 33, 3152, 1, 6590, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"rammps_id\":\"12\",\"last_input\":\"s_5_sibiling_dead_2019_a\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"33\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6590\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"1\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"3\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"1\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"9\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"7\",\"8\"],\"g_of_covid\":[\"3\",\"3\"],\"dyear\":[\"65\",\"75\"],\"death_year\":[\"2019\",\"2019\"],\"death_married\":[\"1\",\"1\"],\"death_pregnant\":[\"3\"],\"death_symptoms_1\":[\"4\",\"5\"],\"death_location\":[\"2\",\"2\"],\"death_reason_1\":[\"13\",\"2\"],\"death_violance\":[\"88\",\"88\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Faruk Hossain\",\"s_4_mother_d_age\":\"75\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2019\",\"mother_death_covid_death_where\":\"2\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_d_age\":\"65\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2019\",\"father_death_covid_death_where\":\"2\",\"s_5_sibiling_alive\":\"3\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"g_of_death\":[\"1\"],\"age_of_death\":[\"58\"]},\"sibiling_len\":\"2\",\"cdeath_len\":\"2\",\"last_index\":\"3\"}', NULL),
(13, 13, NULL, 51, 4, '2021-12-01 13:41:56', '2021-12-01 13:43:59', 's_6_vac_taken', NULL, NULL, 1, NULL, NULL, 1, 65, 3152, 1, 6586, NULL, NULL, NULL, NULL, NULL, 'golam Mostofa', '{\"rammps_id\":\"13\",\"last_input\":\"s_6_vac_taken\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"65\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6586\",\"s_1_name\":\"golam Mostofa\",\"s_2_education\":\"2\",\"s_2_marial_status\":\"3\",\"s_2_occupation\":\"9\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"16\",\"s_3_your_health_decesion_1\":\"3\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"7\",\"12\"],\"g_of_covid\":[\"1\",\"3\"],\"dyear\":[\"65\",\"45\"],\"death_year\":[\"2020\",\"2019\"],\"death_married\":[\"3\",\"3\"],\"death_symptoms_1\":[\"3\",\"5\"],\"death_location\":[\"2\",\"3\"],\"death_reason_1\":[\"10\",\"14\"],\"death_violance\":[\"3\",\"88\"],\"death_detect_by\":[\"3\"],\"death_covid_symptoms\":[\"5\"],\"death_covid_hospital\":[\"3\"],\"death_covid_hospital_a\":[\"3\"],\"death_covid_grave\":[\"3\"]},\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_d_age\":\"65\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"2\",\"father_death_detect_by\":\"3\",\"father_death_covid_symptoms\":\"5\",\"father_death_covid_hospital\":\"3\",\"father_death_covid_hospital_a\":\"3\",\"father_death_covid_grave\":\"3\",\"s_5_sibiling_alive\":\"3\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"g_of_death\":[\"1\",\"1\"],\"age_of_death\":[\"67\",\"72\"],\"year_of_death\":[\"2019\",\"2020\"],\"db_location_death\":[\"1\",\"2\"],\"death_detect_by\":{\"1\":\"3\"},\"death_covid_symptoms\":{\"1\":\"10\"},\"death_covid_hospital\":{\"1\":\"3\"},\"death_covid_hospital_a\":{\"1\":\"3\"},\"death_covid_death_where\":{\"1\":\"3\"},\"death_covid_grave\":{\"1\":\"45\"}},\"s_6_vac_possible\":\"2\",\"s_6_vac_taken\":\"3\",\"sibiling_len\":\"2\",\"cdeath_len\":\"2\",\"last_index\":\"6\"}', NULL),
(14, 14, '2021-12-01 14:25:36', 1, 4, '2021-12-01 14:23:48', '2021-12-01 14:25:36', 'submitted_at', NULL, NULL, 1, NULL, NULL, 1, 65, 3152, 1, 6590, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"rammps_id\":\"14\",\"last_input\":\"submitted_at\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"65\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6590\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"1\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"15\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"4\",\"s_3_your_health_decesion_1\":\"3\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"7\",\"8\"],\"g_of_covid\":[\"1\",\"3\"],\"dyear\":[\"65\",\"54\"],\"death_year\":[\"2020\",\"2020\"],\"death_married\":[\"1\",\"1\"],\"death_symptoms_1\":[\"4\",\"4\"],\"death_location\":[\"2\",\"2\"],\"death_reason_1\":[\"12\",\"4\"],\"death_violance\":[\"88\",\"88\"],\"death_detect_by\":[\"1\",\"3\"],\"death_covid_symptoms\":[\"5\",\"8\"],\"death_covid_hospital\":[\"3\",\"3\"],\"death_covid_hospital_a\":[\"3\",\"3\"],\"death_covid_grave\":[\"3\",\"45\"],\"death_pregnant\":{\"1\":\"3\"}},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Faruk Hossain\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2020\",\"mother_death_covid_death_where\":\"2\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"2\",\"mother_death_detect_by\":\"3\",\"mother_death_covid_symptoms\":\"8\",\"mother_death_covid_hospital\":\"3\",\"mother_death_covid_hospital_a\":\"3\",\"mother_death_covid_grave\":\"45\",\"father_death_detect_by\":\"1\",\"father_death_covid_symptoms\":\"5\",\"father_death_covid_hospital\":\"3\",\"father_death_covid_hospital_a\":\"3\",\"father_death_covid_grave\":\"3\",\"s_5_sibiling_alive\":\"2\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"g_of_death\":[\"1\",\"1\"],\"age_of_death\":[\"43\",\"45\"],\"year_of_death\":[\"2020\",\"2020\"],\"db_location_death\":[\"2\",\"1\"],\"death_detect_by\":[\"3\"],\"death_covid_symptoms\":[\"12\"],\"death_covid_hospital\":[\"3\"],\"death_covid_hospital_a\":[\"3\"],\"death_covid_death_where\":[\"2\"],\"death_covid_grave\":[\"3\"]},\"s_6_vac_possible\":\"1\",\"s_6_vac_taken\":\"1\",\"s_6_vac_number\":\"1\",\"s_6_vac_which\":\"5\",\"s_6_vac_suggested\":\"1\",\"s_7_owner_phone\":\"1\",\"s_7_qnty_of_sim\":\"8\",\"s_7_recharge_permission\":\"3\",\"s_7_random_access\":\"1\",\"submitted_at\":\"1\",\"sibiling_len\":\"2\",\"cdeath_len\":\"2\",\"last_index\":\"7\"}', NULL),
(15, 15, NULL, 43, 4, '2021-12-01 15:15:52', '2021-12-01 15:15:52', 's_4_father_d_year', NULL, NULL, 1, NULL, NULL, 1, 54, 3152, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Tree adds', '{\"last_input\":\"s_4_father_d_year\",\"rammps_id\":\"15\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"54\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_name\":\"Tree adds\",\"s_2_education\":\"1\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"11\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"8\",\"s_3_your_health_decesion_1\":\"3\",\"s_3_until_2019\":\"3\",\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Naznin\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"xasx\",\"s_4_father_db_location\":\"2\",\"s_4_father_d_year\":\"2019\",\"last_index\":\"3\"}', NULL),
(16, 16, NULL, 43, 4, '2021-12-01 15:16:45', '2021-12-02 16:43:40', 's_2_occupation', NULL, NULL, 5, NULL, NULL, 3, 45, 2942, 1, NULL, NULL, 6695, NULL, NULL, NULL, 'Faruk Hossain', '{\"rammps_id\":\"16\",\"last_input\":\"s_2_occupation\",\"s_1_consent\":\"5\",\"s_1_gender\":\"3\",\"s_1_age\":\"45\",\"s_1_dd\":\"2942\",\"s_1_v_or_c\":\"1\",\"s_1_mc\":\"6695\",\"s_1_name\":\"Faruk Hossain\",\"s_2_education\":\"1\",\"s_2_marial_status\":\"5\",\"s_2_occupation\":\"2\"}', NULL),
(17, 17, '2021-12-02 16:49:32', 1, 4, '2021-12-02 16:45:33', '2021-12-02 16:49:32', 'submitted_at', NULL, NULL, 5, NULL, NULL, 1, 65, 2942, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Poland Trust', '{\"rammps_id\":\"17\",\"last_input\":\"submitted_at\",\"s_1_consent\":\"5\",\"s_1_gender\":\"1\",\"s_1_age\":\"65\",\"s_1_dd\":\"2942\",\"s_1_v_or_c\":\"1\",\"s_1_name\":\"Poland Trust\",\"s_2_education\":\"1\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"5\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"14\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"8\",\"s_3_until_2019\":\"3\",\"s_4_mother_a_or_d\":\"1\",\"s_4_mother_age\":\"45\",\"s_4_mother_location\":\"1\",\"s_4_mother_name\":\"Rodex\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Frutex\",\"s_4_father_db_location\":\"2\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"4\",\"father_death_detect_by\":\"3\",\"father_death_covid_symptoms\":\"3\",\"father_death_covid_hospital\":\"3\",\"father_death_covid_hospital_a\":\"1\",\"father_death_covid_grave\":\"2\",\"s_5_sibiling_alive\":\"2\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"g_of_death\":[\"3\",\"1\"],\"age_of_death\":[\"4\",\"68\"],\"year_of_death\":[\"2020\",\"2021\"],\"db_location_death\":[\"2\",\"1\"],\"death_detect_by\":[\"3\"],\"death_covid_symptoms\":[\"10\"],\"death_covid_hospital\":[\"3\"],\"death_covid_hospital_a\":[\"3\"],\"death_covid_death_where\":[\"2\"],\"death_covid_grave\":[\"2\"]},\"s_6_vac_possible\":\"1\",\"s_6_vac_taken\":\"3\",\"s_6_vac_ignorance_reason\":\"9\",\"s_7_owner_phone\":\"4\",\"s_7_recharge_permission\":\"3\",\"s_7_random_access\":\"3\",\"submitted_at\":\"1\",\"sibiling_len\":\"2\",\"last_index\":\"7\"}', NULL),
(18, 18, '2021-12-02 17:14:33', 1, 4, '2021-12-02 17:12:17', '2021-12-02 17:14:33', 'submitted_at', NULL, NULL, 1, NULL, NULL, 1, 52, 3152, 99, NULL, NULL, NULL, 99, NULL, NULL, NULL, '{\"rammps_id\":\"18\",\"last_input\":\"submitted_at\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"52\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"99\",\"s_1_ccuzmc_o\":\"99\",\"s_2_education\":\"2\",\"s_2_marial_status\":\"3\",\"s_2_occupation\":\"7\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"8\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"3\",\"s_3_until_2019\":\"3\",\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"dsdsa\",\"s_4_mother_db_location\":\"2\",\"s_4_mother_d_year\":\"2021\",\"mother_death_detect_by\":\"3\",\"mother_death_covid_symptoms\":\"3\",\"mother_death_covid_hospital\":\"3\",\"mother_death_covid_hospital_a\":\"1\",\"mother_death_covid_grave\":\"3\",\"s_5_sibiling_alive\":\"2\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"g_of_death\":[\"3\",\"3\"],\"age_of_death\":[\"6\",\"14\"],\"year_of_death\":[\"2020\",\"2019\"],\"db_location_death\":[\"2\",\"1\"],\"death_detect_by\":[\"3\"],\"death_covid_symptoms\":[\"7\"],\"death_covid_hospital\":[\"3\"],\"death_covid_hospital_a\":[\"3\"],\"death_covid_death_where\":[\"3\"],\"death_covid_grave\":[\"3\"]},\"s_6_vac_possible\":\"4\",\"s_6_vac_taken\":\"3\",\"s_6_vac_ignorance_reason\":\"7\",\"s_7_owner_phone\":\"3\",\"s_7_recharge_permission\":\"3\",\"s_7_random_access\":\"3\",\"submitted_at\":\"1\",\"sibiling_len\":\"2\",\"last_index\":\"7\"}', NULL),
(19, 19, NULL, 51, 4, '2021-12-05 10:42:39', '2021-12-05 14:38:42', 's_2_education', NULL, NULL, 5, NULL, NULL, 3, NULL, 3152, 1, 6587, NULL, NULL, NULL, NULL, NULL, 'adssd adssd', '{\"rammps_id\":\"19\",\"last_input\":\"s_2_education\",\"s_1_consent\":\"5\",\"s_1_gender\":\"3\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6587\",\"s_1_name\":\"adssd adssd\",\"s_2_education\":\"1\"}', NULL),
(20, 20, NULL, 44, 4, '2021-12-06 15:31:34', '2021-12-06 15:31:34', 'father_death_covid_death_where', NULL, NULL, 1, NULL, NULL, 1, 33, 3152, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"last_input\":\"father_death_covid_death_where\",\"rammps_id\":\"20\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"33\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"2\",\"s_2_marial_status\":\"1\",\"s_2_occupation\":\"9\",\"s_3_khana_m\":\"2\",\"s_3_relation_w_main\":\"12\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"4\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\",\"ssasd\"],\"r_with_death\":[\"7\",\"8\",\"7\"],\"g_of_covid\":[\"1\",\"3\",\"1\"],\"dyear\":[\"55\",\"65\"],\"death_year\":[\"2019\",\"2019\",\"2020\"],\"death_married\":{\"0\":\"1\",\"2\":\"1\"},\"death_symptoms_1\":{\"0\":\"1\",\"2\":\"1\"},\"death_location\":[\"2\"],\"death_reason_1\":[\"5\"],\"death_violance\":[\"3\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Faruk Hossain\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2019\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2019\",\"father_death_covid_death_where\":\"2\",\"cdeath_len\":\"3\",\"last_index\":\"3\"}', NULL),
(21, 21, NULL, 44, 4, '2021-12-06 15:32:17', '2021-12-08 17:17:45', 'father_death_covid_death_where', NULL, NULL, 5, NULL, NULL, 1, 33, 3152, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Golam Mostofa', '{\"last_input\":\"father_death_covid_death_where\",\"rammps_id\":\"21\",\"s_1_consent\":\"5\",\"s_1_gender\":\"1\",\"s_1_age\":\"33\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_name\":\"Golam Mostofa\",\"s_2_education\":\"5\",\"s_2_occupation\":\"11\",\"s_2_marial_status\":\"7\",\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"fdssdf\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"1996\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"ccxxc\",\"s_4_father_db_location\":\"2\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"1\",\"last_index\":\"4\",\"call_status\":\"44\"}', NULL),
(22, 22, NULL, 45, 4, '2021-12-11 15:51:22', '2021-12-11 15:51:22', 's_5_sibiling_dead_2019_a', NULL, NULL, 1, NULL, NULL, 1, 50, 3152, 1, 6586, NULL, NULL, NULL, NULL, NULL, 'adssa asdsa', '{\"last_input\":\"s_5_sibiling_dead_2019_a\",\"rammps_id\":\"22\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"50\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6586\",\"s_1_name\":\"adssa asdsa\",\"s_2_education\":\"1\",\"s_2_occupation\":\"2\",\"s_2_marial_status\":\"1\",\"s_3_khana_m\":\"2\",\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"sa as\",\"s_4_mother_db_location\":\"2\",\"s_4_mother_d_year\":\"2012\",\"s_5_sibiling_alive\":\"1\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"0\",\"last_index\":\"6\",\"call_status\":\"45\"}', NULL),
(23, 24, NULL, 45, 4, '2021-12-12 12:52:04', '2021-12-12 12:52:04', 's_5_sibiling_dead_2019_a', NULL, NULL, 1, NULL, NULL, 1, 32, 2942, 1, 6587, NULL, NULL, NULL, NULL, 99, NULL, '{\"last_input\":\"s_5_sibiling_dead_2019_a\",\"rammps_id\":\"24\",\"s_1_consent\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"32\",\"s_1_dd\":\"2942\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6587\",\"s_1_d_name\":\"99\",\"s_3_khana\":\"0\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"10\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"1\",\"cdeath\":{\"name\":[\"Golam Mostofa\"],\"r_with_death\":[\"8\"],\"g_of_covid\":[\"3\"],\"dyear\":[\"65\"],\"death_year\":[\"2020\"],\"death_married\":[\"1\"],\"death_pregnant\":[\"3\"],\"death_symptoms_1\":[\"8\"],\"death_location\":[\"2\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Golam Mostofa\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2020\",\"mother_death_covid_death_where\":\"2\",\"s_5_sibiling_alive\":\"2\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"1\",\"sibiling\":{\"name\":[\"gh\"]},\"sibiling_len\":\"1\",\"cdeath_len\":\"1\",\"last_index\":\"5\",\"call_status\":\"45\"}', NULL),
(24, 25, NULL, 52, 4, '2021-12-12 13:43:56', '2021-12-12 18:17:40', 's_5_sibiling_dead_2019_a', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"rammps_id\":\"25\",\"last_input\":\"s_5_sibiling_dead_2019_a\",\"s_1_consent\":\"1\",\"s_1_location\":\"3\",\"s_3_khana\":\"0\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"1\",\"cdeath\":{\"name\":[\"Golam Mostofa\"],\"r_with_death\":[\"3\"],\"g_of_covid\":[\"3\"],\"dyear\":[\"65\"],\"death_year\":[\"2020\"],\"death_married\":[\"3\"],\"death_pregnant\":[\"1\"],\"death_on_birth\":[\"1\"],\"death_2m_birth\":[\"88\"],\"death_symptoms_1\":[\"1\"],\"death_location\":[\"1\"],\"death_reason_1\":[\"1\"],\"death_violance\":[\"3\"],\"death_detect_by\":[\"1\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"dfds\",\"s_4_mother_db_location\":\"1\",\"s_5_sibiling_alive\":\"1\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"1\",\"sibiling\":{\"g_of_death\":[\"3\"],\"year_of_death\":[\"2020\"],\"db_location_death\":[\"2\"],\"death_covid_death_where\":[\"1\"]},\"last_index\":\"6\",\"call_status\":\"52\"}', NULL),
(25, 26, '2021-12-13 12:05:15', 1, 4, '2021-12-13 12:05:15', '2021-12-13 12:05:15', 'submitted_at', NULL, NULL, 1, NULL, NULL, 1, 45, 3152, 1, NULL, NULL, NULL, NULL, NULL, 1, 'Abul', '{\"last_input\":\"submitted_at\",\"rammps_id\":\"26\",\"s_1_consent\":\"1\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"45\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_d_name\":\"1\",\"s_1_name\":\"Abul\",\"s_2_education\":\"1\",\"s_2_occupation\":\"10\",\"s_2_marial_status\":\"1\",\"s_3_khana\":\"2\",\"s_3_khana_m\":\"1\",\"s_3_relation_w_main\":\"1\",\"s_3_khana_u_5\":\"1\",\"s_3_child_health_decesion_1\":\"5\",\"s_3_child_health_decesion_2\":\"2\",\"s_3_child_health_decesion_3\":\"3\",\"s_3_child_health_decesion_4\":\"9\",\"s_3_your_health_decesion_1\":\"1\",\"s_3_your_health_decesion_2\":\"2\",\"s_3_your_health_decesion_3\":\"3\",\"s_3_your_health_decesion_4\":\"2\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\",\"Faruk Hossain\"],\"r_with_death\":[\"7\",\"8\"],\"g_of_covid\":[\"3\",\"3\"],\"dyear\":[\"45\",\"45\"],\"death_year\":[\"2020\",\"2020\"],\"death_married\":[\"3\",\"3\"],\"death_pregnant\":[\"3\",\"1\"],\"death_symptoms_1\":[\"5\",\"2\"],\"death_location\":[\"3\",\"2\"],\"death_reason_1\":[\"9\",\"3\"],\"death_violance\":[\"3\",\"3\"],\"death_detect_by\":[\"3\",\"3\"],\"death_covid_symptoms_1\":[\"4\",\"8\"],\"death_covid_symptoms_2\":[\"10\",\"7\"],\"death_covid_symptoms_3\":[\"3\",\"10\"],\"death_covid_symptoms_4\":[\"9\",\"6\"],\"death_covid_hospital\":[\"3\",\"3\"],\"death_covid_hospital_a\":[\"3\",\"3\"],\"death_covid_grave\":[\"3\",\"3\"],\"death_on_birth\":{\"1\":\"3\"},\"death_symptoms_2\":{\"1\":\"4\"}},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"Faruk Hossain\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2020\",\"mother_death_covid_death_where\":\"2\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"3\",\"mother_death_detect_by\":\"3\",\"mother_death_covid_symptoms_1\":\"8\",\"mother_death_covid_symptoms_2\":\"7\",\"mother_death_covid_symptoms_3\":\"10\",\"mother_death_covid_symptoms_4\":\"6\",\"mother_death_covid_hospital\":\"3\",\"mother_death_covid_hospital_a\":\"3\",\"mother_death_covid_grave\":\"3\",\"father_death_detect_by\":\"3\",\"father_death_covid_symptoms_1\":\"4\",\"father_death_covid_symptoms_2\":\"10\",\"father_death_covid_symptoms_3\":\"3\",\"father_death_covid_symptoms_4\":\"9\",\"father_death_covid_hospital\":\"3\",\"father_death_covid_hospital_a\":\"3\",\"father_death_covid_grave\":\"3\",\"s_5_sibiling_alive\":\"1\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"name\":[\"testesfda\",\"dsadsadsa\"],\"g_of_death\":[\"3\",\"5\"],\"dyear\":[\"45\",\"56\"],\"year_of_death\":[\"2020\",\"2020\"],\"db_location_death\":[\"2\",\"2\"],\"death_covid_death_where\":[\"3\"],\"death_detect_by\":[\"88\",\"3\"],\"death_covid_symptoms_1\":[\"9\",\"5\"],\"death_covid_symptoms_2\":[\"4\",\"7\"],\"death_covid_symptoms_3\":[\"5\",\"10\"],\"death_covid_symptoms_4\":[\"5\",\"11\"],\"death_covid_hospital\":[\"3\",\"3\"],\"death_covid_hospital_a\":[\"3\",\"3\"],\"death_covid_grave\":[\"3\",\"4\"]},\"s_6_vac_possible\":\"4\",\"s_6_vac_taken\":\"1\",\"s_6_vac_number\":\"2\",\"s_6_vac_which\":\"1\",\"s_6_vac_suggested\":\"7\",\"s_7_owner_phone\":\"5\",\"s_7_own_phone\":\"3\",\"s_7_recharge_permission\":\"1\",\"s_7_random_access\":\"1\",\"submitted_at\":\"1\",\"sibiling_len\":\"2\",\"cdeath_len\":\"2\",\"last_index\":\"7\",\"call_status\":\"1\"}', NULL),
(26, 27, NULL, 45, 4, '2021-12-13 12:19:23', '2021-12-13 12:19:23', 's_4_father_d_year', 1, NULL, 1, NULL, NULL, 1, 33, 2942, 1, NULL, NULL, NULL, NULL, NULL, 1, 'dadsadsa', '{\"last_input\":\"s_4_father_d_year\",\"rammps_id\":\"27\",\"s_1_consent\":\"1\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"33\",\"s_1_dd\":\"2942\",\"s_1_v_or_c\":\"1\",\"s_1_d_name\":\"1\",\"s_1_name\":\"dadsadsa\",\"s_2_education\":\"1\",\"s_2_occupation\":\"12\",\"s_2_marial_status\":\"1\",\"s_3_khana\":\"2\",\"s_3_relation_w_main\":\"2\",\"s_3_khana_u_5\":\"0\",\"s_3_your_health_decesion_1\":\"2\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"1\",\"cdeath\":{\"name\":[\"Golam Mostofa\"],\"r_with_death\":[\"7\"],\"g_of_covid\":[\"3\"],\"dyear\":[\"45\"],\"death_year\":[\"2020\"],\"death_married\":[\"3\"],\"death_pregnant\":[\"3\"]},\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2020\",\"last_index\":\"3\",\"call_status\":\"45\"}', NULL),
(27, 28, NULL, 52, 4, '2021-12-13 12:20:06', '2021-12-13 12:20:06', 's_1_location', 3, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"rammps_id\":\"28\",\"last_input\":\"s_1_location\",\"s_1_consent\":\"1\",\"s_1_location\":\"3\",\"call_status\":\"52\"}', NULL),
(28, 29, NULL, 52, 4, '2021-12-13 12:20:46', '2021-12-13 12:20:46', 's_1_location_e', 66, 'TESTED', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"rammps_id\":\"29\",\"last_input\":\"s_1_location_e\",\"s_1_consent\":\"1\",\"s_1_location\":\"66\",\"s_1_location_e\":\"TESTED\",\"call_status\":\"52\"}', NULL),
(29, 31, NULL, 45, 23, '2021-12-14 12:56:24', '2021-12-14 12:56:24', 's_7_own_phone', 1, NULL, 1, NULL, NULL, 1, 36, 987, 1, NULL, NULL, 6667, NULL, NULL, 99, NULL, '{\"last_input\":\"s_7_own_phone\",\"rammps_id\":\"31\",\"s_1_consent\":\"1\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"36\",\"s_1_dd\":\"987\",\"s_1_v_or_c\":\"1\",\"s_1_mc\":\"6667\",\"s_1_d_name\":\"99\",\"s_2_education\":\"2\",\"s_2_occupation\":\"2\",\"s_2_marial_status\":\"3\",\"s_3_khana\":\"2\",\"s_3_relation_w_main\":\"14\",\"s_3_khana_u_5\":\"2\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"dsadsa\"],\"r_with_death\":[\"6\"],\"g_of_covid\":[\"3\"],\"dyear\":[\"45\"],\"death_year\":[\"2020\"],\"death_married\":[\"3\"],\"death_pregnant\":[\"1\"],\"death_on_birth\":[\"1\"],\"death_symptoms_1\":[\"4\"],\"death_location\":[\"2\"]},\"s_4_mother_a_or_d\":\"1\",\"s_4_mother_age\":\"21\",\"s_4_mother_location\":\"2\",\"s_4_father_a_or_d\":\"1\",\"s_5_sibiling_alive\":\"1\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"name\":[\"dsdas\"],\"g_of_death\":[\"3\"],\"dyear\":[\"45\"],\"year_of_death\":[\"2020\"],\"db_location_death\":[\"1\"],\"death_covid_death_where\":[\"2\"]},\"s_7_owner_phone\":\"5\",\"s_7_own_phone\":\"3\",\"sibiling_len\":\"2\",\"last_index\":\"2\",\"call_status\":\"45\"}', NULL),
(30, 32, NULL, 41, 23, '2021-12-15 11:23:09', '2021-12-15 11:23:09', 's_1_consent', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"last_input\":\"s_1_consent\",\"rammps_id\":\"32\",\"s_1_consent\":\"3\",\"last_index\":\"2\",\"call_status\":\"41\"}', NULL),
(31, 33, NULL, 41, 23, '2021-12-15 11:39:06', '2021-12-15 11:39:06', 's_1_consent', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"last_input\":\"s_1_consent\",\"rammps_id\":\"33\",\"s_1_consent\":\"3\",\"call_status\":\"41\"}', NULL),
(32, 34, NULL, 53, 23, '2021-12-15 12:02:03', '2021-12-15 12:02:03', 's_1_location', 3, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"rammps_id\":\"34\",\"last_input\":\"s_1_location\",\"s_1_consent\":\"5\",\"s_1_location\":\"3\",\"call_status\":\"53\"}', NULL),
(33, 35, '2021-12-19 15:46:03', 1, 23, '2021-12-19 15:46:03', '2021-12-19 15:46:03', 'submitted_at', 1, NULL, 1, NULL, NULL, 1, 45, 3152, 1, 6587, NULL, NULL, NULL, NULL, 1, 'fdsdsfd', '{\"last_input\":\"submitted_at\",\"rammps_id\":\"35\",\"s_1_consent\":\"1\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"45\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6587\",\"s_1_d_name\":\"1\",\"s_1_name\":\"fdsdsfd\",\"s_2_education\":\"11\",\"s_2_occupation\":\"10\",\"s_2_marial_status\":\"1\",\"s_3_khana\":\"1\",\"s_3_relation_w_main\":\"3\",\"s_3_khana_u_5\":\"1\",\"s_3_child_health_decesion_1\":\"1\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Golam Mostofa\"],\"r_with_death\":[\"7\",\"5\"],\"g_of_covid\":[\"3\",\"3\"],\"dyear\":[\"45\",\"45\"],\"death_year\":[\"2020\"],\"death_married\":[\"3\"],\"death_pregnant\":[\"1\"],\"death_on_birth\":[\"3\"],\"death_2m_birth\":[\"3\"],\"death_symptoms_1\":[\"7\"],\"death_location\":[\"1\"],\"death_reason_1\":[\"26\"],\"death_violance\":[\"3\"],\"death_detect_by\":[\"3\"],\"death_covid_symptoms_1\":[\"13\"],\"death_covid_hospital\":[\"3\"],\"death_covid_hospital_a\":[\"3\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"5555\",\"s_4_mother_db_location\":\"2\",\"s_4_mother_d_year\":\"2020\",\"mother_death_covid_death_where\":\"2\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Golam Mostofa\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"1\",\"mother_death_detect_by\":\"3\",\"mother_death_covid_symptoms_1\":\"2\",\"mother_death_covid_hospital\":\"3\",\"mother_death_covid_hospital_a\":\"3\",\"mother_death_covid_grave\":\"4\",\"father_death_detect_by\":\"3\",\"father_death_covid_symptoms_1\":\"13\",\"father_death_covid_hospital\":\"3\",\"father_death_covid_hospital_a\":\"3\",\"s_5_sibiling_alive\":\"2\",\"s_5_sibiling_dead_in_alive\":\"2\",\"s_5_sibiling_dead_2019_a\":\"2\",\"sibiling\":{\"name\":[\"dss\"],\"g_of_death\":[\"3\",\"3\"],\"dyear\":[\"45\"],\"year_of_death\":[\"2020\"],\"db_location_death\":[\"2\"],\"death_covid_death_where\":[\"2\"],\"death_detect_by\":[\"3\"],\"death_covid_symptoms_1\":[\"11\"],\"death_covid_symptoms_2\":[\"9\"],\"death_covid_hospital\":[\"3\"],\"death_covid_hospital_a\":[\"1\"],\"death_covid_grave\":[\"1\"]},\"s_6_vac_possible\":\"1\",\"s_6_vac_taken\":\"3\",\"s_7_owner_phone\":\"5\",\"s_7_own_phone\":\"3\",\"submitted_at\":\"1\",\"sibiling_len\":\"2\",\"cdeath_len\":\"2\",\"last_index\":\"7\",\"call_status\":\"1\"}', NULL),
(34, 36, '2021-12-19 15:49:35', 1, 23, '2021-12-19 15:49:35', '2021-12-19 15:49:35', 'submitted_at', 1, NULL, 1, NULL, NULL, 1, 42, 3152, 1, 6586, NULL, NULL, NULL, NULL, 99, NULL, '{\"rammps_id\":\"36\",\"last_input\":\"submitted_at\",\"s_1_consent\":\"1\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"42\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6586\",\"s_1_d_name\":\"99\",\"s_2_education\":\"1\",\"s_2_occupation\":\"14\",\"s_2_marial_status\":\"1\",\"s_3_khana\":\"2\",\"s_3_relation_w_main\":\"2\",\"s_3_your_health_decesion_1\":\"3\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"r_with_death\":[\"8\",\"14\"],\"g_of_covid\":[\"3\",\"3\"],\"dyear\":[\"65\",\"65\"],\"death_year\":[\"2020\",\"2019\"],\"death_married\":[\"3\",\"1\"],\"death_pregnant\":[\"3\"],\"death_symptoms_1\":[\"2\",\"4\"],\"name\":{\"1\":\"Faruk Hossain\"},\"death_location\":{\"1\":\"5\"},\"death_reason_1\":{\"1\":\"15\"},\"death_violance\":{\"1\":\"3\"}},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_d_age\":\"65\",\"s_4_mother_db_location\":\"1\",\"s_4_mother_d_year\":\"2020\",\"submitted_at\":\"1\",\"cdeath_len\":\"2\",\"last_index\":\"7\",\"call_status\":\"1\"}', NULL),
(35, 37, NULL, 45, 23, '2021-12-22 13:49:51', '2021-12-22 13:50:28', 's_1_consent', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"rammps_id\":\"37\",\"last_input\":\"s_1_consent\",\"s_1_consent\":\"5\",\"call_status\":\"45\"}', NULL),
(36, 39, NULL, 51, 23, '2021-12-22 13:55:34', '2021-12-23 12:05:25', 's_1_gender', 1, NULL, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"last_input\":\"s_1_gender\",\"rammps_id\":\"39\",\"s_1_consent\":\"5\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"call_status\":\"51\"}', NULL),
(37, 40, NULL, 51, 23, '2021-12-23 12:06:02', '2021-12-23 12:14:08', 's_3_khana', 1, NULL, 5, NULL, NULL, 1, 42, 1081, 1, NULL, NULL, 6859, NULL, NULL, 99, NULL, '{\"rammps_id\":\"40\",\"last_input\":\"s_3_khana\",\"s_1_consent\":\"5\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"42\",\"s_1_dd\":\"1081\",\"s_1_v_or_c\":\"1\",\"s_1_mc\":\"6859\",\"s_1_d_name\":\"99\",\"s_2_education\":\"3\",\"s_2_occupation\":\"8\",\"s_2_marial_status\":\"5\",\"s_3_khana\":\"2\",\"last_index\":\"2\",\"call_status\":\"51\"}', NULL),
(38, 41, '2021-12-28 11:27:46', 1, 23, '2021-12-28 10:39:59', '2021-12-28 11:27:46', 'submitted_at', 1, NULL, 1, NULL, NULL, 1, 65, 3152, 1, 6594, NULL, NULL, NULL, NULL, 1, 'Abul Basar', '{\"rammps_id\":\"41\",\"last_input\":\"submitted_at\",\"s_1_consent\":\"1\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"65\",\"s_1_dd\":\"3152\",\"s_1_v_or_c\":\"1\",\"s_1_cc\":\"6594\",\"s_1_d_name\":\"1\",\"s_1_name\":\"Abul Basar\",\"s_2_education\":\"2\",\"s_2_occupation\":\"14\",\"s_2_marial_status\":\"3\",\"s_3_khana\":\"2\",\"s_3_khana_m\":\"1\",\"s_3_relation_w_main\":\"1\",\"s_3_khana_u_5\":\"1\",\"s_3_child_health_decesion_1\":\"2\",\"s_3_child_health_decesion_2\":\"4\",\"s_3_your_health_decesion_1\":\"4\",\"s_3_until_2019\":\"1\",\"s_3_until_2019_a\":\"2\",\"cdeath\":{\"name\":[\"Mostofa\",\"POlty\"],\"r_with_death\":[\"7\",\"8\"],\"g_of_covid\":[\"3\",\"3\"],\"dyear\":[\"78\",\"78\"],\"death_year\":[\"2020\",\"2022\"],\"death_married\":[\"3\",\"3\"],\"death_pregnant\":[\"3\",\"3\"],\"death_symptoms_1\":[\"6\",\"2\"],\"death_location\":[\"4\",\"5\"],\"death_reason_1\":[\"14\"]},\"s_4_mother_a_or_d\":\"3\",\"s_4_mother_name\":\"POlty\",\"s_4_mother_db_location\":\"1\",\"mother_death_covid_death_where\":\"5\",\"s_4_father_a_or_d\":\"3\",\"s_4_father_name\":\"Mostofa\",\"s_4_father_db_location\":\"1\",\"s_4_father_d_year\":\"2020\",\"father_death_covid_death_where\":\"4\",\"s_5_sibiling_alive\":\"2\",\"s_5_sibiling_dead_in_alive\":\"1\",\"s_5_sibiling_dead_2019_a\":\"1\",\"sibiling\":{\"name\":[\"Pulll\"],\"g_of_death\":[\"1\"],\"dyear\":[\"65\"],\"year_of_death\":[\"2020\"],\"db_location_death\":[\"2\"],\"death_covid_death_where\":[\"2\"],\"death_detect_by\":[\"3\"],\"death_covid_symptoms_1\":[\"11\"],\"death_covid_symptoms_2\":[\"6\"],\"death_covid_hospital\":[\"3\"],\"death_covid_hospital_a\":[\"3\"],\"death_covid_grave\":[\"3\"]},\"s_6_vac_possible\":\"2\",\"s_6_vac_taken\":\"1\",\"s_6_vac_number\":\"2\",\"s_6_vac_which\":\"3\",\"s_6_vac_suggested\":\"4\",\"s_7_owner_phone\":\"2\",\"s_7_qnty_of_sim\":\"2\",\"s_7_recharge_permission\":\"1\",\"s_7_random_access\":\"1\",\"submitted_at\":\"1\",\"cdeath_len\":\"2\",\"last_index\":\"7\",\"call_status\":\"1\"}', '{\"last_input\":\"s_1_d_name\",\"rammps_id\":\"41\",\"s_1_consent\":\"5\",\"s_1_location\":\"1\",\"s_1_gender\":\"1\",\"s_1_age\":\"24\",\"s_1_dd\":\"70\",\"s_1_v_or_c\":\"3\",\"s_1_d_name\":\"99\",\"call_status\":\"54\"}');

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
(1, '01817380528', '2021-11-25 11:50:00', 99, 1, 4, '2021-11-25 11:28:32', '2021-11-25 11:40:35', '2021-11-25 05:28:32', '2021-11-25 05:40:44', '2021-11-25 11:40:44'),
(2, '01817380528', NULL, 51, 1, 4, '2021-11-25 11:55:42', '2021-11-25 11:55:56', '2021-11-25 05:40:44', '2021-11-25 05:55:56', '2021-11-25 11:55:56'),
(3, '01817380529', '2021-11-25 13:05:00', 99, 2, 4, '2021-11-25 11:56:08', '2021-11-25 13:00:17', '2021-11-25 05:56:08', '2021-11-25 07:00:27', '2021-11-25 13:00:27'),
(4, '01817380529', NULL, 51, 2, 4, '2021-11-25 13:00:27', '2021-11-25 13:02:30', '2021-11-25 07:00:27', '2021-11-25 07:02:30', '2021-11-25 13:02:30'),
(5, '01817380530', '2021-11-25 13:10:00', 99, 3, 4, '2021-11-25 13:02:39', '2021-11-25 13:06:07', '2021-11-25 07:02:39', '2021-11-25 07:06:47', '2021-11-25 13:06:47'),
(6, '01817380530', NULL, 51, 3, 4, '2021-11-25 13:06:47', '2021-11-25 13:39:16', '2021-11-25 07:06:47', '2021-11-25 07:39:16', '2021-11-25 13:39:16'),
(7, '01817380531', NULL, 0, 4, 4, '2021-11-25 13:39:45', '2021-11-25 14:54:02', '2021-11-25 07:39:45', '2021-11-25 08:58:06', '2021-11-25 14:58:06'),
(8, '01817380532', NULL, 44, 5, 4, '2021-11-29 10:36:20', '2021-11-29 10:37:47', '2021-11-28 04:47:22', '2021-11-29 04:37:47', '2021-11-29 10:37:47'),
(9, '01817380533', NULL, 44, 6, 4, '2021-11-29 10:37:50', '2021-11-29 16:34:09', '2021-11-29 04:37:50', '2021-11-29 10:34:09', '2021-11-29 16:34:09'),
(10, '01817380534', NULL, 43, 7, 4, '2021-11-30 10:07:14', '2021-11-30 11:19:20', '2021-11-29 10:34:13', '2021-11-30 05:19:20', '2021-11-30 11:19:20'),
(11, '01817380535', '2021-11-30 11:35:00', 99, 8, 4, '2021-11-30 11:19:23', '2021-11-30 11:26:31', '2021-11-30 05:19:23', '2021-11-30 05:26:52', '2021-11-30 11:26:52'),
(12, '01817380535', NULL, 44, 8, 4, '2021-11-30 11:26:52', '2021-11-30 12:11:08', '2021-11-30 05:26:52', '2021-11-30 06:11:08', '2021-11-30 12:11:08'),
(13, '01817380536', '2021-11-30 12:20:00', 99, 9, 4, '2021-11-30 12:11:19', '2021-11-30 12:13:22', '2021-11-30 06:11:19', '2021-11-30 06:13:31', '2021-11-30 12:13:31'),
(14, '01817380536', '2021-11-30 12:20:00', 99, 9, 4, '2021-11-30 12:13:32', '2021-11-30 12:16:09', '2021-11-30 06:13:32', '2021-11-30 06:23:19', '2021-11-30 12:23:19'),
(15, '01817380536', NULL, 0, 9, 4, '2021-11-30 12:23:19', '2021-11-30 12:24:19', '2021-11-30 06:23:19', '2021-11-30 06:24:19', '2021-11-30 12:24:19'),
(16, '01817380537', NULL, 0, 10, 4, '2021-11-30 12:24:59', '2021-11-30 17:11:16', '2021-11-30 06:24:59', '2021-11-30 11:11:16', '2021-11-30 17:11:16'),
(17, '01817380538', NULL, 43, 11, 4, '2021-12-01 09:45:40', '2021-12-01 12:37:23', '2021-12-01 03:45:40', '2021-12-01 06:37:23', '2021-12-01 12:37:23'),
(18, '01817380539', '2021-12-01 12:45:00', 99, 12, 4, '2021-12-01 12:37:28', '2021-12-01 12:40:55', '2021-12-01 06:37:28', '2021-12-01 06:41:08', '2021-12-01 12:41:08'),
(19, '01817380539', NULL, 43, 12, 4, '2021-12-01 12:41:08', '2021-12-01 13:35:34', '2021-12-01 06:41:08', '2021-12-01 07:35:34', '2021-12-01 13:35:34'),
(20, '01817380540', '2021-12-01 13:40:00', 99, 13, 4, '2021-12-01 13:35:40', '2021-12-01 13:41:56', '2021-12-01 07:35:40', '2021-12-01 07:42:06', '2021-12-01 13:42:06'),
(21, '01817380540', '2021-12-01 13:55:00', 99, 13, 4, '2021-12-01 13:42:06', '2021-12-01 13:43:26', '2021-12-01 07:42:06', '2021-12-01 07:43:37', '2021-12-01 13:43:37'),
(22, '01817380540', NULL, 51, 13, 4, '2021-12-01 13:43:37', '2021-12-01 13:43:59', '2021-12-01 07:43:37', '2021-12-01 07:43:59', '2021-12-01 13:43:59'),
(23, '01817380541', '2021-12-01 14:30:00', 99, 14, 4, '2021-12-01 14:13:58', '2021-12-01 14:23:48', '2021-12-01 08:13:58', '2021-12-01 08:23:59', '2021-12-01 14:23:59'),
(24, '01817380541', NULL, 0, 14, 4, '2021-12-01 14:23:59', '2021-12-01 14:25:36', '2021-12-01 08:23:59', '2021-12-01 08:25:36', '2021-12-01 14:25:36'),
(25, '01817380542', NULL, 43, 15, 4, '2021-12-01 14:52:17', '2021-12-01 15:15:52', '2021-12-01 08:52:17', '2021-12-01 09:15:52', '2021-12-01 15:15:52'),
(26, '01817380543', '2021-12-01 15:25:00', 99, 16, 4, '2021-12-01 15:15:56', '2021-12-01 15:16:45', '2021-12-01 09:15:56', '2021-12-01 09:16:57', '2021-12-01 15:16:57'),
(27, '01817380543', NULL, 43, 16, 4, '2021-12-01 15:16:57', '2021-12-02 16:43:40', '2021-12-01 09:16:57', '2021-12-02 10:43:40', '2021-12-02 16:43:40'),
(28, '01817380544', '2021-12-02 16:50:00', 99, 17, 4, '2021-12-02 16:44:29', '2021-12-02 16:45:33', '2021-12-02 10:44:29', '2021-12-02 10:45:42', '2021-12-02 16:45:42'),
(29, '01817380544', '2021-12-02 16:55:00', 99, 17, 4, '2021-12-02 16:45:42', '2021-12-02 16:48:45', '2021-12-02 10:45:42', '2021-12-02 10:48:53', '2021-12-02 16:48:53'),
(30, '01817380544', NULL, 0, 17, 4, '2021-12-02 16:48:57', '2021-12-02 16:49:32', '2021-12-02 10:48:53', '2021-12-02 10:49:32', '2021-12-02 16:49:32'),
(31, '01817380545', '2021-12-02 17:10:00', 99, 18, 4, '2021-12-02 16:55:31', '2021-12-02 17:12:17', '2021-12-02 10:55:31', '2021-12-02 11:13:19', '2021-12-02 17:13:19'),
(32, '01817380545', NULL, 0, 18, 4, '2021-12-02 17:13:19', '2021-12-02 17:14:33', '2021-12-02 11:13:19', '2021-12-02 11:14:33', '2021-12-02 17:14:33'),
(33, '01817380546', '2021-12-05 10:50:00', 99, 19, 4, '2021-12-05 10:39:44', '2021-12-05 10:42:39', '2021-12-05 04:39:44', '2021-12-05 04:42:49', '2021-12-05 10:42:49'),
(34, '01817380546', '2021-12-05 14:25:00', 99, 19, 4, '2021-12-05 10:42:49', '2021-12-05 14:18:31', '2021-12-05 04:42:49', '2021-12-05 08:30:23', '2021-12-05 14:30:23'),
(35, '01817380546', '2021-12-05 14:45:00', 99, 19, 4, '2021-12-05 14:30:23', '2021-12-05 14:38:03', '2021-12-05 08:30:23', '2021-12-05 08:38:22', '2021-12-05 14:38:22'),
(36, '01817380546', NULL, 51, 19, 4, '2021-12-05 14:38:22', '2021-12-05 14:38:42', '2021-12-05 08:38:22', '2021-12-05 08:38:42', '2021-12-05 14:38:42'),
(37, '01817380547', NULL, 44, 20, 4, '2021-12-05 14:50:56', '2021-12-06 15:31:34', '2021-12-05 08:50:56', '2021-12-06 09:31:34', '2021-12-06 15:31:34'),
(38, '01817380548', '2021-12-06 15:40:00', 99, 21, 4, '2021-12-06 15:31:38', '2021-12-06 15:32:17', '2021-12-06 09:31:38', '2021-12-06 09:32:27', '2021-12-06 15:32:27'),
(39, '01817380548', NULL, 44, 21, 4, '2021-12-06 15:32:27', '2021-12-08 17:17:45', '2021-12-06 09:32:27', '2021-12-08 11:17:45', '2021-12-08 17:17:45'),
(40, '01817380549', NULL, 45, 22, 4, '2021-12-08 17:38:20', '2021-12-11 15:51:22', '2021-12-08 11:38:20', '2021-12-11 09:51:22', '2021-12-11 15:51:22'),
(41, '01817380550', NULL, 45, 23, 4, '2021-12-11 15:51:39', '2021-12-11 15:52:14', '2021-12-11 09:51:39', '2021-12-11 09:52:14', '2021-12-11 15:52:14'),
(42, '01817380551', NULL, 45, 24, 4, '2021-12-11 15:52:26', '2021-12-12 12:52:04', '2021-12-11 09:52:26', '2021-12-12 06:52:04', '2021-12-12 12:52:04'),
(43, '01817380552', '2021-12-12 13:55:00', 99, 25, 4, '2021-12-12 12:52:09', '2021-12-12 13:43:56', '2021-12-12 06:52:09', '2021-12-12 07:45:37', '2021-12-12 13:45:37'),
(44, '01817380552', NULL, 52, 25, 4, '2021-12-12 18:17:16', '2021-12-12 18:17:40', '2021-12-12 07:45:38', '2021-12-12 12:17:40', '2021-12-12 18:17:40'),
(45, '01817380553', NULL, 1, 26, 4, '2021-12-12 18:18:18', '2021-12-13 12:05:15', '2021-12-12 12:18:18', '2021-12-13 06:05:15', '2021-12-13 12:05:15'),
(46, '01817380554', NULL, 45, 27, 4, '2021-12-13 12:06:06', '2021-12-13 12:19:22', '2021-12-13 06:06:06', '2021-12-13 06:19:23', '2021-12-13 12:19:23'),
(47, '01817380555', NULL, 52, 28, 4, '2021-12-13 12:19:45', '2021-12-13 12:20:06', '2021-12-13 06:19:45', '2021-12-13 06:20:06', '2021-12-13 12:20:06'),
(48, '01817380556', NULL, 52, 29, 4, '2021-12-13 12:20:27', '2021-12-13 12:20:46', '2021-12-13 06:20:27', '2021-12-13 06:20:46', '2021-12-13 12:20:46'),
(49, '01817380558', NULL, 45, 31, 23, '2021-12-13 17:49:29', '2021-12-14 12:56:24', '2021-12-13 11:49:29', '2021-12-14 06:56:24', '2021-12-14 12:56:24'),
(50, '01817380559', NULL, 41, 32, 23, '2021-12-14 12:56:40', '2021-12-15 11:23:08', '2021-12-14 06:56:40', '2021-12-15 05:23:09', '2021-12-15 11:23:09'),
(51, '01817380560', NULL, 41, 33, 23, '2021-12-15 11:23:12', '2021-12-15 11:39:06', '2021-12-15 05:23:12', '2021-12-15 05:39:06', '2021-12-15 11:39:06'),
(52, '01817380561', NULL, 53, 34, 23, '2021-12-15 11:39:08', '2021-12-15 12:02:03', '2021-12-15 05:39:08', '2021-12-15 06:02:03', '2021-12-15 12:02:03'),
(53, '01817380562', NULL, 1, 35, 23, '2021-12-15 12:05:30', '2021-12-19 15:46:03', '2021-12-15 06:05:30', '2021-12-19 09:46:03', '2021-12-19 15:46:03'),
(54, '01817380563', NULL, 1, 36, 23, '2021-12-19 15:47:53', '2021-12-19 15:49:35', '2021-12-19 09:47:53', '2021-12-19 09:49:35', '2021-12-19 15:49:35'),
(55, '01817380564', '2021-12-22 13:43:00', 99, 37, 23, '2021-12-22 13:49:34', '2021-12-22 13:49:51', '2021-12-21 09:06:19', '2021-12-22 07:50:10', '2021-12-22 13:50:10'),
(56, '01817380564', NULL, 45, 37, 23, '2021-12-22 13:50:10', '2021-12-22 13:50:28', '2021-12-22 07:50:10', '2021-12-22 07:50:28', '2021-12-22 13:50:28'),
(57, '01817380566', '2021-12-22 13:47:00', 99, 39, 23, '2021-12-22 13:55:12', '2021-12-22 13:55:33', '2021-12-22 07:55:12', '2021-12-22 07:55:51', '2021-12-22 13:55:51'),
(58, '01817380566', '2021-12-22 13:05:00', 99, 39, 23, '2021-12-22 13:55:51', '2021-12-22 13:56:06', '2021-12-22 07:55:51', '2021-12-23 05:53:55', '2021-12-23 11:53:55'),
(59, '01817380566', NULL, 51, 39, 23, '2021-12-23 11:53:55', '2021-12-23 12:05:25', '2021-12-23 05:53:55', '2021-12-23 06:05:25', '2021-12-23 12:05:25'),
(60, '01817380567', '2021-12-23 12:20:00', 99, 40, 23, '2021-12-23 12:05:29', '2021-12-23 12:06:02', '2021-12-23 06:05:29', '2021-12-23 06:06:10', '2021-12-23 12:06:10'),
(61, '01817380567', '2021-12-23 12:30:00', 99, 40, 23, '2021-12-23 12:06:10', '2021-12-23 12:13:05', '2021-12-23 06:06:10', '2021-12-23 06:13:11', '2021-12-23 12:13:11'),
(62, '01817380567', NULL, 51, 40, 23, '2021-12-23 12:13:11', '2021-12-23 12:14:08', '2021-12-23 06:13:11', '2021-12-23 06:14:08', '2021-12-23 12:14:08'),
(63, '01817380568', '2021-12-28 11:00:00', 54, 41, 23, '2021-12-27 12:05:27', '2021-12-28 10:39:59', '2021-12-23 08:16:29', '2021-12-28 05:23:26', '2021-12-28 11:23:26'),
(64, '01817380568', '2021-12-28 11:40:00', 99, 41, 23, '2021-12-28 11:23:26', '2021-12-28 11:25:27', '2021-12-28 05:23:26', '2021-12-28 05:25:39', '2021-12-28 11:25:39'),
(65, '01817380568', NULL, 1, 41, 23, '2021-12-28 11:25:39', '2021-12-28 11:27:46', '2021-12-28 05:25:39', '2021-12-28 05:27:46', '2021-12-28 11:27:46'),
(66, '01817380569', NULL, 0, 42, 23, '2021-12-28 11:50:40', NULL, '2021-12-28 05:50:40', '2021-12-28 05:50:40', NULL);

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
(1, 4, 4, NULL, '2021-11-25 11:40:40'),
(2, 4, 4, NULL, '2021-11-25 13:00:21'),
(3, 4, 4, NULL, '2021-11-25 13:06:11'),
(4, 4, 4, NULL, '2021-11-30 11:26:49'),
(5, 4, 4, NULL, '2021-11-30 12:13:26'),
(6, 4, 4, NULL, '2021-11-30 12:23:12'),
(7, 4, 4, NULL, '2021-12-01 12:41:04'),
(8, 4, 4, NULL, '2021-12-01 13:42:02'),
(9, 4, 4, NULL, '2021-12-01 13:43:34'),
(10, 4, 4, NULL, '2021-12-01 14:23:54'),
(11, 4, 4, NULL, '2021-12-01 15:16:48'),
(12, 4, 4, NULL, '2021-12-02 16:45:36'),
(13, 4, 4, NULL, '2021-12-02 16:48:48'),
(14, 4, 4, NULL, '2021-12-02 17:12:21'),
(15, 4, 4, NULL, '2021-12-05 10:42:44'),
(16, 4, 4, NULL, '2021-12-05 14:30:20'),
(17, 4, 4, NULL, '2021-12-05 14:38:18'),
(18, 4, 4, NULL, '2021-12-06 15:32:21'),
(19, 4, 4, NULL, '2021-12-12 13:45:34'),
(20, 23, 23, NULL, '2021-12-22 13:50:04'),
(21, 23, 23, NULL, '2021-12-22 13:55:49'),
(22, 23, 23, NULL, '2021-12-22 13:56:37'),
(23, 23, 23, NULL, '2021-12-23 12:06:06'),
(24, 23, 23, NULL, '2021-12-23 12:13:08'),
(25, 23, 23, NULL, '2021-12-28 11:23:24'),
(26, 23, 23, NULL, '2021-12-28 11:25:37');

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
-- Indexes for table `rammps_attendance`
--
ALTER TABLE `rammps_attendance`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `rammps_attendance`
--
ALTER TABLE `rammps_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rammps_questions`
--
ALTER TABLE `rammps_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `rammps_schedules`
--
ALTER TABLE `rammps_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `rammps_schedules_pickhistory`
--
ALTER TABLE `rammps_schedules_pickhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
