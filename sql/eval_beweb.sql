-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Mars 2017 à 08:16
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eval_beweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenant_eval`
--

DROP TABLE IF EXISTS `apprenant_eval`;
CREATE TABLE IF NOT EXISTS `apprenant_eval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C4EB462EE7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apprenant_eval`
--

INSERT INTO `apprenant_eval` (`id`, `email`) VALUES
(5, ''),
(4, 'dthrxfhgfcyg'),
(3, 'fre'),
(7, 'fsgdwgfdwxf'),
(2, 'l.derrieux@simplon.co'),
(1, 'loic.derrieux@gmail.com'),
(8, 'pouget.sonia@gmail.com'),
(6, 'qfds<fdswfds'),
(9, 'utfougjhbulj');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_apprenant`
--

DROP TABLE IF EXISTS `evaluation_apprenant`;
CREATE TABLE IF NOT EXISTS `evaluation_apprenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_16EB8DAAE7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `evaluation_apprenant`
--

INSERT INTO `evaluation_apprenant` (`id`, `email`) VALUES
(5, ''),
(4, 'dthrxfhgfcyg'),
(3, 'fre'),
(7, 'fsgdwgfdwxf'),
(2, 'l.derrieux@simplon.co'),
(1, 'loic.derrieux@gmail.com'),
(8, 'pouget.sonia@gmail.com'),
(6, 'qfds<fdswfds'),
(9, 'utfougjhbulj');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_evaluation`
--

DROP TABLE IF EXISTS `evaluation_evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_apprenant` int(11) DEFAULT NULL,
  `fk_question` int(11) DEFAULT NULL,
  `resultat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F924E287A5B291BE` (`fk_apprenant`),
  KEY `IDX_F924E28784DF0A90` (`fk_question`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `evaluation_evaluation`
--

INSERT INTO `evaluation_evaluation` (`id`, `fk_apprenant`, `fk_question`, `resultat`) VALUES
(1, 1, NULL, 2),
(2, 2, NULL, 2),
(3, 3, 1, 0),
(4, 4, 1, 0),
(5, 5, NULL, 1),
(6, 6, 1, 0),
(7, 7, NULL, 2),
(8, 8, 1, 0),
(9, 9, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mon_entite`
--

DROP TABLE IF EXISTS `mon_entite`;
CREATE TABLE IF NOT EXISTS `mon_entite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `textAffiche` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `juste` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_theme` int(11) DEFAULT NULL,
  `texte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6F7494E5698C47D` (`fk_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `fk_theme`, `texte`) VALUES
(1, 1, 'Suet home suet'),
(2, 1, 'une qutre question en cours '),
(3, 1, 'sethdedxdthrctjhdg');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_question` int(11) DEFAULT NULL,
  `texte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5FB6DEC784DF0A90` (`fk_question`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id`, `fk_question`, `texte`, `verif`) VALUES
(1, 1, 'reponse  1 ', 1),
(2, 1, 'rponses 2 et plusieurs autres', 0),
(3, 1, '', 0),
(4, 1, '', 0),
(5, 2, 'avec une reponse juste', 1),
(6, 2, '', 0),
(7, 2, '', 0),
(8, 2, '', 0),
(9, 3, 'fgjfhjf yjvf ', 0),
(10, 3, 'jhngvhjn g', 0),
(11, 3, 'vyjhn gvjhn', 1),
(12, 3, 'ghjg vyjh', 0);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id`, `nom`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JS'),
(4, 'PHP');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `evaluation_evaluation`
--
ALTER TABLE `evaluation_evaluation`
  ADD CONSTRAINT `FK_F924E28784DF0A90` FOREIGN KEY (`fk_question`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `FK_F924E287A5B291BE` FOREIGN KEY (`fk_apprenant`) REFERENCES `evaluation_apprenant` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_B6F7494E5698C47D` FOREIGN KEY (`fk_theme`) REFERENCES `theme` (`id`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `FK_5FB6DEC784DF0A90` FOREIGN KEY (`fk_question`) REFERENCES `question` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
