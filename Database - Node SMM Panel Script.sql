-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2022 at 12:40 AM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastkuuf_node`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_providers`
--

CREATE TABLE `api_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standard',
  `balance` decimal(15,5) DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `childpanels`
--

CREATE TABLE `childpanels` (
  `id` int(11) NOT NULL,
  `ids` text NOT NULL,
  `uid` int(11) NOT NULL,
  `child_key` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `domain` varchar(191) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `charge` decimal(15,4) DEFAULT NULL,
  `status` enum('active','processing','refunded','disabled','terminated') NOT NULL DEFAULT 'processing',
  `renewal_date` date NOT NULL,
  `changed` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_custom_page`
--

CREATE TABLE `general_custom_page` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `pid` int(1) DEFAULT 1,
  `position` int(1) DEFAULT 0,
  `name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_file_manager`
--

CREATE TABLE `general_file_manager` (
  `id` int(11) NOT NULL,
  `ids` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `file_name` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_type` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_ext` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_size` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_image` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_file_manager`
--

INSERT INTO `general_file_manager` (`id`, `ids`, `uid`, `file_name`, `file_type`, `file_ext`, `file_size`, `is_image`, `image_width`, `image_height`, `created`) VALUES
(316, '0c037861e5dc297f2adc2dd76686377a', 38, '0f825824fa982dcac4bd733de1f94b11.png', 'image/png', 'png', '2.19', '1', 225, 225, '2020-04-30 16:49:18'),
(317, 'b5b7274f1b63c717c7351538074e6150', 38, '2ad9194ca57dfd8f76b2a82ad6a6266b.png', 'image/png', 'png', '10.69', '1', 600, 200, '2020-04-30 16:49:25'),
(318, '5dd8049be58d3e462d3d4d016aa465c3', 38, '8a267ee14b24cd82ce40f92e99c3f674.png', 'image/png', 'png', '10.69', '1', 600, 200, '2020-04-30 16:49:42'),
(319, 'd42879a3e8dbc69cd89986b5dd9bf3ce', 38, '3530c465b0d02a980703f66c1c16368d.PNG', 'image/png', 'png', '27.93', '1', 900, 200, '2020-05-05 09:59:38'),
(320, 'bbe5af404ea726f2d75c32eebae2507c', 38, 'f67aa99257ae32085c1472d778c8cceb.PNG', 'image/png', 'png', '27.93', '1', 900, 200, '2020-05-05 10:01:23'),
(321, 'b96b5fe88d6e491d6165247d7c94c4db', 38, '667965336f2064150c11dbf7b3b68bde.PNG', 'image/png', 'png', '27.93', '1', 900, 200, '2020-05-06 13:01:53'),
(322, 'd11083fa19c258d05a188d55b037081e', 38, '50f24e4c75b2ec89f6fe0198a770078c.JPG', 'image/jpeg', 'jpg', '22.53', '1', 900, 200, '2020-05-06 13:46:51'),
(323, '82ff38485399962bbb050e60ea57f766', 38, '77db8ba89676413b31ee8721f10efc98.png', 'image/png', 'png', '40.32', '1', 900, 200, '2020-05-06 13:48:12'),
(324, '2242e5bc57e0430419a6bc4ea8e6e1c3', 38, '3bc4fadfa26d461037ee8ec32f7abbe3.png', 'image/png', 'png', '2.19', '1', 225, 225, '2020-05-08 20:44:56'),
(325, '18e304b2410772be4f9dc289235a8f1f', 38, '1012ca5bd492179b0b71dc14f2754566.PNG', 'image/png', 'png', '27.93', '1', 900, 200, '2020-05-08 20:45:17'),
(326, 'a0e1bc43d892a438cb01b6d88b4a3924', 38, '3f6e66864658b4892dc05c01a91021c8.PNG', 'image/png', 'png', '27.93', '1', 900, 200, '2020-05-08 20:45:54'),
(327, '2e5dcf8d71863b0fd5fbdd2ece1e49ca', 38, '7cbe51d356bcce8714b8f23344d1aad6.PNG', 'image/png', 'png', '27.93', '1', 900, 200, '2020-05-08 20:46:06'),
(328, '7e1e5a55b1ed86d0f7ee2eba4903d96e', 38, '1459842c71b1b06343be728f721dc560.PNG', 'image/png', 'png', '27.93', '1', 900, 200, '2020-05-08 20:46:25'),
(329, '5006857d49f7f1fd12c0699bc1b7d412', 38, 'ec2463b921d5ba20243f97480e465a19.JPG', 'image/jpeg', 'jpg', '22.53', '1', 900, 200, '2020-05-08 21:47:30'),
(330, '4e1424b6a51911167145089e4dfd408b', 38, 'e0300eeedfc942997353750fe6ddf931.PNG', 'image/png', 'png', '27.93', '1', 900, 200, '2020-05-08 21:54:36'),
(331, 'a353c95d5c067f7076572fa2166e7995', 38, 'bece2822c27c99128009fac5ede0f649.png', 'image/png', 'png', '40.32', '1', 900, 200, '2020-05-09 07:38:51'),
(332, '27a6a22840e5a6380f6f42c57a256d15', 8, '03d3721143fb43348a4f30bf238a8b65.png', 'image/png', 'png', '0.22', '1', 32, 32, '2020-11-23 13:06:37'),
(333, '6977c97e005bbbefa96326f96a1d20a9', 8, '4ac6bad2e4ac601aabf54287c04d42fc.png', 'image/png', 'png', '6.76', '1', 1200, 1200, '2020-11-23 13:06:45'),
(334, '92a85abb938d141d81810428d235c070', 8, '719ef55fad8bdfc443c78eea66548d1c.png', 'image/png', 'png', '6.76', '1', 1200, 1200, '2020-11-23 13:06:59'),
(335, 'df86a7618038e216cd5cad092b40c8ea', 520, 'ace687f2a93734ac806a0c802016aa87.jpg', 'image/jpeg', 'jpg', '25.02', '1', 360, 360, '2021-04-12 18:08:56'),
(336, 'd085e5da6840cc35b080a842ce600df6', 7146, '5d6cda886cb4572130a29d1bc50b1a3e.PNG', 'image/png', 'png', '216.61', '1', 1881, 958, '2021-11-01 15:53:29'),
(337, 'd9ecb287cf37d2f63801c1840517adf3', 7146, '8da875efb6867757044bd7bb0d8872d3.PNG', 'image/png', 'png', '216.61', '1', 1881, 958, '2021-11-01 15:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `general_lang`
--

CREATE TABLE `general_lang` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `lang_code` varchar(10) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_lang_list`
--

CREATE TABLE `general_lang_list` (
  `id` int(11) NOT NULL,
  `ids` varchar(225) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `country_code` varchar(225) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_lang_list`
--

INSERT INTO `general_lang_list` (`id`, `ids`, `code`, `country_code`, `is_default`, `status`, `created`) VALUES
(1, '2a4b53c9c07dbce757eea6a1a1eff1d7', 'en', 'GB', 1, 1, '2020-04-30 15:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `general_news`
--

CREATE TABLE `general_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `expiry` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_news`
--

INSERT INTO `general_news` (`id`, `ids`, `uid`, `type`, `description`, `status`, `created`, `expiry`, `changed`) VALUES
(4, 'e9effc47f00bad8eb516b30d32b45c8c', 7146, 'new_services', '&lt;p&gt;hello&lt;/p&gt;', 1, '2021-09-19 00:00:00', '2021-09-19 00:00:00', '2021-09-19 13:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `general_options`
--

CREATE TABLE `general_options` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_options`
--

INSERT INTO `general_options` (`id`, `name`, `value`) VALUES
(67, 'enable_https', '1'),
(68, 'enable_disable_homepage', '0'),
(69, 'website_desc', 'Node SMM Panel - #1 SMM Reseller Panel - Best SMM Panel for Resellers. Also well known for TOP SMM Panel and Cheap SMM Panel for all kind of Social Media Marketing Services. SMM Panel for Facebook, Instagram, YouTube and more services!                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                '),
(70, 'website_keywords', 'smm panel, SmartPanel, smm reseller panel, smm provider panel, reseller panel, instagram panel, resellerpanel, social media reseller panel, smmpanel, panelsmm, smm, panel, socialmedia, instagram reseller panel                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                '),
(71, 'website_title', 'Node SMM Panel '),
(72, 'website_favicon', 'https://imgur.com/kKj1jCS.png'),
(73, 'embed_head_javascript', ''),
(205, 'paytm_qr_chagre_fee', '0'),
(206, 'paytm_qr_payment_transaction_min', ''),
(74, 'website_logo', 'https://imgur.com/kKj1jCS.png'),
(75, 'website_logo_white', 'https://imgur.com/kKj1jCS.png'),
(76, 'enable_service_list_no_login', '1'),
(77, 'disable_signup_page', '0'),
(78, 'notification_popup_content', ''),
(79, 'is_cookie_policy_page', '1'),
(80, 'enable_api_tab', '1'),
(81, 'contact_tel', ''),
(82, 'contact_email', 'support@admin.com'),
(83, 'contact_work_hour', 'Mon - Sat 09 am - 10 pm'),
(84, 'social_facebook_link', ''),
(85, 'social_twitter_link', ''),
(86, 'social_instagram_link', ''),
(87, 'social_pinterest_link', ''),
(88, 'social_tumblr_link', ''),
(89, 'social_youtube_link', ''),
(90, 'copy_right_content', 'Copyright © 2022'),
(91, 'embed_javascript', ''),
(92, 'enable_notification_popup', '1'),
(93, 'enable_goolge_recapcha', '0'),
(94, 'currency_decimal_separator', 'dot'),
(95, 'currency_thousand_separator', 'comma'),
(96, 'currency_symbol', '$'),
(97, 'currency_decimal', '1'),
(98, 'default_header_skin', 'default'),
(99, 'enable_news_announcement', '0'),
(100, 'is_maintenance_mode', '0'),
(101, 'website_name', 'Node SMM Panel  - SMM Panel Script'),
(102, 'cookies_policy_page', ''),
(103, 'terms_content', ''),
(104, 'policy_content', '<p></p>\r\n<p></p>'),
(105, 'default_home_page', 'assets'),
(106, 'default_limit_per_page', '100'),
(107, 'default_timezone', 'Asia/Kolkata'),
(108, 'is_clear_ticket', '0'),
(109, 'default_clear_ticket_days', '30'),
(110, 'default_min_order', '300'),
(111, 'default_max_order', '5000'),
(112, 'default_price_per_1k', '0.80'),
(113, 'enable_drip_feed', '1'),
(114, 'default_drip_feed_runs', '10'),
(115, 'default_drip_feed_interval', '30'),
(116, 'enable_explication_service_symbol', '1'),
(117, 'enable_signup_skype_field', '0'),
(118, 'google_capcha_site_key', ''),
(119, 'google_capcha_secret_key', ''),
(120, 'currency_code', 'USD'),
(121, 'default_price_percentage_increase', '35'),
(122, 'auto_rounding_x_decimal_places', '4'),
(123, 'is_auto_currency_convert', '0'),
(124, 'new_currecry_rate', '1'),
(182, 'payumoney_merchant_key', ''),
(183, 'payumoney_merchant_salt', ''),
(177, 'is_active_payumoney', '0'),
(178, 'payumoney_payment_environment', 'LIVE'),
(179, 'payumoney_chagre_fee', '2'),
(180, 'payumoney_payment_transaction_min', '30'),
(181, 'payumoney_currency_rate_to_usd', '1'),
(125, 'is_verification_new_account', '0'),
(126, 'is_welcome_email', '0'),
(127, 'is_new_user_email', '0'),
(128, 'is_payment_notice_email', '0'),
(129, 'is_ticket_notice_email', '0'),
(130, 'is_ticket_notice_email_admin', '0'),
(131, 'is_order_notice_email', '0'),
(132, 'email_from', 'admin@admin.com'),
(133, 'email_name', 'Admin'),
(134, 'email_protocol_type', 'php_mail'),
(135, 'smtp_server', ''),
(136, 'smtp_port', ''),
(137, 'smtp_encryption', 'ssl'),
(138, 'smtp_username', ''),
(139, 'smtp_password', ''),
(140, 'verification_email_subject', '{{website_name}} - Please validate your account'),
(141, 'verification_email_content', '<p><strong>Welcome to {{website_name}}! </strong></p>\r\n<p>Hello <strong>{{user_firstname}}</strong>!</p>\r\n<p> Thank you for joining! We\'re glad to have you as community member, and we\'re stocked for you to start exploring our service.  If you don\'t verify your address, you won\'t be able to create a User Account.</p>\r\n<p>  All you need to do is activate your account by click this link: <br>  {{activation_link}} </p>\r\n<p>Thanks and Best Regards!</p>\r\n<p></p>'),
(142, 'email_welcome_email_subject', '{{website_name}} - Getting Started with Our Service!'),
(143, 'email_welcome_email_content', '<p xss=\"removed\"><strong>Welcome to {{website_name}}! </strong></p>\r\n<p>Hello <strong>{{user_firstname}}</strong>!</p>\r\n<p>Congratulations! <br>You have successfully signed up for our service - {{website_name}} with follow data</p>\r\n<ul>\r\n<li>Firstname: {{user_firstname}}</li>\r\n<li>Lastname: {{user_lastname}}</li>\r\n<li>Email: {{user_email}}</li>\r\n<li>Timezone: {{user_timezone}}</li>\r\n</ul>\r\n<p></p>\r\n<p>Congratulations once more </p>\r\n<p>We would like to invite you to become reseller with us now you have the best earning opportunity with us don\'t miss this chance. </p>\r\n<p></p>\r\n<p>Requirement </p>\r\n<p>. Domain </p>\r\n<p>. Monthly fees 500rs only </p>\r\n<p></p>\r\n<p>Benefits for reseller</p>\r\n<p>. Get 20% off on all services</p>\r\n<p>. Get child panel</p>\r\n<p>. Lifetime support</p>\r\n<p>. Customer gain tips</p>\r\n<p>. Automate website</p>\r\n<p>. One click services load</p>\r\n<p>. Free api support</p>\r\n<p></p>\r\n<p></p>'),
(144, 'email_new_registration_subject', '{{website_name}} - New Registration'),
(145, 'email_new_registration_content', '<p>Hi Admin!</p>\r\n<p>Someone signed up in <strong>{{website_name}}</strong> with follow data</p>\r\n<ul>\r\n<li>Firstname {{user_firstname}}</li>\r\n<li>Lastname: {{user_lastname}}</li>\r\n<li>Email: {{user_email}}</li>\r\n<li>Timezone: {{user_timezone}}</li>\r\n</ul>'),
(146, 'email_password_recovery_subject', '{{website_name}} - Password Recovery'),
(147, 'email_password_recovery_content', '<p>Hi<strong> {{user_firstname}}! </strong></p>\r\n<p>Somebody (hopefully you) requested a new password for your account. </p>\r\n<p>No changes have been made to your account yet. <br>You can reset your password by click this link: <br>{{recovery_password_link}}</p>\r\n<p>If you did not request a password reset, no further action is required. </p>\r\n<p>Thanks and Best Regards!</p>\r\n<p></p>'),
(148, 'email_payment_notice_subject', '{{website_name}} -  Thank You! Deposit Payment Received'),
(149, 'email_payment_notice_content', '<p>Hi<strong> {{user_firstname}}! </strong></p>\r\n<p>We\'ve just received your final remittance and would like to thank you. We appreciate your diligence in adding funds to your balance in our service.</p>\r\n<p>It has been a pleasure doing business with you. We wish you the best of luck.</p>\r\n<p>Thanks and Best Regards!</p>\r\n<p></p>'),
(150, 'payment_transaction_min', '1'),
(151, 'payment_environment', 'live'),
(152, 'is_active_paypal', '0'),
(153, 'paypal_chagre_fee', '4'),
(154, 'paypal_client_id', ''),
(155, 'paypal_client_secret', ''),
(156, 'is_active_stripe', '0'),
(157, 'stripe_chagre_fee', '4'),
(158, 'stripe_publishable_key', ''),
(159, 'stripe_secret_key', ''),
(160, 'is_active_2checkout', '0'),
(161, 'twocheckout_chagre_fee', '4'),
(162, '2checkout_publishable_key', ''),
(163, '2checkout_private_key', ''),
(164, '2checkout_seller_id', ''),
(165, 'is_active_manual', '0'),
(166, 'manual_payment_content', '&lt;p&gt;Pay Manually&lt;/p&gt;'),
(167, 'is_active_paytm', '0'),
(168, 'paytm_payment_environment', 'PROD'),
(169, 'paytm_chagre_fee', '4'),
(170, 'paytm_currency_rate_to_usd', '1'),
(171, 'paytm_merchant_id', NULL),
(172, 'paytm_merchant_key', NULL),
(173, 'paytm_payment_transaction_min', ''),
(174, 'enable_attentions_orderpage', ''),
(175, 'paypal_payment_transaction_min', ''),
(176, 'get_features_option', '0'),
(184, 'is_active_razor_pay', '1'),
(185, 'razor_pay_chagre_fee', '2'),
(186, 'razor_pay_publishable_key', NULL),
(187, 'razor_pay_secret_key', NULL),
(188, 'razor_pay_payment_transaction_min', ''),
(189, 'default_original_price_per_1k', '0.40'),
(190, 'payment_expiry_time', ''),
(191, 'expire_balance_start_date', ''),
(192, 'home_contact', ''),
(193, 'custom_home', 'Thanks For Purchasing From  <a href=\"codeclub.in\">Code Club</a>'),
(194, 'custom_css', ''),
(195, 'is_active_coinbase', ''),
(196, 'manual_payment_info', ''),
(197, 'coinbase_chagre_fee', '4'),
(198, 'coinbase_payment_transaction_min', '10'),
(199, 'coinbase_api_key', ''),
(200, 'defaut_auto_sync_service_setting', '{\"price_percentage_increase\":50,\"sync_request\":0,\"new_currency_rate\":\"1\",\"is_enable_sync_price\":0,\"is_convert_to_new_currency\":0}'),
(201, 'paytm_qr_image', 'https://i.ibb.co/k6nfQTW/Whats-App-Image-2020-11-23-at-7-08-07-PM.jpg'),
(202, 'is_active_paytmqr', '1'),
(203, 'paytm_qr_currency_rate_to_usd', '1'),
(204, 'paytm_qr_merchant_id', 'sfqxVR54277884771300'),
(207, 'paytmqr_payment_environment', 'PROD'),
(208, 'enable_affiliate', '1'),
(209, 'affiliate_notice', 'NOW EARN MONEY WITH REFERRAL PROGRAM.'),
(210, 'affiliate_bonus', '1'),
(211, 'is_childpanel_status', '1'),
(212, 'childpanel_price', '15'),
(213, 'ns1', 'ns1.yourpanel.in'),
(214, 'ns2', 'ns1.yourpanel.in'),
(215, 'childpanel_desc', 'NOW EARN MONEY BY SELLING CHILD PANEL'),
(216, 'enable_custom_home', ''),
(217, 'refill_expiry_days', '30');

-- --------------------------------------------------------

--
-- Table structure for table `general_purchase`
--

CREATE TABLE `general_purchase` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `pid` text DEFAULT NULL,
  `purchase_code` text DEFAULT NULL,
  `version` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_purchase`
--

INSERT INTO `general_purchase` (`id`, `ids`, `pid`, `purchase_code`, `version`) VALUES
(1, '8068ec7f79145fe55dea67dd63b012c3', '23595718', '91dbc122-7ddb-e5b3-ae92-5c6b9a3f1430', '3.2');

-- --------------------------------------------------------

--
-- Table structure for table `general_sessions`
--

CREATE TABLE `general_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_sessions`
--

INSERT INTO `general_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('cc0203a01f1e0618cdc87151bf0c278c5b4605c1', '119.160.57.52', 1661574642, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636313537343634323b),
('6ca55fbfa3ecfaa64ccb38ac97d7adf5509f607e', '119.160.57.52', 1661574964, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636313537343634323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2231223b733a333a22696473223b733a33323a223261346235336339633037646263653735376565613661316131656666316437223b733a343a22636f6465223b733a323a22656e223b733a31323a22636f756e7472795f636f6465223b733a323a224742223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323032302d30342d33302031353a31363a3137223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `general_subscribers`
--

CREATE TABLE `general_subscribers` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_transaction_logs`
--

CREATE TABLE `general_transaction_logs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `transaction_id` text DEFAULT NULL,
  `txn_fee` double DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_users`
--

CREATE TABLE `general_users` (
  `id` int(11) NOT NULL,
  `ids` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `role` enum('admin','user','supporter') CHARACTER SET utf8mb4 DEFAULT 'user',
  `login_type` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `first_name` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `last_name` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'America/Chicago',
  `more_information` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `settings` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `desc` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `balance` decimal(15,4) DEFAULT 0.0000,
  `affiliate_bal_available` decimal(15,4) DEFAULT 0.0000,
  `affiliate_bal_transferred` decimal(15,4) DEFAULT 0.0000,
  `custom_rate` int(11) NOT NULL DEFAULT 0,
  `api_key` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `affiliate_id` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `referral_id` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `spent` varchar(225) CHARACTER SET utf8mb4 DEFAULT NULL,
  `activation_key` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `reset_key` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `history_ip` text CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_users`
--

INSERT INTO `general_users` (`id`, `ids`, `role`, `login_type`, `first_name`, `last_name`, `email`, `password`, `timezone`, `more_information`, `settings`, `desc`, `balance`, `affiliate_bal_available`, `affiliate_bal_transferred`, `custom_rate`, `api_key`, `affiliate_id`, `referral_id`, `spent`, `activation_key`, `reset_key`, `history_ip`, `status`, `changed`, `created`) VALUES
(7146, 'effee76738eb0408d1ba7f3f2f88c126', 'admin', NULL, 'admin', 'account', 'admin@admin.com', '$2a$08$dU3jbtFpLIqyQCrEMeQiYerOiw76SbQ4.VJGj/Ccq48W/n/C3ZtPS', 'Asia/Kolkata', NULL, '{\"limit_payments\":{\"paypal\":\"1\",\"stripe\":\"1\",\"paytm\":\"1\",\"paytmqr\":\"1\",\"razorpay\":\"1\"}}', '', '0.0000', '0.0000', '0.0000', 0, '442g4xyF6HIo7sL2X5N5HGHp7yb38aN6', '72017784', '', '435.1316', 'JVbE9vg0bJx1ziypExUeK0v3FUfG2VfV', 'ad754276a81947a11be87427e9d0746c', '119.160.57.52', 1, '2021-11-01 15:51:44', '2021-09-01 22:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `general_users_price`
--

CREATE TABLE `general_users_price` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_user_block_ip`
--

CREATE TABLE `general_user_block_ip` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_user_logs`
--

CREATE TABLE `general_user_logs` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `country` text DEFAULT NULL,
  `type` int(1) DEFAULT 1 COMMENT '1 - login, 0 - logout',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_user_logs`
--

INSERT INTO `general_user_logs` (`id`, `ids`, `uid`, `ip`, `country`, `type`, `created`) VALUES
(1, '58a19233ec08c37d001ce0886d47b480', 7146, '::1', 'Unknown', 1, '2021-09-30 11:12:42'),
(2, '1ebceec26cda6b92279bf202b61e3d4c', 7146, '::1', 'Unknown', 1, '2021-10-30 09:57:45'),
(3, '2b1da3b4609b3a0167b8dcb81c1c2268', 7146, '::1', 'Unknown', 0, '2021-10-30 11:31:40'),
(4, '3ce325063f47e914952a11613baa771c', 7146, '::1', 'Unknown', 1, '2021-10-30 11:33:29'),
(5, '4ba87d427779743f809257b630fcadc8', 7146, '::1', 'Unknown', 0, '2021-10-30 11:34:04'),
(6, '2c11eff4070a379a343c61bcdbb2d83e', 7146, '::1', 'Unknown', 1, '2021-11-01 15:04:42'),
(7, '38fccf605407e06ee50351ecc976fda3', 7146, '::1', 'Unknown', 0, '2021-11-01 16:01:59'),
(8, 'a564206c948e117c2174429231a4fc0c', 7146, '119.160.57.52', 'Pakistan', 1, '2022-08-27 10:01:00'),
(9, '38095df2940530aa1ad41c72430ebced', 7146, '119.160.57.52', 'Pakistan', 0, '2022-08-27 10:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `general_user_mail_logs`
--

CREATE TABLE `general_user_mail_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `received_uid` int(11) DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `ids` text CHARACTER SET utf8 DEFAULT NULL,
  `type` enum('direct','api') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'direct',
  `cate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_order_id` int(11) DEFAULT NULL,
  `service_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `api_provider_id` int(11) DEFAULT NULL,
  `api_service_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_order_id` int(11) DEFAULT 0,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usernames` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_posts` int(11) DEFAULT NULL,
  `sub_min` int(11) DEFAULT NULL,
  `sub_max` int(11) DEFAULT NULL,
  `sub_delay` int(11) DEFAULT NULL,
  `sub_expiry` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_response_orders` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_response_posts` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_status` enum('Active','Paused','Completed','Expired','Canceled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` decimal(15,4) DEFAULT NULL,
  `formal_charge` decimal(15,4) DEFAULT NULL,
  `profit` decimal(15,4) DEFAULT NULL,
  `status` enum('active','completed','processing','inprogress','pending','partial','canceled','refunded','awaiting','error','fail') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `start_counter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `remains` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_drip_feed` int(1) DEFAULT 0,
  `runs` int(11) DEFAULT 0,
  `interval` int(2) DEFAULT 0,
  `dripfeed_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `min` double NOT NULL,
  `max` double NOT NULL,
  `new_users` int(1) NOT NULL DEFAULT 0 COMMENT '1:Allowed, 0: Not Allowed',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 -> ON, 0 -> OFF',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `type`, `name`, `min`, `max`, `new_users`, `status`, `params`) VALUES
(13, 'paypal', 'Paypal Checkout', 10, 1000, 1, 1, '{\"type\":\"paypal\",\"name\":\"Paypal Checkout\",\"min\":\"10\",\"max\":\"1000\",\"new_users\":\"1\",\"status\":\"1\",\"take_fee_from_user\":\"1\",\"option\":{\"environment\":\"live\",\"client_id\":\"\",\"secret_key\":\"\"}}'),
(14, 'stripe', 'Stripe Checkout', 10, 10000, 1, 1, '{\"type\":\"stripe\",\"name\":\"Stripe Checkout\",\"min\":\"10\",\"max\":\"10000\",\"new_users\":\"1\",\"status\":\"1\",\"option\":{\"tnx_fee\":\"3\",\"environment\":\"live\",\"public_key\":\"\",\"secret_key\":\"\"}}'),
(129, 'paytm', 'Paytm CheckOut', 100, 10000, 1, 1, '{\"type\":\"paytm\",\"name\":\"Paytm CheckOut\",\"min\":\"100\",\"max\":\"10000\",\"new_users\":\"1\",\"status\":\"1\",\"option\":{\"tnx_fee\":\"3\",\"environment\":\"PROD\",\"paytm_mid\":\"\",\"merchant_key\":\"\",\"rate_to_usd\":\"1\"}}'),
(130, 'paytmqr', 'PaytmQR', 1, 100000, 1, 1, '{\"type\":\"paytmqr\",\"name\":\"PaytmQR\",\"min\":\"1\",\"max\":\"100000\",\"new_users\":\"1\",\"status\":\"1\",\"option\":{\"tnx_fee\":\"0\",\"environment\":\"PROD\",\"paytmqr_mid\":\"\",\"rate_to_usd\":\"76\"}}'),
(131, 'razorpay', 'Razorpay CheckOut', 10, 10000, 1, 1, '{\"type\":\"razorpay\",\"name\":\"Razorpay CheckOut\",\"min\":\"10\",\"max\":\"10000\",\"new_users\":\"1\",\"status\":\"1\",\"option\":{\"tnx_fee\":\"0\",\"environment\":\"TEST\",\"public_key\":\"\",\"secret_key\":\"\",\"rate_to_usd\":\"1\"}}'),
(132, 'coinbase', 'Coinbase', 1, 1000, 1, 1, '{\"type\":\"coinbase\",\"name\":\"Coinbase\",\"min\":\"1\",\"max\":\"1000\",\"new_users\":\"1\",\"status\":\"1\",\"option\":{\"tnx_fee\":\"0\",\"environment\":\"PROD\",\"api_key\":\"d5a1cea0-88a5-4d5a-9196-018f9825424e\",\"rate_to_usd\":\"0.014\"}}'),
(2258, 'perfectmoney', 'Perfect Money USD', 5, 100, 1, 1, '{\"type\":\"perfectmoney\",\"name\":\"Perfect Money USD\",\"min\":\"5\",\"max\":\"100\",\"new_users\":\"1\",\"status\":\"0\",\"option\":{\"tnx_fee\":\"0\",\"usd_wallet\":\"\",\"alternate_pass\":\"\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `payments_bonus`
--

CREATE TABLE `payments_bonus` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `bonus_from` double NOT NULL,
  `percentage` double NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments_bonus`
--

INSERT INTO `payments_bonus` (`id`, `ids`, `payment_id`, `bonus_from`, `percentage`, `status`) VALUES
(1, 'd042fcd0f982bfb5db500777afba3a77', 129, 0, 1, 1),
(2, '3787faac9c1b936f7bee8480ee591ff0', 130, 0, 1, 1),
(3, '312256b57f4fb7f0a9c895af6c106254', 13, 3000, 5, 0),
(4, 'cea4d35895192263b29eb5c3071dda66', 130, 3000, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `refills`
--

CREATE TABLE `refills` (
  `refill_id` int(11) NOT NULL,
  `refill_order_id` int(11) NOT NULL,
  `refill_api_provider_id` int(11) NOT NULL,
  `refill_api_order_id` int(21) NOT NULL,
  `refill_client_id` int(11) NOT NULL,
  `refill_service_id` int(11) NOT NULL,
  `refill_note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `refill_status` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `refill_updated` datetime NOT NULL,
  `refill_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price` decimal(15,4) DEFAULT NULL,
  `original_price` decimal(15,4) DEFAULT NULL,
  `min` int(50) DEFAULT NULL,
  `max` int(50) DEFAULT NULL,
  `refill` int(1) NOT NULL DEFAULT 0,
  `add_type` enum('manual','api') DEFAULT 'manual',
  `type` varchar(100) DEFAULT 'default',
  `api_service_id` varchar(200) DEFAULT NULL,
  `api_provider_id` int(11) DEFAULT NULL,
  `dripfeed` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','pending','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `user_read` double NOT NULL DEFAULT 0,
  `admin_read` double NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_providers`
--
ALTER TABLE `api_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childpanels`
--
ALTER TABLE `childpanels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_custom_page`
--
ALTER TABLE `general_custom_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_file_manager`
--
ALTER TABLE `general_file_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_lang`
--
ALTER TABLE `general_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_lang_list`
--
ALTER TABLE `general_lang_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_news`
--
ALTER TABLE `general_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `general_options`
--
ALTER TABLE `general_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_purchase`
--
ALTER TABLE `general_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_sessions`
--
ALTER TABLE `general_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `general_subscribers`
--
ALTER TABLE `general_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_transaction_logs`
--
ALTER TABLE `general_transaction_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_users`
--
ALTER TABLE `general_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_users_price`
--
ALTER TABLE `general_users_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_user_block_ip`
--
ALTER TABLE `general_user_block_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_user_logs`
--
ALTER TABLE `general_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_user_mail_logs`
--
ALTER TABLE `general_user_mail_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_bonus`
--
ALTER TABLE `payments_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refills`
--
ALTER TABLE `refills`
  ADD PRIMARY KEY (`refill_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_messages_user_id_foreign` (`uid`),
  ADD KEY `ticket_messages_ticket_id_foreign` (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_providers`
--
ALTER TABLE `api_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `childpanels`
--
ALTER TABLE `childpanels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `general_custom_page`
--
ALTER TABLE `general_custom_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_file_manager`
--
ALTER TABLE `general_file_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `general_lang`
--
ALTER TABLE `general_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_lang_list`
--
ALTER TABLE `general_lang_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_news`
--
ALTER TABLE `general_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_options`
--
ALTER TABLE `general_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `general_purchase`
--
ALTER TABLE `general_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_subscribers`
--
ALTER TABLE `general_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_transaction_logs`
--
ALTER TABLE `general_transaction_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_users`
--
ALTER TABLE `general_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7236;

--
-- AUTO_INCREMENT for table `general_users_price`
--
ALTER TABLE `general_users_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_user_block_ip`
--
ALTER TABLE `general_user_block_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_user_logs`
--
ALTER TABLE `general_user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `general_user_mail_logs`
--
ALTER TABLE `general_user_mail_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_bonus`
--
ALTER TABLE `payments_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refills`
--
ALTER TABLE `refills`
  MODIFY `refill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
