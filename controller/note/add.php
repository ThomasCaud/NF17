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

    if (Note::get(['critere_nom' => $note['critere_nom'], 'vin_id' => $note['vin_id']])) {
        $errors[] = "Le vin ID: ".$note['vin_id']." a déjà été noté sur le critère ".$note['critere_nom'];
    }

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO note(note, critere_nom, vin_id) VALUES (:note, :critere_nom, :vin_id)');
        try {
            $pdo->beginTransaction();
            $sth->execute(['note' => $note['note'], 'critere_nom' => $note['critere_nom'], 'vin_id' => $note['vin_id']]);

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
