<?php
// session_start();
// if(!isset($_SESSION['ucid'])){
// 	header('location: ../teacher/teacher.php?error=testNotSaved');
// 	exit();
// }

include_once 'functions_inc.php';

if(isset($_POST['update'])){
	$functionNamePts = $_POST['functionNamePts'];
	$casePoints = $_POST['casePoints'];
	$constraintsPoints = $_POST['constraintsPoints'];
	//$numberOfQuestions = $_POST['numberOfQuestions'];
	$testID =  $_POST['testID'];
	$studentID =  $_POST['studentID'];
	$questionID = $_POST['questionID'];
	$numberOfCasess = $_POST['numberOfCasess'];
	$comment = $_POST['comment'];
	//$questionResult = $_POST['questionResult'];
	$finalS= $_POST['finalS'];
	$caseID = $_POST['caseID'];
	for($i=0;$i<count($constraintsPoints);$i++){
		if($constraintsPoints[$i] == ''){
			$constraintsPoints[$i] = 0;
		}
	}
	
	$questionScore = array();
	$c = 0;
	$a=0;
	//print_r($constraintsPoints);
	//echo count($questionID)."<br>";
	for($i=0;$i<count($questionID);$i++){
		$total = 0;
		// echo $numberOfCasess[$i];
		// echo "<br>";
		for($j=0;$j<$numberOfCasess[$i];$j++){
			if($casePoints[$c]>0){
				$total+=$casePoints[$c];
				//echo "total : ".$total."<br>";
			}
			$c++;
		}
		//echo "<br><br>";
		for($j=0;$j<3;$j++){
			if($constraintsPoints[$a]>0){
				$total+=$constraintsPoints[$a];
				//echo "total : ".$total."<br>";
			}
			$a++;
		}
		if($functionNamePts[$i]>0){
			$total+=$functionNamePts[$i];
			//echo "total : ".$total."<br>";
		}
		$questionScore[$questionID[$i]] = $total;
	}
	// echo "constraints Points : <br>";
	// print_r($constraintsPoints);
	// echo "<br>";
	// echo "casePoints : <br>";
	// print_r($casePoints);
	// echo "<br>";
	// echo "functionNamePts: <br>";
	// print_r($functionNamePts);
	// echo "<br>";
	// echo "questionScore : <br>";
	// print_r($questionScore);
	// echo "<br>";

	// print_r($comment);
	// echo "<br>".$finalS;
	$fields = array('updateGrade'=>'updateGrade',
						'functionNamePts'=>$functionNamePts,
						 'casePoints'=>$casePoints,
						 'constraintsPoints'=>$constraintsPoints,
						 'testID'=>$testID,
						 'studentID'=>$studentID,
						 'questionID'=>$questionID,
						 'numberOfCasess'=>$numberOfCasess,
						 'comment'=>$comment,
						 'questionScore'=>$questionScore,
						 'finalS'=>$finalS,
						 'caseID'=>$caseID);
	$postdata = http_build_query($fields);
	$result = sendCurl($postdata);
	//print_r($comment);
	//echo $result;
	if($result == 1){
		header('location: ../teacher/teacher.php?error=testCorrectedSuccessfully');
		exit();
	}
	else{
		header('location: ../teacher/teacher.php?error=testCorrectionFailed');
		exit();
	}

}