-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 01:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sacramental_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `baptismal_records`
--

CREATE TABLE `baptismal_records` (
  `id` int(11) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `baptism_date` date NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `godparents` varchar(255) NOT NULL,
  `priest_name` varchar(255) NOT NULL,
  `baptism_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baptismal_records`
--

INSERT INTO `baptismal_records` (`id`, `child_name`, `dob`, `birth_place`, `gender`, `baptism_date`, `father_name`, `mother_name`, `address`, `godparents`, `priest_name`, `baptism_time`) VALUES
(1, 'mike', '2025-04-07', 'camagong', 'Female', '2025-04-30', 'kakang', 'abing', ' camagong', 'rokrok', 'fr.babano', '04:37:00'),
(2, 'mikerey', '2025-04-06', 'camagong', 'Male', '2025-04-30', 'rokrok', 'rochelle', ' camagong', 'kakang', 'fr.babano', '16:44:00'),
(3, 'derek', '2025-04-08', 'camagong', 'Male', '2025-04-30', 'kakang', 'rochelle', 'sta.ana', 'rokrok', 'fr.babano', '04:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `communion_records`
--

CREATE TABLE `communion_records` (
  `id` int(11) NOT NULL,
  `participant_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `school_grade` varchar(200) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `communion_date` date NOT NULL,
  `priest_name` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `communion_records`
--

INSERT INTO `communion_records` (`id`, `participant_name`, `dob`, `gender`, `school_grade`, `guardian_name`, `contact`, `communion_date`, `priest_name`, `address`) VALUES
(2, 'derek', '2025-04-01', 'Male', '5', 'asdsd', '09395502214', '2025-04-30', 'fr.babano', 'sta.ana');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_records`
--

CREATE TABLE `confirmation_records` (
  `id` int(11) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `godparents` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `contact` varchar(255) NOT NULL,
  `confirmation_date` date NOT NULL,
  `confirmation_time` time NOT NULL,
  `priest_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmation_records`
--

INSERT INTO `confirmation_records` (`id`, `child_name`, `birth_place`, `dob`, `gender`, `godparents`, `father_name`, `mother_name`, `address`, `contact`, `confirmation_date`, `confirmation_time`, `priest_name`) VALUES
(1, 'Reina', 'camagong', '2025-04-01', 'Female', 'rokrok', 'kakang', 'abing', ' camagong', '09395502214', '2025-04-30', '16:33:00', 'fr.babano'),
(2, 'Reina', 'camagong', '2025-04-01', 'Female', 'rokrok', 'kakang', 'abing', ' camagong', '09395502214', '2025-04-30', '16:33:00', 'fr.babano'),
(3, 'Reina', 'camagong', '2025-04-01', 'Female', 'rokrok', 'kakang', 'abing', ' camagong', '09395502214', '2025-04-30', '16:33:00', 'fr.babano'),
(4, 'Reina', 'camagong', '2025-04-01', 'Female', 'rokrok', 'kakang', 'abing', ' camagong', '09395502214', '2025-04-30', '16:33:00', 'fr.babano');

-- --------------------------------------------------------

--
-- Table structure for table `marriage_records`
--

CREATE TABLE `marriage_records` (
  `id` int(11) NOT NULL,
  `groom_name` varchar(100) NOT NULL,
  `groom_dob` date NOT NULL,
  `groom_address` varchar(255) NOT NULL,
  `bride_name` varchar(255) NOT NULL,
  `bride_dob` date NOT NULL,
  `bride_address` varchar(255) NOT NULL,
  `marriage_date` date NOT NULL,
  `marriage_time` time NOT NULL,
  `priest_name` varchar(255) NOT NULL,
  `witnesses` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriage_records`
--

INSERT INTO `marriage_records` (`id`, `groom_name`, `groom_dob`, `groom_address`, `bride_name`, `bride_dob`, `bride_address`, `marriage_date`, `marriage_time`, `priest_name`, `witnesses`, `location`) VALUES
(1, 'derek', '2025-04-02', 'sta.ana', 'siya', '2025-03-31', 'punta', '2025-04-29', '17:42:00', 'fr.babano', 'rokrok', ''),
(3, 'jaleel', '2025-04-01', 'sta.ana', 'sila', '2025-04-01', 'punta', '2025-04-30', '17:49:00', 'fr.babano', 'rokrok', 'Saint Michael the Archangel Parish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baptismal_records`
--
ALTER TABLE `baptismal_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communion_records`
--
ALTER TABLE `communion_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmation_records`
--
ALTER TABLE `confirmation_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marriage_records`
--
ALTER TABLE `marriage_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baptismal_records`
--
ALTER TABLE `baptismal_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `communion_records`
--
ALTER TABLE `communion_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `confirmation_records`
--
ALTER TABLE `confirmation_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marriage_records`
--
ALTER TABLE `marriage_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
