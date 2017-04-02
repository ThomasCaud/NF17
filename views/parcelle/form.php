<?php include_once '../app/View.php'; ?>
<form method="post">
    <div class="form-group">
      <label >Nom</label>
      <input type="text" name="parcelle[nom]" class="form-control" value="<?= isset($parcelle['nom']) ? $parcelle['nom'] : '' ?>">
    </div>

    <div class="form-group">
      <label>surface</label>
      <input type="number" name="parcelle[surface]" class="form-control" value="<?= isset($parcelle['surface']) ? $parcelle['surface'] : '' ?>">
    </div>

    <div class="row">
	<div class="col-md-12">
	      <label for="sol">Sol</label>
		    <div class="form-group row" id="sol">
		        <div class="col-md-12">
		            <div class="form-group">
                        <?= View::renderSelect(
                            'parcelle[sol]',
                            $parcelle['typesol'],
                            [
                                "Calcaire",
                                "Argileux",
                                "Crayeux",
                                "Marneux",
                            ]
                        ); ?>
		            </div>
		        </div>
		    </div>
	    </div>
    </div>

<div class="row">
	<div class="col-md-12">
	      <label for="exposition">Exposition</label>
		    <div class="form-group row" id="exposition">
		        <div class="col-md-12">
		            <div class="form-group">
                        <div class="form-group">
                            <?= View::renderSelect(
                                'parcelle[exposition]',
                                $parcelle['exposition'],
                                [
                                    "Normal",
                                    "Pluvieux",
                                    "Ensoleille",
                                    "Venteux",
                                ]
                            ); ?>
                        </div>
		            </div>
		        </div>
		    </div>
	    </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="cepage">Cépage</label>
            <div class="form-group row" id="cepage">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= View::renderSelect(
                            'parcelle[cepage]',
                            $parcelle['cepage_nom'],
                            array_column($cepages, 'nom')
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($errors): ?>
    <div class="alert alert-danger">
        <?= $errors ? implode($errors, "<br/>") :'' ?>
    </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>
