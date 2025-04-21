<?php
$dev_env = getenv('DEV_ENVIRONMENT') === 'true';

$APP_CONFIG = [
	'db' => $dev_env
		? [
			'dsn' => 'mysql:host=mariadb;dbname=lanti_adatb1;charset=utf8mb4',
			'user' => 'root',
			'pass' => 'secret'
		]
		: [
			'dsn' => 'mysql:host=localhost;dbname=lanti_adatb1;charset=utf8mb4',
			'user' => 'lanti_adatb1',
			'pass' => 'webprog1'
		],
	'sitename' => [
		'cim' => 'Törökszegfű kertészet',
		'motto' => 'Friss virág mindenkinek!'
	],
	'logo' => [
		'kepforras' => 'logo.svg',
		'kepalt' => 'Cégünk logója'
	],
	'oldalak' => [
		'/' => array('fajl' => 'fooldal', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
		'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1,1)),
		'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
		'uzenetek' => array('fajl' => 'uzenetek', 'szoveg' => 'Üzenetek', 'menun' => array(0,1)),
		'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
		'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
		'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
		'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1))
	],
	'hiba_oldal' => array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!')
];
?>
