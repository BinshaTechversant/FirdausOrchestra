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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `group_name`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `order`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Header Menus', 'header-menus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-10-23 07:37:11', '2023-10-23 07:37:11', NULL),
(2, 'Carousel', 'carousel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-10-23 08:24:23', '2023-10-23 08:24:23', NULL),
(3, 'Upcoming Events', 'upcoming-events', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-10-23 08:38:53', '2023-10-23 08:38:53', NULL),
(4, 'About Us', 'about-us', NULL, 'About Us', '/storage/media/1/aCXeTBpVl5Qo9qeeTMYG6Te7SQhD20XJYocJcmID.png', NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-10-23 10:26:46', '2023-10-23 10:32:46', NULL),
(5, 'News', 'news', NULL, 'News', '/storage/media/2/Yw6i84KwY43w69prret9oGWNGe1GcpLC8G2HwOKY.png', NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-10-23 11:32:43', '2023-10-23 11:53:43', NULL),
(6, 'TESTIMONIALS', 'testimonials', NULL, 'TESTIMONIALS', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-10-23 12:58:53', '2023-10-23 12:58:53', NULL),
(7, 'Footer', 'footer', NULL, 'Footer', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-10-31 11:00:46', '2023-10-31 11:00:46', NULL),
(8, 'Social Icons', 'social-icons', NULL, 'Social', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-10-31 11:22:24', '2023-10-31 11:22:24', NULL),
(9, 'Strings', 'strings', NULL, 'Musician-Instruments', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-11-08 11:05:01', '2023-11-08 11:05:01', NULL),
(10, 'Woodwinds', 'woodwinds', NULL, 'Musician-Instruments', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-11-08 11:05:27', '2023-11-08 11:05:27', NULL),
(11, 'Brass', 'brass', NULL, 'Musician-Instruments', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-11-08 11:05:50', '2023-11-08 11:05:50', NULL),
(12, 'Rythm and Percussion', 'rythm', NULL, 'Musician-Instruments', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-11-08 11:06:24', '2023-11-08 11:06:24', NULL),
(13, 'Violin', 'violin', NULL, 'Sub-Instruments', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-11-08 14:26:19', '2023-11-09 08:42:42', NULL),
(14, 'Voilia', 'voila', NULL, 'Sub-Instruments', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-11-08 14:26:58', '2023-11-09 08:42:28', NULL),
(15, 'Cello', 'cello', NULL, 'Sub-Instruments', NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, NULL, '2023-11-08 14:27:17', '2023-11-09 08:42:13', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
