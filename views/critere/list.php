<a href="critere/add" class="btn btn-primary">Ajouter un critere</a>
<div class="row">
    <div class="col-md-8">
        <h2>Liste des criteres</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($criteres as $critere): ?>
                    <tr>
                        <td><?= $critere['nom'] ?></td>
                        <td>
                            <a href="critere/edit?oldName=<?= $critere['nom'] ?>">Editer</a> -
                            <a href="critere/delete?oldName=<?= $critere['nom']?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
