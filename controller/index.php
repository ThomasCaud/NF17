<?php

include_once '../app/Connexion.php';


function getNumber($table) {
    $pdo = Connexion::getConnexion();
    return $pdo->query("SELECT COUNT(*) FROM $table")->fetch(PDO::FETCH_COLUMN);
}

$links = [
    [
        'label' => 'Vin',
        'number' => getNumber('vin'),
        'actions' => [
            'Ajouter' => 'vin/add',
            'Lister' => 'vin/list',
        ]
    ],
    [
        'label' => 'Cépage',
        'number' => getNumber('cepage'),
        'actions' => [
            'Ajouter' => 'cepage/add',
            'Lister' => 'cepage/list',
        ]
    ],
    [
        'label' => 'Parcelle',
        'number' => getNumber('parcelle'),
        'actions' => [
            'Ajouter' => 'parcelle/add',
            'Lister' => 'parcelle/list',
        ]
    ],
    [
        'label' => 'Exploitation',
        'number' => getNumber('exploitation'),
        'actions' => [
            'Ajouter' => 'exploitation/add'
        ]
    ],
    [
        'label' => 'Influence',
        'number' => getNumber('impact'),
        'actions' => [
            'Lister' => 'influence/list',
        ]
    ],
    [
        'label' => 'Critère',
        'number' => getNumber('critere'),
        'actions' => [
            'Ajouter' => 'critere/add',
            'Lister' => 'critere/list',
        ]
    ],
    [
        'label' => 'Evenement',
        'number' => getNumber('evenement'),
        'actions' => [
            'Ajouter' => 'evenement/add',
            'Lister' => 'evenement/list',
        ]
    ],
];


return [
    'links' => $links,
];
