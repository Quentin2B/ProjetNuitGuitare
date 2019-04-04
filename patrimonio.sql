-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2019 at 04:27 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patrimonio`
--
CREATE DATABASE IF NOT EXISTS `patrimonio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `patrimonio`;

-- --------------------------------------------------------

--
-- Table structure for table `chauffeur`
--

DROP TABLE IF EXISTS `chauffeur`;
CREATE TABLE `chauffeur` (
  `Id` int(3) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Telephone` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chauffeur`
--

INSERT INTO `chauffeur` (`Id`, `Nom`, `Prenom`, `Telephone`) VALUES
(2, 'Marcel', 'Chauff', 55555),
(7, 'rere', 'erer', 124578),
(6, 'test', 'test', 123456789),
(9, 'hfhf', 'gfhfh', 445);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `Id` int(3) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `NomChauffeur` int(11) NOT NULL COMMENT '!!!fk id chauffeur',
  `NomGroupe` int(11) NOT NULL,
  `NomStructure` int(11) NOT NULL,
  `Remarque` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Id`, `Date`, `Heure`, `NomChauffeur`, `NomGroupe`, `NomStructure`, `Remarque`) VALUES
(2, '2019-04-19', '20:28:08', 2, 1, 1, 'La batterie est fragile et bernard doit prendre sa basse avec lui!!!§§§'),
(3, '2019-04-30', '12:00:00', 6, 2, 2, ''),
(4, '2019-04-19', '04:00:00', 7, 1, 1, 'devrait être tout en haut');

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE `groupe` (
  `Id` int(3) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `NbPersonne` varchar(50) NOT NULL,
  `DateConcert` date NOT NULL,
  `LieuArrivee` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`Id`, `Nom`, `NbPersonne`, `DateConcert`, `LieuArrivee`) VALUES
(1, 'izezezezez', '500', '2019-04-25', 'Aqui'),
(2, 'dsdsdsdsd', '9999999', '2019-04-18', 'cxcxc');

-- --------------------------------------------------------

--
-- Table structure for table `jour`
--

DROP TABLE IF EXISTS `jour`;
CREATE TABLE `jour` (
  `Id` int(3) NOT NULL,
  `Date` date NOT NULL,
  `NomGroupe` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

DROP TABLE IF EXISTS `structure`;
CREATE TABLE `structure` (
  `Id` int(11) NOT NULL,
  `Categorie` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Telephone` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`Id`, `Categorie`, `Nom`, `Adresse`, `Telephone`) VALUES
(1, 'scene', 'lascene', 'fffsfsgqgqg', 125454),
(2, 'sdsgs', 'gsgsgsg', 'sgsgsgs', 75451),
(3, 'aeroport', 'dsgdsgd', 'sggsdfg', 1515151);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_chauffeur_course` (`NomChauffeur`),
  ADD KEY `fk_groupe_course` (`NomGroupe`),
  ADD KEY `fk_structure_course` (`NomStructure`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jour`
--
ALTER TABLE `jour`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
