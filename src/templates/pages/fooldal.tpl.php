<div class="container">
	<div class="row">
		<h2 class="mb-4">Üdvözöljük a Törökszegfű Kertészet honlapján!</h2>
		<p>Kertészetünk évek óta kínálja a legszebb virágokat és növényeket. Nézzen körül kínálatunkban, és rendeljen
			egyszerűen űrlapunkon keresztül!</p>
	</div>

	<hr class="my-4">

	<div class="row">
		<h2 class="mb-3">Videós bemutató</h2>
		<div class="col-md-6 mb-3">
			<!-- Add bottom padding 10px -->
			<div class="ratio ratio-16x9">
				<video controls>
					<source src="./videos/2896140-hd_1280_720_24fps_5sec.mp4" type="video/mp4">
					A böngészője nem támogatja a videó lejátszást.
				</video>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="ratio ratio-16x9">
				<iframe
					src="https://www.youtube.com/embed/b8BMeO2bgEc?si=U1J-lVEuYScm3eHR"
					title="YouTube video player"
					frameborder="0"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
					referrerpolicy="strict-origin-when-cross-origin"
					allowfullscreen
				></iframe>
			</div>
		</div>
	</div>

	<hr class="my-4">

	<div class="row">
		<h2 class="mb-3">Rendelhető törökszegfű fajtáink</h2>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead class="table-success">
					<tr>
						<th>Fajta</th>
						<th>Szín</th>
						<th>Magasság</th>
						<th>Virágzás ideje</th>
					</tr>
				</thead>
				<tbody>
					<?php
					try {
						$dbh = new PDO(
							$APP_CONFIG['db']['dsn'],
							$APP_CONFIG['db']['user'],
							$APP_CONFIG['db']['pass']
						);
						$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt = $dbh->query("SELECT fajta, szin, magassag, viragzas FROM keszlet");
						foreach ($stmt as $row) {
							echo "<tr>
								<td>" . htmlspecialchars($row['fajta']) . "</td>
								<td>" . htmlspecialchars($row['szin']) . "</td>
								<td>" . htmlspecialchars($row['magassag']) . "</td>
								<td>" . htmlspecialchars($row['viragzas']) . "</td>
							</tr>";
						}
					} catch (PDOException $e) {
						echo "<tr><td colspan='4'>Adatbázis hiba: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<hr class="my-4">

	<div class="row">
		<h2 class="mb-3">Elérhetőségünk a térképen</h2>
		<div class="ratio ratio-21x9">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11996.159141341803!2d19.604137152319748!3d46.76278214950528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1shu!2shu!4v1745174270725!5m2!1shu!2shu"
				style="border:0;"
				allowfullscreen=""
				loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"
			></iframe>
		</div>
	</div>
</div>
