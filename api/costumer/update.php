<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
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

if (!(isset($_GET['nit']) OR isset($_GET['dpi']))) {
    # code...
    die();
} else {
    $costumer->nit = isset($_GET['nit']) ? $_GET['nit'] : $costumer->nit = 0;
    $costumer->dpi = isset($_GET['dpi']) ? $_GET['dpi'] : $costumer->dpi = 0;
}


$costumer->cname = $data->cname;
$costumer->cdob = $data->cdob;
$costumer->cphone = $data->cphone;
$costumer->caddress = $data->caddress;
$costumer->cemail = $data->cemail;
$costumer->ccompany = $data->ccompany;


$sql = 'SELECT * FROM costumer WHERE nit = :nit OR dpi = :dpi';
$stmt = $db->prepare($sql);
$stmt->execute(['nit' => $costumer->nit, 'dpi' => $costumer->dpi]);
$num = $stmt->rowCount();

if ($num == 0) {
    # code...
    echo json_encode(
        array('message' => 'Costumer doesn\'t exist')
    );
    die();
}


// update costumer
if ($costumer->update()) {
    # code...
    echo json_encode(
        array('message' => 'Costumer updated',
                'nit' => $costumer->nit)
    );
} else {
    echo json_encode(
        array('message' => 'Costumer not updated')
    );
}