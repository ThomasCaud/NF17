<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$evenementType = $_GET['type'];

$sth = $pdo->prepare('DELETE FROM evenement WHERE type = :type');
$sth->execute(['type' => $evenementType]);

redirectTo("evenement/list");
