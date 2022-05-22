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
	<link rel="stylesheet" type="text/css" href="../css/studentStyle/takeTest.css">
	<title>Test</title>
</head>
<body>
	<script type="text/javascript">
		let x = 0;
	</script>
	<?php
		include_once '../include/functions_inc.php';
		include_once 'header.php';
		$testID = $_GET['testID'];
		$autoGrade = $_GET['autoGrade'];
		$test = getTest($testID);
		$s = str_replace("'","\'",$test);
		$_SESSION['test'] = $test;
		//$testDec = json_decode($test);
	?>
	<!--<h2><?=$testDec[count($testDec)-1];?></h2>-->
	<form class="homeWrapper" method="post" action="../include/insertAnswers_inc.php">
			<script type="text/javascript">
				let counter = 1;
				let test = JSON.parse('<?=$s;?>');
				let size = test.length - 1
				console.log(test);
				let parent = document.createElement('div')
				parent.setAttribute('class','parent');

				let testTitle = document.createElement('h2')
				testTitle.innerHTML = test[test.length-1];

				parent.appendChild(testTitle)
				let count = 0
				for(let i=0;i<test.length-1;i++){
					let questionDiv = document.createElement('div')
					questionDiv.setAttribute('class','questionDiv')
					questionDiv.setAttribute('id',count)

					let top = document.createElement('div')
					top.setAttribute('class','top')

					let questionN = document.createElement('label')
					questionN.setAttribute('id','questionN')
					questionN.innerHTML='Question: '+counter++;

					let score = document.createElement('label')
					score.setAttribute('id','score')
					score.innerHTML=test[i].score+' Pts';

					top.appendChild(questionN)
					top.appendChild(score)

					let question = document.createElement('label')
					question.setAttribute('id','question')
					question.innerHTML = test[i].question+'.'

					let answer = document.createElement('textarea')
					answer.setAttribute('name','answer[]')
		  			answer.setAttribute('class','answer')
		  			answer.setAttribute('style','white-space:pre')
		  			answer.setAttribute('placeholder','...')

		  			questionDiv.appendChild(top)
		  			questionDiv.appendChild(question)
		  			questionDiv.appendChild(answer)

		  			if(count != 0){
		  				questionDiv.style.display = 'none'
		  			}
		  			parent.appendChild(questionDiv)
		  			count++
				}
				let j = document.createElement('div')
				j.setAttribute('class','j')
				let next = document.createElement('button')
				next.setAttribute('name','Next')
				next.setAttribute('class','jump')
				next.setAttribute('onclick','nextQ()')
				next.setAttribute('type','button')
				next.innerHTML='>>'

				let prev = document.createElement('button')
				prev.setAttribute('name','prev')
				prev.setAttribute('class','jump')
				prev.setAttribute('onclick','previousQ()')
				prev.setAttribute('type','button')
				prev.innerHTML='<<'

				j.appendChild(prev)
				j.appendChild(next)

				let b = document.createElement('button')
				b.setAttribute('name','submit')
				b.setAttribute('class','submit')
				b.innerHTML='Submit'

				let hiddenInput1 = document.createElement('input')
				hiddenInput1.setAttribute('name','autoGrade')
				hiddenInput1.setAttribute('value','<?=$autoGrade?>')
				hiddenInput1.hidden = true

				let hiddenInput2 = document.createElement('input')
				hiddenInput2.setAttribute('name','testID')
				hiddenInput2.setAttribute('value','<?=$testID?>')
				hiddenInput2.hidden = true

				parent.appendChild(j)
				parent.appendChild(b)
				let rel = document.querySelector('.homeWrapper')
				rel.appendChild(parent)
				rel.appendChild(hiddenInput1)
				rel.appendChild(hiddenInput2)
				
			</script>
			<script>
			const textarea = document.querySelector('textarea')
			textarea.addEventListener('keydown', (e) => {
			  if (e.keyCode === 9) {
			    e.preventDefault()

			    textarea.setRangeText(
			      '     ',
			      textarea.selectionStart,
			      textarea.selectionStart,
			      'end'
			    )
			  }
			})
			function nextQ(){
				let o = (x+1)%size
				let q = document.getElementById(x)
				q.style.display = 'none'
				let l = document.getElementById(o)
				l.style.display = 'initial'
				x = o
			}
			function previousQ(){
				let o = 0 
				if(x == 0){
					o = size-1
				}
				else{
				 	o = x-1
				}
				let q = document.getElementById(x)
				q.style.display = 'none'
				let l = document.getElementById(o)
				l.style.display = 'initial'
				x = o
			}
		</script>
	</form>
</body>
</html>