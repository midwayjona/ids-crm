

<?php

require 'dbh.inc.php';

if (isset($_POST['card-register-submit'])) {
  $cnumber = $_POST['cnumber'];
  $cid = $_POST['cid'];
  $cvv = $_POST['cvv'];
  $cexp_date = $_POST['cexp_date'];
  $climit = $_POST['climit'];

  $sql = 'INSERT INTO card (cnumber, cid, cvv, cexp_date, cissue_date, climit, cbalance)
          VALUES (:cnumber, :cid, :cvv, :cexp_date, DEFAULT, :climit, DEFAULT)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cnumber' => $cnumber, 'cid' => $cid, 'cvv' => $cvv, 'cexp_date' => $cexp_date, 'climit' => $climit]);
  header("Location: ../assets/cpanel.php?status=CARD_SUCCESS");
  exit();
} else {
  // code...
  header("Location: ../assets/cpanel.php");
  exit();
}

$conn = NULL;
