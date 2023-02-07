-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2023 at 11:57 AM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment5`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_title` varchar(200) DEFAULT NULL,
  `product_description` varchar(250) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `product_tags` varchar(250) DEFAULT NULL,
  `status` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1' COMMENT '(1 Active Status,2 Inactive Status)',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_description`, `category_id`, `category_name`, `product_image`, `product_tags`, `status`, `created_date`) VALUES
(6, 'Mansih asdfsaf', 'sadjg', 6, NULL, '', 'sfd', '2', '2023-02-03 08:51:53'),
(7, 'dfg', 'fghgf', 10, NULL, 'regis.jpeg', 'fhb', '2', '2023-02-03 11:16:40'),
(8, 'test', 'dasfasdf', 4, NULL, 'Screenshot from 2022-11-17 14-52-34.png', 'asdfasf', '1', '2023-02-03 12:52:03'),
(9, 'dfg', 'dfg', 6, NULL, '', 'dfdsf', '1', '2023-02-06 06:53:17'),
(10, 'da', 'sadsd', 9, NULL, 'reg.png', '#df', '1', '2023-02-06 10:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `users_id` int DEFAULT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `status` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1' COMMENT '(1 as Active, 2 as Inactive)',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `users_id`, `category_name`, `status`, `created_date`) VALUES
(6, 1, 'Flowers', '2', '2023-02-02 05:55:41'),
(8, 16, 'Vegetables', '2', '2023-02-03 06:16:16'),
(9, 16, 'Manish', '1', '2023-02-03 08:16:11'),
(10, 17, 'Bird', '1', '2023-02-03 11:16:25'),
(11, 20, '', '1', '2023-02-03 12:49:44'),
(12, 20, '', '1', '2023-02-03 12:49:49'),
(13, 20, 'test asdf asdfasf', '1', '2023-02-03 12:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `comments` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `name`, `product_id`, `user_id`, `comments`, `created_date`) VALUES
(1, NULL, 1, NULL, NULL, '2023-02-02 08:19:24'),
(2, NULL, 1, NULL, NULL, '2023-02-02 08:21:34'),
(3, NULL, 1, NULL, NULL, '2023-02-02 08:22:34'),
(4, NULL, 1, NULL, NULL, '2023-02-02 08:22:39'),
(5, NULL, 1, NULL, NULL, '2023-02-02 08:22:57'),
(6, NULL, 1, NULL, NULL, '2023-02-02 08:23:06'),
(7, NULL, 1, NULL, NULL, '2023-02-02 08:23:16'),
(8, NULL, 1, NULL, NULL, '2023-02-02 08:23:31'),
(9, NULL, 1, NULL, 'dsdfdsfd', '2023-02-02 08:25:29'),
(10, NULL, 1, NULL, 'dsdfdsfd', '2023-02-02 08:25:39'),
(11, NULL, 1, NULL, 'dsdfdsfd', '2023-02-02 08:25:46'),
(12, NULL, 1, NULL, 'manish', '2023-02-02 08:36:12'),
(13, NULL, 8, NULL, 'dfgfdg', '2023-02-06 06:46:57'),
(28, NULL, 2, 18, 'hii', '2023-02-03 11:30:56'),
(29, NULL, 2, 22, 'testt adsfa dasf', '2023-02-03 12:47:35'),
(30, NULL, 8, 19, 'hii', '2023-02-06 05:29:56'),
(31, NULL, 8, 19, 'gdfg', '2023-02-06 06:01:01'),
(32, NULL, 8, 19, 'dfgfd', '2023-02-06 06:07:04'),
(33, NULL, 8, 19, 'fghfg', '2023-02-06 06:10:55'),
(34, NULL, 8, 19, 'fgdfg', '2023-02-06 06:11:36'),
(35, NULL, 8, 19, 'fgdfg', '2023-02-06 06:11:54'),
(36, NULL, 8, 19, 'dfgfd', '2023-02-06 06:12:42'),
(37, 'manish', 8, 19, 'dfgfd', '2023-02-06 06:12:58'),
(38, 'manish', 8, 19, 'fkjsdhk', '2023-02-06 06:14:14'),
(39, 'manish', 8, 19, 'ghii', '2023-02-06 06:24:03'),
(40, 'manish', 8, 19, 'hii', '2023-02-06 06:40:46'),
(41, 'manish', 8, 19, 'hii', '2023-02-06 06:40:54'),
(42, 'manish', 8, 16, 'hii', '2023-02-06 06:42:16'),
(43, 'manish', 8, 13, 'hii', '2023-02-06 06:44:18'),
(44, 'manish', NULL, 13, 'ghfgh', '2023-02-06 06:45:42'),
(45, 'manish', NULL, 13, 'gfhfgh', '2023-02-06 06:45:45'),
(46, 'manish', 8, 13, 'singh', '2023-02-06 06:48:16'),
(47, 'manish', 9, 23, 'fgh', '2023-02-06 06:55:05'),
(48, 'manish', 9, 23, 'dfg', '2023-02-06 06:56:56'),
(49, NULL, 8, 23, 'hii', '2023-02-06 07:55:00'),
(50, NULL, 8, 23, 'hii', '2023-02-06 07:55:46'),
(51, NULL, 8, 23, 'hii', '2023-02-06 07:55:59'),
(52, 'manish', 8, 23, 'hii', '2023-02-06 07:56:45'),
(53, 'manish', 8, 23, 'dfd', '2023-02-06 08:41:53'),
(54, 'manish', NULL, 23, 'sdf', '2023-02-06 08:44:00'),
(55, 'manish', NULL, 23, 'fg', '2023-02-06 08:44:05'),
(56, 'manish', 8, 23, 'fdgf', '2023-02-06 08:47:28'),
(57, 'Singh', 8, 23, 'hgjhg', '2023-02-06 08:49:01'),
(58, 'Singh', 8, 19, 'sadsd', '2023-02-06 08:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `user_type` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '(0 for User, 1 for Admin)',
  `status` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1' COMMENT '1 fo Active, 2 Inactive',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `created_date`) VALUES
(6, 'MANIS@GMAIL.COM', '$2y$10$9takSw4E5GDz083qUs6bZuE9daPoUVotoQts/TIAJ58wyvQ2G08VW', '1', '1', '2023-02-02 10:29:34'),
(7, 'maniTest@ggmg.com', '$2y$10$6aQ0tFsNREMdIP14FQBoAeL8/QCUJc4x6ekfbN5oC4hI04LzW6FwG', '1', '1', '2023-02-02 10:33:13'),
(8, 'SAm@gmail.com', '$2y$10$12TWDWbP3grv1M/hNq6lKOwDqDIpFN7A870L0t6l6VJpQcXxpIRHi', '1', '1', '2023-02-02 10:56:12'),
(9, 'dsfdsaas@ggmg.com', '$2y$10$LYYoUVmzW.IsciIJ2yxOrevtML36Ft51SfizhvOYu1a4EGLoI6lma', '0', '2', '2023-02-02 11:46:39'),
(10, 'dsfds111a@ggmg.com', '$2y$10$8i4GXNd.2UU2ugXnuFU67e2AhGgRF7bT5gScbQhDASvYIawVwDnLi', '0', '1', '2023-02-02 11:52:02'),
(11, 'AKS@GMAIL.COM', '$2y$10$cvBgiQYHbAQoQb/DalaAUOmpekDc.Itv.YPKGoK3DNai1BWit2w4q', '0', '1', '2023-02-02 12:23:02'),
(12, 'anukul@gmail.com', '$2y$10$WHDZ4zBV2auvD5QtyS1pSOHAfW8jMZRKeDd7uTUpEBwbSvHPetOni', '1', '1', '2023-02-02 12:28:03'),
(13, 'ManishSingh19970@gmail.com', '$2y$10$OWmTWFiRKhR.Lwa.p0oZFOxG8vj/VgLUjYJxN5CJur/B/SQMQCguO', '0', '1', '2023-02-03 04:36:29'),
(14, 'manish11@mail.com', '$2y$10$AcvtqunLTId0camTC9K/Ie4oT/GK0GIKXWnVPOygaixsO.20WyWSG', '0', '1', '2023-02-03 04:44:13'),
(15, 'Manish@gmail.com', '$2y$10$TaYdYH9IHgK37HbwXbKfOe.yRTvqRhMNv8WoXS78uvkldOF1gmiWi', '0', '1', '2023-02-03 04:48:06'),
(16, 'Manish@mail.com', '$2y$10$9Q0CW0gCXpdfQpJcWZmLUOuwZ7Zf.MRAuT/JMlvv/H.gc6.nK6Jue', '0', '1', '2023-02-03 04:48:51'),
(17, 'manis111@gmail.com', '$2y$10$/KcVUf1mjOdtPjb59O71duVUgVUzBbmsvU3Bd8hmtfSpUtRkJiuFu', '1', '1', '2023-02-03 11:03:36'),
(18, 'manish121@mail.com', '$2y$10$Lo/oT/jBgNIs1OgT1HigWO15A1grVFlwMKBvM12KlzvjgK1Ouhjfq', '0', '1', '2023-02-03 11:05:09'),
(19, 'MAnis11h@gmail.com', '$2y$10$WE2SK.MuGT0hNxjib2IT1OI.KQVre4BguQWi3CVaHPneRVeh4xXeW', '0', '1', '2023-02-03 11:30:29'),
(20, 'manish12singh@teqmavens.com', '$2y$10$nUV5OQVhxOp4O2CDitkiQe/1Ho04NekSNVRvct7ewdOyE1GwIkClK', '1', '1', '2023-02-03 12:00:35'),
(21, 'spuneet@teqmavens.com', '$2y$10$XLH1dBZcdYdX6j6xn7M85.Fdhc0N5uf3ncvxd/0jHrA0KcJFnqkM6', '0', '1', '2023-02-03 12:39:57'),
(22, 'spuneet1@teqmavens.com', '$2y$10$i/U4xaeHEfwnbkZxMS8feOHEZKx3/njzHAEefD9sIYq/A7ZXPA6bG', '0', '1', '2023-02-03 12:41:13'),
(23, 'singh@gmail.com', '$2y$10$muJTGdzN8SlahbgaKJrRwuiP3gr4M6mQpOHvwRUcYWS.B0pFA1Jpq', '0', '1', '2023-02-06 06:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `profile_image`, `created_date`) VALUES
(1, 1, 'manish', 'singhaniya', '96519154', 'manish', 'ninja.jpeg', '2023-02-02 05:37:14'),
(4, 5, 'manish', 'singh', '9651915498', 'manish', 'reg.png', '2023-02-02 08:17:41'),
(5, 6, 'sINGH', 'MANISH', '1234567890', 'MANISH', 'registration form.png', '2023-02-02 10:29:34'),
(6, 7, 'manish', 'singh', '1234567890', 'manish', 'ninja.jpeg', '2023-02-02 10:33:13'),
(7, 8, 'manish', 'singh', '1234567890', 'hsdhsg', 'registration form.png', '2023-02-02 10:56:12'),
(8, 9, 'manish', 'singh', 'sadsfsfdsf', 'manihs', 'registration form.png', '2023-02-02 11:46:39'),
(9, 10, 'manish', 'singh', '1234567890', 'manish', 'registration form.png', '2023-02-02 11:52:02'),
(10, 11, 'aKSHAT', 'SOOD', '9961549872', 'pEERMUCHALA', 'ninja.jpeg', '2023-02-02 12:23:02'),
(11, 12, 'Anukul', 'antwal', '9651645465', 'Anukul', 'download (1).jpeg', '2023-02-02 12:28:03'),
(12, 13, 'Manishsdfds', 'singh', '9651915498', 'Singh', 'ninja.jpeg', '2023-02-03 04:36:29'),
(13, 14, 'manishdfg', 'singh', '9651915498', 'manish', 'registration form.png', '2023-02-03 04:44:13'),
(14, 15, 'Manish', 'Singh', '9651915498', 'manisha', 'ninja.jpeg', '2023-02-03 04:48:06'),
(15, 16, 'manisha', 'singh', '1234567890', 'peermuchaalasd', 'reg.png', '2023-02-03 04:48:51'),
(16, 17, 'manish', 'singh', '9936136483', 'manish', 'registration form.png', '2023-02-03 11:03:36'),
(17, 18, 'manish', 'singh', '9936136483', 'manisha', 'ninja.jpeg', '2023-02-03 11:05:09'),
(18, 19, 'Singh', 'rs', '9936136483', 'Manish', 'reg.png', '2023-02-03 11:30:29'),
(19, 20, 'MAnish', 'Singh', '9936136483', 'manish', 'reg.png', '2023-02-03 12:00:35'),
(20, 21, 'Test', 'test', '1234567890', 'peermuchala', 'Screenshot from 2022-12-01 17-39-15.png', '2023-02-03 12:39:57'),
(21, 22, 'Testing', 'user', 'sdfsdfsdfsdf', 'sdfsfsdf', 'Screenshot from 2022-11-17 14-52-34.png', '2023-02-03 12:41:13'),
(22, 23, 'Singh', 'Anu', '99361364783', 'singh', 'reg.png', '2023-02-06 06:51:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
