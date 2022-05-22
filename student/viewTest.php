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
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/navigationStyle.css">
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/viewTest.css">
	<title></title>
</head>
<body>
	<?php 
		include_once 'header.php';
		include_once '../include/functions_inc.php';
		$testID = $_GET['testID'];
		$testTitle = $_GET['title'];
		$studentTest = getStudentTest($_SESSION['ucid'],$testID);
		$s = str_replace("\\","\\\\",$studentTest);
		$r = str_replace("'","\'",$s);
		//echo $s;
	?>
	<div class="container">
	</div>
</body>
	<script type="text/javascript">
		var qs = JSON.parse('<?= $r;?>');
		let title = '<?= $testTitle;?>'
		console.log(qs);
		let finalScore = 0
		let outOf = 0;
		let rel = document.querySelector('.container')

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
			if(qs[i].functionNamePts != null && qs[i].functionNamePts>0){
				td3.innerHTML = 'yes'
			}
			else{
				td3.innerHTML = 'no'
			}
			
			let td4 = document.createElement('td')
			td4.innerHTML = qs[i].functionNamePts
			
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
				td5.innerHTML = qs[i].cases[a].casePts

				casesTr.appendChild(td1)
				casesTr.appendChild(td2)
				casesTr.appendChild(td3)
				casesTr.appendChild(td4)
				casesTr.appendChild(td5)

				casesTable.appendChild(casesTr)
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
						if(qs[i].for <= 0){
							td3.innerHTML = 'no'
						}
						else{
							td3.innerHTML = 'yes'
						}
					}
					else if(key == 'while'){
						if(qs[i].while <= 0){
							td3.innerHTML = 'no'
						}
						else{
							td3.innerHTML = 'yes'
						}
					}
					else if(key == 'recursion'){
						if(qs[i].recursion <= 0){
							td3.innerHTML = 'no'
						}
						else{
							td3.innerHTML = 'yes'
						}
					}
					
				} 	
				else{
					td3.innerHTML = '-'
				}
				let td4 = document.createElement('td')
				if(key != null && key == 'for'){
					td4.innerHTML = qs[i].for
				}
				else if(key != null && key == 'while'){
					td4.innerHTML = qs[i].while
				}
				else{
					td4.innerHTML = qs[i].recursion
				}

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
			th1111.setAttribute('width','80%')
			let th1112 = document.createElement('th')
			th1112.innerHTML = 'score'
			th1112.setAttribute('width','20%')

			commTh.appendChild(th1111)
			commTh.appendChild(th1112)

			let commTr = document.createElement('tr')
			let td11 = document.createElement('td')
			let textComm = document.createElement('textarea')
			textComm.setAttribute('name','comment')
			textComm.setAttribute('readonly','')
			textComm.innerHTML = qs[i].comment
			//textComm.innerHTML = temp
			td11.appendChild(textComm)

			let td21 = document.createElement('td')
			td21.innerHTML = qs[i].score+' out of '+qs[i].originalScore
			outOf += Number(qs[i].originalScore)
			finalScore += Number(qs[i].score)

			commTr.appendChild(td11)
			commTr.appendChild(td21)

			commTable.appendChild(commTh)
			commTable.appendChild(commTr)

			mainQ.appendChild(commTitle)
			mainQ.appendChild(commTable)

			rel.appendChild(mainQ)
		}
		let topDiv = document.createElement('div')
		topDiv.setAttribute('class','topDiv')

		let resultDiv = document.createElement('div')
		resultDiv.setAttribute('class','resultDiv')
		resultDiv.setAttribute('id','rr')
		let resultTitle = document.createElement('h3')
		resultTitle.innerHTML= 'Result: '
		let result = document.createElement('h3')
		result.setAttribute('id','result')
		result.innerHTML = qs[qs.length-1].grade+'/'+outOf

		resultDiv.appendChild(resultTitle)
		resultDiv.appendChild(result)
 
		let testTitle = document.createElement('h2')
		testTitle.innerHTML = title

		topDiv.appendChild(testTitle)
		topDiv.appendChild(resultDiv)

		

		rel.insertBefore(topDiv,rel.firstChild)

	</script>
</html>