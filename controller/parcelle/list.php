<?php

include_once '../app/Connexion.php';

$pdo = Connexion::getConnexion();


$sql = 'SELECT DISTINCT parcelle.* FROM parcelle';


$query = $pdo->query($sql);
$parcelles = $query->fetchAll();

return [
    'parcelles' => $parcelles,
];
?>
