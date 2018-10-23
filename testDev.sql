-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 23 Octobre 2018 à 01:21
-- Version du serveur :  5.7.23-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testDev`
--

-- --------------------------------------------------------

--
-- Structure de la table `classement`
--

CREATE TABLE `classement` (
  `id` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `pts` int(11) NOT NULL,
  `nulls` int(11) NOT NULL,
  `Match_joue` int(11) NOT NULL,
  `victoire` int(11) NOT NULL,
  `defaite` int(11) NOT NULL,
  `but_marque` int(11) NOT NULL,
  `but_encaise` int(11) NOT NULL,
  `difference_but` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `classement`
--

INSERT INTO `classement` (`id`, `id_equipe`, `pts`, `nulls`, `Match_joue`, `victoire`, `defaite`, `but_marque`, `but_encaise`, `difference_but`) VALUES
(1, 1, 0, 0, 2, 0, 2, 3, 6, -3),
(2, 2, 6, 0, 2, 2, 0, 6, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `libelle_equipe` varchar(255) NOT NULL,
  `description_equipe` text,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `libelle_equipe`, `description_equipe`, `logo`) VALUES
(1, 'BORDEAU', 'bor', '536image_1.png'),
(2, 'PSG', 'Paris', '550image_2.png');

-- --------------------------------------------------------

--
-- Structure de la table `matchFoot`
--

CREATE TABLE `matchFoot` (
  `id_matchs` int(11) NOT NULL,
  `id_equipe_a` int(11) NOT NULL,
  `id_equipe_b` int(11) NOT NULL,
  `score_a` int(11) NOT NULL,
  `score_b` int(11) NOT NULL,
  `phase` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'inactif',
  `id_stade` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `id_journe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matchFoot`
--

INSERT INTO `matchFoot` (`id_matchs`, `id_equipe_a`, `id_equipe_b`, `score_a`, `score_b`, `phase`, `statut`, `id_stade`, `code`, `id_journe`) VALUES
(1, 1, 2, 2, 3, 1, 'inactif', 1, 'fff', 1),
(2, 2, 1, 3, 1, 2, '', 2, 'rrr', 2);

-- --------------------------------------------------------

--
-- Structure de la table `stade`
--

CREATE TABLE `stade` (
  `id_stade` int(11) NOT NULL,
  `libelle_stade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `stade`
--

INSERT INTO `stade` (`id_stade`, `libelle_stade`) VALUES
(1, 'Stade  de Paris'),
(2, 'stade de Bordeau');

-- --------------------------------------------------------

--
-- Structure de la table `sys_profil`
--

CREATE TABLE `sys_profil` (
  `id_profil` int(11) UNSIGNED NOT NULL,
  `libelle_profil` varchar(100) NOT NULL,
  `id_module_encore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sys_profil`
--

INSERT INTO `sys_profil` (`id_profil`, `libelle_profil`, `id_module_encore`) VALUES
(1, 'Super Utilisateur', 0),
(2, 'Administrateur', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sys_user`
--

CREATE TABLE `sys_user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` enum('M','F') NOT NULL DEFAULT 'M',
  `adresse` varchar(250) DEFAULT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'Azertyui',
  `id_profil` int(11) UNSIGNED NOT NULL,
  `statut` enum('attente','actif','inactif') NOT NULL DEFAULT 'attente',
  `date_last_modif` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sys_user`
--

INSERT INTO `sys_user` (`id_user`, `nom`, `prenom`, `sexe`, `adresse`, `telephone`, `email`, `login`, `password`, `id_profil`, `statut`, `date_last_modif`) VALUES
(1, 'Lo', 'Diack', 'M', 'N’Djamena', '7777777', 'admin', 'superUser@octasen.sn', 'passer', 1, 'actif', NULL),
(17, 'Abakar', 'Mahamat', 'M', 'gueltapée rue 67*64', '+221708764957', 'mabakar@groupeisi.com', 'admin@octasen.sn', 'passer', 2, 'actif', NULL),
(18, 'Mamou', 'SoiMa', 'M', 'institut Supérieur D\'Iinformatique de Dakar', '+221708764957', 'mabakar@groupeisi.com', 'adjadmin@gmail.com', 'passer', 2, 'actif', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `classement`
--
ALTER TABLE `classement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_equipe` (`id_equipe`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Index pour la table `matchFoot`
--
ALTER TABLE `matchFoot`
  ADD PRIMARY KEY (`id_matchs`),
  ADD KEY `id_equipe_a` (`id_equipe_a`),
  ADD KEY `id_equipe_b` (`id_equipe_b`);

--
-- Index pour la table `stade`
--
ALTER TABLE `stade`
  ADD PRIMARY KEY (`id_stade`);

--
-- Index pour la table `sys_profil`
--
ALTER TABLE `sys_profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `id_module_encore` (`id_module_encore`);

--
-- Index pour la table `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `classement`
--
ALTER TABLE `classement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `matchFoot`
--
ALTER TABLE `matchFoot`
  MODIFY `id_matchs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `stade`
--
ALTER TABLE `stade`
  MODIFY `id_stade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sys_profil`
--
ALTER TABLE `sys_profil`
  MODIFY `id_profil` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sys_user`
--
ALTER TABLE `sys_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
