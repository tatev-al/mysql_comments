-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 18 2021 г., 02:15
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
-- База данных: `intern`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `created_at`) VALUES
(1, 'Aleks', 'My first commmmmmment, yeah', '2021-03-15 22:52:01'),
(2, 'Tom', 'hello hell', '2021-03-15 23:00:28'),
(3, 'michael', 'hi, i\'m misha', '2021-03-16 00:25:37'),
(4, 'Tatevik', 'hello, i am from yerevan', '2021-03-16 00:29:33'),
(5, 'Hovo', 'Privet', '2021-03-16 00:30:08'),
(8, 'anna', 'lorem ipsum', '2021-03-16 00:48:20'),
(7, 'Astgh', '<3', '2021-03-16 00:31:46'),
(9, 'Lusine', 'esrdtfyuhjiokpl[', '2021-03-16 00:59:17'),
(10, 'narek', 'iunyiunyh', '2021-03-16 00:59:48'),
(11, 'sara', 'qwewrfdg ', '2021-03-16 01:00:38'),
(12, 'arm', 'asfgb', '2021-03-16 01:01:07'),
(13, 'arm', 'asfgb', '2021-03-16 01:02:35'),
(14, 'knar', 'asdvfb', '2021-03-16 01:03:11'),
(15, 'lernik', 'hiiii', '2021-03-16 01:04:33'),
(16, 'new', 'newbie', '2021-03-16 01:12:35'),
(17, 'Done', 'My job is done', '2021-03-16 01:50:18'),
(18, 'Patrick', 'Last test', '2021-03-16 02:09:06'),
(19, 'name', 'not name', '2021-03-16 18:29:59'),
(20, 'name2', 'asdfghgnfgbv', '2021-03-17 02:37:36'),
(21, 'Lusine', 'as;jfe\r\n', '2021-03-17 06:13:57'),
(22, 'Lusine', 'asdjmear jrkj ljral wj\r\n', '2021-03-17 06:49:12'),
(23, 'Adam', ';klfdfaf', '2021-03-18 01:09:40');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`) VALUES
(4, 'ashley', 'ash@gmail.com', '3ea0928df53ea1fdb116a46aa20d7201'),
(5, 'Lusine', 'lusefds@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Lusine', 'lusefds@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'ashley', 'ash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'ashley', 'ash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(9, 'ashley', 'ash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'hakob', 'hakob@h.com', '7815696ecbf1c96e6894b779456d330e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
