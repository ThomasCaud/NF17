<?php
include_once '../app/Connexion.php';
include_once '../app/Entity/Vin.php';

if (!isset($_GET['nom']) || empty($_GET['nom'])) {
    return View::render404("Vin introuvable");
}


$vin = Vin::get($_GET['nom']);
if (!$vin) {
    return View::render404("Vin introuvable");
}

$errors = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vinData = $_POST['vin'];
    if (!Vin::update($_GET['nom'], [
        'nom' => $vinData['nom'],
        'prix'=> $vinData['prix'],
    ])) {
        $errors[] = "Erreur interne, impossible de mettre à jour le vin";
    } else {
        header('Location: /vin/list');
    }
}

return [
    'vin' => $vin,
    'errors' => $errors,
];
