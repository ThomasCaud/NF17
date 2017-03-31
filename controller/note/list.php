<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();


$sql = 'SELECT DISTINCT note.* FROM note';


$query = $pdo->query($sql);
$notes = $query->fetchAll();

return [
    'notes' => $notes,
];
?>
