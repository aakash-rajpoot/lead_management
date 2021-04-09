-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 02:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `square`
--

-- --------------------------------------------------------

--
-- Table structure for table `sq_admin`
--

CREATE TABLE `sq_admin` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(150) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `profile_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_admin`
--

INSERT INTO `sq_admin` (`id`, `role_id`, `username`, `email`, `password`, `fname`, `lname`, `mobile`, `dob`, `gender`, `address`, `profile_image`) VALUES
(1, 1, 'Admin', 'admin@square.com', '0e7517141fb53f21ee439b355b5a1d0a', 'Aakash', 'shishodia', 9643293050, '0000-00-00', 'Male', 'A215, Beta-1, Greater Noida, Gauta, UP', 'kritak_logo2.png');

-- --------------------------------------------------------

--
-- Table structure for table `sq_chat`
--

CREATE TABLE `sq_chat` (
  `id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_chat`
--

INSERT INTO `sq_chat` (`id`, `user_to`, `user_from`, `message`, `type`, `date_time`) VALUES
(1, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor.', 0, '2021-02-06 06:55:22'),
(2, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.', 0, '2021-02-06 06:55:59'),
(3, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.', 1, '2021-02-06 06:56:07'),
(4, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.', 0, '2021-02-06 06:56:15'),
(5, 15, 1, 'hii', 0, '2021-02-07 07:42:23'),
(6, 15, 1, 'hii', 0, '2021-02-07 07:42:43'),
(7, 15, 1, 'trtrret', 0, '2021-02-07 07:53:57'),
(8, 15, 1, 'dfgdgfdgfd', 0, '2021-02-07 07:55:17'),
(9, 21, 26, 'I want to know how accessibility done with your system, as one of our client\'s website required ADA and other compliances should be completed. ', 0, '2021-03-21 16:38:05'),
(10, 4, 1, 'I want to know how accessibility done with your system, as one of our client\'s website required ADA and other compliances should be completed. ', 0, '2021-03-26 14:25:55'),
(11, 4, 1, 'I want to know how accessibility done with your system, as one of our client\'s website required ADA and other compliances should be completed. ', 0, '2021-03-26 14:26:00'),
(12, 2, 1, 'I want to know how accessibility done with your system, as one of our client\'s website required ADA and other compliances should be completed. ', 0, '2021-04-02 12:47:41'),
(13, 2, 1, 'New message from admin to sanjeev', 0, '2021-04-07 18:28:42'),
(14, 2, 2, 'This is direct message from Sanjeev (Sales User ) to admin', 0, '2021-04-07 18:30:26'),
(15, 2, 1, 'This is direct message from Sanjeev (Sales User ) to admin', 0, '2021-04-07 18:31:03'),
(16, 2, 1, 'I want to know how accessibility done with your system, as one of our client\'s website required ADA and other compliances should be completed. ', 0, '2021-04-07 18:32:06'),
(17, 1, 2, 'I want to know how accessibility done with your system, as one of our client\'s website required ADA and other compliances should be completed. ', 0, '2021-04-08 19:07:03'),
(18, 1, 2, 'New message from sanjeev to admin chat', 0, '2021-04-08 19:08:03'),
(19, 1, 2, 'this is another one', 0, '2021-04-08 19:22:21'),
(20, 3, 2, 'this is sanjeev to omkar', 0, '2021-04-08 19:57:12'),
(21, 2, 1, 'back to sanjeev from admin', 0, '2021-04-08 20:00:08'),
(22, 2, 3, 'this is another one', 0, '2021-04-08 20:52:46'),
(23, 2, 3, 'New message from admin to sanjeev', 0, '2021-04-08 20:53:20'),
(24, 3, 2, 'Hello', 0, '2021-04-08 20:56:13'),
(25, 2, 3, 'Hi how are you?', 0, '2021-04-08 20:56:24'),
(26, 2, 3, 'New message from sanjeev to admin chat', 0, '2021-04-08 20:56:48'),
(27, 3, 2, 'Hello cxvdfds fdsf ', 0, '2021-04-08 20:56:59'),
(28, 3, 2, 'dsf dsf dfsd f fgf', 0, '2021-04-08 20:57:06'),
(29, 3, 2, 'dsf dsf dfsd f fgf', 0, '2021-04-08 20:59:07'),
(30, 3, 2, 'dsf dsf dfsd f fgf', 0, '2021-04-08 20:59:43'),
(31, 3, 2, 'dsf dsf dfsd f fgf', 0, '2021-04-08 21:00:04'),
(32, 2, 3, 'sdsadsadsad d d', 0, '2021-04-08 21:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `sq_lead`
--

CREATE TABLE `sq_lead` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `assign_date` date DEFAULT NULL,
  `email` varchar(500) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `alt_phone` bigint(20) NOT NULL,
  `property_address` text NOT NULL,
  `client_address` text NOT NULL,
  `available_unit` varchar(1000) NOT NULL,
  `remark` text NOT NULL,
  `reference` text NOT NULL,
  `lead_date` date NOT NULL,
  `followup_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1:New Lead; 2:Today''s Followup; 3:Followup attemp; 4:Future Followup; 5:Transfer Followup; 6:Success Followup; 7:Followup Closed',
  `transferred_date` date NOT NULL,
  `status_remark` varchar(500) NOT NULL,
  `attempted` int(11) NOT NULL DEFAULT 0,
  `status_date` date DEFAULT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL COMMENT '0:Deleted; 2:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_lead`
--

INSERT INTO `sq_lead` (`id`, `name`, `assign_to`, `created_by`, `user_type`, `assign_date`, `email`, `phone`, `alt_phone`, `property_address`, `client_address`, `available_unit`, `remark`, `reference`, `lead_date`, `followup_date`, `status`, `transferred_date`, `status_remark`, `attempted`, `status_date`, `last_update`, `active`) VALUES
(1, 'Sanjeev', 2, 1, 1, '2021-04-08', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'Wegacity', 'Wegacity', '1', 'just a comment', 'Wegacity', '2021-04-07', '2021-04-08', 5, '2021-04-08', 'Lead Transfer', 1, NULL, '2021-04-09 13:30:00', 1),
(2, 'online leads', 2, 1, 1, '2021-04-07', 'sanjeev@test.com', 9978104229, 0, 'Online leads', 'Demo Address2', '1,2', 'Lead Booked message', 'online', '2021-04-07', '2021-07-04', 6, '2021-04-07', '', 2, NULL, '2021-04-07 18:19:58', 1),
(3, 'Sanjeev', 4, 1, 1, '2021-04-08', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'New leads from Sanjeev', 'Wegacity', '2', 'New leads from Sanjeev', '', '2021-04-08', '2021-04-08', 5, '2021-04-08', '', 0, NULL, '2021-04-08 14:47:47', 1),
(4, 'Sarthak', 2, 1, 1, '2021-04-08', 'sarthak@gmail.com', 8989898989, 0, 'Sarthak Shara', 'Street 1, MG road', '2', 'New lead from admin', 'Admin Leads', '2021-04-08', '0000-00-00', 1, '0000-00-00', '', 0, NULL, '2021-04-08 19:51:52', 1),
(5, 'Sarthak', 2, 1, 1, '2021-04-08', 'sarthak@gmail.com', 8989898989, 0, 'Sarthak Shara', 'Street 1, MG road', '2', 'Follow-up started', 'Admin Leads', '2021-04-08', '2021-04-09', 2, '0000-00-00', '', 1, NULL, '2021-04-09 13:20:59', 1),
(6, 'Kanwan', 2, 1, 1, '2021-04-08', 'sales@kanwan.com', 9898989898, 0, 'Kanwan Housing', 'Kanwan Housing', '3', 'Kanwan Housing', 'Kanwan Housing', '2021-04-08', '2021-04-08', 1, '0000-00-00', '', 0, NULL, '2021-04-08 19:53:48', 0),
(7, 'Ajay Kumar', 2, 1, 1, '2021-04-08', 'ajay.kumar@zeksta.com', 9978104229, 0, 'Azmera Builder', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3,4', 'Lead Booked', 'Azmera Builder', '2021-04-08', '2021-08-04', 6, '0000-00-00', '', 1, NULL, '2021-04-09 13:41:36', 1),
(8, 'Namo Builders', 2, 1, 1, '2021-04-08', 'namo@gmail.com', 7878787878, 0, 'Namo Builders', 'Namo Builders', '2,3,4,8', 'Namo Builders', 'Namo', '2021-04-08', '2021-04-08', 1, '0000-00-00', '', 0, NULL, '2021-04-08 19:58:38', 1),
(9, 'Assigned', 2, 1, 1, '2021-04-08', 'sanjeev@test.com', 9978104229, 0, 'Assigned', 'Demo Address2', '4,8', 'Update follow-up by admin', 'Assigned', '2021-04-08', '2021-04-08', 2, '0000-00-00', 'Lead Assigned', 0, NULL, '2021-04-08 14:59:49', 1),
(10, 'Demo lead', 6, 1, 1, '2021-04-09', 'demo@demo.com', 9898989898, 0, 'Demo Project', 'demo clien address', '2,3', 'Demo remarks', 'Demo', '2021-04-09', '2021-04-09', 1, '0000-00-00', 'Lead Assigned', 0, NULL, '2021-04-09 13:24:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_lead_history`
--

CREATE TABLE `sq_lead_history` (
  `id` int(10) NOT NULL,
  `lead_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `activity_comment` varchar(250) NOT NULL,
  `transfer_user_id` int(11) NOT NULL,
  `lead_status` int(11) NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_lead_history`
--

INSERT INTO `sq_lead_history` (`id`, `lead_id`, `user_id`, `activity_type`, `activity_comment`, `transfer_user_id`, `lead_status`, `activity_date`) VALUES
(1, 1, 1, 'Lead Created', 'Wegacity', 0, 1, '2021-04-07 12:38:54'),
(2, 1, 4, 'Lead Created', 'Lead Created', 0, 1, '2021-04-07 18:08:54'),
(3, 2, 1, 'Lead Created', 'Online leads', 0, 1, '2021-04-07 12:41:55'),
(4, 2, 5, 'Lead Created', 'Lead Created', 0, 1, '2021-04-07 18:11:55'),
(5, 2, 1, 'Follow-up Update', 'Follow-up started', 0, 1, '2021-04-07 12:44:03'),
(6, 2, 1, 'Follow-up Update', 'Follow-up Update	', 0, 2, '2021-04-07 12:44:15'),
(7, 2, 1, 'Follow-up Update', 'Follow-up Update	', 0, 2, '2021-04-07 12:44:49'),
(8, 2, 2, 'Follow-up Update', 'Lead Booked message', 0, 6, '2021-04-07 12:49:58'),
(9, 3, 1, 'Lead Created', 'New leads from Sanjeev', 0, 1, '2021-04-08 08:46:02'),
(10, 3, 3, 'Lead Assigned', 'Lead Assigned', 0, 1, '2021-04-08 14:16:03'),
(11, 4, 1, 'Lead Created', 'New lead from admin', 0, 1, '2021-04-08 08:51:52'),
(12, 5, 1, 'Lead Created', 'New lead from admin', 0, 1, '2021-04-08 08:52:15'),
(13, 5, 2, 'Lead Assigned', 'Lead Assigned', 0, 1, '2021-04-08 14:22:15'),
(14, 6, 1, 'Lead Created', 'Kanwan Housing', 0, 1, '2021-04-08 08:53:48'),
(15, 6, 2, 'Lead Assigned', 'Lead Assigned', 0, 1, '2021-04-08 14:23:48'),
(16, 7, 1, 'Lead Created', 'Lead Created', 0, 1, '2021-04-08 08:56:42'),
(17, 7, 2, 'Lead Assigned', 'Lead Assigned', 0, 1, '2021-04-08 14:26:42'),
(18, 8, 1, 'Lead Created', 'Lead Created', 0, 1, '2021-04-08 08:58:38'),
(19, 8, 2, 'Lead Assigned', 'Lead Assigned', 0, 1, '2021-04-08 14:28:38'),
(20, 1, 1, 'Lead Transfer', 'Lead Transfered', 2, 5, '2021-04-08 14:40:35'),
(21, 3, 1, 'Lead Transfer', 'Lead Transfered', 4, 5, '2021-04-08 14:47:47'),
(22, 1, 1, 'Lead Transfer', 'Lead Transfered', 2, 5, '2021-04-08 14:49:24'),
(23, 1, 1, 'Follow-up Update', 'Lead Transfer', 0, 5, '2021-04-08 09:19:35'),
(24, 9, 1, 'Lead Created', 'Lead Created', 0, 1, '2021-04-08 09:20:39'),
(25, 9, 2, 'Lead Assigned', 'Lead Assigned', 0, 1, '2021-04-08 14:50:39'),
(26, 9, 1, 'Follow-up Update', 'Update follow-up by admin', 0, 2, '2021-04-08 09:29:49'),
(27, 5, 1, 'Follow-up Update', 'Follow-up started', 0, 2, '2021-04-09 07:50:59'),
(28, 10, 1, 'Lead Created', 'Lead Created', 0, 1, '2021-04-09 07:54:29'),
(29, 10, 6, 'Lead Assigned', 'Lead Assigned', 0, 1, '2021-04-09 13:24:29'),
(30, 1, 1, 'Follow-up Update', 'just a comment', 0, 5, '2021-04-09 08:00:00'),
(31, 7, 2, 'Follow-up Update', 'Lead Booked', 0, 6, '2021-04-09 08:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `sq_lead_remarks`
--

CREATE TABLE `sq_lead_remarks` (
  `id` int(10) NOT NULL,
  `lead_id` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `remarks` text NOT NULL,
  `remark_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lead_status` int(11) NOT NULL,
  `followup_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sq_lead_unit`
--

CREATE TABLE `sq_lead_unit` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sq_lead_unit`
--

INSERT INTO `sq_lead_unit` (`id`, `unit_id`, `lead_id`) VALUES
(2, 1, 2),
(3, 2, 2),
(4, 2, 3),
(6, 2, 5),
(7, 2, 4),
(8, 3, 6),
(9, 2, 7),
(10, 3, 7),
(11, 4, 7),
(12, 2, 8),
(13, 3, 8),
(14, 4, 8),
(15, 8, 8),
(16, 4, 9),
(17, 8, 9),
(18, 2, 10),
(19, 3, 10),
(20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_members`
--

CREATE TABLE `sq_members` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `alt_phone` bigint(20) DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(500) NOT NULL,
  `joining_date` date NOT NULL,
  `resignation_date` date DEFAULT NULL,
  `is_manager` int(1) NOT NULL DEFAULT 0 COMMENT '0:No,1:Yes',
  `role` int(11) NOT NULL,
  `manager_id` int(10) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `permanent` varchar(500) NOT NULL,
  `correspondence` varchar(500) NOT NULL,
  `profile_image` varchar(300) NOT NULL,
  `approval` int(11) DEFAULT NULL,
  `auth_token` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_members`
--

INSERT INTO `sq_members` (`id`, `fname`, `lname`, `email`, `phone`, `alt_phone`, `gender`, `dob`, `password`, `joining_date`, `resignation_date`, `is_manager`, `role`, `manager_id`, `aadhar`, `pan`, `permanent`, `correspondence`, `profile_image`, `approval`, `auth_token`, `active`) VALUES
(1, 'Aakash', 'shishodia', 'admin@square.com', 9643293050, 0, 'Male', '2021-03-05', '0e7517141fb53f21ee439b355b5a1d0a', '1970-01-01', NULL, 1, 1, 1, '', '', 'A215, Beta-1, Greater Noida, Gauta, UP', 'A215, Beta-1, Greater Noida, Gauta, UP', '', NULL, '', 1),
(2, 'Sanjeev', 'Sharma', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'Male', '2002-03-10', '0e7517141fb53f21ee439b355b5a1d0a', '2021-03-20', NULL, 1, 5, 3, 'GHY-BTT-25-04-2021.pdf', 'GHY-BTT-25-04-2021.pdf', '#53, GNK Plaza, 9th Cross', 'JP Nagar Phase 1', 'ADITYA_KUMAR_PHOTO.jpeg', NULL, '', 1),
(3, 'Omkar', 'Sahani', 'omkar.sahani@zeksta.com', 9999999999, 45435435435, 'Male', '2021-03-20', '0e7517141fb53f21ee439b355b5a1d0a', '2021-03-20', NULL, 0, 4, 1, 'User_manual_for_TechMonegise©1.pdf', 'mock-test-LL-KA-51.pdf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '', 'download_(2).png', NULL, '', 1),
(4, 'Ajay', 'Kumar', 'ajay.kumar@zeksta.com', 9948104229, 0, 'Male', '2021-03-20', '0e7517141fb53f21ee439b355b5a1d0a', '2021-03-20', NULL, 0, 5, 3, 'User_manual_for_TechMonegise©2.pdf', 'User_manual_for_TechMonegise©1.pdf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '', '', NULL, '', 1),
(5, 'Alex', 'Mern', 'alex.mern@nike.com', 9999999999, 0, 'Male', '2001-06-11', '', '2001-06-11', NULL, 1, 4, 1, 'Zeksta_Technology_Pvt_Ltd_Overview.pdf', 'Zeksta_Technology_Pvt_Ltd_Overview.pdf', 'Nike store dummy Address', '', '', NULL, '', 1),
(6, 'Manish', 'Tomar', 'manish.t@gmail.com', 8787888989, 0, 'Male', '0000-00-00', '', '0000-00-00', NULL, 0, 5, 0, 'Zeksta_Technology_Pvt_Ltd_Overview1.pdf', 'User_manual_for_TechMonegise©3.pdf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_members_performance`
--

CREATE TABLE `sq_members_performance` (
  `id` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `letter_type` varchar(20) NOT NULL,
  `letter_name` varchar(255) NOT NULL,
  `reviewer_id` int(10) NOT NULL,
  `review_date` date NOT NULL,
  `comments` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0:new,1:ready,2:deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_members_performance`
--

INSERT INTO `sq_members_performance` (`id`, `agent_id`, `letter_type`, `letter_name`, `reviewer_id`, `review_date`, `comments`, `status`) VALUES
(1, 26, 'Appraisal', '', 1, '2021-03-20', 'dfdsf dfds fdsf dsfs fdsfsdf f', 1),
(2, 26, 'Appointment', 'GHY-BTT-25-04-2021.pdf', 1, '2021-03-20', 'Appointment letter releaswed', 1),
(3, 26, 'Appraisal', 'User_manual_for_TechMonegise©.pdf', 1, '2021-03-20', 'sd fsd fsdfsd fdsfdsgsgsgsaag', 1),
(4, 26, 'Promotion', 'User_manual_for_TechMonegise©1.pdf', 1, '2021-03-21', 'ABSDFB FG FGFD GFDG FDGFDG ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sq_otp_verification`
--

CREATE TABLE `sq_otp_verification` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `reset_otp` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_otp_verification`
--

INSERT INTO `sq_otp_verification` (`id`, `agent_id`, `otp`, `reset_otp`, `active`) VALUES
(12, 21, 600298, 0, 1),
(13, 21, 381975, 0, 1),
(14, 21, 315771, 0, 1),
(15, 21, 119961, 0, 1),
(16, 21, 543522, 0, 1),
(17, 21, 128251, 0, 1),
(18, 21, 762365, 0, 1),
(19, 21, 514439, 0, 1),
(20, 21, 305714, 0, 1),
(21, 21, 0, 701041, 1),
(22, 21, 0, 787903, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_role`
--

CREATE TABLE `sq_role` (
  `role_id` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sq_role`
--

INSERT INTO `sq_role` (`role_id`, `role`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin'),
(3, 'HR'),
(4, 'Sales Manager'),
(5, 'Sales User');

-- --------------------------------------------------------

--
-- Table structure for table `sq_setting`
--

CREATE TABLE `sq_setting` (
  `id` int(11) NOT NULL,
  `site` varchar(255) NOT NULL,
  `tagline` varchar(200) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `personal_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_setting`
--

INSERT INTO `sq_setting` (`id`, `site`, `tagline`, `logo`, `admin_email`, `personal_email`) VALUES
(1, 'Kritak', 'We fulfill your Dream', 'kritak_logo.png', 'admin@square.com', 'agent@kritak.com');

-- --------------------------------------------------------

--
-- Table structure for table `sq_status`
--

CREATE TABLE `sq_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `short_name` varchar(20) NOT NULL,
  `color_code` varchar(100) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_status`
--

INSERT INTO `sq_status` (`id`, `status_name`, `short_name`, `color_code`, `icon`) VALUES
(1, 'New follow up', 'new', '#4bdae8', 'fa fa-tags'),
(2, 'Follow up', 'follow_up', '#989003', 'fa-calendar'),
(3, 'Not Interested', 'dumps', '#c95150', 'fa-trash-o'),
(4, 'Not Reachable', 'not_reachable', '#795548', 'fa-frown-o'),
(5, 'Transfer', 'transferred', '#673ab7', 'fa-code-fork'),
(6, 'Booked', 'booked', '#009688', 'fa-address-book');

-- --------------------------------------------------------

--
-- Table structure for table `sq_team`
--

CREATE TABLE `sq_team` (
  `id` int(11) NOT NULL,
  `creater` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` text DEFAULT NULL,
  `dob` date NOT NULL,
  `permanent` text NOT NULL,
  `correspondence` text DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sq_team`
--

INSERT INTO `sq_team` (`id`, `creater`, `name`, `email`, `phone`, `gender`, `dob`, `permanent`, `correspondence`, `active`) VALUES
(1, 21, 'Abhay', 'abhay@gmail.com', 9876543243, NULL, '0000-00-00', 'noida', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_unit`
--

CREATE TABLE `sq_unit` (
  `id` int(11) NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `unit_size` varchar(300) NOT NULL,
  `size_measure` varchar(100) NOT NULL,
  `unit_range` varchar(100) NOT NULL,
  `unit_remark` varchar(500) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_unit`
--

INSERT INTO `sq_unit` (`id`, `unit_type`, `unit_size`, `size_measure`, `unit_range`, `unit_remark`, `active`) VALUES
(1, '1BHK', '1234', 'sq.ft', '0', '', 1),
(2, '1BHK', '400', 'sq.yard', '10000', '', 1),
(3, '1BHK', '450', 'sq.ft', '(6000-10000)', 'best', 1),
(4, '2BHK', '1234', 'sq.ft', '9000', '', 1),
(5, '2BHK', '900', '', '0', '', 0),
(8, '2BHK', '1000', 'sq.ft', '(6000-9000)', 'gaj', 1),
(10, '2BHK', '1234 sqft', 'sq.ft', '', '', 1),
(11, 'Other', 'Any', 'sq.ft', '100+', 'Others', 1),
(12, '4BHK', '2200', 'sq.ft', '2CR', 'High end', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_user_lead`
--

CREATE TABLE `sq_user_lead` (
  `id` int(10) NOT NULL,
  `lead_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `lead_status` int(11) NOT NULL,
  `lead_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sq_admin`
--
ALTER TABLE `sq_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_chat`
--
ALTER TABLE `sq_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_lead`
--
ALTER TABLE `sq_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_lead_history`
--
ALTER TABLE `sq_lead_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_id` (`lead_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sq_lead_remarks`
--
ALTER TABLE `sq_lead_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_lead_unit`
--
ALTER TABLE `sq_lead_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_members`
--
ALTER TABLE `sq_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sq_members_performance`
--
ALTER TABLE `sq_members_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_otp_verification`
--
ALTER TABLE `sq_otp_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_role`
--
ALTER TABLE `sq_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sq_setting`
--
ALTER TABLE `sq_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_status`
--
ALTER TABLE `sq_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_team`
--
ALTER TABLE `sq_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_unit`
--
ALTER TABLE `sq_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_user_lead`
--
ALTER TABLE `sq_user_lead`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sq_admin`
--
ALTER TABLE `sq_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sq_chat`
--
ALTER TABLE `sq_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sq_lead`
--
ALTER TABLE `sq_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sq_lead_history`
--
ALTER TABLE `sq_lead_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sq_lead_remarks`
--
ALTER TABLE `sq_lead_remarks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sq_lead_unit`
--
ALTER TABLE `sq_lead_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sq_members`
--
ALTER TABLE `sq_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sq_members_performance`
--
ALTER TABLE `sq_members_performance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sq_otp_verification`
--
ALTER TABLE `sq_otp_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sq_role`
--
ALTER TABLE `sq_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sq_setting`
--
ALTER TABLE `sq_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sq_status`
--
ALTER TABLE `sq_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sq_team`
--
ALTER TABLE `sq_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sq_unit`
--
ALTER TABLE `sq_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sq_user_lead`
--
ALTER TABLE `sq_user_lead`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
