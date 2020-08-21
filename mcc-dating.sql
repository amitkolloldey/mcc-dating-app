-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2020 at 08:00 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcc-dating`
--

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
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'GZ7KNNV', '2020-08-21 09:03:25', '2020-08-21 09:03:25'),
(2, 'N1XB', '2020-08-21 09:03:25', '2020-08-21 09:03:25'),
(3, 'VKVYFAI72Q', '2020-08-21 09:03:25', '2020-08-21 09:03:25'),
(4, 'BHNRQC', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(5, 'OSAXBKBU', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(6, 'GQHV6T9', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(7, 'W', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(8, 'NP', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(9, 'SKN5LW', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(10, 'VQMTL2WXKD', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(11, 'SCX', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(12, 'YRFONM2A', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(13, 'VEUQQIE', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(14, '578', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(15, 'GVFF', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(16, 'FZI0YBQ', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(17, 'CPTJ7YFZGZ', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(18, 'YDA2', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(19, '1LZWPR', '2020-08-21 09:03:26', '2020-08-21 09:03:26'),
(20, 'FRIDQ', '2020-08-21 09:03:26', '2020-08-21 09:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `interest_user`
--

CREATE TABLE `interest_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `interest_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interest_user`
--

INSERT INTO `interest_user` (`id`, `user_id`, `interest_id`, `created_at`, `updated_at`) VALUES
(5, 3, 1, NULL, NULL),
(6, 3, 2, NULL, NULL),
(7, 3, 3, NULL, NULL),
(8, 3, 5, NULL, NULL),
(9, 3, 6, NULL, NULL),
(10, 4, 2, NULL, NULL),
(11, 4, 4, NULL, NULL),
(12, 4, 5, NULL, NULL),
(13, 4, 8, NULL, NULL),
(14, 5, 1, NULL, NULL),
(15, 5, 3, NULL, NULL),
(16, 5, 4, NULL, NULL),
(17, 6, 3, NULL, NULL),
(18, 6, 5, NULL, NULL),
(19, 6, 8, NULL, NULL),
(20, 6, 9, NULL, NULL),
(21, 7, 2, NULL, NULL),
(22, 7, 5, NULL, NULL),
(23, 7, 8, NULL, NULL),
(24, 8, 2, NULL, NULL),
(25, 8, 4, NULL, NULL),
(26, 8, 6, NULL, NULL),
(27, 9, 3, NULL, NULL),
(28, 9, 16, NULL, NULL),
(29, 9, 17, NULL, NULL),
(30, 10, 3, NULL, NULL),
(31, 10, 4, NULL, NULL),
(32, 10, 5, NULL, NULL);

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2020_08_19_162120_create_user_settings_table', 1),
(15, '2020_08_19_163029_create_user_likes_table', 1),
(16, '2020_08_20_173323_add_username_to_user', 1),
(17, '2020_08_20_180755_create_interests_table', 1),
(18, '2020_08_20_181228_add_country_city_to_users', 1),
(19, '2020_08_20_182752_create_interest_user_table', 1),
(20, '2020_08_20_190954_add_interested_in_to_user_settings', 1),
(21, '2020_08_21_145513_create_user_dislikes_table', 1),
(22, '2020_08_21_171319_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1141ce75-ecf2-4499-a20d-85dd3f1b32ab', 'App\\Notifications\\NewMatchFound', 'App\\Models\\User', 1, '{\"message\":\"It is a match!!!!\",\"person1\":{\"id\":1,\"name\":\"Amit Kollol Dey\",\"email\":\"amitkolloldey@gmail.com\",\"phone\":\"01739249029\",\"image\":\"uploads\\/XEJ34rP4estAWgAQZby6E12wXRLgENY6Nl8pHJsz.jpeg\",\"gender\":\"male\",\"status\":1,\"bio\":\"TEST\",\"date_of_birth\":\"1993-04-04\",\"age\":27,\"lng\":\"90.3627000\",\"lat\":\"23.7701000\",\"email_verified_at\":null,\"deleted_at\":null,\"created_at\":\"2020-08-21T15:04:02.000000Z\",\"updated_at\":\"2020-08-21T17:35:00.000000Z\",\"username\":\"amitkolloldey\",\"city\":\"Dhaka\",\"country\":\"Bangladesh\"},\"person2\":{\"id\":2,\"name\":\"Jane Doe\",\"email\":\"amitkolloldey2016@gmail.com\",\"phone\":\"132565\",\"image\":\"uploads\\/7UAkpMwYpfUkRBJ6ztBnFmVLZwPw5nkWjYLRXYhU.jpeg\",\"gender\":\"female\",\"status\":1,\"bio\":\"TEST TST\",\"date_of_birth\":\"1995-01-02\",\"age\":25,\"lng\":\"90.3627000\",\"lat\":\"23.7701000\",\"email_verified_at\":null,\"deleted_at\":null,\"created_at\":\"2020-08-21T15:10:44.000000Z\",\"updated_at\":\"2020-08-21T18:37:48.000000Z\",\"username\":\"jane_doe\",\"city\":\"Dhaka\",\"country\":\"Bangladesh\"}}', NULL, '2020-08-21 12:39:18', '2020-08-21 12:39:18'),
('6f75216d-84ae-48fd-83df-d706a02061a2', 'App\\Notifications\\NewMatchFound', 'App\\Models\\User', 2, '{\"message\":\"It is a match!!!!\",\"person1\":{\"id\":1,\"name\":\"Amit Kollol Dey\",\"email\":\"amitkolloldey@gmail.com\",\"phone\":\"01739249029\",\"image\":\"uploads\\/XEJ34rP4estAWgAQZby6E12wXRLgENY6Nl8pHJsz.jpeg\",\"gender\":\"male\",\"status\":1,\"bio\":\"TEST\",\"date_of_birth\":\"1993-04-04\",\"age\":27,\"lng\":\"90.3627000\",\"lat\":\"23.7701000\",\"email_verified_at\":null,\"deleted_at\":null,\"created_at\":\"2020-08-21T15:04:02.000000Z\",\"updated_at\":\"2020-08-21T17:35:00.000000Z\",\"username\":\"amitkolloldey\",\"city\":\"Dhaka\",\"country\":\"Bangladesh\"},\"person2\":{\"id\":2,\"name\":\"Jane Doe\",\"email\":\"amitkolloldey2016@gmail.com\",\"phone\":\"132565\",\"image\":\"uploads\\/7UAkpMwYpfUkRBJ6ztBnFmVLZwPw5nkWjYLRXYhU.jpeg\",\"gender\":\"female\",\"status\":1,\"bio\":\"TEST TST\",\"date_of_birth\":\"1995-01-02\",\"age\":25,\"lng\":\"90.3627000\",\"lat\":\"23.7701000\",\"email_verified_at\":null,\"deleted_at\":null,\"created_at\":\"2020-08-21T15:10:44.000000Z\",\"updated_at\":\"2020-08-21T18:37:48.000000Z\",\"username\":\"jane_doe\",\"city\":\"Dhaka\",\"country\":\"Bangladesh\"}}', '2020-08-21 13:17:45', '2020-08-21 12:39:18', '2020-08-21 13:17:45'),
('73aeb886-a6e8-471e-91b6-58bcf46a7d69', 'App\\Notifications\\NewMatchFound', 'App\\Models\\User', 10, '{\"message\":\"It is a match!!!!\",\"person1\":{\"id\":10,\"name\":\"dakhaas\",\"email\":\"dakhaas@best566.xyz\",\"phone\":\"89995\",\"image\":\"uploads\\/ngIeQgE8dh1SR7Ja1QlRBsw5b7UM88PTPPwjV8KV.jpeg\",\"gender\":\"female\",\"status\":1,\"bio\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"date_of_birth\":\"1997-08-08\",\"age\":23,\"lng\":\"90.3627000\",\"lat\":\"23.7701000\",\"email_verified_at\":\"2020-08-22T01:33:17.000000Z\",\"deleted_at\":null,\"created_at\":\"2020-08-21T19:49:10.000000Z\",\"updated_at\":\"2020-08-21T19:55:00.000000Z\",\"username\":\"dakhaas\",\"city\":\"Dhaka\",\"country\":\"Ban\"},\"person2\":{\"id\":9,\"name\":\"Intion\",\"email\":\"Intion1948@fleckens.hu\",\"phone\":\"65689564\",\"image\":\"uploads\\/6kX8K4YbvLRVRQp75jgXASD8UOmbd4HPkxNllmmW.jpeg\",\"gender\":\"male\",\"status\":1,\"bio\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"date_of_birth\":\"1992-06-07\",\"age\":28,\"lng\":\"90.3627000\",\"lat\":\"23.7701000\",\"email_verified_at\":\"2020-08-22T01:33:17.000000Z\",\"deleted_at\":null,\"created_at\":\"2020-08-21T19:47:15.000000Z\",\"updated_at\":\"2020-08-21T19:56:49.000000Z\",\"username\":\"Intion1948\",\"city\":\"Dhaka\",\"country\":\"Ban\"}}', NULL, '2020-08-21 13:56:58', '2020-08-21 13:56:58'),
('b2f21f9c-2132-4c52-ae1b-d38f13ad47d1', 'App\\Notifications\\NewMatchFound', 'App\\Models\\User', 9, '{\"message\":\"It is a match!!!!\",\"person1\":{\"id\":10,\"name\":\"dakhaas\",\"email\":\"dakhaas@best566.xyz\",\"phone\":\"89995\",\"image\":\"uploads\\/ngIeQgE8dh1SR7Ja1QlRBsw5b7UM88PTPPwjV8KV.jpeg\",\"gender\":\"female\",\"status\":1,\"bio\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"date_of_birth\":\"1997-08-08\",\"age\":23,\"lng\":\"90.3627000\",\"lat\":\"23.7701000\",\"email_verified_at\":\"2020-08-22T01:33:17.000000Z\",\"deleted_at\":null,\"created_at\":\"2020-08-21T19:49:10.000000Z\",\"updated_at\":\"2020-08-21T19:55:00.000000Z\",\"username\":\"dakhaas\",\"city\":\"Dhaka\",\"country\":\"Ban\"},\"person2\":{\"id\":9,\"name\":\"Intion\",\"email\":\"Intion1948@fleckens.hu\",\"phone\":\"65689564\",\"image\":\"uploads\\/6kX8K4YbvLRVRQp75jgXASD8UOmbd4HPkxNllmmW.jpeg\",\"gender\":\"male\",\"status\":1,\"bio\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"date_of_birth\":\"1992-06-07\",\"age\":28,\"lng\":\"90.3627000\",\"lat\":\"23.7701000\",\"email_verified_at\":\"2020-08-22T01:33:17.000000Z\",\"deleted_at\":null,\"created_at\":\"2020-08-21T19:47:15.000000Z\",\"updated_at\":\"2020-08-21T19:56:49.000000Z\",\"username\":\"Intion1948\",\"city\":\"Dhaka\",\"country\":\"Ban\"}}', '2020-08-21 13:57:15', '2020-08-21 13:56:58', '2020-08-21 13:57:15');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `bio` text COLLATE utf8mb4_unicode_ci,
  `date_of_birth` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `lng` decimal(10,7) DEFAULT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image`, `gender`, `status`, `bio`, `date_of_birth`, `age`, `lng`, `lat`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `username`, `city`, `country`) VALUES
(3, 'tracen stryder', 'tracen.stryder@intrees.org', '015652665', 'uploads/F5rERMduyn84993B0Ovl1ChXyJJAyAOgnnIzby9L.jpeg', 'female', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1990-01-02', 30, '90.3639480', '23.7546640', '2020-08-21 19:33:17', '$2y$10$zG0.vWT4hYbYTaTNzGC4S.ImlQxD3qaWe9suNNYklM.cSYJICvRHy', NULL, NULL, '2020-08-21 13:30:21', '2020-08-21 13:33:04', 'tracen_stryder', 'Dhaka', 'Bangladesh'),
(4, 'arkeem taliesin', 'arkeem.taliesin@intrees.org', '34545875', 'uploads/A1Hn83DvuZ9lFcBcWL2nFK8Mw4kky2HSwQK0KpUk.jpeg', 'male', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1995-04-12', 25, '90.3652420', '23.7554000', '2020-08-21 19:33:17', '$2y$10$22J3kj0lXsOP3UfbD9cJHumyLPlamDFPH9nzRssR0pLiRKnKs6HEy', NULL, NULL, '2020-08-21 13:36:08', '2020-08-21 13:38:00', 'arkeem_taliesin', 'Dhaka', 'Bangladesh'),
(5, 'reda fredric', 'reda.fredric@intrees.org', '32436647', 'uploads/8bagfF2ma0ZgWHKeqHLz9LftYaEwubMeRx4mk862.jpeg', 'male', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1992-03-09', 28, '90.3616030', '23.7570290', '2020-08-21 19:33:17', '$2y$10$oUm6er5xbaRD9X99EWilfOswlJyzA14SdZ78IxKACynRfjjWp12TS', NULL, NULL, '2020-08-21 13:39:15', '2020-08-21 13:40:06', 'reda_fredric', 'Dhaka', 'Bangladesh'),
(6, 'shaarav neyo', 'shaarav.neyo@intrees.org', '5696566', 'uploads/JrPHTJI0bouNnqvA1KMjwL5i0FtYjYHsHml8yklo.jpeg', 'female', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1991-05-05', 29, '90.3649180', '23.7594620', '2020-08-21 19:33:17', '$2y$10$jS8.4zrFhA9NL4AhXYXjhewD6a11MO9BcnD/Wyh9uvX5hhf6YcY.y', NULL, NULL, '2020-08-21 13:40:56', '2020-08-21 13:41:40', 'shaarav_neyo', 'Dhaka', 'Bangladesh'),
(7, 'cashten brydon', 'cashten.brydon@intrees.org', '545656', 'uploads/Qp4EkznTJMX7HVodYBDAz7qa9neWgjiLwUnmfRvd.jpeg', 'female', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1989-06-07', 31, '90.3630530', '23.7611240', '2020-08-21 19:33:17', '$2y$10$urexM6lxCVbWL3QCZ5YtreCNFPhYSlSWGRT6iiHpDBlM1vhIlWW..', NULL, NULL, '2020-08-21 13:42:31', '2020-08-21 13:43:17', 'cashten_brydon', 'Dhaka', 'Bangladesh'),
(8, 'joshua nycere', 'joshua.nycere@intrees.org', '5665626', 'uploads/SHdPpif1gxlCkfIPx93Nfi3ujKZIzyWAWCcGZ6jn.jpeg', 'male', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1994-06-04', 26, '90.3806590', '23.7768380', '2020-08-21 19:33:17', '$2y$10$F6S3PFqhLnjcoDUg0x5ynuofJIbfmKqOaQSBrleXxynEcS4NWMiBi', NULL, NULL, '2020-08-21 13:44:13', '2020-08-21 13:44:58', 'joshua_nycere', 'Dhaka', 'Bangladesh'),
(9, 'Intion', 'Intion1948@fleckens.hu', '65689564', 'uploads/6kX8K4YbvLRVRQp75jgXASD8UOmbd4HPkxNllmmW.jpeg', 'male', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1992-06-07', 28, '90.3627000', '23.7701000', '2020-08-21 19:33:17', '$2y$10$ZUdROF./ezCgn7BUHT11r.2jW05xKl8HUot7KeE/2WMSI7Z3dojSq', NULL, NULL, '2020-08-21 13:47:15', '2020-08-21 13:56:49', 'Intion1948', 'Dhaka', 'Ban'),
(10, 'dakhaas', 'dakhaas@best566.xyz', '89995', 'uploads/ngIeQgE8dh1SR7Ja1QlRBsw5b7UM88PTPPwjV8KV.jpeg', 'female', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1997-08-08', 23, '90.3627000', '23.7701000', '2020-08-21 19:33:17', '$2y$10$2ShZsglfmCtSJ2pb3hFdsO0n4xHkcc75W32qbTUmCRFjlVFp6Ig1e', NULL, NULL, '2020-08-21 13:49:10', '2020-08-21 13:55:00', 'dakhaas', 'Dhaka', 'Ban');

-- --------------------------------------------------------

--
-- Table structure for table `user_dislikes`
--

CREATE TABLE `user_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `disliked_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `liked_user_id` bigint(20) UNSIGNED NOT NULL,
  `is_mutual` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`id`, `user_id`, `liked_user_id`, `is_mutual`, `created_at`, `updated_at`) VALUES
(31, 10, 9, 1, '2020-08-21 13:56:25', '2020-08-21 13:56:58'),
(32, 9, 10, 1, '2020-08-21 13:56:58', '2020-08-21 13:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_age` tinyint(1) NOT NULL DEFAULT '1',
  `show_bio` tinyint(1) NOT NULL DEFAULT '1',
  `show_publicly` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'The profile can be seen on the homepage or other pages without login.',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `interested_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `show_age`, `show_bio`, `show_publicly`, `user_id`, `created_at`, `updated_at`, `interested_in`) VALUES
(3, 1, 1, 1, 3, '2020-08-21 13:33:04', '2020-08-21 13:33:04', 'male'),
(4, 1, 1, 1, 4, '2020-08-21 13:37:25', '2020-08-21 13:38:00', 'female'),
(5, 1, 1, 1, 5, '2020-08-21 13:40:06', '2020-08-21 13:40:06', 'female'),
(6, 1, 1, 1, 6, '2020-08-21 13:41:40', '2020-08-21 13:41:40', 'male'),
(7, 1, 1, 1, 7, '2020-08-21 13:43:17', '2020-08-21 13:43:17', 'male'),
(8, 1, 1, 1, 8, '2020-08-21 13:44:58', '2020-08-21 13:44:58', 'female'),
(9, 1, 1, 1, 9, '2020-08-21 13:48:05', '2020-08-21 13:48:05', 'female'),
(10, 1, 1, 1, 10, '2020-08-21 13:50:06', '2020-08-21 13:50:06', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `interests_name_unique` (`name`);

--
-- Indexes for table `interest_user`
--
ALTER TABLE `interest_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_user_user_id_index` (`user_id`),
  ADD KEY `interest_user_interest_id_index` (`interest_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_gender_index` (`gender`),
  ADD KEY `users_date_of_birth_index` (`date_of_birth`),
  ADD KEY `users_age_index` (`age`);

--
-- Indexes for table `user_dislikes`
--
ALTER TABLE `user_dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_dislikes_user_id_index` (`user_id`),
  ADD KEY `user_dislikes_disliked_user_id_index` (`disliked_user_id`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_likes_user_id_index` (`user_id`),
  ADD KEY `user_likes_liked_user_id_index` (`liked_user_id`),
  ADD KEY `user_likes_is_mutual_index` (`is_mutual`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_settings_user_id_foreign` (`user_id`),
  ADD KEY `user_settings_show_publicly_index` (`show_publicly`),
  ADD KEY `user_settings_interested_in_index` (`interested_in`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `interest_user`
--
ALTER TABLE `interest_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_dislikes`
--
ALTER TABLE `user_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `interest_user`
--
ALTER TABLE `interest_user`
  ADD CONSTRAINT `interest_user_interest_id_foreign` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interest_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_dislikes`
--
ALTER TABLE `user_dislikes`
  ADD CONSTRAINT `user_dislikes_disliked_user_id_foreign` FOREIGN KEY (`disliked_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_dislikes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD CONSTRAINT `user_likes_liked_user_id_foreign` FOREIGN KEY (`liked_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD CONSTRAINT `user_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
