<form method="post">
    <?php foreach ($criteres as $critere): ?>
        <div class="form-group">
          <label><?= $critere['nom'] ?></label>
          <?php foreach ($notes as $note) {
              if ($note['critere_nom'] == $critere['nom']) {
                  $data = $note['note'];
                  break;
              } else {
                  $data = '';
              }
          } ?>
          <input type="number" min="0" max="20" name="note[<?= $critere['nom'] ?>]" value="<?= $data ?>" class="form-control">
        </div>
    <?php endforeach; ?>
    <button type="submit" class="btn btn-primary" name="submit">Noter</button>
</form>
