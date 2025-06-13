<?php
class Project {
    private $conn;
    private $table = "projects";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function fetchAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
