-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 04:56 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_code`) VALUES
(1, '7th CLASS', '7'),
(2, '8th CLASS', '8'),
(5, '9th CLASS', '9'),
(6, '10th CLASS', '10'),
(7, '11th CLASS', '11'),
(8, '12th CLASS', '12');

-- --------------------------------------------------------

--
-- Table structure for table `class_sections`
--

CREATE TABLE `class_sections` (
  `class_sections_id` int(10) UNSIGNED NOT NULL,
  `class_sections_school_classes_id` int(11) NOT NULL,
  `class_sections_section_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_state_id` int(11) NOT NULL,
  `district_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `district_state_id`, `district_status`) VALUES
(1, 'Nellore', 2, 1),
(2, 'Kadapa', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(10) UNSIGNED NOT NULL,
  `exam_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_datetime` datetime NOT NULL,
  `exam_duration` int(11) NOT NULL,
  `exam_marks` int(11) NOT NULL,
  `exam_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `exam_code`, `exam_datetime`, `exam_duration`, `exam_marks`, `exam_status`) VALUES
(4, 'teste123', '232323', '2018-08-26 02:00:00', 60, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exam_answers_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  `review_again` tinyint(1) NOT NULL,
  `is_answered` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `answered_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_enrollment`
--

CREATE TABLE `exam_enrollment` (
  `exam_enrollment_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `result_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `total_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `institution_id` int(11) NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `institution_code` varchar(255) NOT NULL,
  `institution_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_code`, `institution_status`) VALUES
(8, 'Master Group Of School ', 'MGS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `answer_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`answer_id`, `question_id`, `choice_id`) VALUES
(3, 4, 10),
(4, 5, 15),
(5, 6, 19),
(6, 7, 21),
(7, 8, 25);

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `question_id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` int(11) NOT NULL,
  `avg_time` int(11) NOT NULL,
  `difficulty_level` int(11) NOT NULL,
  `question_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`question_id`, `question`, `question_image`, `topic_id`, `avg_time`, `difficulty_level`, `question_status`) VALUES
(4, 'Identify the person in this picture ', 'DSC_6372_-_Copy.JPG', 3, 90, 3, 1),
(5, 'Grand Central Terminal, Park Avenue, New York is the world\'s', '', 2, 60, 2, 1),
(6, 'Entomology is the science that studies', '', 3, 30, 2, 1),
(7, 'Eritrea, which became the 182nd member of the UN in 1993, is in the continent of', '', 3, 90, 2, 1),
(8, 'Garampani sanctuary is located at', '', 3, 30, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_choices`
--

CREATE TABLE `question_choices` (
  `choice_id` int(10) UNSIGNED NOT NULL,
  `choice_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_choices`
--

INSERT INTO `question_choices` (`choice_id`, `choice_text`, `choice_image`, `question_id`) VALUES
(9, 'Mahatma Gandhi                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '', 4),
(10, 'Azaad                                                                                                ', '', 4),
(11, 'Jawaharlal Nehru                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '', 4),
(12, 'Subhash Chandra Bose                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '', 4),
(13, 'largest railway station', '', 5),
(14, 'highest railway station', '', 5),
(15, 'longest railway station', '', 5),
(16, 'None of the above\r\n', '', 5),
(17, 'Behavior of human beings', '', 6),
(18, 'Insects', '', 6),
(19, 'The formation of rocks', '', 6),
(20, 'Asia', '', 7),
(21, 'Africa', '', 7),
(22, 'Europe', '', 7),
(23, 'Junagarh, Gujarat', '', 8),
(24, 'Diphu, Assam\r\n', '', 8),
(25, 'Kohima, Nagaland', '', 8),
(26, 'Gangtok, Sikkim\r\n', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE `question_paper` (
  `question_paper_id` int(10) UNSIGNED NOT NULL,
  `question_paper_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_paper_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_paper_questions` blob NOT NULL,
  `question_paper_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`question_paper_id`, `question_paper_name`, `question_paper_code`, `exam_id`, `question_paper_questions`, `question_paper_status`) VALUES
(2, 'Question paper 1', 'QP1', 4, 0x613a333a7b693a303b733a313a2235223b693a313b733a313a2237223b693a323b733a313a2238223b7d, 0),
(3, 'Question paper 2', 'QP2', 4, 0x613a323a7b693a303b733a313a2237223b693a313b733a313a2235223b7d, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) UNSIGNED NOT NULL,
  `role_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_code`, `role_name`) VALUES
(1, 'admin', 'Administrator'),
(2, 'student', 'Student'),
(3, 'teacher', 'Teacher'),
(4, 'examiner', 'Examiner'),
(5, 'parent', 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_code` varchar(11) NOT NULL,
  `school_institution` int(11) NOT NULL,
  `school_state` int(11) NOT NULL,
  `school_district` int(11) NOT NULL,
  `school_address` text NOT NULL,
  `school_principal` varchar(255) NOT NULL,
  `school_phone` varchar(255) NOT NULL,
  `school_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `school_code`, `school_institution`, `school_state`, `school_district`, `school_address`, `school_principal`, `school_phone`, `school_status`) VALUES
(27, 'Redfields International School', 'RFS', 8, 2, 1, 'Musunur,Kavali', 'Chandra Sekhar', '7305544866', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE `school_classes` (
  `school_classes_id` int(11) NOT NULL,
  `school_classes_class_id` int(11) DEFAULT NULL,
  `school_classes_school_id` int(11) NOT NULL,
  `school_classes_section_id` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`school_classes_id`, `school_classes_class_id`, `school_classes_school_id`, `school_classes_section_id`, `status`) VALUES
(56, 1, 27, 1, 1),
(57, 1, 27, 2, 1),
(58, 2, 27, 1, 1),
(59, 2, 27, 2, 1),
(60, 2, 27, 3, 1),
(61, 5, 27, 1, 1),
(62, 5, 27, 2, 1),
(63, 5, 27, 3, 1),
(64, 5, 27, 4, 1),
(65, 6, 27, 1, 1),
(66, 6, 27, 2, 1),
(67, 6, 27, 3, 1),
(68, 6, 27, 4, 1),
(69, 6, 27, 5, 1),
(70, 1, 27, 4, 1),
(71, 1, 27, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `section_code`) VALUES
(1, 'SECTION - A', 'A'),
(2, 'SECTION - B', 'B'),
(3, 'SECTION - C', 'C'),
(4, 'SECTION - D', 'D'),
(5, 'SECTION - E', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `state_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `state_code`, `state_status`) VALUES
(2, 'Andhra Pradesh', 'AP', 1),
(3, 'Telangana', 'TS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_parent`
--

CREATE TABLE `student_parent` (
  `student_parent_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) UNSIGNED NOT NULL,
  `subject_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_class_id` int(11) NOT NULL,
  `subject_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_code`, `subject_class_id`, `subject_status`) VALUES
(8, 'Physics for 7th class', 'PS-7', 1, 1),
(9, '7th class GK', 'GK-7', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_class`
--

CREATE TABLE `subject_class` (
  `subject_class_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `subject_teacher_id` int(10) UNSIGNED NOT NULL,
  `school_class_id` int(11) NOT NULL,
  `subject_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(10) UNSIGNED NOT NULL,
  `topic_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_class_id` int(11) NOT NULL,
  `topic_subject_id` int(11) NOT NULL,
  `topic_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_code`, `topic_class_id`, `topic_subject_id`, `topic_status`) VALUES
(2, 'Motion And Time', 'MT', 1, 8, 1),
(3, 'Indian Polity', 'IP', 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_image` text NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_dob` date NOT NULL,
  `user_reg_date` date NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `user_firstname`, `user_lastname`, `user_address`, `user_image`, `user_role`, `user_dob`, `user_reg_date`, `user_last_login`, `user_status`) VALUES
(4, 'admin', '$2y$10$srbIg0BC/7m8L/ePlmWBeurQghchb78XvxjTrBD0ej1zU1AOlNF7m', 'Azaad', 'Shaik', '', '', 1, '0000-00-00', '2018-07-17', '0000-00-00 00:00:00', 1),
(10022, 'manojkumar', '$2y$10$nVYB8IgxlLC2zs3iqTr7xeDFbwuVP5DvwTAvhPmY638JBWrshR4T.', 'Manoj', 'Kumar', 'Janathapet , Kavali', 'profile-pic.png', 1, '0000-00-00', '2018-08-21', '0000-00-00 00:00:00', 1),
(10025, 'wasimshaik', '$2y$10$w7.23Ev26UiCizxsOMTIlukmW79.XXipQy9AKtoOSwYZnuM4QszFC', 'Wasim', 'Shaik', 'Janathapet kavali', 'profile-pic.png', 2, '0000-00-00', '2018-08-20', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_class`
--

CREATE TABLE `user_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `institution` int(11) NOT NULL,
  `school` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_class`
--

INSERT INTO `user_class` (`id`, `user`, `institution`, `school`, `class`, `section`) VALUES
(5, 10025, 8, 27, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_name` (`class_name`),
  ADD UNIQUE KEY `class code` (`class_code`);

--
-- Indexes for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD PRIMARY KEY (`class_sections_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exam_answers_id`);

--
-- Indexes for table `exam_enrollment`
--
ALTER TABLE `exam_enrollment`
  ADD PRIMARY KEY (`exam_enrollment_id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`institution_id`),
  ADD UNIQUE KEY `institution_name` (`institution_name`),
  ADD UNIQUE KEY `institution_code` (`institution_code`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_choices`
--
ALTER TABLE `question_choices`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`question_paper_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `school_code` (`school_code`);

--
-- Indexes for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD PRIMARY KEY (`school_classes_id`),
  ADD KEY `school_classes_fk0` (`school_classes_class_id`),
  ADD KEY `school_classes_fk1` (`school_classes_school_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`),
  ADD UNIQUE KEY `section_name` (`section_name`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`),
  ADD UNIQUE KEY `state_name` (`state_name`),
  ADD UNIQUE KEY `state_code` (`state_code`);

--
-- Indexes for table `student_parent`
--
ALTER TABLE `student_parent`
  ADD PRIMARY KEY (`student_parent_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_class`
--
ALTER TABLE `subject_class`
  ADD PRIMARY KEY (`subject_class_id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`subject_teacher_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `user_class`
--
ALTER TABLE `user_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
  MODIFY `class_sections_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_enrollment`
--
ALTER TABLE `exam_enrollment`
  MODIFY `exam_enrollment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `result_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `institution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `answer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `question_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question_choices`
--
ALTER TABLE `question_choices`
  MODIFY `choice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
  MODIFY `question_paper_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `school_classes`
--
ALTER TABLE `school_classes`
  MODIFY `school_classes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_parent`
--
ALTER TABLE `student_parent`
  MODIFY `student_parent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject_class`
--
ALTER TABLE `subject_class`
  MODIFY `subject_class_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `subject_teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10026;

--
-- AUTO_INCREMENT for table `user_class`
--
ALTER TABLE `user_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD CONSTRAINT `school_classes_fk0` FOREIGN KEY (`school_classes_class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `school_classes_fk1` FOREIGN KEY (`school_classes_school_id`) REFERENCES `schools` (`school_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
