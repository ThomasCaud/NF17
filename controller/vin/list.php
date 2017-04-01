<?php

include '../app/Connexion.php';

$filtres = [
    'cepage' => [
        'label' => 'Cépage',
        'field' => 'cepage.nom',
    ],
    'annee' => [
        'label' => 'Année',
        'field' => 'vin.annee',
    ],
    'modeCulture' => [
        'label' => 'Mode de culture',
        'field' => 'exploitation.modeculture',
        'values' => [
            'Desherbé',
            'Enherbé',
        ],
    ],
    'parcelle' => [
        'label' => 'Parcelle',
        'field' => 'parcelle.nom',
    ],
];

$pdo = Connexion::getConnexion();

function getFilter($filter) {
    if (isset($_GET['filtre'][$filter])) {
        return $_GET['filtre'][$filter];
    } else {
        return null;
    }
}

$conditions = false;
foreach ($filtres as $name => $values) {

    if(!isset($values['values'])) {
        $val = explode('.', $values['field']);
        $query = $pdo->query('SELECT DISTINCT '.$val[1].' FROM '.$val[0]);
        $filtres[$name]['values'] = $query->fetchAll(PDO::FETCH_COLUMN);
    }
    $filter = getFilter($name);
    if ($filter) {
        $filter = array_map(function($item) {
            return "'$item'";
        }, $filter);
        $conditions[] = ' '.$values['field'].' IN ('.implode(', ', $filter).') ';
    }
    foreach ($filtres[$name]['values'] as $key => $value) {

        if(isset($_GET['filtre'][$name]) && in_array($value, $_GET['filtre'][$name])) {
            $filtres[$name]['values'][$value] = true;
        } else {
            $filtres[$name]['values'][$value] = false;
        }
        unset($filtres[$name]['values'][$key]);
    }
}


$sql = 'SELECT DISTINCT vin.* FROM vin_view as vin';

if ($conditions) {
    $sql .= ' JOIN assemblage ON assemblage.vin_id = vin.id
              JOIN exploitation ON (exploitation.annee = assemblage.exploitation_annee AND assemblage.exploitation_parcelle = exploitation.parcelle_nom)
              JOIN parcelle ON exploitation.parcelle_nom = parcelle.nom
              JOIN cepage ON cepage.nom = parcelle.cepage_nom';
    $sql .= ' WHERE ';
    $sql .= implode(" AND ", $conditions);
}

$query = $pdo->query($sql);
$vins = $query->fetchAll();

return [
    'vins' => $vins,
    'filtres' => $filtres,
];
?>
