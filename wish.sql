-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2021 at 02:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wish`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'birthday', '2021-03-23 13:11:35', '2021-03-23 13:11:35'),
(3, 'Graduation', '2021-03-23 21:03:43', '2021-03-23 21:03:43'),
(5, 'Freedom', '2021-03-28 09:23:35', '2021-03-28 09:23:35'),
(8, 'naming', '2021-03-30 06:42:53', '2021-03-30 06:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `media_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `media_id`, `created_at`, `updated_at`) VALUES
(6, 1, 3, '2021-03-11 20:57:34', '2021-03-11 20:57:34'),
(7, 1, 3, '2021-03-11 21:11:43', '2021-03-11 21:11:43'),
(12, 1, 3, '2021-03-12 23:24:48', '2021-03-12 23:24:48'),
(14, 1, 3, '2021-03-13 00:58:36', '2021-03-13 00:58:36'),
(15, 1, 3, '2021-03-13 00:58:37', '2021-03-13 00:58:37'),
(16, 1, 3, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(17, 1, 3, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(18, 1, 3, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(19, 1, 3, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(20, 1, 3, '2021-03-13 00:58:39', '2021-03-13 00:58:39'),
(22, 1, 3, '2021-03-23 09:56:03', '2021-03-23 09:56:03'),
(23, 2, 3, '2021-03-23 09:59:04', '2021-03-23 09:59:04'),
(24, 1, 3, '2021-03-23 10:13:30', '2021-03-23 10:13:30'),
(27, 1, 3, '2021-03-23 10:19:08', '2021-03-23 10:19:08'),
(28, 1, 3, '2021-03-25 18:50:34', '2021-03-25 18:50:34'),
(29, 1, 3, '2021-03-25 18:51:02', '2021-03-25 18:51:02'),
(30, 1, 3, '2021-03-26 06:40:25', '2021-03-26 06:40:25'),
(31, 1, 3, '2021-03-26 06:49:47', '2021-03-26 06:49:47'),
(32, 1, 3, '2021-03-31 12:35:13', '2021-03-31 12:35:13'),
(33, 1, 3, '2021-04-01 10:08:36', '2021-04-01 10:08:36'),
(34, 1, 3, '2021-04-01 10:08:37', '2021-04-01 10:08:37'),
(35, 1, 3, '2021-04-01 10:08:37', '2021-04-01 10:08:37'),
(36, 1, 3, '2021-04-01 10:08:37', '2021-04-01 10:08:37'),
(37, 1, 3, '2021-04-01 10:08:37', '2021-04-01 10:08:37'),
(38, 2, 3, '2021-04-08 17:23:20', '2021-04-08 17:23:20'),
(39, 2, 3, '2021-04-08 17:23:46', '2021-04-08 17:23:46'),
(40, 2, 3, '2021-04-08 17:23:51', '2021-04-08 17:23:51'),
(41, 2, 3, '2021-04-08 17:24:03', '2021-04-08 17:24:03'),
(42, 2, 3, '2021-04-08 17:24:15', '2021-04-08 17:24:15'),
(43, 2, 3, '2021-04-08 17:25:29', '2021-04-08 17:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `functionalities`
--

CREATE TABLE `functionalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `functionalities`
--

INSERT INTO `functionalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'writer', '2021-03-30 06:51:46', '2021-03-30 06:51:46'),
(3, 'carousel', '2021-03-30 08:04:15', '2021-03-30 08:04:15'),
(4, 'sliders', '2021-03-30 08:04:29', '2021-03-30 08:04:29'),
(5, 'music before', '2021-03-30 08:04:47', '2021-03-30 08:04:47'),
(6, 'music on', '2021-03-30 08:05:02', '2021-03-30 08:05:02'),
(7, 'music after', '2021-03-30 08:05:17', '2021-03-30 08:05:17'),
(8, 'video before', '2021-03-30 08:05:30', '2021-03-30 08:05:30'),
(9, 'video after', '2021-03-30 08:05:44', '2021-03-30 08:05:44'),
(10, 'video on', '2021-03-30 08:05:54', '2021-03-30 08:05:54'),
(11, 'date', '2021-04-08 14:26:05', '2021-04-08 14:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(7, 'App\\Models\\File', 7, '43197fbc-a290-4461-b50e-3babbc30fa97', 'audio', 'akobi omo', 'akobi-omo', 'audio/mpeg', 'uploads', 'uploads', 5598608, '[]', '[]', '[]', 7, '2021-03-11 21:11:43', '2021-03-11 21:11:43'),
(12, 'App\\Models\\File', 12, 'f87254c5-5501-43f4-aef3-505582dea820', 'image', 'hms_00003', 'hms_00003.png', 'image/png', 'uploads', 'uploads', 250028, '[]', '[]', '[]', 12, '2021-03-12 23:24:48', '2021-03-12 23:24:48'),
(14, 'App\\Models\\File', 14, '90e5c697-e5d6-49a7-b200-a89df40be508', 'image', 'hms_00013', 'hms_00013.png', 'image/png', 'uploads', 'uploads', 52729, '[]', '[]', '[]', 13, '2021-03-13 00:58:37', '2021-03-13 00:58:37'),
(15, 'App\\Models\\File', 15, 'bf94dc98-148e-4f54-95f7-4ff504a1ac55', 'image', 'hms_00014', 'hms_00014.png', 'image/png', 'uploads', 'uploads', 55514, '[]', '[]', '[]', 14, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(16, 'App\\Models\\File', 16, '09ba60fc-0ebe-4b12-b03c-14b7d6613358', 'image', 'hms_00015', 'hms_00015.png', 'image/png', 'uploads', 'uploads', 18836, '[]', '[]', '[]', 15, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(17, 'App\\Models\\File', 17, 'f7b7160b-ab2c-464f-a836-5aab390ca291', 'image', 'hms_00016', 'hms_00016.png', 'image/png', 'uploads', 'uploads', 156959, '[]', '[]', '[]', 16, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(18, 'App\\Models\\File', 18, 'fb246f3d-1458-4e50-8579-aae2efc7c82a', 'image', 'hms_00017', 'hms_00017.png', 'image/png', 'uploads', 'uploads', 723435, '[]', '[]', '[]', 17, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(19, 'App\\Models\\File', 19, 'ca2d07ea-d08a-4a82-b814-72d7737344d4', 'image', 'hms_00018', 'hms_00018.png', 'image/png', 'uploads', 'uploads', 428373, '[]', '[]', '[]', 18, '2021-03-13 00:58:38', '2021-03-13 00:58:38'),
(22, 'App\\Models\\File', 22, '4f01cef6-23a4-48f2-8da1-27134580acf4', 'image', 'inventory_00015', 'inventory_00015.png', 'image/png', 'uploads', 'uploads', 81349, '[]', '[]', '[]', 21, '2021-03-23 09:56:03', '2021-03-23 09:56:03'),
(23, 'App\\Models\\File', 23, '5b3c7c3a-f0d9-40f6-b6e3-762cc44413f6', 'image', 'inventory_00017', 'inventory_00017.png', 'image/png', 'uploads', 'uploads', 59459, '[]', '[]', '[]', 22, '2021-03-23 09:59:04', '2021-03-23 09:59:04'),
(27, 'App\\Models\\File', 27, 'd5a2ba69-5619-4259-8428-881c26a75055', 'video', 'Laravel Translations_ Package with Beautiful AdminPanel', 'Laravel-Translations_-Package-with-Beautiful-AdminPanel.mp4', 'video/mp4', 'uploads', 'uploads', 16657518, '[]', '[]', '[]', 24, '2021-03-23 10:19:08', '2021-03-23 10:19:08'),
(95, 'App\\Models\\File', 31, '8b71d270-c03b-4b1d-bc75-64877cba5604', 'image', 'steganography_00001', 'steganography_00001.png', 'image/png', 'uploads', 'uploads', 26282, '[]', '[]', '[]', 48, '2021-03-26 06:49:49', '2021-03-26 06:49:49'),
(132, 'App\\Models\\File', 32, '539629e8-e042-4434-8d02-b9e21612b39e', 'image', 'lk10', 'lk10.png', 'image/jpeg', 'uploads', 'uploads', 139100, '[]', '[]', '[]', 57, '2021-03-31 12:35:15', '2021-03-31 12:35:15'),
(133, 'App\\Models\\File', 33, 'cfad1038-a814-4d35-bdc5-7b51d80eca9b', 'image', 'lk13', 'lk13.png', 'image/jpeg', 'uploads', 'uploads', 152121, '[]', '[]', '[]', 58, '2021-04-01 10:08:36', '2021-04-01 10:08:36'),
(134, 'App\\Models\\File', 34, '5396a073-0fbe-4d4b-b066-877a614c6320', 'image', 'lk2', 'lk2.png', 'image/jpeg', 'uploads', 'uploads', 58456, '[]', '[]', '[]', 59, '2021-04-01 10:08:37', '2021-04-01 10:08:37'),
(135, 'App\\Models\\File', 35, '22d6f45b-6411-43c2-8846-71669fd972a6', 'image', 'lk1', 'lk1.png', 'image/jpeg', 'uploads', 'uploads', 84698, '[]', '[]', '[]', 60, '2021-04-01 10:08:37', '2021-04-01 10:08:37'),
(136, 'App\\Models\\File', 36, '026d8d5c-4c5c-481e-b0bd-6cae41eda03b', 'image', 'lk', 'lk.png', 'image/jpeg', 'uploads', 'uploads', 141344, '[]', '[]', '[]', 61, '2021-04-01 10:08:37', '2021-04-01 10:08:37'),
(137, 'App\\Models\\File', 37, 'db8fa760-d331-4c81-857a-8783caa1facf', 'audio', 'HBD', 'HBD.mp3', 'audio/mpeg', 'uploads', 'uploads', 481018, '[]', '[]', '[]', 62, '2021-04-01 10:08:37', '2021-04-01 10:08:37'),
(138, 'App\\Models\\Theme', 26, '1065e835-1bc4-44c2-85c3-a5df85ccab7e', 'script', 'js', 'js.zip', 'application/zip', 'uploads', 'uploads', 60403, '[]', '[]', '[]', 63, '2021-04-05 09:42:14', '2021-04-05 09:42:14'),
(139, 'App\\Models\\Theme', 26, '614f885a-818c-48ca-af3b-20a62d5b2179', 'style', 'css', 'css.zip', 'application/zip', 'uploads', 'uploads', 3300539, '[]', '[]', '[]', 64, '2021-04-05 09:42:14', '2021-04-05 09:42:14'),
(140, 'App\\Models\\Theme', 26, '0ffe7a82-2e93-4b7d-8c20-526496ae1ea2', 'preview', 'Conclussion', 'Conclussion.png', 'image/png', 'uploads', 'uploads', 1108280, '[]', '[]', '[]', 65, '2021-04-05 09:42:14', '2021-04-05 09:42:14'),
(141, 'App\\Models\\Theme', 26, '138ac821-575a-4fa7-8f58-a0cfd013c0d5', 'interface', 'kabiru', 'kabiru.zip', 'application/zip', 'uploads', 'uploads', 6259, '[]', '[]', '[]', 66, '2021-04-05 09:42:14', '2021-04-05 09:42:14'),
(142, 'App\\Models\\Theme', 27, '4c331cc5-3c8e-49a4-9659-91c0af57f6ac', 'script', 'js', 'js.zip', 'application/zip', 'uploads', 'uploads', 60403, '[]', '[]', '[]', 67, '2021-04-05 09:58:00', '2021-04-05 09:58:00'),
(143, 'App\\Models\\Theme', 27, '7fb185b2-9cbc-4fe6-9305-4039d4cb0ee8', 'style', 'css', 'css.zip', 'application/zip', 'uploads', 'uploads', 3300539, '[]', '[]', '[]', 68, '2021-04-05 09:58:00', '2021-04-05 09:58:00'),
(144, 'App\\Models\\Theme', 27, '93a468b0-34e0-4be3-af1a-569f6e89a3cb', 'preview', 'hacking_00000', 'hacking_00000.png', 'image/png', 'uploads', 'uploads', 327007, '[]', '[]', '[]', 69, '2021-04-05 09:58:00', '2021-04-05 09:58:00'),
(145, 'App\\Models\\Theme', 27, '06a69635-1abd-4830-8eb8-a3ceaf8ff377', 'interface', 'kabirus', 'kabirus.zip', 'application/zip', 'uploads', 'uploads', 6259, '[]', '[]', '[]', 70, '2021-04-05 09:58:00', '2021-04-05 09:58:00'),
(150, 'App\\Models\\Theme', 29, 'd4719ef4-d938-45cb-8388-84cfc39798de', 'script', 'js', 'js.zip', 'application/zip', 'uploads', 'uploads', 60403, '[]', '[]', '[]', 71, '2021-04-05 10:40:31', '2021-04-05 10:40:31'),
(151, 'App\\Models\\Theme', 29, 'b975dec9-7b4f-4d10-8111-e164f2d6ec07', 'style', 'css', 'css.zip', 'application/zip', 'uploads', 'uploads', 3300539, '[]', '[]', '[]', 72, '2021-04-05 10:40:31', '2021-04-05 10:40:31'),
(152, 'App\\Models\\Theme', 29, '264160a3-2d83-4874-a2a5-ade431528539', 'preview', 'hacking_00000', 'hacking_00000.png', 'image/png', 'uploads', 'uploads', 327007, '[]', '[]', '[]', 73, '2021-04-05 10:40:31', '2021-04-05 10:40:31'),
(153, 'App\\Models\\Theme', 29, '37537183-ede8-4ebd-b3d2-5ea1da49df3d', 'interface', 'vboy', 'vboy.zip', 'application/zip', 'uploads', 'uploads', 6259, '[]', '[]', '[]', 74, '2021-04-05 10:40:31', '2021-04-05 10:40:31'),
(154, 'App\\Models\\File', 38, 'ba7a1939-ad4f-4bb5-a9a8-a57d80c60ec0', 'image', '17420448', '17420448.png', 'image/jpeg', 'uploads', 'uploads', 1281807, '[]', '[]', '[]', 75, '2021-04-08 17:23:20', '2021-04-08 17:23:20'),
(155, 'App\\Models\\File', 39, '69f9fbd1-29f0-45fc-81f1-9cd0dac6ebcb', 'image', 'DSCN3056', 'DSCN3056.png', 'image/jpeg', 'uploads', 'uploads', 5183301, '[]', '[]', '[]', 76, '2021-04-08 17:23:46', '2021-04-08 17:23:46'),
(156, 'App\\Models\\File', 40, '084bfedd-5331-43a9-8a9e-82af8ac7e225', 'image', 'DSCN3064', 'DSCN3064.png', 'image/jpeg', 'uploads', 'uploads', 4786623, '[]', '[]', '[]', 77, '2021-04-08 17:23:51', '2021-04-08 17:23:51'),
(157, 'App\\Models\\File', 41, '48748874-afe4-4824-9584-fe0b28a13843', 'image', 'DSCN3056', 'DSCN3056.png', 'image/jpeg', 'uploads', 'uploads', 5183301, '[]', '[]', '[]', 78, '2021-04-08 17:24:03', '2021-04-08 17:24:03'),
(158, 'App\\Models\\File', 42, '6d9a58d3-8b72-4edb-ba14-c736ceee88e1', 'image', 'DSCN3077', 'DSCN3077.png', 'image/jpeg', 'uploads', 'uploads', 5280731, '[]', '[]', '[]', 79, '2021-04-08 17:24:15', '2021-04-08 17:24:15'),
(159, 'App\\Models\\File', 43, '622af1fc-ea69-466a-bf4d-6f0f4e2caf83', 'image', 'DSCN3116', 'DSCN3116.png', 'image/jpeg', 'uploads', 'uploads', 3204757, '[]', '[]', '[]', 80, '2021-04-08 17:25:30', '2021-04-08 17:25:30');

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
(4, '2021_03_08_131001_create_media_table', 2),
(5, '2021_03_09_222726_create_files_table', 3),
(6, '2021_03_23_133241_create_categories_table', 4),
(7, '2021_03_24_111649_create_themes_table', 5),
(8, '2021_03_30_072251_create_functionalities_table', 6),
(9, '2021_03_30_124145_create_templates_table', 7),
(10, '2021_03_30_125819_create_templatesetups_table', 7);

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
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `music` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `templatesetup_id` bigint(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payment_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `category_id`, `image`, `music`, `video`, `templatesetup_id`, `content`, `user_id`, `description`, `date`, `comment`, `payment_id`, `status`, `payment_data`, `created_at`, `updated_at`) VALUES
(1, 'village boy', 1, NULL, NULL, NULL, NULL, NULL, 2, 'village boy birthday', '2021-04-15', 'no', NULL, 'pending', NULL, '2021-04-09 00:57:44', '2021-04-09 00:57:44'),
(2, 'yes im here', 3, NULL, NULL, NULL, NULL, NULL, 2, 'I love to be with yoo', '2021-04-09', 'no', NULL, 'pending', NULL, '2021-04-11 10:55:52', '2021-04-11 10:55:52'),
(3, 'adesina birthday', 8, NULL, NULL, NULL, 3, NULL, 2, 'Adesina is worth praise', '2021-04-11', 'no', 'KOADIT_29_2_3_adesina birthday', 'pending', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":1082705328,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"HWTiW7lwm692DzsOu5gnHmqoR\",\"amount\":588900,\"message\":\"test-3ds\",\"gateway_response\":\"[Test] Approved\",\"paid_at\":\"2021-04-14T04:16:22.000Z\",\"created_at\":\"2021-04-14T04:16:10.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"129.205.113.218\",\"metadata\":{\"user_id\":2,\"theme_id\":29,\"template_id\":3},\"log\":{\"start_time\":1618373773,\"time_spent\":10,\"attempts\":1,\"authentication\":\"3DS\",\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":5},{\"type\":\"auth\",\"message\":\"Authentication Required: 3DS\",\"time\":6},{\"type\":\"action\",\"message\":\"Third-party authentication window opened\",\"time\":9},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":10},{\"type\":\"action\",\"message\":\"Third-party authentication window closed\",\"time\":10}]},\"fees\":18834,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_0r33whyho6\",\"bin\":\"408408\",\"last4\":\"0409\",\"exp_month\":\"01\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_OJYkUjZwAD8h8Uj3XezO\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":43036258,\"first_name\":null,\"last_name\":null,\"email\":\"user1@vb.com\",\"customer_code\":\"CUS_oekhmuhd44buqlw\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2021-04-14T04:16:22.000Z\",\"createdAt\":\"2021-04-14T04:16:10.000Z\",\"requested_amount\":588900,\"pos_transaction_data\":null,\"transaction_date\":\"2021-04-14T04:16:10.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2021-04-11 11:31:49', '2021-04-14 03:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `templatesetups`
--

CREATE TABLE `templatesetups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `functionality` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`functionality`)),
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `music` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`music`)),
  `video` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`video`)),
  `theme_id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `user_id` int(11) NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templatesetups`
--

INSERT INTO `templatesetups` (`id`, `name`, `functionality`, `image`, `music`, `video`, `theme_id`, `content`, `user_id`, `date`, `created_at`, `updated_at`) VALUES
(3, NULL, '{\"1\":\"writer\",\"3\":\"carousel\",\"4\":\"sliders\",\"5\":\"music before\",\"6\":\"music on\",\"7\":\"music after\",\"11\":\"date\"}', '{\"sliders\":{\"0\":{\"image\":\"uploads\\/media\\/134\\/lk2.png\"},\"2\":{\"image\":\"uploads\\/media\\/133\\/lk13.png\"},\"4\":{\"image\":\"uploads\\/media\\/16\\/hms_00015.png\"}}}', '{\"musicbefore\":\"uploads\\/media\\/137\\/HBD.mp3\",\"musicon\":\"uploads\\/media\\/137\\/HBD.mp3\",\"musicafter\":\"uploads\\/media\\/7\\/akobi-omo\"}', NULL, 29, '{\"writer\":{\"0\":{\"name\":\"hello\"},\"2\":{\"name\":\"Hope your are doing good\"},\"3\":{\"name\":\"I love programing\"}},\"carousel\":{\"0\":{\"image\":\"uploads\\/media\\/136\\/lk.png\",\"caption\":\"I love you\",\"description\":\"&lt;p&gt;The love&amp;nbsp; my life and &lt;i&gt;I love you&lt;\\/i&gt;&lt;br&gt;&lt;\\/p&gt;\"},\"2\":{\"image\":\"uploads\\/media\\/132\\/lk10.png\",\"caption\":\"I know you\",\"description\":\"&lt;p&gt;Well ooo&lt;br&gt;&lt;\\/p&gt;\"}}}', 1, '2021-04-09', '2021-04-05 10:40:31', '2021-04-08 14:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `user_id`, `name`, `category_id`, `status`, `price`, `active`, `description`, `created_at`, `updated_at`) VALUES
(29, 1, 'vboy', '8', 'free', '5889', 'enabled', 'yes theis  sklfskl skljfsdkjkl', '2021-04-05 10:40:31', '2021-04-05 11:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_status` int(11) NOT NULL,
  `last_login_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `role`, `media_id`, `city`, `state`, `country`, `provider`, `provider_id`, `dob`, `gender`, `online_status`, `last_login_at`, `active_status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'oluokun kabiru', NULL, 'admin@vb.com', 'admin', '1', NULL, NULL, NULL, 'wish', '1', NULL, NULL, 1, '2021-03-23 10:57:29', '0', NULL, '$2y$10$07hUMzaPoOZl2H1wyT6Cb.mzWDaFDo41pAU0hNnnTZi.0zUC2LcD2', NULL, '2021-03-08 00:52:02', '2021-03-08 00:52:02'),
(2, 'Village boy', NULL, 'user1@vb.com', 'user', '1', NULL, NULL, NULL, 'wish', '1', NULL, NULL, 1, '2021-03-23 10:57:10', '0', NULL, '$2y$10$ZYIEm0c6v92TiqfCbtAKn.T.PF3TRTdZIV3CgOKQtH9BfBswUmKte', NULL, '2021-03-23 09:57:10', '2021-03-23 09:57:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `functionalities`
--
ALTER TABLE `functionalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templatesetups`
--
ALTER TABLE `templatesetups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `functionalities`
--
ALTER TABLE `functionalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `templatesetups`
--
ALTER TABLE `templatesetups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
