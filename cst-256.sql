-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 04, 2021 at 09:14 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cst-256`
--

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
(8, '2021_08_25_230251_create_users_table', 1),
(9, '2014_10_12_000000_create_users_table', 2),
(10, '2014_10_12_100000_create_password_resets_table', 2),
(11, '2021_08_26_003657_create_users_table', 3),
(12, '2021_08_26_010539_create_users_table', 4),
(13, '2021_08_26_011917_create_users_table', 5),
(14, '2021_08_26_013509_create_users_table', 6),
(15, '2019_08_19_000000_create_failed_jobs_table', 7),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(17, '2021_08_26_202156_create_users_table', 7),
(18, '2021_09_01_134249_create_users_table', 8),
(19, '2021_09_03_202627_create_user_demographic_table', 9);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `admin`, `email`, `created_at`, `updated_at`) VALUES
(1, 'patdalcia', 'Patrick', 'Garcia', '$2y$10$x0oGcXE1K/WrmkUl8LKf9.hD5EWWJdsx.Et90q6qnGeRFMHbAgEgW', 1, 'Email@email.com', '2021-09-01 20:59:25', '2021-09-01 20:59:25'),
(2, 'test', 'test', 'test', '$2y$10$4O.qt1crwR2eEfxewKHQY.nwJKHR/s6.n9xrFPoUfQYaBw7v7JsJy', 0, 'testEmail@email.com', '2021-09-01 21:10:52', '2021-09-05 03:48:38'),
(32, 't', 't', 't', '$2y$10$3lTehFZ/2cH4TtoLCusid.Veu5S3HBf4F1PxeJXwhsHIpKHAtXmda', 0, 't@email.com', '2021-09-03 06:19:01', '2021-09-05 04:07:14'),
(33, 'q', 'q', 'q', '$2y$10$Cwg7P2IJCH2ODXxdYTykoOr5WnZVCKtGtoDF5oEHdUU5vvXv1QPXa', 0, 'q@email.com', '2021-09-03 06:55:20', '2021-09-03 06:55:20'),
(34, 'w', 'w', 'w', '$2y$10$67YqpbYEUaqOIm2C2tyRb.Jsav0TUgxrlTAuwuKoFxmjIknVR2txe', 0, 'w@email.com', '2021-09-03 06:55:30', '2021-09-03 06:55:30'),
(35, 'e', 'ee', 'e', '$2y$10$o253c2zIPm/170lVTDnFl.v.itFvLj55a5DqojBWWzA.11Heg7Nfy', 0, 'e@email.com', '2021-09-03 06:55:45', '2021-09-03 06:55:45'),
(36, 'test1', 'FirstName1', 'LastName1', 'password', 0, 'email1@email.com', NULL, NULL),
(37, 'test2', 'FirstName2', 'LastName2', 'password', 0, 'email2@email.com', NULL, NULL),
(38, 'test3', 'FirstName3', 'LastName3', 'password', 0, 'email3@email.com', NULL, NULL),
(39, 'test4', 'FirstName4', 'LastName4', 'password', 0, 'email4@email.com', NULL, NULL),
(40, 'test5', 'FirstName5', 'LastName5', 'password', 0, 'email5@email.com', NULL, NULL),
(41, 'test6', 'FirstName6', 'LastName6', 'password', 0, 'email6@email.com', NULL, NULL),
(42, 'test7', 'FirstName7', 'LastName7', 'password', 0, 'email7@email.com', NULL, NULL),
(43, 'test8', 'FirstName8', 'LastName8', 'password', 0, 'email8@email.com', NULL, NULL),
(44, 'test9', 'FirstName9', 'LastName9', 'password', 0, 'email9@email.com', NULL, NULL),
(45, 'test10', 'FirstName10', 'LastName10', 'password', 0, 'email10@email.com', NULL, NULL),
(46, 'test11', 'FirstName11', 'LastName11', 'password', 0, 'email11@email.com', NULL, NULL),
(47, 'test12', 'FirstName12', 'LastName12', 'password', 0, 'email12@email.com', NULL, NULL),
(48, 'test13', 'FirstName13', 'LastName13', 'password', 0, 'email13@email.com', NULL, NULL),
(49, 'test14', 'FirstName14', 'LastName14', 'password', 0, 'email14@email.com', NULL, NULL),
(50, 'TEST15', 'FirstName15', 'LastName15', '$2y$10$ZHP9OMZ25GTKLin4RRAt2eN9A1pv7jAYGk2kc0tiXx3fDY.9QSQ/q', 0, 'email15@email.com', NULL, '2021-09-03 07:14:44'),
(51, 'QWERTY', 'QWERT', 'QWERT', '$2y$10$UfzpN8gjq/dQWTktX34Xl.aF1F.EIz63jFI/rPEAMxM0l5n6dR.5S', 0, 'QWERT@email.com', '2021-09-03 07:13:51', '2021-09-03 07:14:17'),
(52, 'Z', 'Z', 'Z', '$2y$10$3SRBZLRhNCf0uPvKAcMrG.k9G4Vl0hsTP4YGqJ5TRwzu.AgE2Tnkq', 0, 'Z@email.com', '2021-09-03 07:54:11', '2021-09-03 07:54:11'),
(53, 'd', 'd', 'd', '$2y$10$ev9NhCR/bsHttRHM2RMRlOxbrxaS.eF7.q75vR.0G2mlQG7dVAQ1u', 0, 'd@email.com', '2021-09-05 04:07:57', '2021-09-05 04:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_demographics`
--

CREATE TABLE `user_demographics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) NOT NULL,
  `education` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interests` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_demographics`
--

INSERT INTO `user_demographics` (`id`, `gender`, `age`, `education`, `interests`, `country`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Male', 25, 'Test Education', 'Test Interests', 'US', 2, '2021-09-04 20:30:33', '2021-09-05 03:43:01'),
(2, 'Female', 33, 'NA', 'NA', 'US', 32, '2021-09-05 04:07:14', '2021-09-05 04:07:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_demographics`
--
ALTER TABLE `user_demographics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_demographic_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_demographics`
--
ALTER TABLE `user_demographics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_demographics`
--
ALTER TABLE `user_demographics`
  ADD CONSTRAINT `user_demographic_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
