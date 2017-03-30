<h2> Liste des requêtes sur l'influences </h2>

<h3> Mode de culture sur le prix des vins </h3>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix moyen(€)</th>
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

<h3> Evenement climatique sur le prix des vins </h3>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Evenement climatique</th>
                    <th>Prix moyen(€)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($prixMoyenEventClimatique as $resultat): ?>
                    <tr>
                        <td><?= $resultat['type'] ?></td>
                        <td><?= $resultat['prixmoyen'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
