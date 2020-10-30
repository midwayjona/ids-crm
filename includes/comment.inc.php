<?php

require 'dbh.inc.php';

if (isset($_POST['add-comment-submit'])) {
  $tid = $_POST['tid'];
  $msg = $_POST['comment'];
  $ucid = $_POST['ucid'];

  $sql = 'INSERT INTO ticket_comment (tid, ucid, msg) VALUES (:tid, :ucid, :msg)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['tid' => $tid, 'ucid' => $ucid, 'msg' => $msg]);

  $sql = 'UPDATE ticket SET created = DEFAULT WHERE tid = :tid';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['tid' => $tid]);

  if ($ucid == 1) {
      # code...
      header("Location: ../assets/cpanel.php?status=S101");
      exit();
  } else {
      # code...
      header("Location: ../assets/dashboard.php?status=S101");
      exit();
  }
} else {
    if ($ucid == 1) {
        # code...
        header("Location: ../assets/cpanel.php");
        exit();
    } else {
        # code...
        header("Location: ../assets/dashboard.php");
        exit();
    }
}

$conn = NULL;