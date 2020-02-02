-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Şub 2020, 00:04:00
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `phptodo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_list`
--

CREATE TABLE `contact_list` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(250) NOT NULL,
  `contact_foto` varchar(250) NOT NULL,
  `contact_info` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contact_list`
--

INSERT INTO `contact_list` (`contact_id`, `contact_name`, `contact_foto`, `contact_info`) VALUES
(27, 'aysel arda', 'https://scontent.fist4-1.fna.fbcdn.net/v/t1.0-1/c0.210.540.540a/40343029_1908341122575319_7071485738138730496_n.jpg?_nc_cat=104&_nc_ohc=GvzZFVIXHe8AX_f4Xyi&_nc_ht=scontent.fist4-1.fna&oh=e5dcb98bb408c0edba6c76825a114f7d&oe=5E92B416', '0000 000 00 00'),
(28, 'Abdullah Abi AKSA', 'https://web.whatsapp.com/pp?e=https%3A%2F%2Fpps.whatsapp.net%2Fv%2Ft61.24694-24%2F57269722_1599317016879862_8071613566442012672_n.jpg%3Foe%3D5E383D12%26oh%3Df28da4316c030de6b5f0b244d5355caa&t=l&u=905382795047%40c.us&i=1506457769', '0000 000 00 00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `info_user`
--

CREATE TABLE `info_user` (
  `user_role` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_mail` varchar(250) NOT NULL,
  `user_foto` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `info_user`
--

INSERT INTO `info_user` (`user_role`, `user_name`, `user_pass`, `user_mail`, `user_foto`, `user_id`) VALUES
('Yazılım Mühendisi', 'Umut Can Arda', 'acumk6001**', 'umutkonurinso@gmail.com', 'https://pbs.twimg.com/profile_images/1200110267880919040/16ZOVofb_400x400.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_settings`
--

CREATE TABLE `site_settings` (
  `settings_id` int(11) NOT NULL,
  `settings_title` varchar(250) NOT NULL,
  `settings_favicon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `site_settings`
--

INSERT INTO `site_settings` (`settings_id`, `settings_title`, `settings_favicon`) VALUES
(0, 'umut Can ARDA', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `task_settings`
--

CREATE TABLE `task_settings` (
  `task_id` int(11) NOT NULL,
  `task_icerik` varchar(250) NOT NULL,
  `task_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `task_settings`
--

INSERT INTO `task_settings` (`task_id`, `task_icerik`, `task_time`) VALUES
(5, 'Akşama projeyi bitirmeyi unutma', '2020-01-30 13:38:47'),
(6, 'sa', '2020-01-31 17:43:28'),
(7, 'fasf', '2020-01-31 17:59:34'),
(8, 'fasfSUDXHC', '2020-01-31 18:25:25');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `contact_list`
--
ALTER TABLE `contact_list`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `info_user`
--
ALTER TABLE `info_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Tablo için indeksler `task_settings`
--
ALTER TABLE `task_settings`
  ADD PRIMARY KEY (`task_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `contact_list`
--
ALTER TABLE `contact_list`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `info_user`
--
ALTER TABLE `info_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `task_settings`
--
ALTER TABLE `task_settings`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
