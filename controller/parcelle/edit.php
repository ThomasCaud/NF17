<?php
include_once '../app/Connexion.php';
include_once '../app/Entity/Parcelle.php';

if (!isset($_GET['nom']) || empty($_GET['nom'])) {
    return View::render404("parcelle introuvable");
}


$parcelle = parcelle::get($_GET['nom']);
if (!$parcelle) {
    return View::render404("parcelle introuvable");
}

$errors = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parcelleData = $_POST['parcelle'];
    if (!Parcelle::update($_GET['nom'], [
        'nom' => $parcelleData['nom'],
        'surface'=> $parcelleData['surface'],
	    'typeSol'=> $parcelleData['typeSol'],
        'exposition'=> $parcelleData['exposition'],
        'cepage_nom'=> $parcelleData['cepage'],
    ])) {
        $errors[] = "Erreur interne, impossible de mettre à jour le parcelle";
    } else {
        redirectTo("parcelle/list");
    }
}
$pdo = Connexion::getConnexion();
$cepages = $pdo->query('SELECT * FROM cepage')->fetchAll();

return [
    'parcelle' => $parcelle,
    'errors'   => $errors,
    'cepages'  => $cepages,
];
