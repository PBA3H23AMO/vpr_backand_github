<?php
class Database {
    private $host = "mysql.pb.bib.de";
    private $db_name = "media_locale";
    private $username = "vpr_pbat3h23a";
    private $password = "SBHwIWNqmMevnlqt";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",
                                  $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
