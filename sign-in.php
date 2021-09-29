<!DOCTYPE html>
<html>
	<head>
		<title>Fake NASA Admin Page</title>
		<meta charset="UTF-8">
		<meta name="author" content="Dominyka Razanovaitė and Parmenion Charistos">
		<link rel="stylesheet" href="style/sign-in.css">
	</head>
	<body>
		<?php
			//needs checking if this user exists.
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $_POST["username"];
				echo "<script type=\"text/javascript\">
						window.location = \"admin.php/\"
						</script>";
			}
		?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			<div class="grid" id="sign-in-grid">
				<div class="grid-item" id="logo"><img src="media/nasa-logo.svg" alt="NASA logo"></img></div>
				<div class="grid-item" id="title"><h1>Sign in</h1></div>
				<label class="grid-item" for="username" id="username-label">Username</label>
				<input class="grid-item" type="text" name="username" id="username" placeholder="e.g. IamMrNimbus"></input>
				<label class="grid-item" for="password" id="password-label">Password</label>
				<input class="grid-item" type="password" name="password" id="password" placeholder="e.g. NotYourBirthDate"></input>
				<input class="grid-item" type="submit" id="submit-button"></input>
			</div>
		</form>
	</body>
</html>
