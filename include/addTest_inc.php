<?php
session_start();
include_once 'functions_inc.php';

if(isset($_POST['save'])){
	$title = $_POST['testTitle'];
	$scores = $_POST['score'];
	$ids = $_POST['ids'];
	$difficulty = $_POST['diff'];
    $creator = $_SESSION['ucid'];
    //echo $difficulty;
    $fields = array('insertTest'=>'insertTest','testTitle'=>$title,'score'=>$scores,'ids'=>$ids,'difficulty'=>$difficulty,'ucid'=>$creator);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
    if($result == 1){
    	header('location: ../teacher/teacher.php?testInsertedSuccessfully');
    	exit();
    }
   	else {
     	header('location: ../teacher/teacher.php?error=testNotInserted');
    	exit();
  	}
}
else{

}