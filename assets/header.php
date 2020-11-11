<!-- relative root -->
<?php
date_default_timezone_set("America/Guatemala");
if (!isset($_SESSION)) {
    session_start();
}
$path = '/';
setlocale(LC_MONETARY, 'en_US.utf8');
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Relationship Management</title>
    <link rel='icon' href='/assets/media/logo.svg' type='image/x-icon'/ >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php $path ?>assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</head>


<body>
  <header id="topheader">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">


      <?php


      if (isset($_SESSION['cadmin'])) {
          if ($_SESSION['cadmin']) {
              // code...
              echo '
          <a class="navbar-brand" href="'.$path.'assets/cpanel.php">
            <img src="'.$path.'assets/media/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Customer Relationship Management
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">cPanel</a>
              </li>
            </ul>
            <span class="navbar-text">
            Welcome <h5 class="d-inline mx-1"><a href="'.$path.'assets/cpanel.php">'.$_SESSION['cname'].'</a></h5>
            </span>
            <form class="form-inline my-2 my-lg-0" action="'.$path.'includes/logout.inc.php" method="post">
              <button class="btn btn-outline-dark mx-2" type="summit" name="logout-submit">Logout</button>
            </form>
          ';
          } else {
              // code...
              echo '
          <a class="navbar-brand" href="'.$path.'index.php">
            <img src="'.$path.'assets/media/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Customer Relationship Management
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="'.$path.'index.php">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="'.$path.'assets/dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Support</a>
              </li>
            </ul>
            <span class="navbar-text">
            Welcome <h5 class="d-inline mx-1"><a href="'.$path.'assets/dashboard.php">'.$_SESSION['cname'].'</a></h5>
            </span>
            <form class="form-inline my-2 my-lg-0" action="'.$path.'includes/logout.inc.php" method="post">
              <button class="btn btn-outline-dark mx-2" type="summit" name="logout-submit">Logout</button>
            </form>
          ';
          }
      } else {
          echo '
        <a class="navbar-brand" href="'.$path.'index.php">
          <img src="'.$path.'assets/media/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          Customer Relationship Management
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="'.$path.'index.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Apply</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="'.$path.'includes/login.inc.php" method="post">

          <!-- <input class="form-control mr-sm-2" type="text" name="cuser" placeholder="Username"> -->

          <div class="form-label-group">

              <input type="text" name="cuser" id="inputUser" class="form-control mr-sm-2" placeholder="Username" required="">
          </div>

          <!-- <input class="form-control mr-sm-2" type="password" name="cpwd" placeholder="Password"> -->

          <div class="form-label-group">

              <input type="password" name="cpwd" id="inputPassword" class="form-control mr-sm-2" class="form-control" placeholder="Password" required="">

          </div>


          <button class="btn btn-outline-info mx-1" type="summit" name="login-submit">Login</button>
        </form>
        <a class="btn btn-outline-info mx-1" href="'.$path.'assets/signup.php">Signup</a>
        ';
      }


         ?>

      </div>
    </nav>
  </header>
