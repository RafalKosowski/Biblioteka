-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Sty 2023, 21:14
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `imie` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `autor`
--

INSERT INTO `autor` (`id`, `imie`, `nazwisko`) VALUES
(1, 'Henryk', 'Sienkiewicz'),
(2, 'Adam', 'Mickiewicz'),
(3, 'Bolesław', 'Prus'),
(4, 'Juliusz', 'Słowacki'),
(5, 'Stefan', 'Żeromski'),
(6, 'Rafał', 'Kosowski'),
(7, 'Maeusz', 'Nowak'),
(8, 'Rafał', 'Nowak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazka`
--

CREATE TABLE `ksiazka` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `rok_wydania` int(11) NOT NULL,
  `opis` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  `zdjecie` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `kolor` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `autor_id` int(11) NOT NULL,
  `wydawnictwo_id` int(11) NOT NULL,
  `polka_id` int(11) NOT NULL,
  `pozycja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazka`
--

INSERT INTO `ksiazka` (`id`, `tytul`, `rok_wydania`, `opis`, `zdjecie`, `kolor`, `autor_id`, `wydawnictwo_id`, `polka_id`, `pozycja`) VALUES
(1, 'Pan Tadeusz', 2010, 'Epos narodowy', 'pan_tadeusz.jpg', '#A52A2A', 2, 2, 1, 2),
(2, 'Lalka', 2011, 'Powieść o Warszawie', 'lalka.jpg', '#FF0000', 3, 3, 1, 1),
(3, 'Dziady', 2013, 'Dramat poetycki', 'dziady.jpg', '#0000FF', 2, 4, 3, 3),
(4, 'Wesele', 2014, 'Dramat', 'wesele.jpg', '#FFFF00', 5, 5, 1, 4),
(5, 'Quo Vadis', 2012, 'Powieść historyczna', 'quo_vadis.jpg', '#008000', 1, 1, 1, 10),
(6, 'Potop', 1999, 'Powieść historyczna', 'potop.jpg', '#0000FF', 1, 1, 2, 10),
(8, 'Testowa1', 2023, 'To jest test', 'test.png', '#000000', 6, 1, 5, 1),
(9, 'Potop', 1999, 'Powieść historyczna', 'potop.jpg', '#000000', 1, 1, 1, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoba`
--

CREATE TABLE `osoba` (
  `id` int(11) NOT NULL,
  `imie` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `osoba`
--

INSERT INTO `osoba` (`id`, `imie`, `email`, `haslo`) VALUES
(1, 'Rafał', 'rkosa12@email.pl', '5a105e8b9d40e1329780d62ea2265d8a'),
(2, 'Rafał', 'rkosa@email.pl', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'Łukasz', 'kosa@gmail.com', '827932ef13cb06fc9ad04cb3ea356a82');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polka`
--

CREATE TABLE `polka` (
  `id` int(11) NOT NULL,
  `regal_id` int(11) NOT NULL,
  `rozmiar` int(11) NOT NULL,
  `nr_polka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `polka`
--

INSERT INTO `polka` (`id`, `regal_id`, `rozmiar`, `nr_polka`) VALUES
(1, 1, 20, 1),
(2, 2, 20, 1),
(3, 1, 10, 2),
(4, 3, 10, 2),
(5, 3, 10, 1),
(6, 3, 3, 0),
(7, 3, 3, 1),
(8, 3, 3, 2),
(9, 4, 3, 0),
(10, 4, 3, 1),
(11, 4, 3, 2),
(12, 5, 10, 1),
(13, 5, 10, 2),
(14, 6, 56, 1),
(15, 6, 56, 2),
(16, 6, 56, 3),
(17, 6, 56, 4),
(18, 6, 56, 5),
(19, 6, 56, 6),
(20, 6, 56, 7),
(21, 6, 56, 8),
(22, 6, 56, 9),
(23, 6, 56, 10),
(24, 6, 56, 11),
(25, 6, 56, 12),
(26, 6, 56, 13),
(27, 6, 56, 14),
(28, 6, 56, 15),
(29, 6, 56, 16),
(30, 6, 56, 17),
(31, 6, 56, 18),
(32, 6, 56, 19),
(33, 6, 56, 20),
(34, 6, 56, 21),
(35, 6, 56, 22),
(36, 6, 56, 23),
(37, 6, 56, 24),
(38, 6, 56, 25),
(39, 6, 56, 26),
(40, 6, 56, 27),
(41, 6, 56, 28),
(42, 6, 56, 29),
(43, 6, 56, 30),
(44, 6, 56, 31),
(45, 6, 56, 32),
(46, 6, 56, 33),
(47, 6, 56, 34),
(48, 6, 56, 35),
(49, 6, 56, 36),
(50, 6, 56, 37),
(51, 6, 56, 38),
(52, 6, 56, 39),
(53, 6, 56, 40),
(54, 6, 56, 41),
(55, 6, 56, 42),
(56, 6, 56, 43),
(57, 6, 56, 44),
(58, 6, 56, 45),
(59, 6, 56, 46),
(60, 6, 56, 47),
(61, 6, 56, 48),
(62, 6, 56, 49),
(63, 6, 56, 50),
(64, 7, 10, 1),
(65, 7, 10, 2),
(66, 7, 10, 3),
(67, 8, 10, 1),
(68, 8, 10, 2),
(69, 8, 10, 3),
(70, 8, 10, 4),
(71, 8, 10, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `regal`
--

CREATE TABLE `regal` (
  `id` int(11) NOT NULL,
  `rozmiar` int(11) NOT NULL,
  `osoba_id` int(11) NOT NULL,
  `nazwa` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `regal`
--

INSERT INTO `regal` (`id`, `rozmiar`, `osoba_id`, `nazwa`) VALUES
(1, 2, 1, 'Polka1'),
(2, 2, 2, 'pol2'),
(3, 2, 1, 'Półka w Salonie'),
(4, 3, 1, 'Test'),
(5, 2, 2, 'Test'),
(6, 50, 1, 'ghjfgf'),
(7, 3, 3, 'r'),
(8, 5, 3, 'gf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wydawnictwo`
--

CREATE TABLE `wydawnictwo` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wydawnictwo`
--

INSERT INTO `wydawnictwo` (`id`, `nazwa`) VALUES
(1, 'Wydawnictwo Znak'),
(2, 'Wydawnictwo Literackie'),
(3, 'Wydawnictwo Iskry'),
(4, 'Wydawnictwo Muza'),
(5, 'Wydawnictwo Sonia Draga'),
(6, 'wydawnictwo'),
(7, 'wydawnictwo'),
(8, 'wydawnictwo'),
(9, 'wydawnictwo'),
(10, 'wydawnictwo'),
(11, 'wydawnictwo'),
(12, 'wydawnictwo'),
(13, 'wydawnictwo'),
(14, 'wydawnictwo'),
(15, 'Iskry'),
(16, 'Test'),
(17, 'aaa');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ksiazka_polka` (`polka_id`),
  ADD KEY `wydawnictwo_id` (`wydawnictwo_id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Indeksy dla tabeli `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `polka`
--
ALTER TABLE `polka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_purchase_item` (`regal_id`);

--
-- Indeksy dla tabeli `regal`
--
ALTER TABLE `regal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `osoba_id` (`osoba_id`);

--
-- Indeksy dla tabeli `wydawnictwo`
--
ALTER TABLE `wydawnictwo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `osoba`
--
ALTER TABLE `osoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `polka`
--
ALTER TABLE `polka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT dla tabeli `regal`
--
ALTER TABLE `regal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `wydawnictwo`
--
ALTER TABLE `wydawnictwo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
