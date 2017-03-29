<?php
include_once '../app/Connexion.php';
include_once '../app/Entity/Cepage.php';

if (!isset($_GET['oldName']) || empty($_GET['oldName'])) {
    return View::render404("Cepage introuvable");
}

$cepage = Cepage::get($_GET['oldName']);
if (!$cepage) {
    return View::render404("cepage introuvable");
}

$errors = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cepageName = $_POST['cepage'];
    if (!Cepage::update($_GET['oldName'], [
        'nom' => $cepageName['nom']
    ])) {
        $errors[] = "Erreur interne, impossible de mettre à jour le cepage";
    } else {
        header('Location: /cepage/list');
    }
}

return [
    'cepage' => $cepage,
    'errors' => $errors,
];
