-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2022 at 09:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `discription` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `picture` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` bigint NOT NULL,
  `user_id` int NOT NULL,
  `city` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `status_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `discription`, `picture`, `price`, `user_id`, `city`, `status_id`, `created_at`, `update_at`) VALUES
(1, 'test2511/2', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur molestiae minus tempora, velit, cumque repellendus modi libero unde qui commodi veniam praesentium odit ipsa explicabo dicta aut totam, a nemo.\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur molestiae minus tempora, velit, cumque repellendus modi libero unde qui commodi veniam praesentium odit ipsa explicabo dicta aut totam, a nemo.', 'files/1BA6.jpg', 5000000000, 1, 'Москва', 3, '2022-11-25 17:19:01', '2022-11-25 23:07:59'),
(2, 'Объявление2', 'Описание', NULL, 100, 2, 'Йошкар-Ола', 3, '2022-11-25 17:19:01', '2022-11-25 17:19:01'),
(4, 'test2511', 'discription2511', 'files/tel.jfif', 321, 1, 'Краснодар', 3, '2022-11-25 22:08:58', '2022-11-25 22:08:58'),
(6, 'test2911', 'discription2911', 'files/1BA6.jpg', 500, 5, 'Москва', 3, '2022-11-29 00:07:53', '2022-11-29 00:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int NOT NULL,
  `status_name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `created_ad` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_name`, `created_ad`, `update_at`) VALUES
(1, 'draft', '2022-11-16 14:22:53', '2022-11-16 14:22:53'),
(2, 'review', '2022-11-16 14:22:53', '2022-11-16 14:22:53'),
(3, 'active', '2022-11-16 14:22:53', '2022-11-16 14:22:53'),
(4, 'completed', '2022-11-16 14:22:53', '2022-11-16 14:22:53'),
(5, 'rejected', '2022-11-16 14:22:53', '2022-11-16 14:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `avatar` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_num` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `birth_date`, `avatar`, `phone_num`, `created_at`, `update_at`) VALUES
(1, '123@123.ru', '123', 'Nikita3', '2022-11-01', NULL, '7988888888', '2022-11-14 15:14:06', '2022-11-16 14:43:00'),
(3, '1212@2121.ru', '123', 'sjfghsg', NULL, NULL, NULL, '2022-11-14 18:00:49', '2022-11-14 18:00:49'),
(4, '1212@21.ru', '123', 'sjfghsg', '2022-01-01', NULL, NULL, '2022-11-15 23:28:39', '2022-11-15 23:28:39'),
(5, '12@21.ru', '123', 'test', NULL, NULL, NULL, '2022-11-15 23:41:24', '2022-11-15 23:41:24'),
(6, 'test1611@1.ru', '123', 'test1611', NULL, NULL, NULL, '2022-11-16 15:10:10', '2022-11-16 15:10:10'),
(7, 'test1611@2.ru', '123', 'test1611', '2000-01-01', NULL, NULL, '2022-11-16 15:21:20', '2022-11-16 15:21:20'),
(9, 'test1611@3.ru', '123', 'test1611', '2000-01-01', NULL, NULL, '2022-11-16 15:26:29', '2022-11-16 15:26:29'),
(10, 'test1611@4.ru', '123', 'test1611', NULL, NULL, NULL, '2022-11-16 15:27:51', '2022-11-16 15:27:51'),
(11, 'test1611@5.ru', '123', 'test1611', '2000-01-01', NULL, NULL, '2022-11-16 15:35:02', '2022-11-16 15:35:02'),
(13, 'test1611@7.ru', '123', 'test1611', NULL, NULL, '799999999999', '2022-11-16 15:53:19', '2022-11-16 15:53:19'),
(14, 'test1811@6.ru', '123', 'test1811/1', NULL, NULL, '799999999999', '2022-11-16 16:05:45', '2022-11-18 17:59:38'),
(16, 'test1611@10.ru', '123', 'test1611', '2000-01-01', NULL, NULL, '2022-11-16 16:14:32', '2022-11-16 16:14:32'),
(17, 'test1811@2.ru', '1811/1', 'test1811/3', '2000-11-18', NULL, '7181120222', '2022-11-16 16:16:51', '2022-11-18 17:11:39'),
(18, 'test1611@12.ru', '123', 'test1611', '2000-01-01', NULL, '78989552121', '2022-11-16 16:17:24', '2022-11-16 16:17:24'),
(19, 'test1811@5.ru', '123', 'test1811', NULL, NULL, NULL, '2022-11-18 17:55:28', '2022-11-18 17:55:28'),
(20, 'test1811@7.ru', '123', 'test1811', NULL, NULL, NULL, '2022-11-18 18:42:13', '2022-11-18 18:42:13'),
(21, 'test1811@8.ru', '369', 'test1811', NULL, NULL, NULL, '2022-11-18 19:39:39', '2022-11-18 19:39:39'),
(23, 'test1811@9.ru', '369', 'test1811', NULL, NULL, NULL, '2022-11-18 19:41:56', '2022-11-18 19:41:56'),
(24, 'test1811@13.com', '369', 'test9999', '2000-01-01', NULL, '7999999999', '2022-11-18 19:51:56', '2022-11-18 22:40:44'),
(25, 'test2411@1.ru', '321', 'test2411', NULL, NULL, NULL, '2022-11-18 22:33:37', '2022-11-24 18:21:19'),
(26, 'test2411@2.ru', '321', 'test2411', NULL, NULL, NULL, '2022-11-24 19:48:25', '2022-11-24 19:48:25'),
(27, 'test2411@3.ru', '321', 'test2411', NULL, NULL, '79854514554', '2022-11-24 19:49:12', '2022-11-24 19:49:12'),
(28, 'test2911@1.ru', 'discription2911', '500', NULL, NULL, NULL, '2022-11-29 00:15:49', '2022-11-29 00:15:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEX_TITLE` (`title`),
  ADD KEY `INDEX_DISCRIPTION` (`discription`);

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
  ADD UNIQUE KEY `id` (`id`,`created_at`),
  ADD UNIQUE KEY `UNQ_EMAIL` (`email`),
  ADD KEY `INDEX_NAME` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
