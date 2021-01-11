-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 06:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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

INSERT INTO `sq_admin` (`role_id`, `username`, `email`, `password`, `fname`, `lname`, `mobile`, `dob`, `gender`, `address`, `profile_image`) VALUES
(1, 'Admin', 'admin@square.com', '0e7517141fb53f21ee439b355b5a1d0a', 'Aakash', 'shishodia', 9643293050, '2020-12-09', 'Male', 'A215, Beta-1, Greater Noida, Gauta, UP', 'WIN_20190223_21_22_35_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sq_lead`
--

CREATE TABLE `sq_lead` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `assign_to` varchar(500) NOT NULL,
  `assign_date` date DEFAULT NULL,
  `email` varchar(500) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `alt_phone` bigint(20) NOT NULL,
  `property_address` text NOT NULL,
  `client_address` text NOT NULL,
  `available_unit` varchar(1000) NOT NULL,
  `remark` text NOT NULL,
  `reference` text NOT NULL,
  `lead_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_lead`
--

INSERT INTO `sq_lead` (`id`, `name`, `assign_to`, `assign_date`, `email`, `phone`, `alt_phone`, `property_address`, `client_address`, `available_unit`, `remark`, `reference`, `lead_date`, `status`) VALUES
(1, 'Aakash shishodia', '', NULL, 'aakash143only4u@gmail.com', 9643293056, 7467034417, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', ' Greater Noida, Gautam Buddha Nagar, UP', '', 'tgggggggggggggggggg', 'tgrgrh', '2020-12-08 09:24:39', 0),
(4, 'Aakash shishodia', ' ', NULL, 'aakash143only4u@gmail.com', 9643293056, 9643293056, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1BHK (1234 sq.ft), 1BHK (400 sq.yard), 1BHK (450 sq.ft)', 'rtrtt5t5tfg', 'aaaaaaaaaaaaaa', '2020-12-24 12:59:45', 1),
(5, 'supertech', 'sunny rana', '2020-12-27', 'aakash143only4u@gmail.com', 8859423143, 0, 'noida ', 'Village-Sapnawat ,Block- Dhaulana, District - Hapur, State - UP\r\nSector -34, Noida, UP', '', ' ', '', '2020-12-24 15:31:23', 1),
(6, 'Aakash shishodia', '', NULL, 'aakash143123only4u@gmail.com', 9643293056, 0, 'migsun', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1BHK (400 sq.yard), 1BHK (450 sq.ft), 2BHK (1000 sq.ft)', ' ', '', '2020-12-27 12:08:32', 1),
(8, 'Aakash shishodia', '', NULL, 'aakash143only4u@gmail.com', 9643293056, 0, 'sdsfdsf', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1, 2, 4', '', '', '2021-01-05 12:53:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_lead_unit`
--

CREATE TABLE `sq_lead_unit` (
  `id` int(11) NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `unit_size` varchar(300) NOT NULL,
  `size_measure` varchar(100) NOT NULL,
  `unit_range` varchar(100) NOT NULL,
  `unit_remark` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_lead_unit`
--

INSERT INTO `sq_lead_unit` (`id`, `unit_type`, `unit_size`, `size_measure`, `unit_range`, `unit_remark`, `status`) VALUES
(1, '1BHK', '1234', 'sq.ft', '0', '', 1),
(2, '1BHK', '400', 'sq.yard', '10000', '', 1),
(3, '1BHK', '450', 'sq.ft', '(6000-10000)', 'best', 1),
(4, '2BHK', '1234', 'sq.ft', '9000', '', 1),
(5, '2BHK', '900', '', '0', '', 0),
(8, '2BHK', '1000', 'sq.ft', '(6000-9000)', 'gaj', 1),
(10, '2BHK', '1234 sqft', 'sq.ft', '', '', 1);

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
  `aadhar` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `permanent` varchar(500) NOT NULL,
  `correspondence` varchar(500) NOT NULL,
  `profile_image` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_members`
--

INSERT INTO `sq_members` (`id`, `name`, `email`, `phone`, `alt_phone`, `gender`, `dob`, `pass`, `joining_date`, `resignation_date`, `aadhar`, `pan`, `permanent`, `correspondence`, `profile_image`, `status`) VALUES
(15, 'Aakash shishodia', 'mayank123@gmail.com', 7467034417, 7467034417, 'Male', '2020-12-01', '', '2020-12-03', NULL, 'Aakash_Shishodia_resume.pdf', 'Aakash_Shishodia_resume (1).pdf', 'Village-Sapnawat ,', 'Block- Dhaulana', '', 1),
(18, 'sunny rana', 'singh@gmail.com', 6395840017, 0, '', '2020-11-30', '', '2020-12-23', NULL, 'Aakash_Shishodia_resume1.pdf', 'Aakash_Shishodia_resume_(1)1.pdf', 'VILLAGE- DHARAMPUR 15 BISWA, POST- BHATIYANA, BLOCK- DHAULANA, DISTRIC- HAPUR', '', '', 1),
(19, 'mahesh', 'aakash143only4u@gmail.com', 9643293056, 0, '', '2020-12-01', 'f07c010b6d605f93008f868133124b2d', '2020-12-23', '2020-12-27', 'Aakash_Shishodia_resume2.pdf', 'Aakash_Shishodia_resume_(1)2.pdf', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '', 'WIN_20190223_21_22_35_Pro.jpg', 0),
(20, 'abhi', 'vikas12@gmail.com', 7467034417, 0, '', '2020-12-01', '', '2020-12-23', '2020-12-27', 'Aakash_Shishodia_resume_(1)2.pdf', 'Aakash_Shishodia_resume2.pdf', 'Village-karimpur Bhaipur, tehsil- dhaulana, Block- Dhaulana , Distric- hapur', '', '', 0),
(21, 'dgfvhbdfnv', 'aakash143only4u@gmail.com', 8859423143, 0, '', '2020-12-02', 'f07c010b6d605f93008f868133124b2d', '2020-12-23', '2020-12-27', 'Aakash_Shishodia_resume4.pdf', 'Aakash_Shishodia_resume3.pdf', 'Village-Sapnawat ,Block- Dhaulana, District - Hapur, State - UP', 'Sector -34, Noida, UP', '', 1),
(25, 'aksh', 'akshay@gmail.com', 9888876466, NULL, '', '0000-00-00', '', '0000-00-00', NULL, '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_otp_verification`
--

CREATE TABLE `sq_otp_verification` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_otp_verification`
--

INSERT INTO `sq_otp_verification` (`id`, `agent_id`, `otp`, `status`) VALUES
(1, 0, 866944, 0),
(2, 0, 373461, 0),
(3, 0, 899302, 0),
(4, 0, 775574, 0),
(5, 0, 235935, 0),
(6, 21, 415845, 1),
(7, 21, 458890, 1),
(8, 21, 402124, 1),
(9, 21, 355141, 1),
(10, 21, 381863, 1),
(11, 18, 779488, 0);

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

--
-- Indexes for dumped tables
--

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
-- Indexes for table `sq_setting`
--
ALTER TABLE `sq_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sq_lead`
--
ALTER TABLE `sq_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sq_lead_unit`
--
ALTER TABLE `sq_lead_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sq_members`
--
ALTER TABLE `sq_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sq_otp_verification`
--
ALTER TABLE `sq_otp_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sq_setting`
--
ALTER TABLE `sq_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
