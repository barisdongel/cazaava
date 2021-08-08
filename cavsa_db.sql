-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Kas 2020, 07:24:44
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cavsa_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar_tbl`
--

CREATE TABLE `ayar_tbl` (
  `ayar_id` int(11) NOT NULL,
  `ayar_title` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_desc` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_key` varchar(1000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_siteurl` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_facebook` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_twitter` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_instagram` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_linkedin` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_mail` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_baslik` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_footer` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_adres` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_il` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_tel` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_author` varchar(70) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_recapctha` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_googlemap` varchar(800) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_analystic` varchar(800) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayar_tbl`
--

INSERT INTO `ayar_tbl` (`ayar_id`, `ayar_title`, `ayar_desc`, `ayar_key`, `ayar_siteurl`, `ayar_logo`, `ayar_facebook`, `ayar_twitter`, `ayar_instagram`, `ayar_linkedin`, `ayar_mail`, `ayar_baslik`, `ayar_footer`, `ayar_adres`, `ayar_il`, `ayar_ilce`, `ayar_tel`, `ayar_author`, `ayar_recapctha`, `ayar_googlemap`, `ayar_analystic`) VALUES
(0, 'Çavsa Group', 'Çavsa Kurumsal İnternet Sitesi', '', 'http://localhost/cavsa', 'demos/store/images/logo/logo.svg', 'facebook', '', 'instagram', '', 'info@cavsa.com.tr', '', '', 'Bahçelievler Mahallesi Organize Sanayi Caddesi ', 'Karaman', 'Merkez', '+90(338)2130077', 'Barış Ömer Döngel', '', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1889.8179951544237!2d33.25209852450916!3d37.19352242501137!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1994f5225ae91bf3!2zw4dBVlNBIFNPxJ5VS0hBVkEgUEFLRVRMRU1FIFBMQVNUxLBLIFRFU8SwU0xFUsSw!5e0!3m2!1str!2str!4v1605012559344!5m2!1str!2str', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori_tbl`
--

CREATE TABLE `kategori_tbl` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ust` int(11) NOT NULL,
  `kategori_ad` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_foto` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_sira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori_tbl`
--

INSERT INTO `kategori_tbl` (`kategori_id`, `kategori_ust`, `kategori_ad`, `kategori_foto`, `kategori_sira`) VALUES
(2, 0, 'Plastik Enjeksiyon', '', 0),
(3, 0, 'Ambalaj Grubu', '', 0),
(8, 2, 'Plastik Konteyner', 'demos/store/images/product/kategori/8277155.png', 2),
(11, 3, 'Emici Ürünler', 'demos/store/images/product/kategori/7579599.png', 3),
(12, 3, 'Yemek Kapları', 'demos/store/images/product/kategori/973401010.png', 3),
(13, 2, 'Plastik Kasa', 'demos/store/images/product/kategori/2093977.png', 2),
(14, 3, 'Standart Ürünler', 'demos/store/images/product/kategori/914521111.png', 3),
(15, 3, 'Fast-Food Ürünleri', 'demos/store/images/product/kategori/7502588.png', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_tbl`
--

CREATE TABLE `kullanici_tbl` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_foto` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_sifre` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_zaman` date NOT NULL,
  `kullanici_hakkinda` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_dogumyeri` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_yetki` int(2) NOT NULL,
  `kullanici_facebook` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_twitter` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_github` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_instagram` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_tel` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici_tbl`
--

INSERT INTO `kullanici_tbl` (`kullanici_id`, `kullanici_foto`, `kullanici_ad`, `kullanici_sifre`, `kullanici_zaman`, `kullanici_hakkinda`, `kullanici_dogumyeri`, `kullanici_adsoyad`, `kullanici_yetki`, `kullanici_facebook`, `kullanici_twitter`, `kullanici_github`, `kullanici_instagram`, `kullanici_tel`) VALUES
(1, '../cavsadmin/assets/img/users/logob.png', 'cavsadmin', '123456', '0000-00-00', '', '', '', 0, '', '', '', '', ''),
(3, '../cavsadmin/assets/img/users/pp.jpg', 'baris@cavsa.com.tr', '123456', '2020-11-13', '<p>asdasdsad</p>\r\n', 'eskişehir', 'barış ömer döngel', 1, '', '', '', '', '0555555555');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider_tbl`
--

CREATE TABLE `slider_tbl` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_resim` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `slider_tbl`
--

INSERT INTO `slider_tbl` (`slider_id`, `slider_ad`, `slider_resim`, `slider_sira`) VALUES
(1, '1', 'demos/store/images/slider/WEB_STES_SLDER_2.jpg', 0),
(2, '2', 'demos/store/images/slider/WEB_STES_SLDER_3.jpg', 1),
(3, '3', 'demos/store/images/slider/SLIDER.jpg', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler_tbl`
--

CREATE TABLE `urunler_tbl` (
  `urun_id` int(11) NOT NULL,
  `urun_ad` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_aciklama` varchar(1500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_ozellik` varchar(5000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_kategori` int(11) NOT NULL,
  `urun_foto` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_fotogaleri` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunler_tbl`
--

INSERT INTO `urunler_tbl` (`urun_id`, `urun_ad`, `urun_aciklama`, `urun_ozellik`, `urun_kategori`, `urun_foto`, `urun_fotogaleri`) VALUES
(11, 'Plastik Konteyner Ürünü', '', '', 8, 'demos/store/images/product/6151255.png', ''),
(12, 'Emici Ambalaj Ürünü', '', '', 11, 'demos/store/images/product/1613177.png', ''),
(13, 'Yemek Kabı ürün', '', '', 12, 'demos/store/images/product/1237899.png', ''),
(14, 'Fast-Food Ürünü', 'Deneme', '', 15, 'demos/store/images/product/956481010.png', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_fotogaleritbl`
--

CREATE TABLE `urun_fotogaleritbl` (
  `fotogaleri_id` int(11) NOT NULL,
  `resim` varchar(256) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urun_fotogaleritbl`
--

INSERT INTO `urun_fotogaleritbl` (`fotogaleri_id`, `resim`, `urun_id`) VALUES
(1, 'demos/store/images/product/fotogaleri/226501-1.jpg', 1),
(2, 'demos/store/images/product/fotogaleri/207401-2.jpg', 1),
(3, 'demos/store/images/product/fotogaleri/226119-1.jpg', 2),
(4, 'demos/store/images/product/fotogaleri/232339-2.jpg', 2),
(5, 'demos/store/images/product/fotogaleri/264539-3.jpg', 2),
(6, 'demos/store/images/product/fotogaleri/224083-1.jpg', 3),
(7, 'demos/store/images/product/fotogaleri/286123-2.jpg', 3),
(8, 'demos/store/images/product/fotogaleri/222643-3.jpg', 4),
(9, 'demos/store/images/product/fotogaleri/274543-4.jpg', 4),
(10, 'demos/store/images/product/fotogaleri/277091-1.jpg', 5),
(11, 'demos/store/images/product/fotogaleri/225941-2.jpg', 5),
(14, 'demos/store/images/product/fotogaleri/2921155.png', 11),
(15, 'demos/store/images/product/fotogaleri/2381077.png', 11),
(16, 'demos/store/images/product/fotogaleri/2584499.png', 11),
(17, 'demos/store/images/product/fotogaleri/268431010.png', 11),
(18, 'demos/store/images/product/fotogaleri/2647355.png', 12),
(19, 'demos/store/images/product/fotogaleri/2753377.png', 12),
(20, 'demos/store/images/product/fotogaleri/2315299.png', 12),
(21, 'demos/store/images/product/fotogaleri/265121010.png', 12),
(22, 'demos/store/images/product/fotogaleri/2326855.png', 13),
(23, 'demos/store/images/product/fotogaleri/2005177.png', 13),
(24, 'demos/store/images/product/fotogaleri/2275399.png', 13),
(25, 'demos/store/images/product/fotogaleri/265741010.png', 13),
(26, 'demos/store/images/product/fotogaleri/2963855.png', 14),
(27, 'demos/store/images/product/fotogaleri/2505177.png', 14),
(28, 'demos/store/images/product/fotogaleri/2960499.png', 14),
(29, 'demos/store/images/product/fotogaleri/254021010.png', 14);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar_tbl`
--
ALTER TABLE `ayar_tbl`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `kategori_tbl`
--
ALTER TABLE `kategori_tbl`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici_tbl`
--
ALTER TABLE `kullanici_tbl`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urunler_tbl`
--
ALTER TABLE `urunler_tbl`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `urun_fotogaleritbl`
--
ALTER TABLE `urun_fotogaleritbl`
  ADD PRIMARY KEY (`fotogaleri_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategori_tbl`
--
ALTER TABLE `kategori_tbl`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_tbl`
--
ALTER TABLE `kullanici_tbl`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `urunler_tbl`
--
ALTER TABLE `urunler_tbl`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `urun_fotogaleritbl`
--
ALTER TABLE `urun_fotogaleritbl`
  MODIFY `fotogaleri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
