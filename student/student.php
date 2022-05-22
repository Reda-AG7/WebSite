<?php
session_start();
if(!isset($_SESSION['ucid'])){
	header('location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/studentStyle/navigationStyle.css">
	<link rel="stylesheet" type="text/css" href="../css/studentStyle/student.css">
	<title>Student</title>
</head>
<body>
	<?php
		include_once 'header.php';
		include_once '../include/functions_inc.php';
		$studentTests = getAllStudentTests($_SESSION['ucid']);
		//print_r($studentTests);
	?>
   
	<div class="container">
    <label id="error"></label>
		<table class="table">
			<tr>
				<th width="20%">Test</th>
				<th width="20%">Title</th>
				<th width="10%">Submitted</th>
				<th width="10%">Corrected</th>
				<th width="30%">Due Date</th>
				<th width="10%">Score</th>
			</tr>
		</table>
	</div>
	<script>
		let s = document.querySelector('.home')
		s.setAttribute('style','background-color: #fba92c;color: black')
	</script>
	<script type="text/javascript">
		var sTests = JSON.parse('<?= $studentTests;?>');
		console.log(sTests);
		let table = document.querySelector('.table');
		for(let i=0;i<sTests.length;i++){
			let tr = document.createElement('tr');
			tr.setAttribute('class','tr');

			let td1 = document.createElement('td');
			let td1C = document.createElement('a');
			if(sTests[i].isPublished == true && sTests[i].isSubmitted == false){
				td1C.innerHTML = 'Take Test';
				link ='takeTest.php?testID='+sTests[i].testID+'&autoGrade='+sTests[i].autoGrade
				td1C.setAttribute('href',link)
			}
			else{
				td1C.innerHTML = 'View Test'
				if(sTests[i].isCorrected == true){
					link ='viewTest.php?testID='+sTests[i].testID+'&title='+sTests[i].title
					title = 'view your test answers'
				}
				else{
					link = 'student.php';
					title = 'test is not corrected yet'
				}
				td1C.setAttribute('href',link)
				td1C.setAttribute('title',title)
			}
			td1C.setAttribute('id',sTests[i].testID);
			td1.appendChild(td1C);

			let td2 = document.createElement('td');
			let td2C = document.createElement('label');
			td2C.innerHTML = sTests[i].title;
			td2.appendChild(td2C);

			let td5 = document.createElement('td');
			let td5C = document.createElement('label');
			if(sTests[i].isSubmitted == true){
				td5C.innerHTML = 'Yes';
			}
			else{
				td5C.innerHTML = 'No';
			}
			td5.appendChild(td5C);

			let td6 = document.createElement('td');
			let td6C = document.createElement('label');
			if(sTests[i].isCorrected == true){
				td6C.innerHTML = 'Yes';
			}
			else{
				td6C.innerHTML = 'Not yet';
			}
			
			td6.appendChild(td6C)

			let td7 = document.createElement('td');
			let td7C = document.createElement('label');
			td7C.innerHTML = sTests[i].dueDate;
			td7.appendChild(td7C);

			let td8 = document.createElement('td');
			let td8C = document.createElement('label');
			td8C.innerHTML = sTests[i].grade;
			td8.appendChild(td8C);

			tr.appendChild(td1);
			tr.appendChild(td2);
			//tr.appendChild(td4);
			tr.appendChild(td5);
			tr.appendChild(td6);
			tr.appendChild(td7);
			tr.appendChild(td8);
			table.appendChild(tr);
		}
	</script>
 		<script type="text/javascript">
  		let e = "<?= $_GET['error'];?>";
  		if (e === 'testSubmittedSuccessfully'){
  			displayErr("test submitted Successfully",'success')
  		}
  		else if(e === 'testSubmissionFailed'){
  			displayErr("test Submission Failed",'failure')
  		}
      
  		function displayErr(err,status){
  			let s = document.querySelector('#error');
  			s.innerHTML = err
  			if(status === 'failure'){
  				s.setAttribute('class','failure')
  			}
  			else{
  				s.setAttribute('class','success')
  			}
  			s.style.display = 'block';
  			var time = 1
  			var interval = setInterval(function(){
  				if(time < 7){
  					s.style.opacity = 1-(time*0.1) ;
  					time++;
  					if(time == 6){
  						s.style.display = 'none';
  					}
  				}
  				else{
  					clearInterval(interval)
  				}
  
  			},1000)
  		}
     </script>
</body>
</html>