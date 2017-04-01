<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$evenementType = $_GET['oldName'];
$sql = "delete from evenement where type = '" . $evenementType . "';";

$query = $pdo->query($sql);
$query->fetchAll();

//header('Location: /evenement/list');
