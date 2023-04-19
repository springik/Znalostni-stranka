<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <?php
        session_start();
        include "navbar.php";
        include "connection.php";
        $email = $_SESSION["email"];

        $profileSeedQuery = "SELECT first_name, last_name, username, about FROM users WHERE email = '$email'";
        $result = $connect->query($profileSeedQuery);
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $about = $row["about"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
    ?>
    <div class="mx-3 mt-3">
        <h1 class="text-warning">
            <?php
                echo $username;
            ?>
        </h1>
        <h3 class="text-warning">
            <?php
                echo $first_name . " " . $last_name;
            ?>
        </h3>
        <h5 class="text-warning">
            <?php
                echo $about;
            ?>
        </h5>
    </div>
    <div>
        <?php
            //print test history of user
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>