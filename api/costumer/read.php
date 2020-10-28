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
$costumers = new Costumer($db);

// Costumers query
$result = $costumers->read();
// RowCout for verfication
$num = $result->rowCount();

// check if entrys
if ($num > 0) {
    $costumers_arr = array();
    $costumers_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $costumer_item = array(
            'nit' => $nit,
            'dpi' => $dpi,
            'cname' => $cname,
            'cdob' => $cdob,
            'cphone' => $cphone,
            'caddress' => $caddress,
            'cemail' => $cemail,
            'ccompany' => $ccompany,
            'cstatus' => $cstatus
        );

        // Push to 'data'
        array_push($costumers_arr['data'], $costumer_item);
    }
    // convert to json
    echo json_encode($costumers_arr, JSON_PRETTY_PRINT);

} else {
    // no entries
    echo json_encode(
        array('message' => 'No Costumers Found')
    );
}
