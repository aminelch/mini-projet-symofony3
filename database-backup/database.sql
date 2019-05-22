-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `hopital`;
CREATE TABLE `hopital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomHopital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresseHopital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeHopital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8718F2CBE30CE64` (`nomHopital`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hopital` (`id`, `nomHopital`, `adresseHopital`, `typeHopital`) VALUES
(1,	'Sionville',	'mrezga-Nabeul 8050',	'gènérale'),
(3,	'Hopital Tunis',	'Tunis',	'Universitaire');

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE `medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hopital_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `experience` int(11) NOT NULL,
  `dateEmbauche` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1BDA53C6CC0FBF92` (`hopital_id`),
  CONSTRAINT `FK_1BDA53C6CC0FBF92` FOREIGN KEY (`hopital_id`) REFERENCES `hopital` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `medecin` (`id`, `hopital_id`, `nom`, `prenom`, `profession`, `experience`, `dateEmbauche`) VALUES
(1,	1,	'amine',	'lch',	'general',	8,	'2019-05-15 05:04:55'),
(3,	3,	'Zied ',	'ben Hdira',	'Chirurgien',	9,	'2019-05-16 00:49:14'),
(5,	3,	'Zienb',	'Ben hmid',	'Cardiologue',	4,	'2019-05-16 00:51:10'),
(6,	3,	'aa',	'aaa',	'aa',	2,	'2019-05-16 00:52:19');

-- 2019-05-22 01:34:58
