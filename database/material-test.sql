-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 19, 2022 at 08:41 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `material-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Metal', NULL, '2022-11-19 09:17:32', '2022-11-19 14:50:40'),
(2, 'Rubber and Elastomers', NULL, '2022-11-19 09:19:21', '2022-11-19 09:22:04'),
(3, 'Stone, plaster, and cement', NULL, '2022-11-19 09:20:23', '2022-11-19 09:21:16'),
(4, 'Textile fibres and other fibres', NULL, '2022-11-19 09:22:39', '2022-11-19 09:22:39'),
(5, 'Wood and cork', NULL, '2022-11-19 09:54:23', '2022-11-19 14:50:12'),
(6, 'Leather and raw hides', NULL, '2022-11-19 13:25:48', '2022-11-19 13:25:48'),
(7, 'Glass', NULL, '2022-11-19 13:26:06', '2022-11-19 13:26:06'),
(8, 'Ceramic', NULL, '2022-11-19 13:26:35', '2022-11-19 14:50:32'),
(9, 'Test', NULL, '2022-11-19 14:52:22', '2022-11-19 14:52:22');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `category_id`, `name`, `balance`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 8, 'clays', 50.00, NULL, '2022-11-19 13:30:42', '2022-11-19 13:30:42'),
(2, 8, 'refractory', 100.00, NULL, '2022-11-19 13:31:18', '2022-11-19 13:31:18'),
(3, 8, 'frit', 90.00, NULL, '2022-11-19 13:31:21', '2022-11-19 13:31:21'),
(4, 8, 'oxide', 140.00, NULL, '2022-11-19 13:32:02', '2022-11-19 13:32:02'),
(5, 7, 'optical', 30.00, NULL, '2022-11-19 13:33:43', '2022-11-19 13:33:43'),
(6, 6, 'feathers', 25.00, NULL, '2022-11-19 13:34:09', '2022-11-19 13:34:09'),
(7, 5, 'straw', 11.00, NULL, '2022-11-19 13:34:47', '2022-11-19 13:38:01'),
(8, 3, 'plaster', 92.00, NULL, '2022-11-19 13:35:48', '2022-11-19 13:35:48'),
(9, 2, 'natural', 45.00, NULL, '2022-11-19 13:36:23', '2022-11-19 13:36:23'),
(10, 1, 'iron', 28.00, NULL, '2022-11-19 13:36:48', '2022-11-19 13:36:48'),
(11, 4, 'chlorofibre', 19.00, NULL, '2022-11-19 13:37:32', '2022-11-19 13:37:32'),
(12, 5, 'chipwood', 31.00, NULL, '2022-11-19 13:38:50', '2022-11-19 13:38:50'),
(13, 5, 'cork', 3.00, NULL, '2022-11-19 13:39:10', '2022-11-19 13:39:10'),
(14, 5, 'esparto', 29.00, NULL, '2022-11-19 13:39:30', '2022-11-19 13:39:30'),
(15, 5, 'cane', 27.00, NULL, '2022-11-19 13:40:01', '2022-11-19 13:40:01'),
(16, 4, 'acrylic', 22.00, NULL, '2022-11-19 13:40:36', '2022-11-19 13:40:36'),
(17, 3, 'gypsum', 6.00, NULL, '2022-11-19 13:41:03', '2022-11-19 13:41:03'),
(18, 3, 'cement', 5.00, NULL, '2022-11-19 13:41:33', '2022-11-19 13:41:33'),
(19, 1, 'steel', 100.00, NULL, '2022-11-19 13:42:40', '2022-11-19 13:42:40'),
(20, 1, 'aluminium', 22.00, '2022-11-19 13:46:49', '2022-11-19 13:43:06', '2022-11-19 13:46:49'),
(21, 1, 'bronze', 111.00, NULL, '2022-11-19 13:43:27', '2022-11-19 13:46:36');

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
(5, '2022_11_17_124228_create_categories_table', 2),
(6, '2022_11_18_150251_create_materials_table', 3),
(7, '2022_11_19_120546_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `category_id`, `material_id`, `quantity`, `date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 10.00, '2022-11-19', NULL, '2022-11-19 13:48:15', '2022-11-19 13:48:15'),
(2, 1, 19, -20.00, '2022-10-30', NULL, '2022-11-19 13:50:48', '2022-11-19 13:50:48'),
(3, 6, 6, 33.00, '2022-10-30', NULL, '2022-11-19 14:01:42', '2022-11-19 14:01:42');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Orville Hyatt', 'arowe@example.net', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FNY52CYrNM2FGACK8c4RkwfM2yskmQxMhE49VFw0Km5RzDQFq71XBTxZfNdM', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(2, 'Adolf Hoppe IV', 'alvena84@example.org', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Vtt2zzYl1W', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(3, 'Magnolia Goodwin', 'dharvey@example.net', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KC9K8Svish', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(4, 'Dr. Oral Wisozk', 'zthiel@example.org', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BeNKOUdYpK', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(5, 'Marcellus Green', 'jerod.king@example.org', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aLdIA4M9h9', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(6, 'Dr. Krystel Dicki DDS', 'ncronin@example.com', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'w0XIgTkD3Q', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(7, 'Hazle Wuckert DDS', 'stanton.bennie@example.org', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '30AM1pQ12v', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(8, 'Blanche Yundt', 'laury.hilpert@example.net', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pL3SZrOouH', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(9, 'Aileen Willms', 'murray.colt@example.net', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3bZLU4yTPF', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(10, 'Prof. Jaylen Reichert DDS', 'hadley.waelchi@example.org', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ioK8doUOLT', '2022-11-17 05:12:07', '2022-11-17 05:12:07'),
(11, 'Test User', 'test@example.com', '2022-11-17 05:12:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0t0I37HGCwuvfHEmy77iwe6xOcXmOdB8koVpbKgaZqohcc0cajyL95tztI5w', '2022-11-17 05:12:07', '2022-11-17 05:12:07');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_name_unique` (`name`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
