<?php

class Dbpdo
{

    public $hostname = 'localhost';
    public $username = 'username';
    public $password = 'password';
    public $database = 'dbname';
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
            //set pdo error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'connected successfully';
        } catch (PDOException $e) {
            echo 'failed: ' . $e->getMessage();
        }

    }

    public function save($object)
    {
        $sql = '';

        if (!$object->getId()) {
            //insert
            $sql .= "INSERT INTO  user SET ";
        } else {
            //update
            $sql .= "UPDATE user SET ";
        }

        foreach ($object->getData() as $key => $value) {
            if ($key != 'id') {
                $sql .= $key . '="' . $value . '",';
            }//if($key != 'id')

        }

        $sql = rtrim($sql, ',');

        if ($object->getId()) {
            //update
            $sql .= "WHERE id=" . $object->getId();
        }

        // use exec() because no results are returned
        return $this->conn->exec($sql);

    }
}

?>