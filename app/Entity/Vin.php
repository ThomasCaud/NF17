<?php

include_once 'BaseEntity.php';

class Vin extends BaseEntity
{
    public static function getTable() {
        return 'vin';
    }

    public static function getPrimaryKey() {
        return 'id';
    }
}
