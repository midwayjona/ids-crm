<?php

require 'dbh.inc.php';

if (isset($_POST['create-ticket-form'])) {
    $nit = $_POST['nit'];
    $title = $_POST['title'];
    $msg = $_POST['msg'];

    echo $nit.'\n';
    echo $title.'\n';
    echo $msg.'\n';

  $sql = 'INSERT INTO ticket (nit, msg) VALUES (:nit, :msg)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['nit' => $nit, 'msg' => $title]);

  // GET LAST INSERT ID
  $sql = 'SELECT LASTVAL()';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetchObject();
  $refnumber = $row->lastval;

  $sql = 'INSERT INTO ticket_comment (tid, ucid, msg) VALUES (:tid, 0, :msg)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['tid' => $refnumber, 'msg' => $msg]);




  header("Location: ../assets/dashboard.php?status=S101");
  exit();
} else {
  // code...
  header("Location: ../assets/dashboard.php");
  exit();
}

$conn = NULL;