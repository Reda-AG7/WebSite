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
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/makeTest.css">
	<title>make Test</title>
</head>
<body>
	<script >
		var counter = 1
	</script>
	<?php include_once 'header.php'; ?>
	<div class="mainContainer">
		<div class="leftSide">
			<form id="form" action="../include/addTest_inc.php" method="post">
				
				<div class="diff">
					<div class="ttle">
						<input type="text" name="testTitle" placeholder="Test Title">
					</div>
					<select  name="diff">
						<option selected disabled>Difficulty</option>
						<option value="easy">Easy</option>
						<option value="medium">Medium</option>
						<option value="hard">Hard</option>
					</select>
				</div>
				<div class="questions">
						
				</div>
			</form>
		</div>
		<div class="rightSide">
			<?php 
				include_once '../include/functions_inc.php';
				$questions = getAllQuestions();
			?>
			<div class="container">
				<div class="left">
					<div id="old">
						<select class='category' name="searchBy">
							<option selected disabled>By Category</option>
							<option value="all">All</option>
							<option value="functions">Functions</option>
							<option value="strings">Strings</option>
							<option value="arithmetics">Arithmetics</option>
							<option value="arrays">Arrays</option>
						</select>
						<select class='difficulty' name="searchBy">
							<option selected disabled>By Difficulty</option>
							<option value="all">All</option>
							<option value="easy">Easy</option>
							<option value="medium">Medium</option>
							<option value="hard">Hard</option>
						</select>
						<input class="keyword" type="text" name="keyword" placeholder="By Keyword">
						<input  type="button" name="filter" value="Filter" onclick="filter()">
					</div>
				</div>
				<table class="table">
					<tr>
						<th width="10%">Select</th>
						<th width="70%">Question</th>
						<th width="10%">Category</th>
						<th width="10%">Difficulty</th>
					</tr>
				</table>
			</div>
			<script>
				let s = document.querySelector('#mTst')
				s.setAttribute('style','background-color: #fba92c;color: black')</script>
			<script type="text/javascript">
				var qs = JSON.parse('<?= $questions;?>');
				let table = document.querySelector('.table');
				Object.keys(qs).forEach(key => {
					let tr = document.createElement('tr');
					tr.setAttribute('class','tr');

					let td1 = document.createElement('td');
					let td1C = document.createElement('input');
					td1C.setAttribute('type','checkbox');
					td1C.setAttribute('id',qs[key].questionID);
					td1C.setAttribute('align','center');
					td1.appendChild(td1C)

					let td2 = document.createElement('td');
					let td2C = document.createElement('label');
					td2.setAttribute('id','qstn')
					td2C.innerHTML = qs[key].question;
					td2.appendChild(td2C)

					let td4 = document.createElement('td');
					let td4C = document.createElement('label');
					td4C.innerHTML = qs[key].category;
					td4.appendChild(td4C)

					let td3 = document.createElement('td');
					let td3C = document.createElement('label');
					td3C.innerHTML = qs[key].difficulty;
					if(qs[key].difficulty == 'easy'){
						td3C.style.color='#00CE01'
					}
					else if(qs[key].difficulty == 'medium'){
						td3C.style.color='#FE7C00'
					}
					else{
						td3C.style.color='#c10000'
					}
					td3.appendChild(td3C)

					tr.appendChild(td1);
					tr.appendChild(td2);
					tr.appendChild(td4);
					tr.appendChild(td3);
					table.appendChild(tr);
				})</script>

	<script>
		let chkBoxes = document.querySelectorAll('.tr')
		chkBoxes.forEach(e => {
			e.addEventListener('change',function(){check(e)})
		})
		function check(box){
			var leftSide = document.querySelector('.questions')
			if(box.firstChild.firstChild.checked == true){
				//m.set(box.firstChild.firstChild.id,counter)
				let container = document.createElement('div')
				container.setAttribute('class','leftContainer')
				container.setAttribute('id',box.firstChild.firstChild.id)

				let div1 = document.createElement('div')
				div1.setAttribute('class','qNDiv2')
				let div2 = document.createElement('div')
				div2.setAttribute('class','gTitlePoints')
				let gradeTitle = document.createElement('h2')
				gradeTitle.innerHTML = 'Assign points'
				let score = document.createElement('input')
				score.setAttribute('name','score[]')
				score.setAttribute('type','text')
				score.setAttribute('class','score')
				div2.appendChild(gradeTitle)
				div2.appendChild(score)
				let q = document.createElement('h2')
				q.innerHTML = "Question : "+(counter)
				counter+=1
				

				//test 
				let l = document.createElement('input')
				l.setAttribute('name','ids[]')
				l.setAttribute('value',box.firstChild.firstChild.id)
				l.setAttribute('type','hidden')
				//l.style.display = 'none'
				div1.appendChild(l)

				div1.appendChild(q)
				div1.appendChild(div2)

				let divQ = document.createElement('div')
				divQ.setAttribute('class','divQuestion')
				let pQ = document.createElement('p')
				pQ.innerHTML = box.children[1].children[0].textContent
				divQ.appendChild(pQ)

				container.appendChild(div1)
				container.appendChild(divQ)

				leftSide.appendChild(container)
			}
			else{
				let divToBeDeleted = document.querySelectorAll('.leftContainer')
				divToBeDeleted.forEach(e => {
					if(e.id == box.firstChild.firstChild.id){
						e.remove()
						let leftContainers = document.querySelectorAll('.leftContainer')
						counter = 1
						leftContainers.forEach(b => {
							b.children[0].children[1].innerHTML = "Question : "+(counter) 	
							counter+=1
						})
					}
				})
				
			}
			createSaveButton()	
		}
		function createSaveButton(){
			let btn = document.createElement('button')
			btn.setAttribute('class','save')
			btn.setAttribute('name','save')
			btn.setAttribute('type','submit')
			btn.innerHTML = 'Save'
			let c = document.querySelector('#form')
			let b = document.querySelector('.save')
			if(counter !== 1){
				if(b !== null){
					b.remove()
				}
				c.appendChild(btn)
			}
			else{
				if(b !== null){
					b.remove()	
				}
			}
		}
	</script>

<script type="text/javascript">
	function filter(){

		let dif = document.querySelector('.difficulty')
		let cat = document.querySelector('.category')
		let keyword = document.querySelector('.keyword')

		let p = document.querySelector('.table')
		let c = p.querySelectorAll('.tr')
		displayAll(c)
		
			for(var i = 0;i<c.length;i++){
				if(cat.value.toLowerCase() == 'all' || cat.value.toLowerCase()=='by category'){
					break;
				}
				if(c[i].children[2].firstChild.firstChild.textContent.toLowerCase() !== cat.value.toLowerCase()){
					console.log(cat.value.toLowerCase())
					c[i].hidden = true
				}
			}
			for(var i = 0;i<c.length;i++){
				if(dif.value.toLowerCase() == 'all' || dif.value.toLowerCase()=='by difficulty'){
					break;
				}
				if(c[i].children[3].firstChild.firstChild.textContent.toLowerCase() !== dif.value.toLowerCase()){
					console.log(dif.value.toLowerCase())
					c[i].hidden = true
				}
			}
			for(var i=0;i<c.length;i++){
				if(keyword.value.toLowerCase() == ''){
					break;
				}
				if(c[i].children[1].firstChild.firstChild.textContent.toLowerCase().search(keyword.value.toLowerCase()) == -1){
					console.log(keyword.value.toLowerCase())
					c[i].hidden = true
				}
			
			}
	}
	function displayAll(c){
		for(var i = 0;i<c.length;i++){
			c[i].hidden = false
		}
	}
</script>
		</div>
	</div>
</body>
</html>