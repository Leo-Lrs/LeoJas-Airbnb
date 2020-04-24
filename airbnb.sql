-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour airbnb
CREATE DATABASE IF NOT EXISTS `airbnb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `airbnb`;

-- Listage de la structure de la table airbnb. annonce
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idhote` int(11) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `voyageurs` int(10) DEFAULT NULL,
  `typlogement` varchar(20) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `addresse` varchar(25) DEFAULT NULL,
  `codepostal` int(5) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

-- Listage des données de la table airbnb.annonce : ~7 rows (environ)
/*!40000 ALTER TABLE `annonce` DISABLE KEYS */;
INSERT INTO `annonce` (`id`, `idhote`, `nom`, `voyageurs`, `typlogement`, `prix`, `ville`, `addresse`, `codepostal`, `description`, `image`) VALUES
	(76, 4, 'Maison de plein Pied', 5, 'Maison', 60, 'Biarritz', '25 rue des Hortensia', 64200, 'Maison chaleureuse, non loin de la plage, elle reste l\'emplacement idéal pour des vacances', 'maison1.jpg'),
	(77, 4, 'Maison de Type Boisé', 4, 'Maison', 55, 'Lyon', '145 Bis Rue des Lilas', 69000, 'Maison atypique, induisant boiserie et convivialité !', 'maison4.jpg'),
	(78, 5, 'Château Antique', 5, 'Chambre d\'hôtes', 70, 'Launac', '1 Chemin des Echapés', 31330, 'Château perché sur des hauteurs. RAS  !', 'maison3.jpg'),
	(79, 5, 'Maison Diforme', 3, 'Maison', 58, 'Royan', '22 Rue Alsace Terier', 17200, 'Maison aux formes plutôt douteuses ! ;)', 'maison2.jpg'),
	(80, 6, 'Longère Bretonne', 3, 'Maison', 45, 'Ile De Groix', '9 rue dranveur', 56590, 'Longère bretonne, typique du coin ', 'maison5.jpg'),
	(81, 6, 'Maison Reculée.. ', 2, 'Maison', 42, 'Santo-Pietro-di-Venaco', '2 Chemin du Maquis', 20250, 'Maison reculée au sein de la forêt Corse ', 'maison7.jpg'),
	(82, 6, 'Appt HyperCentre', 2, 'Appartement', 60, 'Montmartre ', '13 Allée des Missteux', 75018, 'Appartement Hyper-centre, chaleureux.', 'appartement.jpg');
/*!40000 ALTER TABLE `annonce` ENABLE KEYS */;

-- Listage de la structure de la table airbnb. booking
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idhote` int(11) DEFAULT NULL,
  `startbooking` date DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `endbooking` date DEFAULT NULL,
  `idannonce` int(11) DEFAULT NULL,
  `idreserveur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idannonce` (`idannonce`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- Listage des données de la table airbnb.booking : ~0 rows (environ)
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;

-- Listage de la structure de la table airbnb. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `accNom` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `tel` int(50) DEFAULT NULL,
  `image` longtext,
  `solde` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table airbnb.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nom`, `prenom`, `age`, `mail`, `ville`, `cp`, `accNom`, `pwd`, `tel`, `image`, `solde`) VALUES
	(4, 'DURAND', 'Jean', '1997-02-05', 'Jean.DURAND@gmail.com', 'Marseille', 13000, 'User1', 'Passw0rd', 584755212, 'MSN.jpg', 0),
	(5, 'LAURENS', 'Leo', '1996-06-06', 'leo.laurens@gmail.com', 'Pau', 64000, 'User2', 'Passw0rd', 685696243, 'leo.jpg', 0),
	(6, 'LALANDE', 'Jason', '1996-07-31', 'jason.lalande@outlook.fr', 'Toulouse', 31000, 'User3', 'Passw0rd', 680786961, 'moi2.png', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
