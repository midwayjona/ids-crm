<?php

require 'dbh.inc.php';

if (isset($_POST['close-ticket-submit'])) {
    $tid = $_POST['tid'];
    $tstatus = $_POST['tstatus'];

  $sql = 'UPDATE ticket SET tstatus = :tstatus WHERE tid = :tid';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['tid' => $tid, 'tstatus' => $tstatus]);

  header("Location: ../assets/cpanel.php?status=S100");
  exit();
} else {
  // code...
  header("Location: ../assets/cpanel.php");
  exit();
}

$conn = NULL;