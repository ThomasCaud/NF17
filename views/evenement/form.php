<form method="post">
    <div class="form-group">
      <label >Type</label>
      <input type="text" name="evenement[type]" class="form-control" value="<?= isset($evenement['type']) ? $evenement['type'] : '' ?>">
    </div>

    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>

<?php if ($errors): ?>
<div class="alert alert-danger">
    <?= $errors ? implode($errors, "<br/>") :'' ?>
</div>
<?php endif; ?>   

