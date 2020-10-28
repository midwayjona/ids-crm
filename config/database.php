<?php

class Database {
    // DB Parameters
    private $host = 'ec2-3-218-75-21.compute-1.amazonaws.com';
    private $db_name = 'dcqgflp27ndde1';
    private $username = 'vgnfbeovpvnijf';
    private $password = '620fc3b1d71d1c9ecef8408db8b411f8099f59bd0388991635a1d9b009423b8d';
    private $port = '5432';
    private $dbDSN;
    private $conn;
    
    // DB connection
    public function connect() {
        $this->conn = null;
        $this->dbDSN = 'pgsql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db_name;
        
        try {
            $this->conn = new PDO($this->dbDSN, $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error ' . $e->getMessage();
        }
        return $this->conn;
    }
}