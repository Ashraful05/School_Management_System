-- Adminer 4.8.1 MySQL 5.5.5-10.4.21-MariaDB-log dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `assign_students`;
CREATE TABLE `assign_students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1,	4,	NULL,	49,	6,	3,	2,	'2024-04-11 12:10:23',	'2024-05-01 13:30:36'),
(2,	5,	1,	50,	8,	2,	3,	'2024-04-11 12:17:06',	'2024-05-08 13:53:20'),
(3,	6,	NULL,	48,	8,	NULL,	3,	'2024-04-11 12:26:36',	'2024-04-11 12:26:36'),
(4,	7,	2,	50,	8,	1,	1,	'2024-04-12 11:49:53',	'2024-05-08 13:53:20'),
(7,	4,	NULL,	49,	6,	3,	2,	'2024-05-01 13:40:40',	'2024-05-01 13:40:40'),
(8,	4,	NULL,	50,	7,	3,	2,	'2024-05-01 13:41:30',	'2024-05-01 13:41:30'),
(9,	4,	3,	50,	8,	3,	2,	'2024-05-01 13:42:20',	'2024-05-08 13:53:20'),
(10,	8,	NULL,	48,	7,	1,	3,	'2024-05-01 13:54:00',	'2024-05-04 16:03:47'),
(13,	8,	NULL,	48,	7,	NULL,	3,	'2024-05-02 15:39:13',	'2024-05-02 15:39:13'),
(14,	8,	NULL,	49,	8,	NULL,	3,	'2024-05-02 15:39:44',	'2024-05-02 15:39:44');

DROP TABLE IF EXISTS `assign_student_subjects`;
CREATE TABLE `assign_student_subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `assign_student_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(11,	41,	1,	100,	30,	60,	'2024-04-05 13:42:38',	'2024-04-05 13:42:38'),
(12,	41,	2,	100,	30,	50,	'2024-04-05 13:42:38',	'2024-04-05 13:42:38'),
(13,	41,	3,	100,	30,	55,	'2024-04-05 13:42:38',	'2024-04-05 13:42:38'),
(14,	41,	4,	100,	30,	45,	'2024-04-05 13:42:38',	'2024-04-05 13:42:38'),
(15,	41,	6,	100,	30,	50,	'2024-04-05 13:42:38',	'2024-04-05 13:42:38'),
(22,	42,	1,	100,	35,	34,	'2024-04-05 13:46:27',	'2024-04-05 13:46:27'),
(23,	42,	2,	100,	35,	40,	'2024-04-05 13:46:27',	'2024-04-05 13:46:27'),
(24,	42,	3,	100,	35,	43,	'2024-04-05 13:46:27',	'2024-04-05 13:46:27'),
(25,	42,	4,	100,	35,	55,	'2024-04-05 13:46:27',	'2024-04-05 13:46:27'),
(26,	42,	6,	100,	35,	55,	'2024-04-05 13:46:27',	'2024-04-05 13:46:27');

DROP TABLE IF EXISTS `designations`;
CREATE TABLE `designations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designations_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Head Teacher',	NULL,	'2024-04-06 14:22:17'),
(2,	'Assistant Teacher',	NULL,	'2024-04-06 14:22:25'),
(3,	'Teacher',	NULL,	'2024-04-06 14:22:35');

DROP TABLE IF EXISTS `discount_students`;
CREATE TABLE `discount_students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	45,	'2024-04-11 12:10:23',	'2024-05-01 13:30:36'),
(2,	2,	1,	40,	'2024-04-11 12:17:06',	'2024-05-01 13:30:13'),
(3,	3,	1,	3,	'2024-04-11 12:26:36',	'2024-04-11 12:26:36'),
(4,	4,	1,	35,	'2024-04-12 11:49:53',	'2024-04-30 17:13:41'),
(5,	7,	1,	45,	'2024-05-01 13:40:40',	'2024-05-01 13:40:40'),
(6,	8,	1,	45,	'2024-05-01 13:41:30',	'2024-05-01 13:41:30'),
(7,	9,	1,	45,	'2024-05-01 13:42:20',	'2024-05-01 13:42:20'),
(8,	10,	1,	5,	'2024-05-01 13:54:00',	'2024-05-04 16:03:47');

DROP TABLE IF EXISTS `employee_salary_logs`;
CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_salary` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_salary`, `created_at`, `updated_at`) VALUES
(1,	9,	23000,	23000,	0,	'2020-03-25',	'2024-06-25 16:42:07',	'2024-06-25 16:42:07'),
(2,	10,	32000,	32000,	0,	'2019-06-26',	'2024-06-28 14:35:32',	'2024-06-28 14:35:32'),
(3,	11,	24000,	24000,	0,	'2018-10-30',	'2024-06-28 14:36:52',	'2024-06-28 14:36:52'),
(4,	9,	23000,	24000,	1000,	'2024-06-30',	'2024-06-30 16:15:40',	'2024-06-30 16:15:40'),
(5,	10,	32000,	32500,	500,	'2024-06-30',	'2024-06-30 16:16:25',	'2024-06-30 16:16:25'),
(6,	11,	24000,	24500,	500,	'2024-06-30',	'2024-06-30 16:16:36',	'2024-06-30 16:16:36');

DROP TABLE IF EXISTS `exam_types`;
CREATE TABLE `exam_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `exam_types_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'1st Terminal',	NULL,	NULL),
(2,	'2nd Terminal',	NULL,	NULL),
(3,	'3rd Terminal',	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `fee_category_amounts`;
CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(85,	1,	41,	500,	'2024-05-11 15:33:36',	'2024-05-11 15:33:36'),
(86,	1,	42,	550,	'2024-05-11 15:33:36',	'2024-05-11 15:33:36'),
(87,	1,	43,	600,	'2024-05-11 15:33:36',	'2024-05-11 15:33:36'),
(88,	1,	44,	650,	'2024-05-11 15:33:36',	'2024-05-11 15:33:36'),
(89,	1,	45,	700,	'2024-05-11 15:33:36',	'2024-05-11 15:33:36'),
(90,	1,	50,	1200,	'2024-05-11 15:33:36',	'2024-05-11 15:33:36'),
(91,	2,	41,	300,	'2024-06-18 14:37:54',	'2024-06-18 14:37:54'),
(92,	2,	42,	400,	'2024-06-18 14:37:54',	'2024-06-18 14:37:54'),
(93,	2,	43,	500,	'2024-06-18 14:37:55',	'2024-06-18 14:37:55'),
(94,	2,	44,	550,	'2024-06-18 14:37:55',	'2024-06-18 14:37:55'),
(95,	2,	45,	600,	'2024-06-18 14:37:55',	'2024-06-18 14:37:55'),
(96,	2,	50,	1500,	'2024-06-18 14:37:55',	'2024-06-18 14:37:55'),
(97,	3,	41,	100,	'2024-06-19 13:03:22',	'2024-06-19 13:03:22'),
(98,	3,	42,	200,	'2024-06-19 13:03:22',	'2024-06-19 13:03:22'),
(99,	3,	43,	300,	'2024-06-19 13:03:22',	'2024-06-19 13:03:22'),
(100,	3,	44,	400,	'2024-06-19 13:03:22',	'2024-06-19 13:03:22'),
(101,	3,	45,	500,	'2024-06-19 13:03:22',	'2024-06-19 13:03:22'),
(102,	3,	50,	1000,	'2024-06-19 13:03:22',	'2024-06-19 13:03:22');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2024_01_01_101544_create_sessions_table',	1),
(9,	'2024_03_07_125333_create_student_classes_table',	3),
(10,	'2024_03_14_132809_create_student_years_table',	4),
(11,	'2024_03_16_134150_create_student_groups_table',	5),
(12,	'2024_03_17_120616_create_student_shifts_table',	6),
(13,	'2024_03_19_140019_create_student_fee_categories_table',	7),
(14,	'2024_03_20_140810_create_fee_category_amounts_table',	8),
(15,	'2024_03_28_135345_create_exam_types_table',	9),
(16,	'2024_03_29_050759_create_school_subjects_table',	10),
(17,	'2024_03_29_120645_create_assign_student_subjects_table',	11),
(18,	'2024_04_06_135102_create_designations_table',	12),
(19,	'2014_10_12_000000_create_users_table',	13),
(20,	'2024_04_06_170601_create_assign_students_table',	14),
(21,	'2024_04_06_170623_create_discount_students_table',	14),
(22,	'2024_06_20_161946_create_employee_salary_logs_table',	15);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `school_subjects`;
CREATE TABLE `school_subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_subjects_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Health',	NULL,	NULL),
(2,	'English',	NULL,	NULL),
(3,	'Bangla',	NULL,	NULL),
(4,	'Math',	NULL,	NULL),
(5,	'Science',	NULL,	NULL),
(6,	'General Knowledge',	NULL,	NULL),
(7,	'Physics',	NULL,	NULL),
(8,	'Chemistry',	NULL,	NULL),
(9,	'History',	NULL,	NULL),
(10,	'Agriculture',	NULL,	NULL),
(11,	'Commerce',	NULL,	NULL),
(12,	'Arts',	NULL,	'2024-03-29 05:33:44'),
(13,	'Geography',	NULL,	NULL);

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Rbvpve35AVp4orYjlCYnumdXnrbAKbSI1hnp5Kat',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMzI3U1B0cmt1NXdiR0t6enFLa2lkSkJmeFBURzFJQmhwMDhERmpxaCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZW1wbG95ZWVTYWxhcnkvZGV0YWlscy8xMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',	1720271251),
('XBfQQmBXeHAQyjdrS0qoQMR3Oqj59EkEU9xf1F5e',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjhySlFMdklsc3F1czZYUXlVZzJ1UzczcTNCNjVQWjE4NFJWTlZTYSI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO319',	1719764680);

DROP TABLE IF EXISTS `student_classes`;
CREATE TABLE `student_classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_classes_phone_no_unique` (`phone_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `student_classes` (`id`, `name`, `phone_no`, `created_at`, `updated_at`) VALUES
(41,	'Class One',	NULL,	NULL,	NULL),
(42,	'Class Two',	NULL,	NULL,	NULL),
(43,	'Class Three',	NULL,	NULL,	NULL),
(44,	'Class Four',	NULL,	NULL,	NULL),
(45,	'Class Five',	NULL,	NULL,	NULL),
(46,	'Class Six',	NULL,	NULL,	NULL),
(47,	'Class Seven',	NULL,	NULL,	NULL),
(48,	'Class Eight',	NULL,	NULL,	NULL),
(49,	'Class Nine',	NULL,	NULL,	NULL),
(50,	'Class Ten',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `student_fee_categories`;
CREATE TABLE `student_fee_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fee_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_fee_categories_fee_category_name_unique` (`fee_category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `student_fee_categories` (`id`, `fee_category_name`, `created_at`, `updated_at`) VALUES
(1,	'Registration Fee',	NULL,	NULL),
(2,	'Monthly Fee',	NULL,	'2024-03-19 16:01:50'),
(3,	'Exam Fee',	NULL,	NULL);

DROP TABLE IF EXISTS `student_groups`;
CREATE TABLE `student_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_groups_group_name_unique` (`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `student_groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1,	'Science',	NULL,	NULL),
(2,	'Commerce',	NULL,	'2024-03-16 14:12:58'),
(3,	'Arts',	NULL,	NULL);

DROP TABLE IF EXISTS `student_shifts`;
CREATE TABLE `student_shifts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_shifts_shift_name_unique` (`shift_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `student_shifts` (`id`, `shift_name`, `created_at`, `updated_at`) VALUES
(1,	'Shift A',	NULL,	NULL),
(2,	'Shift B',	NULL,	NULL),
(3,	'Shift C',	NULL,	'2024-03-17 13:17:39');

DROP TABLE IF EXISTS `student_years`;
CREATE TABLE `student_years` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_years_year_name_unique` (`year_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `student_years` (`id`, `year_name`, `created_at`, `updated_at`) VALUES
(3,	'2019',	NULL,	'2024-03-14 17:16:30'),
(4,	'2020',	NULL,	NULL),
(5,	'2021',	NULL,	NULL),
(6,	'2022',	NULL,	NULL),
(7,	'2023',	NULL,	NULL),
(8,	'2024',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Student,Employee,Teacher,Admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software,operator=computer operator,user=employee',
  `joining_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `mothers_name`, `fathers_name`, `religion`, `image`, `id_number`, `date_of_birth`, `code`, `role`, `joining_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'Ashraf',	'ashraf@gmail.com',	NULL,	'$2y$10$WSal.R798xabGnvHmEZAp.rUf2brNeOtzRiyF5pRZNWQlR7fs4fgu',	'01335345345343',	'dhaka',	'male',	NULL,	NULL,	NULL,	'2024_03_011532.png',	NULL,	NULL,	NULL,	'admin',	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	'2024-04-06 16:37:21',	'2024-04-06 16:44:23'),
(2,	'Admin',	'juwel',	'juwel@gmail.com',	NULL,	'$2y$10$bui4PhWSRDbErK/GRLQj.einYvLAYLjNZyuyb1yTfPUgnABINsN6S',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'897',	'operator',	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	'2024-04-07 14:14:16',	'2024-04-07 14:14:16'),
(4,	'student',	'ipl',	NULL,	NULL,	'$2y$10$.JH4n6PTEAL0W421J.gJ8ugoiBTjfIogQnCXcrKi7rJ7p.w1TzHTq',	'01637425118',	'dhaka\r\ndhaka',	'female',	'Rasa',	'Sumit',	'islam',	'2024_04_301712.jpg',	'0001',	'2008-07-31',	'5479',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	'2024-04-11 12:10:23',	'2024-04-30 17:12:41'),
(5,	'student',	'Rafeeda',	NULL,	NULL,	'$2y$10$1BRryA0nCJjiJVSRglPeGeLoraKf5i/8dolOJR/rd8zZmMaiKbNp2',	'01934345341',	'jhaldhaka',	'female',	'Rabua',	'Samsul',	'islam',	'2024_04_301653.jpg',	'0005',	'2011-10-25',	'3556',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	'2024-04-11 12:17:06',	'2024-04-30 16:53:27'),
(6,	'student',	'Sumon',	NULL,	NULL,	'$2y$10$cQP8Lpb8PRxwPfQwNXEBOeDNETJVcGwWUpKkh5hVnc/8KhBILMhPW',	'01343476767',	'dinajpur',	'male',	'rani',	'Modon',	'islam',	'2024_04_111226.jpg',	'20240006',	'2011-10-25',	'3678',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	'2024-04-11 12:26:36',	'2024-04-11 12:26:36'),
(7,	'student',	'sakibba',	NULL,	NULL,	'$2y$10$48vSa0.aED6.Mxu119wmY.PLBM7XEh1sZzi773As9YdrRkm9Tktz.',	'463485745',	'rangpur',	'male',	'rahela',	'rumi',	'christian',	'2024_04_121149.jpg',	'20240007',	'2006-11-30',	'5931',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	'2024-04-12 11:49:53',	'2024-04-30 16:49:32'),
(8,	'student',	'sabita',	NULL,	NULL,	'$2y$10$Vd/dy3cwvi81VzdboOYDLOt4LfVc2NEyEMK0jcPRtLzin1nDXyrUm',	'892343242',	'kisorganj',	'female',	'mukarji',	'pronob',	'hindu',	'2024_05_011353.png',	'20230008',	'2008-10-28',	'6742',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	'2024-05-01 13:54:00',	'2024-05-01 13:54:00'),
(9,	'employee',	'Zaved',	NULL,	NULL,	'$2y$10$oq.SwJKaItdIN0k27sWwVu2cPRA3MhSGNvaacBCsVgmBbhp6hRnBy',	'01282342342',	'Delapheer Hat',	'male',	'Tahera',	'Safiq',	'islam',	'2024_06_281434.png',	'2020030001',	NULL,	'4504',	NULL,	'1970-01-01',	3,	24000,	1,	NULL,	NULL,	NULL,	'2024-06-25 16:42:07',	'2024-06-30 16:15:40'),
(10,	'employee',	'Sumon',	NULL,	NULL,	'$2y$10$2/DFusY/ubWVhyv0gEv1SO7CfouDluE345ECjgG8D7KWv.GPP0rdK',	'014342432322',	'cumilla',	'male',	'rasu',	'biplob',	'islam',	'2024_06_281435.jfif',	'2019060010',	NULL,	'1375',	NULL,	'2019-06-26',	2,	32500,	1,	NULL,	NULL,	NULL,	'2024-06-28 14:35:32',	'2024-06-30 16:16:25'),
(11,	'employee',	'rafid',	NULL,	NULL,	'$2y$10$GlhO7TpgcxLt7LENN3dPFOKAeyLRmtCnP0eba4ehmmAHGaxU6wl6u',	'01229803343',	'thakurgoan',	'male',	'rumona',	'rasad',	'islam',	'2024_06_281436.jfif',	'2018100011',	NULL,	'5112',	NULL,	'2018-10-30',	3,	24500,	1,	NULL,	NULL,	NULL,	'2024-06-28 14:36:52',	'2024-06-30 16:16:36');

-- 2024-07-06 13:11:14
