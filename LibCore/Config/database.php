<?php
class Database {
    private $host = "localhost";
    private $db_name = "library";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            // Zdna \ qbel PDO bach PHP i-3refha
            $this->conn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $exception) {
            echo "Error in connexion: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
