-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2022 at 12:22 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schools`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `grade_id`, `class_id`, `section_id`, `teacher_id`, `attendance_date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(19, 28, 9, 18, 6, 2, '2022-08-28', 0, '2022-06-04 22:35:47', '2022-06-04 22:48:28'),
(20, 30, 9, 18, 6, 2, '2022-06-05', 0, '2022-06-04 22:35:47', '2022-06-04 22:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `bloods`
--

CREATE TABLE `bloods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloods`
--

INSERT INTO `bloods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(9, 'A-', '2022-04-08 15:55:15', '2022-04-08 15:55:15'),
(10, 'B-', '2022-04-08 15:55:15', '2022-04-08 15:55:15'),
(11, 'O-', '2022-04-08 15:55:15', '2022-04-08 15:55:15'),
(12, 'O+', '2022-04-08 15:55:15', '2022-04-08 15:55:15'),
(13, 'AB+', '2022-04-08 15:55:15', '2022-04-08 15:55:15'),
(14, 'AB-', '2022-04-08 15:55:15', '2022-04-08 15:55:15'),
(15, 'A+', '2022-04-08 15:55:15', '2022-04-08 15:55:15'),
(16, 'B+', '2022-04-08 15:55:15', '2022-04-08 15:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `grade_id`, `created_at`, `updated_at`) VALUES
(15, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"first grade\"}', 1, '2022-04-06 22:11:08', '2022-04-15 19:04:00'),
(16, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\",\"en\":\"second grade\"}', 1, '2022-04-06 22:11:09', '2022-04-06 22:11:09'),
(17, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062a\\u0627\\u0644\\u062a\",\"en\":\"third grade\"}', 7, '2022-04-06 22:11:09', '2022-04-06 22:11:09'),
(18, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0631\\u0627\\u0628\\u0639\",\"en\":\"fourth grade\"}', 9, '2022-04-28 00:57:42', '2022-04-28 00:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `created_at`, `updated_at`) VALUES
(1, 'Mother\'s Day', '2022-05-27T22:00:00.000Z', '2022-05-28 19:59:40', '2022-05-28 19:59:40'),
(2, 'funday', '2022-05-28T00:00:00+02:00', '2022-05-28 20:08:49', '2022-05-28 20:08:49'),
(3, 'bkjjk', '2022-05-27T22:00:00.000Z', '2022-05-28 20:11:00', '2022-05-28 20:11:00'),
(4, 'Fun Day', '2022-06-21T22:00:00.000Z', '2022-06-21 21:38:07', '2022-06-21 21:38:07'),
(5, 'Arabic Exam', '2022-06-22T22:00:00.000Z', '2022-06-21 21:38:25', '2022-06-21 21:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fees_type` enum('tuition fees','transportation fees') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `title`, `amount`, `grade_id`, `class_id`, `year`, `description`, `created_at`, `updated_at`, `fees_type`) VALUES
(3, '{\"en\":\"tuition fees\",\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u062f\\u0631\\u0627\\u0633\\u064a\\u0629\"}', '100000.00', 9, 18, '2023', 'kjgbkjgjgj', '2022-05-07 19:47:29', '2022-05-07 22:08:22', 'tuition fees'),
(4, '{\"en\":\"transportation fees\",\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u0628\\u0627\\u0635\"}', '5000.00', 9, 18, '2023', 'klnhnlhkh', '2022-05-07 22:11:28', '2022-05-07 22:11:28', 'transportation fees');

-- --------------------------------------------------------

--
-- Table structure for table `fee_invoices`
--

CREATE TABLE `fee_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `fee_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_invoices`
--

INSERT INTO `fee_invoices` (`id`, `invoice_date`, `student_id`, `grade_id`, `class_id`, `fee_id`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(4, '2022-05-08', 28, 9, 18, 3, 'edittttt', '13000.00', '2022-05-08 21:06:22', '2022-05-08 22:44:01'),
(6, '2022-05-10', 28, 9, 18, 4, 'ugyuygugugghhj', '5000.00', '2022-05-09 22:12:35', '2022-05-09 22:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_refund_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `payment_id`, `student_refund_id`, `date`, `debit`, `credit`, `description`, `created_at`, `updated_at`) VALUES
(3, 4, NULL, '2022-05-12', '9000.00', '0.00', 'دفع نص المبلغ المطلوب', '2022-05-11 22:43:29', '2022-05-11 22:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"male\",\"ar\":\"\\u0630\\u0643\\u0631\"}', '2022-04-15 00:54:33', '2022-04-15 00:54:33'),
(2, '{\"en\":\"female\",\"ar\":\"\\u0627\\u0646\\u062b\\u0649\"}', '2022-04-15 00:54:33', '2022-04-15 00:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `notes`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0629 \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\\u0629\",\"en\":\"Primary Stage\"}', 'gggggggggggggggggg', '2022-04-01 01:34:05', '2022-04-15 23:25:49'),
(7, '{\"en\":\"high school Stage\",\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u0648\\u064a\\u0629\"}', 'bbjjhj', '2022-04-02 18:52:58', '2022-04-04 01:45:18'),
(9, '{\"en\":\"elmentary stage\",\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0629 \\u0627\\u0644\\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\\u0629\"}', 'ghjkgjkgjh', '2022-04-28 00:55:05', '2022-04-28 00:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(10, 'school_name', 'British School', '2022-05-25 00:12:18', '2022-05-25 01:11:55'),
(11, 'school_abbrev', 'BSbb', '2022-05-25 00:12:18', '2022-05-25 01:11:55'),
(12, 'school_address', 'new cairo, fifth settelment', '2022-05-25 00:12:19', '2022-05-25 01:11:55'),
(13, 'logo', 'rMy2H7oLnOVYL8B8S4Ia6LXaIzjqV3G1jJBlAm7o.png', '2022-05-25 00:12:19', '2022-05-25 01:11:56'),
(14, 'email', 'school@gmail.com', '2022-05-25 00:12:19', '2022-05-25 01:11:55'),
(15, 'phone', '12345678', '2022-05-25 00:12:19', '2022-05-25 01:11:55'),
(16, 'current_year', '2022-2023', '2022-05-25 00:12:20', '2022-05-25 01:11:55'),
(17, 'first_semester_end_date', '25-1-2022', '2022-05-25 00:12:20', '2022-05-25 01:11:55'),
(18, 'second_semester_end_date', '30-6-2022', '2022-05-25 00:12:20', '2022-05-25 01:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `title`, `file_name`, `grade_id`, `class_id`, `section_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 'Arabic Book', 'wVSVsPuc4FgGN7CUlqkxyuHmN8FZN1myRPINjXA2.pdf', 1, 15, 2, 2, '2022-05-22 23:25:30', '2022-05-22 23:25:30'),
(5, 'hygugugu', 'Q3f28cMNdYLr3rODjbg39Oe2RSl7W7rrVCpLLgyu.pdf', 1, 15, 2, 2, '2022-05-23 01:41:11', '2022-05-23 01:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_30_230900_create_grades_table', 1),
(5, '2022_04_02_013836_create_classes_table', 2),
(7, '2022_04_07_025320_create_sections_table', 4),
(8, '2022_04_08_165907_create_bloods_table', 5),
(9, '2022_04_08_171255_create_nationalities_table', 5),
(10, '2022_04_08_171616_create_religions_table', 5),
(11, '2022_04_08_201243_create_parents_table', 6),
(12, '2022_04_11_015446_create_parent_attachments_table', 7),
(13, '2022_04_15_014711_create_genders_table', 8),
(14, '2022_04_15_014944_create_specializations_table', 8),
(15, '2022_04_16_012745_create_teachers_table', 9),
(16, '2022_04_16_183157_create_section_teacher_table', 10),
(18, '2022_04_20_002730_create_students_table', 11),
(19, '2022_04_23_155835_create_images_table', 12),
(20, '2022_04_27_232719_create_upgrade_students_table', 13),
(21, '2022_04_29_161525_add_academic_year_to_upgrade_students_table', 14),
(22, '2022_05_03_222412_add_soft_deletes_to_students_table', 15),
(23, '2022_05_04_024454_add_soft_deletes_to_upgrade_students_table', 16),
(24, '2022_05_05_133615_create_fees_table', 17),
(25, '2022_05_07_212253_add_fees_type_to_fees_table', 18),
(26, '2022_05_07_221953_create_fee_invoices_table', 19),
(28, '2022_05_08_225419_create_student_accounts_table', 20),
(29, '2022_05_09_225039_create_payments_table', 21),
(30, '2022_05_09_233013_create_funds_table', 21),
(31, '2022_05_09_233637_add_foreign_key_to_student_accounts_table', 21),
(32, '2022_05_10_231420_create_refunds_table', 22),
(33, '2022_05_11_011051_add_refund_foreign_key_to_student_accounts_table', 22),
(34, '2022_05_11_223959_create_student_refunds_table', 23),
(35, '2022_05_11_234151_add_student_refund_foreign_id_to_student_accounts_table', 24),
(36, '2022_05_12_012826_add_student_refund_id_to_funds_table', 25),
(38, '2022_05_12_230214_create_attendances_table', 26),
(39, '2022_05_14_014651_create_subjects_table', 27),
(40, '2022_05_14_211903_create_exams_table', 28),
(41, '2022_05_17_004054_create_online_exams_table', 29),
(43, '2022_05_19_000326_create_questions_table', 30),
(44, '2022_05_19_145422_create_online_meetings_table', 31),
(46, '2022_05_20_153842_add__integeration_to_online_meetings', 32),
(47, '2022_05_22_224108_create_libraries_table', 33),
(48, '2022_05_24_215449_create_infos_table', 34),
(49, '2022_05_28_205601_create_events_table', 35),
(50, '2022_06_09_233904_drop_column_from_online_meetings_table', 36),
(51, '2022_06_09_234641_add_column_to_online_meetings_table', 37),
(52, '2022_07_21_014348_create_scores_table', 38);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Afghan\",\"ar\":\"\\u0623\\u0641\\u063a\\u0627\\u0646\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(2, '{\"en\":\"Albanian\",\"ar\":\"\\u0623\\u0644\\u0628\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(3, '{\"en\":\"Aland Islander\",\"ar\":\"\\u0622\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(4, '{\"en\":\"Algerian\",\"ar\":\"\\u062c\\u0632\\u0627\\u0626\\u0631\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(5, '{\"en\":\"American Samoan\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a \\u0633\\u0627\\u0645\\u0648\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(6, '{\"en\":\"Andorran\",\"ar\":\"\\u0623\\u0646\\u062f\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(7, '{\"en\":\"Angolan\",\"ar\":\"\\u0623\\u0646\\u0642\\u0648\\u0644\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(8, '{\"en\":\"Anguillan\",\"ar\":\"\\u0623\\u0646\\u063a\\u0648\\u064a\\u0644\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(9, '{\"en\":\"Antarctican\",\"ar\":\"\\u0623\\u0646\\u062a\\u0627\\u0631\\u0643\\u062a\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(10, '{\"en\":\"Antiguan\",\"ar\":\"\\u0628\\u0631\\u0628\\u0648\\u062f\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(11, '{\"en\":\"Argentinian\",\"ar\":\"\\u0623\\u0631\\u062c\\u0646\\u062a\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(12, '{\"en\":\"Armenian\",\"ar\":\"\\u0623\\u0631\\u0645\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(13, '{\"en\":\"Aruban\",\"ar\":\"\\u0623\\u0648\\u0631\\u0648\\u0628\\u0647\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(14, '{\"en\":\"Australian\",\"ar\":\"\\u0623\\u0633\\u062a\\u0631\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(15, '{\"en\":\"Austrian\",\"ar\":\"\\u0646\\u0645\\u0633\\u0627\\u0648\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(16, '{\"en\":\"Azerbaijani\",\"ar\":\"\\u0623\\u0630\\u0631\\u0628\\u064a\\u062c\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:16', '2022-04-08 15:55:16'),
(17, '{\"en\":\"Bahamian\",\"ar\":\"\\u0628\\u0627\\u0647\\u0627\\u0645\\u064a\\u0633\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(18, '{\"en\":\"Bahraini\",\"ar\":\"\\u0628\\u062d\\u0631\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(19, '{\"en\":\"Bangladeshi\",\"ar\":\"\\u0628\\u0646\\u063a\\u0644\\u0627\\u062f\\u064a\\u0634\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(20, '{\"en\":\"Barbadian\",\"ar\":\"\\u0628\\u0631\\u0628\\u0627\\u062f\\u0648\\u0633\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(21, '{\"en\":\"Belarusian\",\"ar\":\"\\u0631\\u0648\\u0633\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(22, '{\"en\":\"Belgian\",\"ar\":\"\\u0628\\u0644\\u062c\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(23, '{\"en\":\"Belizean\",\"ar\":\"\\u0628\\u064a\\u0644\\u064a\\u0632\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(24, '{\"en\":\"Beninese\",\"ar\":\"\\u0628\\u0646\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(25, '{\"en\":\"Saint Barthelmian\",\"ar\":\"\\u0633\\u0627\\u0646 \\u0628\\u0627\\u0631\\u062a\\u064a\\u0644\\u0645\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(26, '{\"en\":\"Bermudan\",\"ar\":\"\\u0628\\u0631\\u0645\\u0648\\u062f\\u064a\"}', '2022-04-08 15:55:17', '2022-04-08 15:55:17'),
(27, '{\"en\":\"Bhutanese\",\"ar\":\"\\u0628\\u0648\\u062a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(28, '{\"en\":\"Bolivian\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0641\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(29, '{\"en\":\"Bosnian \\/ Herzegovinian\",\"ar\":\"\\u0628\\u0648\\u0633\\u0646\\u064a\\/\\u0647\\u0631\\u0633\\u0643\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(30, '{\"en\":\"Botswanan\",\"ar\":\"\\u0628\\u0648\\u062a\\u0633\\u0648\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(31, '{\"en\":\"Bouvetian\",\"ar\":\"\\u0628\\u0648\\u0641\\u064a\\u0647\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(32, '{\"en\":\"Brazilian\",\"ar\":\"\\u0628\\u0631\\u0627\\u0632\\u064a\\u0644\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(33, '{\"en\":\"British Indian Ocean Territory\",\"ar\":\"\\u0625\\u0642\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0645\\u062d\\u064a\\u0637 \\u0627\\u0644\\u0647\\u0646\\u062f\\u064a \\u0627\\u0644\\u0628\\u0631\\u064a\\u0637\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(34, '{\"en\":\"Bruneian\",\"ar\":\"\\u0628\\u0631\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(35, '{\"en\":\"Bulgarian\",\"ar\":\"\\u0628\\u0644\\u063a\\u0627\\u0631\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(36, '{\"en\":\"Burkinabe\",\"ar\":\"\\u0628\\u0648\\u0631\\u0643\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(37, '{\"en\":\"Burundian\",\"ar\":\"\\u0628\\u0648\\u0631\\u0648\\u0646\\u064a\\u062f\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(38, '{\"en\":\"Cambodian\",\"ar\":\"\\u0643\\u0645\\u0628\\u0648\\u062f\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(39, '{\"en\":\"Cameroonian\",\"ar\":\"\\u0643\\u0627\\u0645\\u064a\\u0631\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(40, '{\"en\":\"Canadian\",\"ar\":\"\\u0643\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(41, '{\"en\":\"Cape Verdean\",\"ar\":\"\\u0627\\u0644\\u0631\\u0623\\u0633 \\u0627\\u0644\\u0623\\u062e\\u0636\\u0631\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(42, '{\"en\":\"Caymanian\",\"ar\":\"\\u0643\\u0627\\u064a\\u0645\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(43, '{\"en\":\"Central African\",\"ar\":\"\\u0623\\u0641\\u0631\\u064a\\u0642\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(44, '{\"en\":\"Chadian\",\"ar\":\"\\u062a\\u0634\\u0627\\u062f\\u064a\"}', '2022-04-08 15:55:18', '2022-04-08 15:55:18'),
(45, '{\"en\":\"Chilean\",\"ar\":\"\\u0634\\u064a\\u0644\\u064a\"}', '2022-04-08 15:55:19', '2022-04-08 15:55:19'),
(46, '{\"en\":\"Chinese\",\"ar\":\"\\u0635\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:19', '2022-04-08 15:55:19'),
(47, '{\"en\":\"Christmas Islander\",\"ar\":\"\\u062c\\u0632\\u064a\\u0631\\u0629 \\u0639\\u064a\\u062f \\u0627\\u0644\\u0645\\u064a\\u0644\\u0627\\u062f\"}', '2022-04-08 15:55:19', '2022-04-08 15:55:19'),
(48, '{\"en\":\"Cocos Islander\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0643\\u0648\\u0643\\u0648\\u0633\"}', '2022-04-08 15:55:19', '2022-04-08 15:55:19'),
(49, '{\"en\":\"Colombian\",\"ar\":\"\\u0643\\u0648\\u0644\\u0648\\u0645\\u0628\\u064a\"}', '2022-04-08 15:55:19', '2022-04-08 15:55:19'),
(50, '{\"en\":\"Comorian\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0627\\u0644\\u0642\\u0645\\u0631\"}', '2022-04-08 15:55:19', '2022-04-08 15:55:19'),
(51, '{\"en\":\"Congolese\",\"ar\":\"\\u0643\\u0648\\u0646\\u063a\\u064a\"}', '2022-04-08 15:55:20', '2022-04-08 15:55:20'),
(52, '{\"en\":\"Cook Islander\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0643\\u0648\\u0643\"}', '2022-04-08 15:55:20', '2022-04-08 15:55:20'),
(53, '{\"en\":\"Costa Rican\",\"ar\":\"\\u0643\\u0648\\u0633\\u062a\\u0627\\u0631\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:20', '2022-04-08 15:55:20'),
(54, '{\"en\":\"Croatian\",\"ar\":\"\\u0643\\u0648\\u0631\\u0627\\u062a\\u064a\"}', '2022-04-08 15:55:20', '2022-04-08 15:55:20'),
(55, '{\"en\":\"Cuban\",\"ar\":\"\\u0643\\u0648\\u0628\\u064a\"}', '2022-04-08 15:55:20', '2022-04-08 15:55:20'),
(56, '{\"en\":\"Cypriot\",\"ar\":\"\\u0642\\u0628\\u0631\\u0635\\u064a\"}', '2022-04-08 15:55:20', '2022-04-08 15:55:20'),
(57, '{\"en\":\"Curacian\",\"ar\":\"\\u0643\\u0648\\u0631\\u0627\\u0633\\u0627\\u0648\\u064a\"}', '2022-04-08 15:55:20', '2022-04-08 15:55:20'),
(58, '{\"en\":\"Czech\",\"ar\":\"\\u062a\\u0634\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:20', '2022-04-08 15:55:20'),
(59, '{\"en\":\"Danish\",\"ar\":\"\\u062f\\u0646\\u0645\\u0627\\u0631\\u0643\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(60, '{\"en\":\"Djiboutian\",\"ar\":\"\\u062c\\u064a\\u0628\\u0648\\u062a\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(61, '{\"en\":\"Dominican\",\"ar\":\"\\u062f\\u0648\\u0645\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(62, '{\"en\":\"Dominican\",\"ar\":\"\\u062f\\u0648\\u0645\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(63, '{\"en\":\"Ecuadorian\",\"ar\":\"\\u0625\\u0643\\u0648\\u0627\\u062f\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(64, '{\"en\":\"Egyptian\",\"ar\":\"\\u0645\\u0635\\u0631\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(65, '{\"en\":\"Salvadoran\",\"ar\":\"\\u0633\\u0644\\u0641\\u0627\\u062f\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(66, '{\"en\":\"Equatorial Guinean\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(67, '{\"en\":\"Eritrean\",\"ar\":\"\\u0625\\u0631\\u064a\\u062a\\u064a\\u0631\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(68, '{\"en\":\"Estonian\",\"ar\":\"\\u0627\\u0633\\u062a\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(69, '{\"en\":\"Ethiopian\",\"ar\":\"\\u0623\\u062b\\u064a\\u0648\\u0628\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(70, '{\"en\":\"Falkland Islander\",\"ar\":\"\\u0641\\u0648\\u0643\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(71, '{\"en\":\"Faroese\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0641\\u0627\\u0631\\u0648\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(72, '{\"en\":\"Fijian\",\"ar\":\"\\u0641\\u064a\\u062c\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(73, '{\"en\":\"Finnish\",\"ar\":\"\\u0641\\u0646\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:21', '2022-04-08 15:55:21'),
(74, '{\"en\":\"French\",\"ar\":\"\\u0641\\u0631\\u0646\\u0633\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(75, '{\"en\":\"French Guianese\",\"ar\":\"\\u063a\\u0648\\u064a\\u0627\\u0646\\u0627 \\u0627\\u0644\\u0641\\u0631\\u0646\\u0633\\u064a\\u0629\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(76, '{\"en\":\"French Polynesian\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0646\\u064a\\u0632\\u064a\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(77, '{\"en\":\"French\",\"ar\":\"\\u0623\\u0631\\u0627\\u0636 \\u0641\\u0631\\u0646\\u0633\\u064a\\u0629 \\u062c\\u0646\\u0648\\u0628\\u064a\\u0629 \\u0648\\u0623\\u0646\\u062a\\u0627\\u0631\\u062a\\u064a\\u0643\\u064a\\u0629\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(78, '{\"en\":\"Gabonese\",\"ar\":\"\\u063a\\u0627\\u0628\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(79, '{\"en\":\"Gambian\",\"ar\":\"\\u063a\\u0627\\u0645\\u0628\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(80, '{\"en\":\"Georgian\",\"ar\":\"\\u062c\\u064a\\u0648\\u0631\\u062c\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(81, '{\"en\":\"German\",\"ar\":\"\\u0623\\u0644\\u0645\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(82, '{\"en\":\"Ghanaian\",\"ar\":\"\\u063a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(83, '{\"en\":\"Gibraltar\",\"ar\":\"\\u062c\\u0628\\u0644 \\u0637\\u0627\\u0631\\u0642\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(84, '{\"en\":\"Guernsian\",\"ar\":\"\\u063a\\u064a\\u0631\\u0646\\u0632\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(85, '{\"en\":\"Greek\",\"ar\":\"\\u064a\\u0648\\u0646\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(86, '{\"en\":\"Greenlandic\",\"ar\":\"\\u062c\\u0631\\u064a\\u0646\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(87, '{\"en\":\"Grenadian\",\"ar\":\"\\u063a\\u0631\\u064a\\u0646\\u0627\\u062f\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(88, '{\"en\":\"Guadeloupe\",\"ar\":\"\\u062c\\u0632\\u0631 \\u062c\\u0648\\u0627\\u062f\\u0644\\u0648\\u0628\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(89, '{\"en\":\"Guamanian\",\"ar\":\"\\u062c\\u0648\\u0627\\u0645\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(90, '{\"en\":\"Guatemalan\",\"ar\":\"\\u063a\\u0648\\u0627\\u062a\\u064a\\u0645\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(91, '{\"en\":\"Guinean\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(92, '{\"en\":\"Guinea-Bissauan\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(93, '{\"en\":\"Guyanese\",\"ar\":\"\\u063a\\u064a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(94, '{\"en\":\"Haitian\",\"ar\":\"\\u0647\\u0627\\u064a\\u062a\\u064a\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(95, '{\"en\":\"Heard and Mc Donald Islanders\",\"ar\":\"\\u062c\\u0632\\u064a\\u0631\\u0629 \\u0647\\u064a\\u0631\\u062f \\u0648\\u062c\\u0632\\u0631 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\"}', '2022-04-08 15:55:22', '2022-04-08 15:55:22'),
(96, '{\"en\":\"Honduran\",\"ar\":\"\\u0647\\u0646\\u062f\\u0648\\u0631\\u0627\\u0633\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(97, '{\"en\":\"Hongkongese\",\"ar\":\"\\u0647\\u0648\\u0646\\u063a \\u0643\\u0648\\u0646\\u063a\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(98, '{\"en\":\"Hungarian\",\"ar\":\"\\u0645\\u062c\\u0631\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(99, '{\"en\":\"Icelandic\",\"ar\":\"\\u0622\\u064a\\u0633\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(100, '{\"en\":\"Indian\",\"ar\":\"\\u0647\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(101, '{\"en\":\"Manx\",\"ar\":\"\\u0645\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(102, '{\"en\":\"Indonesian\",\"ar\":\"\\u0623\\u0646\\u062f\\u0648\\u0646\\u064a\\u0633\\u064a\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(103, '{\"en\":\"Iranian\",\"ar\":\"\\u0625\\u064a\\u0631\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(104, '{\"en\":\"Iraqi\",\"ar\":\"\\u0639\\u0631\\u0627\\u0642\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(105, '{\"en\":\"Irish\",\"ar\":\"\\u0625\\u064a\\u0631\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(106, '{\"en\":\"Italian\",\"ar\":\"\\u0625\\u064a\\u0637\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(107, '{\"en\":\"Ivory Coastian\",\"ar\":\"\\u0633\\u0627\\u062d\\u0644 \\u0627\\u0644\\u0639\\u0627\\u062c\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(108, '{\"en\":\"Jersian\",\"ar\":\"\\u062c\\u064a\\u0631\\u0632\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(109, '{\"en\":\"Jamaican\",\"ar\":\"\\u062c\\u0645\\u0627\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(110, '{\"en\":\"Japanese\",\"ar\":\"\\u064a\\u0627\\u0628\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(111, '{\"en\":\"Jordanian\",\"ar\":\"\\u0623\\u0631\\u062f\\u0646\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(112, '{\"en\":\"Kazakh\",\"ar\":\"\\u0643\\u0627\\u0632\\u0627\\u062e\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(113, '{\"en\":\"Kenyan\",\"ar\":\"\\u0643\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(114, '{\"en\":\"I-Kiribati\",\"ar\":\"\\u0643\\u064a\\u0631\\u064a\\u0628\\u0627\\u062a\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(115, '{\"en\":\"North Korean\",\"ar\":\"\\u0643\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(116, '{\"en\":\"South Korean\",\"ar\":\"\\u0643\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(117, '{\"en\":\"Kosovar\",\"ar\":\"\\u0643\\u0648\\u0633\\u064a\\u0641\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(118, '{\"en\":\"Kuwaiti\",\"ar\":\"\\u0643\\u0648\\u064a\\u062a\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(119, '{\"en\":\"Kyrgyzstani\",\"ar\":\"\\u0642\\u064a\\u0631\\u063a\\u064a\\u0632\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(120, '{\"en\":\"Laotian\",\"ar\":\"\\u0644\\u0627\\u0648\\u0633\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(121, '{\"en\":\"Latvian\",\"ar\":\"\\u0644\\u0627\\u062a\\u064a\\u0641\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(122, '{\"en\":\"Lebanese\",\"ar\":\"\\u0644\\u0628\\u0646\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(123, '{\"en\":\"Basotho\",\"ar\":\"\\u0644\\u064a\\u0648\\u0633\\u064a\\u062a\\u064a\"}', '2022-04-08 15:55:23', '2022-04-08 15:55:23'),
(124, '{\"en\":\"Liberian\",\"ar\":\"\\u0644\\u064a\\u0628\\u064a\\u0631\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(125, '{\"en\":\"Libyan\",\"ar\":\"\\u0644\\u064a\\u0628\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(126, '{\"en\":\"Liechtenstein\",\"ar\":\"\\u0644\\u064a\\u062e\\u062a\\u0646\\u0634\\u062a\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(127, '{\"en\":\"Lithuanian\",\"ar\":\"\\u0644\\u062a\\u0648\\u0627\\u0646\\u064a\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(128, '{\"en\":\"Luxembourger\",\"ar\":\"\\u0644\\u0648\\u0643\\u0633\\u0645\\u0628\\u0648\\u0631\\u063a\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(129, '{\"en\":\"Sri Lankian\",\"ar\":\"\\u0633\\u0631\\u064a\\u0644\\u0627\\u0646\\u0643\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(130, '{\"en\":\"Macanese\",\"ar\":\"\\u0645\\u0627\\u0643\\u0627\\u0648\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(131, '{\"en\":\"Macedonian\",\"ar\":\"\\u0645\\u0642\\u062f\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(132, '{\"en\":\"Malagasy\",\"ar\":\"\\u0645\\u062f\\u063a\\u0634\\u0642\\u0631\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(133, '{\"en\":\"Malawian\",\"ar\":\"\\u0645\\u0627\\u0644\\u0627\\u0648\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(134, '{\"en\":\"Malaysian\",\"ar\":\"\\u0645\\u0627\\u0644\\u064a\\u0632\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(135, '{\"en\":\"Maldivian\",\"ar\":\"\\u0645\\u0627\\u0644\\u062f\\u064a\\u0641\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(136, '{\"en\":\"Malian\",\"ar\":\"\\u0645\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(137, '{\"en\":\"Maltese\",\"ar\":\"\\u0645\\u0627\\u0644\\u0637\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(138, '{\"en\":\"Marshallese\",\"ar\":\"\\u0645\\u0627\\u0631\\u0634\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(139, '{\"en\":\"Martiniquais\",\"ar\":\"\\u0645\\u0627\\u0631\\u062a\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(140, '{\"en\":\"Mauritanian\",\"ar\":\"\\u0645\\u0648\\u0631\\u064a\\u062a\\u0627\\u0646\\u064a\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(141, '{\"en\":\"Mauritian\",\"ar\":\"\\u0645\\u0648\\u0631\\u064a\\u0634\\u064a\\u0648\\u0633\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(142, '{\"en\":\"Mahoran\",\"ar\":\"\\u0645\\u0627\\u064a\\u0648\\u062a\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(143, '{\"en\":\"Mexican\",\"ar\":\"\\u0645\\u0643\\u0633\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(144, '{\"en\":\"Micronesian\",\"ar\":\"\\u0645\\u0627\\u064a\\u0643\\u0631\\u0648\\u0646\\u064a\\u0632\\u064a\\u064a\"}', '2022-04-08 15:55:24', '2022-04-08 15:55:24'),
(145, '{\"en\":\"Moldovan\",\"ar\":\"\\u0645\\u0648\\u0644\\u062f\\u064a\\u0641\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(146, '{\"en\":\"Monacan\",\"ar\":\"\\u0645\\u0648\\u0646\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(147, '{\"en\":\"Mongolian\",\"ar\":\"\\u0645\\u0646\\u063a\\u0648\\u0644\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(148, '{\"en\":\"Montenegrin\",\"ar\":\"\\u0627\\u0644\\u062c\\u0628\\u0644 \\u0627\\u0644\\u0623\\u0633\\u0648\\u062f\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(149, '{\"en\":\"Montserratian\",\"ar\":\"\\u0645\\u0648\\u0646\\u062a\\u0633\\u064a\\u0631\\u0627\\u062a\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(150, '{\"en\":\"Moroccan\",\"ar\":\"\\u0645\\u063a\\u0631\\u0628\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(151, '{\"en\":\"Mozambican\",\"ar\":\"\\u0645\\u0648\\u0632\\u0645\\u0628\\u064a\\u0642\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(152, '{\"en\":\"Myanmarian\",\"ar\":\"\\u0645\\u064a\\u0627\\u0646\\u0645\\u0627\\u0631\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(153, '{\"en\":\"Namibian\",\"ar\":\"\\u0646\\u0627\\u0645\\u064a\\u0628\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(154, '{\"en\":\"Nauruan\",\"ar\":\"\\u0646\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(155, '{\"en\":\"Nepalese\",\"ar\":\"\\u0646\\u064a\\u0628\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(156, '{\"en\":\"Dutch\",\"ar\":\"\\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(157, '{\"en\":\"Dutch Antilier\",\"ar\":\"\\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(158, '{\"en\":\"New Caledonian\",\"ar\":\"\\u0643\\u0627\\u0644\\u064a\\u062f\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(159, '{\"en\":\"New Zealander\",\"ar\":\"\\u0646\\u064a\\u0648\\u0632\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(160, '{\"en\":\"Nicaraguan\",\"ar\":\"\\u0646\\u064a\\u0643\\u0627\\u0631\\u0627\\u062c\\u0648\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(161, '{\"en\":\"Nigerien\",\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(162, '{\"en\":\"Nigerian\",\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(163, '{\"en\":\"Niuean\",\"ar\":\"\\u0646\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(164, '{\"en\":\"Norfolk Islander\",\"ar\":\"\\u0646\\u0648\\u0631\\u0641\\u0648\\u0644\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(165, '{\"en\":\"Northern Marianan\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(166, '{\"en\":\"Norwegian\",\"ar\":\"\\u0646\\u0631\\u0648\\u064a\\u062c\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(167, '{\"en\":\"Omani\",\"ar\":\"\\u0639\\u0645\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(168, '{\"en\":\"Pakistani\",\"ar\":\"\\u0628\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(169, '{\"en\":\"Palauan\",\"ar\":\"\\u0628\\u0627\\u0644\\u0627\\u0648\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(170, '{\"en\":\"Palestinian\",\"ar\":\"\\u0641\\u0644\\u0633\\u0637\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(171, '{\"en\":\"Panamanian\",\"ar\":\"\\u0628\\u0646\\u0645\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(172, '{\"en\":\"Papua New Guinean\",\"ar\":\"\\u0628\\u0627\\u0628\\u0648\\u064a\"}', '2022-04-08 15:55:25', '2022-04-08 15:55:25'),
(173, '{\"en\":\"Paraguayan\",\"ar\":\"\\u0628\\u0627\\u0631\\u063a\\u0627\\u0648\\u064a\"}', '2022-04-08 15:55:26', '2022-04-08 15:55:26'),
(174, '{\"en\":\"Peruvian\",\"ar\":\"\\u0628\\u064a\\u0631\\u064a\"}', '2022-04-08 15:55:26', '2022-04-08 15:55:26'),
(175, '{\"en\":\"Filipino\",\"ar\":\"\\u0641\\u0644\\u0628\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:26', '2022-04-08 15:55:26'),
(176, '{\"en\":\"Pitcairn Islander\",\"ar\":\"\\u0628\\u064a\\u062a\\u0643\\u064a\\u0631\\u0646\\u064a\"}', '2022-04-08 15:55:26', '2022-04-08 15:55:26'),
(177, '{\"en\":\"Polish\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:26', '2022-04-08 15:55:26'),
(178, '{\"en\":\"Portuguese\",\"ar\":\"\\u0628\\u0631\\u062a\\u063a\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:26', '2022-04-08 15:55:26'),
(179, '{\"en\":\"Puerto Rican\",\"ar\":\"\\u0628\\u0648\\u0631\\u062a\\u064a\"}', '2022-04-08 15:55:26', '2022-04-08 15:55:26'),
(180, '{\"en\":\"Qatari\",\"ar\":\"\\u0642\\u0637\\u0631\\u064a\"}', '2022-04-08 15:55:26', '2022-04-08 15:55:26'),
(181, '{\"en\":\"Reunionese\",\"ar\":\"\\u0631\\u064a\\u0648\\u0646\\u064a\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:27', '2022-04-08 15:55:27'),
(182, '{\"en\":\"Romanian\",\"ar\":\"\\u0631\\u0648\\u0645\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:27', '2022-04-08 15:55:27'),
(183, '{\"en\":\"Russian\",\"ar\":\"\\u0631\\u0648\\u0633\\u064a\"}', '2022-04-08 15:55:27', '2022-04-08 15:55:27'),
(184, '{\"en\":\"Rwandan\",\"ar\":\"\\u0631\\u0648\\u0627\\u0646\\u062f\\u0627\"}', '2022-04-08 15:55:28', '2022-04-08 15:55:28'),
(185, '{\"ar\":\"Kittitian\\/Nevisian\"}', '2022-04-08 15:55:28', '2022-04-08 15:55:28'),
(186, '{\"en\":\"St. Martian(French)\",\"ar\":\"\\u0633\\u0627\\u064a\\u0646\\u062a \\u0645\\u0627\\u0631\\u062a\\u0646\\u064a \\u0641\\u0631\\u0646\\u0633\\u064a\"}', '2022-04-08 15:55:28', '2022-04-08 15:55:28'),
(187, '{\"en\":\"St. Martian(Dutch)\",\"ar\":\"\\u0633\\u0627\\u064a\\u0646\\u062a \\u0645\\u0627\\u0631\\u062a\\u0646\\u064a \\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(188, '{\"en\":\"St. Pierre and Miquelon\",\"ar\":\"\\u0633\\u0627\\u0646 \\u0628\\u064a\\u064a\\u0631 \\u0648\\u0645\\u064a\\u0643\\u0644\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(189, '{\"en\":\"Saint Vincent and the Grenadines\",\"ar\":\"\\u0633\\u0627\\u0646\\u062a \\u0641\\u0646\\u0633\\u0646\\u062a \\u0648\\u062c\\u0632\\u0631 \\u063a\\u0631\\u064a\\u0646\\u0627\\u062f\\u064a\\u0646\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(190, '{\"en\":\"Samoan\",\"ar\":\"\\u0633\\u0627\\u0645\\u0648\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(191, '{\"en\":\"Sammarinese\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(192, '{\"en\":\"Sao Tomean\",\"ar\":\"\\u0633\\u0627\\u0648 \\u062a\\u0648\\u0645\\u064a \\u0648\\u0628\\u0631\\u064a\\u0646\\u0633\\u064a\\u0628\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(193, '{\"en\":\"Saudi Arabian\",\"ar\":\"\\u0633\\u0639\\u0648\\u062f\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(194, '{\"en\":\"Senegalese\",\"ar\":\"\\u0633\\u0646\\u063a\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(195, '{\"en\":\"Serbian\",\"ar\":\"\\u0635\\u0631\\u0628\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(196, '{\"en\":\"Seychellois\",\"ar\":\"\\u0633\\u064a\\u0634\\u064a\\u0644\\u064a\"}', '2022-04-08 15:55:29', '2022-04-08 15:55:29'),
(197, '{\"en\":\"Sierra Leonean\",\"ar\":\"\\u0633\\u064a\\u0631\\u0627\\u0644\\u064a\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(198, '{\"en\":\"Singaporean\",\"ar\":\"\\u0633\\u0646\\u063a\\u0627\\u0641\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(199, '{\"en\":\"Slovak\",\"ar\":\"\\u0633\\u0648\\u0644\\u0641\\u0627\\u0643\\u064a\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(200, '{\"en\":\"Slovenian\",\"ar\":\"\\u0633\\u0648\\u0644\\u0641\\u064a\\u0646\\u064a\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(201, '{\"en\":\"Solomon Island\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0633\\u0644\\u064a\\u0645\\u0627\\u0646\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(202, '{\"en\":\"Somali\",\"ar\":\"\\u0635\\u0648\\u0645\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(203, '{\"en\":\"South African\",\"ar\":\"\\u0623\\u0641\\u0631\\u064a\\u0642\\u064a\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(204, '{\"en\":\"South Georgia and the South Sandwich\",\"ar\":\"\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u0642\\u0637\\u0628\\u064a\\u0629 \\u0627\\u0644\\u062c\\u0646\\u0648\\u0628\\u064a\\u0629\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(205, '{\"en\":\"South Sudanese\",\"ar\":\"\\u0633\\u0648\\u0627\\u062f\\u0646\\u064a \\u062c\\u0646\\u0648\\u0628\\u064a\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(206, '{\"en\":\"Spanish\",\"ar\":\"\\u0625\\u0633\\u0628\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:30', '2022-04-08 15:55:30'),
(207, '{\"en\":\"St. Helenian\",\"ar\":\"\\u0647\\u064a\\u0644\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:31', '2022-04-08 15:55:31'),
(208, '{\"en\":\"Sudanese\",\"ar\":\"\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:31', '2022-04-08 15:55:31'),
(209, '{\"en\":\"Surinamese\",\"ar\":\"\\u0633\\u0648\\u0631\\u064a\\u0646\\u0627\\u0645\\u064a\"}', '2022-04-08 15:55:31', '2022-04-08 15:55:31'),
(210, '{\"en\":\"Svalbardian\\/Jan Mayenian\",\"ar\":\"\\u0633\\u0641\\u0627\\u0644\\u0628\\u0627\\u0631\\u062f \\u0648\\u064a\\u0627\\u0646 \\u0645\\u0627\\u064a\\u0646\"}', '2022-04-08 15:55:31', '2022-04-08 15:55:31'),
(211, '{\"en\":\"Swazi\",\"ar\":\"\\u0633\\u0648\\u0627\\u0632\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:31', '2022-04-08 15:55:31'),
(212, '{\"en\":\"Swedish\",\"ar\":\"\\u0633\\u0648\\u064a\\u062f\\u064a\"}', '2022-04-08 15:55:31', '2022-04-08 15:55:31'),
(213, '{\"en\":\"Swiss\",\"ar\":\"\\u0633\\u0648\\u064a\\u0633\\u0631\\u064a\"}', '2022-04-08 15:55:31', '2022-04-08 15:55:31'),
(214, '{\"en\":\"Syrian\",\"ar\":\"\\u0633\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(215, '{\"en\":\"Taiwanese\",\"ar\":\"\\u062a\\u0627\\u064a\\u0648\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(216, '{\"en\":\"Tajikistani\",\"ar\":\"\\u0637\\u0627\\u062c\\u064a\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(217, '{\"en\":\"Tanzanian\",\"ar\":\"\\u062a\\u0646\\u0632\\u0627\\u0646\\u064a\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(218, '{\"en\":\"Thai\",\"ar\":\"\\u062a\\u0627\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(219, '{\"en\":\"Timor-Lestian\",\"ar\":\"\\u062a\\u064a\\u0645\\u0648\\u0631\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(220, '{\"en\":\"Togolese\",\"ar\":\"\\u062a\\u0648\\u063a\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(221, '{\"en\":\"Tokelaian\",\"ar\":\"\\u062a\\u0648\\u0643\\u064a\\u0644\\u0627\\u0648\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(222, '{\"en\":\"Tongan\",\"ar\":\"\\u062a\\u0648\\u0646\\u063a\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(223, '{\"en\":\"Trinidadian\\/Tobagonian\",\"ar\":\"\\u062a\\u0631\\u064a\\u0646\\u064a\\u062f\\u0627\\u062f \\u0648\\u062a\\u0648\\u0628\\u0627\\u063a\\u0648\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(224, '{\"en\":\"Tunisian\",\"ar\":\"\\u062a\\u0648\\u0646\\u0633\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(225, '{\"en\":\"Turkish\",\"ar\":\"\\u062a\\u0631\\u0643\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(226, '{\"en\":\"Turkmen\",\"ar\":\"\\u062a\\u0631\\u0643\\u0645\\u0627\\u0646\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(227, '{\"en\":\"Turks and Caicos Islands\",\"ar\":\"\\u062c\\u0632\\u0631 \\u062a\\u0648\\u0631\\u0643\\u0633 \\u0648\\u0643\\u0627\\u064a\\u0643\\u0648\\u0633\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(228, '{\"en\":\"Tuvaluan\",\"ar\":\"\\u062a\\u0648\\u0641\\u0627\\u0644\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(229, '{\"en\":\"Ugandan\",\"ar\":\"\\u0623\\u0648\\u063a\\u0646\\u062f\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(230, '{\"en\":\"Ukrainian\",\"ar\":\"\\u0623\\u0648\\u0643\\u0631\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(231, '{\"en\":\"Emirati\",\"ar\":\"\\u0625\\u0645\\u0627\\u0631\\u0627\\u062a\\u064a\"}', '2022-04-08 15:55:32', '2022-04-08 15:55:32'),
(232, '{\"en\":\"British\",\"ar\":\"\\u0628\\u0631\\u064a\\u0637\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(233, '{\"en\":\"American\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(234, '{\"en\":\"US Minor Outlying Islander\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(235, '{\"en\":\"Uruguayan\",\"ar\":\"\\u0623\\u0648\\u0631\\u063a\\u0648\\u0627\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(236, '{\"en\":\"Uzbek\",\"ar\":\"\\u0623\\u0648\\u0632\\u0628\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(237, '{\"en\":\"Vanuatuan\",\"ar\":\"\\u0641\\u0627\\u0646\\u0648\\u0627\\u062a\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(238, '{\"en\":\"Venezuelan\",\"ar\":\"\\u0641\\u0646\\u0632\\u0648\\u064a\\u0644\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(239, '{\"en\":\"Vietnamese\",\"ar\":\"\\u0641\\u064a\\u062a\\u0646\\u0627\\u0645\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(240, '{\"en\":\"American Virgin Islander\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(241, '{\"en\":\"Vatican\",\"ar\":\"\\u0641\\u0627\\u062a\\u064a\\u0643\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:33', '2022-04-08 15:55:33'),
(242, '{\"en\":\"Wallisian\\/Futunan\",\"ar\":\"\\u0641\\u0648\\u062a\\u0648\\u0646\\u064a\"}', '2022-04-08 15:55:34', '2022-04-08 15:55:34'),
(243, '{\"en\":\"Sahrawian\",\"ar\":\"\\u0635\\u062d\\u0631\\u0627\\u0648\\u064a\"}', '2022-04-08 15:55:34', '2022-04-08 15:55:34'),
(244, '{\"en\":\"Yemeni\",\"ar\":\"\\u064a\\u0645\\u0646\\u064a\"}', '2022-04-08 15:55:34', '2022-04-08 15:55:34'),
(245, '{\"en\":\"Zambian\",\"ar\":\"\\u0632\\u0627\\u0645\\u0628\\u064a\\u0627\\u0646\\u064a\"}', '2022-04-08 15:55:34', '2022-04-08 15:55:34'),
(246, '{\"en\":\"Zimbabwean\",\"ar\":\"\\u0632\\u0645\\u0628\\u0627\\u0628\\u0648\\u064a\"}', '2022-04-08 15:55:35', '2022-04-08 15:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `online_exams`
--

CREATE TABLE `online_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_exams`
--

INSERT INTO `online_exams` (`id`, `name`, `subject_id`, `grade_id`, `class_id`, `section_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(3, '{\"en\":\"Arabic Exam\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631 \\u0627\\u0644\\u0644\\u063a\\u0629 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\"}', 2, 1, 15, 6, 2, '2022-06-07 00:02:29', '2022-07-19 22:24:13'),
(4, '{\"en\":\"kgjkggkjgk\",\"ar\":\"\\u0645\\u0639\\u0646\\u0644 \\u0627\\u0644\\u0645\\u0629\\u062a\"}', 2, 1, 15, 6, 2, '2022-07-19 22:23:53', '2022-07-19 22:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `online_meetings`
--

CREATE TABLE `online_meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'minutes',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'meeting_password',
  `start_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `integeration` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_meetings`
--

INSERT INTO `online_meetings` (`id`, `grade_id`, `class_id`, `section_id`, `meeting_id`, `topic`, `start_at`, `duration`, `password`, `start_url`, `join_url`, `integeration`, `created_at`, `updated_at`, `created_by`) VALUES
(5, 1, 15, 2, '77782547330', 'English lesson', '2022-06-11 17:00:00', 60, '4UpxGB', 'https://us04web.zoom.us/s/77782547330?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6ImtRclNTRlBUVGlPbkRXZmN2ZkNia3ciLCJpc3MiOiJ3ZWIiLCJzayI6IjAiLCJzdHkiOjEsIndjZCI6InVzMDQiLCJjbHQiOjAsIm1udW0iOiI3Nzc4MjU0NzMzMCIsImV4cCI6MTY1NDgyNjEyOSwiaWF0IjoxNjU0ODE4OTI5LCJhaWQiOiJDYkg0cGYtVlIzR1dvUGFFVEhuZVlBIiwiY2lkIjoiIn0.pq3wNaQo-xlnXFbov2rhQEz9DZOtYbwFGirKlm4UBJo', 'https://us04web.zoom.us/j/77782547330?pwd=nFMpmy4Kb6cMZVVBhqAv2BBeytJJxW.1', 1, '2022-06-09 21:55:29', '2022-06-09 21:55:29', 'hagar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_passport_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_nationality_id` bigint(20) UNSIGNED NOT NULL,
  `father_blood_id` bigint(20) UNSIGNED NOT NULL,
  `father_religion_id` bigint(20) UNSIGNED NOT NULL,
  `father_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_passport_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_nationality_id` bigint(20) UNSIGNED NOT NULL,
  `mother_blood_id` bigint(20) UNSIGNED NOT NULL,
  `mother_religion_id` bigint(20) UNSIGNED NOT NULL,
  `mother_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `email`, `password`, `father_name`, `father_national_id`, `father_passport_id`, `father_phone`, `father_job`, `father_nationality_id`, `father_blood_id`, `father_religion_id`, `father_address`, `mother_name`, `mother_national_id`, `mother_passport_id`, `mother_phone`, `mother_job`, `mother_nationality_id`, `mother_blood_id`, `mother_religion_id`, `mother_address`, `created_at`, `updated_at`) VALUES
(28, 'emy@gmail.com', '$2y$10$xS1R2062/etgU3kKrL4eDOJC2/mqkCl.dTT04hRbrkLB.z8/HVzOG', '{\"ar\":\"\\u0627\\u062d\\u0645\\u062f\",\"en\":\"Ahmed\"}', '2323232323', '2323232323', '2323232323', '{\"ar\":\"\\u0646\\u062a\\u0644\\u062a\\u0627\\u0644\\u0627\\u062a\\u0644\\u0644\\u0627\",\"en\":\"jkhjgjjfjf\"}', 15, 14, 2, 'bjkgjgjgjhgghjgh', '{\"ar\":\"\\u062a\\u0644\\u0646\\u062a\\u0644\\u0646\\u062a\\u0644\\u0644\",\"en\":\"hjgfjjhfjhf\"}', '2323232323', '2323232323', '2323232323', '{\"ar\":\"\\u062a\\u0646\\u0644\\u062a\\u062a\\u062a\\u0627\\u0628\\u062a\\u0628\",\"en\":\"hgvjhfjfj\"}', 16, 9, 2, 'اىنتانتانتانتان', '2022-04-12 20:45:29', '2022-08-28 21:53:42'),
(54, 'y@gmail.com', '$2y$10$jnuOiSJFrlsfdEJoRMzzgOQs6PnFDdrQoyMrGvTRXnw8CM.XaCuxK', '{\"ar\":\"hgvhghgh\",\"en\":\"hvhvhvhg\"}', '2222222222', '3333333333', '44444444444', '{\"ar\":\"hbgugugu\",\"en\":\"ihhihhihiu\"}', 17, 15, 1, 'jhbjbjhbjbjh', '{\"ar\":\"uhyguyguguyg\",\"en\":\"hjhujgbhjh\"}', '444444444', '222222222', '777777777', '{\"ar\":\"hbhjbhjhj\",\"en\":\"hjbhjbhjbjh\"}', 15, 10, 2, 'hubhujgbbggugb', '2022-04-14 22:44:09', '2022-04-15 23:47:36'),
(57, 'zytybeza@mailinator.com', '$2y$10$lICN9YI7DU9IaETpCzLI8..O3j4BkT9HvIhBodihXTSslmEO7thF2', '{\"ar\":\"Et velit fuga Volu\",\"en\":\"Sint quo repellendus\"}', '1234444444', '333333333', '2222222222', '{\"ar\":\"Quo aut tenetur in i\",\"en\":\"Eius voluptatum vel \"}', 14, 15, 2, 'kjgjkgjkgjkjgjk', '{\"ar\":\"hjfghdfhfh\",\"en\":\"jgytyutttu\"}', '666666666', '4444444444', '888888888', '{\"ar\":\"kjgjgjgjh\",\"en\":\"jgjgjgjgjg\"}', 17, 9, 1, 'kjhkjhjkjkhkj', '2022-04-15 00:39:27', '2022-04-15 00:39:27'),
(60, 'fylinuqul@mailinator.com', '$2y$10$q9ov445WoNqCiGbouVQ4Eu9Vp2vAECmhPbRfMEZ03S3T4eCdXuVT6', '{\"ar\":\"Velit necessitatibu\",\"en\":\"Soluta aliquip conse\"}', '123444444', '566666666', '4444447777', '{\"ar\":\"Aut assumenda enim e\",\"en\":\"Temporibus est quos \"}', 182, 15, 2, 'kjghjgjgjgj', '{\"ar\":\"iuhuiuiyuiyui\",\"en\":\"gujggtuyt\"}', '3333333333', '888888888', '00000000', '{\"ar\":\"jhihuiuiouio\",\"en\":\"kjgkjgjgjgjh\"}', 17, 15, 1, 'jfjfhfhfhfhfh', '2022-04-15 23:59:52', '2022-04-15 23:59:52'),
(62, 'bapul@mailinator.com', '$2y$10$CzAn9VZMkI0AQv85jnCTQuom1hsqCvU.9pv7Df030ByuwJ2KQxHkm', '{\"ar\":\"Id recusandae Sed a\",\"en\":\"Fugit dolor ratione\"}', '555555555', '999999999', '0000000009', '{\"ar\":\"Culpa rerum distinc\",\"en\":\"Veritatis tempora es\"}', 39, 15, 3, 'jkhkhgkjgjkgk', '{\"ar\":\"hjghjghjgjh\",\"en\":\"huuiuiyuiyui\"}', '4555555', '98888888888', '0999999999', '{\"ar\":\"jkgkgjgjg\",\"en\":\"ugtututututu\"}', 16, 10, 1, 'ihyiuyiuyiu', '2022-04-16 00:06:48', '2022-04-16 00:06:48'),
(63, 'tyzoti@mailinator.com', '$2y$10$RMOX.6SNZk9uf6MLuJ/f/O9AmwjTXekTXvRYVQIWEwXwZyTa47zPu', '{\"ar\":\"Nostrum eos quia est\",\"en\":\"Sunt in culpa id mo\"}', '6666666666', '90888888', '6757565755', '{\"ar\":\"Sint perspiciatis l\",\"en\":\"Aliquip dolores ut q\"}', 61, 12, 3, 'iyoyiyiyiyi', '{\"ar\":\"gjhgfjhgjhghj\",\"en\":\"uggtuytutygtyutt\"}', '65465456446', '4646487878', '87686768676', '{\"ar\":\"iuiuyyui\",\"en\":\"oiuoiuoiuoiu\"}', 14, 11, 2, 'iouiuiouoiuio', '2022-04-16 00:08:28', '2022-04-16 00:08:28'),
(64, 'bosaryg@mailinator.com', '$2y$10$o8SmEsNSMHLyYdqjwVjhvOLF2XOXfHWF37zsh02df9gY0..zWAZ5.', '{\"ar\":\"Nulla ea error est e\",\"en\":\"Quis amet qui quia \"}', '8696868687', '876867687', '98789779009', '{\"ar\":\"Beatae tempor veniam\",\"en\":\"Quia minima eos dol\"}', 74, 9, 4, 'iuyuiyiyyuiyiuy', '{\"ar\":\"ugyututyu\",\"en\":\"iuuiyyiuyu\"}', '6786876709', '9797879879', '0980808988', '{\"ar\":\"huyiuyiyiy\",\"en\":\"iuyiyyiuyiy\"}', 16, 11, 3, 'khjkhjjhkjhkjh', '2022-04-16 00:12:02', '2022-04-16 00:12:02'),
(65, 'xolavuk@mailinator.com', '$2y$10$U9MxSKdQjFvxNgAw0ubPVuEJZsA2bE9yIEYldUECXQCad5xsODDKa', '{\"ar\":\"Et sed in cupiditate\",\"en\":\"Dolor eum ea tempori\"}', '67876876778678', '987798798', '987977989879', '{\"ar\":\"Sit earum quo ratio\",\"en\":\"Itaque dolor neque N\"}', 165, 15, 4, 'iooyyyoioyi', '{\"ar\":\"ytyutyutyu\",\"en\":\"itututut\"}', '687687668', '7987987979', '7567575765', '{\"ar\":\"iutututyu\",\"en\":\"guuttuttt\"}', 16, 14, 2, 'khjkkjghkjggj', '2022-04-16 00:21:32', '2022-04-16 00:21:32'),
(66, 'lyxymyda@mailinator.com', '$2y$10$AWG79QmlvsP/liHg7DpQJO1k83qSHxJFyqw3jeiDCmgD1psp2Pg3m', '{\"ar\":\"Non voluptatem dolor\",\"en\":\"Dolore sunt hic dol\"}', '7857657575', '8768567857', '876876876876', '{\"ar\":\"Tempor soluta ullamc\",\"en\":\"Est voluptatem in i\"}', 12, 11, 2, 'iiouuyiyiy', '{\"ar\":\"hjfhfhfhfhg\",\"en\":\"tututuytu\"}', '78687657868', '7576575', '6474646464', '{\"ar\":\"iuyiyiuyiyi\",\"en\":\"iuyuiyiytiu\"}', 16, 11, 1, 'hfhfhfhfhhg', '2022-04-16 00:23:19', '2022-04-16 00:23:19'),
(67, 'qunesux@mailinator.com', '$2y$10$ps9dcuOQC8T/HXlbHnoOK.KJNABR/eMyljNBpAJeyvMRYW4.IND1K', '{\"ar\":\"Aperiam cillum dicta\",\"en\":\"Dolore ipsam eum com\"}', '6756765755', '5354353535', '764646464646', '{\"ar\":\"A libero praesentium\",\"en\":\"Quidem in molestiae \"}', 235, 13, 1, 'yfyryryrryryry', '{\"ar\":\"jhgjhgfjgjhf\",\"en\":\"ugtyututtyu\"}', '6746746546', '6646547575', '657675675', '{\"ar\":\"tuytuttutt\",\"en\":\"hjfjffhfh\"}', 15, 10, 2, 'jgjhjgjgjgjgj', '2022-04-16 00:25:11', '2022-04-16 00:25:11'),
(68, 'kitojyke@mailinator.com', '$2y$10$TRlWhUq9zy.RDFA4PrA2ve7Iu2Ghv.wnPpOFmRT64ayPNOwkfCOwq', '{\"ar\":\"Distinctio Molestia\",\"en\":\"Voluptas ut minus co\"}', '876587686', '5675675667', '7987897979', '{\"ar\":\"Error iusto ut eos c\",\"en\":\"Commodo ratione comm\"}', 160, 16, 4, 'iuyiuyiyyi', '{\"ar\":\"uygyuuytut\",\"en\":\"uhuuuguig\"}', '886868687', '7857575788', '8676879778', '{\"ar\":\"uiyuiuiyiu\",\"en\":\"uihyuiyuy\"}', 17, 12, 1, 'jgjhgjgjgjgg', '2022-04-16 00:29:22', '2022-04-16 00:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `parent_attachments`
--

CREATE TABLE `parent_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_attachments`
--

INSERT INTO `parent_attachments` (`id`, `file_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(71, 'bear engine logo.png', 64, '2022-04-16 00:12:02', '2022-04-16 00:12:02'),
(72, 'BN.png', 64, '2022-04-16 00:12:03', '2022-04-16 00:12:03'),
(73, 'boxing-logo-2.png', 64, '2022-04-16 00:12:03', '2022-04-16 00:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `date`, `debit`, `description`, `created_at`, `updated_at`) VALUES
(4, 28, '2022-05-12', '9000.00', 'دفع نص المبلغ المطلوب', '2022-05-11 22:43:29', '2022-05-11 22:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `online_exam_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `right_answer`, `score`, `online_exam_id`, `created_at`, `updated_at`) VALUES
(2, 'ما هي عاصمة مصر؟', 'القاهرة - بنها- الشرقية', 'القاهرة', 25, 3, '2022-06-08 20:53:11', '2022-07-19 22:43:25'),
(3, 'ترنترنتتنلتل', 'تنت - نا - تلتل', 'نا', 31, 3, '2022-06-08 22:10:48', '2022-07-19 22:43:34'),
(6, 'ما معني كلمة فتوة ؟', 'للتل - تيفف - ققث', 'ققث', 40, 4, '2022-06-08 22:18:53', '2022-07-19 22:43:41'),
(7, 'هل تحب مصر؟', 'نعم - لا', 'نعم', 5, 4, '2022-07-19 22:25:51', '2022-07-19 22:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`id`, `student_id`, `date`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(6, 28, '2022-05-12', 'الغاء مصاريف الباص', '5000.00', '2022-05-11 22:45:46', '2022-05-11 22:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Muslim\",\"ar\":\"\\u0645\\u0633\\u0644\\u0645\"}', '2022-04-08 15:55:35', '2022-04-08 15:55:35'),
(2, '{\"en\":\"Christian\",\"ar\":\"\\u0645\\u0633\\u064a\\u062d\\u064a\"}', '2022-04-08 15:55:35', '2022-04-08 15:55:35'),
(3, '{\"en\":\"Jewish\",\"ar\":\"\\u064a\\u0647\\u0648\\u062f\\u064a\"}', '2022-04-08 15:55:35', '2022-04-08 15:55:35'),
(4, '{\"en\":\"Others\",\"ar\":\"\\u063a\\u064a\\u0631\\u0630\\u0644\\u0643\"}', '2022-04-08 15:55:35', '2022-04-08 15:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `online_exam_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `score` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `manipulation` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `student_id`, `online_exam_id`, `question_id`, `score`, `date`, `manipulation`, `created_at`, `updated_at`) VALUES
(20, 28, 4, 7, 45.00, '2022-07-22', '0', '2022-07-22 20:26:57', '2022-07-22 20:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `class_id`, `grade_id`, `created_at`, `updated_at`) VALUES
(2, '{\"ar\":\"\\u0627\",\"en\":\"A\"}', '2', 15, 1, '2022-04-08 01:02:54', '2022-04-08 01:09:47'),
(3, '{\"ar\":\"\\u0628\",\"en\":\"B\"}', '1', 17, 7, '2022-04-08 01:16:22', '2022-04-08 01:16:22'),
(5, '{\"ar\":\"\\u063a\",\"en\":\"v\"}', '1', 15, 1, '2022-04-16 17:44:19', '2022-04-16 17:44:19'),
(6, '{\"ar\":\"\\u0645\",\"en\":\"m\"}', '1', 18, 9, '2022-04-28 00:58:17', '2022-04-28 00:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `section_teacher`
--

CREATE TABLE `section_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_teacher`
--

INSERT INTO `section_teacher` (`id`, `teacher_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 2, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Math\",\"ar\":\"\\u0631\\u064a\\u0627\\u0636\\u064a\\u0627\\u062a\"}', '2022-04-15 00:55:49', '2022-04-15 00:55:49'),
(2, '{\"en\":\"English\",\"ar\":\"\\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\"}', '2022-04-15 00:55:49', '2022-04-15 00:55:49'),
(3, '{\"en\":\"Arabic\",\"ar\":\"\\u0639\\u0631\\u0628\\u064a\"}', '2022-04-15 00:55:49', '2022-04-15 00:55:49'),
(4, '{\"en\":\"French\",\"ar\":\"\\u0641\\u0631\\u0646\\u0633\\u0627\\u0648\\u064a\"}', '2022-04-15 00:55:49', '2022-04-15 00:55:49'),
(5, '{\"en\":\"Chemistry\",\"ar\":\"\\u0643\\u064a\\u0645\\u064a\\u0627\\u0621\"}', '2022-04-15 00:55:50', '2022-04-15 00:55:50'),
(6, '{\"en\":\"History\",\"ar\":\"\\u062a\\u0627\\u0631\\u064a\\u062e\"}', '2022-04-15 00:55:50', '2022-04-15 00:55:50'),
(7, '{\"en\":\"Geography\",\"ar\":\"\\u062c\\u063a\\u0631\\u0627\\u0641\\u064a\\u0627\"}', '2022-04-15 00:55:50', '2022-04-15 00:55:50'),
(8, '{\"en\":\"Physics\",\"ar\":\"\\u0641\\u064a\\u0632\\u064a\\u0627\\u0621\"}', '2022-04-15 00:55:50', '2022-04-15 00:55:50'),
(9, '{\"en\":\"Biology\",\"ar\":\"\\u0627\\u062d\\u064a\\u0627\\u0621\"}', '2022-04-15 00:55:50', '2022-04-15 00:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `blood_id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `birth_date`, `academic_year`, `parent_id`, `nationality_id`, `blood_id`, `gender_id`, `grade_id`, `class_id`, `section_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, '{\"ar\":\"\\u064a\\u0648\\u0633\\u0641\",\"en\":\"Youssef Osama\"}', 'student@gmail.com', '$2y$10$Ou/gbFqx1uSytm60ZJZShuWeMkYDmZ..eNGoCQo5Db3HiDkpkDW3W', '2019-08-07', '2023', 28, 3, 10, 1, 9, 18, 6, '2022-04-25 23:42:54', '2022-07-22 22:41:55', NULL),
(30, '{\"ar\":\"\\u0645\\u062d\\u0645\\u062f\",\"en\":\"Mohamed\"}', 'ali@gmail.com', '$2y$10$8/Z2fXQkvZo7tW4daJ1fAuFmaqwq/Ge8UftH9XAgO8lai9LQoUoEu', '2019-08-07', '2023', 28, 3, 11, 1, 1, 15, 2, '2022-05-12 23:39:34', '2022-05-12 23:39:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_accounts`
--

CREATE TABLE `student_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `fee_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `refund_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_refund_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `credit` decimal(8,2) DEFAULT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_accounts`
--

INSERT INTO `student_accounts` (`id`, `student_id`, `fee_invoice_id`, `payment_id`, `refund_id`, `student_refund_id`, `type`, `date`, `description`, `credit`, `debit`, `created_at`, `updated_at`) VALUES
(1, 28, 4, NULL, NULL, NULL, 'invoice', '2022-05-08', 'edittttt', '0.00', '13000.00', '2022-05-08 21:06:23', '2022-05-08 22:44:01'),
(3, 28, 6, NULL, NULL, NULL, 'invoice', '2022-05-10', 'ugyuygugugghhj', '0.00', '5000.00', '2022-05-09 22:12:35', '2022-05-09 22:12:35'),
(11, 28, NULL, 4, NULL, NULL, 'receipt', '2022-05-12', 'دفع نص المبلغ المطلوب', '9000.00', '0.00', '2022-05-11 22:43:29', '2022-05-11 22:43:29'),
(12, 28, NULL, NULL, 6, NULL, 'refund', '2022-05-12', 'الغاء مصاريف الباص', '5000.00', '0.00', '2022-05-11 22:45:46', '2022-05-11 22:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `student_refunds`
--

CREATE TABLE `student_refunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `grade_id`, `class_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\",\"en\":\"English\"}', 1, 15, 3, '2022-05-14 01:00:31', '2022-05-14 01:59:33'),
(2, '{\"en\":\"Arabic\",\"ar\":\"\\u0639\\u0631\\u0628\\u064a\"}', 1, 15, 2, '2022-05-14 01:17:23', '2022-05-14 02:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hiring_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `specialization_id` bigint(20) UNSIGNED NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `hiring_date`, `gender_id`, `specialization_id`, `address`, `created_at`, `updated_at`) VALUES
(2, '{\"en\":\"Hagar\",\"ar\":\"\\u0647\\u0627\\u062c\\u0631\"}', 'teacherHagar@gmail.com', '$2y$10$mZqJFX.vqRsRf5D54M4gZeKAA/GpnJtaTHHCxherL/oqFbNlHy8My', '2022-04-15', 2, 1, 'jkbjkbjkbjkb', '2022-04-15 19:33:01', '2022-06-16 22:57:20'),
(3, '{\"en\":\"yossef\",\"ar\":\"\\u064a\\u0648\\u0633\\u0641\"}', 'admin@gmail.com', '$2y$10$mfDqs3flF3Jb8/1j3txaeecidQ.TD.0S3dFQJ4/LKJfHgWAl0Z7Iy', '2022-04-15', 1, 2, 'iugiuiuyuiyui', '2022-04-16 17:15:21', '2022-04-16 17:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_students`
--

CREATE TABLE `upgrade_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `from_grade` bigint(20) UNSIGNED NOT NULL,
  `from_class` bigint(20) UNSIGNED NOT NULL,
  `from_section` bigint(20) UNSIGNED NOT NULL,
  `to_grade` bigint(20) UNSIGNED NOT NULL,
  `to_class` bigint(20) UNSIGNED NOT NULL,
  `to_section` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upgrade_students`
--

INSERT INTO `upgrade_students` (`id`, `student_id`, `from_grade`, `from_class`, `from_section`, `to_grade`, `to_class`, `to_section`, `created_at`, `updated_at`, `academic_year`, `new_academic_year`, `deleted_at`) VALUES
(4, 28, 1, 15, 2, 9, 18, 6, '2022-05-04 00:29:10', '2022-05-04 00:55:58', '2022', '2023', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$m/t6/TMgcmbJcVLg7E6OQuy9pFZ2xEkdG93e4e6ATbCjj4rq.ZNYi', NULL, '2022-03-31 01:14:00', '2022-03-31 01:14:00'),
(2, 'hagar', 'hagar@gmail.com', NULL, '$2y$10$M4qKC8PHBJ1dxms/5zKzw.JKY5ojWRbB98ufOx7noo4UCZ0PA3cPK', NULL, '2022-03-31 03:50:52', '2022-03-31 03:50:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`),
  ADD KEY `attendances_grade_id_foreign` (`grade_id`),
  ADD KEY `attendances_class_id_foreign` (`class_id`),
  ADD KEY `attendances_section_id_foreign` (`section_id`),
  ADD KEY `attendances_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `bloods`
--
ALTER TABLE `bloods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_grade_id_foreign` (`grade_id`),
  ADD KEY `fees_class_id_foreign` (`class_id`);

--
-- Indexes for table `fee_invoices`
--
ALTER TABLE `fee_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_invoices_student_id_foreign` (`student_id`),
  ADD KEY `fee_invoices_grade_id_foreign` (`grade_id`),
  ADD KEY `fee_invoices_class_id_foreign` (`class_id`),
  ADD KEY `fee_invoices_fee_id_foreign` (`fee_id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funds_payment_id_foreign` (`payment_id`),
  ADD KEY `funds_student_refund_id_foreign` (`student_refund_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libraries_grade_id_foreign` (`grade_id`),
  ADD KEY `libraries_class_id_foreign` (`class_id`),
  ADD KEY `libraries_section_id_foreign` (`section_id`),
  ADD KEY `libraries_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_exams`
--
ALTER TABLE `online_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `online_exams_subject_id_foreign` (`subject_id`),
  ADD KEY `online_exams_grade_id_foreign` (`grade_id`),
  ADD KEY `online_exams_class_id_foreign` (`class_id`),
  ADD KEY `online_exams_section_id_foreign` (`section_id`),
  ADD KEY `online_exams_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `online_meetings`
--
ALTER TABLE `online_meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `online_meetings_grade_id_foreign` (`grade_id`),
  ADD KEY `online_meetings_class_id_foreign` (`class_id`),
  ADD KEY `online_meetings_section_id_foreign` (`section_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parents_email_unique` (`email`),
  ADD KEY `parents_father_nationality_id_foreign` (`father_nationality_id`),
  ADD KEY `parents_father_blood_id_foreign` (`father_blood_id`),
  ADD KEY `parents_father_religion_id_foreign` (`father_religion_id`),
  ADD KEY `parents_mother_nationality_id_foreign` (`mother_nationality_id`),
  ADD KEY `parents_mother_blood_id_foreign` (`mother_blood_id`),
  ADD KEY `parents_mother_religion_id_foreign` (`mother_religion_id`);

--
-- Indexes for table `parent_attachments`
--
ALTER TABLE `parent_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_attachments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_online_exam_id_foreign` (`online_exam_id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refunds_student_id_foreign` (`student_id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_student_id_foreign` (`student_id`),
  ADD KEY `scores_online_exam_id_foreign` (`online_exam_id`),
  ADD KEY `scores_question_id_foreign` (`question_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_class_id_foreign` (`class_id`),
  ADD KEY `sections_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `section_teacher`
--
ALTER TABLE `section_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_teacher_teacher_id_foreign` (`teacher_id`),
  ADD KEY `section_teacher_section_id_foreign` (`section_id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_parent_id_foreign` (`parent_id`),
  ADD KEY `students_nationality_id_foreign` (`nationality_id`),
  ADD KEY `students_blood_id_foreign` (`blood_id`),
  ADD KEY `students_gender_id_foreign` (`gender_id`),
  ADD KEY `students_grade_id_foreign` (`grade_id`),
  ADD KEY `students_class_id_foreign` (`class_id`),
  ADD KEY `students_section_id_foreign` (`section_id`);

--
-- Indexes for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_accounts_student_id_foreign` (`student_id`),
  ADD KEY `student_accounts_fee_invoice_id_foreign` (`fee_invoice_id`),
  ADD KEY `student_accounts_payment_id_foreign` (`payment_id`),
  ADD KEY `student_accounts_refund_id_foreign` (`refund_id`),
  ADD KEY `student_accounts_student_refund_id_foreign` (`student_refund_id`);

--
-- Indexes for table `student_refunds`
--
ALTER TABLE `student_refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_refunds_student_id_foreign` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_grade_id_foreign` (`grade_id`),
  ADD KEY `subjects_class_id_foreign` (`class_id`),
  ADD KEY `subjects_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD KEY `teachers_gender_id_foreign` (`gender_id`),
  ADD KEY `teachers_specialization_id_foreign` (`specialization_id`);

--
-- Indexes for table `upgrade_students`
--
ALTER TABLE `upgrade_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upgrade_students_student_id_foreign` (`student_id`),
  ADD KEY `upgrade_students_from_grade_foreign` (`from_grade`),
  ADD KEY `upgrade_students_from_class_foreign` (`from_class`),
  ADD KEY `upgrade_students_from_section_foreign` (`from_section`),
  ADD KEY `upgrade_students_to_grade_foreign` (`to_grade`),
  ADD KEY `upgrade_students_to_class_foreign` (`to_class`),
  ADD KEY `upgrade_students_to_section_foreign` (`to_section`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bloods`
--
ALTER TABLE `bloods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_invoices`
--
ALTER TABLE `fee_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `online_exams`
--
ALTER TABLE `online_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_meetings`
--
ALTER TABLE `online_meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `parent_attachments`
--
ALTER TABLE `parent_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section_teacher`
--
ALTER TABLE `section_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student_accounts`
--
ALTER TABLE `student_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_refunds`
--
ALTER TABLE `student_refunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upgrade_students`
--
ALTER TABLE `upgrade_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fees_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee_invoices`
--
ALTER TABLE `fee_invoices`
  ADD CONSTRAINT `fee_invoices_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_invoices_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_invoices_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_invoices_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `funds`
--
ALTER TABLE `funds`
  ADD CONSTRAINT `funds_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funds_student_refund_id_foreign` FOREIGN KEY (`student_refund_id`) REFERENCES `student_refunds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `libraries`
--
ALTER TABLE `libraries`
  ADD CONSTRAINT `libraries_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libraries_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libraries_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libraries_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `online_exams`
--
ALTER TABLE `online_exams`
  ADD CONSTRAINT `online_exams_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `online_exams_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `online_exams_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `online_exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `online_exams_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `online_meetings`
--
ALTER TABLE `online_meetings`
  ADD CONSTRAINT `online_meetings_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `online_meetings_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `online_meetings_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_father_blood_id_foreign` FOREIGN KEY (`father_blood_id`) REFERENCES `bloods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parents_father_nationality_id_foreign` FOREIGN KEY (`father_nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parents_father_religion_id_foreign` FOREIGN KEY (`father_religion_id`) REFERENCES `religions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parents_mother_blood_id_foreign` FOREIGN KEY (`mother_blood_id`) REFERENCES `bloods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parents_mother_nationality_id_foreign` FOREIGN KEY (`mother_nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parents_mother_religion_id_foreign` FOREIGN KEY (`mother_religion_id`) REFERENCES `religions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent_attachments`
--
ALTER TABLE `parent_attachments`
  ADD CONSTRAINT `parent_attachments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_online_exam_id_foreign` FOREIGN KEY (`online_exam_id`) REFERENCES `online_exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_online_exam_id_foreign` FOREIGN KEY (`online_exam_id`) REFERENCES `online_exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sections_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_teacher`
--
ALTER TABLE `section_teacher`
  ADD CONSTRAINT `section_teacher_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_blood_id_foreign` FOREIGN KEY (`blood_id`) REFERENCES `bloods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD CONSTRAINT `student_accounts_fee_invoice_id_foreign` FOREIGN KEY (`fee_invoice_id`) REFERENCES `fee_invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_accounts_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_accounts_refund_id_foreign` FOREIGN KEY (`refund_id`) REFERENCES `refunds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_accounts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_accounts_student_refund_id_foreign` FOREIGN KEY (`student_refund_id`) REFERENCES `student_refunds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_refunds`
--
ALTER TABLE `student_refunds`
  ADD CONSTRAINT `student_refunds_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_specialization_id_foreign` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upgrade_students`
--
ALTER TABLE `upgrade_students`
  ADD CONSTRAINT `upgrade_students_from_class_foreign` FOREIGN KEY (`from_class`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upgrade_students_from_grade_foreign` FOREIGN KEY (`from_grade`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upgrade_students_from_section_foreign` FOREIGN KEY (`from_section`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upgrade_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upgrade_students_to_class_foreign` FOREIGN KEY (`to_class`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upgrade_students_to_grade_foreign` FOREIGN KEY (`to_grade`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upgrade_students_to_section_foreign` FOREIGN KEY (`to_section`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
