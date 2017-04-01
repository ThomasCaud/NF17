<?php

include_once '../app/Connexion.php';
include_once '../app/Entity/Critere.php';
include_once '../app/Form.php';

$pdo = Connexion::getConnexion();
$errors = false;

// Si le formulaire est soumit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $critere = $_POST['critere'];
    $form = new Form($critere);
    $form->constraints('nom', ['required' => true]);

    $errors = $form->checkForm();

    if (Critere::get($critere['nom'])) {
        $errors['nom'] = "Le critere ".$critere['nom']." existe déjà";
    }

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO critere(nom) VALUES (:nom)');
        try {
            $pdo->beginTransaction();
            $sth->execute(['nom' => $critere['nom']]);

            $pdo->commit();

            redirectTo("critere/list");

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
