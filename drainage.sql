-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 12:17 PM
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
-- Table structure for table `agricultural_association`
--

CREATE TABLE `agricultural_association` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `region_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agricultural_association`
--

INSERT INTO `agricultural_association` (`id`, `name`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'جمعية 1', 2, '2023-01-29 08:28:08', '2023-02-05 07:10:23'),
(2, 'جمعية 2', 1, '2023-01-29 08:29:39', '2023-02-05 07:10:39'),
(3, 'جمعية 3', 2, '2023-01-29 08:32:24', '2023-02-05 07:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `Total_installment` float NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`Total_installment`, `farmer_id`, `project_id`, `created_at`, `updated_at`) VALUES
(100, 14, 9, '2023-02-08 09:37:40', '2023-02-08 10:53:57'),
(500.5, 15, 9, '2023-02-08 10:24:34', '2023-02-08 10:53:57'),
(150, 16, 9, '2023-02-08 10:23:50', '2023-02-08 10:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'اسوان', NULL, NULL),
(2, 'دراو', NULL, NULL),
(3, 'نصر النوبة', NULL, NULL),
(4, 'كوم امبو', NULL, NULL),
(5, 'ادفو', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `excution` date NOT NULL,
  `area_initial` date NOT NULL,
  `area_final` date DEFAULT NULL,
  `tax_initial` date DEFAULT NULL,
  `tax_final` date DEFAULT NULL,
  `opposition_start` date DEFAULT NULL,
  `opposition_end` date DEFAULT NULL,
  `enclose_start` date DEFAULT NULL,
  `enclose_end` date DEFAULT NULL,
  `view_start` date DEFAULT NULL,
  `view_end` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`id`, `excution`, `area_initial`, `area_final`, `tax_initial`, `tax_final`, `opposition_start`, `opposition_end`, `enclose_start`, `enclose_end`, `view_start`, `view_end`, `end`, `project_id`, `created_at`, `updated_at`) VALUES
(5, '2023-01-01', '2023-01-12', '2023-01-03', '2023-01-12', '2023-01-05', '2023-01-11', '2023-01-11', '2023-01-19', '2023-01-28', '2023-01-10', '2023-02-02', '2023-02-28', 9, '2023-01-19 07:50:32', '2023-02-08 07:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `acre` int(11) NOT NULL,
  `carat` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `association_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `name`, `acre`, `carat`, `share`, `association_id`, `created_at`, `updated_at`) VALUES
(14, 'سيبالبيابي', 2, 3, 5, 1, '2023-01-30 07:06:24', '2023-01-30 07:06:24'),
(15, 'محمد', 5, 4, 3, 1, '2023-01-30 07:06:24', '2023-02-05 08:39:30'),
(16, 'ثصق', 3, 2, 5, 2, '2023-01-30 07:06:24', '2023-01-30 07:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `installment`
--

CREATE TABLE `installment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `project_id` int(11) NOT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `installment`
--

INSERT INTO `installment` (`id`, `date`, `amount`, `project_id`, `farmer_id`, `created_at`, `updated_at`) VALUES
(7, '2023-02-08', 250, 9, NULL, NULL, NULL),
(8, '2023-02-14', 500, 9, NULL, '2023-02-14 07:49:07', '2023-02-14 07:49:07'),
(9, '2023-02-06', 125, 9, NULL, '2023-02-14 07:55:29', '2023-02-14 07:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, 'aaaaa', 2, 31, 43, 1, 40, 21, 2000, 1, 0, '2023-01-19 07:50:32', '2023-02-08 07:18:13'),
(10, 'sadfasd', 23, 21, 12, NULL, NULL, NULL, 213, 0, 1, '2023-01-19 09:33:37', '2023-01-24 07:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'منطقة أ', 1, NULL, NULL),
(2, 'منطقة ب', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mokhtar', 'mmelnobey92@gmail.com', NULL, '$2y$10$gcxBv.fUHqx9a2NrqyqivO2By7zS4SCe60A50SjOOw5DzAl1gMBVO', NULL, '2023-01-16 06:39:26', '2023-01-16 06:39:26'),
(2, 'Mohammad', 'moharidy98@gmail.com', NULL, '$2y$10$Ssw9wjIrG8DQ2A07r6KkWObmVFX8JbKhE.OT8rjFbczHaaseLgko.', 'q1Gvs8qWNo25tZrIUOamMtFYFydWVwAw1wt9710PIbLA4ODIyxfpk48hgFRu', '2023-01-16 09:07:14', '2023-01-16 09:07:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agricultural_association`
--
ALTER TABLE `agricultural_association`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`farmer_id`,`project_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `association_id` (`association_id`);

--
-- Indexes for table `installment`
--
ALTER TABLE `installment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agricultural_association`
--
ALTER TABLE `agricultural_association`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `installment`
--
ALTER TABLE `installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agricultural_association`
--
ALTER TABLE `agricultural_association`
  ADD CONSTRAINT `agricultural_association_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Constraints for table `benefits`
--
ALTER TABLE `benefits`
  ADD CONSTRAINT `benefits_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `benefits_ibfk_3` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`);

--
-- Constraints for table `installment`
--
ALTER TABLE `installment`
  ADD CONSTRAINT `installment_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `installment_ibfk_3` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`);

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
