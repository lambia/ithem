-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Ott 07, 2016 alle 16:52
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ithem_db`
--
CREATE DATABASE IF NOT EXISTS `ithem_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci;
USE `ithem_db`;

-- --------------------------------------------------------

--
-- Struttura della tabella `ithems`
--

CREATE TABLE `ithems` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `value` longtext COLLATE utf8_general_mysql500_ci NOT NULL,
  `type` tinytext COLLATE utf8_general_mysql500_ci NOT NULL,
  `rel` mediumint(9) NOT NULL,
  `children` tinyint(1) NOT NULL,
  `born` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dump dei dati per la tabella `ithems`
--

INSERT INTO `ithems` (`id`, `name`, `value`, `type`, `rel`, `children`, `born`, `changed`) VALUES
(1, 'Logo', 'static/fsociety.png', 'img', 0, 0, '2016-10-06 15:57:17', '2016-10-07 14:52:04'),
(2, 'Intro', 'Lorem ipsum dolorem sit amen!', 'txt', 0, 0, '2016-10-06 15:57:17', '2016-10-06 15:58:58'),
(3, 'Signal', 'static/signal.png', 'img', 0, 0, '2016-10-06 15:57:17', '2016-10-07 14:11:51'),
(16, 'google', 'http://wwww.google.it', 'lnk', 0, 0, '2016-10-06 16:02:01', '2016-10-06 16:02:01'),
(17, 'principale', '', 'men', 0, 1, '2016-10-07 12:58:19', '2016-10-07 12:58:19'),
(18, 'voce1', 'google.it', 'men-lnk', 17, 0, '2016-10-07 12:58:58', '2016-10-07 13:38:07'),
(19, 'voce2', 'google.it', 'men-lnk', 17, 0, '2016-10-07 12:59:04', '2016-10-07 13:38:11'),
(20, 'voce3', 'google.it', 'men-lnk', 17, 0, '2016-10-07 12:59:10', '2016-10-07 13:38:14');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ithems`
--
ALTER TABLE `ithems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ithems`
--
ALTER TABLE `ithems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
