<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$cepageName = $_GET['oldName'];
$sql = "delete from cepage where nom = '" . $cepageName . "';";

$query = $pdo->query($sql);
$query->fetchAll();

header('Location: /cepage/list');
