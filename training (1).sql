-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 01:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sbu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `division` int(11) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assign_emp`
--

CREATE TABLE `assign_emp` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `division_id` int(11) DEFAULT 0,
  `sbu` varchar(250) NOT NULL,
  `employee_id` varchar(250) NOT NULL,
  `function` varchar(255) NOT NULL,
  `no_of_que_pre_test` varchar(250) DEFAULT NULL,
  `no_of_ans_pre_test` varchar(250) DEFAULT NULL,
  `no_of_qus_post_test` varchar(250) DEFAULT NULL,
  `no_of_ans_post_test` varchar(250) DEFAULT NULL,
  `pre_test_complete` tinyint(4) DEFAULT NULL,
  `post_test_complete` tinyint(4) DEFAULT NULL,
  `evalu_test_complete` tinyint(4) DEFAULT NULL,
  `pre_test_complete_at` varchar(250) DEFAULT NULL,
  `post_test_complete_at` varchar(250) DEFAULT NULL,
  `evalu_complete_at` varchar(250) DEFAULT NULL,
  `test_complete` tinyint(4) DEFAULT 1,
  `program_cost` double(10,2) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `admin_type` varchar(250) DEFAULT NULL,
  `admin_status` varchar(250) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `attendance_type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(15) NOT NULL,
  `branch` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch`) VALUES
(80, 'dwd'),
(81, 'fsvsvf');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course_title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `training_type` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `program_group_id` int(11) DEFAULT NULL,
  `traning_type_id` int(11) DEFAULT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pdf_file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pdf_file2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pdf_file3` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `test` int(11) NOT NULL,
  `test_available` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `pretest_id` int(11) NOT NULL,
  `posttest_id` int(11) NOT NULL,
  `pre_and_post` tinyint(4) NOT NULL DEFAULT 0,
  `feedback` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `program _name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `owner_name`, `owner_id`, `course_title`, `training_type`, `program_id`, `program_group_id`, `traning_type_id`, `image`, `pdf_file`, `pdf_file2`, `pdf_file3`, `description`, `test`, `test_available`, `status`, `pretest_id`, `posttest_id`, `pre_and_post`, `feedback`, `feedback_id`, `created_at`, `updated_at`, `program _name`) VALUES
(41, '', '', 'Basics Of Plant Nutrition Essential Plant Nutrients And Their Role In Crop Production', NULL, 13, 1, 0, '', '', '', '', '', 0, 0, 1, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1413, '', '', 'December Course', NULL, 61, 1, 0, '', '', '', '', '', 0, 0, 1, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1414, '', '', 'New Course', NULL, 80, 50, 0, '', '', '', '', '', 0, 0, 1, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1415, '', '', 'svdfavvf', NULL, 37, 4, 0, '', '', '', '', '', 0, 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1416, '', '', 'rhjdgudud', NULL, 79, 11, 0, '', '', '', '', '', 0, 0, 1, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1417, '', '', 'GFGFGGFG', NULL, 30, 50, 0, '', '', '', '', '', 0, 0, 1, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1418, '', '', 'OGUPIOGJLB', NULL, 80, 1, 0, '', '', '', '', '', 0, 0, 1, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1419, '', '', 'December Coursedavavdsvvd', NULL, 80, 11, 0, '', '', '', '', '', 0, 0, 1, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1420, '', '', 'hvkkvl ckgjjb jb j j ', NULL, 37, 36, 0, '', '', '', '', '', 0, 0, 1, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1421, '', '', 'tests', 'EHS', 15, 1, 4, '', '', '', '', '', 0, 0, 1, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1422, '', '', 'siva', NULL, 11, 2, 0, '', '', '', '', '', 0, 0, 1, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1423, '', '', 'siva1', 'EHS', 101, 10, 4, '', '', '', '', '', 0, 0, 1, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1424, '', '', 'sivq2srfhbdgnngdng', 'EHS', 37, 12, 4, '', '', '', '', '', 0, 0, 1, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1425, '', '', 'gaysgshgs', 'Functional', 78, 36, 3, '', '', '', '', '', 0, 0, 1, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(15) NOT NULL,
  `designation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`) VALUES
(33, 'bswfsfb');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `divisions` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `divisions`) VALUES
(559, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `sbu` varchar(250) NOT NULL,
  `branch_plant` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `division_id` int(11) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `emp_type` varchar(250) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `organisation_unit` varchar(500) NOT NULL,
  `function` varchar(500) NOT NULL,
  `prev_exp` float NOT NULL,
  `company_exp` float NOT NULL,
  `total_exp` float NOT NULL,
  `gender` varchar(250) NOT NULL,
  `io_id` varchar(250) NOT NULL,
  `io_name` varchar(250) NOT NULL,
  `fro_id` varchar(250) NOT NULL,
  `fro_name` varchar(250) NOT NULL,
  `ro_id` varchar(250) NOT NULL,
  `ro_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `blood_group` varchar(250) DEFAULT NULL,
  `religion` varchar(250) DEFAULT NULL,
  `birth_place` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `father_name` varchar(250) DEFAULT NULL,
  `pf_nominee1` varchar(250) DEFAULT NULL,
  `relationship1` varchar(250) DEFAULT NULL,
  `pf_nominee2` varchar(250) DEFAULT NULL,
  `relationship2` varchar(250) DEFAULT NULL,
  `tshirt_size` varchar(250) DEFAULT NULL,
  `food_pref` varchar(250) DEFAULT NULL,
  `passport_no` varchar(250) DEFAULT NULL,
  `passport_expiry_date` date DEFAULT NULL,
  `resignation_date` date DEFAULT '0000-00-00',
  `emp_status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1,incative=2',
  `admin` varchar(250) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `emp_id`, `name`, `password`, `sbu`, `branch_plant`, `division`, `division_id`, `grade`, `emp_type`, `designation`, `dob`, `doj`, `organisation_unit`, `function`, `prev_exp`, `company_exp`, `total_exp`, `gender`, `io_id`, `io_name`, `fro_id`, `fro_name`, `ro_id`, `ro_name`, `email`, `mobile`, `blood_group`, `religion`, `birth_place`, `state`, `father_name`, `pf_nominee1`, `relationship1`, `pf_nominee2`, `relationship2`, `tshirt_size`, `food_pref`, `passport_no`, `passport_expiry_date`, `resignation_date`, `emp_status`, `admin`, `last_updated`) VALUES
(27439, '10213210', 'dihoovdouv', 'coromandel', 'sdc@eferg', 'dwd', 'Ankleshwar Pl', 1, 'dqde', 'MS', 'fgs', '2023-03-02', '2023-03-17', 'test', 'test', 1, 0, 0, 'male', '1212', 'test', '1214', 'ma', '1454', 'test', 'duyk@gmail.com', '9876543210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 1, '', '2023-03-02 13:34:34'),
(27440, '10004000', 'Raj', 'coromandel', 'sdc@eferg', '', 'Ankleshwar Pl', 1, 'test', 'NMS', 'test', '2023-03-23', '2023-03-24', 'test', 'test', 1, 0, 0, 'male', '1212', 'test', '1214', 'ma', '1454', 'test', 'sadmin@pet.com', '9876543210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 1, '', '2023-03-03 15:06:43'),
(27441, '11110121', 'Sivaraj', '123456', '742', '64', 'Ankleshwar Pl2', 1, '44', '10', 'csdv ds', '2023-03-21', '2023-03-30', '6', '16', 1, 0, 0, '46', '1212', 'test', '1214', 'ma', '1454', 'test', 'sadmin@pet.com', '9876543210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 1, '', '2023-03-03 15:09:20'),
(27442, '10005935', 'Raj', '123456', '', 'dwd', 'Ankleshwar Pl', 1, 'test', 'MS', 'Retail Store Manager', '2023-12-31', '2023-12-31', 'test', 'test', 1, 0, 0, 'male', '', 'test', '1214', 'ma', '1454', 'test', 'sadmin@pet.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 1, '', '2023-03-03 15:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `initials` varchar(10) DEFAULT NULL,
  `gender` smallint(5) NOT NULL DEFAULT 0,
  `dob` date DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `email_id` text DEFAULT NULL,
  `external_email_id` text DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `hire_date` varchar(50) DEFAULT NULL,
  `hire_end_date` varchar(50) DEFAULT NULL,
  `Transfer_eff_date` varchar(50) DEFAULT NULL,
  `Transfer_end_date` varchar(50) DEFAULT NULL,
  `promotion_eff_date` varchar(50) DEFAULT NULL,
  `promotion_end_date` varchar(50) DEFAULT NULL,
  `confirmation_eff_date` varchar(50) DEFAULT NULL,
  `confirmation_end_date` varchar(50) DEFAULT NULL,
  `last_working_date` varchar(50) DEFAULT NULL,
  `anni_date` varchar(50) DEFAULT NULL,
  `birth_place` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(250) DEFAULT NULL,
  `emp_grade` varchar(250) DEFAULT NULL,
  `organization_unit` varchar(250) NOT NULL,
  `org_code` varchar(250) DEFAULT NULL,
  `personal_area_text` varchar(250) DEFAULT NULL,
  `ps_text` varchar(250) DEFAULT NULL,
  `company_code` varchar(250) DEFAULT NULL,
  `function_desc` varchar(250) DEFAULT NULL,
  `emp_status` varchar(250) DEFAULT NULL,
  `position_text` varchar(250) DEFAULT NULL,
  `bus_area` varchar(100) DEFAULT NULL,
  `profile_center` text DEFAULT NULL,
  `technical_doj` varchar(250) DEFAULT NULL,
  `dt_of_rtr` varchar(250) DEFAULT NULL,
  `io_sapno` varchar(250) DEFAULT NULL,
  `fro_saopno` varchar(250) DEFAULT NULL,
  `ro_saopno` varchar(250) DEFAULT NULL,
  `headquarters` varchar(250) DEFAULT NULL,
  `location_hr` varchar(250) DEFAULT NULL,
  `user_role` varchar(250) DEFAULT NULL,
  `payroll` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `sync_done` tinyint(4) DEFAULT 0,
  `sync_done_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emp_history`
--

CREATE TABLE `emp_history` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `sbu` varchar(250) NOT NULL,
  `branch_plant` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `division_id` int(11) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `emp_type` varchar(250) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `organisation_unit` varchar(500) NOT NULL,
  `function` varchar(500) NOT NULL,
  `prev_exp` float NOT NULL,
  `company_exp` float NOT NULL,
  `total_exp` float NOT NULL,
  `gender` varchar(250) NOT NULL,
  `io_id` varchar(250) NOT NULL,
  `io_name` varchar(250) NOT NULL,
  `fro_id` varchar(250) NOT NULL,
  `fro_name` varchar(250) NOT NULL,
  `ro_id` varchar(250) NOT NULL,
  `ro_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `blood_group` varchar(250) NOT NULL,
  `religion` varchar(250) NOT NULL,
  `birth_place` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `pf_nominee1` varchar(250) NOT NULL,
  `relationship1` varchar(250) NOT NULL,
  `pf_nominee2` varchar(250) NOT NULL,
  `relationship2` varchar(250) NOT NULL,
  `tshirt_size` varchar(250) NOT NULL,
  `food_pref` varchar(250) NOT NULL,
  `passport_no` varchar(250) NOT NULL,
  `passport_expiry_date` date NOT NULL,
  `resignation_date` date NOT NULL,
  `emp_status` int(11) NOT NULL COMMENT 'Active=1,incative=2',
  `admin` varchar(250) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_type`
--

CREATE TABLE `emp_type` (
  `id` int(15) NOT NULL,
  `type` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_type`
--

INSERT INTO `emp_type` (`id`, `type`) VALUES
(58, 'New');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `division_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_quations`
--

CREATE TABLE `evaluation_quations` (
  `id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `quations` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Active=1,incative=2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_quations2`
--

CREATE TABLE `evaluation_quations2` (
  `id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `quations` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_result`
--

CREATE TABLE `evaluation_result` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `eve_id` int(11) NOT NULL COMMENT 'evaluation table ref ',
  `event_id` int(11) NOT NULL COMMENT 'programs table ref',
  `event_id2` int(11) NOT NULL,
  `quations` varchar(250) NOT NULL,
  `answer` varchar(1500) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `retail_sbu` varchar(250) NOT NULL,
  `course_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL DEFAULT 0,
  `pretest_id` int(11) NOT NULL,
  `posttest_id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `training_type` varchar(250) NOT NULL,
  `from_date` date NOT NULL,
  `end_date` date NOT NULL,
  `venue` varchar(250) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ttt` varchar(250) NOT NULL,
  `nature_program` varchar(255) NOT NULL,
  `faculty_type` varchar(250) NOT NULL,
  `faculty_name` varchar(250) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_attendance`
--

CREATE TABLE `event_attendance` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_id2` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `sbu` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `facult_name` varchar(250) NOT NULL,
  `faculty_type` varchar(250) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `evaluation` varchar(250) DEFAULT '0',
  `course` int(11) NOT NULL,
  `man_hours` varchar(255) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty_type` tinyint(4) DEFAULT NULL,
  `emp_id` varchar(250) DEFAULT '0',
  `program_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_type`, `emp_id`, `program_id`, `name`, `mobile`, `email`, `company_name`, `city`, `state`, `country`) VALUES
(1096, 1, '10004000', NULL, 'admin', '9876543219', 'siva@gmail.com', 'coromandel', 'etgerd', 'invcc', 'vvdvdv'),
(1093, 1, '10004000', NULL, 'Rajdcda', '9876543219', 'siva@gmail.com', 'coromandel', 'etgerd', 'invcc', 'vvdvdv');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_quations`
--

CREATE TABLE `feedback_quations` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quations` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Active=1,incative=2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_quations2`
--

CREATE TABLE `feedback_quations2` (
  `id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `quations` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `id` int(15) NOT NULL,
  `function` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`id`, `function`) VALUES
(39, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(15) NOT NULL,
  `gender` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(52, 'Male'),
(55, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(15) NOT NULL,
  `grade` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `grade`) VALUES
(64, 'derfqae');

-- --------------------------------------------------------

--
-- Table structure for table `individual_budget`
--

CREATE TABLE `individual_budget` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `event_id` int(11) NOT NULL,
  `accommodation` float(10,2) NOT NULL,
  `transportation` float(10,2) NOT NULL,
  `food` float(10,2) NOT NULL,
  `misc` float(10,2) NOT NULL,
  `inserted_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `employee_id` varchar(15) NOT NULL,
  `sub` varchar(250) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `emp_type` varchar(250) NOT NULL,
  `designation` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='2';

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`employee_id`, `sub`, `branch`, `grade`, `emp_type`, `designation`) VALUES
('10004000', 'test', 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(15) NOT NULL,
  `organization` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `organization`) VALUES
(26, 'Avila International Limited'),
(27, 'fwrgehbtehfbdx');

-- --------------------------------------------------------

--
-- Table structure for table `posttest`
--

CREATE TABLE `posttest` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posttest_questions`
--

CREATE TABLE `posttest_questions` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `test_type` int(11) NOT NULL COMMENT 'pre =1, post = 2',
  `question` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `option1` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option2` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option3` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option4` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posttest_questions`
--

INSERT INTO `posttest_questions` (`id`, `course_id`, `test_type`, `question`, `image`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`, `updated_at`) VALUES
(14, 0, 2, '', '', 'jghfctufyikhn', 'rr', 'Random 3', 'rrrrr', 'rr', '2023-04-01 11:49:15', '2023-04-01 11:49:15'),
(15, 0, 2, '', '', 'India', ' nbv', 'feb', 'bfedbe', 'India', '2023-04-01 11:56:25', '2023-04-01 11:56:25'),
(16, 0, 2, '', '', 'Random 1', 'Pakistan', 'Austrila', 'Random 4', 'Austrila', '2023-04-01 12:05:09', '2023-04-01 12:05:09'),
(17, 0, 2, '', '', 'fvfs', ' nbv', 'Random 3', 'rrrrr', 'Random 3', '2023-04-01 12:07:27', '2023-04-01 12:07:27'),
(18, 0, 2, '', '', 'India', 'evwrsv', 'rfvsv', 'England', 'evwrsv', '2023-04-01 12:26:34', '2023-04-01 12:26:34'),
(19, 0, 2, '', '', 'India', 'vsfvs', 'feb', 'rrrrr', 'feb', '2023-04-01 12:27:18', '2023-04-01 12:27:18'),
(20, 0, 2, '', '', 'India', 'vsfvs', 'feb', 'rrrrr', 'feb', '2023-04-01 12:28:00', '2023-04-01 12:28:00'),
(21, 0, 2, '', '', 'India', 'rr', 'r', 'England', 'r', '2023-04-01 12:30:32', '2023-04-01 12:30:32'),
(22, 0, 2, '', '', 'India', 'rr', 'r', 'England', 'r', '2023-04-01 12:31:03', '2023-04-01 12:31:03'),
(23, 0, 2, '', '', 'Random 1', ' nbv', 'r', 'bfedbe', 'r', '2023-04-01 12:31:53', '2023-04-01 12:31:53'),
(24, 0, 2, '', '', 'India', 'vsfvs', 'rfvsv', 'rvgesrgv', 'vsfvs', '2023-04-01 12:51:37', '2023-04-01 12:51:37'),
(25, 0, 2, '', '', 'fsbfb', 'evwrsv', 'rfvsv', 'bfedbe', 'evwrsv', '2023-04-01 12:53:29', '2023-04-01 12:53:29'),
(26, 0, 1, '', '', 'Random 1', 'Random 2', 'Austrila', 'rrrrr', 'Random 2', '2023-04-01 13:04:06', '2023-04-01 13:04:06'),
(27, 0, 1, '', '', 'Random 1', 'Random 2', 'Austrila', 'rrrrr', 'Random 2', '2023-04-01 13:05:01', '2023-04-01 13:05:01'),
(28, 0, 1, '', '', 'Random 1', 'Random 2', 'Austrila', 'rrrrr', 'Random 2', '2023-04-01 13:06:03', '2023-04-01 13:06:03'),
(29, 0, 1, '', '', 'Random 1', 'Random 2', 'Austrila', 'rrrrr', 'Random 2', '2023-04-01 13:06:29', '2023-04-01 13:06:29'),
(30, 0, 2, '', '', 'India', 'Pakistan', 'Random 3', 'Random 4', 'Pakistan', '2023-04-01 13:13:27', '2023-04-01 13:13:27'),
(31, 0, 2, '', '', 'rrwerwgwr', 'vsfvs', 'Austrila', 'rvgesrgv', 'rrwerwgwr', '2023-04-01 13:34:19', '2023-04-01 13:34:19'),
(32, 0, 2, '', '', 'rrwerwgwr', 'vsfvs', 'Austrila', 'rvgesrgv', 'rrwerwgwr', '2023-04-01 14:02:16', '2023-04-01 14:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `pretest`
--

CREATE TABLE `pretest` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pretest_questions`
--

CREATE TABLE `pretest_questions` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `test_type` int(11) NOT NULL COMMENT 'pre =1, post = 2',
  `question` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `option1` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option2` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option3` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option4` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pretest_questions`
--

INSERT INTO `pretest_questions` (`id`, `course_id`, `test_type`, `question`, `image`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`, `updated_at`) VALUES
(14, 0, 1, '', '', 'India', 'Pakistan', 'Austrila', 'Random 4', 'Pakistan', '2023-04-01 11:20:13', '2023-04-01 11:20:13'),
(15, 0, 1, '', '', 'India', 'Pakistan', 'rvsrev', 'England', 'India', '2023-04-01 11:22:35', '2023-04-01 11:22:35'),
(16, 0, 1, '<p>kjbbhilhkvgjh</p>', '', 'India', 'Pakistan', 'rvsrev', 'England', 'India', '2023-04-01 11:23:24', '2023-04-01 11:23:24'),
(17, 0, 1, '', '', 'Random 1', 'Random 2', 'Austrila', 'rrrrr', 'Random 2', '2023-04-01 13:04:06', '2023-04-01 13:04:06'),
(18, 0, 1, '', '', 'Random 1', 'Random 2', 'Austrila', 'rrrrr', 'Random 2', '2023-04-01 13:05:01', '2023-04-01 13:05:01'),
(19, 0, 1, '', '', 'Random 1', 'Random 2', 'Austrila', 'rrrrr', 'Random 2', '2023-04-01 13:06:03', '2023-04-01 13:06:03'),
(20, 0, 1, '', '', 'Random 1', 'Random 2', 'Austrila', 'rrrrr', 'Random 2', '2023-04-01 13:06:29', '2023-04-01 13:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `program_name` varchar(250) NOT NULL,
  `program_group_id` int(11) DEFAULT NULL,
  `training_type_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `program_name`, `program_group_id`, `training_type_id`) VALUES
(131, 'gnfh b', NULL, NULL),
(130, 'vntu,iuok,hmjngryu467', NULL, NULL),
(127, ' vbfgn', NULL, NULL),
(5, 'Equipment Operations', NULL, NULL),
(6, 'CGBC & WP', NULL, NULL),
(7, 'Leadership Skills', 2, 1),
(8, 'SOP', 10, 3),
(9, 'Defensive Driving', NULL, NULL),
(10, 'General Health Awareness', 8, 11),
(11, '5S Methodology', 15, 3),
(12, 'General Finance', NULL, 2),
(13, 'Product Knowledge', NULL, NULL),
(14, 'Electrical Maintenance', NULL, NULL),
(15, 'ABB System', 11, 2),
(16, 'Agri Tech', 1, 2),
(17, 'Electrical Safety', NULL, NULL),
(18, 'Interpersonal Skills', 2, 1),
(19, 'Operations Management', NULL, NULL),
(20, 'CSR Workshop', NULL, NULL),
(21, 'Legal Compliance', NULL, NULL),
(22, 'Environment Management', 5, 11),
(23, 'TQM Awareness', NULL, NULL),
(24, 'SAP', NULL, NULL),
(25, 'Communication', NULL, NULL),
(26, 'Digital Application', NULL, NULL),
(68, 'SettingsController.php', NULL, NULL),
(28, 'General Operations', 11, NULL),
(29, 'POSH', NULL, NULL),
(30, 'Business Excellence', NULL, NULL),
(31, 'Competency Development', NULL, NULL),
(32, 'Utilities Management', NULL, NULL),
(33, 'Induction', 2, 3),
(34, 'Six Sigma', NULL, NULL),
(35, 'Inspection', NULL, NULL),
(88, 'Capability Building', NULL, NULL),
(37, 'Chemical Safety', NULL, NULL),
(38, 'Treasury', NULL, NULL),
(39, 'HR Process', NULL, NULL),
(40, 'HR Excellence', NULL, NULL),
(41, 'Selling Skills', NULL, NULL),
(43, 'Labour Laws', NULL, NULL),
(44, 'Safe Start', NULL, NULL),
(45, 'Covid 19 Sensitization', 8, 11),
(46, 'Quality Control & Analysis', NULL, NULL),
(47, 'On Field', NULL, NULL),
(48, 'Energy Management', NULL, NULL),
(49, 'Customer Centricity', NULL, NULL),
(50, 'Instrumentation', NULL, NULL),
(51, 'SCM', NULL, NULL),
(52, 'SFLA', NULL, NULL),
(53, 'MS Office', 3, 3),
(54, 'Production Management', NULL, NULL),
(55, 'Project Management', NULL, NULL),
(56, 'Quality Management', NULL, NULL),
(57, 'Manufacturing Product Knowledge', NULL, NULL),
(58, 'TTT', NULL, NULL),
(59, 'General Maintenance', NULL, NULL),
(60, 'Simulation Training', NULL, NULL),
(61, 'Technical2', NULL, NULL),
(72, 'manger', NULL, NULL),
(70, 'test', NULL, NULL),
(71, 'Test1', NULL, NULL),
(69, 'test', NULL, NULL),
(73, 'Induction\r\n', NULL, NULL),
(74, '', NULL, NULL),
(75, '', NULL, NULL),
(76, 'Test', NULL, NULL),
(77, 'testing', NULL, NULL),
(78, 'Cooking Practices', NULL, NULL),
(79, 'Mechanical Maintenance', 13, 11),
(80, 'Agriculture Knowledge', NULL, NULL),
(107, 'Pest and Disease Management', NULL, NULL),
(87, 'NEAT Phase 1', NULL, NULL),
(83, 'shakti', NULL, NULL),
(84, 'ganesha', NULL, NULL),
(101, 'CROP BIZ', NULL, NULL),
(104, 'Focus products', NULL, NULL),
(103, 'SFLA', NULL, NULL),
(106, 'New Products', NULL, NULL),
(108, 'Retail SOPs', NULL, NULL),
(126, 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_name` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `program_group_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `training_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nature_program` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tni_source` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `cost_per_program` int(11) NOT NULL,
  `cost_per_emp` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `training_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_hrs` tinyint(4) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `start_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `venue` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ttt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `evaluation` varchar(255) COLLATE utf8_unicode_ci DEFAULT '1',
  `created_user` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_user_id` int(11) DEFAULT 0,
  `update_user` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_user_id` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `course_name`, `program_name`, `program_group_name`, `training_type`, `nature_program`, `tni_source`, `cost_per_program`, `cost_per_emp`, `faculty_name`, `faculty_type`, `training_mode`, `no_of_hrs`, `from_date`, `to_date`, `start_time`, `end_time`, `venue`, `location`, `ttt`, `evaluation`, `created_user`, `created_user_id`, `update_user`, `update_user_id`, `created_at`, `updated_at`) VALUES
(1722, '41', '13', '1', 'Technical', 'Calendared programs', 'Succession Planning', 5000, '', '1093', '1', '1', 6, '2023-05-16', '2023-05-24', '11:00', '13:00', 'Demo', 'acdv', '0', NULL, NULL, 0, NULL, 0, '2023-03-31 10:17:52', '2023-03-31 10:17:52'),
(1723, '1418', '80', '1', NULL, 'Calendared programs', 'Competency Gaps', 5000, '', '1093', '1', '1', 3, '2023-03-31', '2023-04-20', '10:17', '10:55', 'Demo', 'Demo', '0', NULL, NULL, 0, NULL, 0, '2023-03-31 10:19:39', '2023-03-31 10:19:39'),
(1724, '41', '13', '1', 'Technical', '', 'Succession Planning', 5000, '', '1093', '1', '1', 6, '2023-03-31', '2023-04-01', '22:50', '22:50', 'Demo', 'Demo', '1', NULL, 'Baride Sudheer Kumar', 0, NULL, 0, '2023-03-31 10:28:56', '2023-03-31 10:28:56'),
(1725, '41', '13', '1', 'Technical', '', 'Succession Planning', 5000, '', '1093', '1', '1', 6, '2023-03-31', '2023-04-01', '22:50', '22:50', 'Demo', 'Demo', '1', NULL, 'Baride Sudheer Kumar', 0, NULL, 0, '2023-03-31 10:29:11', '2023-03-31 10:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `program_group`
--

CREATE TABLE `program_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_group`
--

INSERT INTO `program_group` (`id`, `group_name`) VALUES
(52, 'Raj233'),
(54, 'admin'),
(2, 'Capability Building'),
(1, 'Agriculture Knowledge'),
(3, 'Digitization'),
(4, 'Engineering Maintenance'),
(5, 'Environment'),
(6, 'Financial Management'),
(7, 'Governance Policy'),
(8, 'Health'),
(9, 'Legal & Statutory'),
(10, 'Process Orientation'),
(11, 'Production'),
(12, 'Quality Assurance'),
(13, 'Safety'),
(14, 'Technical'),
(15, 'TQM'),
(39, 'Digital'),
(38, 'testprpgram2'),
(37, 'Food'),
(36, 'Food'),
(33, 'mangement'),
(50, 'Capability Building'),
(51, 'Product Knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `program_types`
--

CREATE TABLE `program_types` (
  `id` int(11) NOT NULL,
  `type` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_types`
--

INSERT INTO `program_types` (`id`, `type`) VALUES
(2, 'Technical'),
(1, 'Behavioural'),
(22, 'New '),
(3, 'Functional'),
(4, 'EHS');

-- --------------------------------------------------------

--
-- Table structure for table `sbu`
--

CREATE TABLE `sbu` (
  `id` int(15) NOT NULL,
  `sbu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sbu`
--

INSERT INTO `sbu` (`id`, `sbu`) VALUES
(764, 'dvrwgwrg'),
(767, 'sfdfrgtrg'),
(768, ''),
(769, 'dhtz'),
(770, ''),
(771, 'thshyrj'),
(772, '2547red86de');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sbu` varchar(250) NOT NULL,
  `divisions` varchar(50) DEFAULT NULL,
  `admin_type` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `bu` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `name`, `user_name`, `password`, `sbu`, `divisions`, `admin_type`, `status`, `bu`, `location`, `added_by`, `added_at`, `update_by`, `updated_at`) VALUES
(7, 'Baride Sudheer Kumar', 'golearn', 'fb68e1e6ce0a5930220d2e7593a4586b', '', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `test_type` varchar(250) NOT NULL COMMENT 'pre test = 1 post test = 2',
  `status` varchar(250) NOT NULL DEFAULT 'inactive',
  `course_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_quations`
--

CREATE TABLE `test_quations` (
  `id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL COMMENT 'course id',
  `test_type` int(11) NOT NULL,
  `quations` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(250) NOT NULL,
  `option1` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option2` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option3` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `option4` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `temp` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_quations`
--

INSERT INTO `test_quations` (`id`, `test_id`, `test_type`, `quations`, `image`, `option1`, `option2`, `option3`, `option4`, `answer`, `temp`) VALUES
(3736, 0, 0, '', '', 'India', 'evwrsv', 'rvsrev', 'rvgesrgv', 'evwrsv', 0),
(3737, 0, 0, '', '', 'India', 'vsfvs', 'rvsrev', 'rvgesrgv', 'vsfvs', 0),
(3738, 0, 0, '', '', 'rrwerwgwr', 'rr', 'r', 'rrrrr', 'rrwerwgwr', 0),
(3739, 0, 0, '', '', 'Random 1', 'evwrsv', 'feb', 'rrrrr', 'evwrsv', 0),
(3740, 0, 0, '', '', 'rrwerwgwr', 'Random 2', 'Austrila', 'Random 4', 'Random 2', 0),
(3741, 0, 0, '', '', 'rrwerwgwr', 'vsfvs', 'rvsrev', 'bfedbe', 'vsfvs', 0),
(3742, 0, 0, '', '', 'India', '', 'Random 3', 'sfvrsrv', 'Random 3', 0),
(3743, 0, 0, '', '', 'Random 1', 'vsfvs', 'Austrila', 'Random 4', 'vsfvs', 0),
(3744, 0, 0, '', '', 'rrwerwgwr', 'Pakistan', 'Random 3', 'England', 'Pakistan', 0),
(3745, 0, 0, '', '', 'rrwerwgwr', 'Pakistan', 'Random 3', 'England', 'Pakistan', 0),
(3746, 0, 0, '', '', 'fsbfb', 'rr', 'rvsrev', 'Random 4', 'fsbfb', 0),
(3747, 0, 0, '', '', 'India', 'vsfvs', 'Austrila', 'sfvrsrv', 'vsfvs', 0),
(3748, 0, 0, '', '', 'fsbfb', 'Pakistan', 'rfvsv', 'England', 'rfvsv', 0),
(3749, 0, 0, '', '', 'adv', 'dva', 'adv', 'vadva', 'adv', 0),
(3750, 0, 0, '', '', 'fvfs', 'rr', 'feb', 'rvgesrgv', 'rr', 0),
(3751, 0, 0, '', '', 'jghfctufyikhn', ' nbv', 'feb', 'rrrrr', 'feb', 1),
(3752, 0, 0, '<p>,n khvgjcfyilto;hiljbm gj,ctufyiouhi;k</p>', '', 'jghfctufyikhn', ' nbv', 'feb', 'rrrrr', 'feb', 1),
(3753, 0, 0, '', '', 'India', 'Pakistan', 'rfvsv', 'rrrrr', 'rfvsv', 0),
(3754, 0, 0, '', '', 'Random 1', 'vsfvs', 'rfvsv', 'rvgesrgv', 'vsfvs', 0),
(3755, 0, 0, '', '', 'Random 1', 'Pakistan', 'r', 'rrrrr', 'r', 0),
(3756, 0, 0, '', '', 'Random 1', 'vsfvs', 'feb', 'sfvrsrv', 'sfvrsrv', 0),
(3757, 0, 0, '', '', 'India', 'vsfvs', 'r', 'Random 4', 'r', 0),
(3758, 0, 0, '', '', 'Random 1', 'vsfvs', 'r', 'rvgesrgv', 'r', 0),
(3759, 0, 0, '', '', 'jghfctufyikhn', 'evwrsv', 'r', 'rvgesrgv', 'evwrsv', 0),
(3760, 0, 0, '', '', 'India', 'vsfvs', 'rfvsv', 'bfedbe', 'vsfvs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_result1`
--

CREATE TABLE `test_result1` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `test_type1` int(11) DEFAULT NULL,
  `test_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `points` varchar(250) NOT NULL,
  `completed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_result2`
--

CREATE TABLE `test_result2` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `test_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `points` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_type`
--

CREATE TABLE `test_type` (
  `id` int(11) NOT NULL,
  `testtype` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_emp`
--
ALTER TABLE `assign_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_history`
--
ALTER TABLE `emp_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_type`
--
ALTER TABLE `emp_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_quations`
--
ALTER TABLE `evaluation_quations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_quations2`
--
ALTER TABLE `evaluation_quations2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_attendance`
--
ALTER TABLE `event_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_quations`
--
ALTER TABLE `feedback_quations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_quations2`
--
ALTER TABLE `feedback_quations2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_budget`
--
ALTER TABLE `individual_budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posttest`
--
ALTER TABLE `posttest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posttest_questions`
--
ALTER TABLE `posttest_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pretest`
--
ALTER TABLE `pretest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pretest_questions`
--
ALTER TABLE `pretest_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_group`
--
ALTER TABLE `program_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_types`
--
ALTER TABLE `program_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbu`
--
ALTER TABLE `sbu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_quations`
--
ALTER TABLE `test_quations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_result1`
--
ALTER TABLE `test_result1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_result2`
--
ALTER TABLE `test_result2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_type`
--
ALTER TABLE `test_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_emp`
--
ALTER TABLE `assign_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23176;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1426;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=561;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27443;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16906;

--
-- AUTO_INCREMENT for table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=616;

--
-- AUTO_INCREMENT for table `emp_type`
--
ALTER TABLE `emp_type`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1106;

--
-- AUTO_INCREMENT for table `evaluation_quations`
--
ALTER TABLE `evaluation_quations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20502;

--
-- AUTO_INCREMENT for table `evaluation_quations2`
--
ALTER TABLE `evaluation_quations2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1858;

--
-- AUTO_INCREMENT for table `event_attendance`
--
ALTER TABLE `event_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37831;

--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2362;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1099;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_quations`
--
ALTER TABLE `feedback_quations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `feedback_quations2`
--
ALTER TABLE `feedback_quations2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `individual_budget`
--
ALTER TABLE `individual_budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posttest`
--
ALTER TABLE `posttest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posttest_questions`
--
ALTER TABLE `posttest_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pretest`
--
ALTER TABLE `pretest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pretest_questions`
--
ALTER TABLE `pretest_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1726;

--
-- AUTO_INCREMENT for table `program_group`
--
ALTER TABLE `program_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `program_types`
--
ALTER TABLE `program_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sbu`
--
ALTER TABLE `sbu`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=773;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT for table `test_quations`
--
ALTER TABLE `test_quations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3761;

--
-- AUTO_INCREMENT for table `test_result1`
--
ALTER TABLE `test_result1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252543;

--
-- AUTO_INCREMENT for table `test_result2`
--
ALTER TABLE `test_result2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1344;

--
-- AUTO_INCREMENT for table `test_type`
--
ALTER TABLE `test_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
