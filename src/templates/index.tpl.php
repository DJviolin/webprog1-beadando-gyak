<?php
session_start();
include('./includes/csrf.inc.php');
$csrfToken = generateCSRFToken();
?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $APP_CONFIG['sitename']['cim'] . ( (isset($APP_CONFIG['sitename']['motto'])) ? ('|' . $APP_CONFIG['sitename']['motto']) : '' ) ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>
<body>
	<header id="nav">
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #027800;">
			<div class="container py-2">
				<!-- Logó + szöveg blokk -->
				<a class="navbar-brand d-flex align-items-center" href=".">
					<img src="./assets/img/<?= $APP_CONFIG['logo']['kepforras'] ?>" alt="<?= $APP_CONFIG['logo']['kepalt'] ?>" class="bg-white rounded-circle p-2 me-3" style="width: 64px; height: 64px;">
					<div class="d-flex flex-column">
						<span class="fs-3 m-0"><?= $APP_CONFIG['sitename']['cim'] ?></span>
						<?php if (isset($APP_CONFIG['sitename']['motto'])) { ?>
							<small class="fs-6"><?= $APP_CONFIG['sitename']['motto'] ?></small>
						<?php } ?>
					</div>
				</a>

				<!-- Menü gomb (mobil nézet) -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Menü (összeomló rész) -->
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto">
						<?php foreach ($APP_CONFIG['oldalak'] as $url => $oldal) { ?>
							<?php if ((!isset($_SESSION['login']) && $oldal['menun'][0]) || (isset($_SESSION['login']) && $oldal['menun'][1])) { ?>
								<li class="nav-item">
									<a class="nav-link<?= ($oldal == $keres) ? ' active' : '' ?>"
									<?= ($oldal == $keres) ? 'aria-current="page"' : '' ?>
									href="<?= ($url == '/') ? '.' : $url ?>">
										<?= $oldal['szoveg'] ?>
									</a>
								</li>
							<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<div id="wrapper">
		<div class="container mt-4">
			<?php if (isset($_SESSION['login'])) { ?>
				<div class="alert alert-success text-center fw-bold shadow-sm" role="alert">
					Bejelentkezett: <?= $_SESSION['csn'] . " " . $_SESSION['un'] ?> <span class="text-muted">(<?= $_SESSION['login'] ?>)</span>
				</div>
			<?php } ?>
		</div>

		<div id="content" class="container my-4">
			<?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
		</div>
	</div>

	<footer class="bg-light text-center text-muted py-3 mt-5 border-top small">
		&copy; <?= 'Copyright '.date("Y").'.' ?>
		<?php if(isset($APP_CONFIG['sitename']['cim'])) { ?>
			&nbsp;<?= $APP_CONFIG['sitename']['cim']; ?>
		<?php } ?>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
	<script src="./assets/js/main.js" type="text/javascript"></script>
</body>
</html>
