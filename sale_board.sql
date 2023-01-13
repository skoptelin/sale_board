-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2023 at 07:19 PM
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
  `discription` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` bigint NOT NULL,
  `user_id` int NOT NULL,
  `city` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `discription`, `picture`, `price`, `user_id`, `city`, `status_id`, `created_at`, `update_at`) VALUES
(1, 'test2511/2', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur molestiae minus tempora, velit, cumque repellendus modi libero unde qui commodi veniam praesentium odit ipsa explicabo dicta aut totam, a nemo.\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur molestiae minus tempora, velit, cumque repellendus modi libero unde qui commodi veniam praesentium odit ipsa explicabo dicta aut totam, a nemo.', 'files/1BA6.jpg', 5000000000, 1, 'Москва', 3, '2022-11-25 17:19:01', '2022-11-25 23:07:59'),
(11, 'Volkswagen Touareg II Рестайлинг', 'В отличном внешнем и техническом состоянии,2 владельца,ПТС оригинал,полностью обслужен,все ТО пройдены по регламенту, в отличной комплектации:\r\n\r\nR-LINE EXECUTIVE\r\n-Переключатель режимов движения\r\n-Полноцветный ЖК-монитор\r\n-Климат-контроль 3х-зонный\r\n-Датчик света\r\n-Датчик дождя\r\n-Электропривод передних сидений,с памятью положения\r\n-Пневмоподвеска\r\n-Сервопривод багажника\r\n-Адаптивный круиз-контроль', '	\nfiles/1200x900n3.jpg', 3307000, 7, 'Киров', 3, '2022-12-28 22:13:39', '2022-12-28 22:13:39'),
(13, 'Volkswagen Polo VI', 'Продаю машину срочно нужны деньги поэтому, один владелец осмотр метро Нахимовский проспект', 'files\\1200x900n.jpg', 2380000, 7, 'Киров', 3, '2022-12-29 00:43:58', '2022-12-29 00:43:58'),
(14, 'Volkswagen ID.4 X', 'Комплектация: Volkswagen Tiguan Respect 1.4 TSI 150hp 6DSG 4Motion\r\nОсновные опции: 2022, климат-контроль, аудио, ткань, airbags, ABS, ESP, светодиодные фары, центральный замок, электропривод стекол, электропривод зеркал, круиз-контроль, датчик дождя, обогрев сидений, литые диски, R17.\r\nЦвет кузова: Черный Deep Pearl.', 'files\\1200x900n4.jpg', 461000, 7, 'Йошкар-Ола', 3, '2022-12-29 00:43:58', '2022-12-29 00:43:58'),
(23, 'Volvo S60 II Рестайлинг', 'Один владелец, все документы обслуживания у официального дилера в наличии. Два комплекта резины, зимняя Continental WinterContact TS 850 P, резина представлена на фото, состояние новой, летняя Pirelli также в хорошем состоянии. Любые проверки приветствуются.', 'files/volvo.jpg', 1835000, 7, NULL, 3, '2023-01-05 18:04:34', '2023-01-05 18:04:34'),
(24, 'test', '123', 'files/geelymonjaro.jpg', 555555, 7, NULL, 3, '2023-01-05 21:42:21', '2023-01-06 19:14:37'),
(25, 'Volvo S60 II Рестайлинг', '123', 'files/volvo.jpg', 1835000, 7, NULL, 3, '2023-01-06 15:44:48', '2023-01-13 19:53:49'),
(28, 'BMW X4 30d II (G02)', '123234234', 'files/1200x900n.jpg', 1835000, 7, NULL, 3, '2023-01-13 20:02:01', '2023-01-13 20:02:44'),
(37, 'BMW X4 30d II (G02)', '1234314325', 'files/volvo.jpg', 1835000, 56, NULL, 3, '2023-01-13 22:16:13', '2023-01-13 22:16:13');

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
(28, 'test2911@1.ru', 'discription2911', '500', NULL, NULL, NULL, '2022-11-29 00:15:49', '2022-11-29 00:15:49'),
(30, 'warziher@yandex.ru', 'test1012', 'Stas', NULL, NULL, NULL, '2022-12-10 01:53:52', '2022-12-10 01:53:52'),
(31, 'warziher1@yandex.ru', 'test1012', 'Stas', NULL, NULL, NULL, '2022-12-10 01:58:18', '2022-12-10 01:58:18'),
(32, 'warziher2@yandex.ru', 'test1012', 'Stas', NULL, NULL, NULL, '2022-12-10 01:59:45', '2022-12-10 01:59:45'),
(33, 'warziher3@yandex.ru', 'test1012', 'Stas', NULL, NULL, NULL, '2022-12-10 02:06:26', '2022-12-10 02:06:26'),
(34, 'warziher4@yandex.ru', 'test1012', 'Stas', NULL, NULL, NULL, '2022-12-10 02:07:45', '2022-12-10 02:07:45'),
(35, 'test1012@mail.ru', '1012', 'Stas', NULL, NULL, NULL, '2022-12-10 02:14:03', '2022-12-10 02:14:03'),
(40, 'stan.koptelin@yandex.ru', 'qwer', 'Станислав Коптелин', NULL, NULL, NULL, '2022-12-10 02:46:54', '2022-12-10 02:46:54'),
(42, 'stan.koptelin123@yandex.ru', '12345', 'Станислав Коптелинaf', NULL, NULL, NULL, '2022-12-11 02:53:29', '2022-12-11 02:53:29'),
(43, 'stan.koptelin1612@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, NULL, '2022-12-16 00:13:12', '2022-12-16 00:13:12'),
(44, 'stan.koptelin1612/1@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, NULL, '2022-12-16 00:32:16', '2022-12-16 00:32:16'),
(45, 'stan.koptelin1612/2@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, NULL, '2022-12-16 00:33:19', '2022-12-16 00:33:19'),
(46, 'stan.koptelin1627/3@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, NULL, '2022-12-16 00:34:15', '2022-12-16 00:34:15'),
(47, 'stan.koptelin1612/4@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, NULL, '2022-12-16 00:39:32', '2022-12-16 00:39:32'),
(48, 'stan.koptelin1612/5@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, NULL, '2022-12-16 00:42:23', '2022-12-16 00:42:23'),
(49, 'stan.koptelin1612/6@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, ' 79877178412', '2022-12-16 00:44:29', '2022-12-16 00:44:29'),
(50, 'stan.koptelin1612/7@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, '+79877178412', '2022-12-16 00:52:31', '2022-12-16 00:52:31'),
(51, 'stan.koptelin1612/8@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, '+79877178412', '2022-12-16 00:55:40', '2022-12-16 00:55:40'),
(52, 'stan.koptelin1612/9@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, '+79877178412', '2022-12-16 00:57:50', '2022-12-16 00:57:50'),
(53, 'stan.koptelin1812@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, '+79877178412', '2022-12-18 19:56:20', '2022-12-18 19:56:20'),
(54, 'stan.koptelin1812/1@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, '+79877178412', '2022-12-18 19:58:35', '2022-12-18 19:58:35'),
(55, 'stan.koptelin2212@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, '+79877178412', '2022-12-22 00:24:06', '2022-12-22 00:24:06'),
(56, 'stan.koptelin1301@yandex.ru', '12345678', 'Станислав Коптелин', NULL, NULL, '+79877178412', '2023-01-13 22:15:26', '2023-01-13 22:15:26');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
