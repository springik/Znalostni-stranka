<?php 
    $connect = new mysqli("localhost", "root", "", "wea");

    if($connect -> connect_errno)
    {
        echo "There was an error connection error: " . $connect -> connect_errno;
        die();
    }

?>