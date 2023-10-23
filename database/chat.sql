-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 oct. 2023 à 10:04
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
(2, 1176273545, 'ANDRIANTSOA', 'Anthony', 'anthony@gmail.com', '1234', 'Active now'),
(3, 1239755405, 'ANDRIAMIHANTA', 'Hajaina', 'hajaina@gmail.com', '1234', 'Active now');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(18, 1578207198, 777015826, 'SALUT'),
(19, 777015826, 1578207198, 'salut'),
(20, 1578207198, 777015826, 'ca va ve'),
(21, 777015826, 1578207198, 'oui cava'),
(22, 1578207198, 777015826, 'TSARA ZAN'),
(23, 777015826, 1578207198, 'Yeu'),
(24, 777015826, 1578207198, 'bye2'),
(25, 1578207198, 777015826, 'bye!!'),
(26, 1578207198, 777015826, 'resalut'),
(27, 777015826, 1578207198, 'salut mec'),
(28, 777015826, 1578207198, 'ceci est un test de message long que je t\'envoi maintenant'),
(29, 1578207198, 777015826, 'salut'),
(30, 777015826, 1578207198, 'cc'),
(31, 518855283, 1578207198, 'salut bozy'),
(32, 1578207198, 518855283, 'salut ndry'),
(33, 1578207198, 777015826, 'akory'),
(34, 777015826, 1578207198, 'cava');

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
(1, 777015826, 'RABEMANANTSOA Fanilo', 'Avo', 'nyavofanilo.rabe@gmail.com', '1234', 'Active now'),
(2, 1578207198, 'koto', 'kely', 'koto@gmail.com', '1234', 'Active now'),
(3, 1561109961, 'RAHANTARIVELO', 'Francoise', 'mireille@gmail.com', '1234', 'Offline now'),
(6, 518855283, 'Bozy', 'be', 'bozy@gmail.com', '1234', 'Offline now');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
