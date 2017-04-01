<a href="/evenement/add" class="btn btn-primary">Ajouter un type d'évenement</a>
<div class="row">
    <div class="col-md-8">
        <h2>Liste des évenements</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($evenements as $evenement): ?>
                    <tr>
                        <td><?= $evenement['type'] ?></td>
                        <td>
                            <a href="/evenement/edit?type=<?= $evenement['type'] ?>">Editer</a> -
                            <a href="/evenement/delete?type=<?= $evenement['type']?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
