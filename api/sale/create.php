<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/sale.php';

// Instantiate DB and connect
$database = new Database();
$db = $database->connect();

// Instantiate Costumers object
$sale = new Sale($db);

// get data
$data = json_decode(file_get_contents("php://input"));

$sale->store_id = $data->store_id;
$sale->poit_of_sales_id = $data->poit_of_sales_id;
$sale->invoice_id = $data->invoice_id;
$sale->nit = $data->nit;
$sale->externally_created = $data->externally_created;
$sale->total = $data->total;
$sale->total_discount = $data->total_discount;
$sale->total_sale = $data->total_sale;
$sale->sstatus = $data->sstatus;
$sale->created_at = $data->created_at;
$sale->created_by = $data->created_by;
$sale->updated_at = $data->updated_at;
$sale->updated_by = $data->updated_by;



// if ($num > 0) {
//     # code...
//     echo json_encode(
//         array('message' => 'Costumer already exist')
//     );
//     die();
// }


// create costumer
if ($costumer->create()) {
    # code...
    echo json_encode(
        array('message' => 'Sale saved')
    );
} else {
    echo json_encode(
        array('message' => 'Sale not saved')
    );
}