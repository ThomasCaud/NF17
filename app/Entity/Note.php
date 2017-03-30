<?php

include_once 'BaseEntity.php';

class Note extends BaseEntity
{
    public static function getTable() {
        return 'note';
    }

    public static function getPrimaryKey() {
        return ['critere_nom','vin_nom'];
    }
}
