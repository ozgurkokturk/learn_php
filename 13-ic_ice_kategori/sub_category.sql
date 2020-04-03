-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Nis 2020, 12:22:09
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
-- Veritabanı: `sub_category`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=762 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `title`, `parent_id`) VALUES
(1, 'Teknoloji', 0),
(2, 'Giyim', 0),
(3, 'Otomotiv', 0),
(4, 'Ev Elektroniği', 0),
(5, 'Mobilya', 0),
(6, 'Evcil Hayvan', 0),
(11, 'Bilgisayar', 1),
(12, 'Köpek', 6),
(13, 'Erkek Giyim', 2),
(14, 'Kadın Giyim', 2),
(15, 'Oturma Grubu', 5),
(16, 'Mazda', 3),
(17, 'Suziki', 3),
(18, 'Arduino', 4),
(19, 'Lenovo', 11),
(20, 'Acer', 11),
(21, 'asus', 11),
(22, 'casper', 11),
(23, 'macbook', 11),
(24, 'Telefon', 1),
(25, 'Ses Sistemleri', 1),
(26, 'Kedi', 6),
(27, 'Muhabbet Kuşu', 6),
(29, 'Kırklareli Üniversitesi', 0),
(759, 'Kazak', 13),
(758, 'amdryzen', 19);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
