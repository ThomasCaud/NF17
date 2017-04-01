<?php

include_once '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$sth = $pdo->query('SELECT * FROM evenement');

return [
    'evenements' => $sth->fetchAll(),
];
