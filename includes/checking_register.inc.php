

<?php

require 'dbh.inc.php';

if (isset($_POST['checking-register-submit'])) {
  $cid = $_POST['cid'];
  $cfund = $_POST['cfund'];

  $sql = 'INSERT INTO checking (caccount, cid, caperture_date, cfund)
          VALUES (DEFAULT, :cid, DEFAULT, :cfund)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cid' => $cid, 'cfund' => $cfund]);
  header("Location: ../assets/cpanel.php?status=SUCCESS");
  exit();
} else {
  // code...
  header("Location: ../assets/cpanel.php");
  exit();
}

$conn = NULL;
