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
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/teacher.css">
	<title>Teacher</title>
</head>
<body>
	<?php 
		include_once 'header.php'; 
		include_once '../include/functions_inc.php';

		$tests = getAllTests($_SESSION['ucid']);
		$classes = getAllClasses($_SESSION['ucid']);
	?>
	<div class="container">
		<div class="top">
			<div class="left">
        <label id="error" hidden></label>
				<div id="old">
					<select class='searchBy' name="searchBy">
						<option selected disabled>Difficulty</option>
						<option value="all">ALL</option>
						<option value="easy">Easy</option>
						<option value="medium">Medium</option>
						<option value="hard">Hard</option>
					</select>
				</div>
			</div>
			
		</div>
		<table class="table">
			<tr>
				<th width="10%">Select</th>
				<th width="30%">Title</th>
				<th width="20%">Difficulty</th>
				<th width="20%">Publish</th>
				<th width="20%">Due Date</th>
			</tr>
		</table>
	</div>
	<script>
		let s = document.querySelector('.home')
		s.setAttribute('style','background-color: #fba92c;color: black')
	</script>
	<script type="text/javascript">
		var qs = JSON.parse('<?= $tests;?>');
		console.log(qs);
		let table = document.querySelector('.table');
		for(let i=0;i<qs.length;i++){
			let tr = document.createElement('tr');
			tr.setAttribute('class','tr');

			let td1 = document.createElement('td');
			let td1C = document.createElement('input');
			td1C.setAttribute('type','checkbox');
			td1C.setAttribute('id',qs[i].testID);
			td1.appendChild(td1C)

			/*let td2 = document.createElement('td');
			let td2C = document.createElement('a');
			let link = 'testTakers.php?testID='+qs[i].testID+'&title='+qs[i].title;
			td2C.setAttribute('href',link)
			td2C.innerHTML = qs[i].title;
			td2.appendChild(td2C)*/


			let td2 = document.createElement('td');
			td2.setAttribute('id','tdTitle')
			let form = document.createElement('form');
			form.setAttribute('action','testTakers.php')
			form.setAttribute('method','post')
			let td2C = document.createElement('button');
			td2C.setAttribute('type','submit')
			td2C.setAttribute('name','submit')
			td2C.innerHTML = qs[i].title;

			let hiddenInput1 = document.createElement('input')
			hiddenInput1.setAttribute('name','testID')
			hiddenInput1.setAttribute('value',qs[i].testID)
			hiddenInput1.hidden = true 
			let hiddenInput2 = document.createElement('input')
			hiddenInput2.setAttribute('name','testTitle')
			hiddenInput2.setAttribute('value',qs[i].title)
			hiddenInput2.hidden = true 
			form.appendChild(td2C)
			form.appendChild(hiddenInput1);
			form.appendChild(hiddenInput2);
			td2.appendChild(form);

			let td4 = document.createElement('td');
			let td4C = document.createElement('label');
			td4C.innerHTML = qs[i].difficulty;
			if(qs[i].difficulty == 'easy'){
				td4C.style.color='#00CE01'
			}
			else if(qs[i].difficulty == 'medium'){
				td4C.style.color='#FE7C00'
			}
			else{
				td4C.style.color='#c10000'
			}
			td4.appendChild(td4C)

			let td5 = document.createElement('td');
			let td5C = document.createElement('label');
			if(qs[i].dueDate === null){
				td5C.innerHTML = 'ND';
			}
			else{
				td5C.innerHTML = qs[i].dueDate;
			}
			td5.appendChild(td5C)

			let td3 = document.createElement('td');
			let td3L = document.createElement('label');
			td3L.setAttribute('class','switch')
			
			let td3C = document.createElement('input');
			td3C.setAttribute('type','checkbox');
			td3C.setAttribute('value',qs[i].testID);
			td3C.setAttribute('id','switchBox');

			let sp = document.createElement('span')
			sp.setAttribute('class','slider')

			td3L.appendChild(td3C)
			td3L.appendChild(sp)
			//td3C.setAttribute('onclick','trigger()');
			
			if(qs[i].isPublished == true){
				td3C.checked = true;
			}
			else{
				td3C.checked = false;
			}
			
			td3.appendChild(td3L)

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td4);
			tr.appendChild(td3);
			tr.appendChild(td5);
			table.appendChild(tr);
		}
	</script>
	<script type="text/javascript">
			let c = document.querySelectorAll('.tr')
			let choice = document.querySelectorAll('.searchBy');
			choice.forEach(e=>{
				e.addEventListener('change',function(){filter(e,c)})
			})

			function filter(e,c){
				displayAll(c)
				if(e.value.toLowerCase() == 'all'){
					return
				}
				else{
					for(let i=0;i<c.length;i++){
						if(c[i].children[2].firstChild.firstChild.textContent.toLowerCase() !== e.value.toLowerCase()){
							console.log(e.value.toLowerCase())
							c[i].hidden = true
						}
					}
				}
			}


		function displayAll(c){
			for(var i = 0;i<c.length;i++){
				c[i].hidden = false
			}
		}
	</script>
	<script type="text/javascript">
		var classes = JSON.parse('<?= $classes;?>');
		console.log(classes)
		let closePressed = null;
		let switches = document.querySelectorAll('#switchBox')
		switches.forEach(switchBox => { 
			
			switchBox.addEventListener('change', function(){
				closePressed = switchBox;
				listen(switchBox)})
		})
		function listen(bx){
			console.log(bx.value)
			console.log(closePressed.value)
			if(bx.checked == true){

				let bb = document.getElementsByTagName('body')
				let parent = document.createElement('div')
				parent.setAttribute('class','parent')
				let f = document.createElement('form')
				f.setAttribute('action','../include/publish_inc.php')
				f.setAttribute('method','post')

				let c = document.createElement('div')
				c.setAttribute('class','child')

				//title
				let t = document.createElement('h2')
				t.innerHTML = "Publish";

				let divAuto = document.createElement('div')
				divAuto.setAttribute('class','divAuto')

				//autoGrade checkbox
				let autoGrade = document.createElement('input')
				autoGrade.setAttribute('type','checkbox')
				autoGrade.setAttribute('name','autoGrade')

				//autoGrade label
				let autoGradeLabel = document.createElement('label')
				autoGradeLabel.setAttribute('for','autoGrade')
				autoGradeLabel.innerHTML = 'Auto Grade'

				divAuto.appendChild(autoGrade)
				divAuto.appendChild(autoGradeLabel)

				//classes
				let divClasses = document.createElement('div')
				divClasses.setAttribute('class','divClasses')

				let divClassTitle = document.createElement('h3')
				divClassTitle.innerHTML = 'Assign to:'

				divClasses.appendChild(divClassTitle)

				Object.keys(classes).forEach(key=>{
					//classes
					let divClass = document.createElement('div')
					divClass.setAttribute('class','divClass')

					//class label
					let classLabel = document.createElement('label')
					classLabel.setAttribute('for','class')
					classLabel.setAttribute('id',key)
					classLabel.innerHTML = classes[key]

					//autoGrade checkbox
					let classCheckBox = document.createElement('input')
					classCheckBox.setAttribute('type','checkbox')
					classCheckBox.setAttribute('name','class[]')
					classCheckBox.setAttribute('id',key)
					classCheckBox.setAttribute('value',key)

					divClass.appendChild(classCheckBox)
					divClass.appendChild(classLabel)

					divClasses.appendChild(divClass)
				})

				//close button
				let close = document.createElement('button')
				close.setAttribute('type','button')
				close.setAttribute('id','close')
				close.setAttribute('onclick','cancelTrigger()')
				close.innerHTML = "X";

				//date Title
				let dateLabel = document.createElement('h3')
				dateLabel.setAttribute('id','dueDate')
				dateLabel.innerHTML="Due Date:"

				//duedate input
				let date = document.createElement('input')
				date.setAttribute('type','datetime-local')
				date.setAttribute('name','date')


				//save button
				let s = document.createElement('input')
				s.setAttribute('type','submit')
				s.setAttribute('name','save')
				s.setAttribute('value','Save')
				c.appendChild(t)
				c.appendChild(close)
				c.appendChild(divAuto)
				c.appendChild(divClasses)
				c.appendChild(dateLabel)
				c.appendChild(date)
				c.appendChild(s)

				let hiddenInput = document.createElement('input')
				hiddenInput.setAttribute('value',bx.value)
				hiddenInput.setAttribute('name','testID')
				hiddenInput.hidden = true
				f.appendChild(c)
				f.appendChild(hiddenInput)
				parent.appendChild(f)
				bb[0].appendChild(parent)
			}
			else{
				let bb = document.getElementsByTagName('body')
				let f = document.createElement('form')
				f.setAttribute('action','../include/unpublish_inc.php')
				f.setAttribute('method','post')
				f.setAttribute('id','unpublish')

				let hiddenInput = document.createElement('input')
				hiddenInput.setAttribute('value',bx.value)
				hiddenInput.setAttribute('name','testID')
				hiddenInput.hidden = true
				f.appendChild(hiddenInput)
				bb[0].appendChild(f)

				document.getElementById('unpublish').submit();
			}

		}
		function cancelTrigger(){
			let father = document.getElementsByTagName('body')
			let globalPage = document.querySelector('.parent')
			globalPage.style.visibility = 'hidden'
			father[0].removeChild(globalPage)
			closePressed.checked = false;
		}
	</script>
 	</script>
		<script type="text/javascript">
		let e = "<?= $_GET['error'];?>";
		if (e === 'testInsertedSuccessfully'){
			displayErr("test Inserted Successfully",'success')
		}
		else if(e === 'testNotInserted'){
			displayErr("test insertion Failed",'failure')
		}
    else if(e === 'testPublishedSuccessfully'){
			displayErr("test Published successfully",'success')
		}
    else if(e === 'testIsNotPublished'){
			displayErr("Publishing Test Failed",'failure')
		}
    else if(e === 'testUnpublishedSuccessfully'){
			displayErr("test unpublished successfully",'success')
		}
    else if(e === 'unpublishingTestFailed'){
			displayErr("Unublishing Test Failed",'failure')
		}
   else if(e === 'testCorrectedSuccessfully'){
			displayErr("test Corrected Successfully",'success')
		}
   else if(e === 'testCorrectionFailed'){
			displayErr("test Correction Failed",'failure')
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