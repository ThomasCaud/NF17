<?php

include '../app/Connexion.php';
include '../app/Entity/Cepage.php';
include '../app/Form.php';
include '../app/Config.php';

$pdo = Connexion::getConnexion();
$errors = false;

// Si le formulaire est soumit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cepage = $_POST['cepage'];
    $form = new Form($cepage);
    $form->constraints('nom', ['required' => true]);

    $errors = $form->checkForm();

    if (Cepage::get($cepage['nom'])) {
        $errors['nom'] = "Le cepage ".$cepage['nom']." existe déjà";
    }

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO cepage(nom) VALUES (:nom)');
        try {
            $pdo->beginTransaction();
            $sth->execute(['nom' => $cepage['nom']]);

            $pdo->commit();

            redirectTo("cepage/list");

        } catch(PDOException $e) {
            $pdo->rollback();
            $errors[] = "Erreur interne de la BDD";
        }
    }
}

return [
    'errors'    => $errors
];
?>
