<a href="vin/add" class="btn btn-primary">Ajouter un vin</a>
<div class="row">
    <div class="col-md-8">
        <h2>Liste des vins</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Note</th>
                    <th>Année</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vins as $vin): ?>
                    <tr>
                        <td><?= $vin['nom'] ?></td>
                        <td><?= $vin['prix'] ?> €</td>
                        <td><?= $vin['note'] ? $vin['note'] . ' <small>/20</small>' : 'Pas de note' ?></td>
                        <td><?= $vin['annee'] ?></td>
                        <td>
                            <a href="vin/edit?id=<?= $vin['id'] ?>">Editer</a> -
                            <a href="#">Supprimer</a> -
                            <a href="#">Noter</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <h2>Filtres</h2>
        <form method="get">
            <?php foreach ($filtres as $name => $filtre): ?>
                <div class="form-group">
                    <label for=""><?= $filtre['label'] ?></label>
                    <select multiple class="form-control" name="filtre[<?= $name ?>][]">
                        <?php foreach ($filtre['values'] as $value => $selected): ?>
                            <option <?= $selected ? 'selected':'' ?> value="<?= $value ?>"><?= $value ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary" name="filtrer">Filtrer</button>
        </form>
    </div>
</div>
