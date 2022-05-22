<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Index</title>
</head>
<body>
	<div class='wrapper'>
		<form class="login" action="include/login_inc.php" method="post">
			<h2>login</h2>
			<label class="error">record not found</label>
			<label for="ucid">ucid</label>
			<input type="text" name="ucid" placeholder="">
			<label for="password">Pasword</label>
			<input type="password" name="password">
			<input type="submit" name="login" value="login" placeholder="">
		</form>
		<div class="noAccount">
			<label>Don't have an account?</label>
			<a href="signUp.php">Sign up</a>
		</div>
	</div>
	<script type="text/javascript">
		let e = "<?= $_GET['error'];?>";
		if (e === 'recordNotFound'){
			displayErr("record not found")
		}
		else if(e === 'fieldLeftEmpty'){
			displayErr("some fields left empty")
		}
		function displayErr(err){
			let s = document.querySelector('.error');
			s.innerHTML = err
			s.style.display = 'block';
			var time = 1
			var interval = setInterval(function(){
				if(time < 6){
					s.style.opacity = 1-(time*0.2) ;
					time++;
					if(time == 5){
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