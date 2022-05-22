<?php
// session_start();
// if(!isset($_SESSION['ucid'])){
// 	header('location: ../teacher/teacher.php?error=testNotSaved');
// 	exit();
// }
include_once 'functions_inc.php';

if(isset($_POST['save'])){
	$testID = $_POST['testID'];
	$date = $_POST['date'];
	$classes = $_POST['class'];
	$autoGrade;
	if($_POST['autoGrade'] == 'on'){
		$autoGrade = true;
	}
	else{
		$autoGrade = false;
	}
	$fields = array('publish'=>'publish','testID'=>$testID,'date'=>$date,'class'=>$classes,'autoGrade'=>$autoGrade);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
	//echo $result;
	if($result == 0){
		header('location: ../teacher/teacher.php?error=testIsNotPublished');
		exit();
	}
	else{
		header('location: ../teacher/teacher.php?error=testPublishedSuccessfully');
		exit();
	}

}