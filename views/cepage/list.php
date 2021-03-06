<a href="cepage/add" class="btn btn-primary">Ajouter un cepage</a>
<div class="row">
    <div class="col-md-8">
        <h2>Liste des cepages</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cepages as $cepage): ?>
                    <tr>
                        <td><?= $cepage['nom'] ?></td>
                        <td>
                            <a href="cepage/edit?oldName=<?= $cepage['nom'] ?>">Editer</a> -
                            <a href="cepage/delete?oldName=<?= $cepage['nom']?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
