-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 25 2018 г., 18:34
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `aptech_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `session_token` varchar(80) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `description`, `image`, `session_token`, `last_login`) VALUES
(25, 'Vasya', 'Sumkin', 'ssssasas3@gjhj.xxx', '1a100d2c0dab19c4430e7d73762b3423', '333333 eto moi parol \r\n', '/public/uploads/images/25.jpg', 'empty', 1535206582),
(43, 'Petya', 'Zadov', 'aaa@gmail.com', '670b14728ad9902aecba32e22fa4f6bd', 'my password is 000000', '/public/uploads/images/43.jpg', 'empty', 1535209815),
(44, 'Stiver', 'Worker', 'eojf@gmail.com', '670b14728ad9902aecba32e22fa4f6bd', 'in app .. has some settings\r\n', '/public/uploads/images/44.jpg', 'empty', 1535209969),
(45, 'Zloi ', 'Avatar', 'avatar@gmail.ck', '670b14728ad9902aecba32e22fa4f6bd', 'you set in app show/hide email in prewiew...\r\n', '/public/uploads/images/45.jpg', 'empty', 1535210087),
(46, 'Avatar', 'simple', 'fjdkd@fjjf.jj', '670b14728ad9902aecba32e22fa4f6bd', 'you set public/private user list for guests', '/public/uploads/images/46.jpg', 'empty', 1535210202),
(47, 'Avatar', 'Girl', 'girl@mail.kj', '8a01a3157e6a9e5811085223b2407c2f', 'you set timeout of session\r\n', '/public/uploads/images/47.jpg', 'empty', 1535210295),
(48, 'Avatar', 'Mult', 'mult@jfjf.jj', '3cbec74d220869c558a6ea4417bc4d0c', 'you can change path to images in settings', '/public/uploads/images/48.jpg', 'empty', 1535210395),
(49, 'MUlT', 'GIRL', 'mugirl@jfj.jj', 'ce134c5b3719b6d2a448bc588833fae3', 'i create page for 404 ', '/public/uploads/images/49.jpg', 'empty', 1535210479),
(50, 'Mult', 'Hero', 'hero@mail.kk', 'ab06df8a515401b47217dbc1f5b9d2e9', 'i create class Config for get config variables in different places of application', '/public/uploads/images/50.jpg', 'empty', 1535210602),
(51, 'Old ', 'Woman', 'olsd@jfjk.kk', 'd4debd7c3ff6c9f25d722b1a6e80186d', 'i create pagination and settings for change count of users on page', '/public/uploads/images/51.jpg', '69936208acd6e0a26585ebd99e4fb503', 1535210729);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
