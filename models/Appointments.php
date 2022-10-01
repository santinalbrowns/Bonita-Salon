<?php

namespace app\models;

use app\core\Application;
use PDO;

class Appointments
{
    public $id;
    public $date;
    public $user_id;
    public $service_id;
    public $status;

    public static $table = "appointment";

    public function getLimited()
    {
        $table = self::$table;

        $clientTable = Client::$table;

        $serviceTable = Service::$table;

        $statement = $this->prepare("SELECT 
                                        $clientTable.firstname, 
                                        $clientTable.lastname, 
                                        $clientTable.email,
                                        $table.status,
                                        $table.date,
                                        $serviceTable.name
                                    FROM 
                                        $table 
                                    INNER JOIN 
                                        $clientTable
                                    ON
                                        $clientTable.id = $table.User_id
                                    INNER JOIN
                                        $serviceTable
                                    ON
                                        $serviceTable.id = $table.Service_id
                                    ORDER BY
                                        $table.date
                                    DESC LIMIT 0, 10");

                                    
        
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function bookAppointment()
    {
        $table = self::$table;

        $statement = $this->prepare("INSERT INTO $table (`date`, `User_id`, `Service_id`, `status`) VALUES(:date, :user_id, :service_id, :status)");

        $statement->bindValue(":date", $this->date);
        $statement->bindValue(":user_id", $this->user_id);
        $statement->bindValue(":service_id", $this->service_id);
        $statement->bindValue(":status", $this->status);

        $statement->execute();

        return true;
    }

    public function getAll()
    {
        $table = self::$table;

        $clientTable = Client::$table;

        $serviceTable = Service::$table;

        $statement = $this->prepare("SELECT 
                                        $table.id, 
                                        $clientTable.firstname, 
                                        $clientTable.lastname, 
                                        $clientTable.email,
                                        $table.status,
                                        $table.date,
                                        $serviceTable.name
                                    FROM 
                                        $table 
                                    INNER JOIN 
                                        $clientTable
                                    ON
                                        $clientTable.id = $table.User_id
                                    INNER JOIN
                                        $serviceTable
                                    ON
                                        $serviceTable.id = $table.Service_id
                                    ORDER BY
                                        $table.date
                                    DESC");

                                    
        
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserAppointments()
    {
        $table = self::$table;

        $clientTable = Client::$table;

        $serviceTable = Service::$table;

        $statement = $this->prepare("SELECT 
                                        $table.id, 
                                        $serviceTable.name,
                                        $serviceTable.id as 'service_id',
                                        $table.status,
                                        $table.date
                                    FROM 
                                        $table 
                                    INNER JOIN 
                                        $clientTable
                                    ON
                                        $clientTable.id = $table.User_id
                                    INNER JOIN
                                        $serviceTable
                                    ON
                                        $serviceTable.id = $table.Service_id
                                    WHERE
                                        $clientTable.id = :id
                                    ORDER BY
                                        $table.date
                                    DESC");

        $statement->bindValue(":id", $this->user_id);
                                    
        
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserAppointmentsByStatus($status)
    {
        $table = self::$table;

        $clientTable = Client::$table;

        $serviceTable = Service::$table;

        $statement = $this->prepare("SELECT 
                                        $table.id, 
                                        $serviceTable.name,
                                        $serviceTable.id as 'service_id',
                                        $table.status,
                                        $table.date
                                    FROM 
                                        $table 
                                    INNER JOIN 
                                        $clientTable
                                    ON
                                        $clientTable.id = $table.User_id
                                    INNER JOIN
                                        $serviceTable
                                    ON
                                        $serviceTable.id = $table.Service_id
                                    WHERE
                                        $clientTable.id = :id
                                    AND 
                                        $table.status = :status
                                    ORDER BY
                                        $table.date
                                    DESC");

        $statement->bindValue(":id", $this->user_id);
        $statement->bindValue(":status", $status);
                                    
        
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPendingAppointments()
    {
        $table = self::$table;

        $clientTable = Client::$table;

        $statement = $this->prepare("SELECT 
                                        $table.id, 
                                        $clientTable.firstname, 
                                        $clientTable.lastname, 
                                        $clientTable.email,
                                        $table.status,
                                        $table.date
                                    FROM 
                                        $table 
                                    INNER JOIN 
                                        $clientTable
                                    ON
                                        $clientTable.id = $table.User_id
                                    WHERE `status` = 'pending'
                                    ORDER BY
                                        $table.date
                                    DESC");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getDeniedAppointments()
    {
        $table = self::$table;

        $statement = $this->prepare("SELECT * FROM $table WHERE status = 'pending'");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function reschedule()
    {
        $table = self::$table;

        $statement = $this->prepare("UPDATE $table SET `date` = :date, `status` = :status WHERE id = :id");

        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':date', $this->date);
        $statement->bindValue(':status', $this->status);

        $statement->execute();

        return true;
    }



    public function acceptAppointment()
    {
        $table = static::$table;

        $statement = $this->prepare("UPDATE $table SET `status` = 'accepted' WHERE `id` = :id");

        $statement->bindValue(":id", $this->id);

        $statement->execute();
        
        return true;
    }

    public function deniedAppointment()
    {
        $table = static::$table;

        $statement = $this->prepare("UPDATE $table SET `status` = 'denied' WHERE `id` = :id");

        $statement->bindValue(":id", $this->id);

        $statement->execute();
        
        return true;
    }

    public function deleteAppointment()
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