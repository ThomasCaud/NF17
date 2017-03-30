<form method="post">
    <div class="form-group">
      <label >Nom</label>
      <input type="text" name="critere[nom]" class="form-control" value="<?= isset($critere['nom']) ? $critere['nom'] : '' ?>">
    </div>

    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>

<?php if ($errors): ?>
<div class="alert alert-danger">
    <?= $errors ? implode($errors, "<br/>") :'' ?>
</div>
<?php endif; ?>   

