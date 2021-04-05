-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 05 2021 г., 07:56
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
(1, '32131', '33131', '3131', '1313'),
(2, '32131', '6337040496061bd0560d016.66367148', 'Doner', 'HTML, CSS');

-- --------------------------------------------------------

--
-- Структура таблицы `TBLCity`
--

CREATE TABLE `TBLCity` (
  `id` int(30) NOT NULL,
  `city_name` varchar(999) NOT NULL,
  `type_city` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `TBLCity`
--

INSERT INTO `TBLCity` (`id`, `city_name`, `type_city`) VALUES
(1, 'Алматы', NULL),
(2, 'Астана', NULL),
(3, 'Актобе', NULL),
(4, 'Актау', NULL),
(5, 'Семей', NULL),
(6, 'Караганда', NULL),
(7, 'Шымкент', NULL),
(8, 'Тараз', NULL),
(9, 'Кокшетау', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `TBLCountries`
--

CREATE TABLE `TBLCountries` (
  `id` int(30) NOT NULL,
  `id_country` varchar(999) NOT NULL,
  `country_name` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `TBLCountries`
--

INSERT INTO `TBLCountries` (`id`, `id_country`, `country_name`) VALUES
(1, 'AU', 'Австралия'),
(2, 'AT', 'Австрия'),
(3, 'AZ', 'Азербайджан'),
(4, 'AX', 'Аландские о-ва'),
(5, 'AL', 'Албания'),
(6, 'DZ', 'Алжир'),
(7, 'AS', 'Американское Самоа'),
(8, 'AI', 'Ангилья'),
(9, 'AO', 'Ангола'),
(10, 'AD', 'Андорра'),
(11, 'AQ', 'Антарктида'),
(12, 'AG', 'Антигуа и Барбуда'),
(13, 'AR', 'Аргентина'),
(14, 'AM', 'Армения'),
(15, 'AW', 'Аруба'),
(16, 'AF', 'Афганистан'),
(17, 'BS', 'Багамы'),
(18, 'BD', 'Бангладеш'),
(19, 'BB', 'Барбадос'),
(20, 'BH', 'Бахрейн'),
(21, 'BY', 'Беларусь'),
(22, 'BZ', 'Белиз'),
(23, 'BE', 'Бельгия'),
(24, 'BJ', 'Бенин'),
(25, 'BM', 'Бермудские о-ва'),
(26, 'BG', 'Болгария'),
(27, 'BO', 'Боливия'),
(28, 'BQ', 'Бонэйр, Синт-Эстатиус и Саба'),
(29, 'BA', 'Босния и Герцеговина'),
(30, 'BW', 'Ботсвана'),
(31, 'BR', 'Бразилия'),
(32, 'IO', 'Британская территория в Индийском океане'),
(33, 'BN', 'Бруней-Даруссалам'),
(34, 'BF', 'Буркина-Фасо'),
(35, 'BI', 'Бурунди'),
(36, 'BT', 'Бутан'),
(37, 'VU', 'Вануату'),
(38, 'VA', 'Ватикан'),
(39, 'GB', 'Великобритания'),
(40, 'HU', 'Венгрия'),
(41, 'VE', 'Венесуэла'),
(42, 'VG', 'Виргинские о-ва (Великобритания)'),
(43, 'VI', 'Виргинские о-ва (США)'),
(44, 'UM', 'Внешние малые о-ва (США)'),
(45, 'TL', 'Восточный Тимор'),
(46, 'VN', 'Вьетнам'),
(47, 'GA', 'Габон'),
(48, 'HT', 'Гаити'),
(49, 'GY', 'Гайана'),
(50, 'GM', 'Гамбия'),
(51, 'GH', 'Гана'),
(52, 'GP', 'Гваделупа'),
(53, 'GT', 'Гватемала'),
(54, 'GN', 'Гвинея'),
(55, 'GW', 'Гвинея-Бисау'),
(56, 'DE', 'Германия'),
(57, 'GG', 'Гернси'),
(58, 'GI', 'Гибралтар'),
(59, 'HN', 'Гондурас'),
(60, 'HK', 'Гонконг (САР)'),
(61, 'GD', 'Гренада'),
(62, 'GL', 'Гренландия'),
(63, 'GR', 'Греция'),
(64, 'GE', 'Грузия'),
(65, 'GU', 'Гуам'),
(66, 'DK', 'Дания'),
(67, 'JE', 'Джерси'),
(68, 'DJ', 'Джибути'),
(69, 'DM', 'Доминика'),
(70, 'DO', 'Доминиканская Республика'),
(71, 'EG', 'Египет'),
(72, 'ZM', 'Замбия'),
(73, 'EH', 'Западная Сахара'),
(74, 'ZW', 'Зимбабве'),
(75, 'IL', 'Израиль'),
(76, 'IN', 'Индия'),
(77, 'id_country', 'Индонезия'),
(78, 'JO', 'Иордания'),
(79, 'IQ', 'Ирак'),
(80, 'IR', 'Иран'),
(81, 'IE', 'Ирландия'),
(82, 'IS', 'Исландия'),
(83, 'ES', 'Испания'),
(84, 'IT', 'Италия'),
(85, 'YE', 'Йемен'),
(86, 'CV', 'Кабо-Верде'),
(87, 'KZ', 'Казахстан'),
(88, 'KH', 'Камбоджа'),
(89, 'CM', 'Камерун'),
(90, 'CA', 'Канада'),
(91, 'QA', 'Катар'),
(92, 'KE', 'Кения'),
(93, 'CY', 'Кипр'),
(94, 'KG', 'Киргизия'),
(95, 'KI', 'Кирибати'),
(96, 'CN', 'Китай'),
(97, 'KP', 'КНДР'),
(98, 'CC', 'Кокосовые о-ва'),
(99, 'CO', 'Колумбия'),
(100, 'KM', 'Коморы'),
(101, 'CG', 'Конго - Браззавиль'),
(102, 'CD', 'Конго - Киншаса'),
(103, 'CR', 'Коста-Рика'),
(104, 'CI', 'Кот-д’Ивуар'),
(105, 'CU', 'Куба'),
(106, 'KW', 'Кувейт'),
(107, 'CW', 'Кюрасао'),
(108, 'LA', 'Лаос'),
(109, 'LV', 'Латвия'),
(110, 'LS', 'Лесото'),
(111, 'LR', 'Либерия'),
(112, 'LB', 'Ливан'),
(113, 'LY', 'Ливия'),
(114, 'LT', 'Литва'),
(115, 'LI', 'Лихтенштейн'),
(116, 'LU', 'Люксембург'),
(117, 'MU', 'Маврикий'),
(118, 'MR', 'Мавритания'),
(119, 'MG', 'Мадагаскар'),
(120, 'YT', 'Майотта'),
(121, 'MO', 'Макао (САР)'),
(122, 'MW', 'Малави'),
(123, 'MY', 'Малайзия'),
(124, 'ML', 'Мали'),
(125, 'MV', 'Мальдивы'),
(126, 'MT', 'Мальта'),
(127, 'MA', 'Марокко'),
(128, 'MQ', 'Мартиника'),
(129, 'MH', 'Маршалловы Острова'),
(130, 'MX', 'Мексика'),
(131, 'MZ', 'Мозамбик'),
(132, 'MD', 'Молдова'),
(133, 'MC', 'Монако'),
(134, 'MN', 'Монголия'),
(135, 'MS', 'Монтсеррат'),
(136, 'MM', 'Мьянма (Бирма)'),
(137, 'NA', 'Намибия'),
(138, 'NR', 'Науру'),
(139, 'NP', 'Непал'),
(140, 'NE', 'Нигер'),
(141, 'NG', 'Нигерия'),
(142, 'NL', 'Нидерланды'),
(143, 'NI', 'Никарагуа'),
(144, 'NU', 'Ниуэ'),
(145, 'NZ', 'Новая Зеландия'),
(146, 'NC', 'Новая Каледония'),
(147, 'NO', 'Норвегия'),
(148, 'BV', 'о-в Буве'),
(149, 'IM', 'о-в Мэн'),
(150, 'NF', 'о-в Норфолк'),
(151, 'CX', 'о-в Рождества'),
(152, 'SH', 'о-в Св. Елены'),
(153, 'PN', 'о-ва Питкэрн'),
(154, 'TC', 'о-ва Тёркс и Кайкос'),
(155, 'HM', 'о-ва Херд и Макдональд'),
(156, 'AE', 'ОАЭ'),
(157, 'OM', 'Оман'),
(158, 'KY', 'Острова Кайман'),
(159, 'CK', 'Острова Кука'),
(160, 'PK', 'Пакистан'),
(161, 'PW', 'Палау'),
(162, 'PS', 'Палестинские территории'),
(163, 'PA', 'Панама'),
(164, 'PG', 'Папуа — Новая Гвинея'),
(165, 'PY', 'Парагвай'),
(166, 'PE', 'Перу'),
(167, 'PL', 'Польша'),
(168, 'PT', 'Португалия'),
(169, 'PR', 'Пуэрто-Рико'),
(170, 'KR', 'Республика Корея'),
(171, 'RE', 'Реюньон'),
(172, 'RU', 'Россия'),
(173, 'RW', 'Руанда'),
(174, 'RO', 'Румыния'),
(175, 'SV', 'Сальвадор'),
(176, 'WS', 'Самоа'),
(177, 'SM', 'Сан-Марино'),
(178, 'ST', 'Сан-Томе и Принсипи'),
(179, 'SA', 'Саудовская Аравия'),
(180, 'MK', 'Северная Македония'),
(181, 'MP', 'Северные Марианские о-ва'),
(182, 'SC', 'Сейшельские Острова'),
(183, 'BL', 'Сен-Бартелеми'),
(184, 'MF', 'Сен-Мартен'),
(185, 'PM', 'Сен-Пьер и Микелон'),
(186, 'SN', 'Сенегал'),
(187, 'VC', 'Сент-Винсент и Гренадины'),
(188, 'KN', 'Сент-Китс и Невис'),
(189, 'LC', 'Сент-Люсия'),
(190, 'RS', 'Сербия'),
(191, 'SG', 'Сингапур'),
(192, 'SX', 'Синт-Мартен'),
(193, 'SY', 'Сирия'),
(194, 'SK', 'Словакия'),
(195, 'SI', 'Словения'),
(196, 'US', 'Соединенные Штаты'),
(197, 'SB', 'Соломоновы Острова'),
(198, 'SO', 'Сомали'),
(199, 'SD', 'Судан'),
(200, 'SR', 'Суринам'),
(201, 'SL', 'Сьерра-Леоне'),
(202, 'TJ', 'Таджикистан'),
(203, 'TH', 'Таиланд'),
(204, 'TW', 'Тайвань'),
(205, 'TZ', 'Танзания'),
(206, 'TG', 'Того'),
(207, 'TK', 'Токелау'),
(208, 'TO', 'Тонга'),
(209, 'TT', 'Тринидад и Тобаго'),
(210, 'TV', 'Тувалу'),
(211, 'TN', 'Тунис'),
(212, 'TM', 'Туркменистан'),
(213, 'TR', 'Турция'),
(214, 'UG', 'Уганда'),
(215, 'UZ', 'Узбекистан'),
(216, 'UA', 'Украина'),
(217, 'WF', 'Уоллис и Футуна'),
(218, 'UY', 'Уругвай'),
(219, 'FO', 'Фарерские о-ва'),
(220, 'FM', 'Федеративные Штаты Микронезии'),
(221, 'FJ', 'Фиджи'),
(222, 'PH', 'Филиппины'),
(223, 'FI', 'Финляндия'),
(224, 'FK', 'Фолклендские о-ва'),
(225, 'FR', 'Франция'),
(226, 'GF', 'Французская Гвиана'),
(227, 'PF', 'Французская Полинезия'),
(228, 'TF', 'Французские Южные территории'),
(229, 'HR', 'Хорватия'),
(230, 'CF', 'Центрально-Африканская Республика'),
(231, 'TD', 'Чад'),
(232, 'ME', 'Черногория'),
(233, 'CZ', 'Чехия'),
(234, 'CL', 'Чили'),
(235, 'CH', 'Швейцария'),
(236, 'SE', 'Швеция'),
(237, 'SJ', 'Шпицберген и Ян-Майен'),
(238, 'LK', 'Шри-Ланка'),
(239, 'EC', 'Эквадор'),
(240, 'GQ', 'Экваториальная Гвинея'),
(241, 'ER', 'Эритрея'),
(242, 'SZ', 'Эсватини'),
(243, 'EE', 'Эстония'),
(244, 'ET', 'Эфиопия'),
(245, 'GS', 'Южная Георгия и Южные Сандвичевы о-ва'),
(246, 'ZA', 'Южно-Африканская Республика'),
(247, 'SS', 'Южный Судан'),
(248, 'JM', 'Ямайка'),
(249, 'JP', 'Япония');

-- --------------------------------------------------------

--
-- Структура таблицы `TBLTags`
--

CREATE TABLE `TBLTags` (
  `id` int(30) NOT NULL,
  `name_tag` varchar(999) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `TBLTags`
--

INSERT INTO `TBLTags` (`id`, `name_tag`, `type`) VALUES
(1, '#HTML', 'prog'),
(2, '#CSS', 'prog'),
(3, '#Java', 'prog'),
(4, '#iOS', 'prog'),
(19, '#Unity', 'prog'),
(6, '#PHP', 'prog'),
(18, '#GameDev', 'prog'),
(17, '#WebDesign', 'prog'),
(16, '#Swift', 'prog'),
(15, '#FrontEnd', 'prog'),
(14, '#Python', 'prog'),
(13, '#BackEnd', 'prog'),
(20, '#UnrealEngine', 'prog'),
(21, '#SQL', 'prog'),
(22, '#Kotlin', 'prog'),
(23, '#Ruby', 'prog'),
(24, '#Wordpress', 'prog'),
(25, '#TypeScript', 'prog'),
(26, '#React', 'prog'),
(27, '#Angular', 'prog'),
(28, '#Vue', 'prog'),
(29, '#Go', 'prog'),
(30, '#C++', 'prog'),
(31, '#C#', 'prog'),
(32, '#C', 'prog'),
(33, '#Photoshop', 'design'),
(34, '#PhotoEditing', 'design'),
(35, '#CharacterAnimation', ''),
(36, '#Design', ''),
(37, '#InDesign', ''),
(38, '#Illustrator', ''),
(39, '#Figma', ''),
(40, '#Sketch', ''),
(41, '#PresentationMaking', ''),
(42, '#PhotoShooting', ''),
(43, '#VideoShooting', ''),
(44, '#VisualEffects', ''),
(45, '#VideoEditing', ''),
(46, '#Adobe Premiere pro', ''),
(47, '#Final Cut Pro', ''),
(48, '#Subtitles&Captions', ''),
(49, '#BusinessDev', ''),
(50, '#CRM', ''),
(51, '#Ads', ''),
(52, '#2DDesign', ''),
(53, '#Sales', ''),
(54, '#Blog', ''),
(55, '#3D_Animation', ''),
(56, '#MotionDesign', ''),
(57, '#Marketing', ''),
(58, '#InterfaceDesign', ''),
(59, '#UI', ''),
(60, '#UX', '');

-- --------------------------------------------------------

--
-- Структура таблицы `TBLWorkActivity`
--

CREATE TABLE `TBLWorkActivity` (
  `id` int(30) NOT NULL,
  `name_tag` varchar(999) NOT NULL,
  `type` varchar(999) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `TBLWorkActivity`
--

INSERT INTO `TBLWorkActivity` (`id`, `name_tag`, `type`) VALUES
(1, 'Аналитика', NULL),
(2, 'Аппаратные средства', NULL),
(3, 'Архитектура', NULL),
(4, 'Благотворительность', NULL),
(5, 'Видео/Анимация', NULL),
(6, 'Веб-разработчик', NULL),
(7, 'Дизайн/Искусство', NULL),
(8, 'Еда', NULL),
(9, 'Игры', NULL),
(10, 'Инженерия', NULL),
(11, 'Маркетинг в социальных сетях', NULL),
(12, 'Медицина/Здоровье', NULL),
(13, 'Музыка', NULL),
(14, 'Наука', NULL),
(15, 'Образование', NULL),
(16, 'Оптимизация рабочей силы', NULL),
(17, 'Переводы', NULL),
(18, 'Предпринимательство', NULL),
(19, 'Програмное обеспечение', NULL),
(20, 'Развлечения', NULL),
(21, 'Разработка приложений', NULL),
(22, 'Составление текстов', NULL),
(23, 'Социальные', NULL),
(24, 'Спорт', NULL),
(25, 'Финансы', NULL),
(26, 'Экология', NULL),
(27, 'Фотография', NULL),
(28, 'Любое', NULL);

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
(12, '37230010360619106699665.89102274', 'Кевин', 'Джонсон', 'kevin2@gmail.com', '$2y$10$OHlNNzzZS706tGPlbp7mL.N/potuZUyDH/VWXItNAE3s1ysUwxEye', 'Американское Самоа', 'Алматы', '#iOS, #Java', '#iOS, #Java, #PHP', '2021-03-03', 'Мужчина', 'dsdadsadad3213'),
(13, '6337040496061bd0560d016.66367148', 'Doner', 'Doner', 'doner@yahoo.com', '$2y$10$GVLoyiEvqqcPiBGB88YufePqHyFgzC8JUzDWNSq0OK1cLVp2.Z/pe', 'Австралия', 'Актау', '#iOS', '#Java', '2021-03-04', 'Мужчина', '2211221'),
(14, '21438998556061bd1b59add6.25988263', 'Doner', 'Doner', 'doner@yahoo.com', '$2y$10$kk1KJTZHaQ4zd0x86qVKkussus464lItETpJtT/U4xPzSPYFyJ.FK', 'Австралия', 'Актау', '#iOS', '#Java', '2021-03-04', 'Мужчина', '2211221'),
(15, '1165406987606214a11e44f9.75994187', 'doner22322222', '22222222', 'doner22222@yahoo.com', '$2y$10$uxX4TPUOqKzdMBSUhB9bye0yUUrIWOt50QgXuY6Uy/ujpXvkc7o8S', 'Казахстан', 'Астана', 'Аппаратные средства, Архитектура, Благотворительность, Видео/Анимация', '#CSS', '1998-03-02', 'Мужской', 'sasasaыыыыы');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `TBLCity`
--
ALTER TABLE `TBLCity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `TBLCountries`
--
ALTER TABLE `TBLCountries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `TBLTags`
--
ALTER TABLE `TBLTags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `TBLWorkActivity`
--
ALTER TABLE `TBLWorkActivity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `TBLCity`
--
ALTER TABLE `TBLCity`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `TBLCountries`
--
ALTER TABLE `TBLCountries`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT для таблицы `TBLTags`
--
ALTER TABLE `TBLTags`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `TBLWorkActivity`
--
ALTER TABLE `TBLWorkActivity`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
