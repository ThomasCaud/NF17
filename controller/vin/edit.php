<?php
include_once '../app/Connexion.php';
include_once '../app/Entity/Vin.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    return View::render404("Vin introuvable");
}


$vin = Vin::get($_GET['id']);
if (!$vin) {
    return View::render404("Vin introuvable");
}

$errors = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vinData = $_POST['vin'];
    if (!Vin::update($_GET['id'], [
        'nom' => $vinData['nom'],
        'prix'=> $vinData['prix'],
        'annee'=> $vinData['annee'],
    ])) {
        $errors[] = "Erreur interne, impossible de mettre à jour le vin";
    } else {
        redirectTo("vin/list");
    }
}

return [
    'vin' => $vin,
    'errors' => $errors,
];
