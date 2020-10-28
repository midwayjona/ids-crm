<?php

$dbHost = 'ec2-3-218-75-21.compute-1.amazonaws.com';
//local
$dbName = 'dcqgflp27ndde1';
$dbUser = 'vgnfbeovpvnijf';
$dbPassword = '620fc3b1d71d1c9ecef8408db8b411f8099f59bd0388991635a1d9b009423b8d';
$dbPort = '5432';

// Set DSN (datasource name)
$dbDSN = 'pgsql:host='.$dbHost.';port='.$dbPort.';dbname='.$dbName;

// PDO Instance
try {
    $conn = new PDO($dbDSN, $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo $e->getMessage();
}
