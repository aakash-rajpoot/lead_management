-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 01:01 PM
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
(1, 'Admin', 'admin@square.com', '0e7517141fb53f21ee439b355b5a1d0a', 'Aakash', 'shishodia', 9643293056, '2020-12-09', 'Female', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', 'WIN_20190223_21_22_35_Pro2.jpg');

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
(4, 'Aakash shishodia', ' ', 'aakash143only4u@gmail.com', 9643293056, 9643293056, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', 'rtrtt5t5tfg', 'tgrgrh', '2020-12-15 15:02:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_members`
--

CREATE TABLE `sq_members` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `alt_phone` bigint(20) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `role` varchar(200) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_members`
--

INSERT INTO `sq_members` (`id`, `name`, `email`, `phone`, `alt_phone`, `gender`, `dob`, `role`, `joining_date`, `status`) VALUES
(4, 'Aakash shishodia', 'aakash143only4u@gmail.com', 9643293056, 6395840017, 'Male', '2020-12-02', 'Manager', '2020-12-07 18:30:00', 0),
(7, 'Aakash shishodia', 'aakash14333only4u@gmail.com', 9643293056, 6395840017, 'Male', '2020-12-02', 'Manager', '2020-12-01 18:30:00', 1),
(8, 'Aakash shishodia', 'aakash142343only4u@gmail.com', 9643293056, 6395840017, 'Male', '2020-12-10', 'Supervisors', '2020-12-01 18:30:00', 1),
(9, 'Aakash shishodia', 'aakash14312only4u@gmail.com', 9643293056, 7467034417, 'Male', '2020-12-02', 'Supervisors', '2020-12-07 18:30:00', 1),
(10, 'mahesh', 'mahesh@gmail.com', 9643293056, 8859423143, 'Male', '2020-12-01', 'Team Leader', '2020-12-01 18:30:00', 1),
(12, 'Aakash shishodia', 'aakashq142343453only4u@gmail.com', 8859423143, 0, '', '2020-11-30', 'Team Leader', '0000-00-00 00:00:00', 1),
(13, 'Vikas Shishodia', 'vikky@gmail.com', 8859423143, 0, '', '2020-12-02', 'Sales', '0000-00-00 00:00:00', 1),
(14, 'sunny rana', 'sunny123@gmail.com', 6395840017, 0, '', '2020-12-03', 'Manager', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sq_roles`
--

CREATE TABLE `sq_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `sq_roles`
--
ALTER TABLE `sq_roles`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sq_roles`
--
ALTER TABLE `sq_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
