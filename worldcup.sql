-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 07:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldcup`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `nom_equipe` varchar(50) NOT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  `nombre_joueur` int(11) NOT NULL,
  `drapeaux_equipe` varchar(31) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom_equipe`, `groupe_id`, `nombre_joueur`, `drapeaux_equipe`) VALUES
(1, 'Brazil', 0, 26, 'img/brésil.png'),
(2, 'Germany', 1, 26, 'img/allemagne.png'),
(3, 'Argentina', 2, 26, 'img/argentine.png'),
(4, 'France', 3, 26, 'img/france.png'),
(5, 'Spain', 4, 26, 'img/espagne.png'),
(6, 'Italy', 5, 26, 'img/italie.png'),
(7, 'England', 6, 26, 'img/angleterre.png'),
(8, 'Netherlands', 7, 26, 'img/Netherlands.png'),
(9, 'Portugal', 0, 26, 'img/portugal.png'),
(10, 'Uruguay', 1, 26, 'img/uruguay.png'),
(11, 'Belgium', 2, 26, 'img/belgique.png'),
(12, 'Croatia', 3, 26, 'img/croatie.png'),
(13, 'Sweden', 4, 26, 'img/suède.png'),
(14, 'Mexico', 5, 26, 'img/mexique.png'),
(15, 'Colombia', 6, 26, 'img/colombie.png'),
(16, 'Chile', 7, 26, 'img/chili.png'),
(17, 'Poland', 0, 26, 'img/pologne.png'),
(18, 'Switzerland', 1, 26, 'img/isuisse.png'),
(19, 'Cameroon', 2, 26, 'img/Cameroon.png'),
(20, 'Denmark', 3, 26, 'img/danemark.png'),
(21, 'Peru', 4, 26, 'img/perou.png'),
(22, 'Australia', 5, 26, 'img/australie.png'),
(23, 'Japan', 6, 26, 'img/japon.png'),
(24, 'Senegal', 7, 26, 'img/sénégal.png'),
(25, 'Chine', 0, 26, 'img/chine.png'),
(26, 'Egypt', 1, 26, 'img/egypte.png'),
(27, 'Morocco', 2, 26, 'img/maroc.png'),
(28, 'Iceland', 3, 26, 'img/islande.png'),
(29, 'Nigeria', 4, 26, 'img/nigeria.png'),
(30, 'Saudi Arabia', 5, 26, 'img/arabie-saoudite.png'),
(31, 'Ghana', 6, 26, 'img/ghana.png'),
(32, 'USA (United States)', 7, 26, 'img/usa.png');

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `groupe_id` int(11) NOT NULL,
  `nom_groupe` varchar(1) NOT NULL,
  `nom_stade` varchar(15) NOT NULL,
  `ville_stade` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`groupe_id`, `nom_groupe`, `nom_stade`, `ville_stade`) VALUES
(0, 'A', 'Wembley Stadium', 'Londres'),
(1, 'B', 'Maracanã', 'Brésil'),
(2, 'C', 'Camp Nou', 'Barcelone'),
(3, 'D', 'Saint Denis', 'France'),
(4, 'E', 'Estadio Azteca', 'Mexico'),
(5, 'F', 'Yankee Stadium', 'New York'),
(6, 'G', 'Stade de Marrak', 'Marrakech'),
(7, 'H', 'Stade Khalifa I', 'Doha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`groupe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
