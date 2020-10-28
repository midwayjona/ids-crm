<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/costumer.php';

// Instantiate DB and connect
$database = new Database();
$db = $database->connect();

// Instantiate Costumers object
$costumer = new Costumer($db);

// get data
$data = json_decode(file_get_contents("php://input"));

$costumer->nit = $data->nit;
$costumer->dpi = $data->dpi;
$costumer->cname = $data->cname;
$costumer->cdob = $data->cdob;
$costumer->cphone = $data->cphone;
$costumer->caddress = $data->caddress;
$costumer->cemail = $data->cemail;
$costumer->ccompany = $data->ccompany;

// generate user and password
$costumer->cuser = $data->nit;
$costumer->cpassword = date("Ym", strtotime($data->cdob));



// $costumer->cuser = $data->cuser;
// $costumer->cpassword = $data->cpassword;

// costumer verification
$sql = 'SELECT * FROM costumer WHERE nit = :nit OR dpi = :dpi';
$stmt = $db->prepare($sql);
$stmt->execute(['nit' => $data->nit, 'dpi' => $data->dpi]);
$num = $stmt->rowCount();

if ($num > 0) {
    # code...
    echo json_encode(
        array('message' => 'Costumer already exist')
    );
    die();
}


// create costumer
if ($costumer->create()) {
    # code...
    echo json_encode(
        array('message' => 'Costumer created')
    );
} else {
    echo json_encode(
        array('message' => 'Costumer not created')
    );
}