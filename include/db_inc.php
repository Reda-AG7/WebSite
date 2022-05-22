<?php 

$dbserverName = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'cs490';

$conn = mysqli_connect($dbserverName,$dbUsername,$dbPassword,$dbName);
if(!$conn){
	die('Connection failed '. mysqli_connect_error());
}


$sql = "SELECT `testID`, `dueDate` FROM `test` WHERE isPublished = true;";
$result = mysqli_query($conn,$sql);
if($result){
	while($row = mysqli_fetch_assoc($result)){
		date_default_timezone_set('America/NEW_YORK');
		$date = strtotime($row['dueDate']);
		if(date('m-d-Y h:i:s', $date)<=date('m-d-Y h:i:s', time())){
			$testID = $row['testID'];
			$sql2 = "UPDATE `test` SET `isPublished`=false WHERE testID='$testID';";
			$result2 = mysqli_query($conn,$sql2);
			if(!$result2){
				echo 'error updating dueDate';
			}
		}
	}
}