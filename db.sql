-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 17 Tem 2021, 07:12:50
-- Sunucu sürümü: 8.0.21
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ParentId` int NOT NULL COMMENT 'anakategori0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`Id`, `Name`, `ParentId`) VALUES
(1, 'cat1', 0),
(2, 'cat2', 0),
(3, 'cat11', 1),
(4, 'cat3', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Surname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Pass` text COLLATE utf8_turkish_ci NOT NULL,
  `Auth` int NOT NULL COMMENT '3su / 2admin / 1user',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`Id`, `Name`, `Surname`, `Mail`, `Username`, `Pass`, `Auth`) VALUES
(1, '', '', '', 'su', '202cb962ac59075b964b07152d234b70', 3),
(2, 'admin', 'admin', 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 2),
(3, 'Tarık', 'Tüm kullanıcıların şifresi 123', 'tarik@mail.com', 'tarikkamat', '202cb962ac59075b964b07152d234b70', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
