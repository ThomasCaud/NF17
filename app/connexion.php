<?php

class Connexion { 
	public static $connexion2 = null;
	
	public static function getConnexion() { 
		if(Connexion::$connexion2 == null){
			$config = file_get_contents("config.json");
			$config = json_decode($config, true);
			$config = $config['connectionDataBase'];

			try {
				Connexion::$connexion2 = pg_connect("host=".$config['host']." dbname=".$config['dbname']." user =".$config['username']." password=".$config['password']);
			} catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		return Connexion::$connexion2;
	} 
}
?>