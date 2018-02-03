-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Şub 2018, 06:45:52
-- Sunucu sürümü: 10.1.29-MariaDB
-- PHP Sürümü: 7.2.0

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

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_title` varchar(120) COLLATE utf8_turkish_ci DEFAULT NULL,
  `car_subtitle` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sta_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `c_creadit` bit(1) DEFAULT b'0',
  `hire_p` int(11) DEFAULT NULL,
  `a_payment` int(11) DEFAULT NULL,
  `typ_id` int(11) DEFAULT NULL,
  `mfc_id` int(11) DEFAULT NULL,
  `mdl_id` int(11) DEFAULT NULL,
  `vrs_id` int(11) DEFAULT NULL,
  `car_kilometer` int(11) DEFAULT NULL,
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
  `sales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_features`
--

CREATE TABLE `car_features` (
  `ft_id` int(11) NOT NULL,
  `ft_name` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_manifacturers`
--

CREATE TABLE `car_manifacturers` (
  `mfc_id` int(11) NOT NULL,
  `mfc_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mfc_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_models`
--

CREATE TABLE `car_models` (
  `mdl_id` int(11) NOT NULL,
  `mfc_id` int(11) DEFAULT NULL,
  `mdl_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mdl_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_photos`
--

CREATE TABLE `car_photos` (
  `photo_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `photo_path` varchar(80) COLLATE utf8_turkish_ci DEFAULT NULL,
  `is_main` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_take_features`
--

CREATE TABLE `car_take_features` (
  `taken_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `ft_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_types`
--

CREATE TABLE `car_types` (
  `typ_id` int(11) NOT NULL,
  `typ_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `typ_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_usage_stas`
--

CREATE TABLE `car_usage_stas` (
  `sta_id` int(11) NOT NULL,
  `sta_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sta_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_versions`
--

CREATE TABLE `car_versions` (
  `vrs_id` int(11) NOT NULL,
  `mdl_id` int(11) DEFAULT NULL,
  `vrs_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `vrs_seo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `colors`
--

CREATE TABLE `colors` (
  `clr_id` int(11) NOT NULL,
  `clr_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `engine_types`
--

CREATE TABLE `engine_types` (
  `etyp_id` int(11) NOT NULL,
  `etyp_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fuel_types`
--

CREATE TABLE `fuel_types` (
  `ftyp_id` int(11) NOT NULL,
  `ftyp_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

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

CREATE TABLE `sales_managers` (
  `smn_id` int(11) NOT NULL,
  `smn_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `smn_phone` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `smn_mail` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transmission_types`
--

CREATE TABLE `transmission_types` (
  `ttyp_id` int(11) NOT NULL,
  `ttyp_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_features`
--
ALTER TABLE `car_features`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_manifacturers`
--
ALTER TABLE `car_manifacturers`
  MODIFY `mfc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_models`
--
ALTER TABLE `car_models`
  MODIFY `mdl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_photos`
--
ALTER TABLE `car_photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_take_features`
--
ALTER TABLE `car_take_features`
  MODIFY `taken_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_types`
--
ALTER TABLE `car_types`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_usage_stas`
--
ALTER TABLE `car_usage_stas`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_versions`
--
ALTER TABLE `car_versions`
  MODIFY `vrs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `colors`
--
ALTER TABLE `colors`
  MODIFY `clr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `engine_types`
--
ALTER TABLE `engine_types`
  MODIFY `etyp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `fuel_types`
--
ALTER TABLE `fuel_types`
  MODIFY `ftyp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `sales_managers`
--
ALTER TABLE `sales_managers`
  MODIFY `smn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `transmission_types`
--
ALTER TABLE `transmission_types`
  MODIFY `ttyp_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
