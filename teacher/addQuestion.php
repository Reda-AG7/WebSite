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
	<link rel="stylesheet" type="text/css" href="../css/teacherStyle/addQuestion.css">
	<title>add question</title>
</head>
<body>
	<?php 
		include_once 'header.php';
		include_once '../include/functions_inc.php';
		$questions = getAllQuestions2();
	?>
	<div class="container">
		<div class="rightContainer">
			<div class="top">
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
				
			</div>
			<table class="table">
				<tr>
					<th width="10%">Function Name</th>
					<th width="70%">Question</th>
					<th width="10%">Category</th>
					<th width="10%">Difficulty</th>
				</tr>
			</table>
		</div>
		<form class="leftContainer" action="../include/addQuestion.php" method="post">
			<label for="question" id="title">Question</label>
			<textarea name='question' placeholder="type here ..."></textarea>
			<label for="fName" id="title">Function Name</label>
			<input type='text' name="fName" placeholder="...">
			<label for="category" id="title">Category</label>
			<select name="category">
			    <option value="Functions">Functions</option>
			    <option value="Arrays">Arrays</option>
			    <option value="Strings">Strings</option>
			    <option value="Loops">Loops</option>
			    <option value="arithmetics">Arithmetics</option>
			</select>
			<label for="difficulty" id="title">Difficulty</label>
			<select  name="difficulty">
				<option selected disabled>choose the difficulty</option>
				<option value="easy">Easy</option>
				<option value="medium">Medium</option>
				<option value="hard">Hard</option>
			</select>
			<label id="title">Constraints</label>
			<div class="constraints">
				<div>
					<input id="checkbox" type="checkbox" name="for">
					<label for='for'>for</label>
				</div>
				<div>
					<input id="checkbox" type="checkbox" name="while">
					<label for='while'>while</label>					
				</div>
				<div>
					<input id="checkbox" type="checkbox" name="recursion">
					<label for='recursion'>recursion</label>				
				</div>
			</div>
			<label id="title">test Cases</label>
			<div class="testCases">
				<div class="case">
					<input type='text' name="case[]" placeholder="case">
					<input type='text' name="caseA[]" placeholder="answer">
				</div>
			</div>
			<div class="last">
				<button id='addCase' type='button' name="addCase">add Case</button>
				<button type='submit' name="save">Save</button>
			</div>
			
		</form>	
	</div>
</body>
<script type="text/javascript">
		let b = document.querySelector('#addCase')
		b.addEventListener('click',addTestCase)
		function addTestCase(){
			let c = document.querySelector('.testCases')

			let testCase = document.createElement('div')
			testCase.setAttribute('class','case')

			let x = document.createElement('input')
			x.setAttribute('name','case[]')
			x.setAttribute('type','text')
			x.setAttribute('placeholder','case')

			let y = document.createElement('input')
			y.setAttribute('name','caseA[]')
			y.setAttribute('type','text')
			y.setAttribute('placeholder','answer')

			testCase.appendChild(x)
			testCase.appendChild(y)

			c.appendChild(testCase)
		}</script>

		<!-- rightContainer-->
		<script type="text/javascript">
		var qs = JSON.parse('<?= $questions;?>');
		let table = document.querySelector('.table');
		Object.keys(qs).forEach(key => {
			let tr = document.createElement('tr');
			tr.setAttribute('class','tr');

			let td1 = document.createElement('td');
			let td1C = document.createElement('label');
			td1C.innerHTML = qs[key].functionName
			td1C.setAttribute('id',qs[key].questionID);
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
</html>