<?php
include_once '../app/Connexion.php';
include_once '../app/Entity/Evenement.php';

if (!isset($_GET['oldName']) || empty($_GET['oldName'])) {
    return View::render404("Evenement introuvable");
}

$Evenement = Evenement::get($_GET['oldName']);
if (!$evenement) {
    return View::render404("evenement introuvable");
}

$errors = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evenementType = $_POST['evenement'];
    if (!Evenement::update($_GET['oldName'], [
        'type' => $evenementType['type']
    ])) {
        $errors[] = "Erreur interne, impossible de mettre à jour l'evenement";
    } else {
        //header('Location: /evenement/list');
    }
}

return [
    'evenement' => $evenement,
    'errors' => $errors,
];
