<h2>Liste des vins</h2>
<a href="/vin/add" class="btn btn-primary">Ajouter un vin</a>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Note</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($vins as $vin): ?>
            <tr>
                <td><?= $vin['nom'] ?></td>
                <td><?= $vin['prix'] ?> €</td>
                <td><?= $vin['note'] ? $vin['note'] . ' <small>/20</small>' : 'Pas de note' ?></td>
                <td>
                    <a href="#">Editer</a> -
                    <a href="#">Supprimer</a> -
                    <a href="#">Noter</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
