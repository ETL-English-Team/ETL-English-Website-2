-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2019 lúc 06:17 PM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `etl_english`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `achieved_detail`
--

CREATE TABLE `achieved_detail` (
  `user_id` mediumint(9) NOT NULL,
  `achievement_id` tinyint(4) NOT NULL,
  `achieved_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achieevd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `achievement_category`
--

CREATE TABLE `achievement_category` (
  `achievement_id` tinyint(4) NOT NULL,
  `achievement_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `num_of_plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `currently_level`
--

CREATE TABLE `currently_level` (
  `user_id` mediumint(9) NOT NULL,
  `field_id` tinyint(4) NOT NULL,
  `curently_level` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `examination`
--

CREATE TABLE `examination` (
  `examination_id` int(11) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `level` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `star` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `examination`
--

INSERT INTO `examination` (`examination_id`, `user_id`, `level`, `created_at`, `updated_at`, `star`) VALUES
(1, 1, 1, '2019-12-01 02:34:15', '2019-12-01 02:34:15', NULL),
(2, 1, 1, '2019-12-01 02:37:13', '2019-12-01 02:37:13', NULL),
(3, 1, 1, '2019-12-01 02:37:29', '2019-12-01 02:37:29', NULL),
(4, 1, 1, '2019-12-01 02:37:33', '2019-12-01 02:37:33', NULL),
(5, 1, 1, '2019-12-01 02:38:01', '2019-12-01 02:38:01', NULL),
(6, 1, 1, '2019-12-01 09:25:57', '2019-12-01 09:25:57', NULL),
(7, 1, 1, '2019-12-01 09:29:50', '2019-12-01 09:29:50', NULL),
(8, 1, 1, '2019-12-01 10:30:11', '2019-12-01 10:30:11', NULL),
(9, 1, 1, '2019-12-01 10:31:34', '2019-12-01 10:31:34', NULL),
(10, 1, 1, '2019-12-01 10:34:35', '2019-12-01 10:34:35', NULL),
(11, 1, 1, '2019-12-01 10:35:05', '2019-12-01 10:35:05', NULL),
(12, 1, 1, '2019-12-01 10:37:03', '2019-12-01 10:37:03', NULL),
(13, 1, 1, '2019-12-01 10:37:47', '2019-12-01 10:37:47', NULL),
(14, 1, 1, '2019-12-01 10:38:52', '2019-12-01 10:38:52', NULL),
(15, 1, 1, '2019-12-01 10:39:14', '2019-12-01 10:39:14', NULL),
(16, 1, 1, '2019-12-01 11:38:05', '2019-12-01 11:38:05', NULL),
(17, 1, 1, '2019-12-01 11:38:44', '2019-12-01 11:38:44', NULL),
(18, 1, 1, '2019-12-01 11:43:01', '2019-12-01 11:43:01', NULL),
(19, 1, 1, '2019-12-01 11:43:34', '2019-12-01 11:43:34', NULL),
(20, 1, 1, '2019-12-01 11:45:46', '2019-12-01 11:45:46', NULL),
(21, 1, 1, '2019-12-01 11:45:53', '2019-12-01 11:45:53', NULL),
(22, 1, 1, '2019-12-01 11:47:56', '2019-12-01 11:47:56', NULL),
(23, 1, 1, '2019-12-01 11:48:00', '2019-12-01 11:48:00', NULL),
(24, 1, 1, '2019-12-01 11:48:10', '2019-12-01 11:48:10', NULL),
(25, 1, 1, '2019-12-01 21:21:27', '2019-12-01 21:21:27', NULL),
(26, 1, 1, '2019-12-01 21:21:50', '2019-12-01 21:21:50', NULL),
(27, 1, 1, '2019-12-01 21:23:47', '2019-12-01 21:23:47', NULL),
(28, 1, 1, '2019-12-01 21:24:58', '2019-12-01 21:24:58', NULL),
(29, 1, 1, '2019-12-01 21:26:17', '2019-12-01 21:26:17', NULL),
(30, 1, 1, '2019-12-01 21:26:49', '2019-12-01 21:26:49', NULL),
(31, 1, 1, '2019-12-01 21:27:41', '2019-12-01 21:27:41', NULL),
(32, 1, 1, '2019-12-01 21:27:49', '2019-12-01 21:27:49', NULL),
(33, 1, 1, '2019-12-01 21:31:29', '2019-12-01 21:31:29', NULL),
(34, 1, 1, '2019-12-01 21:32:17', '2019-12-01 21:32:17', NULL),
(35, 1, 1, '2019-12-01 21:39:54', '2019-12-01 21:39:54', NULL),
(36, 1, 1, '2019-12-01 21:40:31', '2019-12-01 21:40:31', NULL),
(37, 1, 1, '2019-12-01 22:40:47', '2019-12-01 22:40:47', NULL),
(38, 1, 1, '2019-12-01 22:41:29', '2019-12-01 22:41:29', NULL),
(39, 1, 1, '2019-12-01 22:42:41', '2019-12-01 22:42:41', NULL),
(40, 1, 1, '2019-12-01 22:44:56', '2019-12-01 22:44:56', NULL),
(41, 1, 1, '2019-12-01 22:46:48', '2019-12-01 22:46:48', NULL),
(42, 1, 1, '2019-12-01 22:47:45', '2019-12-01 22:47:45', NULL),
(43, 1, 1, '2019-12-01 22:47:53', '2019-12-01 22:47:53', NULL),
(44, 1, 1, '2019-12-01 22:54:58', '2019-12-01 22:54:58', NULL),
(45, 1, 1, '2019-12-01 22:55:34', '2019-12-01 22:55:34', NULL),
(46, 1, 1, '2019-12-01 22:55:40', '2019-12-01 22:55:40', NULL),
(47, 1, 1, '2019-12-01 23:03:01', '2019-12-01 23:03:01', NULL),
(48, 1, 1, '2019-12-01 23:04:00', '2019-12-01 23:04:00', NULL),
(49, 1, 1, '2019-12-01 23:05:44', '2019-12-01 23:05:44', NULL),
(50, 1, 1, '2019-12-01 23:06:32', '2019-12-01 23:06:32', NULL),
(51, 1, 1, '2019-12-01 23:07:21', '2019-12-01 23:07:21', NULL),
(52, 1, 1, '2019-12-01 23:08:31', '2019-12-01 23:08:31', NULL),
(53, 1, 1, '2019-12-01 23:10:02', '2019-12-01 23:10:02', NULL),
(54, 1, 1, '2019-12-01 23:10:11', '2019-12-01 23:10:11', NULL),
(55, 1, 1, '2019-12-01 23:10:44', '2019-12-01 23:10:44', NULL),
(56, 1, 1, '2019-12-01 23:11:04', '2019-12-01 23:11:04', NULL),
(57, 1, 1, '2019-12-01 23:11:12', '2019-12-01 23:11:12', NULL),
(58, 1, 1, '2019-12-01 23:49:15', '2019-12-01 23:49:15', NULL),
(59, 1, 1, '2019-12-01 23:49:51', '2019-12-01 23:49:51', NULL),
(60, 1, 1, '2019-12-01 23:51:14', '2019-12-01 23:51:14', NULL),
(61, 1, 1, '2019-12-01 23:57:16', '2019-12-01 23:57:16', NULL),
(62, 1, 1, '2019-12-01 23:57:27', '2019-12-01 23:57:27', NULL),
(63, 1, 1, '2019-12-01 23:57:46', '2019-12-01 23:57:46', NULL),
(64, 1, 1, '2019-12-01 23:58:05', '2019-12-01 23:58:05', NULL),
(65, 1, 1, '2019-12-02 00:03:42', '2019-12-02 00:03:42', NULL),
(66, 1, 1, '2019-12-02 00:04:54', '2019-12-02 00:04:54', NULL),
(67, 1, 1, '2019-12-02 00:05:40', '2019-12-02 00:05:40', NULL),
(68, 1, 1, '2019-12-02 00:05:56', '2019-12-02 00:05:56', NULL),
(69, 1, 1, '2019-12-02 00:06:10', '2019-12-02 00:06:10', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `examination_category`
--

CREATE TABLE `examination_category` (
  `examination_category_id` tinyint(4) NOT NULL,
  `examination_category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `examination_category`
--

INSERT INTO `examination_category` (`examination_category_id`, `examination_category_name`, `description`) VALUES
(1, 'Điền từ theo nghĩa', 'Hệ thống sẽ cho bạn 2 gợi ý (hình ảnh của từ và nghĩa tiếng Việt của từ), bạn sẽ phải đưa ra từ tiếng Anh nằm trong danh sách từ vựng đã được học.'),
(2, 'Điền từ theo phát âm', 'Hệ thống phát âm một từ tiếng Anh nằm trong danh sách những từ mà bạn đã được học. Bạn sẽ phải điền từu tiếng Anh nghe được vào ô trả lời. ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `examination_part`
--

CREATE TABLE `examination_part` (
  `examination_part_id` int(11) NOT NULL,
  `examination_id` int(11) NOT NULL,
  `examination_category_id` tinyint(4) NOT NULL,
  `point` tinyint(4) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `examination_part`
--

INSERT INTO `examination_part` (`examination_part_id`, `examination_id`, `examination_category_id`, `point`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2019-12-01 02:34:15', '2019-12-01 02:34:15'),
(2, 2, 1, 0, '2019-12-01 02:37:13', '2019-12-01 02:37:13'),
(3, 3, 1, 0, '2019-12-01 02:37:29', '2019-12-01 02:37:29'),
(4, 4, 1, 0, '2019-12-01 02:37:33', '2019-12-01 02:37:33'),
(5, 5, 1, 0, '2019-12-01 02:38:01', '2019-12-01 02:38:01'),
(6, 6, 1, 0, '2019-12-01 09:25:58', '2019-12-01 09:25:58'),
(7, 7, 1, 0, '2019-12-01 09:29:50', '2019-12-01 09:29:50'),
(8, 8, 1, 0, '2019-12-01 10:30:11', '2019-12-01 10:30:11'),
(9, 9, 1, 0, '2019-12-01 10:31:34', '2019-12-01 10:31:34'),
(10, 10, 1, 0, '2019-12-01 10:34:35', '2019-12-01 10:34:35'),
(11, 11, 1, 0, '2019-12-01 10:35:05', '2019-12-01 10:35:05'),
(12, 12, 1, 0, '2019-12-01 10:37:03', '2019-12-01 10:37:03'),
(13, 13, 1, 0, '2019-12-01 10:37:47', '2019-12-01 10:37:47'),
(14, 14, 1, 0, '2019-12-01 10:38:52', '2019-12-01 10:38:52'),
(15, 15, 1, 0, '2019-12-01 10:39:14', '2019-12-01 10:39:14'),
(16, 16, 1, 0, '2019-12-01 11:38:05', '2019-12-01 11:38:05'),
(17, 17, 1, 0, '2019-12-01 11:38:44', '2019-12-01 11:38:44'),
(18, 18, 1, 0, '2019-12-01 11:43:01', '2019-12-01 11:43:01'),
(19, 19, 1, 0, '2019-12-01 11:43:34', '2019-12-01 11:43:34'),
(20, 20, 1, 0, '2019-12-01 11:45:46', '2019-12-01 11:45:46'),
(21, 21, 1, 0, '2019-12-01 11:45:53', '2019-12-01 11:45:53'),
(22, 22, 1, 0, '2019-12-01 11:47:57', '2019-12-01 11:47:57'),
(23, 23, 1, 0, '2019-12-01 11:48:01', '2019-12-01 11:48:01'),
(24, 24, 1, 0, '2019-12-01 11:48:10', '2019-12-01 11:48:10'),
(25, 25, 1, 0, '2019-12-01 21:21:27', '2019-12-01 21:21:27'),
(26, 26, 1, 0, '2019-12-01 21:21:50', '2019-12-01 21:21:50'),
(27, 27, 1, 0, '2019-12-01 21:23:47', '2019-12-01 21:23:47'),
(28, 28, 1, 0, '2019-12-01 21:24:59', '2019-12-01 21:24:59'),
(29, 29, 1, 0, '2019-12-01 21:26:17', '2019-12-01 21:26:17'),
(30, 30, 1, 0, '2019-12-01 21:26:49', '2019-12-01 21:26:49'),
(31, 31, 1, 0, '2019-12-01 21:27:41', '2019-12-01 21:27:41'),
(32, 32, 1, 0, '2019-12-01 21:27:50', '2019-12-01 21:27:50'),
(33, 33, 1, 0, '2019-12-01 21:31:29', '2019-12-01 21:31:29'),
(34, 34, 1, 0, '2019-12-01 21:32:17', '2019-12-01 21:32:17'),
(35, 35, 1, 0, '2019-12-01 21:39:54', '2019-12-01 21:39:54'),
(36, 36, 1, 0, '2019-12-01 21:40:31', '2019-12-01 21:40:31'),
(37, 37, 1, 0, '2019-12-01 22:40:47', '2019-12-01 22:40:47'),
(38, 38, 1, 0, '2019-12-01 22:41:30', '2019-12-01 22:41:30'),
(39, 39, 1, 0, '2019-12-01 22:42:41', '2019-12-01 22:42:41'),
(40, 40, 1, 0, '2019-12-01 22:44:56', '2019-12-01 22:44:56'),
(41, 41, 1, 0, '2019-12-01 22:46:48', '2019-12-01 22:46:48'),
(42, 42, 1, 0, '2019-12-01 22:47:45', '2019-12-01 22:47:45'),
(43, 43, 1, 0, '2019-12-01 22:47:53', '2019-12-01 22:47:53'),
(44, 44, 1, 0, '2019-12-01 22:54:58', '2019-12-01 22:54:58'),
(45, 45, 1, 0, '2019-12-01 22:55:34', '2019-12-01 22:55:34'),
(46, 46, 1, 0, '2019-12-01 22:55:41', '2019-12-01 22:55:41'),
(47, 47, 1, 0, '2019-12-01 23:03:01', '2019-12-01 23:03:01'),
(48, 48, 1, 0, '2019-12-01 23:04:00', '2019-12-01 23:04:00'),
(49, 49, 1, 0, '2019-12-01 23:05:44', '2019-12-01 23:05:44'),
(50, 50, 1, 0, '2019-12-01 23:06:32', '2019-12-01 23:06:32'),
(51, 51, 1, 0, '2019-12-01 23:07:21', '2019-12-01 23:07:21'),
(52, 52, 1, 0, '2019-12-01 23:08:31', '2019-12-01 23:08:31'),
(53, 53, 1, 0, '2019-12-01 23:10:02', '2019-12-01 23:10:02'),
(54, 54, 1, 0, '2019-12-01 23:10:11', '2019-12-01 23:10:11'),
(55, 55, 1, 0, '2019-12-01 23:10:44', '2019-12-01 23:10:44'),
(56, 56, 1, 0, '2019-12-01 23:11:04', '2019-12-01 23:11:04'),
(57, 57, 1, 0, '2019-12-01 23:11:13', '2019-12-01 23:11:13'),
(58, 58, 1, 0, '2019-12-01 23:49:15', '2019-12-01 23:49:15'),
(59, 59, 1, 0, '2019-12-01 23:49:51', '2019-12-01 23:49:51'),
(60, 60, 1, 0, '2019-12-01 23:51:14', '2019-12-01 23:51:14'),
(61, 61, 1, 0, '2019-12-01 23:57:16', '2019-12-01 23:57:16'),
(62, 62, 1, 0, '2019-12-01 23:57:28', '2019-12-01 23:57:28'),
(63, 63, 1, 0, '2019-12-01 23:57:47', '2019-12-01 23:57:47'),
(64, 64, 1, 0, '2019-12-01 23:58:05', '2019-12-01 23:58:05'),
(65, 65, 1, 0, '2019-12-02 00:03:42', '2019-12-02 00:03:42'),
(66, 66, 1, 0, '2019-12-02 00:04:54', '2019-12-02 00:04:54'),
(67, 67, 1, 0, '2019-12-02 00:05:40', '2019-12-02 00:05:40'),
(68, 68, 1, 0, '2019-12-02 00:05:56', '2019-12-02 00:05:56'),
(69, 69, 1, 0, '2019-12-02 00:06:10', '2019-12-02 00:06:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `examination_question`
--

CREATE TABLE `examination_question` (
  `examination_question_id` bigint(20) NOT NULL,
  `examination_part_id` int(11) NOT NULL,
  `question_number` tinyint(4) NOT NULL,
  `word_id` smallint(6) NOT NULL,
  `result` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `examination_question`
--

INSERT INTO `examination_question` (`examination_question_id`, `examination_part_id`, `question_number`, `word_id`, `result`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, NULL, '2019-12-01 02:34:15', '2019-12-01 02:34:15'),
(2, 1, 2, 1, NULL, '2019-12-01 02:34:15', '2019-12-01 02:34:15'),
(3, 2, 1, 1, NULL, '2019-12-01 02:37:13', '2019-12-01 02:37:13'),
(4, 2, 2, 2, NULL, '2019-12-01 02:37:13', '2019-12-01 02:37:13'),
(5, 3, 1, 2, NULL, '2019-12-01 02:37:29', '2019-12-01 02:37:29'),
(6, 3, 2, 1, NULL, '2019-12-01 02:37:29', '2019-12-01 02:37:29'),
(7, 4, 1, 2, NULL, '2019-12-01 02:37:33', '2019-12-01 02:37:33'),
(8, 4, 2, 1, NULL, '2019-12-01 02:37:34', '2019-12-01 02:37:34'),
(9, 5, 1, 1, NULL, '2019-12-01 02:38:01', '2019-12-01 02:38:01'),
(10, 5, 2, 2, NULL, '2019-12-01 02:38:01', '2019-12-01 02:38:01'),
(11, 6, 1, 1, NULL, '2019-12-01 09:25:58', '2019-12-01 09:25:58'),
(12, 6, 2, 2, NULL, '2019-12-01 09:25:58', '2019-12-01 09:25:58'),
(13, 7, 1, 2, NULL, '2019-12-01 09:29:50', '2019-12-01 09:29:50'),
(14, 7, 2, 1, NULL, '2019-12-01 09:29:50', '2019-12-01 09:29:50'),
(15, 8, 1, 1, NULL, '2019-12-01 10:30:11', '2019-12-01 10:30:11'),
(16, 8, 2, 2, NULL, '2019-12-01 10:30:12', '2019-12-01 10:30:12'),
(17, 9, 1, 2, NULL, '2019-12-01 10:31:34', '2019-12-01 10:31:34'),
(18, 9, 2, 1, NULL, '2019-12-01 10:31:34', '2019-12-01 10:31:34'),
(19, 10, 1, 2, NULL, '2019-12-01 10:34:35', '2019-12-01 10:34:35'),
(20, 10, 2, 1, NULL, '2019-12-01 10:34:35', '2019-12-01 10:34:35'),
(21, 11, 1, 2, NULL, '2019-12-01 10:35:05', '2019-12-01 10:35:05'),
(22, 11, 2, 1, NULL, '2019-12-01 10:35:05', '2019-12-01 10:35:05'),
(23, 12, 1, 1, NULL, '2019-12-01 10:37:03', '2019-12-01 10:37:03'),
(24, 12, 2, 2, NULL, '2019-12-01 10:37:03', '2019-12-01 10:37:03'),
(25, 13, 1, 1, NULL, '2019-12-01 10:37:47', '2019-12-01 10:37:47'),
(26, 13, 2, 2, NULL, '2019-12-01 10:37:47', '2019-12-01 10:37:47'),
(27, 14, 1, 1, NULL, '2019-12-01 10:38:52', '2019-12-01 10:38:52'),
(28, 14, 2, 2, NULL, '2019-12-01 10:38:52', '2019-12-01 10:38:52'),
(29, 15, 1, 1, NULL, '2019-12-01 10:39:14', '2019-12-01 10:39:14'),
(30, 15, 2, 2, NULL, '2019-12-01 10:39:14', '2019-12-01 10:39:14'),
(31, 16, 1, 2, NULL, '2019-12-01 11:38:06', '2019-12-01 11:38:06'),
(32, 16, 2, 1, NULL, '2019-12-01 11:38:06', '2019-12-01 11:38:06'),
(33, 17, 1, 1, NULL, '2019-12-01 11:38:44', '2019-12-01 11:38:44'),
(34, 17, 2, 2, NULL, '2019-12-01 11:38:44', '2019-12-01 11:38:44'),
(35, 18, 1, 1, NULL, '2019-12-01 11:43:01', '2019-12-01 11:43:01'),
(36, 18, 2, 2, NULL, '2019-12-01 11:43:01', '2019-12-01 11:43:01'),
(37, 19, 1, 1, NULL, '2019-12-01 11:43:34', '2019-12-01 11:43:34'),
(38, 19, 2, 2, NULL, '2019-12-01 11:43:34', '2019-12-01 11:43:34'),
(39, 20, 1, 2, NULL, '2019-12-01 11:45:46', '2019-12-01 11:45:46'),
(40, 20, 2, 1, NULL, '2019-12-01 11:45:46', '2019-12-01 11:45:46'),
(41, 21, 1, 2, NULL, '2019-12-01 11:45:53', '2019-12-01 11:45:53'),
(42, 21, 2, 1, NULL, '2019-12-01 11:45:53', '2019-12-01 11:45:53'),
(43, 22, 1, 2, NULL, '2019-12-01 11:47:57', '2019-12-01 11:47:57'),
(44, 22, 2, 1, NULL, '2019-12-01 11:47:57', '2019-12-01 11:47:57'),
(45, 23, 1, 2, NULL, '2019-12-01 11:48:01', '2019-12-01 11:48:01'),
(46, 23, 2, 1, NULL, '2019-12-01 11:48:01', '2019-12-01 11:48:01'),
(47, 24, 1, 2, NULL, '2019-12-01 11:48:10', '2019-12-01 11:48:10'),
(48, 24, 2, 1, NULL, '2019-12-01 11:48:10', '2019-12-01 11:48:10'),
(49, 25, 1, 3, NULL, '2019-12-01 21:21:28', '2019-12-01 21:21:28'),
(50, 25, 2, 2, NULL, '2019-12-01 21:21:28', '2019-12-01 21:21:28'),
(51, 25, 3, 1, NULL, '2019-12-01 21:21:28', '2019-12-01 21:21:28'),
(52, 26, 1, 3, NULL, '2019-12-01 21:21:50', '2019-12-01 21:21:50'),
(53, 26, 2, 1, NULL, '2019-12-01 21:21:50', '2019-12-01 21:21:50'),
(54, 26, 3, 2, NULL, '2019-12-01 21:21:50', '2019-12-01 21:21:50'),
(55, 27, 1, 1, NULL, '2019-12-01 21:23:47', '2019-12-01 21:23:47'),
(56, 27, 2, 2, NULL, '2019-12-01 21:23:47', '2019-12-01 21:23:47'),
(57, 27, 3, 3, NULL, '2019-12-01 21:23:47', '2019-12-01 21:23:47'),
(58, 28, 1, 3, NULL, '2019-12-01 21:24:59', '2019-12-01 21:24:59'),
(59, 28, 2, 2, NULL, '2019-12-01 21:24:59', '2019-12-01 21:24:59'),
(60, 28, 3, 1, NULL, '2019-12-01 21:24:59', '2019-12-01 21:24:59'),
(61, 29, 1, 2, NULL, '2019-12-01 21:26:17', '2019-12-01 21:26:17'),
(62, 29, 2, 3, NULL, '2019-12-01 21:26:17', '2019-12-01 21:26:17'),
(63, 29, 3, 1, NULL, '2019-12-01 21:26:17', '2019-12-01 21:26:17'),
(64, 30, 1, 1, NULL, '2019-12-01 21:26:49', '2019-12-01 21:26:49'),
(65, 30, 2, 3, NULL, '2019-12-01 21:26:49', '2019-12-01 21:26:49'),
(66, 30, 3, 2, NULL, '2019-12-01 21:26:49', '2019-12-01 21:26:49'),
(67, 31, 1, 2, NULL, '2019-12-01 21:27:41', '2019-12-01 21:27:41'),
(68, 31, 2, 3, NULL, '2019-12-01 21:27:41', '2019-12-01 21:27:41'),
(69, 31, 3, 1, NULL, '2019-12-01 21:27:41', '2019-12-01 21:27:41'),
(70, 32, 1, 2, NULL, '2019-12-01 21:27:50', '2019-12-01 21:27:50'),
(71, 32, 2, 3, NULL, '2019-12-01 21:27:50', '2019-12-01 21:27:50'),
(72, 32, 3, 1, NULL, '2019-12-01 21:27:50', '2019-12-01 21:27:50'),
(73, 33, 1, 3, NULL, '2019-12-01 21:31:29', '2019-12-01 21:31:29'),
(74, 33, 2, 2, NULL, '2019-12-01 21:31:29', '2019-12-01 21:31:29'),
(75, 33, 3, 1, NULL, '2019-12-01 21:31:29', '2019-12-01 21:31:29'),
(76, 34, 1, 1, NULL, '2019-12-01 21:32:17', '2019-12-01 21:32:17'),
(77, 34, 2, 2, NULL, '2019-12-01 21:32:17', '2019-12-01 21:32:17'),
(78, 34, 3, 3, NULL, '2019-12-01 21:32:17', '2019-12-01 21:32:17'),
(79, 35, 1, 2, NULL, '2019-12-01 21:39:54', '2019-12-01 21:39:54'),
(80, 35, 2, 1, NULL, '2019-12-01 21:39:54', '2019-12-01 21:39:54'),
(81, 35, 3, 3, NULL, '2019-12-01 21:39:54', '2019-12-01 21:39:54'),
(82, 36, 1, 1, NULL, '2019-12-01 21:40:32', '2019-12-01 21:40:32'),
(83, 36, 2, 3, NULL, '2019-12-01 21:40:32', '2019-12-01 21:40:32'),
(84, 36, 3, 2, NULL, '2019-12-01 21:40:32', '2019-12-01 21:40:32'),
(85, 37, 1, 3, NULL, '2019-12-01 22:40:48', '2019-12-01 22:40:48'),
(86, 37, 2, 2, NULL, '2019-12-01 22:40:48', '2019-12-01 22:40:48'),
(87, 37, 3, 1, NULL, '2019-12-01 22:40:48', '2019-12-01 22:40:48'),
(88, 38, 1, 1, NULL, '2019-12-01 22:41:30', '2019-12-01 22:41:30'),
(89, 38, 2, 3, NULL, '2019-12-01 22:41:30', '2019-12-01 22:41:30'),
(90, 38, 3, 2, NULL, '2019-12-01 22:41:30', '2019-12-01 22:41:30'),
(91, 39, 1, 2, NULL, '2019-12-01 22:42:41', '2019-12-01 22:42:41'),
(92, 39, 2, 1, NULL, '2019-12-01 22:42:41', '2019-12-01 22:42:41'),
(93, 39, 3, 3, NULL, '2019-12-01 22:42:41', '2019-12-01 22:42:41'),
(94, 40, 1, 3, NULL, '2019-12-01 22:44:56', '2019-12-01 22:44:56'),
(95, 40, 2, 2, NULL, '2019-12-01 22:44:56', '2019-12-01 22:44:56'),
(96, 40, 3, 1, NULL, '2019-12-01 22:44:56', '2019-12-01 22:44:56'),
(97, 41, 1, 2, NULL, '2019-12-01 22:46:48', '2019-12-01 22:46:48'),
(98, 41, 2, 1, NULL, '2019-12-01 22:46:48', '2019-12-01 22:46:48'),
(99, 41, 3, 3, NULL, '2019-12-01 22:46:48', '2019-12-01 22:46:48'),
(100, 42, 1, 2, NULL, '2019-12-01 22:47:46', '2019-12-01 22:47:46'),
(101, 42, 2, 1, NULL, '2019-12-01 22:47:46', '2019-12-01 22:47:46'),
(102, 42, 3, 3, NULL, '2019-12-01 22:47:46', '2019-12-01 22:47:46'),
(103, 43, 1, 2, NULL, '2019-12-01 22:47:53', '2019-12-01 22:47:53'),
(104, 43, 2, 3, NULL, '2019-12-01 22:47:53', '2019-12-01 22:47:53'),
(105, 43, 3, 1, NULL, '2019-12-01 22:47:53', '2019-12-01 22:47:53'),
(106, 44, 1, 1, NULL, '2019-12-01 22:54:58', '2019-12-01 22:54:58'),
(107, 44, 2, 2, NULL, '2019-12-01 22:54:58', '2019-12-01 22:54:58'),
(108, 44, 3, 3, NULL, '2019-12-01 22:54:58', '2019-12-01 22:54:58'),
(109, 45, 1, 2, NULL, '2019-12-01 22:55:34', '2019-12-01 22:55:34'),
(110, 45, 2, 1, NULL, '2019-12-01 22:55:34', '2019-12-01 22:55:34'),
(111, 45, 3, 3, NULL, '2019-12-01 22:55:34', '2019-12-01 22:55:34'),
(112, 46, 1, 3, NULL, '2019-12-01 22:55:41', '2019-12-01 22:55:41'),
(113, 46, 2, 2, NULL, '2019-12-01 22:55:41', '2019-12-01 22:55:41'),
(114, 46, 3, 1, NULL, '2019-12-01 22:55:41', '2019-12-01 22:55:41'),
(115, 47, 1, 3, NULL, '2019-12-01 23:03:01', '2019-12-01 23:03:01'),
(116, 47, 2, 2, NULL, '2019-12-01 23:03:01', '2019-12-01 23:03:01'),
(117, 47, 3, 1, NULL, '2019-12-01 23:03:02', '2019-12-01 23:03:02'),
(118, 48, 1, 2, NULL, '2019-12-01 23:04:00', '2019-12-01 23:04:00'),
(119, 48, 2, 3, NULL, '2019-12-01 23:04:01', '2019-12-01 23:04:01'),
(120, 48, 3, 1, NULL, '2019-12-01 23:04:01', '2019-12-01 23:04:01'),
(121, 49, 1, 2, NULL, '2019-12-01 23:05:45', '2019-12-01 23:05:45'),
(122, 49, 2, 1, NULL, '2019-12-01 23:05:45', '2019-12-01 23:05:45'),
(123, 49, 3, 3, NULL, '2019-12-01 23:05:45', '2019-12-01 23:05:45'),
(124, 50, 1, 3, NULL, '2019-12-01 23:06:32', '2019-12-01 23:06:32'),
(125, 50, 2, 1, NULL, '2019-12-01 23:06:32', '2019-12-01 23:06:32'),
(126, 50, 3, 2, NULL, '2019-12-01 23:06:32', '2019-12-01 23:06:32'),
(127, 51, 1, 1, NULL, '2019-12-01 23:07:21', '2019-12-01 23:07:21'),
(128, 51, 2, 2, NULL, '2019-12-01 23:07:21', '2019-12-01 23:07:21'),
(129, 51, 3, 3, NULL, '2019-12-01 23:07:21', '2019-12-01 23:07:21'),
(130, 52, 1, 3, NULL, '2019-12-01 23:08:31', '2019-12-01 23:08:31'),
(131, 52, 2, 1, NULL, '2019-12-01 23:08:31', '2019-12-01 23:08:31'),
(132, 52, 3, 2, NULL, '2019-12-01 23:08:31', '2019-12-01 23:08:31'),
(133, 53, 1, 3, NULL, '2019-12-01 23:10:03', '2019-12-01 23:10:03'),
(134, 53, 2, 1, NULL, '2019-12-01 23:10:03', '2019-12-01 23:10:03'),
(135, 53, 3, 2, NULL, '2019-12-01 23:10:03', '2019-12-01 23:10:03'),
(136, 54, 1, 1, NULL, '2019-12-01 23:10:11', '2019-12-01 23:10:11'),
(137, 54, 2, 2, NULL, '2019-12-01 23:10:12', '2019-12-01 23:10:12'),
(138, 54, 3, 3, NULL, '2019-12-01 23:10:12', '2019-12-01 23:10:12'),
(139, 55, 1, 2, NULL, '2019-12-01 23:10:44', '2019-12-01 23:10:44'),
(140, 55, 2, 3, NULL, '2019-12-01 23:10:44', '2019-12-01 23:10:44'),
(141, 55, 3, 1, NULL, '2019-12-01 23:10:44', '2019-12-01 23:10:44'),
(142, 56, 1, 2, NULL, '2019-12-01 23:11:04', '2019-12-01 23:11:04'),
(143, 56, 2, 1, NULL, '2019-12-01 23:11:04', '2019-12-01 23:11:04'),
(144, 56, 3, 3, NULL, '2019-12-01 23:11:04', '2019-12-01 23:11:04'),
(145, 57, 1, 2, NULL, '2019-12-01 23:11:13', '2019-12-01 23:11:13'),
(146, 57, 2, 3, NULL, '2019-12-01 23:11:13', '2019-12-01 23:11:13'),
(147, 57, 3, 1, NULL, '2019-12-01 23:11:13', '2019-12-01 23:11:13'),
(148, 58, 1, 2, NULL, '2019-12-01 23:49:15', '2019-12-01 23:49:15'),
(149, 58, 2, 1, NULL, '2019-12-01 23:49:15', '2019-12-01 23:49:15'),
(150, 58, 3, 3, NULL, '2019-12-01 23:49:15', '2019-12-01 23:49:15'),
(151, 59, 1, 1, NULL, '2019-12-01 23:49:51', '2019-12-01 23:49:51'),
(152, 59, 2, 3, NULL, '2019-12-01 23:49:51', '2019-12-01 23:49:51'),
(153, 59, 3, 2, NULL, '2019-12-01 23:49:51', '2019-12-01 23:49:51'),
(154, 60, 1, 3, NULL, '2019-12-01 23:51:14', '2019-12-01 23:51:14'),
(155, 60, 2, 1, NULL, '2019-12-01 23:51:15', '2019-12-01 23:51:15'),
(156, 60, 3, 2, NULL, '2019-12-01 23:51:15', '2019-12-01 23:51:15'),
(157, 61, 1, 3, NULL, '2019-12-01 23:57:16', '2019-12-01 23:57:16'),
(158, 61, 2, 2, NULL, '2019-12-01 23:57:16', '2019-12-01 23:57:16'),
(159, 61, 3, 1, NULL, '2019-12-01 23:57:16', '2019-12-01 23:57:16'),
(160, 62, 1, 3, NULL, '2019-12-01 23:57:28', '2019-12-01 23:57:28'),
(161, 62, 2, 2, NULL, '2019-12-01 23:57:28', '2019-12-01 23:57:28'),
(162, 62, 3, 1, NULL, '2019-12-01 23:57:28', '2019-12-01 23:57:28'),
(163, 63, 1, 2, NULL, '2019-12-01 23:57:47', '2019-12-01 23:57:47'),
(164, 63, 2, 1, NULL, '2019-12-01 23:57:47', '2019-12-01 23:57:47'),
(165, 63, 3, 3, NULL, '2019-12-01 23:57:47', '2019-12-01 23:57:47'),
(166, 64, 1, 2, NULL, '2019-12-01 23:58:05', '2019-12-01 23:58:05'),
(167, 64, 2, 3, NULL, '2019-12-01 23:58:06', '2019-12-01 23:58:06'),
(168, 64, 3, 1, NULL, '2019-12-01 23:58:06', '2019-12-01 23:58:06'),
(169, 65, 1, 3, NULL, '2019-12-02 00:03:42', '2019-12-02 00:03:42'),
(170, 65, 2, 2, NULL, '2019-12-02 00:03:42', '2019-12-02 00:03:42'),
(171, 65, 3, 1, NULL, '2019-12-02 00:03:42', '2019-12-02 00:03:42'),
(172, 66, 1, 2, NULL, '2019-12-02 00:04:54', '2019-12-02 00:04:54'),
(173, 66, 2, 3, NULL, '2019-12-02 00:04:54', '2019-12-02 00:04:54'),
(174, 66, 3, 1, NULL, '2019-12-02 00:04:54', '2019-12-02 00:04:54'),
(175, 67, 1, 2, NULL, '2019-12-02 00:05:40', '2019-12-02 00:05:40'),
(176, 67, 2, 3, NULL, '2019-12-02 00:05:40', '2019-12-02 00:05:40'),
(177, 67, 3, 1, NULL, '2019-12-02 00:05:40', '2019-12-02 00:05:40'),
(178, 68, 1, 1, NULL, '2019-12-02 00:05:56', '2019-12-02 00:05:56'),
(179, 68, 2, 3, NULL, '2019-12-02 00:05:56', '2019-12-02 00:05:56'),
(180, 68, 3, 2, NULL, '2019-12-02 00:05:56', '2019-12-02 00:05:56'),
(181, 69, 1, 3, NULL, '2019-12-02 00:06:10', '2019-12-02 00:06:10'),
(182, 69, 2, 1, NULL, '2019-12-02 00:06:10', '2019-12-02 00:06:10'),
(183, 69, 3, 2, NULL, '2019-12-02 00:06:10', '2019-12-02 00:06:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `field_of_study`
--

CREATE TABLE `field_of_study` (
  `field_id` tinyint(4) NOT NULL,
  `field_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game`
--

CREATE TABLE `game` (
  `game_id` tinyint(4) NOT NULL,
  `game_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game_point`
--

CREATE TABLE `game_point` (
  `user_id` mediumint(9) NOT NULL,
  `game_id` tinyint(4) NOT NULL,
  `point` smallint(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level_result`
--

CREATE TABLE `level_result` (
  `user_id` mediumint(9) NOT NULL,
  `level` smallint(6) NOT NULL,
  `point` smallint(6) NOT NULL,
  `star` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level_up_history`
--

CREATE TABLE `level_up_history` (
  `user_id` mediumint(9) NOT NULL,
  `field_id` tinyint(4) NOT NULL,
  `level_up_to` smallint(6) NOT NULL,
  `level_up_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `max_game_point`
--

CREATE TABLE `max_game_point` (
  `user_id` mediumint(9) NOT NULL,
  `game_id` tinyint(4) NOT NULL,
  `point` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monthly_rank`
--

CREATE TABLE `monthly_rank` (
  `rank_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `begin_date` datetime NOT NULL,
  `finish_date` datetime NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `point` smallint(6) NOT NULL,
  `position` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `num_of_achieved`
--

CREATE TABLE `num_of_achieved` (
  `user_id` mediumint(9) NOT NULL,
  `achievement_id` tinyint(4) NOT NULL,
  `num_of_achieved` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `topic_id` smallint(6) NOT NULL,
  `topic_name_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topic_name_vi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name_en`, `topic_name_vi`, `image`, `level`) VALUES
(1, 'contract', 'hợp đồng', 'assets/images/topic/contract.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` mediumint(9) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `working_at` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_status`
--

CREATE TABLE `user_status` (
  `user_id` mediumint(9) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `weekly_rank`
--

CREATE TABLE `weekly_rank` (
  `rank_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `begin_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `point` smallint(6) NOT NULL,
  `position` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `word_en`
--

CREATE TABLE `word_en` (
  `word_id` smallint(6) NOT NULL,
  `word` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topic_id` smallint(6) NOT NULL,
  `spelling` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `voice` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `meaning_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `meaning_2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meaning_3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `example_sentence` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `word_en`
--

INSERT INTO `word_en` (`word_id`, `word`, `topic_id`, `spelling`, `voice`, `image`, `meaning_1`, `meaning_2`, `meaning_3`, `example_sentence`) VALUES
(1, 'resolve', 1, '[ri\'zɔlv]', 'assets/sound/toeic/contract/resolve.mp3', 'assets/images/toeic/contract/resolve.png', '(v) giải quyết', NULL, NULL, 'Have you resolved the problem of transport yet?'),
(2, 'determine', 1, '[di\'tə:min]', 'assets/sound/toeic/contract/determine.mp3', 'assets/images/toeic/contract/determine.png', '(v) xác định', NULL, NULL, 'This also makes his age impossible to determine.'),
(3, 'abide by', 1, '[ə\'baid]', 'assets/sound/toeic/contract/abide-by.mp3', 'assets/images/toeic/contract/abide-by.png', '(phrase verb) tuân thủ', NULL, NULL, 'I know it\'ll be hard for you to abide by my rules.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `achievement_category`
--
ALTER TABLE `achievement_category`
  ADD PRIMARY KEY (`achievement_id`),
  ADD UNIQUE KEY `achievement_name` (`achievement_name`);

--
-- Chỉ mục cho bảng `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`examination_id`);

--
-- Chỉ mục cho bảng `examination_category`
--
ALTER TABLE `examination_category`
  ADD PRIMARY KEY (`examination_category_id`),
  ADD UNIQUE KEY `examination_category_name` (`examination_category_name`);

--
-- Chỉ mục cho bảng `examination_part`
--
ALTER TABLE `examination_part`
  ADD PRIMARY KEY (`examination_part_id`);

--
-- Chỉ mục cho bảng `examination_question`
--
ALTER TABLE `examination_question`
  ADD PRIMARY KEY (`examination_question_id`);

--
-- Chỉ mục cho bảng `field_of_study`
--
ALTER TABLE `field_of_study`
  ADD PRIMARY KEY (`field_id`),
  ADD UNIQUE KEY `field_name` (`field_name`);

--
-- Chỉ mục cho bảng `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD UNIQUE KEY `game_name` (`game_name`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `level` (`level`),
  ADD UNIQUE KEY `topic_name_vi` (`topic_name_vi`),
  ADD UNIQUE KEY `topic_name_en` (`topic_name_en`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `word_en`
--
ALTER TABLE `word_en`
  ADD PRIMARY KEY (`word_id`),
  ADD UNIQUE KEY `word` (`word`),
  ADD UNIQUE KEY `voice` (`voice`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `achievement_category`
--
ALTER TABLE `achievement_category`
  MODIFY `achievement_id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `examination`
--
ALTER TABLE `examination`
  MODIFY `examination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `examination_category`
--
ALTER TABLE `examination_category`
  MODIFY `examination_category_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `examination_part`
--
ALTER TABLE `examination_part`
  MODIFY `examination_part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `examination_question`
--
ALTER TABLE `examination_question`
  MODIFY `examination_question_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `field_of_study`
--
ALTER TABLE `field_of_study`
  MODIFY `field_id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `game`
--
ALTER TABLE `game`
  MODIFY `game_id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `word_en`
--
ALTER TABLE `word_en`
  MODIFY `word_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
