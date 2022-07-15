-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 15 2022 г., 12:41
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii`
--

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id`, `url`, `date`) VALUES
(14, 'http://google.com', '2022-06-14 05:46:06'),
(15, 'http://mail.ru', '2022-06-14 05:49:37'),
(16, 'http://rambler.ru', '2022-07-14 05:51:37'),
(17, 'http://mail.ru', '2022-07-15 12:16:37'),
(18, 'http://yandex.ru', '2022-07-15 12:33:00'),
(19, 'http://google.com', '2022-06-14 05:46:06'),
(20, 'http://mail.ru', '2022-07-14 05:49:37'),
(21, 'http://rambler.ru', '2022-07-14 05:51:37'),
(22, 'http://mail.ru', '2022-07-15 12:16:37'),
(23, 'http://yandex.ru', '2022-07-15 12:33:00'),
(24, 'http://google.com', '2022-07-14 05:46:06'),
(25, 'http://mail.ru', '2022-07-14 05:49:37'),
(26, 'http://rambler.ru', '2022-07-14 05:51:37'),
(27, 'http://mail.ru', '2022-07-15 12:16:37'),
(28, 'http://yandex.ru', '2022-07-15 12:33:00'),
(29, 'http://google.com', '2022-07-14 05:46:06'),
(30, 'http://mail.ru', '2022-07-14 05:49:37'),
(31, 'http://rambler.ru', '2022-07-14 05:51:37'),
(32, 'http://mail.ru', '2022-07-15 12:16:37'),
(33, 'http://yandex.ru', '2022-07-15 12:33:00'),
(34, 'http://google.com', '2022-07-15 12:38:48'),
(35, 'http://mail.ru', '2022-07-15 12:12:17');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1657793447),
('m220714_100946_create_shorturl_table', 1657793448),
('m220714_135426_create_log_table', 1657806890);

-- --------------------------------------------------------

--
-- Структура таблицы `queue`
--

CREATE TABLE `queue` (
  `id` int NOT NULL,
  `channel` varchar(255) NOT NULL,
  `job` blob NOT NULL,
  `pushed_at` int NOT NULL,
  `ttr` int NOT NULL,
  `delay` int NOT NULL DEFAULT '0',
  `priority` int UNSIGNED NOT NULL DEFAULT '1024',
  `reserved_at` int DEFAULT NULL,
  `attempt` int DEFAULT NULL,
  `done_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `shorturl`
--

CREATE TABLE `shorturl` (
  `id` int NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `shorturl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `shorturl`
--

INSERT INTO `shorturl` (`id`, `url`, `shorturl`) VALUES
(12, 'http://mail.ru', 'Pep0B'),
(13, 'http://yandex.ru', '0dXi4'),
(14, 'http://yandex.ru', 'qzMJt'),
(15, 'http://google.com', 'uNEKO'),
(16, 'http://mail.ru', 'n5VQ7'),
(17, 'http://mail.ru', 'M-69T'),
(18, 'http://mail.ru', 'MbahH'),
(19, 'http://google.com', 'Hajab');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channel` (`channel`),
  ADD KEY `reserved_at` (`reserved_at`),
  ADD KEY `priority` (`priority`);

--
-- Индексы таблицы `shorturl`
--
ALTER TABLE `shorturl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `shorturl`
--
ALTER TABLE `shorturl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
