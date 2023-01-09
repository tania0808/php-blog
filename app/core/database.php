<?php

class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    protected function connect(){
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = 'root';
        $this->dbname = 'php-blog';
        $this->charset = 'utf8mb4';
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $dsn = "mysql:host=$this->servername;dbname=$this->dbname;charset=$this->charset";
            $pdo = new PDO($dsn, $this->username, $this->password, $options);
            return $pdo;
        } catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function query($query, $data = [], $data_type = 'object'){
        $connection = $this->connect();
        $statement = $connection->prepare($query);

        if($statement){
            $check = $statement->execute($data);
            if($check){
                if($data_type = 'object'){
                    $result = $statement->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }
            }
        }
        if(is_array($result) && count($result) > 0){
            return $result;
        }
        return false;
    }
}