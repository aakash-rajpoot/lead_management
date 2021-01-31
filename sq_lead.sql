-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 03:58 PM
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
-- Table structure for table `sq_lead`
--

CREATE TABLE `sq_lead` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `assign_to` varchar(500) NOT NULL,
  `assign_to_email` varchar(255) NOT NULL,
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

INSERT INTO `sq_lead` (`id`, `name`, `assign_to`, `assign_to_email`, `assign_date`, `email`, `phone`, `alt_phone`, `property_address`, `client_address`, `available_unit`, `remark`, `reference`, `lead_date`, `status`) VALUES
(1, 'Aakash shishodia', '', '', NULL, 'aakash143only4u@gmail.com', 9643293056, 7467034417, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', ' Greater Noida, Gautam Buddha Nagar, UP', '', 'tgggggggggggggggggg', 'tgrgrh', '2020-12-08 09:24:39', 0),
(4, 'Aakash shishodia11', 'dgfvhbdfnv [aakash143only4u@gmail.com]', 'aakash143only4u@gmail.com', '2021-01-31', 'aakash143only4u@gmail.com', 9643293056, 9643293056, 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1BHK (1234 sq.ft), 1BHK (400 sq.yard), 1BHK (450 sq.ft)', 'rtrtt5t5tfg', 'aaaaaaaaaaaaaa', '2020-12-24 12:59:45', 1),
(5, 'supertech', 'dgfvhbdfnv [aakash143only4u@gmail.com]', 'aakash143only4u@gmail.com', '2021-01-31', 'aakash143only4u@gmail.com', 8859423143, 0, 'noida ', 'Village-Sapnawat ,Block- Dhaulana, District - Hapur, State - UP\r\nSector -34, Noida, UP', '', ' ', '', '2020-12-24 15:31:23', 1),
(6, 'Aakash shishodia', 'aksh [akshay@gmail.com]', 'akshay@gmail.com', '2021-01-31', 'aakash143123only4u@gmail.com', 9643293056, 0, 'migsun', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1BHK (400 sq.yard), 1BHK (450 sq.ft), 2BHK (1000 sq.ft)', ' ', '', '2020-12-27 12:08:32', 1),
(8, 'Aakash shishodia112', 'dgfvhbdfnv [aakash143only4u@gmail.com]', 'aakash143only4u@gmail.com', '2021-01-31', 'aakash143only4u@gmail.com', 9643293056, 0, 'sdsfdsf', 'A215, Beta-1, Greater Noida, Gautam Buddha Nagar, UP', '1, 2, 4', '', '', '2021-01-05 12:53:48', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sq_lead`
--
ALTER TABLE `sq_lead`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sq_lead`
--
ALTER TABLE `sq_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
