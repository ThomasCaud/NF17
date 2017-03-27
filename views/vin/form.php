<form method="post">
    <div class="form-group">
      <label >Nom</label>
      <input type="text" name="vin[nom]" class="form-control">
    </div>

    <div class="form-group">
      <label>Prix</label>
      <input type="text" name="vin[prix]" class="form-control">
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="cepage">Cépage</label>
            <div class="form-group row" id="cepage">
                <div class="col-md-10">
                    <div class="form-group">
                        <select class="form-control" name="vin[cepage][0][nom]">
                            <?php foreach ($exploitations as $exploitation): ?>
                                <option value="<?= $exploitation['parcelle_nom'].';'.$exploitation['annee'] ?>"><?= $exploitation['cepage_nom'].' - '.$exploitation['annee'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <input type="number" class="form-control" name="vin[cepage][0][pourcentage]" max="100" min="1" value="">
                        <span class="input-group-addon">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary">Ajouter un cépage</button>
    <?php if ($errors): ?>
    <div class="alert alert-danger">
        <?= $errors ? implode($errors, "<br/>") :'' ?>
    </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>
