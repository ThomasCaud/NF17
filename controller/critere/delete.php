<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$critereNom = $_GET['nom'];

$sth = $pdo->prepare('DELETE FROM critere WHERE nom = :nom');
$sth->execute(['nom' => $critereNom]);

header('Location: /critere/list');
