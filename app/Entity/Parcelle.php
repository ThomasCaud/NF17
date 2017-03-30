<?php

include_once 'BaseEntity.php';

class Parcelle extends BaseEntity
{
    public static function getTable() {
        return 'parcelle';
    }

    public static function getPrimaryKey() {
        return 'nom';
    }
}
