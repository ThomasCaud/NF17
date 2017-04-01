<?php
	include_once 'Connexion.php';
	$connection = Connexion::getConnexion();
	$vins = $connection->query('SELECT * FROM vin');

	echo "<pre>";
	var_dump($vins->fetchAll());
?>
