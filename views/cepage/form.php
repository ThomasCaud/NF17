<form method="post">
    <div class="form-group">
      <label >Nom</label>
      <input type="text" name="cepage[nom]" class="form-control" value="<?= isset($cepage['nom']) ? $cepage['nom'] : '' ?>">
    </div>

    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>

<?php if ($errors): ?>
<div class="alert alert-danger">
    <?= $errors ? implode($errors, "<br/>") :'' ?>
</div>
<?php endif; ?>