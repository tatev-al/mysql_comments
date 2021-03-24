-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 24 2021 г., 08:38
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
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `name`, `comment`, `created_at`) VALUES
(78, 29, '', 'new user anushasfsdf\r\nold user', '2021-03-23 13:03:39'),
(76, 19, '', 'new nina', '2021-03-23 12:25:15'),
(75, 27, '', 'many many comments and much more', '2021-03-23 13:07:04'),
(74, 26, '', 'mane mane', '2021-03-23 11:59:50'),
(73, 27, '', 'new edition comment', '2021-03-23 11:15:38'),
(72, 28, '', 'armineeeee', '2021-03-23 07:01:23'),
(71, 0, '', 'narine 4', '2021-03-23 06:46:34'),
(70, 0, '', 'narine 3', '2021-03-23 06:42:52'),
(69, 27, '', 'narine 2\r\n', '2021-03-23 06:24:23'),
(68, 27, '', 'narine 1', '2021-03-23 06:24:12'),
(67, 0, '', '5 comm mane', '2021-03-23 06:20:33'),
(63, 26, '', 'second mane comm', '2021-03-23 05:25:34'),
(62, 26, '', 'mane comment', '2021-03-23 05:25:09'),
(66, 0, '', 'asfafeg', '2021-03-23 06:18:02'),
(22, 5, 'Lusine', 'asdjmear jrkj ljral wj\r\n', '2021-03-19 07:33:13'),
(65, 0, '', '4 comm mane', '2021-03-23 06:16:05'),
(64, 26, '', '3 comment', '2021-03-23 06:14:30'),
(58, 25, '', 'asfaegawg', '2021-03-22 08:20:54'),
(56, 25, '-', 'manuk is here', '2021-03-22 08:05:28'),
(31, 18, 'nick', 'this is nick', '2021-03-22 08:04:50'),
(32, 19, 'Nina', 'comment from Nina', '2021-03-22 08:04:44'),
(57, 25, 'user.name', 'asfaew a', '2021-03-22 08:16:17'),
(37, 21, 'Nare', 'this is nare', '2021-03-22 08:04:07'),
(40, 21, 'Nare', 'hey', '2021-03-22 08:03:58'),
(41, 21, 'Nare', 'heeyyy', '2021-03-22 08:03:55'),
(42, 22, 'Aram', 'hi', '2021-03-22 08:09:47'),
(43, 22, 'Aram', 'hi', '2021-03-22 08:09:47'),
(45, 23, 'Please', 'pls work', '2021-03-22 08:04:18'),
(80, 30, '', 'second lucky comment', '2021-03-23 13:05:29'),
(79, 30, '', 'new lucky comment\r\n(edited)', '2021-03-23 13:05:54'),
(54, 24, 'Please', 'this is amanda', '2021-03-22 08:04:27'),
(81, 27, '', 'narine comment after edit lucky', '2021-03-23 13:06:46');

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
(12, 'Serine', 'serine@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'Andy', 'andy@sandy.com', '76d80224611fc919a5d54f0ff9fba446'),
(4, 'ashley', 'ash@gmail.com', '3ea0928df53ea1fdb116a46aa20d7201'),
(5, 'Lusine', 'lusefds@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Lusine', 'lusefds@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'ashley', 'ash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'ashley', 'ash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(9, 'ashley', 'ash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'hakob', 'hakob@h.com', '7815696ecbf1c96e6894b779456d330e'),
(13, 'mary', 'mary@gm.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(14, 'sokrat', 'sok@g.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(15, 'Lance', 'l@l.l', '202cb962ac59075b964b07152d234b70'),
(16, 'Sam', 's@s.s', '202cb962ac59075b964b07152d234b70'),
(17, 'Ann', 'an@gm.com', '202cb962ac59075b964b07152d234b70'),
(18, 'nick', 'n@n.n', '202cb962ac59075b964b07152d234b70'),
(19, 'Nina', 'ni@n.n', '202cb962ac59075b964b07152d234b70'),
(20, 'Mama', 'ma@m.m', '202cb962ac59075b964b07152d234b70'),
(21, 'Nare', 'nare@nare.n', '202cb962ac59075b964b07152d234b70'),
(22, 'Aram', 'ar@ar.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(23, 'Please', 'pls@pls.pls', 'e10adc3949ba59abbe56e057f20f883e'),
(24, 'amanda', 'am@am.am', '202cb962ac59075b964b07152d234b70'),
(25, 'manuk', 'man@m.m', '202cb962ac59075b964b07152d234b70'),
(26, 'mane', 'mane@m.m', '202cb962ac59075b964b07152d234b70'),
(27, 'narine', 'narine@n.n', '202cb962ac59075b964b07152d234b70'),
(28, 'armine', 'armine@a.a', '202cb962ac59075b964b07152d234b70'),
(29, 'anush', 'anush@an.an', '202cb962ac59075b964b07152d234b70'),
(30, 'Lucky', 'lucky@l.l', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Структура таблицы `weather`
--

CREATE TABLE `weather` (
  `id` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `temperature` int(3) DEFAULT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `weather`
--

INSERT INTO `weather` (`id`, `city`, `temperature`, `last_update`) VALUES
(1, 'Yerevan', 15, '2021-03-24 11:31:15');

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
-- Индексы таблицы `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `weather`
--
ALTER TABLE `weather`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
