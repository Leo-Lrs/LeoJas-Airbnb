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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- Listage des données de la table airbnb.annonce : ~4 rows (environ)
/*!40000 ALTER TABLE `annonce` DISABLE KEYS */;
INSERT INTO `annonce` (`id`, `idhote`, `nom`, `voyageurs`, `typlogement`, `prix`, `ville`, `addresse`, `codepostal`, `description`, `image`) VALUES
	(63, 2, 'esgesgsesse', 1, 'Appartement', 8489, 'esgseges', 'gessegseg', 151512, 'esgsegesgsdgdsgs', 'background_index.jpg'),
	(68, 3, 'aaaaaa', 1, 'Appartement', 145, 'fezfsefsef', 'fsefesfsefe', 14520, 'dszfsegdes eszfse ferds fge esf se fes', 'chambre1.jpg'),
	(69, 3, 'gegegeg', 4, 'Maison', 45, 'dzdfszedfzqdf', 'dzfzfzsf', 78512, 'fszfzffge ef esh g grd ghrd hjrd hgrd hdr', 'Paysage4.jpg'),
	(70, 2, 'jean', 1, 'Appartement', 80, 'efesfesf', 'efsefesfes', 45120, 'zfzqfzqfzqfzfzqf', 'test.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table airbnb.booking : ~6 rows (environ)
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` (`id`, `idhote`, `startbooking`, `prix`, `endbooking`, `idannonce`, `idreserveur`) VALUES
	(2, 2, '2020-04-23', 76401, '2020-04-26', 63, 4),
	(3, 3, '2020-04-14', 1000, '2020-04-19', 64, 4),
	(4, 2, '2020-04-07', 33956, '2020-04-11', 63, 4),
	(5, 3, '2020-05-14', 400, '2020-05-16', 64, 4),
	(6, 3, '2020-06-10', 2800, '2020-06-17', 64, 4),
	(7, 3, '2020-07-08', 200, '2020-07-09', 64, 4);
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
  `solde` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table airbnb.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nom`, `prenom`, `age`, `mail`, `ville`, `cp`, `accNom`, `pwd`, `tel`, `solde`) VALUES
	(2, 'a', 'a', '2020-04-02', 'aaa', 'dezd', 350, 'aa', 'aa', 45454545, 0),
	(3, 'aa', 'DES', '2020-04-01', 'jason.lalande@outlook.fr', 'TOULOUSE', 31000, 'Jean', 'aa', 680786961, 0),
	(4, 'Jason', 'Jason', '2020-04-02', 'leo.laurens@gmail.com', 'TOULOUSE', 31000, 'aa', 'jj', 680786961, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
