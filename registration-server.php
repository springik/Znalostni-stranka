<?php
    include "connection.php";
    session_start();
    $first_name = $_POST['first-name-input'];
    $last_name = $_POST['last-name-input'];
    $password = hash("sha256", $_POST["password-input"]);
    $username = $_POST['username-input'];
    $email = $_POST['email-input'];
    $about = $_POST['about-input'];

    //echo $first_name . ' ' . $last_name . ' ' . $username . ' ' . $password . ' ' . $email . ' ' . $about;
    $uniqueVerificationQuery = "SELECT username, email FROM users";
    $result = $connect->query($uniqueVerificationQuery);
    
    $_SESSION['uniqueCheck'] = true;
    while($row = $result->fetch_assoc())
    {
        var_dump($row);
        if($row['username'] == $username || $row['email'] == $email)
        {
            $_SESSION['uniqueCheck'] = false;
        }
    }

    $historyCreationQuery = "INSERT INTO test_histories (user_id)
    VALUES ((SELECT user_id FROM users WHERE email = '$email'));";
    $query = "";
    if(!empty($about) || !is_null($about) && $_SESSION['uniqueCheck'] == true) {
        $query = "INSERT INTO users (first_name, last_name, username, password, email, about)
        VALUES ('$first_name', '$last_name', '$username', '$password', '$email', '$about');
        ";
    }
    else if($_SESSION["uniqueCheck"] == true)
    {
        $query = "INSERT INTO users (first_name, last_name, username, password, email, about)
        VALUES ('$first_name', '$last_name', '$username', '$password', '$email', NULL);
        ";
    }
    if(!empty($query))
    {   
        $connect->query($query);
        $connect->query($historyCreationQuery);
        $_SESSION["email"] = $email;
        header("Location: profile.php");
    }

   
    die();
?>
        