<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<div class="text-center mt-5 w-auto justify-content-center align-items-center d-flex"> <!-- class="translate-middle" z nějakého důvodu u mě nefunguje klasicky odstreli vse do stratosfery -->
        <form class="mt-5" action="login-server.php" method="post">
            <div class="mb-3 mx-2">
                <label for="email-input" class="form-label">Email</label>
                <input type="email" class="form-control" name="email-input" required>
            </div>
            <div class="mb-3 mx-2">
                <label for="password-input" class="form-label">Password</label>
                <input type="password" class="form-control" id="password-input" name="password-input" required>
            </div>
            <button type="submit" class="btn btn-warning" id="submit-btn" name="submit-btn">Submit</button>
            <a class="link-warning d-block mb-3 mx-2 mt-1" href="registration.php">Register</a>
        </form>
        <?php
        session_start();
            if(!is_null($_SESSION["loginSuccess"]))
            {
                if($_SESSION['loginSuccess'] == false)
                {
                    echo "<div id='uniqueAlertCard' class='card position-absolute'>
                    <div class='card-body'>
                        <p>
                            Email and username don't match!
                        </p>
                        <p>
                            Try again.
                        </p>
                        <button onclick='hideCard()' class='btn btn-warning'>
                            Hide
                        </button>
                    </div>";
                }
            }
    ?>
    </div>
    </div>
    <script>
        function hideCard()
        {
            card = document.getElementById("uniqueAlertCard");
            card.remove();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>