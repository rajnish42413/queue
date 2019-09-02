-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 12:51 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queue`
--

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `called_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `queue_id`, `department_id`, `counter_id`, `user_id`, `number`, `called_date`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 2, 1, '2019-06-15', '2019-06-14 18:42:54', '2019-06-14 18:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor` int(11) NOT NULL,
  `dep` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `name`, `vendor`, `dep`, `created_at`, `updated_at`) VALUES
(1, 'COUNTER-1', 2, 2, '2019-06-13 20:35:12', '2019-06-13 20:35:12'),
(2, 'COUNTER-2', 2, 2, '2019-06-13 20:35:25', '2019-06-13 20:35:25'),
(3, 'COUNTER-3', 3, 3, '2019-06-13 20:35:39', '2019-06-13 20:35:39'),
(4, 'COUNTER-4', 3, 3, '2019-06-13 20:35:55', '2019-06-13 20:35:55'),
(5, 'COUNTER-5', 3, 3, '2019-06-13 20:36:08', '2019-06-13 20:36:08'),
(6, 'COUNTER-11', 2, 2, '2019-06-20 17:13:44', '2019-06-20 17:13:44'),
(7, 'dp counter-1', 2, 2, '2019-06-20 20:13:55', '2019-06-20 20:13:55'),
(8, 'test sub region', 3, 4, '2019-06-28 22:09:52', '2019-06-28 22:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `letter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` int(11) DEFAULT NULL,
  `start` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `vendor`, `name`, `letter`, `company`, `start`, `created_at`, `updated_at`) VALUES
(1, 3, 'DP-1', 'DP-1', 1, 1, '2019-06-13 20:34:27', '2019-06-13 20:34:27'),
(2, 2, 'DP-2', 'DP-2', 1, 2, '2019-06-13 20:34:53', '2019-06-13 20:34:53'),
(3, 3, 'DP-2 v-1', 'dv-1', 1, 2, '2019-06-20 06:57:07', '2019-06-20 06:57:07'),
(4, 3, 'DP-1 v-2', 'sc', 1, 2, '2019-06-20 17:10:49', '2019-06-20 17:10:49'),
(5, 7, 'db', '', 2, 12, '2019-06-28 18:05:34', '2019-06-28 18:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `display`, `image`, `created_at`, `updated_at`) VALUES
(1, 'gb', 'English', 'UK English Female', 'United-Kingdom.png', '2019-06-13 18:55:34', '2019-06-13 18:55:34'),
(2, 'tr', 'Turkish', 'Turkish Female', 'Turkey.png', '2019-06-13 18:55:34', '2019-06-13 18:55:34'),
(3, 'de', 'German', 'Deutsch Female', 'Germany.png', '2019-06-13 18:55:34', '2019-06-13 18:55:34'),
(4, 'es', 'Spanish', 'Spanish Female', 'Spain.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(5, 'fr', 'French', 'French Female', 'France.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(6, 'in', 'Hindi', 'Hindi Female', 'India.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(7, 'it', 'Italian', 'Italian Female', 'Italy.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(8, 'pt', 'Portuguese', 'Portuguese Female', 'Portugal.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(9, 'ru', 'Russian', 'Russian Female', 'Russia.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(10, 'sa', 'Arabic', 'Arabic Male', 'Saudi-Arabia.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(11, 'sk', 'Slovak', 'Slovak Female', 'Slovakia.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(12, 'th', 'Thai', 'Thai Female', 'Thailand.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35'),
(13, 'id', 'Indonesian', 'Indonesian Female', 'Indonesia.png', '2019-06-13 18:55:35', '2019-06-13 18:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_07_16_161740_create_departments_table', 1),
(4, '2016_07_16_180929_create_counters_table', 1),
(5, '2016_07_16_190715_create_queues_table', 1),
(6, '2016_07_19_170334_create_calls_table', 1),
(7, '2016_08_24_231859_create_languages_table', 1),
(8, '2016_09_28_123908_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `called` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `queues`
--

INSERT INTO `queues` (`id`, `department_id`, `number`, `called`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2019-06-13 20:41:10', '2019-06-13 20:41:10'),
(2, 1, 2, 0, '2019-06-13 20:45:24', '2019-06-13 20:45:24'),
(3, 1, 3, 0, '2019-06-13 20:45:41', '2019-06-13 20:45:41'),
(4, 2, 2, 0, '2019-06-13 20:46:44', '2019-06-13 20:46:44'),
(5, 1, 1, 1, '2019-06-14 18:40:03', '2019-06-14 18:42:54'),
(6, 1, 2, 0, '2019-06-14 18:40:49', '2019-06-14 18:40:49'),
(7, 1, 3, 0, '2019-06-14 18:40:56', '2019-06-14 18:40:56'),
(8, 1, 4, 0, '2019-06-14 18:41:03', '2019-06-14 18:41:03'),
(9, 3, 2, 0, '2019-06-20 17:02:01', '2019-06-20 17:02:01'),
(10, 2, 2, 0, '2019-06-21 19:03:20', '2019-06-21 19:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bus_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notification` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `over_time` int(11) DEFAULT NULL,
  `missed_time` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `language_id`, `name`, `bus_no`, `address`, `email`, `phone`, `location`, `notification`, `size`, `color`, `logo`, `over_time`, `missed_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'bmw india', '', 'ghaziabad ghaziabad', 'company_email@example.com', '984756375', '', 'hello every one', 35, '#2818f7', '', 20, 20, '2019-06-13 18:55:35', '2019-06-13 20:40:37'),
(2, 1, 'Rajnish singh', NULL, 'ghaziabad\r\nghaziabad', 'rajnish42413@gmail.com', '8808100876', '', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-28 18:27:53', '2019-06-28 18:27:53'),
(3, 1, 'Upstur India', NULL, 'SultanPur ,New Delhi  mmm', 'info@upstur.com', '', '', NULL, NULL, NULL, NULL, 12, 34, NULL, '2019-06-28 21:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'A-admin, V-vendor and U -end user ',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `created_by`, `password`, `remember_token`, `created_at`, `updated_at`, `company`) VALUES
(1, 'UPSTUR ', 'upsturadmin', 'your_email@rxample.com', 'SA', 0, '$2y$10$AOFakZKa1Ns1KO8bCmfJBeDy/j31HjuMdXbobinHNMY81stOq5NpK', 'tc5yLZNtBjvVJvGHYHGwrDtmTdiDlWHQXh8mRBgPdNI1C6YXzkuUZW3hq9Lu', '2019-06-13 18:55:34', '2019-06-30 20:07:07', 3),
(2, 'staff test', 'staff111', 'user1@gmial.com', 'S', 0, '$2y$10$HOy9.7xPLTg3WsnL0GNr..lbDUVlVlgxhwC2KfEs4JGViiddw/wUu', 'tEY9caaO0f1EoBC5ToIiiymsaVinbYw8zmdvPVSQmlKBqm1OIQUDP07rmrlp', '2019-06-13 20:39:43', '2019-06-13 20:44:03', 1),
(3, 'test user staff', 'staff222', 'staff222@gmail.com', 'S', 0, '$2y$10$bJBsRdMLafITDp5W/5m8iuy7nzEWW2/6KtymapTTsXCDm2MF1tkwG', NULL, '2019-06-14 18:47:15', '2019-06-14 18:47:15', 1),
(4, 'BMW NOIDA', 'bmwnoida', 'bmmnoida@gmail.com', 'VE', 0, '$2y$10$5Z3bGiZlnkCp6oNQBo9Jbu6w5OonaCUYZac1PM7EZd90kDagDzrvi', NULL, '2019-06-21 21:46:33', '2019-06-21 21:46:33', 1),
(5, 'BMW Super ADMIN', 'bmwadmin', 'bmwnoidaadmin@bmw.com', 'A', 1, '$2y$10$.j6oY7C07uyfWjuolvIAY.76nOl7OZgUlXI0Kl0y7JpWmWd79Nbhe', 'KYBW1SP5aBGGM3xGp10hTp4lMT7hyxeeUcXQYLu6kj13wSalJSnEIby5qFiE', '2019-06-24 18:31:51', '2019-06-28 19:09:14', 1),
(6, 'BMW ghaziabad', 'bmwgzb', 'bmwgzb@bmw.com', 'VE', 5, '$2y$10$18OpwHMMmH3rjTQI5e8hQOz4abSrZnpCAQ5JndiUaWpidFpDKgy96', NULL, '2019-06-24 20:11:38', '2019-06-24 20:11:38', 0),
(7, 'BMW Muradnagar', 'bmwmurad', 'bmmmuradnagar@gmail.com', 'VE', 5, '$2y$10$nDYbSCWo77poGWOXZFOOM.LzJAT2LlXA7BIJlc/ngRF7DkziTvlq2', NULL, '2019-06-24 20:13:00', '2019-06-24 20:13:00', 1),
(8, 'BMW ghaziabad staff 1', 'bmwgzbstaff1', 'bmwgzbstaff1@bmw.com', 'VS', 5, '$2y$10$gof1eMbfW7PgV/W8qA7VQezYzZygpOrx88o.J0J5HAgn5DVfTGJvi', NULL, '2019-06-24 20:18:34', '2019-06-24 20:18:34', 1),
(9, 'BMW ghaziabad staff 2', 'bmwgzbstaff2', 'bmwgzbstaff2@bmw.com', 'VS', 5, '$2y$10$2AlzOhQlSy22Vtag3hIw8.IOA.6OB/JBMop7chC4xb3ENUYAbrK4e', NULL, '2019-06-24 20:19:58', '2019-06-24 20:19:58', 1),
(10, 'bmw admin2', 'bmwadmin2', 'bmwadmin2@bmw.com', 'A', 5, '$2y$10$3HtyzWq82FOjbFbnHPVuLu5bNaq3.g4Xqb.u6hAyhr2QSvk2F.QDu', '4Aedenuhr3YB3xQ4epPlJAJjxJPqxaVvkCjiVGgfSObyw4ejN9X1M76xVDGt', '2019-06-24 20:26:06', '2019-06-24 20:30:23', 1),
(11, 'Rajnish singh', 'tezt12', 'rajnish42413@gmail.com', 'A', 5, '$2y$10$NAxSj6Tm1hzdW3r6un5/.uTsS/MGvvGZeyV2M1gIjLt5hK2cD6Qaq', NULL, '2019-06-28 18:55:56', '2019-06-28 18:55:56', 1),
(12, 'test 11', 'test1111', 'test111@gmail.com', 'VE', 5, '$2y$10$p03j9t/cJosaMiClx9erOenNEBWZhWT22zuNsotRiqvltLj6z3byS', 'iyot1cOECt1GsnMRYUs6rKTAVYc8Sc71ssSiJDY3nsHYaxk1uUNR4DR6ilHw', '2019-06-28 19:04:42', '2019-06-28 19:47:22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calls_queue_id_foreign` (`queue_id`),
  ADD KEY `calls_department_id_foreign` (`department_id`),
  ADD KEY `calls_counter_id_foreign` (`counter_id`),
  ADD KEY `calls_user_id_foreign` (`user_id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queues_department_id_foreign` (`department_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_language_id_foreign` (`language_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `queues`
--
ALTER TABLE `queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calls`
--
ALTER TABLE `calls`
  ADD CONSTRAINT `calls_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`),
  ADD CONSTRAINT `calls_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `calls_queue_id_foreign` FOREIGN KEY (`queue_id`) REFERENCES `queues` (`id`),
  ADD CONSTRAINT `calls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `queues`
--
ALTER TABLE `queues`
  ADD CONSTRAINT `queues_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
