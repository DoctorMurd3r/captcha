-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2022 г., 14:21
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_whiterabbit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `client_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_browser_info` text COLLATE utf8mb4_unicode_ci,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`id`, `username`, `email`, `message`, `client_ip`, `client_browser_info`, `create_time`) VALUES
(1, 'test', 'example@mail.ru', 'message text', '127.0.0.1', 'Chrome', '2022-06-24 10:44:43'),
(2, 'goose', 'example@mail.ru', 'message example text', '127.0.0.1', 'Chrome', '2022-06-24 10:46:09'),
(3, 'test', 'example222@mail.ru', '123123123123', '127.0.0.1', 'Chrome', '2022-06-24 10:46:29'),
(4, 'testov', 'example222@mail.com', 'example example example example', '127.0.0.1', 'Chrome', '2022-06-24 10:47:12'),
(5, 'test', 'newlifeyeah@mail.ru', '123test123', '127.0.0.1', 'Chrome', '2022-06-24 10:47:31'),
(6, 'testov', 'example@gmail.com', '123testtest', '127.0.0.1', 'Opera', '2022-06-24 10:48:15'),
(7, 'goose', 'newlifeyeahyeah@gmail.com', 'test test test 123 text', '127.0.0.1', 'Chrome', '2022-06-24 10:49:11'),
(8, 'goose', 'newlifeyeahyeah@gmail.com', '123test', '127.0.0.1', 'Chrome', '2022-06-24 10:51:11'),
(9, '123123', 'newlifeyeahyeah@gmail.com', '123', '127.0.0.1', 'Chrome', '2022-06-24 10:51:29'),
(10, 'goose', 'newlifeyeahyeah@gmail.com', '123123123', '127.0.0.1', 'Chrome', '2022-06-24 11:16:20'),
(11, 'abcdef', 'newlifeyeahyeah@gmail.com', 'zxcvb', '127.0.0.1', 'Chrome', '2022-06-24 11:16:34');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
