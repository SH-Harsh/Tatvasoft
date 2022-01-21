-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 21, 2022 at 08:47 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helperland`
--

-- --------------------------------------------------------

--
-- Table structure for table `account details`
--

CREATE TABLE `account details` (
  `user_id` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Mobile No` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `additional account details`
--

CREATE TABLE `additional account details` (
  `user_id` int(11) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Street Name` varchar(255) NOT NULL,
  `House No` int(11) NOT NULL,
  `Poastal Code` int(11) NOT NULL,
  `City` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blocklist`
--

CREATE TABLE `blocklist` (
  `customer_id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact us`
--

CREATE TABLE `contact us` (
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Phone No` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `current service request`
--

CREATE TABLE `current service request` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourite sp`
--

CREATE TABLE `favourite sp` (
  `customer_id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `On time arrival` int(11) NOT NULL,
  `Friendly` int(11) NOT NULL,
  `Quality of Service` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service accepted`
--

CREATE TABLE `service accepted` (
  `service_provider_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service details`
--

CREATE TABLE `service details` (
  `service_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` time NOT NULL,
  `Extras` varchar(255) NOT NULL,
  `Comments` text NOT NULL,
  `Pets` tinyint(1) NOT NULL,
  `Total Payment` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service history`
--

CREATE TABLE `service history` (
  `service_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `service provider id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `service_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account details`
--
ALTER TABLE `account details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `additional account details`
--
ALTER TABLE `additional account details`
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blocklist`
--
ALTER TABLE `blocklist`
  ADD KEY `customer_id_fk` (`customer_id`),
  ADD KEY `service_provider_id_fk` (`service_provider_id`);

--
-- Indexes for table `contact us`
--
ALTER TABLE `contact us`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `current service request`
--
ALTER TABLE `current service request`
  ADD KEY `service_id_fk` (`service_id`,`status`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `favourite sp`
--
ALTER TABLE `favourite sp`
  ADD KEY `customer_id_fk` (`customer_id`),
  ADD KEY `service_provider_id_fk` (`service_provider_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD KEY `service_id_fk` (`service_id`);

--
-- Indexes for table `service accepted`
--
ALTER TABLE `service accepted`
  ADD KEY `service_provider_id_fk` (`service_provider_id`),
  ADD KEY `service_id_fk` (`service_id`);

--
-- Indexes for table `service details`
--
ALTER TABLE `service details`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `service history`
--
ALTER TABLE `service history`
  ADD KEY `service_id_fk` (`service_id`,`status`),
  ADD KEY `service provider fk` (`service provider id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD KEY `service_id_fk` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account details`
--
ALTER TABLE `account details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact us`
--
ALTER TABLE `contact us`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service details`
--
ALTER TABLE `service details`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional account details`
--
ALTER TABLE `additional account details`
  ADD CONSTRAINT `additional account details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account details` (`user_id`);

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account details` (`user_id`);

--
-- Constraints for table `blocklist`
--
ALTER TABLE `blocklist`
  ADD CONSTRAINT `blocklist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `account details` (`user_id`),
  ADD CONSTRAINT `blocklist_ibfk_2` FOREIGN KEY (`service_provider_id`) REFERENCES `account details` (`user_id`);

--
-- Constraints for table `current service request`
--
ALTER TABLE `current service request`
  ADD CONSTRAINT `current service request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account details` (`user_id`),
  ADD CONSTRAINT `current service request_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service details` (`service_id`);

--
-- Constraints for table `favourite sp`
--
ALTER TABLE `favourite sp`
  ADD CONSTRAINT `favourite sp_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `account details` (`user_id`),
  ADD CONSTRAINT `favourite sp_ibfk_2` FOREIGN KEY (`service_provider_id`) REFERENCES `account details` (`user_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service history` (`service_id`);

--
-- Constraints for table `service accepted`
--
ALTER TABLE `service accepted`
  ADD CONSTRAINT `service accepted_ibfk_1` FOREIGN KEY (`service_provider_id`) REFERENCES `account details` (`user_id`),
  ADD CONSTRAINT `service accepted_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service details` (`service_id`);

--
-- Constraints for table `service details`
--
ALTER TABLE `service details`
  ADD CONSTRAINT `service details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account details` (`user_id`);

--
-- Constraints for table `service history`
--
ALTER TABLE `service history`
  ADD CONSTRAINT `service history_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `status` (`service_id`),
  ADD CONSTRAINT `service history_ibfk_2` FOREIGN KEY (`service provider id`) REFERENCES `account details` (`user_id`),
  ADD CONSTRAINT `service history_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`service_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service details` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
