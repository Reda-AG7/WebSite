<?php
session_start();
if(!isset($_SESSION['ucid'])){
	header('location: ../index.php');
	exit();
}
if(isset($_POST['submit'])){
	$studentID = $_POST['studentID'];
	$testID = $_POST['testID'];
	$title = $_POST['title'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/navigationStyle.css">
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/viewTest.css">
	<title></title>
</head>
<script>
	let map = new Map();
</script>
<body>
	<?php 
		include_once 'header.php';
		include_once '../include/functions_inc.php';
		$studentTest = getStudentTest($studentID,$testID);
		$s = str_replace("\\","\\\\",$studentTest);
		$r = str_replace("'","\'",$s);
		//echo $s;
	?>
	<div class="container">
		<form class="form" method="post" action="../include/correctTest_inc.php">
			
		</form>
	</div>
</body>
	<script type="text/javascript">

		var qs = JSON.parse('<?= $r;?>');
		let title = '<?= $title?>';
		console.log(qs);
		let finalScore = 0
		let outOf = 0;
		let rel = document.querySelector('.form')

		for(let i=0;i<qs.length-1;i++){

			let mainQ = document.createElement('div')
			mainQ.setAttribute('class','mainQ')
			//question and answer div
			let qAnsDiv = document.createElement('div')
			qAnsDiv.setAttribute('class','qAnsDiv')

			let t = document.createElement('div')
			t.setAttribute('class','t')

			let title = document.createElement('h2')
			title.innerHTML = 'Question: '+(i+1);

			let originalS = document.createElement('h3')
			originalS.innerHTML = qs[i].originalScore+' pts';

			t.appendChild(title)
			t.appendChild(originalS)

			let qTitle = document.createElement('h5')
			qTitle.setAttribute('id','titles')
			qTitle.innerHTML = 'Q:'; 

			let q = document.createElement('label')
			q.innerHTML = qs[i].question
			q.setAttribute('id','qLabels')

			let qAnswer = document.createElement('h5')
			qAnswer.setAttribute('id','titles')
			qAnswer.innerHTML = 'A:'; 

			let ans = document.createElement('textarea')
			ans.textContent = qs[i].answer
			ans.setAttribute('readonly','')
			ans.setAttribute('id','answer')
			

			qAnsDiv.appendChild(t)
			qAnsDiv.appendChild(qTitle)
			qAnsDiv.appendChild(q)
			qAnsDiv.appendChild(qAnswer)
			qAnsDiv.appendChild(ans)

			mainQ.appendChild(qAnsDiv)

			//rel.appendChild(mainQ)

			//function name table
			let fNameTitle = document.createElement('h3')
			fNameTitle.innerHTML = 'Checking Function Name:'
			fNameTitle.setAttribute('id','titlesCheck')

			let fNameTable = document.createElement('table')
			fNameTable.setAttribute('id','fNameTable')

			let trFName = document.createElement('tr')
			let th1 = document.createElement('th')
			th1.setAttribute('width','25%')
			th1.innerHTML = 'Function Name'
			let th2 = document.createElement('th')
			th2.setAttribute('width','25%')
			th2.innerHTML = 'Student Input'
			let th3 = document.createElement('th')
			th3.setAttribute('width','25%')
			th3.innerHTML = 'Correct'
			let th4 = document.createElement('th')
			th3.setAttribute('width','25%')
			th4.innerHTML = 'Points'
			
			trFName.appendChild(th1)
			trFName.appendChild(th2)
			trFName.appendChild(th3)
			trFName.appendChild(th4)

			let trData = document.createElement('tr')
			let td1 = document.createElement('td')
			td1.innerHTML = qs[i].functionName
			let td2 = document.createElement('td')
			td2.innerHTML = qs[i].studentFname
			let td3 = document.createElement('td')
			if(qs[i].functionNamePts == null){
				td3.innerHTML = '-'
			}
			else if(qs[i].functionNamePts>0){
				td3.innerHTML = 'yes'
			}
			else{
				td3.innerHTML = 'no'
			}
			
			let td4 = document.createElement('td')
			let inputFnamePts = document.createElement('input')
			inputFnamePts.setAttribute('name','functionNamePts[]')
			inputFnamePts.setAttribute('id','q'+qs[i].questionID)
			inputFnamePts.setAttribute('type','text')
			if(qs[i].functionNamePts !== null){
				inputFnamePts.setAttribute('value',qs[i].functionNamePts)
			}
			td4.appendChild(inputFnamePts)
			
			trData.appendChild(td1)
			trData.appendChild(td2)
			trData.appendChild(td3)
			trData.appendChild(td4)


			fNameTable.appendChild(trFName)
			fNameTable.appendChild(trData)

			mainQ.appendChild(fNameTitle)
			mainQ.appendChild(fNameTable)
			
			

			//cases table

			let casesTitle = document.createElement('h3')
			casesTitle.innerHTML = 'Checking Cases:'
			casesTitle.setAttribute('id','titlesCheck')

			let casesTable = document.createElement('table')
			casesTable.setAttribute('class','casesTable')

			let casesTh = document.createElement('tr')
			let th11 = document.createElement('th')
			th11.innerHTML = 'Case Input'
			th11.setAttribute('width','20%')
			let th12 = document.createElement('th')
			th12.innerHTML = 'Case Output'
			th12.setAttribute('width','20%')
			let th13 = document.createElement('th')
			th13.innerHTML = 'Student Output'
			th13.setAttribute('width','20%')
			let th14 = document.createElement('th')
			th14.innerHTML = 'Correct'
			th14.setAttribute('width','20%')
			let th15 = document.createElement('th')
			th15.innerHTML = 'Points'
			th15.setAttribute('width','20%')

			casesTh.appendChild(th11)
			casesTh.appendChild(th12)
			casesTh.appendChild(th13)
			casesTh.appendChild(th14)
			casesTh.appendChild(th15)

			casesTable.appendChild(casesTh)

			for(let a=0;a<qs[i].cases.length;a++){
				let casesTr = document.createElement('tr')
				let td1 = document.createElement('td')
				td1.innerHTML = qs[i].cases[a].case
				let td2 = document.createElement('td')
				td2.innerHTML = qs[i].cases[a].answer
				let td3 = document.createElement('td')
				td3.innerHTML = qs[i].cases[a].caseAnswer
				let td4 = document.createElement('td')
				if(qs[i].cases[i].casePts != null && qs[i].cases[a].casePts <= 0){
					td4.innerHTML = 'no'
				}
				else{
					td4.innerHTML = 'yes'
				}
				let td5 = document.createElement('td')
				let casePoints = document.createElement('input')
				casePoints.setAttribute('name','casePoints[]')
				casePoints.setAttribute('type','text')
				casePoints.setAttribute('id','q'+qs[i].questionID)
				if(qs[i].cases[a].casePts !== null){
					casePoints.setAttribute('value',qs[i].cases[a].casePts)
				}
				td5.appendChild(casePoints)
				//td5.innerHTML = qs[i].cases[a].casePts

				casesTr.appendChild(td1)
				casesTr.appendChild(td2)
				casesTr.appendChild(td3)
				casesTr.appendChild(td4)
				casesTr.appendChild(td5)



				let hiddenCaseID = document.createElement('input')
				hiddenCaseID.setAttribute('name','caseID[]')
				hiddenCaseID.setAttribute('value',qs[i].cases[a].case)
				hiddenCaseID.hidden = true

				casesTable.appendChild(casesTr)
				casesTable.appendChild(hiddenCaseID)
			}
			mainQ.appendChild(casesTitle)
			mainQ.appendChild(casesTable)

			// constraints:

			let constraintsTitle = document.createElement('h3')
			constraintsTitle.innerHTML = 'Checking Constraints:'
			constraintsTitle.setAttribute('id','titlesCheck')

			let constraintTable = document.createElement('table')
			constraintTable.setAttribute('class','constraintTable')

			let constraintTh = document.createElement('tr')
			let th111 = document.createElement('th')
			th111.innerHTML = 'Constraint'
			th111.setAttribute('width','25%')
			let th112 = document.createElement('th')
			th112.innerHTML = 'Valid'
			th112.setAttribute('width','25%')
			let th113 = document.createElement('th')
			th113.innerHTML = 'Respected'
			th113.setAttribute('width','25%')
			let th114 = document.createElement('th')
			th114.innerHTML = 'Points'
			th114.setAttribute('width','25%')

			constraintTh.appendChild(th111)
			constraintTh.appendChild(th112)
			constraintTh.appendChild(th113)
			constraintTh.appendChild(th114)

			constraintTable.appendChild(constraintTh)

			Object.keys(qs[i].constraints).forEach(key=>{
				let constraintTr = document.createElement('tr')
				let td1 = document.createElement('td')
				td1.innerHTML = key
				let td2 = document.createElement('td')
				td2.innerHTML = qs[i].constraints[key]
				let td3 = document.createElement('td')
				if(qs[i].constraints[key] == true){
					if(key == 'for'){
						if(qs[i].for != null){
							if(qs[i].for <= 0){
								td3.innerHTML = 'no'
							}
							else{
								td3.innerHTML = 'yes'
							}
						}
						else {
							td3.innerHTML = '-'
						}
						
					}
					else if(key == 'while'){
						if(qs[i].while != null){
							if(qs[i].while <= 0){
								td3.innerHTML = 'no'
							}
							else{
								td3.innerHTML = 'yes'
							}
						}
						else{
							td3.innerHTML = '-'
						}
					}
					else if(key == 'recursion'){
						if(qs[i].recursion != null){
							if(qs[i].recursion <= 0){
								td3.innerHTML = 'no'
							}
							else{
								td3.innerHTML = 'yes'
							}
						}
						else{
							td3.innerHTML = '-'
						}
					}
					
				} 	
				else{
					td3.innerHTML = '-'
				}
				let td4 = document.createElement('td')
				let constraintsPoints = document.createElement('input')
				constraintsPoints.setAttribute('name','constraintsPoints[]')
				constraintsPoints.setAttribute('type','text')
				constraintsPoints.setAttribute('id','q'+qs[i].questionID)
				if(key == 'for'){
					if(qs[i].for == null){
						constraintsPoints.innerHTML = '';
					}
					else{
						constraintsPoints.setAttribute('value',qs[i].for)
					}
				}
				if(key == 'while'){
					if(qs[i].while == null){
						constraintsPoints.innerHTML = '';
					}
					else{
						constraintsPoints.setAttribute('value',qs[i].while)
					}
				}
				if(key == 'recursion'){
					if(qs[i].recursion == null){
						constraintsPoints.innerHTML = '';
					}
					else{
						constraintsPoints.setAttribute('value',qs[i].recursion)
					}
				}
				

				td4.appendChild(constraintsPoints)

				constraintTr.appendChild(td1)
				constraintTr.appendChild(td2)
				constraintTr.appendChild(td3)
				constraintTr.appendChild(td4)

				constraintTable.appendChild(constraintTr)
			})	
			mainQ.appendChild(constraintsTitle)
			mainQ.appendChild(constraintTable)



			//comments and result

			let commTitle = document.createElement('h3')
			commTitle.innerHTML = 'Comment & question\'s score:'
			commTitle.setAttribute('id','titlesCheck')

			let commTable = document.createElement('table')
			commTable.setAttribute('class','commTable')

			let commTh = document.createElement('tr')
			let th1111 = document.createElement('th')
			th1111.innerHTML = 'Comment'
			th1111.setAttribute('width','70%')
			let th1112 = document.createElement('th')
			th1112.innerHTML = 'score'
			th1112.setAttribute('width','20%')

			let th1113 = document.createElement('th')
			th1113.innerHTML = 'save'
			th1113.setAttribute('width','10%')

			commTh.appendChild(th1111)
			commTh.appendChild(th1112)
			commTh.appendChild(th1113)

			let commTr = document.createElement('tr')
			let td11 = document.createElement('td')
			let temp;
			if(qs[i].comment != null){
				temp = qs[i].comment
			}
			else{
				temp = ""
			}
			let textComm = document.createElement('textarea')
			textComm.innerHTML = temp
			textComm.setAttribute('name','comment[]')
			td11.appendChild(textComm)
			let td21 = document.createElement('td')
			/*let resltDiv = document.createElement('div')
			resltDiv.setAttribute('class','resltDiv')

			let r = document.createElement('input')
			r.setAttribute('value',qs[i].score)
			r.setAttribute('name','questionResult[]')*/

			let o = document.createElement('label')
			o.setAttribute('id','s'+qs[i].questionID)
			o.innerHTML = qs[i].score
			map[qs[i].questionID] = Number(qs[i].score)

			let td31 = document.createElement('td')
			let saveB = document.createElement('button')
			saveB.setAttribute('type','button')
			saveB.setAttribute('id','updateQResult')
			saveB.innerHTML = 'Save'
			let n = 'save('+qs[i].questionID+')'
			saveB.setAttribute('onclick',n)
			td31.appendChild(saveB)
			
			//resltDiv.appendChild(r)
			//resltDiv.appendChild(o)
			td21.appendChild(o)
			outOf += Number(qs[i].originalScore)
			finalScore += Number(qs[i].score)

			commTr.appendChild(td11)
			commTr.appendChild(td21)
			commTr.appendChild(td31)

			commTable.appendChild(commTh)
			commTable.appendChild(commTr)

			mainQ.appendChild(commTitle)
			mainQ.appendChild(commTable)

			
			rel.appendChild(mainQ)


			let questionIDs = document.createElement('input')
			questionIDs.setAttribute('value',qs[i].questionID)
			questionIDs.setAttribute('name','questionID[]')
			questionIDs.hidden = true

			let numberOfCasess = document.createElement('input')
			numberOfCasess.setAttribute('value',qs[i].cases.length)
			numberOfCasess.setAttribute('name','numberOfCasess[]')
			numberOfCasess.hidden = true

			rel.appendChild(numberOfCasess)
			rel.appendChild(questionIDs)

		}

		let buttomDiv = document.createElement('div')
		buttomDiv.setAttribute('class','bottomDiv')
		let fr = document.createElement('h3')
		fr.innerHTML = 'Final Score : '

		let finalS = document.createElement('h3')
		finalS.setAttribute('value',qs[qs.length-1].grade)
		finalS.innerHTML = qs[qs.length-1].grade
		finalS.setAttribute('id','finalS')

		buttomDiv.appendChild(fr)
		buttomDiv.appendChild(finalS)

		let bb = document.createElement('input')
		bb.setAttribute('type','submit')
		bb.setAttribute('value','update')
		bb.setAttribute('name','update')

		rel.appendChild(buttomDiv)
		rel.appendChild(bb)

		let topDiv = document.createElement('div')
		topDiv.setAttribute('class','topDiv')

		let resultDiv = document.createElement('div')
		resultDiv.setAttribute('class','resultDiv')
		let resultTitle = document.createElement('h3')
		resultTitle.innerHTML= 'Result: '
		let result = document.createElement('h3')

		result.setAttribute('id','finalS')
		result.innerHTML = qs[qs.length-1].grade+'/'+outOf

		resultDiv.appendChild(resultTitle)
		resultDiv.appendChild(result)

		let testTitle = document.createElement('h2')
		testTitle.innerHTML = title

		let studDiv = document.createElement('div')
		studDiv.setAttribute('class','studDiv')
		let studTitle = document.createElement('h3')
		studTitle.innerHTML= 'Student ucid : '
		let studUcid = document.createElement('h3')
		studUcid.innerHTML = '<?= $studentID;?>'
		studDiv.appendChild(studTitle)
		studDiv.appendChild(studUcid)

		let divSec = document.createElement('div')
		divSec.setAttribute('class','divSec')
		divSec.appendChild(studDiv)
		divSec.appendChild(resultDiv)
		topDiv.appendChild(testTitle)
		topDiv.appendChild(divSec)


		rel.insertBefore(topDiv,rel.firstChild)

		//hiddenr info
		let testIdd = document.createElement('input')
		testIdd.setAttribute('value','<?= $testID?>')
		testIdd.setAttribute('name','testID')
		testIdd.hidden = true
		let studentIdd = document.createElement('input')
		studentIdd.setAttribute('value','<?= $studentID?>')
		studentIdd.setAttribute('name','studentID')
		studentIdd.hidden = true
		/*let questionNumbers = document.createElement('input')
		questionNumbers.setAttribute('value',qs.length)
		questionNumbers.setAttribute('name','numberOfQuestions')
		questionNumbers.hidden = true
		rel.appendChild(questionNumbers)*/
		let fS = document.createElement('input')
		fS.setAttribute('id','finalS')
		fS.setAttribute('name','finalS')
		fS.hidden = true
		rel.appendChild(fS)
		rel.appendChild(studentIdd)
		rel.appendChild(testIdd)

		function save(x){
			let v = '#q'+x 
			let saves = document.querySelectorAll(v)
			let t = 0
			saves.forEach(e=>{
				if(e.value > 0){
					t+=Number(e.value)
				}
			})
			let vv = '#s'+x 
			let r = document.querySelector(vv)
			r.innerHTML = t
			r.setAttribute('value',t)

			map[x] = t
			finalScore = 0
			for (let value of Object.values(map)) {
			  finalScore+=value 
			}
			let rr = document.querySelectorAll('#finalS')
			rr.forEach(e=>{
				e.innerHTML = finalScore
				e.value = finalScore
			})
		}
	</script>
</html>