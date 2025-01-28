-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2025 at 06:48 AM
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
-- Database: `db_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` int NOT NULL,
  `note_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id`, `note_title`, `detail`, `user_id`) VALUES
(3, 'kancil', 'sang kancil hohohoho', 42),
(4, 'sdsdsd', 'sdsadsax', 16),
(6, 'hohoho', 'sdsadsax', 16),
(7, 'hohoho', 'sdsadsax', 16),
(8, 'Kirulllllll', 'Ohasnfbajsi dsaifusafb fsabfsaifsiu sbuadfjbsajbkfsabjfiasb fasfysysfa', 18),
(9, 'kucing', 'kucing terbang hoiiii', 18),
(10, 'heheheasfasf', 'kontol', 22),
(11, 'heheheasfasf', 'kekkekekekkeke', 16),
(12, 'Harimau', 'harimau suka makan sayur + ikan', 18),
(13, 'Luqmannnnn', 'nasi lemak kopi O', 18),
(14, 'hheehe', 'nak kopi', 30),
(15, 'Kirulll12321', 'kbsadhbuhsaduasdbibas', 18),
(16, 'kaskdsaDNAD', 'safasfasf', 18);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_phone` varchar(20) DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'NO  RECORD',
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_phone`, `address`, `role_id`) VALUES
(16, 'admin', 'admin@kerja.com', '1234', '1231', 'Bay Area, San Francisco, CA', 1),
(18, 'John Doe', 'ker@gmail.com', '1234', '(239) 816-9029', 'Bay Area, San Francisco, CA', 2),
(19, 'Ject', 'sadsd@gmail.com', '1234', NULL, NULL, 2),
(21, 'gogogo', 'sa3dsd@gmail.com', '1234', NULL, NULL, 2),
(22, 'kemal', 'wan@gmail.com', '1234', NULL, NULL, 1),
(24, 'Ject', 'sadqwsd@gmail.com', '1234', NULL, 'NO  RECORD', 2),
(25, 'Ject', 'sadsd1@gmail.com', '1234', NULL, 'NO  RECORD', 2),
(26, 'kemall123', 'kera@gmail.com', '1234', NULL, 'NO  RECORD', 2),
(27, 'kemall123e', 'keraa@gmail.com', '1234', NULL, 'NO  RECORD', 2),
(28, 'wa123e', 'kera1a@gmail.com', '1234', NULL, 'NO  RECORD', 2),
(29, 'Eject', 'dassdadasd@gmail.com', '1234', NULL, 'NO  RECORD', 2),
(30, 'oi', 'jajajjasdas@gmail.com', '1234', NULL, 'NO  RECORD', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
