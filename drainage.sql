-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 01:26 PM
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
(1, 'جمعية 1', 1, NULL, NULL),
(2, 'جمعية 2', 2, NULL, NULL),
(3, 'جمعية 3', 1, '2023-02-09 10:23:23', '2023-02-23 06:51:18'),
(5, 'جمعية 4', 1, '2023-02-22 08:04:59', '2023-02-23 06:51:37'),
(6, 'جمعية 5', 2, '2023-02-23 06:52:38', '2023-02-23 06:52:38');

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
(500, 1, 1, '2023-02-22 10:07:27', '2023-02-22 10:26:21'),
(1500, 1, 9, '2023-02-09 09:14:12', '2023-02-22 09:26:51'),
(6500, 2, 1, '2023-02-09 09:14:33', '2023-02-22 10:30:52'),
(3000, 2, 9, '2023-02-22 09:43:07', '2023-02-22 10:02:05'),
(250, 4, 1, '2023-02-22 10:26:21', '2023-02-22 10:26:21'),
(500, 4, 9, '2023-02-22 09:26:51', '2023-02-22 09:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'أسوان'),
(2, 'ادفو');

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
(3, '2023-01-05', '2023-01-04', '2023-01-19', '2023-01-04', '2023-01-19', '2023-01-19', '2023-01-19', '2023-01-19', '2023-01-19', '2023-01-19', '2023-01-19', '2023-01-13', 8, '2023-01-18 11:36:32', '2023-02-23 06:50:27'),
(7, '2023-02-16', '2023-02-15', NULL, '2023-02-15', '2023-02-15', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17', 10, '2023-02-15 05:29:47', '2023-02-15 05:30:25'),
(9, '2022-12-31', '2022-12-31', NULL, '2022-12-31', '2023-02-09', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-07', 12, '2023-02-15 08:11:02', '2023-02-15 08:13:20'),
(20, '2023-02-28', '2023-02-28', '2023-02-13', '2023-02-28', '2023-03-04', '2023-02-10', '2023-02-09', '2023-02-09', '2023-02-20', '2023-02-13', '2023-01-30', '2023-02-28', 1, '2023-02-23 05:49:49', '2023-02-23 06:50:21'),
(23, '2023-02-22', '2023-02-22', NULL, '2023-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27', 13, '2023-02-23 06:25:49', '2023-02-23 06:50:41'),
(24, '2023-02-16', '2023-02-07', NULL, '2023-02-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10', 16, '2023-02-23 06:27:12', '2023-02-23 06:50:46'),
(29, '2023-02-10', '2023-02-23', NULL, '2023-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10', 9, '2023-02-23 06:44:07', '2023-02-23 06:50:33');

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
(1, 'تلا', 6, 6, 6, 1, '2023-01-31 06:22:12', '2023-01-31 06:22:12'),
(2, 'yry', 5, 4, 3, 2, '2023-01-31 06:22:12', '2023-01-31 06:22:12'),
(3, 'سبسيبسيب', 4, 3, 2, 3, '2023-02-09 10:24:11', '2023-02-09 10:24:11'),
(4, 'يبيبلب', 4, 4, 4, 1, '2023-02-09 10:24:11', '2023-02-09 10:43:47');

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
(2, '2023-03-02', 5000, 1, NULL, '2023-02-14 08:33:41', '2023-02-14 08:33:41'),
(3, '2023-02-08', 750, 9, NULL, '2023-02-22 06:16:36', '2023-02-22 06:16:36'),
(4, '2023-02-20', 250, 9, NULL, '2023-02-22 07:10:00', '2023-02-22 07:10:00');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_19_094141_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(11) NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'App\\Models\\User',
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 1, NULL, '2023-02-26 06:22:06'),
(2, 'App\\Models\\User', 2, NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'agr', 'web', NULL, NULL),
(2, 'agr.create', 'web', NULL, NULL),
(3, 'agr.edit', 'web', NULL, NULL),
(4, 'farmer', 'web', NULL, NULL),
(5, 'farmar.create', 'web', NULL, NULL),
(6, 'farmar.edite', 'web', NULL, NULL),
(7, 'report.all', 'web', NULL, NULL),
(8, 'report.print', 'web', NULL, NULL),
(9, 'report', 'web', NULL, NULL),
(10, 'report.sewage', 'web', NULL, NULL),
(11, 'report.space', 'web', NULL, NULL),
(12, 'sewage.create', 'web', NULL, NULL),
(13, 'sewage.edit', 'web', NULL, NULL),
(14, 'sewage', 'web', NULL, NULL),
(15, 'space.create', 'web', NULL, NULL),
(16, 'space.dues', 'web', NULL, NULL),
(17, 'space', 'web', NULL, NULL),
(18, 'taxes.create', 'web', NULL, NULL),
(19, 'taxes.dues', 'web', NULL, NULL),
(20, 'taxes', 'web', NULL, NULL),
(21, 'home', 'web', NULL, NULL),
(23, 'users', 'web', NULL, NULL),
(24, 'users.add', 'web', NULL, NULL),
(25, 'users.edit', 'web', NULL, NULL),
(26, 'roles', 'web', NULL, NULL),
(27, 'roles.add', 'web', NULL, NULL),
(28, 'roles.edit', 'web', NULL, NULL);

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
(1, 'منطقة فطيرة', 7, 7, 7, 20, 20, 20, 7000, 1, 0, '2023-01-16 07:24:52', '2023-02-23 06:50:21'),
(8, 'A', 65, 56, 56, 12, 12, 12, 6500, 1, 0, '2023-01-17 10:35:41', '2023-02-23 06:50:27'),
(9, 'B', 2, 31, 43, 1, 40, 21, 2000, 1, 0, '2023-01-19 05:50:32', '2023-02-23 06:50:33'),
(10, 'C', 23, 21, 12, NULL, NULL, NULL, 213, 1, 0, '2023-01-19 07:33:37', '2023-02-15 05:30:25'),
(12, 'D', 4, 4, 4, NULL, NULL, NULL, 445, 1, 0, '2023-02-15 08:11:02', '2023-02-15 08:13:20'),
(13, 'F', 5, 4654, 34, NULL, NULL, NULL, 5000, 1, 0, '2023-02-15 08:11:23', '2023-02-23 06:50:41'),
(16, 'E', 23, 234, 23, NULL, NULL, NULL, 234, 1, 0, '2023-02-15 08:12:07', '2023-02-23 06:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `city_id`) VALUES
(1, 'منطقة 1', 1),
(2, 'منطقة 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'super_admin', 'web', '2023-02-19 08:50:46', '2023-02-19 08:50:46'),
(6, 'الصرف', 'web', '2023-02-22 08:01:09', '2023-02-22 08:01:09'),
(7, 'المساحة', 'web', '2023-02-22 08:42:27', '2023-02-22 08:42:27'),
(8, 'الزراعة', 'web', '2023-02-22 08:44:01', '2023-02-22 08:44:01'),
(9, 'الضرائب', 'web', '2023-02-22 08:44:50', '2023-02-22 08:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 8),
(2, 2),
(2, 8),
(3, 2),
(3, 8),
(4, 2),
(4, 8),
(5, 2),
(5, 8),
(6, 2),
(6, 8),
(7, 2),
(7, 6),
(7, 7),
(8, 2),
(8, 6),
(8, 7),
(9, 2),
(9, 6),
(9, 7),
(10, 2),
(10, 6),
(11, 2),
(11, 6),
(12, 2),
(12, 6),
(13, 2),
(13, 7),
(14, 2),
(14, 7),
(15, 2),
(15, 7),
(16, 2),
(16, 9),
(17, 2),
(17, 9),
(18, 2),
(18, 7),
(19, 2),
(20, 2),
(21, 2),
(21, 6),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2);

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
  `role` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `state`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad', 'moharidy98@gmail.com', NULL, '$2y$10$YJRnjdDZ7NnJipe6IDnubuuKuSGCtQeXglGa2hlghmO4OWynrmrWK', '2', 1, NULL, '2023-02-23 07:06:50', '2023-02-26 06:22:06'),
(2, 'Admin', 'mmelnobey92@gmail.com', NULL, '$2y$10$Ssw9wjIrG8DQ2A07r6KkWObmVFX8JbKhE.OT8rjFbczHaaseLgko.', 'super_admin', 1, NULL, '2023-02-19 08:50:49', '2023-02-20 09:47:26');

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
  ADD PRIMARY KEY (`farmer_id`,`project_id`),
  ADD KEY `project_id` (`project_id`);

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
  ADD UNIQUE KEY `project_id_2` (`project_id`),
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `installment`
--
ALTER TABLE `installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `benefits_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`),
  ADD CONSTRAINT `benefits_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `date`
--
ALTER TABLE `date`
  ADD CONSTRAINT `date_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `installment`
--
ALTER TABLE `installment`
  ADD CONSTRAINT `installment_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `installment_ibfk_2` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `model_has_roles_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
