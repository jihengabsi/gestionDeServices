-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 06 Septembre 2019 à 20:08
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sagem`
--

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

CREATE TABLE IF NOT EXISTS `composant` (
  `numC` int(11) NOT NULL AUTO_INCREMENT,
  `nomC` varchar(40) NOT NULL,
  `prix` float NOT NULL,
  `nomProduit` varchar(40) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`numC`),
  KEY `nomC` (`nomC`),
  KEY `nomProduit` (`nomProduit`),
  KEY `nomProduit_2` (`nomProduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `composant`
--

INSERT INTO `composant` (`numC`, `nomC`, `prix`, `nomProduit`, `qte`) VALUES
(1, 'four', 200, 'imprimante', 141),
(2, 'tete dimpression', 220, 'imprimante', 122),
(3, 'capteur CCD', 7, 'Telecopieur', 200);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `numD` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `service` varchar(20) NOT NULL,
  `nomC` varchar(40) NOT NULL,
  `qte` varchar(20) NOT NULL,
  `prixT` varchar(11) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `date1` datetime NOT NULL,
  PRIMARY KEY (`numD`),
  KEY `matricule` (`matricule`),
  KEY `nomC` (`nomC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`numD`, `matricule`, `nom`, `prenom`, `service`, `nomC`, `qte`, `prixT`, `etat`, `date1`) VALUES
(2, '02020', 'Fouleni', 'Foulen', 'informatique', 'tete dimpression', '22', '4840', 'enattente', '2019-09-04 00:00:11'),
(3, '02020', 'Fouleni', 'Foulen', 'informatique', 'tete dimpression', '22', '4840', 'enattente', '2019-09-04 00:00:40'),
(4, '02020', 'Fouleni', 'Foulen', 'informatique', 'four', '22', '4400', 'enattente', '2019-09-04 00:00:20');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `matricule` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `service` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`matricule`, `nom`, `prenom`, `service`, `mdp`, `email`) VALUES
('01010', 'ahmed', 'mohamed', 'achat', '01010', 'ahmed@gmail.Com'),
('02020', 'Gabsi', 'Jihen', 'informatique', '02020', 'gabsijihen31@gmail.Com'),
('03030', 'khalil', 'khlil', 'magasin', '03030', 'khlil@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `numP` int(20) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(40) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`numP`),
  KEY `nomProduit` (`nomProduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`numP`, `nomProduit`, `qte`) VALUES
(1, 'imprimante', 0),
(2, 'Telecopieur', 0),
(3, 'Decodeur numerique', 0),
(5, 'scanner', 0),
(6, 'Compteur', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `composant`
--
ALTER TABLE `composant`
  ADD CONSTRAINT `composant_ibfk_1` FOREIGN KEY (`nomProduit`) REFERENCES `produit` (`nomProduit`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`nomC`) REFERENCES `composant` (`nomC`),
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `membre` (`matricule`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
