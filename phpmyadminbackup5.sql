-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 02:40 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuizonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `IDGuru` varchar(12) NOT NULL,
  `NamaGuru` varchar(30) DEFAULT NULL,
  `Password_Guru` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`IDGuru`, `NamaGuru`, `Password_Guru`) VALUES
('791234567890', 'Mashitah', 'MBAM'),
('801234567890', 'Rasuli', 'RBA'),
('811234567890', 'Zubidah', 'ZBMY');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `IDKelas` varchar(3) NOT NULL,
  `NamaKelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`IDKelas`, `NamaKelas`) VALUES
('K01', 'Anggerik'),
('K02', 'Budi'),
('K03', 'Cekal');

-- --------------------------------------------------------

--
-- Table structure for table `kuiz`
--

CREATE TABLE `kuiz` (
  `IDPelajar` varchar(12) NOT NULL,
  `IDSoalan` varchar(4) NOT NULL,
  `Tarikh` varchar(10) DEFAULT NULL,
  `Pilih` varchar(1) DEFAULT NULL,
  `Peratus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuiz`
--

INSERT INTO `kuiz` (`IDPelajar`, `IDSoalan`, `Tarikh`, `Pilih`, `Peratus`) VALUES
('040123456789', 'S001', '01/09/2021', 'C', 100),
('040123456789', 'S002', '01/09/2021', 'A', 100),
('040123456789', 'S003', '01/09/2021', 'B', 100),
('040123456789', 'S004', '01/09/2021', 'C', 100),
('040123456789', 'S005', '01/09/2021', 'C', 100),
('040312345678', 'S001', '01/09/2021', 'C', 40),
('040312345678', 'S002', '01/09/2021', 'A', 40),
('040312345678', 'S003', '01/09/2021', 'A', 40),
('040312345678', 'S004', '01/09/2021', 'A', 40),
('040312345678', 'S005', '01/09/2021', 'A', 40),
('040412345678', 'S001', '01/09/2021', 'C', 60),
('040412345678', 'S002', '01/09/2021', 'A', 60),
('040412345678', 'S003', '01/09/2021', 'B', 60),
('040412345678', 'S004', '01/09/2021', 'A', 60),
('040412345678', 'S005', '01/09/2021', 'A', 60);

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `IDPelajar` varchar(12) NOT NULL,
  `NamaPelajar` varchar(30) DEFAULT NULL,
  `IDKelas` varchar(3) DEFAULT NULL,
  `Password_Pelajar` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`IDPelajar`, `NamaPelajar`, `IDKelas`, `Password_Pelajar`) VALUES
('040123456789', 'Jon', 'K01', 'JSZ'),
('040312345678', 'Ryan', 'K02', 'RZA'),
('040412345678', 'Hazeq', 'K03', 'HDBZ');

-- --------------------------------------------------------

--
-- Table structure for table `soalan`
--

CREATE TABLE `soalan` (
  `IDSoalan` varchar(4) NOT NULL,
  `NamaSoalan` varchar(30) DEFAULT NULL,
  `PilihanA` varchar(30) DEFAULT NULL,
  `PilihanB` varchar(30) DEFAULT NULL,
  `PilihanC` varchar(30) DEFAULT NULL,
  `Jawapan` varchar(1) DEFAULT NULL,
  `IDGuru` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan`
--

INSERT INTO `soalan` (`IDSoalan`, `NamaSoalan`, `PilihanA`, `PilihanB`, `PilihanC`, `Jawapan`, `IDGuru`) VALUES
('S001', '-5+3', '-5', '-4', '-2', 'C', '791234567890'),
('S002', '-4+3', '-1', '0', '1', 'A', '801234567890'),
('S003', '-3+3', '-1', '0', '1', 'B', '791234567890'),
('S004', '-2+3', '-1', '0', '1', 'C', '801234567890'),
('S005', '-1+3', '0', '1', '2', 'C', '791234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`IDGuru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`IDKelas`);

--
-- Indexes for table `kuiz`
--
ALTER TABLE `kuiz`
  ADD PRIMARY KEY (`IDPelajar`,`IDSoalan`),
  ADD KEY `soalanid` (`IDSoalan`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`IDPelajar`),
  ADD KEY `kelasid` (`IDKelas`);

--
-- Indexes for table `soalan`
--
ALTER TABLE `soalan`
  ADD PRIMARY KEY (`IDSoalan`),
  ADD KEY `guruid` (`IDGuru`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kuiz`
--
ALTER TABLE `kuiz`
  ADD CONSTRAINT `pelajarid` FOREIGN KEY (`IDPelajar`) REFERENCES `pelajar` (`IDPelajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soalanid` FOREIGN KEY (`IDSoalan`) REFERENCES `soalan` (`IDSoalan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD CONSTRAINT `kelasid` FOREIGN KEY (`IDKelas`) REFERENCES `kelas` (`IDKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soalan`
--
ALTER TABLE `soalan`
  ADD CONSTRAINT `guruid` FOREIGN KEY (`IDGuru`) REFERENCES `guru` (`IDGuru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
