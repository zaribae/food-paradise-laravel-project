-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 04:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodparadise_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `main_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `title`, `main_title`, `description`, `video_link`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_6665771f7ba4b.jpg', 'About Company', 'Helathy Foods Provider', '<p><span style=\"color: rgb(73, 73, 73); font-family: Arial; font-size: 16px;\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aspernatur molestiae minima pariatur consequatur voluptate sapiente deleniti soluta, animi ab necessitatibus optio similique quasi fuga impedit corrupti obcaecati neque consequatur sequi.</span></p><ul><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">Delicious &amp; Healthy Foods</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">Best Price &amp; Offers</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">music &amp; Other Facilities</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">Specific Family &amp; Kids Zone</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">made By Fresh Ingredients</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">Delicious &amp; Healthy Foods</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">Best Price &amp; Offers</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">Music &amp; Other Facilities</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">Specific Family &amp; Kids Zone</span></span></li><li><span style=\"color: rgb(73, 73, 73); font-family: Nunito; font-size: 16px;\"><span style=\"color: rgb(1, 15, 28); font-family: Arial; text-transform: capitalize;\">Made By Fresh Ingredients</span></span></li></ul>', 'https://youtu.be/GWaQiFeQ87g?si=0JdrwrJORf0T6MRa', '2024-06-09 02:30:02', '2024-06-09 02:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_area_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `delivery_area_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `type`, `created_at`, `updated_at`) VALUES
(8, 3, 4, 'Ahmad', 'Rafi', 'ahmadazzhari@gmail.com', '083172514721', 'JL.KH.M.THAYIB', 'home', '2024-05-24 07:04:26', '2024-05-24 07:29:01'),
(9, 3, 4, 'Sultan', NULL, 'admin@gmail.com', '083172514721', 'JL.KH.M.THAYIB', 'office', '2024-05-24 07:05:12', '2024-05-24 07:05:12'),
(12, 3, 5, 'Ridhan', 'Rafi', 'admin@test.com', '83172514721', 'JL.KH.M.THAYIB', 'office', '2024-05-24 08:17:16', '2024-05-24 08:17:16'),
(13, 3, 4, 'Test', NULL, 'admin@gmail.com', '083172514721', 'JL.KH.M.THAYIB', 'home', '2024-05-24 09:26:33', '2024-05-24 09:26:33'),
(14, 3, 4, 'Roy', NULL, 'admin@gmail.com', '083172514721', 'Test', 'home', '2024-05-24 09:28:22', '2024-05-24 09:28:22'),
(15, 3, 5, 'Ridhan', NULL, 'admin@test.com', '083172514721', 'TEST2', 'home', '2024-05-24 09:28:48', '2024-05-24 09:28:48'),
(16, 3, 3, 'Quail', 'Palmer', 'syqizufa@mailinator.com', '+1 (272) 134-3039', 'Veniam tempore vol', 'home', '2024-05-24 10:00:24', '2024-05-24 10:00:24'),
(17, 4, 3, 'Ahmad', 'Azhari', 'ahmadazzhari@gmail.com', '083172514721', 'JL.KH.M.THAYIB', 'home', '2024-05-27 01:05:14', '2024-05-27 01:05:14'),
(18, 4, 4, 'Ridhan', 'Nainggolan', 'user@test.com', '083172514721', 'JL.KH.M.THAYIB', 'office', '2024-05-27 01:48:46', '2024-05-27 01:48:46'),
(19, 5, 3, 'Ahmad', 'Azhari', 'famouskid321@gmail.com', '083172514721', 'JL.KH.M.THAYIB', 'home', '2024-06-02 04:54:55', '2024-06-02 04:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'main_menu', '2024-06-13 14:56:00', '2024-06-13 14:56:00'),
(2, 'footer_menu_short_link', '2024-06-13 08:00:44', '2024-06-13 08:00:44'),
(3, 'footer_menu_help_link', '2024-06-13 08:01:16', '2024-06-13 08:01:16'),
(4, 'footer_menu_bottom', '2024-06-13 08:01:51', '2024-06-13 08:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `class` varchar(255) DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu_items`
--

INSERT INTO `admin_menu_items` (`id`, `label`, `link`, `parent_id`, `sort`, `class`, `menu_id`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 0, 0, NULL, 2, 0, '2024-06-13 08:03:18', '2024-06-13 08:03:47'),
(2, 'About Us', '/about', 0, 1, NULL, 2, 0, '2024-06-13 08:03:46', '2024-06-13 08:15:10'),
(3, 'Contact Us', '/contact', 0, 2, NULL, 2, 0, '2024-06-13 08:04:09', '2024-06-13 08:15:10'),
(4, 'Our Service', '#', 0, 3, NULL, 2, 0, '2024-06-13 08:05:37', '2024-06-13 08:05:56'),
(5, 'Gallery', '#', 0, 4, NULL, 2, 0, '2024-06-13 08:05:54', '2024-06-13 08:14:38'),
(6, 'Terms And Conditions', '/terms-condition', 0, 2, NULL, 3, 0, '2024-06-13 08:52:45', '2024-06-13 08:55:45'),
(7, 'Privacy Policy', '/privacy-policy', 0, 3, NULL, 3, 0, '2024-06-13 08:53:13', '2024-06-13 08:55:45'),
(8, 'Blogs', '/blogs', 0, 0, NULL, 3, 0, '2024-06-13 08:53:27', '2024-06-13 08:55:24'),
(9, 'Chefs', '/chefs', 0, 1, NULL, 3, 0, '2024-06-13 08:53:39', '2024-06-13 08:55:45'),
(10, 'FAQ', '#', 0, 4, NULL, 3, 0, '2024-06-13 08:54:18', '2024-06-13 08:55:53'),
(11, 'FAQ', '#', 0, 0, NULL, 4, 0, '2024-06-13 08:58:53', '2024-06-13 09:00:32'),
(12, 'Settings', '/dashboard', 0, 1, NULL, 4, 0, '2024-06-13 09:00:31', '2024-06-13 09:00:42'),
(13, 'Payment', '#', 0, 2, NULL, 4, 0, '2024-06-13 09:00:41', '2024-06-13 09:01:00'),
(14, 'Privacy Policy', '/privacy-policy', 0, 4, NULL, 4, 0, '2024-06-13 09:00:59', '2024-06-13 09:00:59'),
(15, 'Home', '/', 0, 0, NULL, 1, 0, '2024-06-13 09:05:54', '2024-06-16 08:17:30'),
(16, 'About', '/about', 0, 1, NULL, 1, 0, '2024-06-13 09:06:07', '2024-06-13 09:06:21'),
(17, 'Menu', '/product', 0, 2, NULL, 1, 0, '2024-06-13 09:06:21', '2024-06-16 23:50:28'),
(18, 'Chefs', '/chefs', 0, 3, NULL, 1, 0, '2024-06-13 09:06:41', '2024-06-13 09:06:51'),
(19, 'Blog', '/blogs', 0, 11, NULL, 1, 0, '2024-06-13 09:07:09', '2024-06-13 09:12:02'),
(20, 'Contact', '/contact', 0, 12, NULL, 1, 0, '2024-06-13 09:07:21', '2024-06-13 09:12:02'),
(21, 'Pages', '#', 0, 4, NULL, 1, 0, '2024-06-13 09:07:39', '2024-06-13 09:07:47'),
(22, 'Testimonial', '/testimonials', 21, 7, NULL, 1, 1, '2024-06-13 09:08:15', '2024-06-13 09:11:12'),
(23, 'Checkout', '/checkout', 21, 5, NULL, 1, 1, '2024-06-13 09:09:07', '2024-06-13 09:10:08'),
(24, 'Payment', '#', 21, 6, NULL, 1, 1, '2024-06-13 09:10:07', '2024-06-13 09:11:01'),
(25, 'Sign In', '/login', 21, 8, NULL, 1, 1, '2024-06-13 09:10:59', '2024-06-13 09:11:12'),
(26, 'Sign Out', '/logout', 21, 10, NULL, 1, 1, '2024-06-13 09:11:20', '2024-06-13 09:12:02'),
(27, 'Forgot Password', '/forgot-password', 21, 9, NULL, 1, 1, '2024-06-13 09:11:52', '2024-06-13 09:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `app_download_sections`
--

CREATE TABLE `app_download_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `playstore_link` varchar(255) DEFAULT NULL,
  `appstore_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_download_sections`
--

INSERT INTO `app_download_sections` (`id`, `image`, `background`, `title`, `short_description`, `playstore_link`, `appstore_link`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_666095c13928e.png', '/uploads/media_666095c139f75.jpg', 'Download Our Mobile Apps', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque assumenda tenetur, provident earum consequatur, ut voluptas laboriosam fuga error aut eaque architecto quo pariatur. Vel dolore omnis quisquam. Lorem ipsum dolor, sit amet consectetur adipisicing elit Cumque.', 'https://www.linkedin.com/in/ahmad-azhari/', 'https://www.linkedin.com/in/ahmad-azhari/', '2024-06-05 09:43:45', '2024-06-05 09:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `icon`, `title`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'fa-solid fa-paperclip', 'Nihil commodi adipisci quae aut nihil.', 'Laboriosam illo accusantium laborum voluptas magnam rerum ullam rem error vero praesentium consectetur.', 0, '2024-05-18 00:36:40', '2024-05-18 00:36:40'),
(4, 'fas fa-ad', 'Test Create 2', 'Sunt dolore earum r', 0, '2024-05-18 01:07:46', '2024-05-18 01:50:23'),
(5, 'fab fa-accusoft', 'Repellendus Volupta', 'Omnis voluptate sed', 0, '2024-05-18 02:17:41', '2024-05-18 02:23:20'),
(6, 'fab fa-adversal', 'Qui cum exercitation', 'Recusandae Nisi qua', 0, '2024-05-18 02:17:58', '2024-05-18 02:23:10'),
(8, 'fas fa-percent', 'Discount Voucher', 'Lorem ipsum dolor sit amet consectetur, adipiscing elit curabitur morbi risus, justo nulla semper ac.', 1, '2024-05-18 02:22:02', '2024-05-18 02:22:02'),
(9, 'fas fa-heartbeat', 'Fresh and Healthy Foods', 'Lorem ipsum dolor sit amet consectetur, adipiscing elit curabitur morbi risus, justo nulla semper ac.', 1, '2024-05-18 02:22:56', '2024-05-18 02:22:56'),
(10, 'fas fa-shipping-fast', 'Fast Serve', 'Lorem ipsum dolor sit amet consectetur, adipiscing elit curabitur morbi risus, justo nulla semper ac.', 1, '2024-05-18 02:24:16', '2024-05-18 02:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `image`, `title`, `slug`, `description`, `seo_title`, `seo_description`, `status`, `show_at_home`, `created_at`, `updated_at`) VALUES
(3, 1, 4, '/uploads/media_666341c793f8a.jpg', 'Competently Supply Customized Initiatives', 'competently-supply-customized-initiatives', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p>', NULL, NULL, 1, 1, '2024-06-07 10:22:15', '2024-06-07 11:33:16'),
(4, 1, 2, '/uploads/media_666347230387e.jpg', 'Quality Foods Requirments For Every Human Body’s', 'quality-foods-requirments-for-every-human-bodys', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p>', NULL, NULL, 1, 1, '2024-06-07 10:45:07', '2024-06-07 11:29:10'),
(5, 1, 4, '/uploads/media_66645f05128bb.jpg', 'Xandra Mckinney', 'xandra-mckinney', 'Facilis esse cupidat.s', 'Magna omnis aut corr', 'Possimus et exercit', 1, 1, '2024-06-08 06:39:17', '2024-06-08 06:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `show_at_home`, `created_at`, `updated_at`) VALUES
(2, 'Daily Product', 'daily-product', 1, 1, '2024-06-06 07:14:27', '2024-06-06 07:14:27'),
(3, 'Vegetables', 'vegetables', 1, 1, '2024-06-06 07:14:42', '2024-06-06 07:14:42'),
(4, 'Seafood', 'seafood', 1, 1, '2024-06-06 07:14:56', '2024-06-06 07:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 3, 'Test', 1, '2024-06-08 08:55:56', '2024-06-08 08:55:56'),
(3, 3, 1, 'Helo', 1, '2024-06-08 09:08:23', '2024-06-08 09:08:23'),
(4, 3, 3, 'Hey', 1, '2024-06-08 09:10:43', '2024-06-08 09:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `in` varchar(255) DEFAULT NULL,
  `x` varchar(255) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `show_at_home` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `image`, `name`, `title`, `fb`, `in`, `x`, `ig`, `status`, `show_at_home`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_666068da22df9.jpg', 'Sima Ahmed', 'Senior Chef', NULL, 'https://www.linkedin.com/in/ahmad-azhari/', NULL, 'https://www.instagram.com/ahmadazzhari/', 1, 1, '2024-06-05 06:16:44', '2024-06-05 06:32:10'),
(2, '/uploads/media_6660691940b98.jpg', 'Rajib Khan', 'Senior Chef', NULL, 'https://www.linkedin.com/in/ahmad-azhari/', NULL, 'https://www.instagram.com/ahmadazzhari/', 1, 1, '2024-06-05 06:33:13', '2024-06-05 06:33:13'),
(4, '/uploads/media_66606bb0481a3.jpg', 'Sathi Akter', 'Senior Chef', NULL, 'https://www.linkedin.com/in/ahmad-azhari/', NULL, 'https://www.instagram.com/ahmadazzhari/', 1, 1, '2024-06-05 06:44:16', '2024-06-05 06:44:16'),
(5, '/uploads/media_66606bd395923.jpg', 'Mahmud Hassan', 'Senior Chef', NULL, 'https://www.linkedin.com/in/ahmad-azhari/', NULL, 'https://www.instagram.com/ahmadazzhari/', 1, 1, '2024-06-05 06:44:51', '2024-06-05 06:44:51'),
(6, '/uploads/media_66606c0f6028e.jpg', 'Hasina Priya', 'Senior Chef', NULL, 'https://www.linkedin.com/in/ahmad-azhari/', NULL, 'https://www.instagram.com/ahmadazzhari/', 1, 1, '2024-06-05 06:45:51', '2024-06-05 06:45:51'),
(7, '/uploads/media_66606c325f05b.jpg', 'Abdur Razzak', 'Senior Chef', NULL, 'https://www.linkedin.com/in/ahmad-azhari/', NULL, 'https://www.instagram.com/ahmadazzhari/', 1, 1, '2024-06-05 06:46:26', '2024-06-05 06:46:26'),
(8, '/uploads/media_66606c565254d.jpg', 'Ayerin Ira', 'Senior Chef', NULL, 'https://www.linkedin.com/in/ahmad-azhari/', NULL, 'https://www.instagram.com/ahmadazzhari/', 1, 1, '2024-06-05 06:47:02', '2024-06-05 06:47:02'),
(9, '/uploads/media_66606c95c7a0f.jpg', 'Hasan Rafi', 'Senior Chef', NULL, 'https://www.linkedin.com/in/ahmad-azhari/', NULL, 'https://www.instagram.com/ahmadazzhari/', 1, 1, '2024-06-05 06:48:05', '2024-06-05 06:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_1` varchar(255) DEFAULT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  `email_1` varchar(255) DEFAULT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map_address_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone_1`, `phone_2`, `email_1`, `email_2`, `address`, `map_address_link`, `created_at`, `updated_at`) VALUES
(1, '+1347-430-9510', '+1347-430-9510', 'ahmadazzhari@gmail.com', 'example@gmail.com', 'Jl. Raya Palembang - Prabumulih No.Km. 32, Bukit Lama, Indralaya, Ogan Ilir Regency, South Sumatra 30662', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.3988826448053!2d104.729526511066!3d-2.986670796976823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b753ab6770bcf%3A0xb5eef6859d2c937!2sUniversitas%20Sriwijaya%20-%20Kampus%20Palembang!5e0!3m2!1sen!2sid!4v1717946703278!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade', '2024-06-09 08:08:20', '2024-06-09 08:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background` varchar(255) NOT NULL,
  `icon_one` varchar(255) NOT NULL,
  `count_one` varchar(255) NOT NULL,
  `name_one` varchar(255) NOT NULL,
  `icon_two` varchar(255) NOT NULL,
  `count_two` varchar(255) NOT NULL,
  `name_two` varchar(255) NOT NULL,
  `icon_three` varchar(255) NOT NULL,
  `count_three` varchar(255) NOT NULL,
  `name_three` varchar(255) NOT NULL,
  `icon_four` varchar(255) NOT NULL,
  `count_four` varchar(255) NOT NULL,
  `name_four` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `background`, `icon_one`, `count_one`, `name_one`, `icon_two`, `count_two`, `name_two`, `icon_three`, `count_three`, `name_three`, `icon_four`, `count_four`, `name_four`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_6661a7b17d029.jpg', 'fas fa-user-check', '85000', 'Customer Serve', 'fas fa-medal', '100', 'Experience Chef', 'fas fa-smile', '72000', 'Happy Customer', 'fas fa-trophy', '25', 'Award Winning', '2024-06-06 05:08:49', '2024-06-06 05:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_purchase_amount` int(11) NOT NULL DEFAULT 0,
  `expired_date` date NOT NULL,
  `discount` double NOT NULL,
  `discount_type` enum('percent','amount') NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `quantity`, `min_purchase_amount`, `expired_date`, `discount`, `discount_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qui', 'eum', 25, 100, '2007-11-17', 15, 'percent', 1, '2024-05-22 21:27:16', '2024-05-22 21:27:16'),
(3, 'dicta', 'et', 25, 100, '2007-11-13', 15, 'percent', 0, '2024-05-22 21:27:16', '2024-05-22 21:27:16'),
(4, 'FLASH SALE 1', 'LUOW', 5, 100, '2024-05-26', 25, 'percent', 1, '2024-05-23 01:09:27', '2024-05-23 01:29:36'),
(5, 'CUMACUMA100', 'CUM100', 2, 150, '2024-05-30', 100, 'amount', 1, '2024-05-23 01:30:38', '2024-05-25 07:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `daily_offers`
--

CREATE TABLE `daily_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_offers`
--

INSERT INTO `daily_offers` (`id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '2024-06-04 05:01:18', '2024-06-04 05:24:09'),
(3, 13, 1, '2024-06-04 05:27:24', '2024-06-04 05:27:24'),
(4, 14, 1, '2024-06-04 05:42:06', '2024-06-04 05:42:06'),
(5, 11, 1, '2024-06-04 05:42:22', '2024-06-04 05:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_areas`
--

CREATE TABLE `delivery_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `min_delivery_time` varchar(255) NOT NULL,
  `max_delivery_time` varchar(255) NOT NULL,
  `delivery_cost` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_areas`
--

INSERT INTO `delivery_areas` (`id`, `area_name`, `min_delivery_time`, `max_delivery_time`, `delivery_cost`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Sumatera Selatan', '8h', '10h', 45, 1, '2024-05-24 03:11:04', '2024-05-24 03:11:04'),
(4, 'Jakarta', '24h', '36h', 50, 1, '2024-05-24 03:14:02', '2024-05-24 03:14:02'),
(5, 'Medan', '7h', '9h', 50, 1, '2024-05-24 06:59:38', '2024-06-23 21:11:42');

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
-- Table structure for table `footer_infos`
--

CREATE TABLE `footer_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_description` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_infos`
--

INSERT INTO `footer_infos` (`id`, `short_description`, `address`, `phone`, `email`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'There are many variations of Lorem Ipsum available, but the majority have suffered.', 'Jl. Raya Palembang - Prabumulih No.Km. 32, Bukit Lama, Indralaya, Ogan Ilir Regency, South Sumatra 30662', '+62831-1234-5678', 'ahmadazzhari@gmail.com', '2024', '2024-06-13 06:28:18', '2024-06-23 06:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `livechats`
--

CREATE TABLE `livechats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `livechats`
--

INSERT INTO `livechats` (`id`, `sender_id`, `receiver_id`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Helo', 1, '2024-06-03 11:12:36', '2024-06-03 11:13:05'),
(2, 1, 3, 'test', 1, '2024-06-03 11:13:16', '2024-06-03 11:14:10'),
(3, 1, 3, 'Mama', 1, '2024-06-03 11:14:18', '2024-06-03 11:15:40'),
(4, 3, 1, 'test', 1, '2024-06-03 11:14:24', '2024-06-03 11:15:44'),
(5, 1, 3, 'Helo', 1, '2024-06-03 11:14:30', '2024-06-03 11:15:40'),
(6, 1, 3, 'Hi', 1, '2024-06-03 11:15:48', '2024-06-08 07:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu_sliders`
--

CREATE TABLE `menu_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_sliders`
--

INSERT INTO `menu_sliders` (`id`, `title`, `sub_title`, `url`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Classic Burger', 'Lorem ipsum dolor sit amet consectetur.', 'http://localhost:8000/product/classic-burger', '/uploads/media_66603b2d884c0.png', 1, '2024-06-05 03:17:17', '2024-06-05 03:17:17'),
(5, 'Caesar Salad', 'Lorem ipsum dolor sit amet consectetur.', 'http://localhost:8000/product/caesar-salad', '/uploads/media_66603b5326953.jpg', 1, '2024-06-05 03:17:55', '2024-06-05 03:17:55'),
(6, 'Cobb Salad', 'Lorem ipsum dolor sit amet consectetur.', 'http://localhost:8000/product/cobb-salad', '/uploads/media_66603b77376ef.jpg', 1, '2024-06-05 03:18:31', '2024-06-05 03:18:31'),
(7, 'Roasted Chicken', 'Lorem ipsum dolor sit amet consectetur.', 'http://localhost:8000/product/roasted-chicken', '/uploads/media_66603b95e25a4.png', 1, '2024-06-05 03:19:01', '2024-06-05 03:19:01');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_17_121617_create_sliders_table', 1),
(7, '2024_05_18_025016_create_section_titles_table', 2),
(8, '2024_05_18_024550_create_benefits_table', 3),
(10, '2024_05_18_093816_create_product_categories_table', 4),
(12, '2024_05_18_115225_create_products_table', 5),
(13, '2024_05_19_025144_create_product_galleries_table', 6),
(14, '2024_05_19_071117_create_product_sizes_table', 7),
(15, '2024_05_19_081539_create_product_options_table', 8),
(16, '2024_05_19_133853_create_settings_table', 9),
(18, '2024_05_23_041104_create_coupons_table', 10),
(21, '2024_05_24_094728_create_delivery_areas_table', 11),
(22, '2024_05_24_095546_create_addresses_table', 12),
(27, '2024_05_26_030052_create_orders_table', 13),
(28, '2024_05_26_030108_create_order_items_table', 13),
(29, '2024_05_26_080932_create_payment_gateway_settings_table', 14),
(31, '2024_05_27_083812_add_address_id_column_to_orders_table', 15),
(32, '2024_06_01_170913_create_order_placed_notifications_table', 16),
(33, '2024_06_02_121616_create_livechats_table', 17),
(34, '2024_06_04_101153_create_daily_offers_table', 18),
(36, '2024_06_05_081648_create_menu_sliders_table', 19),
(37, '2024_06_05_121537_create_chefs_table', 20),
(39, '2024_06_05_160735_create_app_download_sections_table', 21),
(40, '2024_06_06_071302_create_testimonials_table', 22),
(41, '2024_06_06_100412_create_counters_table', 23),
(42, '2024_06_06_133155_create_blog_categories_table', 24),
(44, '2024_06_06_142842_create_blogs_table', 25),
(45, '2024_06_08_142455_create_blog_comments_table', 26),
(46, '2024_06_09_081610_create_abouts_table', 27),
(47, '2024_06_09_131227_create_privacy_policies_table', 28),
(49, '2024_06_09_133508_create_terms_conditions_table', 29),
(50, '2024_06_09_144812_create_contacts_table', 30),
(51, '2024_06_11_093843_create_reservation_times_table', 31),
(55, '2024_06_11_103033_create_reservations_table', 32),
(56, '2024_06_11_154746_create_subscribers_table', 33),
(57, '2024_06_13_082638_create_social_links_table', 34),
(58, '2024_06_13_131131_create_footer_infos_table', 35),
(59, '2017_08_11_073824_create_menus_wp_table', 36),
(60, '2017_08_11_074006_create_menu_items_wp_table', 36),
(64, '2024_06_16_122707_create_product_ratings_table', 37),
(65, '2024_06_17_135112_create_wishlists_table', 38);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `delivery_cost` double NOT NULL DEFAULT 0,
  `subtotal` double NOT NULL,
  `grand_total` double NOT NULL,
  `product_qty` int(11) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_approve_date` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `coupon_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`coupon_info`)),
  `currency_name` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `user_id`, `address`, `address_id`, `discount`, `delivery_cost`, `subtotal`, `grand_total`, `product_qty`, `payment_method`, `payment_status`, `payment_approve_date`, `transaction_id`, `coupon_info`, `currency_name`, `order_status`, `created_at`, `updated_at`) VALUES
(4, '5389162924052818', 3, 'JL.KH.M.THAYIB, Delivery Area: Jakarta', 8, 0, 50, 390, 440, 1, 'PayPal', 'COMPLETED', '2024-05-28 08:56:40', '6PH69604J8209773R', NULL, 'EUR', 'IN_PROCESS', '2024-05-28 08:56:18', '2024-05-29 07:50:35'),
(5, '6820319024060114', 3, 'Veniam tempore vol, Delivery Area: Sumatera Selatan', 16, 0, 45, 390, 435, 1, 'PayPal', 'COMPLETED', '2024-05-31 19:49:10', '57J00235NU145925R', NULL, 'EUR', 'DELIVERED', '2024-05-31 19:48:14', '2024-06-16 06:48:39'),
(6, '1644397124060109', 3, 'JL.KH.M.THAYIB, Delivery Area: Jakarta', 8, 0, 50, 445, 495, 3, 'PayPal', 'COMPLETED', '2024-06-01 00:36:58', '99F54943YH739513H', NULL, 'EUR', 'DELIVERED', '2024-06-01 00:36:09', '2024-06-16 09:29:22'),
(7, '281161824060110', 3, 'JL.KH.M.THAYIB, Delivery Area: Jakarta', 8, 0, 50, 605, 655, 3, 'PayPal', 'COMPLETED', '2024-06-01 00:40:23', '9UT54662XE0220648', NULL, 'EUR', 'DELIVERED', '2024-06-01 00:40:10', '2024-06-16 09:29:03'),
(8, '8789783024060204', 3, 'JL.KH.M.THAYIB, Delivery Area: Jakarta', 8, 0, 50, 510, 560, 4, 'PayPal', 'COMPLETED', '2024-06-02 00:48:47', '27139497S6658730J', NULL, 'EUR', 'DELIVERED', '2024-06-02 00:48:04', '2024-06-21 01:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `product_size` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_size`)),
  `product_option` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_option`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_id`, `product_price`, `qty`, `product_size`, `product_option`, `created_at`, `updated_at`) VALUES
(7, 4, 'Caesar Salad', 9, 75, 3, '{\"id\":6,\"name\":\"Large\",\"price\":20}', '[{\"id\":3,\"name\":\"Bread\",\"price\":20},{\"id\":5,\"name\":\"Cola\",\"price\":15}]', '2024-05-28 08:56:18', '2024-05-28 08:56:18'),
(8, 5, 'Caesar Salad', 9, 75, 2, '{\"id\":6,\"name\":\"Large\",\"price\":20}', '[{\"id\":4,\"name\":\"Champagne\",\"price\":100}]', '2024-05-31 19:48:14', '2024-05-31 19:48:14'),
(9, 6, 'Roasted Chicken', 11, 125, 2, '[]', '[]', '2024-06-01 00:36:09', '2024-06-01 00:36:09'),
(10, 6, 'Classic Burger', 10, 125, 1, '[]', '[]', '2024-06-01 00:36:09', '2024-06-01 00:36:09'),
(11, 6, 'Rendang', 14, 70, 1, '[]', '[]', '2024-06-01 00:36:09', '2024-06-01 00:36:09'),
(12, 7, 'Cobb Salad', 12, 45, 2, '[]', '[]', '2024-06-01 00:40:10', '2024-06-01 00:40:10'),
(13, 7, 'Caesar Salad', 9, 75, 2, '{\"id\":6,\"name\":\"Large\",\"price\":20}', '[{\"id\":4,\"name\":\"Champagne\",\"price\":100}]', '2024-06-01 00:40:10', '2024-06-01 00:40:10'),
(14, 7, 'French Fries', 15, 25, 5, '[]', '[]', '2024-06-01 00:40:10', '2024-06-01 00:40:10'),
(15, 8, 'Cobb Salad', 12, 45, 3, '[]', '[]', '2024-06-02 00:48:04', '2024-06-02 00:48:04'),
(16, 8, 'Rendang', 14, 70, 2, '[]', '[]', '2024-06-02 00:48:04', '2024-06-02 00:48:04'),
(17, 8, 'Classic Burger', 10, 125, 1, '[]', '[]', '2024-06-02 00:48:04', '2024-06-02 00:48:04'),
(18, 8, 'Caesar Salad', 9, 75, 1, '{\"id\":6,\"name\":\"Large\",\"price\":20}', '[{\"id\":5,\"name\":\"Cola\",\"price\":15}]', '2024-06-02 00:48:04', '2024-06-02 00:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_placed_notifications`
--

CREATE TABLE `order_placed_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_placed_notifications`
--

INSERT INTO `order_placed_notifications` (`id`, `message`, `order_id`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'Order has beenn placed!', '231312', 1, NULL, '2024-06-02 00:37:43'),
(2, 'Ordernas asdasdasdasd', '213123', 1, NULL, '2024-06-02 00:37:43'),
(3, '#5389162924052818 a new order has been placed!', '4', 1, '2024-06-01 11:00:14', '2024-06-16 09:28:23'),
(4, '#5389162924052818 a new order has been placed!', '4', 1, '2024-06-01 11:00:22', '2024-06-16 09:28:23'),
(5, '#5389162924052818 a new order has been placed!', '4', 1, '2024-06-01 11:04:12', '2024-06-16 09:28:23'),
(6, '#5389162924052818 a new order has been placed!', '4', 1, '2024-06-01 11:07:53', '2024-06-16 09:28:23'),
(7, '#5389162924052818 a new order has been placed!', '4', 1, '2024-06-01 11:09:06', '2024-06-16 09:28:23'),
(8, '#5389162924052818 a new order has been placed!', '4', 1, '2024-06-01 11:09:44', '2024-06-16 09:28:23'),
(9, '#5389162924052818 a new order has been placed!', '4', 1, '2024-06-02 00:34:52', '2024-06-16 09:28:23'),
(10, '#5389162924052818 a new order has been placed!', '4', 1, '2024-06-02 00:41:40', '2024-06-16 09:28:23'),
(11, '#8789783024060204 a new order has been placed!', '8', 1, '2024-06-02 00:48:55', '2024-06-21 01:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@test.com', '$2y$10$yhpTWSPcK4kpJWarJn.WluNYw0ZNtXSlxoaMMgkrgYPdSNaIP3/KO', '2024-07-17 06:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_settings`
--

CREATE TABLE `payment_gateway_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateway_settings`
--

INSERT INTO `payment_gateway_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'paypal_status', '1', '2024-05-26 03:25:40', '2024-05-28 00:28:23'),
(2, 'paypal_acc_mode', 'sandbox', '2024-05-26 03:25:40', '2024-05-26 03:25:40'),
(3, 'paypal_country_name', 'US', '2024-05-26 03:25:40', '2024-05-26 03:47:15'),
(4, 'paypal_currency', 'EUR', '2024-05-26 03:25:40', '2024-05-26 07:21:16'),
(5, 'paypal_rate', '1.08', '2024-05-26 03:25:40', '2024-05-26 07:21:16'),
(6, 'paypal_client_id', 'YOUR_PAYPAL_CLIENT_ID', '2024-05-26 03:25:40', '2024-06-21 08:52:38'),
(7, 'paypal_secret', 'YOUR_PAYPAL_SECRET_KEY', '2024-05-26 03:25:40', '2024-06-21 08:52:38'),
(8, 'logo', '/uploads/media_6655870927c7b.png', '2024-05-26 03:28:04', '2024-05-28 00:26:01'),
(9, 'paypal_app_id', 'YOUR_PAYPAL_APP_ID', '2024-05-28 00:26:01', '2024-06-21 08:52:38');

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
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-family: var(--headingFont); text-transform: capitalize;\">Your Agreement:</h3><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-family: var(--headingFont); text-transform: capitalize;\">Main Responsibilities:</h3><ul><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Solve the problem with code.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work on Client\'s projects &amp; In-house products as well.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Analyze the product\'s needs and find out the best solutions.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work as a team and lead the junior developer.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Collaborate with other teams by providing code review and technical direction.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p><ul><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Solve the problem with code.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work on Client\'s projects &amp; In-house products as well.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Analyze the product\'s needs and find out the best solutions.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work as a team and lead the junior developer.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Collaborate with other teams by providing code review and technical direction.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p>', '2024-06-09 06:29:27', '2024-06-09 06:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail_image` varchar(255) NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `price` double NOT NULL,
  `offer_price` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `thumbnail_image`, `product_category_id`, `short_description`, `long_description`, `price`, `offer_price`, `quantity`, `sku`, `seo_title`, `seo_description`, `status`, `show_at_home`, `created_at`, `updated_at`) VALUES
(9, 'Caesar Salad', 'caesar-salad', '/uploads/media_6649ea229d1e4.png', 2, 'A Caesar salad (also spelled Cesar, César and Cesare) is a green salad of romaine lettuce and croutons dressed with lemon juice (or lime juice), olive oil, eggs or egg yolks, Worcestershire sauce, anchovies, garlic, Dijon mustard, Parmesan cheese, and black pepper.', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipiscing, elit libero aliquam blandit per lacinia, orci dignissim tortor phasellus fringilla. Euismod ultricies massa a semper magna praesent platea dis blandit, nunc gravida aliquet mattis aenean posuere suscipit malesuada metus leo, taciti iaculis magnis per egestas porta feugiat arcu. Egestas donec commodo primis dignissim hac himenaeos quisque, metus at dapibus viverra nisl vehicula nulla, cras laoreet diam tempus in aliquam. Rhoncus netus ut nibh massa magnis sem fermentum a, class sollicitudin tortor montes fusce elementum tristique nisl, sociosqu magna vitae curae pharetra aliquet aliquam. Montes habitant in at nec sagittis lacus, quam nullam pulvinar aenean odio, faucibus mauris leo hendrerit gravida.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Fusce tristique ante commodo fringilla volutpat tempus cum pretium, vitae habitant nibh hac sed purus taciti dictum, mattis semper id himenaeos duis aptent donec. Tortor vitae sem tempus vivamus accumsan vulputate netus fermentum lacinia per, gravida eu rhoncus ornare etiam senectus luctus sed volutpat, vel conubia integer primis quis sagittis ultrices et sollicitudin. Leo integer tempus ultricies pretium nullam mollis cras, phasellus turpis vestibulum tempor senectus aptent blandit, porta litora suspendisse cum imperdiet accumsan. Nostra erat orci egestas ad leo libero imperdiet, urna porta ultrices in eget magnis porttitor, ligula cursus parturient praesent justo duis. Ridiculus rutrum nascetur nulla fusce integer fames ultrices scelerisque morbi, commodo sociis venenatis arcu taciti ligula erat cum auctor viverra, diam magnis lectus odio vulputate condimentum aliquet eget. Erat urna himenaeos mollis netus facilisi justo a nulla ac tempus inceptos, porta eros gravida dictum nullam sed fringilla phasellus nibh.</p>', 75, 0, 15, 'EZ8-UKJSAS', NULL, NULL, 1, 1, '2024-05-19 05:01:38', '2024-05-23 01:52:08'),
(10, 'Classic Burger', 'classic-burger', '/uploads/media_6649ea99988cf.jpg', 4, 'A burger is a patty of ground beef grilled and placed between two halves of a bun. Slices of raw onion, lettuce, bacon, mayonnaise, and other ingredients add flavor. Burgers are considered an American food but are popular around the world. In Japan, teriyaki burgers are popular.', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipiscing elit lacus vestibulum, varius erat penatibus primis mollis consequat suspendisse mattis, ut mi tempus praesent aptent blandit pretium gravida. Neque congue lacus placerat nascetur praesent lectus conubia aenean, nullam taciti mauris auctor euismod nisl facilisi, ad dictumst laoreet dis egestas arcu pharetra. Sem purus accumsan donec habitasse urna blandit, dignissim in magna interdum nunc litora cubilia, leo ullamcorper nulla fusce pellentesque. Nec et ligula ullamcorper dictumst ultrices maecenas, facilisi vulputate fringilla tincidunt molestie faucibus commodo, dis at cursus conubia neque. At tempus eleifend penatibus tellus habitant mattis mollis urna, sapien suscipit bibendum id pharetra erat iaculis, morbi tristique ullamcorper nec condimentum magna suspendisse. Vestibulum augue eget convallis curabitur pulvinar sem iaculis, interdum cubilia facilisi tempus mattis justo himenaeos, felis arcu sollicitudin vitae volutpat hac dictumst, aptent praesent diam in cum est. Inceptos ac suscipit habitasse erat pharetra taciti nullam, vivamus quis elementum commodo justo magna purus sodales, tempor tempus imperdiet pellentesque ultrices habitant. Suscipit tempus porttitor habitant luctus nostra rhoncus bibendum ultrices purus viverra risus ridiculus justo vivamus, arcu aliquam inceptos nam fusce nisl mus congue non ut faucibus felis. Hac nostra viverra sociis massa egestas quam eu arcu porta, nisi proin odio nascetur ac sodales mus facilisi orci ultrices, vehicula dis commodo porttitor vel iaculis quisque ridiculus.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Rutrum dui mi nibh tellus mauris fringilla habitasse, tempor nec lectus pulvinar proin dapibus conubia massa, ad mattis augue parturient erat varius. Lectus interdum porttitor dui tristique fringilla ut quam eros mattis, pretium magna gravida mollis maecenas a primis facilisi eget, sapien vivamus nunc ac dictumst velit ad convallis. Sagittis dignissim pellentesque elementum bibendum nunc lectus rhoncus, habitasse velit nascetur viverra malesuada aenean. Cubilia proin cursus ut torquent id pellentesque nec integer at nunc nibh dignissim sapien, lobortis nam eros morbi aliquam eget aptent senectus ornare est habitasse. Nunc tellus mi accumsan magna aptent fermentum velit morbi, nam primis ultrices hendrerit iaculis tortor non dui, est metus mauris nisi inceptos libero facilisi. Mus curae justo dis dictum hac ullamcorper porttitor ante nostra, integer at sodales arcu molestie risus erat fermentum nunc enim, vitae cras magna dui lectus nisl ornare sollicitudin.</p>', 125, 0, 40, 'AE1-UWYB2', NULL, NULL, 1, 1, '2024-05-19 05:03:37', '2024-05-23 01:51:56'),
(11, 'Roasted Chicken', 'roasted-chicken', '/uploads/media_6649eaf653dda.png', 4, 'Roast chicken is chicken prepared as food by roasting whether in a home kitchen, over a fire, or with a rotisserie (rotary spit). Generally, the chicken is roasted with its own fat and juices by circulating the meat during roasting, and therefore, are usually cooked exposed to fire or heat with some type of rotary grill so that the circulation of these fats and juices is as efficient as possible. Roast chicken is a dish that appears in a wide variety of cuisines worldwide.', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipiscing elit aliquet, urna dis ante nulla purus vehicula ultrices cursus parturient, mi suscipit ullamcorper nullam mollis maecenas faucibus. Pulvinar ligula integer leo nibh est facilisi non, justo sem massa felis eget lectus fringilla imperdiet, quam conubia nec sollicitudin tortor tellus. Sodales sapien magnis magna fermentum dapibus cras urna, nostra aliquam ridiculus ullamcorper posuere. In nascetur a aptent nec vestibulum massa suscipit elementum hac convallis, nulla faucibus morbi congue eros auctor fringilla tristique cras, mollis fermentum curabitur varius dapibus gravida porttitor potenti nostra. Sapien nulla suscipit lobortis et habitant metus, at aliquet netus felis quisque eget dui, quis nascetur tristique lacus curabitur.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Pretium eu iaculis fringilla phasellus facilisis vivamus sodales, justo maecenas curae lobortis senectus habitasse commodo porta, viverra consequat elementum est ad ridiculus. Condimentum porta semper bibendum ad id cum ridiculus fames, posuere mattis malesuada cubilia tempor dictumst quam, leo laoreet montes eros pretium taciti penatibus. Integer metus non nascetur vestibulum senectus curae felis inceptos facilisis purus, faucibus augue iaculis porta placerat aptent ante laoreet ultricies curabitur tempus, elementum mi eros mus ut nulla sapien litora ultrices. Auctor porttitor massa sapien luctus platea, congue mauris suspendisse at donec, nisi placerat a nunc. Leo hendrerit per blandit ornare libero vel neque, lectus maecenas fermentum consequat vestibulum facilisi interdum condimentum, torquent dignissim aliquam class pharetra dictum.</p>', 175, 125, 30, '0IY1-ASUIGAXS', NULL, NULL, 1, 1, '2024-05-19 05:05:10', '2024-05-23 01:51:41'),
(12, 'Cobb Salad', 'cobb-salad', '/uploads/media_6649fb7741f54.png', 2, 'The Cobb salad is an American garden salad typically made with chopped salad greens (authentically romaine lettuce), tomato, bacon, chicken breast, hard-boiled eggs, avocado, chives, blue cheese (often Roquefort; some versions use other cheeses such as cheddar or Monterey Jack, or no cheese at all) and red wine vinaigrette. The ingredients are laid out on a plate in neat rows. It is served as a main course.', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipiscing elit, suscipit sociosqu sapien massa primis lacus, felis mi dictum facilisi mollis nullam. Quis vivamus eget rhoncus curae conubia a cubilia, venenatis inceptos mollis lacus sociosqu felis pharetra, leo blandit tristique semper nostra dictumst. Egestas ac senectus cum fames nam praesent pharetra donec taciti, vulputate orci ante tristique turpis eu porta gravida laoreet, phasellus dui velit dictum ornare diam proin accumsan. Aliquet taciti sociis placerat pharetra eget urna semper quam varius bibendum, eu condimentum sed odio etiam vel mauris sodales porta, conubia dui sapien a neque cursus praesent tincidunt elementum. Sapien egestas habitasse phasellus bibendum nascetur consequat suscipit neque auctor urna posuere, ac senectus facilisis curae id mattis mollis nam fermentum himenaeos, tellus sociosqu interdum eros vulputate congue velit habitant suspendisse vel. Enim montes ad hendrerit ridiculus class ac ultricies erat augue, curae himenaeos ligula dictumst risus scelerisque viverra elementum.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Diam habitasse velit vehicula tristique ultricies penatibus sagittis nibh, porta convallis torquent condimentum inceptos feugiat dui dis blandit, est luctus at cras cubilia ullamcorper massa. Aliquet pharetra rutrum phasellus sapien viverra mauris faucibus vivamus bibendum dui montes integer, suscipit lectus vehicula nisi mattis tellus ullamcorper congue taciti sollicitudin at. Bibendum ultricies faucibus eu convallis curabitur dis, habitasse semper imperdiet cubilia sem mollis per, ac ligula conubia vel dictum. Orci elementum diam ornare varius laoreet himenaeos fusce vitae, velit magnis metus tellus fringilla senectus dui etiam montes, lectus augue et praesent duis eleifend semper.</p>', 60, 45, 25, 'LASJ2-ASLDS', NULL, NULL, 1, 1, '2024-05-19 06:15:35', '2024-05-23 01:51:23'),
(13, 'Es Dawet', 'es-dawet', '/uploads/media_664ace89348a4.png', 5, 'Dawet (bahasa Jawa: ꦝꦮꦼꦠ꧀, translit. dhawêt) adalah minuman berupa campuran air gula, santan, dan cendol (biasanya dicampur es) yang berasal dari desa Jabung, Ponorogo. Minuman dengan rasa manis dan gurih ini juga kerap disajikan sebagai menu upacara pernikahan adat suku Jawa. Seiring perkembangan zaman, Es dawet menyebar ke seluruh kota mulai dari Kota Semarang, Solo, Banjarnegara, Banyumas, Cilacap, Purworejo Jakarta, Bandung, hingga luar negeri seperti Singapura dan Malaysia.', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipiscing elit, dapibus pellentesque tristique elementum viverra fermentum dictum, dignissim aliquam senectus rutrum duis ultrices. Integer in netus eleifend eget penatibus quis dapibus vulputate lacinia, aliquet fames sollicitudin neque porttitor phasellus iaculis fusce, convallis ac placerat posuere conubia per rutrum dictumst. A eu placerat ad feugiat vivamus porttitor iaculis fusce vitae, pretium vehicula laoreet facilisi ut tristique gravida proin. Ornare nisl semper a vitae sagittis ligula tempor natoque augue tristique, fringilla lectus nunc sed hac torquent hendrerit ad. Habitasse neque porta eu integer nunc curae proin, lacus elementum id luctus purus venenatis suspendisse primis, quam mollis pharetra curabitur mi cubilia. Sollicitudin tristique sem euismod per integer laoreet tellus, curabitur ullamcorper feugiat ridiculus consequat orci aenean, et ultrices taciti vestibulum potenti mus. Justo in sollicitudin duis eleifend mus nullam habitasse accumsan, phasellus orci dis viverra libero pretium vitae posuere, suscipit tempus ornare imperdiet quisque sagittis non.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Ad per penatibus primis vitae orci phasellus lobortis platea nec, felis non magna cubilia quam sociosqu ridiculus ante neque justo, duis dictum curae iaculis litora varius nibh erat. Aliquet eros turpis mus ut feugiat lacinia mollis, dis interdum natoque auctor sociosqu nam lectus, pharetra mi et vitae aenean tellus. Mus suscipit lacus tellus ultrices interdum parturient pharetra diam, sodales leo scelerisque porta metus per sociosqu, mauris rutrum sagittis risus donec augue class. Sociosqu facilisi platea metus erat congue aptent donec maecenas primis tempus feugiat varius aliquet, sem orci per senectus facilisis ac enim vulputate lacinia euismod malesuada. Praesent mus blandit vitae ultrices fermentum libero in nibh per, hendrerit phasellus velit cubilia ad ut cum fames interdum, varius sociis dictum viverra eros nascetur a dapibus.</p>', 35, 0, 25, 'AU1-IOASHAW', NULL, NULL, 1, 1, '2024-05-19 21:16:09', '2024-05-23 01:51:09'),
(14, 'Rendang', 'rendang', '/uploads/media_664c1f4158758.png', 4, 'Rendang is a popular dish made with meat stewed in coconut milk and spices. Believed to originate in West Sumatra, Indonesia, by the Minangkabau people, the dish is commonly found in Indonesia, Malaysia and Singapore.', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipiscing elit tempus consequat, fusce morbi tristique feugiat cras molestie lacinia sodales. Et mus sed ad justo malesuada auctor volutpat suscipit, inceptos mollis elementum aliquet rhoncus cubilia duis, in varius aliquam gravida augue habitasse ridiculus. Aliquet nam felis taciti potenti faucibus fringilla elementum cras, litora congue laoreet interdum augue massa dictum platea, erat ac id dignissim sagittis hendrerit mollis. Ullamcorper vulputate libero aptent convallis mi curabitur, maecenas mattis faucibus leo eleifend elementum ac, nisi semper potenti montes placerat. Semper ultrices hendrerit donec est urna, varius risus habitant. Auctor sagittis semper maecenas imperdiet quam sociis rutrum torquent lacinia mattis sociosqu massa velit nam nostra quisque, cursus dignissim nibh quis accumsan urna bibendum morbi lobortis curabitur aliquet vivamus consequat laoreet. Aptent cursus lobortis diam cubilia orci nullam a sapien dui nam litora tristique netus taciti, libero fermentum lectus sodales rutrum montes etiam felis vel volutpat curabitur at.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Ultricies justo consequat interdum nunc pulvinar, curae tristique hendrerit diam nisl, non est dictum dui. Phasellus ad scelerisque proin semper dis maecenas, luctus eget fringilla nostra fames, placerat sociis elementum accumsan montes. Vitae parturient senectus quis montes fringilla nulla tempor magna ac suscipit, magnis tincidunt tristique placerat vulputate torquent porta enim nisi. Urna tellus consequat pretium fringilla nibh bibendum neque suscipit varius, erat et phasellus porttitor turpis tortor duis lacus, commodo sodales leo habitant nisl a praesent rutrum.</p>', 80, 70, 25, 'A1JK-XCTGW', NULL, NULL, 1, 1, '2024-05-20 21:12:49', '2024-05-23 01:50:46'),
(15, 'French Fries', 'french-fries', '/uploads/media_664e1ed1406ba.png', 3, 'French Fries, side dish or snack typically made from deep-fried potatoes that have been cut into various shapes, especially thin strips. Fries are often salted and served with other items, including ketchup, mayonnaise, or vinegar.', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipiscing elit cursus tempor euismod commodo nunc, convallis fringilla hendrerit porta tortor habitasse eleifend urna quis morbi. Ligula praesent morbi magna lectus velit convallis egestas dictumst nostra sed vel habitant, senectus tellus lacinia venenatis massa ad interdum fermentum facilisis suscipit cum ac, non laoreet neque placerat habitasse semper posuere phasellus primis inceptos pellentesque. Praesent est suspendisse enim duis nisl tortor cursus sociis platea, tristique nunc rutrum metus montes placerat mauris tempus morbi potenti, habitant venenatis cum rhoncus proin fermentum facilisi class. Nam laoreet placerat augue accumsan est nisl morbi felis curae, sed ridiculus arcu semper nascetur varius libero odio aliquam ante, sapien phasellus justo luctus nullam tristique lobortis mauris. Fermentum feugiat aliquam habitasse proin sociosqu natoque dapibus sapien, cum pellentesque id metus pulvinar sodales et, purus senectus quis cursus eleifend etiam fringilla. Maecenas purus potenti volutpat luctus taciti auctor tincidunt vel fringilla mauris cras, etiam metus eu viverra ullamcorper rutrum torquent habitasse curabitur magna iaculis, accumsan himenaeos pellentesque quam feugiat ultrices tortor sem laoreet eget. Felis habitant senectus fermentum netus gravida viverra torquent, leo nam ad justo facilisi lacinia ullamcorper, suspendisse porttitor risus maecenas magna mus. Tellus pulvinar habitant iaculis aliquet at hac eget, porta sollicitudin fermentum class ornare nisl cum, gravida tempus nec posuere ultricies mattis. Placerat inceptos rutrum nam montes vehicula tellus augue vulputate hendrerit dictumst eu eros, aliquet platea vestibulum enim fames eleifend penatibus venenatis ad dis etiam. Nec habitasse mus morbi ridiculus integer torquent massa facilisis, nascetur et tempor fusce felis eros at, luctus ornare ac enim pellentesque imperdiet cubilia.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: \"Source Sans Pro\", sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;\">Dapibus dictumst et taciti euismod nostra molestie sem, aliquet pulvinar aptent nam magna accumsan bibendum posuere, massa montes rhoncus nisi vivamus orci. Senectus a dis enim aliquet eleifend diam hendrerit, facilisis mauris primis erat iaculis tortor. Eleifend orci gravida faucibus ultricies semper, integer odio proin mattis cras, hendrerit venenatis ante natoque. Nisi porta mattis placerat quisque mi lectus suspendisse, dictumst bibendum fringilla vehicula interdum erat, venenatis duis natoque malesuada eleifend mauris. Velit in tempor lobortis sociis elementum aliquet cras libero, auctor nascetur scelerisque phasellus dapibus inceptos id, mauris euismod lacinia maecenas blandit parturient vivamus. Suspendisse orci quisque nascetur a metus montes ante aliquet, rutrum magnis sem enim auctor taciti diam habitant curabitur, eleifend vulputate malesuada ut tristique vel ligula. Risus fringilla metus condimentum duis tincidunt velit parturient congue vehicula, egestas cubilia eget ad etiam felis natoque pulvinar porttitor aliquet, quam quis morbi luctus donec inceptos faucibus torquent. Eros litora velit elementum pretium penatibus cum sagittis ad morbi, senectus congue integer platea tempor dapibus sapien nascetur, nisl fusce hendrerit dis risus sociosqu fames quis.</p>', 25, 0, 15, 'QEF1-SAHCV', NULL, NULL, 1, 1, '2024-05-22 09:35:29', '2024-05-23 01:49:37'),
(17, 'Capcai', 'capcai', '/uploads/media_6678f4eb6f5fb.png', 4, 'Capcai atau capcay adalah nama hidangan khas Tionghoa-Indonesia berupa banyak macam sayuran yang dimasak dengan cara direbus atau digoreng tumis.', '<p source=\"\" sans=\"\" pro\",=\"\" sans-serif;=\"\" font-optical-sizing:=\"\" inherit;=\"\" font-kerning:=\"\" font-feature-settings:=\"\" font-variation-settings:=\"\" vertical-align:=\"\" baseline;=\"\" letter-spacing:=\"\" -0.003em;=\"\" color:=\"\" rgba(0,=\"\" 0,=\"\" 0.8);=\"\" text-align:=\"\" justify;\"=\"\" style=\"margin: 25px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.5;\">Lorem ipsum dolor sit amet consectetur adipiscing, elit libero aliquam blandit per lacinia, orci dignissim tortor phasellus fringilla. Euismod ultricies massa a semper magna praesent platea dis blandit, nunc gravida aliquet mattis aenean posuere suscipit malesuada metus leo, taciti iaculis magnis per egestas porta feugiat arcu. Egestas donec commodo primis dignissim hac himenaeos quisque, metus at dapibus viverra nisl vehicula nulla, cras laoreet diam tempus in aliquam. Rhoncus netus ut nibh massa magnis sem fermentum a, class sollicitudin tortor montes fusce elementum tristique nisl, sociosqu magna vitae curae pharetra aliquet aliquam. Montes habitant in at nec sagittis lacus, quam nullam pulvinar aenean odio, faucibus mauris leo hendrerit gravida.</p><p source=\"\" sans=\"\" pro\",=\"\" sans-serif;=\"\" font-optical-sizing:=\"\" inherit;=\"\" font-kerning:=\"\" font-feature-settings:=\"\" font-variation-settings:=\"\" vertical-align:=\"\" baseline;=\"\" letter-spacing:=\"\" -0.003em;=\"\" color:=\"\" rgba(0,=\"\" 0,=\"\" 0.8);=\"\" text-align:=\"\" justify;\"=\"\" style=\"margin: 25px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.5;\">Fusce tristique ante commodo fringilla volutpat tempus cum pretium, vitae habitant nibh hac sed purus taciti dictum, mattis semper id himenaeos duis aptent donec. Tortor vitae sem tempus vivamus accumsan vulputate netus fermentum lacinia per, gravida eu rhoncus ornare etiam senectus luctus sed volutpat, vel conubia integer primis quis sagittis ultrices et sollicitudin. Leo integer tempus ultricies pretium nullam mollis cras, phasellus turpis vestibulum tempor senectus aptent blandit, porta litora suspendisse cum imperdiet accumsan. Nostra erat orci egestas ad leo libero imperdiet, urna porta ultrices in eget magnis porttitor, ligula cursus parturient praesent justo duis. Ridiculus rutrum nascetur nulla fusce integer fames ultrices scelerisque morbi, commodo sociis venenatis arcu taciti ligula erat cum auctor viverra, diam magnis lectus odio vulputate condimentum aliquet eget. Erat urna himenaeos mollis netus facilisi justo a nulla ac tempus inceptos, porta eros gravida dictum nullam sed fringilla phasellus nibh.</p>', 80, 0, 15, '72SD-UASD812', NULL, NULL, 1, 1, '2024-06-23 21:24:11', '2024-06-23 21:24:11'),
(18, 'Fruit Salad', 'fruit-salad', '/uploads/media_6678f57b2f3e2.jpg', 3, 'Fruit salad is a dish consisting of various kinds of fruit, sometimes served in a liquid, either their juices or a syrup.', '<p source=\"\" sans=\"\" pro\",=\"\" sans-serif;=\"\" font-optical-sizing:=\"\" inherit;=\"\" font-kerning:=\"\" font-feature-settings:=\"\" font-variation-settings:=\"\" vertical-align:=\"\" baseline;=\"\" letter-spacing:=\"\" -0.003em;=\"\" color:=\"\" rgba(0,=\"\" 0,=\"\" 0.8);=\"\" text-align:=\"\" justify;\"=\"\" style=\"margin: 25px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.5;\">Lorem ipsum dolor sit amet consectetur adipiscing, elit libero aliquam blandit per lacinia, orci dignissim tortor phasellus fringilla. Euismod ultricies massa a semper magna praesent platea dis blandit, nunc gravida aliquet mattis aenean posuere suscipit malesuada metus leo, taciti iaculis magnis per egestas porta feugiat arcu. Egestas donec commodo primis dignissim hac himenaeos quisque, metus at dapibus viverra nisl vehicula nulla, cras laoreet diam tempus in aliquam. Rhoncus netus ut nibh massa magnis sem fermentum a, class sollicitudin tortor montes fusce elementum tristique nisl, sociosqu magna vitae curae pharetra aliquet aliquam. Montes habitant in at nec sagittis lacus, quam nullam pulvinar aenean odio, faucibus mauris leo hendrerit gravida.</p><p source=\"\" sans=\"\" pro\",=\"\" sans-serif;=\"\" font-optical-sizing:=\"\" inherit;=\"\" font-kerning:=\"\" font-feature-settings:=\"\" font-variation-settings:=\"\" vertical-align:=\"\" baseline;=\"\" letter-spacing:=\"\" -0.003em;=\"\" color:=\"\" rgba(0,=\"\" 0,=\"\" 0.8);=\"\" text-align:=\"\" justify;\"=\"\" style=\"margin: 25px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.5;\">Fusce tristique ante commodo fringilla volutpat tempus cum pretium, vitae habitant nibh hac sed purus taciti dictum, mattis semper id himenaeos duis aptent donec. Tortor vitae sem tempus vivamus accumsan vulputate netus fermentum lacinia per, gravida eu rhoncus ornare etiam senectus luctus sed volutpat, vel conubia integer primis quis sagittis ultrices et sollicitudin. Leo integer tempus ultricies pretium nullam mollis cras, phasellus turpis vestibulum tempor senectus aptent blandit, porta litora suspendisse cum imperdiet accumsan. Nostra erat orci egestas ad leo libero imperdiet, urna porta ultrices in eget magnis porttitor, ligula cursus parturient praesent justo duis. Ridiculus rutrum nascetur nulla fusce integer fames ultrices scelerisque morbi, commodo sociis venenatis arcu taciti ligula erat cum auctor viverra, diam magnis lectus odio vulputate condimentum aliquet eget. Erat urna himenaeos mollis netus facilisi justo a nulla ac tempus inceptos, porta eros gravida dictum nullam sed fringilla phasellus nibh.</p>', 80, 0, 15, 'UW11-534210SS', NULL, NULL, 1, 1, '2024-06-23 21:26:35', '2024-06-23 21:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `show_at_home` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `status`, `show_at_home`, `created_at`, `updated_at`) VALUES
(1, 'Dessert', 'dessert', 1, 0, NULL, '2024-05-19 23:06:53'),
(2, 'Salad', 'salad', 1, 1, NULL, NULL),
(3, 'Appetizer', 'appetizer', 1, 1, NULL, '2024-05-22 09:39:07'),
(4, 'Main Course', 'main_course', 1, 1, NULL, NULL),
(5, 'Beverage', 'beverage', 1, 1, NULL, '2024-05-19 21:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `product_images`, `created_at`, `updated_at`) VALUES
(8, 9, '/uploads/media_6649ee31a2eea.png', '2024-05-19 05:18:57', '2024-05-19 05:18:57'),
(9, 9, '/uploads/media_6649ee4894ab4.png', '2024-05-19 05:19:20', '2024-05-19 05:19:20'),
(10, 9, '/uploads/media_6649ee590fd19.png', '2024-05-19 05:19:37', '2024-05-19 05:19:37'),
(11, 9, '/uploads/media_6649ee61af1f3.png', '2024-05-19 05:19:45', '2024-05-19 05:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(3, 9, 'Bread', 20, '2024-05-19 05:21:03', '2024-05-19 05:21:03'),
(4, 9, 'Champagne', 100, '2024-05-19 05:21:21', '2024-05-19 05:21:21'),
(5, 9, 'Cola', 15, '2024-05-19 05:21:30', '2024-05-19 05:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `user_id`, `product_id`, `rating`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 11, 5, 'Good Food', 1, '2024-06-16 09:29:36', '2024-06-16 09:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(6, 9, 'Large', 20, '2024-05-19 05:47:20', '2024-05-19 05:47:20'),
(7, 9, 'Medium', 15, '2024-05-19 05:47:31', '2024-05-19 05:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `persons` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `reservation_id`, `user_id`, `name`, `phone`, `time`, `date`, `persons`, `status`, `created_at`, `updated_at`) VALUES
(1, '702284', 3, 'Ahmad Azhari', '+6283172514721', '7:00 PM-8:00 PM', '2024-06-15', 2, 'completed', '2024-06-11 06:29:57', '2024-06-11 06:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_times`
--

CREATE TABLE `reservation_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_times`
--

INSERT INTO `reservation_times` (`id`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, '11:00 AM', '12:00 PM', 1, '2024-06-11 03:03:27', '2024-06-11 03:20:00'),
(3, '7:00 PM', '8:00 PM', 1, '2024-06-11 03:19:48', '2024-06-11 03:19:48'),
(4, '2:00 PM', '3:00 PM', 1, '2024-06-11 03:20:26', '2024-06-11 03:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `section_titles`
--

CREATE TABLE `section_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_titles`
--

INSERT INTO `section_titles` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'benefit_top_title', 'Why Choose Us', NULL, '2024-06-04 06:23:31'),
(2, 'benefit_main_title', 'Why Choose Us', NULL, '2024-06-04 06:23:31'),
(3, 'benefit_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', NULL, '2024-06-04 06:23:31'),
(4, 'daily_offer_top_title', 'Daily Offer', '2024-06-04 06:18:29', '2024-06-04 06:18:29'),
(5, 'daily_offer_main_title', 'Up To 30% Off For This Day', '2024-06-04 06:18:29', '2024-06-04 06:18:29'),
(6, 'daily_offer_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', '2024-06-04 06:19:18', '2024-06-04 06:19:18'),
(7, 'chef_top_title', 'Our Team', '2024-06-05 07:40:43', '2024-06-05 07:40:43'),
(8, 'chef_main_title', 'Meet Our Expert Chefs', '2024-06-05 07:40:43', '2024-06-05 07:40:43'),
(9, 'chef_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', '2024-06-05 07:40:43', '2024-06-05 07:40:43'),
(10, 'testimonial_top_title', 'Testimonial', '2024-06-06 01:05:42', '2024-06-06 01:05:42'),
(11, 'testimonial_main_title', 'Our Customer Feedbacks', '2024-06-06 01:05:42', '2024-06-06 01:05:42'),
(12, 'testimonial_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', '2024-06-06 01:05:42', '2024-06-06 01:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Food Paradise', '2024-05-19 08:14:26', '2024-05-20 05:27:46'),
(2, 'site_default_currency', 'USD', '2024-05-19 08:14:26', '2024-05-20 06:14:12'),
(3, 'site_currency_icon', '$', '2024-05-19 08:14:26', '2024-05-20 06:55:01'),
(4, 'site_currency_icon_position', 'left', '2024-05-19 08:14:26', '2024-05-20 06:55:01'),
(5, 'pusher_app_id', 'YOUR_PUSHER_APP_ID', '2024-06-01 07:20:52', '2024-06-21 08:50:09'),
(6, 'pusher_key', 'YOUR_PUSHER_KEY', '2024-06-01 07:20:52', '2024-06-21 08:50:09'),
(7, 'pusher_secret', 'YOUR_PUSHER_SECRET', '2024-06-01 07:20:52', '2024-06-21 08:50:09'),
(8, 'pusher_cluster', 'YOUR_PUSHER_CLUSTER', '2024-06-01 07:20:52', '2024-06-21 08:50:09'),
(9, 'mail_driver', 'smtp', '2024-06-09 08:51:28', '2024-06-09 08:57:06'),
(10, 'mail_host', 'sandbox.smtp.mailtrap.io', '2024-06-09 08:51:28', '2024-06-09 08:57:06'),
(11, 'mail_port', '2525', '2024-06-09 08:51:28', '2024-06-09 08:57:06'),
(12, 'mail_username', 'YOUR_MAIL_USERNAME', '2024-06-09 08:51:28', '2024-06-21 08:49:19'),
(13, 'mail_password', 'YOUR_MAIN_PASSWORD', '2024-06-09 08:51:28', '2024-06-21 08:49:19'),
(14, 'mail_encryption', 'tls', '2024-06-09 08:51:28', '2024-06-09 08:57:06'),
(15, 'mail_from_address', 'food.paradise@example.com', '2024-06-09 08:51:28', '2024-06-09 08:58:13'),
(16, 'mail_receive_address', 'support.food.paradise@example.com', '2024-06-09 08:51:28', '2024-06-09 08:58:13'),
(17, 'logo', '/uploads/media_6672f669aa41c.png', '2024-06-19 07:41:31', '2024-06-19 08:16:57'),
(18, 'footer_logo', '/uploads/media_6672ee1b48515.png', '2024-06-19 07:41:31', '2024-06-19 07:41:31'),
(19, 'favicon', '/uploads/media_6672ee1b4aa9a.png', '2024-06-19 07:41:31', '2024-06-19 07:41:31'),
(20, 'breadcrumb', '/uploads/media_6672fbbe42558.jpg', '2024-06-19 07:41:31', '2024-06-19 08:39:42'),
(21, 'site_email', 'ahmadazzhari@gmail.com', '2024-06-19 08:51:16', '2024-06-19 08:51:16'),
(22, 'site_phone_number', '+62831-1234-5678', '2024-06-19 08:51:16', '2024-06-23 06:33:31'),
(23, 'site_color', '#f86f03', '2024-06-19 09:22:42', '2024-06-21 01:59:23'),
(24, 'site_seo_title', 'Food Paradise', '2024-06-19 10:12:11', '2024-06-19 10:12:11'),
(25, 'site_seo_description', 'test description', '2024-06-19 10:12:11', '2024-06-19 10:12:11'),
(26, 'site_seo_keyword', 'food,restaurant', '2024-06-19 10:12:11', '2024-06-19 10:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `offer` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `offer`, `title`, `sub_title`, `short_description`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(12, '/uploads/media_6647afa701ccb.png', '90%', 'Quam ratione recusan', 'Iure nihil minim sun', 'Voluptatem maxime su', 'Eos tempore eos lib', 1, '2024-05-17 12:27:35', '2024-05-17 12:36:57'),
(13, '/uploads/media_6647afb74d9a5.jpg', '70%', 'Porro facilis quis p', 'Vel nihil qui sunt d', 'Non commodo sit pro', 'Enim dolorum delectu', 1, '2024-05-17 12:27:51', '2024-05-17 12:36:44'),
(14, '/uploads/media_6647afd87b995.png', '25%', 'Architecto voluptas', 'Consectetur repellen', 'Nulla aperiam provid', NULL, 1, '2024-05-17 12:28:24', '2024-05-17 12:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `icon`, `name`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-instagram', 'Instagram Link', 'https://www.instagram.com/ahmadazzhari/', 1, '2024-06-13 02:20:13', '2024-06-13 02:20:13'),
(4, 'fab fa-linkedin-in', 'LinkedIn Link', 'https://www.linkedin.com/in/ahmad-azhari/', 1, '2024-06-13 02:39:53', '2024-06-13 02:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ahmadazzhari@gmail.com', 1, '2024-06-11 08:53:47', '2024-06-11 08:53:47'),
(2, 'famouskid321@gmail.com', 1, '2024-06-11 09:26:13', '2024-06-11 09:26:13'),
(3, 'admin@test.com', 1, '2024-06-11 09:26:19', '2024-06-11 09:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; font-family: var(--headingFont); color: rgb(0, 0, 0); font-size: 30px; padding: 0px; text-transform: capitalize;\">Your Agreement:</h3><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; font-family: var(--headingFont); color: rgb(0, 0, 0); font-size: 30px; padding: 0px; text-transform: capitalize;\">Main Responsibilities:</h3><ul><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Solve the problem with code.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work on Client\'s projects &amp; In-house products as well.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Analyze the product\'s needs and find out the best solutions.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work as a team and lead the junior developer.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Collaborate with other teams by providing code review and technical direction.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p><ul><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Solve the problem with code.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work on Client\'s projects &amp; In-house products as well.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Analyze the product\'s needs and find out the best solutions.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work as a team and lead the junior developer.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Collaborate with other teams by providing code review and technical direction.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p>', '2024-06-09 06:46:32', '2024-06-09 06:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `area`, `review`, `rating`, `status`, `show_at_home`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_66616bcd51d84.png', 'Isita Islam', 'NYC USA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam', 3, 1, 1, '2024-06-06 00:46:43', '2024-06-06 00:57:01'),
(3, '/uploads/media_66616f360bbd8.png', 'Sumon Mahmud', 'NYC USA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam.', 3, 1, 1, '2024-06-06 01:11:34', '2024-06-06 01:11:34'),
(4, '/uploads/media_66616f55e403e.jpg', 'Israt Jahan', 'NYC USA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam.', 4, 1, 1, '2024-06-06 01:12:05', '2024-06-06 01:12:05'),
(5, '/uploads/media_66616f9b11cb1.jpg', 'Payel Sarkar', 'NYC USA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam.', 5, 1, 1, '2024-06-06 01:13:15', '2024-06-06 01:13:15'),
(6, '/uploads/media_66616fc477471.png', 'Sima Khan', 'NYC USA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam', 3, 1, 1, '2024-06-06 01:13:56', '2024-06-06 01:13:56'),
(7, '/uploads/media_6661701b3ed45.jpg', 'Labonno Ahmed', 'NYC USA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam.', 3, 1, 1, '2024-06-06 01:15:23', '2024-06-06 01:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL DEFAULT '/uploads/avatar-1.png',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_665b54872f16e.png', 'Super Admin', 'admin@test.com', 'admin', NULL, '$2y$10$ccNxPDGQhdO/OJYtMKrDSOUY7ji6YepotiMJ1AbeeUydtysTn75zy', NULL, '2024-05-17 08:24:37', '2024-06-01 10:04:07'),
(2, '/uploads/pngwin.png', 'Admin', 'admin@example.com', 'admin', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL),
(3, '/uploads/media_665c8cdf1f226.png', 'Iman', 'user@test.com', 'user', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2024-06-02 08:16:47'),
(4, '/uploads/media_66543e1b06c25.jpg', 'Ahmad Azhari', 'ahmadazzhari@gmail.com', 'user', NULL, '$2y$10$RrYfXglZ9sXdvDDjVo7ZOuj418QSG9dxAkW.Xb3.K8JY/bOari0Nm', NULL, '2024-05-27 01:01:53', '2024-05-27 01:02:35'),
(5, '/uploads/media_665c5d7314f10.png', 'Ahmad Azhari', 'famouskid321@gmail.com', 'user', NULL, '$2y$10$3IMikrKmXmWaYVY9sor8pOE.Ud3NyhsIBBgm5D/KlTEYH3L5S49GC', NULL, '2024-06-02 04:54:10', '2024-06-02 04:54:27'),
(9, '/uploads/avatar-1.png', 'Daphne Mullins', 'casew@test.com', 'admin', NULL, '$2y$10$ZHpKeJsAKlchu14y7nK3pegabKnVr73OSy0Hl6rin8x1X7TPmr4ai', NULL, '2024-06-19 02:18:59', '2024-06-19 02:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 15, '2024-06-17 09:40:50', '2024-06-17 09:40:50'),
(2, 3, 10, '2024-06-17 09:44:59', '2024-06-17 09:44:59'),
(3, 3, 13, '2024-06-17 09:51:42', '2024-06-17 09:51:42'),
(4, 3, 14, '2024-06-17 09:52:48', '2024-06-17 09:52:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`),
  ADD KEY `addresses_delivery_area_id_foreign` (`delivery_area_id`);

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `app_download_sections`
--
ALTER TABLE `app_download_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_offers`
--
ALTER TABLE `daily_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_offers_product_id_foreign` (`product_id`);

--
-- Indexes for table `delivery_areas`
--
ALTER TABLE `delivery_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_infos`
--
ALTER TABLE `footer_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livechats`
--
ALTER TABLE `livechats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_sliders`
--
ALTER TABLE `menu_sliders`
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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_placed_notifications`
--
ALTER TABLE `order_placed_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateway_settings`
--
ALTER TABLE `payment_gateway_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ratings_user_id_foreign` (`user_id`),
  ADD KEY `product_ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `reservation_times`
--
ALTER TABLE `reservation_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_titles`
--
ALTER TABLE `section_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `app_download_sections`
--
ALTER TABLE `app_download_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daily_offers`
--
ALTER TABLE `daily_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_areas`
--
ALTER TABLE `delivery_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_infos`
--
ALTER TABLE `footer_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `livechats`
--
ALTER TABLE `livechats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_sliders`
--
ALTER TABLE `menu_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_placed_notifications`
--
ALTER TABLE `order_placed_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_gateway_settings`
--
ALTER TABLE `payment_gateway_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation_times`
--
ALTER TABLE `reservation_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `section_titles`
--
ALTER TABLE `section_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_delivery_area_id_foreign` FOREIGN KEY (`delivery_area_id`) REFERENCES `delivery_areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD CONSTRAINT `admin_menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `daily_offers`
--
ALTER TABLE `daily_offers`
  ADD CONSTRAINT `daily_offers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
