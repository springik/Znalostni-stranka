<?php
    include "connection.php";
    session_start();

    if(!is_null($_SESSION["logged_in"])) {
        if($_SESSION["logged_in"] == true)
        {
            header("Location: profile.php");
        }
    }

    $email = $_POST['email-input'];
    $password = hash("sha256", $_POST["password-input"]);

    echo $email . ' ' . $password;
    $loginQuery = "SELECT email, password FROM users WHERE email = '$email' AND password = '$password';";
    $result = $connect->query($loginQuery);
    if(!is_null($result->fetch_object())) {
        $_SESSION["logged_in"] = true;
        $_SESSION["loginSuccess"] = true;
        $_SESSION["email"] = $email;
        header("Location: profile.php");
        die();
    }
    else
    {
        $_SESSION["loginSuccess"] = false;
        $_SESSION["logged_in"] = false;
        header("Location: login.php");
    }
?>
