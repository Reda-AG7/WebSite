<?php 
include_once 'functions_inc.php';

if(isset($_POST['save'])){
	$question = $_POST["question"];
	$category = $_POST["category"];
	$difficulty= $_POST['difficulty'];
	$for = 0;$while = 0; $recursion = 0;
	if(isset($_POST['for'])){
		$for = 1;
	}
	if(isset($_POST['while'])){
		$while = 1;
	}
	if(isset($_POST['recursion'])){
		$recursion = 1;
	}
	$case = $_POST["case"];
	$caseA = $_POST["caseA"];
	$fName= $_POST['fName'];
	$fields = array('addQuestion'=>'addQuestion','question' => $question,
					'category' => $category,
					'fName' => $fName,
					'difficulty' => $difficulty,
					'for' => $for, 'while' => $while, 'recursion' => $recursion,
					'case' => $case,
					'caseA' => $caseA);
	$postdata = http_build_query($fields);

	$result = sendCurl($postdata);
  	if($result == 1){
  		header('location: ../teacher/questions.php?insertionSucceeded');
    	exit();
  	}
  	else{
  		header('location: ../teacher/questions.php?error=insertionFailed');
    	exit();
  	}
}