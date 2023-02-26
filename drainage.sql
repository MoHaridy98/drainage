-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 01:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drainage`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `acre` int(11) NOT NULL,
  `carat` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `net_acre` int(11) DEFAULT NULL,
  `net_carat` int(11) DEFAULT NULL,
  `net_share` int(11) DEFAULT NULL,
  `total_cost` float NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `has_changed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `acre`, `carat`, `share`, `net_acre`, `net_carat`, `net_share`, `total_cost`, `verified`, `has_changed`, `created_at`, `updated_at`) VALUES
(1, 'منطقة فطيرة', 7, 7, 7, 20, 20, 20, 7000, 1, 0, '2023-01-16 07:24:52', '2023-02-23 06:50:21'),
(8, 'A', 65, 56, 56, 12, 12, 12, 6500, 1, 0, '2023-01-17 10:35:41', '2023-02-23 06:50:27'),
(9, 'B', 2, 31, 43, 1, 40, 21, 2000, 1, 0, '2023-01-19 05:50:32', '2023-02-23 06:50:33'),
(10, 'C', 23, 21, 12, NULL, NULL, NULL, 213, 1, 0, '2023-01-19 07:33:37', '2023-02-15 05:30:25'),
(12, 'D', 4, 4, 4, NULL, NULL, NULL, 445, 1, 0, '2023-02-15 08:11:02', '2023-02-15 08:13:20'),
(13, 'F', 5, 4654, 34, NULL, NULL, NULL, 5000, 1, 0, '2023-02-15 08:11:23', '2023-02-23 06:50:41'),
(16, 'E', 23, 234, 23, NULL, NULL, NULL, 234, 1, 0, '2023-02-15 08:12:07', '2023-02-23 06:50:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
