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

return [
    'vin' => $vin,
    'errors' => false,
];
