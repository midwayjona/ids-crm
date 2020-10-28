

<?php

require 'dbh.inc.php';

if (isset($_POST['card-pay-submit'])) {
  $cnumber = $_POST['cnumber'];
  $caccount = $_POST['caccount'];
  $amount = $_POST['pamount'];

  // log
  $ttype = 'deposit';
  $tcat = 4;
  $dscr = 'thank you for your payment';

  $sql = 'SELECT * FROM card WHERE cnumber = :cnumber';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cnumber' => $cnumber]);
  $crow = $stmt->fetchObject();

  $sql = 'SELECT * FROM checking WHERE caccount = :caccount';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['caccount' => $caccount]);
  $arow = $stmt->fetchObject();

  if ($amount > $arow->cfund) {
    // code...
    header("Location: ../assets/dashboard.php?status=NO_FUND");
    exit();
  }

  $cbalance = $crow->cbalance - $amount;
  $cfund = $arow->cfund - $amount;

  echo "<br>new balance is ".$cbalance;
  echo "<br>new balance is ".$cfund;

  $sql = 'UPDATE card SET cbalance=:cbalance WHERE cnumber=:cnumber';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cbalance' => $cbalance, 'cnumber' => $cnumber]);

  $sql = 'UPDATE checking SET cfund=:cfund WHERE caccount=:caccount';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cfund' => $cfund, 'caccount' => $caccount]);

  // transaction log
  $sql = 'INSERT INTO transactions ( tid, cnumber, ttype, tdate, tcat, description, tamount, cbalance)
          VALUES ( DEFAULT, :cnumber, :ttype, DEFAULT, :tcat, :dscr, :tamount, :cbalance)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cnumber' => $cnumber, 'ttype' => $ttype, 'tcat' => $tcat, 'dscr' => $dscr, 'tamount' => $amount, 'cbalance' => $cbalance]);

  header("Location: ../assets/dashboard.php?status=PAY_SUCCESS");
  exit();
} else {
  // code...
  header("Location: ../assets/dashboard.php");
  exit();
}

$conn = NULL;
