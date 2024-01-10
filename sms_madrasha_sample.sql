-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2024 at 04:38 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_madrasha_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_classes`
--

DROP TABLE IF EXISTS `academic_classes`;
CREATE TABLE IF NOT EXISTS `academic_classes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `educational_stage_id` bigint UNSIGNED NOT NULL,
  `class_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_numeric` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `academic_classes_class_numeric_unique` (`class_numeric`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_classes`
--

INSERT INTO `academic_classes` (`id`, `educational_stage_id`, `class_name`, `class_numeric`, `note`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'One', '1', NULL, 'One', 1, '2023-01-18 00:12:51', '2023-01-18 00:12:51'),
(3, 3, 'nine', '9', 'd', 'nine', 1, '2023-01-27 09:33:50', '2023-01-27 09:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `academic_stuffs`
--

DROP TABLE IF EXISTS `academic_stuffs`;
CREATE TABLE IF NOT EXISTS `academic_stuffs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `salary_grade_id` bigint UNSIGNED NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_english` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bangla` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` bigint UNSIGNED NOT NULL,
  `dob` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob_timestamp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpo_index_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jod` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jod_timestamp` timestamp NULL DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `highest_education` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `academic_stuffs_username_unique` (`username`),
  UNIQUE KEY `academic_stuffs_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_stuffs`
--

INSERT INTO `academic_stuffs` (`id`, `user_id`, `salary_grade_id`, `username`, `name_english`, `name_bangla`, `email`, `phone`, `designation_id`, `dob`, `dob_timestamp`, `mpo_index_number`, `bank_name`, `bank_account_no`, `gender`, `religion`, `jod`, `jod_timestamp`, `image`, `address`, `highest_education`, `created_by`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(6, 61, 2, 'staffss', 'Monu Mia', 'Monu Miax', 'botoxisssss5ddd311@procowork.com', '012365489654', 2, '03/15/2023', '1678838400', '1234323232123', 'Dhaka', '234323432323432', 'female', 'Islam', '03/15/2023', '2023-03-14 18:00:00', 'backend/assets/uploaded-files/user/stuff/stuff-profile-image-1678898142218.jpg', '<p>Dhaka</p>', '2eeeee', 4, 'Monu-Mia', 1, '2023-03-15 10:35:42', '2023-03-15 10:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

DROP TABLE IF EXISTS `academic_years`;
CREATE TABLE IF NOT EXISTS `academic_years` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `session_year_start` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_year_end` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_month_start` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_month_end` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `session_year_start`, `session_year_end`, `session_month_start`, `session_month_end`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, '01/01/2023', '01/01/2024', 'January', 'January', 'January-2023-January-2024', 1, '2023-01-17 00:26:04', '2023-03-16 01:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name_english` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bangla` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob_timestamp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'male',
  `religion` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'islam',
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '1 => published; 2 => unpublished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `name_english`, `name_bangla`, `username`, `email`, `phone`, `dob`, `dob_timestamp`, `gender`, `religion`, `image`, `address`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(17, 23, 'Monu Mia', 'Monu Mia', 'admin', 'botoxi5311@procowork.com', '012365489654', '09/03/2022', '2022-09-03 00:00:00', 'male', 'islam', 'backend/assets/uploaded-files/user/admin/admin-profile-image-1662213729841.jpg', 'Bdbl bhaban\r\nkawranbazar\r\ndhaka', 'monu-mia', 1, '2022-09-02 22:57:54', '2022-09-03 08:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` bigint UNSIGNED NOT NULL,
  `academic_class_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deadline` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline_timestamp` timestamp NULL DEFAULT NULL,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `subject_id`, `academic_class_id`, `section_id`, `title`, `description`, `deadline`, `deadline_timestamp`, `file`, `file_type`, `note`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 1, 'bangla exam', '<p>hjgojij</p>', '03/05/2023', '2023-03-04 18:00:00', 'backend/assets/uploaded-files/assignmentFiles//assignment-files327131997_478001514346424_5753941967381264484_n_77824.jpg', 'image/jpeg', '<p>dkhugd</p>', 'bangla-exam', 1, '2023-03-15 22:35:59', '2023-03-15 22:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `academic_year_id` bigint UNSIGNED NOT NULL,
  `academic_class_id` bigint UNSIGNED DEFAULT NULL,
  `section_id` bigint UNSIGNED DEFAULT NULL,
  `month` enum('January','February','March','April','May','June','July','August','September','October','November','December') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_timestamp` date DEFAULT NULL,
  `attendanceable_id` bigint UNSIGNED NOT NULL,
  `attendanceable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_attendanceable_id_index` (`attendanceable_id`),
  KEY `attendances_attendanceable_type_index` (`attendanceable_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_schedules`
--

DROP TABLE IF EXISTS `class_schedules`;
CREATE TABLE IF NOT EXISTS `class_schedules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `starting_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_time_timestamp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ending_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ending_time_timestamp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_schedules`
--

INSERT INTO `class_schedules` (`id`, `starting_time`, `starting_time_timestamp`, `ending_time`, `ending_time_timestamp`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, '12:41 AM', '1673916060', '01:41 AM', '1673919660', NULL, 1, '2023-01-17 12:41:20', '2023-01-17 12:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bangla` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_number` mediumint DEFAULT '0',
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `title_bangla`, `position_number`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Teacher', 'teacher', 9, '', 1, '2022-09-10 22:11:49', '2022-09-10 22:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `educational_stages`
--

DROP TABLE IF EXISTS `educational_stages`;
CREATE TABLE IF NOT EXISTS `educational_stages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educational_stages`
--

INSERT INTO `educational_stages` (`id`, `group_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'primary', 'primary', 1, '2023-01-16 13:49:26', '2023-01-17 00:38:36'),
(3, 'school', 'school', 1, '2023-01-17 00:33:55', '2023-01-17 00:45:23'),
(4, 'college', 'college', 1, '2023-01-17 00:34:04', '2023-01-17 00:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `display_title`, `exam_code`, `date`, `note`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, '1st semister', '1', '102', '2023-03-14', 'sdfsfsdf sdsdf wesfsd esdfed', '1st semister', 1, '2023-03-15 23:21:35', '2023-03-15 23:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attendances`
--

DROP TABLE IF EXISTS `exam_attendances`;
CREATE TABLE IF NOT EXISTS `exam_attendances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_id` bigint UNSIGNED NOT NULL,
  `exam_schedule_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `academic_class_id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `is_present` tinyint DEFAULT '1' COMMENT '1 => present, 0 => absent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_attendances`
--

INSERT INTO `exam_attendances` (`id`, `exam_id`, `exam_schedule_id`, `student_id`, `section_id`, `academic_class_id`, `date`, `is_present`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 1, 2, '2023-03-14', 1, '2023-03-22 00:33:42', '2023-03-22 00:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `exam_grades`
--

DROP TABLE IF EXISTS `exam_grades`;
CREATE TABLE IF NOT EXISTS `exam_grades` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark_form` mediumint DEFAULT NULL,
  `mark_to` mediumint DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_grades`
--

INSERT INTO `exam_grades` (`id`, `grade_name`, `point`, `mark_form`, `mark_to`, `note`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'A', '4', 10, 100, 'sdokfoisdfo', 'A', 1, '2023-03-15 23:48:59', '2023-03-15 23:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `exam_mark_distribution_types`
--

DROP TABLE IF EXISTS `exam_mark_distribution_types`;
CREATE TABLE IF NOT EXISTS `exam_mark_distribution_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `distribution_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark_value` mediumint DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_mark_distribution_types`
--

INSERT INTO `exam_mark_distribution_types` (`id`, `distribution_type`, `mark_value`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Exam', 70, 'Exam', 1, '2023-03-24 11:15:50', '2023-03-24 11:17:32'),
(2, 'Attendance', 10, 'Attendance', 1, '2023-03-24 11:17:00', '2023-03-24 11:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

DROP TABLE IF EXISTS `exam_schedules`;
CREATE TABLE IF NOT EXISTS `exam_schedules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `academic_year_id` bigint UNSIGNED NOT NULL,
  `academic_class_id` bigint UNSIGNED NOT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_schedules`
--

INSERT INTO `exam_schedules` (`id`, `exam_id`, `section_id`, `subject_id`, `academic_year_id`, `academic_class_id`, `exam_date`, `start_time`, `end_time`, `room`, `note`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, 2, 2, '2023-03-14', '07:40', '23:53', '202', 'd', '1', 1, '2023-03-20 11:53:27', '2023-03-20 11:53:27'),
(4, 1, 1, 1, 2, 2, '2023-03-23', '09:27', '09:35', '202', 'bnm,', '1', 1, '2023-03-21 21:27:29', '2023-03-21 21:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_09_080347_create_permissions_table', 1),
(7, '2022_06_14_042924_create_roles_table', 1),
(8, '2022_06_14_043213_create_permission_role_pivot_table', 1),
(9, '2022_06_14_143519_create_role_user_table', 1),
(10, '2022_07_08_000002_create_admins_table', 1),
(11, '2022_08_10_031419_create_settings_table', 1),
(12, '2022_08_21_042313_create_sessions_table', 1),
(13, '2022_07_08_000027_create_student_groups_table', 2),
(14, '2022_07_08_009002_add_foreigns_to_admins_table', 2),
(15, '2022_07_08_000054_create_designations_table', 3),
(16, '2022_07_08_000030_create_teachers_table', 4),
(17, '2022_07_08_009018_add_foreigns_to_teachers_table', 4),
(18, '2022_07_08_000008_create_educational_stages_table', 5),
(19, '2022_07_08_000031_create_user_submitted_certificates_table', 5),
(20, '2022_07_08_000001_create_academic_years_table', 6),
(22, '2022_07_08_000007_create_class_schedules_table', 7),
(23, '2022_07_08_000025_create_sections_table', 8),
(24, '2022_07_08_000032_create_academic_classes_table', 9),
(26, '2022_07_08_000028_create_subjects_table', 10),
(30, '2022_07_08_000026_create_students_table', 11),
(31, '2022_07_08_000055_create_parent_infos_table', 11),
(32, '2022_07_08_009035_add_foreigns_to_parent_infos_table', 11),
(33, '2022_07_08_000048_create_quran_fonts_table', 12),
(34, '2022_07_08_000018_create_quran_chapters_table', 13),
(35, '2022_07_08_000021_create_quran_verses_table', 14),
(36, '2022_07_08_009013_add_foreigns_to_quran_verses_table', 14),
(37, '2022_07_08_000020_create_quran_translation_providers_table', 15),
(38, '2022_07_08_000019_create_quran_translations_table', 16),
(39, '2022_07_08_009012_add_foreigns_to_quran_translations_table', 16),
(42, '2022_07_08_000000_create_academic_stuffs_table', 17),
(44, '2022_07_08_000029_create_syllabi_table', 18),
(45, '2022_07_08_000003_create_assignments_table', 19),
(46, '2022_07_08_000009_create_exams_table', 20),
(47, '2022_07_08_000011_create_exam_grades_table', 21),
(48, '2022_07_08_000014_create_exam_schedules_table', 22),
(49, '2022_07_08_000024_create_routines_table', 23),
(50, '2022_07_08_000010_create_exam_attendances_table', 24),
(51, '2022_07_08_000013_create_exam_mark_distribution_types_table', 25),
(52, '2022_07_08_000004_create_attendances_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `parent_infos`
--

DROP TABLE IF EXISTS `parent_infos`;
CREATE TABLE IF NOT EXISTS `parent_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_english` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bangla` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_profession` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_profession` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob_timestamp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_infos_email_unique` (`email`),
  KEY `parent_infos_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_infos`
--

INSERT INTO `parent_infos` (`id`, `user_id`, `username`, `name_english`, `name_bangla`, `email`, `phone`, `fathers_profession`, `mothers_profession`, `dob`, `dob_timestamp`, `gender`, `religion`, `image`, `address`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 36, 'monu', 'Monu Mia', 'Monu Mia', 'botoxi5311@procowork.comxx', '012365489654', 'fgh', 'fgh', '01/30/2023', '1675036800', 'male', 'Islam', NULL, 'Dhaka', 'Monu-Mia', 1, '2023-01-30 07:27:25', '2023-01-30 07:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin Dashboard', 'super-admin-dashboard', NULL, NULL),
(2, 'Teacher Dashboard', 'teacher-dashboard', NULL, NULL),
(3, 'Student Dashboard', 'student-dashboard', NULL, NULL),
(4, 'Admin Dashboard', 'admin-dashboard', NULL, NULL),
(5, 'test fgdfgdf', NULL, '2024-01-08 10:53:46', '2024-01-08 10:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  KEY `permission_id_fk_3653` (`permission_id`),
  KEY `role_id_fk_3652` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quran_chapters`
--

DROP TABLE IF EXISTS `quran_chapters`;
CREATE TABLE IF NOT EXISTS `quran_chapters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `arabic_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangla_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `english_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_serial` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_verse` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surah_origin` tinyint DEFAULT NULL COMMENT '1 => Makki , 2 => Madani',
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quran_chapters`
--

INSERT INTO `quran_chapters` (`id`, `arabic_name`, `bangla_name`, `english_name`, `chapter_serial`, `total_verse`, `surah_origin`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'mjlk', 'imlk', 'mml', '14', '25', 1, 'mjlk', 1, '2023-02-06 00:32:36', '2023-02-06 00:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `quran_fonts`
--

DROP TABLE IF EXISTS `quran_fonts`;
CREATE TABLE IF NOT EXISTS `quran_fonts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quran_font` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quran_fonts`
--

INSERT INTO `quran_fonts` (`id`, `quran_font`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Indian lipi', 'Indian-lipi', 1, '2023-02-05 12:20:28', '2023-02-05 12:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `quran_translations`
--

DROP TABLE IF EXISTS `quran_translations`;
CREATE TABLE IF NOT EXISTS `quran_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quran_chapter_id` bigint UNSIGNED NOT NULL,
  `quran_verse_id` bigint UNSIGNED NOT NULL,
  `quran_translation_provider_id` bigint UNSIGNED NOT NULL,
  `translated_verse` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quran_translations_quran_chapter_id_foreign` (`quran_chapter_id`),
  KEY `quran_translations_quran_verse_id_foreign` (`quran_verse_id`),
  KEY `quran_translations_quran_translation_provider_id_foreign` (`quran_translation_provider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quran_translations`
--

INSERT INTO `quran_translations` (`id`, `quran_chapter_id`, `quran_verse_id`, `quran_translation_provider_id`, `translated_verse`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 2, 'dd', 'dd', 1, '2023-02-06 12:49:54', '2023-02-06 12:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `quran_translation_providers`
--

DROP TABLE IF EXISTS `quran_translation_providers`;
CREATE TABLE IF NOT EXISTS `quran_translation_providers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `translated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'bangla,english,arabic',
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quran_translation_providers`
--

INSERT INTO `quran_translation_providers` (`id`, `brand_name`, `translated_by`, `language`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Titan', 'm/', 'bangla', 'Titan', 1, '2023-02-06 10:49:13', '2023-02-06 10:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `quran_verses`
--

DROP TABLE IF EXISTS `quran_verses`;
CREATE TABLE IF NOT EXISTS `quran_verses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quran_chapter_id` bigint UNSIGNED NOT NULL,
  `quran_font_id` bigint UNSIGNED NOT NULL,
  `verse_arabic` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `verse_bangla` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `verse_english` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `audio` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quran_verses_quran_chapter_id_foreign` (`quran_chapter_id`),
  KEY `quran_verses_quran_font_id_foreign` (`quran_font_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quran_verses`
--

INSERT INTO `quran_verses` (`id`, `quran_chapter_id`, `quran_font_id`, `verse_arabic`, `verse_bangla`, `verse_english`, `audio`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'a', 's', 'c', 'backend/assets/uploaded-files/quran-verse-audio/sura-2bitmphp_pos.sql~37423.txt', 'a', 1, '2023-02-06 00:50:59', '2023-02-06 00:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', NULL, NULL),
(2, 'Teacher', 'teacher', NULL, NULL),
(3, 'Student', 'student', NULL, NULL),
(4, 'Admin', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  KEY `role_id_fk_369` (`role_id`),
  KEY `user_id_fk_369` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(2, 32),
(3, 32);

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

DROP TABLE IF EXISTS `routines`;
CREATE TABLE IF NOT EXISTS `routines` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `class_schedule_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `academic_year_id` bigint UNSIGNED NOT NULL,
  `academic_class_id` bigint UNSIGNED NOT NULL,
  `day` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `teacher_id`, `class_schedule_id`, `section_id`, `subject_id`, `academic_year_id`, `academic_class_id`, `day`, `room`, `note`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 1, 2, 2, 'Saturday', '202', 'sdfsdf', 1, '2023-03-21 10:25:25', '2023-03-21 10:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `section_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sections_section_name_unique` (`section_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `capacity`, `slug`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A', '25', 'A', 'sss', 1, '2023-01-17 13:15:45', '2023-01-29 22:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dPOX0HHIzfN8yjJ2i3Qha9XDFlirTBS5ccBZsZM4', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTDFxb2xxdng5ZFJuVnZpMDZQQngyVHJaRE1VeGE1S3hLbjZzUHdDdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9leGFtcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkUjVQNWRWSGdzQ3JXNTJpVzVMdExkdTdJQjBjWC85d3hDeU43SkpWMDNya2VJOGNFTEF1cy4iO30=', 1704783546),
('BDcwcmrLZewUCrQwTldeuNLxuwKwDWUIG8eKmqaW', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWmRBYUFJazhmMFdUWUJFdXRya0xiaVdua2pmS2wzdmcwaUVuTVg5dCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFI1UDVkVkhnc0NyVzUyaVc1THRMZHU3SUIwY1gvOXd4Q3lON0pKVjAzcmtlSThjRUxBdXMuIjt9', 1704735714);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change_language` tinyint DEFAULT '1' COMMENT '1 => Enable & 0 => Disable',
  `default_language` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'English',
  `institute_division` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `site_logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_favicon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_name`, `system_email`, `institute_phone`, `footer`, `currency_code`, `currency_symbol`, `change_language`, `default_language`, `institute_division`, `institute_district`, `institute_address`, `site_logo`, `site_favicon`, `site_banner`, `site_meta`, `created_at`, `updated_at`) VALUES
(1, 'Hilful Fujal', 'Hilful Fujal', NULL, NULL, NULL, 'BDT', '৳', 1, 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `student_group_id` bigint UNSIGNED DEFAULT NULL,
  `main_subject_id` bigint UNSIGNED DEFAULT NULL,
  `optional_subject_id` bigint UNSIGNED DEFAULT NULL,
  `academic_class_id` bigint UNSIGNED NOT NULL,
  `name_english` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bangla` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob_timestamp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `division` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_activities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `parent_id`, `section_id`, `student_group_id`, `main_subject_id`, `optional_subject_id`, `academic_class_id`, `name_english`, `name_bangla`, `username`, `email`, `phone`, `dob`, `dob_timestamp`, `gender`, `blood_group`, `registration_no`, `roll_no`, `religion`, `address`, `division`, `district`, `state`, `country`, `image`, `extra_activities`, `remarks`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(4, 62, 1, 1, 6, NULL, NULL, 2, 'Monu Mia', 'Monu Mia', 'st', 'botssoxi5311@procowork.com', '1234', '03/15/2023', '1678838400', 'male', 'B-', '12536545', 'ss', 'Islam', '<p>fs</p>', 'Barishal', 'Barguna', 'DHAKA', 'Bangladesh', 'backend/assets/uploaded-files/user/student/student-1678901396326.jpg', '<p>sdsd</p>', '<p>sdsd</p>', 'Monu-Mia', 1, '2023-03-15 11:29:56', '2023-03-15 11:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

DROP TABLE IF EXISTS `student_groups`;
CREATE TABLE IF NOT EXISTS `student_groups` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '1 => published; 2 => unpublished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `group_name`, `note`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(4, 'science', 'lkl', 'science', 1, '2022-09-03 11:06:57', '2023-01-02 09:41:53'),
(2, 'arts', 'no note', 'arts', 1, '2022-09-03 10:55:03', '2022-09-03 10:55:03'),
(3, 'commerce', 'no note', 'commerce', 1, '2022-09-03 10:55:14', '2022-09-03 11:06:31'),
(6, 'Regular', NULL, 'Regular', 1, '2023-01-18 01:02:29', '2023-01-18 01:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `educational_stage_id` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `student_group_id` bigint UNSIGNED NOT NULL,
  `academic_class_id` bigint UNSIGNED NOT NULL,
  `subject_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 => mandatory; 2 => optional',
  `pass_mark` int DEFAULT '10',
  `final_mark` int DEFAULT '100',
  `point` smallint DEFAULT NULL,
  `subject_author` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_book_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_for_graduation` tinyint DEFAULT '0',
  `is_main_subject` tinyint DEFAULT '0',
  `is_optional` tinyint DEFAULT '0',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `educational_stage_id`, `updated_by`, `student_group_id`, `academic_class_id`, `subject_name`, `subject_type`, `pass_mark`, `final_mark`, `point`, `subject_author`, `subject_code`, `subject_book_image`, `is_for_graduation`, `is_main_subject`, `is_optional`, `note`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 6, 2, 'Bangla', '1', 40, 100, 0, 'NCTB', '235', 'backend/assets/uploaded-files/subject-book-images/sub-book-1678854474244.jpg', 1, 0, 1, 'sdfsdf', 'Bangla', 1, '2023-01-22 21:47:33', '2023-03-14 22:27:55'),
(2, 3, 4, 4, 3, 'Bangla 9th', '1', 40, 100, 4, 'NCTB', '901', NULL, 0, 0, 0, NULL, 'Bangla-9th', 1, '2023-01-27 09:47:07', '2023-01-27 09:47:07'),
(3, 3, 4, 4, 3, 'Math', '2', 40, 100, 4, 'NCTB', '235', 'backend/assets/uploaded-files/subject-book-images/sub-book--1675086925183.jpg', 0, 0, 1, NULL, 'Math', 1, '2023-01-30 07:55:26', '2023-01-30 07:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

DROP TABLE IF EXISTS `syllabi`;
CREATE TABLE IF NOT EXISTS `syllabi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` bigint UNSIGNED NOT NULL,
  `academic_year_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`id`, `subject_id`, `academic_year_id`, `title`, `description`, `file`, `file_type`, `note`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 'kik', '<p>kuhukn ug</p>', 'backend/assets/uploaded-files/syllabusFiles//filejs_ajax_call.jpg~22824.jpg', 'jpg', '<p>kjbjyuj mhvhtfhyj biuhk</p>', 'kik', 1, '2023-03-15 13:46:17', '2023-03-15 13:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_english` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bangla` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` bigint UNSIGNED NOT NULL,
  `salary_grade_id` bigint UNSIGNED DEFAULT NULL,
  `dob` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob_timestamp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpo_index_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'male',
  `religion` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jod` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jod_timestamp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_education` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_username_unique` (`username`),
  UNIQUE KEY `teachers_email_unique` (`email`),
  KEY `teachers_user_id_foreign` (`user_id`),
  KEY `teachers_created_by_foreign` (`created_by`),
  KEY `teachers_designation_id_foreign` (`designation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `created_by`, `username`, `name_english`, `name_bangla`, `email`, `phone`, `designation_id`, `salary_grade_id`, `dob`, `dob_timestamp`, `mpo_index_number`, `bank_name`, `bank_account_no`, `gender`, `religion`, `jod`, `jod_timestamp`, `image`, `address`, `subject`, `highest_education`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 33, 4, 'Monu Mia', 'Monu Mia', 'Monu Mia', 'botoxi5311@procowork.comx', '01412345678', 2, 1, '01/16/2023', '2023-01-16 00:00:00', '1234323232123', 'Dhaka', '234323432323432', 'male', 'Islam', '01/16/2023', '2023-01-16 00:00:00', 'backend/assets/uploaded-files/user/teacher/teacher-profile-image-167453462542.jpg', '<p>ggg</p>', 'bangla', '2eeeee', 'Monu-Mia', 1, '2023-01-16 01:59:29', '2023-01-23 22:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@admin.com', NULL, '$2y$10$k9TJsHNHWQNhPyDXaAWXNeS2gJn7dKumRc3LsMx03uNW6dx03dDnK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Teacher', 'teacher@teacher.com', NULL, '$2y$10$MaZOBqgmaCWEa49v4lBaYeY0qkQrzkzydqAb7Xi99Y6Fnc4P1SJLy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Student', 'student@student.com', NULL, '$2y$10$x6tuCVg0I44bE3FO/sgvre6KnEJD3I2iFjEBnp99E/DUu74m66lEm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Admin', 'admin@admin.com', NULL, '$2y$10$R5P5dVHgsCrW52iW5LtLdu7IB0cX/9wxCyN7JJV03rkeI8cELAus.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Monu Mia', 'botssoxi5311@procowork.com', NULL, '$2y$10$YCteNLBHe1abjvL40EPv0uFJpkUgHZeCK4ykbxTaYWsArwKfIesn2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 11:29:56', '2023-03-15 11:29:56'),
(61, 'staffss', 'botoxisssss5ddd311@procowork.com', NULL, '$2y$10$l2uqK6hXcWfNOE3Z5Y6zuePS.mFdMTKRdxH5ul2XEqfDgfM.Txn0K', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 10:35:42', '2023-03-15 10:51:56'),
(51, 'Monu Mia', 'botoxi5311@procowork.com7b', NULL, '$2y$10$krcwSiyfLIkt/5RShQ1OFu5Lp.stnJ40SDp8E24ZdY25gxbRSkSdm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-01 22:44:26', '2023-02-01 22:44:26'),
(36, 'monu', 'botoxi5311@procowork.comxx', NULL, '$2y$10$/kobnkJzOVNDTdrZsntHF.rPi7JUyFhlBRX7CPAsQ5cfWWxmHzk7C', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-30 07:27:25', '2023-01-30 07:27:25'),
(33, 'Monu Mia', 'botoxi5311@procowork.comx', NULL, '$2y$10$FVyNdJQbLvkd72cdRjaJPuJaFF1LnnqIq16Qm1xw4NBUShWJ7byhi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-16 01:59:28', '2023-01-16 01:59:28'),
(35, 'learnwit', 'botoxi5311@procowork.coma', NULL, '$2y$10$Y6ug5ddP.jH/OtAKCZnXuO1tcTGKFkNcvOv4LrXjC7hI3GiVvcmSa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-26 23:39:19', '2023-01-26 23:39:19'),
(31, 'Monu Mia', 'botoxi5311@procowork.com', NULL, '$2y$10$ZLiv70oWd31JaE4xOuCsYeDb/Dlh4Did0feVvEnxIdhIiebBDaSoO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-18 21:51:32', '2022-09-18 21:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_submitted_certificates`
--

DROP TABLE IF EXISTS `user_submitted_certificates`;
CREATE TABLE IF NOT EXISTS `user_submitted_certificates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_submitted_certificateable_id` bigint UNSIGNED NOT NULL,
  `user_submitted_certificateable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_submitted_certificateable_id` (`user_submitted_certificateable_id`),
  KEY `user_submitted_certificateable_type` (`user_submitted_certificateable_type`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_submitted_certificates`
--

INSERT INTO `user_submitted_certificates` (`id`, `file`, `file_type`, `user_submitted_certificateable_id`, `user_submitted_certificateable_type`, `created_at`, `updated_at`) VALUES
(1, 'backend/assets/uploaded-files/office-user-certificates/js_ajax_call.jpg~62814.jpg', 'image/jpeg', 6, 'App\\Models\\Backend\\UserManagement\\AcademicStuff', '2023-03-15 10:35:42', '2023-03-15 10:35:42'),
(2, 'backend/assets/uploaded-files/office-user-certificates/324888300_578821140335249_9092161498750043246_n.jpg~45007.jpg', 'image/jpeg', 6, 'App\\Models\\Backend\\UserManagement\\AcademicStuff', '2023-03-15 10:35:42', '2023-03-15 10:35:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
