<a href="parcelle/add" class="btn btn-primary">Ajouter une parcelle</a>
<div class="row">
    <div class="col-md-12">
        <h2>Liste des parcelles</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Surface</th>
                    <th>Type Sol</th>
                    <th>Exposition</th>
					<th>Cepage</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($parcelles as $parcelle): ?>
                    <tr>
                        <td><?= $parcelle['nom'] ?></td>
                        <td><?= $parcelle['surface'] ?> hectares</td>
                        <td><?= $parcelle['typesol'] ?></td>
						<td><?= $parcelle['exposition'] ?></td>
						<td><a href="cepage/edit?oldName=<?= $parcelle['cepage_nom'] ?>"><?= $parcelle['cepage_nom'] ?></a></td>
                        <td>
                            <a href="parcelle/edit?nom=<?= $parcelle['nom'] ?>">Editer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
