<?php 
include_once 'functions_inc.php';
if(isset($_POST['login'])){
	$ucid = $_POST['ucid'];
	$password = $_POST['password'];
	//$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
  if(empty($ucid) || empty($password)){
    header('location: ../index.php?error=fieldLeftEmpty');
    exit();
  }
  
  $fields = array('ucid' => $ucid, 'password' => $password);
  $postdata = http_build_query($fields);
  $result = sendCurl($postdata);
	//echo $result;
  $r = json_decode($result);
  if($result == ""){
    header('location: ../index.php?error=recordNotFound');
    exit();
  }
  else{
    if($r->isTeacher == 1){
      session_start();
      $_SESSION['ucid'] = $ucid;
      header('location: ../teacher/teacher.php');
      exit();
    }
    else{
      session_start();
      $_SESSION['ucid'] = $ucid;
      header('location: ../student/student.php');
      exit();
    }
  }  

}