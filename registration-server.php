<?php
    include "connection.php";
    
    $first_name = $_POST['first-name-input'];
    $last_name = $_POST['last-name-input'];
    $password = $_POST['password-input'];
    $username = $_POST['username-input'];
    $email = $_POST['email-input'];
    $about = $_POST['about-input'];

    echo $first_name . ' ' . $last_name . ' ' . $username . ' ' . $password . ' ' . $email . ' ' . $about;
    if(!empty($about || !is_null($about))) {
        $query = "INSERT INTO users (first_name, last_name, password, email, about)
        VALUES ('$first_name', '$last_name', '$username', '$email', '$about');";
    }
    else
    {
        $query = "INSERT INTO users (first_name, last_name, password, email, about)
        VALUES ('$first_name', '$last_name', '$username', '$email', NULL);";
    }

    $connect->query($query);
?>
        