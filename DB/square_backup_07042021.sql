-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 12:53 PM
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
  `agent_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_chat`
--

INSERT INTO `sq_chat` (`id`, `agent_id`, `admin_id`, `message`, `type`, `date_time`) VALUES
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
(12, 2, 1, 'I want to know how accessibility done with your system, as one of our client\'s website required ADA and other compliances should be completed. ', 0, '2021-04-02 12:47:41');

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
(1, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', ' GNK Plaza,', 'GNK', '2021-03-26', '2021-03-26', 2, '0000-00-00', 'prebook', 1, NULL, '2021-04-04 19:34:44', 1),
(2, 'Salaria', 2, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-04-05', 2, '2021-03-26', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(3, 'DLF Township', 3, 0, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(4, 'Omkar DH', 2, 3, 1, '2021-03-26', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Updating last time\r\n', 'Omkar DH', '2021-03-26', '2021-04-06', 2, '0000-00-00', 'prebook', 0, NULL, '2021-04-06 19:42:53', 1),
(5, 'Sanjeev', 2, 3, 1, '2021-03-26', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-04-04', 2, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(6, 'Omkar Sahani', 3, 3, 1, '2021-03-26', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(7, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(8, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', ' GNK Plaza,', 'GNK', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(9, 'Salaria', 3, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(10, 'DLF Township', 3, 0, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(11, 'Omkar DH', 3, 3, 1, '2021-03-26', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Omkar DH', 'Omkar DH', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(12, 'Sanjeev', 1, 3, 1, '2021-03-26', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(13, 'Omkar Sahani', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(14, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(15, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', ' GNK Plaza,', 'GNK', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(16, 'Salaria', 3, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(17, 'DLF Township', 3, 0, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(18, 'Omkar DH', 4, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Omkar DH', 'Omkar DH', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(19, 'Sanjeev', 2, 3, 1, '2021-03-27', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(20, 'Omkar Sahani', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(21, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(22, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', ' GNK Plaza,', 'GNK', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(23, 'Salaria', 3, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(24, 'DLF Township', 3, 0, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(25, 'Omkar DH', 2, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Omkar DH', 'Omkar DH', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(26, 'Sanjeev', 3, 3, 1, '2021-03-27', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(27, 'Omkar Sahani', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(28, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(29, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', ' GNK Plaza,', 'GNK', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(30, 'Salaria', 3, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(31, 'DLF Township', 3, 0, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(32, 'Omkar DH', 1, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Omkar DH', 'Omkar DH', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(33, 'Sanjeev', 3, 3, 1, '2021-03-27', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(34, 'Omkar Sahani', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(35, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(36, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', ' GNK Plaza,', 'GNK', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(37, 'Salaria', 3, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(38, 'DLF Township', 3, 0, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(39, 'Omkar DH', 2, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Omkar DH', 'Omkar DH', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(40, 'Sanjeev', 4, 3, 1, '2021-03-27', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(41, 'Omkar Sahani', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(42, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(43, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', 'New follow up updTED BYT ADMIN', 'GNK', '2021-03-26', '2021-04-06', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-06 20:21:39', 1),
(44, 'Salaria', 3, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(45, 'DLF Township', 3, 0, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(46, 'Omkar DH', 2, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Omkar DH', 'Omkar DH', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(47, 'Sanjeev', 1, 3, 1, '2021-03-27', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(48, 'Omkar Sahani', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(49, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(50, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', ' GNK Plaza,', 'GNK', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(51, 'Salaria', 3, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(52, 'DLF Township', 3, 0, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 4, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(53, 'Omkar DH', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Omkar DH', 'Omkar DH', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(54, 'Sanjeev', 4, 3, 1, '2021-03-27', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-03-26', 2, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(55, 'Omkar Sahani', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 2, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(56, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 2, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(57, 'sanjeev', 3, 1, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, ' GNK Plaza,', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '1', ' GNK Plaza,', 'GNK', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(58, 'Salaria', 3, 1, 1, '2021-03-26', 'developer.zeksta@gmail.com', 9999999999, 9978104229, 'Salaria', 'Demo Address2', '1,2,3,4,8,10', 'Salaria Satva', 'Admin', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(59, 'DLF Township', 3, 0, 1, '2021-03-26', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'DLF Township', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3,4', 'DLF Township', 'DLF Township', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(60, 'Omkar DH', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 8989834324, 8989834324, 'Omkar DH, Bangalore', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '1,2,3,4,8,10', 'Omkar DH', 'Omkar DH', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 0),
(61, 'Sanjeev', 2, 3, 1, '2021-03-27', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'dfafsafsa', 'Wegacity', '1,2,3', 'fdfdsf dfds fdsf sdfds f', 'fdfdfdfdsf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(62, 'Omkar Sahani', 3, 3, 1, '2021-03-27', 'omkar.sahani@zeksta.com', 9978104229, 0, 'fdsfds fdsf', '#53, GNK Plaza, 9th Cross, JP Nagar Phase 1', '2,3', 'dsf dsf dsfs', ' sdf', '2021-03-26', '2021-03-26', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(63, 'asdsa fd dfdsf ', 3, 3, 1, '2021-03-26', 'sanjeev@test.com', 9999999999, 9978104229, ' sgsdf sdfsdf', 'Demo Address2', '1,2,3', ' sdfdsf', 'sdfdsf', '2021-03-26', '2021-03-26', 5, '2021-03-27', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(64, 'sanjeev', 2, 2, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sdsadsadsa', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'as dasd sad s', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(65, 'new assign lead', 2, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'new assign lead', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2,3', 'new assign lead', 'new assign lead', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(66, 'Sanjeev', 1, 1, 1, '2021-03-28', 'sanjeev.sharma@zeksta.com', 9978104229, 0, 'sdsadsdS DAS DASD ', 'Wegacity', '2', 'asasasassaS', 'sad', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(67, 'sanjeev Sharma', 1, 1, 1, '2021-03-28', 'sanjeev@test.com', 9999999999, 0, 'DSADSADSAD', 'Demo Address2', '2', 'ASDSADSAD', 'DASDSAD', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(68, 'sanjeev Sharma', 1, 1, 1, '2021-03-28', 'sanjeev@test.com', 9999999999, 0, 'CCZCXZC', 'Demo Address2', '1,2', 'CZXCZXCXZC', 'CZXCXZC', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(69, 'sanjeev Sharma', 1, 1, 1, '2021-03-28', 'sanjeev@test.com', 9999999999, 0, 'sdsadsadsad', 'Demo Address2', '1,2', 'sadsad', 'dasd', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(70, 'sanjeev', 1, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(71, 'sanjeev', 1, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(72, 'sanjeev', 1, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(73, 'sanjeev', 1, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(74, 'sanjeev', 1, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(75, 'sanjeev', 1, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(76, 'sanjeev', 2, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(77, 'sanjeev', 4, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(78, 'sanjeev', 2, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(79, 'sanjeev', 4, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(80, 'sanjeev', 2, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(81, 'sanjeev', 4, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(82, 'sanjeev', 2, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(83, 'sanjeev', 4, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(84, 'sanjeev', 3, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(85, 'sanjeev', 1, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(86, 'sanjeev', 2, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(87, 'sanjeev', 4, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(88, 'sanjeev', 2, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(89, 'sanjeev', 4, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(90, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(91, 'sanjeev', 4, 1, 1, '2021-03-28', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sadsa dsf ', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '3', 'gsdgdg', '', '2021-03-28', '2021-03-28', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(92, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(93, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(94, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(95, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(96, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(97, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(98, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(99, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(100, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(101, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(102, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(103, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(104, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(105, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(106, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(107, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(108, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(109, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(110, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(111, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(112, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(113, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(114, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(115, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(116, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(117, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(118, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(119, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(120, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(121, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(122, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(123, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(124, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(125, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(126, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(127, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(128, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(129, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(130, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(131, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(132, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(133, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(134, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(135, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(136, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(137, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(138, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(139, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(140, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(141, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(142, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(143, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(144, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(145, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(146, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(147, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(148, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(149, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(150, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(151, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(152, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(153, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sanjeev', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'sanjeev', '', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(154, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(155, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(156, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(157, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(158, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(159, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(160, 'sanjeev', 3, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(161, 'sanjeev', 5, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(162, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(163, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(164, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(165, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(166, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(167, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(168, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(169, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(170, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(171, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(172, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(173, 'sanjeev', 4, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(174, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(175, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(176, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(177, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(178, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(179, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(180, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(181, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(182, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(183, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(184, 'sanjeev', 5, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(185, 'sanjeev', 0, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(186, 'sanjeev', 0, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(187, 'sanjeev', 0, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(188, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(189, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(190, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(191, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(192, 'sanjeev', 0, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(193, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(194, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1);
INSERT INTO `sq_lead` (`id`, `name`, `assign_to`, `created_by`, `user_type`, `assign_date`, `email`, `phone`, `alt_phone`, `property_address`, `client_address`, `available_unit`, `remark`, `reference`, `lead_date`, `followup_date`, `status`, `transferred_date`, `status_remark`, `attempted`, `status_date`, `last_update`, `active`) VALUES
(195, 'sanjeev', 0, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(196, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(197, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(198, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(199, 'sanjeev', 1, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(200, 'sanjeev', 0, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(201, 'sanjeev', 0, 1, 1, '2021-03-27', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(202, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(203, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(204, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(205, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(206, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(207, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(208, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(209, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(210, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(211, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(212, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(213, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(214, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(215, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(216, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(217, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(218, 'sanjeev', 2, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(219, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(220, 'sanjeev', 4, 1, 1, '2021-03-30', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'dasdsadsada', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '2', 'saaSs', 'GNK', '2021-03-30', '2021-03-30', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(221, 'sanjeev', 4, 1, 1, '2021-03-31', 'sanjeevbr20@yahoo.com', 9978104229, 0, 'sdsafs', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '4', 'fdsfdsf', '', '2021-03-31', '2021-03-31', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1),
(222, 'Demo on', 2, 1, 1, '2021-03-31', 'demo@demo.com', 9978104229, 0, 'Demo on 31', '#53, GNK Plaza, 9th Cross\r\nJP Nagar Phase 1', '4', 'Demo', '', '2021-03-31', '2021-03-31', 1, '0000-00-00', 'prebook', 0, NULL, '2021-04-04 19:34:44', 1);

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
(1, 10, 2, '1', '0', 0, 0, '2021-03-31 13:58:57'),
(2, 10, 2, '1', '0', 0, 0, '2021-03-31 14:18:24'),
(3, 222, 4, '1', '0', 0, 0, '2021-03-31 14:57:23'),
(4, 4, 1, 'Follow-up Update', '0', 0, 2, '2021-04-06 14:10:00'),
(5, 4, 1, 'Follow-up Update', 'New update on follow-up New update on follow-up', 0, 2, '2021-04-06 14:11:00'),
(6, 4, 1, 'Follow-up Update', 'Updating last time', 0, 2, '2021-04-06 14:12:03'),
(7, 4, 1, 'Follow-up Update', 'Updating last time\r\n', 0, 2, '2021-04-06 14:12:53'),
(8, 43, 1, 'Follow-up Update', 'New follow up updTED BYT ADMIN', 0, 1, '2021-04-06 14:51:39');

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
(9, 2, 5),
(10, 3, 5),
(11, 8, 5),
(12, 1, 40),
(13, 10, 40),
(14, 1, 41),
(15, 10, 41),
(16, 2, 42),
(17, 4, 42),
(18, 1, 4),
(19, 2, 4),
(20, 3, 4),
(21, 1, 43),
(22, 2, 43),
(23, 1, 44),
(24, 1, 1),
(25, 1, 2),
(26, 2, 2),
(27, 3, 2),
(28, 4, 2),
(29, 8, 2),
(30, 10, 2),
(31, 2, 3),
(32, 3, 3),
(33, 4, 3),
(34, 1, 4),
(35, 2, 4),
(36, 3, 4),
(37, 4, 4),
(38, 8, 4),
(39, 10, 4),
(40, 1, 5),
(41, 2, 5),
(42, 3, 5),
(43, 2, 6),
(44, 3, 6),
(48, 1, 7),
(49, 2, 7),
(50, 3, 7),
(51, 2, 64),
(52, 2, 65),
(53, 3, 65),
(54, 2, 66),
(55, 2, 67),
(56, 1, 68),
(57, 2, 68),
(58, 1, 69),
(59, 2, 69),
(60, 3, 70),
(61, 3, 71),
(62, 3, 72),
(63, 3, 73),
(64, 3, 74),
(65, 3, 75),
(66, 3, 76),
(67, 3, 77),
(68, 3, 78),
(69, 3, 79),
(70, 3, 80),
(71, 3, 81),
(72, 3, 82),
(73, 3, 83),
(74, 3, 84),
(75, 3, 85),
(76, 3, 86),
(77, 3, 87),
(78, 3, 88),
(79, 3, 89),
(80, 3, 90),
(81, 3, 91),
(82, 2, 92),
(83, 2, 93),
(84, 2, 94),
(85, 2, 95),
(86, 2, 96),
(87, 2, 97),
(88, 2, 98),
(89, 2, 99),
(90, 2, 100),
(91, 2, 101),
(92, 2, 102),
(93, 2, 103),
(94, 2, 104),
(95, 2, 105),
(96, 2, 106),
(97, 2, 107),
(98, 2, 108),
(99, 2, 109),
(100, 2, 110),
(101, 2, 111),
(102, 2, 112),
(103, 2, 116),
(104, 2, 117),
(105, 2, 118),
(106, 2, 119),
(107, 2, 120),
(108, 2, 121),
(109, 2, 122),
(110, 2, 123),
(111, 2, 124),
(112, 2, 125),
(113, 2, 126),
(114, 2, 127),
(115, 2, 128),
(116, 2, 129),
(117, 2, 130),
(118, 2, 131),
(119, 2, 132),
(120, 2, 133),
(121, 2, 134),
(122, 2, 135),
(123, 2, 136),
(124, 2, 137),
(125, 2, 138),
(126, 2, 140),
(127, 2, 141),
(128, 2, 142),
(129, 2, 143),
(130, 2, 144),
(131, 2, 145),
(132, 2, 146),
(133, 2, 147),
(134, 2, 148),
(135, 2, 149),
(136, 2, 150),
(137, 2, 151),
(138, 2, 152),
(139, 2, 153),
(140, 2, 154),
(141, 2, 155),
(142, 2, 156),
(143, 2, 157),
(144, 2, 158),
(145, 2, 159),
(146, 2, 160),
(147, 2, 161),
(148, 2, 162),
(149, 2, 163),
(150, 2, 164),
(151, 2, 165),
(152, 2, 166),
(153, 2, 167),
(154, 2, 168),
(155, 2, 169),
(156, 2, 170),
(157, 2, 171),
(158, 2, 172),
(159, 2, 173),
(160, 2, 174),
(161, 2, 175),
(162, 2, 176),
(163, 2, 177),
(164, 2, 178),
(165, 2, 179),
(166, 2, 180),
(167, 2, 181),
(168, 2, 182),
(169, 2, 183),
(170, 2, 184),
(171, 2, 185),
(172, 2, 186),
(173, 2, 187),
(174, 2, 188),
(175, 2, 189),
(176, 2, 190),
(177, 2, 191),
(178, 2, 193),
(179, 2, 194),
(180, 2, 196),
(181, 2, 197),
(182, 2, 198),
(183, 2, 199),
(184, 2, 202),
(185, 2, 203),
(186, 2, 204),
(187, 2, 205),
(188, 2, 206),
(189, 2, 207),
(190, 2, 208),
(191, 2, 209),
(192, 2, 210),
(193, 2, 211),
(194, 2, 212),
(195, 2, 213),
(196, 2, 214),
(197, 2, 215),
(198, 2, 216),
(199, 2, 217),
(200, 2, 218),
(201, 2, 219),
(202, 2, 220),
(203, 4, 221),
(204, 4, 222);

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
(5, 'Alex', 'Mern', 'alex.mern@nike.com', 9999999999, 0, 'Male', '2001-06-11', '', '2001-06-11', NULL, 1, 4, 1, 'Zeksta_Technology_Pvt_Ltd_Overview.pdf', 'Zeksta_Technology_Pvt_Ltd_Overview.pdf', 'Nike store dummy Address', '', '', NULL, '', 1);

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
(11, 'Other', 'Any', 'sq.ft', '100+', 'Others', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sq_lead`
--
ALTER TABLE `sq_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `sq_lead_history`
--
ALTER TABLE `sq_lead_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sq_lead_remarks`
--
ALTER TABLE `sq_lead_remarks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sq_lead_unit`
--
ALTER TABLE `sq_lead_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `sq_members`
--
ALTER TABLE `sq_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sq_user_lead`
--
ALTER TABLE `sq_user_lead`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
