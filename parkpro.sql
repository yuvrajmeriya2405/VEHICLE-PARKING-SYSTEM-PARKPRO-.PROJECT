-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2024 at 07:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `parking_customer`
--

CREATE TABLE `parking_customer` (
  `cu_id` int(11) NOT NULL,
  `ca_id` int(11) NOT NULL,
  `cu_name` varchar(70) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `ps_id` int(11) NOT NULL,
  `v_indate_time` datetime NOT NULL,
  `v_outdate_time` datetime NOT NULL,
  `t_park_duration` int(6) NOT NULL,
  `p_charges` decimal(12,2) NOT NULL,
  `v_status` enum('in','out') NOT NULL DEFAULT 'in',
  `mobile_no` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_customer`
--

INSERT INTO `parking_customer` (`cu_id`, `ca_id`, `cu_name`, `vehicle_number`, `ps_id`, `v_indate_time`, `v_outdate_time`, `t_park_duration`, `p_charges`, `v_status`, `mobile_no`) VALUES
(20, 1, 'Meriya Yuvraj', 'GJ-14 AB 0005', 11, '2024-10-11 22:24:00', '2024-10-12 22:42:00', 24, 1920.00, 'out', 2147483647),
(21, 1, 'Popat meet', 'gj-14 ak 2025', 5, '2024-10-10 22:25:00', '2024-10-11 22:44:00', 24, 1920.00, 'out', 2147483647),
(22, 1, 'pandya sumukh ', 'gj-15 bh 5468', 1, '2024-10-11 23:00:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(23, 1, 'CHAUHAN JENIL', 'gj-03 ak 2415', 12, '2024-10-03 22:27:00', '2024-10-04 23:00:00', 24, 1920.00, 'out', 2147483647),
(24, 1, 'bhatti prince', 'gj-01 bj 5478', 13, '2024-10-05 22:28:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(25, 1, 'bhuva bhavin', 'gj-15 ba 2005', 14, '2024-09-12 22:29:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(26, 4, 'padaliya harsh', 'gj-14 bj 2541', 4, '2024-10-10 22:30:00', '2024-10-12 22:45:00', 48, 960.00, 'out', 968532147),
(27, 4, 'MAHETA ABHISHEKH ', 'gj-14 kj 4568', 19, '2024-10-08 22:30:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(28, 4, 'makawana shailesh', 'gj-02 fj 5469', 20, '2024-10-12 22:31:00', '2024-10-13 20:45:00', 22, 440.00, 'out', 2147483647),
(29, 4, 'makawana abhay', 'gj-05 vj 2135', 21, '2024-10-03 22:32:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(30, 4, 'maheta darpit', 'gj-01 ak 5400', 23, '2024-10-01 22:33:00', '2024-10-02 12:45:00', 14, 280.00, 'out', 2147483647),
(31, 4, 'ramavat kapil', 'gj-30 pk 5426', 25, '2024-10-14 22:34:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(32, 14, 'faganiya axshat', 'gj-04 gb 5487', 27, '2024-09-05 22:35:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(33, 14, 'dobariya bhautik', 'gj-20 vh 2587', 28, '2024-10-18 22:36:00', '2024-10-19 19:46:00', 21, 840.00, 'out', 2147483647),
(34, 14, 'boricha jayraj', 'gj-38 dd 2564 ', 29, '2024-10-03 22:37:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(36, 14, 'bhaliya khushal', 'gj-18 dh 2587', 30, '2024-10-11 22:40:00', '2024-10-12 18:58:00', 20, 800.00, 'out', 2147483647),
(37, 14, 'mandal zahid', 'gj-34 fj 4789', 31, '2024-10-01 22:40:00', '0000-00-00 00:00:00', 0, 0.00, 'in', 2147483647),
(38, 14, 'gohil jayesh', 'gj-11 fj 5784', 32, '2024-10-03 22:41:00', '2024-10-10 22:46:00', 168, 6720.00, 'out', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `parking_slot`
--

CREATE TABLE `parking_slot` (
  `ps_id` int(11) NOT NULL,
  `ca_id` int(11) NOT NULL,
  `ps_name` varchar(20) NOT NULL,
  `ps_status` enum('Available','Not_Available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_slot`
--

INSERT INTO `parking_slot` (`ps_id`, `ca_id`, `ps_name`, `ps_status`) VALUES
(1, 1, 'FW-3', 'Not_Available'),
(4, 4, 'TW-1', 'Available'),
(5, 1, 'FW-2', 'Available'),
(6, 4, 'TW-2', 'Not_Available'),
(11, 1, 'FW-1', 'Available'),
(12, 1, 'FW-4', 'Available'),
(13, 1, 'FW-5', 'Not_Available'),
(14, 1, 'FW-6', 'Not_Available'),
(15, 1, 'FW-7', 'Available'),
(16, 1, 'FW-8', 'Available'),
(17, 1, 'FW-9', 'Available'),
(18, 1, 'FW-10', 'Available'),
(19, 4, 'TW-3', 'Not_Available'),
(20, 4, 'TW-4', 'Available'),
(21, 4, 'TW-5', 'Not_Available'),
(22, 1, 'TW-6', 'Available'),
(23, 4, 'TW-7', 'Available'),
(24, 1, 'TW-8', 'Available'),
(25, 4, 'TW-9', 'Not_Available'),
(26, 4, 'TW-10', 'Available'),
(27, 14, 'thw-1', 'Not_Available'),
(28, 14, 'thw-2', 'Available'),
(29, 14, 'thw-3', 'Not_Available'),
(30, 14, 'thw-4', 'Available'),
(31, 14, 'thw-5', 'Not_Available'),
(32, 14, 'thw-6', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `p_a`
--

CREATE TABLE `p_a` (
  `id` int(5) NOT NULL,
  `e_adress` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_a`
--

INSERT INTO `p_a` (`id`, `e_adress`, `password`) VALUES
(1, 'admin12@gmail.com', 'Admin@12');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`ca_id`, `ca_name`) VALUES
(1, 'Four Wheelers'),
(4, 'Two Wheelers'),
(14, 'THREE WHEELER');

-- --------------------------------------------------------

--
-- Table structure for table `p_duration_price`
--

CREATE TABLE `p_duration_price` (
  `price_id` int(11) NOT NULL,
  `ca_id` int(11) NOT NULL,
  `price_value` double(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_duration_price`
--

INSERT INTO `p_duration_price` (`price_id`, `ca_id`, `price_value`) VALUES
(3, 4, 20.00),
(4, 1, 80.00),
(5, 14, 40.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parking_customer`
--
ALTER TABLE `parking_customer`
  ADD PRIMARY KEY (`cu_id`),
  ADD KEY `cid` (`ca_id`),
  ADD KEY `psid` (`ps_id`);

--
-- Indexes for table `parking_slot`
--
ALTER TABLE `parking_slot`
  ADD PRIMARY KEY (`ps_id`),
  ADD KEY `ps` (`ca_id`);

--
-- Indexes for table `p_a`
--
ALTER TABLE `p_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `p_duration_price`
--
ALTER TABLE `p_duration_price`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `price` (`ca_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parking_customer`
--
ALTER TABLE `parking_customer`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `parking_slot`
--
ALTER TABLE `parking_slot`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `p_a`
--
ALTER TABLE `p_a`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `p_duration_price`
--
ALTER TABLE `p_duration_price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parking_customer`
--
ALTER TABLE `parking_customer`
  ADD CONSTRAINT `cid` FOREIGN KEY (`ca_id`) REFERENCES `p_category` (`ca_id`),
  ADD CONSTRAINT `psid` FOREIGN KEY (`ps_id`) REFERENCES `parking_slot` (`ps_id`);

--
-- Constraints for table `parking_slot`
--
ALTER TABLE `parking_slot`
  ADD CONSTRAINT `ps` FOREIGN KEY (`ca_id`) REFERENCES `p_category` (`ca_id`);

--
-- Constraints for table `p_duration_price`
--
ALTER TABLE `p_duration_price`
  ADD CONSTRAINT `price` FOREIGN KEY (`ca_id`) REFERENCES `p_category` (`ca_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
