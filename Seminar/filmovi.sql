-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 03:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kolekcija`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

CREATE TABLE `filmovi` (
  `ID` int(11) NOT NULL,
  `NASLOV` varchar(50) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `ID_ZANR` int(11) NOT NULL,
  `GODINA` year(4) NOT NULL,
  `TRAJANJE` float NOT NULL,
  `SLIKA` blob NOT NULL,
  `STATUS` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_mysql561_ci;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`ID`, `NASLOV`, `ID_ZANR`, `GODINA`, `TRAJANJE`, `SLIKA`, `STATUS`) VALUES
(134, '1231', 4, 2015, 123, 0x6669726577616c6c5f323030362e6a7067, 0),
(136, 'test2', 3, 2017, 222, 0x6669726577616c6c5f323030362e6a7067, 1),
(145, 'Antitrust', 7, 2001, 105, 0x616e746974727573745f323030312e6a7067, 0),
(146, 'Hackers', 1, 1995, 107, 0x6861636b6572735f313939352e6a7067, 1),
(148, 'Swordfish ', 7, 2001, 99, 0x6f7065726174696f6e5f73776f7264666973685f323030312e6a7067, 1),
(149, 'Pirates of Silicon Valley', 5, 1999, 95, 0x706972617465735f6f665f73696c69636f6e655f76616c6c65795f313939392e6a7067, 1),
(150, 'WarGames', 4, 1983, 114, 0x7761725f67616d65735f313938332e6a7067, 1),
(175, 'a ovo', 4, 2015, 233, 0x6f7065726174696f6e5f74616b65646f776e5f323030302e6a7067, 0),
(176, '1test', 3, 1993, 123, 0x7468655f736f6369616c5f6e6574776f726b5f323031302e6a7067, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ZANR` (`ID_ZANR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmovi`
--
ALTER TABLE `filmovi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD CONSTRAINT `filmovi_ibfk_1` FOREIGN KEY (`ID_ZANR`) REFERENCES `zanr` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
