<?php

class Connexion
{
	public static $connexion = null;
	const CONFIG_PATH = "../config.json";

	public static function getConnexion() {
		if (Connexion::$connexion == null) {
			$config = file_get_contents(self::CONFIG_PATH);
			$config = json_decode($config, true);
			$config = $config['connectionDataBase'];

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
