

<?php

require 'dbh.inc.php';

if (isset($_POST['cpanel-signup-submit'])) {
  $cid = $_POST['cid'];
  $ctin = $_POST['ctin'];
  $cname = $_POST['cname'];
  $cphone = $_POST['cphone'];
  $caddress = $_POST['caddress'];
  $cpwd = $_POST['cpwd'];
  $cdob = $_POST['cdob'];
  $cemail = $_POST['cemail'];

  // optional parameters
  if (empty($_POST['cuser']) or empty($_POST['cemail']) or empty($_POST['cpwd'])) {
    $cuser = NULL;
    $cemail = NULL;
    $cpwd = NULL;
    $ob = FALSE;
  } else {
    $cuser = $_POST['cuser'];
    $cemail = $_POST['cemail'];
    $cpwd = $_POST['cpwd'];
    $ob = TRUE;
    $hashedPwd = password_hash($cpwd, PASSWORD_DEFAULT);
  }

  // Costumer ID shouldn't exist on record
  $sql = 'SELECT * FROM costumer WHERE cid = :cid';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cid' => $cid]);
  $result = $stmt->fetchAll();
  if (count($result) > 0) {
    // code...
    header("Location: ../assets/cpanel.php?status=ID_EXIST");
    exit();
  }
  // Costumer TIN shouldn't exist on record
  $sql = 'SELECT * FROM costumer WHERE ctin = :ctin';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['ctin' => $ctin]);
  $result = $stmt->fetchAll();
  if (count($result) > 0) {
    // code...
    header("Location: ../assets/cpanel.php?status=TIN_EXIST");
    exit();
  }

  if ($ob) {
    // username needs to be unique
    $sql = 'SELECT cuser FROM costumer WHERE cuser=:cuser';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['cuser' => $cuser]);
    $result = $stmt->fetchAll();
    if (count($result) > 0) { header("Location: ../assets/cpanel.php?status=USER_EXIST"); exit(); }

    // email needs to be unique
    $sql = 'SELECT cuser FROM costumer WHERE cemail=:cemail';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['cemail' => $cemail]);
    $result = $stmt->fetchAll();
    if (count($result) > 0) { header("Location: ../assets/cpanel.php?status=EMAIL_EXIST"); exit(); }
  }

  $sql = 'INSERT INTO costumer (cid, ctin, cname, cdob, cuser, cemail, cphone, cpassword, caddress, cadmin)
          VALUES (:cid, :ctin, :cname, :cdob, :cuser, :cemail, :cphone, :cpassword, :caddress, DEFAULT)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cid' => $cid, 'ctin' => $ctin, 'cname' => $cname, 'cdob' => $cdob, 'cuser' => $cuser, 'cemail' => $cemail, 'cphone' => $cphone, 'cpassword' => $hashedPwd, 'caddress' => $caddress]);
  header("Location: ../assets/cpanel.php?status=SIGNUP_SUCCESS");
  exit();

} else {
  // code...
  header("Location: ../assets/cpanel.php");
  exit();
}
