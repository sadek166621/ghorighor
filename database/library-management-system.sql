-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 08:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'LIGE watch', 'image/brand_image/1749880124.png', 1, '2021-12-05 06:09:45', '2021-12-05 06:09:45'),
(2, 'OLEVS watch', 'image/brand_image/1073645716.jpg', 1, '2021-12-05 06:10:35', '2021-12-06 10:07:13'),
(3, 'Wishdoit watch', 'image/brand_image/510917473.png', 1, '2021-12-05 06:10:58', '2021-12-06 10:07:46'),
(4, 'Kinywed watch', 'image/brand_image/2137292639.jpg', 1, '2021-12-05 06:11:29', '2021-12-06 10:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'man watch', 'image/category_image/195245192.png', 1, '2021-12-04 12:52:45', '2021-12-04 12:52:45'),
(2, 'women watch', 'image/category_image/1622512585.png', 1, '2021-12-04 12:53:15', '2021-12-04 12:53:15'),
(3, 'Top Rated', 'image/category_image/510147426.png', 1, '2021-12-04 12:53:38', '2021-12-04 12:53:38'),
(4, 'Lowest Rated', 'image/category_image/1027129167.png', 1, '2021-12-04 12:54:05', '2021-12-04 12:54:05'),
(5, 'Automatic Watch', 'image/category_image/642154178.png', 1, '2021-12-04 12:54:23', '2021-12-04 12:54:23'),
(6, 'chronographwatch', 'image/category_image/2129461577.png', 1, '2021-12-04 12:54:50', '2021-12-04 12:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youTube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `publication_status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone_1`, `phone_2`, `phone_3`, `phone_4`, `phone_5`, `email`, `email_1`, `facebook`, `twitter`, `instagram`, `pinterest`, `linkedIn`, `youTube`, `address`, `map`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, '+8801580787180', '+8801628777067', NULL, NULL, NULL, 'info@ghorighor.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Razzak plaza,1 New Eskaton Road,Moghbazar More, Dhaka-1217', NULL, 1, '2021-12-15 02:51:37', '2021-12-15 03:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile_number`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Shuvo', 'Shuvo@gmail.com', '01799382934', '$2y$10$XBrU7eK4FHHwh8QVCzYoceVyekiJf08f.1BQxnh1RsjL872XxF0Wa', '2021-12-08 02:30:10', '2021-12-08 02:30:10'),
(2, 'Shuvo', 'Shuvo@gmail.com', '01799382934', '$2y$10$k1Jn9VB3Cm4aTkgbdsME8u63zTflMJDXxc4vs0uiZ5LgsXFZsUmLO', '2021-12-08 02:30:27', '2021-12-08 02:30:27'),
(3, 'sunny', 'sunny@gmail.com', '01478523698', '$2y$10$2Zzl3s5oS8dN6MoFESDSxeOkNqJje/.SIRSbZymNyEzECpfF/VluS', '2023-01-24 15:48:20', '2023-01-24 15:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` tinyint(4) DEFAULT NULL,
  `publication_status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `url`, `section`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'admin/gallery_image/1946084754.jpg', NULL, 1, 1, '2021-12-15 10:54:07', '2021-12-15 10:54:07'),
(2, 'admin/gallery_image/376572306.jpg', NULL, 2, 1, '2021-12-15 10:56:59', '2021-12-15 10:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'image/logo_image/162823544.png', 1, '2021-12-15 01:09:57', '2021-12-15 11:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `marquees`
--

CREATE TABLE `marquees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marquees`
--

INSERT INTO `marquees` (`id`, `category_name`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Our watch is a portable timepiece intended to be carried or worn by a person. ... During most of its history the watch was a mechanical device, driven by clockwork, powered by winding a mainspring, and keeping time with an oscillating balance wheel. These are called mechanical watches.', 1, '2021-12-14 09:01:11', '2021-12-14 09:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjext` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subjext`, `message`, `created_at`, `updated_at`) VALUES
(1, 'sadek', 'sadek@gmail.com', '01799382934', 'hi', 'hi hi', '2021-12-15 04:54:37', '2021-12-15 04:54:37'),
(2, 'hkhfkfg', 'ghjdyhj@gmail.com', '4537878379379', 'hsdh', 'hsdhghsgh srthsrthsrt ty', '2023-03-07 12:53:37', '2023-03-07 12:53:37');

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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2021_10_30_072304_create_permission_tables', 1),
(16, '2021_11_07_082932_create_departments_table', 2),
(17, '2021_11_07_095121_create_authors_table', 2),
(18, '2021_12_04_184759_create_categories_table', 2),
(19, '2021_12_04_191812_create_sub_categories_table', 3),
(20, '2021_12_05_120613_create_brands_table', 4),
(21, '2021_12_05_121947_create_suppliers_table', 5),
(22, '2021_12_05_130745_create_products_table', 6),
(23, '2021_12_05_130816_create_product_sub_images_table', 6),
(24, '2021_12_07_160219_create_shippings_table', 7),
(25, '2021_12_07_160759_create_payments_table', 8),
(26, '2021_12_07_161155_create_orders_table', 9),
(27, '2021_12_07_161535_create_order_details_table', 10),
(28, '2021_12_08_083415_create_customers_table', 11),
(29, '2021_12_08_165603_create_wish_lists_table', 12),
(30, '2021_12_14_151713_create_marquees_table', 13),
(31, '2021_12_14_173846_create_sliders_table', 14),
(32, '2021_12_15_073440_create_logos_table', 15),
(33, '2021_12_15_091256_create_contacts_table', 16),
(34, '2021_12_15_111526_create_messages_table', 17),
(35, '2021_12_15_170756_create_galleries_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(5, 'App\\User', 2),
(7, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `subtk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_total` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `shipping_id`, `payment_id`, `order_no`, `subtk`, `order_total`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 63545, '60', 9060, 2, 1, '2021-12-07 11:11:42', '2021-12-08 11:15:11'),
(2, 2, 2, 60309, '60', 9060, 1, 1, '2021-12-07 11:26:38', '2021-12-07 13:02:56'),
(3, 3, 3, 96400, '60', 6060, 2, 1, '2021-12-08 11:17:11', '2021-12-08 11:17:46'),
(4, 4, 4, 7459, '60', 3860, 2, 1, '2021-12-15 06:03:35', '2021-12-15 06:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, '2021-12-07 11:11:42', '2021-12-07 11:11:42'),
(2, 2, 5, 2, '2021-12-07 11:26:38', '2021-12-07 11:26:38'),
(3, 3, 4, 3, '2021-12-08 11:17:12', '2021-12-08 11:17:12'),
(4, 4, 4, 1, '2021-12-15 06:03:35', '2021-12-15 06:03:35'),
(5, 4, 6, 1, '2021-12-15 06:03:35', '2021-12-15 06:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `payment_mobile_no`, `transaction_no`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'bkash', '01799382934', '1', '9060', '2021-12-07 11:11:42', '2021-12-07 11:11:42'),
(2, 'cod', NULL, NULL, NULL, '2021-12-07 11:26:38', '2021-12-07 11:26:38'),
(3, 'cod', NULL, NULL, NULL, '2021-12-08 11:17:11', '2021-12-08 11:17:11'),
(4, 'cod', NULL, NULL, NULL, '2021-12-15 06:03:35', '2021-12-15 06:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.create', 'web', 'admin', '2021-10-30 02:32:41', '2021-10-30 02:32:41'),
(2, 'admin.view', 'web', 'admin', '2021-10-30 02:32:41', '2021-10-30 02:32:41'),
(3, 'admin.edit', 'web', 'admin', '2021-10-30 02:32:42', '2021-10-30 02:32:42'),
(4, 'admin.delete', 'web', 'admin', '2021-10-30 02:32:42', '2021-10-30 02:32:42'),
(5, 'admin.approve', 'web', 'admin', '2021-10-30 02:32:42', '2021-10-30 02:32:42'),
(6, 'role.create', 'web', 'role', '2021-10-30 02:32:42', '2021-10-30 02:32:42'),
(7, 'role.view', 'web', 'role', '2021-10-30 02:32:42', '2021-10-30 02:32:42'),
(8, 'role.edit', 'web', 'role', '2021-10-30 02:32:42', '2021-10-30 02:32:42'),
(9, 'role.delete', 'web', 'role', '2021-10-30 02:32:42', '2021-10-30 02:32:42'),
(10, 'role.approve', 'web', 'role', '2021-10-30 02:32:43', '2021-10-30 02:32:43'),
(11, 'category.create', 'web', 'manage-category', '2021-10-30 02:32:43', '2021-10-30 02:32:43'),
(12, 'category.view', 'web', 'manage-category', '2021-10-30 02:32:43', '2021-10-30 02:32:43'),
(13, 'category.edit', 'web', 'manage-category', '2021-10-30 02:32:43', '2021-10-30 02:32:43'),
(14, 'category.delete', 'web', 'manage-category', '2021-10-30 02:32:43', '2021-10-30 02:32:43'),
(15, 'post.create', 'web', 'post', '2021-10-30 02:32:43', '2021-10-30 02:32:43'),
(16, 'post.view', 'web', 'post', '2021-10-30 02:32:44', '2021-10-30 02:32:44'),
(17, 'post.edit', 'web', 'post', '2021-10-30 02:32:44', '2021-10-30 02:32:44'),
(18, 'post.delete', 'web', 'post', '2021-10-30 02:32:44', '2021-10-30 02:32:44'),
(19, 'post.approve', 'web', 'post', '2021-10-30 02:32:44', '2021-10-30 02:32:44'),
(20, 'notification.view', 'web', 'post-notification', '2021-10-30 02:32:44', '2021-10-30 02:32:44'),
(21, 'author.view', 'web', 'author', '2021-10-30 02:32:44', '2021-10-30 02:32:44'),
(22, 'author.edit', 'web', 'author', '2021-10-30 02:32:45', '2021-10-30 02:32:45'),
(23, 'author.delete', 'web', 'author', '2021-10-30 02:32:45', '2021-10-30 02:32:45'),
(24, 'author.approve', 'web', 'author', '2021-10-30 02:32:45', '2021-10-30 02:32:45'),
(25, 'ads.create', 'web', 'ads', '2021-10-30 02:32:45', '2021-10-30 02:32:45'),
(26, 'ads.view', 'web', 'ads', '2021-10-30 02:32:46', '2021-10-30 02:32:46'),
(27, 'ads.edit', 'web', 'ads', '2021-10-30 02:32:46', '2021-10-30 02:32:46'),
(28, 'ads.delete', 'web', 'ads', '2021-10-30 02:32:46', '2021-10-30 02:32:46'),
(29, 'ads.approve', 'web', 'ads', '2021-10-30 02:32:46', '2021-10-30 02:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `discount_product_amount` double(8,2) NOT NULL,
  `discount_product_price` double(8,2) NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cost` double(8,2) NOT NULL,
  `product_stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_made_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `main_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `primium` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_product` tinyint(4) DEFAULT NULL,
  `new_arrivals` tinyint(4) DEFAULT NULL,
  `ramdom_products` tinyint(4) DEFAULT NULL,
  `latest_product` tinyint(4) DEFAULT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `brand_id`, `supplier_id`, `product_name`, `slug`, `product_code`, `product_price`, `discount_product_amount`, `discount_product_price`, `product_quantity`, `product_cost`, `product_stock`, `product_color`, `product_made_by`, `description`, `link`, `main_image`, `primium`, `featured_product`, `new_arrivals`, `ramdom_products`, `latest_product`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'mens watch', 'mens-watch', 'ht-50', 600.00, 100.00, 500.00, '8', 400.00, '8', 'White', 'Bangladesh', 'Business style & Sports As we all know, there are very few smart watches suitable for business occasions. Imagine if there is a perfect combination of business style and smart watch style? Wonderful things will always happen in this world. We have done it. The prudent qualities can really be...', 'https://www.youtube.com/embed/eiI5qT5agNw', 'image/product/main_image/istockphoto-650233226-170667a.jpg', '0', 1, NULL, 1, NULL, 1, '2021-12-05 07:30:12', '2021-12-05 10:58:14'),
(2, 1, 1, 1, 1, 'Lige Watch', 'lige-watch', 'lige-02', 1200.00, 200.00, 1000.00, '8', 800.00, '8', 'silver', 'China', 'Business style & Sports As we all know, there are very few smart watches suitable for business occasions. Imagine if there is a perfect combination of business style and smart watch style? Wonderful things will always happen in this world. We have done it. The prudent qualities can really be...', 'https://www.youtube.com/embed/eiI5qT5agNw', 'image/product/main_image/263756320_4834078829964684_4357929895170393601_n.jpg', '0', 1, 1, NULL, 1, 1, '2021-12-05 11:25:34', '2021-12-05 11:25:34'),
(3, 1, 1, 1, 1, 'Lige Watch 10', 'lige-watch-10', 'lige-10', 1500.00, 100.00, 1400.00, '0', 1000.00, '0', 'silver', 'china', 'Business style & Sports As we all know, there are very few smart watches suitable for business occasions. Imagine if there is a perfect combination of business style and smart watch style? Wonderful things will always happen in this world. We have done it. The prudent qualities can really be...', 'https://www.youtube.com/embed/eiI5qT5agNw', 'image/product/main_image/263498416_1122563955216032_83321262897941661_n.jpg', '0', 1, NULL, 1, 1, 1, '2021-12-05 13:12:32', '2021-12-05 13:12:32'),
(4, 3, NULL, 1, 1, 'Lige Watch IP67', 'lige-watch-ip67', 'lige-ip67', 2200.00, 200.00, 2000.00, '5', 1500.00, '0', 'silver', 'China', 'Business style & Sports As we all know, there are very few smart watches suitable for business occasions. Imagine if there is a perfect combination of business style and smart watch style? Wonderful things will always happen in this world. We have done it. The prudent qualities can really be...', 'https://www.youtube.com/embed/eiI5qT5agNw', 'image/product/main_image/263192856_694216721507986_4034906465511488098_n.jpg', '0', 1, 1, NULL, 1, 1, '2021-12-05 13:27:29', '2021-12-15 06:14:36'),
(5, 1, 1, 1, 1, 'Lige I', 'lige-i', 'lige-i', 5000.00, 500.00, 4500.00, '5', 4000.00, '-1', 'blue', 'China', 'Business style & Sports As we all know, there are very few smart watches suitable for business occasions. Imagine if there is a perfect combination of business style and smart watch style? Wonderful things will always happen in this world. We have done it. The prudent qualities can really be...', 'https://www.youtube.com/embed/eiI5qT5agNw', 'image/product/main_image/263379994_570851044364198_800957850697783556_n.jpg', '1', 1, 1, NULL, NULL, 1, '2021-12-06 06:38:21', '2021-12-08 11:15:11'),
(6, 5, NULL, 1, 1, 'Lige 3', 'lige-3', 'lige-3', 2000.00, 200.00, 1800.00, '5', 1000.00, '3', 'silver', 'china', 'Business style & Sports As we all know, there are very few smart watches suitable for business occasions. Imagine if there is a perfect combination of business style and smart watch style? Wonderful things will always happen in this world. We have done it. The prudent qualities can really be...', 'https://www.youtube.com/embed/WGzACBoBNMU', 'image/product/main_image/263522846_944978619444946_7578725466030487008_n.jpg', '0', 1, NULL, 1, 1, 1, '2021-12-06 07:26:07', '2021-12-15 06:14:36'),
(7, 1, 1, 1, 1, 'Lige ramdom', 'lige-ramdom', 'lige-ramdom1', 1000.00, 100.00, 900.00, '5', 500.00, '5', 'white', 'china', 'Business style & Sports As we all know, there are very few smart watches suitable for business occasions. Imagine if there is a perfect combination of business style and smart watch style? Wonderful things will always happen in this world. We have done it. The prudent qualities can really be...', 'https://www.youtube.com/embed/eiI5qT5agNw', 'image/product/main_image/263331604_481674813267104_5470940265807930219_n.jpg', '0', 0, 0, 1, 1, 1, '2021-12-06 09:17:19', '2021-12-06 09:17:19'),
(8, 1, 1, 1, 1, 'lige v3', 'lige-v3', 'v3', 4000.00, 1000.00, 3000.00, '5', 3000.00, '5', 'white', 'china', 'this is one of the best product that we have in our shop so you can easly buy this product from us .. thank you', 'https://www.youtube.com/embed/eiI5qT5agNw', 'image/product/main_image/263599414_4721747571247514_7861743038081337270_n.jpg', '0', 0, 1, 0, 0, 1, '2021-12-13 02:23:48', '2021-12-13 02:23:48'),
(9, 1, 1, 1, 1, 'lige super', 'lige-super', 'super-1203', 4000.00, 200.00, 3800.00, '5', 3000.00, '5', 'black', 'china', 'this is one of the best product that we have in our product list so you can but it for sure', 'https://www.youtube.com/embed/eiI5qT5agNw', 'image/product/main_image/263718428_1051604138957737_6954118349877669261_n.jpg', NULL, 0, 1, 0, 0, 1, '2021-12-13 02:36:16', '2021-12-15 09:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'image/product/sub_image/istockphoto-650233226-170667a.jpg', '2021-12-05 07:30:12', '2021-12-05 07:30:12'),
(2, 2, 'image/product/sub_image/263739022_213289694299332_6767232942797030928_n.jpg', '2021-12-05 11:25:34', '2021-12-05 11:25:34'),
(3, 2, 'image/product/sub_image/263308148_255927806448332_144924564006648706_n.jpg', '2021-12-05 11:25:34', '2021-12-05 11:25:34'),
(4, 2, 'image/product/sub_image/263756320_4834078829964684_4357929895170393601_n.jpg', '2021-12-05 11:25:34', '2021-12-05 11:25:34'),
(5, 3, 'image/product/sub_image/263362834_634973547680863_2887457815958913814_n.jpg', '2021-12-05 13:12:32', '2021-12-05 13:12:32'),
(6, 4, 'image/product/sub_image/263354823_595209678409425_7144721102418237861_n.jpg', '2021-12-05 13:27:29', '2021-12-05 13:27:29'),
(7, 5, 'image/product/sub_image/263344636_870415330300201_8021289734672198241_n.jpg', '2021-12-06 06:38:21', '2021-12-06 06:38:21'),
(8, 5, 'image/product/sub_image/263291441_1555341758153605_4631575907369584496_n.jpg', '2021-12-06 06:38:21', '2021-12-06 06:38:21'),
(9, 5, 'image/product/sub_image/263379994_570851044364198_800957850697783556_n.jpg', '2021-12-06 06:38:21', '2021-12-06 06:38:21'),
(10, 6, 'image/product/sub_image/263648272_1064885494324007_7663803035145192191_n.jpg', '2021-12-06 07:26:07', '2021-12-06 07:26:07'),
(11, 6, 'image/product/sub_image/263522846_944978619444946_7578725466030487008_n.jpg', '2021-12-06 07:26:08', '2021-12-06 07:26:08'),
(12, 7, 'image/product/sub_image/263294068_590578285364703_6764923243452975523_n.jpg', '2021-12-06 09:17:20', '2021-12-06 09:17:20'),
(13, 7, 'image/product/sub_image/263331604_481674813267104_5470940265807930219_n.jpg', '2021-12-06 09:17:20', '2021-12-06 09:17:20'),
(14, 8, 'image/product/sub_image/263537750_489735245678488_2722067023333415579_n.jpg', '2021-12-13 02:23:49', '2021-12-13 02:23:49'),
(15, 8, 'image/product/sub_image/263599414_4721747571247514_7861743038081337270_n.jpg', '2021-12-13 02:23:49', '2021-12-13 02:23:49'),
(16, 9, 'image/product/sub_image/263718428_1051604138957737_6954118349877669261_n.jpg', '2021-12-13 02:36:16', '2021-12-13 02:36:16'),
(17, 9, 'image/product/sub_image/263656411_435971667978061_8489796463283567545_n.jpg', '2021-12-13 02:36:16', '2021-12-13 02:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2021-10-30 02:32:41', '2021-10-30 02:32:41'),
(5, 'editor', 'web', '2021-10-30 03:22:34', '2021-10-30 03:22:34'),
(6, 'admin', 'web', '2021-10-30 04:32:10', '2021-10-30 04:32:10'),
(7, 'main editor', 'web', '2021-10-30 22:45:44', '2021-10-30 22:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 6),
(7, 1),
(7, 6),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(15, 5),
(16, 1),
(16, 5),
(17, 1),
(17, 5),
(18, 1),
(18, 5),
(19, 1),
(19, 5),
(20, 1),
(20, 5),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 7),
(26, 1),
(26, 7),
(27, 1),
(27, 7),
(28, 1),
(28, 7),
(29, 1),
(29, 7);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `first_name`, `last_name`, `address`, `city`, `zip`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'gsgdfg', 'gdsfdf', 'gdfsgdfsg', 'gsdgdf', '45514', 'dfsg@gmail.com', '56156565', '2021-12-07 11:11:42', '2021-12-07 11:11:42'),
(2, 'abu sadek', 'sunny', 'dhka 1075', 'dhka', '1207', 'sadek@gmail.com', '01799382934', '2021-12-07 11:26:38', '2021-12-07 11:26:38'),
(3, 'abu sadek', 'sunny', 'sadek@gmail.com', 'dhaka', '1207', 'sadek@gmail.com', '01799382934', '2021-12-08 11:17:11', '2021-12-08 11:17:11'),
(4, 'shuvo', 'mridha', 'mohammadpur dhaka 1207', 'dhaka-1207', '1207', 'shuvo@gmail.com', '01799382934', '2021-12-15 06:03:35', '2021-12-15 06:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_header` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_header` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `first_header`, `last_header`, `image`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'WATCH FOR FASHION', 'Buy Our Watch And Enter Out Watch Fashion World', 'image/slider_image/1445051529.jpg', 1, '2021-12-14 11:31:53', '2021-12-14 11:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Watch', 1, '2021-12-04 13:20:34', '2021-12-04 13:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_primary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_secondary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `email`, `phone_primary`, `phone_secondary`, `address`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Shuvo mia', 'shuvo@gmail.com', '01799382934', '01852369852', 'Mohammadpur dhaka -1207', 1, '2021-12-05 06:23:18', '2021-12-05 06:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abu sadek Chowdhury', 'admin@gmail.com', NULL, '$2y$10$EJuDBJYdN0UIlEIVtjbpoeDa8DWszNtjO7hAJaK4rAlAoqoOBt4zm', NULL, '2021-10-30 02:32:41', '2021-10-30 02:32:41'),
(2, 'test', 'test@gmail.com', NULL, '$2y$10$4ZluJQryf0wyAMcdFoIMkutOuTsXDETY/XVZLxSSxEHfqM2FLZZAu', NULL, '2021-10-30 03:43:55', '2021-10-30 03:43:55'),
(4, 'main editor', 'maineditor@gmail.com', NULL, '$2y$10$ugTIqDgbtV14u.1RppAZsepELk4RUSnNV7Xi2DYLgUw8gFQcfzbCm', NULL, '2021-10-30 22:46:33', '2021-10-30 22:46:33'),
(5, 'shuvo', 'shuvo@gmail.com', NULL, '$2y$10$qojzpYeQhVmvRzCmY7mjXO08N4mr54hmA5XfXMcMhwOWCxK06DosC', NULL, '2021-12-15 00:58:04', '2021-12-15 00:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, '1', '4', '2021-12-08 10:53:35', '2021-12-08 10:53:35'),
(4, '1', '1', '2021-12-08 11:30:32', '2021-12-08 11:30:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marquees`
--
ALTER TABLE `marquees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`);

--
-- Indexes for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marquees`
--
ALTER TABLE `marquees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
