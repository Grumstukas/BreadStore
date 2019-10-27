-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2019 at 04:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `buns`
--

CREATE TABLE `buns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `price_discount` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buns`
--

INSERT INTO `buns` (`id`, `name`, `file`, `description`, `price`, `price_discount`, `created_at`, `updated_at`) VALUES
(1, 'Marcipanas', 'bun3.png', 'Marcipanas Marcipanas Marcipanas', '1.80', '1.60', '2019-10-07 05:10:04', '2019-10-07 05:10:04'),
(2, 'Braske', 'bun4.png', 'sadfghjkl;\'\\', '2.00', '1.50', '2019-10-07 05:11:01', '2019-10-07 05:11:01'),
(3, 'Šoko šoko', 'cupcake.jpg', 'Kupkeikas', '2.00', '1.85', '2019-10-08 03:08:56', '2019-10-08 03:08:56'),
(4, 'pliusvines', 'cookie.jpg', 'asdfghj', '3.00', '1.20', '2019-10-08 04:03:32', '2019-10-08 04:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `surname`, `email`, `city`, `street`, `post_code`, `phone`, `created_at`, `updated_at`) VALUES
(31, 'Linutė', 'Tartėnienė', 'lina.tarteniene@gmail.com', 'Vilkaviškis', 'D.Šelvių km. 16-6', '07854', '123456789', '2019-10-08 08:41:05', '2019-10-11 10:57:40'),
(32, 'Lina', 'Tartėnaite', '20@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:43:15', '2019-10-08 08:43:15'),
(33, 'Lina', 'Tartėnaite', '21@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:43:56', '2019-10-08 08:43:56'),
(34, 'Lina', 'Tartėnaite', '22@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:44:36', '2019-10-08 08:44:36'),
(35, 'Lina', 'Tartėnaite', '23@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:47:35', '2019-10-08 08:47:35'),
(36, 'Lina', 'Tartėnaite', '24@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:48:13', '2019-10-08 08:48:13'),
(37, 'Lina', 'Tartėnaite', '25@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:49:39', '2019-10-08 08:49:39'),
(38, 'Lina', 'Tartėnaite', '26@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:51:39', '2019-10-08 08:51:39'),
(39, 'Lina', 'Tartėnaite', '27@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:53:45', '2019-10-08 08:53:45'),
(40, 'Lina', 'Tartėnaite', '28@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:54:05', '2019-10-08 08:54:05'),
(41, 'Lina', 'Tartėnaite', '29@gmail.com', 'Vilnius', 'Sneries', '06331', '860504120', '2019-10-08 08:54:26', '2019-10-08 08:54:26'),
(42, 'Lina', 'Kriete', '30@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 09:10:06', '2019-10-08 09:10:06'),
(43, 'Lina', 'Kriete', '31@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 09:11:55', '2019-10-08 09:11:55'),
(44, 'Linute', 'Paukstys', '32@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 12:11:52', '2019-10-08 12:11:52'),
(45, 'Linute', 'Paukstys', '33@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 12:12:36', '2019-10-08 12:12:36'),
(47, 'Linute', 'Paukstys', '34@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 12:19:36', '2019-10-08 12:19:36'),
(48, 'Linute', 'Paukstys', '35@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 12:26:17', '2019-10-08 12:26:17'),
(49, 'Linute', 'Paukstys', '36@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 12:26:41', '2019-10-08 12:26:41'),
(50, 'Linute', 'Paukstys', '37@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 12:26:53', '2019-10-08 12:26:53'),
(51, 'Linute', 'Paukstys', '38@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 12:27:01', '2019-10-08 12:27:01'),
(52, 'Leonas', 'Ponis', '39@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 12:49:38', '2019-10-08 12:49:38'),
(53, 'Jonas', 'Paukstys', '40@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 23:38:24', '2019-10-08 23:38:24'),
(54, 'Jonas', 'Paukstys', '41@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 23:39:26', '2019-10-08 23:39:26'),
(55, 'Jonas', 'Paukstys', '42@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 23:41:50', '2019-10-08 23:41:50'),
(56, 'Jonas', 'Paukstys', '43@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 23:46:45', '2019-10-08 23:46:45'),
(58, 'Jonas', 'Paukstys', '44@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-08 23:48:02', '2019-10-08 23:48:02'),
(59, 'Leonas', 'Ponis', '50@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 04:14:24', '2019-10-09 04:14:24'),
(60, 'Toma', 'Tartena', '61@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:08:41', '2019-10-09 05:08:41'),
(61, 'Toma', 'Tartena', '62@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:09:09', '2019-10-09 05:09:09'),
(62, 'Lina', 'Paukstys', '64@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:10:38', '2019-10-09 05:10:38'),
(63, 'Lina', 'Paukstys', '65@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:11:31', '2019-10-09 05:11:31'),
(64, 'Lina', 'Paukstys', '66@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:12:14', '2019-10-09 05:12:14'),
(65, 'Lina', 'Paukstys', '67@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:12:38', '2019-10-09 05:12:38'),
(66, 'Lina', 'Paukstys', '68@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:13:48', '2019-10-09 05:13:48'),
(67, 'Lina', 'Tartėnaite', '69@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:22:51', '2019-10-09 05:22:51'),
(69, 'Lina', 'Tartėnaite', '70@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:23:51', '2019-10-09 05:23:51'),
(70, 'Lina', 'Tartėnaite', '71@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:25:03', '2019-10-09 05:25:03'),
(71, 'Lina', 'Tartėnaite', '72@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '860504120', '2019-10-09 05:26:19', '2019-10-09 05:26:19'),
(72, 'Alginamtas', 'Čepuolis', 'AC@gmail.com', 'Vilnius', 'Ukmerges g', '02351', '860539847', '2019-10-09 10:07:05', '2019-10-09 10:07:05'),
(73, 'Linute', 'Tartena', '73@gmail.com', 'Vilnius', 'Gedimino pr 5', '06331', '810203050', '2019-10-10 10:22:39', '2019-10-10 10:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_06_200703_create_clients_table', 1),
(5, '2019_10_06_200718_create_orders_table', 1),
(6, '2019_10_06_200735_create_buns_table', 1),
(7, '2019_10_06_200746_create_tags_table', 1),
(8, '2019_10_06_200757_create_product_tags_table', 1),
(9, '2019_10_06_200818_create_order_lists_table', 1),
(10, '2019_10_06_200828_create_votes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` smallint(5) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `state`, `client_id`, `created_at`, `updated_at`, `delivery`) VALUES
(18, 1, 31, '2019-10-08 08:41:05', '2019-10-08 08:41:05', NULL),
(19, 1, 32, '2019-10-08 08:43:15', '2019-10-08 08:43:15', NULL),
(20, 1, 33, '2019-10-08 08:43:56', '2019-10-08 08:43:56', NULL),
(21, 1, 34, '2019-10-08 08:44:36', '2019-10-08 08:44:36', NULL),
(22, 1, 35, '2019-10-08 08:47:35', '2019-10-08 08:47:35', NULL),
(23, 1, 36, '2019-10-08 08:48:13', '2019-10-08 08:48:13', NULL),
(24, 1, 37, '2019-10-08 08:49:39', '2019-10-08 08:49:39', NULL),
(25, 1, 38, '2019-10-08 08:51:40', '2019-10-08 08:51:40', NULL),
(26, 1, 39, '2019-10-08 08:53:45', '2019-10-08 08:53:45', NULL),
(27, 1, 40, '2019-10-08 08:54:05', '2019-10-08 08:54:05', NULL),
(28, 1, 41, '2019-10-08 08:54:26', '2019-10-08 08:54:26', NULL),
(29, 1, 42, '2019-10-08 09:10:06', '2019-10-08 09:10:06', NULL),
(30, 1, 43, '2019-10-08 09:11:55', '2019-10-08 09:11:55', NULL),
(31, 0, 44, '2019-10-08 12:11:52', '2019-10-08 12:11:52', NULL),
(32, 0, 45, '2019-10-08 12:12:36', '2019-10-08 12:12:36', NULL),
(33, 0, 47, '2019-10-08 12:19:36', '2019-10-08 12:19:36', NULL),
(34, 0, 48, '2019-10-08 12:26:17', '2019-10-08 12:26:17', NULL),
(35, 0, 49, '2019-10-08 12:26:41', '2019-10-08 12:26:41', NULL),
(36, 0, 50, '2019-10-08 12:26:53', '2019-10-08 12:26:53', NULL),
(37, 0, 51, '2019-10-08 12:27:01', '2019-10-08 12:27:01', NULL),
(38, 0, 52, '2019-10-08 12:49:38', '2019-10-08 12:49:38', NULL),
(39, 0, 53, '2019-10-08 23:38:24', '2019-10-08 23:38:24', NULL),
(40, 0, 54, '2019-10-08 23:39:26', '2019-10-08 23:39:26', NULL),
(41, 0, 55, '2019-10-08 23:41:50', '2019-10-08 23:41:50', NULL),
(42, 0, 56, '2019-10-08 23:46:45', '2019-10-08 23:46:45', NULL),
(43, 0, 58, '2019-10-08 23:48:02', '2019-10-08 23:48:02', NULL),
(44, 0, 59, '2019-10-09 04:14:24', '2019-10-09 04:14:24', NULL),
(45, 0, 60, '2019-10-09 05:08:42', '2019-10-09 05:08:42', 1),
(46, 0, 61, '2019-10-09 05:09:09', '2019-10-09 05:09:09', 1),
(47, 0, 62, '2019-10-09 05:10:38', '2019-10-09 05:10:38', 1),
(48, 0, 63, '2019-10-09 05:11:31', '2019-10-09 05:11:31', NULL),
(49, 0, 64, '2019-10-09 05:12:14', '2019-10-09 05:12:14', NULL),
(50, 0, 65, '2019-10-09 05:12:38', '2019-10-09 05:12:38', NULL),
(51, 0, 66, '2019-10-09 05:13:48', '2019-10-09 05:13:48', NULL),
(52, 0, 69, '2019-10-09 05:23:51', '2019-10-09 05:23:51', 1),
(53, 0, 70, '2019-10-09 05:25:03', '2019-10-09 05:25:03', 1),
(54, 1, 71, '2019-10-09 05:26:19', '2019-10-09 05:31:00', 1),
(55, 1, 72, '2019-10-09 10:07:05', '2019-10-09 10:08:36', 6),
(56, 1, 73, '2019-10-10 10:22:39', '2019-10-10 10:22:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_lists`
--

CREATE TABLE `order_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `bun_id` bigint(20) UNSIGNED NOT NULL,
  `count` smallint(5) UNSIGNED NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lists`
--

INSERT INTO `order_lists` (`id`, `order_id`, `bun_id`, `count`, `price`, `created_at`, `updated_at`) VALUES
(21, 18, 4, 2, '2.40', '2019-10-08 08:41:05', '2019-10-08 08:41:05'),
(22, 18, 3, 5, '9.25', '2019-10-08 08:41:05', '2019-10-08 08:41:05'),
(23, 19, 4, 2, '2.40', '2019-10-08 08:43:15', '2019-10-08 08:43:15'),
(24, 19, 3, 5, '9.25', '2019-10-08 08:43:15', '2019-10-08 08:43:15'),
(25, 20, 4, 2, '2.40', '2019-10-08 08:43:56', '2019-10-08 08:43:56'),
(26, 20, 3, 5, '9.25', '2019-10-08 08:43:56', '2019-10-08 08:43:56'),
(27, 21, 4, 2, '2.40', '2019-10-08 08:44:36', '2019-10-08 08:44:36'),
(28, 21, 3, 5, '9.25', '2019-10-08 08:44:36', '2019-10-08 08:44:36'),
(29, 22, 4, 2, '2.40', '2019-10-08 08:47:35', '2019-10-08 08:47:35'),
(30, 22, 3, 5, '9.25', '2019-10-08 08:47:35', '2019-10-08 08:47:35'),
(31, 23, 4, 2, '2.40', '2019-10-08 08:48:13', '2019-10-08 08:48:13'),
(32, 23, 3, 5, '9.25', '2019-10-08 08:48:13', '2019-10-08 08:48:13'),
(33, 24, 4, 2, '2.40', '2019-10-08 08:49:39', '2019-10-08 08:49:39'),
(34, 24, 3, 5, '9.25', '2019-10-08 08:49:39', '2019-10-08 08:49:39'),
(35, 25, 4, 2, '2.40', '2019-10-08 08:51:40', '2019-10-08 08:51:40'),
(36, 25, 3, 5, '9.25', '2019-10-08 08:51:40', '2019-10-08 08:51:40'),
(37, 26, 4, 2, '2.40', '2019-10-08 08:53:45', '2019-10-08 08:53:45'),
(38, 26, 3, 5, '9.25', '2019-10-08 08:53:45', '2019-10-08 08:53:45'),
(39, 27, 4, 2, '2.40', '2019-10-08 08:54:05', '2019-10-08 08:54:05'),
(40, 27, 3, 5, '9.25', '2019-10-08 08:54:05', '2019-10-08 08:54:05'),
(41, 28, 4, 2, '2.40', '2019-10-08 08:54:26', '2019-10-08 08:54:26'),
(42, 28, 3, 5, '9.25', '2019-10-08 08:54:26', '2019-10-08 08:54:26'),
(43, 29, 4, 2, '2.40', '2019-10-08 09:10:06', '2019-10-08 09:10:06'),
(44, 29, 3, 5, '9.25', '2019-10-08 09:10:06', '2019-10-08 09:10:06'),
(45, 30, 4, 2, '2.40', '2019-10-08 09:11:55', '2019-10-08 09:11:55'),
(46, 30, 3, 5, '9.25', '2019-10-08 09:11:55', '2019-10-08 09:11:55'),
(47, 31, 4, 2, '2.40', '2019-10-08 12:11:52', '2019-10-08 12:11:52'),
(48, 31, 3, 5, '9.25', '2019-10-08 12:11:52', '2019-10-08 12:11:52'),
(49, 32, 4, 2, '2.40', '2019-10-08 12:12:36', '2019-10-08 12:12:36'),
(50, 32, 3, 5, '9.25', '2019-10-08 12:12:36', '2019-10-08 12:12:36'),
(51, 33, 4, 2, '2.40', '2019-10-08 12:19:36', '2019-10-08 12:19:36'),
(52, 33, 3, 5, '9.25', '2019-10-08 12:19:36', '2019-10-08 12:19:36'),
(53, 34, 4, 2, '2.40', '2019-10-08 12:26:17', '2019-10-08 12:26:17'),
(54, 34, 3, 5, '9.25', '2019-10-08 12:26:17', '2019-10-08 12:26:17'),
(55, 35, 4, 2, '2.40', '2019-10-08 12:26:41', '2019-10-08 12:26:41'),
(56, 35, 3, 5, '9.25', '2019-10-08 12:26:41', '2019-10-08 12:26:41'),
(57, 36, 4, 2, '2.40', '2019-10-08 12:26:53', '2019-10-08 12:26:53'),
(58, 36, 3, 5, '9.25', '2019-10-08 12:26:53', '2019-10-08 12:26:53'),
(59, 37, 4, 2, '2.40', '2019-10-08 12:27:01', '2019-10-08 12:27:01'),
(60, 37, 3, 5, '9.25', '2019-10-08 12:27:01', '2019-10-08 12:27:01'),
(61, 38, 4, 2, '2.40', '2019-10-08 12:49:38', '2019-10-08 12:49:38'),
(62, 38, 3, 5, '9.25', '2019-10-08 12:49:38', '2019-10-08 12:49:38'),
(63, 39, 4, 10, '12.00', '2019-10-08 23:38:24', '2019-10-08 23:38:24'),
(64, 40, 4, 10, '12.00', '2019-10-08 23:39:26', '2019-10-08 23:39:26'),
(65, 41, 4, 10, '12.00', '2019-10-08 23:41:50', '2019-10-08 23:41:50'),
(66, 42, 4, 10, '12.00', '2019-10-08 23:46:45', '2019-10-08 23:46:45'),
(67, 43, 4, 10, '12.00', '2019-10-08 23:48:02', '2019-10-08 23:48:02'),
(68, 44, 3, 2, '3.70', '2019-10-09 04:14:24', '2019-10-09 04:14:24'),
(69, 45, 3, 7, '12.95', '2019-10-09 05:08:42', '2019-10-09 05:08:42'),
(70, 46, 3, 7, '12.95', '2019-10-09 05:09:09', '2019-10-09 05:09:09'),
(71, 47, 3, 7, '12.95', '2019-10-09 05:10:38', '2019-10-09 05:10:38'),
(72, 48, 3, 7, '12.95', '2019-10-09 05:11:31', '2019-10-09 05:11:31'),
(73, 49, 3, 7, '12.95', '2019-10-09 05:12:14', '2019-10-09 05:12:14'),
(74, 50, 3, 7, '12.95', '2019-10-09 05:12:38', '2019-10-09 05:12:38'),
(75, 51, 3, 7, '12.95', '2019-10-09 05:13:48', '2019-10-09 05:13:48'),
(76, 54, 3, 7, '12.95', '2019-10-09 05:26:19', '2019-10-09 05:26:19'),
(77, 55, 4, 2, '3.20', '2019-10-09 10:07:05', '2019-10-09 10:07:05'),
(78, 55, 3, 2, '3.70', '2019-10-09 10:07:05', '2019-10-09 10:07:05'),
(79, 55, 4, 2, '2.40', '2019-10-09 10:07:05', '2019-10-09 10:07:05'),
(80, 56, 1, 3, '4.80', '2019-10-10 10:22:39', '2019-10-10 10:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `bun_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `tag_id`, `bun_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-10-07 06:12:03', '2019-10-07 06:12:03'),
(2, 1, 2, '2019-10-07 06:12:07', '2019-10-07 06:12:07'),
(3, 2, 2, '2019-10-07 06:12:07', '2019-10-07 06:12:07'),
(4, 1, 3, '2019-10-08 03:08:56', '2019-10-08 03:08:56'),
(5, 1, 4, '2019-10-08 04:03:32', '2019-10-08 04:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `destription`, `created_at`, `updated_at`) VALUES
(1, 'Saldi', 'Saldi', '2019-10-07 06:11:41', '2019-10-07 06:11:41'),
(2, 'Su aguonomis', 'Su aguonomis', '2019-10-07 06:11:54', '2019-10-07 06:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Toma', 'tartenaite.toma@gmail.com', NULL, '$2y$10$HH/ousZ16lO0ZYs51qL7TuOTdK.IJAjd/yVrL3ZtauborGdFhh7Eu', 'wJfNDarjcnvEmeJss0bznBhTrIgwuZNirLsH7E3UhoukP8jX6smwserSVCq6', '2019-10-07 06:11:10', '2019-10-07 06:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bun_id` bigint(20) UNSIGNED NOT NULL,
  `vote` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buns`
--
ALTER TABLE `buns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `order_lists`
--
ALTER TABLE `order_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_lists_order_id_foreign` (`order_id`),
  ADD KEY `order_lists_bun_id_foreign` (`bun_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`),
  ADD KEY `product_tags_bun_id_foreign` (`bun_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_bun_id_foreign` (`bun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buns`
--
ALTER TABLE `buns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_lists`
--
ALTER TABLE `order_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `order_lists`
--
ALTER TABLE `order_lists`
  ADD CONSTRAINT `order_lists_bun_id_foreign` FOREIGN KEY (`bun_id`) REFERENCES `buns` (`id`),
  ADD CONSTRAINT `order_lists_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_bun_id_foreign` FOREIGN KEY (`bun_id`) REFERENCES `buns` (`id`),
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_bun_id_foreign` FOREIGN KEY (`bun_id`) REFERENCES `buns` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
