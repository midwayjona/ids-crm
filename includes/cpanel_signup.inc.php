

<?php

require 'dbh.inc.php';

if (isset($_POST['cpanel-signup-submit'])) {
  $nit = $_POST['nit'];
  $dpi = $_POST['dpi'];
  $cname = $_POST['cname'];
  $cdob = $_POST['cdob'];
  $cphone = $_POST['cphone'];
  $caddress = $_POST['caddress'];
  $cemail = $_POST['cemail'];
  $ccompany = $_POST['ccompany'];

  // HASHING PASS
  $cuser = $nit;
  $cpwd = date("Ym", strtotime($cdob));
  $cpassword = password_hash($cpwd, PASSWORD_DEFAULT);
  

  // Costumer ID shouldn't exist on record
  $sql = 'SELECT * FROM costumer WHERE nit = :nit OR dpi = :dpi';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['nit' => $nit, 'dpi' => $dpi]);
  $num = $stmt->rowCount();
  
  if ($num > 0) {
    # code...
    header("Location: ../assets/cpanel.php?status=ID_EXIST");
    exit();
  }

  // ADD COSTUMER
  $sql = 'INSERT INTO costumer (nit, dpi, cname, cdob, cphone, caddress, cemail, ccompany, cuser, cpassword, cadmin)
          VALUES (:nit, :dpi, :cname, :cdob, :cphone, :caddress, :cemail, :ccompany, :cuser, :cpassword, DEFAULT)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['nit' => $nit, 'dpi' => $dpi, 'cname' => $cname, 'cdob' => $cdob, 'cphone' => $cphone, 'caddress' => $caddress, 'cemail' => $cemail, 'ccompany' => $ccompany, 'cuser' => $cuser, 'cpassword' => $cpassword]);

  // ADD STATUS PROGRAM TO COSTUMER
  $sql = 'INSERT INTO cstatus (nit) VALUES (:nit)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['nit' => $nit]);


  $body = '{
    "username": "'.$nit.'",
    "email": "'.$cemail.'",
    "fullname": "'.$cname.'",
    "password": "'.$cpwd.'"
  }';

  $token = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyaWQiOjMyLCJ1c2VybmFtZSI6InNlcnZpY2Vjcm0iLCJlbWFpbCI6IiIsImZ1bGxuYW1lIjoiQ3VlbnRhIGRlIHNlcnZpY2lvIHBhcmEgQ1JNIiwiYXBwbGljYXRpb25zIjpbeyJuYW1lIjoic2VjdXJpdHkiLCJub2RlaWQiOjIsInJpZ2h0cyI6eyJncm91cHMiOltdLCJyb2xlcyI6WyJub2RlYWRtaW4iXSwicGVybWlzc2lvbnMiOlsibm9kZToxNDphbGwiXX19XSwiaWF0IjoxNjA1MTMwMTM0LCJleHAiOjE2MDc3MjIxMzQsImF1ZCI6Imh0dHA6Ly9pbmdlbmllcmlhZGVzb2Z0d2FyZTIwMjAuY29tIiwiaXNzIjoiU3VwZXIgRVJQIDMwMDAiLCJzdWIiOiJ1c2VyQGVycDMwMDAuY29tIn0.SNjI_ZOuNwDYl3XuPoWG4A12kqU0DqV9txT8T8Y4vR9Y7YO7jvlbMjV3g7PqeekqkVHWDlZn-yVVPzAgRIy0xg';
  $url = 'https://auth.zer0th.com/api/node/user/create';
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Authorization: '.$token,
    'Content-Type: application/json'
    ]);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

  $response = curl_exec($curl);
  curl_close($curl);
  $data = json_decode($response);

  print_r($response);

  print_r($data);

  if ($data->success == true) {
    # code..
    header("Location: ../assets/cpanel.php?status=SIGNUP_SUCCESS");
    exit();
  } else {
    header("Location: ../assets/cpanel.php?status=ERROR");
    exit();
  }

} else {
  // code...
  header("Location: ../assets/cpanel.php");
  exit();
}
