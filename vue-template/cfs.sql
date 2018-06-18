-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 08:28 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `RESERVATION_ID` int(10) NOT NULL,
  `START_TIME` datetime NOT NULL,
  `END_TIME` datetime NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  `APPROVED` tinyint(1) NOT NULL,
  `ROOM_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`RESERVATION_ID`, `START_TIME`, `END_TIME`, `DESCRIPTION`, `APPROVED`, `ROOM_ID`) VALUES
(1, '2018-06-18 12:00:00', '2018-06-18 13:00:00', 'Short Habitat for Humanity meeting', 1, 16),
(2, '2018-06-18 15:00:00', '2018-06-18 22:00:00', 'Super Smash Bros Club meeting', 1, 20),
(3, '2018-06-18 00:00:00', '2018-06-19 00:00:00', 'Nothing lol', 0, 13),
(4, '2018-06-18 20:00:00', '2018-06-18 22:00:00', 'Rusty Pipes Performance', 1, 13),
(5, '2018-06-18 17:00:00', '2018-06-18 19:00:00', 'Yoga session', 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ROOM_ID` int(10) NOT NULL,
  `BUILDING` varchar(20) NOT NULL,
  `ROOM_NUM` varchar(20) NOT NULL,
  `CAP` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ROOM_ID`, `BUILDING`, `ROOM_NUM`, `CAP`) VALUES
(11, ' Rensselaer Union', ' Mother\'s', 50),
(12, ' Rensselaer Union', ' Phanlanx', 99),
(13, ' Rensselaer Union', ' McNeil Room', 120),
(14, ' Rensselaer Union', ' 3202', 30),
(15, ' Rensselaer Union', ' 09 Lounge', 40),
(16, ' Rensselaer Union', ' 3510', 40),
(17, ' Rensselaer Union', ' 3511', 40),
(18, ' Rensselaer Union', ' Lobby', 50),
(19, ' Mueller Center', ' Basketball Court', 20),
(20, ' Rensselaer Union', ' Games Room', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`RESERVATION_ID`),
  ADD KEY `ROOM_ID` (`ROOM_ID`),
  ADD KEY `ROOM_ID_2` (`ROOM_ID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ROOM_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ROOM_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
