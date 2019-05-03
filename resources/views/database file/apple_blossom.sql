-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 06:36 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apple_blossom`
--

-- --------------------------------------------------------

--
-- Table structure for table `block_unblock`
--

CREATE TABLE `block_unblock` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('Block','Unblock') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(250) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `city_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'indore', 'Active', '2019-04-27 00:00:00', '2019-04-27 07:28:36'),
(2, 1, 'indored', 'Active', '2019-04-27 08:27:11', '2019-04-27 08:27:11'),
(3, 3, 'in cityddd', 'Active', '2019-04-27 09:44:49', '2019-04-27 05:05:04'),
(4, 2, 'Sitapur', 'Active', '2019-04-28 08:23:19', '2019-04-28 02:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'India', 'Active', '2019-04-17 00:00:00', '2019-04-27 08:18:53'),
(2, 'pak', 'Active', '2019-04-17 00:00:00', '2019-04-17 21:25:34'),
(3, 'ingland', 'Active', '2019-04-19 04:44:32', '2019-04-19 04:46:20'),
(4, 'gsfdg', 'Inactive', '2019-04-19 04:45:58', '2019-04-18 23:47:15'),
(5, 'Americc', 'Active', '2019-04-25 01:38:28', '2019-04-27 01:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_name` varchar(250) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Madhya Pradeshd', 'Active', '2019-04-25 00:00:00', '2019-04-27 10:25:48'),
(2, 1, 'up', 'Active', '2019-04-27 06:58:10', '2019-04-28 08:22:57'),
(3, 2, 'my state', 'Active', '2019-04-27 07:22:52', '2019-04-28 03:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL COMMENT '1 for admin, 2 for owner, 3 fro customer',
  `contact_no` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `block_unblock` enum('Block','Unblock') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `first_name`, `last_name`, `user_type`, `contact_no`, `email`, `password`, `status`, `block_unblock`) VALUES
(1, '2019-04-15 18:30:00', '2019-04-28 08:02:41', 'admin', 'admin', 1, '1234567896', 'admin@admin.com', '$2y$10$PUPwqzfMp7/55Cr2YzLHZeIlYXdDBfSMJiztJ26R9r3eXuUjO6exG', 'Active', NULL),
(2, '2019-04-21 06:56:14', NULL, 'rakesh', 'patel', 2, 'asdf', 'af', 'asdf', 'Active', 'Unblock'),
(3, '2019-04-21 06:56:27', '2019-04-23 20:54:29', 'asdf', 'asdf', 2, 'asdf', 'asdf', 'asdf', 'Active', 'Block'),
(4, '2019-04-21 06:59:04', '2019-04-28 02:52:29', 'fadsf', 'afasd', 2, 'adsf', 'adf', 'asdfa', 'Active', 'Block'),
(5, '2019-04-21 21:16:00', '2019-04-28 06:22:19', 'afadsf', 'afsdfasd', 2, '9632587415', 'vikas.kavyasoftech@gmail.com', '$2y$10$PUPwqzfMp7/55Cr2YzLHZeIlYXdDBfSMJiztJ26R9r3eXuUjO6exG', 'Active', 'Unblock'),
(6, '2019-04-21 22:46:33', '2019-04-23 21:16:48', 'vikas', 'kushwah', 2, '9632587412', 'owner@gmail.com', '$2y$10$PUPwqzfMp7/55Cr2YzLHZeIlYXdDBfSMJiztJ26R9r3eXuUjO6exG', 'Active', 'Unblock'),
(7, '2019-04-22 20:29:16', '2019-04-24 20:06:24', 'vikas', 'payguest', 3, '1234569874', 'paying@gmail.com', '$2y$10$k9OqwfXiB4kF655vjyAodO4tvu9DEtpOjZ4OqIgwrVMutE.flQEKG', 'Active', 'Unblock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block_unblock`
--
ALTER TABLE `block_unblock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`,`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block_unblock`
--
ALTER TABLE `block_unblock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
