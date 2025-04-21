<h2 class="mb-4">Lépjen kapcsolatba velünk</h2>

<p>Készítő: <strong>Lanti</strong></p>
<p>E-mail: <strong>webmaster[kukac]lanti.nethely.hu</strong></p>
<p>Ha kérdése van, írjon nekünk az alábbi űrlap segítségével. Minden mező kitöltése kötelező.</p>

<form action="index.php?kapcsolat" method="post" novalidate>
	<div class="mb-3">
		<label for="nev" class="form-label">Név</label>
		<input type="text" class="form-control" id="nev" name="nev" required>
	</div>
	<div class="mb-3">
		<label for="email" class="form-label">E-mail cím</label>
		<input type="email" class="form-control" id="email" name="email" required>
	</div>
	<div class="mb-3">
		<label for="uzenet" class="form-label">Üzenet</label>
		<textarea class="form-control" id="uzenet" name="uzenet" rows="5" required></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Üzenet küldése</button>
</form>
