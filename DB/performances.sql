-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2023 at 08:12 AM
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
-- Table structure for table `performances`
--

DROP TABLE IF EXISTS `performances`;
CREATE TABLE IF NOT EXISTS `performances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` date NOT NULL,
  `days_left` int NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_select` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_inks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conductors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_musicians` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_attendees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_restrictions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_price_range` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_friendly` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_occasion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_stream` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instrumental_focus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_artists` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accessibilty_features` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `is_featured` int DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performances`
--

INSERT INTO `performances` (`id`, `name`, `slug`, `event_date`, `days_left`, `location`, `venue`, `duration`, `event_type`, `category_select`, `payment_status`, `video_inks`, `conductors`, `featured_musicians`, `number_of_attendees`, `program`, `language`, `age_restrictions`, `ticket_price_range`, `family_friendly`, `season`, `special_occasion`, `live_stream`, `instrumental_focus`, `guest_artists`, `accessibilty_features`, `description`, `image`, `url`, `status`, `created_by`, `updated_by`, `deleted_by`, `is_featured`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Lorem Ipsum dolor1', 'lorem-ipsum-dolor1', '2023-11-09', 4, 'sdf', NULL, '2', 'live', NULL, 'paid', NULL, NULL, NULL, '100', 'xn', NULL, '3', '100', NULL, NULL, NULL, NULL, 'gfd', NULL, NULL, 'Lorem Ipsum Doloris a Dummy Text1.', '/storage/photos/1/65362aa98e6a5.png', '#', 1, 1, 1, NULL, 1, NULL, '2023-11-08 07:01:29', '2023-11-08 07:02:17', NULL),
(3, 'Lorem Ipsum dolor2', 'lorem-ipsum-dolor2', '2023-11-08', 5, 'fghjk', NULL, '3', 'live', NULL, 'paid', NULL, NULL, 'ccvncv', '100', 'cghd', 'English', '2', '100', NULL, NULL, NULL, NULL, 'cnn', NULL, NULL, 'Lorem Ipsum Doloris a Dummy Text.', '/storage/photos/1/65362dd216e83.png', '#', 1, 1, 1, NULL, 1, NULL, '2023-11-08 07:07:34', '2023-11-08 07:07:34', NULL),
(4, 'Lorem Ipsum dolor3', 'lorem-ipsum-dolor3', '2023-11-22', 6, 'hgfj', NULL, '6', 'live', NULL, 'paid', NULL, NULL, 'dgs', '100', 'df', 'English', '3', '100', NULL, NULL, NULL, NULL, 'gfd', NULL, NULL, 'Lorem Ipsum Doloris a Dummy Text1.', '/storage/photos/1/65362e130cf53.png', '#', 1, 1, 1, NULL, 1, NULL, '2023-11-08 07:08:47', '2023-11-08 07:08:47', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
