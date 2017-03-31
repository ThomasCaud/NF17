<h2> Liste des requêtes sur l'influences </h2>

<h3> Modes de culture</h3>

<h4> sur le prix du vin </h4>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Mode de culture</th>
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

<h4> sur la qualité du vin </h4>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Mode de culture</th>
                    <th>Qualité moyenne(/20)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($noteMoyenneModeCulture as $resultat): ?>
                    <tr>
                        <td><?= $resultat['modeculture'] ?></td>
                        <td><?= $resultat['notemoyenne'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<h3> Evenements climatiques </h3>
<h4> sur le prix du vin </h4>
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

<h3> Traitements phytosanitaires </h3>
<h4> sur la qualité du vin </h4>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Traitement phytosanitaire</th>
                    <th>Qualité moyenne(/20)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($noteMoyenneTraitement as $resultat): ?>
                    <tr>
                        <td><?= $resultat['nom'] ?></td>
                        <td><?= $resultat['notemoyenne'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<h3> Exposition </h3>
<h4> sur la qualité du vin </h4>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Type d'exposition</th>
                    <th>Qualité moyenne(/20)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($noteMoyenneExposition as $resultat): ?>
                    <tr>
                        <td><?= $resultat['exposition'] ?></td>
                        <td><?= $resultat['notemoyenne'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<h3> Année </h3>
<h4> sur la qualité du vin </h4>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Année</th>
                    <th>Qualité moyenne(/20)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($noteMoyenneSelonAnnee as $resultat): ?>
                    <tr>
                        <td><?= $resultat['annee'] ?></td>
                        <td><?= $resultat['notemoyenne'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>