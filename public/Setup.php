<?php

class Setup
{
    public string $dsn;
    public string $host;
    public string $user;
    public string $password;
    public string $database;
    
    function __construct(array $config)
    {
        $this->dsn = $config['dsn'];
        $this->user = $config['user'];
        $this->password = $config['password'];

        $var = explode(';', $config['dsn']);
        $var2 = implode('=', $var);
        $var3 = explode('=', $var2);

        $this->database = $var3[3];

        $host[] = $var[0];
        $host[] = $var[2];

        $this->host = implode(';', $host);

        try
        {
            $this->createDatabase();

            $conn = new PDO($this->dsn, $this->user, $this->password);

            $this->createTables($conn);

            $this->insertAdminRootAccount($conn);

            echo "<br><br>Done... Please refresh the browser to continue.";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        die();
    }


    protected function createDatabase()
    {
        try
        {
            $conn = new PDO($this->host, $this->user, $this->password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE $this->database";

            $conn->exec($sql);

            echo "Database created successfully<br><br>";
        }
        catch(Exception $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    protected function createTables($conn)
    {

        try
        {
            $sql = "CREATE TABLE IF NOT EXISTS `service` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(45) DEFAULT NULL,
                `description` text,
                `price` float DEFAULT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";
            
            $conn->exec($sql);

            echo "Table Service created successfully<br>";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        try
        {
            $sql = "CREATE TABLE IF NOT EXISTS `staff` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `firstname` varchar(45) DEFAULT NULL,
                `lastname` varchar(45) DEFAULT NULL,
                `email` varchar(45) DEFAULT NULL,
                `password` varchar(128) DEFAULT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";

            $conn->exec($sql);

            echo "Table Staff created successfully<br>";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        try
        {
            $sql = "CREATE TABLE IF NOT EXISTS `user` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `firstname` varchar(45) DEFAULT NULL,
                `lastname` varchar(45) DEFAULT NULL,
                `email` varchar(45) DEFAULT NULL,
                `password` varchar(128) DEFAULT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8";

            $conn->exec($sql);

            echo "Table User created successfully<br>";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        try
        {
            $sql = "CREATE TABLE IF NOT EXISTS `appointment` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `date` date DEFAULT NULL,
                `User_id` int(11) NOT NULL,
                `Service_id` int(11) NOT NULL,
                `status` varchar(45) DEFAULT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8";

            $conn->exec($sql);

            echo "Table Appointment created successfully<br>";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    protected function insertAdminRootAccount($conn)
    {

        try
        {
            $sql = "INSERT INTO `staff` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
            (5, 'Admin', 'Admin', 'admin@admin.com', '$2y$10$.aAhUKB7OZvEwC2dzcaV/emxinXFo.Io52xtUJ0eJIooa4FGfSc9W')";

            $conn->exec($sql);

            echo "Staff user added successfully.<br>";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}

