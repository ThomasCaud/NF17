<h2> Liste des requêtes sur l'influences </h2>

<h3> Mode de culture sur le prix des vins </h3>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <td>Prix moyen(€)</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($prixMoyenModeCulture as $resultat): ?>
                    <tr>
                        <td><?= $resultat['modeculture'] ?></td>
                        <td><?= $resultat['prixmoyen'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
