<?php

include_once '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$sql = "SELECT * FROM cepage";

$query = $pdo->query($sql);
$cepages = $query->fetchAll();

return [
    'cepages' => $cepages
];
?>
