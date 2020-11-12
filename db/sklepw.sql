-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lis 2020, 01:47
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklepw`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `klienciID` int(11) NOT NULL,
  `klienciFname` varchar(128) NOT NULL,
  `klienciLname` varchar(128) NOT NULL,
  `klienciEmail` varchar(128) NOT NULL,
  `klienciPwd` varchar(128) NOT NULL,
  `klienciPhone` varchar(9) DEFAULT NULL,
  `klienciAddress` varchar(128) DEFAULT NULL,
  `klienciPostcode` varchar(128) DEFAULT NULL,
  `klienciPost` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`klienciID`, `klienciFname`, `klienciLname`, `klienciEmail`, `klienciPwd`, `klienciPhone`, `klienciAddress`, `klienciPostcode`, `klienciPost`) VALUES
(1, 'Jarosław', 'Kaczyński', 'kwakwa@pis.org', '$2y$10$n1PuO3GlCLiMCsdVhPAyd.qzue90plLGnRSkxhvRT7kRtzpb7FrxK', NULL, NULL, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`klienciID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `klienciID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
