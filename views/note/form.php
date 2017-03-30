<form method="post">

    <div class="row">
        <div class="col-md-12">
            <label for="vin">Vin</label>
            <div class="form-group row" id="vin">
                <div class="col-md-10">
                    <div class="form-group">
                        <select class="form-control" name="note[vin_nom]">
                            <?php foreach ($vins as $vin): ?>
                                <option value="<?= $vin['nom'] ?>"><?= $vin['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="critere">Critere</label>
            <div class="form-group row" id="critere">
                <div class="col-md-10">
                    <div class="form-group">
                        <select class="form-control" name="note[critere_nom]" value="Couleur">
                            <?php foreach ($criteres as $critere): ?>
                                <option value="<?= $critere['nom'] ?>"><?= $critere['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
      <label>Note</label>
      <input type="number" class="form-control" name="note[note]" max="20" min="0" value="<?= isset($note['note']) ? $note['note'] : '' ?>">
    </div>

    <?php if ($errors): ?>
    <div class="alert alert-danger">
        <?= $errors ? implode($errors, "<br/>") :'' ?>
    </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>
