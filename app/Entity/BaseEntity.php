<?php

abstract class BaseEntity
{
    public abstract static function getPrimaryKey();
    public abstract static function getTable();

    public function update($id, $data) {
        $pdo = Connexion::getConnexion();

        $fields = array_map(function ($field) {
            return $field." = :".$field;
        }, array_keys($data));

        $sth = $pdo->prepare("UPDATE ".static::getTable()." SET ".implode(', ', $fields)." WHERE ".static::primaryKeyCondition($id));

        if(!is_array($id)) {
            $pk = $id;
            unset($id);
            $id["id"] = $pk;
        }

        return $sth->execute(array_merge($data, $id));
    }

    /**
     * Return the entity when exist, else false
     */
    public static function get($id) {
        $pdo = Connexion::getConnexion();
        $sth = $pdo->prepare("SELECT * FROM ".static::getTable()." WHERE ".static::primaryKeyCondition($id));

        if (is_array($id)) {
            $sth->execute($id);
        } else {
            $sth->execute(['id' => $id]);
        }

        return $sth->fetch();
    }

    private function primaryKeyCondition($id) {
        if(is_array(static::getPrimaryKey())) {
            if (is_array($id)) {
                if (array_key($id) == static::getPrimaryKey()) {

                    $conditions = array_map(function ($field) {
                        return $field." :".$field;
                    }, static::getPrimaryKey());

                    return implode(" AND ", $conditions);
                } else {
                    throw new LogicException("La clé primaire est : ".implode(', ',static::getPrimaryKey()));
                }
            } else {
                throw new LogicException("La table ".static::getTable()." a une clé primaire composite");
            }
        } else {
            return static::getPrimaryKey()." = :id";
        }

        return $condition;
    }

    public function insert($data) {
        $pdo = Connexion::getConnexion();
        $fields = array_key($data);
        $sth = $pdo->prepare("INSERT INTO ".static::getTable()." (".implode(", ", $fields).") VALUES (:".implode(", :", $field).")");

        return $sth->execute($data);
    }

    public function delete($id) {
        $pdo = Connexion::getConnexion();
        $sth = $pdo->prepare("DELETE FROM ".static::getTable()." WHERE ".static::primaryKeyCondition($id));

        if (is_array($id)) {
            $r = $sth->execute($id);
        } else {
            $r = $sth->execute(['id' => $id]);
        }

        return $r;
    }
}
