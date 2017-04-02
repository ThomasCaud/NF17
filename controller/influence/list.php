<?php

include_once '../app/Connexion.php';

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

$request = "select evenement.type, round(sum(assemblage.pourcentage*vinNoteMoyenne.noteMoyenne)/(sum(assemblage.pourcentage)),2) as notemoyenne
from (
	select id, nom as nomDuVin, round(avg(note.note),2) as noteMoyenne
	from vin join note on (note.vin_id = vin.id) group by vin.id
	) as vinNoteMoyenne
join assemblage on (vinNoteMoyenne.id = assemblage.vin_id)
join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom)
join impact on(impact.exploitation_annee = exploitation.annee and impact.exploitation_parcelle = exploitation.parcelle_nom)
join evenement on(impact.evenement_type = evenement.type)
group by evenement.type
order by noteMoyenne desc;";

$noteMoyenneEventClimatique = executeRequest($pdo, $request);

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

$request = "select traitement.nom, round(sum(assemblage.pourcentage*vin.prix)/(sum(assemblage.pourcentage)),2) as prixmoyen from vin
join assemblage on(assemblage.vin_id = vin.id)
join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom)
join traite on (traite.exploitation_annee = exploitation.annee and traite.exploitation_parcelle = exploitation.parcelle_nom)
join traitement on (traitement.nom = traite.traitement_nom)
group by traitement.nom;";

$prixMoyenTraitement = executeRequest($pdo, $request);

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

$request = "select parcelle.exposition as exposition, round(sum(assemblage.pourcentage*vin.prix)/(sum(assemblage.pourcentage)),2) as prixmoyen from vin
join assemblage on(assemblage.vin_id = vin.id)
join exploitation on (assemblage.exploitation_annee = exploitation.annee and assemblage.exploitation_parcelle = exploitation.parcelle_nom)
join parcelle on (exploitation.parcelle_nom = parcelle.nom)
group by parcelle.exposition
order by prixmoyen desc;";

$prixMoyenExposition = executeRequest($pdo, $request);

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

$request = "select annee, round(avg(vin.prix), 2) as prixmoyen from vin
group by annee
order by annee desc;";

$prixMoyenSelonAnnee = executeRequest($pdo, $request);

$request = "select annee, round(avg(note), 2) as notemoyenne from vin
join note on (vin.id = note.vin_id)
group by annee
order by annee desc;";

$noteMoyenneSelonAnnee = executeRequest($pdo, $request);

$request = "select vin.nom, vin.annee, round(avg(vin.prix), 2) as prixMoyen, round(avg(note.note), 2) as noteMoyenne
from vin
join note on (vin.id = note.vin_id)
group by vin.id
order by noteMoyenne desc;";

$noteMoyenneParVin = executeRequest($pdo, $request);

$request = "SELECT ROUND(AVG(note), 2) as note, ROUND(AVG(prix), 2) as prix FROM vin_view";
$moyennesGlobales = executeRequest($pdo, $request)[0];

return [
    'prixMoyenModeCulture' => $prixMoyenModeCulture,
    'prixMoyenEventClimatique' => $prixMoyenEventClimatique,
    'noteMoyenneEventClimatique' => $noteMoyenneEventClimatique,
    'noteMoyenneModeCulture' => $noteMoyenneModeCulture,
    'prixMoyenTraitement' => $prixMoyenTraitement,
    'noteMoyenneTraitement' => $noteMoyenneTraitement,
    'prixMoyenExposition' => $prixMoyenExposition,
    'noteMoyenneExposition' => $noteMoyenneExposition,
    'prixMoyenSelonAnnee' => $prixMoyenSelonAnnee,
    'noteMoyenneSelonAnnee' => $noteMoyenneSelonAnnee,
    'noteMoyenneParVin' => $noteMoyenneParVin,
	'moyennesGlobales' => $moyennesGlobales,
];
?>
