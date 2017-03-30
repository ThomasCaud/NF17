<?php

include_once 'BaseEntity.php';

class Critere extends BaseEntity
{
    public static function getTable() {
        return 'critere';
    }

    public static function getPrimaryKey() {
        return 'nom';
    }
}
