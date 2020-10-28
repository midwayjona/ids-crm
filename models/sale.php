<?php

class Sale {
    // DB handlers
    private $conn;
    private $table = 'sale';

    // Sale properties
    public $store_id;
    public $poit_of_sales_id;
    public $invoice_id;
    public $nit;
    public $externally_created;
    public $total;
    public $total_discount;
    public $total_sale;
    public $sstatus;
    public $created_at;
    public $created_by;
    public $updated_at;
    public $updated_by;

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }


    // create a new costumer
    public function create() {
        // query
        $query = 'INSERT INTO sale (store_id, poit_of_sales_id, invoice_id, nit, externally_created, total, total_discount, total_sale, sstatus, is_delivery, created_at, created_by, updated_at, updated_by)
                    VALUES (:store_id, :poit_of_sales_id, :invoice_id, :nit, :externally_created, :total, :total_discount, :total_sale, :sstatus, :is_delivery, :created_at, :created_by, :updated_at, :updated_by)';
        
        // prep stmt
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->store_id = htmlspecialchars(strip_tags($this->store_id));
        $this->poit_of_sales_id = htmlspecialchars(strip_tags($this->poit_of_sales_id));
        $this->invoice_id = htmlspecialchars(strip_tags($this->invoice_id));
        $this->nit = htmlspecialchars(strip_tags($this->nit));
        $this->externally_created = htmlspecialchars(strip_tags($this->externally_created));
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->total_discount = htmlspecialchars(strip_tags($this->total_discount));
        $this->total_sale = htmlspecialchars(strip_tags($this->total_sale));
        $this->sstatus = htmlspecialchars(strip_tags($this->sstatus));
        $this->is_delivery = htmlspecialchars(strip_tags($this->is_delivery));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));
        $this->created_by = htmlspecialchars(strip_tags($this->created_by));
        $this->updated_at = htmlspecialchars(strip_tags($this->updated_at));
        $this->updated_by = htmlspecialchars(strip_tags($this->updated_by));

        // bind data
        $stmt->bindParam(':store_id', $this->store_id);
        $stmt->bindParam(':poit_of_sales_id', $this->poit_of_sales_id);
        $stmt->bindParam(':invoice_id', $this->invoice_id);
        $stmt->bindParam(':nit', $this->nit);
        $stmt->bindParam(':externally_created', $this->externally_created);
        $stmt->bindParam(':total', $this->total);
        $stmt->bindParam(':total_discount', $this->total_discount);
        $stmt->bindParam(':total_sale', $this->total_sale);
        $stmt->bindParam(':sstatus', $this->sstatus);
        $stmt->bindParam(':is_delivery', $this->is_delivery);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':created_by', $this->created_by);
        $stmt->bindParam(':updated_at', $this->updated_at);
        $stmt->bindParam(':updated_by', $this->updated_by);

        if ($stmt->execute()) {
            // sale created successfully
            return true;
        }
        return false;
    }


















}