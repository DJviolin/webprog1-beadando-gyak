<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCSRFToken($_POST['csrf_token'] ?? '')) {
        die('Érvénytelen CSRF token!');
    }
}

$hibak = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nev = trim($_POST['nev'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefon = trim($_POST['telefon'] ?? '');
    $fajta = trim($_POST['fajta'] ?? '');
    $mennyiseg = intval($_POST['mennyiseg'] ?? 0);
    $form_uzenet = trim($_POST['uzenet'] ?? '');

    if ($nev === '') $hibak[] = "A név megadása kötelező.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $hibak[] = "Érvénytelen email cím.";
    if ($telefon === '') $hibak[] = "A telefonszám megadása kötelező.";
    if ($fajta === '') $hibak[] = "Válasszon fajtát.";
    if ($mennyiseg < 1) $hibak[] = "A mennyiségnek legalább 1-nek kell lennie.";

    if (count($hibak) === 0) {
        try {
            $dbh = new PDO(
                $APP_CONFIG['db']['dsn'],
                $APP_CONFIG['db']['user'],
                $APP_CONFIG['db']['pass'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            $dbh->query('SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci');

			if (isset($_SESSION['login'])) {
				$stmt = $dbh->prepare(
					"INSERT INTO uzenetek (felhasznalo, nev, email, telefon, fajta, mennyiseg, uzenet)
					VALUES (:felhasznalo, :nev, :email, :telefon, :fajta, :mennyiseg, :uzenet)"
				);
				$stmt->execute([
					':felhasznalo' => $_SESSION['login'],
					':nev' => htmlspecialchars($_SESSION['csn'].' '.$_SESSION['un']),
					':email' => htmlspecialchars($_SESSION['email']) ,
					':telefon' => $telefon,
					':fajta' => $fajta,
					':mennyiseg' => $mennyiseg,
					':uzenet' => $form_uzenet,
				]);
			} else {
				$stmt = $dbh->prepare(
					"INSERT INTO uzenetek (nev, email, telefon, fajta, mennyiseg, uzenet)
					VALUES (:nev, :email, :telefon, :fajta, :mennyiseg, :uzenet)"
				);
				$stmt->execute([
					':nev' => $nev,
					':email' => $email,
					':telefon' => $telefon,
					':fajta' => $fajta,
					':mennyiseg' => $mennyiseg,
					':uzenet' => $form_uzenet,
				]);
			}

			if ($stmt->rowCount()) {
				$uzenet = "Az üzenet küldése sikeres.";
				$uzenet_class = "alert-success";
			} else {
				$uzenet = "Az üzenet küldése nem sikerült.";
				$uzenet_class = "alert-danger";
			}
        } catch (PDOException $e) {
            $hibak[] = "Adatbázis hiba: " . $e->getMessage();
        }
    }
}
?>
