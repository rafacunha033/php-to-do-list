<?php 


namespace Database;

use Exception;
use PDO;

class DB {

    public $host;
    public $user;
    public $password;
    public $dbname;
    public $conn;

    public function __construct($host, $user, $password, $dbname)
    {
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        try {
            $this->conn = new PDO('mysql:host='.$this->host.
                ';dbname='.$this->dbname,
                $this->user, $this->password
            );

            echo 'Connection made';
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function add($table, $params, $values)
    {
        // echo 'INSERT INTO '.$table.' VALUES (:name, :description, :completed)';
        // echo 'INSERT INTO '.$table.' VALUES (:'.implode(", :", $values).')';
        $stmt = $this->conn->prepare('INSERT INTO '.$table.'('.implode(',',$params).') VALUES (:'.implode(', :', $params).')');
        $stmt->execute($values);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}



