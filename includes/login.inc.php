<?php

if (isset($_POST['login-submit'])) {
    // code...
    require 'dbh.inc.php';

    $cuser = $_POST['cuser'];
    $cpwd = $_POST['cpwd'];

    $sql = 'SELECT * FROM costumer WHERE cuser = :cuser';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['cuser' => $cuser]);
    $result = $stmt->fetchObject();

    if (count($result) == 0) {
        // code...
        header("Location: ../index.php?status=USER_NOT_FOUND");
        exit();
    } else {
        // code...
        $pwdCheck = password_verify($cpwd, $result->cpassword);
        if ($pwdCheck == false) {
            header("Location: ../index.php?status=WRONG_PWD");
            exit();
        } elseif ($pwdCheck == true) {
            // code...
            session_start();
            $_SESSION['nit'] = $result->nit;
            $_SESSION['dpi'] = $result->dpi;
            $_SESSION['cname'] = $result->cname;
            $_SESSION['cphone'] = $result->cphone;
            $_SESSION['cuser'] = $result->cuser;
            $_SESSION['cemail'] = $result->cemail;
            $_SESSION['cadmin'] = $result->cadmin;
            $_SESSION['ccompany'] = $result->ccompany;
            if ($_SESSION['cadmin']) {
                // code...
                header("Location: ../assets/cpanel.php");
                exit();
            }
            header("Location: ../index.php?status=SUCCESS");
            exit();
        } else {
            header("Location: ../index.php?status=WRONG_PWD");
            exit();
        }
    }
} else {
    // code...
    header("Location: ../index.php");
    exit();
}
