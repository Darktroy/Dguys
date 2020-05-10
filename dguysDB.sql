-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2020 at 01:41 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dguys`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank_name_ar` varchar(255) NOT NULL,
  `bank_name_en` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name_ar`, `bank_name_en`, `created_at`, `updated_at`) VALUES
(1, 'تيست 1', 'test bank 1', '2020-05-03 10:02:38', NULL),
(2, 'تيست بنك 2', 'trest bank 2', '2020-05-03 10:02:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_account_details`
--

CREATE TABLE `bank_account_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_account_details`
--

INSERT INTO `bank_account_details` (`id`, `created_at`, `updated_at`, `user_id`, `bank_name`, `bank_account_serial`) VALUES
(8, '2020-04-19 23:03:22', '2020-04-19 23:03:22', 20, 'bank name test', 'serial b1a11n1k1'),
(9, '2020-04-20 00:17:29', '2020-04-20 00:17:29', 21, 'bank name test', 'serial b1a11n1k1'),
(10, '2020-04-20 00:18:20', '2020-04-20 00:18:20', 22, 'bank name test', 'serial b1a11n1k1'),
(11, '2020-04-27 04:37:56', '2020-04-27 04:37:56', 25, '1', 'serial b1a11n1k1'),
(12, '2020-04-28 11:00:34', '2020-04-28 11:00:34', 26, '1', 'serial b1a11n1k1'),
(13, '2020-04-28 11:04:55', '2020-04-28 11:04:55', 30, '1', 'serial b1a11n1k1'),
(14, '2020-04-28 11:06:38', '2020-04-28 11:06:38', 31, '1', 'serial b1a11n1k1');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(16) NOT NULL,
  `user_id` int(8) NOT NULL,
  `complain_by_user_type` varchar(16) NOT NULL,
  `OrderRequest_id` int(8) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `confirmations`
--

CREATE TABLE `confirmations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('email','mobile') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_guy_details`
--

CREATE TABLE `delivery_guy_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_citizen` tinyint(1) DEFAULT NULL,
  `national_card_serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_card_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_guy_details`
--

INSERT INTO `delivery_guy_details` (`id`, `created_at`, `updated_at`, `user_id`, `latitude`, `longitude`, `address`, `city`, `is_citizen`, `national_card_serial`, `national_card_image`, `license_image`) VALUES
(2, '2020-04-19 23:03:22', '2020-04-19 23:03:22', 20, 12.12345, 12.35789, 'address test', 'Maka', 1, '358469875', 'national_card_image158734460220.png', 'license_image158734460220.png'),
(3, '2020-04-20 00:17:29', '2020-04-20 00:17:29', 21, 12.12345, 12.35789, 'address test', 'Maka', 1, '358469875', 'national_card_image158734904921.png', 'license_image158734904921.png'),
(4, '2020-04-20 00:18:20', '2020-04-20 00:18:20', 22, 12.12345, 12.35789, 'address test', 'Maka', 1, '358469875', 'national_card_image158734910022.png', 'license_image158734910022.png'),
(5, '2020-04-27 04:37:56', '2020-04-27 04:37:56', 25, 12.12345, 12.35789, 'address test', '1', 1, '358469875', 'mxqzWj3tcFQ9KCMdHOLFjX5OOOGgxzU4p2BEk5Of.png', 'lpTkA8EYr8AkjdxR80CpdWLpug2gwaDcAFQvfngg.png'),
(6, '2020-04-28 11:00:34', '2020-04-28 11:00:34', 26, 12.12345, 12.35789, 'address test', '1', 1, '358469875', 'kUuak0pvgCoSPLCvROc1SwlcDsbjuGH7pXZO7GCa.png', 'WTg1vdKk57B4JWJ2u21t7SLYvJ4sWnSN6kalrFjk.png'),
(7, '2020-04-28 11:04:55', '2020-04-28 11:04:55', 30, 12.12345, 12.35789, 'address test', '1', 1, '358469875', 'vx2kNxYT244YK67R3gWKGMCH4mUjBsJ6hybZJv9M.png', 'rD4EBvXKXJnyDZfjIvQHRLEmKmq4vuJrN13P0j5T.png'),
(8, '2020-04-28 11:06:38', '2020-04-28 11:06:38', 31, 12.12345, 12.35789, 'address test', '1', 1, '358469875', 'RVjHhT9m43Gi48pkpBumlMHunkVMQh6X46JQQOwt.png', 'p3K2H5EqZiZeAzk6iC6gcecjbMG0BJmrpIunC5gZ.png');

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(11) NOT NULL,
  `dicount_code` varchar(8) NOT NULL,
  `is_active` binary(1) NOT NULL DEFAULT '',
  `is_individual` binary(1) NOT NULL DEFAULT '\0',
  `is_once` binary(1) NOT NULL DEFAULT '\0',
  `dicount_percentage` double(8,4) NOT NULL,
  `discount_amount` double(8,4) NOT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `driver_location`
--

CREATE TABLE `driver_location` (
  `id` int(32) NOT NULL,
  `driver_id` int(16) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `status` enum('on','off','trip') NOT NULL,
  `longitude` double(11,8) NOT NULL,
  `latitude` double(11,8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `driver_location`
--

INSERT INTO `driver_location` (`id`, `driver_id`, `device_id`, `status`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 25, 'qwertyuiop[wertyuiodddddddddddddddd', 'on', 30.12345678, 29.12345678, '2020-04-27 07:42:38', '2020-04-27 07:42:38'),
(2, 25, 'qwertyuiop[wertyuiodddddddddddddddd', 'on', 30.12345678, 21.12345678, '2020-04-27 07:42:38', '2020-04-27 07:42:38'),
(3, 25, 'qwertyuiop[wertyuiodddddddddddddddd', 'on', 31.12345678, 21.12345678, '2020-04-27 07:42:38', '2020-04-27 07:42:38'),
(4, 25, 'qwertyuiop[wertyuiodddddddddddddddd', 'on', 30.02345678, 29.12345678, '2020-04-27 07:42:38', '2020-04-27 07:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `driver_to_requests`
--

CREATE TABLE `driver_to_requests` (
  `id` int(24) NOT NULL,
  `driver_id` int(16) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `OrderRequest_id` int(16) NOT NULL,
  `delivery_price_by_driver` double(8,2) DEFAULT NULL,
  `status` enum('in_queu','waiting_driver','waiting_client','cancel_by_driver','cancel_by_client','accept_by_client','accept_by_driver','completed') NOT NULL DEFAULT 'in_queu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `driver_to_requests`
--

INSERT INTO `driver_to_requests` (`id`, `driver_id`, `device_id`, `OrderRequest_id`, `delivery_price_by_driver`, `status`, `created_at`, `updated_at`) VALUES
(7, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 69, NULL, 'accept_by_client', '2020-04-28 07:31:15', '2020-04-29 03:43:52'),
(8, 22, 'qwertyuiop[wertyuiodddddddddddddddd', 69, NULL, 'in_queu', '2020-04-28 07:31:15', '2020-04-28 07:31:15'),
(9, 22, 'qwertyuiop[wertyuiodddddddddddddddd', 69, NULL, 'in_queu', '2020-04-28 07:31:15', '2020-04-28 07:31:15'),
(10, 23, 'qwertyuiop[wertyuiodddddddddddddddd', 70, NULL, 'waiting_driver', '2020-04-28 07:42:07', '2020-04-28 07:42:07'),
(11, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 70, NULL, 'in_queu', '2020-04-28 07:42:07', '2020-04-28 07:42:07'),
(12, 22, 'qwertyuiop[wertyuiodddddddddddddddd', 70, NULL, 'in_queu', '2020-04-28 07:42:07', '2020-04-28 07:42:07'),
(13, 23, 'qwertyuiop[wertyuiodddddddddddddddd', 72, NULL, 'waiting_driver', '2020-04-28 08:18:52', '2020-04-28 08:18:52'),
(14, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 72, NULL, 'in_queu', '2020-04-28 08:18:52', '2020-04-28 08:18:52'),
(15, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 72, NULL, 'in_queu', '2020-04-28 08:18:52', '2020-04-28 08:18:52'),
(16, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 73, NULL, 'waiting_driver', '2020-04-28 08:19:53', '2020-04-28 08:19:53'),
(17, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 73, NULL, 'waiting_client', '2020-04-28 08:19:53', '2020-04-28 08:19:53'),
(18, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 73, NULL, 'in_queu', '2020-04-28 08:19:53', '2020-04-28 08:19:53'),
(19, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 74, NULL, 'waiting_driver', '2020-04-28 08:19:56', '2020-04-28 08:19:56'),
(20, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 74, NULL, 'in_queu', '2020-04-28 08:19:56', '2020-04-28 08:19:56'),
(21, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 74, NULL, 'in_queu', '2020-04-28 08:19:56', '2020-04-28 08:19:56'),
(22, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 75, NULL, 'waiting_driver', '2020-04-28 08:20:00', '2020-04-28 08:20:00'),
(23, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 75, NULL, 'in_queu', '2020-04-28 08:20:00', '2020-04-28 08:20:00'),
(24, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 75, NULL, 'in_queu', '2020-04-28 08:20:00', '2020-04-28 08:20:00'),
(25, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 76, NULL, 'waiting_driver', '2020-04-28 08:20:03', '2020-04-28 08:20:03'),
(26, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 76, NULL, 'in_queu', '2020-04-28 08:20:03', '2020-04-28 08:20:03'),
(27, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 76, NULL, 'in_queu', '2020-04-28 08:20:03', '2020-04-28 08:20:03'),
(28, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 77, NULL, 'waiting_driver', '2020-04-28 08:20:06', '2020-04-28 08:20:06'),
(29, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 77, NULL, 'in_queu', '2020-04-28 08:20:06', '2020-04-28 08:20:06'),
(30, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 77, NULL, 'in_queu', '2020-04-28 08:20:06', '2020-04-28 08:20:06'),
(31, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 78, NULL, 'waiting_driver', '2020-04-29 03:27:16', '2020-04-29 03:27:16'),
(32, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 78, NULL, 'in_queu', '2020-04-29 03:27:16', '2020-04-29 03:27:16'),
(33, 21, 'qwertyuiop[wertyuiodddddddddddddddd', 78, NULL, 'in_queu', '2020-04-29 03:27:16', '2020-04-29 03:27:16');

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
-- Table structure for table `invtations`
--

CREATE TABLE `invtations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_by_user_id` int(10) UNSIGNED NOT NULL,
  `invited_user_id` int(10) UNSIGNED NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(9, '2020_04_19_174257_create_delivery_guy_details_table', 3),
(10, '2020_04_19_174501_create_vehicle_details_table', 3),
(11, '2020_04_19_180035_create_bank_account_details_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `money_changes`
--

CREATE TABLE `money_changes` (
  `id` int(3) NOT NULL,
  `name` int(3) NOT NULL,
  `value` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `money_changes`
--

INSERT INTO `money_changes` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 50, 50, '2020-04-27 04:39:23', NULL),
(2, 100, 100, '2020-04-27 04:39:23', NULL),
(3, 500, 500, '2020-04-27 04:39:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('33d7a4e43b7f519b1466c8d3c4f11d4784fbf267a5bce7f7761d32f1dd4ef2e1d0f4b28cee5bc1df', 20, 1, 'IessaSaysHi', '[]', 0, '2020-04-19 23:03:22', '2020-04-19 23:03:22', '2021-04-20 01:03:22'),
('73657d7987670d7fac6a3692571dba6693f99e557ec5dd7f38af6f8be5576a5de19a9e7b27b9d7b0', 6, 1, 'IessaSaysHi', '[]', 0, '2020-04-19 10:17:24', '2020-04-19 10:17:24', '2021-04-19 12:17:24'),
('7702142fa404851d5e6445f7602cea590603472b0bbf6a2bb101def421f733e9f1e941fef0ca85b8', 22, 1, 'IessaSaysHi', '[]', 0, '2020-04-20 00:18:20', '2020-04-20 00:18:20', '2021-04-20 02:18:20'),
('c48c174dd87c246bfce233d4e5561ed00f3cab29896c160c7ad44502eb24c090147699a0655fabd3', 21, 1, 'IessaSaysHi', '[]', 0, '2020-04-20 00:17:29', '2020-04-20 00:17:29', '2021-04-20 02:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'DI4ieIGPrlJbFvktXPoYHnuWBOPf4HkfzFLzlLn2', 'http://localhost', 1, 0, 0, '2020-04-19 03:15:11', '2020-04-19 03:15:11'),
(2, NULL, 'Laravel Password Grant Client', 'ZcsPAc3shTu05pb7i5iaERyb34qGUM1UgMwRWNlt', 'http://localhost', 0, 1, 0, '2020-04-19 03:15:11', '2020-04-19 03:15:11'),
(3, 1, '1', 'MPehTnCnZ1Ui6ir3f2cncBTSzuEBnGHLKVKjdQRj', '1', 0, 0, 0, '2020-04-19 03:38:35', '2020-04-19 03:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-19 03:15:11', '2020-04-19 03:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_pick_drops`
--

CREATE TABLE `order_pick_drops` (
  `id` int(24) NOT NULL,
  `OrderRequest_id` int(16) NOT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_latitude` double(11,8) NOT NULL,
  `shop_longitude` double(11,8) NOT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `drop_latitude` double(11,8) NOT NULL,
  `drop_longitude` double(11,8) NOT NULL,
  `drop_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `order_pick_drops`
--

INSERT INTO `order_pick_drops` (`id`, `OrderRequest_id`, `shop_name`, `shop_latitude`, `shop_longitude`, `shop_address`, `drop_latitude`, `drop_longitude`, `drop_address`, `created_at`, `updated_at`) VALUES
(1, 8, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-27 06:51:28', '2020-04-27 06:51:28'),
(37, 44, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 01:25:43', '2020-04-28 01:25:43'),
(62, 69, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 07:31:14', '2020-04-28 07:31:14'),
(63, 70, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 07:42:05', '2020-04-28 07:42:05'),
(65, 72, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 08:18:50', '2020-04-28 08:18:50'),
(66, 73, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 08:19:51', '2020-04-28 08:19:51'),
(67, 74, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 08:19:55', '2020-04-28 08:19:55'),
(68, 75, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 08:19:58', '2020-04-28 08:19:58'),
(69, 76, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 08:20:02', '2020-04-28 08:20:02'),
(70, 77, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-28 08:20:04', '2020-04-28 08:20:04'),
(71, 78, 'shop name test', 30.12345678, 31.12345678, 'shope test address', 29.12345678, 28.12345678, 'drop address ttest', '2020-04-29 03:27:12', '2020-04-29 03:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_requests`
--

CREATE TABLE `order_requests` (
  `id` int(32) NOT NULL,
  `user_id` int(16) NOT NULL,
  `driver_id` int(24) DEFAULT NULL,
  `estimated_price_by_client` double(8,2) NOT NULL,
  `order_description` text NOT NULL,
  `status` enum('active','cancelled','waiting','in_progress','buying','completed','delivering','starting','delivery_guy_complete') NOT NULL DEFAULT 'waiting',
  `money_changes_id` int(3) DEFAULT NULL,
  `discount_code` varchar(12) DEFAULT NULL,
  `delivery_price` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `order_requests`
--

INSERT INTO `order_requests` (`id`, `user_id`, `driver_id`, `estimated_price_by_client`, `order_description`, `status`, `money_changes_id`, `discount_code`, `delivery_price`, `created_at`, `updated_at`) VALUES
(8, 23, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-27 06:51:28', '2020-04-27 06:51:28'),
(44, 25, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-28 01:25:43', '2020-04-28 01:25:43'),
(69, 25, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-28 07:31:14', '2020-04-29 03:43:53'),
(70, 25, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-28 07:42:05', '2020-04-28 07:42:05'),
(72, 25, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-28 08:18:50', '2020-04-28 08:18:50'),
(73, 25, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-28 08:19:51', '2020-04-28 08:19:51'),
(74, 25, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-28 08:19:55', '2020-04-28 08:19:55'),
(75, 25, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-28 08:19:58', '2020-04-28 08:19:58'),
(76, 25, NULL, 100.00, 'test desc', 'active', NULL, NULL, 10.00, '2020-04-28 08:20:02', '2020-04-28 08:20:02'),
(77, 25, NULL, 100.00, 'test desc', 'delivering', NULL, NULL, 10.00, '2020-04-28 08:20:04', '2020-04-28 08:20:04'),
(78, 25, NULL, 100.00, 'test desc', 'waiting', NULL, NULL, 10.00, '2020-04-29 03:27:12', '2020-04-29 03:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_states`
--

CREATE TABLE `order_states` (
  `status_id` varchar(64) NOT NULL,
  `states_name_en` varchar(255) NOT NULL,
  `states_name_ar` varchar(255) NOT NULL,
  `brief` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `order_states`
--

INSERT INTO `order_states` (`status_id`, `states_name_en`, `states_name_ar`, `brief`, `created_at`, `updated_at`) VALUES
('active', 'Active', 'قيد التنفيذ', 'هي حالة الطلب بعد قبول كل من العميل والمندوب للطلب وعندها يبدأ المحادثة', '2020-04-29 17:32:51', NULL),
('buying', 'Buying goodes', 'شراء المنتجات', 'هي حالة الطلب أثناء تواجد المندوب بالمتجر ويشترى المنتجات – يتم تحديثها من قبل المندوب.', '2020-04-29 17:42:55', NULL),
('completed', 'Delivery Completd', 'تم التسليم', 'هي حالة الطلب بعد تسليم المنتجات للعميل والدفع والتقييم.', '2020-04-29 17:56:39', NULL),
('delivering', 'Delivering', 'توصيل المنتجات', 'هي حالة الطلب بعد شراء المنتجات وهو بطريقه للعميل – يتم تحديثها من قبل المندوب.', '2020-04-29 17:56:39', NULL),
('starting', 'Trip start', 'بدء الرحلة', 'هي حالة الطلب عند تحرك المندوب باتجاه المتجر – يتم تحديثها من قبل المندوب.', '2020-04-29 17:42:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(16) NOT NULL,
  `OrderRequest_id` int(16) NOT NULL,
  `rate_by_user_type` varchar(16) NOT NULL,
  `rate` int(5) NOT NULL,
  `user_id` int(16) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'api/ksa',
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `type` enum('client','delivery_guy') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile`, `email_verified_at`, `password`, `profile_image`, `device_id`, `active`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, NULL, NULL, NULL, '050085', NULL, '$2y$10$08Qce4kSu3o0HBjp.yl23uIoO./4AftZfzk20t6AfjxylFbl9zyTG', '15872986436.png', NULL, 0, 'client', NULL, '2020-04-19 10:17:23', '2020-04-19 10:17:23'),
(20, 'trest first name', 'tes last name', NULL, '0123456789', NULL, '$2y$10$D3r9esn7aMXspuyn/rjyDOaU0.WNv/iFw/D8m48iIfIMu1aFwplOi', '158734460220.png', NULL, 0, 'delivery_guy', NULL, '2020-04-19 23:03:22', '2020-04-19 23:03:22'),
(21, 'trest first name', 'tes last name', NULL, '012004202004', NULL, '$2y$10$GokODhrJ8pqtI4FRwVW6A.GMtYA7k4NPCnsshypyvd4ZaLoBFhX7S', '158734904721.png', 'device_id20200428', 0, 'delivery_guy', NULL, '2020-04-20 00:17:27', '2020-04-30 02:54:47'),
(22, 'trest first name', 'tes last name', NULL, '012004200418', NULL, '$2y$10$hR5KDKmat5HhpN8NwR4JWe23VUKNG9Tqr2J.ebdW/kMtv2mlwIvn.', '158734910022.png', NULL, 0, 'client', NULL, '2020-04-20 00:18:20', '2020-04-20 00:18:20'),
(23, NULL, NULL, NULL, '01226042020', NULL, '$2y$10$j/gf3yJ3wmKOMuaM44RRS.uShqaSZ3QzGmTAM8Zd1rVbWJE1Rx3wS', 'G4It1wOaUd4vAyg3BZSh6bKO0kTTPm9r98xmWtw7.png', NULL, 0, 'client', NULL, '2020-04-27 04:32:44', '2020-04-27 04:32:44'),
(25, 'trest first name', 'tes last name', NULL, '0122042101', NULL, '$2y$10$IoA6Rjdb/3JXe1I2s1i4TudN9mjysb9eYDRzQZDq082Ijf/SElrnS', 'api/ksa', 'iop[qs,fowkcpw;eckwpeolckpweokc', 0, 'client', NULL, '2020-04-27 04:37:56', '2020-04-29 03:27:12'),
(26, 'trest first name', 'tes last name', NULL, '01220200428', NULL, '$2y$10$tMr5rjDc2ifrlXY0FU0iOOE3y8bWAXe2AYeozd8WIPJpvLgCt8uOy', 'api/ksa', NULL, 0, 'client', NULL, '2020-04-28 11:00:33', '2020-04-28 11:00:33'),
(28, NULL, NULL, NULL, '01120200428', NULL, '$2y$10$tqYg9TnINhCroeDA/UkIue.QnPfBaeLBNBRfdjeZXa9mGGYXnZvIy', '7ZnPSmO3OqzqdbaUeSrnZFoRw8EZbVfdFGlhCpvD.png', NULL, 0, 'client', NULL, '2020-04-28 11:02:00', '2020-04-28 11:02:00'),
(29, NULL, NULL, NULL, '011202004282', NULL, '$2y$10$l4N/BXSemninIUrE8lE91Od7.iB55RMhojha3D1teDQW3npEYMCMC', 'blNu1zaeD2KCwqTHEgki6086Xsp4scHDCHdLGBXv.png', 'upo[p', 0, 'client', NULL, '2020-04-28 11:03:02', '2020-04-28 11:03:02'),
(30, 'trest first name', 'tes last name', NULL, '012202004282', NULL, '$2y$10$U4bY9pTbLsHdbPMHGMT22elotssvAoruWsTlAwvDmegDhvke7Yn2y', 'api/ksa', 'device_id', 0, 'client', NULL, '2020-04-28 11:04:55', '2020-04-28 11:04:55'),
(31, 'trest first name', 'tes last name', NULL, '012202004283', NULL, '$2y$10$iMKz43HCvJJqLAyJ4BOP8eNJfGLxlLuFXLa4Xe7uue8FZ3y0R4rxG', 'api/ksa', 'device_id', 0, 'delivery_guy', NULL, '2020-04-28 11:06:38', '2020-04-28 11:06:38'),
(32, NULL, NULL, 'admin@gmail.com', '01002433739', NULL, '$2y$10$3F0WJ9BSW0VLropWc0ln5eA3mC1MUwzLeSknLbPCX8ObWXqPQ6GYG', 'api/ksa', NULL, 0, 'client', NULL, '2020-05-10 06:28:34', '2020-05-10 06:28:34'),
(34, NULL, NULL, 'test@test.test', NULL, NULL, '$2y$10$nfbUwJfrAt.IITm6WBQ7M.Pq7BrtXh5fQngddZDvtclTMc4nCbNEu', 'api/ksa', NULL, 0, 'client', NULL, '2020-05-10 06:46:51', '2020-05-10 06:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `created_at`, `updated_at`, `user_id`, `model`, `plate_number`, `type`) VALUES
(10, '2020-04-19 23:03:22', '2020-04-19 23:03:22', 20, '2017 baby shark', '158ksa', 'Hyndai'),
(11, '2020-04-20 00:17:29', '2020-04-20 00:17:29', 21, '2017 baby shark', '158ksa', 'Hyndai'),
(12, '2020-04-20 00:18:20', '2020-04-20 00:18:20', 22, '2017 baby shark', '154test', 'Hyndai'),
(14, '2020-04-27 04:37:56', '2020-04-27 04:37:56', 25, '2017 baby shark', '154test', 'Hyndai'),
(15, '2020-04-28 11:00:33', '2020-04-28 11:00:33', 26, '2017 baby shark', '154test', 'Hyndai'),
(16, '2020-04-28 11:04:55', '2020-04-28 11:04:55', 30, '2017 baby shark', '154test', 'driver'),
(17, '2020-04-28 11:06:38', '2020-04-28 11:06:38', 31, '2017 baby shark', '154test', 'delivery_guy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_account_details`
--
ALTER TABLE `bank_account_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_account_details_user_id_index` (`user_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmations`
--
ALTER TABLE `confirmations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_guy_details`
--
ALTER TABLE `delivery_guy_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_guy_details_user_id_index` (`user_id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_location`
--
ALTER TABLE `driver_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_to_requests`
--
ALTER TABLE `driver_to_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invtations`
--
ALTER TABLE `invtations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_changes`
--
ALTER TABLE `money_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_pick_drops`
--
ALTER TABLE `order_pick_drops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_requests`
--
ALTER TABLE `order_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_states`
--
ALTER TABLE `order_states`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_details_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_account_details`
--
ALTER TABLE `bank_account_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_guy_details`
--
ALTER TABLE `delivery_guy_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_location`
--
ALTER TABLE `driver_location`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver_to_requests`
--
ALTER TABLE `driver_to_requests`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invtations`
--
ALTER TABLE `invtations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `money_changes`
--
ALTER TABLE `money_changes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_pick_drops`
--
ALTER TABLE `order_pick_drops`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `order_requests`
--
ALTER TABLE `order_requests`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
