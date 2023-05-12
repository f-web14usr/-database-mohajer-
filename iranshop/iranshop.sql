-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2023 at 09:25 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iranshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` text COLLATE utf8_persian_ci NOT NULL,
  `email` text COLLATE utf8_persian_ci NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `pid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `reply_of` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_post_id` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `fullname`, `email`, `title`, `comment`, `pid`, `date`, `reply_of`) VALUES
(3, 'محسن', 'mohse@df.com', 'کیس گیمینگ', 'محصول عالی بود', 33, '2023-05-11 00:00:00', 0),
(21, 'طاها', 'taha@yahoo.com', 'قیمت', 'آره واقعا زیاده', 37, '2023-05-12 14:22:19', 19),
(15, 'جواد', 'javad34@gj.com', 'مشکل سفارش', 'سفارش دادم چرا نمیاد', 29, '2023-05-12 00:00:00', 0),
(16, '', 'alif@yahoo.com', 'نقض ', 'نه اصلا خوب نبود', 33, '2023-05-12 13:06:55', 3),
(17, 'علی', 'alif@yahoo.com', 'صبر', 'صبر کن بالاخره میاد', 29, '2023-05-12 13:15:20', 15),
(19, 'مرتصی', 'morteza1564@gmail.com', 'قیمت', 'قیمتش خیلی زیاده', 37, '2023-05-12 00:00:00', 0),
(23, 'محمود', 'mah@hj.com', 'قیمت 2', 'نسبتا خوبه ولی اگه تخفیف بدن عالیه', 37, '2023-05-12 14:24:57', 19);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `subject` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `message` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `fullname`, `email`, `subject`, `message`) VALUES
(1, 'mahdi Rezaei', 'mahdi44@gmail.com', 'مشکل در محصول', 'هنوز محصولی که خریدم به دستم نرسیده'),
(3, 'morteza hamidi', 'hamidi@yahoo.com', 'مشکل بسته بندی محصول', 'درب کارتن محصول باز شده میخوا برش گردونم چطوری این کار بکنم کامل کنم لطفا پیگیری کنید ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(70) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `price` int(100) NOT NULL,
  `count` int(10) NOT NULL,
  `mother_board` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `gpu` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('available','unavailable') COLLATE utf8_persian_ci NOT NULL,
  `p_image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CPU` (`cpu`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `price`, `count`, `mother_board`, `cpu`, `gpu`, `ram`, `status`, `p_image`) VALUES
(33, 'کیس اداری ', 25000000, 10, '', 'AMD Ryzen 5 5600X', 'AMD Radeon RX 6600 XT', '16GB', 'available', 'p4.png'),
(31, 'لپ تاپROG Strix G15 G513QM ایسوس ', 60990000, 3, 'AsRock710', 'AMD Ryzen 9 5900HX', 'GeForce RTX 3060', '32GB corsair', 'unavailable', 'p3.png'),
(30, 'کیس گیمینگ cooler master', 56000000, 5, 'TUF GAMING B760M-PLUS', 'intel core i7 12gen', 'rtx 2080 6GB', '16GB', 'available', 'p2.png'),
(29, 'کیس مهندسی corsair', 340000000, 5, 'PRIME B760M-A-CSM', 'intel core i5 11gen', 'gtx 970', '8GB', 'available', 'p1.png'),
(35, 'ASUS VivoBook 15.6\" لپ تاپ ', 14000000, 1, 'ASUS 620pro', 'Intel Core i3-1115G4 Dual-Core Processor 3.0 GHz (6M Cache, up to 4.1 GHz)\r\n', 'NVIDIA gt630', '4 GB\r\n', 'available', 'p6.png'),
(37, 'SkyTech Chronos Mini کامپیوتر', 20000000, 2, 'AMD 880G DDR3 2000 SATA 6Gbps ', ' Ryzen 5 3600 6-Core 3.6GHz (4.2GHz Max Boost)', 'NVIDIA GeForce GTX 1650 4GB Video Card | 8GB', '4GB', 'available', 'p5.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('enable','disable') COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `family`, `email`, `password`, `status`) VALUES
(1, 'amin', 'safari', 'vorood81@gmail.com', '123', 'enable'),
(3, 'reza', 'abasi', 'Reza77354@yahoo.com', '656535', 'enable'),
(4, 'mojtaba', 'hakimi', 'hakimi34@yahoo.com', '8888', 'disable');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
