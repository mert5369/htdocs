-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Eyl 2021, 11:55:22
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mertticket`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rol`
--

CREATE TABLE `rol` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `rol`
--

INSERT INTO `rol` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'Bilgi İşlem'),
(3, 'Eğitim Fakültesi'),
(4, 'İnsan Kaynakları');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket`
--

CREATE TABLE `ticket` (
  `Id` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Detail` text NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` int(11) NOT NULL DEFAULT 0,
  `CloseDate` timestamp NULL DEFAULT NULL,
  `RolId` int(11) NOT NULL DEFAULT 1,
  `ClosedUserId` int(11) NOT NULL,
  `StartedUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ticket`
--

INSERT INTO `ticket` (`Id`, `Subject`, `Detail`, `CreateDate`, `Status`, `CloseDate`, `RolId`, `ClosedUserId`, `StartedUserId`) VALUES
(1, 'bilgisayarım alışmıyor', 'Kapandı bi daha çılmadı', '2021-09-06 07:48:14', 1, '2021-09-06 08:49:30', 1, 2, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticketanswer`
--

CREATE TABLE `ticketanswer` (
  `Id` int(11) NOT NULL,
  `TicketId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswerDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RolId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`Id`, `Name`, `Surname`, `Username`, `Password`, `RolId`) VALUES
(1, 'Mert', 'İhtiyar', 'mert.ihtiyar', 'e8dc9b8b3d71fcbbafa962e682986c45', 1),
(2, 'Yakup', 'ÖCAL', 'yakup.ocal', 'dd2b2eeabf024b5977a84592753be5a3', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `ticketanswer`
--
ALTER TABLE `ticketanswer`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `rol`
--
ALTER TABLE `rol`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `ticket`
--
ALTER TABLE `ticket`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ticketanswer`
--
ALTER TABLE `ticketanswer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
