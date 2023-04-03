<?php
    session_start();
    $_SESSION["uniqueCheck"] = null;
    $_SESSION["loginSuccess"] = null;
    $_SESSION["logged_in"] = null;
    $_SESSION["email"] = null;
    header("Location: registration.php");
    die();
?>