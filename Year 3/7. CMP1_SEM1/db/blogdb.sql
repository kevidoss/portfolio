-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 02 jan 2017 om 07:08
-- Serverversie: 5.6.34
-- PHP-versie: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `website` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `brands`
--

INSERT INTO `brands` (`id`, `name`, `website`) VALUES
(1, 'Alterra Coffee', 'https://alterracoffee.wordpress.com/alterra-coffee-locations/'),
(2, 'The Coffee Alley', 'http://www.thecoffeealley.com/'),
(3, 'Eight O\'Clock Coffee', 'http://www.eightoclock.com/'),
(4, 'Folgers Coffee', 'http://www.folgerscoffee.com/'),
(5, 'Coffee Heaven', 'http://www.coffeeheavengoa.com/'),
(6, 'Barcaffè', 'http://www.barcaffe.com/'),
(7, 'Café Rico', 'http://www.caferico.com/');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'root', 'root'),
(2, 'testuser', 'test123'),
(3, 'kevin', 'kevin123'),
(4, 'testnr2', 'test2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titel` text NOT NULL,
  `bericht` text NOT NULL,
  `auteur` text NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `post`
--

INSERT INTO `post` (`id`, `titel`, `bericht`, `auteur`, `tags`) VALUES
(1, 'First Post', 'This is the first post, but now it\'s edited', 'Kevin', 'edited'),
(2, 'second post', 'this is the second post', 'kevin', 'second'),
(3, 'third post', 'this is the third post', 'kevin', 'third'),
(4, 'number four', 'this is the fourth one', 'kevidoss', 'fourth'),
(5, 'test 5', 'testing for number 5', 'kevin', 'test'),
(6, 'six', 'row number six, added now', 'kevin', 'six'),
(7, 'test number six', 'this is my sixth test', 'kevin', 'six'),
(8, 'EIGHT', 'post number eight', 'kevidoss', 'eight'),
(13, 'test nine', 'just random text to check if it worked...', 'kevidoss', 'nine'),
(14, 'test fourteen', 'this is the 14th test to see if everything works', 'kevidoss', 'fourteen'),
(15, 'WIP', 'Would it still work?', 'kevidoss', 'test'),
(16, 'same page test', 'this is a test to see if it works on the same page', 'kevin', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `brands` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `brands`) VALUES
(1, 'Simon Says', 'Sluizeken 8, 9000 Ghent, Belgium', 'Dallmayr'),
(2, 'Café Labath', 'Oude Houtlei 1, 9000 Ghent, Belgium', 'Alterra Coffee'),
(3, 'Philimonius Coffee & Goods', 'Louis D\'Haeseleerstraat 8, 9300 Aalst, Belgium', 'Barcaffè');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_image_upload`
--

CREATE TABLE `t_image_upload` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_image_upload`
--

INSERT INTO `t_image_upload` (`image_id`, `image_name`, `image`) VALUES
(1, 'Coffee cat', 'latte-art_yamamoto.jpg'),
(2, 'Kangaroo', 'kangaroo.jpg'),
(3, 'Batman', 'super.jpg'),
(4, 'Coffee trees', 'tree.jpg'),
(5, 'Plantation', 'coffee-plantation.jpg'),
(7, 'Ice coffee', 'icecoffee.jpg'),
(8, 'Heart', 'heart_coffee.jpg'),
(9, 'Smile', 'smile.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `t_image_upload`
--
ALTER TABLE `t_image_upload`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT voor een tabel `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `t_image_upload`
--
ALTER TABLE `t_image_upload`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
