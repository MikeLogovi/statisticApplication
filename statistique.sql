-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2018 at 07:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `statistique`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photoDeProfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `userName`, `userFirstName`, `email`, `photoDeProfil`) VALUES
(1, 'LOGOVI', 'Mike', 'logovimike@gmail.com', 'src/public/images/logo.svg'),
(2, 'TOSSOU', 'Rodrigue', 'tossourodrigue@gmail.com', 'src/public/images/logo.svg'),
(3, 'KODJO', 'kodjo', 'kodjo@gmail.com', 'src/public/images/logo.svg'),
(4, 'ABLA', 'abla', 'abla@gmail.com', 'src/public/images/logo.svg'),
(5, 'AFI', 'afi', 'afi@gmail.com', 'src/public/images/logo.svg'),
(8, 'SOUMA', 'Jonous', 'soumo@gmail.com', 'src/public/photo_administrateur/anonyme.jpg'),
(9, 'ETSE', 'paul', 'pauletse@gmail.com', 'src/public/photo_administrateur/anonyme.jpg'),
(10, 'AFI', 'afou', 'afouaf@gmail.com', 'src/public/photo_membre/d68c1fa574d22404746135b74720b32e7521c3ca.jpg'),
(11, 'POUPOU', 'afou', 'afouaf@gmail.com', 'src/public/photo_membre/9bf817c819e34958e7b61cea5aeca970d91ad52b.jpg'),
(12, 'AFOUTOU', 'Pierre', 'afoutoupierre@gmail.com', 'src/public/photo_membre/4d4f583db6f1a83981d298e8683841acc0202548.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enquete`
--

CREATE TABLE `enquete` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `idAdministrateurEnChef` int(11) NOT NULL,
  `administrateurs` varchar(255) NOT NULL,
  `tempsMaximum` int(11) NOT NULL DEFAULT '267840',
  `revenue` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateFin` datetime DEFAULT NULL,
  `evolution` varchar(255) NOT NULL DEFAULT 'en cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquete`
--

INSERT INTO `enquete` (`id`, `nom`, `idAdministrateurEnChef`, `administrateurs`, `tempsMaximum`, `revenue`, `dateCreation`, `dateFin`, `evolution`) VALUES
(1, 'test1', 1, '2 3', 8, 2000, '2018-09-26 13:54:00', NULL, 'en cours'),
(2, 'test2', 2, '9 10', 63, 2000, '2018-09-26 13:55:16', NULL, 'en cours');

-- --------------------------------------------------------

--
-- Table structure for table `etapeIntermediaire`
--

CREATE TABLE `etapeIntermediaire` (
  `id` int(11) NOT NULL,
  `idEnquete` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `administrateurs` varchar(255) NOT NULL,
  `tempsMaximum` int(11) NOT NULL DEFAULT '267840',
  `evolution` varchar(255) NOT NULL DEFAULT 'en cours',
  `rapport` varchar(255) NOT NULL DEFAULT 'aucun',
  `dateFin` datetime NOT NULL DEFAULT '2050-09-26 13:35:06'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etapeIntermediaire`
--

INSERT INTO `etapeIntermediaire` (`id`, `idEnquete`, `nom`, `administrateurs`, `tempsMaximum`, `evolution`, `rapport`, `dateFin`) VALUES
(1, 1, 'testInter1', '2', 1, 'terminé', 'src/public/fichier_rapport_supplementaire/test1_testInter1_rapport.pdf', '2018-09-26 13:56:12'),
(2, 2, 'testInter2', '9', 30, 'en cours', 'aucun', '2050-09-26 13:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `etapePrincipale`
--

CREATE TABLE `etapePrincipale` (
  `id` int(11) NOT NULL,
  `idEnquete` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `administrateurs` varchar(255) NOT NULL,
  `tempsMaximum` int(11) NOT NULL DEFAULT '267840',
  `evolution` varchar(255) NOT NULL DEFAULT 'en cours',
  `rapport` varchar(255) NOT NULL DEFAULT 'aucun',
  `dateFin` datetime NOT NULL DEFAULT '2050-09-26 13:35:06'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etapePrincipale`
--

INSERT INTO `etapePrincipale` (`id`, `idEnquete`, `nom`, `administrateurs`, `tempsMaximum`, `evolution`, `rapport`, `dateFin`) VALUES
(1, 1, 'Elaboration du cahier de charge', '2', 1, 'terminé', 'src/public/fichier_rapport_principale/test1_Elaboration du cahier de charge_rapport.pdf', '2018-09-26 13:56:12'),
(2, 1, 'Elaboration raisonée du questionnaire', '2', 1, 'terminé', 'src/public/fichier_rapport_principale/test1_Elaboration raisonée du questionnaire_rapport.pdf', '2018-09-26 13:56:12'),
(3, 1, 'Rédaction,ordre et test du questionnaire', '3', 1, 'terminé', 'src/public/fichier_rapport_principale/test1_Rédaction,ordre et test du questionnaire_rapport.pdf', '2018-09-26 13:56:12'),
(4, 1, 'Validation par le commanditaire', '2', 1, 'en cours', 'aucun', '2050-09-26 13:35:06'),
(5, 1, 'Administration du questionnaire', '2 3', 1, 'terminé', 'src/public/fichier_rapport_principale/test1_Administration du questionnaire_rapport.pdf', '2018-09-26 13:56:12'),
(6, 1, 'Dépouillement et synthèse', '2 3', 1, 'terminé', 'src/public/fichier_rapport_principale/test1_Dépouillement et synthèse_rapport.pdf', '2018-09-26 13:56:12'),
(7, 1, 'Présentation des résultats', '2 3', 1, 'terminé', 'src/public/fichier_rapport_principale/test1_Présentation des résultats_rapport.pdf', '2018-09-26 13:56:12'),
(8, 2, 'Elaboration du cahier de charge', '9', 14, 'terminé', 'src/public/fichier_rapport_principale/test2_Elaboration du cahier de charge_rapport.pdf', '2018-09-26 16:41:39'),
(9, 2, 'Elaboration raisonée du questionnaire', '10', 1, 'en cours', 'aucun', '2050-09-26 13:35:06'),
(10, 2, 'Rédaction,ordre et test du questionnaire', '9', 1, 'en cours', 'aucun', '2050-09-26 13:35:06'),
(11, 2, 'Validation par le commanditaire', '9', 1, 'en cours', 'aucun', '2050-09-26 13:35:06'),
(12, 2, 'Administration du questionnaire', '10', 1, 'en cours', 'aucun', '2050-09-26 13:35:06'),
(13, 2, 'Dépouillement et synthèse', '9', 1, 'en cours', 'aucun', '2050-09-26 13:35:06'),
(14, 2, 'Présentation des résultats', '9 10', 14, 'en cours', 'aucun', '2050-09-26 13:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `listeEtape`
--

CREATE TABLE `listeEtape` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listeEtape`
--

INSERT INTO `listeEtape` (`id`, `nom`, `type`) VALUES
(2, 'Elaboration du cahier de charge', 'principale'),
(3, 'Elaboration raisonée du questionnaire', 'principale'),
(4, 'Rédaction,ordre et test du questionnaire', 'principale'),
(5, 'Validation par le commanditaire', 'principale'),
(6, 'Administration du questionnaire', 'principale'),
(7, 'Dépouillement et synthèse', 'principale'),
(8, 'Présentation des résultats', 'principale'),
(9, 'premierInter', 'intermediaire'),
(10, 'inter2', 'intermediaire'),
(11, 'inter 3', 'intermediaire'),
(12, 'testInter4', 'intermediaire'),
(13, 'etapeInter5', 'intermediaire'),
(14, 'testInter1', 'intermediaire'),
(15, 'testInter2', 'intermediaire'),
(16, 'testInter1', 'intermediaire'),
(17, 'testInter2', 'intermediaire'),
(18, 'testInter1', 'intermediaire'),
(19, 'testInter2', 'intermediaire');

-- --------------------------------------------------------

--
-- Table structure for table `progression`
--

CREATE TABLE `progression` (
  `id` int(11) NOT NULL,
  `idEnquete` int(11) NOT NULL,
  `idEtapePrincipale` int(11) NOT NULL,
  `idEtapeIntermediaire` int(11) DEFAULT '0',
  `dateValidation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `motpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `userName`, `motpass`) VALUES
(1, 'admin', '10470c3b4b1fed12c3baac014be15fac67c6e815');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquete`
--
ALTER TABLE `enquete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etapeIntermediaire`
--
ALTER TABLE `etapeIntermediaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etapePrincipale`
--
ALTER TABLE `etapePrincipale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listeEtape`
--
ALTER TABLE `listeEtape`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progression`
--
ALTER TABLE `progression`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enquete`
--
ALTER TABLE `enquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `etapeIntermediaire`
--
ALTER TABLE `etapeIntermediaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `etapePrincipale`
--
ALTER TABLE `etapePrincipale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `listeEtape`
--
ALTER TABLE `listeEtape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `progression`
--
ALTER TABLE `progression`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
