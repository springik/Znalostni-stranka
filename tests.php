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
<body>
        <?php
        session_start();
        include "navbar.php";
        include "connection.php";  
        $_SESSION["testCompleted"] = false;
        ?>
         <h1>  Available Tests: </h1>
         <table style="width:50%">
         <tr>
           <th>Name of the Test </th>        
         </tr>

        <?php 
        $profileSeedQuery = "SELECT name FROM `tests`;";
        $result = $connect->query($profileSeedQuery);
         if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
            $nameOfTheTest = $row["name"];
                   echo "<tr>
                   <td>$nameOfTheTest</td>
                   <td>  <button class='testButton' id='$nameOfTheTest'>Start Test</button> </td>
                 </tr>";
            }
          }
          $_SESSION["testCompleted"] = false;
         ?>

<script >
var buttons = document.getElementsByClassName('testButton');
  for (var i=0 ; i < buttons.length ; i++){
    let stringId =  buttons[i].id ;
    buttons[i].onclick = function(){
        const d = new Date();
    d.setTime(d.getTime() + (2*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = "whichTest=" + stringId + ";" + expires + ";path=/";

    window.location = 'test.php'; }; 
     } 
     </script>
</body>
</html>
