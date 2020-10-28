

<?php
if(empty($_SESSION['nit']))
{
    // If they are not, redirect them to the login page.
    header("Location: ../index.php");

    // Remember that this die statement is absolutely critical.  Without it,
    // people can view your members-only content without logging in.
    die("Redirecting to login.php");
}
