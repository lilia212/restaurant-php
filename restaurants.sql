-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 04 oct. 2020 à 21:40
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurants`
--

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id_restaurant` int(3) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `type` enum('gastronomique','brasserie','pizzeria','autre') NOT NULL,
  `note` int(1) NOT NULL,
  `avis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`id_restaurant`, `nom`, `adresse`, `telephone`, `type`, `note`, `avis`) VALUES
(1, 'Rodizio Brazil L\'Original', ' 157-161 Boulevard Charles de Gaulle, 92700 Colombes', '0195243536', 'autre', 5, 'Un magnifique restaurant décoré avec goût et le soucis du détail.\r\nUn repas délicieux de l’entrée jusqu’au dessert.\r\nAvec un personnel accueillant, souriant et disponible.\r\nIl s’agit bien de la meilleure adresse que j’ai pu faire jusqu’à aujourd’hui. Je recommande ce restaurant les yeux fermés.\r\nMerci au chef !'),
(2, 'L \'Anvers du Decor', ' 32Bis Rue d\'Orsel, 75018 Paris', '0623242566', 'pizzeria', 5, 'Le cadre du restaurant est joli et le lieu n\'est pas excessivement bruyant.\r\nLa nourriture est de qualité, la viande est très bonne.\r\nLe personnel est gentil et les prix sont corrects. Possibilité d\'emporter ce que l\'on arrive pas à finir de manger.'),
(3, 'Au Petit Châlet', '157-167 Boulevard Charles de Gaulle, 92700 Colombes', '0147840325', 'gastronomique', 4, 'Personnels très accueillants et agréables. La décoration du restaurant est simple et belle. La nourriture proposée est très bonne. J\'ai beaucoup aimé goûter les différentes viandes proposées. Je le recommande fortement.'),
(4, 'L\'Atelier sur la Braise', ' 430 Avenue de la République, 92000 Nanterre', '0147840327', 'brasserie', 4, 'Service avec la tablette super confortable pour le client. Le rapport qualité est indiscutable. Le seul petit bémol la climatisation nous avons demandé aux serveurs ils ont essayé de la régler mais en vain. Elle est incliné vers la clientèle je trouve cela très désagréable. Mais si non je recommande'),
(5, 'L\'Atelier de Paris', '430 Avenue de la République, 92000 Nanterre', '0303060202', 'brasserie', 2, 'Service avec la tablette super confortable pour le client. Le rapport qualité est indiscutable. Le seul petit bémol la climatisation nous avons demandé aux serveurs ils ont essayé de la régler mais en vain. Elle est incliné vers la clientèle je trouve cela très désagréable. Mais si non je recommande vivement');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_restaurant` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
