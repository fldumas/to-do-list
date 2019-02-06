-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 06 fév. 2019 à 12:48
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbfldumas`
--

-- --------------------------------------------------------

--
-- Structure de la table `tliste`
--

CREATE TABLE `tliste` (
  `id_liste` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tliste`
--

INSERT INTO `tliste` (`id_liste`, `titre`, `description`) VALUES
(165, 'Liste 1', 'ceci est une liste'),
(166, 'liste2', 'Une autre liste');

-- --------------------------------------------------------

--
-- Structure de la table `tlisteprive`
--

CREATE TABLE `tlisteprive` (
  `id_liste_prive` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tlisteprive`
--

INSERT INTO `tlisteprive` (`id_liste_prive`, `titre`, `description`, `id_utilisateur`) VALUES
(8, 'Ma tache 1', 'ceci est une tache privée', 169);

-- --------------------------------------------------------

--
-- Structure de la table `ttache`
--

CREATE TABLE `ttache` (
  `id_tache` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `valider` tinyint(1) NOT NULL,
  `id_liste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ttache`
--

INSERT INTO `ttache` (`id_tache`, `titre`, `valider`, `id_liste`) VALUES
(171, 'tache 1', 1, 165),
(172, 'tache 2', 0, 165),
(173, 'tache3', 0, 165),
(175, 'tache 1', 0, 166),
(176, 'tache2', 0, 166);

-- --------------------------------------------------------

--
-- Structure de la table `ttacheprive`
--

CREATE TABLE `ttacheprive` (
  `id_tache` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `valider` tinyint(1) NOT NULL,
  `id_liste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ttacheprive`
--

INSERT INTO `ttacheprive` (`id_tache`, `titre`, `valider`, `id_liste`) VALUES
(9, 'tache 1', 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mdp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `mdp`) VALUES
(169, 'fldumas', '$2y$10$cBdodBwdHSFrisXpqdXH0e6R1CPuhMXGEG27v/WTQYx./AUSFNKHi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tliste`
--
ALTER TABLE `tliste`
  ADD PRIMARY KEY (`id_liste`),
  ADD UNIQUE KEY `tliste_unique` (`titre`);

--
-- Index pour la table `tlisteprive`
--
ALTER TABLE `tlisteprive`
  ADD PRIMARY KEY (`id_liste_prive`),
  ADD KEY `utilisateur_fk` (`id_utilisateur`);

--
-- Index pour la table `ttache`
--
ALTER TABLE `ttache`
  ADD PRIMARY KEY (`id_tache`),
  ADD KEY `fk_liste` (`id_liste`);

--
-- Index pour la table `ttacheprive`
--
ALTER TABLE `ttacheprive`
  ADD PRIMARY KEY (`id_tache`),
  ADD KEY `liste_fk` (`id_liste`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `utilisateur_unique` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tliste`
--
ALTER TABLE `tliste`
  MODIFY `id_liste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT pour la table `tlisteprive`
--
ALTER TABLE `tlisteprive`
  MODIFY `id_liste_prive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `ttache`
--
ALTER TABLE `ttache`
  MODIFY `id_tache` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT pour la table `ttacheprive`
--
ALTER TABLE `ttacheprive`
  MODIFY `id_tache` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tlisteprive`
--
ALTER TABLE `tlisteprive`
  ADD CONSTRAINT `utilisateur_fk` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ttache`
--
ALTER TABLE `ttache`
  ADD CONSTRAINT `fk_liste` FOREIGN KEY (`id_liste`) REFERENCES `tliste` (`id_liste`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ttacheprive`
--
ALTER TABLE `ttacheprive`
  ADD CONSTRAINT `liste_fk` FOREIGN KEY (`id_liste`) REFERENCES `tlisteprive` (`id_liste_prive`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
