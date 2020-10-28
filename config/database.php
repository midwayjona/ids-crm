<?php

class Database {
    // DB Parameters
    private $host = 'localhost';
    private $db_name = 'ids_crm';
    private $username = 'ids_crm_su';
    private $password = 'crmpass';
    private $dbDSN;
    private $conn;
    
    // DB connection
    public function connect() {
        $this->conn = null;
        $this->dbDSN = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        
        try {
            $this->conn = new PDO($this->dbDSN, $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error ' . $e->getMessage();
        }
        return $this->conn;
    }
}