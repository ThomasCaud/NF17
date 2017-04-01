<?php

include_once '../app/Connexion.php';
include_once '../app/Entity/Vin.php';
include_once '../app/Form.php';

$pdo = Connexion::getConnexion();
$errors = false;
$vin = false;

// Si le formulaire est soumit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vin = $_POST['vin'];
    $form = new Form($vin);
    $form->constraints('nom', ['required' => true]);
    $form->constraints('annee', ['required' => true]);
    $form->constraints('prix', ['required' => true]);

    $errors = $form->checkForm();

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO vin(nom, prix, annee) VALUES (:nom, :prix, :annee)');
        try {
            $pdo->beginTransaction();
            $id = Vin::insert([
                'nom'   => $vin['nom'],
                'prix'  => $vin['prix'],
                'annee' => $vin['annee'],
            ]);

            foreach ($vin['cepage'] as $cepage) {
                $sth2 = $pdo->prepare('INSERT INTO assemblage (vin_id, exploitation_parcelle, exploitation_annee, pourcentage) VALUES (:id, :parcelle, :annee, :pourcentage)');
                list($parcelle, $annee) = explode(';', $cepage['nom']);
                $sth2->execute([
                    'id' => $id,
                    'parcelle' => $parcelle,
                    'annee' => $annee,
                    'pourcentage' => $cepage['pourcentage'],
                ]);
            }

            $pdo->commit();

            redirectTo('vin/list');

        } catch(PDOException $e) {
            $pdo->rollback();
            $errors[] = "Erreur interne de la BDD";
            throw $e;
        }
    }
}

$exploitations = $pdo->query('SELECT * FROM exploitation JOIN parcelle ON exploitation.parcelle_nom = parcelle.nom')->fetchAll();

return [
    'exploitations' => $exploitations,
    'errors'    => $errors,
    'vin'       => $vin,
];
?>
