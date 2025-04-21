<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        // Kapcsolódás
		$dbh = new PDO(
			$APP_CONFIG['db']['dsn'],
			$APP_CONFIG['db']['user'],
			$APP_CONFIG['db']['pass'],
			array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
		);
		$dbh->query('SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci');

        // Felhsználó keresése
        $sqlSelect = "select id, role, email, csaladi_nev, uto_nev from felhasznalok where felhasznalo = :felhasznalo and jelszo = sha1(:jelszo)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':felhasznalo' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
			$_SESSION['role'] = $row['role'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['login'] = $_POST['felhasznalo'];
            $_SESSION['csn'] = $row['csaladi_nev'];
			$_SESSION['un'] = $row['uto_nev'];
        }
    } catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }
} else {
    header("Location: .");
}
?>
