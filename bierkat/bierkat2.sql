-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 01:31 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bierkat2`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `atrybut1` text NOT NULL,
  `atrybut2` text NOT NULL,
  `atrybut3` text NOT NULL,
  `atrybut4` text NOT NULL,
  `atrybut5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`, `atrybut1`, `atrybut2`, `atrybut3`, `atrybut4`, `atrybut5`) VALUES
(1, 'motoryzacja', 'Marka', 'Model', 'Moc', 'Rocznik', 'Oferta od'),
(2, 'nieruchomości', 'Powierzchnia', 'Liczba pokoi', 'Poziom', 'Rodzaj zabudowy', 'Oferta od'),
(3, 'praca', 'Wymiar czasu', 'Typ umowy', 'Prawo jazdy wymagane', 'Studia wymagane', 'Oferta od'),
(4, 'meble', 'Rodzaj', 'Stan', 'Rocznik', 'Kolor', 'Oferta od'),
(5, 'telefony', 'Marka', 'Model', 'Aparat', 'Pamięć wbudowana', 'Oferta od'),
(6, 'ubrania', 'Rodzaj', 'Stan', 'Rozmiar', 'Kolor', 'Oferta od');

-- --------------------------------------------------------

--
-- Table structure for table `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `opis` text NOT NULL,
  `cena` float NOT NULL,
  `koniec` date NOT NULL,
  `wyroznione_do` date DEFAULT NULL,
  `sciezka_zdjecia` text,
  `atrybut1` text NOT NULL,
  `atrybut2` text NOT NULL,
  `atrybut3` text NOT NULL,
  `atrybut4` text NOT NULL,
  `atrybut5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ogloszenia`
--

INSERT INTO `ogloszenia` (`id`, `id_kategorii`, `id_uzytkownika`, `nazwa`, `opis`, `cena`, `koniec`, `wyroznione_do`, `sciezka_zdjecia`, `atrybut1`, `atrybut2`, `atrybut3`, `atrybut4`, `atrybut5`) VALUES
(4, 1, 4, 'dsadsa', 'hgfhgf', 423423, '2018-01-01', NULL, '', 'dsadas', 'fdsfds', 'gfdgd', 'fdsfds', 'fdsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `haslo` text NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `miasto` text NOT NULL,
  `telefon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `miasto`, `telefon`) VALUES
(1, 'bierkat', '207023ccb44feb4d7dadca005ce29a64', 'Mateusz', 'Bierkat', 'Rówce', '123456789'),
(4, 'kosyl', '207023ccb44feb4d7dadca005ce29a64', 'Mateusz', 'Kosyl', 'Iganie', '666999333');

-- --------------------------------------------------------

--
-- Table structure for table `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id` int(11) NOT NULL,
  `id_nadawcy` int(11) NOT NULL,
  `id_odbiorcy` int(11) NOT NULL,
  `tresc` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wiadomosci`
--

INSERT INTO `wiadomosci` (`id`, `id_nadawcy`, `id_odbiorcy`, `tresc`, `data`) VALUES
(1, 1, 4, 'Siemano kolano', '2017-12-01 13:24:37'),
(2, 1, 4, 'Podobno audi chcesz sprzedać', '2017-12-01 13:24:54'),
(3, 1, 4, '5000 i jutro zabieram', '2017-12-01 13:25:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ogloszenia_fk0` (`id_kategorii`),
  ADD KEY `ogloszenia_fk1` (`id_uzytkownika`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wiadomosci_fk0` (`id_nadawcy`),
  ADD KEY `wiadomosci_fk1` (`id_odbiorcy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD CONSTRAINT `ogloszenia_fk0` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id`),
  ADD CONSTRAINT `ogloszenia_fk1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD CONSTRAINT `wiadomosci_fk0` FOREIGN KEY (`id_nadawcy`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `wiadomosci_fk1` FOREIGN KEY (`id_odbiorcy`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
