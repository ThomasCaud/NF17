<?php

include '../app/Connexion.php';
include '../app/Form.php';

$pdo = Connexion::getConnexion();
$errors = false;

// Si le formulaire est soumit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vin = $_POST['vin'];
    $form = new Form($vin);
    $form->constraints('nom', ['required' => true]);
    $form->constraints('prix', ['required' => true]);

    $errors = $form->checkForm();

    if(!$errors) {
        $sth = $pdo->prepare('INSERT INTO vin(nom, prix) VALUES (:nom, :prix)');
        try {
            $pdo->beginTransaction();
            $sth->execute(['nom' => $vin['nom'], 'prix' => $vin['prix']]);

            foreach ($vin['cepage'] as $cepage) {
                $sth2 = $pdo->prepare('INSERT INTO assemblage (vin_nom, exploitation_parcelle, exploitation_annee, pourcentage) VALUES (:nom, :parcelle, :annee, :pourcentage)');
                list($parcelle, $annee) = explode(';', $cepage['nom']);
                $sth2->execute([
                    'nom' => $vin['nom'],
                    'parcelle' => $parcelle,
                    'annee' => $annee,
                    'pourcentage' => $cepage['pourcentage'],
                ]);
            }

            $pdo->commit();

            header('Location: /vin/list');

        } catch(PDOException $e) {
            $pdo->rollback();
            $errors[] = "Erreur interne de la BDD";
        }
    }
}

$exploitations = $pdo->query('SELECT * FROM exploitation JOIN parcelle ON exploitation.parcelle_nom = parcelle.nom')->fetchAll();

return [
    'exploitations' => $exploitations,
    'errors'    => $errors,
];
?>
