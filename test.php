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
<body class = "bg-dark">
    
<?php
        session_start();
        include "navbar.php";
        include "connection.php"; 
        if(isset($_COOKIE['whichTest'])) { 
            echo "<p class = 'h1 text-warning'>Welcome " . $_COOKIE['whichTest'] . '</p>';
            $testName = $_COOKIE['whichTest'];
        }
        ?>
    
    <form action="test-Validaton-Server.php" method="post">

    <?php
    
        $allQuestionCount = 0;
        $profileSeedQuery = " SELECT * FROM `questions` join tests on tests.test_id = questions.test_id WHERE tests.name = '$testName';";
        $result = $connect->query($profileSeedQuery);
        if ($result->num_rows > 0) {
            $allQuestionCount++;
           // output data of each row
           $index = 0;
           while($row = $result->fetch_assoc()) {
            $index++;
            $questionName = $row['question'];
            $questionAnswers = $row['answers'];
            $questionAnswers = str_replace(array('"','[',']'),' ',$questionAnswers);
            $questionAnswers = explode(',',$questionAnswers);
            echo "<p class = 'h3 text-light'>$questionName</p>";
            $length = count( $questionAnswers);
            for ($i=0; $i < $length ; $i++) { 
                $value = $i+1;
                $questionName = "Question".$index;
                echo" <input type='radio' id='$questionName$value' name='$questionName' value='$value'>";
                if(!is_null($_SESSION["testCompleted"])) {
                    if($_SESSION["testCompleted"] == false){
                        echo"  <label style='color:white; id ='$questionName$value' for='$questionName$value'>$questionAnswers[$i]</label><br>";

                    }else{
                        if($_SESSION[ "Question".$index] == $value  ){
                            if($value==$row['correct_answer_index']){
                                echo"  <label style='color:green; id ='$questionName$value' for='$questionName$value'>$questionAnswers[$i]  <-- your answer</label><br>";
                            }else{
                                echo"  <label style='color:red; id ='$questionName$value' for='$questionName$value'>$questionAnswers[$i]  <-- your answer</label><br>";
                            }
                        }else{
                            if($value==$row['correct_answer_index']){
                                echo"  <label style='color:green; id ='$questionName$value' for='$questionName$value'>$questionAnswers[$i]</label><br>";
                            }else{
                                echo"  <label style='color:red; id ='$questionName$value' for='$questionName$value'>$questionAnswers[$i]</label><br>";
                            }
                        }




                      
                    }
                }


            
            }
          
             echo "<br>";
             

               
          
           }
        }
        $_SESSION["allQuestionCount"] = $result->num_rows ;
        $_SESSION["testName"] = $testName;


        if(!is_null($_SESSION["testCompleted"])) {
            if($_SESSION["testCompleted"] == false){
                echo" <input class = 'text-light btn btn-warning' type='submit' value='Submit'>";
            
            }else{
                echo "<p class = 'text-light'>Percentage of completion : ".round($_SESSION["percantage"])."%</p>";
            }

        }

        
    ?>
  

 
</form>


</body>
</html>