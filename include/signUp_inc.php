<?php 

if(isset($_POST['signUp'])){
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
	$ucid = $_POST['ucid'];
  $isTeacher;
	$password = $_POST['password'];
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  if($_POST['isTeacher'] == 'on'){
    $isTeacher = 1;
  }
  else{
    $isTeacher = 0;
  }
  echo $isTeacher."    ".$ucid."    ".$hashedPassword."    ".$firstName."    ".$lastName;
	//query:
	$sql = "INSERT INTO `user`(`ucid`, `password`, `isTeacher`, `firstname`, `lastname`) VALUES ('$ucid','$hashedPassword',$isTeacher,'$firstName','$lastName')";
  $result = mysqli_query($conn,$sql);
  if($result){
    header('location: ../index.php?error=youHaveSignedUpSuccessfully');
    exit();
  }
  else{
    header('location: ../index.php?error=signingUpFailed');
    exit();
  }
}