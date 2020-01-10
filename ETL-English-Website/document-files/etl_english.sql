-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2019 lúc 04:47 PM
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `examination_category`
--

CREATE TABLE `examination_category` (
  `examination_category_id` tinyint(4) NOT NULL,
  `examination_category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `examination_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `examination_category`
--
ALTER TABLE `examination_category`
  MODIFY `examination_category_id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `examination_part`
--
ALTER TABLE `examination_part`
  MODIFY `examination_part_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `examination_question`
--
ALTER TABLE `examination_question`
  MODIFY `examination_question_id` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `topic_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `word_en`
--
ALTER TABLE `word_en`
  MODIFY `word_id` smallint(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
