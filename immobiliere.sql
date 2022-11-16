-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 sep. 2022 à 00:03
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobiliere`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id_agent` int(11) NOT NULL,
  `nom` tinytext NOT NULL,
  `prenom` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` text NOT NULL,
  `telephone` tinytext NOT NULL,
  `statut` enum('admin','responsable de ventes','commercial') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id_agent`, `nom`, `prenom`, `email`, `password`, `telephone`, `statut`) VALUES
(3, 'TELMOUDI', 'HAJER', 'hajer.telmoudi@gmail.com', '$2y$10$UpU9HibYXBsSAxwDIe7Uv.eh3yzmv.bVTxM3Oo7ddxKdxmjYRZ5vi', '12345678', 'admin'),
(4, 'BAGGA', 'ALMA', 'bagga.alma@gmail.com', '$2y$10$y9Qbew6zzDcK5yCD5Zcccui7EPsI4OEKwF2TwgEgHReczZD0C36cS', '12345678', 'commercial'),
(5, 'BAGGA', 'SELIM', 'selim.bagga@gmail.com', '$2y$10$2ndnz42vaOCgWcPgTQB4XeCYLJTOOtZfIhT0TzyNu2vj3S0s98eAi', '12345678', 'responsable de ventes');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` tinytext NOT NULL,
  `status` enum('Etude','Travaux en cours','Travaux finis','Vendu') NOT NULL,
  `superficie` float NOT NULL,
  `cout` double NOT NULL,
  `ventes` double NOT NULL,
  `somme` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id_projet`, `nom_projet`, `status`, `superficie`, `cout`, `ventes`, `somme`) VALUES
(1, 'Jasmins', 'Travaux en cours', 4000, 5000000, 3000000, 2000000);

-- --------------------------------------------------------

--
-- Structure de la table `projets_agents`
--

CREATE TABLE `projets_agents` (
  `id` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projets_agents`
--

INSERT INTO `projets_agents` (`id`, `id_projet`, `id_agent`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id_agent`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `projets_agents`
--
ALTER TABLE `projets_agents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `projets_agents`
--
ALTER TABLE `projets_agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
