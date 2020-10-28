
<?php
require 'dbh.inc.php';

$cnumber=$_GET['tarjeta'];
$cname=$_GET['nombre'];
$cexp_date=$_GET['fecha_venc'];
$cvv=$_GET['num_seguridad'];
$amount=$_GET['monto'];
$cmpyID=$_GET['tienda'];
$format=$_GET['formato'];

// VERIFIATION
$sql = 'SELECT cnumber FROM card WHERE cnumber = :cnumber';
$stmt = $conn->prepare($sql);
$stmt->execute(['cnumber' => $cnumber]);
$row = $stmt->fetchAll();

// credit card issuer parameters
$issuer = 'Master Card';
$status = 'DENEGADO';
$refnumber = '0';

if (count($row) == 0) {
  // code...
  if ($format=="XML" || $format=="xml") {
    echo "<autorizacion>\n";
      echo "\t<emisor>N/A</emisor>\n";
      echo "\t<tarjeta>$cnumber</tarjeta>\n";
      echo "\t<status>$status</status>\n";
      echo "\t<autorizacion>$refnumber</autorizacion>\n";
    echo "</autorizacion>\n";
  } elseif ($format=="JSON"||$format=="json") {
    echo "{\"autorización\": {
      \"emisor\":\"N/A\",
      \"tarjeta\":\"$cnumber\",
      \"status\":\"$status\",
      \"numero\": \"$refnumber\"
      }
    }";
  }
  exit();
}

$sql = 'SELECT * FROM cmpyName WHERE cmpyID = :cmpyID';
$stmt = $conn->prepare($sql);
$stmt->execute(['cmpyID' => $cmpyID]);
$row = $stmt->fetchObject();
if ($row == FALSE) {
  // code...
  $cmpyName = $cmpyID;
} else {
  // code...
  $cmpyName = $row->cmpyname;
}

$sql = 'SELECT cnumber, card.cid, cexp_date, cissue_date, climit, cbalance, cname, cvv
        FROM card
          LEFT JOIN costumer
            ON costumer.cid = card.cid
        WHERE card.cnumber = :cnumber';
$stmt = $conn->prepare($sql);
$stmt->execute(['cnumber' => $cnumber]);
$row = $stmt->fetchObject();

// amount + balance < card.limit


$cbalance = $row->cbalance;
$amount_calc = $amount + $cbalance ;
// date format to yyyymm
$newDate = date("Ym", strtotime($row->cexp_date));
// description
$dscr = 'order from '.$cmpyName;
$ttype = 'debit';
$tcat = rand(0, 3);

if ($cvv == $row->cvv && $amount_calc <= $row->climit && $cexp_date == $newDate && $cname == $row->cname) {
  // transaction log
  $sql = 'INSERT INTO transactions ( tid, cnumber, ttype, tdate, tcat, description, tamount, cbalance )
          VALUES ( DEFAULT, :cnumber, :ttype, DEFAULT, :tcat, :dscr, :tamount, :cbalance )';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['cnumber' => $cnumber, 'ttype' => $ttype, 'tcat' => $tcat, 'dscr' => $dscr, 'tamount' => $amount, 'cbalance' => $amount_calc]);

  // ref number [SERIAL]
  $sql = 'SELECT LASTVAL()';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetchObject();
  $refnumber = $row->lastval;

  // update card balance
  $sql = 'UPDATE card SET cbalance = :newBalance WHERE cnumber = :cnumber';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['newBalance' => $amount_calc, 'cnumber' => $cnumber]);

  // set issuer parameters
  $status = 'APROBADO';
  $refnumber = sprintf("%010s", $refnumber);
}

if ($format=="XML" || $format=="xml") {
  echo "<autorizacion>\n";
    echo "\t<emisor>$issuer</emisor>\n";
    echo "\t<tarjeta>$cnumber</tarjeta>\n";
    echo "\t<status>$status</status>\n";
    echo "\t<autorizacion>$refnumber</autorizacion>\n";
  echo "</autorizacion>\n";
} elseif ($format=="JSON"||$format=="json") {
  echo "{\"autorización\": {
    \"emisor\":\"$issuer\",
    \"tarjeta\":\"$cnumber\",
    \"status\":\"$status\",
    \"numero\": \"$refnumber\"
    }
  }";
}
