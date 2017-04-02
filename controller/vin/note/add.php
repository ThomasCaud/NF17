<?php
include_once '../app/Connexion.php';
include_once '../app/Entity/Vin.php';
include_once '../app/Entity/Note.php';

if (!isset($_GET['vin_id'])) {
    return View::render404("Page introuvable");
}
$vin = Vin::get($_GET['vin_id']);

if (!$vin) {
    return View::render404("Vin introuvable");
}

$pdo = Connexion::getConnexion();

$sth = $pdo->query('SELECT * FROM critere');
$criteres = $sth->fetchAll();
$notes = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notes = $_POST['note'];
    try {
        foreach ($notes as $critere => $note) {
            Note::insert([
                'vin_id'      => $_GET['vin_id'],
                'critere_nom' => $critere,
                'note'        => $note,
            ]);
        }
    } catch (PDOException $e) {
        $errors[] = "Erreur interne à la BDD";
    }

    redirectTo('vin/list');
}

return [
    'notes'    => $notes,
    'criteres' => $criteres,
    'vin'      => $vin,
    'errors'   => isset($errors) ? $errors : false,
];
