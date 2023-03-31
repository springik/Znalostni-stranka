<?php
    session_start();
    $_SESSION["uniqueCheck"] = null;
    header("Location: registration.php");
    die();
?>