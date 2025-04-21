<section>
    <h2 class="text-center mb-4">Törökszegfű fajták</h2>
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
</section>
