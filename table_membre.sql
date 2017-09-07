-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 07 Septembre 2017 à 02:02
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `git_espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL COMMENT 'identifiant unique d''un membre',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table contenant les informations relatifs aux membres.';

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant unique d''un membre';