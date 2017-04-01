<?php

include '../app/Connexion.php';
include '../app/Entity/Parcelle.php';
include '../app/Form.php';

$pdo = Connexion::getConnexion();
$errors = false;
$parcelle = false;

// Si le formulaire est soumit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parcelle = $_POST['parcelle'];
    $form = new Form($parcelle);
    $form->constraints('nom', ['required' => true]);
    $form->constraints('surface', ['required' => true]);

    $errors = $form->checkForm();

    if (Parcelle::get($parcelle['nom'])) {
        $errors['nom'] = "La parcelle ".$parcelle['nom']." existe déjà";
    }

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO parcelle(nom, surface, typesol, exposition, cepage_nom) VALUES (:nom, :surface, :sol, :exposition, :cepage)');
        try {
            $pdo->beginTransaction();
            $sth->execute(['nom' => $parcelle['nom'], 'surface' => $parcelle['surface'], 'sol' => $parcelle['sol'], 'exposition' => $parcelle['exposition'], 'cepage' => $parcelle['cepage']]);

            $pdo->commit();

            redirectTo("parcelle/list");

        } catch(PDOException $e) {
            $pdo->rollback();
            $errors[] = "Erreur interne de la BDD";
            throw $e;
        }
    }
}

$cepages = $pdo->query('SELECT * FROM cepage')->fetchAll();

return [
    'cepages'  => $cepages,
    'errors'   => $errors,
    'parcelle' => $parcelle,
];
?>
