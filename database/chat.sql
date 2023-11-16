-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 nov. 2023 à 09:55
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(1, 1519508550, 'RAKOTOSON', 'Jules', 'jules@gmail.com', '1234', 'Active now'),
(2, 1176273545, 'ANDRIANTSOA', 'Anthony', 'anthony@gmail.com', '1234', 'Offline now'),
(3, 1239755405, 'ANDRIAMIHANTA', 'Hajaina', 'hajaina@gmail.com', '1234', 'Offline now'),
(4, 1519508519, 'RABEMANANTSOA', 'Rotsy Nandrianina', 'rotsy@gmail.com', '1234', 'Offline now');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `id_contenu` int(11) NOT NULL,
  `type` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `date-cont` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `date_msg` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `date_msg`) VALUES
(41, 1, 2, 'coucou', '2023-10-23'),
(42, 1578207198, 1519508550, 'de aona', '2023-10-23'),
(43, 1578207198, 1519508550, 'Salama\r\n', '2023-10-23'),
(44, 1519508550, 1578207198, 'De aona e\r\n', '2023-10-23'),
(45, 1519508550, 1213024144, 'Salama tompoko\r\n', '2023-10-31'),
(46, 1213024144, 1519508550, 'Salama\r\n', '2023-10-31'),
(47, 1519508550, 777015826, 'Salama tompoko', '2023-11-04'),
(48, 777015826, 1519508550, 'Manao aona tompoko', '2023-11-04'),
(49, 1239755405, 1519508550, 'Salut\r\n', '2023-11-04'),
(50, 1519508550, 1239755405, 'Salama', '2023-11-04'),
(51, 1239755405, 1519508550, 'Vaovao aminareo ao?', '2023-11-04'),
(52, 1176273545, 1578207198, 'Salama', '2023-11-11'),
(53, 1578207198, 1519508550, 'Manao aona tompoko', '2023-11-11'),
(54, 1519508550, 1578207198, 'Aiza moa ny toerana misy anareo azafady?', '2023-11-11'),
(55, 1176273545, 1519508550, 'Salama', '2023-11-11'),
(56, 1519508550, 1176273545, 'De aona ra Jules', '2023-11-11'),
(57, 1578207198, 1519508550, 'Ety Ambohijatovo tompoko', '2023-11-11'),
(58, 1519508519, 1578207198, 'Salama tompoko', '2023-11-11'),
(59, 1239755405, 1176273545, 'Salama Hajaina', '2023-11-11'),
(60, 1578207198, 1176273545, 'Salama tompoko', '2023-11-11'),
(61, 1176273545, 1578207198, 'Afaka mahazo information ve azafady?', '2023-11-11'),
(62, 1578207198, 1176273545, 'Eny tompoko, inona no azo hanampina anao azafady?', '2023-11-11'),
(63, 1519508550, 1578207198, 'Misaotra tompoko', '2023-11-11'),
(64, 1519508550, 1187453235, 'Salama\r\n', '2023-11-14');

-- --------------------------------------------------------

--
-- Structure de la table `msg_group`
--

CREATE TABLE `msg_group` (
  `msg_gp_id` int(11) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg_gp` varchar(1000) NOT NULL,
  `date_msg_gp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `msg_group`
--

INSERT INTO `msg_group` (`msg_gp_id`, `outgoing_msg_id`, `msg_gp`, `date_msg_gp`) VALUES
(1, 1519508550, 'Bonjour\r\n', '2023-11-10'),
(2, 1519508519, 'Salama\r\n', '2023-11-10'),
(3, 1176273545, 'Salut', '2023-11-10'),
(4, 1519508550, 'Vao2 ato?', '2023-11-10'),
(5, 1519508519, 'Tsy misy fa aminareo ao?', '2023-11-10'),
(6, 1519508550, 'Misy réunion à 16h', '2023-11-10'),
(7, 1519508519, 'Ok ary', '2023-11-10'),
(8, 1176273545, 'Ok', '2023-11-11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(400) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `img`, `password`, `status`) VALUES
(1, 777015826, 'RABEMANANTSOA Fanilo', 'Avo', 'nyavofanilo.rabe@gmail.com', NULL, '1234', 'Offline now'),
(2, 1578207198, 'KOTO', 'kely', 'koto@gmail.com', NULL, '1234', 'Offline now'),
(3, 1561109961, 'RAHANTARIVELO', 'Francoise', 'mireille@gmail.com', NULL, '1234', 'Offline now'),
(6, 518855283, 'Bozy', 'be', 'bozy@gmail.com', NULL, '1234', 'Offline now'),
(7, 441549381, 'Taniah', 'RANDRIA', 'taniah@gmail.com', NULL, '1234', 'Offline now'),
(8, 1213024144, 'BEMA', 'RANDRIA', 'bema@gmail.com', NULL, '1234', 'Offline now'),
(10, 1187453235, 'Fanilo Ny Av', 'RAB', 'rab@gmail.com', '1699951804FIL7091.JPG', '1234', 'Offline now');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`id_contenu`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Index pour la table `msg_group`
--
ALTER TABLE `msg_group`
  ADD PRIMARY KEY (`msg_gp_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `id_contenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `msg_group`
--
ALTER TABLE `msg_group`
  MODIFY `msg_gp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
