CREATE DATABASE IF NOT EXISTS `webprog1_beadando_gyak`
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `webprog1_beadando_gyak`;

DROP TABLE IF EXISTS `felhasznalok`;
CREATE TABLE `felhasznalok` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` ENUM('admin', 'user') NOT NULL DEFAULT 'user',
  `felhasznalo` varchar(12) NOT NULL DEFAULT '',
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `uto_nev` varchar(45) NOT NULL DEFAULT '',
  `jelszo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO `felhasznalok` (`role`, `felhasznalo`, `csaladi_nev`, `uto_nev`, `jelszo`) VALUES
('admin', 'Admin', 'Teszt', 'Admin', sha1('Admin')),
('user', 'User1', 'Teszt', 'User_1', sha1('User1')),
('user', 'User2', 'Teszt', 'User_2', sha1('User2'));

DROP TABLE IF EXISTS `keszlet`;
CREATE TABLE `keszlet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fajta` varchar(100) NOT NULL,
  `szin` varchar(50) NOT NULL,
  `magassag` varchar(50) NOT NULL,
  `viragzas` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO `keszlet` (`fajta`, `szin`, `magassag`, `viragzas`) VALUES
('Amazon Neon Cherry (Dianthus Barbatus)', 'Bíbor', '40 cm', 'Május - Július'),
('Sweet Black Cherry (Dianthus Barbatus)', 'Sötét vörös', '45 cm', 'Május - Június'),
('Sweet Deep Pink Maxine (Dianthus Barbatus)', 'Rózsaszín', '50 cm', 'Június - Július');
