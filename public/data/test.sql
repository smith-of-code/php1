-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 22 2019 г., 12:46
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `product_id`, `count`) VALUES
(42, 'p8mnl2oi06nv19vk9l260h7bpv6s56bb', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `confirm_carts`
--

CREATE TABLE `confirm_carts` (
  `id` int(11) NOT NULL,
  `session_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `confirm_carts`
--

INSERT INTO `confirm_carts` (`id`, `session_id`, `phone`) VALUES
(17, 'p8mnl2oi06nv19vk9l260h7bpv6s56bb', '6567567');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `product_id`, `name`, `content`, `date`) VALUES
(1, 1, 'вася', 'Все классно и ужасно', '2019-10-18'),
(2, 1, 'петя', 'отврат', '2019-10-16'),
(3, 2, 'инга', 'класс', '2019-10-06'),
(4, 3, 'честер', 'супер гуд', '2019-10-01'),
(5, 1, 'костя', 'фэшн профешн', '2019-10-18'),
(6, 2, 'Гена', 'замечательный ноут', '2019-10-18'),
(21, 2, 'Васек', 'Приколюха', '2019-10-19'),
(22, 2, 'DMX', 'cool!', '2019-10-19'),
(23, 3, 'гарфилд', 'крутой кот', '2019-10-19');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `views`) VALUES
(1, '01.jpg', 1),
(2, '02.jpg', 41),
(3, '03.jpg', 8),
(4, '04.jpg', 5),
(5, '05.jpg', 32),
(6, '06.jpg', 1),
(7, '07.jpg', 4),
(8, '08.jpg', 2),
(9, '09.jpg', 42),
(10, '10.jpg', 4),
(11, '11.jpg', 0),
(12, '12.jpg', 5),
(13, '13.jpg', 0),
(14, '14.jpg', 4),
(15, '15.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `parent`) VALUES
(1, 'главная', '/', 0),
(2, 'каталог', '/catalog', 0),
(3, 'галлерея', '/gallery', 0),
(4, 'Сабменю1', '#', 0),
(5, 'главная', '/', 4),
(6, 'каталог', '/catalog', 4),
(7, 'сабменю2', '#', 4),
(8, 'главная', '/', 7),
(9, 'каталог', '/catalog', 7),
(10, 'Калькулятор', '/calculator', 0),
(11, 'Корзина', '/cart', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `full_desc` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `short_desc`, `full_desc`, `image`, `category`, `price`) VALUES
(1, 'Пицца', 'Это традиционное итальянское блюдо', 'Пицца - известное на весь мир национальное блюдо Италии в форме открытого круглого пирога, покрытого по классическому рецепту томатами и расплавленным сыром (обычно моцареллой). Такая начинка на профессиональном языке кулинаров называется топпинг.\r\n\r\nСчитается, что прототип пиццы подавали на стол еще древним грекам и римлянам: некоторые блюда они готовили на хлебных ломтях. А официальной столицей этого итальянского кушанья называют Неаполь. Здесь даже существовала профессия «pizzaioli» - так называли людей, которые готовили пиццу для крестьян. Это блюдо придумали после того, как в 1552 году впервые в Европу завезли из Перу помидоры. Помимо томатов, неаполитанскую пиццу наполняли сыром, морепродуктами, мясом, грибами и овощами.', 'pizza.jpg', 'еда', 20),
(2, 'Ноутбук', ' переносной персональный компьютер', 'К ноутбукам обычно относят лэптопы (часто употребляется «лаптоп»), выполненные в раскладном форм-факторе. Ноутбук переносят в сложенном виде, это позволяет защитить экран, клавиатуру и тачпад при транспортировке. Также это связано с удобством транспортировки (чаще всего ноутбук транспортируется в портфеле, что позволяет не держать его в руках, а повесить на плечо).', 'notebook.jpg', 'электроника', 1400),
(3, 'кошка', 'домашнее животное, одно из наиболее популярных', 'С точки зрения научной систематики, домашняя кошка — млекопитающее семейства кошачьих отряда хищных. Ранее домашнюю кошку нередко рассматривали как отдельный биологический вид. С точки зрения современной биологической систематики домашняя кошка (Felis silvestris catus) является подвидом лесной кошки', 'cat.jpg', 'животные', 3000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `confirm_carts`
--
ALTER TABLE `confirm_carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `confirm_carts`
--
ALTER TABLE `confirm_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
