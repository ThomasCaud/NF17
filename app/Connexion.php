<?php

include_once 'Config.php';

class Connexion
{
	public static $connexion = null;

	public static function getConnexion() {
		if (Connexion::$connexion == null) {
			$config = Config::get('connectionDataBase');

			$dns = $config['driver'].":dbname=".$config['dbname'].";host=".$config['host'];
			try {
				Connexion::$connexion = new PDO($dns, $config['username'], $config['password']);
				Connexion::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		return Connexion::$connexion;
	}
}
?>
