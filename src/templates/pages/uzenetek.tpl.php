<h2 class="mb-4">Beérkezett üzenetek</h2>

<?php if (empty($uzenetek)): ?>
<div class="alert alert-info">Még nem érkezett üzenet.</div>
<?php else: ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead class="table-light">
			<tr>
				<th>Küldés ideje</th>
				<th>Küldő</th>
				<th>Üzenet</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($uzenetek as $uz): ?>
			<tr>
				<td>
					<?= htmlspecialchars($uz['ido']) ?>
				</td>
				<td>
					<?= $uz['felhasznalo'] ?? 'Vendég' ?>
				</td>
				<td>
					<?= nl2br(htmlspecialchars($uz['szoveg'])) ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>
