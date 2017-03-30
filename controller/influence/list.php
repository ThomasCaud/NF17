<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();

function executeRequest($pdo, $request){
	$query = $pdo->query($request);
	return $query->fetchAll();
}

$request = "select exploitation.modeculture, round(sum(assemblage.pourcentage*vin.prix)/(sum(assemblage.pourcentage)),2) as prixmoyen from vin 
	join assemblage on (vin.nom = assemblage.vin_nom) 
	join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom) 
	group by exploitation.modeculture;";

$prixMoyenModeCulture = executeRequest($pdo, $request);

$request = "select evenement.type, round(sum(assemblage.pourcentage*vin.prix)/(sum(assemblage.pourcentage)),2) as prixmoyen from vin 
join assemblage on (vin.nom = assemblage.vin_nom) 
join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom)
join impact on(impact.exploitation_annee = exploitation.annee and impact.exploitation_parcelle = exploitation.parcelle_nom)
join evenement on(impact.evenement_type = evenement.type)
group by evenement.type;";

$prixMoyenEventClimatique = executeRequest($pdo, $request);

return [
    'prixMoyenModeCulture' => $prixMoyenModeCulture,
    'prixMoyenEventClimatique' => $prixMoyenEventClimatique
];
?>
