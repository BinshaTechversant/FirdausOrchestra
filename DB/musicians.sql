-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2023 at 10:53 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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
-- Table structure for table `musicians`
--

DROP TABLE IF EXISTS `musicians`;
CREATE TABLE IF NOT EXISTS `musicians` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_id` text COLLATE utf8mb4_unicode_ci,
  `category_name` text COLLATE utf8mb4_unicode_ci,
  `sub_category` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `musicians`
--

INSERT INTO `musicians` (`id`, `name`, `slug`, `url`, `description`, `category_id`, `category_name`, `sub_category`, `file`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'vsdgsdg', 'zxvz', 'zxv', 'gjfg', '9', NULL, NULL, '/storage/photos/1/65362aa98e6a5.png', 1, 1, 1, NULL, '2023-11-08 11:36:35', '2023-11-08 12:30:02', NULL),
(2, 'fdh', 'dfhfdhfd', 'dfhdf', 'bcvn', '9', NULL, NULL, '/storage/photos/1/6536532543016.png', 1, 1, 1, NULL, '2023-11-08 12:40:07', '2023-11-08 12:40:07', NULL),
(3, 'gdgsd', 'fdfh', '#', 'fghfj', '9', NULL, NULL, '/storage/photos/1/6536532543016.png', 1, 1, 1, NULL, '2023-11-08 14:03:30', '2023-11-08 14:03:30', NULL),
(4, 'New', 's', 'ds', 'dgsdgsd', '11', NULL, NULL, '/storage/photos/1/65362aa98e6a5.png', 1, 1, 1, NULL, '2023-11-09 06:05:20', '2023-11-09 06:05:20', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
