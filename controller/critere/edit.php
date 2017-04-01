<?php
include_once '../app/Connexion.php';
include_once '../app/Entity/Critere.php';

if (!isset($_GET['oldName']) || empty($_GET['oldName'])) {
    return View::render404("Critere introuvable");
}

$critere = Critere::get($_GET['oldName']);
if (!$critere) {
    return View::render404("critere introuvable");
}

$errors = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $critereName = $_POST['critere'];
    if (!Critere::update($_GET['oldName'], [
        'nom' => $critereName['nom']
    ])) {
        $errors[] = "Erreur interne, impossible de mettre à jour le critere";
    } else {
        redirectTo("critere/list");
    }
}

return [
    'critere' => $critere,
    'errors' => $errors,
];
