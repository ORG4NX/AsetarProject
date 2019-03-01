-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 04 déc. 2018 à 16:40
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ASETAR08`
--

-- --------------------------------------------------------

--
-- Structure de la table `Membre`
--

CREATE TABLE `Membre` (`id` int(100) NOT NULL,
                      `login` varchar(30) NOT NULL,
                      `pw` text NOT NULL,
                      `nom` varchar(30) NOT NULL,
                      `prenom` varchar(30) NOT NULL,
                      `email` varchar(30) NOT NULL,
                      `type_acces` int(2) NOT NULL,
                      `date_error_log` datetime DEFAULT NULL,
                      `date_modif` datetime DEFAULT NULL,
                      `date_connec` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Membre`
--

INSERT INTO `Membre` (`id`, `login`, `pw`, `nom`, `prenom`, `email`, `type_acces`, `date_error_log`, `date_modif`, `date_connec`) VALUES
(72, 'achtal', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Talon', 'Achille', 'achtal@gmail.com', 3, NULL, '2018-11-06 17:33:47', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Membre`
--
ALTER TABLE `Membre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Membre`
--
ALTER TABLE `Membre`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
