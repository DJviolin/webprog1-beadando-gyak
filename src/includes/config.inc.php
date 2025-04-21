<?php
$dev_env = getenv('DEV_ENVIRONMENT') === 'true';

$APP_CONFIG = [
	'db' => $dev_env
		? [
			'dsn' => 'mysql:host=mariadb;dbname=webprog1_beadando_gyak;charset=utf8mb4',
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
		'/' => array('fajl' => 'cimlap', 'szoveg' => 'Címlap', 'menun' => array(1,1)),
		'bemutatkozas' => array('fajl' => 'bemutatkozas', 'szoveg' => 'Bemutatkozás', 'menun' => array(1,1)),
		'tablazat' => array('fajl' => 'tablazat', 'szoveg' => 'Táblázat', 'menun' => array(1,1)),
		'urlap' => array('fajl' => 'urlap', 'szoveg' => 'Megrendelés', 'menun' => array(1,1)),
		'galeria' => array('fajl' => 'galeria', 'szoveg' => 'Galéria', 'menun' => array(1,1)),
		'cikkek' => array('fajl' => 'cikkek', 'szoveg' => 'Cikkek', 'menun' => array(1,1)),
		'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
		'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
		'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
		'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
		'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1))
	],
	'hiba_oldal' => array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!')
];
?>
