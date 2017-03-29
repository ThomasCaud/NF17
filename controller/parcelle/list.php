<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();


$sql = 'SELECT DISTINCT parcelle_view.* FROM parcelle_view';


$query = $pdo->query($sql);
$parcelles = $query->fetchAll();

return [
    'parcelles' => $parcelles,
];
?>
