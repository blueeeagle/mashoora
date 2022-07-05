-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 28, 2022 at 09:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultation`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 'App\\Models\\User', 'created', 1, NULL, NULL, '{\"attributes\":{\"id\":1,\"first_name\":\"Adella\",\"last_name\":\"Kuhic\",\"email\":\"demo@demo.com\",\"email_verified_at\":\"2022-05-31T05:02:47.000000Z\",\"password\":\"$2y$10$.Fg1QOaL1qrYdxnNBfa\\/fe7sXhLMLm2n3pjf5Uyd\\/jHaEjOVHgsq.\",\"api_token\":null,\"remember_token\":null,\"created_at\":\"2022-05-31T05:02:47.000000Z\",\"updated_at\":\"2022-05-31T05:02:47.000000Z\"}}', NULL, '2022-05-30 23:32:47', '2022-05-30 23:32:47'),
(2, 'default', 'created', 'App\\Models\\UserInfo', 'created', 1, NULL, NULL, '{\"attributes\":{\"id\":1,\"user_id\":1,\"avatar\":null,\"company\":\"Tillman-Goyette\",\"phone\":\"678.509.7129\",\"website\":\"https:\\/\\/www.mcclure.com\\/dolore-veniam-expedita-facilis-eligendi-sed\",\"country\":\"BD\",\"language\":\"et\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:47.000000Z\",\"updated_at\":\"2022-05-31T05:02:47.000000Z\"}}', NULL, '2022-05-30 23:32:47', '2022-05-30 23:32:47'),
(3, 'default', 'created', 'App\\Models\\User', 'created', 2, NULL, NULL, '{\"attributes\":{\"id\":2,\"first_name\":\"Tiffany\",\"last_name\":\"Simonis\",\"email\":\"admin@demo.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$3J6uZJ69IpQLXUkrgkxzZe2k.WCnEbTq8lJ1z4v4fzCJ3nd0my2aC\",\"api_token\":null,\"remember_token\":null,\"created_at\":\"2022-05-31T05:02:48.000000Z\",\"updated_at\":\"2022-05-31T05:02:48.000000Z\"}}', NULL, '2022-05-30 23:32:48', '2022-05-30 23:32:48'),
(4, 'default', 'created', 'App\\Models\\UserInfo', 'created', 2, NULL, NULL, '{\"attributes\":{\"id\":2,\"user_id\":2,\"avatar\":null,\"company\":\"Greenholt, Homenick and Stanton\",\"phone\":\"+16014307348\",\"website\":\"http:\\/\\/www.cassin.biz\\/\",\"country\":\"VE\",\"language\":\"bi\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:48.000000Z\",\"updated_at\":\"2022-05-31T05:02:48.000000Z\"}}', NULL, '2022-05-30 23:32:48', '2022-05-30 23:32:48'),
(5, 'default', 'created', 'App\\Models\\User', 'created', 3, NULL, NULL, '{\"attributes\":{\"id\":3,\"first_name\":\"Myra\",\"last_name\":\"Bartell\",\"email\":\"violet80@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"vNWhhi9WL1\",\"created_at\":\"2022-05-31T05:02:48.000000Z\",\"updated_at\":\"2022-05-31T05:02:48.000000Z\"}}', NULL, '2022-05-30 23:32:48', '2022-05-30 23:32:48'),
(6, 'default', 'created', 'App\\Models\\User', 'created', 4, NULL, NULL, '{\"attributes\":{\"id\":4,\"first_name\":\"Doug\",\"last_name\":\"Baumbach\",\"email\":\"soledad.beahan@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"hdaQTYhBq1\",\"created_at\":\"2022-05-31T05:02:48.000000Z\",\"updated_at\":\"2022-05-31T05:02:48.000000Z\"}}', NULL, '2022-05-30 23:32:48', '2022-05-30 23:32:48'),
(7, 'default', 'created', 'App\\Models\\User', 'created', 5, NULL, NULL, '{\"attributes\":{\"id\":5,\"first_name\":\"Mayra\",\"last_name\":\"Prosacco\",\"email\":\"bhoeger@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"gsK7kk9bSR\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(8, 'default', 'created', 'App\\Models\\User', 'created', 6, NULL, NULL, '{\"attributes\":{\"id\":6,\"first_name\":\"Eino\",\"last_name\":\"Konopelski\",\"email\":\"cornell24@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"d27KK3w7Go\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(9, 'default', 'created', 'App\\Models\\User', 'created', 7, NULL, NULL, '{\"attributes\":{\"id\":7,\"first_name\":\"Lucio\",\"last_name\":\"Gorczany\",\"email\":\"will45@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"JDwwl3hrn9\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(10, 'default', 'created', 'App\\Models\\User', 'created', 8, NULL, NULL, '{\"attributes\":{\"id\":8,\"first_name\":\"Dusty\",\"last_name\":\"Wilkinson\",\"email\":\"blair.lockman@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"QM9lRec1xR\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(11, 'default', 'created', 'App\\Models\\User', 'created', 9, NULL, NULL, '{\"attributes\":{\"id\":9,\"first_name\":\"Cornell\",\"last_name\":\"Muller\",\"email\":\"dkassulke@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"Wrp2RXyGRH\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(12, 'default', 'created', 'App\\Models\\User', 'created', 10, NULL, NULL, '{\"attributes\":{\"id\":10,\"first_name\":\"Dave\",\"last_name\":\"Keeling\",\"email\":\"elouise.stroman@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"7luZ4AsKBL\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(13, 'default', 'created', 'App\\Models\\User', 'created', 11, NULL, NULL, '{\"attributes\":{\"id\":11,\"first_name\":\"Ronny\",\"last_name\":\"Marks\",\"email\":\"spencer.meredith@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"mJe2aSxJRn\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(14, 'default', 'created', 'App\\Models\\User', 'created', 12, NULL, NULL, '{\"attributes\":{\"id\":12,\"first_name\":\"Ella\",\"last_name\":\"Heathcote\",\"email\":\"brekke.moses@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"39B7HtOOUi\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(15, 'default', 'created', 'App\\Models\\User', 'created', 13, NULL, NULL, '{\"attributes\":{\"id\":13,\"first_name\":\"Luther\",\"last_name\":\"Wiegand\",\"email\":\"cathryn.bailey@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"lVpCVPh29T\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(16, 'default', 'created', 'App\\Models\\User', 'created', 14, NULL, NULL, '{\"attributes\":{\"id\":14,\"first_name\":\"Troy\",\"last_name\":\"Bednar\",\"email\":\"katharina.powlowski@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"DMCzkkosJ6\",\"created_at\":\"2022-05-31T05:02:49.000000Z\",\"updated_at\":\"2022-05-31T05:02:49.000000Z\"}}', NULL, '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(17, 'default', 'created', 'App\\Models\\User', 'created', 15, NULL, NULL, '{\"attributes\":{\"id\":15,\"first_name\":\"Anais\",\"last_name\":\"Tromp\",\"email\":\"gleichner.burdette@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"xDv5wEY36u\",\"created_at\":\"2022-05-31T05:02:50.000000Z\",\"updated_at\":\"2022-05-31T05:02:50.000000Z\"}}', NULL, '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(18, 'default', 'created', 'App\\Models\\User', 'created', 16, NULL, NULL, '{\"attributes\":{\"id\":16,\"first_name\":\"Veronica\",\"last_name\":\"Lindgren\",\"email\":\"nkohler@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"7ECxdgodck\",\"created_at\":\"2022-05-31T05:02:50.000000Z\",\"updated_at\":\"2022-05-31T05:02:50.000000Z\"}}', NULL, '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(19, 'default', 'created', 'App\\Models\\User', 'created', 17, NULL, NULL, '{\"attributes\":{\"id\":17,\"first_name\":\"Darrion\",\"last_name\":\"Schmidt\",\"email\":\"dale.mayer@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"GQrBzPPwWQ\",\"created_at\":\"2022-05-31T05:02:50.000000Z\",\"updated_at\":\"2022-05-31T05:02:50.000000Z\"}}', NULL, '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(20, 'default', 'created', 'App\\Models\\User', 'created', 18, NULL, NULL, '{\"attributes\":{\"id\":18,\"first_name\":\"Rowan\",\"last_name\":\"Keebler\",\"email\":\"torphy.melody@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"tG8Qi4Dr6U\",\"created_at\":\"2022-05-31T05:02:50.000000Z\",\"updated_at\":\"2022-05-31T05:02:50.000000Z\"}}', NULL, '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(21, 'default', 'created', 'App\\Models\\User', 'created', 19, NULL, NULL, '{\"attributes\":{\"id\":19,\"first_name\":\"Adrain\",\"last_name\":\"Schaden\",\"email\":\"orlo.wehner@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"wu21x6wjV7\",\"created_at\":\"2022-05-31T05:02:50.000000Z\",\"updated_at\":\"2022-05-31T05:02:50.000000Z\"}}', NULL, '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(22, 'default', 'created', 'App\\Models\\User', 'created', 20, NULL, NULL, '{\"attributes\":{\"id\":20,\"first_name\":\"Cali\",\"last_name\":\"Kuhic\",\"email\":\"tomas72@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"vCcRJkKdnT\",\"created_at\":\"2022-05-31T05:02:51.000000Z\",\"updated_at\":\"2022-05-31T05:02:51.000000Z\"}}', NULL, '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(23, 'default', 'created', 'App\\Models\\User', 'created', 21, NULL, NULL, '{\"attributes\":{\"id\":21,\"first_name\":\"Bessie\",\"last_name\":\"Thiel\",\"email\":\"rbarrows@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"PUQ7V0FW3A\",\"created_at\":\"2022-05-31T05:02:51.000000Z\",\"updated_at\":\"2022-05-31T05:02:51.000000Z\"}}', NULL, '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(24, 'default', 'created', 'App\\Models\\User', 'created', 22, NULL, NULL, '{\"attributes\":{\"id\":22,\"first_name\":\"Freeda\",\"last_name\":\"Reilly\",\"email\":\"whayes@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"LUzoh1mpUF\",\"created_at\":\"2022-05-31T05:02:51.000000Z\",\"updated_at\":\"2022-05-31T05:02:51.000000Z\"}}', NULL, '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(25, 'default', 'created', 'App\\Models\\User', 'created', 23, NULL, NULL, '{\"attributes\":{\"id\":23,\"first_name\":\"Peyton\",\"last_name\":\"Eichmann\",\"email\":\"bins.aleen@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"r3vnZt0fru\",\"created_at\":\"2022-05-31T05:02:51.000000Z\",\"updated_at\":\"2022-05-31T05:02:51.000000Z\"}}', NULL, '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(26, 'default', 'created', 'App\\Models\\User', 'created', 24, NULL, NULL, '{\"attributes\":{\"id\":24,\"first_name\":\"Eric\",\"last_name\":\"Hand\",\"email\":\"greg90@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"w9N0ptoGkQ\",\"created_at\":\"2022-05-31T05:02:51.000000Z\",\"updated_at\":\"2022-05-31T05:02:51.000000Z\"}}', NULL, '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(27, 'default', 'created', 'App\\Models\\User', 'created', 25, NULL, NULL, '{\"attributes\":{\"id\":25,\"first_name\":\"Vicenta\",\"last_name\":\"Cummings\",\"email\":\"noble15@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"47n2U4BBL1\",\"created_at\":\"2022-05-31T05:02:51.000000Z\",\"updated_at\":\"2022-05-31T05:02:51.000000Z\"}}', NULL, '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(28, 'default', 'created', 'App\\Models\\User', 'created', 26, NULL, NULL, '{\"attributes\":{\"id\":26,\"first_name\":\"Shayna\",\"last_name\":\"Wisozk\",\"email\":\"qortiz@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"JqpfuccwjZ\",\"created_at\":\"2022-05-31T05:02:51.000000Z\",\"updated_at\":\"2022-05-31T05:02:51.000000Z\"}}', NULL, '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(29, 'default', 'created', 'App\\Models\\User', 'created', 27, NULL, NULL, '{\"attributes\":{\"id\":27,\"first_name\":\"Luther\",\"last_name\":\"Schaefer\",\"email\":\"ernestine58@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"Xj1VOHnZpv\",\"created_at\":\"2022-05-31T05:02:51.000000Z\",\"updated_at\":\"2022-05-31T05:02:51.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(30, 'default', 'created', 'App\\Models\\User', 'created', 28, NULL, NULL, '{\"attributes\":{\"id\":28,\"first_name\":\"Lucienne\",\"last_name\":\"Kiehn\",\"email\":\"npouros@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"qZdP4mzi6L\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(31, 'default', 'created', 'App\\Models\\User', 'created', 29, NULL, NULL, '{\"attributes\":{\"id\":29,\"first_name\":\"Justina\",\"last_name\":\"Kilback\",\"email\":\"prohaska.toney@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"hMqJwdMULA\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(32, 'default', 'created', 'App\\Models\\User', 'created', 30, NULL, NULL, '{\"attributes\":{\"id\":30,\"first_name\":\"Lina\",\"last_name\":\"Daniel\",\"email\":\"nadia.kunde@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"wofsNwNTER\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(33, 'default', 'created', 'App\\Models\\User', 'created', 31, NULL, NULL, '{\"attributes\":{\"id\":31,\"first_name\":\"Eugenia\",\"last_name\":\"Miller\",\"email\":\"von.evalyn@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"siz8q3o9Ih\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(34, 'default', 'created', 'App\\Models\\User', 'created', 32, NULL, NULL, '{\"attributes\":{\"id\":32,\"first_name\":\"Wilfredo\",\"last_name\":\"Harvey\",\"email\":\"feil.molly@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"HCUrzRBIMh\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(35, 'default', 'created', 'App\\Models\\User', 'created', 33, NULL, NULL, '{\"attributes\":{\"id\":33,\"first_name\":\"Vern\",\"last_name\":\"Oberbrunner\",\"email\":\"domenico35@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"Ju0t2tu3pQ\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(36, 'default', 'created', 'App\\Models\\User', 'created', 34, NULL, NULL, '{\"attributes\":{\"id\":34,\"first_name\":\"Willy\",\"last_name\":\"Feil\",\"email\":\"luna.gutmann@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"VJKQowc12Q\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(37, 'default', 'created', 'App\\Models\\User', 'created', 35, NULL, NULL, '{\"attributes\":{\"id\":35,\"first_name\":\"Leanne\",\"last_name\":\"Franecki\",\"email\":\"angelica.thiel@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"Yp8VL4f5DX\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(38, 'default', 'created', 'App\\Models\\User', 'created', 36, NULL, NULL, '{\"attributes\":{\"id\":36,\"first_name\":\"Johathan\",\"last_name\":\"Ward\",\"email\":\"rosella.schmidt@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"islaRktdZC\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(39, 'default', 'created', 'App\\Models\\User', 'created', 37, NULL, NULL, '{\"attributes\":{\"id\":37,\"first_name\":\"Sienna\",\"last_name\":\"Brown\",\"email\":\"strosin.loyal@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"cI8RwnBeTk\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(40, 'default', 'created', 'App\\Models\\User', 'created', 38, NULL, NULL, '{\"attributes\":{\"id\":38,\"first_name\":\"Audrey\",\"last_name\":\"Bechtelar\",\"email\":\"kschmeler@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"eYqx0vNqIt\",\"created_at\":\"2022-05-31T05:02:52.000000Z\",\"updated_at\":\"2022-05-31T05:02:52.000000Z\"}}', NULL, '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(41, 'default', 'created', 'App\\Models\\User', 'created', 39, NULL, NULL, '{\"attributes\":{\"id\":39,\"first_name\":\"Maxine\",\"last_name\":\"Reichert\",\"email\":\"olaf.jones@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"9hN2UfnIjk\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(42, 'default', 'created', 'App\\Models\\User', 'created', 40, NULL, NULL, '{\"attributes\":{\"id\":40,\"first_name\":\"Martina\",\"last_name\":\"Kihn\",\"email\":\"stefanie41@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"3bO2PPSgKM\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(43, 'default', 'created', 'App\\Models\\User', 'created', 41, NULL, NULL, '{\"attributes\":{\"id\":41,\"first_name\":\"Caterina\",\"last_name\":\"Emmerich\",\"email\":\"hickle.marley@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"RqFtS5DYuj\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(44, 'default', 'created', 'App\\Models\\User', 'created', 42, NULL, NULL, '{\"attributes\":{\"id\":42,\"first_name\":\"Fletcher\",\"last_name\":\"Conn\",\"email\":\"breitenberg.verlie@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"CeBuKHXpqH\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(45, 'default', 'created', 'App\\Models\\User', 'created', 43, NULL, NULL, '{\"attributes\":{\"id\":43,\"first_name\":\"Julien\",\"last_name\":\"Pouros\",\"email\":\"bechtelar.noel@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"ETEzcQtscJ\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(46, 'default', 'created', 'App\\Models\\User', 'created', 44, NULL, NULL, '{\"attributes\":{\"id\":44,\"first_name\":\"Sabrina\",\"last_name\":\"Rowe\",\"email\":\"pascale61@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"wDGCAv6is9\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(47, 'default', 'created', 'App\\Models\\User', 'created', 45, NULL, NULL, '{\"attributes\":{\"id\":45,\"first_name\":\"Edna\",\"last_name\":\"Kuphal\",\"email\":\"cecil61@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"aBPIBCJQZK\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(48, 'default', 'created', 'App\\Models\\User', 'created', 46, NULL, NULL, '{\"attributes\":{\"id\":46,\"first_name\":\"Shania\",\"last_name\":\"Gorczany\",\"email\":\"tiana.rath@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"faiIJfeqpf\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(49, 'default', 'created', 'App\\Models\\User', 'created', 47, NULL, NULL, '{\"attributes\":{\"id\":47,\"first_name\":\"Nolan\",\"last_name\":\"Huel\",\"email\":\"littel.lenna@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"B4P43TV9aa\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(50, 'default', 'created', 'App\\Models\\User', 'created', 48, NULL, NULL, '{\"attributes\":{\"id\":48,\"first_name\":\"Savannah\",\"last_name\":\"Carter\",\"email\":\"brycen.rath@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"2hKsp9qBnb\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(51, 'default', 'created', 'App\\Models\\User', 'created', 49, NULL, NULL, '{\"attributes\":{\"id\":49,\"first_name\":\"Gennaro\",\"last_name\":\"Thiel\",\"email\":\"emely38@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"xNK46wLQU6\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(52, 'default', 'created', 'App\\Models\\User', 'created', 50, NULL, NULL, '{\"attributes\":{\"id\":50,\"first_name\":\"Emmalee\",\"last_name\":\"Hettinger\",\"email\":\"gusikowski.beverly@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"lMWYcUju9b\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(53, 'default', 'created', 'App\\Models\\User', 'created', 51, NULL, NULL, '{\"attributes\":{\"id\":51,\"first_name\":\"Josue\",\"last_name\":\"Monahan\",\"email\":\"heller.concepcion@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"woQzsvoKk8\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(54, 'default', 'created', 'App\\Models\\User', 'created', 52, NULL, NULL, '{\"attributes\":{\"id\":52,\"first_name\":\"Cleora\",\"last_name\":\"Hagenes\",\"email\":\"eve87@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"Qe8tyTItfI\",\"created_at\":\"2022-05-31T05:02:53.000000Z\",\"updated_at\":\"2022-05-31T05:02:53.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(55, 'default', 'created', 'App\\Models\\User', 'created', 53, NULL, NULL, '{\"attributes\":{\"id\":53,\"first_name\":\"Lilliana\",\"last_name\":\"Towne\",\"email\":\"darion75@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"wGM7TbQry6\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(56, 'default', 'created', 'App\\Models\\User', 'created', 54, NULL, NULL, '{\"attributes\":{\"id\":54,\"first_name\":\"Kristy\",\"last_name\":\"Bradtke\",\"email\":\"dbuckridge@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"IGB9DeXOqm\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(57, 'default', 'created', 'App\\Models\\User', 'created', 55, NULL, NULL, '{\"attributes\":{\"id\":55,\"first_name\":\"Jimmy\",\"last_name\":\"Fisher\",\"email\":\"bkemmer@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"eLSMZ1EZMz\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(58, 'default', 'created', 'App\\Models\\User', 'created', 56, NULL, NULL, '{\"attributes\":{\"id\":56,\"first_name\":\"Chelsey\",\"last_name\":\"Simonis\",\"email\":\"prodriguez@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"2lIGcuSIDa\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(59, 'default', 'created', 'App\\Models\\User', 'created', 57, NULL, NULL, '{\"attributes\":{\"id\":57,\"first_name\":\"Toby\",\"last_name\":\"Funk\",\"email\":\"bashirian.micheal@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"sNdABEIvNC\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(60, 'default', 'created', 'App\\Models\\User', 'created', 58, NULL, NULL, '{\"attributes\":{\"id\":58,\"first_name\":\"Kian\",\"last_name\":\"Volkman\",\"email\":\"oromaguera@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"5X6pOK7bgF\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(61, 'default', 'created', 'App\\Models\\User', 'created', 59, NULL, NULL, '{\"attributes\":{\"id\":59,\"first_name\":\"Beverly\",\"last_name\":\"Macejkovic\",\"email\":\"regan.steuber@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"aWc9OtTa0N\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(62, 'default', 'created', 'App\\Models\\User', 'created', 60, NULL, NULL, '{\"attributes\":{\"id\":60,\"first_name\":\"Asa\",\"last_name\":\"Conroy\",\"email\":\"gbotsford@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"0PbiLse3vG\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(63, 'default', 'created', 'App\\Models\\User', 'created', 61, NULL, NULL, '{\"attributes\":{\"id\":61,\"first_name\":\"Kaitlin\",\"last_name\":\"Schmidt\",\"email\":\"alta.reinger@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"zL3hp7Bhhw\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(64, 'default', 'created', 'App\\Models\\User', 'created', 62, NULL, NULL, '{\"attributes\":{\"id\":62,\"first_name\":\"Candelario\",\"last_name\":\"Mayert\",\"email\":\"inikolaus@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"chfQnNoL5Z\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(65, 'default', 'created', 'App\\Models\\User', 'created', 63, NULL, NULL, '{\"attributes\":{\"id\":63,\"first_name\":\"Daija\",\"last_name\":\"Kirlin\",\"email\":\"pagac.bruce@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"Ft2b6bXNEl\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(66, 'default', 'created', 'App\\Models\\User', 'created', 64, NULL, NULL, '{\"attributes\":{\"id\":64,\"first_name\":\"Modesta\",\"last_name\":\"Kuphal\",\"email\":\"aubree.rutherford@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"FqS0EP7FsA\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(67, 'default', 'created', 'App\\Models\\User', 'created', 65, NULL, NULL, '{\"attributes\":{\"id\":65,\"first_name\":\"Kristy\",\"last_name\":\"Dietrich\",\"email\":\"oconner.fidel@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"PfF6njgGrb\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(68, 'default', 'created', 'App\\Models\\User', 'created', 66, NULL, NULL, '{\"attributes\":{\"id\":66,\"first_name\":\"Alaina\",\"last_name\":\"Russel\",\"email\":\"remington.gulgowski@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"0DrBZgw1y3\",\"created_at\":\"2022-05-31T05:02:54.000000Z\",\"updated_at\":\"2022-05-31T05:02:54.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(69, 'default', 'created', 'App\\Models\\User', 'created', 67, NULL, NULL, '{\"attributes\":{\"id\":67,\"first_name\":\"Esmeralda\",\"last_name\":\"Rath\",\"email\":\"jkemmer@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"ebJBiUqyBI\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(70, 'default', 'created', 'App\\Models\\User', 'created', 68, NULL, NULL, '{\"attributes\":{\"id\":68,\"first_name\":\"Deja\",\"last_name\":\"Bernier\",\"email\":\"zemlak.madilyn@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"iUyWeWyIG0\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(71, 'default', 'created', 'App\\Models\\User', 'created', 69, NULL, NULL, '{\"attributes\":{\"id\":69,\"first_name\":\"Alycia\",\"last_name\":\"Ratke\",\"email\":\"monte.stamm@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"x0OTyrDU2l\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(72, 'default', 'created', 'App\\Models\\User', 'created', 70, NULL, NULL, '{\"attributes\":{\"id\":70,\"first_name\":\"Lupe\",\"last_name\":\"Olson\",\"email\":\"berge.grover@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"hcrpVidKPL\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(73, 'default', 'created', 'App\\Models\\User', 'created', 71, NULL, NULL, '{\"attributes\":{\"id\":71,\"first_name\":\"Amya\",\"last_name\":\"Barrows\",\"email\":\"ckautzer@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"otUZYqdt2r\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(74, 'default', 'created', 'App\\Models\\User', 'created', 72, NULL, NULL, '{\"attributes\":{\"id\":72,\"first_name\":\"Evie\",\"last_name\":\"Smitham\",\"email\":\"olin.conn@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"DRnjRGv3kT\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(75, 'default', 'created', 'App\\Models\\User', 'created', 73, NULL, NULL, '{\"attributes\":{\"id\":73,\"first_name\":\"Lonny\",\"last_name\":\"Wunsch\",\"email\":\"rmacejkovic@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"Q8mk1URpLx\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(76, 'default', 'created', 'App\\Models\\User', 'created', 74, NULL, NULL, '{\"attributes\":{\"id\":74,\"first_name\":\"Sheridan\",\"last_name\":\"Botsford\",\"email\":\"mertz.kristian@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"v1edHyq4hU\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(77, 'default', 'created', 'App\\Models\\User', 'created', 75, NULL, NULL, '{\"attributes\":{\"id\":75,\"first_name\":\"Nola\",\"last_name\":\"Ferry\",\"email\":\"rogahn.ladarius@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"hjoS5xtHBz\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(78, 'default', 'created', 'App\\Models\\User', 'created', 76, NULL, NULL, '{\"attributes\":{\"id\":76,\"first_name\":\"Alford\",\"last_name\":\"Boyle\",\"email\":\"slemke@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"789io6ItBb\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(79, 'default', 'created', 'App\\Models\\User', 'created', 77, NULL, NULL, '{\"attributes\":{\"id\":77,\"first_name\":\"Malvina\",\"last_name\":\"Cole\",\"email\":\"ohills@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"H7eXzxJvYx\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(80, 'default', 'created', 'App\\Models\\User', 'created', 78, NULL, NULL, '{\"attributes\":{\"id\":78,\"first_name\":\"Tianna\",\"last_name\":\"Doyle\",\"email\":\"savion.hackett@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"L2WPrQrhih\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(81, 'default', 'created', 'App\\Models\\User', 'created', 79, NULL, NULL, '{\"attributes\":{\"id\":79,\"first_name\":\"Alvera\",\"last_name\":\"Fay\",\"email\":\"israel09@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"szrNXMIIp0\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(82, 'default', 'created', 'App\\Models\\User', 'created', 80, NULL, NULL, '{\"attributes\":{\"id\":80,\"first_name\":\"Rosendo\",\"last_name\":\"Ankunding\",\"email\":\"delphia13@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"xr4K7jdlj6\",\"created_at\":\"2022-05-31T05:02:55.000000Z\",\"updated_at\":\"2022-05-31T05:02:55.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(83, 'default', 'created', 'App\\Models\\User', 'created', 81, NULL, NULL, '{\"attributes\":{\"id\":81,\"first_name\":\"Friedrich\",\"last_name\":\"Olson\",\"email\":\"block.jesus@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"xDZeSFJhy0\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(84, 'default', 'created', 'App\\Models\\User', 'created', 82, NULL, NULL, '{\"attributes\":{\"id\":82,\"first_name\":\"Carrie\",\"last_name\":\"Purdy\",\"email\":\"ben60@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"i4RaiSaDi6\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(85, 'default', 'created', 'App\\Models\\User', 'created', 83, NULL, NULL, '{\"attributes\":{\"id\":83,\"first_name\":\"Haleigh\",\"last_name\":\"Jacobs\",\"email\":\"mark.schimmel@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"8NPRsNPP0R\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(86, 'default', 'created', 'App\\Models\\User', 'created', 84, NULL, NULL, '{\"attributes\":{\"id\":84,\"first_name\":\"Eugenia\",\"last_name\":\"Armstrong\",\"email\":\"royce07@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"jQDBx1AgF8\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(87, 'default', 'created', 'App\\Models\\User', 'created', 85, NULL, NULL, '{\"attributes\":{\"id\":85,\"first_name\":\"Chad\",\"last_name\":\"Kuvalis\",\"email\":\"jbailey@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"8RG3TaCNBD\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(88, 'default', 'created', 'App\\Models\\User', 'created', 86, NULL, NULL, '{\"attributes\":{\"id\":86,\"first_name\":\"Rhiannon\",\"last_name\":\"Rolfson\",\"email\":\"sauer.itzel@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"uS7xM19Dpr\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(89, 'default', 'created', 'App\\Models\\User', 'created', 87, NULL, NULL, '{\"attributes\":{\"id\":87,\"first_name\":\"Norma\",\"last_name\":\"Howell\",\"email\":\"alejandra.frami@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"RE5yaLNvow\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(90, 'default', 'created', 'App\\Models\\User', 'created', 88, NULL, NULL, '{\"attributes\":{\"id\":88,\"first_name\":\"Angelina\",\"last_name\":\"Nolan\",\"email\":\"klein.dax@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"uLhZuOeooI\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(91, 'default', 'created', 'App\\Models\\User', 'created', 89, NULL, NULL, '{\"attributes\":{\"id\":89,\"first_name\":\"Faustino\",\"last_name\":\"Leffler\",\"email\":\"nader.joshuah@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"4wwfY8EXnN\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(92, 'default', 'created', 'App\\Models\\User', 'created', 90, NULL, NULL, '{\"attributes\":{\"id\":90,\"first_name\":\"Electa\",\"last_name\":\"Langosh\",\"email\":\"giovanni.heidenreich@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"53YuTABkC6\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(93, 'default', 'created', 'App\\Models\\User', 'created', 91, NULL, NULL, '{\"attributes\":{\"id\":91,\"first_name\":\"Vilma\",\"last_name\":\"Ledner\",\"email\":\"branson.schuster@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"ZUs6tU1vV2\",\"created_at\":\"2022-05-31T05:02:56.000000Z\",\"updated_at\":\"2022-05-31T05:02:56.000000Z\"}}', NULL, '2022-05-30 23:32:56', '2022-05-30 23:32:56');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(94, 'default', 'created', 'App\\Models\\User', 'created', 92, NULL, NULL, '{\"attributes\":{\"id\":92,\"first_name\":\"Tia\",\"last_name\":\"Paucek\",\"email\":\"rosalyn.reinger@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"lJEdrwZFhl\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(95, 'default', 'created', 'App\\Models\\User', 'created', 93, NULL, NULL, '{\"attributes\":{\"id\":93,\"first_name\":\"Benjamin\",\"last_name\":\"Rath\",\"email\":\"orrin06@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"aBL9ZzpNnk\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(96, 'default', 'created', 'App\\Models\\User', 'created', 94, NULL, NULL, '{\"attributes\":{\"id\":94,\"first_name\":\"Kareem\",\"last_name\":\"Wyman\",\"email\":\"qbeatty@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"5MbycG5FA2\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(97, 'default', 'created', 'App\\Models\\User', 'created', 95, NULL, NULL, '{\"attributes\":{\"id\":95,\"first_name\":\"Lois\",\"last_name\":\"Walker\",\"email\":\"jeramie.champlin@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"KTh1BgXg14\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(98, 'default', 'created', 'App\\Models\\User', 'created', 96, NULL, NULL, '{\"attributes\":{\"id\":96,\"first_name\":\"Helen\",\"last_name\":\"Prohaska\",\"email\":\"rozella63@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"bpQEj2aAoe\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(99, 'default', 'created', 'App\\Models\\User', 'created', 97, NULL, NULL, '{\"attributes\":{\"id\":97,\"first_name\":\"Waino\",\"last_name\":\"Kirlin\",\"email\":\"graham.khalil@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"fK75SQXv0c\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(100, 'default', 'created', 'App\\Models\\User', 'created', 98, NULL, NULL, '{\"attributes\":{\"id\":98,\"first_name\":\"Christa\",\"last_name\":\"Schowalter\",\"email\":\"mbechtelar@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"lUP4Ymoxa1\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(101, 'default', 'created', 'App\\Models\\User', 'created', 99, NULL, NULL, '{\"attributes\":{\"id\":99,\"first_name\":\"Alba\",\"last_name\":\"Witting\",\"email\":\"itzel.nitzsche@example.net\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"EeeGL20feL\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(102, 'default', 'created', 'App\\Models\\User', 'created', 100, NULL, NULL, '{\"attributes\":{\"id\":100,\"first_name\":\"Abdullah\",\"last_name\":\"Stamm\",\"email\":\"rogahn.jaylan@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"oRC8ryvikw\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(103, 'default', 'created', 'App\\Models\\User', 'created', 101, NULL, NULL, '{\"attributes\":{\"id\":101,\"first_name\":\"Owen\",\"last_name\":\"Fahey\",\"email\":\"cartwright.tanya@example.org\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"b9s81agotA\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(104, 'default', 'created', 'App\\Models\\User', 'created', 102, NULL, NULL, '{\"attributes\":{\"id\":102,\"first_name\":\"Bradly\",\"last_name\":\"Durgan\",\"email\":\"green.elsa@example.com\",\"email_verified_at\":\"2022-05-31T05:02:48.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"api_token\":null,\"remember_token\":\"wHdpOfSuhq\",\"created_at\":\"2022-05-31T05:02:57.000000Z\",\"updated_at\":\"2022-05-31T05:02:57.000000Z\"}}', NULL, '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(105, 'default', 'created', 'App\\Models\\UserInfo', 'created', 3, NULL, NULL, '{\"attributes\":{\"id\":3,\"user_id\":3,\"avatar\":null,\"company\":\"Kuhlman, O\'Conner and Denesik\",\"phone\":\"281.781.3767\",\"website\":\"http:\\/\\/www.schinner.org\\/nostrum-ab-non-soluta-dolores-eligendi-qui-qui\",\"country\":\"SE\",\"language\":\"ie\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(106, 'default', 'created', 'App\\Models\\UserInfo', 'created', 4, NULL, NULL, '{\"attributes\":{\"id\":4,\"user_id\":4,\"avatar\":null,\"company\":\"McCullough and Sons\",\"phone\":\"337.970.9268\",\"website\":\"http:\\/\\/hammes.com\\/ut-ut-sequi-corporis-impedit.html\",\"country\":\"NU\",\"language\":\"mi\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(107, 'default', 'created', 'App\\Models\\UserInfo', 'created', 5, NULL, NULL, '{\"attributes\":{\"id\":5,\"user_id\":5,\"avatar\":null,\"company\":\"Halvorson Inc\",\"phone\":\"850.238.6408\",\"website\":\"http:\\/\\/www.leannon.com\\/voluptate-laborum-illo-enim-quia-laborum\",\"country\":\"KM\",\"language\":\"gd\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(108, 'default', 'created', 'App\\Models\\UserInfo', 'created', 6, NULL, NULL, '{\"attributes\":{\"id\":6,\"user_id\":6,\"avatar\":null,\"company\":\"DuBuque, Hirthe and Grimes\",\"phone\":\"(947) 326-5753\",\"website\":\"http:\\/\\/www.conroy.com\\/\",\"country\":\"CR\",\"language\":\"bo\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(109, 'default', 'created', 'App\\Models\\UserInfo', 'created', 7, NULL, NULL, '{\"attributes\":{\"id\":7,\"user_id\":7,\"avatar\":null,\"company\":\"Dietrich Group\",\"phone\":\"760.385.7658\",\"website\":\"http:\\/\\/bins.biz\\/optio-eum-qui-voluptatem-quod-labore-repudiandae-delectus-quae\",\"country\":\"GU\",\"language\":\"th\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(110, 'default', 'created', 'App\\Models\\UserInfo', 'created', 8, NULL, NULL, '{\"attributes\":{\"id\":8,\"user_id\":8,\"avatar\":null,\"company\":\"Mueller-Waters\",\"phone\":\"+1.551.315.6470\",\"website\":\"http:\\/\\/www.gibson.info\\/velit-dolor-voluptas-perferendis-dolores-dolorem-voluptas-maiores-corrupti\",\"country\":\"KP\",\"language\":\"nd\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(111, 'default', 'created', 'App\\Models\\UserInfo', 'created', 9, NULL, NULL, '{\"attributes\":{\"id\":9,\"user_id\":9,\"avatar\":null,\"company\":\"Bauch and Sons\",\"phone\":\"(281) 376-1001\",\"website\":\"http:\\/\\/wiegand.com\\/\",\"country\":\"GM\",\"language\":\"ja\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(112, 'default', 'created', 'App\\Models\\UserInfo', 'created', 10, NULL, NULL, '{\"attributes\":{\"id\":10,\"user_id\":10,\"avatar\":null,\"company\":\"Wyman Ltd\",\"phone\":\"763.870.1835\",\"website\":\"http:\\/\\/www.littel.net\\/\",\"country\":\"ST\",\"language\":\"ko\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(113, 'default', 'created', 'App\\Models\\UserInfo', 'created', 11, NULL, NULL, '{\"attributes\":{\"id\":11,\"user_id\":11,\"avatar\":null,\"company\":\"Zieme, Brekke and Larkin\",\"phone\":\"+1-321-937-4997\",\"website\":\"https:\\/\\/hintz.biz\\/ab-nam-soluta-nihil-et.html\",\"country\":\"FK\",\"language\":\"li\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:58.000000Z\",\"updated_at\":\"2022-05-31T05:02:58.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(114, 'default', 'created', 'App\\Models\\UserInfo', 'created', 12, NULL, NULL, '{\"attributes\":{\"id\":12,\"user_id\":12,\"avatar\":null,\"company\":\"Corwin, Cummings and Hintz\",\"phone\":\"669-783-9919\",\"website\":\"http:\\/\\/www.howell.info\\/\",\"country\":\"VE\",\"language\":\"av\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(115, 'default', 'created', 'App\\Models\\UserInfo', 'created', 13, NULL, NULL, '{\"attributes\":{\"id\":13,\"user_id\":13,\"avatar\":null,\"company\":\"Hand PLC\",\"phone\":\"831-466-8237\",\"website\":\"https:\\/\\/pagac.info\\/eos-aut-qui-exercitationem-voluptatem-ut-rerum-quis.html\",\"country\":\"RS\",\"language\":\"cy\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(116, 'default', 'created', 'App\\Models\\UserInfo', 'created', 14, NULL, NULL, '{\"attributes\":{\"id\":14,\"user_id\":14,\"avatar\":null,\"company\":\"Satterfield LLC\",\"phone\":\"+1.607.851.2617\",\"website\":\"http:\\/\\/okon.com\\/eos-accusantium-error-aspernatur-dolorem-enim-sed-nihil\",\"country\":\"CX\",\"language\":\"bo\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(117, 'default', 'created', 'App\\Models\\UserInfo', 'created', 15, NULL, NULL, '{\"attributes\":{\"id\":15,\"user_id\":15,\"avatar\":null,\"company\":\"Veum, Hoppe and Greenfelder\",\"phone\":\"703-207-1753\",\"website\":\"http:\\/\\/walter.com\\/nam-praesentium-fugiat-nisi-repudiandae-dolor-necessitatibus\",\"country\":\"LK\",\"language\":\"bi\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(118, 'default', 'created', 'App\\Models\\UserInfo', 'created', 16, NULL, NULL, '{\"attributes\":{\"id\":16,\"user_id\":16,\"avatar\":null,\"company\":\"Botsford LLC\",\"phone\":\"(301) 662-1786\",\"website\":\"http:\\/\\/www.abbott.net\\/\",\"country\":\"AR\",\"language\":\"fi\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(119, 'default', 'created', 'App\\Models\\UserInfo', 'created', 17, NULL, NULL, '{\"attributes\":{\"id\":17,\"user_id\":17,\"avatar\":null,\"company\":\"Johns, Kling and Muller\",\"phone\":\"301.251.4360\",\"website\":\"http:\\/\\/welch.com\\/id-sit-saepe-ea-minima-doloremque-esse\",\"country\":\"TJ\",\"language\":\"be\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(120, 'default', 'created', 'App\\Models\\UserInfo', 'created', 18, NULL, NULL, '{\"attributes\":{\"id\":18,\"user_id\":18,\"avatar\":null,\"company\":\"Osinski-Wiza\",\"phone\":\"+1.973.289.0397\",\"website\":\"http:\\/\\/bauch.com\\/et-est-ut-neque-et-sunt.html\",\"country\":\"IR\",\"language\":\"na\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(121, 'default', 'created', 'App\\Models\\UserInfo', 'created', 19, NULL, NULL, '{\"attributes\":{\"id\":19,\"user_id\":19,\"avatar\":null,\"company\":\"Gaylord-Kshlerin\",\"phone\":\"818-863-6686\",\"website\":\"http:\\/\\/www.hammes.info\\/autem-qui-sunt-quo-quia-omnis-non-rerum\",\"country\":\"PS\",\"language\":\"tt\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(122, 'default', 'created', 'App\\Models\\UserInfo', 'created', 20, NULL, NULL, '{\"attributes\":{\"id\":20,\"user_id\":20,\"avatar\":null,\"company\":\"Pagac Inc\",\"phone\":\"+1-979-574-4425\",\"website\":\"https:\\/\\/moen.com\\/enim-et-non-nihil-et-non-mollitia-aspernatur.html\",\"country\":\"AG\",\"language\":\"ve\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:02:59.000000Z\",\"updated_at\":\"2022-05-31T05:02:59.000000Z\"}}', NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(123, 'default', 'created', 'App\\Models\\UserInfo', 'created', 21, NULL, NULL, '{\"attributes\":{\"id\":21,\"user_id\":21,\"avatar\":null,\"company\":\"Ondricka and Sons\",\"phone\":\"(667) 608-8388\",\"website\":\"http:\\/\\/dickinson.com\\/nemo-esse-et-maiores-odit-in-veritatis\",\"country\":\"CR\",\"language\":\"mh\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(124, 'default', 'created', 'App\\Models\\UserInfo', 'created', 22, NULL, NULL, '{\"attributes\":{\"id\":22,\"user_id\":22,\"avatar\":null,\"company\":\"D\'Amore Ltd\",\"phone\":\"+1 (629) 296-8028\",\"website\":\"http:\\/\\/ondricka.com\\/atque-sequi-magnam-aliquid-est-rerum-nihil\",\"country\":\"NR\",\"language\":\"lg\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(125, 'default', 'created', 'App\\Models\\UserInfo', 'created', 23, NULL, NULL, '{\"attributes\":{\"id\":23,\"user_id\":23,\"avatar\":null,\"company\":\"Cummerata-Bradtke\",\"phone\":\"(480) 210-0773\",\"website\":\"https:\\/\\/www.daugherty.com\\/numquam-explicabo-nobis-voluptatem-aperiam\",\"country\":\"PT\",\"language\":\"ti\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(126, 'default', 'created', 'App\\Models\\UserInfo', 'created', 24, NULL, NULL, '{\"attributes\":{\"id\":24,\"user_id\":24,\"avatar\":null,\"company\":\"Moore-Rath\",\"phone\":\"+1-727-969-5971\",\"website\":\"http:\\/\\/www.ohara.net\\/\",\"country\":\"SN\",\"language\":\"om\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(127, 'default', 'created', 'App\\Models\\UserInfo', 'created', 25, NULL, NULL, '{\"attributes\":{\"id\":25,\"user_id\":25,\"avatar\":null,\"company\":\"Jacobson-Dietrich\",\"phone\":\"(626) 302-2738\",\"website\":\"http:\\/\\/www.jacobi.com\\/sed-voluptatibus-nobis-ipsa-iste-deleniti-deserunt-quisquam-recusandae\",\"country\":\"MD\",\"language\":\"mn\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(128, 'default', 'created', 'App\\Models\\UserInfo', 'created', 26, NULL, NULL, '{\"attributes\":{\"id\":26,\"user_id\":26,\"avatar\":null,\"company\":\"Goodwin Inc\",\"phone\":\"+1 (551) 546-6141\",\"website\":\"http:\\/\\/www.christiansen.com\\/deleniti-eveniet-qui-consequatur-ullam\",\"country\":\"JP\",\"language\":\"hr\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(129, 'default', 'created', 'App\\Models\\UserInfo', 'created', 27, NULL, NULL, '{\"attributes\":{\"id\":27,\"user_id\":27,\"avatar\":null,\"company\":\"Hoppe, Corwin and Rau\",\"phone\":\"715-957-0923\",\"website\":\"http:\\/\\/www.nienow.info\\/\",\"country\":\"ES\",\"language\":\"vi\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(130, 'default', 'created', 'App\\Models\\UserInfo', 'created', 28, NULL, NULL, '{\"attributes\":{\"id\":28,\"user_id\":28,\"avatar\":null,\"company\":\"Schmidt Group\",\"phone\":\"484.386.2371\",\"website\":\"http:\\/\\/www.schoen.com\\/explicabo-voluptatem-illum-corporis-facere-est-sit-non\",\"country\":\"MG\",\"language\":\"nb\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(131, 'default', 'created', 'App\\Models\\UserInfo', 'created', 29, NULL, NULL, '{\"attributes\":{\"id\":29,\"user_id\":29,\"avatar\":null,\"company\":\"Rohan PLC\",\"phone\":\"+18643590075\",\"website\":\"https:\\/\\/gibson.org\\/aut-ut-quia-exercitationem-eveniet-neque-sint.html\",\"country\":\"UY\",\"language\":\"jv\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:00.000000Z\",\"updated_at\":\"2022-05-31T05:03:00.000000Z\"}}', NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(132, 'default', 'created', 'App\\Models\\UserInfo', 'created', 30, NULL, NULL, '{\"attributes\":{\"id\":30,\"user_id\":30,\"avatar\":null,\"company\":\"Quigley, Mohr and Stracke\",\"phone\":\"+1-660-580-0832\",\"website\":\"http:\\/\\/www.harris.com\\/ut-fugiat-doloremque-voluptatem-impedit\",\"country\":\"UY\",\"language\":\"ky\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(133, 'default', 'created', 'App\\Models\\UserInfo', 'created', 31, NULL, NULL, '{\"attributes\":{\"id\":31,\"user_id\":31,\"avatar\":null,\"company\":\"Ernser, Carter and Vandervort\",\"phone\":\"+1-484-425-9781\",\"website\":\"http:\\/\\/oberbrunner.com\\/necessitatibus-enim-repellendus-praesentium-quo-exercitationem-sint\",\"country\":\"IS\",\"language\":\"rw\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(134, 'default', 'created', 'App\\Models\\UserInfo', 'created', 32, NULL, NULL, '{\"attributes\":{\"id\":32,\"user_id\":32,\"avatar\":null,\"company\":\"Parker Group\",\"phone\":\"1-225-552-0729\",\"website\":\"http:\\/\\/berge.org\\/\",\"country\":\"NG\",\"language\":\"my\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(135, 'default', 'created', 'App\\Models\\UserInfo', 'created', 33, NULL, NULL, '{\"attributes\":{\"id\":33,\"user_id\":33,\"avatar\":null,\"company\":\"Klein-Dach\",\"phone\":\"+1-854-889-8521\",\"website\":\"http:\\/\\/www.nienow.biz\\/at-et-molestias-est-nisi-tenetur.html\",\"country\":\"AW\",\"language\":\"yo\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(136, 'default', 'created', 'App\\Models\\UserInfo', 'created', 34, NULL, NULL, '{\"attributes\":{\"id\":34,\"user_id\":34,\"avatar\":null,\"company\":\"Schmidt and Sons\",\"phone\":\"1-607-919-8970\",\"website\":\"http:\\/\\/lesch.com\\/dolorum-suscipit-culpa-incidunt.html\",\"country\":\"GF\",\"language\":\"za\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(137, 'default', 'created', 'App\\Models\\UserInfo', 'created', 35, NULL, NULL, '{\"attributes\":{\"id\":35,\"user_id\":35,\"avatar\":null,\"company\":\"Little, Feeney and Walsh\",\"phone\":\"(205) 208-5663\",\"website\":\"http:\\/\\/okon.net\\/\",\"country\":\"UY\",\"language\":\"ms\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(138, 'default', 'created', 'App\\Models\\UserInfo', 'created', 36, NULL, NULL, '{\"attributes\":{\"id\":36,\"user_id\":36,\"avatar\":null,\"company\":\"Reynolds, Jacobs and Brakus\",\"phone\":\"+1.608.320.5000\",\"website\":\"http:\\/\\/white.org\\/\",\"country\":\"SH\",\"language\":\"sq\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(139, 'default', 'created', 'App\\Models\\UserInfo', 'created', 37, NULL, NULL, '{\"attributes\":{\"id\":37,\"user_id\":37,\"avatar\":null,\"company\":\"Goodwin, O\'Hara and Walker\",\"phone\":\"+1-520-870-5963\",\"website\":\"http:\\/\\/www.jones.com\\/\",\"country\":\"PT\",\"language\":\"no\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(140, 'default', 'created', 'App\\Models\\UserInfo', 'created', 38, NULL, NULL, '{\"attributes\":{\"id\":38,\"user_id\":38,\"avatar\":null,\"company\":\"Kub Group\",\"phone\":\"1-443-252-4606\",\"website\":\"http:\\/\\/www.collier.com\\/itaque-dicta-rerum-quia-placeat-ab\",\"country\":\"MO\",\"language\":\"aa\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(141, 'default', 'created', 'App\\Models\\UserInfo', 'created', 39, NULL, NULL, '{\"attributes\":{\"id\":39,\"user_id\":39,\"avatar\":null,\"company\":\"Weber Ltd\",\"phone\":\"1-954-204-5807\",\"website\":\"http:\\/\\/koch.com\\/\",\"country\":\"PA\",\"language\":\"am\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(142, 'default', 'created', 'App\\Models\\UserInfo', 'created', 40, NULL, NULL, '{\"attributes\":{\"id\":40,\"user_id\":40,\"avatar\":null,\"company\":\"Christiansen-Barton\",\"phone\":\"+1.520.823.3017\",\"website\":\"http:\\/\\/www.graham.biz\\/consequatur-laudantium-rem-quia\",\"country\":\"AW\",\"language\":\"dz\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:01.000000Z\",\"updated_at\":\"2022-05-31T05:03:01.000000Z\"}}', NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(143, 'default', 'created', 'App\\Models\\UserInfo', 'created', 41, NULL, NULL, '{\"attributes\":{\"id\":41,\"user_id\":41,\"avatar\":null,\"company\":\"Goldner, Dietrich and Kozey\",\"phone\":\"1-838-606-7774\",\"website\":\"http:\\/\\/cummings.net\\/\",\"country\":\"IS\",\"language\":\"my\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:02.000000Z\",\"updated_at\":\"2022-05-31T05:03:02.000000Z\"}}', NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(144, 'default', 'created', 'App\\Models\\UserInfo', 'created', 42, NULL, NULL, '{\"attributes\":{\"id\":42,\"user_id\":42,\"avatar\":null,\"company\":\"Denesik-Glover\",\"phone\":\"(646) 396-4641\",\"website\":\"http:\\/\\/rohan.info\\/quos-velit-dolore-consectetur-optio-distinctio\",\"country\":\"UA\",\"language\":\"et\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:02.000000Z\",\"updated_at\":\"2022-05-31T05:03:02.000000Z\"}}', NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(145, 'default', 'created', 'App\\Models\\UserInfo', 'created', 43, NULL, NULL, '{\"attributes\":{\"id\":43,\"user_id\":43,\"avatar\":null,\"company\":\"Ferry PLC\",\"phone\":\"(681) 661-1610\",\"website\":\"http:\\/\\/www.erdman.com\\/consequatur-labore-aliquid-ut-ullam-cupiditate-et.html\",\"country\":\"SS\",\"language\":\"ja\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:02.000000Z\",\"updated_at\":\"2022-05-31T05:03:02.000000Z\"}}', NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(146, 'default', 'created', 'App\\Models\\UserInfo', 'created', 44, NULL, NULL, '{\"attributes\":{\"id\":44,\"user_id\":44,\"avatar\":null,\"company\":\"Balistreri, Yost and Fay\",\"phone\":\"+1.925.353.5965\",\"website\":\"http:\\/\\/heidenreich.com\\/neque-odit-qui-sint-velit-dolore-doloribus-enim-nobis.html\",\"country\":\"AU\",\"language\":\"sn\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:02.000000Z\",\"updated_at\":\"2022-05-31T05:03:02.000000Z\"}}', NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(147, 'default', 'created', 'App\\Models\\UserInfo', 'created', 45, NULL, NULL, '{\"attributes\":{\"id\":45,\"user_id\":45,\"avatar\":null,\"company\":\"Swaniawski-Lindgren\",\"phone\":\"+1.680.429.8188\",\"website\":\"http:\\/\\/www.heller.com\\/accusantium-mollitia-in-numquam-magni-corporis-suscipit-et\",\"country\":\"SL\",\"language\":\"fj\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:02.000000Z\",\"updated_at\":\"2022-05-31T05:03:02.000000Z\"}}', NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(148, 'default', 'created', 'App\\Models\\UserInfo', 'created', 46, NULL, NULL, '{\"attributes\":{\"id\":46,\"user_id\":46,\"avatar\":null,\"company\":\"Casper-Weber\",\"phone\":\"1-845-277-7030\",\"website\":\"http:\\/\\/www.morar.org\\/error-et-incidunt-suscipit-fugit-in.html\",\"country\":\"KW\",\"language\":\"fo\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:02.000000Z\",\"updated_at\":\"2022-05-31T05:03:02.000000Z\"}}', NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(149, 'default', 'created', 'App\\Models\\UserInfo', 'created', 47, NULL, NULL, '{\"attributes\":{\"id\":47,\"user_id\":47,\"avatar\":null,\"company\":\"Schamberger, Bergnaum and Durgan\",\"phone\":\"430.739.6075\",\"website\":\"https:\\/\\/brown.info\\/soluta-dolore-doloremque-ut-ut-nobis.html\",\"country\":\"US\",\"language\":\"it\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:02.000000Z\",\"updated_at\":\"2022-05-31T05:03:02.000000Z\"}}', NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(150, 'default', 'created', 'App\\Models\\UserInfo', 'created', 48, NULL, NULL, '{\"attributes\":{\"id\":48,\"user_id\":48,\"avatar\":null,\"company\":\"Stehr-Bernhard\",\"phone\":\"1-423-937-8146\",\"website\":\"http:\\/\\/thompson.com\\/iste-sequi-nobis-eum-qui-aut-sit\",\"country\":\"DE\",\"language\":\"nb\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(151, 'default', 'created', 'App\\Models\\UserInfo', 'created', 49, NULL, NULL, '{\"attributes\":{\"id\":49,\"user_id\":49,\"avatar\":null,\"company\":\"Parisian PLC\",\"phone\":\"+1 (283) 258-8851\",\"website\":\"https:\\/\\/mante.com\\/soluta-occaecati-aut-eligendi-minus.html\",\"country\":\"FK\",\"language\":\"oc\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(152, 'default', 'created', 'App\\Models\\UserInfo', 'created', 50, NULL, NULL, '{\"attributes\":{\"id\":50,\"user_id\":50,\"avatar\":null,\"company\":\"Krajcik, Olson and Reichel\",\"phone\":\"1-769-994-4314\",\"website\":\"http:\\/\\/monahan.com\\/veniam-cupiditate-aliquam-est-mollitia-aperiam-tempore-repellat\",\"country\":\"VU\",\"language\":\"hu\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(153, 'default', 'created', 'App\\Models\\UserInfo', 'created', 51, NULL, NULL, '{\"attributes\":{\"id\":51,\"user_id\":51,\"avatar\":null,\"company\":\"Ortiz Ltd\",\"phone\":\"(678) 494-4734\",\"website\":\"http:\\/\\/kilback.com\\/\",\"country\":\"GP\",\"language\":\"sc\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(154, 'default', 'created', 'App\\Models\\UserInfo', 'created', 52, NULL, NULL, '{\"attributes\":{\"id\":52,\"user_id\":52,\"avatar\":null,\"company\":\"Reichel Inc\",\"phone\":\"856.406.6814\",\"website\":\"http:\\/\\/www.halvorson.org\\/ut-molestiae-reprehenderit-doloribus-iure-recusandae-quas-quae-et\",\"country\":\"GF\",\"language\":\"sq\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(155, 'default', 'created', 'App\\Models\\UserInfo', 'created', 53, NULL, NULL, '{\"attributes\":{\"id\":53,\"user_id\":53,\"avatar\":null,\"company\":\"Gottlieb LLC\",\"phone\":\"+1 (870) 952-9545\",\"website\":\"http:\\/\\/dickinson.com\\/\",\"country\":\"ZM\",\"language\":\"lv\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(156, 'default', 'created', 'App\\Models\\UserInfo', 'created', 54, NULL, NULL, '{\"attributes\":{\"id\":54,\"user_id\":54,\"avatar\":null,\"company\":\"Wiegand Inc\",\"phone\":\"+1 (629) 287-0137\",\"website\":\"https:\\/\\/www.lemke.com\\/itaque-sapiente-fugiat-molestiae-ut-perferendis-fugit\",\"country\":\"TW\",\"language\":\"ia\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(157, 'default', 'created', 'App\\Models\\UserInfo', 'created', 55, NULL, NULL, '{\"attributes\":{\"id\":55,\"user_id\":55,\"avatar\":null,\"company\":\"Schuppe-Mraz\",\"phone\":\"262.914.9400\",\"website\":\"https:\\/\\/www.shanahan.biz\\/impedit-voluptas-cumque-non-officiis-sequi\",\"country\":\"IN\",\"language\":\"en\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(158, 'default', 'created', 'App\\Models\\UserInfo', 'created', 56, NULL, NULL, '{\"attributes\":{\"id\":56,\"user_id\":56,\"avatar\":null,\"company\":\"Lakin, Balistreri and Heaney\",\"phone\":\"1-732-709-8545\",\"website\":\"http:\\/\\/johns.info\\/qui-optio-perspiciatis-nostrum-molestiae-commodi\",\"country\":\"PK\",\"language\":\"uk\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(159, 'default', 'created', 'App\\Models\\UserInfo', 'created', 57, NULL, NULL, '{\"attributes\":{\"id\":57,\"user_id\":57,\"avatar\":null,\"company\":\"Kohler LLC\",\"phone\":\"+1.703.718.0762\",\"website\":\"http:\\/\\/www.boyle.info\\/necessitatibus-facilis-explicabo-unde-voluptatem\",\"country\":\"KG\",\"language\":\"la\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(160, 'default', 'created', 'App\\Models\\UserInfo', 'created', 58, NULL, NULL, '{\"attributes\":{\"id\":58,\"user_id\":58,\"avatar\":null,\"company\":\"Upton-Feeney\",\"phone\":\"1-260-408-5551\",\"website\":\"http:\\/\\/www.prosacco.com\\/laboriosam-tenetur-dicta-optio\",\"country\":\"SI\",\"language\":\"lt\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(161, 'default', 'created', 'App\\Models\\UserInfo', 'created', 59, NULL, NULL, '{\"attributes\":{\"id\":59,\"user_id\":59,\"avatar\":null,\"company\":\"Schmeler-Rohan\",\"phone\":\"223-405-5722\",\"website\":\"http:\\/\\/legros.com\\/\",\"country\":\"MK\",\"language\":\"ss\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(162, 'default', 'created', 'App\\Models\\UserInfo', 'created', 60, NULL, NULL, '{\"attributes\":{\"id\":60,\"user_id\":60,\"avatar\":null,\"company\":\"Huel Group\",\"phone\":\"312-225-1016\",\"website\":\"http:\\/\\/www.toy.com\\/\",\"country\":\"GI\",\"language\":\"lg\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(163, 'default', 'created', 'App\\Models\\UserInfo', 'created', 61, NULL, NULL, '{\"attributes\":{\"id\":61,\"user_id\":61,\"avatar\":null,\"company\":\"Bernier, Strosin and Trantow\",\"phone\":\"(239) 790-9338\",\"website\":\"https:\\/\\/www.hilpert.com\\/ut-cupiditate-qui-vitae\",\"country\":\"ID\",\"language\":\"za\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(164, 'default', 'created', 'App\\Models\\UserInfo', 'created', 62, NULL, NULL, '{\"attributes\":{\"id\":62,\"user_id\":62,\"avatar\":null,\"company\":\"Mann-Gaylord\",\"phone\":\"+1 (561) 575-9257\",\"website\":\"http:\\/\\/www.bashirian.biz\\/\",\"country\":\"MK\",\"language\":\"gn\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:03.000000Z\",\"updated_at\":\"2022-05-31T05:03:03.000000Z\"}}', NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(165, 'default', 'created', 'App\\Models\\UserInfo', 'created', 63, NULL, NULL, '{\"attributes\":{\"id\":63,\"user_id\":63,\"avatar\":null,\"company\":\"Krajcik, Russel and Conn\",\"phone\":\"+1 (937) 428-7786\",\"website\":\"http:\\/\\/www.breitenberg.com\\/\",\"country\":\"FO\",\"language\":\"ku\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(166, 'default', 'created', 'App\\Models\\UserInfo', 'created', 64, NULL, NULL, '{\"attributes\":{\"id\":64,\"user_id\":64,\"avatar\":null,\"company\":\"Lesch PLC\",\"phone\":\"1-551-957-8982\",\"website\":\"http:\\/\\/www.hirthe.com\\/\",\"country\":\"OM\",\"language\":\"hz\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(167, 'default', 'created', 'App\\Models\\UserInfo', 'created', 65, NULL, NULL, '{\"attributes\":{\"id\":65,\"user_id\":65,\"avatar\":null,\"company\":\"Welch LLC\",\"phone\":\"+1-930-757-1964\",\"website\":\"http:\\/\\/www.kunde.com\\/aut-est-autem-qui\",\"country\":\"LV\",\"language\":\"sg\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(168, 'default', 'created', 'App\\Models\\UserInfo', 'created', 66, NULL, NULL, '{\"attributes\":{\"id\":66,\"user_id\":66,\"avatar\":null,\"company\":\"Bahringer, Kihn and Doyle\",\"phone\":\"504.730.9336\",\"website\":\"http:\\/\\/mayert.info\\/nemo-adipisci-iusto-et-facere\",\"country\":\"PH\",\"language\":\"is\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(169, 'default', 'created', 'App\\Models\\UserInfo', 'created', 67, NULL, NULL, '{\"attributes\":{\"id\":67,\"user_id\":67,\"avatar\":null,\"company\":\"Predovic Group\",\"phone\":\"(385) 483-7363\",\"website\":\"http:\\/\\/www.crooks.com\\/\",\"country\":\"MG\",\"language\":\"hy\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(170, 'default', 'created', 'App\\Models\\UserInfo', 'created', 68, NULL, NULL, '{\"attributes\":{\"id\":68,\"user_id\":68,\"avatar\":null,\"company\":\"Rowe, Monahan and Ebert\",\"phone\":\"+1-754-722-5923\",\"website\":\"http:\\/\\/www.haag.com\\/vero-expedita-exercitationem-nesciunt-blanditiis-voluptatem-eaque.html\",\"country\":\"VA\",\"language\":\"dv\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(171, 'default', 'created', 'App\\Models\\UserInfo', 'created', 69, NULL, NULL, '{\"attributes\":{\"id\":69,\"user_id\":69,\"avatar\":null,\"company\":\"Gaylord Group\",\"phone\":\"+1-214-591-6264\",\"website\":\"http:\\/\\/baumbach.com\\/odio-aut-doloribus-et-qui\",\"country\":\"NF\",\"language\":\"sn\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(172, 'default', 'created', 'App\\Models\\UserInfo', 'created', 70, NULL, NULL, '{\"attributes\":{\"id\":70,\"user_id\":70,\"avatar\":null,\"company\":\"Considine-Swift\",\"phone\":\"228-251-2598\",\"website\":\"http:\\/\\/www.koelpin.info\\/\",\"country\":\"NI\",\"language\":\"wa\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(173, 'default', 'created', 'App\\Models\\UserInfo', 'created', 71, NULL, NULL, '{\"attributes\":{\"id\":71,\"user_id\":71,\"avatar\":null,\"company\":\"Kuhn-Kuhn\",\"phone\":\"207.994.2908\",\"website\":\"https:\\/\\/kunze.biz\\/dolorem-itaque-cupiditate-incidunt-qui-dolores-nam-ea-est.html\",\"country\":\"FR\",\"language\":\"gu\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(174, 'default', 'created', 'App\\Models\\UserInfo', 'created', 72, NULL, NULL, '{\"attributes\":{\"id\":72,\"user_id\":72,\"avatar\":null,\"company\":\"Conroy, Sawayn and Schulist\",\"phone\":\"754-509-1939\",\"website\":\"http:\\/\\/www.douglas.info\\/\",\"country\":\"MH\",\"language\":\"km\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(175, 'default', 'created', 'App\\Models\\UserInfo', 'created', 73, NULL, NULL, '{\"attributes\":{\"id\":73,\"user_id\":73,\"avatar\":null,\"company\":\"Shields-Thiel\",\"phone\":\"435.306.6092\",\"website\":\"http:\\/\\/kertzmann.net\\/\",\"country\":\"ML\",\"language\":\"km\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(176, 'default', 'created', 'App\\Models\\UserInfo', 'created', 74, NULL, NULL, '{\"attributes\":{\"id\":74,\"user_id\":74,\"avatar\":null,\"company\":\"Bogan, Heathcote and Pollich\",\"phone\":\"+1-773-372-8847\",\"website\":\"http:\\/\\/www.hackett.org\\/laudantium-nam-sint-dolores-numquam-a-fugiat-minima\",\"country\":\"PE\",\"language\":\"ng\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:04.000000Z\",\"updated_at\":\"2022-05-31T05:03:04.000000Z\"}}', NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(177, 'default', 'created', 'App\\Models\\UserInfo', 'created', 75, NULL, NULL, '{\"attributes\":{\"id\":75,\"user_id\":75,\"avatar\":null,\"company\":\"Gislason, Hermiston and Turner\",\"phone\":\"+1-754-378-4469\",\"website\":\"http:\\/\\/www.thompson.biz\\/\",\"country\":\"HU\",\"language\":\"ko\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(178, 'default', 'created', 'App\\Models\\UserInfo', 'created', 76, NULL, NULL, '{\"attributes\":{\"id\":76,\"user_id\":76,\"avatar\":null,\"company\":\"Grant PLC\",\"phone\":\"520-215-5897\",\"website\":\"http:\\/\\/skiles.com\\/dolor-praesentium-expedita-eum-assumenda-et-aut.html\",\"country\":\"MW\",\"language\":\"sl\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(179, 'default', 'created', 'App\\Models\\UserInfo', 'created', 77, NULL, NULL, '{\"attributes\":{\"id\":77,\"user_id\":77,\"avatar\":null,\"company\":\"Abernathy and Sons\",\"phone\":\"+1-870-986-9254\",\"website\":\"http:\\/\\/terry.com\\/\",\"country\":\"VA\",\"language\":\"kk\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(180, 'default', 'created', 'App\\Models\\UserInfo', 'created', 78, NULL, NULL, '{\"attributes\":{\"id\":78,\"user_id\":78,\"avatar\":null,\"company\":\"Jerde and Sons\",\"phone\":\"323-631-6759\",\"website\":\"http:\\/\\/hudson.info\\/\",\"country\":\"GS\",\"language\":\"be\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(181, 'default', 'created', 'App\\Models\\UserInfo', 'created', 79, NULL, NULL, '{\"attributes\":{\"id\":79,\"user_id\":79,\"avatar\":null,\"company\":\"Becker-Walsh\",\"phone\":\"(909) 941-3058\",\"website\":\"http:\\/\\/kreiger.com\\/provident-fuga-nisi-maxime-ipsum-qui-itaque-harum.html\",\"country\":\"KW\",\"language\":\"tn\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(182, 'default', 'created', 'App\\Models\\UserInfo', 'created', 80, NULL, NULL, '{\"attributes\":{\"id\":80,\"user_id\":80,\"avatar\":null,\"company\":\"Bechtelar-Buckridge\",\"phone\":\"+1-445-891-7606\",\"website\":\"http:\\/\\/www.bednar.com\\/\",\"country\":\"MA\",\"language\":\"hr\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(183, 'default', 'created', 'App\\Models\\UserInfo', 'created', 81, NULL, NULL, '{\"attributes\":{\"id\":81,\"user_id\":81,\"avatar\":null,\"company\":\"Wehner, Prosacco and Wehner\",\"phone\":\"743-254-2250\",\"website\":\"http:\\/\\/www.kulas.com\\/deserunt-similique-praesentium-sint-placeat-nemo\",\"country\":\"UY\",\"language\":\"th\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(184, 'default', 'created', 'App\\Models\\UserInfo', 'created', 82, NULL, NULL, '{\"attributes\":{\"id\":82,\"user_id\":82,\"avatar\":null,\"company\":\"Mertz, Grant and Paucek\",\"phone\":\"806-564-1171\",\"website\":\"http:\\/\\/feil.com\\/id-repudiandae-qui-blanditiis-vero-voluptas-repudiandae-est\",\"country\":\"KN\",\"language\":\"nn\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(185, 'default', 'created', 'App\\Models\\UserInfo', 'created', 83, NULL, NULL, '{\"attributes\":{\"id\":83,\"user_id\":83,\"avatar\":null,\"company\":\"Kozey, Koelpin and Wintheiser\",\"phone\":\"804.876.1126\",\"website\":\"http:\\/\\/www.macejkovic.com\\/\",\"country\":\"AG\",\"language\":\"ce\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(186, 'default', 'created', 'App\\Models\\UserInfo', 'created', 84, NULL, NULL, '{\"attributes\":{\"id\":84,\"user_id\":84,\"avatar\":null,\"company\":\"McGlynn, Little and Walsh\",\"phone\":\"+1-702-643-1455\",\"website\":\"http:\\/\\/lindgren.com\\/nihil-sit-velit-odit-qui-laboriosam.html\",\"country\":\"FI\",\"language\":\"vi\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(187, 'default', 'created', 'App\\Models\\UserInfo', 'created', 85, NULL, NULL, '{\"attributes\":{\"id\":85,\"user_id\":85,\"avatar\":null,\"company\":\"Zieme-Rosenbaum\",\"phone\":\"(361) 798-2677\",\"website\":\"http:\\/\\/legros.com\\/beatae-explicabo-omnis-quidem-iste-minima-natus-sequi-quis.html\",\"country\":\"AO\",\"language\":\"ig\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:05.000000Z\",\"updated_at\":\"2022-05-31T05:03:05.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(188, 'default', 'created', 'App\\Models\\UserInfo', 'created', 86, NULL, NULL, '{\"attributes\":{\"id\":86,\"user_id\":86,\"avatar\":null,\"company\":\"Predovic-Kreiger\",\"phone\":\"1-386-612-7645\",\"website\":\"http:\\/\\/www.yost.biz\\/qui-vel-voluptatum-vel-quibusdam\",\"country\":\"TL\",\"language\":\"mn\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(189, 'default', 'created', 'App\\Models\\UserInfo', 'created', 87, NULL, NULL, '{\"attributes\":{\"id\":87,\"user_id\":87,\"avatar\":null,\"company\":\"Robel, Mitchell and Rath\",\"phone\":\"+12542474104\",\"website\":\"http:\\/\\/www.ondricka.com\\/illo-sit-error-dolorum-ipsam-quaerat-debitis.html\",\"country\":\"CI\",\"language\":\"ug\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(190, 'default', 'created', 'App\\Models\\UserInfo', 'created', 88, NULL, NULL, '{\"attributes\":{\"id\":88,\"user_id\":88,\"avatar\":null,\"company\":\"Schiller PLC\",\"phone\":\"678-484-4335\",\"website\":\"http:\\/\\/www.powlowski.com\\/est-itaque-ipsa-est-ratione-dolorem-aliquid-aut-fugiat.html\",\"country\":\"AG\",\"language\":\"so\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(191, 'default', 'created', 'App\\Models\\UserInfo', 'created', 89, NULL, NULL, '{\"attributes\":{\"id\":89,\"user_id\":89,\"avatar\":null,\"company\":\"Labadie LLC\",\"phone\":\"352.482.6842\",\"website\":\"http:\\/\\/www.ziemann.com\\/sunt-dignissimos-quisquam-dignissimos-doloribus-et-maiores-quia.html\",\"country\":\"AQ\",\"language\":\"kk\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(192, 'default', 'created', 'App\\Models\\UserInfo', 'created', 90, NULL, NULL, '{\"attributes\":{\"id\":90,\"user_id\":90,\"avatar\":null,\"company\":\"Jenkins, Boyer and Brekke\",\"phone\":\"252.521.2536\",\"website\":\"http:\\/\\/www.olson.com\\/deleniti-quos-tempora-est-veritatis-aut\",\"country\":\"ZM\",\"language\":\"af\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(193, 'default', 'created', 'App\\Models\\UserInfo', 'created', 91, NULL, NULL, '{\"attributes\":{\"id\":91,\"user_id\":91,\"avatar\":null,\"company\":\"Luettgen, Frami and Mertz\",\"phone\":\"424-668-7272\",\"website\":\"http:\\/\\/ebert.net\\/impedit-minima-fuga-inventore-rerum\",\"country\":\"NF\",\"language\":\"sk\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(194, 'default', 'created', 'App\\Models\\UserInfo', 'created', 92, NULL, NULL, '{\"attributes\":{\"id\":92,\"user_id\":92,\"avatar\":null,\"company\":\"Lindgren-Schuppe\",\"phone\":\"+1-361-767-9402\",\"website\":\"https:\\/\\/mertz.com\\/reiciendis-omnis-minus-omnis-temporibus-velit-atque-et-ullam.html\",\"country\":\"TZ\",\"language\":\"vo\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(195, 'default', 'created', 'App\\Models\\UserInfo', 'created', 93, NULL, NULL, '{\"attributes\":{\"id\":93,\"user_id\":93,\"avatar\":null,\"company\":\"Wolff-Robel\",\"phone\":\"+1 (234) 547-0677\",\"website\":\"https:\\/\\/yundt.biz\\/architecto-architecto-perferendis-et-unde.html\",\"country\":\"TH\",\"language\":\"li\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(196, 'default', 'created', 'App\\Models\\UserInfo', 'created', 94, NULL, NULL, '{\"attributes\":{\"id\":94,\"user_id\":94,\"avatar\":null,\"company\":\"Lubowitz, Blick and Little\",\"phone\":\"+12019577854\",\"website\":\"http:\\/\\/denesik.com\\/sint-magnam-laborum-adipisci-similique-quisquam-id\",\"country\":\"UG\",\"language\":\"dz\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(197, 'default', 'created', 'App\\Models\\UserInfo', 'created', 95, NULL, NULL, '{\"attributes\":{\"id\":95,\"user_id\":95,\"avatar\":null,\"company\":\"Bechtelar, Ullrich and Dach\",\"phone\":\"+1.947.945.7266\",\"website\":\"https:\\/\\/www.moen.info\\/quaerat-impedit-voluptatem-odio-ab-repellat-sed-omnis\",\"country\":\"VG\",\"language\":\"la\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(198, 'default', 'created', 'App\\Models\\UserInfo', 'created', 96, NULL, NULL, '{\"attributes\":{\"id\":96,\"user_id\":96,\"avatar\":null,\"company\":\"Kulas, Schuster and Hammes\",\"phone\":\"+1-315-273-7847\",\"website\":\"http:\\/\\/www.schimmel.com\\/molestiae-tempora-voluptatem-quia-id-blanditiis-eum-a\",\"country\":\"LR\",\"language\":\"da\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(199, 'default', 'created', 'App\\Models\\UserInfo', 'created', 97, NULL, NULL, '{\"attributes\":{\"id\":97,\"user_id\":97,\"avatar\":null,\"company\":\"Schimmel, Huels and Simonis\",\"phone\":\"(321) 308-0757\",\"website\":\"http:\\/\\/wiegand.com\\/minus-eum-vero-accusamus-ipsa-maxime\",\"country\":\"CM\",\"language\":\"lv\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(200, 'default', 'created', 'App\\Models\\UserInfo', 'created', 98, NULL, NULL, '{\"attributes\":{\"id\":98,\"user_id\":98,\"avatar\":null,\"company\":\"Rath, Prosacco and Romaguera\",\"phone\":\"+1-551-682-8136\",\"website\":\"https:\\/\\/hansen.org\\/tempora-delectus-aspernatur-enim-ipsam-quis-omnis-deleniti.html\",\"country\":\"SR\",\"language\":\"ht\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:06.000000Z\",\"updated_at\":\"2022-05-31T05:03:06.000000Z\"}}', NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07'),
(201, 'default', 'created', 'App\\Models\\UserInfo', 'created', 99, NULL, NULL, '{\"attributes\":{\"id\":99,\"user_id\":99,\"avatar\":null,\"company\":\"Kshlerin, Boyle and Tremblay\",\"phone\":\"(920) 437-5734\",\"website\":\"http:\\/\\/www.prosacco.com\\/\",\"country\":\"HU\",\"language\":\"br\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:07.000000Z\",\"updated_at\":\"2022-05-31T05:03:07.000000Z\"}}', NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07'),
(202, 'default', 'created', 'App\\Models\\UserInfo', 'created', 100, NULL, NULL, '{\"attributes\":{\"id\":100,\"user_id\":100,\"avatar\":null,\"company\":\"Wehner, Crona and Lemke\",\"phone\":\"+1-458-293-8685\",\"website\":\"http:\\/\\/watsica.biz\\/quisquam-cumque-nobis-ullam-ut-quia-esse-earum\",\"country\":\"QA\",\"language\":\"mk\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:07.000000Z\",\"updated_at\":\"2022-05-31T05:03:07.000000Z\"}}', NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07'),
(203, 'default', 'created', 'App\\Models\\UserInfo', 'created', 101, NULL, NULL, '{\"attributes\":{\"id\":101,\"user_id\":101,\"avatar\":null,\"company\":\"Rodriguez-Jacobi\",\"phone\":\"(978) 732-2687\",\"website\":\"http:\\/\\/www.skiles.info\\/quo-eaque-consequatur-occaecati-ut.html\",\"country\":\"PY\",\"language\":\"so\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:07.000000Z\",\"updated_at\":\"2022-05-31T05:03:07.000000Z\"}}', NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07'),
(204, 'default', 'created', 'App\\Models\\UserInfo', 'created', 102, NULL, NULL, '{\"attributes\":{\"id\":102,\"user_id\":102,\"avatar\":null,\"company\":\"Schoen, Paucek and Price\",\"phone\":\"+1.956.679.0648\",\"website\":\"http:\\/\\/lynch.org\\/voluptas-hic-autem-architecto-repellat-deserunt-dolorum\",\"country\":\"VI\",\"language\":\"tg\",\"timezone\":null,\"currency\":null,\"communication\":null,\"marketing\":null,\"created_at\":\"2022-05-31T05:03:07.000000Z\",\"updated_at\":\"2022-05-31T05:03:07.000000Z\"}}', NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07'),
(205, 'default', 'created', 'App\\Models\\User', 'created', 103, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":103,\"first_name\":\"aRUdf\",\"last_name\":\"rtrtw\",\"email\":\"admin123@admin.com\",\"email_verified_at\":null,\"password\":\"$2y$10$Bm.Yp9hYdeVN23iQ5kWqY.ansGJIEnYDZpI5lO0rsd4cFXBB7sBUC\",\"api_token\":\"zZBPnYooGgOi2vOdGZmWDtHGxNgvwFDqfVGh4CDPuSg9oOA3jm2rJsedUV9t\",\"remember_token\":\"xtEUgfYeAY9nZhdh3WXrA5M4Fu9QDGgpsgA1sbQvKr4r5mw6bbododhIgzlq\",\"picture\":null,\"phone\":\"+91123445676878\",\"permission\":\"State_Edit,State_download,City_Edit,City_delete,City_download,Document_Create,Document_Edit,Document_View,Document_download,Categoty_Create,Categoty_Edit,Categoty_View,Categoty_download,Consultant_Create,Consultant_download\",\"created_at\":\"2022-06-18T11:58:12.000000Z\",\"updated_at\":\"2022-06-18T11:58:12.000000Z\"}}', NULL, '2022-06-18 06:28:13', '2022-06-18 06:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(40) NOT NULL,
  `type` int(10) DEFAULT NULL,
  `name` varchar(400) DEFAULT NULL,
  `categories_id` varchar(10) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `tags` varchar(400) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `sort_no_list` int(10) DEFAULT NULL,
  `sort_no_home` int(10) DEFAULT NULL,
  `display_in_home` tinyint(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `name`, `categories_id`, `description`, `tags`, `img`, `sort_no_list`, `sort_no_home`, `display_in_home`, `status`, `created_at`, `updated_at`) VALUES
(5, 0, 'Arun pandian 12', NULL, 'dfrwe 12', '[{\"value\":\"rtre\"},{\"value\":\"hj\"}]', 'public/uploadFiles/category/dLNjuaHBKOek32ZDBbPNEahHXiFx7V2dVJWaqQWC.jpg', 125, 1235, 0, 1, '2022-06-13 06:39:10', '2022-06-13 07:34:20'),
(6, 1, 'Arun', '5', 'ert', '[{\"value\":\"reter\"}]', 'public/uploadFiles/category/Xv4BwFyZwQZLiKcVvzXNBoJArLsQDKfC8ygpWOo2.jpg', 1223, 123, 1, 1, '2022-06-15 01:07:20', '2022-06-15 01:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `city_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 100, '25', 'Chennai', '1', '2021-08-30 00:51:02', '2021-08-30 00:51:59'),
(5, 100, '25', 'Kanchipuram', '1', '2021-09-24 00:29:13', '2021-09-24 00:29:13'),
(6, 100, '16', 'Mumbai', '1', '2021-09-29 07:31:34', '2021-09-29 07:31:34'),
(34, 100, '1', 'T', '1', '2021-10-19 23:49:24', '2021-10-19 23:49:24'),
(35, 100, '1', 'Tirupati', '1', '2021-10-19 23:50:01', '2021-10-19 23:50:01'),
(36, 100, '1', 'Puttur', '1', '2021-10-20 00:02:14', '2021-10-20 00:02:14'),
(37, 230, NULL, 'Abu Dhabi', '1', '2021-10-22 08:47:53', '2021-10-22 08:47:53'),
(38, 230, '60', 'Abu Dhabi', '1', '2021-10-22 08:50:58', '2021-10-22 08:50:58'),
(44, 231, NULL, 'Dubai', '1', '2021-12-28 04:05:26', '2021-12-28 04:05:26'),
(45, 13, NULL, 's', '1', '2021-12-28 20:37:17', '2021-12-28 20:37:17'),
(46, 13, '68', 'si', '1', '2021-12-28 20:37:23', '2021-12-28 20:37:23'),
(47, 232, '69', 'k', '1', '2021-12-29 20:40:23', '2021-12-29 20:40:23'),
(48, 232, '69', 'keses', '1', '2021-12-29 20:41:28', '2021-12-29 20:41:28'),
(49, 6, '70', 'ttrteff', '1', '2021-12-29 20:42:36', '2021-12-29 20:42:36'),
(50, 2, '71', 'Aliban', '1', '2021-12-30 20:26:51', '2021-12-30 20:26:51'),
(51, 100, '3', 'test', '1', '2022-01-03 00:26:47', '2022-01-03 00:26:47'),
(52, 100, '25', 'Select City', '1', '2022-02-03 03:38:47', '2022-02-03 03:38:47'),
(53, 1, '1', 'test', '1', '2022-06-15 05:41:04', '2022-06-15 05:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `companysettings`
--

CREATE TABLE `companysettings` (
  `id` int(40) NOT NULL,
  `comapany_name` varchar(400) DEFAULT NULL,
  `legal_name` varchar(400) DEFAULT NULL,
  `have_tax` int(1) DEFAULT NULL,
  `taxation_number` varchar(400) DEFAULT NULL,
  `register_on` varchar(40) DEFAULT NULL,
  `about_us` text DEFAULT NULL,
  `register_address` text DEFAULT NULL,
  `country_id` int(40) DEFAULT NULL,
  `state_id` int(40) DEFAULT NULL,
  `city_id` int(40) DEFAULT NULL,
  `zipcode` varchar(40) DEFAULT NULL,
  `currencie_id` varchar(40) DEFAULT NULL,
  `time_zone` varchar(400) DEFAULT NULL,
  `date_format` varchar(40) DEFAULT NULL,
  `reschedule_cut_off_time` varchar(40) DEFAULT NULL,
  `discard_cut_off_time` varchar(40) DEFAULT NULL,
  `logo_login_page` varchar(40) DEFAULT NULL,
  `logo_header` varchar(400) DEFAULT NULL,
  `cname` text DEFAULT NULL,
  `ctitle` text DEFAULT NULL,
  `cemail` text DEFAULT NULL,
  `cmobile` text DEFAULT NULL,
  `cphone` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companysettings`
--

INSERT INTO `companysettings` (`id`, `comapany_name`, `legal_name`, `have_tax`, `taxation_number`, `register_on`, `about_us`, `register_address`, `country_id`, `state_id`, `city_id`, `zipcode`, `currencie_id`, `time_zone`, `date_format`, `reschedule_cut_off_time`, `discard_cut_off_time`, `logo_login_page`, `logo_header`, `cname`, `ctitle`, `cemail`, `cmobile`, `cphone`, `updated_at`, `created_at`, `status`) VALUES
(4, 'rwetrwe', 'arun', 1, '456456', '06/17/2022', '<p>dfdfdfsg</p>', '<p>fsgfdasg</p>', 100, 25, 1, 'sdfgd', '112', NULL, 'Y-M-D', 'H:I', 'H:I', 'E:\\xampp\\tmp\\phpE1E8.tmp', 'E:\\xampp\\tmp\\phpE1F9.tmp', 'dsfwre', 'rter', 'admin@admin.com', '8056472756', '+91dfgr', '2022-06-17 08:41:04', '2022-06-17 08:41:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consultantcategories`
--

CREATE TABLE `consultantcategories` (
  `id` int(40) NOT NULL,
  `categorie_id` int(40) DEFAULT NULL,
  `subcategorie_id` int(40) DEFAULT NULL,
  `title` varchar(400) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultantcategories`
--

INSERT INTO `consultantcategories` (`id`, `categorie_id`, `subcategorie_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 'as', 1, '2022-06-15 01:13:57', '2022-06-20 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dialing` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `dialing`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', '+93', 'Afghanistan', '1', NULL, NULL),
(2, 'AL', '+355', 'Albania', '0', NULL, '2022-01-18 08:48:47'),
(3, 'DZ', '+213', 'Algeria', '0', NULL, '2022-01-18 08:48:58'),
(4, 'DS', NULL, 'American Samoa', '1', NULL, NULL),
(5, 'AD', '+376', 'Andorra', '0', NULL, '2022-01-18 08:49:14'),
(6, 'AO', '+244', 'Angola', '0', NULL, '2022-01-18 08:49:23'),
(7, 'AI', '+1-264', 'Anguilla', '0', NULL, '2022-01-18 08:49:31'),
(8, 'AQ', '+672', 'Antarctica', '1', NULL, NULL),
(9, 'AG', '+1-268', 'Antigua and Barbuda', '0', NULL, '2022-01-18 08:49:48'),
(10, 'AR', '+54', 'Argentina', '0', NULL, '2022-01-18 08:50:00'),
(11, 'AM', '+374', 'Armenia', '0', NULL, '2022-01-18 08:50:11'),
(12, 'AW', '+297', 'Aruba', '1', NULL, NULL),
(13, 'AU', '+61', 'Australia', '1', NULL, NULL),
(14, 'AT', '+43', 'Austria', '1', NULL, NULL),
(15, 'AZ', '+994', 'Azerbaijan', '0', NULL, '2022-01-18 08:50:23'),
(16, 'BS', '+1-242', 'Bahamas', '0', NULL, '2022-01-18 08:50:34'),
(17, 'BH', '+973', 'Bahrain', '1', NULL, NULL),
(18, 'BD', '+880', 'Bangladesh', '1', NULL, NULL),
(19, 'BB', '+1-246', 'Barbados', '0', NULL, '2022-01-18 08:50:44'),
(20, 'BY', '+375', 'Belarus', '0', NULL, '2022-01-18 08:50:55'),
(21, 'BE', '+32', 'Belgium', '1', NULL, NULL),
(22, 'BZ', '+501', 'Belize', '0', NULL, '2022-01-18 08:51:11'),
(23, 'BJ', '+229', 'Benin', '0', NULL, '2022-01-18 08:51:25'),
(24, 'BM', '+1-441', 'Bermuda', '1', NULL, NULL),
(25, 'BT', '+975', 'Bhutan', '0', NULL, '2022-01-18 08:51:39'),
(26, 'BO', '+591', 'Bolivia', '0', NULL, '2022-01-18 08:51:45'),
(27, 'BA', '+387', 'Bosnia and Herzegovina', '0', NULL, '2022-01-18 08:51:56'),
(28, 'BW', '+267', 'Botswana', '0', NULL, '2022-01-18 08:52:05'),
(29, 'BV', '', 'Bouvet Island', '0', NULL, '2022-01-18 08:52:22'),
(30, 'BR', '+55', 'Brazil', '1', NULL, NULL),
(31, 'IO', '', 'British Indian Ocean Territory', '0', NULL, '2022-01-18 08:52:36'),
(32, 'BN', '+673', 'Brunei Darussalam', '0', NULL, '2022-01-18 08:52:47'),
(33, 'BG', '+359', 'Bulgaria', '0', NULL, '2022-01-18 08:52:57'),
(34, 'BF', '+226', 'Burkina Faso', '0', NULL, '2022-01-18 08:53:09'),
(35, 'BI', '+257', 'Burundi', '0', NULL, '2022-01-18 08:53:22'),
(36, 'KH', '+855', 'Cambodia', '1', NULL, NULL),
(37, 'CM', '+237', 'Cameroon', '0', NULL, '2022-01-18 08:53:28'),
(38, 'CA', '+1', 'Canada', '0', NULL, '2022-01-18 08:53:44'),
(39, 'CV', '+238', 'Cape Verde', '0', NULL, '2022-01-18 08:53:54'),
(40, 'KY', '+1-345', 'Cayman Islands', '0', NULL, '2022-01-18 08:54:10'),
(41, 'CF', '+236', 'Central African Republic', '0', NULL, '2022-01-18 08:54:21'),
(42, 'TD', '+235', 'Chad', '0', NULL, '2022-01-18 08:54:33'),
(43, 'CL', '+56', 'Chile', '0', NULL, '2022-01-18 08:54:40'),
(44, 'CN', '+86', 'China', '0', NULL, '2022-01-18 08:54:45'),
(45, 'CX', '+53', 'Christmas Island', '0', NULL, '2022-01-18 08:55:01'),
(46, 'CC', '+61', 'Cocos (Keeling) Islands', '0', NULL, '2022-01-18 08:55:17'),
(47, 'CO', '+57', 'Colombia', '0', NULL, '2022-01-18 08:55:27'),
(48, 'KM', '+269', 'Comoros', '0', NULL, '2022-01-18 08:55:32'),
(49, 'CD', '+243', 'Democratic Republic of the Congo', '0', NULL, '2022-01-18 08:55:45'),
(50, 'CG', '+242', 'Republic of Congo', '0', NULL, '2022-01-18 08:55:58'),
(51, 'CK', '+682', 'Cook Islands', '0', NULL, '2022-01-18 08:56:08'),
(52, 'CR', '+506', 'Costa Rica', '0', NULL, '2022-01-18 08:56:20'),
(53, 'HR', '+385', 'Croatia (Hrvatska)', '0', NULL, '2022-01-18 08:56:31'),
(54, 'CU', '+53', 'Cuba', '0', NULL, '2022-01-18 08:56:49'),
(55, 'CY', '+357', 'Cyprus', '0', NULL, '2022-01-18 08:56:53'),
(56, 'CZ', '+420', 'Czech Republic', '0', NULL, '2022-01-18 08:57:05'),
(57, 'DK', '+45', 'Denmark', '1', NULL, NULL),
(58, 'DJ', '+253', 'Djibouti', '0', NULL, '2022-01-18 08:57:22'),
(59, 'DM', '+1-767', 'Dominica', '0', NULL, '2022-01-18 08:57:33'),
(60, 'DO', '+1-809 and +1-829  ', 'Dominican Republic', '0', NULL, '2022-01-18 08:57:40'),
(61, 'TP', '+670', 'East Timor', '0', NULL, '2022-01-18 08:57:53'),
(62, 'EC', '+593 ', 'Ecuador', '0', NULL, '2022-01-18 08:58:05'),
(63, 'EG', '+20', 'Egypt', '0', NULL, '2022-01-18 08:58:14'),
(64, 'SV', '+503', 'El Salvador', '0', NULL, '2022-01-18 08:58:26'),
(65, 'GQ', '+240', 'Equatorial Guinea', '0', NULL, '2022-01-18 08:58:38'),
(66, 'ER', '+291', 'Eritrea', '0', NULL, '2022-01-18 08:58:49'),
(67, 'EE', '+372', 'Estonia', '0', NULL, '2022-01-18 08:59:00'),
(68, 'ET', '+251', 'Ethiopia', '0', NULL, '2022-01-18 08:59:07'),
(69, 'FK', '+500', 'Falkland Islands (Malvinas)', '0', NULL, '2022-01-18 08:59:17'),
(70, 'FO', '+298', 'Faroe Islands', '0', NULL, '2022-01-18 08:59:27'),
(71, 'FJ', '+679', 'Fiji', '0', NULL, '2022-01-18 08:59:38'),
(72, 'FI', '+358', 'Finland', '1', NULL, NULL),
(73, 'FR', '+33', 'France', '1', NULL, NULL),
(74, 'FX', NULL, 'France, Metropolitan', '1', NULL, NULL),
(75, 'GF', '+594', 'French Guiana', '1', NULL, NULL),
(76, 'PF', '+689', 'French Polynesia', '1', NULL, NULL),
(77, 'TF', '', 'French Southern Territories', '1', NULL, NULL),
(78, 'GA', '+241', 'Gabon', '0', NULL, '2022-01-18 08:59:42'),
(79, 'GM', '+220', 'Gambia', '0', NULL, '2022-01-18 08:59:52'),
(80, 'GE', '+995', 'Georgia', '0', NULL, '2022-01-18 09:00:03'),
(81, 'DE', '+49', 'Germany', '1', NULL, NULL),
(82, 'GH', '+233', 'Ghana', '0', NULL, '2022-01-18 09:00:15'),
(83, 'GI', '+350', 'Gibraltar', '0', NULL, '2022-01-18 09:00:27'),
(84, 'GK', NULL, 'Guernsey', '1', NULL, NULL),
(85, 'GR', '+30', 'Greece', '1', NULL, NULL),
(86, 'GL', '+299', 'Greenland', '1', NULL, NULL),
(87, 'GD', '+1-473', 'Grenada', '1', NULL, NULL),
(88, 'GP', '+590', 'Guadeloupe', '1', NULL, NULL),
(89, 'GU', '+1-671', 'Guam', '1', NULL, NULL),
(90, 'GT', '+502', 'Guatemala', '1', NULL, NULL),
(91, 'GN', '+224', 'Guinea', '1', NULL, NULL),
(92, 'GW', '+245', 'Guinea-Bissau', '1', NULL, NULL),
(93, 'GY', '+592', 'Guyana', '1', NULL, NULL),
(94, 'HT', '+509', 'Haiti', '1', NULL, NULL),
(95, 'HM', '', 'Heard and Mc Donald Islands', '1', NULL, NULL),
(96, 'HN', '+504', 'Honduras', '1', NULL, NULL),
(97, 'HK', '+852', 'Hong Kong', '1', NULL, NULL),
(98, 'HU', '+36', 'Hungary', '1', NULL, NULL),
(99, 'IS', '+354', 'Iceland', '1', NULL, NULL),
(100, 'IN', '+91', 'India', '1', NULL, NULL),
(101, 'IM', NULL, 'Isle of Man', '1', NULL, NULL),
(102, 'ID', '+62', 'Indonesia', '1', NULL, NULL),
(103, 'IR', '+98', 'Iran (Islamic Republic of)', '1', NULL, NULL),
(104, 'IQ', '+964', 'Iraq', '1', NULL, NULL),
(105, 'IE', '+353', 'Ireland', '1', NULL, NULL),
(106, 'IL', '+972', 'Israel', '1', NULL, NULL),
(107, 'IT', '+39', 'Italy', '1', NULL, NULL),
(108, 'CI', '+225', 'Ivory Coast', '1', NULL, NULL),
(109, 'JE', NULL, 'Jersey', '1', NULL, NULL),
(110, 'JM', '+1-876', 'Jamaica', '1', NULL, NULL),
(111, 'JP', '+81', 'Japan', '1', NULL, NULL),
(112, 'JO', '+962', 'Jordan', '1', NULL, NULL),
(113, 'KZ', '+7', 'Kazakhstan', '1', NULL, NULL),
(114, 'KE', '+254', 'Kenya', '1', NULL, NULL),
(115, 'KI', '+686', 'Kiribati', '1', NULL, NULL),
(116, 'KP', '+850', 'Korea, Democratic People\'s Republic of', '1', NULL, NULL),
(117, 'KR', '+82', 'Korea, Republic of', '1', NULL, NULL),
(118, 'XK', NULL, 'Kosovo', '1', NULL, NULL),
(119, 'KW', '+965', 'Kuwait', '1', NULL, NULL),
(120, 'KG', '+996', 'Kyrgyzstan', '1', NULL, NULL),
(121, 'LA', '+856', 'Lao People\'s Democratic Republic', '1', NULL, NULL),
(122, 'LV', '+371', 'Latvia', '1', NULL, NULL),
(123, 'LB', '+961', 'Lebanon', '1', NULL, NULL),
(124, 'LS', '+266', 'Lesotho', '1', NULL, NULL),
(125, 'LR', '+231', 'Liberia', '1', NULL, NULL),
(126, 'LY', '+218', 'Libyan Arab Jamahiriya', '1', NULL, NULL),
(127, 'LI', '+423', 'Liechtenstein', '1', NULL, NULL),
(128, 'LT', '+370', 'Lithuania', '1', NULL, NULL),
(129, 'LU', '+352', 'Luxembourg', '1', NULL, NULL),
(130, 'MO', '+853', 'Macau', '1', NULL, NULL),
(131, 'MK', '+389', 'North Macedonia', '1', NULL, NULL),
(132, 'MG', '+261', 'Madagascar', '1', NULL, NULL),
(133, 'MW', '+265', 'Malawi', '1', NULL, NULL),
(134, 'MY', '+60', 'Malaysia', '1', NULL, NULL),
(135, 'MV', '+960', 'Maldives', '1', NULL, NULL),
(136, 'ML', '+223', 'Mali', '1', NULL, NULL),
(137, 'MT', '+356', 'Malta', '1', NULL, NULL),
(138, 'MH', '+692', 'Marshall Islands', '1', NULL, NULL),
(139, 'MQ', '+596', 'Martinique', '1', NULL, NULL),
(140, 'MR', '+222', 'Mauritania', '1', NULL, NULL),
(141, 'MU', '+230', 'Mauritius', '1', NULL, NULL),
(142, 'TY', NULL, 'Mayotte', '1', NULL, NULL),
(143, 'MX', '+52', 'Mexico', '1', NULL, NULL),
(144, 'FM', '+691', 'Micronesia, Federated States of', '1', NULL, NULL),
(145, 'MD', '+373', 'Moldova, Republic of', '1', NULL, NULL),
(146, 'MC', '+377', 'Monaco', '1', NULL, NULL),
(147, 'MN', '+976', 'Mongolia', '1', NULL, NULL),
(148, 'ME', NULL, 'Montenegro', '1', NULL, NULL),
(149, 'MS', '+1-664', 'Montserrat', '1', NULL, NULL),
(150, 'MA', '+212', 'Morocco', '1', NULL, NULL),
(151, 'MZ', '+258', 'Mozambique', '1', NULL, NULL),
(152, 'MM', '+95', 'Myanmar', '1', NULL, NULL),
(153, 'NA', '+264', 'Namibia', '1', NULL, NULL),
(154, 'NR', '+674', 'Nauru', '1', NULL, NULL),
(155, 'NP', '+977', 'Nepal', '1', NULL, NULL),
(156, 'NL', '+31', 'Netherlands', '1', NULL, NULL),
(157, 'AN', '+599', 'Netherlands Antilles', '1', NULL, NULL),
(158, 'NC', '+687', 'New Caledonia', '1', NULL, NULL),
(159, 'NZ', '+64', 'New Zealand', '1', NULL, NULL),
(160, 'NI', '+505', 'Nicaragua', '1', NULL, NULL),
(161, 'NE', '+227', 'Niger', '1', NULL, NULL),
(162, 'NG', '+234', 'Nigeria', '1', NULL, NULL),
(163, 'NU', '+683', 'Niue', '1', NULL, NULL),
(164, 'NF', '+672', 'Norfolk Island', '1', NULL, NULL),
(165, 'MP', '+1-670', 'Northern Mariana Islands', '1', NULL, NULL),
(166, 'NO', '+47', 'Norway', '1', NULL, NULL),
(167, 'OM', '+968', 'Oman', '1', NULL, NULL),
(168, 'PK', '+92', 'Pakistan', '1', NULL, NULL),
(169, 'PW', '+680', 'Palau', '1', NULL, NULL),
(170, 'PS', '+970', 'Palestine', '1', NULL, NULL),
(171, 'PA', '+507', 'Panama', '1', NULL, NULL),
(172, 'PG', '+675', 'Papua New Guinea', '1', NULL, NULL),
(173, 'PY', '+595', 'Paraguay', '1', NULL, NULL),
(174, 'PE', '+51', 'Peru', '1', NULL, NULL),
(175, 'PH', '+63', 'Philippines', '1', NULL, NULL),
(176, 'PN', '', 'Pitcairn', '1', NULL, NULL),
(177, 'PL', '+48', 'Poland', '1', NULL, NULL),
(178, 'PT', '+351', 'Portugal', '1', NULL, NULL),
(179, 'PR', '+1-787 or +1-939', 'Puerto Rico', '1', NULL, NULL),
(180, 'QA', '+974 ', 'Qatar', '1', NULL, NULL),
(181, 'RE', '+262', 'Reunion', '1', NULL, NULL),
(182, 'RO', '+40', 'Romania', '1', NULL, NULL),
(183, 'RU', '+7', 'Russian Federation', '1', NULL, NULL),
(184, 'RW', '+250', 'Rwanda', '1', NULL, NULL),
(185, 'KN', '+1-869', 'Saint Kitts and Nevis', '1', NULL, NULL),
(186, 'LC', '+1-758', 'Saint Lucia', '1', NULL, NULL),
(187, 'VC', '+1-784', 'Saint Vincent and the Grenadines', '1', NULL, NULL),
(188, 'WS', '+685', 'Samoa', '1', NULL, NULL),
(189, 'SM', '+378', 'San Marino', '1', NULL, NULL),
(190, 'ST', '+239', 'Sao Tome and Principe', '1', NULL, NULL),
(191, 'SA', '+966', 'Saudi Arabia', '1', NULL, NULL),
(192, 'SN', '+221', 'Senegal', '1', NULL, NULL),
(193, 'RS', '', 'Serbia', '1', NULL, NULL),
(194, 'SC', '+248', 'Seychelles', '1', NULL, NULL),
(195, 'SL', '+232', 'Sierra Leone', '1', NULL, NULL),
(196, 'SG', '+65', 'Singapore', '1', NULL, NULL),
(197, 'SK', '+421', 'Slovakia', '1', NULL, NULL),
(198, 'SI', '+386', 'Slovenia', '1', NULL, NULL),
(199, 'SB', '+677', 'Solomon Islands', '1', NULL, NULL),
(200, 'SO', '+252', 'Somalia', '1', NULL, NULL),
(201, 'ZA', '+27', 'South Africa', '1', NULL, NULL),
(202, 'GS', '', 'South Georgia South Sandwich Islands', '1', NULL, NULL),
(203, 'SS', NULL, 'South Sudan', '1', NULL, NULL),
(204, 'ES', '+34', 'Spain', '1', NULL, NULL),
(205, 'LK', '+94', 'Sri Lanka', '1', NULL, NULL),
(206, 'SH', '+290', 'St. Helena', '1', NULL, NULL),
(207, 'PM', '+508', 'St. Pierre and Miquelon', '1', NULL, NULL),
(208, 'SD', '+249', 'Sudan', '1', NULL, NULL),
(209, 'SR', '+597', 'Suriname', '1', NULL, NULL),
(210, 'SJ', '', 'Svalbard and Jan Mayen Islands', '1', NULL, NULL),
(211, 'SZ', '+268', 'Swaziland', '1', NULL, NULL),
(212, 'SE', '+46', 'Sweden', '1', NULL, NULL),
(213, 'CH', '+41', 'Switzerland', '1', NULL, NULL),
(214, 'SY', '+963', 'Syrian Arab Republic', '1', NULL, NULL),
(215, 'TW', '+886', 'Taiwan', '1', NULL, NULL),
(216, 'TJ', '+992', 'Tajikistan', '1', NULL, NULL),
(217, 'TZ', '+255', 'Tanzania, United Republic of', '1', NULL, NULL),
(218, 'TH', '+66', 'Thailand', '1', NULL, NULL),
(219, 'TG', '', 'Togo', '1', NULL, NULL),
(220, 'TK', '+690', 'Tokelau', '1', NULL, NULL),
(221, 'TO', '+676', 'Tonga', '1', NULL, NULL),
(222, 'TT', '+1-868', 'Trinidad and Tobago', '1', NULL, NULL),
(223, 'TN', '+216', 'Tunisia', '1', NULL, NULL),
(224, 'TR', '+90', 'Turkey', '1', NULL, NULL),
(225, 'TM', '+993', 'Turkmenistan', '1', NULL, NULL),
(226, 'TC', '+1-649', 'Turks and Caicos Islands', '1', NULL, NULL),
(227, 'TV', '+688', 'Tuvalu', '1', NULL, NULL),
(228, 'UG', '+256', 'Uganda', '1', NULL, NULL),
(229, 'UA', '+380', 'Ukraine', '1', NULL, NULL),
(230, 'AE', '+971', 'United Arab Emirates', '1', NULL, NULL),
(231, 'GB', '+44', 'United Kingdom', '1', NULL, NULL),
(232, 'US', '+1', 'United States', '1', NULL, NULL),
(233, 'UM', '', 'United States minor outlying islands', '1', NULL, NULL),
(234, 'UY', '+598', 'Uruguay', '1', NULL, NULL),
(235, 'UZ', '+998', 'Uzbekistan', '1', NULL, NULL),
(236, 'VU', '+678', 'Vanuatu', '1', NULL, NULL),
(237, 'VA', '+418', 'Vatican City State', '1', NULL, NULL),
(238, 'VE', '+58', 'Venezuela', '1', NULL, NULL),
(239, 'VN', '+84', 'Vietnam', '1', NULL, NULL),
(240, 'VG', NULL, 'Virgin Islands (British)', '0', NULL, '2022-01-18 09:00:43'),
(241, 'VI', '+1-284', 'Virgin Islands (U.S.)', '0', NULL, '2022-01-18 09:00:45'),
(242, 'WF', '+681', 'Wallis and Futuna Islands', '0', NULL, '2022-01-18 09:00:54'),
(243, 'EH', '', 'Western Sahara', '0', NULL, '2022-01-18 09:01:03'),
(244, 'YE', '+967', 'Yemen', '0', NULL, '2022-01-18 09:01:10'),
(245, 'ZM', '+260', 'Zambia', '1', NULL, NULL),
(246, 'ZW', '+263', 'Zimbabwe', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `countryname` varchar(400) DEFAULT NULL,
  `countrycode` varchar(400) DEFAULT NULL,
  `currencycode` varchar(400) DEFAULT NULL,
  `symbol` varchar(400) DEFAULT NULL,
  `price` varchar(400) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `countryname`, `countrycode`, `currencycode`, `symbol`, `price`, `updated_at`, `created_at`) VALUES
(1, 'Afghanistan', 'AFG', 'AFN', NULL, '1.174', NULL, NULL),
(2, 'Albania', 'ALB', 'ALL', NULL, '1.4641', NULL, NULL),
(3, 'Algeria', 'DZA', 'DZD', NULL, '1.8793', NULL, NULL),
(4, 'American Samoa', 'ASM', 'USD', NULL, '0.01291', NULL, NULL),
(5, 'Andorra', 'AND', 'EUR', NULL, '0.01212', NULL, NULL),
(6, 'Angola', 'AGO', 'AOA', NULL, '5.3844', NULL, NULL),
(7, 'Anguila', 'AIA', '', NULL, NULL, NULL, NULL),
(8, 'Antigua and Barbuda', 'ATG', 'XCD', NULL, '0.03485', NULL, NULL),
(9, 'Argentina', 'ARG', 'ARS', NULL, '1.5283', NULL, NULL),
(10, 'Armenia', 'ARM', 'AMD', NULL, '5.8543', NULL, NULL),
(11, 'Aruba', 'ABW', 'AWG', NULL, '0.0231', NULL, NULL),
(12, 'Australia', 'AUS', 'AUD', NULL, '0.01819', NULL, NULL),
(13, 'Austria', 'AUT', 'EUR', NULL, '0.01212', NULL, NULL),
(14, 'Azerbaijan', 'AZE', 'AZN', NULL, '0.0219', NULL, NULL),
(15, 'Bahamas, The', 'BHS', 'BSD', NULL, '0.01291', NULL, NULL),
(16, 'Bahrain', 'BHR', 'BHD', NULL, '0.004853', NULL, NULL),
(17, 'Bangladesh', 'BGD', 'BDT', NULL, '1.1314', NULL, NULL),
(18, 'Barbados', 'BRB', 'BBD', NULL, '0.02582', NULL, NULL),
(19, 'Belarus', 'BLR', 'BYN', NULL, '0.03551', NULL, NULL),
(20, 'Belgium', 'BEL', 'EUR', NULL, '0.01212', NULL, NULL),
(21, 'Belgium-Luxembourg', 'BLX', 'EUR', NULL, '0.01212', NULL, NULL),
(22, 'Belize', 'BLZ', 'BZD', NULL, '0.02582', NULL, NULL),
(23, 'Benin', 'BEN', 'XOF', NULL, '7.9512', NULL, NULL),
(24, 'Bermuda', 'BMU', 'BMD', NULL, '0.01291', NULL, NULL),
(25, 'Bhutan', 'BTN', 'BTN', NULL, '1', NULL, NULL),
(26, 'Bolivia', 'BOL', 'BOB', NULL, '0.08862', NULL, NULL),
(27, 'Bosnia and Herzegovina', 'BIH', 'BAM', NULL, '0.02371', NULL, NULL),
(28, 'Botswana', 'BWA', 'BWP', NULL, '0.1563', NULL, NULL),
(29, 'Br. Antr. Terr', 'BAT', 'NOK', NULL, '0.1245', NULL, NULL),
(30, 'Brazil', 'BRA', 'BRL', NULL, '0.06261', NULL, NULL),
(31, 'British Indian Ocean Ter.', 'IOT', 'BRL', NULL, '0.06261', NULL, NULL),
(32, 'British Virgin Islands', 'VGB', 'USD', NULL, '0.01291', NULL, NULL),
(33, 'Brunei', 'BRN', 'USD', NULL, '0.01291', NULL, NULL),
(34, 'Bulgaria', 'BGR', 'BGN', NULL, '0.0237', NULL, NULL),
(35, 'Burkina Faso', 'BFA', 'XOF', NULL, '7.9512', NULL, NULL),
(36, 'Burundi', 'BDI', 'BIF', NULL, '25.9887', NULL, NULL),
(37, 'Cambodia', 'KHM', '', NULL, NULL, NULL, NULL),
(38, 'Cameroon', 'CMR', 'XAF', NULL, '7.9512', NULL, NULL),
(39, 'Canada', 'CAN', 'CAD', NULL, '0.01652', NULL, NULL),
(40, 'Cape Verde', 'CPV', 'CAD', NULL, '0.01652', NULL, NULL),
(41, 'Cayman Islands', 'CYM', 'KYD', NULL, '0.01076', NULL, NULL),
(42, 'Central African Republic', 'CAF', 'KYD', NULL, '0.01076', NULL, NULL),
(43, 'Chad', 'TCD', 'XAF', NULL, '7.9512', NULL, NULL),
(44, 'Chile', 'CHL', 'CLP', NULL, '10.7786', NULL, NULL),
(45, 'China', 'CHN', 'CNY', NULL, '0.08607', NULL, NULL),
(46, 'Christmas Island', 'CXR', 'AUD', NULL, '0.01819', NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CCK', 'AUD', NULL, '0.01819', NULL, NULL),
(48, 'Colombia', 'COL', 'COU', NULL, NULL, NULL, NULL),
(49, 'Comoros', 'COM', 'COU', NULL, NULL, NULL, NULL),
(50, 'Congo, Dem. Rep.', 'ZAR', 'XAF', NULL, '7.9512', NULL, NULL),
(51, 'Congo, Rep.', 'COG', 'XAF', NULL, '7.9512', NULL, NULL),
(52, 'Cook Islands', 'COK', 'XAF', NULL, '7.9512', NULL, NULL),
(53, 'Costa Rica', 'CRI', 'CRC', NULL, '8.709', NULL, NULL),
(54, 'Cote dIvoire', 'CIV', 'CRC', NULL, '8.709', NULL, NULL),
(55, 'Croatia', 'HRV', 'HRK', NULL, '0.09133', NULL, NULL),
(56, 'Cuba', 'CUB', 'CUP', NULL, '0.3098', NULL, NULL),
(57, 'Cyprus', 'CYP', 'EUR', NULL, '0.01212', NULL, NULL),
(58, 'Czech Republic', 'CZE', 'XOF', NULL, '7.9512', NULL, NULL),
(59, 'Czechoslovakia', 'CSK', 'XOF', NULL, '7.9512', NULL, NULL),
(60, 'Denmark', 'DNK', 'DKK', NULL, '0.09043', NULL, NULL),
(61, 'Djibouti', 'DJI', 'DJF', NULL, '2.294', NULL, NULL),
(62, 'Dominica', 'DMA', 'XCD', NULL, '0.03485', NULL, NULL),
(63, 'Dominican Republic', 'DOM', 'DOP', NULL, '0.7118', NULL, NULL),
(64, 'East Timor', 'TMP', '', NULL, NULL, NULL, NULL),
(65, 'Ecuador', 'ECU', 'USD', NULL, '0.01291', NULL, NULL),
(66, 'Egypt, Arab Rep.', 'EGY', 'EGP', NULL, '0.2363', NULL, NULL),
(67, 'El Salvador', 'SLV', 'USD', NULL, '0.01291', NULL, NULL),
(68, 'Equatorial Guinea', 'GNQ', 'XAF', NULL, '7.9512', NULL, NULL),
(69, 'Eritrea', 'ERI', 'ERN', NULL, '0.1936', NULL, NULL),
(70, 'Estonia', 'EST', 'EUR', NULL, '0.01212', NULL, NULL),
(71, 'Ethiopia (excludes Eritrea)', 'ETH', 'ETB', NULL, '0.6671', NULL, NULL),
(72, 'Ethiopia (includes Eritrea)', 'ETF', 'ETB', NULL, '0.6671', NULL, NULL),
(73, 'European Union', 'EUN', 'EUR', NULL, '0.01212', NULL, NULL),
(74, 'Faeroe Islands', 'FRO', '', NULL, NULL, NULL, NULL),
(75, 'Falkland Island', 'FLK', '', NULL, NULL, NULL, NULL),
(76, 'Fiji', 'FJI', 'FJD', NULL, '0.0279', NULL, NULL),
(77, 'Finland', 'FIN', 'EUR', NULL, '0.01212', NULL, NULL),
(78, 'Fm Panama Cz', 'PCZ', 'EUR', NULL, '0.01212', NULL, NULL),
(79, 'Fm Rhod Nyas', 'ZW1', 'EUR', NULL, '0.01212', NULL, NULL),
(80, 'Fm Tanganyik', 'TAN', 'EUR', NULL, '0.01212', NULL, NULL),
(81, 'Fm Vietnam Dr', 'VDR', 'EUR', NULL, '0.01212', NULL, NULL),
(82, 'Fm Vietnam Rp', 'SVR', 'EUR', NULL, '0.01212', NULL, NULL),
(83, 'Fm Zanz-Pemb', 'ZPM', 'EUR', NULL, '0.01212', NULL, NULL),
(84, 'Fr. So. Ant. Tr', 'ATF', 'EUR', NULL, '0.01212', NULL, NULL),
(85, 'France', 'FRA', 'EUR', NULL, '0.01212', NULL, NULL),
(86, 'Free Zones', 'FRE', 'EUR', NULL, '0.01212', NULL, NULL),
(87, 'French Guiana', 'GUF', 'EUR', NULL, '0.01212', NULL, NULL),
(88, 'French Polynesia', 'PYF', 'XPF', NULL, '1.4465', NULL, NULL),
(89, 'Gabon', 'GAB', 'XAF', NULL, '7.9512', NULL, NULL),
(90, 'Gambia, The', 'GMB', 'GMD', NULL, '0.6964', NULL, NULL),
(91, 'Gaza Strip', 'GAZ', 'GMD', NULL, '0.6964', NULL, NULL),
(92, 'Georgia', 'GEO', 'GEL', NULL, '0.03702', NULL, NULL),
(93, 'German Democratic Republic', 'DDR', 'GEL', NULL, '0.03702', NULL, NULL),
(94, 'Germany', 'DEU', 'EUR', NULL, '0.01212', NULL, NULL),
(95, 'Ghana', 'GHA', 'GHS', NULL, '0.1038', NULL, NULL),
(96, 'Gibraltar', 'GIB', 'GIP', NULL, '0.01029', NULL, NULL),
(97, 'Greece', 'GRC', 'EUR', NULL, '0.01212', NULL, NULL),
(98, 'Greenland', 'GRL', 'DKK', NULL, '0.09043', NULL, NULL),
(99, 'Grenada', 'GRD', 'XCD', NULL, '0.03485', NULL, NULL),
(100, 'Guadeloupe', 'GLP', 'EUR', NULL, '0.01212', NULL, NULL),
(101, 'Guam', 'GUM', 'USD', NULL, '0.01291', NULL, NULL),
(102, 'Guatemala', 'GTM', 'GTQ', NULL, '0.09877', NULL, NULL),
(103, 'Guinea', 'GIN', 'GNF', NULL, '113.9317', NULL, NULL),
(104, 'Guinea-Bissau', 'GNB', 'XOF', NULL, '7.9512', NULL, NULL),
(105, 'Guyana', 'GUY', 'GYD', NULL, '2.6937', NULL, NULL),
(106, 'Haiti', 'HTI', 'USD', NULL, '0.01291', NULL, NULL),
(107, 'Holy See', 'VAT', 'AUD', NULL, '0.01819', NULL, NULL),
(108, 'Honduras', 'HND', 'HNL', NULL, '0.3173', NULL, NULL),
(109, 'Hong Kong, China', 'HKG', 'HKD', NULL, '0.1014', NULL, NULL),
(110, 'Hungary', 'HUN', 'HUF', NULL, '4.635', NULL, NULL),
(111, 'Iceland', 'ISL', 'ISK', NULL, '1.6834', NULL, NULL),
(112, 'India', 'IND', 'INR', NULL, '1', NULL, NULL),
(113, 'Indonesia', 'IDN', 'IDR', NULL, '187.5873', NULL, NULL),
(114, 'Iran, Islamic Rep.', 'IRN', 'IRR', NULL, '540.172', NULL, NULL),
(115, 'Iraq', 'IRQ', 'IQD', NULL, '18.7944', NULL, NULL),
(116, 'Ireland', 'IRL', 'EUR', NULL, '0.01212', NULL, NULL),
(117, 'Israel', 'ISR', 'ILS', NULL, '0.04327', NULL, NULL),
(118, 'Italy', 'ITA', 'EUR', NULL, '0.01212', NULL, NULL),
(119, 'Jamaica', 'JAM', 'JMD', NULL, '1.9994', NULL, NULL),
(120, 'Japan', 'JPN', 'JPY', NULL, '1.6501', NULL, NULL),
(121, 'Jhonston Island', 'JTN', 'GBP', NULL, '0.01029', NULL, NULL),
(122, 'Jordan', 'JOR', 'JOD', NULL, '0.009152', NULL, NULL),
(123, 'Kazakhstan', 'KAZ', 'KZT', NULL, '5.4517', NULL, NULL),
(124, 'Kenya', 'KEN', 'KES', NULL, '1.5087', NULL, NULL),
(125, 'Kiribati', 'KIR', 'AUD', NULL, '0.01819', NULL, NULL),
(126, 'Korea, Dem. Rep.', 'PRK', 'AUD', NULL, '0.01819', NULL, NULL),
(127, 'Korea, Rep.', 'KOR', 'AUD', NULL, '0.01819', NULL, NULL),
(128, 'Kuwait', 'KWT', 'AUD', NULL, '0.01819', NULL, NULL),
(129, 'Kyrgyz Republic', 'KGZ', 'AUD', NULL, '0.01819', NULL, NULL),
(130, 'Lao PDR', 'LAO', 'AUD', NULL, '0.01819', NULL, NULL),
(131, 'Latvia', 'LVA', 'EUR', NULL, '0.01212', NULL, NULL),
(132, 'Lebanon', 'LBN', 'LBP', NULL, '19.4583', NULL, NULL),
(133, 'Lesotho', 'LSO', 'ZAR', NULL, '0.2036', NULL, NULL),
(134, 'Liberia', 'LBR', 'LRD', NULL, '1.9691', NULL, NULL),
(135, 'Libya', 'LBY', 'LYD', NULL, '0.06216', NULL, NULL),
(136, 'Liechtenstein', 'LIE', 'CHF', NULL, '0.01251', NULL, NULL),
(137, 'Lithuania', 'LTU', 'EUR', NULL, '0.01212', NULL, NULL),
(138, 'Luxembourg', 'LUX', 'EUR', NULL, '0.01212', NULL, NULL),
(139, 'Macao', 'MAC', 'MOP', NULL, '0.1045', NULL, NULL),
(140, 'Macedonia, FYR', 'MKD', 'MOP', NULL, '0.1045', NULL, NULL),
(141, 'Madagascar', 'MDG', 'MGA', NULL, '51.4839', NULL, NULL),
(142, 'Malawi', 'MWI', 'MWK', NULL, '10.5726', NULL, NULL),
(143, 'Malaysia', 'MYS', 'MYR', NULL, '0.05661', NULL, NULL),
(144, 'Maldives', 'MDV', 'MVR', NULL, '0.198', NULL, NULL),
(145, 'Mali', 'MLI', 'XOF', NULL, '7.9512', NULL, NULL),
(146, 'Malta', 'MLT', 'EUR', NULL, '0.01212', NULL, NULL),
(147, 'Marshall Islands', 'MHL', 'EUR', NULL, '0.01212', NULL, NULL),
(148, 'Martinique', 'MTQ', 'EUR', NULL, '0.01212', NULL, NULL),
(149, 'Mauritania', 'MRT', 'MRU', NULL, '0.4692', NULL, NULL),
(150, 'Mauritius', 'MUS', 'MUR', NULL, '0.5529', NULL, NULL),
(151, 'Mexico', 'MEX', 'MXV', NULL, NULL, NULL, NULL),
(152, 'Micronesia, Fed. Sts.', 'FSM', 'USD', NULL, '0.01291', NULL, NULL),
(153, 'Midway Islands', 'MID', 'USD', NULL, '0.01291', NULL, NULL),
(154, 'Moldova', 'MDA', 'MDL', NULL, '0.2466', NULL, NULL),
(155, 'Monaco', 'MCO', 'EUR', NULL, '0.01212', NULL, NULL),
(156, 'Mongolia', 'MNG', 'MNT', NULL, '40.3441', NULL, NULL),
(157, 'Montserrat', 'MSR', 'XCD', NULL, '0.03485', NULL, NULL),
(158, 'Morocco', 'MAR', 'MAD', NULL, '0.1255', NULL, NULL),
(159, 'Mozambique', 'MOZ', 'MZN', NULL, '0.8231', NULL, NULL),
(160, 'Myanmar', 'MMR', 'MMK', NULL, '23.8428', NULL, NULL),
(161, 'Namibia', 'NAM', 'ZAR', NULL, '0.2036', NULL, NULL),
(162, 'Nauru', 'NRU', 'AUD', NULL, '0.01819', NULL, NULL),
(163, 'Nepal', 'NPL', 'NPR', NULL, '1.6', NULL, NULL),
(164, 'Netherlands', 'NLD', 'EUR', NULL, '0.01212', NULL, NULL),
(165, 'Netherlands Antilles', 'ANT', 'EUR', NULL, '0.01212', NULL, NULL),
(166, 'Neutral Zone', 'NZE', 'EUR', NULL, '0.01212', NULL, NULL),
(167, 'New Caledonia', 'NCL', 'XPF', NULL, '1.4465', NULL, NULL),
(168, 'New Zealand', 'NZL', 'NZD', NULL, '0.01999', NULL, NULL),
(169, 'Nicaragua', 'NIC', 'NIO', NULL, '0.4632', NULL, NULL),
(170, 'Niger', 'NER', 'NIO', NULL, '0.4632', NULL, NULL),
(171, 'Nigeria', 'NGA', 'NGN', NULL, '5.3664', NULL, NULL),
(172, 'Niue', 'NIU', 'NZD', NULL, '0.01999', NULL, NULL),
(173, 'Norfolk Island', 'NFK', 'AUD', NULL, '0.01819', NULL, NULL),
(174, 'Northern Mariana Islands', 'MNP', 'AUD', NULL, '0.01819', NULL, NULL),
(175, 'Norway', 'NOR', 'NOK', NULL, '0.1245', NULL, NULL),
(176, 'Oman', 'OMN', 'OMR', NULL, '0.004963', NULL, NULL),
(177, 'Pacific Islands', 'PCE', '', NULL, NULL, NULL, NULL),
(178, 'Pakistan', 'PAK', 'PKR', NULL, '2.5823', NULL, NULL),
(179, 'Palau', 'PLW', 'USD', NULL, '0.01291', NULL, NULL),
(180, 'Panama', 'PAN', 'USD', NULL, '0.01291', NULL, NULL),
(181, 'Papua New Guinea', 'PNG', 'PGK', NULL, '0.04548', NULL, NULL),
(182, 'Paraguay', 'PRY', 'PYG', NULL, '89.1626', NULL, NULL),
(183, 'Pen Malaysia', 'PMY', 'PYG', NULL, '89.1626', NULL, NULL),
(184, 'Peru', 'PER', 'PEN', NULL, '0.0481', NULL, NULL),
(185, 'Philippines', 'PHL', 'PEN', NULL, '0.0481', NULL, NULL),
(186, 'Pitcairn', 'PCN', 'NZD', NULL, '0.01999', NULL, NULL),
(187, 'Poland', 'POL', 'PLN', NULL, '0.05591', NULL, NULL),
(188, 'Portugal', 'PRT', 'EUR', NULL, '0.01212', NULL, NULL),
(189, 'Puerto Rico', 'PRI', 'USD', NULL, '0.01291', NULL, NULL),
(190, 'Qatar', 'QAT', 'QAR', NULL, '0.04698', NULL, NULL),
(191, 'Reunion', 'REU', 'MKD', NULL, '0.7532', NULL, NULL),
(192, 'Romania', 'ROM', 'RON', NULL, '0.05986', NULL, NULL),
(193, 'Russian Federation', 'RUS', 'RON', NULL, '0.05986', NULL, NULL),
(194, 'Rwanda', 'RWA', 'EUR', NULL, '0.01212', NULL, NULL),
(195, 'Ryukyu Is', 'RYU', 'EUR', NULL, '0.01212', NULL, NULL),
(196, 'Sabah', 'SBH', '', NULL, NULL, NULL, NULL),
(197, 'Saint Helena', 'SHN', 'EUR', NULL, '0.01212', NULL, NULL),
(198, 'Saint Kitts-Nevis-Anguilla-Aru', 'KN1', 'XCD', NULL, '0.03485', NULL, NULL),
(199, 'Saint Pierre and Miquelon', 'SPM', 'EUR', NULL, '0.01212', NULL, NULL),
(200, 'Samoa', 'WSM', 'WST', NULL, '0.03335', NULL, NULL),
(201, 'San Marino', 'SMR', 'EUR', NULL, '0.01212', NULL, NULL),
(202, 'Sao Tome and Principe', 'STP', 'STN', NULL, '0.297', NULL, NULL),
(203, 'Sarawak', 'SWK', 'STN', NULL, '0.297', NULL, NULL),
(204, 'Saudi Arabia', 'SAU', 'SAR', NULL, '0.0484', NULL, NULL),
(205, 'Senegal', 'SEN', 'XOF', NULL, '7.9512', NULL, NULL),
(206, 'Seychelles', 'SYC', 'SCR', NULL, '0.1722', NULL, NULL),
(207, 'Sierra Leone', 'SLE', 'SLL', NULL, '166.5667', NULL, NULL),
(208, 'SIKKIM', 'SIK', 'SLL', NULL, '166.5667', NULL, NULL),
(209, 'Singapore', 'SGP', 'SGD', NULL, '0.01776', NULL, NULL),
(210, 'Slovak Republic', 'SVK', 'XSU', NULL, NULL, NULL, NULL),
(211, 'Slovenia', 'SVN', 'EUR', NULL, '0.01212', NULL, NULL),
(212, 'Solomon Islands', 'SLB', 'SBD', NULL, '0.1026', NULL, NULL),
(213, 'Somalia', 'SOM', 'SOS', NULL, '7.4485', NULL, NULL),
(214, 'South Africa', 'ZAF', 'ZAR', NULL, '0.2036', NULL, NULL),
(215, 'Soviet Union', 'SVU', 'SSP', NULL, '5.7382', NULL, NULL),
(216, 'Spain', 'ESP', 'EUR', NULL, '0.01212', NULL, NULL),
(217, 'Special Categories', 'SPE', 'EUR', NULL, '0.01212', NULL, NULL),
(218, 'Sri Lanka', 'LKA', 'LKR', NULL, '4.5896', NULL, NULL),
(219, 'St. Kitts and Nevis', 'KNA', 'LKR', NULL, '4.5896', NULL, NULL),
(220, 'St. Lucia', 'LCA', 'LKR', NULL, '4.5896', NULL, NULL),
(221, 'St. Vincent and the Grenadines', 'VCT', 'LKR', NULL, '4.5896', NULL, NULL),
(222, 'Sudan', 'SDN', 'LKR', NULL, '4.5896', NULL, NULL),
(223, 'Suriname', 'SUR', 'SRD', NULL, '0.27', NULL, NULL),
(224, 'Svalbard and Jan Mayen Is', 'SJM', 'NOK', NULL, '0.1245', NULL, NULL),
(225, 'Swaziland', 'SWZ', 'SZL', NULL, '0.2036', NULL, NULL),
(226, 'Sweden', 'SWE', 'SEK', NULL, '0.1273', NULL, NULL),
(227, 'Switzerland', 'CHE', 'CHW', NULL, NULL, NULL, NULL),
(228, 'Syrian Arab Republic', 'SYR', 'SYP', NULL, '32.4522', NULL, NULL),
(229, 'Taiwan', 'TWN', '', NULL, NULL, NULL, NULL),
(230, 'Tajikistan', 'TJK', 'TJS', NULL, '0.161', NULL, NULL),
(231, 'Tanzania', 'TZA', 'TJS', NULL, '0.161', NULL, NULL),
(232, 'Thailand', 'THA', 'THB', NULL, '0.4424', NULL, NULL),
(233, 'Togo', 'TGO', 'XOF', NULL, '7.9512', NULL, NULL),
(234, 'Tokelau', 'TKL', 'NZD', NULL, '0.01999', NULL, NULL),
(235, 'Tonga', 'TON', 'TOP', NULL, '0.02996', NULL, NULL),
(236, 'Trinidad and Tobago', 'TTO', 'TTD', NULL, '0.08769', NULL, NULL),
(237, 'Tunisia', 'TUN', 'TND', NULL, '0.03652', NULL, NULL),
(238, 'Turkey', 'TUR', 'TRY', NULL, '0.2044', NULL, NULL),
(239, 'Turkmenistan', 'TKM', 'TMT', NULL, '0.04515', NULL, NULL),
(240, 'Turks and Caicos Isl.', 'TCA', 'TMT', NULL, '0.04515', NULL, NULL),
(241, 'Tuvalu', 'TUV', 'AUD', NULL, '0.01819', NULL, NULL),
(242, 'Uganda', 'UGA', 'UGX', NULL, '47.1887', NULL, NULL),
(243, 'Ukraine', 'UKR', 'UAH', NULL, '0.3792', NULL, NULL),
(244, 'United Arab Emirates', 'ARE', 'UAH', NULL, '0.3792', NULL, NULL),
(245, 'United Kingdom', 'GBR', 'AED', NULL, '0.0474', NULL, NULL),
(246, 'United States', 'USA', 'GBP', NULL, '0.01029', NULL, NULL),
(247, 'Unspecified', 'UNS', 'USN', NULL, NULL, NULL, NULL),
(248, 'Uruguay', 'URY', 'UYU', NULL, '0.5189', NULL, NULL),
(249, 'Us Msc.Pac.I', 'USP', 'UYU', NULL, '0.5189', NULL, NULL),
(250, 'Uzbekistan', 'UZB', 'UZS', NULL, '143.1395', NULL, NULL),
(251, 'Vanuatu', 'VUT', 'VUV', NULL, '1.4967', NULL, NULL),
(252, 'Venezuela', 'VEN', 'VUV', NULL, '1.4967', NULL, NULL),
(253, 'Vietnam', 'VNM', 'VND', NULL, '301.3358', NULL, NULL),
(254, 'Virgin Islands (U.S.)', 'VIR', 'USD', NULL, '0.01291', NULL, NULL),
(255, 'Wake Island', 'WAK', '', NULL, NULL, NULL, NULL),
(256, 'Wallis and Futura Isl.', 'WLF', 'XPF', NULL, '1.4465', NULL, NULL),
(257, 'Western Sahara', 'ESH', 'MAD', NULL, '0.1255', NULL, NULL),
(258, 'World', 'WLD', 'MAD', NULL, '0.1255', NULL, NULL),
(259, 'Yemen Democratic', 'YDR', 'YER', NULL, '3.2314', NULL, NULL),
(260, 'Yemen, Rep.', 'YEM', 'YER', NULL, '3.2314', NULL, NULL),
(261, 'Yugoslavia', 'SER', 'YER', NULL, '3.2314', NULL, NULL),
(262, 'Yugoslavia, FR (Serbia/Montene', 'YUG', 'YER', NULL, '3.2314', NULL, NULL),
(263, 'Zambia', 'ZMB', 'ZMW', NULL, '0.2207', NULL, NULL),
(264, 'Zimbabwe', 'ZWE', 'EUR', NULL, '0.01212', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(40) NOT NULL,
  `title` varchar(400) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `status`, `updated_at`, `created_at`) VALUES
(1, 'hai 12', 1, '2022-06-13 02:44:47', '2022-06-13 02:15:53'),
(2, 'hai', 1, '2022-06-13 02:45:14', '2022-06-13 02:45:14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `firms`
--

CREATE TABLE `firms` (
  `id` int(40) NOT NULL,
  `comapany_name` varchar(400) DEFAULT NULL,
  `legal_name` varchar(400) DEFAULT NULL,
  `have_tax` int(1) DEFAULT NULL,
  `taxation_number` varchar(400) DEFAULT NULL,
  `register_on` varchar(40) DEFAULT NULL,
  `about_us` text DEFAULT NULL,
  `logo` varchar(400) DEFAULT NULL,
  `register_address` text DEFAULT NULL,
  `country_id` int(40) DEFAULT NULL,
  `state_id` int(40) DEFAULT NULL,
  `city_id` int(40) DEFAULT NULL,
  `zipcode` varchar(40) DEFAULT NULL,
  `cname` text DEFAULT NULL,
  `ctitle` text DEFAULT NULL,
  `cemail` text DEFAULT NULL,
  `cmobile` text DEFAULT NULL,
  `cphone` text DEFAULT NULL,
  `categorie_id` varchar(400) DEFAULT NULL,
  `account_number` varchar(400) DEFAULT NULL,
  `account_name` varchar(400) DEFAULT NULL,
  `ifsc_code` varchar(400) DEFAULT NULL,
  `bank_name` varchar(400) DEFAULT NULL,
  `branch` varchar(400) DEFAULT NULL,
  `bank_status` int(4) DEFAULT NULL,
  `email` varchar(400) DEFAULT NULL,
  `user_name` varchar(400) DEFAULT NULL,
  `role` varchar(40) DEFAULT NULL,
  `login_status` int(4) DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `sunday` text DEFAULT NULL,
  `monday` text DEFAULT NULL,
  `tuesday` text DEFAULT NULL,
  `wednesday` text DEFAULT NULL,
  `thursday` text DEFAULT NULL,
  `friday` text DEFAULT NULL,
  `saturday` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `firms`
--

INSERT INTO `firms` (`id`, `comapany_name`, `legal_name`, `have_tax`, `taxation_number`, `register_on`, `about_us`, `logo`, `register_address`, `country_id`, `state_id`, `city_id`, `zipcode`, `cname`, `ctitle`, `cemail`, `cmobile`, `cphone`, `categorie_id`, `account_number`, `account_name`, `ifsc_code`, `bank_name`, `branch`, `bank_status`, `email`, `user_name`, `role`, `login_status`, `gallery`, `updated_at`, `created_at`, `status`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES
(1, 'dfd', 'fd', 1, '45457', '06/03/2022', '<p>fdgfdgf</p>', 'E:\\xampp\\tmp\\php4FBB.tmp', '<p>dghdhgd</p>', 100, 25, 1, '600035', 'arun,eruyyt', 'yuy,yuy', 'admin@gmail.com,admin@gmail.com', '+915678,45678', '+91,aerewr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-20 21:42:08', '2022-06-20 21:42:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` int(40) NOT NULL,
  `comapany_name` varchar(400) DEFAULT NULL,
  `legal_name` varchar(400) DEFAULT NULL,
  `have_tax` int(1) DEFAULT NULL,
  `taxation_number` varchar(400) DEFAULT NULL,
  `register_on` varchar(40) DEFAULT NULL,
  `logo` varchar(400) DEFAULT NULL,
  `consultant_type` varchar(400) DEFAULT NULL,
  `register_address` text DEFAULT NULL,
  `country_id` int(40) DEFAULT NULL,
  `state_id` int(40) DEFAULT NULL,
  `city_id` int(40) DEFAULT NULL,
  `zipcode` varchar(40) DEFAULT NULL,
  `cname` text DEFAULT NULL,
  `ctitle` text DEFAULT NULL,
  `cemail` text DEFAULT NULL,
  `cmobile` text DEFAULT NULL,
  `cphone` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `comapany_name`, `legal_name`, `have_tax`, `taxation_number`, `register_on`, `logo`, `consultant_type`, `register_address`, `country_id`, `state_id`, `city_id`, `zipcode`, `cname`, `ctitle`, `cemail`, `cmobile`, `cphone`, `updated_at`, `created_at`, `status`) VALUES
(1, 'Arun', 'arun', 1, '4545545654', '06/03/2022', 'E:\\xampp\\tmp\\php990D.tmp', 'video_consultation,audio_voice_call_consultation,text_consultation', '<p>dfsdgsfdgsda</p>', 100, 25, 1, '60092', 'Arun pandian,Arun pandian', 'pandian,pandian', 'admin@admin.com,admin@admin.com', '8056472742,8056472742', '+918056472756,8056472742', '2022-06-22 22:01:24', '2022-06-22 22:01:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_22_144618_create_permission_tables', 1),
(5, '2021_04_14_044507_create_settings_table', 1),
(6, '2021_06_15_022916_create_user_infos_table', 1),
(7, '2021_06_23_041411_create_activity_log_table', 1),
(8, '2021_06_23_041412_add_event_column_to_activity_log_table', 1),
(9, '2021_06_23_041413_add_batch_uuid_column_to_activity_log_table', 1),
(10, '2021_11_04_200820_add_api_token_column', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '100', 'Andhra Pradesh', '1', '2021-08-18 23:32:53', '2021-08-19 00:11:59'),
(2, '100', 'Arunachal Pradesh', '1', '2021-08-19 00:12:17', '2021-08-19 00:12:17'),
(3, '100', 'Assam', '1', '2021-08-19 00:12:45', '2021-08-19 00:12:45'),
(4, '100', 'Bihar', '1', '2021-08-19 00:13:10', '2021-08-19 00:13:10'),
(5, '100', 'Chhattisgarh', '1', '2021-08-19 00:13:25', '2021-08-19 00:13:25'),
(6, '100', 'Delhi', '1', '2021-08-19 00:13:42', '2021-08-19 00:13:42'),
(7, '100', 'Goa', '1', '2021-08-19 00:14:00', '2021-08-19 00:14:00'),
(8, '100', 'Gujarat', '1', '2021-08-19 00:14:20', '2021-08-19 00:14:20'),
(9, '100', 'Haryana', '1', '2021-08-19 00:14:38', '2021-08-19 00:14:38'),
(10, '100', 'Himachal Pradesh', '1', '2021-08-19 00:14:56', '2021-08-19 00:14:56'),
(11, '100', 'Jammu & Kashmir', '1', '2021-08-19 00:15:21', '2021-08-19 00:15:21'),
(12, '100', 'Jharkhand', '1', '2021-08-19 00:15:45', '2021-08-19 00:15:45'),
(13, '100', 'Karnataka', '1', '2021-08-19 00:16:02', '2021-08-19 00:16:02'),
(14, '100', 'Kerala', '1', '2021-08-19 00:16:33', '2021-08-19 00:16:33'),
(15, '100', 'Madhya Pradesh', '1', '2021-08-19 00:16:48', '2021-08-19 00:16:48'),
(16, '100', 'Maharashtra', '1', '2021-08-19 00:17:07', '2021-08-19 00:17:07'),
(17, '100', 'Manipur', '1', '2021-08-19 00:17:23', '2021-08-19 00:17:23'),
(18, '100', 'Meghalaya', '1', '2021-08-19 00:17:52', '2021-08-19 00:17:52'),
(19, '100', 'Mizoram', '1', '2021-08-19 00:18:11', '2021-08-19 00:18:11'),
(20, '100', 'Nagaland', '1', '2021-08-19 00:18:29', '2021-08-19 00:18:29'),
(21, '100', 'Odisha', '1', '2021-08-19 00:18:45', '2021-08-19 00:18:45'),
(22, '100', 'Punjab', '1', '2021-08-19 00:19:23', '2021-08-19 00:19:23'),
(23, '100', 'Rajasthan', '1', '2021-08-19 00:19:40', '2021-08-19 00:19:40'),
(24, '100', 'Sikkim', '1', '2021-08-19 00:20:14', '2021-08-19 00:20:14'),
(25, '100', 'Tamil Nadu', '1', '2021-08-19 00:20:52', '2021-08-19 00:20:52'),
(26, '100', 'Telegana', '1', '2021-08-19 00:21:09', '2021-08-19 00:21:09'),
(27, '100', 'Tripura', '1', '2021-08-19 00:21:25', '2021-08-19 00:21:25'),
(28, '100', 'Uttar Pradesh', '1', '2021-08-19 00:21:44', '2021-08-19 00:21:44'),
(29, '100', 'Uttarakhand', '1', '2021-08-19 00:22:02', '2021-08-19 00:22:02'),
(30, '100', 'West Bengal', '1', '2021-08-19 00:22:22', '2021-08-19 00:22:22'),
(60, '230', 'Abu Dhabi', '1', '2021-10-22 08:47:46', '2021-10-22 08:47:46'),
(66, '231', 'Dubai', '1', '2021-12-28 04:05:22', '2021-12-28 04:05:22'),
(73, '100', 'Puducherry', '1', '2022-01-18 07:29:25', '2022-01-18 07:29:25'),
(74, '100', 'Lakshadweep Islands', '1', '2022-01-18 07:35:52', '2022-01-18 07:35:52'),
(75, '100', 'Andaman and Nicobar Islands', '1', '2022-01-18 07:38:08', '2022-01-18 07:38:08'),
(76, '100', 'Chandigarh', '1', '2022-01-18 07:38:31', '2022-01-18 07:38:31'),
(77, '100', 'Dadra & Nagar Haveli', '1', '2022-01-18 07:40:01', '2022-01-18 07:40:01'),
(78, '100', 'Ladakh', '1', '2022-01-18 07:40:23', '2022-01-18 07:40:23'),
(79, '100', 'select State', '1', '2022-01-28 07:31:11', '2022-01-28 07:31:11'),
(80, 'Select Country', 'Select State', '1', '2022-02-03 00:36:12', '2022-02-03 00:36:12'),
(81, '100', 'Delhi 12', '1', '2022-06-02 21:14:16', '2022-06-02 21:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `picture`, `phone`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Adella', 'Kuhic', 'demo@demo.com', '2022-05-30 23:32:47', '$2y$10$.Fg1QOaL1qrYdxnNBfa/fe7sXhLMLm2n3pjf5Uyd/jHaEjOVHgsq.', NULL, NULL, NULL, '', '', '2022-05-30 23:32:47', '2022-05-30 23:32:47'),
(2, 'Tiffany', 'Simonis', 'admin@demo.com', '2022-05-30 23:32:48', '$2y$10$3J6uZJ69IpQLXUkrgkxzZe2k.WCnEbTq8lJ1z4v4fzCJ3nd0my2aC', NULL, NULL, NULL, '', '', '2022-05-30 23:32:48', '2022-05-30 23:32:48'),
(3, 'Myra', 'Bartell', 'violet80@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'vNWhhi9WL1', NULL, '', '', '2022-05-30 23:32:48', '2022-05-30 23:32:48'),
(4, 'Doug', 'Baumbach', 'soledad.beahan@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'hdaQTYhBq1', NULL, '', '', '2022-05-30 23:32:48', '2022-05-30 23:32:48'),
(5, 'Mayra', 'Prosacco', 'bhoeger@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'gsK7kk9bSR', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(6, 'Eino', 'Konopelski', 'cornell24@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'd27KK3w7Go', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(7, 'Lucio', 'Gorczany', 'will45@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'JDwwl3hrn9', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(8, 'Dusty', 'Wilkinson', 'blair.lockman@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'QM9lRec1xR', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(9, 'Cornell', 'Muller', 'dkassulke@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Wrp2RXyGRH', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(10, 'Dave', 'Keeling', 'elouise.stroman@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '7luZ4AsKBL', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(11, 'Ronny', 'Marks', 'spencer.meredith@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'mJe2aSxJRn', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(12, 'Ella', 'Heathcote', 'brekke.moses@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '39B7HtOOUi', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(13, 'Luther', 'Wiegand', 'cathryn.bailey@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'lVpCVPh29T', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(14, 'Troy', 'Bednar', 'katharina.powlowski@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'DMCzkkosJ6', NULL, '', '', '2022-05-30 23:32:49', '2022-05-30 23:32:49'),
(15, 'Anais', 'Tromp', 'gleichner.burdette@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'xDv5wEY36u', NULL, '', '', '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(16, 'Veronica', 'Lindgren', 'nkohler@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '7ECxdgodck', NULL, '', '', '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(17, 'Darrion', 'Schmidt', 'dale.mayer@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'GQrBzPPwWQ', NULL, '', '', '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(18, 'Rowan', 'Keebler', 'torphy.melody@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'tG8Qi4Dr6U', NULL, '', '', '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(19, 'Adrain', 'Schaden', 'orlo.wehner@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'wu21x6wjV7', NULL, '', '', '2022-05-30 23:32:50', '2022-05-30 23:32:50'),
(20, 'Cali', 'Kuhic', 'tomas72@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'vCcRJkKdnT', NULL, '', '', '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(21, 'Bessie', 'Thiel', 'rbarrows@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'PUQ7V0FW3A', NULL, '', '', '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(22, 'Freeda', 'Reilly', 'whayes@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'LUzoh1mpUF', NULL, '', '', '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(23, 'Peyton', 'Eichmann', 'bins.aleen@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'r3vnZt0fru', NULL, '', '', '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(24, 'Eric', 'Hand', 'greg90@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'w9N0ptoGkQ', NULL, '', '', '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(25, 'Vicenta', 'Cummings', 'noble15@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '47n2U4BBL1', NULL, '', '', '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(26, 'Shayna', 'Wisozk', 'qortiz@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'JqpfuccwjZ', NULL, '', '', '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(27, 'Luther', 'Schaefer', 'ernestine58@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Xj1VOHnZpv', NULL, '', '', '2022-05-30 23:32:51', '2022-05-30 23:32:51'),
(28, 'Lucienne', 'Kiehn', 'npouros@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'qZdP4mzi6L', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(29, 'Justina', 'Kilback', 'prohaska.toney@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'hMqJwdMULA', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(30, 'Lina', 'Daniel', 'nadia.kunde@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'wofsNwNTER', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(31, 'Eugenia', 'Miller', 'von.evalyn@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'siz8q3o9Ih', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(32, 'Wilfredo', 'Harvey', 'feil.molly@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'HCUrzRBIMh', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(33, 'Vern', 'Oberbrunner', 'domenico35@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Ju0t2tu3pQ', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(34, 'Willy', 'Feil', 'luna.gutmann@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'VJKQowc12Q', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(35, 'Leanne', 'Franecki', 'angelica.thiel@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Yp8VL4f5DX', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(36, 'Johathan', 'Ward', 'rosella.schmidt@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'islaRktdZC', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(37, 'Sienna', 'Brown', 'strosin.loyal@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'cI8RwnBeTk', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(38, 'Audrey', 'Bechtelar', 'kschmeler@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'eYqx0vNqIt', NULL, '', '', '2022-05-30 23:32:52', '2022-05-30 23:32:52'),
(39, 'Maxine', 'Reichert', 'olaf.jones@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '9hN2UfnIjk', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(40, 'Martina', 'Kihn', 'stefanie41@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '3bO2PPSgKM', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(41, 'Caterina', 'Emmerich', 'hickle.marley@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'RqFtS5DYuj', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(42, 'Fletcher', 'Conn', 'breitenberg.verlie@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'CeBuKHXpqH', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(43, 'Julien', 'Pouros', 'bechtelar.noel@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'ETEzcQtscJ', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(44, 'Sabrina', 'Rowe', 'pascale61@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'wDGCAv6is9', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(45, 'Edna', 'Kuphal', 'cecil61@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'aBPIBCJQZK', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(46, 'Shania', 'Gorczany', 'tiana.rath@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'faiIJfeqpf', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(47, 'Nolan', 'Huel', 'littel.lenna@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'B4P43TV9aa', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(48, 'Savannah', 'Carter', 'brycen.rath@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2hKsp9qBnb', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(49, 'Gennaro', 'Thiel', 'emely38@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'xNK46wLQU6', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(50, 'Emmalee', 'Hettinger', 'gusikowski.beverly@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'lMWYcUju9b', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(51, 'Josue', 'Monahan', 'heller.concepcion@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'woQzsvoKk8', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(52, 'Cleora', 'Hagenes', 'eve87@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Qe8tyTItfI', NULL, '', '', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(53, 'Lilliana', 'Towne', 'darion75@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'wGM7TbQry6', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(54, 'Kristy', 'Bradtke', 'dbuckridge@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'IGB9DeXOqm', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(55, 'Jimmy', 'Fisher', 'bkemmer@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'eLSMZ1EZMz', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(56, 'Chelsey', 'Simonis', 'prodriguez@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2lIGcuSIDa', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(57, 'Toby', 'Funk', 'bashirian.micheal@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'sNdABEIvNC', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(58, 'Kian', 'Volkman', 'oromaguera@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '5X6pOK7bgF', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(59, 'Beverly', 'Macejkovic', 'regan.steuber@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'aWc9OtTa0N', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(60, 'Asa', 'Conroy', 'gbotsford@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '0PbiLse3vG', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(61, 'Kaitlin', 'Schmidt', 'alta.reinger@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'zL3hp7Bhhw', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(62, 'Candelario', 'Mayert', 'inikolaus@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'chfQnNoL5Z', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(63, 'Daija', 'Kirlin', 'pagac.bruce@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Ft2b6bXNEl', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(64, 'Modesta', 'Kuphal', 'aubree.rutherford@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'FqS0EP7FsA', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(65, 'Kristy', 'Dietrich', 'oconner.fidel@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'PfF6njgGrb', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(66, 'Alaina', 'Russel', 'remington.gulgowski@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '0DrBZgw1y3', NULL, '', '', '2022-05-30 23:32:54', '2022-05-30 23:32:54'),
(67, 'Esmeralda', 'Rath', 'jkemmer@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'ebJBiUqyBI', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(68, 'Deja', 'Bernier', 'zemlak.madilyn@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'iUyWeWyIG0', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(69, 'Alycia', 'Ratke', 'monte.stamm@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'x0OTyrDU2l', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(70, 'Lupe', 'Olson', 'berge.grover@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'hcrpVidKPL', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(71, 'Amya', 'Barrows', 'ckautzer@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'otUZYqdt2r', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(72, 'Evie', 'Smitham', 'olin.conn@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'DRnjRGv3kT', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(73, 'Lonny', 'Wunsch', 'rmacejkovic@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Q8mk1URpLx', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(74, 'Sheridan', 'Botsford', 'mertz.kristian@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'v1edHyq4hU', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(75, 'Nola', 'Ferry', 'rogahn.ladarius@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'hjoS5xtHBz', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(76, 'Alford', 'Boyle', 'slemke@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '789io6ItBb', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(77, 'Malvina', 'Cole', 'ohills@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'H7eXzxJvYx', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(78, 'Tianna', 'Doyle', 'savion.hackett@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'L2WPrQrhih', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(79, 'Alvera', 'Fay', 'israel09@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'szrNXMIIp0', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(80, 'Rosendo', 'Ankunding', 'delphia13@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'xr4K7jdlj6', NULL, '', '', '2022-05-30 23:32:55', '2022-05-30 23:32:55'),
(81, 'Friedrich', 'Olson', 'block.jesus@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'xDZeSFJhy0', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(82, 'Carrie', 'Purdy', 'ben60@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'i4RaiSaDi6', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(83, 'Haleigh', 'Jacobs', 'mark.schimmel@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '8NPRsNPP0R', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(84, 'Eugenia', 'Armstrong', 'royce07@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'jQDBx1AgF8', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(85, 'Chad', 'Kuvalis', 'jbailey@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '8RG3TaCNBD', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(86, 'Rhiannon', 'Rolfson', 'sauer.itzel@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'uS7xM19Dpr', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(87, 'Norma', 'Howell', 'alejandra.frami@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'RE5yaLNvow', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(88, 'Angelina', 'Nolan', 'klein.dax@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'uLhZuOeooI', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(89, 'Faustino', 'Leffler', 'nader.joshuah@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '4wwfY8EXnN', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(90, 'Electa', 'Langosh', 'giovanni.heidenreich@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '53YuTABkC6', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(91, 'Vilma', 'Ledner', 'branson.schuster@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'ZUs6tU1vV2', NULL, '', '', '2022-05-30 23:32:56', '2022-05-30 23:32:56'),
(92, 'Tia', 'Paucek', 'rosalyn.reinger@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'lJEdrwZFhl', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(93, 'Benjamin', 'Rath', 'orrin06@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'aBL9ZzpNnk', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(94, 'Kareem', 'Wyman', 'qbeatty@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '5MbycG5FA2', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(95, 'Lois', 'Walker', 'jeramie.champlin@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'KTh1BgXg14', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(96, 'Helen', 'Prohaska', 'rozella63@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'bpQEj2aAoe', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(97, 'Waino', 'Kirlin', 'graham.khalil@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'fK75SQXv0c', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(98, 'Christa', 'Schowalter', 'mbechtelar@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'lUP4Ymoxa1', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(99, 'Alba', 'Witting', 'itzel.nitzsche@example.net', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'EeeGL20feL', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(100, 'Abdullah', 'Stamm', 'rogahn.jaylan@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'oRC8ryvikw', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(101, 'Owen', 'Fahey', 'cartwright.tanya@example.org', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'b9s81agotA', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(102, 'Bradly', 'Durgan', 'green.elsa@example.com', '2022-05-30 23:32:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'wHdpOfSuhq', NULL, '', '', '2022-05-30 23:32:57', '2022-05-30 23:32:57'),
(103, 'aRUdf', 'rtrtw', 'admin123@admin.com', NULL, '$2y$10$Bm.Yp9hYdeVN23iQ5kWqY.ansGJIEnYDZpI5lO0rsd4cFXBB7sBUC', 'zZBPnYooGgOi2vOdGZmWDtHGxNgvwFDqfVGh4CDPuSg9oOA3jm2rJsedUV9t', 'xtEUgfYeAY9nZhdh3WXrA5M4Fu9QDGgpsgA1sbQvKr4r5mw6bbododhIgzlq', NULL, '+91123445676878', 'State_Edit,State_download,City_Edit,City_delete,City_download,Document_Create,Document_Edit,Document_View,Document_download,Categoty_Create,Categoty_Edit,Categoty_View,Categoty_download,Consultant_Create,Consultant_download', '2022-06-18 06:28:12', '2022-06-18 06:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `communication` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `avatar`, `company`, `phone`, `website`, `country`, `language`, `timezone`, `currency`, `communication`, `marketing`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Tillman-Goyette', '678.509.7129', 'https://www.mcclure.com/dolore-veniam-expedita-facilis-eligendi-sed', 'BD', 'et', NULL, NULL, NULL, NULL, '2022-05-30 23:32:47', '2022-05-30 23:32:47'),
(2, 2, NULL, 'Greenholt, Homenick and Stanton', '+16014307348', 'http://www.cassin.biz/', 'VE', 'bi', NULL, NULL, NULL, NULL, '2022-05-30 23:32:48', '2022-05-30 23:32:48'),
(3, 3, NULL, 'Kuhlman, O\'Conner and Denesik', '281.781.3767', 'http://www.schinner.org/nostrum-ab-non-soluta-dolores-eligendi-qui-qui', 'SE', 'ie', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(4, 4, NULL, 'McCullough and Sons', '337.970.9268', 'http://hammes.com/ut-ut-sequi-corporis-impedit.html', 'NU', 'mi', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(5, 5, NULL, 'Halvorson Inc', '850.238.6408', 'http://www.leannon.com/voluptate-laborum-illo-enim-quia-laborum', 'KM', 'gd', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(6, 6, NULL, 'DuBuque, Hirthe and Grimes', '(947) 326-5753', 'http://www.conroy.com/', 'CR', 'bo', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(7, 7, NULL, 'Dietrich Group', '760.385.7658', 'http://bins.biz/optio-eum-qui-voluptatem-quod-labore-repudiandae-delectus-quae', 'GU', 'th', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(8, 8, NULL, 'Mueller-Waters', '+1.551.315.6470', 'http://www.gibson.info/velit-dolor-voluptas-perferendis-dolores-dolorem-voluptas-maiores-corrupti', 'KP', 'nd', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(9, 9, NULL, 'Bauch and Sons', '(281) 376-1001', 'http://wiegand.com/', 'GM', 'ja', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(10, 10, NULL, 'Wyman Ltd', '763.870.1835', 'http://www.littel.net/', 'ST', 'ko', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(11, 11, NULL, 'Zieme, Brekke and Larkin', '+1-321-937-4997', 'https://hintz.biz/ab-nam-soluta-nihil-et.html', 'FK', 'li', NULL, NULL, NULL, NULL, '2022-05-30 23:32:58', '2022-05-30 23:32:58'),
(12, 12, NULL, 'Corwin, Cummings and Hintz', '669-783-9919', 'http://www.howell.info/', 'VE', 'av', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(13, 13, NULL, 'Hand PLC', '831-466-8237', 'https://pagac.info/eos-aut-qui-exercitationem-voluptatem-ut-rerum-quis.html', 'RS', 'cy', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(14, 14, NULL, 'Satterfield LLC', '+1.607.851.2617', 'http://okon.com/eos-accusantium-error-aspernatur-dolorem-enim-sed-nihil', 'CX', 'bo', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(15, 15, NULL, 'Veum, Hoppe and Greenfelder', '703-207-1753', 'http://walter.com/nam-praesentium-fugiat-nisi-repudiandae-dolor-necessitatibus', 'LK', 'bi', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(16, 16, NULL, 'Botsford LLC', '(301) 662-1786', 'http://www.abbott.net/', 'AR', 'fi', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(17, 17, NULL, 'Johns, Kling and Muller', '301.251.4360', 'http://welch.com/id-sit-saepe-ea-minima-doloremque-esse', 'TJ', 'be', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(18, 18, NULL, 'Osinski-Wiza', '+1.973.289.0397', 'http://bauch.com/et-est-ut-neque-et-sunt.html', 'IR', 'na', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(19, 19, NULL, 'Gaylord-Kshlerin', '818-863-6686', 'http://www.hammes.info/autem-qui-sunt-quo-quia-omnis-non-rerum', 'PS', 'tt', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(20, 20, NULL, 'Pagac Inc', '+1-979-574-4425', 'https://moen.com/enim-et-non-nihil-et-non-mollitia-aspernatur.html', 'AG', 've', NULL, NULL, NULL, NULL, '2022-05-30 23:32:59', '2022-05-30 23:32:59'),
(21, 21, NULL, 'Ondricka and Sons', '(667) 608-8388', 'http://dickinson.com/nemo-esse-et-maiores-odit-in-veritatis', 'CR', 'mh', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(22, 22, NULL, 'D\'Amore Ltd', '+1 (629) 296-8028', 'http://ondricka.com/atque-sequi-magnam-aliquid-est-rerum-nihil', 'NR', 'lg', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(23, 23, NULL, 'Cummerata-Bradtke', '(480) 210-0773', 'https://www.daugherty.com/numquam-explicabo-nobis-voluptatem-aperiam', 'PT', 'ti', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(24, 24, NULL, 'Moore-Rath', '+1-727-969-5971', 'http://www.ohara.net/', 'SN', 'om', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(25, 25, NULL, 'Jacobson-Dietrich', '(626) 302-2738', 'http://www.jacobi.com/sed-voluptatibus-nobis-ipsa-iste-deleniti-deserunt-quisquam-recusandae', 'MD', 'mn', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(26, 26, NULL, 'Goodwin Inc', '+1 (551) 546-6141', 'http://www.christiansen.com/deleniti-eveniet-qui-consequatur-ullam', 'JP', 'hr', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(27, 27, NULL, 'Hoppe, Corwin and Rau', '715-957-0923', 'http://www.nienow.info/', 'ES', 'vi', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(28, 28, NULL, 'Schmidt Group', '484.386.2371', 'http://www.schoen.com/explicabo-voluptatem-illum-corporis-facere-est-sit-non', 'MG', 'nb', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(29, 29, NULL, 'Rohan PLC', '+18643590075', 'https://gibson.org/aut-ut-quia-exercitationem-eveniet-neque-sint.html', 'UY', 'jv', NULL, NULL, NULL, NULL, '2022-05-30 23:33:00', '2022-05-30 23:33:00'),
(30, 30, NULL, 'Quigley, Mohr and Stracke', '+1-660-580-0832', 'http://www.harris.com/ut-fugiat-doloremque-voluptatem-impedit', 'UY', 'ky', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(31, 31, NULL, 'Ernser, Carter and Vandervort', '+1-484-425-9781', 'http://oberbrunner.com/necessitatibus-enim-repellendus-praesentium-quo-exercitationem-sint', 'IS', 'rw', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(32, 32, NULL, 'Parker Group', '1-225-552-0729', 'http://berge.org/', 'NG', 'my', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(33, 33, NULL, 'Klein-Dach', '+1-854-889-8521', 'http://www.nienow.biz/at-et-molestias-est-nisi-tenetur.html', 'AW', 'yo', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(34, 34, NULL, 'Schmidt and Sons', '1-607-919-8970', 'http://lesch.com/dolorum-suscipit-culpa-incidunt.html', 'GF', 'za', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(35, 35, NULL, 'Little, Feeney and Walsh', '(205) 208-5663', 'http://okon.net/', 'UY', 'ms', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(36, 36, NULL, 'Reynolds, Jacobs and Brakus', '+1.608.320.5000', 'http://white.org/', 'SH', 'sq', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(37, 37, NULL, 'Goodwin, O\'Hara and Walker', '+1-520-870-5963', 'http://www.jones.com/', 'PT', 'no', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(38, 38, NULL, 'Kub Group', '1-443-252-4606', 'http://www.collier.com/itaque-dicta-rerum-quia-placeat-ab', 'MO', 'aa', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(39, 39, NULL, 'Weber Ltd', '1-954-204-5807', 'http://koch.com/', 'PA', 'am', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(40, 40, NULL, 'Christiansen-Barton', '+1.520.823.3017', 'http://www.graham.biz/consequatur-laudantium-rem-quia', 'AW', 'dz', NULL, NULL, NULL, NULL, '2022-05-30 23:33:01', '2022-05-30 23:33:01'),
(41, 41, NULL, 'Goldner, Dietrich and Kozey', '1-838-606-7774', 'http://cummings.net/', 'IS', 'my', NULL, NULL, NULL, NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(42, 42, NULL, 'Denesik-Glover', '(646) 396-4641', 'http://rohan.info/quos-velit-dolore-consectetur-optio-distinctio', 'UA', 'et', NULL, NULL, NULL, NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(43, 43, NULL, 'Ferry PLC', '(681) 661-1610', 'http://www.erdman.com/consequatur-labore-aliquid-ut-ullam-cupiditate-et.html', 'SS', 'ja', NULL, NULL, NULL, NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(44, 44, NULL, 'Balistreri, Yost and Fay', '+1.925.353.5965', 'http://heidenreich.com/neque-odit-qui-sint-velit-dolore-doloribus-enim-nobis.html', 'AU', 'sn', NULL, NULL, NULL, NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(45, 45, NULL, 'Swaniawski-Lindgren', '+1.680.429.8188', 'http://www.heller.com/accusantium-mollitia-in-numquam-magni-corporis-suscipit-et', 'SL', 'fj', NULL, NULL, NULL, NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(46, 46, NULL, 'Casper-Weber', '1-845-277-7030', 'http://www.morar.org/error-et-incidunt-suscipit-fugit-in.html', 'KW', 'fo', NULL, NULL, NULL, NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(47, 47, NULL, 'Schamberger, Bergnaum and Durgan', '430.739.6075', 'https://brown.info/soluta-dolore-doloremque-ut-ut-nobis.html', 'US', 'it', NULL, NULL, NULL, NULL, '2022-05-30 23:33:02', '2022-05-30 23:33:02'),
(48, 48, NULL, 'Stehr-Bernhard', '1-423-937-8146', 'http://thompson.com/iste-sequi-nobis-eum-qui-aut-sit', 'DE', 'nb', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(49, 49, NULL, 'Parisian PLC', '+1 (283) 258-8851', 'https://mante.com/soluta-occaecati-aut-eligendi-minus.html', 'FK', 'oc', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(50, 50, NULL, 'Krajcik, Olson and Reichel', '1-769-994-4314', 'http://monahan.com/veniam-cupiditate-aliquam-est-mollitia-aperiam-tempore-repellat', 'VU', 'hu', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(51, 51, NULL, 'Ortiz Ltd', '(678) 494-4734', 'http://kilback.com/', 'GP', 'sc', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(52, 52, NULL, 'Reichel Inc', '856.406.6814', 'http://www.halvorson.org/ut-molestiae-reprehenderit-doloribus-iure-recusandae-quas-quae-et', 'GF', 'sq', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(53, 53, NULL, 'Gottlieb LLC', '+1 (870) 952-9545', 'http://dickinson.com/', 'ZM', 'lv', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(54, 54, NULL, 'Wiegand Inc', '+1 (629) 287-0137', 'https://www.lemke.com/itaque-sapiente-fugiat-molestiae-ut-perferendis-fugit', 'TW', 'ia', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(55, 55, NULL, 'Schuppe-Mraz', '262.914.9400', 'https://www.shanahan.biz/impedit-voluptas-cumque-non-officiis-sequi', 'IN', 'en', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(56, 56, NULL, 'Lakin, Balistreri and Heaney', '1-732-709-8545', 'http://johns.info/qui-optio-perspiciatis-nostrum-molestiae-commodi', 'PK', 'uk', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(57, 57, NULL, 'Kohler LLC', '+1.703.718.0762', 'http://www.boyle.info/necessitatibus-facilis-explicabo-unde-voluptatem', 'KG', 'la', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(58, 58, NULL, 'Upton-Feeney', '1-260-408-5551', 'http://www.prosacco.com/laboriosam-tenetur-dicta-optio', 'SI', 'lt', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(59, 59, NULL, 'Schmeler-Rohan', '223-405-5722', 'http://legros.com/', 'MK', 'ss', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(60, 60, NULL, 'Huel Group', '312-225-1016', 'http://www.toy.com/', 'GI', 'lg', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(61, 61, NULL, 'Bernier, Strosin and Trantow', '(239) 790-9338', 'https://www.hilpert.com/ut-cupiditate-qui-vitae', 'ID', 'za', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(62, 62, NULL, 'Mann-Gaylord', '+1 (561) 575-9257', 'http://www.bashirian.biz/', 'MK', 'gn', NULL, NULL, NULL, NULL, '2022-05-30 23:33:03', '2022-05-30 23:33:03'),
(63, 63, NULL, 'Krajcik, Russel and Conn', '+1 (937) 428-7786', 'http://www.breitenberg.com/', 'FO', 'ku', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(64, 64, NULL, 'Lesch PLC', '1-551-957-8982', 'http://www.hirthe.com/', 'OM', 'hz', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(65, 65, NULL, 'Welch LLC', '+1-930-757-1964', 'http://www.kunde.com/aut-est-autem-qui', 'LV', 'sg', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(66, 66, NULL, 'Bahringer, Kihn and Doyle', '504.730.9336', 'http://mayert.info/nemo-adipisci-iusto-et-facere', 'PH', 'is', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(67, 67, NULL, 'Predovic Group', '(385) 483-7363', 'http://www.crooks.com/', 'MG', 'hy', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(68, 68, NULL, 'Rowe, Monahan and Ebert', '+1-754-722-5923', 'http://www.haag.com/vero-expedita-exercitationem-nesciunt-blanditiis-voluptatem-eaque.html', 'VA', 'dv', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(69, 69, NULL, 'Gaylord Group', '+1-214-591-6264', 'http://baumbach.com/odio-aut-doloribus-et-qui', 'NF', 'sn', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(70, 70, NULL, 'Considine-Swift', '228-251-2598', 'http://www.koelpin.info/', 'NI', 'wa', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(71, 71, NULL, 'Kuhn-Kuhn', '207.994.2908', 'https://kunze.biz/dolorem-itaque-cupiditate-incidunt-qui-dolores-nam-ea-est.html', 'FR', 'gu', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(72, 72, NULL, 'Conroy, Sawayn and Schulist', '754-509-1939', 'http://www.douglas.info/', 'MH', 'km', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(73, 73, NULL, 'Shields-Thiel', '435.306.6092', 'http://kertzmann.net/', 'ML', 'km', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(74, 74, NULL, 'Bogan, Heathcote and Pollich', '+1-773-372-8847', 'http://www.hackett.org/laudantium-nam-sint-dolores-numquam-a-fugiat-minima', 'PE', 'ng', NULL, NULL, NULL, NULL, '2022-05-30 23:33:04', '2022-05-30 23:33:04'),
(75, 75, NULL, 'Gislason, Hermiston and Turner', '+1-754-378-4469', 'http://www.thompson.biz/', 'HU', 'ko', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(76, 76, NULL, 'Grant PLC', '520-215-5897', 'http://skiles.com/dolor-praesentium-expedita-eum-assumenda-et-aut.html', 'MW', 'sl', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(77, 77, NULL, 'Abernathy and Sons', '+1-870-986-9254', 'http://terry.com/', 'VA', 'kk', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(78, 78, NULL, 'Jerde and Sons', '323-631-6759', 'http://hudson.info/', 'GS', 'be', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(79, 79, NULL, 'Becker-Walsh', '(909) 941-3058', 'http://kreiger.com/provident-fuga-nisi-maxime-ipsum-qui-itaque-harum.html', 'KW', 'tn', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(80, 80, NULL, 'Bechtelar-Buckridge', '+1-445-891-7606', 'http://www.bednar.com/', 'MA', 'hr', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(81, 81, NULL, 'Wehner, Prosacco and Wehner', '743-254-2250', 'http://www.kulas.com/deserunt-similique-praesentium-sint-placeat-nemo', 'UY', 'th', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(82, 82, NULL, 'Mertz, Grant and Paucek', '806-564-1171', 'http://feil.com/id-repudiandae-qui-blanditiis-vero-voluptas-repudiandae-est', 'KN', 'nn', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(83, 83, NULL, 'Kozey, Koelpin and Wintheiser', '804.876.1126', 'http://www.macejkovic.com/', 'AG', 'ce', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(84, 84, NULL, 'McGlynn, Little and Walsh', '+1-702-643-1455', 'http://lindgren.com/nihil-sit-velit-odit-qui-laboriosam.html', 'FI', 'vi', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(85, 85, NULL, 'Zieme-Rosenbaum', '(361) 798-2677', 'http://legros.com/beatae-explicabo-omnis-quidem-iste-minima-natus-sequi-quis.html', 'AO', 'ig', NULL, NULL, NULL, NULL, '2022-05-30 23:33:05', '2022-05-30 23:33:05'),
(86, 86, NULL, 'Predovic-Kreiger', '1-386-612-7645', 'http://www.yost.biz/qui-vel-voluptatum-vel-quibusdam', 'TL', 'mn', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(87, 87, NULL, 'Robel, Mitchell and Rath', '+12542474104', 'http://www.ondricka.com/illo-sit-error-dolorum-ipsam-quaerat-debitis.html', 'CI', 'ug', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(88, 88, NULL, 'Schiller PLC', '678-484-4335', 'http://www.powlowski.com/est-itaque-ipsa-est-ratione-dolorem-aliquid-aut-fugiat.html', 'AG', 'so', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(89, 89, NULL, 'Labadie LLC', '352.482.6842', 'http://www.ziemann.com/sunt-dignissimos-quisquam-dignissimos-doloribus-et-maiores-quia.html', 'AQ', 'kk', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(90, 90, NULL, 'Jenkins, Boyer and Brekke', '252.521.2536', 'http://www.olson.com/deleniti-quos-tempora-est-veritatis-aut', 'ZM', 'af', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(91, 91, NULL, 'Luettgen, Frami and Mertz', '424-668-7272', 'http://ebert.net/impedit-minima-fuga-inventore-rerum', 'NF', 'sk', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(92, 92, NULL, 'Lindgren-Schuppe', '+1-361-767-9402', 'https://mertz.com/reiciendis-omnis-minus-omnis-temporibus-velit-atque-et-ullam.html', 'TZ', 'vo', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(93, 93, NULL, 'Wolff-Robel', '+1 (234) 547-0677', 'https://yundt.biz/architecto-architecto-perferendis-et-unde.html', 'TH', 'li', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(94, 94, NULL, 'Lubowitz, Blick and Little', '+12019577854', 'http://denesik.com/sint-magnam-laborum-adipisci-similique-quisquam-id', 'UG', 'dz', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(95, 95, NULL, 'Bechtelar, Ullrich and Dach', '+1.947.945.7266', 'https://www.moen.info/quaerat-impedit-voluptatem-odio-ab-repellat-sed-omnis', 'VG', 'la', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(96, 96, NULL, 'Kulas, Schuster and Hammes', '+1-315-273-7847', 'http://www.schimmel.com/molestiae-tempora-voluptatem-quia-id-blanditiis-eum-a', 'LR', 'da', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(97, 97, NULL, 'Schimmel, Huels and Simonis', '(321) 308-0757', 'http://wiegand.com/minus-eum-vero-accusamus-ipsa-maxime', 'CM', 'lv', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(98, 98, NULL, 'Rath, Prosacco and Romaguera', '+1-551-682-8136', 'https://hansen.org/tempora-delectus-aspernatur-enim-ipsam-quis-omnis-deleniti.html', 'SR', 'ht', NULL, NULL, NULL, NULL, '2022-05-30 23:33:06', '2022-05-30 23:33:06'),
(99, 99, NULL, 'Kshlerin, Boyle and Tremblay', '(920) 437-5734', 'http://www.prosacco.com/', 'HU', 'br', NULL, NULL, NULL, NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07'),
(100, 100, NULL, 'Wehner, Crona and Lemke', '+1-458-293-8685', 'http://watsica.biz/quisquam-cumque-nobis-ullam-ut-quia-esse-earum', 'QA', 'mk', NULL, NULL, NULL, NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07'),
(101, 101, NULL, 'Rodriguez-Jacobi', '(978) 732-2687', 'http://www.skiles.info/quo-eaque-consequatur-occaecati-ut.html', 'PY', 'so', NULL, NULL, NULL, NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07'),
(102, 102, NULL, 'Schoen, Paucek and Price', '+1.956.679.0648', 'http://lynch.org/voluptas-hic-autem-architecto-repellat-deserunt-dolorum', 'VI', 'tg', NULL, NULL, NULL, NULL, '2022-05-30 23:33:07', '2022-05-30 23:33:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companysettings`
--
ALTER TABLE `companysettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultantcategories`
--
ALTER TABLE `consultantcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_country_code_unique` (`country_code`),
  ADD UNIQUE KEY `countries_country_name_unique` (`country_name`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_key_index` (`key`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `companysettings`
--
ALTER TABLE `companysettings`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consultantcategories`
--
ALTER TABLE `consultantcategories`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firms`
--
ALTER TABLE `firms`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

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
