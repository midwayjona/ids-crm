<?php

if (isset($_POST['signup-submit'])) {
  // code...
  require 'dbh.inc.php';


  $cid = $_POST['cid'];
  $cuser = $_POST['cuser'];
  $cmail = $_POST['cmail'];
  $cpwd = $_POST['cpwd'];

  $sql = 'SELECT * FROM costumer WHERE cid = :cid';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cid' => $cid]);
  $result = $stmt->fetchObject();


  if (empty($result)) {
    // if NULL cid not exist
    header("Location: ../assets/signup.php?status=ID_NOT_FOUND");
    exit();
  } elseif ($result->cuser != NULL) {
    // code...
    header("Location: ../assets/signup.php?status=ID_ASSIGNED");
    exit();
  }

  // username needs to be unique
  $sql = 'SELECT cuser FROM costumer WHERE cuser=:cuser';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cuser' => $cuser]);
  $result = $stmt->fetchAll();
  if (count($result) > 0) { header("Location: ../assets/signup.php?status=USER_EXIST"); exit(); }

  // email needs to be unique
  $sql = 'SELECT cemail FROM costumer WHERE cemail=:cemail';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cemail' => $cmail]);
  $result = $stmt->fetchAll();
  if (count($result) > 0) { header("Location: ../assets/signup.php?status=EMAIL_EXIST"); exit(); }

  // id, username and email verificated
  $sql = 'UPDATE costumer SET cuser=:cuser, cemail=:cemail, cpassword=:cpwd WHERE cid=:cid';
  $stmt = $conn->prepare($sql);
  $hashedPwd = password_hash($cpwd, PASSWORD_DEFAULT);
  $stmt->execute(['cuser' => $cuser, 'cemail' => $cmail, 'cpwd' => $hashedPwd, 'cid' => $cid]);
  header("Location: ../assets/signup.php?status=SUCCESS");
  exit();

} else {
  // code...
  header("Location: ../assets/signup.php");
  exit();
}

$conn = NULL;
