-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Wrz 2017, 21:42
-- Wersja serwera: 10.1.26-MariaDB
-- Wersja PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `firma_nowicki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzialy`
--

CREATE TABLE `dzialy` (
  `dzial` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `dzialy`
--

INSERT INTO `dzialy` (`dzial`) VALUES
('IT'),
('Magazyn'),
('Pomoc'),
('Produkcja'),
('Zarzad');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `nr_akt` int(4) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `stanowisko` varchar(30) NOT NULL,
  `kierownik` int(4) NOT NULL,
  `data_zatr` date NOT NULL,
  `data_zwol` date DEFAULT NULL,
  `placa` float NOT NULL,
  `dod_funk` float NOT NULL,
  `prowizja` float NOT NULL,
  `dzial` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`nr_akt`, `nazwisko`, `stanowisko`, `kierownik`, `data_zatr`, `data_zwol`, `placa`, `dod_funk`, `prowizja`, `dzial`) VALUES
(0, 'Adamski', 'Informatyk', 0, '2017-09-06', NULL, 1600, 200, 300, 'IT'),
(2, 'Nowakowski', 'Kierowca', 2, '2017-09-01', NULL, 2300, 100, 300, 'Pomoc'),
(3, 'Walczak', 'Kierowca', 2, '2017-08-09', NULL, 1900, 50, 300, 'Pomoc'),
(4, 'Wysocki', 'Magazynier', 13, '2017-06-05', NULL, 1600, 150, 300, 'Magazyn'),
(5, 'Kowalski', 'Medyk', 11, '2016-05-05', NULL, 2600, 300, 300, 'Pomoc'),
(6, 'Maciejewski', 'Ochroniarz', 8, '2014-03-03', NULL, 1500, 66, 200, 'IT'),
(7, 'Sawicka', 'Pomocnik', 15, '2014-02-24', NULL, 1700, 70, 200, 'Magazyn'),
(8, 'Ostrowski', 'Pracownik', 8, '2017-09-20', NULL, 2200, 120, 200, 'Produkcja'),
(9, 'Duda', 'Ochroniarz', 5, '2010-10-10', NULL, 1650, 600, 200, 'Zarzad'),
(10, 'Kowalczyk', 'Producent', 3, '2015-05-04', NULL, 3200, 2000, 200, 'Pomoc'),
(11, 'Kotov', 'Medyk', 8, '2012-02-02', NULL, 900, 50, 100, 'Produkcja'),
(12, 'Repin', 'Kierowca', 12, '2012-02-02', NULL, 800, 40, 100, 'Produkcja'),
(13, 'Golubev', 'Pomocnik', 3, '2012-02-02', NULL, 700, 30, 100, 'Produkcja'),
(14, 'Fyodorova', 'Pracownik', 4, '2012-02-02', NULL, 600, 20, 100, 'Produkcja'),
(15, 'Tikhonov', 'Producent', 11, '2012-02-02', NULL, 500, 10, 100, 'Produkcja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowisko`
--

CREATE TABLE `stanowisko` (
  `stanowisko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `stanowisko`
--

INSERT INTO `stanowisko` (`stanowisko`) VALUES
('Informatyk'),
('Kierowca'),
('Kierownik'),
('Magazynier'),
('Medyk'),
('Ochroniarz'),
('Pomocnik'),
('Pracownik'),
('Producent'),
('Szef');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `dzialy`
--
ALTER TABLE `dzialy`
  ADD PRIMARY KEY (`dzial`);

--
-- Indexes for table `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`nr_akt`),
  ADD KEY `stanowisko` (`stanowisko`),
  ADD KEY `dzial` (`dzial`),
  ADD KEY `lel` (`kierownik`);

--
-- Indexes for table `stanowisko`
--
ALTER TABLE `stanowisko`
  ADD PRIMARY KEY (`stanowisko`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD CONSTRAINT `lel` FOREIGN KEY (`kierownik`) REFERENCES `pracownicy` (`nr_akt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pracownicy_ibfk_1` FOREIGN KEY (`stanowisko`) REFERENCES `stanowisko` (`stanowisko`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pracownicy_ibfk_2` FOREIGN KEY (`dzial`) REFERENCES `dzialy` (`dzial`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
