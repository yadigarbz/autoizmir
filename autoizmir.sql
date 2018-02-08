-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Şub 2018, 10:39:06
-- Sunucu sürümü: 10.1.30-MariaDB
-- PHP Sürümü: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `autoizmir`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(24) COLLATE utf8_turkish_ci DEFAULT NULL,
  `display_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_pass` varchar(32) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `user_mail` varchar(60) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `user_name`, `display_name`, `user_pass`, `user_type`, `user_mail`) VALUES
(1, 'admin', 'Admin AUTO İZMİR', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin@autoizmir.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_title` varchar(120) COLLATE utf8_turkish_ci DEFAULT NULL,
  `car_subtitle` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sta_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `c_creadit` bit(1) DEFAULT b'0',
  `hire_p` int(11) DEFAULT NULL,
  `a_payment` int(11) DEFAULT NULL,
  `car_kilometer` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `typ_id` int(11) DEFAULT NULL,
  `mfc_id` int(11) DEFAULT NULL,
  `mdl_id` int(11) DEFAULT NULL,
  `vrs_id` int(11) DEFAULT NULL,
  `etyp_id` int(11) DEFAULT NULL,
  `ttyp_id` int(11) DEFAULT NULL,
  `out_c` int(11) DEFAULT NULL,
  `inside_c` int(11) DEFAULT NULL,
  `passenger` int(11) DEFAULT NULL,
  `doors` int(11) DEFAULT NULL,
  `ftyp_id` int(11) DEFAULT NULL,
  `city_cons` double DEFAULT NULL,
  `out_cons` double DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `sales` int(11) DEFAULT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `cars`
--

INSERT INTO `cars` (`car_id`, `car_title`, `car_subtitle`, `sta_id`, `price`, `c_creadit`, `hire_p`, `a_payment`, `car_kilometer`, `year`, `typ_id`, `mfc_id`, `mdl_id`, `vrs_id`, `etyp_id`, `ttyp_id`, `out_c`, `inside_c`, `passenger`, `doors`, `ftyp_id`, `city_cons`, `out_cons`, `description`, `sales`, `add_time`) VALUES
(1, 'Ford Mustang GT 65', 'kedg', 1, 2345, b'0', 45, 45600, 235, 1920, 1, 3, 3, 2, 2, 1, 1, 1, 0, 0, 2, 0, 0, '', 1, '2018-02-08 09:37:57'),
(3, 'Deneme 1', 'kedg', 1, 920000, b'1', 456, 456, 235, 2018, 2, 3, 3, 2, 2, 1, 1, 1, 0, 0, 2, 0, 0, '', 1, '2018-02-08 09:37:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_features`
--

DROP TABLE IF EXISTS `car_features`;
CREATE TABLE `car_features` (
  `ft_id` int(11) NOT NULL,
  `ft_name` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_manifacturers`
--

DROP TABLE IF EXISTS `car_manifacturers`;
CREATE TABLE `car_manifacturers` (
  `mfc_id` int(11) NOT NULL,
  `mfc_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mfc_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `car_manifacturers`
--

INSERT INTO `car_manifacturers` (`mfc_id`, `mfc_name`, `mfc_seo`) VALUES
(2, 'Aston Martin', 'AstonMartin'),
(3, 'Ford', 'Ford');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_models`
--

DROP TABLE IF EXISTS `car_models`;
CREATE TABLE `car_models` (
  `mdl_id` int(11) NOT NULL,
  `mfc_id` int(11) DEFAULT NULL,
  `mdl_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mdl_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `car_models`
--

INSERT INTO `car_models` (`mdl_id`, `mfc_id`, `mdl_name`, `mdl_seo`) VALUES
(1, 2, 'DB 11', 'Deneme'),
(3, 3, 'Fiesta', 'Fiesta');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_photos`
--

DROP TABLE IF EXISTS `car_photos`;
CREATE TABLE `car_photos` (
  `photo_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `photo_path` varchar(80) COLLATE utf8_turkish_ci DEFAULT NULL,
  `is_main` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `car_photos`
--

INSERT INTO `car_photos` (`photo_id`, `car_id`, `photo_path`, `is_main`) VALUES
(4, 1, '1_1__1920.jpeg', b'0'),
(5, 3, '3_1__1920.jpg', b'0'),
(6, 1, '1_2__1920.jpg', b'0'),
(7, 1, '1_3__1920.jpg', b'1'),
(8, 3, '3_2__1920.jpg', b'1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_take_features`
--

DROP TABLE IF EXISTS `car_take_features`;
CREATE TABLE `car_take_features` (
  `taken_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `ft_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_types`
--

DROP TABLE IF EXISTS `car_types`;
CREATE TABLE `car_types` (
  `typ_id` int(11) NOT NULL,
  `typ_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `typ_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `car_types`
--

INSERT INTO `car_types` (`typ_id`, `typ_name`, `typ_seo`) VALUES
(1, '4 ÇEKER', '4ceker'),
(2, 'Açık Kasa - Ticari', 'acikkasa'),
(3, 'Tek Kapı - Spor', 'sport'),
(4, 'Üstü Açık', 'ustuacik'),
(5, 'Sedan', 'sedan'),
(6, 'Hatchback - Mini', 'HatchbackMini');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_usage_stas`
--

DROP TABLE IF EXISTS `car_usage_stas`;
CREATE TABLE `car_usage_stas` (
  `sta_id` int(11) NOT NULL,
  `sta_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sta_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_versions`
--

DROP TABLE IF EXISTS `car_versions`;
CREATE TABLE `car_versions` (
  `vrs_id` int(11) NOT NULL,
  `mdl_id` int(11) DEFAULT NULL,
  `vrs_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `vrs_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `car_versions`
--

INSERT INTO `car_versions` (`vrs_id`, `mdl_id`, `vrs_name`, `vrs_seo`) VALUES
(2, 3, '620 HP', '620HP');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `clr_id` int(11) NOT NULL,
  `clr_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `colors`
--

INSERT INTO `colors` (`clr_id`, `clr_name`) VALUES
(1, 'Haki Yeşil');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `engine_types`
--

DROP TABLE IF EXISTS `engine_types`;
CREATE TABLE `engine_types` (
  `etyp_id` int(11) NOT NULL,
  `etyp_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `engine_types`
--

INSERT INTO `engine_types` (`etyp_id`, `etyp_name`) VALUES
(2, 'V8 5.0L VCL');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fuel_types`
--

DROP TABLE IF EXISTS `fuel_types`;
CREATE TABLE `fuel_types` (
  `ftyp_id` int(11) NOT NULL,
  `ftyp_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `fuel_types`
--

INSERT INTO `fuel_types` (`ftyp_id`, `ftyp_name`) VALUES
(2, 'Benzin'),
(3, 'Dizel');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_seo` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `page_title` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`page_id`, `page_seo`, `page_title`) VALUES
(1, 'anasayfa', 'Anasayfa'),
(2, 'arabalar', 'Araçlar'),
(3, 'hakkimizda', 'Hakkımızda'),
(4, 'hizmetlerimiz', 'Hizmetlerimiz'),
(5, 'kredi-talep', 'Kredi Talep'),
(6, 'iletisim', 'İletişim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales_managers`
--

DROP TABLE IF EXISTS `sales_managers`;
CREATE TABLE `sales_managers` (
  `smn_id` int(11) NOT NULL,
  `smn_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `smn_phone` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `smn_mail` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sales_managers`
--

INSERT INTO `sales_managers` (`smn_id`, `smn_name`, `smn_phone`, `smn_mail`) VALUES
(1, 'Yadigar ZENGİN', '5304605205', 'yadigarbz@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `slide_title` varchar(80) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slides`
--

INSERT INTO `slides` (`slide_id`, `car_id`, `slide_title`) VALUES
(1, 1, 'Hayalinizdeki Aracı Bulun'),
(2, 3, 'Böyle Bir Araç Daha Var!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transmission_types`
--

DROP TABLE IF EXISTS `transmission_types`;
CREATE TABLE `transmission_types` (
  `ttyp_id` int(11) NOT NULL,
  `ttyp_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `transmission_types`
--

INSERT INTO `transmission_types` (`ttyp_id`, `ttyp_name`) VALUES
(1, 'Sıralı Şanzıman ( Manuel ) - 5 Vites');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Tablo için indeksler `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`ft_id`);

--
-- Tablo için indeksler `car_manifacturers`
--
ALTER TABLE `car_manifacturers`
  ADD PRIMARY KEY (`mfc_id`);

--
-- Tablo için indeksler `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`mdl_id`);

--
-- Tablo için indeksler `car_photos`
--
ALTER TABLE `car_photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Tablo için indeksler `car_take_features`
--
ALTER TABLE `car_take_features`
  ADD PRIMARY KEY (`taken_id`);

--
-- Tablo için indeksler `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`typ_id`);

--
-- Tablo için indeksler `car_usage_stas`
--
ALTER TABLE `car_usage_stas`
  ADD PRIMARY KEY (`sta_id`);

--
-- Tablo için indeksler `car_versions`
--
ALTER TABLE `car_versions`
  ADD PRIMARY KEY (`vrs_id`);

--
-- Tablo için indeksler `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`clr_id`);

--
-- Tablo için indeksler `engine_types`
--
ALTER TABLE `engine_types`
  ADD PRIMARY KEY (`etyp_id`);

--
-- Tablo için indeksler `fuel_types`
--
ALTER TABLE `fuel_types`
  ADD PRIMARY KEY (`ftyp_id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Tablo için indeksler `sales_managers`
--
ALTER TABLE `sales_managers`
  ADD PRIMARY KEY (`smn_id`);

--
-- Tablo için indeksler `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Tablo için indeksler `transmission_types`
--
ALTER TABLE `transmission_types`
  ADD PRIMARY KEY (`ttyp_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `car_features`
--
ALTER TABLE `car_features`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_manifacturers`
--
ALTER TABLE `car_manifacturers`
  MODIFY `mfc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `car_models`
--
ALTER TABLE `car_models`
  MODIFY `mdl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `car_photos`
--
ALTER TABLE `car_photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `car_take_features`
--
ALTER TABLE `car_take_features`
  MODIFY `taken_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_types`
--
ALTER TABLE `car_types`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `car_usage_stas`
--
ALTER TABLE `car_usage_stas`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_versions`
--
ALTER TABLE `car_versions`
  MODIFY `vrs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `colors`
--
ALTER TABLE `colors`
  MODIFY `clr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `engine_types`
--
ALTER TABLE `engine_types`
  MODIFY `etyp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `fuel_types`
--
ALTER TABLE `fuel_types`
  MODIFY `ftyp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `sales_managers`
--
ALTER TABLE `sales_managers`
  MODIFY `smn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `transmission_types`
--
ALTER TABLE `transmission_types`
  MODIFY `ttyp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
