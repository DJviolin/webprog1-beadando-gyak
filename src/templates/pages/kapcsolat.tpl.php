<?php
$fajtakHtml = '';
try {
	$dbh = new PDO(
		$APP_CONFIG['db']['dsn'],
		$APP_CONFIG['db']['user'],
		$APP_CONFIG['db']['pass'],
		array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
	);
	$dbh->query('SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci');
	$stmt = $dbh->query("SELECT fajta FROM keszlet");
	foreach ($stmt as $row) {
		$fajtakHtml .= "<option value=\"" . htmlspecialchars($row['fajta']) . "\">" . htmlspecialchars($row['fajta']) . "</option>";
	}
} catch (PDOException $e) {
	$fajtakHtml = "<option value=\"\">" . htmlspecialchars($e->getMessage()) . "</option>";
}

// Ha be van jelentkezve a felhasználó, állítsuk be az alapértelmezett nevet
$alapertelmezettNev = '';
if (isset($_SESSION['login'])) {
	$alapertelmezettNev = htmlspecialchars($_SESSION['csn'].' '.$_SESSION['un'].' ('.$_SESSION['login'].')');
}
?>

<div class="container">
	<div class="row">
		<h2 class="mb-4">Lépjen kapcsolatba velünk</h2>
		<p>Tulajdonos: <strong>Lanti</strong></p>
		<p>Email: <strong>webmaster[kukac]domain.org</strong></p>
	</div>
</div>

<hr class="my-4">

<?php if (isset($uzenet) && $uzenet): ?>
    <div class="alert <?= $uzenet_class ?> text-center"><?= $uzenet ?></div>
<?php else: ?>
<div id="kapcsolat" class="container mt-4">
  <div class="row">
	<p>Ha rendelni szeretne, írjon nekünk az alábbi űrlap segítségével. A kötelező mezők *-al jelöltek.</p>
    <div class="col-6">
		<form action="kapcsolat" method="post" novalidate>
			<!-- Név -->
			<?php if (isset($_SESSION['login'])): ?>
				<div class="mb-3">
					<label for="nev" class="form-label fw-bold">Teljes név (bejelentkezett felhasználó)</label>
					<input type="text" class="form-control" id="nev" name="nev"
						value="<?php echo htmlspecialchars($_SESSION['csn'] . ' ' . $_SESSION['un']); ?>" readonly>
				</div>
			<?php else: ?>
				<div class="mb-3">
					<label for="nev" class="form-label fw-bold">*Név</label>
					<input type="text" class="form-control" id="nev" name="nev" required>
				</div>
			<?php endif; ?>
			<!-- Email cím -->
			<?php if (isset($_SESSION['email'])): ?>
				<div class="mb-3">
					<label for="email" class="form-label fw-bold">Email (bejelentkezett felhasználó)</label>
					<input type="email" class="form-control" id="email" name="email"
						value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly>
				</div>
			<?php else: ?>
				<div class="mb-3">
					<label for="email" class="form-label fw-bold">*Email cím</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>
			<?php endif; ?>
			<!-- Telefon -->
			<div class="mb-3">
				<label for="telefon" class="form-label fw-bold">*Telefon</label>
				<input type="tel" class="form-control" id="telefon" name="telefon" required>
			</div>
			<!-- Törökszegfű fajta -->
			<div class="mb-3">
				<label for="fajta" class="form-label fw-bold">*Törökszegfű fajta</label>
				<select class="form-control" id="fajta" name="fajta" required>
					<option value="">Válasszon</option>
					<?php echo $fajtakHtml; ?>
				</select>
			</div>
			<!-- Mennyiség -->
			<div class="mb-3">
				<label for="mennyiseg" class="form-label fw-bold">*Mennyiség (db)</label>
				<input type="number" class="form-control" id="mennyiseg" name="mennyiseg" min="1" required>
			</div>
			<!-- Üzenet -->
			<div class="mb-3">
				<label for="uzenet" class="form-label fw-bold">Üzenet</label>
				<textarea class="form-control" id="uzenet" name="uzenet" rows="5"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Üzenet küldése</button>
		</form>
	</div>
</div>
<?php endif; ?>
