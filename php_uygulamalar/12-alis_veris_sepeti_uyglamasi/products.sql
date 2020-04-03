-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 30 Mar 2020, 16:12:02
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cart`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `detail` text COLLATE utf8_turkish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img_url` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `product_name`, `detail`, `price`, `img_url`) VALUES
(1, 'X kedi maması', 'Kedilerinizin en sevdiği mama X kedi maması.', 100, 'cat.jpg'),
(2, 'Z köpek maması', 'Köpeklerin hayır diyemeyeceği tek mama Z köpek maması', 80, 'dog.jpg'),
(3, 'J tavşan maması', 'Havuç ve marulun organik karışımı olan J mamasına bütün tavşaların bayılacağı firmamız tarafından garanti altındadır', 60, 'rabbit.jpg'),
(4, 'F kuş yemi', 'Bütün evcil kuş türleri için uygun F kuş yemini kuşunuz da hak ediyor', 50, 'bird.jpg'),
(5, 'L Balık Yemi', 'vitaminli balık yemi ile balıklarınız sizden çok yaşasın...', 30, 'balik.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
