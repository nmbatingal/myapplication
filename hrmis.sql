-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2019 at 06:21 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.1.26-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
`id` int(10) unsigned NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `lastname`, `firstname`, `middlename`, `contact`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Comaling', 'Rey Jean', 'Patricio', '+63 (912) 345-6789', 'inside applicant', 0, '2017-12-19 10:42:54', '2017-12-19 10:42:54'),
(2, 'Tumalaytay', 'Jenifer', 'T', '+63 (912) 345-6789', NULL, 1, '2017-12-19 10:43:48', '2017-12-19 11:31:17'),
(3, 'Duque', 'Dushmeryll Jane', 'C', '+63 (912) 345-6789', NULL, 1, '2017-12-19 10:46:14', '2017-12-19 11:31:17'),
(4, 'Curay', 'Lucky Mhe', 'X', '+63 (912) 345-6789', 'inside applicant', 1, '2017-12-19 10:47:42', '2017-12-19 11:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `app_educations`
--

CREATE TABLE IF NOT EXISTS `app_educations` (
`id` int(10) unsigned NOT NULL,
  `program` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` date DEFAULT NULL,
  `applicant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_educations`
--

INSERT INTO `app_educations` (`id`, `program`, `school`, `year`, `applicant_id`, `created_at`, `updated_at`) VALUES
(2, 'Bachelor of Science in Information Technology', 'Caraga State University', '2016-04-12', 1, '2017-12-19 10:42:54', '2017-12-19 10:42:54'),
(3, 'Bachelor of Science in Information Technology', 'Caraga State University', '2016-04-12', 2, '2017-12-19 10:43:48', '2017-12-19 10:43:48'),
(4, 'Bachelor of Science Business Administration - Major in Entrepreneurial Marketing', 'Mindanao State University - Iligan Institute of Technology', '2017-12-09', 3, '2017-12-19 10:46:15', '2017-12-19 10:46:15'),
(5, 'Bachelor of Science in Accounting Technology', 'Father Saturnino Urios University', '2017-12-09', 4, '2017-12-19 10:47:42', '2017-12-19 10:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `app_eligibilities`
--

CREATE TABLE IF NOT EXISTS `app_eligibilities` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(5,2) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `license_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_eligibilities`
--

INSERT INTO `app_eligibilities` (`id`, `title`, `rating`, `exam_date`, `license_no`, `applicant_id`, `created_at`, `updated_at`) VALUES
(2, 'CSC', NULL, NULL, NULL, 1, '2017-12-19 10:42:54', '2017-12-19 10:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `app_experiences`
--

CREATE TABLE IF NOT EXISTS `app_experiences` (
`id` int(10) unsigned NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(12,2) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `applicant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_selections`
--

CREATE TABLE IF NOT EXISTS `app_selections` (
`id` int(10) unsigned NOT NULL,
  `date_interview` date DEFAULT NULL,
  `position_id` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_selections`
--

INSERT INTO `app_selections` (`id`, `date_interview`, `position_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2018-02-12', 4, 0, '2017-12-19 11:31:17', '2017-12-19 11:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `app_selection_groups`
--

CREATE TABLE IF NOT EXISTS `app_selection_groups` (
`id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `applicant_id` int(10) unsigned NOT NULL,
  `remark` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_selection_groups`
--

INSERT INTO `app_selection_groups` (`id`, `group_id`, `applicant_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, '2017-12-19 11:31:17', '2017-12-19 11:31:17'),
(2, 1, 3, NULL, '2017-12-19 11:31:17', '2017-12-19 11:31:17'),
(3, 1, 2, NULL, '2017-12-19 11:31:17', '2017-12-19 11:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `app_trainings`
--

CREATE TABLE IF NOT EXISTS `app_trainings` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conducted_by` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `applicant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_attachments`
--

CREATE TABLE IF NOT EXISTS `file_attachments` (
`id` int(10) unsigned NOT NULL,
  `filename` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(10) unsigned NOT NULL,
  `tab_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_attachments`
--

INSERT INTO `file_attachments` (`id`, `filename`, `path`, `applicant_id`, `tab_name`, `created_at`, `updated_at`) VALUES
(2, 'FOI  pdf.pdf', 'upload/attachment/applicant_1', 1, 'applicant', '2017-12-19 10:42:54', '2017-12-19 10:42:54'),
(3, 'uacs_manual1.pdf', 'upload/attachment/applicant_2', 2, 'applicant', '2017-12-19 10:43:48', '2017-12-19 10:43:48'),
(4, 'uacs_manual1.pdf', 'upload/attachment/applicant_3', 3, 'applicant', '2017-12-19 10:46:15', '2017-12-19 10:46:15'),
(5, 'rectification_form.pdf', 'upload/attachment/applicant_4', 4, 'applicant', '2017-12-19 10:47:42', '2017-12-19 10:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_22_070311_alter_user_table', 1),
(4, '2017_09_26_102901_create_applicants_table', 1),
(6, '2017_10_05_015746_create_app_trainings_table', 1),
(7, '2017_10_06_030512_create_app_experiences_table', 1),
(8, '2017_10_06_063419_create_app_eligibilities_table', 1),
(9, '2017_10_09_064706_create_app_file_attachments_table', 1),
(10, '2017_10_10_154637_create_pos_positions_table', 1),
(13, '2017_11_15_145811_create_pos_publications_table', 1),
(14, '2017_11_15_145834_create_pos_items_table', 1),
(15, '2017_11_15_145846_create_pos_qualifications_table', 1),
(17, '2017_10_05_013939_create_app_educations_table', 2),
(18, '2017_10_11_083657_create_applicant_selections_table', 3),
(19, '2017_10_11_084423_create_app_selection_groups_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_items`
--

CREATE TABLE IF NOT EXISTS `pos_items` (
`id` int(10) unsigned NOT NULL,
  `item_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_items`
--

INSERT INTO `pos_items` (`id`, `item_no`, `pos_id`) VALUES
(1, 'OSEC-DOSTB-SRAS2-1-2015,OSEC-DOSTB-SRAS2-3-2015,OSEC-DOSTB-SRAS2-5-2015,OSEC-DOSTB-SRAS2-117-1998,OSEC-DOSTB-SRAS2-2-2015,OSEC-DOSTB-SRAS2-4-2015,OSEC-DOSTB-SRAS2-6-2015', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pos_positions`
--

CREATE TABLE IF NOT EXISTS `pos_positions` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sal_grade` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_positions`
--

INSERT INTO `pos_positions` (`id`, `title`, `acronym`, `sal_grade`, `created_at`, `updated_at`) VALUES
(4, 'Science Research Specialist II', 'SRS II', '16', '2017-12-19 10:20:20', '2017-12-19 10:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `pos_publications`
--

CREATE TABLE IF NOT EXISTS `pos_publications` (
`id` int(10) unsigned NOT NULL,
  `publication_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_publications`
--

INSERT INTO `pos_publications` (`id`, `publication_no`, `pos_id`) VALUES
(1, 'ADN-2015-10-15-000318,ADN-2015-10-23-000331', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pos_qualifications`
--

CREATE TABLE IF NOT EXISTS `pos_qualifications` (
`id` int(10) unsigned NOT NULL,
  `education` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `trainings` text COLLATE utf8mb4_unicode_ci,
  `eligibilities` text COLLATE utf8mb4_unicode_ci,
  `pos_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_qualifications`
--

INSERT INTO `pos_qualifications` (`id`, `education`, `experience`, `trainings`, `eligibilities`, `pos_id`) VALUES
(1, 'Bachelor''s Degree Relevant to the Job', '2 years of responsible experience in applied science, technological research and development forecasting services and other related work', '24 hours of relevant training', 'Career Professional and other eligibility for second level position', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_level` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `__is` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `firstname`, `middlename`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `user_level`, `status`, `__is`) VALUES
(1, 'admin', 'account', 'admin', NULL, 'dostcaraga@gmail.com', '$2y$10$8NWMgUqO1.e0RJ5lDhiRhO4KZDlzGh8vDUDRtIisjKTsnXd6aoDUS', '5NhVcxIpfWodHw1SaNqobWXwt3JBg1tdapX5U8YMLDpD04LpwoxkHF66uly4', '2017-12-19 10:03:04', '2017-12-19 10:03:04', 5, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_educations`
--
ALTER TABLE `app_educations`
 ADD PRIMARY KEY (`id`), ADD KEY `app_educations_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `app_eligibilities`
--
ALTER TABLE `app_eligibilities`
 ADD PRIMARY KEY (`id`), ADD KEY `app_eligibilities_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `app_experiences`
--
ALTER TABLE `app_experiences`
 ADD PRIMARY KEY (`id`), ADD KEY `app_experiences_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `app_selections`
--
ALTER TABLE `app_selections`
 ADD PRIMARY KEY (`id`), ADD KEY `app_selections_position_id_foreign` (`position_id`);

--
-- Indexes for table `app_selection_groups`
--
ALTER TABLE `app_selection_groups`
 ADD PRIMARY KEY (`id`), ADD KEY `app_selection_groups_group_id_foreign` (`group_id`), ADD KEY `app_selection_groups_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `app_trainings`
--
ALTER TABLE `app_trainings`
 ADD PRIMARY KEY (`id`), ADD KEY `app_trainings_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `file_attachments`
--
ALTER TABLE `file_attachments`
 ADD PRIMARY KEY (`id`), ADD KEY `file_attachments_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pos_items`
--
ALTER TABLE `pos_items`
 ADD PRIMARY KEY (`id`), ADD KEY `pos_items_pos_id_foreign` (`pos_id`);

--
-- Indexes for table `pos_positions`
--
ALTER TABLE `pos_positions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_publications`
--
ALTER TABLE `pos_publications`
 ADD PRIMARY KEY (`id`), ADD KEY `pos_publications_pos_id_foreign` (`pos_id`);

--
-- Indexes for table `pos_qualifications`
--
ALTER TABLE `pos_qualifications`
 ADD PRIMARY KEY (`id`), ADD KEY `pos_qualifications_pos_id_foreign` (`pos_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `app_educations`
--
ALTER TABLE `app_educations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `app_eligibilities`
--
ALTER TABLE `app_eligibilities`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `app_experiences`
--
ALTER TABLE `app_experiences`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_selections`
--
ALTER TABLE `app_selections`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app_selection_groups`
--
ALTER TABLE `app_selection_groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_trainings`
--
ALTER TABLE `app_trainings`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_attachments`
--
ALTER TABLE `file_attachments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pos_items`
--
ALTER TABLE `pos_items`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pos_positions`
--
ALTER TABLE `pos_positions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pos_publications`
--
ALTER TABLE `pos_publications`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pos_qualifications`
--
ALTER TABLE `pos_qualifications`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_educations`
--
ALTER TABLE `app_educations`
ADD CONSTRAINT `app_educations_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_eligibilities`
--
ALTER TABLE `app_eligibilities`
ADD CONSTRAINT `app_eligibilities_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_experiences`
--
ALTER TABLE `app_experiences`
ADD CONSTRAINT `app_experiences_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_selections`
--
ALTER TABLE `app_selections`
ADD CONSTRAINT `app_selections_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `pos_positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_selection_groups`
--
ALTER TABLE `app_selection_groups`
ADD CONSTRAINT `app_selection_groups_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `app_selection_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `app_selections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_trainings`
--
ALTER TABLE `app_trainings`
ADD CONSTRAINT `app_trainings_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `file_attachments`
--
ALTER TABLE `file_attachments`
ADD CONSTRAINT `file_attachments_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pos_items`
--
ALTER TABLE `pos_items`
ADD CONSTRAINT `pos_items_pos_id_foreign` FOREIGN KEY (`pos_id`) REFERENCES `pos_positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pos_publications`
--
ALTER TABLE `pos_publications`
ADD CONSTRAINT `pos_publications_pos_id_foreign` FOREIGN KEY (`pos_id`) REFERENCES `pos_positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pos_qualifications`
--
ALTER TABLE `pos_qualifications`
ADD CONSTRAINT `pos_qualifications_pos_id_foreign` FOREIGN KEY (`pos_id`) REFERENCES `pos_positions` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
