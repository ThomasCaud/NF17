<?php

include_once 'BaseEntity.php';

class Cepage extends BaseEntity
{
    public static function getTable() {
        return 'cepage';
    }

    public static function getPrimaryKey() {
        return 'nom';
    }
}
