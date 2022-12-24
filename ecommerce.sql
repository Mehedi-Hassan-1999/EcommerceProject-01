-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 10:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Dell', '2022-12-16 23:47:52', '2022-12-16 23:48:27'),
(2, 'Apple', '2022-12-16 23:48:04', '2022-12-16 23:48:04'),
(3, 'Samsung', '2022-12-19 10:53:35', '2022-12-19 10:53:35'),
(4, 'Nike', '2022-12-19 05:04:12', '2022-12-19 05:04:12'),
(5, 'Easy', '2022-12-19 05:04:31', '2022-12-19 05:04:31'),
(6, 'Calvin Klein', '2022-12-19 05:04:51', '2022-12-19 05:04:51'),
(7, '1More', '2022-12-19 05:05:30', '2022-12-19 05:05:30'),
(8, 'Xiaomi', '2022-12-20 12:38:54', '2022-12-20 12:38:54'),
(9, 'OnePlus', '2022-12-20 12:51:19', '2022-12-20 12:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_name`, `product_id`, `user_id`, `phone`, `email`, `product_name`, `product_code`, `quantity`, `price`, `address`, `image`, `created_at`, `updated_at`) VALUES
(33, 'Mehedi Hassan', 1, 3, '01571228006', 'mdmehedi425@gmail.com', 'iPhone 13 pro max', 'Apple-10203040', '1', '1700', '72 Helena monjil, Moghbazar wireless, Dhaka', 'admin/upload_image/673097787.jpg', '2022-12-23 09:34:25', '2022-12-23 09:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', '2022-12-16 22:51:24', '2022-12-16 22:51:24'),
(2, 'Laptop', '2022-12-16 22:53:33', '2022-12-16 23:26:00'),
(3, 'TV', '2022-12-19 10:55:06', '2022-12-20 10:55:06'),
(4, 'Headphone', '2022-12-19 05:02:11', '2022-12-19 05:02:11'),
(5, 'Shirt', '2022-12-19 05:02:32', '2022-12-19 05:02:32'),
(6, 'T-shirt', '2022-12-19 05:02:40', '2022-12-19 05:02:40'),
(7, 'Shoes', '2022-12-19 05:03:15', '2022-12-19 05:03:15'),
(8, 'Smart Watch', '2022-12-20 12:36:27', '2022-12-20 12:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1739790837, 'user', 3, 1, 'yes admin', NULL, 1, '2022-12-24 09:14:56', '2022-12-24 09:15:12'),
(1874548999, 'user', 1, 2, 'yes, ask', NULL, 1, '2022-12-24 09:18:24', '2022-12-24 09:18:28'),
(1977205456, 'user', 2, 1, 'tell me one thing', NULL, 1, '2022-12-24 09:17:52', '2022-12-24 09:18:13'),
(2130182849, 'user', 1, 3, 'How are you', NULL, 1, '2022-12-24 09:15:40', '2022-12-24 09:16:37'),
(2304213091, 'user', 1, 2, '', '{\"new_name\":\"ed35d34a-e138-4745-911d-f92363d43073.jpg\",\"old_name\":\"iPhone 13 pro.jpg\"}', 0, '2022-12-24 09:22:01', '2022-12-24 09:22:01'),
(2423041311, 'user', 3, 1, 'tell me', NULL, 1, '2022-12-24 09:15:00', '2022-12-24 09:15:12'),
(2593713658, 'user', 1, 3, 'Dear, Mehedi Hassan', NULL, 1, '2022-12-24 09:10:24', '2022-12-24 09:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_name`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 'Mehedi Hassan', 'good product', 0, '2022-12-23 16:27:34', '2022-12-23 16:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_15_152205_create_sessions_table', 1),
(8, '2022_12_16_192627_create_categories_table', 2),
(9, '2022_12_17_053254_create_brands_table', 3),
(13, '2022_12_18_045729_create_carts_table', 5),
(15, '2022_12_17_055453_create_products_table', 6),
(16, '2022_12_19_085709_create_orders_table', 6),
(17, '2022_12_21_062937_create_notifications_table', 7),
(22, '2022_12_23_141109_create_comments_table', 8),
(23, '2022_12_23_154030_create_replies_table', 8),
(24, '2022_12_24_999999_add_active_status_to_users', 9),
(25, '2022_12_24_999999_add_avatar_to_users', 9),
(26, '2022_12_24_999999_add_dark_mode_to_users', 9),
(27, '2022_12_24_999999_add_messenger_color_to_users', 9),
(28, '2022_12_24_999999_create_favorites_table', 9),
(29, '2022_12_24_999999_create_messages_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `phone`, `email`, `address`, `product_id`, `product_name`, `product_code`, `quantity`, `price`, `image`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'User', '01679565144', 'user@gmail.com', 'Masimpur, Dumrakanda, Kuliarchar, Kishoreganj', 1, 'iPhone 13 pro max', 'Apple-10203040', '2', '3400', 'admin/upload_image/673097787.jpg', 'Paid', 'Delivered', '2022-12-20 13:05:47', '2022-12-21 01:48:05'),
(2, 2, 'User', '01679565144', 'user@gmail.com', 'Masimpur, Dumrakanda, Kuliarchar, Kishoreganj', 6, '1MORE ESS3001T', '1More-10203041', '3', '390', 'admin/upload_image/669178190.jpg', 'cash on delivery', 'Canceled', '2022-12-20 13:05:47', '2022-12-21 01:48:14'),
(3, 2, 'User', '01679565144', 'user@gmail.com', 'Masimpur, Dumrakanda, Kuliarchar, Kishoreganj', 8, 'Samsung Galaxy Z Fold4', 'Samsung-10203041', '4', '11560', 'admin/upload_image/620524731.jpg', 'cash on delivery', 'Order canceled', '2022-12-20 13:05:47', '2022-12-21 13:46:33'),
(4, 3, 'Mehedi Hassan', '01571228006', 'mdmehedi425@gmail.com', '72 Helena monjil, Moghbazar wireless, Dhaka', 4, 'Dell Vostro 14 3400 Core i3', 'Dell-10203041', '2', '2100', 'admin/upload_image/1748271781.jpg', 'cash on delivery', 'processing', '2022-12-20 13:08:55', '2022-12-20 13:08:55'),
(5, 3, 'Mehedi Hassan', '01571228006', 'mdmehedi425@gmail.com', '72 Helena monjil, Moghbazar wireless, Dhaka', 7, 'Samsung Galaxy S23 Ultra 5G', 'Samsung-10203040', '8', '9600', 'admin/upload_image/1655695648.jpg', 'cash on delivery', 'Order canceled', '2022-12-20 13:08:55', '2022-12-23 07:37:21'),
(6, 3, 'Mehedi Hassan', '01571228006', 'mdmehedi425@gmail.com', '72 Helena monjil, Moghbazar wireless, Dhaka', 11, 'Xiaomi IMILAB W01', 'Xiaomi-10203042', '5', '16250', 'admin/upload_image/250616497.jpg', 'cash on delivery', 'processing', '2022-12-20 13:08:55', '2022-12-20 13:08:55'),
(8, 2, 'User', '01679565144', 'user@gmail.com', 'Masimpur, Dumrakanda, Kuliarchar, Kishoreganj', 6, '1MORE ESS3001T', '1More-10203041', '1', '130', 'admin/upload_image/669178190.jpg', 'cash on delivery', 'processing', '2022-12-21 13:55:00', '2022-12-21 13:55:00'),
(9, 2, 'User', '01679565144', 'user@gmail.com', 'Masimpur, Dumrakanda, Kuliarchar, Kishoreganj', 4, 'Dell Vostro 14 3400 Core i3', 'Dell-10203041', '1', '1050', 'admin/upload_image/1748271781.jpg', 'cash on delivery', 'processing', '2022-12-21 13:55:00', '2022-12-21 13:55:00'),
(10, 2, 'User', '01679565144', 'user@gmail.com', 'Masimpur, Dumrakanda, Kuliarchar, Kishoreganj', 8, 'Samsung Galaxy Z Fold4', 'Samsung-10203041', '1', '2890', 'admin/upload_image/620524731.jpg', 'cash on delivery', 'processing', '2022-12-21 13:55:00', '2022-12-21 13:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `category_id`, `brand_id`, `price`, `discount`, `quantity`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 13 pro max', 'Apple-10203040', 1, 2, '1755', '1700', '10', 'The iPhone 13 Pro Max comes with a 6.7-inch Super Retina OLED display. The screen has an 1170 x 2532 pixels resolution and a 19:9 aspect ratio. The display panel now supports a 120Hz refresh rate and a 1000 nits peak brightness.', 'admin/upload_image/673097787.jpg', '2022-12-20 11:58:14', '2022-12-20 11:58:14'),
(2, 'iPhone 12 pro', 'Apple-10203041', 1, 2, '1650', NULL, '15', 'The iPhone 12 Pro is a dual-SIM (GSM and GSM) mobile that accepts Nano-SIM and eSIM cards. The iPhone 12 Pro measures 146.70 x 71.50 x 7.40mm (height x width x thickness) and weighs 189.00 grams. It was launched in Gold, Graphite, Pacific Blue, and Silver colours.', 'admin/upload_image/152489548.jpg', '2022-12-20 11:59:52', '2022-12-20 11:59:52'),
(3, 'Dell Inspiron 15 3511 Core i3', 'Dell-10203040', 2, 1, '8500', NULL, '20', 'Dell Inspiron 15 3511 Laptop comes with Intel Intel Core i3-1115G4 Processor (6M Cache, 3.00 GHz up to 4.10 GHz) with Intel UHD Graphics. From this laptop you will get the best combination of Windows features. This new Dell Inspiron 15 3511 featured with 4GB DDR4 RAM, 1TB 5400 rpm 2.5\" SATA Hard Drive with Windows 10 Home Operating System. Here, 2 x USB 3.2, 1 x USB 2.0, 1 x HDMI 1.4, 1 x Audio jack Ports, Connectors & Slots are also available.', 'admin/upload_image/1956951196.jpg', '2022-12-20 12:02:22', '2022-12-20 12:02:22'),
(4, 'Dell Vostro 14 3400 Core i3', 'Dell-10203041', 2, 1, '1100', '1050', '30', 'Dell Vostro 14 3400 Laptop comes with the Intel Core i3-1115G4 Processor (6MB Cache, 3.0 GHz up to 4.10 GHz) and 4GB DDR4 2666MHz RAM. It has a 1TB 5400 rpm 2.5\" SATA Hard Drive. It is featured with Intel UHD Graphics. It has a 14.0-inch HD (1366 x 768), 60 Hz, Anti-glare, NTSC 45%, 220 Nits, LED Backlight Non-touch Narrow Border Display.', 'admin/upload_image/1748271781.jpg', '2022-12-20 12:06:47', '2022-12-20 12:06:47'),
(5, '1MORE E1001BT Triple Driver', '1More-10203040', 4, 7, '130', '110', '40', 'The 1MORE Triple Driver BT In-Ear Headphones E1001BT features an advanced hybrid configuration with 2 balanced armatures and a triple layer dynamic driver with a titanium diaphragm.', 'admin/upload_image/1109638272.jpg', '2022-12-20 12:10:41', '2022-12-20 12:10:41'),
(6, '1MORE ESS3001T', '1More-10203041', 4, 7, '130', NULL, '35', 'The 1MORE ComfoBuds are expertly adjusted by Grammy Award-winning sound engineer Luca Bignardi so you can hear the music as the artist intended. It has Bluetooth 5.0 technology, which guarantees a quick and consistent connection with low power usage. With your Apple device\'s AAC (Advanced Audio Coding) support, unleash the best Bluetooth audio.', 'admin/upload_image/669178190.jpg', '2022-12-20 12:12:18', '2022-12-20 12:12:18'),
(8, 'Samsung Galaxy Z Fold4', 'Samsung-10203041', 1, 3, '3400', '2890', '45', 'The Samsung Galaxy Z Fold 4 5G is equipped with an octa-core Snapdragon 888 Plus processor which is aided with Adreno 730 GPU. The smartphone packs up to 12GB of RAM and 256GB of internal storage. On the back of the smartphone there\'s a triple-camera setup.', 'admin/upload_image/620524731.jpg', '2022-12-20 12:34:54', '2022-12-20 12:34:54'),
(9, 'Redmi Watch 2 Lite', 'Xiaomi-10203040', 8, 8, '1250', NULL, '55', 'The Xiaomi Redmi Watch 2 Lite Waterproof Smart Watch makes you more comfortable and pleasurable with a user-friendly design for health. It offers you loads of features such as a 1.55\" colorful touch display, 100+ fitness modes, 5 ATM water resistance, SpO₂ measurement and 24-hour heart rate tracking.', 'admin/upload_image/500295151.webp', '2022-12-20 12:40:47', '2022-12-20 12:40:47'),
(10, 'COLMI P8 Plus', 'Xiaomi-10203041', 8, 8, '2500', '2000', '60', 'COLMI P8 PLUS GT is an upgraded version of P8 PLUS. It comes with a high-definition 1.69\"color screen. It comes loaded with so many features. This smartwatch offers Bluetooth calling.', 'admin/upload_image/1741859988.webp', '2022-12-20 12:44:07', '2022-12-20 12:44:07'),
(11, 'Xiaomi IMILAB W01', 'Xiaomi-10203042', 8, 8, '3500', '3250', '75', 'Xiaomi IMILAB W01 Fitness Smart Watch is the latest release from IMILAB. This newest IMILAB W01 Smart Watch is a unique fitness smartwatch that supports 70+ sports modes with a big and bright 1.69-inch Full-Touch Square Screen. The screen has a True Color Display.', 'admin/upload_image/250616497.jpg', '2022-12-20 12:47:49', '2022-12-20 12:47:49'),
(12, 'OnePlus 32 Y1', 'OnePlus-10203040', 3, 9, '8600', NULL, '45', 'The OnePlus 32 Y1 Y Series 32-Inch HD Smart Android Television is Give your eyes pleasure with the 16M Display colors. You can connect anything with the OnePlus TV Y series thanks to the numerous, very useful connections, including video games and your favorite binge-worthy TV shows.', 'admin/upload_image/1251241881.jpg', '2022-12-20 12:53:19', '2022-12-21 05:02:06'),
(13, 'Bravia KD-65X80J', 'OnePlus-10203041', 3, 9, '9500', '9450', '70', 'Bravia KD-65X80J Smart LED TV comes with 65\" 4K UHD (3840 x 2160) LCD Display. This new Sony Bravia KD-65X80J is 2021 model. The Sony Bravia KD-65X80J 65 Inch 4K Ultra HD Smart LED TV has built-in Wi-Fi and Ethernet connectivity that it allow access to the Google Play store, apps, and internet-based content via its Android TV operating system, plus content sharing and screen mirroring via Apple AirPlay.', 'admin/upload_image/906439359.jpg', '2022-12-20 12:57:50', '2022-12-20 12:57:50'),
(14, 'iPhone 13 pro', 'Apple-10203042', 1, 2, '35000', '32000', '45', 'The iPhone 13 Pro features 2532x1170 resolution at 460 ppi while the iPhone 13 Pro Max has 2778x1284 resolution at 458 ppi. Both phones support 120Hz refresh rate. In cameras, both iPhone 13 Pro and 13 Pro Max use triple 12MP lenses at the back and a 12MP selfie lens.', 'admin/upload_image/1200629709.jpg', '2022-12-24 08:36:33', '2022-12-24 08:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `reply` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1ckstNm7DkcLFnD0HdrMhAdVexFmHyWGEPnilrgL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnFyb2l6bkYwUEZuN0wzek9KYnFmRnN2Tms2clVFNkFtSDRCcXptRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1671873234),
('3rQWWMS32yDLLtbvvmMHEWjPqPp0vEQQcE1s3Rn5', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYUtIbjUzcllidUdiZ2ZNQ05hMlZ0TERTMWIzSjhQekJNR3hVaWdhVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbC9Ib21lV29yay80dGglMjBQcm9qZWN0L0Vjb21tZXJjZS9wdWJsaWMvY2hhdGlmeS8yIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRqZmNNYnNaTUpsVVQwMWEyZkVSUTR1SmVsQmI5ZE1iTUlCUnU1TUtBQ0FLbnpQdFVnb3BtMiI7fQ==', 1671874938),
('V2W7sqf2PwfaNcWI525lQOiUM6DxuFi1YlSpEiV9', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMHRaRU9tY2hUaWpEZGxuVndwZ1hGM0RFNjRuQ0UwVXRJVUdSb1lDciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGF0aWZ5Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRZTVc1NkRnZklNcjZURDNXL2ZhTHFlZ0ZrN05JQVFKU1dxeTYxUmE1ajRuLnFuWmk4OE5xaSI7fQ==', 1671873513);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT '0',
  `image` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) NOT NULL DEFAULT '#2180f3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `address`, `user_type`, `image`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'Admin', '+8801950305432', 'admin@gmail.com', '72 Helena monjil, Moghbazar wireless, Dhaka', '1', 'C:\\xampp\\tmp\\php347D.tmp', '2022-12-16 08:43:48', '$2y$10$jfcMbsZMJlUT01a2fERQ4uJelBb9dMbMIBRu5MKACAKnzPtUgopm2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-15 10:04:52', '2022-12-24 09:16:24', 1, 'avatar.png', 1, '#2180f3'),
(2, 'User', '01679565144', 'user@gmail.com', 'Masimpur, Dumrakanda, Kuliarchar, Kishoreganj', '0', 'C:\\xampp\\tmp\\php3119.tmp', '2022-12-09 18:00:00', '$2y$10$YMW56DgfIMr6TD3W/faLqegFk7NIAQJSWqy61Ra5j4n.qnZi88Nqi', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-15 10:07:02', '2022-12-24 09:18:56', 0, 'avatar.png', 0, '#2180f3'),
(3, 'Mehedi Hassan', '01571228006', 'mdmehedi425@gmail.com', '72 Helena monjil, Moghbazar wireless, Dhaka', '0', 'C:\\xampp\\tmp\\php7291.tmp', '2022-12-20 02:41:10', '$2y$10$3v.tm/Jhuu5/cdlesL62YO2rIzCXwJVcZMkgEnHMjglyIAWu3tNvC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-20 02:40:29', '2022-12-24 09:16:57', 0, 'avatar.png', 1, '#2180f3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
