<?php

include_once '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$sql = "SELECT * FROM critere";

$query = $pdo->query($sql);
$criteres = $query->fetchAll();

return [
    'criteres' => $criteres
];
?>
