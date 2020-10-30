

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
  
  
  header("Location: ../assets/cpanel.php?status=SIGNUP_SUCCESS");
  exit();

} else {
  // code...
  header("Location: ../assets/cpanel.php");
  exit();
}
