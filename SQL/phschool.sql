-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 04:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_degrees`
--

CREATE TABLE `academic_degrees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_degrees`
--

INSERT INTO `academic_degrees` (`id`, `name`) VALUES
(4, 'Associate'),
(1, 'Bachelor'),
(3, 'Doctorate'),
(2, 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `degree_type_id` int(10) UNSIGNED NOT NULL,
  `course_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `degree_type_id`, `course_category_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 9, 6, 'Information Technology', '2019-07-05 07:34:11', '2019-07-05 07:34:11'),
(6, 5, 6, 'Information Technology', '2019-07-05 07:34:11', '2019-07-05 07:34:11'),
(7, 5, 19, 'Information Technology', '2019-07-16 07:06:21', '2019-07-16 07:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`) VALUES
(1, 'Accountancy'),
(16, 'Administration'),
(17, 'Agriculture'),
(2, 'Architecture'),
(18, 'Arts & Design'),
(3, 'Aviation'),
(4, 'Business'),
(5, 'Communications'),
(6, 'Computer Science'),
(8, 'Economics'),
(9, 'Education'),
(10, 'Engineering'),
(19, 'Humanities'),
(20, 'Language'),
(11, 'Law'),
(12, 'Maritime'),
(13, 'Medicine'),
(14, 'Music'),
(21, 'Professional & Technical'),
(15, 'Psychology'),
(22, 'Religion & Theology'),
(23, 'Science'),
(24, 'Social Science'),
(7, 'Tourism, Hospitality, & Culinary');

-- --------------------------------------------------------

--
-- Table structure for table `degree_types`
--

CREATE TABLE `degree_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `academic_degree_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbrev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree_types`
--

INSERT INTO `degree_types` (`id`, `academic_degree_id`, `name`, `abbrev`) VALUES
(1, 4, 'Associate of Arts', 'AA'),
(2, 4, 'Associate of Science', 'AS'),
(3, 4, 'Associate of Applied Science', 'ASS'),
(4, 1, 'Bachelor of Arts', 'BA'),
(5, 1, 'Bachelor of Science', 'BS'),
(6, 1, 'Bachelor of Fine Arts', 'BFA'),
(7, 1, 'Bachelor of Applied Science', 'BAS'),
(8, 2, 'Master of Arts', 'MA'),
(9, 2, 'Master of Science', 'MS'),
(10, 2, 'Master of Business Administration', 'MBA'),
(11, 2, 'Master of Fine Arts', 'MFA'),
(12, 3, 'Doctor of Medicine', 'PhD'),
(13, 3, 'Juris Doctor', 'JD'),
(14, 3, 'Doctor of Medicine', 'MD'),
(15, 3, 'Doctor of Dental Surgery', 'DDS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_degrees`
--
ALTER TABLE `academic_degrees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `degree_type_id` (`degree_type_id`),
  ADD KEY `course_category_id` (`course_category_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `degree_types`
--
ALTER TABLE `degree_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_degree_id` (`academic_degree_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_degrees`
--
ALTER TABLE `academic_degrees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `degree_types`
--
ALTER TABLE `degree_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`degree_type_id`) REFERENCES `degree_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `degree_types`
--
ALTER TABLE `degree_types`
  ADD CONSTRAINT `degree_types_ibfk_1` FOREIGN KEY (`academic_degree_id`) REFERENCES `academic_degrees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
