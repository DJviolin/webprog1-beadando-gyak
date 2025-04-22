<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCSRFToken($_POST['csrf_token'] ?? '')) {
        die('Érvénytelen CSRF token!');
    }
}

if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    try {
        // Kapcsolódás
		$dbh = new PDO(
			$APP_CONFIG['db']['dsn'],
			$APP_CONFIG['db']['user'],
			$APP_CONFIG['db']['pass'],
		    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
		);
		$dbh->query('SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci');

        // Létezik már a felhasználói név?
        $sqlSelect = "select id from felhasznalok where felhasznalo = :felhasznalo";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':felhasznalo' => $_POST['felhasznalo']));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználói név már foglalt!";
            $ujra = "true";
        } else {
            // Ha nem létezik, akkor regisztráljuk
            $sqlInsert = "insert into felhasznalok(id, felhasznalo, email, csaladi_nev, uto_nev, jelszo)
                          values(0, :felhasznalo, :email, :csaladinev, :utonev, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
				':felhasznalo' => $_POST['felhasznalo'],
				':email' => $_POST['email'],
				':csaladinev' => $_POST['vezeteknev'],
				':utonev' => $_POST['utonev'],
				':jelszo' => sha1($_POST['jelszo']))
			);
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A regisztrációja sikeres.";
                $ujra = false;
				$tovabb = true;
            } else {
                $uzenet = "A regisztráció nem sikerült.";
                $ujra = true;
            }
        }
    } catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }
} else {
    header("Location: .");
}
?>
