-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 29 2021 г., 01:02
-- Версия сервера: 5.5.65-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `newstation`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buses`
--

CREATE TABLE IF NOT EXISTS `buses` (
  `id_bus` int(11) unsigned NOT NULL,
  `brand` varchar(30) NOT NULL COMMENT 'Марка автобуса',
  `number` varchar(10) NOT NULL COMMENT 'Номер',
  `driver` varchar(30) NOT NULL COMMENT 'Водитель',
  `number_seats` tinyint(3) unsigned NOT NULL COMMENT 'Число мест'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Автобусы';

-- --------------------------------------------------------

--
-- Структура таблицы `destinations`
--

CREATE TABLE IF NOT EXISTS `destinations` (
  `id_destination` int(11) unsigned NOT NULL,
  `destination` varchar(50) NOT NULL COMMENT 'Пункт назначения'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='Пункты назначения';

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
  `id_flight` int(11) unsigned NOT NULL,
  `departure_time` time NOT NULL COMMENT 'Время отправления',
  `arrival_time` time NOT NULL COMMENT 'Время прибытия',
  `id_route` int(11) unsigned NOT NULL COMMENT 'Маршрут',
  `id_bus` int(11) unsigned NOT NULL COMMENT 'Автобус',
  `ticket_price` int(11) unsigned NOT NULL COMMENT 'Цена билета'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Рейсы';

-- --------------------------------------------------------

--
-- Структура таблицы `movement_days`
--

CREATE TABLE IF NOT EXISTS `movement_days` (
  `id_movement` int(11) unsigned NOT NULL,
  `day` varchar(15) NOT NULL COMMENT 'день'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Дни движения';

-- --------------------------------------------------------

--
-- Структура таблицы `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id_route` int(11) unsigned NOT NULL,
  `departure` varchar(50) NOT NULL COMMENT 'Пункт отправления',
  `id_destination` int(11) unsigned NOT NULL COMMENT 'Пункт назначения',
  `id_movement` int(11) unsigned NOT NULL COMMENT 'Дни движения',
  `travel_time` time NOT NULL COMMENT 'Время в пути, ч:м'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='Маршруты';

-- --------------------------------------------------------

--
-- Структура таблицы `stops`
--

CREATE TABLE IF NOT EXISTS `stops` (
  `id_stop` int(11) unsigned NOT NULL,
  `stop` varchar(20) NOT NULL COMMENT 'Остановка',
  `id_route` int(11) unsigned NOT NULL COMMENT 'Маршрут'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Остановки';

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id_ticket` int(11) unsigned NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `id_flight` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) unsigned NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL DEFAULT '',
  `last_name` varchar(30) NOT NULL COMMENT 'Фамилия',
  `first_name` varchar(30) NOT NULL COMMENT 'Имя',
  `patronymic` varchar(30) NOT NULL COMMENT 'Отчество',
  `gender` tinyint(1) unsigned NOT NULL COMMENT 'Пол',
  `date_birth` date NOT NULL COMMENT 'Дата рождения',
  `serie_passport` int(10) unsigned NOT NULL COMMENT 'Номер документа',
  `phone_number` bigint(20) NOT NULL,
  `role` enum('user','manager') NOT NULL COMMENT 'Роль'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id_bus`);

--
-- Индексы таблицы `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id_destination`);

--
-- Индексы таблицы `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id_flight`), ADD KEY `id_route` (`id_route`), ADD KEY `id_bus` (`id_bus`);

--
-- Индексы таблицы `movement_days`
--
ALTER TABLE `movement_days`
  ADD PRIMARY KEY (`id_movement`);

--
-- Индексы таблицы `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id_route`), ADD KEY `id_movement` (`id_movement`), ADD KEY `id_destination` (`id_destination`);

--
-- Индексы таблицы `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`id_stop`), ADD KEY `id_route` (`id_route`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`), ADD KEY `id_user` (`id_user`), ADD KEY `id_flight` (`id_flight`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buses`
--
ALTER TABLE `buses`
  MODIFY `id_bus` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id_destination` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `flights`
--
ALTER TABLE `flights`
  MODIFY `id_flight` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `movement_days`
--
ALTER TABLE `movement_days`
  MODIFY `id_movement` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `routes`
--
ALTER TABLE `routes`
  MODIFY `id_route` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `stops`
--
ALTER TABLE `stops`
  MODIFY `id_stop` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `flights`
--
ALTER TABLE `flights`
ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id_route`),
ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`id_bus`) REFERENCES `buses` (`id_bus`);

--
-- Ограничения внешнего ключа таблицы `routes`
--
ALTER TABLE `routes`
ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`id_destination`) REFERENCES `destinations` (`id_destination`),
ADD CONSTRAINT `routes_ibfk_2` FOREIGN KEY (`id_movement`) REFERENCES `movement_days` (`id_movement`);

--
-- Ограничения внешнего ключа таблицы `stops`
--
ALTER TABLE `stops`
ADD CONSTRAINT `stops_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id_route`);

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`id_flight`) REFERENCES `flights` (`id_flight`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
