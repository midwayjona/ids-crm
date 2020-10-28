<?php

$dbHost = 'localhost';
//local
$dbName = 'ids_crm';
$dbUser = 'ids_crm_su';
$dbPassword = 'crmpass';

// Set DSN (datasource name)
$dbDSN = 'mysql:host='.$dbHost.';dbname='.$dbName;

// PDO Instance
try {
    $conn = new PDO($dbDSN, $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo $e->getMessage();
}
