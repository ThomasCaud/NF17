<?php
include_once '../app/Connexion.php';
include_once '../app/Entity/Note.php';

if ((!isset($_GET['critere_nom']) || empty($_GET['critere_nom'])) && (!isset($_GET['vin_id']) || empty($_GET['vin_id']))) {
    return View::render404("critere ou vin utilisé introuvable");
}

$note = Note::get(['critere_nom' => $_GET['critere_nom'], 'vin_id' => $_GET['vin_id']]);

if (!$note) {
    return View::render404("critere ou vin utilisé introuvable");
}

$errors = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noteData = $_POST['note'];
    var_dump($noteData);
    if (!Note::update($_GET['nom'], [
        'note' => $noteData['note'],
        'critere_nom'=> $noteData['critere_nom'],
	    'vin_id'=> $noteData['vin_id']
    ])) {
        $errors[] = "Erreur interne, impossible de mettre à jour la note";
    } else {
        redirectTo("note/list");
    }
}
$pdo = Connexion::getConnexion();
$vins = $pdo->query('SELECT nom FROM vin')->fetchAll();
$criteres = $pdo->query('SELECT nom FROM critere')->fetchAll();
$nomVinModifie = $pdo->query('select nom from vin where id = ' . $note['vin_id'] . ';')->fetchAll();

return [
    'vins'  => $vins,
    'criteres'  => $criteres,
    'errors'   => $errors,
    'note' => $note,
    'nomVinModifie' => $nomVinModifie[0]
];
