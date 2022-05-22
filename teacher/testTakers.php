<?php
session_start();
if(!isset($_SESSION['ucid'])){
	header('location: ../index.php');
	exit();
}
if(isset($_POST['submit'])){
	$testTitle = $_POST['testTitle'];
	$testID = $_POST['testID'];
	$_SESSION['testID'] = $testID;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/navigationStyle.css">
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/testTakers.css">
	<title>Test Takers</title>
</head>
<body>
	<?php  
		include_once 'header.php';
		include_once "../include/functions_inc.php";
		$testTakers = getAllTestTakers($_SESSION['testID']);
		/*if($testTakers == 'error'){
			echo 'error';
		}
		else{
			print_r($testTakers);
		}*/
		//echo $testTakers;
	?>
	<div class="container">
		<table class="table">
			<tr>
				<th width="20%">Select</th>
				<th width="10%">ucid</th>
				<th width="40%">Test Title</th>
				<th width="10%">Submitted</th>
				<th width="10%">Corrected</th>
				<th width="10%">Score</th>
			</tr>
		</table>
	</div>
	<script type="text/javascript">
		var tTakers = JSON.parse('<?= $testTakers;?>');
		let testID = '<?=$testID;?>';
		let testTitle = '<?=$testTitle;?>';
		//console.log(testTitle);
		let table = document.querySelector('.table');
		for(let i=0;i<tTakers.length;i++){
			let tr = document.createElement('tr');
			tr.setAttribute('class','tr');

			let td1 = document.createElement('td');
			let form = document.createElement('form');
			form.setAttribute('action','viewTest.php')
			form.setAttribute('method','post')
			let td1C = document.createElement('button');
			td1C.setAttribute('type','submit')
			td1C.setAttribute('name','submit')
			td1C.innerHTML = 'View Test'

			let hiddenInput1 = document.createElement('input')
			hiddenInput1.setAttribute('name','testID')
			hiddenInput1.setAttribute('value',testID)
			hiddenInput1.hidden = true 
			let hiddenInput2 = document.createElement('input')
			hiddenInput2.setAttribute('name','studentID')
			hiddenInput2.setAttribute('value',tTakers[i].ucid)
			hiddenInput2.hidden = true 
			let hiddenInput3 = document.createElement('input')
			hiddenInput3.setAttribute('name','title')
			hiddenInput3.setAttribute('value',testTitle)
			hiddenInput3.hidden = true 
			form.appendChild(td1C)
			form.appendChild(hiddenInput1);
			form.appendChild(hiddenInput2);
			form.appendChild(hiddenInput3);
			td1.appendChild(form);


			let td2 = document.createElement('td');
			let td2C = document.createElement('label');
			td2C.innerHTML = tTakers[i].ucid;
			td2.appendChild(td2C);

			let td4 = document.createElement('td');
			let td4C = document.createElement('label');
			td4C.innerHTML = testTitle;
			td4.appendChild(td4C);

			let td5 = document.createElement('td');
			let td5C = document.createElement('label');
			if(tTakers[i].isSubmitted == true){
				td5C.innerHTML = 'Yes';
			}
			else{
				td5C.innerHTML = 'Not yet';
			}
			td5.appendChild(td5C);

			let td6 = document.createElement('td');
			let td6C = document.createElement('label');
			if(tTakers[i].isCorrected == true){
				td6C.innerHTML = 'Yes';
			}
			else{
				td6C.innerHTML = 'Not yet';
			}
			td6.appendChild(td6C)

			let td7 = document.createElement('td');
			let td7C = document.createElement('label');
			td7C.innerHTML = tTakers[i].grade;
			td7.appendChild(td7C);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td4);
			tr.appendChild(td5);
			tr.appendChild(td6);
			tr.appendChild(td7);
			table.appendChild(tr);
		}
	</script>
</body>
</html>