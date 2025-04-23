-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 06:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_sela@email.com|127.0.0.1', 'i:1;', 1742745515),
('laravel_cache_sela@email.com|127.0.0.1:timer', 'i:1742745515;', 1742745515);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hot', '1744388511.jpg', '2025-04-08 16:59:34', '2025-04-13 15:12:32', NULL),
(2, 'Drink', '1744533258.jpg', '2025-04-08 17:07:15', '2025-04-13 08:34:18', NULL),
(3, 'Tea', '1744533555.jpg', '2025-04-08 17:10:28', '2025-04-13 08:39:15', NULL),
(4, 'others', '1744132499.jpg', '2025-04-08 17:14:59', '2025-04-13 07:43:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_22_124739_create_positions_table', 2),
(5, '2025_03_23_040855_create_statuses_table', 3),
(6, '2025_03_23_041839_create_status_table', 4),
(7, '2025_04_08_180850_create_categorys_table', 5),
(8, '2025_04_14_150252_create_orders_table', 6),
(9, '2025_04_14_194729_create_products_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('dara_sok@email.com', '$2y$12$q90XZE1qk8Mq6K9syTdXCuk1DAcKAS/jd3/nBErYeLMe6Yv8gpJMu', '2025-03-10 07:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '2025-03-22 12:57:58', '2025-03-22 12:58:05', NULL),
(2, 'user', '2025-03-22 12:58:27', '2025-03-22 12:58:31', NULL),
(3, 'assistant', '2025-03-22 15:39:18', '2025-03-28 05:56:43', NULL),
(4, 'IT', '2025-03-25 08:51:44', '2025-03-28 05:32:17', '2025-03-28 12:32:17'),
(5, 'other', '2025-04-02 00:03:25', '2025-04-02 00:03:25', NULL),
(6, 'other', '2025-04-02 00:05:20', '2025-04-02 00:05:39', '2025-04-02 07:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `created_at`, `updated_at`, `description`, `photo`) VALUES
(1, 'hot latte', 1.5, 1, '2025-04-14 13:03:38', '2025-04-16 13:25:52', NULL, '1744809952.jpg'),
(2, 'hot mocha', 1.5, 1, '2025-04-14 13:04:11', '2025-04-16 13:26:05', NULL, '1744809965.jpg'),
(3, 'cappuccino frappe', 1.75, 2, '2025-04-14 13:10:31', '2025-04-16 13:26:20', 'frappe', '1744809980.jpg'),
(4, 'chocolate frappe', 1.75, 2, '2025-04-14 13:11:09', '2025-04-16 13:26:39', 'frapee', '1744809999.jpg'),
(5, 'black milk tea', 1.25, 3, '2025-04-14 13:14:42', '2025-04-16 13:26:52', 'milk tea', '1744810012.jpg'),
(6, 'olong milk tea', 1.25, 3, '2025-04-14 13:16:01', '2025-04-16 13:36:26', 'milk tea', '1744810586.jpg'),
(7, 'strawberry smoothie', 1.75, 2, '2025-04-16 12:06:24', '2025-04-16 13:24:44', 'frappe', '1744809884.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UTepLWQMJbbFkKTtSKlMyK0vnrObrvGf1FsajWIJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQVRmNTVTNE1hTHdheWhLamU2dTF3UDJzU3N2TFlNQW1QWnFSRDlsUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jcmVhdGUtY2F0ZWdvcnkiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0NDgxMDQxMjt9fQ==', 1744814643);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(50) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 'pending', '2025-03-23 04:20:40', '2025-04-03 20:44:05', NULL, NULL),
(2, 'active', '2025-03-23 04:20:59', '2025-04-03 20:54:38', NULL, NULL),
(3, 'inactive', '2025-03-23 04:21:31', '2025-04-03 20:54:49', NULL, NULL),
(4, 'others', '2025-04-02 00:07:21', '2025-04-03 20:47:07', NULL, NULL),
(5, 'ss', '2025-04-03 09:18:47', '2025-04-04 04:19:44', '2025-04-04 11:19:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` varchar(50) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status_id`, `created_by`, `updated_by`, `position_id`, `deleted_at`, `deleted_by`) VALUES
(1, 'sok seyha', 'seyha@email.com', NULL, '$2y$12$6ync/ZbB.VA3xUnquNXE3OCB./SxmVn6rZwniPjSkRBk9mQ081Wmy', NULL, '2025-03-22 06:21:30', '2025-03-22 06:21:30', 2, NULL, NULL, 1, NULL, NULL),
(4, 'sok pisey', 'pisey@email.com', NULL, '$2y$12$qn9V15Nri6t9GziqYXB4M.3LWBngoNRpgwNWHK2.fMx/GxP8B5SsC', NULL, '2025-03-22 21:39:19', '2025-04-05 01:46:56', 1, NULL, NULL, 2, NULL, NULL),
(5, 'pon vann', 'vann@email.com', NULL, '$2y$12$0/QCSMiDVbJvP2oXLySfLOhnLAdUJ4sLk.uYSmfE/WnNMF8wGe50G', NULL, '2025-03-23 08:53:02', '2025-03-23 09:05:55', 1, NULL, NULL, 2, '2025-03-23 16:05:55', NULL),
(6, 'pon vann', 'vann123@email.com', NULL, '$2y$12$Ps5ypxjiiKCemxvAwEj7KekW1g6lbWIjvcLeEFM3yQ7ZTSq0UYuKW', NULL, '2025-03-28 06:34:42', '2025-03-28 07:55:36', 1, NULL, NULL, 2, NULL, NULL),
(7, 'sok samnang', 'samnang@emaiil.com', NULL, '$2y$12$66br7H2syM4iweNj46OY5.OAtdcFQ/tCuLyT6eyVH.7ZiLcFmwmS6', NULL, '2025-04-04 16:38:32', '2025-04-04 16:38:32', 1, NULL, NULL, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `pos_frkey` (`position_id`),
  ADD KEY `sta_frkey` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `pos_frkey` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sta_frkey` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
