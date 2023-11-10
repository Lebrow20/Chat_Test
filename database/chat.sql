-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 nov. 2023 à 12:12
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
(18, 1578207198, 777015826, 'SALUT', NULL),
(19, 777015826, 1578207198, 'salut', NULL),
(20, 1578207198, 777015826, 'ca va ve', NULL),
(21, 777015826, 1578207198, 'oui cava', NULL),
(22, 1578207198, 777015826, 'TSARA ZAN', NULL),
(23, 777015826, 1578207198, 'Yeu', NULL),
(24, 777015826, 1578207198, 'bye2', NULL),
(25, 1578207198, 777015826, 'bye!!', NULL),
(26, 1578207198, 777015826, 'resalut', NULL),
(27, 777015826, 1578207198, 'salut mec', NULL),
(28, 777015826, 1578207198, 'ceci est un test de message long que je t\'envoi maintenant', NULL),
(29, 1578207198, 777015826, 'salut', NULL),
(30, 777015826, 1578207198, 'cc', NULL),
(31, 518855283, 1578207198, 'salut bozy', NULL),
(32, 1578207198, 518855283, 'salut ndry', NULL),
(33, 1578207198, 777015826, 'akory', NULL),
(34, 777015826, 1578207198, 'cava', NULL),
(35, 1519508550, 441549381, 'salama', NULL),
(36, 441549381, 1519508550, 'salama tompoko', NULL),
(37, 1519508550, 441549381, '12', NULL),
(38, 1519508550, 441549381, '121&', NULL),
(39, 441549381, 1519508550, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbcccccccccccccccccccccccccccccccccccccccccccccccccccccccccffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffddddddddddddddddddddddddddddddddd1111111111111111111555555555555554444444444444444444444444444kkkkkkkkkkkkkkkkkkkk', NULL),
(40, 1578207198, 1519508550, 'salut', NULL),
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
(51, 1239755405, 1519508550, 'Vaovao aminareo ao?', '2023-11-04');

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
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(1, 777015826, 'RABEMANANTSOA Fanilo', 'Avo', 'nyavofanilo.rabe@gmail.com', '1234', 'Offline now'),
(2, 1578207198, 'koto', 'kely', 'koto@gmail.com', '1234', 'Active now'),
(3, 1561109961, 'RAHANTARIVELO', 'Francoise', 'mireille@gmail.com', '1234', 'Offline now'),
(6, 518855283, 'Bozy', 'be', 'bozy@gmail.com', '1234', 'Offline now'),
(7, 441549381, 'Taniah', 'RANDRIA', 'taniah@gmail.com', '1234', 'Offline now'),
(8, 1213024144, 'BEMA', 'RANDRIA', 'bema@gmail.com', '1234', 'Offline now');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

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
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
