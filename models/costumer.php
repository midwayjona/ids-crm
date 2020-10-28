<?php

class Costumer {
    // DB handlers
    private $conn;
    private $table = 'costumer';

    // Costumer properties
    public $nit;
    public $dpi;
    public $cname;
    public $cphone;
    public $caddress;
    public $cemail;
    public $ccompany;
    public $cuser;
    public $cpassword;
    public $cstatus;

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    // Get Costumers
    public function read() {
        // Query
        $query = '
            SELECT
                s.cstatus as cstatus,
                c.nit,
                c.dpi,
                c.cname,
                c.cdob,
                c.cphone,
                c.caddress,
                c.cemail,
                c.ccompany,
                c.cuser,
                c.cpassword
            FROM
                ' . $this->table . ' c
            LEFT JOIN
                cstatus s ON c.nit = s.nit
            WHERE
                cadmin = false
            ORDER BY
                c.cname ASC';
        // Prep stmt
        $stmt = $this->conn->prepare($query);

        // Exec query
        $stmt->execute();

        return $stmt;
    }


    // get a single costumer
    public function read_single() {
        // Query
        $query = '
            SELECT
                s.cstatus as cstatus,
                c.nit,
                c.dpi,
                c.cname,
                c.dob,
                c.cphone,
                c.caddress,
                c.cemail,
                c.ccompany,
                c.cuser,
                c.cpassword
            FROM
                ' . $this->table . ' c
            LEFT JOIN
                cstatus s ON c.nit = s.nit
            WHERE
                c.nit = :nit OR c.dpi = :dpi
            LIMIT 0,1
                ';

        // Prep stmt
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['nit' => $this->nit, 'dpi' => $this->dpi]);
        $row = $stmt->fetchObject();

        $this->nit = $row->nit;
        $this->dpi = $row->dpi;
        $this->cname = $row->cname;
        $this->cphone = $row->cphone;
        $this->caddress = $row->caddress;
        $this->cemail = $row->cemail;
        $this->ccompany = $row->ccompany;
        $this->cuser = $row->cuser;
        $this->cpassword = $row->cpassword;
    }

    // create a new costumer
    public function create() {
        // query
        $query = 'INSERT INTO costumer (nit, dpi, cname, cphone, caddress, cemail, ccompany, cuser, cpassword, cadmin)
                    VALUES (:nit, :dpi, :cname, :cphone, :caddress, :cemail, :ccompany, :cuser, :cpassword, DEFAULT)';
        
        // prep stmt
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->nit = htmlspecialchars(strip_tags($this->nit));
        $this->dpi = htmlspecialchars(strip_tags($this->dpi));
        $this->cname = htmlspecialchars(strip_tags($this->cname));
        $this->cphone = htmlspecialchars(strip_tags($this->cphone));
        $this->caddress = htmlspecialchars(strip_tags($this->caddress));
        $this->cemail = htmlspecialchars(strip_tags($this->cemail));
        $this->ccompany = htmlspecialchars(strip_tags($this->ccompany));
        $this->cuser = htmlspecialchars(strip_tags($this->cuser));
        $this->cpassword = htmlspecialchars(strip_tags($this->cpassword));

        // bind data
        $stmt->bindParam(':nit', $this->nit);
        $stmt->bindParam(':dpi', $this->dpi);
        $stmt->bindParam(':cname', $this->cname);
        $stmt->bindParam(':cphone', $this->cphone);
        $stmt->bindParam(':caddress', $this->caddress);
        $stmt->bindParam(':cemail', $this->cemail);
        $stmt->bindParam(':ccompany', $this->ccompany);
        $stmt->bindParam(':cuser', $this->cuser);
        $stmt->bindParam(':cpassword', $this->cpassword);

        if ($stmt->execute()) {
            # code...
            $sql = 'INSERT INTO cstatus (nit)
                    VALUES (:nit)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['nit' => $this->nit]);
            return true;
        }
        // print error
        return false;
    }

    // update a costumer
    public function update() {
        // query
        $query = 'UPDATE ' . $this->table . ' 
                SET 
                    cname = :cname,
                    cphone = :cphone,
                    caddress = :caddress,
                    cemail = :cemail,
                    ccompany = :ccompany,
                    cuser = :cuser,
                    cpassword = :cpassword
                WHERE
                    nit = :nit OR dpi = :dpi';
        
        // prep stmt
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->nit = htmlspecialchars(strip_tags($this->nit));
        $this->dpi = htmlspecialchars(strip_tags($this->dpi));
        $this->cname = htmlspecialchars(strip_tags($this->cname));
        $this->cphone = htmlspecialchars(strip_tags($this->cphone));
        $this->caddress = htmlspecialchars(strip_tags($this->caddress));
        $this->cemail = htmlspecialchars(strip_tags($this->cemail));
        $this->ccompany = htmlspecialchars(strip_tags($this->ccompany));
        $this->cuser = htmlspecialchars(strip_tags($this->cuser));
        $this->cpassword = htmlspecialchars(strip_tags($this->cpassword));

        // bind data
        $stmt->bindParam(':nit', $this->nit);
        $stmt->bindParam(':dpi', $this->dpi);
        $stmt->bindParam(':cname', $this->cname);
        $stmt->bindParam(':cphone', $this->cphone);
        $stmt->bindParam(':caddress', $this->caddress);
        $stmt->bindParam(':cemail', $this->cemail);
        $stmt->bindParam(':ccompany', $this->ccompany);
        $stmt->bindParam(':cuser', $this->cuser);
        $stmt->bindParam(':cpassword', $this->cpassword);

        if ($stmt->execute()) {
            # code...
            return true;
        }
        // print error
        return false;
    }
}