<?php
    include "connection.php";
    session_start();
   
    $nameOfTest = $_COOKIE['whichTest'];
    $testId;
    $allQuestionCount = $_SESSION["allQuestionCount"];
    $goodAnswersCount = 0;
    $profileSeedQuery = " SELECT * FROM `questions` join tests on tests.test_id = questions.test_id WHERE tests.name = '$nameOfTest';";
    $result = $connect->query($profileSeedQuery);
    if ($result->num_rows > 0) {
       
        
        
        $index = 0;
       while($row = $result->fetch_assoc()) {
        $questionName = $row['question'];
        $testId =  $row['test_id'];
        $index++;
        $questionCorrectAnswer= $row['correct_answer_index'];
        $questionUserAnswer = $_POST[ "Question".$index];

        
        if($questionUserAnswer==$questionCorrectAnswer){
            $goodAnswersCount++;
        }
        $_SESSION["Question".$index] = $questionUserAnswer;
       }
    }

    
   
    echo  $_SESSION["userId"];
    $userId =  $_SESSION["userId"];
    $percantageComlete = ($goodAnswersCount/$allQuestionCount) * 100;
    $_SESSION["percantage"] =  $percantageComlete;
echo $percantageComlete."%";
    $query = "INSERT INTO test_completion(percentage,test_id,history_id) VALUES ($percantageComlete,$testId,(SELECT history_id FROM test_histories JOIN users on test_histories.user_id = users.user_id WHERE test_histories.user_id = $userId ));";
    $connect->query($query);
    $_SESSION["testCompleted"] = true;
    header("Location: test.php");
?>
