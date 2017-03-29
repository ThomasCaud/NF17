<form method="post">
    <div class="form-group">
      <label >Nom</label>
      <input type="text" name="parcelle[nom]" class="form-control" value="<?= isset($parcelle['nom']) ? $parcelle['nom'] : '' ?>">
    </div>

    <div class="form-group">
      <label>Taille</label>
      <input type="number" name="parcelle[taille]" class="form-control" value="<?= isset($parcelle['taille']) ? $parcelle['taille'] : '' ?>">
    </div>

    <div class="row">
	<div class="col-md-12">
	      <label for="sol">Sol</label>
		    <div class="form-group row" id="sol">
		        <div class="col-md-10">
		            <div class="form-group">
		                <select class="form-control" name="parcelle[sol]">
		                     <option value="Calcaire">Calcaire</option>
                             <option value="Argileux">Argileux</option>
                             <option value="Crayeux">Crayeux</option>
                             <option value="Marneux">Marneux</option>    
		                </select>
		            </div>
		        </div>
		    </div>
	    </div>
    </div>

<div class="row">
	<div class="col-md-12">
	      <label for="exposition">Exposition</label>
		    <div class="form-group row" id="exposition">
		        <div class="col-md-10">
		            <div class="form-group">
		                <select class="form-control" name="parcelle[exposition]">
		                     <option value="Normal">Normal</option>
                             <option value="Pluvieux">Pluvieux</option>
                             <option value="Ensoleillé">Ensoleillé</option>
                             <option value="Venteux">Venteux</option>      
		                </select>
		            </div>
		        </div>
		    </div>
	    </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="cepage">Cépage</label>
            <div class="form-group row" id="cepage">
                <div class="col-md-10">
                    <div class="form-group">
                        <select class="form-control" name="parcelle[cepage]">
                            <?php foreach ($cepage as $cepage): ?>
                                <option value="<?= $cepage['nom'] ?>"><?= $cepage['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>
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
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>