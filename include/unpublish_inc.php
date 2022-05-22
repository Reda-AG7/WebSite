<?php
/*session_start();
if(!isset($_SESSION['ucid'])){
	header('location: ../teacher/teacher.php?error=testNotSaved');
	exit();
}*/
include_once 'functions_inc.php';

if(isset($_POST['testID'])){
	$testID = $_POST['testID'];
	$fields = array('unpublish'=>'unpublish','testID'=>$testID);
    $postdata = http_build_query($fields);
    $result = sendCurl($postdata);
	if($result == 0){
		header('location: ../teacher/teacher.php?error=unpublishingTestFailed');
		exit();
	}
	else{
		header('location: ../teacher/teacher.php?error=testUnpublishedSuccessfully');
		exit();
	}
}