<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
    <?php //include_once "navbar.php"; ?>

    <div class="justify-content-center middle position-absolute"> <!-- class="translate-middle" z nějakého důvodu u mě nefunguje klasicky odstreli vse do stratosfery -->
        <form action="" method="post">
            <div class="mb-3">
                <label for="first-name-input" class="form-label">First name</label>
                <input oninput="validate()" type="text" class="form-control" id="first-name-input" required>
            </div>
            <div class="mb-3">
                <label for="last-name-input" class="form-label">Last name</label>
                <input oninput="validate()" type="text" class="form-control" id="last-name-input" required>
            </div>
            <div class="mb-3">
                <label for="username-input" class="form-label">Username</label>
                <input oninput="validate()" type="text" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password-input" class="form-label">Password</label>
                <input oninput="validate()" type="text" class="form-control" id="password-input" required>
            </div>
            <div class="mb-3">
                <label for="password-check-input" class="form-label">Password again</label>
                <input oninput="validate()" type="text" class="form-control" id="password-check-input" required>
            </div>
            <div class="mb-3">
                <label for="email-input" class="form-label">Email</label>
                <input oninput="validate()" type="email" class="form-control" id="email-input" required>
            </div>
            <div class="mb-3">
                <label for="about-input" class="form-label">About you</label>
                <input oninput="validate()" type="text" class="form-control" id="about-input">
            </div>
            <button disabled type="submit" class="btn btn-warning" id="submit-btn">Submit</button>
        </form>
    </div>
    

    <script>
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