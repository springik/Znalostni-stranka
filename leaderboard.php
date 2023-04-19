<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="bg-dark">

<?php
        session_start();
        include "navbar.php";
        include "connection.php";
        echo "<p class = 'h1 text-warning text-center'>Leaderboard: </p>";
        echo "<table class='table table-striped table-dark text-center'>
        <thead>
          <tr>
            <th scope='col'>#</th>
            <th scope='col'>Username</th>
            <th scope='col'>Completion count over 80 %</th>
            <th scope='col'>Average percentage</th>
          </tr>
        </thead>
        <tbody>";
      
        $leaderboardQuery = file_get_contents("leaderboard-query.sql");
        $result = $connect->query($leaderboardQuery);
        $order = 1;
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
            <th scope='row'>{$order}</th>
            <td>{$row['username']}</td>
            <td>{$row['completion_count']}</td>
            <td>{$row['prumer_procent']}</td>
            </tr>";
        }
        echo "
        </tbody>
      </table>";
    ?>
</body>
</html>