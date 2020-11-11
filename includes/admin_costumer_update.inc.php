

<?php

require 'dbh.inc.php';

if (isset($_POST['admin-costumer-update-submit'])) {
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
  $sql = 'UPDATE costumer 
          SET cname = :cname, cdob = :cdob, cphone = :cphone, caddress = :caddress, cemail= :cemail, ccompany = :ccompany
          WHERE nit = :nit';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cname' => $cname, 'cdob' => $cdob, 'cphone' => $cphone, 'caddress' => $caddress, 'cemail' => $cemail, 'ccompany' => $ccompany, 'nit' => $nit]);


  
  header("Location: ../assets/cpanel.php?status=SUCCESS");
  exit();

} else {
  // code...
  header("Location: ../assets/cpanel.php");
  exit();
}
