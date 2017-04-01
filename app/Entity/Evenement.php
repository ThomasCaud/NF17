<?php

include_once 'BaseEntity.php';

class Evenement extends BaseEntity
{
    public static function getTable() {
        return 'evenement';
    }

    public static function getPrimaryKey() {
        return 'type';
    }
}
