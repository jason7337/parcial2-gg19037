<?php


namespace app\models;


class Database {
    private $host = "db";
    private $db_name = "creditos";
    private $username = "appuser";
    private $password = "apppass";
    public $conn;

    
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $exception) {
            echo "Error de conexion: " . $exception->getMessage();
        }
        return $this->conn;
    }
}


?>
