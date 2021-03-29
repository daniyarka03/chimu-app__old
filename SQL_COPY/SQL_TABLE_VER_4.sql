-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 29 2021 г., 13:39
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chimu-team`
--

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `creator_id` varchar(65) NOT NULL,
  `creator_name` varchar(55) NOT NULL,
  `category` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `title`, `creator_id`, `creator_name`, `category`) VALUES
(62, 'AppleDev', '457868046058a2d27054e7.94836182', 'Admin', '#iOS');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` varchar(65) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(99) CHARACTER SET utf8 NOT NULL,
  `city` varchar(99) CHARACTER SET utf8 NOT NULL,
  `work_activity` varchar(999) CHARACTER SET utf8 NOT NULL,
  `keywords_profile` varchar(999) CHARACTER SET utf8 NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(30) CHARACTER SET utf8 NOT NULL,
  `descr` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `id_user`, `first_name`, `last_name`, `email`, `pass`, `country`, `city`, `work_activity`, `keywords_profile`, `birthdate`, `gender`, `descr`) VALUES
(10, '457868046058a2d27054e7.94836182', 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$aiprwLR7MA/ZLFMRPxzije7zKE2aRwQ8EzIPQ1roojNrnZMZO31Py', '', '', '', '', '0000-00-00', '', NULL),
(11, '126550518260617e649ddda5.06669290', 'Кевин', 'Джонсон', 'kevin@gmail.com', '$2y$10$F5BTJ7g0JFEMwxv0DyaOAeFgYikFPLYP/2ajhtI.kACbJ8fhjvjGO', 'AU', 'Алматы', '#iOS, #Java', '#Java, #PHP', '2021-03-03', '#iOS', 'dsdadsadad'),
(12, '37230010360619106699665.89102274', 'Кевин', 'Джонсон', 'kevin2@gmail.com', '$2y$10$OHlNNzzZS706tGPlbp7mL.N/potuZUyDH/VWXItNAE3s1ysUwxEye', 'Американское Самоа', 'Алматы', '#iOS, #Java', '#iOS, #Java, #PHP', '2021-03-03', 'Мужчина', 'dsdadsadad3213');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
