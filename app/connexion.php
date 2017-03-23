<?php

class Connexion { 
	public static $connexion2 = null;
	
	public static function getConnexion() { 
		if(Connexion::$connexion2 == null){
			$config = file_get_contents("../config.json");
			$config = json_decode($config, true);
			$config = $config['connectionDataBase'];

			try {
				Connexion::$connexion2 = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
			} catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		return Connexion::$connexion2;
	} 
}
?>