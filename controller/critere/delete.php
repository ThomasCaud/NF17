<?php

include_once '../app/Connexion.php';

$pdo = Connexion::getConnexion();

$critereName = $_GET['oldName'];
$sql = "delete from critere where nom = '" . $critereName . "';";

$query = $pdo->query($sql);
$query->fetchAll();

redirectTo("critere/list");
