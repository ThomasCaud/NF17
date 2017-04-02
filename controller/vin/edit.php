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

$pdo = Connexion::getConnexion();
$sth = $pdo->query('SELECT parcelle.nom, exploitation.annee, assemblage.pourcentage FROM assemblage
                    JOIN exploitation ON exploitation.annee = assemblage.exploitation_annee AND assemblage.exploitation_parcelle = exploitation.parcelle_nom
                    JOIN parcelle ON parcelle.nom = exploitation.parcelle_nom
                    WHERE vin_id = '.$vin['id']);

$vin['cepage'] = $sth->fetchAll();

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

$pdo = Connexion::getConnexion();
$exploitations = $pdo->query('SELECT * FROM exploitation JOIN parcelle ON exploitation.parcelle_nom = parcelle.nom')->fetchAll();

return [
    'exploitations' => $exploitations,
    'vin' => $vin,
    'errors' => $errors,
];
