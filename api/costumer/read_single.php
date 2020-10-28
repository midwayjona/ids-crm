<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/costumer.php';

// Instantiate DB and connect
$database = new Database();
$db = $database->connect();

// Instantiate Costumers object
$costumer = new Costumer($db);


// Costumers query


if (!(isset($_GET['nit']) OR isset($_GET['dpi']))) {
    # code...
    die();
} else {
    $costumer->nit = isset($_GET['nit']) ? $_GET['nit'] : $costumer->nit = 0;
    $costumer->dpi = isset($_GET['dpi']) ? $_GET['dpi'] : $costumer->dpi = 0;
}

// get costumer
$costumer->read_single();

// create array
$costumer_arr = array(
    'nit' => $costumer->nit,
    'dpi' => $costumer->dpi,
    'cname' => $costumer->cname,
    'cphone' => $costumer->cphone,
    'caddress' => $costumer->caddress,
    'cemail' => $costumer->cemail,
    'ccompany' => $costumer->ccompany,
    'cuser' => $costumer->cuser,
    'cpassword' => $costumer->cpassword
);

// json output
print_r(json_encode($costumer_arr));