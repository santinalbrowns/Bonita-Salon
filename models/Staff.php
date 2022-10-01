<?php

namespace app\models;

use PDO;
use app\core\Application;

class Staff
{
    public $id;
    public $fistname;
    public $lastname;
    public $email;
    public $password;

    public static $table = "staff";

    public function getStaff()
    {
        $table = static::$table;

        $statement = $this->prepare("SELECT * FROM $table");

        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getMember()
    {
        $table = static::$table;

        $statement = $this->prepare("SELECT * FROM $table WHERE `id` = :id");

        $statement->bindValue(":id", $this->id);

        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateMember()
    {
        $table = static::$table;

        $statement = $this->prepare("UPDATE $table SET `firstname` = :firstname, `lastname` = :lastname, `email` = :email, `password` = :password WHERE `id` = :id");

        $statement->bindValue(":id", $this->id);
        $statement->bindValue(":firstname", $this->firstname);
        $statement->bindValue(":lastname", $this->lastname);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":password", $this->password);

        $statement->execute();
        
        return true;
    }


    public function add()
    {
        $table = static::$table;

        $statement = $this->prepare("INSERT INTO $table (`firstname`, `lastname`, `email`, `password`) VALUES(:firstname, :lastname, :email, :password)");

        $statement->bindValue(":firstname", $this->firstname);
        $statement->bindValue(":lastname", $this->lastname);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":password", $this->password);

        $statement->execute();
        
        return true;
    }


    public function deleteMember()
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