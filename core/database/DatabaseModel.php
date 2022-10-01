<?php

namespace app\core\database;

use app\core\Model;
use app\core\Application;

abstract class DatabaseModel extends Model
{
    abstract public static function tableName() : string;

    abstract public function attributes() : array;

    abstract public static function primaryKey() : string;
    
    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn ($attr) => ":$attr", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") VALUES (".implode(',', $params).")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();

        return true;
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attribute = array_keys($where);

        $sql = implode("AND ", array_map(fn ($attr) => "$attr = :$attr", $attribute));

        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();

        return $statement->fetchObject(static::class);
    }

    

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
