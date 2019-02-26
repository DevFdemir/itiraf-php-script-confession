-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Şub 2019, 21:14:17
-- Sunucu sürümü: 10.1.35-MariaDB
-- PHP Sürümü: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `itiraf`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rapor`
--

CREATE TABLE `rapor` (
  `itiraf_id` int(11) NOT NULL,
  `itiraf_onay` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `itiraf_cinsiyet` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `itiraf_rumuz` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `itiraf_text` text COLLATE utf8_turkish_ci NOT NULL,
  `itiraf_like` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rapor`
--

INSERT INTO `rapor` (`itiraf_id`, `itiraf_onay`, `itiraf_cinsiyet`, `itiraf_rumuz`, `itiraf_text`, `itiraf_like`) VALUES
(1, '1', 'Erkek', 'İlk', 'Merhaba Dünya!', '0'),
(20, '1', 'Erkek', 'Test Rumuz 1', 'Bu Bir Test İtiraftır.', '3'),
(21, '1', 'Kadın', 'Test2', 'Bu Sayfada En Az Bir Tane İtiraf Kalmalıdır. Aksi Takdirde Hata Verir.', '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_adsoyad` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `uye_kadi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `uye_sifre` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `uye_eposta` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `uye_onay` int(11) NOT NULL,
  `puan` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_onay` varchar(11) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_adsoyad`, `uye_kadi`, `uye_sifre`, `uye_eposta`, `uye_onay`, `puan`, `icerik_onay`) VALUES
(1, 'Admin Furkan', 'Admin', '7c766a65ac4763ffe5b945de5d325b97', 'itiraf.php.furkan@demir.com', 0, '10', '5'),
(123, 'furkan demir', 'redx', '60f4f5e92e9347f568bab2568166ff22', 'dfsdafsdva@fadsfasd.com', 0, '0', '5');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`itiraf_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `rapor`
--
ALTER TABLE `rapor`
  MODIFY `itiraf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
