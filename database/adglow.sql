-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2022 at 01:47 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adglow`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_clip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_tayang` date DEFAULT NULL,
  `creator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `img_clip`, `tgl_tayang`, `creator`, `price`, `trailer`, `link`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'book satu', 'img/book/1669476221400x600.png', '2022-11-20', 'bara malik', NULL, NULL, 'https://dummyimage.com', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'book-satu', '2022-11-26 15:23:41', '2022-11-26 15:23:41', NULL),
(2, 'book dua', 'img/book/1669476276400x600.png', '2023-02-01', 'bara malik', NULL, NULL, NULL, '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'book-dua', '2022-11-26 15:24:36', '2022-11-26 15:24:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commercials`
--

CREATE TABLE `commercials` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_clip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_highlight` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tgl_tayang` date DEFAULT NULL,
  `producer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `commercials`
--

INSERT INTO `commercials` (`id`, `title`, `img_clip`, `img_highlight`, `tgl_tayang`, `producer`, `director`, `artist`, `trailer`, `link`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'commercial satu', 'img/commercial/1669475739600x400.png', '[\"img/commercial/16694757391000x600 (1).png\", \"img/commercial/16694757391000x600.png\"]', '2022-11-04', NULL, NULL, 'Mnc Group', 'https://www.youtube.com/watch?v=py40H5Ib85g', NULL, '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'commercial-satu', '2022-11-26 15:15:39', '2022-12-04 09:31:16', NULL),
(2, 'commercial dua', 'img/commercial/1670145349600x400.png', '[\"img/commercial/16694758291000x600 (1).png\", \"img/commercial/16694758291000x600.png\"]', '2022-12-02', NULL, NULL, 'shell', 'https://www.youtube.com/watch?v=py40H5Ib85g', NULL, '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'commercial-dua', '2022-11-26 15:17:09', '2022-12-04 09:31:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documentaries`
--

CREATE TABLE `documentaries` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_clip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_highlight` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tgl_tayang` date DEFAULT NULL,
  `producer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('documentary','program') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `documentaries`
--

INSERT INTO `documentaries` (`id`, `title`, `img_clip`, `img_highlight`, `tgl_tayang`, `producer`, `director`, `artist`, `trailer`, `link`, `category`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'documentary satu', 'img/documentary/1669476720600x400.png', '[\"img/documentary/16694767201000x600 (1).png\", \"img/documentary/16694767201000x600.png\"]', '2022-11-24', 'aji fauzi', 'hanung bamantyo', NULL, 'https://www.youtube.com/watch?v=py40H5Ib85g', NULL, 'documentary', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'documentary-satu', '2022-11-26 15:32:00', '2022-11-26 15:32:00', NULL),
(2, 'documentary dua', 'img/documentary/1669476947600x400.png', '[\"img/documentary/16694769471000x600 (1).png\", \"img/documentary/16694769471000x600.png\"]', '2022-11-30', NULL, NULL, NULL, NULL, NULL, 'program', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'documentary-dua', '2022-11-26 15:35:47', '2022-11-26 15:35:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'drama', 'drama', '2022-11-26 15:02:43', '2022-11-26 15:02:43', NULL),
(2, 'thriller', 'thriller', '2022-11-26 15:02:58', '2022-11-26 15:02:58', NULL),
(3, 'commedy', 'commedy', '2022-11-26 15:03:06', '2022-11-26 15:03:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_11_08_035426_create_miniseries_table', 1),
(5, '2022_11_08_035534_create_music_table', 1),
(6, '2022_11_08_035544_create_books_table', 1),
(7, '2022_11_08_035612_create_commercials_table', 1),
(8, '2022_11_08_035627_create_documentaries_table', 1),
(9, '2022_11_08_035650_create_movies_table', 1),
(10, '2022_11_12_223834_create_news_table', 1),
(11, '2022_11_23_103922_create_genres_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `miniseries`
--

CREATE TABLE `miniseries` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_background` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_clip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_highlight` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `genre_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tgl_tayang` date DEFAULT NULL,
  `category` enum('playing','upcomming') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `episode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `miniseries`
--

INSERT INTO `miniseries` (`id`, `title`, `img_logo`, `img_background`, `img_clip`, `img_highlight`, `genre_id`, `tgl_tayang`, `category`, `episode`, `season`, `producer`, `director`, `artist`, `trailer`, `link`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'miniseries satu', 'img/miniseries/1669475620600x300.png', 'img/miniseries/16694756201349x600.png', 'img/miniseries/1669475620400x600.png', '[\"img/miniseries/16694756201000x600 (1).png\", \"img/miniseries/16694756201000x600.png\"]', '[\"1\", \"3\"]', '2022-12-12', 'upcomming', '10', '1', 'aji fauzi', 'hanung bamantyo', 'indah permata, wika salim, roy martin', 'https://www.youtube.com/watch?v=py40H5Ib85g', 'https://dummyimage.com', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'miniseries-satu', '2022-11-26 15:13:40', '2022-11-26 15:13:40', NULL),
(2, 'miniseries dua', 'img/miniseries/1669475691600x300.png', 'img/miniseries/16694756911349x600.png', 'img/miniseries/1669475691400x600.png', '[\"img/miniseries/16694756911000x600 (1).png\", \"img/miniseries/16694756911000x600.png\"]', '[\"1\"]', NULL, 'playing', '10', NULL, 'aji fauzi', 'hanung bamantyo', 'indah permata, wika salim, roy martin', 'https://www.youtube.com/watch?v=py40H5Ib85g', 'https://dummyimage.com', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'miniseries-dua', '2022-11-26 15:14:51', '2022-11-26 15:14:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_background` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_clip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_highlight` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `genre_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tgl_tayang` date DEFAULT NULL,
  `category` enum('playing','upcomming') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `duration` time DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `img_logo`, `img_background`, `img_clip`, `img_highlight`, `genre_id`, `tgl_tayang`, `category`, `producer`, `director`, `artist`, `trailer`, `link`, `duration`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'movies satu', 'img/movies/1669475423600x300.png', 'img/movies/16694754231349x600.png', 'img/movies/1669475423400x600.png', '[\"img/movies/16694754231000x600 (1).png\", \"img/movies/16694754231000x600.png\"]', '[\"1\"]', '2022-12-01', 'playing', 'aji fauzi', 'hanung bamantyo', 'indah permata, wika salim, roy martin', 'https://www.youtube.com/watch?v=py40H5Ib85g', '[{\"id\": \"1\", \"link\": \"https://dummyimage.com\", \"name\": \"vidio\"}, {\"id\": \"2\", \"link\": \"https://dummyimage.com\", \"name\": \"netflix\"}]', '01:30:00', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'movies-satu', '2022-11-26 15:10:23', '2022-11-26 15:10:23', NULL),
(2, 'movies dua', 'img/movies/1669475532600x300.png', 'img/movies/16694755311349x600.png', 'img/movies/1669475531400x600.png', '[\"img/movies/16694755321000x600 (1).png\", \"img/movies/16694755321000x600.png\"]', '[\"3\"]', '2022-12-10', 'upcomming', 'aji fauzi', 'hanung bamantyo', 'susano tejo, riza ahmad, roby purba', 'https://www.youtube.com/watch?v=py40H5Ib85g', '[{\"id\": \"1\", \"link\": \"https://dummyimage.com\", \"name\": \"vidio\"}]', '02:00:00', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'movies-dua', '2022-11-26 15:12:12', '2022-11-26 15:12:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_clip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_tayang` date DEFAULT NULL,
  `creator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `title`, `img_clip`, `tgl_tayang`, `creator`, `artist`, `trailer`, `link`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'music satu', 'img/music/1669476040400x600.png', '2023-01-01', 'bara malik', 'arsy widianto, noval basudara', 'https://www.youtube.com/watch?v=py40H5Ib85g', '[{\"joox\": \"https://dummyimage.com\", \"apple\": \"https://dummyimage.com\", \"spotify\": \"https://dummyimage.com\"}]', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'music-satu', '2022-11-26 15:20:40', '2022-11-26 15:20:40', NULL),
(2, 'music dua', 'img/music/1669476135400x600.png', '2022-10-10', NULL, 'arsy widianto, noval basudara', 'https://www.youtube.com/watch?v=py40H5Ib85g', '[{\"joox\": \"https://dummyimage.com\", \"apple\": \"https://dummyimage.com\", \"spotify\": \"https://dummyimage.com\"}]', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p>', 'music-dua', '2022-11-26 15:22:15', '2022-11-26 15:22:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_clip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `img_clip`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'news satu', 'img/news/1669477024600x400.png', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.<p><br></p><p class=\"ql-align-center\"><img src=\"/img/news/16694770240.png\"></p><p class=\"ql-align-center\"><br></p><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p></p>\n', 'news-satu', '2022-11-26 15:37:04', '2022-11-26 15:37:04', NULL),
(2, 'news dua', 'img/news/1669477061600x400.png', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.<p><br></p><p class=\"ql-align-center\"><img src=\"/img/news/16694770610.png\"></p><p class=\"ql-align-center\"><br></p><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae laudantium neque ipsam rerum reprehenderit animi consectetur unde minus eaque sequi rem tenetur consequuntur ipsa, eligendi officia consequatur amet accusantium. Expedita.</p></p>\n', 'news-dua', '2022-11-26 15:37:41', '2022-11-26 15:37:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adglow', 'cs@adglow.co.id', NULL, '$2y$10$pUOigzl66TLjiwsIgs5PkuYKNtVsmm49WJmcY/YxG73nhFUPblzTu', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commercials`
--
ALTER TABLE `commercials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentaries`
--
ALTER TABLE `documentaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miniseries`
--
ALTER TABLE `miniseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commercials`
--
ALTER TABLE `commercials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentaries`
--
ALTER TABLE `documentaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `miniseries`
--
ALTER TABLE `miniseries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
