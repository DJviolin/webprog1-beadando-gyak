<section class="col-md-8 offset-md-2">
    <h2>Megrendelő űrlap</h2>
    <form method="post" action="index.php?oldal=urlap">
        <div class="mb-3">
            <label for="nev" class="form-label">Név:</label>
            <input type="text" id="nev" name="nev" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="mennyiseg" class="form-label">Rendelt mennyiség (db):</label>
            <input type="number" id="mennyiseg" name="mennyiseg" min="1" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="megjegyzes" class="form-label">Megjegyzés:</label>
            <textarea id="megjegyzes" name="megjegyzes" rows="4" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Megrendelés elküldése</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="alert alert-info mt-4">
            <h4>Megrendelés adatai:</h4>
            <ul>
                <li><strong>Név:</strong> <?= htmlspecialchars($_POST['nev']) ?></li>
                <li><strong>E-mail:</strong> <?= htmlspecialchars($_POST['email']) ?></li>
                <li><strong>Mennyiség:</strong> <?= htmlspecialchars($_POST['mennyiseg']) ?> db</li>
                <li><strong>Megjegyzés:</strong> <?= nl2br(htmlspecialchars($_POST['megjegyzes'])) ?></li>
            </ul>
            <p><em>Köszönjük megrendelését!</em></p>
        </div>
    <?php endif; ?>
</section>