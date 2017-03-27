<?php
include_once '../app/Connexion.php';

if (!isset($_GET['nom']) || empty($_GET['nom'])) {
    return View::render404("Vin introuvable");
}

$pdo = Connexion::getConnexion();

$sth = $pdo->prepare('SELECT * FROM vin WHERE nom = :nom');
$sth->execute(['nom' => $_GET['nom']]);

$vin = $sth->fetch();
if (!$vin) {
    return View::render404("Vin introuvable");
}

// Si le formulaire est soumit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $viForm = $_POST['vin'];
    $updateVin = $pdo->prepare('UPDATE vin SET nom = :postNom, prix = :prix WHERE nom = :nom');
    $updateVin->execute([
        'postNom' => $viForm['nom'],
        'prix'    => $viForm['prix'],
        'nom'     => $_GET['nom'],
    ]);

    header('Location: /vin/list');
}

return [
    'vin' => $vin,
    'errors' => false,
];
