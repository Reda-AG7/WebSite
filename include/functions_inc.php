<?php 

function sendCurl($postdata){
    $url = 'https://afsaccess4.njit.edu/~ra69/Final/index.php';

    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_POST, true);
    curl_setopt($curl,CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);  
    $result = curl_exec($curl);
    curl_close($curl);
    
    return $result;
}
//*******************  Teacher  *************************************

function getAllQuestions(){
	$fields = array('allQuestions'=>'questions');
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    return $result;
}

function getAllQuestions2(){
    $fields = array('allQuestions2'=>'questions');
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    return $result;
}

function getAllTests($creator){
    $fields = array('allTestsForTeacher'=>'tests','ucid' => $creator);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    return $result; 
}

function getAllClasses($teacherID){
    $fields = array('allTeacherClasses'=>'tests','ucid' => $teacherID);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    return $result;  
}

function getAllTestTakers($testID){
    $fields = array('testTakers'=>'tests','testID' => $testID);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    return $result;
}


//*******************  Student  *************************************

function getAllStudentTests($studentID){
    $fields = array('allStudentTests'=>'tests','studentID' => $studentID);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    return $result;
}

function getTest($testID){
    $fields = array('studentTest'=>'tests','testID' => $testID);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    return $result;
}


function getStudentTest($studentID,$testID){
    $fields = array('studentTestForTeacher'=>'tests','testID' => $testID,'studentID'=>$studentID);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    return $result;
}
