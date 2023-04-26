<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
table, th, td {
  border:1px solid black;
}
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <?php
        session_start();
        include "navbar.php";
        include "connection.php";
        $email = $_SESSION["email"];

        $profileSeedQuery = "SELECT user_id, first_name, last_name, username, about FROM users WHERE email = '$email'";
        $result = $connect->query($profileSeedQuery);
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $about = $row["about"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $user_id = $row["user_id"];
        $_SESSION["userId"] = $user_id;
    ?>
    <div class="mx-3 mt-3">
        <p class="h1 text-warning" id="profileUsername">Username : <?=$username?></p>
        <p class="h3 text-light" id="profileFirstName">First Name: <?=$first_name?></p>
        <p class="h3 text-light" id="profileLastName">Last Name : <?=$last_name?></p>
        <p class="h4 text-light" id="profileEmail">Email : <?=$email?></p>
        <p class="h5 text-light" id="profileAbout">About you : <?=$about?></p>
       
    </div>
    <br>
    <div>
    <p class="h1 text-warning">  Test Results: </p>
        <table class="table table-dark text-center" style="width:50%">
         <tr>
           <th scope="col">Test</th>
           <th scope="col">Percentage</th>
           <th scope="col">Date of completion</th>
        </tr>
        <?php

$profileSeedQuery = "SELECT tests.name,test_completion.percentage ,test_completion.completion_time FROM `test_completion` JOIN test_histories on test_histories.history_id = test_completion.history_id JOIN users on test_histories.user_id = users.user_id JOIN tests on tests.test_id = test_completion.test_id where users.user_id = $user_id ORDER BY test_completion.completion_time DESC;";
             $result = $connect->query($profileSeedQuery);
             if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $testName = $row["name"];
                    $percantageCompleted = $row["percentage"];
                    $completionDate = $row["completion_time"];
                
                   
                    if($percantageCompleted >= 80){
                        echo "<tr>
                        <td>$testName</td>
                        <td style='background-color: green;'>$percantageCompleted% </td>
                        <td>$completionDate </td>
                      </tr>";
                    }else{
                        echo "<tr>
                        <td >$testName</td>
                        <td style='background-color: red;'>$percantageCompleted% </td>
                        <td>$completionDate </td>
                      </tr>";
                    }



                }
            
            }
            

    
?>
       
       
</table>
    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>

