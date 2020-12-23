-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 08:35 AM
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
(1, 'Admin', 'admin@square.com', '0e7517141fb53f21ee439b355b5a1d0a', 'Aakash', 'shishodia', 9643293050, '2020-12-09', '', 'A215, Beta-1, Greater Noida, Gauta, UP', 'WIN_20190223_21_22_35_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sq_lead`
--

CREATE TABLE `sq_lead` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `assign_to` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `alt_phone` bigint(20) NOT NULL,
  `property_address` text NOT NULL,
  `client_address` text NOT NULL,
  `remark` text NOT NULL,
  `reference` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_lead`
--

INSERT INTO `sq_lead` (`id`, `name`, `assign_to`, `email`, `phone`, `alt_phone`, `property_address`, `client_address`, `remark`, `reference`, `date`, `status`) VALUES
(1, 'Aakash shishodia', '', 'aakash143only4u@gmail.com', 9643293056, 7467034417, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', ' Greater Noida, Gautam Buddha Nagar, UP', 'tgggggggggggggggggg', 'tgrgrh', '2020-12-08 09:24:39', 0),
(4, 'Aakash shishodia', ' ', 'aakash143only4u@gmail.com', 9643293056, 9643293056, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', 'rtrtt5t5tfg', 'aaaaaaaaaaaaaa', '2020-12-21 10:19:56', 1);

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

INSERT INTO `sq_members` (`id`, `name`, `email`, `phone`, `alt_phone`, `gender`, `dob`, `joining_date`, `resignation_date`, `aadhar`, `pan`, `permanent`, `correspondence`, `profile_image`, `status`) VALUES
(15, 'Aakash shishodia', 'mayank123@gmail.com', 7467034417, 7467034417, 'Male', '2020-12-01', '2020-12-03', NULL, 'Aakash_Shishodia_resume.pdf', 'Aakash_Shishodia_resume (1).pdf', 'Village-Sapnawat ,', 'Block- Dhaulana', '', 1),
(16, 'Aakash shishodia', 'aakash143only4u@gmail.com', 9643293056, 0, '', '2020-12-03', '0000-00-00', NULL, 'Aakash_Shishodia_resume_(1)1.pdf', 'Aakash_Shishodia_resume1.pdf', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '', '', 0),
(17, 'Vikas Shishodia', 'aakash143243243only4u@gmail.com', 9643293056, 0, 'Male', '2020-12-02', '0000-00-00', NULL, 'Aakash_Shishodia_resume.pdf', 'Aakash_Shishodia_resume_(1).pdf', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '', '', 1),
(18, 'sunny rana', 'singh@gmail.com', 6395840017, 0, '', '2020-11-30', '2020-12-23', NULL, 'Aakash_Shishodia_resume1.pdf', 'Aakash_Shishodia_resume_(1)1.pdf', 'VILLAGE- DHARAMPUR 15 BISWA, POST- BHATIYANA, BLOCK- DHAULANA, DISTRIC- HAPUR', '', '', 1),
(19, 'mahesh', 'aakash143only4u@gmail.com', 9643293056, 0, '', '2020-12-01', '2020-12-23', NULL, 'Aakash_Shishodia_resume2.pdf', 'Aakash_Shishodia_resume_(1)2.pdf', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '', '', 1),
(20, 'abhi', 'vikas12@gmail.com', 7467034417, 0, '', '2020-12-01', '2020-12-23', NULL, 'Aakash_Shishodia_resume_(1)2.pdf', 'Aakash_Shishodia_resume2.pdf', 'Village-karimpur Bhaipur, tehsil- dhaulana, Block- Dhaulana , Distric- hapur', '', '', 1),
(21, 'dgfvhbdfnv', 'aakash143only4u@gmail.com', 8859423143, 0, '', '2020-12-02', '2020-12-23', NULL, 'Aakash_Shishodia_resume4.pdf', 'Aakash_Shishodia_resume3.pdf', 'Village-Sapnawat ,Block- Dhaulana, District - Hapur, State - UP', 'Sector -34, Noida, UP', '', 1);

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
(1, 'kritak', 'We fulfill your Dream', 'kritak_logo.png', 'admin@square.com', 'agent@kritak.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sq_lead`
--
ALTER TABLE `sq_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_members`
--
ALTER TABLE `sq_members`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sq_members`
--
ALTER TABLE `sq_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sq_setting`
--
ALTER TABLE `sq_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
