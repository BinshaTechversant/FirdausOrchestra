-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 04:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `featured_image` varchar(191) DEFAULT NULL,
  `featured_video` varchar(191) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(191) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `slug`, `description`, `date_publication`, `featured_image`, `featured_video`, `is_featured`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `category_name`, `category_id`) VALUES
(1, 'Electrifying Experience @ Phoenix Mall Bangalore', 'electrifying-experience-@-phoenix-mall', '<p><span style=\"font-family: Arial;\"><b>Electrifying Experience @ Phoenix Mall</b></span></p><p><span style=\"font-family: Arial;\">Hello Every one, Here everyone enjoyed<br></span><br></p>', '2023-11-01', '/storage/photos/1/6536532d3bd7c.png', NULL, 1, 1, 1, 1, NULL, '2023-11-07 14:05:12', '2023-11-08 13:13:20', NULL, 'Music', 10),
(2, 'Superb Terrifying performance', 'superb-terrifying-performance', '<p>Superb Terrifying performance @ chennai by shekar ram<span style=\"font-family: Helvetica;\">﻿</span><br></p>', '2023-11-03', '/storage/photos/1/6536532b2faa2.png', NULL, 1, 1, 1, 1, NULL, '2023-11-08 12:10:48', '2023-11-08 13:13:54', NULL, 'Performance', 12),
(3, 'Music Performance by Renu', 'music-performance-by-renu', '<p>Music Performance by Renu at Phoenix market city<br></p>', '2023-11-03', '/storage/photos/1/65362e130cf53.png', NULL, 1, 1, 1, 1, NULL, '2023-11-08 15:15:22', '2023-11-08 15:16:18', NULL, 'Music', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
