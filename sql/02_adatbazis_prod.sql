USE `lanti_adatb1`;

DROP TABLE IF EXISTS `felhasznalok`;
CREATE TABLE `felhasznalok` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` ENUM('admin', 'user') NOT NULL DEFAULT 'user',
  `felhasznalo` varchar(12) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `uto_nev` varchar(45) NOT NULL DEFAULT '',
  `jelszo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO `felhasznalok` (`role`, `felhasznalo`, `email`, `csaladi_nev`, `uto_nev`, `jelszo`) VALUES
('admin', 'Admin', 'admin@domain.org', 'Teszt', 'Admin', sha1('Admin')),
('user', 'User1', 'user1@domain.org', 'Teszt', 'User_1', sha1('User1')),
('user', 'User2', 'user2@domain.org', 'Teszt', 'User_2', sha1('User2'));

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

DROP TABLE IF EXISTS `uzenetek`;
CREATE TABLE `uzenetek` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `felhasznalo` varchar(12),
  `nev` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `fajta` varchar(100) NOT NULL,
  `mennyiseg` int(10) unsigned NOT NULL,
  `uzenet` text,
  `kuldes_ideje` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO `uzenetek` (`felhasznalo`, `nev`, `email`, `telefon`, `fajta`, `mennyiseg`, `uzenet`) VALUES
('User1', 'Teszt User_1', 'email1@domain.org', '+36123456789', 'Sweet Black Cherry (Dianthus Barbatus)', 100, NULL),
(NULL, 'Teszt Vendég', 'email2@domain.org', '+36223456789', 'Amazon Neon Cherry (Dianthus Barbatus)', 300, 'Második üzenet.');
