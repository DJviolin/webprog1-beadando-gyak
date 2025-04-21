<div class="container-md mx-auto">
	<div class="row">
		<div class="col-md-6 mb-3">
			<h2 class="mb-4">Bejelentkezés</h2>
			<form action="belep" method="post" class="mb-5">
				<div class="mb-3">
					<label for="felhasznalo" class="form-label">Felhasználónév</label>
					<input type="text" class="form-control" id="felhasznalo" name="felhasznalo" required>
				</div>
				<div class="mb-3">
					<label for="jelszo" class="form-label">Jelszó</label>
					<input type="password" class="form-control" id="jelszo" name="jelszo" required>
				</div>
				<button type="submit" name="belepes" class="btn btn-primary">Bejelentkezés</button>
			</form>
		</div>
		<div class="col-md-6 mb-3">
			<h2 class="mb-4">Regisztráció</h2>
			<form action="regisztral" method="post">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="vezeteknev" class="form-label">Vezetéknév</label>
						<input type="text" class="form-control" id="vezeteknev" name="vezeteknev" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="utonev" class="form-label">Keresztnév</label>
						<input type="text" class="form-control" id="utonev" name="utonev" required>
					</div>
				</div>
				<div class="mb-3">
					<label for="felhasznalo" class="form-label">Felhasználónév</label>
					<input type="text" class="form-control" id="felhasznalo" name="felhasznalo" required>
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email cím</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>
				<div class="mb-3">
					<label for="jelszo" class="form-label">Jelszó</label>
					<input type="password" class="form-control" id="jelszo" name="jelszo" required>
				</div>
				<div class="mb-3">
					<label for="jelszo2" class="form-label">Jelszó ismét</label>
					<input type="password" class="form-control" id="jelszo2" name="jelszo2" required>
				</div>
				<button type="submit" name="regisztracio" class="btn btn-primary">Regisztráció</button>
			</form>
		</div>
	</div>
</div>
