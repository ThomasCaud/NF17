<a href="note/add" class="btn btn-primary">Ajouter une note</a>
<div class="row">
    <div class="col-md-12">
        <h2>Liste des notes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Note</th>
                    <th>Critere utilisé</th>
                    <th>Vin noté</th>
                    <th>Année du vin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($notes as $note): ?>
                    <tr>
                        <td><?= $note['note'] ?></td>
                        <td><?= $note['critere_nom'] ?></td>
                        <td><?= $note['nom'] ?></td>
                        <td><?= $note['annee'] ?></td>
                        <td>
                            <a href="note/edit?vin_nom=<?= $note['vin_nom'] ?>&critere_nom=<?= $note['critere_nom'] ?>&note=<?= $note['note'] ?>">Editer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
