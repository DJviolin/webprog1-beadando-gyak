<?php
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
    $uzenetek = [];
    try {
        $dbh = new PDO(
            $APP_CONFIG['db']['dsn'],
            $APP_CONFIG['db']['user'],
            $APP_CONFIG['db']['pass'],
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
        $dbh->query('SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci');
        if ($_SESSION['role'] === 'admin') {
            // Admin minden üzenetet lát
            $sth = $dbh->query("SELECT * FROM uzenetek ORDER BY kuldes_ideje DESC");
        } else {
            // Felhasználó csak a sajátját látja
            $sth = $dbh->prepare("SELECT * FROM uzenetek WHERE felhasznalo = :felhasznalo ORDER BY kuldes_ideje DESC");
            $sth->execute([':felhasznalo' => $_SESSION['login']]);
        }
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenetek[] = $row;
        }
    } catch (PDOException $e) {
        $uzenet = "Hiba: " . $e->getMessage();
    }
} else {
    header("Location: .");
}
?>

<div class="container">
	<div class="row">
		<?php if (isset($_SESSION['login'])): ?>
			<h2 class="mb-4">Beérkezett üzenetek</h2>
			<?php if (empty($uzenetek)): ?>
				<div class="alert alert-info">Még nem érkezett üzenet.</div>
			<?php else: ?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead class="table-light">
							<tr>
								<th>Küldés ideje</th>
								<th>Teljes név</th>
								<th>Felhasználónév</th>
								<th>Email cím</th>
								<th>Telefonszám</th>
								<th>Törökszegfű fajta</th>
								<th>Mennyiség (db)</th>
								<th>Üzenet</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($uzenetek as $uz): ?>
								<tr>
									<td><?= htmlspecialchars($uz['kuldes_ideje']) ?></td>
									<td><?= $uz['felhasznalo'] ?? 'Vendég' ?></td>
									<td><?= htmlspecialchars($uz['nev']) ?></td>
									<td><a href="mailto:<?= htmlspecialchars($uz['email']) ?>"><?= htmlspecialchars($uz['email']) ?></a></td>
									<td><?= htmlspecialchars($uz['telefon']) ?></td>
									<td><?= htmlspecialchars($uz['fajta']) ?></td>
									<td><?= htmlspecialchars($uz['mennyiseg']) ?></td>
									<td><?= nl2br(htmlspecialchars($uz['uzenet'])) ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<div class="alert alert-info text-center fw-bold shadow-sm">
				Az üzenetek olvasása csak bejelentkezett felhasználók számára elérhető.
			</div>
		<?php endif; ?>
	</div>
</div>
