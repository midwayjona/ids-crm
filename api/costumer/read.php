<?php
require '../../vendor/autoload.php';

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/costumer.php';

// decode JWT
include_once '../../vendor/firebase/php-jwt/src/BeforeValidException.php';
include_once '../../vendor/firebase/php-jwt/src/ExpiredException.php';
include_once '../../vendor/firebase/php-jwt/src/SignatureInvalidException.php';
include_once '../../vendor/firebase/php-jwt/src/JWT.php';
use \Firebase\JWT\JWT;

// Instantiate DB and connect
$database = new Database();
$db = $database->connect();

// Instantiate Costumers object
$costumers = new Costumer($db);

// Costumers query
$result = $costumers->read();
// RowCout for verfication
$num = $result->rowCount();






// JWT Token DECODE
$header = apache_request_headers(); 
$jwt = $header['Authorization'];

$publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBAKrRu+P1qGOjtQXW5lLLKkvrQlO/SVa3
W8P1RPrY1CQ//nNVcIEePX6bEiZtsvMKHgtwZ7d57cK8niUsPvQe8B0CAwEAAQ==
-----END PUBLIC KEY-----
EOD;


$decoded = JWT::decode($jwt, $publicKey, array('RS256'));
print_r($decoded);
// /*
//  NOTE: This will now be an object instead of an associative array. To get
//  an associative array, you will need to cast it as such:
// */

// $decoded_array = (array) $decoded;
// echo "Decode:\n" . print_r($decoded_array, true) . "\n";




// $jwt = (json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $jwt)[1])))));
// echo $jwt->username;


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
