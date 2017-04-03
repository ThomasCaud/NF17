<?php include_once '../app/View.php'; ?>
<form method="post">
    <div class="form-group">
      <label >Nom</label>
      <input type="text" name="vin[nom]" class="form-control" value="<?= isset($vin['nom']) ? $vin['nom'] : '' ?>">
    </div>

    <div class="form-group">
      <label>Prix</label>
      <input type="text" name="vin[prix]" class="form-control" value="<?= isset($vin['prix']) ? $vin['prix'] : '' ?>">
    </div>
    <div class="form-group">
      <label>Année</label>
      <input type="text" name="vin[annee]" class="form-control" value="<?= isset($vin['annee']) ? $vin['annee'] : '' ?>">
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="cepage">Assemblage de cépages</label>
            <?php foreach ($vin['cepage'] as $key => $cepage): ?>
                <div class="form-group row" id="cepage">
                    <div class="col-md-10">
                        <div class="form-group">
                            <?= View::renderSelect(
                            "vin[cepage][$key][nom]",
                            $cepage['nom'].";".$cepage['annee'],
                            array_map(function($exploitation) {
                                return [$exploitation['parcelle_nom'].';'.$exploitation['annee'], $exploitation['cepage_nom'].' - '.$exploitation['annee']];
                            }, $exploitations)
                        ); ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <input type="number" class="form-control" name="vin[cepage][<?= $key ?>][pourcentage]" max="100" min="1" value="<?= $cepage['pourcentage'] ?>">
                        <span class="input-group-addon">%</span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-12">
            <button type="button" onclick="addCepage();" class="btn btn-primary pull-right">Ajouter un cépage</button>
        </div>
        <div class="col-md-12">
            <?php if ($errors): ?>
                <div class="alert alert-danger">
                    <?= implode($errors, "<br/>") ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </div>
    </div>

    <script type="text/javascript">
        var i = 1;
        var addCepage = function() {
            var template = document.getElementById('cepage');
            var newEl = template.cloneNode(true);
            newEl.children[0].children[0].children[0].name = 'vin[cepage]['+i+'][nom]';
            newEl.children[1].children[0].children[0].name = 'vin[cepage]['+i+'][pourcentage]';
            template.parentElement.appendChild(newEl);
            i++;
        }
    </script>
</form>
