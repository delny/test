-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Mars 2017 à 15:51
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `suiviactivite`
--

-- --------------------------------------------------------

--
-- Structure de la table `colonnes`
--

CREATE TABLE `colonnes` (
  `id` int(12) NOT NULL,
  `ordre` int(12) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `colonnes`
--

INSERT INTO `colonnes` (`id`, `ordre`, `nom`) VALUES
(1, 1, 'A faire'),
(2, 2, 'En cours'),
(3, 3, 'Termine'),
(4, 4, 'Bugs / Retours');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE `taches` (
  `id` int(12) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_colonne` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`id`, `description`, `id_colonne`) VALUES
(1, 'Modifier la page d''accueil en ajoutant des choses super importantes', 4),
(2, 'Ajouter une fonction pour se connecter car c''est super important', 1),
(3, 'changer le fond d''écran et en mettre un plus mieux', 1),
(4, 'Pouvoir ajouter une tache avec super bouton d''ajout de taches', 4),
(5, 'Afficher la liste des colonnes avec leurs noms', 2),
(6, 'créer l''arborescence des dossiers pour bien ranger les fichiers', 4),
(7, 'Corriger le bug qui fait tout planter !!', 2),
(8, 'correction du deuxième bug a faire très rapidement', 3),
(14, 'nouvelle tache', 3),
(15, 'mettre a jour le design', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `colonnes`
--
ALTER TABLE `colonnes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_colonne` (`id_colonne`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `colonnes`
--
ALTER TABLE `colonnes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `taches`
--
ALTER TABLE `taches`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `fk_taches_colonnes` FOREIGN KEY (`id_colonne`) REFERENCES `colonnes` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
