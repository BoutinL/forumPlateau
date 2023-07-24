-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_loic
CREATE DATABASE IF NOT EXISTS `forum_loic` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_loic`;

-- Listage de la structure de table forum_loic. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `typeCategorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_loic.categorie : ~2 rows (environ)
INSERT INTO `categorie` (`id_categorie`, `typeCategorie`) VALUES
	(1, 'Jardinage'),
	(2, 'Développement');

-- Listage de la structure de table forum_loic. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `texteMessage` text NOT NULL,
  `dateCreationMessage` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sujet_id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK-message_sujet` (`sujet_id`),
  KEY `FK-message_utilisateur` (`utilisateur_id`),
  CONSTRAINT `FK-message_sujet` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `FK-message_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_loic.message : ~2 rows (environ)
INSERT INTO `message` (`id_message`, `texteMessage`, `dateCreationMessage`, `sujet_id`, `utilisateur_id`) VALUES
	(1, 'SQL.sh', '2023-07-24 13:30:40', 1, 2),
	(2, 'Arrose la.', '2023-07-24 14:19:36', 2, 1);

-- Listage de la structure de table forum_loic. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int NOT NULL AUTO_INCREMENT,
  `titreSujet` varchar(50) NOT NULL,
  `dateCreationSujet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `VerrouillerSujet` tinyint DEFAULT '0',
  `categorie_id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `id_categorie` (`categorie_id`),
  KEY `FK-sujet_utilisateur` (`utilisateur_id`),
  CONSTRAINT `FK-sujet_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK-sujet_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_loic.sujet : ~4 rows (environ)
INSERT INTO `sujet` (`id_sujet`, `titreSujet`, `dateCreationSujet`, `VerrouillerSujet`, `categorie_id`, `utilisateur_id`) VALUES
	(1, 'Comment faire une requete SQL ?', '2023-07-24 11:48:12', 0, 2, 1),
	(2, 'Comment s\'occuper d\'une plante grasse ?', '2023-07-24 11:49:32', 0, 1, 2),
	(3, 'Meilleur framework ?', '2023-07-24 15:41:07', 0, 2, 1),
	(4, 'Ma plante se meurt', '2023-07-24 15:41:33', 0, 1, 2);

-- Listage de la structure de table forum_loic. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `mailUtilisateur` varchar(50) NOT NULL,
  `pseudoUtilisateur` varchar(50) NOT NULL,
  `mdpUtilisateur` varchar(255) NOT NULL,
  `dateInscriptionUtilisateur` datetime NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_loic.utilisateur : ~2 rows (environ)
INSERT INTO `utilisateur` (`id_utilisateur`, `mailUtilisateur`, `pseudoUtilisateur`, `mdpUtilisateur`, `dateInscriptionUtilisateur`) VALUES
	(1, 'test@test.fr', 'test123', 'Test123', '2023-07-24 11:47:51'),
	(2, 'boutin.loic@hotmail.fr', 'vex', 'vex123', '2023-07-24 11:49:06');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
