-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 08:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

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
(8, 15, 1, 'dfgdgfdgfd', 0, '2021-02-07 07:55:17');

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
  `status` int(11) NOT NULL DEFAULT 1,
  `status_remark` varchar(500) NOT NULL,
  `status_date` date DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_lead`
--

INSERT INTO `sq_lead` (`id`, `name`, `assign_to`, `created_by`, `user_type`, `assign_date`, `email`, `phone`, `alt_phone`, `property_address`, `client_address`, `available_unit`, `remark`, `reference`, `lead_date`, `status`, `status_remark`, `status_date`, `active`) VALUES
(4, 'Aakash shishodia', 21, 21, 1, '2021-01-31', 'aakash143only4u@gmail.com', 9643293056, 9643293056, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1,2,3', 'rtrtt5t5tfg', 'aaaaaaaaaaaaaa', '2020-12-24', 3, 'Success', '2021-02-19', 1),
(5, 'supertech', 0, 21, 1, '2021-01-31', 'aakash143only4u@gmail.com', 8859423143, 0, 'noida ', 'Village-Sapnawat ,Block- Dhaulana, District - Hapur, State - UP\r\nSector -34, Noida, UP', '2,3,8', ' ', '', '2020-12-24', 2, '', '2021-02-19', 1),
(6, 'Aakash shishodia', 21, 21, 1, '2021-02-02', 'aakash143only4u@gmail.com', 9643293056, 0, 'migsun', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1BHK (400 sq.yard), 1BHK (450 sq.ft), 2BHK (1000 sq.ft)', ' ', '', '2020-12-27', 3, '', '2021-02-19', 1),
(8, 'Aakash shishodia', 25, 0, 1, '2021-02-02', 'aakash143only4u@gmail.com', 9643293056, 0, 'sdsfdsf', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1, 2, 4', '', '', '2021-01-05', 3, '', '2021-02-19', 1),
(9, 'Aakash shishodia', 0, 15, 1, '2021-02-02', 'aakash143only4u@gmail.com', 9643293056, 0, 'efewf', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '2, 3', '', '', '2021-02-02', 3, '', '2021-02-19', 1),
(10, 'edfewfef', 0, 15, 2, NULL, 'dsdefe@gmail.com', 8765432123, 8767897654, 'efrrrrrrrrrrrrrrrrrrr', 'erererererere', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 3, '', '2021-02-19', 1),
(11, 'Sunil Kumar', 0, 15, 2, NULL, 'dsdefe@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 3, '', '2021-02-19', 1),
(12, 'Vikas Kumar', 0, 15, 2, NULL, 'vikas@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(13, 'Mayank Kumar', 0, 15, 2, NULL, 'mayank@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(14, 'Pawan Kumar', 0, 15, 2, NULL, 'pk@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(15, 'Sushil Kumar', 0, 15, 2, NULL, 'sus@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 3, '', '2021-02-19', 1),
(16, 'Manish Kumar', 0, 15, 2, NULL, 'manish@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 3, '', '2021-02-19', 1),
(17, 'Vikas Kumar', 0, 15, 2, NULL, 'vikas@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(18, 'Mayank Kumar', 0, 15, 2, NULL, 'mayank@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(19, 'Pawan Kumar', 0, 15, 2, NULL, 'pk@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(20, 'Sushil Kumar', 0, 15, 2, NULL, 'sus@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 3, '', '2021-02-19', 1),
(21, 'Manish Kumar', 0, 15, 2, NULL, 'manish@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(22, 'Vikas Kumar', 0, 15, 2, NULL, 'vikas@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(23, 'Mayank Kumar', 0, 15, 2, NULL, 'mayank@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(24, 'Pawan Kumar', 0, 15, 2, NULL, 'pk@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(25, 'Sushil Kumar', 0, 15, 2, NULL, 'sus@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(26, 'Manish Kumar', 0, 15, 2, NULL, 'manish@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(27, 'Vikas Kumar', 0, 15, 2, NULL, 'vikas@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(28, 'Mayank Kumar', 0, 15, 2, NULL, 'mayank@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(29, 'Pawan Kumar', 0, 15, 2, NULL, 'pk@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(30, 'Sushil Kumar', 0, 15, 2, NULL, 'sus@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(31, 'Manish Kumar', 0, 15, 2, NULL, 'manish@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 3, '', '2021-02-19', 1),
(32, 'Vikas Kumar', 0, 15, 2, NULL, 'vikas@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(33, 'Mayank Kumar', 0, 15, 2, NULL, 'mayank@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(34, 'Pawan Kumar', 0, 15, 2, NULL, 'pk@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 3, '', '2021-02-19', 1),
(35, 'Sushil Kumar', 0, 15, 2, NULL, 'sus@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(36, 'Manish Kumar', 0, 15, 2, NULL, 'manish@gmail.com', 8765432123, 8767897654, 'Sec- 34 Noida', 'Sec- 34 Noida', '3dd', 'dfdfcds', 'edddddddddddddd', '2021-02-03', 1, '', '2021-02-19', 1),
(37, 'Rajat Kumar', 0, 0, 1, NULL, 'rajat@test.com', 9876543210, 0, 'Arawali Apartment', 'Arawali Apartment Noida', '3,4', '', '', '2021-02-09', 1, '', '2021-02-19', 1),
(38, 'Aakash Kumar', 0, 0, 1, NULL, 'sunilkumar.pks95@gmail.com', 9876543210, 0, 'Sector 4 Gurgaon ', 'Sector 4 Gurgaon ', '2,3,4', '', '', '2021-02-09', 1, '', '2021-02-19', 1),
(39, 'Navneet', 0, 0, 1, NULL, 'navneet@gmail.com', 9876598765, 0, 'Noida', 'Noida', '1,10', '', '', '2021-02-09', 1, '', '2021-02-19', 1),
(40, 'Navneet', 0, 0, 1, NULL, 'navneet@gmail.com', 9876598765, 0, 'Noida', 'Noida', '1,10', '', '', '2021-02-09', 1, '', '2021-02-19', 1),
(41, 'Navneet', 0, 0, 1, NULL, 'navneet@gmail.com', 9876598765, 0, 'Noida', 'Noida', '1,10', '', '', '2021-02-09', 1, '', '2021-02-19', 1),
(42, 'Rohit', 0, 0, 1, NULL, 'kritak@gmail.com', 6789543223, 0, 'Kritak Eureka Park', 'noida', '2,4', '', '', '2021-02-12', 1, '', '2021-02-19', 1);

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
(6, 1, 4),
(7, 2, 4),
(8, 3, 4),
(9, 2, 5),
(10, 3, 5),
(11, 8, 5),
(12, 1, 40),
(13, 10, 40),
(14, 1, 41),
(15, 10, 41),
(16, 2, 42),
(17, 4, 42);

-- --------------------------------------------------------

--
-- Table structure for table `sq_members`
--

CREATE TABLE `sq_members` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `alt_phone` bigint(20) DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `pass` varchar(500) DEFAULT NULL,
  `joining_date` date NOT NULL,
  `resignation_date` date DEFAULT NULL,
  `role` int(11) NOT NULL,
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

INSERT INTO `sq_members` (`id`, `name`, `email`, `phone`, `alt_phone`, `gender`, `dob`, `pass`, `joining_date`, `resignation_date`, `role`, `aadhar`, `pan`, `permanent`, `correspondence`, `profile_image`, `approval`, `auth_token`, `active`) VALUES
(15, 'Aakash shishodia', 'mayank123@gmail.com', 7467034417, 7467034417, 'Male', '0000-00-00', '', '2020-12-03', NULL, 3, 'Aakash_Shishodia_resume.pdf', 'Aakash_Shishodia_resume (1).pdf', 'Village-Sapnawat ,', 'Block- Dhaulana', '', 1, '', 1),
(18, 'sunny rana', 'singh@gmail.com', 6395840017, 0, '', '2020-11-30', '', '2020-12-23', NULL, 0, 'Aakash_Shishodia_resume1.pdf', 'Aakash_Shishodia_resume_(1)1.pdf', 'VILLAGE- DHARAMPUR 15 BISWA, POST- BHATIYANA, BLOCK- DHAULANA, DISTRIC- HAPUR', '', '', NULL, '', 1),
(20, 'abhi', 'vikas12@gmail.com', 7467034417, 0, '', '2020-12-01', '', '2020-12-23', '2020-12-27', 0, 'Aakash_Shishodia_resume_(1)2.pdf', 'Aakash_Shishodia_resume2.pdf', 'Village-karimpur Bhaipur, tehsil- dhaulana, Block- Dhaulana , Distric- hapur', '', '', NULL, '', 0),
(21, 'dgfvhbdfnv', 'aakash143only4u@gmail.com', 8859423143, 0, '', '2020-12-02', 'f07c010b6d605f93008f868133124b2d', '2020-12-23', '2020-12-27', 0, 'Aakash_Shishodia_resume4.pdf', 'Aakash_Shishodia_resume3.pdf', 'Village-Sapnawat ,Block- Dhaulana, District - Hapur, State - UP', 'Sector -34, Noida, UP', '', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIxIiwiZW1haWwiOiJhYWthc2gxNDNvbmx5NHVAZ21haWwuY29tIiwiaWF0IjoxNjExNDE1MjM5LCJleHAiOjE2MTE0MzMyMzl9.TZMt1M-Rvv-f9l2IfCSYEwA00fkYX2UtpVcQEJ6kiHk', 1),
(25, 'aksh', 'akshay@gmail.com', 9888876466, NULL, '', '0000-00-00', '', '0000-00-00', NULL, 0, '', '', '', '', '', NULL, '', 1);

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
(1, 'Supervisor'),
(2, 'Assistant Manager'),
(3, 'Manager'),
(4, 'Sales Executive');

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
  `color_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_status`
--

INSERT INTO `sq_status` (`id`, `status_name`, `color_code`) VALUES
(1, 'Available', '#c95150'),
(2, 'Progress', '#e8df4b\r\n'),
(3, 'Booked', '#65b551');

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
(10, '2BHK', '1234 sqft', 'sq.ft', '', '', 1);

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
-- Indexes for table `sq_lead_unit`
--
ALTER TABLE `sq_lead_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_members`
--
ALTER TABLE `sq_members`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sq_lead`
--
ALTER TABLE `sq_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sq_lead_unit`
--
ALTER TABLE `sq_lead_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sq_members`
--
ALTER TABLE `sq_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sq_otp_verification`
--
ALTER TABLE `sq_otp_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sq_role`
--
ALTER TABLE `sq_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sq_setting`
--
ALTER TABLE `sq_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sq_team`
--
ALTER TABLE `sq_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sq_unit`
--
ALTER TABLE `sq_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
