<?php

include_once '../app/Connexion.php';

$pdo = Connexion::getConnexion();


$sql = 'SELECT DISTINCT * FROM note join vin on (note.vin_id = vin.id)';

$query = $pdo->query($sql);
$notes = $query->fetchAll();

return [
    'notes' => $notes,
];
?>
