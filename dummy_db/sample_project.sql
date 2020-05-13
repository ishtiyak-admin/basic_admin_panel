-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2020 at 08:19 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic_admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `content`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', 'terms-conditions', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 0, '2019-06-19 07:21:23', '2019-06-19 07:22:51'),
(2, 'Privacy Policy', 'privacy-policy', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 0, '2019-06-19 07:22:45', '2019-06-19 07:22:45'),
(3, 'About Us', 'about-us', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 1, 0, '2020-01-22 01:26:51', '2020-02-14 01:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `slug`, `title`, `subject`, `content`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Default Template', '{subject}', '<p>{message}</p>', 1, 0, '2019-06-14 10:35:35', '2019-06-19 06:36:27'),
(2, 'admin-forgot-password', 'Admin Forgot Password', 'Forgot Password', '<p>Hello <strong>{username},</strong></p>\r\n\r\n<p>To reset your password please click on below link.</p>\r\n\r\n<h1><a href=\"{link}\" target=\"_blank\">Link</a></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks &amp; Regards</p>\r\n\r\n<p><strong>Admin</strong></p>', 1, 0, '2019-06-14 10:54:47', '2019-09-27 02:03:03'),
(3, 'admin-new-user-registration', 'Admin New User Registration', 'New User Registration', '<p>Hello <strong>{username},</strong></p>\r\n\r\n<p>Your email has been registered as <strong>{role}</strong> with us.</p>\r\n\r\n<p>Please login to app with given credentials:</p>\r\n\r\n<p>Email: {email}</p>\r\n\r\n<p>Password: {password}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks &amp; Regards</p>\r\n\r\n<p><strong>Admin</strong></p>', 1, 0, '2019-06-26 00:10:30', '2019-12-27 01:11:23'),
(4, 'admin-enquiry-reply', 'Admin Enquiry Reply', 'Next Door Kitchen - Enquiry Reply', '<p>Hello <strong>{user_name},</strong></p>\r\n\r\n<p>{email_content}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks &amp; Regards</p>\r\n\r\n<p><strong>Admin</strong></p>', 1, 0, '2019-09-04 05:30:44', '2019-09-27 02:02:33'),
(5, 'enquiry-form-submit-confirmation', 'Enquiry Form Submit Confirmation', 'Contact Us Confirmation Mail', '<p>Hello <strong>{user_name},</strong></p>\r\n\r\n<p>Your enquiry has been received and will be processed shortly.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks &amp; Regards</p>\r\n\r\n<p><strong>Admin</strong></p>', 1, 0, '2019-09-18 01:47:05', '2020-01-25 00:56:29'),
(6, 'admin-user-password-update', 'Admin User Password Update', 'Password Updated By Admin', '<p>Hello <strong>{username},</strong></p>\r\n\r\n<p>Password for your account with email: <strong>{email}</strong> has been updated by Admin. New Password for your account is: <strong>{password}</strong></p>\r\n\r\n<p>&nbsp;\r\n<p>Thanks &amp; Regards</p>\r\n</p>\r\n\r\n<p><strong>Admin</strong></p>', 1, 0, '2020-01-28 23:10:57', '2020-01-28 23:10:57'),
(7, 'email-verify-otp', 'Email Verify OTP', 'OTP to verify Email', '<p>Hello <strong>{username},</strong></p>\r\n\r\n<p>Please use below OTP to verify your email.</p>\r\n\r\n<p>Your OTP is: <strong>{otp}</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks &amp; Regards</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Admin</strong></p>', 1, 0, '2020-02-06 07:11:47', '2020-02-06 07:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replied` int(11) NOT NULL DEFAULT 0,
  `reply_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `message`, `replied`, `reply_message`, `attachment`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'sajhfgs fdsakjf sakjf gdsllkdsa', 'dsafsadfsdaf@getnada.com', 'dsafg sadfkj gsdkf gsakdj fgsakjfgsaf', 1, 'asdasdsadas', NULL, 1, 0, '2020-01-22 01:38:07', '2020-02-07 00:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Why do we use it?', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 0, '2019-09-18 07:46:51', '2019-09-19 01:11:20'),
(2, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 0, '2019-09-18 07:51:37', '2019-09-19 01:11:01'),
(3, 'Where does it come from?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, '2019-09-19 01:11:41', '2019-09-19 01:11:41'),
(4, 'Where can I get some?', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 1, 0, '2019-09-19 01:11:56', '2020-02-07 00:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `global_settings`
--

CREATE TABLE `global_settings` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `category` enum('G','KP','P','N','S','PP') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'G' COMMENT 'G:global KP:Kitchen_Person P:Pricing_management N:Notification_settings S:Social_settings PP:Paypal',
  `required` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `global_settings`
--

INSERT INTO `global_settings` (`id`, `label`, `slug`, `value`, `options`, `type`, `category`, `required`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Site Title', 'site-title', 'Admin Panel', NULL, 'text', 'G', 1, 1, 0, '2019-06-18 10:52:32', '2020-02-14 01:08:46'),
(2, 'Site Description', 'site-description', 'Lorem Ipsum is simply dummy text of the\nprinting and typesetting industry.', NULL, 'textarea', 'G', 0, 1, 0, '2019-06-19 11:26:13', '2019-11-25 03:40:19'),
(3, 'Admin Receive Email', 'admin-receive-email', 'testingbydev@gmail.com', NULL, 'email', 'G', 1, 1, 0, '2019-06-18 13:52:49', '2019-06-19 06:05:01'),
(4, 'Contact Number', 'contact-number', '+123646546466', NULL, 'tel', 'G', 0, 1, 0, '2019-06-19 11:26:13', '2020-01-27 04:48:49'),
(5, 'Address', 'address', 'Dev Technosys Pvt Ltd, Jaipur', NULL, 'textarea', 'G', 0, 1, 0, '2019-06-19 11:26:13', '2019-12-26 06:24:45'),
(6, 'Copyright Text', 'copyright-text', '© 2019 Admin Panel', NULL, 'text', 'G', 1, 1, 0, '2019-07-09 12:33:34', '2020-02-14 01:08:53'),
(7, 'Facebook', 'facebook', 'http://facebook.com', NULL, 'url', 'S', 0, 1, 0, '2019-07-17 13:21:40', '2019-07-17 08:04:49'),
(8, 'Twitter', 'twitter', 'http://twitter.com', NULL, 'url', 'S', 0, 1, 0, '2019-07-17 13:21:40', '2019-07-17 08:04:49'),
(9, 'Instagram', 'instagram', 'http://instagram.com', NULL, 'url', 'S', 0, 1, 0, '2019-07-17 13:21:40', '2019-07-17 08:04:52'),
(10, 'LinkedIn', 'linkedin', 'http://linkedin.com', NULL, 'url', 'S', 0, 1, 0, '2019-07-17 13:21:40', '2019-07-17 08:04:52');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL DEFAULT 0,
  `receiver_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `contest_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contest_request_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `challenge_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `challenge_request_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refree_request_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `role_id` int(11) NOT NULL DEFAULT 2 COMMENT '1:admin 2:user',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `email_otp` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_noti` int(11) NOT NULL DEFAULT 1,
  `push_noti` int(11) NOT NULL DEFAULT 1,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `mobile_number`, `facebook_id`, `old_username`, `old_email`, `old_mobile_number`, `old_facebook_id`, `dob`, `gender`, `role_id`, `image`, `address`, `location`, `lat`, `lng`, `status`, `is_delete`, `email_otp`, `email_verified`, `email_verified_at`, `password`, `email_noti`, `push_noti`, `device_type`, `device_token`, `remember_token`, `terms`, `created_at`, `updated_at`) VALUES
(1, 'Admin Panel', 'Admin', 'Panel', 'recbreaker@getnada.com', '+11234567890', NULL, NULL, NULL, NULL, NULL, '11/06/1992', 'male', 1, '1581662311.png', NULL, NULL, NULL, NULL, 1, 0, NULL, 0, NULL, '$2y$10$N97hjhfDZbGD9LZs/aaoaeR7BA/NrSvGNWVmeddADBfi1W1Typ92C', 1, 1, NULL, NULL, 'wtNIGN1VsFh5f652tc6MOWp1s6dcKMPWuAbd0fywkYdayRuBdzpFYfyHuFjU', 1, '2019-06-13 07:29:06', '2020-02-14 01:08:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_settings`
--
ALTER TABLE `global_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `global_settings`
--
ALTER TABLE `global_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
