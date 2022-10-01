<?php

namespace app\models;

use PDO;
use app\core\Application;

class Service
{
    public $id;
    public $name;
    public $description;
    public $price;

    public static $table = "service";

    public function getServices()
    {
        $table = static::$table;

        $statement = $this->prepare("SELECT * FROM $table");

        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function add()
    {
        $table = static::$table;

        $statement = $this->prepare("INSERT INTO $table (`name`, `description`, `price`) VALUES(:name, :description, :price)");

        $statement->bindValue(":name", $this->name);
        $statement->bindValue(":description", $this->description);
        $statement->bindValue(":price", $this->price);

        $statement->execute();

        return true;
    }

    public function update()
    {
        $table = static::$table;

        $statement = $this->prepare("UPDATE $table SET name = :name,  description = :description, price = :price WHERE id = :id");

        $statement->bindValue(":id", $this->id);
        $statement->bindValue(":name", $this->name);
        $statement->bindValue(":price", $this->price);
        $statement->bindValue(":description", $this->description);

        $statement->execute();

        return true;
    }

    public function deleteService()
    {
        $table = static::$table;

        $statement = $this->prepare("DELETE FROM $table WHERE `id` = :id");

        $statement->bindValue(":id", $this->id);

        $statement->execute();

        return true;
    }

    protected function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}