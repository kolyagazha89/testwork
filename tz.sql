-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 08 2024 г., 13:10
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `long2short`
--

CREATE TABLE `long2short` (
  `id` int NOT NULL,
  `long_url` text NOT NULL,
  `short_url` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `long2short`
--

INSERT INTO `long2short` (`id`, `long_url`, `short_url`) VALUES
(126, 'https://code.tutsplus.com/ru/how-to-use-ajax-in-php-and-jquery--cms-32494t', '3zcv74'),
(127, 'https://code.tutsplus.com/ru/how-to-use-ajax-in-php-and-jquery--cms-32494t', 'YH1Dns'),
(128, 'https://ruseller.com/lessons.php?rub=37&id=1579', '7Lmc6w'),
(129, 'https://hh.ru/applicant/negotiations', 'QVDbtN'),
(130, 'asdasd', 'Lvs3dx'),
(131, 'sadasd', 'XY36JP');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `long2short`
--
ALTER TABLE `long2short`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `long2short`
--
ALTER TABLE `long2short`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
