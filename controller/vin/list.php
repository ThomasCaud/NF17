<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$query = $pdo->query('SELECT * FROM vin_view');

global $vins;
$vins = $query->fetchAll();

return [
    'vins' => $vins,
];
?>
