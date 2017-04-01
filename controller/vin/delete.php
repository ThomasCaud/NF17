<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$vinId = $_GET['id'];
$vinNom = $_GET['nom'];
$vinPrix = $_GET['prix'];
$vinAnnee = $_GET['annee'];

$sth = $pdo->prepare('DELETE FROM vin WHERE id = :id, nom = :nom, prix = :prix, annee = :annee');
$sth->execute(['id' => $vinId]);
$sth->execute(['nom' => $vinNom]);
$sth->execute(['prix' => $vinPrix]);
$sth->execute(['annee' => $vinAnnee]);

header('Location: /evenement/list');
