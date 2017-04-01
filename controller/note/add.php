<?php

include_once '../app/Connexion.php';
include_once '../app/Entity/Note.php';
include_once '../app/Form.php';

$pdo = Connexion::getConnexion();
$errors = false;
$note = false;

// Si le formulaire est soumit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $_POST['note'];
    $form = new Form($note);
    $form->constraints('note', ['required' => true]);

    $errors = $form->checkForm();

    if (Note::get(['critere_nom' => $note['critere_nom'], 'vin_nom' => $note['vin_nom']])) {
        $errors[] = "Le vin ".$note['vin_nom']." a déjà été noté sur le critère ".$note['critere_nom'];
    }

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO note(note, critere_nom, vin_nom) VALUES (:note, :critere_nom, :vin_nom)');
        try {
            $pdo->beginTransaction();
            $sth->execute(['note' => $note['note'], 'critere_nom' => $note['critere_nom'], 'vin_nom' => $note['vin_nom']]);

            $pdo->commit();

            redirectTo("note/list");

        } catch(PDOException $e) {
            $pdo->rollback();
            $errors[] = "Erreur interne de la BDD";
            throw $e;
        }
    }
}

$vins = $pdo->query('SELECT nom FROM vin')->fetchAll();
$criteres = $pdo->query('SELECT nom FROM critere')->fetchAll();

return [
    'vins'  => $vins,
    'criteres'  => $criteres,
    'errors'   => $errors,
    'note' => $note,
];
?>
