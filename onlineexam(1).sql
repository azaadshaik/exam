-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 09:30 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
`class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_code` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `class_sections` (
`class_sections_id` int(10) unsigned NOT NULL,
  `class_sections_school_classes_id` int(11) NOT NULL,
  `class_sections_section_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`district_id` int(10) unsigned NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_state_id` int(11) NOT NULL,
  `district_status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `district_state_id`, `district_status`) VALUES
(1, 'Nellore', 2, 1),
(2, 'Kadapa', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
`exam_id` int(10) unsigned NOT NULL,
  `exam_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_datetime` datetime NOT NULL,
  `exam_duration` int(11) NOT NULL,
  `exam_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE IF NOT EXISTS `exam_answers` (
  `exam_answers_id` int(10) unsigned NOT NULL,
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

CREATE TABLE IF NOT EXISTS `exam_enrollment` (
`exam_enrollment_id` int(10) unsigned NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE IF NOT EXISTS `exam_results` (
`result_id` int(10) unsigned NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `total_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
`institution_id` int(11) NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `institution_code` varchar(255) NOT NULL,
  `institution_status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_code`, `institution_status`) VALUES
(1, 'Nalanda Group', 'NLG', 1),
(2, 'Narayana Group', 'NG', 1),
(3, 'Ratnam Group', 'RG', 1),
(4, 'Bhashyam Groups', 'BHS', 0),
(5, 'RBS Group', 'RBSG', 1),
(6, 'Masters Group Of Schools', 'MGS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE IF NOT EXISTS `question_answers` (
`answer_id` int(10) unsigned NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE IF NOT EXISTS `question_bank` (
`question_id` int(10) unsigned NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` int(11) NOT NULL,
  `avg_time` int(11) NOT NULL,
  `difficulty_level` int(11) NOT NULL,
  `question_type` enum('image','text') COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question_choices`
--

CREATE TABLE IF NOT EXISTS `question_choices` (
`choice_id` int(10) unsigned NOT NULL,
  `choice_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE IF NOT EXISTS `question_paper` (
`question_paper_id` int(10) unsigned NOT NULL,
  `question_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_paper_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`role_id` int(11) unsigned NOT NULL,
  `role_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

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

CREATE TABLE IF NOT EXISTS `schools` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `school_code`, `school_institution`, `school_state`, `school_district`, `school_address`, `school_principal`, `school_phone`, `school_status`) VALUES
(25, 'asfasdf', 'sadsadsad', 0, 0, 0, '', '', '', 1),
(26, 'Redfields', 'RFS', 6, 2, 1, 'Musunur , Kavali', 'Azaad', '7305544866', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE IF NOT EXISTS `school_classes` (
`school_classes_id` int(11) NOT NULL,
  `school_classes_class_id` int(11) DEFAULT NULL,
  `school_classes_school_id` int(11) NOT NULL,
  `school_classes_section_id` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`school_classes_id`, `school_classes_class_id`, `school_classes_school_id`, `school_classes_section_id`, `status`) VALUES
(51, 1, 26, 2, 1),
(52, 1, 26, 3, 1),
(53, 2, 26, 4, 1),
(54, 2, 26, 5, 1),
(55, 5, 26, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_code` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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

CREATE TABLE IF NOT EXISTS `states` (
`state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `state_status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `state_code`, `state_status`) VALUES
(2, 'Andhra Pradesh', 'AP', 1),
(3, 'Telangana', 'TS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_enrollment`
--

CREATE TABLE IF NOT EXISTS `student_enrollment` (
`enrollment_id` int(10) unsigned NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_parent`
--

CREATE TABLE IF NOT EXISTS `student_parent` (
`student_parent_id` int(10) unsigned NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`subject_id` int(10) unsigned NOT NULL,
  `subject_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_class_id` int(11) NOT NULL,
  `subject_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject_class`
--

CREATE TABLE IF NOT EXISTS `subject_class` (
`subject_class_id` int(10) unsigned NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE IF NOT EXISTS `subject_teacher` (
`subject_teacher_id` int(10) unsigned NOT NULL,
  `school_class_id` int(11) NOT NULL,
  `subject_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
`topic_id` int(10) unsigned NOT NULL,
  `topic_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_subject_class_id` int(11) NOT NULL,
  `topic_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_image` text NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_reg_date` date NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `user_firstname`, `user_lastname`, `user_address`, `user_image`, `user_role`, `user_reg_date`, `user_last_login`, `user_status`) VALUES
(4, 'admin', '$2y$10$srbIg0BC/7m8L/ePlmWBeurQghchb78XvxjTrBD0ej1zU1AOlNF7m', 'Azaad', 'Shaik', '', '', 1, '2018-07-17', '0000-00-00 00:00:00', 1),
(5, 'azaadshaik', '$2y$10$zZZFkotyfHDkuHe0Vg7xWu8VDZNuNLPJJOBVrMqSJm/6EjlJtPIZC', 'Azaad', 'Shaik', '', 'DSC_6372_-_Copy.JPG', 2, '2018-07-25', '0000-00-00 00:00:00', 1),
(6, 'sddsdsad', '$2y$10$Jaa0GacWR8JxBRBG5/ZQqOJA9s7eaSWri5bbw.fCNP77z63NGOjRe', '', '', '', '', 0, '2018-07-25', '0000-00-00 00:00:00', 1),
(7, 'sasas', '$2y$10$c7EZsFNkvN1JJflEeehk/eL0IM.XifO8u1GOQUawmFq8uhjAQn1d2', '', '', '', '', 0, '2018-07-25', '0000-00-00 00:00:00', 1),
(8, 'xzxzX', '$2y$10$E4bODVKTuY6TciNxORjeOejptPpGPWmnre4jZOnbOXk/900ugKhNG', '', '', '', '', 0, '2018-07-25', '0000-00-00 00:00:00', 1),
(9, 'asssasA', '$2y$10$hWrl4uavUHDHoueNO/.egObtDTCL5pVPJPfkgSITx9NfmFaeQYl8W', '', '', '', '', 0, '2018-07-25', '0000-00-00 00:00:00', 1),
(10, 'praveen', '$2y$10$k914VimHFlrjnRk03ZTGDePNlEfDkQ/OjBDem/zuH2tps2SeCaT92', '', '', '', 'DSC_6372_-_Copy.JPG', 3, '2018-08-01', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`class_id`), ADD UNIQUE KEY `class_name` (`class_name`), ADD UNIQUE KEY `class code` (`class_code`);

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
-- Indexes for table `exam`
--
ALTER TABLE `exam`
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
 ADD PRIMARY KEY (`institution_id`), ADD UNIQUE KEY `institution_name` (`institution_name`), ADD UNIQUE KEY `institution_code` (`institution_code`);

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
 ADD PRIMARY KEY (`school_id`), ADD UNIQUE KEY `school_code` (`school_code`);

--
-- Indexes for table `school_classes`
--
ALTER TABLE `school_classes`
 ADD PRIMARY KEY (`school_classes_id`), ADD KEY `school_classes_fk0` (`school_classes_class_id`), ADD KEY `school_classes_fk1` (`school_classes_school_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`section_id`), ADD UNIQUE KEY `section_name` (`section_name`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`state_id`), ADD UNIQUE KEY `state_name` (`state_name`), ADD UNIQUE KEY `state_code` (`state_code`);

--
-- Indexes for table `student_enrollment`
--
ALTER TABLE `student_enrollment`
 ADD PRIMARY KEY (`enrollment_id`);

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
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
MODIFY `class_sections_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `district_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
MODIFY `exam_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_enrollment`
--
ALTER TABLE `exam_enrollment`
MODIFY `exam_enrollment_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
MODIFY `result_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
MODIFY `institution_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
MODIFY `answer_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
MODIFY `question_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_choices`
--
ALTER TABLE `question_choices`
MODIFY `choice_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
MODIFY `question_paper_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `school_classes`
--
ALTER TABLE `school_classes`
MODIFY `school_classes_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_enrollment`
--
ALTER TABLE `student_enrollment`
MODIFY `enrollment_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_parent`
--
ALTER TABLE `student_parent`
MODIFY `student_parent_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `subject_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject_class`
--
ALTER TABLE `subject_class`
MODIFY `subject_class_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
MODIFY `subject_teacher_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `topic_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `school_classes`
--
ALTER TABLE `school_classes`
ADD CONSTRAINT `school_classes_fk0` FOREIGN KEY (`school_classes_class_id`) REFERENCES `classes` (`class_id`),
ADD CONSTRAINT `school_classes_fk1` FOREIGN KEY (`school_classes_school_id`) REFERENCES `schools` (`school_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
