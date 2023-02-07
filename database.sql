-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 02:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_permission`
--

-- --------------------------------------------------------

--
-- Table structure for table `allow_navigation`
--

CREATE TABLE `allow_navigation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `navigation_id` int(11) DEFAULT NULL,
  `sub_navigation_id` int(11) DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allow_navigation`
--

INSERT INTO `allow_navigation` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `navigation_id`, `sub_navigation_id`, `route`) VALUES
(1, 'user-list', 'web', '2022-12-08 01:39:29', '2023-02-06 07:13:14', 3, 10, 'users.index'),
(2, 'user-create', 'web', '2022-12-08 01:39:29', '2023-02-06 07:16:30', 3, 10, 'users.create'),
(3, 'user-edit', 'web', '2022-12-08 01:39:29', '2023-02-06 07:16:57', 3, 4, 'users.edit'),
(4, 'user-delete', 'web', '2022-12-08 01:39:29', '2023-02-06 07:17:25', 3, 4, 'users.destroy'),
(5, 'role-list', 'web', '2022-12-08 01:39:29', '2023-02-07 06:38:50', 5, 3, 'roles.index'),
(6, 'role-create', 'web', '2022-12-08 01:39:29', '2023-02-07 06:37:35', 5, 3, 'roles.create'),
(7, 'role-edit', 'web', '2022-12-08 01:39:29', '2023-02-07 06:37:59', 5, 9, 'roles.edit'),
(8, 'role-delete', 'web', '2022-12-08 01:39:29', '2023-02-07 06:38:28', 5, 9, 'roles.destroy'),
(9, 'product-list', 'web', '2022-12-08 01:39:29', '2023-02-07 05:31:12', 4, 5, 'products.index'),
(10, 'product-create', 'web', '2022-12-08 01:39:29', '2023-02-07 05:46:01', 4, 7, 'products.create'),
(11, 'product-edit', 'web', '2022-12-08 01:39:29', '2023-02-06 07:26:38', 4, 5, 'products.edit'),
(12, 'product-delete', 'web', '2022-12-08 01:39:29', '2023-02-06 07:27:07', 4, 5, 'products.destroy'),
(14, 'permission-list', 'web', '2022-12-08 07:11:58', '2023-02-07 05:01:16', 6, 6, 'permission.index'),
(15, 'permission-create', 'web', '2022-12-14 05:39:15', '2023-02-07 05:01:40', 6, 6, 'permission.create'),
(16, 'permission-edit', 'web', '2022-12-14 05:39:34', '2023-02-07 05:02:12', 6, 6, 'permission.edit'),
(17, 'permission-delete', 'web', '2022-12-14 05:39:46', '2023-02-07 05:02:37', 6, 6, 'permission.delete'),
(18, 'navigation-list', 'web', '2022-12-15 00:41:49', '2022-12-20 00:29:26', 1, 1, NULL),
(19, 'navigation-create', 'web', '2022-12-15 00:44:54', '2023-02-07 05:54:04', 1, 1, NULL),
(20, 'navigation-edit', 'web', '2022-12-15 00:45:06', '2022-12-20 00:30:10', 1, 1, NULL),
(21, 'navigation-delete', 'web', '2022-12-15 00:45:21', '2022-12-20 00:30:18', 1, 1, NULL),
(22, 'subnav-list', 'web', '2022-12-15 00:53:04', '2022-12-20 00:30:58', 1, 1, NULL),
(23, 'subnav-create', 'web', '2022-12-15 00:53:18', '2022-12-20 00:31:13', 1, 1, NULL),
(24, 'subnav-edit', 'web', '2022-12-15 00:53:27', '2022-12-20 00:31:23', 1, 1, NULL),
(25, 'subnav-delete', 'web', '2022-12-15 00:53:36', '2022-12-20 00:31:35', 1, 1, NULL),
(29, 'Homeasad', 'web', '2022-12-21 00:33:44', '2022-12-21 00:33:44', 7, NULL, NULL),
(30, 'Punjab', 'web', '2023-02-02 05:16:50', '2023-02-02 05:16:50', 8, NULL, NULL),
(31, 'adduser', 'web', '2023-02-02 05:25:59', '2023-02-02 05:25:59', 3, 4, NULL),
(32, 'products_index', 'web', '2023-02-06 00:52:05', '2023-02-06 00:53:02', 4, 5, NULL),
(33, 'products_store', 'web', '2023-02-07 05:36:40', '2023-02-07 05:37:03', 4, 7, 'products.store'),
(34, 'products_update', 'web', '2023-02-07 05:38:02', '2023-02-07 05:38:28', 4, 5, 'products.update'),
(35, 'roles_show', 'web', '2023-02-07 06:39:55', '2023-02-07 06:40:06', 5, 3, 'roles.show'),
(36, 'roles_store', 'web', '2023-02-07 06:41:06', '2023-02-07 06:41:15', 5, 3, 'roles.store'),
(37, 'roles_update', 'web', '2023-02-07 06:42:03', '2023-02-07 06:42:13', 5, 3, 'roles.update');

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
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `formname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `formname`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Officer Form', 1, '2023-01-03 01:50:00', '2023-01-03 01:50:00'),
(2, 'Post Form', 1, '2023-01-03 01:50:32', '2023-01-03 01:50:32'),
(3, 'User Form', 1, '2023-01-03 01:50:37', '2023-01-03 01:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE `form_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`id`, `field_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'input', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(2, 'label', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(3, 'select', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(4, 'textarea', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(5, 'button', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(6, 'fieldset', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(7, 'legend', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(8, 'datalist', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(9, 'output', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(10, 'option', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43'),
(11, 'optgroup', 1, '2022-12-21 06:09:43', '2022-12-21 06:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `form_fieldtypes`
--

CREATE TABLE `form_fieldtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_field_id` bigint(20) UNSIGNED NOT NULL,
  `field_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_fieldtypes`
--

INSERT INTO `form_fieldtypes` (`id`, `form_field_id`, `field_type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'button', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(2, 1, 'checkbox', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(3, 1, 'color', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(4, 1, 'date', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(5, 1, 'datetime-local', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(6, 1, 'email', 1, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(7, 1, 'file', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(8, 1, 'hidden', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(9, 1, 'image', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(10, 1, 'month', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(11, 1, 'number', 1, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(12, 1, 'password', 1, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(13, 1, 'radio', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(14, 1, 'range', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(15, 1, 'reset', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(16, 1, 'search', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(17, 1, 'submit', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(18, 1, 'tel', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(19, 1, 'text', 1, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(20, 1, 'time', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(21, 1, 'url', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(22, 1, 'week', 0, '2022-12-21 07:22:29', '2022-12-21 07:22:29'),
(23, 2, 'label', 1, NULL, NULL),
(24, 2, 'strong', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_templates`
--

CREATE TABLE `form_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `form_field_id` bigint(20) UNSIGNED NOT NULL,
  `field_type` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_28_032210_create_permission_tables', 1),
(6, '2022_11_28_032419_create_products_table', 1),
(7, '2022_11_29_095636_create_navigations_table', 1),
(8, '2022_11_30_114904_add_fileds_in_navigations_table', 1),
(17, '2022_12_06_042438_create_sub_navigations_table', 2),
(23, '2022_12_12_081406_create_role_has_navigations_table', 3),
(24, '2022_12_12_081501_create_role_has_sub_navigations_table', 3),
(25, '2022_12_19_120835_add_fileds_in_permissions_table', 4),
(27, '2022_12_21_073126_create_form_fields_table', 6),
(29, '2022_12_21_113102_create_form_fieldtypes_table', 7),
(35, '2022_12_21_075732_create_forms_table', 8),
(36, '2023_01_02_114507_create_form_templates_table', 8),
(46, '2023_01_10_054834_create_officers_table', 10),
(48, '2023_01_04_083411_create_template_form_fields_table', 11),
(50, '2023_02_06_120338_add_route_column_to_allow_navigation_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(27, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_nav` int(11) NOT NULL DEFAULT 1,
  `is_show` int(11) NOT NULL DEFAULT 1,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`, `sub_nav`, `is_show`, `route`) VALUES
(1, 'Navigations', 'fa fa-list', 1, '2022-12-08 01:36:04', '2022-12-21 02:17:14', 1, 1, NULL),
(2, 'Dashboad', 'fa fa-dashboard', 1, '2022-12-08 02:01:11', '2022-12-08 02:01:11', 0, 1, '/home'),
(3, 'User Management', 'fa fa-users', 1, '2022-12-08 01:56:07', '2022-12-08 01:56:07', 1, 1, NULL),
(4, 'Product Management', 'fa fa-cogs', 1, '2022-12-08 01:57:32', '2022-12-08 01:57:32', 1, 1, NULL),
(5, 'Role Management', 'fa fa-cogs', 1, '2022-12-08 01:54:19', '2022-12-08 01:55:48', 1, 1, NULL),
(6, 'Permissions', 'fa fa-list', 1, '2022-12-08 03:35:35', '2022-12-08 03:35:35', 1, 1, NULL),
(7, 'Other', NULL, 1, '2022-12-19 06:11:40', '2022-12-20 00:32:39', 1, 1, NULL),
(8, 'Form Builder', 'fa fa-wpforms', 1, '2023-01-09 05:53:01', '2023-01-09 05:55:11', 0, 1, '/form'),
(9, 'Officer', 'fa fa-user', 1, '2023-01-10 00:57:26', '2023-01-10 00:57:26', 1, 1, NULL),
(10, 'Punjab', 'fa fa-users', 1, '2023-02-02 05:15:27', '2023-02-02 05:15:27', 0, 1, '/home');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enter_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pariatur_accusamus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sint_sint_dolor_lab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ali_hassan_view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `enter_number`, `new_password`, `password`, `email`, `pariatur_accusamus`, `sint_sint_dolor_lab`, `ali_hassan_view`, `last_name`, `middle_name`, `first_name`, `batch_no`, `serial_no`, `created_at`, `updated_at`) VALUES
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rush', 'Alyssa Hensley', 'Jolene', '001', '1001', '2023-01-11 02:11:09', '2023-01-11 02:11:09'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Harrell', 'Carol Schultz', 'Shoshana', NULL, NULL, '2023-01-11 02:12:24', '2023-01-11 02:12:24'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, 'asfdsafsad', 'sfsfsd', 'safadsfs', 'sfasfsa', NULL, NULL, '2023-01-11 07:12:15', '2023-01-11 07:12:15'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, 'Amet et c', 'Oconnor', 'Petra Edwards', 'Fleur', NULL, NULL, '2023-01-12 00:39:32', '2023-01-12 00:39:32'),
(9, '641', NULL, NULL, 'fexyrugyso@mailinator.com', NULL, 'Eligendi qui laborum Eum in alias sed obcaecati ipsam elit et nemo sit est odit', 'Eligendi u', 'Barker', 'Gabriel Moran', 'Home', NULL, NULL, '2023-01-26 03:08:31', '2023-01-26 03:08:31'),
(10, '139', NULL, NULL, 'howyravu@mailinator.com', NULL, 'Repellendus Pariatur Possimus voluptatem amet ad molestiae aut elit obcaecati', 'Non cumque', 'Asfds', 'Asfds', 'Afs', NULL, NULL, '2023-01-26 03:11:21', '2023-01-26 03:11:21'),
(11, '601', NULL, NULL, 'zigahaj@mailinator.com', NULL, 'Temporibus esse fuga Consequat Voluptas veniam vel veniam officiis id dicta t', 'Aut volupt', 'Wr3e', 'Ewqrqw Name', 'Afssa', NULL, NULL, '2023-01-26 03:15:17', '2023-01-26 03:15:17');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(6, 'Mobile Accessory', 'Charger, Handsfree, Protector', '2023-02-01 05:07:25', '2023-02-03 02:58:30'),
(11, 'Dining Table', '10 Sits Dining Table', '2023-02-01 08:09:32', '2023-02-02 05:08:46'),
(12, 'Laptop', 'HP Laptop', '2023-02-01 08:09:37', '2023-02-02 05:05:59'),
(13, 'Computerd', 'Dell Computers', '2023-02-02 02:41:42', '2023-02-07 05:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'web', '2022-12-08 01:47:56', '2022-12-08 01:47:56'),
(3, 'user1', 'web', '2022-12-08 02:07:24', '2022-12-08 02:07:24'),
(24, 'user3', 'web', '2022-12-13 03:03:04', '2022-12-13 03:03:04'),
(25, 'user4', 'web', '2022-12-13 03:05:42', '2022-12-13 03:05:42'),
(27, 'TestRole', 'web', '2022-12-21 00:37:38', '2022-12-21 00:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_navigations`
--

CREATE TABLE `role_has_navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `navigation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_navigations`
--

INSERT INTO `role_has_navigations` (`id`, `role_id`, `navigation_id`) VALUES
(37, 24, 4),
(38, 25, 2),
(39, 25, 4),
(54, 2, 2),
(55, 2, 3),
(57, 2, 6),
(58, 2, 5),
(60, 3, 2),
(61, 3, 4),
(64, 27, 1),
(65, 27, 2),
(66, 27, 3),
(67, 27, 4),
(68, 27, 5),
(69, 27, 6),
(70, 2, 8),
(71, 2, 9),
(72, 2, 10),
(74, 2, 4),
(75, 2, 1);

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
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(5, 27),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(9, 3),
(9, 24),
(9, 25),
(9, 27),
(10, 2),
(10, 24),
(10, 25),
(10, 27),
(11, 2),
(11, 24),
(11, 25),
(12, 2),
(12, 24),
(12, 25),
(14, 2),
(14, 27),
(15, 2),
(16, 2),
(17, 2),
(17, 27),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(31, 2),
(32, 2),
(32, 3),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_sub_navigations`
--

CREATE TABLE `role_has_sub_navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `sub_navigation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_sub_navigations`
--

INSERT INTO `role_has_sub_navigations` (`id`, `role_id`, `sub_navigation_id`) VALUES
(10, 2, 3),
(14, 24, 5),
(15, 25, 5),
(24, 2, 2),
(25, 2, 4),
(27, 2, 6),
(30, 3, 7),
(32, 2, 8),
(33, 2, 9),
(34, 2, 10),
(36, 3, 5),
(37, 27, 4),
(38, 27, 5),
(39, 27, 3),
(40, 27, 6),
(41, 2, 11),
(42, 2, 12),
(44, 2, 5),
(45, 2, 7),
(46, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_navigations`
--

CREATE TABLE `sub_navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show` int(11) NOT NULL DEFAULT 1,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nav_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_navigations`
--

INSERT INTO `sub_navigations` (`id`, `name`, `is_show`, `route`, `status`, `created_at`, `updated_at`, `nav_id`) VALUES
(1, 'View Navigation', 1, 'navigation', 1, '2022-12-07 20:50:12', '2022-12-07 20:50:12', 1),
(2, 'Create Navigation', 1, 'navigation/create', 1, '2022-12-07 20:53:14', '2022-12-15 00:46:39', 1),
(3, 'View Role', 1, 'roles', 1, '2022-12-07 20:54:49', '2022-12-07 20:54:49', 5),
(4, 'View User', 1, 'users', 1, '2022-12-07 20:56:30', '2022-12-07 20:56:30', 3),
(5, 'View Products', 1, 'products', 1, '2022-12-07 20:58:00', '2022-12-07 20:58:00', 4),
(6, 'View Permissions', 1, 'permission', 1, '2022-12-07 22:36:15', '2022-12-07 22:36:15', 6),
(7, 'Create Product', 1, 'products/create', 1, '2022-12-14 05:22:17', '2022-12-14 05:23:21', 4),
(8, 'Create Permission', 1, 'permission/create', 1, '2022-12-14 05:48:23', '2022-12-15 00:44:23', 6),
(9, 'Create Role', 1, 'roles/create', 1, '2022-12-15 02:41:52', '2022-12-15 03:08:43', 5),
(10, 'Create User', 1, 'users/create', 1, '2022-12-15 07:08:07', '2022-12-15 07:08:07', 3),
(11, 'Officer List', 1, '/officer', 1, '2023-01-10 00:58:35', '2023-01-10 00:58:35', 9),
(12, 'Create Officer', 1, 'officer/create', 1, '2023-01-10 00:59:30', '2023-01-10 00:59:30', 9);

-- --------------------------------------------------------

--
-- Table structure for table `template_form_fields`
--

CREATE TABLE `template_form_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` int(11) NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `form_field_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_type` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` int(11) NOT NULL DEFAULT 0,
  `min_length` int(11) DEFAULT NULL,
  `max_length` int(11) DEFAULT NULL,
  `show_in_listing` int(11) DEFAULT NULL,
  `show_in_icp_chart` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_form_fields`
--

INSERT INTO `template_form_fields` (`id`, `position_id`, `form_id`, `form_field_id`, `label`, `label_type`, `field_type`, `name`, `placeholder`, `required`, `min_length`, `max_length`, `show_in_listing`, `show_in_icp_chart`, `is_active`, `created_at`, `updated_at`) VALUES
(11, 5, 1, 1, 'Serial No', 'strong', 19, 'serial_no', NULL, 0, NULL, NULL, 1, 1, 0, '2023-01-11 02:10:42', '2023-01-26 03:08:58'),
(12, 1, 1, 1, 'Batch No', 'strong', 19, 'batch_no', NULL, 0, NULL, NULL, 0, 1, 0, '2023-01-11 02:10:42', '2023-01-31 06:54:31'),
(13, 2, 1, 1, 'First Name', 'strong', 19, 'first_name', NULL, 1, NULL, NULL, 1, 1, 1, '2023-01-11 02:10:42', '2023-01-31 06:54:31'),
(14, 3, 1, 1, 'Middle Name', 'strong', 19, 'middle_name', NULL, 0, NULL, NULL, 0, 1, 1, '2023-01-11 02:10:42', '2023-01-31 06:54:31'),
(15, 4, 1, 1, 'Last Name', 'strong', 19, 'last_name', NULL, 1, NULL, NULL, 1, 1, 1, '2023-01-11 02:10:42', '2023-01-26 03:17:40'),
(16, 6, 1, 1, 'Ali Hassan View', 'strong', 19, 'ali_hassan_view', 'Required', 0, NULL, 10, 1, 1, 1, '2023-01-11 07:10:45', '2023-01-26 03:08:58'),
(17, 7, 1, 1, 'Sint sint dolor lab', 'label', 19, 'sint_sint_dolor_lab', 'Blanditiis non non d', 1, NULL, 82, 1, 0, 1, '2023-01-12 00:47:50', '2023-01-26 03:08:58'),
(18, 8, 1, 1, 'Pariatur Accusamus', 'strong', 19, 'pariatur_accusamus', 'Repellendus Adipisi', 1, NULL, 75, 1, 0, 0, '2023-01-12 00:49:31', '2023-01-26 03:08:58'),
(19, 9, 1, 1, 'Email', 'strong', 6, 'email', 'Enter email address', 1, NULL, NULL, 0, 0, 1, '2023-01-16 02:26:22', '2023-01-26 03:08:58'),
(20, 10, 1, 1, 'Password', 'strong', 12, 'password', 'Enter Password', 1, NULL, NULL, 0, 0, 0, '2023-01-16 02:38:59', '2023-01-26 03:08:58'),
(21, 1, 2, 1, 'Password', 'strong', 12, 'password', 'Enter Password', 1, NULL, NULL, 0, 0, 1, '2023-01-16 02:38:59', '2023-01-17 01:29:09'),
(22, 11, 1, 1, 'New Password', 'strong', 12, 'new_password', 'Enter New Password', 1, NULL, NULL, 0, 0, 0, '2023-01-18 00:46:50', '2023-01-26 03:08:58'),
(23, 12, 1, 1, 'Enter Number', 'strong', 11, 'enter_number', NULL, 0, NULL, NULL, 0, 0, 1, '2023-01-18 07:35:15', '2023-01-26 03:08:58');

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
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$gtN1Gt5u.oBtQteb0c6BB.qmzh9a.lP306n25fLoIl6HT5Io7rGz.', NULL, '2022-12-08 01:47:56', '2022-12-08 01:47:56'),
(4, 'Asad', 'asad@gmail.com', NULL, '$2y$10$x93b826YGQJ6HS5y0eN0I.XjQ.MtzjRzs5NDWOwV/js8v5tcAvL1C', NULL, '2022-12-08 02:17:43', '2022-12-08 02:17:43'),
(5, 'test', 'test@gmail.com', NULL, '$2y$10$SYYWL9ejvdH71mwdJ1p/duyfk.AhqoMGqVk0j7mLGN/ADDssIc/WO', NULL, '2022-12-21 00:38:07', '2023-02-07 02:39:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allow_navigation`
--
ALTER TABLE `allow_navigation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forms_formname_unique` (`formname`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `form_fields_field_type_unique` (`field_name`);

--
-- Indexes for table `form_fieldtypes`
--
ALTER TABLE `form_fieldtypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `form_fieldtypes_field_type_unique` (`field_type`),
  ADD KEY `form_fieldtypes_form_field_id_foreign` (`form_field_id`);

--
-- Indexes for table `form_templates`
--
ALTER TABLE `form_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_templates_form_id_foreign` (`form_id`),
  ADD KEY `form_templates_form_field_id_foreign` (`form_field_id`),
  ADD KEY `form_templates_field_type_foreign` (`field_type`);

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
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_navigations`
--
ALTER TABLE `role_has_navigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_navigations_role_id_foreign` (`role_id`),
  ADD KEY `role_has_navigations_navigation_id_foreign` (`navigation_id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_has_sub_navigations`
--
ALTER TABLE `role_has_sub_navigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_sub_navigations_role_id_foreign` (`role_id`),
  ADD KEY `role_has_sub_navigations_sub_navigation_id_foreign` (`sub_navigation_id`);

--
-- Indexes for table `sub_navigations`
--
ALTER TABLE `sub_navigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_navigations_nav_id_foreign` (`nav_id`);

--
-- Indexes for table `template_form_fields`
--
ALTER TABLE `template_form_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_form_fields_form_id_foreign` (`form_id`),
  ADD KEY `template_form_fields_form_field_id_foreign` (`form_field_id`),
  ADD KEY `template_form_fields_field_type_foreign` (`field_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allow_navigation`
--
ALTER TABLE `allow_navigation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form_fieldtypes`
--
ALTER TABLE `form_fieldtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `form_templates`
--
ALTER TABLE `form_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `role_has_navigations`
--
ALTER TABLE `role_has_navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `role_has_sub_navigations`
--
ALTER TABLE `role_has_sub_navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sub_navigations`
--
ALTER TABLE `sub_navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `template_form_fields`
--
ALTER TABLE `template_form_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_fieldtypes`
--
ALTER TABLE `form_fieldtypes`
  ADD CONSTRAINT `form_fieldtypes_form_field_id_foreign` FOREIGN KEY (`form_field_id`) REFERENCES `form_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_templates`
--
ALTER TABLE `form_templates`
  ADD CONSTRAINT `form_templates_field_type_foreign` FOREIGN KEY (`field_type`) REFERENCES `form_fieldtypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_templates_form_field_id_foreign` FOREIGN KEY (`form_field_id`) REFERENCES `form_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_templates_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `allow_navigation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_navigations`
--
ALTER TABLE `role_has_navigations`
  ADD CONSTRAINT `role_has_navigations_navigation_id_foreign` FOREIGN KEY (`navigation_id`) REFERENCES `navigations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_has_navigations_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `allow_navigation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_sub_navigations`
--
ALTER TABLE `role_has_sub_navigations`
  ADD CONSTRAINT `role_has_sub_navigations_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_has_sub_navigations_sub_navigation_id_foreign` FOREIGN KEY (`sub_navigation_id`) REFERENCES `sub_navigations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_navigations`
--
ALTER TABLE `sub_navigations`
  ADD CONSTRAINT `sub_navigations_nav_id_foreign` FOREIGN KEY (`nav_id`) REFERENCES `navigations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template_form_fields`
--
ALTER TABLE `template_form_fields`
  ADD CONSTRAINT `template_form_fields_field_type_foreign` FOREIGN KEY (`field_type`) REFERENCES `form_fieldtypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_form_fields_form_field_id_foreign` FOREIGN KEY (`form_field_id`) REFERENCES `form_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_form_fields_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
