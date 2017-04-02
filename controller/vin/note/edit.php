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

$sth = $pdo->prepare('SELECT * FROM note WHERE vin_id = :id');
$sth->execute([
    'id' => $_GET['vin_id'],
]);

$notes = $sth->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notes = $_POST['note'];
    foreach ($notes as $critere => $note) {
        Note::update([
            'critere_nom' => $critere,
            'vin_id'      => $_GET['vin_id'],
        ], [
            'note'        => $note,
        ]);
    }

    redirectTo('vin/list');
}

return [
    'criteres' => $criteres,
    'notes'     => $notes,
    'vin'      => $vin,
];
