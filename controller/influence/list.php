<?php

include '../app/Connexion.php';

$pdo = Connexion::getConnexion();

function executeRequest($pdo, $request){
	$query = $pdo->query($request);
	return $query->fetchAll();
}

$request = "select exploitation.modeculture, round(sum(assemblage.pourcentage*vin.prix)/(sum(assemblage.pourcentage)),2) as prixmoyen from vin 
	join assemblage on (vin.id = assemblage.vin_id) 
	join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom) 
	group by exploitation.modeculture
	order by prixmoyen desc;";

$prixMoyenModeCulture = executeRequest($pdo, $request);

$request = "select evenement.type, round(sum(assemblage.pourcentage*vin.prix)/(sum(assemblage.pourcentage)),2) as prixmoyen from vin 
join assemblage on (vin.id = assemblage.vin_id) 
join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom)
join impact on(impact.exploitation_annee = exploitation.annee and impact.exploitation_parcelle = exploitation.parcelle_nom)
join evenement on(impact.evenement_type = evenement.type)
group by evenement.type
order by prixmoyen desc;";

$prixMoyenEventClimatique = executeRequest($pdo, $request);

$request = "select exploitation.modeCulture, round(sum(assemblage.pourcentage*vinNoteMoyenne.noteMoyenne)/(sum(assemblage.pourcentage)),2) as noteMoyenne 
from (
	select id, nom as nomDuVin, round(avg(note.note),2) as noteMoyenne 
	from vin join note on (note.vin_id = vin.id) group by vin.id
	) as vinNoteMoyenne 
join assemblage on(assemblage.vin_id = vinNoteMoyenne.id) 
join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom)
group by exploitation.modeCulture
order by noteMoyenne desc;";

$noteMoyenneModeCulture = executeRequest($pdo, $request);

$request = "select traitement.nom, round(sum(assemblage.pourcentage*vinNoteMoyenne.noteMoyenne)/(sum(assemblage.pourcentage)),2) as noteMoyenne 
from (
	select id, nom as nomDuVin, round(avg(note.note),2) as noteMoyenne 
	from vin join note on (note.vin_id = vin.id) group by vin.id
	) as vinNoteMoyenne 
join assemblage on(assemblage.vin_id = vinNoteMoyenne.id) 
join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom)
join traite on (traite.exploitation_annee = exploitation.annee and traite.exploitation_parcelle = exploitation.parcelle_nom)
join traitement on (traitement.nom = traite.traitement_nom)
group by traitement.nom;";

$noteMoyenneTraitement = executeRequest($pdo, $request);

$request = "select parcelle.exposition, round(sum(assemblage.pourcentage*vinNoteMoyenne.noteMoyenne)/(sum(assemblage.pourcentage)),2) as noteMoyenne 
from (
	select id, nom as nomDuVin, round(avg(note.note),2) as noteMoyenne 
	from vin join note on (note.vin_id = vin.id) group by vin.id
	) as vinNoteMoyenne 
join assemblage on(assemblage.vin_id = vinNoteMoyenne.id) 
join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom)
join parcelle on (exploitation.parcelle_nom = parcelle.nom)
group by parcelle.exposition
order by noteMoyenne desc;";

$noteMoyenneExposition = executeRequest($pdo, $request);

$request = "select annee, round(avg(note), 2) as notemoyenne from vin
join note on (vin.id = note.vin_id)
group by annee
order by annee desc;";

$noteMoyenneSelonAnnee = executeRequest($pdo, $request);

$request = "select vin.nom, round(avg(vin.prix), 2) as prixMoyen, round(avg(note.note), 2) as noteMoyenne
from vin
join note on (vin.id = note.vin_id)
group by vin.nom
order by noteMoyenne;";

$noteMoyenneParVin = executeRequest($pdo, $request);

return [
    'prixMoyenModeCulture' => $prixMoyenModeCulture,
    'prixMoyenEventClimatique' => $prixMoyenEventClimatique,
    'noteMoyenneModeCulture' => $noteMoyenneModeCulture,
    'noteMoyenneTraitement' => $noteMoyenneTraitement,
    'noteMoyenneExposition' => $noteMoyenneExposition,
    'noteMoyenneSelonAnnee' => $noteMoyenneSelonAnnee,
    'noteMoyenneParVin' => $noteMoyenneParVin
];
?>
