-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 09 jan 2018 kl 15:50
-- Serverversion: 5.6.26
-- PHP-version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `ooda`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `pk` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `displayname` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `accounts`
--

INSERT INTO `accounts` (`pk`, `username`, `displayname`, `password`, `email`, `date`, `type`) VALUES
(5, 'admin', 'admin', 'admin', 'admin@ooda.se', '2016-04-14 13:40:18', 'admin'),
(6, 'admin', 'admin', 'admin', 'admin@ooda.se', '2016-04-14 13:40:18', 'admin'),
(7, 'admin', 'admin', 'admin', 'admin@ooda.se', '2016-04-14 13:40:18', 'admin'),
(8, 'admin', 'admin', 'admin', 'admin@ooda.se', '2016-04-14 13:44:40', 'admin');

-- --------------------------------------------------------

--
-- Tabellstruktur `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `pk` int(11) NOT NULL,
  `booked` int(11) NOT NULL,
  `booker` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `bookings`
--

INSERT INTO `bookings` (`pk`, `booked`, `booker`, `date`, `payment`) VALUES
(1, 0, 1, '2016-04-20', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `username` varchar(64) NOT NULL,
  `gaming` int(11) NOT NULL,
  `displayname` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pk` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `payment` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `customers`
--

INSERT INTO `customers` (`username`, `gaming`, `displayname`, `password`, `pk`, `email`, `payment`, `date`) VALUES
('admin', 0, 'admin', 'admin', 1, 'admin@ooda.se', 0, '2016-04-14 13:45:07'),
('admin', 0, 'admin', 'admin', 2, 'admin@ooda.se', 0, '2016-04-14 13:45:23');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`pk`);

--
-- Index för tabell `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`pk`);

--
-- Index för tabell `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `payment` (`payment`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `accounts`
--
ALTER TABLE `accounts`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT för tabell `bookings`
--
ALTER TABLE `bookings`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `customers`
--
ALTER TABLE `customers`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`pk`) REFERENCES `customers` (`pk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
