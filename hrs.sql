-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Mar 2019, 16:23:38
-- Sunucu sürümü: 10.1.19-MariaDB
-- PHP Sürümü: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hrs`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktor`
--

CREATE TABLE `doktor` (
  `doktor_id` int(11) NOT NULL,
  `pol_id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `tc` varchar(11) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `kull_ad` varchar(500) NOT NULL,
  `sifre` varchar(500) NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `doktor`
--

INSERT INTO `doktor` (`doktor_id`, `pol_id`, `ad`, `soyad`, `tc`, `mail`, `telefon`, `kull_ad`, `sifre`, `adres`) VALUES
(1, 1, 'Sami', 'Dönmez', '21439278310', 'sami12gs@gmail.com', '+905462628193', '11', '', 'aaaaaaaaaaaaa'),
(2, 1, 'semih', 'dönmez', '21439278310', 'sami12gs@gmail.com', '   905462628192', 'deneme', 'C5EF026C76801B8D7317B0C38AF6B4E9', 'istanbul/sam');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanıcı`
--

CREATE TABLE `kullanıcı` (
  `kul_id` int(11) NOT NULL,
  `ad` varchar(500) NOT NULL,
  `soyad` varchar(500) NOT NULL,
  `tc` varchar(15) NOT NULL,
  `adres` text NOT NULL,
  `kull_ad` varchar(300) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `sifre` varchar(500) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanıcı`
--

INSERT INTO `kullanıcı` (`kul_id`, `ad`, `soyad`, `tc`, `adres`, `kull_ad`, `tel`, `sifre`, `email`) VALUES
(1, 'sami', 'dönmez', '21439278310', 'istanbul', 'deneme', '05462628193', 'C5EF026C76801B8D7317B0C38AF6B4E9', 'sami12gs@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `poliklinik`
--

CREATE TABLE `poliklinik` (
  `pol_id` int(11) NOT NULL,
  `pol_ad` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `poliklinik`
--

INSERT INTO `poliklinik` (`pol_id`, `pol_ad`) VALUES
(1, 'Dahiliye'),
(2, 'Kulak-Burun-Bogaz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

CREATE TABLE `randevu` (
  `rand_id` int(11) NOT NULL,
  `saat_id` int(11) NOT NULL,
  `dok_id` int(11) NOT NULL,
  `kull_id` int(11) NOT NULL,
  `durum` int(1) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`rand_id`, `saat_id`, `dok_id`, `kull_id`, `durum`, `tarih`) VALUES
(1, 5, 1, 1, 0, '2019-03-04'),
(2, 5, 2, 1, 0, '2019-03-04'),
(3, 6, 2, 1, 0, '2019-03-04'),
(4, 4, 2, 1, 0, '2019-03-04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recete`
--

CREATE TABLE `recete` (
  `recete_id` int(11) NOT NULL,
  `rand_id` int(11) NOT NULL,
  `reçete` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `recete`
--

INSERT INTO `recete` (`recete_id`, `rand_id`, `reçete`) VALUES
(2, 4, 'hastal?ka\nssss\nsssss'),
(3, 4, 'hastal?ka\nssssasasasasas\nsssss'),
(4, 4, 'sasasasasasa'),
(5, 4, 'aaaa'),
(6, 4, 'asasasasa'),
(7, 4, '12121'),
(8, 4, 'sdadasdasdasd'),
(9, 4, 'hkhkhkhkh'),
(10, 4, 'sdsadsadsadsadsad'),
(11, 4, 'sdsadsadsadsadsad');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `saat`
--

CREATE TABLE `saat` (
  `saat_id` int(11) NOT NULL,
  `saat_aralık` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `saat`
--

INSERT INTO `saat` (`saat_id`, `saat_aralık`) VALUES
(1, '09.15'),
(2, '09.30'),
(3, '09.45'),
(4, '10.00'),
(5, '10.15'),
(6, '10.30'),
(7, '10.45'),
(8, '11.00'),
(9, '11.15'),
(10, '11.30'),
(11, '11.45'),
(12, '13.00'),
(13, '13.15'),
(14, '13.30'),
(15, '13.45'),
(16, '14.00'),
(17, '14.15'),
(18, '14.30'),
(19, '14.45'),
(20, '15.00'),
(21, '15.15'),
(22, '15.30'),
(23, '15.45'),
(24, '16.00'),
(25, '16.15'),
(26, '16.30'),
(27, '16.45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sonuç`
--

CREATE TABLE `sonuç` (
  `id` int(11) NOT NULL,
  `rand_id` int(11) NOT NULL,
  `recete_id` int(11) NOT NULL,
  `tanım` text NOT NULL,
  `sikayet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `sonuç`
--

INSERT INTO `sonuç` (`id`, `rand_id`, `recete_id`, `tanım`, `sikayet`) VALUES
(1, 4, 2, 'hthrthtrhr', 'thtrht'),
(2, 4, 2, 'sadsadasdsdsadsad', 'asasasasas'),
(3, 4, 2, 'sadsadasdsdsadsad', 'asasasasas'),
(4, 4, 2, 'dadadadad', 'wdadad'),
(5, 4, 2, 'dadadadad', 'wdadad'),
(6, 4, 2, 'sadsadasdsadsa', 'sadasdsad');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `doktor`
--
ALTER TABLE `doktor`
  ADD PRIMARY KEY (`doktor_id`);

--
-- Tablo için indeksler `kullanıcı`
--
ALTER TABLE `kullanıcı`
  ADD PRIMARY KEY (`kul_id`);

--
-- Tablo için indeksler `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`pol_id`);

--
-- Tablo için indeksler `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`rand_id`);

--
-- Tablo için indeksler `recete`
--
ALTER TABLE `recete`
  ADD PRIMARY KEY (`recete_id`);

--
-- Tablo için indeksler `saat`
--
ALTER TABLE `saat`
  ADD PRIMARY KEY (`saat_id`);

--
-- Tablo için indeksler `sonuç`
--
ALTER TABLE `sonuç`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `doktor`
--
ALTER TABLE `doktor`
  MODIFY `doktor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `kullanıcı`
--
ALTER TABLE `kullanıcı`
  MODIFY `kul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `pol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
  MODIFY `rand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `recete`
--
ALTER TABLE `recete`
  MODIFY `recete_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `saat`
--
ALTER TABLE `saat`
  MODIFY `saat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Tablo için AUTO_INCREMENT değeri `sonuç`
--
ALTER TABLE `sonuç`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
