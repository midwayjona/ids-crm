

<?php

require 'dbh.inc.php';

if (isset($_POST['admin-costumer-delete-submit'])) {
  $nit = $_POST['nit'];

  // DELETE 
  $sql = 'DELETE FROM costumer WHERE nit = :nit';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['nit' => $nit]);


  
  header("Location: ../assets/cpanel.php?status=SUCCESS");
  exit();

} else {
  // code...
  header("Location: ../assets/cpanel.php");
  exit();
}
