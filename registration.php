<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="bg-secondary">

    <div class="text-center mt-5 w-auto justify-content-center align-items-center d-flex"> <!-- class="translate-middle" z nějakého důvodu u mě nefunguje klasicky odstreli vse do stratosfery -->
        <form class="" action="registration-server.php" method="post">
            <div class="mb-3 mx-2">
                <label for="first-name-input" class="form-label">First name</label>
                <input oninput="validate()" type="text" class="form-control" name="first-name-input" required>
            </div>
            <div class="mb-3 mx-2">
                <label for="last-name-input" class="form-label">Last name</label>
                <input oninput="validate()" type="text" class="form-control" name="last-name-input" required>
            </div>
            <div class="mb-3 mx-2">
                <label for="username-input" class="form-label">Username</label>
                <input oninput="validate()" type="text" class="form-control" name="username-input" required>
            </div>
            <div class="mb-3 mx-2">
                <label for="password-input" class="form-label">Password</label>
                <input oninput="validate()" type="password" class="form-control" id="password-input" name="password-input" required>
            </div>
            <div class="mb-3 mx-2">
                <label for="password-check-input" class="form-label">Password again</label>
                <input oninput="validate()" type="password" class="form-control" id="password-check-input" name="password-check-input" required>
            </div>
            <div class="mb-3 mx-2">
                <label for="email-input" class="form-label">Email</label>
                <input oninput="validate()" type="email" class="form-control" name="email-input" required>
            </div>
            <div class="mb-3 mx-2">
                <label for="about-input" class="form-label">About you</label>
                <input oninput="validate()" type="text-area" class="form-control" name="about-input">
            </div>
            <button disabled type="submit" class="btn btn-warning" id="submit-btn" name="submit-btn">Submit</button>
            <a class="link-warning d-block mb-3 mx-2 mt-1" href="login.php">Log-in</a>
        </form>
        <?php
        session_start();
            if(!is_null($_SESSION["uniqueCheck"]))
            {
                if($_SESSION['uniqueCheck'] == false)
                {
                    echo "<div id='uniqueAlertCard' class='card position-absolute'>
                    <div class='card-body'>
                        <p>
                            Email or username isn't UNIQUE!
                        </p>
                        <p>
                            Choose a different password, please
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
        function validate() {
            console.log("validating...");
            const password = document.getElementById("password-input");
            const password_verify = document.getElementById("password-check-input");
            const btn = document.getElementById("submit-btn");

            if(password.value != password_verify.value || password.value == "") {
                console.log("validation failed (password mismatch)");
                btn.toggleAttribute("disabled", true);
                return;
            }
            console.log("validation succeeded");
            btn.toggleAttribute("disabled", false);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>