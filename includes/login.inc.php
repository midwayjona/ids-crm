<?php

// decode JWT
include_once '../vendor/firebase/php-jwt/src/BeforeValidException.php';
include_once '../vendor/firebase/php-jwt/src/ExpiredException.php';
include_once '../vendor/firebase/php-jwt/src/SignatureInvalidException.php';
include_once '../vendor/firebase/php-jwt/src/JWT.php';
use \Firebase\JWT\JWT;

if (isset($_POST['login-submit'])) {
    // code...
    require 'dbh.inc.php';

    $cuser = $_POST['cuser'];
    $cpwd = $_POST['cpwd'];

    $publicKey = <<<EOD
    -----BEGIN PUBLIC KEY-----
    MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBAKrRu+P1qGOjtQXW5lLLKkvrQlO/SVa3
    W8P1RPrY1CQ//nNVcIEePX6bEiZtsvMKHgtwZ7d57cK8niUsPvQe8B0CAwEAAQ==
    -----END PUBLIC KEY-----
    EOD;

    $body = '{"username":"'.$cuser.'","password":"'.$cpwd.'"}';


    $url = 'https://auth.zer0th.com/api/node/user/auth';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
      ]);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode($response);

    if ($data->success == false) {
        # code...
        header("Location: ../index.php?status=WRONG_LOGIN");
        exit();
    }

    $jwt = $data->data->token;
    $decoded = JWT::decode($jwt, $publicKey, array('RS256'));
    print_r($decoded);
    
    $sql = 'SELECT * FROM costumer WHERE cuser = :cuser';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['cuser' => $cuser]);
    $result = $stmt->fetchObject();
    
    session_start();
    $_SESSION['nit'] = $result->nit;
    $_SESSION['dpi'] = $result->dpi;
    $_SESSION['cname'] = $result->cname;
    $_SESSION['cphone'] = $result->cphone;
    $_SESSION['cuser'] = $result->cuser;
    $_SESSION['cemail'] = $result->cemail;
    $_SESSION['cadmin'] = $result->cadmin;
    $_SESSION['ccompany'] = $result->ccompany;
    if ($_SESSION['cadmin']) {
        header("Location: ../assets/cpanel.php");
        exit();
    }

    header("Location: ../index.php?status=SUCCESS");
    exit();

    // OWN LOGIN SYSTEM
    // if (count($result) == 0) {
    //     // code...
    //     header("Location: ../index.php?status=USER_NOT_FOUND");
    //     exit();
    // } else {
    //     // code...
    //     $pwdCheck = password_verify($cpwd, $result->cpassword);
    //     if ($pwdCheck == false) {
    //         header("Location: ../index.php?status=WRONG_PWD");
    //         exit();
    //     } elseif ($pwdCheck == true) {
    //         // code...
    //         session_start();
    //         $_SESSION['nit'] = $result->nit;
    //         $_SESSION['dpi'] = $result->dpi;
    //         $_SESSION['cname'] = $result->cname;
    //         $_SESSION['cphone'] = $result->cphone;
    //         $_SESSION['cuser'] = $result->cuser;
    //         $_SESSION['cemail'] = $result->cemail;
    //         $_SESSION['cadmin'] = $result->cadmin;
    //         $_SESSION['ccompany'] = $result->ccompany;
    //         if ($_SESSION['cadmin']) {
    //             header("Location: ../assets/cpanel.php");
    //             exit();
    //         }
    //         header("Location: ../index.php?status=SUCCESS");
    //         exit();
    //     }
    // }
} else {
    header("Location: ../index.php");
    exit();
}
