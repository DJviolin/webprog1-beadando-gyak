<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['kep'])) {
    $target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["kep"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $check = getimagesize($_FILES["kep"]["tmp_name"]);
        if ($check !== false) {
            $unique_name = uniqid('img_', true) . '.' . $imageFileType;
            $target_file = $target_dir . $unique_name;
            if (move_uploaded_file($_FILES["kep"]["tmp_name"], $target_file)) {
                echo "<p>Sikeres feltöltés!</p>";
            } else {
                echo "<p>Hiba történt a fájl mentésekor.</p>";
            }
        } else {
            echo "<p>Ez nem egy valódi kép.</p>";
        }
    } else {
        echo "<p>Csak JPG, PNG vagy GIF képeket tölthetsz fel!</p>";
    }
}
?>

<div id="kepek" class="container">
	<h2 class="mb-4">Képek</h2>

	<?php if (isset($_SESSION['login'])): ?>
		<div class="row mt-4">
			<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
				<div class="row">
					<form action="" method="post" enctype="multipart/form-data" class="mb-4">
						<div class="mb-3">
							<label for="kep" class="form-label">Kép feltöltése</label>
							<input class="form-control" type="file" name="kep" id="kep" accept="image/*" required>
						</div>
						<button type="submit" class="btn btn-primary">Feltöltés</button>
					</form>
				</div>
			<?php else: ?>
				<div class="alert alert-info text-center fw-bold shadow-sm">
					A képfeltöltés csak bejelentkezett "admin" jogosultságú felhasználók számára elérhető.
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="row">
		<p>A képek csak a szerző engedélyével felhasználhatók! Ebbe beletartoznak az automatizált szoftverek is, például crawler-ek (kereső motorok, mesterséges intelligencia) stb.</p>
		<p>Fotók: &copy; <?= 'Copyright '.date("Y").'.' ?> <a href="https://lantosistvan.pixieset.com/">Lantos István</a></p>
	</div>

	<div class="row" data-masonry='{"percentPosition": true }'>
		<?php
		$dir = 'images/';
		$files = array_values(array_diff(scandir($dir), ['.', '..']));
		foreach ($files as $index => $file): ?>
			<div class="col-6 col-md-4 col-lg-3 mb-3">
				<img src="<?= $dir . $file ?>" alt="Kép" class="img-fluid rounded shadow gallery-img" data-index="<?= $index ?>" role="button">
			</div>
		<?php endforeach; ?>
	</div>

	<div id="lightbox" class="d-none position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex align-items-center justify-content-center" style="z-index: 1055;">
		<button class="btn btn-light position-absolute top-0 end-0 m-3" id="closeBtn">&times;</button>
		<button class="btn btn-light position-absolute start-0 ms-3" id="prevBtn">&#10094;</button>
		<img id="lightboxImg" src="" class="img-fluid rounded shadow" style="max-height: 90vh;">
		<button class="btn btn-light position-absolute end-0 me-3" id="nextBtn">&#10095;</button>
	</div>
</div>
