-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 07:56 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

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
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_admin`
--

INSERT INTO `sq_admin` (`role_id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@square.com', 'e6e061838856bf47e1de730719fb2609');

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
  `property_address` text NOT NULL,
  `client_address` text NOT NULL,
  `role` varchar(200) NOT NULL,
  `remark` text NOT NULL,
  `other_info` text NOT NULL,
  `reference` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sq_members`
--

INSERT INTO `sq_members` (`id`, `name`, `email`, `phone`, `alt_phone`, `property_address`, `client_address`, `role`, `remark`, `other_info`, `reference`, `date`, `status`) VALUES
(1, 'Aakash shishodia', 'aakash143only4u@gmail.com', 9643293056, 7467034417, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', ' Greater Noida, Gautam Buddha Nagar, UP', 'Manager', 'tgggggggggggggggggg', 'rgewgrg', 'tgrgrh', '2020-12-04 11:09:49', 1);

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
-- AUTO_INCREMENT for table `sq_members`
--
ALTER TABLE `sq_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sq_roles`
--
ALTER TABLE `sq_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
