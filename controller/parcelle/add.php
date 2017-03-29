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
    $form->constraints('taille', ['required' => true]);

    $errors = $form->checkForm();

    if (Parcelle::get($parcelle['nom'])) {
        $errors['nom'] = "La parcelle ".$parcelle['nom']." existe déjà";
    }

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO parcelle(nom, surface, typesol, exposition, cepage_nom) VALUES (:nom, :taille, :sol, :exposition, :cepage)');
        try {
            $pdo->beginTransaction();
            $sth->execute(['nom' => $parcelle['nom'], 'taille' => $parcelle['taille'], 'sol' => $parcelle['sol'], 'exposition' => $parcelle['exposition'], 'cepage' => $parcelle['cepage']]);

            $pdo->commit();

            header('Location: /parcelle/list');

        } catch(PDOException $e) {
            $pdo->rollback();
            $errors[] = "Erreur interne de la BDD";
            throw $e;
        }
    }
}

$cepage = $pdo->query('SELECT * FROM cepage')->fetchAll();

return [
    'cepage' => $cepage,
    'errors'    => $errors,
    'parcelle'       => $parcelle,
];
?>
