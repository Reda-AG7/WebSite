<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>SignUp</title>
</head>
<body>
	<div class='wrapper'>
		<form class="login" action="include/signUp_inc.php" method="post">
			<h2>Sign Up</h2>
			<label for="firstName">Lirst Name</label>
			<input type="text" name="firstName" placeholder="">
			<label for="lastName">Last Name</label>
			<input type="text" name="lastName" placeholder="">
			<div id="teacher">
				<input type="checkbox" name="isTeacher">
				<label for="Teacher">I am Teacher</label>
				
			</div>
			<label for="ucid">ucid</label>
			<input type="text" name="ucid" placeholder="">
			<label for="password">Pasword</label>
			<input type="password" name="password">
			<input type="submit" name="signUp" value="Sign Up" placeholder="">
		</form>
		<div class="noAccount">
			<label>you do have an account?</label>
			<a href="index.php">Sign in</a>
		</div>
	</div>
	<?php 
		if(isset($_GET['error'])){
			if($_GET['error'] == 'recordNotFound'){
				//echo "hello";
			}
		}
	?>
</body>
</html>