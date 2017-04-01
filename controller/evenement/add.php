<?php

include_once '../app/Connexion.php';
include_once '../app/Entity/Evenement.php';
include_once '../app/Form.php';

$pdo = Connexion::getConnexion();
$errors = false;

// Si le formulaire est soumit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evenement = $_POST['evenement'];
    $form = new Form($evenement);
    $form->constraints('type', ['required' => true]);

    $errors = $form->checkForm();

    if (Evenement::get($evenement['type'])) {
        $errors['type'] = "L'evenement ".$evenement['type']." existe déjà";
    }

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO evenement(type) VALUES (:type)');
        try {
            $pdo->beginTransaction();
            $sth->execute(['type' => $evenement['type']]);

            $pdo->commit();

            redirectTo("evenement/list");

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
