<?php 
session_start();
/*if(!isset($_SESSION['ucid'])){
  header('location: ../student/student.php?error=problemInsertingAnswers');
  exit();
}*/
include_once 'functions_inc.php';
function search($str,$n){
  $k = 0;
  $count = 0;
  for($a=0;$a<strlen($str);$a++){
    if($str[$a] == $n[$k]){
      while($k<strlen($n) && $str[$a] == $n[$k]){
        $a++;
        $k++;
      }
      if($k==strlen($n)){
        $count++;
        $k=0;
      }
    }
    else{
      $k=0;
    }
  }
  return $count;
}
if(isset($_POST['submit'])){
  $test = json_decode($_SESSION['test'],true);
  $autoGrade = $_POST['autoGrade'];
  $testID = $_POST['testID'];
  $answers = $_POST['answer'];
  $studentID = $_SESSION['ucid'];
  $nameUsed = "";
  $total = 0;


  // no autoGrading *****************************************

  if($autoGrade == 0){

    $fields = array('noAutoGrade'=>'noAutoGrade','test'=>$test,'testID'=>$testID, 'studentID'=>$studentID,'answer'=>$answers);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    if($result == 1){
      header('location: ../student/student.php?error=testSubmittedSuccessfully');
      exit(); 
    }
    else{
      header('location: ../student/student.php?error=testSubmissionFailed');
      exit(); 
    }
    
  }


  //autoGrade is Activated *****************************************

  else{
    for($a=0;$a<count($test)-1;$a++){
      $deductedPoints = array("functionNamePts"=>0,
                              "for"         =>0,
                              "while"       =>0,
                              "recursion"   =>0,
                              "case1"       =>0,
                              "case2"       =>0,
                              "case3"       =>0,
                              "case4"       =>0,
                              "case5"       =>0
                            );
      $casesAnswer = array();
      $answer = $answers[$a];
      $functionName = $test[$a]['functionName'];
      //echo $answer.'<br>';
      $score = $test[$a]['score'];
      //echo $score."<br>";
      $newScore = 0;
      $comment = "";
      $newAnswer = "";
      $counter = 0;
      $tempScore = 0;
      // ************ checking the function name **************

      if(strpos($answer,$functionName) === false){
        $tempScore+=($score*0.1);
        
        $comment.="function Name incorrect"."\n";
        $arr = explode(" ", $answer);
        if(strpos($arr[1],"(") !== false){
          $arr1 = explode("(", $arr[1]);
          $nameUsed = $arr1[0];
          $p = implode(" ",$arr);
          $newAnswer = str_replace($nameUsed, $functionName, $p, $counter);
        }
        else{
          $nameUsed = $arr[1];
          $p = implode(" ",$arr);
          $newAnswer = str_replace($nameUsed, $functionName, $p, $counter);
        }
      }
      else{
        $deductedPoints['functionNamePts'] = $score*0.1;
        $newAnswer = $answer;
        $nameUsed = $functionName;
        $tempScore+=($score*0.1);
        $newScore+=($score*0.1);
      }
      //************** checking the constraints ***************

      $constraints = $test[$a]['constraints'];
      foreach($constraints as $constraint => $value){
        if($constraint == 'recursion' && $value==true){
          if(search($newAnswer,$functionName)>1){
            $deductedPoints[$constraint] = $score*0.1;
            $newScore+=($score*0.1);
          }
          $tempScore+=($score*0.1);
        }
        else if($constraint == 'for' && $value==true){
          if(search($newAnswer,'for')>0){
            $deductedPoints[$constraint] = $score*0.1;
            $newScore+=($score*0.1);
          }
          $tempScore+=($score*0.1);
        }
        else if($constraint == 'while' && $value==true){
          if(search($newAnswer,'while')>0){
            $deductedPoints[$constraint] = $score*0.1;
            $newScore+=($score*0.1);
          }
          $tempScore+=($score*0.1);
        }
      }

      //***************** compile the code ******************

      exec("chmod +x python.py");
      $filePtr = fopen('python.py','a+');
      if($filePtr){
        //echo "file opened <br>";
        file_put_contents('python.py', "");
        fwrite($filePtr, "#!/usr/bin/env python"."\n");
        fwrite($filePtr, 'import sys'."\n\n\n");
        fwrite($filePtr, $newAnswer."\n\n\n");
        $cases = $test[$a]['testCases'];

        $valueToSubtract = round(($score-$tempScore)/count($cases),1);
        
        $count = 1;
        foreach($cases as $case => $cAnswer){
          file_put_contents('python.py', "");
          fwrite($filePtr, "#!/usr/bin/env python"."\n");
          fwrite($filePtr, 'import sys'."\n\n\n");
          fwrite($filePtr, $newAnswer."\n\n\n");
          fwrite($filePtr, 'print('.$case.')');
          $command = exec("python python.py");
          if($command === 'True'){
            $command = 1;
          }
          else if($command === 'False'){
            $command = 0;
          }
          $casesAnswer[$case] = $command;
          if($command != $cAnswer){
            $deductedPoints['case'.$count] = 0;
          }
          else{
            $deductedPoints['case'.$count] = $valueToSubtract;
            $newScore+=$valueToSubtract;
          }
          $count++;
        }
        $newScore = round($newScore);
        $total +=$newScore;
  
        $questionID = $test[$a]['questionID'];
        $answer = $answers[$a];
        
        $x1 = $deductedPoints['functionNamePts'];
        $x2 = $deductedPoints['for'];
        $x3 = $deductedPoints['while'];
        $x4 = $deductedPoints['recursion'];

        $fields = array('autoGrade'=>'autoGrade',
                           'testID'=>$testID,
                        'studentID'=>$studentID,
                           'answer'=>$answer,
                       'questionID'=>$questionID,
                         'nameUsed'=>$nameUsed,
                          'comment'=>$comment,
                            'score'=>$score,
                      'casesAnswer'=>$casesAnswer,
                   'deductedPoints'=>$deductedPoints,
                         'newScore'=>$newScore);

        $postdata = http_build_query($fields);
        $result = sendCurl($postdata);
        //echo $result;
        if($result == 0){
          header('location: ../student/student.php?error=testSubmissionFailed');
          exit();
        }
      }
      else{
        echo 'error opening the file';
      }
      fclose($filePtr);
    }
    $total = round($total);
    $fields = array('autoGrade2'=>'autoGrade2','testID'=>$testID, 'studentID'=>$studentID,'grade'=>$total);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    //echo $result;
    if($result == 1){
      header('location: ../student/student.php?error=testSubmittedSuccessfully');
      exit();
    }
    else{
      header('location: ../student/student.php?error=testSubmissionFailed');
      exit();
    }
  }
}

function cast($type){
  switch($type){
    case 'integer': return 'int';
    case 'float' : return 'float';
    case 'double' : return 'double';
    case 'string' : return 'str';
  }
}